<?php

namespace App\Modules\Store\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSellerRequest;
use App\Http\Requests\UpdateSellerRequest;
use App\Models\AttributeValues;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\ProductImage;
use App\Models\ProductCategory;
use App\Models\CategoryAttribute;
use App\Models\Seller;
use App\Models\Orders;
use App\Models\Notifications;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;

class SellerController extends Controller
{

    public function __construct()
    {
        \App::setLocale('bn');
    }
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
        $areaLists = $this->divisional_areas();
        $allCategories = Category::get();
        $notifications = "";
        if(Auth::user()) {
            $notifications = Notifications::where(["notifiable_id"=>Auth::user()->id,"read_at"=>NULL])->latest()->take(5)->get();
        }

        return view("Store::seller.seller-registration", ['areas' => $areaLists, 'categories' => $allCategories,'notifications'=>$notifications]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sellerProfile()
    {
        $allCategories = Category::get();
        $notifications = "";
        if(Auth::user()) {
            $notifications = Notifications::where(["notifiable_id"=>Auth::user()->id,"read_at"=>NULL])->latest()->take(5)->get();
        }

        
        return view("Store::seller.profile", ['categories' => $allCategories,'notifications'=>$notifications]);
    }

    /**
     * Add Products with requirements.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function addProduct()
    {
        $attrVal = $productData = $productDetails = $productCategory = [];
        $rules = [
            'product_name' => 'required|string',
            'product_price' => 'required|numeric',
            'category_id' => 'required',
            'product_quantity' => 'required|int|min:1',
            'min_order_quantity' => 'required|int|min:1',
            // 'product_images' => "mimes:jpg,jpeg,png|max:2048"
        ];

        $validateData = Validator::make(request()->all(), $rules);

        if ($validateData->fails()) {
            return Response::json([
                'validationErr' => true,
                'messages' => $validateData->getMessageBag()->toArray()
            ]);
        }

        $to_be_updated_product_id = request()->product_table_id;
        $categoryId = request()->category_id;
        $productData['seller_id'] = Auth::user()->id;
        $productData['price'] = trim(request()->product_price);
        $productData['quantity'] = trim(request()->product_quantity);
        $productData['min_order_quantity'] = trim(request()->min_order_quantity);
        $productData['category_id'] = $categoryId;
        $productData['url_key'] = preg_replace('#[ -]+#', '-', strtolower(request()->product_name));
        // var_dump($to_be_updated_product_id);
        if ($to_be_updated_product_id == NULL) {
            $productData['prod_sku'] = Auth::user()->id . '-' . time();
        }

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

        $hasError = false;

        
        DB::beginTransaction();
        try {
            if ($to_be_updated_product_id == NULL) {

                $product = Product::create($productData);
                $product_id = $product->id;
                $productDetails['product_id'] = $product_id;
                ProductDetail::create($productDetails);
                ProductCategory::create(['category_id' => trim($categoryId), 'product_id' => $product_id]);
                
            } else {

                $product = Product::where("id", $to_be_updated_product_id)->update($productData);
                $product_id = $to_be_updated_product_id;
                ProductDetail::where("product_id", $to_be_updated_product_id)->update($productDetails);
                ProductCategory::where("product_id", $to_be_updated_product_id)->update(['category_id' => trim($categoryId)]);
            }

            foreach ($attrVal as $key => $single_attrval) {

                if ($to_be_updated_product_id == NULL) {
                    AttributeValues::create(['attribute_id' => $key, 'product_id' => $product_id, 'value' => $single_attrval]);
                } else {
                    AttributeValues::where(["product_id" => $to_be_updated_product_id, "attribute_id" => $key])->update(['value' => $single_attrval]);
                }
            }

            if (!empty(request()->file('product_images'))) {

                $productImages = request()->file('product_images');
                $k = 0;
                $paths = null;
                foreach ($productImages as $image) {
                    $fileName = $product_id.'_'.time() . '_' . "product_image".$k;
                    $path = base_path('public/images/uploads/products');
                    if (File::isDirectory($path)) {
                        File::makeDirectory($path, 0777, true, true);
                    }
                    $image->move(base_path('public/images/uploads/products/'), $fileName);
                    $paths = '/images/uploads/products/' . $fileName;

                    if ($to_be_updated_product_id == NULL) {
                        ProductImage::create(['product_id' => $product_id, 'image_path' => $paths]);
                    } else {

                        ProductImage::create(['product_id' => $to_be_updated_product_id, 'image_path' => $paths]);
                    }
                    $k++;
                }
            }

            if ($to_be_updated_product_id == NULL) {
                $message = __('frontError.Product has been added to the list successfullly');
            } else {
                $message = __('frontError.Product Data has been updated successfullly');
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            $hasError = true;
            Log::error([$e->getFile(), $e->getLine(), $e->getMessage()]);
            $message = $e->getMessage();
        }

        return Response::json(['error' => $hasError, 'message' => $message]);
    }

    public function retreieve_product_data()
    {
        $product_id = request()->id;
        $seller_id = Auth::user()->id;

        $productData = Product::with(['productDetails', 'productImages', 'productCategory', 'attributeValues'])
            ->where(["id" => $product_id, "seller_id" => $seller_id])
            ->first();

        if (!$productData) {
            return Response::json([]);
        }

        $product_infos = [
            'product_table_id' => $productData->id,
            'product_name' => $productData->productDetails->name,
            'additional_info' => $productData->productDetails->additional_information,
            'product_des' => $productData->productDetails->description,
            'category_id' => $productData->productCategory->category_id,
            'product_price' => $productData->price,
            'quantity' => $productData->quantity,
            'min_order_quantity' => $productData->min_order_quantity,
            'status' => $productData->status,
            'attribute_values' => [],
            'prev_images' => [],
        ];

        foreach ($productData->attributeValues as $attr) {
            $product_infos['attribute_values'][] = $attr->value;
        }

        foreach ($productData->productImages as $images) {
            $product_infos['prev_images'][$images->id] = str_replace("/images/uploads/products/", "", $images->image_path);
        }

        return Response::json($product_infos);
    }

    public function remove_product_image(Request $request)
    {
        $imageId = $request->imageid;
        $product_id = $request->product_id;
        
        $error = false;
        DB::beginTransaction();
        try {
            $product = Product::find($product_id);
            $product->productImages()->where("id",$imageId)->delete();

            $message = 'Image has been removed';

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $error = true;
            $message = $e->getMessage();
            Log::error([$e->getFile(), $e->getLine(), $e->getMessage()]);
        }

        return response::json(["error"=>$error,"message"=>$message]);
    }


    public function update_order_price(Request $request)
    {
        $orders_table_id = $request->orders_table_id;
        $seller_id = Auth::user()->id;
        $product_id = $request->updating_product_id;
        $updated_price = $request->updated_price;

        // var_dump(is_numeric($updated_price));exit;

        if($updated_price=="" || $updated_price=="0" || $updated_price < 0 || !is_numeric($updated_price)) {
            return Response::json(["error"=>true,"message"=>'Please provide a valid updating price.']);
        }

        $orderData = Orders::with('orderItems')->where("id",$orders_table_id)->first();	
        $customer_id = $orderData->customer_id;
        
        $customerInfo = User::with('customerDetails')->where("id",$customer_id)->first();
        $productInfo = Product::with("productDetails")->where("id",$product_id)->first();
        $product_name = $productInfo->productDetails->name;
        $orderQuantity = $orderData->orderItems[0]->qty ?? 0;


        $where_columns = [
            "id"=>$orders_table_id,
            "seller_id"=>$seller_id,
            "product_id"=>$product_id
        ];

        $data_to_be_update = [
            "order_status"=> "processing",
            "updated_price" => $updated_price
        ];

        $hasError = false;
        DB::beginTransaction();
        try {
            
            Orders::where($where_columns)->update($data_to_be_update);
            $message = "Orders price has been updated.";

            $customerId = $customer_id;
            $customerNotifyMessage = 'Your purchase request for '.$product_name.'('.$orderQuantity.') has been Confirmed by seller';
            $customerRedirectUrl = route('customer.profile',['parameters'=>'purchases']);

            $adminId = 0;
            $adminNotifyMessage = 'An order for '.$product_name.'('.$orderQuantity.') has been Confirmed by the seller';
            $adminRedirectUrl = route('page',['page'=>'order-list']);

            $notification_data = [
                ['type'=>'','notifiable_id'=>$customerId,'message'=>$customerNotifyMessage,'redirect_url'=>$customerRedirectUrl,'read_at'=>NULL,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
                ['type'=>'','notifiable_id'=>$adminId,'message'=>$adminNotifyMessage,'redirect_url'=>$adminRedirectUrl,'read_at'=>NULL,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')]
            ];

            Notifications::insert($notification_data);


            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $hasError = true;
            Log::error([$e->getFile(), $e->getLine(), $e->getMessage()]);
            $message = $e->getMessage();
        }

        return Response::json(["error"=>$hasError,"message"=>$message]);
    }

    public function confirm_or_cancel_order(Request $request)
    {
        $message = '';
        $data_need_to_be_updated = [];

        $orders_table_id = $request->orders_table_id;
        $seller_id = Auth::user()->id;
        $product_id = $request->updating_product_id;
        $action_type = $request->action_type;

        $getProductInfo = Product::where("id",$product_id)->first();
        $getOrderInfo = Orders::with("orderItems")->where("id",$orders_table_id)->first();
        
        $product_name = $getProductInfo->productDetails->name;
        $customer_id = $getOrderInfo->customer_id;
        $orderQuantity = $getOrderInfo->orderItems[0]->qty ?? 0;
        $updatedPrice = $getOrderInfo->updated_price ?? 0;

        if($getOrderInfo==NULL) {
            return Response::json(["error"=>true,"message"=>__('frontError.Sorry, order not found.')]);
        }

        if($action_type=="confirm") {
            if($updatedPrice=="" || $updatedPrice=="0") {
                return Response::json(["error"=>true,"message"=>__('frontError.Please update the order Price')]);
            }

            $message = __('frontError.Order has been delivered successfully');
            $data_need_to_be_updated = [
                "payment_status" => "paid",
                "order_status" => "delivered"
            ];
        }
        
        if($action_type=="cancel") {

            $message = __('frontError.Order has been cancelled');
            $data_need_to_be_updated = [
                "order_status" => "cancelled"
            ];
        }

        $where_columns = [
            "id"=>$orders_table_id,
            "seller_id"=>$seller_id,
            "product_id"=>$product_id
        ];

        $hasError = false;
        DB::beginTransaction();
        try {
            
            Orders::where($where_columns)->update($data_need_to_be_updated);
            $customerNotifyMessage = __('frontError.Your requested product').' '.$product_name.'('.$orderQuantity.') '.__('frontError.has been Delivered');
            $adminNotifyMessage = __('frontError.An order of').' '.$product_name.'('.$orderQuantity.') '.__('frontError.has been Delivered');
            
            if($action_type=="cancel") {
                $retainQuantity = $getProductInfo->quantity + ($getProductInfo->min_order_quantity > 0 ? $getProductInfo->min_order_quantity * $getOrderInfo->orderItems[0]->qty: $getOrderInfo->orderItems[0]->qty);
                
                Product::where("id",$product_id)->update(["quantity"=> $retainQuantity]);
                $customerNotifyMessage = __('Your requested product').' '.$product_name.'('.$orderQuantity.') '.__('frontError.has been cancelled');
                $adminNotifyMessage = __('frontError.An order of').' '.$product_name.'('.$orderQuantity.') '. __('frontError.has been cancelled');
            }

            $message = $message;

            $customerId = $customer_id;
            $customerRedirectUrl = route('customer.profile',['parameters'=>'purchases']);

            $adminId = 0;
            $adminRedirectUrl = route('page',['page'=>'order-list']);

            $notification_data = [
                ['type'=>'','notifiable_id'=>$customerId,'message'=>$customerNotifyMessage,'redirect_url'=>$customerRedirectUrl,'read_at'=>NULL,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')],
                ['type'=>'','notifiable_id'=>$adminId,'message'=>$adminNotifyMessage,'redirect_url'=>$adminRedirectUrl,'read_at'=>NULL,'created_at'=>date('Y-m-d H:i:s'),'updated_at'=>date('Y-m-d H:i:s')]
            ];

            Notifications::insert($notification_data);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $hasError = true;
            Log::error([$e->getFile(), $e->getLine(), $e->getMessage()]);
            $message = $e->getMessage();
        }

        return Response::json(["error"=>$hasError,"message"=>$message]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSellerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name'      => 'required|string',
                'mobile'   => 'required',
                'email'      => 'required|email|regex:/(.+)@(.+)\.(.+)/i',
                'password' => 'nullable|min:6',
                'password_confirmation' => 'nullable|required_with:password|same:password|min:6',
                'shop_name' => 'required',
                'shop_address' => 'required',
                'area' => 'required',
                'tin_num' => 'required',
                'trade_license' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:8000',
                'sellerAgreement' => 'accepted',
                // 'trade_license' => 'required',
            ],
            $messages = [
                'tin_num.required'=>'TIN No is required',
                'trade_license.required'=>'Trade license is required',
            ]
        );
        if ($validator->fails()) {
            return $this->ajaxResponse(422, __('frontError.The given data is invalid.'), $validator->errors($messages), []);
        }

        if(!preg_match("/^(?:\\+88|88)?(01[3-9]\\d{8})$/", $request->mobile)) {
            return $this->ajaxResponse(422, __('frontError.Invalid Mobile number format'),[], []);
        }

        // check if any seller already registered with the phone
        $checkSellerWithEmail = User::where('mobile', request('mobile'))->where('user_type', 'seller')->first();
        if ($checkSellerWithEmail) {
            return $this->ajaxResponse(422, __('frontError.A Seller already Registered with this Mobile.'), [], []);
        }

        // check if any customer already registered with the phone and show him a message to login his panel and be a seller
        if(!Auth::user()) {
            $checkCustomerWithPhone = User::where('mobile', request('mobile'))->where('user_type', 'customer')->first();
            if($checkCustomerWithPhone) {
                return $this->ajaxResponse(422, __('frontError.A Customer already Registered with this Mobile, you can be a seller from your panel after log in.'), [], []);
            }
        }

        DB::beginTransaction();
        try {

            $file = $request->file('trade_license');
            $paths = null;
            if ($file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $storeName = $fileName;

                $path = base_path('public/images/uploads/trade-license');
                if (File::isDirectory($path)) {
                    File::makeDirectory($path, 0777, true, true);
                }
                $file->move(base_path('public/images/uploads/trade-license/'), $storeName);
                $paths = '/images/uploads/trade-license/' . $storeName;
            }

            if (Auth::user()) {
                Seller::create(
                    [
                        'user_id' => Auth::user()->id,
                        'shop_name' => $request->shop_name,
                        'area' => $request->area,
                        'shop_address' => $request->shop_address,
                        'tin_num' => $request->tin_num,
                        'trade_license' => $paths,
                        'status' => "pending"

                    ]
                );
            } else {
                $user = User::create(
                    [
                        'name' => $request->name,
                        'mobile' => $request->mobile,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                        'user_type' => 'seller'
                    ]
                );
                Seller::create(
                    [
                        'user_id' => $user->id,
                        'shop_name' => $request->shop_name,
                        'area' => $request->area,
                        'shop_address' => $request->shop_address,
                        'tin_num' => $request->tin_num,
                        'trade_license' => $paths,
                        'status' => "pending"

                    ]
                );

                Customer::create(
                    [
                        'user_id' => $user->id,
                    ]
                );
            }
            DB::commit();
            // auth()->login($user);
            return $this->ajaxResponse(200, __('frontError.Your Request has been submitted, please wait for admin approval.'), [], []);
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error([$exception->getFile(), $exception->getLine(), $exception->getMessage()]);
            return $this->ajaxResponse(500, $exception->getMessage(), [], []);
        }
    }

    public function deleteProduct(Request $request)
    {
        $product_id = $request->id;
        $hasError = false;
        DB::beginTransaction();
        try {
            $product = Product::find($product_id);
            $product->delete();
            $product->productDetails()->delete();
            $product->productImages()->delete();
            $product->productCategory()->delete();
            $product->attributeValues()->delete();

            $message = __('frontError.Product has been deleted successfully');
            
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $hasError = true;
            Log::error([$e->getFile(), $e->getLine(), $e->getMessage()]);
            $message = $e->getMessage();
        }

        return Response::json(['error' => $hasError, 'message' => $message]);
    }

    private function divisional_areas()
    {
        return [
            'ctg' => "চট্টগ্রাম",
            'dhk' => "ঢাকা",
            'bar' => "বরিশাল",
            'raj' => "রাজশাহী",
            'rang' => "রংপুর",
            'mym' => "ময়মনসিংহ",
            'mym' => "খুলনা",
        ];
    }
}
