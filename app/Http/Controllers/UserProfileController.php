<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Seller;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Orders;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use App\Models\Notifications;

class UserProfileController extends Controller
{
    public function show()
    {
        return view('pages.user-profile',['notifications'=> Notifications::where(["notifiable_id"=>0,'read_at'=>NULL])->latest()->take(5)->get()]);
    }

    public function update(Request $request)
    {
        $rules = [
            'username' => ['required','max:255', 'min:2'],
            'email' => ['required', 'email', 'max:255',  Rule::unique('users')->ignore(auth()->user()->id)],
        ];
        $validate = Validator::make($request->all(), $rules);
        if($validate->fails()) {
            $validationError = $validate->errors();
            return back()->withInput()->withErrors($validationError);
        }

        User::where("id", Auth::user()->id)->update([
            'name' => $request->get('username'),
            'email' => $request->get('email') ,
            'mobile' => $request->get('mobile') ,
        ]);
        return back()->with('succes', 'Profile succesfully updated');
    }

    public function createAdmin(Request $request)
    {
        $rules = [
            'username' => ['required','max:255', 'min:2'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required']
        ];
        $validate = Validator::make($request->all(), $rules);
        if($validate->fails()) {
            $validationError = $validate->errors();
            return back()->withInput()->withErrors($validationError);
        }

        User::create([
            'name' => $request->get('username'),
            'email' => $request->get('email') ,
            'mobile' => $request->get('mobile') ,
            'password' => Hash::make($request->password),
            'user_type' => 'admin',
            'created_at'=> date('Y-m-d H:i:s')
        ]);
        return back()->with('succes', 'Admin user has been added successfully.');
        
    }

    public function edit($id)
    {
        $userDetails = User::find($id);	 
        $type = request()->segment(4) ?? "";
        return view('pages.user-edit',['type'=>$type,'user' => $userDetails,'areas'=>$this->divisional_areas(),'notifications'=> Notifications::where(["notifiable_id"=>0,'read_at'=>NULL])->latest()->take(5)->get()]);
    }

    public function update_child(Request $request)
    {
        $child_id = $request->user_id;
        $child_type = $request->child_type;
        $childDetails = User::find($child_id);

        $rules = [
            'name' => 'required|string',
            'mobile' => 'required|unique:users,mobile,' . $child_id.'|regex:/(01)[0-9]{9}/',
            'email' => 'unique:users,email,' . $child_id,
        ];

        if ($child_type == "seller") {
            $rules['shop_name'] = 'required';
            $rules['shop_address'] = 'required';
            $rules['area'] = 'required';
            $rules['tin_num'] = 'required';
            $rules['status'] = 'required';
        }

        if ($child_type == "customer") {
            $rules['customer_status'] = 'required';
            $rules['shipping_address'] = 'required';
        }

        $validatingData = Validator::make($request->all(), $rules,['shipping_address.required'=>'ঠিকানা প্রয়োজন']);
        if ($validatingData->fails()) {
            $validationError = $validatingData->errors();
            return back()->withInput()->withErrors($validationError);
        }

        $updateData = $updateUserDetails = [];
        $updateData['name'] = $request->name;
        $updateData['mobile'] = $request->mobile;
        $updateData['email'] = $request->email;

        if ($child_type == "seller") {
            $updateUserDetails['shop_name'] = $request->shop_name;
            $updateUserDetails['shop_address'] = $request->shop_address;
            $updateUserDetails['area'] = $request->area;
            $updateUserDetails['tin_num'] = $request->tin_num;
            $updateUserDetails['status'] = $request->status;
        }

        if ($child_type == "customer") {
            $updateUserDetails['shipping_address'] = $request->shipping_address;
            // $updateUserDetails['billing_address'] = $request->billing_address;
            $updateUserDetails['status'] = $request->customer_status;
        }


        $error = false;

        DB::beginTransaction();
        try {
            User::where("id", $child_id)->update($updateData);
            if ($child_type == 'seller') {
                Seller::where("user_id", $child_id)->update($updateUserDetails);
            } else if ($child_type == 'customer') {
                Customer::where("user_id", $child_id)->update($updateUserDetails);
            }

            $message = "Profle info has been updated successfully.";

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            $error = true;
            $message = $e->getMessage();
            Log::error([$e->getFile(), $e->getLine(), $e->getMessage()]);
        }

        // Session::flash('profile_update_status', $message);

        return redirect('/user-management')->with('success', 'User Info has been updated successfully.');

    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $userType = $request->userType;
        $hasError = false;
        DB::beginTransaction();
        try {
            $user = User::find($id);
            if($user->sellerDetails()->exists()) {

                $user->sellerDetails()->delete();
                $products = Product::with(['productDetails','productImages','productCategory'])->where("seller_id",$id)->get();
                $orders = Orders::with("orderItems")->where("seller_id",$id)->get();
                foreach($products as $product) {
                    $product_id = $product->id;
                    $productItem = Product::find($product_id);
                    $productItem->delete();
                    $productItem->productDetails()->delete();
                    $productItem->productImages()->delete();
                    $productItem->productCategory()->delete();
                    $productItem->attributeValues()->delete();
                }

                foreach($orders as $order) {
                    $order_id = $order->id;
                    $ordercontent = Orders::find($order_id);
                    $ordercontent->delete();
                    $ordercontent->orderItems()->delete();
                }
            }
            if($user->customerDetails()->exists()) {
                $user->customerDetails()->delete();
                $purchaseLists = Orders::with("orderItems")->where("customer_id",$id)->get();
                foreach($purchaseLists as $purchase) {
                    $purchase_id = $purchase->id;
                    $purchasecontent = Orders::find($purchase_id);
                    $purchasecontent->delete();
                    $purchasecontent->orderItems()->delete();
                }
            }
            
            $user->delete();

            $message = "User has been deleted successfully";
            
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
