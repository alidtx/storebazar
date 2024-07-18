<?php

namespace App\Http\Controllers;

use App\Models\Attribute as ModelsAttribute;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Cms;
use App\Models\Seller;
use App\Models\Customer;
use App\Models\Notifications;
use App\Models\Orders;
use Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PageController extends Controller
{
    /**
     * Display all the static pages when authenticated
     *
     * @param string $page
     * @return \Illuminate\View\View
     */
    public function index(string $page)
    {
        $notificationLists = $this->getNotifications();
        if ($page == "attribute-list") {
            $attributeList = ModelsAttribute::latest()->paginate(10);
            if (view()->exists("pages.{$page}")) {
                return view("pages.{$page}", [
                    'attributeList' => $attributeList,
                    'notifications' => $notificationLists
                ]);
            }
        }

        if ($page == "category-list") {
            $categoryList = Category::latest()->paginate(10);
            
            if (view()->exists("pages.{$page}")) {
                return view("pages.{$page}", [
                    'categoryList' => $categoryList,
                    'notifications' => $notificationLists
                ]);
            }
        }

        if ($page == "category-create") {
            $attributeList = ModelsAttribute::latest()->get();
            if (view()->exists("pages.{$page}")) {
                return view("pages.{$page}", [
                    'attributeList' => $attributeList,
                    'notifications' => $notificationLists
                ]);
            }
        }
        
        if ($page == "product-create") {
            $attributeList = ModelsAttribute::latest()->get();
            $sellerList = User::where('user_type', '!=', 'admin')->latest()->get();
            $allCategories = Category::latest()->get();
        //    dd($allCategories);
            if (view()->exists("pages.{$page}")) {
                return view("pages.{$page}", [
                    'attributeList' => $attributeList,
                    'categories' => $allCategories,
                    'sellerList' =>  $sellerList,
                    'notifications' => $notificationLists
                ]);
            }
        }

        if ($page == "product-list") {

            $productList = Product::with('productDetails', 'productCategory', 'productCategory.categoryDetailInformation.categoryDetail')->latest()->paginate(10);

            if (view()->exists("pages.{$page}")) {
                return view("pages.{$page}", [
                    'productList' => $productList,
                    'notifications' => $notificationLists
                ]);
            }
        }

        if($page == "user-management") {

            try {
                $userLists = User::orderBy("created_at","desc")->get();

            } catch (\Exception $exception) {
                Log::error([$exception->getFile(), $exception->getLine(), $exception->getMessage()]);
            }
        
            if (view()->exists("pages.{$page}")) {
                return view("pages.{$page}", [
                    'userLists' => $userLists,
                    'notifications' => $notificationLists
                ]);
            }
        }

        if($page == "cms-list") {

            try {
                $cmsList = Cms::with('cmsDetails')->orderBy("created_at","desc")->get();

            } catch (\Exception $exception) {
                Log::error([$exception->getFile(), $exception->getLine(), $exception->getMessage()]);
            }
        
            if (view()->exists("pages.cms.list")) {
                return view("pages.cms.list", [
                    'cmsList' => $cmsList,
                    'notifications' => $notificationLists
                ]);
            }
        }

        if($page == "content-create") {

            if (view()->exists("pages.cms.create")) {
                return view("pages.cms.create", [
                    'notifications' => $notificationLists
                ]);
            }
        }

        if($page == "order-list") {
            $orders = Orders::with("orderItems")->latest()->paginate(10);
	
            if (view()->exists("pages.{$page}")) {
                return view("pages.{$page}", [
                    'orders' => $orders,
                    'notifications' => $notificationLists
                ]);
            }
        }

        if($page == "dashboard") {

            $totalProducts = Product::count();
            $totalOrders = Orders::count();
            $totalSellers = $totalCustomers= 0;

            $users = User::with(["sellerDetails","customerDetails"])->get();
            foreach($users as $user) {
                if($user->user_type=="seller" && $user->sellerDetails) {
                    $totalSellers++;
                }

                if($user->user_type=="customer" && $user->customerDetails) {
                    $totalCustomers++;
                    if($user->sellerDetails) {
                        $totalSellers++;
                    }
                }
            }
            	
            return view("pages.{$page}",[
                'totalProducts'=>$totalProducts,
                'totalSellers'=>$totalSellers,
                'totalCustomers'=>$totalCustomers,
                'totalOrders'=>$totalOrders,
                'notifications' => $notificationLists
            ]);
        }

        if (view()->exists("pages.{$page}")) {
            return view("pages.{$page}",['notifications'=> Notifications::where(["notifiable_id"=>0,'read_at'=>NULL])->latest()->get()]);
        }

        return abort(404);
    }

    public function getNotifications()
    {
        return Notifications::where(["notifiable_id"=>0,'read_at'=>NULL])->latest()->take(5)->get();
    }

    public function update_notification()
    {
        $id = request()->nid;
        $redirectUrl = request()->redirectUrl;
        $read_at = date('Y-m-d H:i:s');

        Notifications::where("id",$id)->update(['read_at'=>$read_at]);
        echo '1';
    }

    public function vr()
    {
        return view("pages.virtual-reality",['notifications'=> Notifications::where(["notifiable_id"=>0,'read_at'=>NULL])->latest()->get()]);
    }

    public function rtl()
    {
        return view("pages.rtl",['notifications'=> Notifications::where(["notifiable_id"=>0,'read_at'=>NULL])->latest()->get()]);
    }

    public function profile()
    {
        return view("pages.profile-static",['notifications'=> Notifications::where(["notifiable_id"=>0,'read_at'=>NULL])->latest()->get()]);
    }

    public function signin()
    {
        return view("pages.sign-in-static");
    }

    public function signup()
    {
        return view("pages.sign-up-static");
    }

    public function user_lists()
    {

    }
}
