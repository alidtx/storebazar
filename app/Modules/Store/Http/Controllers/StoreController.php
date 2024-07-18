<?php

namespace App\Modules\Store\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Seller;
use App\Models\User;
use App\Models\Cms;
use App\Models\Product;
use App\Models\Notifications;
use App\Models\CategoryDetails;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Notifications\Notification;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class StoreController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */

  




    public function index()
    {
        $allCategories = Category::get();
       
        $formattedCategory = [];

        $i = 0;
        foreach ($allCategories as $category) {
            if($category->url_key != 'honey' && $category->url_key != 'মধু') continue;
            $formattedCategory[$i]['url_key'] = $category->url_key;
            $formattedCategory[$i]['image'] = $category->image ?? "";

            foreach ($category->categoryDetail as $details) {
                if ($details->language_id != 1) continue;
                $formattedCategory[$i]['detail_name'] = $details->name;
            }

            $i++;
        }
        $notifications = "";
        if(Auth::user()) {
            $notifications = Notifications::where(["notifiable_id"=>Auth::user()->id,"read_at"=>NULL])->latest()->take(5)->get();
        }

        return view("Store::revamp.index", [
            // 'categories' => $allCategories, 
            'categoryList' => $formattedCategory,
            'notifications'=>$notifications,
        ]);
    }

    public function cmsContents($slug=null)
    {
        if(!$slug) {
            throw new NotFoundHttpException();
        }
        $notifications = "";
        if(Auth::user()) {
            $notifications = Notifications::where(["notifiable_id"=>Auth::user()->id,"read_at"=>NULL])->latest()->take(5)->get();
        }

        if($slug=='news-media' || $slug=='product') {

            if(view()->exists("Store::revamp.pages.{$slug}")) {
                return view("Store::revamp.pages.{$slug}", [
                    'cms' => [],
                    'slug' => $slug,
                    'notifications'=>$notifications,
                ]);
            } else {
                throw new NotFoundHttpException();
            }
        }

        $getCms = Cms::with('cmsDetails')->where('slug',$slug)->first();
        if(!$getCms) {
            throw new NotFoundHttpException();
        }
        
        return view("Store::revamp.pages.content", [
            'cms' => $getCms,
            'slug' => $slug,
            'notifications'=>$notifications,
        ]);

    }

    public function newsMedia($id=null)
    {
        if(!$id) {
            throw new NotFoundHttpException();
        }
        $notifications = "";
        if(Auth::user()) {
            $notifications = Notifications::where(["notifiable_id"=>Auth::user()->id,"read_at"=>NULL])->latest()->take(5)->get();
        }

        if(view()->exists("Store::revamp.pages.news-media.{$id}")) {
            return view("Store::revamp.pages.news-media.{$id}", [
                'id' => $id,
                'notifications'=>$notifications,
            ]);
        } else {
            throw new NotFoundHttpException();
        }

    }

    public function submit_phone_forgotPassword()
    {
        $phone_number = request()->phoneNumber;
        if($phone_number=="" || $phone_number==NULL) {
            return response()->json(['error'=>true,'message'=>__('frontError.Please provide a phone number')]);
        }
        
        $checkUserWithPhone = User::where('mobile', $phone_number)->where('user_type','!=','admin')->first();
        if(!$checkUserWithPhone) {
            return response()->json(['error'=>true,'message'=>__('frontError.Sorry, No record found with this phone number.')]);
        }

        // $redirectUrl = route('reset.password.submit');

        return response()->json([
            'error'=>false,
            // 'message'=>'Please visit <a href="#" target="_BLANK">Reset Password</a> link to reset your password.'
        ]);
    }

    public function submit_forgotPass_otp()
    {
        $phonenumber = request()->phoneNumber;
        $otp = request()->otp;

        if($phonenumber == NULL && $otp== NULL) {
            return response()->json(['error'=>true,'message'=>__('frontError.Phone number and OTP is required')]);
        } else if($phonenumber==NULL) {
            return response()->json(['error'=>true,'message'=>__('frontError.Phone number is required')]);
        } else if($otp==NULL) {
            return response()->json(['error'=>true,'message'=>__('frontError.OTP is required')]);
        }

        if(strlen($otp) < 4) {
            return response()->json(['error'=>true,'message'=>__('frontError.OTP must be 4 characters')]);
        }

        if($otp != '2233') {
            return response()->json(['error'=>true,'message'=>__('frontError.OTP does not matched')]);
        }

        $checkUserWithPhone = User::where('mobile', $phonenumber)->where('user_type','!=','admin')->first();
        if(!$checkUserWithPhone) {
            return response()->json(['error'=>true,'message'=>__('frontError.Sorry, No record found with this phone number.')]);
        }

        return response()->json([
            'error'=>false,
            'datatobeupdate'=>bin2hex($phonenumber)
        ]);

    }

    public function reset_password_submit()
    {
        $phone = request()->phone;
        $password = request()->password;
        $confirmPassword = request()->confirmPassword;
        $validatePhone = hex2bin($phone);

        if($validatePhone=="") {
            return response()->json(['error'=>true,'message'=>__('frontError.Phone number is required')]);
        }

        if($password=="") {
            return response()->json(['error'=>true,'message'=>__('frontError.New Password is required')]);
        }
        if($confirmPassword=="") {
            return response()->json(['error'=>true,'message'=>__('frontError.Confirm Password is required')]);
        }

        $checkUserWithPhone = User::where('mobile', $validatePhone)->where('user_type','!=','admin')->first();
        if(!$checkUserWithPhone) {
            return response()->json(['error'=>true,'message'=>__('frontError.Sorry, No record found with this phone number.')]);
        }
        
        if($password != $confirmPassword) {
            return response()->json(['error'=>true,'message'=>__('frontError.Sorry, Confirm Password does not matched.')]);
        }

        $updatePassword = bcrypt($password);
        $hasResetError = false;
        DB::beginTransaction();

        try {

            User::where('mobile',$validatePhone)->where('user_type','!=','admin')->update(['password'=>$updatePassword]);
            $message = __('Password has been reseted successfully');

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error([$exception->getFile(), $exception->getLine(), $exception->getMessage()]);
            $hasResetError = true;
            $message = $exception->getMessage();
        }

        return response()->json(['error'=>$hasResetError,'message'=>$message]);

    }



    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function catalogPage()
    {
        $category_url = request()->slug;
        if ($category_url != 'honey' && $category_url != 'মধু') return redirect(route('store.coming.soon'));
        $areas = $this->divisional_areas();

        $category = Category::select('id')->where('url_key', $category_url)->first();
        if (!$category) {
            return redirect(route('store.coming.soon'));
        }

        // $keyword = request()->keyword ?? "";
        $allCategory = [];
        $sellers = User::where("user_type", '!=', "admin")->latest()->get();
        $allCategories = Category::get();
        $categoryProducts = ProductCategory::where("category_id", $category->id)->get();
        foreach ($allCategories as $category) {
            //if ($category->url_key != 'honey' && $category->url_key != 'মধু') continue;
            foreach ($category->categoryDetail as $details) {
                if ($details->language_id == 1) {
                    $allCategory[$details->id]['name'] = $details->name;
                    $allCategory[$details->id]['total_product'] = ProductCategory::where('category_id', $details->id)->count();
                }
            }
        }

        $sl = 0;
        $slugProduct = [];
        $slug_productLists  = [];
        foreach ($categoryProducts as $singleProduct) {

            $theProduct = Product::with("productDetails", "productImages","sellerDetails")
                                ->where("id", $singleProduct->product_id)
                                ->first();
                                
            // if product doesn't have seller than ignore
            // if(!$theProduct->sellerDetails) {
            //     continue;
            // }

            if($theProduct) {
                $slugProduct = [
                    'name' => $theProduct->productDetails->name ?? "", 
                    'product_table_id' => $theProduct->id ?? "", 
                    'price' => $theProduct->price ?? "", 
                    'sku' => $theProduct->prod_sku ?? "", 
                    'quantity' => $theProduct->quantity ?? "", 
                    'url_key' => $theProduct->url_key ?? "",
                    'seller_name' => $theProduct->sellerDetails->name ?? "",
                    'shop_name' => $theProduct->sellerDetails->sellerDetails->shop_name ?? "",
                    'shop_address' => $theProduct->sellerDetails->sellerDetails->shop_address ?? "",
                    'shop_area' => $theProduct->sellerDetails->sellerDetails->area ?? "",
                    'tin_num' => $theProduct->sellerDetails->sellerDetails->tin_num ?? "",
                    'trade_license' => $theProduct->sellerDetails->sellerDetails->trade_license ?? "",
                ];
                
                $slugProduct['images'] = [];
                foreach ($theProduct->productImages as $images) {
                    $slugProduct['images'][] = $images->image_path ?? "";
                }
                array_push($slug_productLists, $slugProduct);
            }
        }

        
        krsort($slug_productLists);
        
        $pmin = count($slug_productLists) > 0 ? min(array_column($slug_productLists, 'price')) : 0;
        $pmax = count($slug_productLists) > 0 ? max(array_column($slug_productLists, 'price')) : 100;

        $notifications = "";
        if(Auth::user()) {
            $notifications = Notifications::where(["notifiable_id"=>Auth::user()->id,"read_at"=>NULL])->latest()->take(5)->get();
        }

        return view("Store::catalog", [
            'products' => $slug_productLists,
            'sellers' => $sellers,
            'categories' => $allCategories,
            'categoriLists' => $allCategory,
            'price_range' => ['pmin' => $pmin, 'pmax' => $pmax],
            'areas' => $this->divisional_areas(),
            'notifications' => $notifications,
            'areas' => $areas
        ]);
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

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function filtered_catalogPage()
    {
        $slug_productLists = $slugProduct = [];
        $prod_location = request()->prodLocation ?? "";
        $seller_location = request()->sellerLocation ?? "";
        $searchCategories = request()->searchCategories ?? [];
        $category_id=CategoryDetails::where('id', $searchCategories)->first()->category_id ?? null;
        // $slug = request()->slug ?? "";
        if(isset($category_id))
        {
            $slug = Category::where('id',$category_id)->first()->url_key ?? "";
        }
        else{
            $slug = request()->slug ?? "";
        }
        $priceRange = str_replace(["tk "," tk","tk"," "],"",request()->priceRange) ?? "";
        $priceRange = explode("-",$priceRange);
        $minPriceRange = $priceRange[0] ?? 0;
        $maxPriceRange = $priceRange[1] ?? 100;
        $areas = $this->divisional_areas();
       
        $categoryProducts = Category::with(["products"])->where("url_key", $slug)->get();
        // $categoryProducts = Category::with(["products"])
        //                     ->whereHas('products',function ($query) use($slug) {
        //                         $query->where('category_id',$slug);
        //                     })->get();
        foreach ($categoryProducts as $products) {
            foreach ($products->products as $singleProduct) {

                // if (!empty($searchCategories)) {
                //     if (!in_array($singleProduct->category_id, $searchCategories)) {
                //         continue;
                //     }
                // }

                if ($seller_location != '' && $seller_location != $singleProduct->seller_id) continue;
                if ($prod_location != '' && $seller_location != '' && $seller_location != $singleProduct->seller_id) continue;

                $theProduct = Product::with("productDetails", "productImages","sellerDetails")
                                ->where("id", $singleProduct->id)
                                ->first();

                if($theProduct) {
                    
                    if($minPriceRange !='' && ($theProduct->price < $minPriceRange )) continue;
                    if($maxPriceRange !='' && ($theProduct->price > $maxPriceRange )) continue;
                    if ($prod_location != '' && $theProduct->sellerDetails?->sellerDetails->area !="" && $prod_location != $theProduct->sellerDetails?->sellerDetails->area) continue;

                    $slugProduct = [
                        'name' => $theProduct->productDetails->name ?? "", 
                        'product_table_id' => $theProduct->id ?? "", 
                        'price' => $theProduct->price ?? "", 
                        'sku' => $theProduct->prod_sku ?? "", 
                        'quantity' => $theProduct->quantity ?? "", 
                        'url_key' => $theProduct->url_key ?? "",
                        'seller_name' => $theProduct->sellerDetails->name ?? "",
                        'shop_name' => $theProduct->sellerDetails->sellerDetails->shop_name ?? "",
                        'shop_address' => $theProduct->sellerDetails->sellerDetails->shop_address ?? "",
                        'shop_area' => isset($theProduct->sellerDetails->sellerDetails->area) ? $areas[$theProduct->sellerDetails->sellerDetails->area] : "",
                        'tin_num' => $theProduct->sellerDetails->sellerDetails->tin_num ?? "",
                        'trade_license' => $theProduct->sellerDetails->sellerDetails->trade_license ?? "",
                    ];

                    $slugProduct['images'] = [];
                    foreach ($theProduct->productImages as $images) {
                        $slugProduct['images'][] = $images->image_path ?? "";
                    }
                    array_push($slug_productLists, $slugProduct);
                }
            }
        }

        $slug_productLists = array_reverse($slug_productLists);

        return Response::json($slug_productLists);
    }

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function productDetails()
    {
        $slug = request()->slug;
        $info = [];
        $allCategories = Category::get();

        $product = Product::with('productDetails', 'productImages', 'productCategory', 'attributeValues', 'categoryDetails', 'sellerDetails')
                    ->where("url_key", $slug)
                    ->first();

        if($product) {

            $info = [
                'product_table_id' => $product->id,
                'product_sku' => $product->prod_sku,
                'product_price' => $product->price,
                'quantity' => $product->quantity,
                'status' => $product->status,
                'product_name' => $product->productDetails->name ?? "",
                'additional_info' => $product->productDetails->additional_information ?? "",
                'product_des' => $product->productDetails->description ?? "",
                'category_id' => $product->productCategory->category_id,
                'category' => CategoryDetails::where(["category_id" => $product->productCategory->category_id, "language_id" => 1])->first()->name ?? "",
                'seller_name' => $product->sellerDetails->name ?? "",
                'shop_name' => $product->sellerDetails->sellerDetails->shop_name ?? "",
                'shop_address' => $product->sellerDetails->sellerDetails->shop_address ?? "",
                'tin_num' => $product->sellerDetails->sellerDetails->tin_num ?? "",
                'trade_license' => $product->sellerDetails->sellerDetails->trade_license ?? "",
            ];

            foreach ($product->attributeValues as $key => $attributes) {
                foreach ($attributes->attributeValues->attributeLabel as $label) {
                    $info['attribute_values'][$label->label] = $attributes->value ?? "";
                }
            }

            foreach ($product->productImages as $images) {
                $info['prev_images'][] = $images->image_path ?? "";
            }

        }

        $notifications = "";
        if(Auth::user()) {
            $notifications = Notifications::where(["notifiable_id"=>Auth::user()->id,"read_at"=>NULL])->latest()->take(5)->get();
        }

        return view("Store::product", ['categories' => $allCategories, 'product_info' => $info,'notifications'=>$notifications]);
    }

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function comingSoon()
    {
        $allCategories = Category::get();

        $notifications = "";
        if(Auth::user()) {
            $notifications = Notifications::where(["notifiable_id"=>Auth::user()->id,"read_at"=>NULL])->latest()->take(5)->get();
        }

        return view("Store::coming-soon", ['categories' => $allCategories,'notifications'=>$notifications]);
    }
}
