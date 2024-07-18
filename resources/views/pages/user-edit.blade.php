@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Update User'])
<div class="row mt-4 mx-4">
    <div class="col-12">

        <div class="card mb-4">
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form role="form" method="POST" action="{{ route('user.update') }}" id="userUpdate" enctype="multipart/form-data">
                                @csrf
                                <div class="card-header pb-0">
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0">User Update <span class="badge badge-sm bg-gradient-success">{{ ucfirst($type) ?? "Admin" }}</span></p>
                                        <button type="submit" id="user-update" class="btn btn-primary btn-sm ms-auto">Save</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="text-uppercase text-sm">User Information</p>
                                    <div class="row">
                                        <input id="user_id" class="form-control" type="hidden" name="user_id" value="{{$user->id}}">
                                        <input id="user_id" class="form-control" type="hidden" name="child_type" value="{{$type}}">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Name</label>
                                                <input id="name" class="form-control" type="text" name="name" value="{{$user->name ?? 'N/A'}}">
                                                @error("name")
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Mobile</label>
                                                <input id="mobile" class="form-control" type="number" name="mobile" value="{{$user->mobile ?? 'N/A'}}">
                                                @error("mobile")
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Email</label>
                                                <input id="email" class="form-control" type="email" name="email" value="{{$user->email ?? 'N/A'}}">
                                                @error("email")
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        @if($type=="seller" && $user->sellerDetails)
                                        <hr class="horizontal dark">
                                        <p class="text-uppercase text-sm">Seller Management</p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Shop name</label>
                                                    <input id="shop_name" class="form-control" type="text" name="shop_name" value="{{$user->sellerDetails->shop_name ?? 'N/A'}}">
                                                    @error("shop_name")
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Shop Address</label>
                                                    <input id="shop_address" class="form-control" type="text" name="shop_address" value="{{old('shop_address',$user->sellerDetails->shop_address)}}">
                                                    @error("shop_address")
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Shop Area</label>
                                                    <select name="area" id="area" class="form-control">
                                                        <option value="">Select Area</option>
                                                        @foreach($areas as $key => $area)
                                                        <option value="{{ $key }}" @if($key==$user->sellerDetails->area) {{'selected'}} @endif>{{ $area }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error("area")
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">TIN No.</label>
                                                    <input id="tin_num" class="form-control" type="text" name="tin_num" value="{{$user->sellerDetails->tin_num ?? 'N/A'}}">
                                                    @error("tin_num")
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label mb-2">Trade License</label>
                                                    <div class="ps-2 tradeLicenseDiv">
                                                        @if($user->sellerDetails && $user->sellerDetails->trade_license!=NULL)
                                                        <a href="{{asset($user->sellerDetails->trade_license)}}" title="Click to see" target="_BLANK"><i class="fas fa-image text-muted" style="font-size:45px"></i></a>
                                                        @else
                                                        <span style="font-size: 16px;">N/A</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Status</label>
                                                    <select name="status" id="status" class="form-control status">
                                                        <option value="">Select</option>
                                                        <option value="pending" @if($user->sellerDetails->status=="pending") {{'selected'}} @endif>Pending</option>
                                                        <option value="approved" @if($user->sellerDetails->status=="approved") {{'selected'}} @endif>Approved</option>
                                                        <option value="rejected" @if($user->sellerDetails->status=="rejected") {{'selected'}} @endif>Rejected</option>
                                                        <option value="hold" @if($user->sellerDetails->status=="hold") {{'selected'}} @endif>Hold</option>
                                                    </select>
                                                    @error("tin_num")
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            {{--<div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Trade License</label>
                                                    <input type="file" name="trade_license" class="form-control" placeholder="Trade License *">
                                                    @error("trade_license")
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>--}}
                                        </div>
                                        @endif
                                        
                                        @if($type=="customer" && $user->customerDetails)
                                        <hr class="horizontal dark">
                                        <p class="text-uppercase text-sm">Customer Management</p>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="example-text-input" class="form-control-label">Status</label>
                                                    <select name="customer_status" id="customer_status" class="form-control customer_status">
                                                        <option value="">Select</option>
                                                        <option value="pending" @if($user->customerDetails->status=="pending") {{'selected'}} @endif>Pending</option>
                                                        <option value="approved" @if($user->customerDetails->status=="approved") {{'selected'}} @endif>Approved</option>
                                                        <option value="rejected" @if($user->customerDetails->status=="rejected") {{'selected'}} @endif>Rejected</option>
                                                        <option value="hold" @if($user->customerDetails->status=="hold") {{'selected'}} @endif>Hold</option>
                                                    </select>
                                                    @error("customer_status")
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-6 mb-3">
                                                <label class="form-label" for="full-name"> Address </label>
                                                <!-- <input type="text" name="shipping_address" id="shipping_address" value="{{ isset($user->customerDetails->shipping_address) ? $user->customerDetails->shipping_address: old('customer_shipping_address') }}" class="form-control" placeholder="ঠিকানা"> -->
                                                <textarea name="shipping_address" id="shipping_address" value="{{ isset($user->customerDetails->shipping_address) ? $user->customerDetails->shipping_address: old('customer_shipping_address') }}" class="form-control" placeholder="ঠিকানা" col="30" rows="2">{{ isset($user->customerDetails->shipping_address) ? $user->customerDetails->shipping_address: old('customer_shipping_address') }}</textarea>
                                                @if($errors->has("shipping_address"))
                                                <span class="text-danger">{{ $errors->first('shipping_address') }}</span>
                                                @endif
                                            </div>

                                            {{--<div class="form-group col-lg-6 mb-3">
                                                <label class="form-label" for="full-name"> Billing Address </label>
                                                <input type="text" name="billing_address" id="billing_address" value="{{ isset($user->customerDetails->billing_address) ? $user->customerDetails->billing_address : old('billing_address') }}" class="form-control" placeholder="ঠিকানা">
                                                @if($errors->has("billing_address"))
                                                <span class="text-danger">{{ $errors->first('billing_address') }}</span>
                                                @endif
                                            </div>--}}
                                        </div>
                                        @endif
                                        

                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                @include('layouts.footers.auth.footer')
            </div>

        </div>
    </div>


</div>
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

@include('layouts.partial._ajax_form_submit')

<script>
    $(document).ready(function() {

    })
</script>

@endsection