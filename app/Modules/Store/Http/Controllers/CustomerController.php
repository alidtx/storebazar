<?php

namespace App\Modules\Store\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Seller;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\LoginRequest;
use App\Models\Category;
use App\Models\CategoryDetails;
use App\Models\Product;
use App\Models\Orders;
use App\Models\Notifications;
use App\Models\Order_items;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;

class CustomerController extends Controller
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
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
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
                'password' => 'required|min:6',
                'password_confirmation' => 'required_with:password|same:password|min:6',
                'customer_address' => 'required',
                'agreement' => 'accepted'
            ]
        );

        if ($validator->fails()) {
            return $this->ajaxResponse(422, __('frontError.The given data is invalid.'), $validator->errors(), []);
        }

        if(!preg_match("/^(?:\\+88|88)?(01[3-9]\\d{8})$/", $request->mobile)) {
            return $this->ajaxResponse(422, __('frontError.Invalid Mobile number format'),[], []);
        }
        
        $checkCustomerWithEmail = User::where('mobile', request('mobile'))->first();
        if ($checkCustomerWithEmail && $checkCustomerWithEmail->customerDetails()->exists()) {
            return $this->ajaxResponse(422, __('frontError.A Customer already Registered with this Mobile.'), [], []);
        }
        // if($checkCustomerWithEmail)

        DB::beginTransaction();
        try {
            $user = User::create(
                [
                    'name' => $request->name,
                    'mobile' => $request->mobile,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'user_type' => 'customer'
                ]
            );
            Customer::create(
                [
                    'user_id' => $user->id,
                    'shipping_address'=>$request->customer_address
                ]
            );
            DB::commit();
            // auth()->login($user);
            return $this->ajaxResponse(200, __('frontError.Your Request has been submitted, please wait for admin approval.'), [], []);
            // return $this->ajaxResponse(200, 'Registration Successfull. Please login now', [], []);
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error([$exception->getFile(), $exception->getLine(), $exception->getMessage()]);
            return $this->ajaxResponse(500, $exception->getMessage(), [], []);
        }
    }

    public function updateCustomerInfo(Request $request)
    {
        $rules = [
            'user_name' => 'required|string',
            'user_mobile' => 'required|regex:/(01)[0-9]{9}/',
            // 'user_email' => 'unique:users,email,' . Auth::user()->id,
            'user_email' => 'required|email'
        ];

        if (Auth::user() != NULL && Auth::user()->sellerDetails && Auth::user()->sellerDetails->status=="approved") {
            $rules['seller_shop_name'] = 'required';
            $rules['seller_shop_address'] = 'required';
            $rules['seller_shop_area'] = 'required';
            $rules['seller_tin_num'] = 'required';
        }

        if (Auth::user() != NULL && Auth::user()->customerDetails) {
            $rules['customer_shipping_address'] = 'required';
            // $rules['customer_billing_address'] = 'required';
        }

        $validatingData = Validator::make($request->all(), $rules,['customer_shipping_address.required'=>'ঠিকানা প্রয়োজন']);
        if ($validatingData->fails()) {
            $validationError = $validatingData->errors();
            return redirect(route('customer.profile', 'info'))->withInput()->withErrors($validationError);
        }

        $updateData = $updateUserDetails = $updateSellerDetails = $updateCustomerDetails=  [];
        $updateData['name'] = $request->user_name;
        $updateData['mobile'] = $request->user_mobile;
        $updateData['email'] = $request->user_email;

        if (Auth::user()->sellerDetails && Auth::user()->sellerDetails->status=="approved") {
            $updateSellerDetails['shop_name'] = $request->seller_shop_name;
            $updateSellerDetails['shop_address'] = $request->seller_shop_address;
            $updateSellerDetails['area'] = $request->seller_shop_area;
            $updateSellerDetails['tin_num'] = $request->seller_tin_num;
        }

        if (Auth::user()->customerDetails) {
            $updateCustomerDetails['shipping_address'] = $request->customer_shipping_address;
            // $updateCustomerDetails['billing_address'] = $request->customer_billing_address;
        }

        $error = false;

        DB::beginTransaction();
        try {
            User::where("id", $request->user_id)->update($updateData);
            if (Auth::user()->sellerDetails && Auth::user()->sellerDetails->status=="approved") {
                Seller::where("user_id", $request->user_id)->update($updateSellerDetails);
            } 
            
            if (Auth::user()->customerDetails) {
                Customer::where("user_id", $request->user_id)->update($updateCustomerDetails);
            }

            $message = __('frontError.Profle info has been updated successfully.');

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $error = true;
            $message = $e->getMessage();
            Log::error([$e->getFile(), $e->getLine(), $e->getMessage()]);
        }

        Session::flash('profile_update_status', $message);

        return redirect(route("customer.profile", 'info'));
    }

    public function changePassword(Request $request)
    {
        $rules = [
            'current_password' => 'required',
            'new_password' => 'required|min:6',
            'password_confirmation' => 'required_with:new_password|same:new_password|min:6',
        ];

        $validatePassowrd = Validator::make($request->all(), $rules);
        if ($validatePassowrd->fails()) {
            $validationError = $validatePassowrd->errors();
            return redirect(route('customer.profile', 'credentials'))->withInput()->withErrors($validationError);
        }

        $user_id = Auth::user()->id;
        $oldPassword = Auth::user()->password;
        $currentPassword = $request->current_password;


        $newPassword = Hash::make($request->new_password);
        if (!Hash::check($currentPassword, $oldPassword)) {
            Session::flash("currentPassowrdNotMatch", __('frontError.Sorry, Current Password is not correct.'));
            return redirect(route('customer.profile', 'credentials'));
        }

        DB::beginTransaction();
        try {
            User::where("id", $user_id)->update(["password" => $newPassword]);
            $message = __('Password Changed Successfully');

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $error = true;
            $message = $e->getMessage();
            Session::flash("changedPassworddMessage", __('frontError.Password Changed Successfully'));
            Log::error([$e->getFile(), $e->getLine(), $e->getMessage()]);
        }

        return redirect(route('customer.profile', 'credentials'))->with("changedPassworddMessage", $message);
    }

    public function customerLogin(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'mobile' => 'required',
                'password' => 'required',
            ]
        );


        if ($validator->fails()) {
            return $this->ajaxResponse(422, '', $validator->errors(), []);
        }

        try {
            $credentials = $request->only('mobile', 'password');
            if (Auth::attempt($credentials)) {
                if(Auth::user()->user_type=="seller") {
                    if(Auth::user()->sellerDetails->status=="approved") {
                        return $this->ajaxResponse(200, 'Login Successfull.', [], []);
                    } else {
                        Auth::logout();
                        return $this->ajaxResponse(404, __('frontError.Login Access Restricted. Your registration request is not approved yet.'), [], []);
                    }
                } else if(Auth::user()->user_type=="customer") {
                    if(Auth::user()->customerDetails->status=="approved") {
                        return $this->ajaxResponse(200, 'Login Successfull.', [], []);
                    } else {
                        Auth::logout();
                        return $this->ajaxResponse(404, __('frontError.Login Access Restricted. Your registration request is not approved yet.'), [], []);
                    }
                }


            } else {
                return $this->ajaxResponse(422, __('frontError.Invalid Credentials.'), [], []);
            }
        } catch (\Exception $exception) {

            Log::error([$exception->getFile(), $exception->getLine(), $exception->getMessage()]);
            return $this->ajaxResponse(500, $exception->getMessage(), [], []);
        }
    }

    public function customerLogout(Request $request)
    {
        Session::flush();
        Auth::logout();
        return redirect('/');
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function customerProfile(Customer $customer)
    {
        $user = Auth::user();
        $userInfos = [];

        if ($user) {
            $userInfos = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'mobile' => $user->mobile,
            ];
            
            if ($user->sellerDetails) {
                $userInfos['shop_name'] = $user->sellerDetails->shop_name ?? 'N/A';
                $userInfos['area'] = $user->sellerDetails->area ?? 'N/A';
                $userInfos['shop_address'] = $user->sellerDetails->shop_address ?? 'N/A';
                $userInfos['tin_no'] = $user->sellerDetails->tin_num ?? 'N/A';
            }
 
            if ($user->customerDetails) {
                $userInfos['shipping_address'] = $user->customerDetails->shipping_address ?? 'N/A';
                $userInfos['billing_address'] = $user->customerDetails->billing_address ?? 'N/A';
            }
        }

        $allCategories = Category::get();

        $allProducts = Product::with(['productDetails', 'productCategory', 'attributeValues'])
            ->where('seller_id', $user->id)
            ->orderBy("id", "DESC")
            ->get();

        $productLists = [];
        foreach ($allProducts as $product) {
            $productLists[] = [
                'id' => $product->id,
                'name' => $product->productDetails->name,
                'price' => $product->price,
                'quantity' => $product->quantity,
                'min_order_quantity' => $product->min_order_quantity ?? 0,
                'url_key' => $product->url_key,
                'status' => $product->status,
                'created_at' => date('M j, Y', strtotime($product->created_at)),
                'commodity_type' => $product->attributeValues[0]->value ?? "",
                'material_type' => $product->attributeValues[1]->value ?? "",
                'category' => CategoryDetails::where(["category_id" => $product->productCategory->category_id, "language_id" => 1])->first()->name ?? ""
            ];
        }

        $customer_orders = $seller_order_requests = $sellerOrderLists = [];

        // Fetch customer orders with required details in a single query
        $customer_orders = Orders::with("orderItems",'product')->where(["customer_id" => $user->id])->orderBy("id", "DESC")->get();

        $customerOrderLists = [];
        foreach ($customer_orders as $customer_order) {
            $orderItem = $customer_order->orderItems->first();

            $customerOrderLists[] = [
                'order_table_id' => $customer_order->id,
                'product_id' => $customer_order->product_id,
                'price' => $customer_order->product?->price,
                'orderId' => '#ORDER' . $customer_order->id,
                'requested_at' => date("j M, y H:i", strtotime($customer_order->created_at)),
                'product_name' => $orderItem->product_name,
                'quantity' => ($customer_order->product?->min_order_quantity ?? 1) . " x " . $orderItem->qty,
                'total_price' => $orderItem->unit_price,
                'bidding_price' => $customer_order->bidding_price ?? "0",
                'payment_status' => $customer_order->payment_status ?? "0",
                'order_status' => $customer_order->order_status ?? "",
                'updated_price' => $customer_order->updated_price ?? "0"
            ];
        }
        
        $seller_order_requests = Orders::with("orderItems",'product','customerDetails')
            ->where(["seller_id" => $user->id])
            ->orderBy("id", "DESC")
            ->get();

        $sellerOrderLists = [];
        $sellerTotalEarning = 0;
        foreach ($seller_order_requests as $order_request) {
            $orderItem = $order_request->orderItems->first();

            $sellerOrderLists[] = [
                'order_table_id' => $order_request->id,
                'product_id' => $order_request->product_id,
                'orderId' => '#ORDER' . $order_request->id,
                'requested_at' => date("j M, y H:i", strtotime($order_request->created_at)),
                'product_name' => $orderItem->product_name,
                'price' => $order_request->product?->price,
                'quantity' => ($order_request->product?->min_order_quantity ?? 1) . " x " . $orderItem->qty,
                'total_price' => $orderItem->unit_price,
                'bidding_price' => $order_request->bidding_price ?? "0",
                'payment_status' => $order_request->payment_status ?? "0",
                'order_status' => $order_request->order_status ?? "",
                'updated_price' => $order_request->updated_price ?? "0",
                'customer_name' => $order_request->customerDetails->name ?? "N/A",
                'customer_phone' => $order_request->customerDetails->mobile ?? "N/A",
                'customer_shipping_address' => $order_request->shipping_address ?? __('frontError.No shipping address found'),
            ];
    
            if ($order_request->order_status == "delivered") {
                $sellerTotalEarning += $order_request->updated_price > 0 ? $order_request->updated_price : 0;
            }
        }

        // dd($sellerOrderLists);
	
        return view("Store::customer.profile", [
            'user' => $user,
            'categories' => $allCategories,
            'products' => $productLists,
            'allProducts' => $allProducts,
            'customer_orders' => $customer_orders,
            'customerOrderLists' => $customerOrderLists,
            'seller_orders' => $seller_order_requests,
            'sellerOrderLists' => $sellerOrderLists,
            'userInfos' => $userInfos,
            'sellerTotalEarning' => $sellerTotalEarning,
            'areas' => $this->divisional_areas(),
            'notifications'=>Notifications::where(["notifiable_id"=>Auth::user()->id,"read_at"=>NULL])->latest()->take(5)->get()
        ]);
    }

    public function update_user_notification()
    {
        $id = request()->nid;
        $redirectUrl = request()->redirectUrl;
        $read_at = date('Y-m-d H:i:s');

        Notifications::where("id",$id)->update(['read_at'=>$read_at]);
        echo '1';
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
    
    public function product_order(Request $request)
    {
        // Validation checks
        $quantity = $request->quantity;
        $order_address = $request->order_delivery_address;

        if ($order_address == '') {
            return Response::json(['error' => true, 'message' => 'ঠিকানা প্রয়োজন']);
        }

        if ($quantity === null || $quantity <= 0) {
            return Response::json(['error' => true, 'message' => 'পরিমাণ প্রয়োজন']);
        }

        $getProductInfo = Product::with("productDetails")->find($request->requested_product_id);
        if ($getProductInfo->min_order_quantity === null) {
            return Response::json(['error' => true, 'message' => 'ক্যারেট পণ্যের পরিমাণ পাওয়া যায়নি, অর্ডার করা সম্ভব নয়।']);
        }

        if ($getProductInfo->quantity === 0) {
            return Response::json(['error' => true, 'message' => __('Sorry, Item is out of stock.')]);
        }

        if ($getProductInfo->min_order_quantity * $quantity > $getProductInfo->quantity) {
            $message = __('frontError.Sorry, you have requested more than the number of item is available. Item in Stock') . ":" . "<strong> " . $getProductInfo->quantity . " টি</strong>";
            return Response::json(['error' => true, 'message' => $message]);
        }

        DB::beginTransaction();
        try {
            // Create order
            $orderInfo = [
                'customer_id' => $request->requested_customer_id,
                'product_id' => $request->requested_product_id,
                'phone' => $request->customer_phone,
                'shipping_address' => $request->shipping_address ?? "",
                'billing_address' => $request->billing_address ?? "",
                'bidding_price' => $request->bidding_price ?? "0",
                'comment' => $request->comment ?? "",
                'payment_status' => "unpaid",
                'order_status' => "pending",
                'updated_price' => "",
                'seller_id' => $getProductInfo->seller_id,
                'shipping_address' => $order_address,
            ];

            $order = Orders::create($orderInfo);
            $order_id = $order->id;

            // Create order item
            $orderItem = [
                'order_id' => $order_id,
                'product_name' => $request->product_name,
                'unit_price' => $quantity > 0 && $getProductInfo->min_order_quantity > 0 ? $quantity * $getProductInfo->min_order_quantity * $request->product_price : $quantity * $request->product_price,
                'qty' => $quantity,
            ];

            Order_items::create($orderItem);

            // Update product quantity
            //  $updateQuantity = product quantity - product per caret * order quantity
            $updateProductQuantity = ($getProductInfo->quantity > 0 && $getProductInfo->min_order_quantity > 0) ? $getProductInfo->quantity - ($getProductInfo->min_order_quantity * $quantity) : $getProductInfo->quantity;
            $getProductInfo->update(['quantity' => $updateProductQuantity]);

            // Create notifications
            $sellerNotifyMessage = 'A new order for ' . $request->product_name . '(' . $quantity . ') has been placed by ' . $request->customer_name;
            $sellerRedirectUrl = route('customer.profile', ['parameters' => 'orders']);

            $adminNotifyMessage = 'A new order for ' . $request->product_name . '(' . $quantity . ') has been placed by ' . $request->customer_name;
            $adminRedirectUrl = route('page', ['page' => 'order-list']);

            $notification_data = [
                ['type' => '', 'notifiable_id' => $getProductInfo->seller_id, 'message' => $sellerNotifyMessage, 'redirect_url' => $sellerRedirectUrl, 'read_at' => NULL, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
                ['type' => '', 'notifiable_id' => 0, 'message' => $adminNotifyMessage, 'redirect_url' => $adminRedirectUrl, 'read_at' => NULL, 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ];

            Notifications::insert($notification_data);

            DB::commit();
            return Response::json(['error' => false, 'message' => __('frontError.Order has been placed successfully.')]);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error([$e->getFile(), $e->getLine(), $e->getMessage()]);
            return Response::json(['error' => true, 'message' => $e->getMessage()]);
        }
    }

    public function getCustomer(Request $request)
    {
        $customer_id = $request->customer_id;
        $product_id =  $request->product_id;
        
        if (!Auth::check() || Auth::user()->user_type == "admin") {
            return response()->json(['error' => true, 'authError' => true, 'message' => __('frontError.Please login to order the product')]);
        }

        $customerInfo = User::with("customerDetails")->find($customer_id);

        $pushCustomerInfo = [
            'customer_id' => $customer_id,
            'name' => $customerInfo->name ?? "",
            'mobile' => $customerInfo->mobile ?? "",
            'email' => $customerInfo->email ?? "",
            'shipping_address' => $customerInfo->customerDetails->shipping_address ?? "",
            'billing_address' => $customerInfo->customerDetails->billing_address ?? "",
        ];

        $pushProductInfo = [];
        $productInfo = Product::with(["productDetails"])
            ->find($product_id);

        if($productInfo->seller_id==$customer_id) {
            return response()->json(['error'=>true,'message'=>__('frontError.Sorry, You can not buy your own product.')]);
        }

        $pushProductInfo = [
            'product_name' => $productInfo->productDetails->name ?? "",
            'product_price' => $productInfo->price ?? 0,
            'product_quantity' => $productInfo->quantity ?? 0,
            'min_order_quantity' => $productInfo->min_order_quantity ?? 0,
            'product_category_id' => $productInfo->category_id ?? "",
            'product_category' => CategoryDetails::where("id", $productInfo->category_id)->first()->name ?? "",
        ];

        return Response::json(['customer' => $pushCustomerInfo, 'product' => $pushProductInfo]);
    }

}
