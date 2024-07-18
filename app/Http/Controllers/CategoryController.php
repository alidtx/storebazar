<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Attribute as ModelsAttribute;
use App\Models\AttributeValues;
use App\Models\Category;
use App\Models\CategoryAttribute;
use App\Models\CategoryDetails;
use App\Models\Product;
use App\Models\ProductCategory;
use Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\Notifications;

class CategoryController extends Controller
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
     * @param  \App\Http\Requests\StoreCategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name'      => 'required',
                'url_key'   => 'required',
                'image' => 'required',
                'attribute' => 'required'

            ]
        );
        if ($validator->fails()) {
            return $this->ajaxResponse(422, 'The given data is invalid.', $validator->errors(), []);
        }

        DB::beginTransaction();
        try {

            $file = $request->file('image');
            $paths = "";
            if ($file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $storeName = $fileName;
                $path = base_path('public/images/uploads');
                if (File::isDirectory($path)) {
                    File::makeDirectory($path, 0777, true, true);
                }
                $file->move(base_path('public/images/uploads'), $storeName);
                $paths = '/images/uploads/' . $storeName;
            }
            $category = Category::create(
                [

                    'url_key' => $request->url_key,
                    'image' => $paths
                ]
            );
            CategoryDetails::create(
                [
                    'category_id' => $category->id,
                    'name' => $request->name,
                    'language_id' => $request->language_id ?? 1,
                ]
            );
            if (count($request->attribute)) {
                foreach ($request->attribute as $id) {
                    CategoryAttribute::create([
                        'category_id' => $category->id,
                        'attribute_id' => $id
                    ]);
                }
            }
            DB::commit();
            return $this->ajaxResponse(200, 'Category created Successfully.', [], []);
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error([$exception->getFile(), $exception->getLine(), $exception->getMessage()]);
            return $this->ajaxResponse(500, $exception->getMessage(), [], []);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $attributeList = ModelsAttribute::get();
        $categoryAttributeId = array();
        foreach ($category->categoryAttribute as $attribute) {
            $categoryAttributeId[] = $attribute->attribute_id;
        }

        return view('pages.category-edit', [
            'category' => $category,
            'attributeList' => $attributeList,
            'categoryAttributeId' => $categoryAttributeId,
            'notifications'=> Notifications::where(["notifiable_id"=>0,'read_at'=>NULL])->latest()->get()

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name'      => 'required',
                'url_key'   => 'required',
                'attribute' => 'required'
            ]
        );
        if ($validator->fails()) {
            return $this->ajaxResponse(422, 'The given data is invalid.', $validator->errors(), []);
        }

        DB::beginTransaction();
        try {

            $category = Category::find($request->category_id);

            $file = $request->file('image');
            $paths = $category->image ?? '';
            if ($file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $storeName = $fileName;

                $path = base_path('public/images/uploads');
                if (File::isDirectory($path)) {
                    File::makeDirectory($path, 0777, true, true);
                }
                $file->move(base_path('public/images/uploads'), $storeName);
                $paths = '/images/uploads/' . $storeName;
            }
            if ($category) {
                $category->update([
                    'url_key' => $request->url_key,
                    'image' => $paths
                ]);
                $categoryDetails = CategoryDetails::where('category_id', $request->category_id)->where('language_id', 1)->first();
                $categoryDetails->update([
                    'name' => $request->name,

                ]);

                if ($request->attribute) {
                    CategoryAttribute::where('category_id', $category->id)->delete();
                    foreach ($request->attribute as $id) {
                        CategoryAttribute::create([
                            'category_id' => $category->id,
                            'attribute_id' => $id
                        ]);
                    }
                }
            }
            DB::commit();

            return $this->ajaxResponse(200, 'Category updated Successfully.', [], []);
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error([$exception->getFile(), $exception->getLine(), $exception->getMessage()]);
            return $this->ajaxResponse(500, $exception->getMessage(), [], []);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        ProductCategory::where('category_id', $id)->delete();
        session()->flash('success', 'Category deleted successfully.');
        return redirect('/category-list');
    }

    public function getCategoryAttribute(Request $request)
    {
        $categoryID = $request->category_id;

        $productID = $request->product_id;
        if ($productID) {
            $productAttributeData = AttributeValues::with(['attributeValues', 'attributeLabels'])->where(["product_id" => $productID])->get();
        }
        //dd($productAttributeData);
        $categoryAttribute = CategoryAttribute::where('category_id', $categoryID)->get();
        if ($request->ajax()) {


            return view('Store::seller.category-attribute', [
                'categoryAttribute' => $categoryAttribute,
                'attributeValues' =>  $productAttributeData ?? null

            ])->render();
        }
    }
}
