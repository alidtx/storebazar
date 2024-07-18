<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Attribute;
use App\Models\AttributeValues;
use App\Models\Category;
use App\Models\CategoryAttribute;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductDetail;
use App\Models\ProductImage;
use App\Models\User;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use App\Models\Notifications;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
         
        $validator = Validator::make(
            $request->all(),
            [
                'product_name' => 'required|string',
                'product_price' => 'required|numeric',
                'product_quantity' => 'required|numeric|min:1',
                'min_order_quantity' => 'required|int|min:1',
                'category_id' => 'required',
                'seller_id' => 'required'
            ],$messages = [
                'product_name.required' => 'Product Name is required.',
                'product_price.required' => 'Product Price is required.',
                'category_id.required' => 'Product Category is required.',
                'seller_id.required' => 'Seller is required.',
                'product_quantity.required' => 'Quantity is required.',
                'min_order_quantity.required' => 'Per Crate Quantity is required.',
            ]
        );
        if ($validator->fails()) {
            return $this->ajaxResponse(422, 'The given data is invalid.', $validator->errors($messages), []);
        }
        $attrVal = $productData = $productDetails = $productCategory = [];

        $categoryId = request()->category_id;
        $productData['seller_id'] = trim(request()->seller_id);
        $productData['price'] = trim(request()->product_price);
        $productData['quantity'] = trim(request()->product_quantity);
        $productData['min_order_quantity'] = trim(request()->min_order_quantity);
        $productData['category_id'] = $categoryId;
        $productData['url_key'] = preg_replace('#[ -]+#', '-', strtolower(request()->product_name));
        $productData['prod_sku'] = request()->seller_id . '-' . time();
        $productData['status'] = 1;

        $productDetails['name'] = trim(request()->product_name);
        $productDetails['description'] = trim(request()->product_des);
        $productDetails['additional_information'] = trim(request()->additional_info);
        $productDetails['language_id'] = 1;
        $productDetails['qty'] = trim(request()->product_qty);

        $categoryAttributes = CategoryAttribute::where('category_id', $categoryId)->get();
        $i = 0;
        foreach ($categoryAttributes as $attribute) {
            foreach ($attribute->attributeDetails->attributeLabel as $attr) {
                $attrVal[$attr->id] = request()->attribute_values[$i];
            }
            $i++;
        }
        DB::beginTransaction();
        try {

            $product = Product::create($productData);
            $product_id = $product->id;
            $productDetails['product_id'] = $product_id;
            ProductDetail::create($productDetails);
            ProductCategory::create(['category_id' => trim($categoryId), 'product_id' => $product_id]);
            foreach ($attrVal as $key => $single_attrval) {
                AttributeValues::create(['attribute_id' => $key, 'product_id' => $product_id, 'value' => $single_attrval]);
            }

            if (request()->file('product_images')) {
                $k = 0;
                $paths = null;

                $productImages = request()->file('product_images');
                $k = 0;
                $paths = null;
                foreach ($productImages as $image) {

                    $fileName = $product_id.'_'.time() . '_' . "product_image".$k;
                    $path = base_path('public/images/uploads/products');
                    if (FacadesFile::isDirectory($path)) {
                        FacadesFile::makeDirectory($path, 0777, true, true);
                    }
                    $image->move(base_path('public/images/uploads/products/'), $fileName);
                    $paths = '/images/uploads/products/' . $fileName;
                    ProductImage::create(['product_id' => $product_id, 'image_path' => $paths]);
                    $k++;
                }
            }

            DB::commit();
            return $this->ajaxResponse(200, 'Product created Successfully.', [], []);
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error([$exception->getFile(), $exception->getLine(), $exception->getMessage()]);
            return $this->ajaxResponse(500, $exception->getMessage(), [], []);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
         
        $product_id = $request->product_id;

        $product_infos = [];

        $productData = Product::with(['productDetails', 'productImages', 'productCategory', 'attributeValues'])->where(["id" => $product_id])->get();
     
        foreach ($productData as $product) {
            $product_infos['product_table_id'] = $product->id;
            $product_infos['product_name'] = $product->productDetails->name;
            $product_infos['additional_info'] = $product->productDetails->additional_information;
            $product_infos['product_des'] = $product->productDetails->description;
            $product_infos['category_id'] = $product->productCategory->category_id;
            $product_infos['product_price'] = $product->price;
            $product_infos['quantity'] = $product->quantity;
            $product_infos['status'] = $product->status;

            foreach ($product->attributeValues as $attr) {
                $product_infos['attribute_values'][] = $attr->value;
            }

            foreach ($product->productImages as $images) {
                $product_infos['prev_images'][$images->id] = str_replace("/images/uploads/products/", "", $images->image_path);
            }
        }

        return Response::json($product_infos);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productDetails = Product::find($id);
        $attributeList = Attribute::latest()->get();
        $sellerList = User::where('user_type', '!=', 'admin')->latest()->get();
        $allCategories = Category::latest()->get();
        $productDetails = Product::with('productDetails', 'productCategory', 'productCategory.categoryDetailInformation.categoryDetail', 'productImages')->find($id);

        // dd($productDetails);

        return view('pages.product-edit', [
            'attributeList' => $attributeList,
            'categories' => $allCategories,
            'sellerList' =>  $sellerList,
            'productDetails' => $productDetails,
            'notifications'=> Notifications::where(["notifiable_id"=>0,'read_at'=>NULL])->latest()->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'product_name' => 'required|string',
                'product_price' => 'required|numeric',
                'product_quantity' => 'required|numeric',
                'min_order_quantity' => 'required|int|min:1',
                'category_id' => 'required',
                'seller_id' => 'required'
            ]
        );
        if ($validator->fails()) {
            return $this->ajaxResponse(422, 'The given data is invalid.', $validator->errors(), []);
        }


        $attrVal = $productData = $productDetails = $productCategory = [];


        $to_be_updated_product_id = request()->product_id;
        $loadProduct = Product::find($to_be_updated_product_id);
        $categoryId = request()->category_id;
        $productData['seller_id'] = trim(request()->seller_id);
        $productData['price'] = trim(request()->product_price);
        $productData['quantity'] = trim(request()->product_quantity);
        $productData['min_order_quantity'] = trim(request()->min_order_quantity);
        $productData['category_id'] = $categoryId;
        $productData['url_key'] = preg_replace('#[ -]+#', '-', strtolower(request()->product_name));

        $productData['status'] = 1;

        $productDetails['name'] = trim(request()->product_name);
        $productDetails['description'] = trim(request()->product_des);
        $productDetails['additional_information'] = trim(request()->additional_info);
        $productDetails['language_id'] = 1;

        $categoryAttributes = CategoryAttribute::where('category_id', $categoryId)->get();
        $i = 0;
        foreach ($categoryAttributes as $attribute) {

            foreach ($attribute->attributeDetails->attributeLabel as $attr) {
                $attrVal[$attr->id] = request()->attribute_values[$i];
            }
            $i++;
        }

        DB::beginTransaction();
        try {
            $product = Product::where("id", $to_be_updated_product_id)->update($productData);
            $product_id = $to_be_updated_product_id;
            ProductDetail::where("product_id", $to_be_updated_product_id)->update($productDetails);
            ProductCategory::where("product_id", $to_be_updated_product_id)->update(['category_id' => trim($categoryId)]);
            foreach ($attrVal as $key => $single_attrval) {
                AttributeValues::where(["product_id" => $to_be_updated_product_id, "attribute_id" => $key])->update(['value' => $single_attrval]);
            }

            if (!empty(request()->file('product_images'))) {
                $productImages = request()->file('product_images');
                $k = 0;
                $paths = null;
                foreach ($productImages as $image) {
                    $fileName = $product_id.'_'.time() . '_' . "product_image".$k;
                    $path = base_path('public/images/uploads/products');
                    if (FacadesFile::isDirectory($path)) {
                        FacadesFile::makeDirectory($path, 0777, true, true);
                    }
                    $image->move(base_path('public/images/uploads/products/'), $fileName);
                    $paths = '/images/uploads/products/' . $fileName;
                    ProductImage::create(['product_id' => $to_be_updated_product_id, 'image_path' => $paths]);
                    $k++;
                }
            }
            DB::commit();
            return $this->ajaxResponse(200, 'Product updated Successfully.', [], []);
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error([$exception->getFile(), $exception->getLine(), $exception->getMessage()]);
            return $this->ajaxResponse(500, $exception->getMessage(), [], []);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ProductCategory::where('product_id', $id)->delete();
        $product = Product::find($id);
        $product->delete();

        session()->flash('success', 'Product deleted successfully.');
        return redirect('/product-list');
    }
}
