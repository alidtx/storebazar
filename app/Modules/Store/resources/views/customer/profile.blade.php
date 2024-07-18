@extends('layouts.store-front.master')
@section('content')
@include('layouts.store-front.header-bar')
@include('layouts.store-front.navbar')

<style>
    .icon-shape {
        width: 48px;
        height: 48px;
        background-position: center;
        border-radius: 0.75rem;
    }

    .bg-gradient-primary {
        background-image: linear-gradient(310deg, #fb6340 0%, #f56036 100%);
    }
    .icon-shape i {
        color: #fff;
        opacity: 0.8;
        top: 14px;
        position: relative;
    }
    table tbody .odd, table tbody .even { font-size: 14px;}
</style>

<div class="wrapper">
    <section class="ptb-60 profile-area bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="">
                                <h6> {{auth()->user()->name ?? ''}} </h6>
                                <p class="mb-0"> {{auth()->user()->mobile ?? ''}} </p>
                                <p> {{auth()->user()->email ?? ''}} </p>
                            </div>
                            @if(auth()->user()->customerDetails()->exists() && auth()->user()->sellerDetails()->exists() && auth()->user()->sellerDetails->status=="approved")
                            <div class="nav flex-column nav-pills pt-0 both_user_tab" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link pt-0 px-0" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                    <i class="bx bx-paper-plane"> </i> পেন্ডিং ক্রয় অনুরোধ
                                </a>
                                <a class="nav-link px-0" id="v-pills-purchase-history-tab" data-bs-toggle="pill" data-bs-target="#v-pills-purchase-history" type="button" role="tab" aria-controls="v-pills-purchase-history" aria-selected="true">
                                    <i class="bx bx-file"> </i> ক্রয় ইতিহাস
                                </a>
                                <a class="nav-link px-0" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                    <i class="bx bx-user"> </i> প্রোফাইল পরিবর্তন
                                </a>
                                <a class="nav-link border-bottom-0 px-0" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                                    <i class="bx bx-lock"> </i> পাসোয়ার্ড পরিবর্তন
                                </a>

                                <h6 style="padding:8px">Seller Menu</h6>
                                <div class="nav flex-column nav-pills pt-0 both_user_tab_seller" id="v-pills-tab" role="tablist" aria-orientation="vertical">

                                    <a class="nav-link pt-0 px-0 pb-2" id="v-pills-seller-dashboardb" data-bs-toggle="pill" data-bs-target="#v-pills-seller-dashboard" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                        <i class="bx bx-briefcase"> </i> ড্যাশবোর্ড
                                    </a>
                                    <a class="nav-link px-0 pb-2" id="v-pills-pending-orders-tab" data-bs-toggle="pill" data-bs-target="#v-pills-list-pending-orders" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                        <i class="bx bx-file"> </i> পেন্ডিং অর্ডার রিকুয়েস্ট
                                    </a>
                                    <a class="nav-link px-0 py-2" id="v-pills-order-history-tab" data-bs-toggle="pill" data-bs-target="#v-pills-order-history" type="button" role="tab" aria-controls="v-pills-order-history" aria-selected="true">
                                        <i class="bx bx-file"> </i> অর্ডার ইতিহাস
                                    </a>
                                    <a class="nav-link px-0 py-2" id="v-pills-add-product" data-bs-toggle="pill" data-bs-target="#v-pills-add" type="button" role="tab" aria-controls="v-pills-add" aria-selected="true">
                                        <i class="bx bx-package"> </i> পণ্য যোগ
                                    </a>

                                    <a class="nav-link px-0 py-2" id="v-pills-product-list" data-bs-toggle="pill" data-bs-target="#v-pills-list-product" type="button" role="tab" aria-controls="v-pills-list-product" aria-selected="true">
                                        <i class="bx bx-package"> </i> পণ্য তালিকা
                                    </a>
                                </div>
                            </div>

                            @elseif(auth()->user()->sellerDetails()->exists() && auth()->user()->sellerDetails->status=="approved")
                            <div class="nav flex-column nav-pills pt-0 onlySellerNav" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active pt-0 px-0 pb-2" id="v-pills-seller-dashboard-tab" data-bs-toggle="pill" data-bs-target="#v-pills-seller-dashboard" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                    <i class="bx bx-briefcase"> </i> ড্যাশবোর্ড
                                </a>
                                <a class="nav-link px-0 pb-2" id="v-pills-pending-orders-tab" data-bs-toggle="pill" data-bs-target="#v-pills-list-pending-orders" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                    <i class="bx bx-paper-plane"> </i> পেন্ডিং অর্ডার অনুরোধ
                                </a>
                                <a class="nav-link px-0 py-2" id="v-pills-order-history-tab" data-bs-toggle="pill" data-bs-target="#v-pills-order-history" type="button" role="tab" aria-controls="v-pills-order-history" aria-selected="true">
                                    <i class="bx bx-file"> </i> অর্ডার ইতিহাস
                                </a>
                                <a class="nav-link px-0 py-2" id="v-pills-add-product" data-bs-toggle="pill" data-bs-target="#v-pills-add" type="button" role="tab" aria-controls="v-pills-add" aria-selected="true">
                                    <i class="bx bx-package"> </i> প্রোডাক্ট যোগ
                                </a>
                                <a class="nav-link px-0 py-2" id="v-pills-product-list" data-bs-toggle="pill" data-bs-target="#v-pills-list-product" type="button" role="tab" aria-controls="v-pills-list-product" aria-selected="true">
                                    <i class="bx bx-package"> </i> পণ্য তালিকা
                                </a>
                                <a class="nav-link px-0" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                    <i class="bx bx-user"> </i> প্রোফাইল পরিবর্তন
                                </a>
                                <a class="nav-link border-bottom-0 px-0" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                                    <i class="bx bx-lock"> </i> পাসোয়ার্ড পরিবর্তন
                                </a>
                            </div>

                            @elseif(auth()->user()->customerDetails()->exists())
                            <div class="nav flex-column nav-pills pt-0 onlyCustomerTab" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link pt-0 px-0" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                    <i class="bx bx-paper-plane"> </i> পেন্ডিং ক্রয় অনুরোধ
                                </a>
                                <a class="nav-link px-0" id="v-pills-purchase-history-tab" data-bs-toggle="pill" data-bs-target="#v-pills-purchase-history" type="button" role="tab" aria-controls="v-pills-home2" aria-selected="true">
                                    <i class="bx bx-file"> </i> ক্রয় ইতিহাস
                                </a>
                                <a class="nav-link px-0" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                    <i class="bx bx-user"> </i> আপডেট প্রোফাইল
                                </a>
                                <a class="nav-link border-bottom-0 px-0" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                                    <i class="bx bx-lock"> </i> পাসওয়ার্ড পরিবর্তন
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-9  mb-3">
                    <div class="card h-100">
                        <div class="card-body pt-4">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                    <h6 class="mb-2"> পেন্ডিং ক্রয় অনুরোধ </h6>
                                    <div class="sep mb-3"> </div>
                                    @include('Store::customer.pending_order_request')
                                </div>

                                <div class="tab-pane fade" id="v-pills-purchase-history" role="tabpanel" aria-labelledby="v-pills-purchase-history-tab">
                                    <h6 class="mb-2"> ক্রয় ইতিহাস </h6>
                                    <div class="sep mb-3"> </div>

                                    @include('Store::customer.order_history')
                                </div>

                                <div class="tab-pane fade" id="v-pills-seller-dashboard" role="tabpanel" aria-labelledby="v-pills-seller-dashboard-tab">
                                    <h6 class="mb-2"> ড্যাশবোর্ড </h6>
                                    <div class="sep mb-3"> </div>
                                    @include('Store::seller.profile-menu.dashboard')
                                </div>

                                <div class="tab-pane fade" id="v-pills-list-pending-orders" role="tabpanel" aria-labelledby="v-pills-pending-orders-tab">
                                    <h6 class="mb-2"> পেন্ডিং অর্ডার অনুরোধ </h6>
                                    <div class="sep mb-3"> </div>
                                    @include('Store::seller.profile-menu.pending_order_request')
                                </div>
                                
                                <div class="tab-pane fade" id="v-pills-order-history" role="tabpanel" aria-labelledby="v-pills-order-history-tab">
                                    <h6 class="mb-2"> অর্ডার ইতিহাস </h6>
                                    <div class="sep mb-3"> </div>

                                    @include('Store::seller.profile-menu.order-list')
                                </div>

                                <div class="tab-pane fade" id="v-pills-add" role="tabpanel" aria-labelledby="v-pills-product-list">
                                    <h6 class="mb-2"> পণ্য যোগ করুন </h6>
                                    <div class="sep mb-3"> </div>
                                    
                                    @include('Store::seller.profile-menu.add-product')
                                </div>
                                
                                <div class="tab-pane fade" id="v-pills-list-product" role="tabpanel" aria-labelledby="v-pills-list-product">
                                    
                                    <h6 class="mb-2"> পণ্য তালিকা </h6>
                                    <div class="sep mb-3"> </div>
                                    
                                    @include('Store::seller.profile-menu.list-product')
                                </div>
                                
                                <!-- common panel -->
                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                    <h6 class="mb-2"> প্রোফাইল পরিবর্তন </h6>
                                    <div class="sep mb-3"> </div>

                                    @if(Session::has('profile_update_status'))
                                    <div class="alert alert-info">
                                        <p class="text-center mb-0">{{ Session::get("profile_update_status") }}</p>
                                    </div>
                                    @endif

                                    <div id="xlogin">
                                        <form action="{{ route('user.profile.update') }}" method="post" class="form-horizontal" id="sellerProfile">
                                            @csrf
                                            <input type="hidden" id="user_id" name="user_id" value="{{ $userInfos['id'] }}">
                                            <div class="row">
                                                <div class="col-lg-4 mb-3">
                                                    <div class="form-group">
                                                        <label for="" class="font-weight-medium mb-2"> পুরো নাম <span class="text-danger"> * </span> </label>
                                                        <input type="text" name="user_name" id="user_name" class="form-control" value="{{ isset($userInfos['name']) ? $userInfos['name']:old('user_name') }}" aria-label="full-name" aria-describedby="full-name">
                                                        @if($errors->has("user_name"))
                                                        <span class="text-danger">{{ $errors->first('user_name') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 mb-3">
                                                    <div class="form-group">
                                                        <label for="" class="font-weight-medium mb-2"> মোবাইল নং <span class="text-danger"> * </span> </label>
                                                        <input type="text" class="form-control" name="user_mobile" id="user_mobile" value="{{ isset($userInfos['mobile']) ? $userInfos['mobile']:old('user_mobile') }}" aria-label="fmobile" aria-describedby="mobile">
                                                        @if($errors->has("user_mobile"))
                                                        <span class="text-danger">{{ $errors->first('user_mobile') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 mb-3">
                                                    <div class="form-group">
                                                        <label for="" class="font-weight-medium mb-2"> ইমেইল এড্রেস <span class="text-danger"> * </span> </label>
                                                        <input type="email" class="form-control" name="user_email" id="user_email" value="{{ isset($userInfos['email']) ? $userInfos['email']:old('user_email') }}" aria-label="user email" aria-describedby="user email">
                                                        @if($errors->has("user_email"))
                                                        <span class="text-danger">{{ $errors->first('user_email') }}</span>
                                                        @endif
                                                    </div>
                                                </div>

                                                @if(Auth::user() != NULL && Auth::user()->sellerDetails()->exists() && Auth::user()->sellerDetails->status=="approved")
                                                    <div class="form-group col-lg-6 mb-3">
                                                        <label class="form-label" for="full-name"> কোম্পানি / দোকানের নাম<span class="text-danger"> * </span> </label>
                                                        <input type="text" name="seller_shop_name" id="seller_shop_name" value="{{ isset($userInfos['shop_name']) ? $userInfos['shop_name']: old('seller_shop_name') }}" class="form-control" placeholder="কোম্পানি / দোকানের ঠিকানা">
                                                        @if($errors->has("seller_shop_name"))
                                                        <span class="text-danger">{{ $errors->first('seller_shop_name') }}</span>
                                                        @endif
                                                    </div>
                                                    <style>
                                                        .nice-select {
                                                            width: 100% !important
                                                        }
                                                    </style>
                                                    <div class="form-group col-lg-6 mb-3">
                                                        <label class="form-label" for="shop_area"> দোকান এলাকা <span class="text-danger"> * </span> </label><br>
                                                        <select name="seller_shop_area" id="seller_shop_area">
                                                            <option value="">Select Area</option>
                                                            @foreach($areas as $key => $area)
                                                            <option value="{{ $key }}" @if(isset($userInfos['area']) && $userInfos['area']==$key)) {{"selected"}} @endif>{{ $area }}</option>
                                                            @endforeach
                                                        </select>
                                                        @if($errors->has("seller_shop_area"))
                                                        <span class="text-danger">{{ $errors->first('seller_shop_area') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group col-lg-6 mb-3">
                                                        <label class="form-label" for="full-name"> কোম্পানি / দোকানের ঠিকানা<span class="text-danger"> * </span> </label>
                                                        <input type="text" name="seller_shop_address" id="seller_shop_address" value="{{ isset($userInfos['shop_address']) ? $userInfos['shop_address']: old('seller_shop_address') }}" class="form-control" placeholder="কোম্পানি / দোকানের ঠিকানা">
                                                        @if($errors->has("seller_shop_address"))
                                                        <span class="text-danger">{{ $errors->first('seller_shop_address') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group col-lg-6 mb-3">
                                                        <label class="form-label" for="full-name"> টিন নাম্বার <span class="text-danger"> * </span> </label>
                                                        <input type="text" name="seller_tin_num" id="seller_tin_num" value="{{ isset($userInfos['tin_no']) ? $userInfos['tin_no'] : old('seller_tin_num') }}" class="form-control" placeholder="TIN NO *">
                                                        @if($errors->has("seller_tin_num"))
                                                        <span class="text-danger">{{ $errors->first('seller_tin_num') }}</span>
                                                        @endif
                                                    </div>
                                                @endif

                                                @if(Auth::user() != NULL && Auth::user()->customerDetails()->exists())
                                                    <div class="form-group col-lg-12 mb-3">
                                                        <label class="form-label" for="full-name"> ঠিকানা <span class="text-danger"> * </span>  </label>
                                                        <!-- <input type="text" name="customer_shipping_address" id="customer_shipping_address" value="{{ isset($userInfos['shipping_address']) ? $userInfos['shipping_address']: old('customer_shipping_address') }}" class="form-control" placeholder="কোম্পানি / দোকানের ঠিকানা"> -->
                                                        <!-- <input type="text" name="customer_shipping_address" id="customer_shipping_address" value="{{ auth()->user()->customerDetails ? auth()->user()->customerDetails->shipping_address:"" }}" class="form-control" placeholder="কোম্পানি / দোকানের ঠিকানা"> -->
                                                        <textarea name="customer_shipping_address" id="customer_shipping_address" class="form-control" placeholder="ঠিকানা" col="30" rows="5">{{ auth()->user()->customerDetails ? auth()->user()->customerDetails->shipping_address:"" }}</textarea>
                                                        @if($errors->has("customer_shipping_address"))
                                                        <span class="text-danger">{{ $errors->first('customer_shipping_address') }}</span>
                                                        @endif
                                                    </div>

                                                    {{--<div class="form-group col-lg-6 mb-3">
                                                        <label class="form-label" for="full-name"> বিলিং ঠিকানা <span class="text-danger"> * </span>  </label>
                                                        <!-- <input type="text" name="customer_billing_address" id="customer_billing_address" value="{{ auth()->user()->customerDetails ? auth()->user()->customerDetails->billing_address:"" }}" class="form-control" placeholder="কোম্পানি / দোকানের ঠিকানা"> -->
                                                        <textarea name="customer_billing_address" id="customer_billing_address" class="form-control" placeholder="বিলিং ঠিকানা" col="30" rows="5">{{ auth()->user()->customerDetails ? auth()->user()->customerDetails->billing_address:"" }}</textarea>
                                                        @if($errors->has("customer_billing_address"))
                                                        <span class="text-danger">{{ $errors->first('customer_billing_address') }}</span>
                                                        @endif
                                                    </div>--}}
                                                @endif
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <button id="login" type="submit" class="btn common-btn">
                                                            আপডেট
                                                            <img src="{{ asset('assets/images/shape1.png') }}" alt="Shape">
                                                            <img src="{{ asset('assets/images/shape2.png') }}" alt="Shape">
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">

                                    <h6 class="mb-2"> পাসওয়ার্ড পরিবর্তন করুন </h6>
                                    <div class="sep mb-3"> </div>


                                    @if(Session::has('changedPassworddMessage'))
                                    <div class="alert alert-info">
                                        <p class="text-center mb-0">{{ Session::get("changedPassworddMessage") }}</p>
                                    </div>
                                    @endif

                                    <div id="xlogin">
                                        <form action="{{ route('user.credentials.update') }}" method="POST">
                                            @csrf
                                            <div class="row">
                                                <div class="col-lg-6 mb-3">
                                                    <div class="form-group">
                                                        <label for="" class="font-weight-bold mb-2"> বর্তমান পাসওয়ার্ড </label>
                                                        <input type="password" class="form-control" name="current_password" id="current_password" placeholder="পাসওয়ার্ড" aria-label="password" aria-describedby="basic-addon6">
                                                        @if($errors->has("current_password"))
                                                        <span class="text-danger">{{ $errors->first('current_password') }}</span>
                                                        @endif

                                                        @if(Session::has('currentPassowrdNotMatch'))
                                                        <span class="text-danger">{{ Session::get('currentPassowrdNotMatch') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-3">
                                                    <div class="form-group">
                                                        <label for="" class="font-weight-bold mb-2"> নতুন পাসওয়ার্ড </label>
                                                        <input type="password" class="form-control" name="new_password" id="new_password" placeholder="নতুন পাসওয়ার্ড" aria-label="new password" aria-describedby="basic-addon6">
                                                        @if($errors->has("new_password"))
                                                        <span class="text-danger">{{ $errors->first('new_password') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-3">
                                                    <div class="form-group">
                                                        <label for="" class="font-weight-bold mb-2">কনফার্ম নতুন পাসওয়ার্ড </label>
                                                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="কনফার্ম নতুন পাসওয়ার্ড" aria-label="confirm password" aria-describedby="basic-addon6">
                                                        @if($errors->has("password_confirmation"))
                                                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <button id="login" type="submit" class="btn common-btn">
                                                            আপডেট
                                                            <img src="{{ asset('assets/images/shape1.png') }}" alt="Shape">
                                                            <img src="{{ asset('assets/images/shape2.png') }}" alt="Shape">
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                                <!-- common panel -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade modal-center popup-modal" id="customerInfoModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h2>কাস্টমারের তথ্য</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-2">
                <div class="card border-0">
                    <div class="card-body">
                        <h5><i class="fas fa-user"></i> কাস্টমার নাম</h5>
                        <p id="customerName">Buyer Killer</p>
                        <h5><i class="fas fa-phone"></i> কাস্টমার মোবাইল </h5>
                        <p itemprop="telephone"><a  id="customerPhone" href="tel:+123456890">234567890</a></p>
                        <h5><i class="fas fa-map-marker-alt"></i> ঠিকানা  </h5>
                        <p id="customerShippingAddress"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





@include('layouts.store-front.footer')
@include('layouts.partial._buy_request')




<div class="go-top">
    <i class='bx bxs-up-arrow-circle'></i>
    <i class='bx bxs-up-arrow-circle'></i>
</div>

<style>
    .prev_upload__img-close {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background-color: rgba(0, 0, 0, 0.5);
        position: absolute;
        top: 10px;
        right: 10px;
        text-align: center;
        line-height: 24px;
        z-index: 1;
        cursor: pointer;
    }

    .prev_upload__img-close:after {
        content: '\2716';
        font-size: 14px;
        color: white;
    }

    .prev_upload__img-wrap {
        display: flex;
        flex-wrap: wrap;
    }

    .prev_upload__img-box {
        width: 200px;
        padding: 0 10px;
        margin-right: 2px;
        border: 1px solid #dedede;
        margin-bottom: 12px;
    }
</style>


@push('js')
<script type="text/javascript">
    $(document).ready(function() {

        $("#pendingOrderRequests,#orderHistory,#purchaseHistory,#pendingPurchaseRequest").DataTable({
            responsive: true,
            pageLength: 5,
            paging: true,
            searching: true,
            order: [
                [0, "desc"]
            ],
            lengthChange: true,
            dom: 'lfrtip'
        })

        $("#productListsTable").DataTable({
            responsive: true,
            pageLength: 5,
            paging: true,
            searching: true,
            order: [
                [7, "desc"]
            ],
            lengthChange: true,
            dom: 'lfrtip'
        })
        
        let currentUrl = '{{ Request::segment(3) }}';

        $(document).on("click", ".nav-link", function(e) {
            e.preventDefault();

            $(".nav-link").removeClass("active");
            $(this).addClass("active");
        })
        
        if(currentUrl=="") {
            let customerType = '{{ Auth::user()->user_type ?? "" }}';
            if(customerType != "" && customerType=="seller") {
                $(".nav-link#v-pills-seller-dashboardb").tab('show');
            } else {
                $(".nav-link#v-pills-home-tab").tab('show');
            }
        }

        if (currentUrl == 'products') {
            $(".nav-link#v-pills-product-list").tab('show');
        }

        if(currentUrl=='orders') {
            $(".nav-link#v-pills-pending-orders-tab").tab('show');
        }

        if (currentUrl == 'info') {
            $(".nav-link#v-pills-profile-tab").tab('show');
        }

        if (currentUrl == 'credentials') {
            $(".nav-link#v-pills-settings-tab").tab('show');
        }

        if(currentUrl == 'purchases') {
            $(".nav-link#v-pills-purchase-history-tab").tab('show');
        }

        $('#category_id').change(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            var categoryID = $('#category_id').val();
            if (categoryID) {
                $.ajax({
                    url: "{{ route('category.attribute') }}",
                    method: "get",
                    data: {
                        category_id: categoryID,

                    },
                    success: function(data) {
                        $('#attribute-block').html();
                        $('#attribute-block').html(data);
                    }
                });
            }
        });


        $(document).on("click", '#product_submit', function(e) {
            e.preventDefault();

            var productData = new FormData(document.getElementById('add_product'));

            $.ajax({
                url: '{{ route("seller.product.add") }}',
                data: productData,
                processData: false,
                contentType: false,
                type: 'POST',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {

                    if (response.validationErr) {
                        $.each(response.messages, function(key, value) {
                            if (key == 'category_id') {
                                $("#" + key).next().next().html(value[0])
                                $("#" + key).next().next().removeClass('d-none')
                            } else {
                                $("#" + key).next().html(value[0])
                                $("#" + key).next().removeClass('d-none')
                            }
                        });
                    } else if (response.error) {
                        Swal.fire('Error', response.message, 'error')
                    } else {
                        Swal.fire('Congratulations', response.message, 'success').then((result) => {
                            var redirectUrl = '{{ route("customer.profile") }}' + '/products';
                            window.location.href = redirectUrl;

                        })
                    }
                }
            });
        });

        $(document).on('click', '.edit_product', function(e) {
            e.preventDefault();

            let productId = $(this).data('id')

            $.ajax({
                url: '{{ route("seller.product.retrieve.data") }}',
                type: 'POST',
                data: {
                    id: productId
                },
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    $(".nav-link#v-pills-add-product").tab('show');
                    var assetUrl = '{{ asset("images/uploads/products/") }}';
                    let html = '';
                    $.each(response, function(index, value) {
                        if (index == 'product_des' || index == 'additional_info') {
                            $("textarea[name=" + index + "]").val(value)
                        } else if (index == 'category_id') {
                            $("#category_id").val(value).trigger('change');
                            $('#category_id').niceSelect('update');
                        } else if (index == "quantity") {
                            $("input[name=product_quantity]").val(value)
                        } else {
                            $("input[name=" + index + "]").val(value)
                        }

                    });

                    $(".prev_upload__box").css("display","block")

                    $.each(response.prev_images, function(index, value) {
                        html = "<div class='prev_upload__img-box'><div style='background-image: url(" + assetUrl + '/' + value + ")' data-number='" + $(".prev_upload__img-close").length + "' data-file='" + value + "' class='img-bg'><div imageId='" + index + "' product_id='" + productId + "' class='prev_upload__img-close'></div></div></div>";
                        $(".prev_upload__img-wrap").append(html)
                    })

                    setTimeout(function() {
                        let inc = 0
                        $(".attribute_values").each(function() {
                            $(this).val(response.attribute_values[inc])
                            inc++

                        })
                    }, 500)


                }
            });


        });

        $(document).on("click", ".delete_product", function(event) {
            event.preventDefault();

            Swal.fire({
                title: 'Confirmation !',
                html: 'Do you want to delete the product',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Delete',
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {

                    let productId = $(this).attr('productid')

                    $.ajax({
                        url: '{{ route("seller.product.delete") }}',
                        type: 'POST',
                        data: {
                            id: productId
                        },
                        dataType: 'json',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {

                            if (response.error) {
                                Swal.fire("Error", response.message, 'error');
                            } else {

                                Swal.fire('Congratulations', response.message, 'success').then((result) => {
                                    var redirectUrl = '{{ route("customer.profile") }}' + '/products';
                                    window.location.href = redirectUrl;

                                })
                            }
                        }
                    });


                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
            })
        })

        $(document).on("click", ".addToCart", function(event) {
            event.preventDefault();
            var requestedProductId = $(this).attr('productId');
            $("#requested_product_id").val(requestedProductId)

            let customer = '{{ Auth::user()->id ?? "" }}';
            if (customer == 'undefined' || customer == '' || customer == 0) {
                Swal.fire("Error", "{{__('frontError.Please login to order the product')}}", "error")
                return false;
            }
            $("#requested_customer_id").val(customer)

            $.ajax({
                url: '{{ route("customer.info") }}',
                data: {
                    customer_id: customer,
                    product_id: requestedProductId
                },
                type: 'POST',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    console.log(response);
                    $("#order_request_form #customer_name").val(response.customer.name).prop('readonly', true);
                    $("#order_request_form #customer_phone").val(response.customer.mobile).prop('readonly', true);
                    $("#order_request_form #product_name").val(response.product.product_name).prop('readonly', true);
                    $("#order_request_form #product_category").val(response.product.product_category).prop('readonly', true);
                    $("#order_request_form #product_category_id").val(response.product.product_category_id).prop('readonly', true);
                    $("#order_request_form #per-caret-qty").text(response.product.min_order_quantity);
                    // $("#quantity").val(response.product.product_quantity);
                    $("#order_request_form #product_price").val(response.product.product_price).prop('readonly', true);

                }
            });


            $("#buyModal").modal("show");
        })

        $(document).on('click', '#submit_order_request', function(event) {
            event.preventDefault();
            var productData = new FormData(document.getElementById('order_request_form'));

            $.ajax({
                url: '{{ route("customer.product.order") }}',
                data: productData,
                processData: false,
                contentType: false,
                type: 'POST',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {

                    if (response.error) {
                        Swal.fire('Error', response.message, 'error')
                    } else {
                        $("#buyModal").modal("hide");
                        Swal.fire("{{__('frontError.Congratulations')}}", response.message, 'success').then((result) => {
                            location.reload();

                        });

                        // Swal.fire('Congratulations', response.message,'success').then((result) => {
                        //     var redirectUrl = '{{ route("customer.profile") }}'+'/orders';
                        //     window.location.href = redirectUrl;

                        // })
                    }
                }
            });
        })

        $(document).on('keyup', '#quantity', function(event){
            event.preventDefault();
            var qty = $(this).val();
            var per_caret = $("#per-caret-qty").text();
            var product_price = $("#buyModal #product_price").val();
            if(per_caret <=0 || qty <=0) {
                $("#total_price").text("0");
                return false;
            }
            var total_item = per_caret * qty;
            var total_price = total_item * product_price;
            $("#total_price").text(total_price);
        });

        $(document).on("click",".customer_details", function(event) {
            event.preventDefault();
            
            let customer_name = $(this).attr('customername');
            let customer_phone = $(this).attr('customerphone');
            let customer_shipping_address = $(this).attr('customerShippingAddress')
            var formattedAddress = customer_shipping_address.replace(/\n/g, '<br>');
            $("#customerName").text(customer_name)
            $("#customerPhone").attr("href","tel:"+customer_phone)
            $("#customerPhone").text(customer_phone)
            $("#customerShippingAddress").html(formattedAddress)

            $("#customerInfoModal").modal("show")

        })

        $(document).on("click", ".submit_update_price", function(event) {
            event.preventDefault();

            let orderTableId = $(this).attr('orders_table_id');
            let customer_name = $(this).attr('customername');
            let customer_phone = $(this).attr('customerphone');
            let updated_price = $(this).prev("#finalPrice").val();
            let updating_product_id = $(this).attr("updating_product_id");
            if (orderTableId == '' || orderTableId === 'undefined') {
                Swal.fire("Error", "Order details(ID) Not found, please try once again.", "error")
                return false;
            }

            if (updated_price == '' || updated_price == '0' || updated_price < 0) {
                Swal.fire('Error', "{{__('frontError.Please provide valid price value')}}", 'error')
                return false;
            }

            Swal.fire({
                title: 'Confirmation !',
                html:'Do you want to update the price',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route("seller.orders.price.update") }}',
                        data: {
                            orders_table_id: orderTableId,
                            updated_price: updated_price,
                            updating_product_id: updating_product_id,
                            customer_name:customer_name

                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            if (response.error) {
                                Swal.fire('Error', response.message, 'error')
                            } else {
                                $("#buyModal").modal("hide");
                                Swal.fire('Success', response.message, 'success').then((result) => {
                                    window.location.href = '{{ route("customer.profile",["parameters"=>"orders"]) }}';
                                });
                            }
                        }
                    })
                }
            })

        })


        $(document).on("click", ".confirm_order,.cancel_order", function(event) {
            event.preventDefault();

            let orderTableId = $(this).attr('order_table_id');
            let updating_product_id = $(this).attr("updating_product_id");
            let actionType = '';
            let popupMessage = '';

            if ($(this).hasClass('confirm_order')) {
                actionType = "confirm";
                popupMessage = "{{__('frontError.Have you delivered the product?')}}";
            }
            if ($(this).hasClass('cancel_order')) {
                actionType = "cancel";
                popupMessage = "{{__('frontError.Are you sure you want to cancel the order?')}}";
            }


            if (orderTableId == '' || orderTableId === 'undefined') {
                Swal.fire("Error", "Order details (ID) Not found, please try once again.", "error")
                return false;
            }

            if (actionType == '') {
                Swal.fire('Error', 'Please Choose an Action', 'error')
                return false;
            }

            Swal.fire({
                title: 'Confirmation !',
                html: popupMessage,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: '{{ route("seller.order.confirm.cancel") }}',
                        data: {
                            orders_table_id: orderTableId,
                            action_type: actionType,
                            updating_product_id: updating_product_id
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            if (response.error) {
                                Swal.fire('Error', response.message, 'error')
                            } else {
                                $("#buyModal").modal("hide");
                                Swal.fire('Success', response.message, 'success').then((result) => {
                                    window.location.href = '{{ route("customer.profile",["parameters"=>"orders"]) }}';
                                });
                            }
                        }
                    })
                }
            })

        })

        $(document).on('click', '.prev_upload__img-close', function(e) {
            e.preventDefault()

            Swal.fire({
                title: 'Confirmation !',
                html: "{{__('frontError.Are you sure? it will remove the image from the record')}}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
            }).then((result) => {
                if (result.isConfirmed) {
                    let imageid = $(this).attr('imageId')
                    let product_id = $(this).attr('product_id')
                    $.ajax({
                        context: this,
                        type: 'POST',
                        url: '{{ route("product.image.erase") }}',
                        data: {
                            imageid: imageid,
                            product_id: product_id
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },

                        success: function(response) {
                            if (!response.error) {
                                $(this).parent().parent().remove()
                                $.toast({
                                    heading: 'Success',
                                    text: response.message,
                                    showHideTransition: 'slide',
                                    icon: 'success',
                                    position: 'bottom-right'
                                })
                            } else {
                                $.toast({
                                    heading: 'Error',
                                    text: response.message,
                                    showHideTransition: 'fade',
                                    icon: 'error'
                                })
                            }
                        }

                    })
                }
            })

        })

        $('#v-pills-add-product').on('hide.bs.tab', function(e) {
            $('.prev_upload__img-wrap').html('');
            $("#add_product").trigger('reset')
            $("#category_id").val('').trigger('change')
            $('#category_id').niceSelect('update');
            $("#attribute-block").html('')
        })
    });

        jQuery(document).ready(function() {
            ImgUpload();
        });


        function ImgUpload() {
            var imgWrap = "";
            var imgArray = [];

            $('.upload__inputfile').each(function() {
                $(this).on('change', function(e) {
                    imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
                    var maxLength = $(this).attr('data-max_length');

                    var files = e.target.files;
                    var filesArr = Array.prototype.slice.call(files);
                    console.log(filesArr)
                    var iterator = 0;
                    filesArr.forEach(function(f, index) {

                        if(f.size > 2048000) {
                            $.toast({
                                    heading: 'Error',
                                    text: "{{__('frontError.Sorry maximum allowed size is 2MB')}}",
                                    showHideTransition: 'fade',
                                    icon: 'error'
                                })
                                return false
                        }

                        if (!f.type.match('image.*')) {
                            return;
                        }

                        if (imgArray.length > maxLength) {
                            $.toast({
                                    heading: 'Error',
                                    text: "You Can not add more than "+maxLength+" images",
                                    showHideTransition: 'fade',
                                    icon: 'error'
                                })
                            return false
                        } else {
                            var len = 0;
                            for (var i = 0; i < imgArray.length; i++) {
                                console.log(imgArray[i].size)
                                if (imgArray[i] !== undefined) {
                                    len++;
                                }
                            }
                            if (len > maxLength) {
                                return false;
                            } else {
                                imgArray.push(f);

                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    var html = "<div class='upload__img-box'><div style='background-image: url(" + e.target.result + ")' data-number='" + $(".upload__img-close").length + "' data-file='" + f.name + "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                                    imgWrap.append(html);
                                    iterator++;
                                }
                                reader.readAsDataURL(f);
                            }
                        }
                    });
                });
            });

            $('body').on('click', ".upload__img-close", function(e) {
                var file = $(this).parent().data("file");
                for (var i = 0; i < imgArray.length; i++) {
                    if (imgArray[i].name === file) {
                        imgArray.splice(i, 1);
                        break;
                    }
                }
                $(this).parent().parent().remove();
            });
        }
</script>
@endpush

@endsection