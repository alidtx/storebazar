@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Order Details'])
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Order Details</h6>
                </div>
                <div class="card-body pt-0 pb-2">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card my-5 shadow-none">
                                <div class="card-header p-3 pb-0 pt-0">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <p class="text-lg mb-0">
                                            Order no. <b>#{{$details->id}}</b>
                                            </p>
                                        </div>
                                    </div>
                                </div><br>
                                <div class="card-body p-3 pt-0">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <h6 class="mb-3 mt-4">Billing Information</h6>
                                            <ul class="list-group">
                                            <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                                <div class="d-flex flex-column">
                                                    <h6 class="mb-3 text-sm">{{ $buyer->name }}</h6>
                                                    <span class="mb-2 text-xs">Mobile: <span class="text-dark ms-2 font-weight-bold">{{$buyer->mobile}}</span></span>
                                                    <span class="mb-2 text-xs">Email Address: <span class="text-dark ms-2 font-weight-bold">{{$buyer->email}}</span></span>
                                                    {{--<span class="mb-2 text-xs">Billing Address: <span class="text-dark font-weight-bold ms-2">{{ $buyer->customerDetails->billing_address ?? "N/A" }}</span></span>--}}
                                                    <span class="text-xs">Address: <span class="text-dark ms-2 font-weight-bold">{{ $details->shipping_address ?? "N/A" }}</span></span>
                                                </div>
                                            </li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <h6 class="mb-3 mt-4">Seller Information</h6>
                                            <ul class="list-group">
                                            <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                                <div class="d-flex flex-column">
                                                    <h6 class="mb-3 text-sm">{{ $seller->name }}</h6>
                                                    <span class="mb-2 text-xs">Mobile: <span class="text-dark ms-2 font-weight-bold">{{$seller->mobile}}</span></span>
                                                    <span class="mb-2 text-xs">Email Address: <span class="text-dark ms-2 font-weight-bold">{{$seller->email}}</span></span>
                                                    <span class="mb-2 text-xs">Shop Name: <span class="text-dark font-weight-bold ms-2">{{ $seller->sellerDetails->shop_name ?? "N/A" }}</span></span>
                                                    <span class="mb-2 text-xs">Shop Address: <span class="text-dark ms-2 font-weight-bold">{{ $seller->sellerDetails->shop_address ?? "N/A" }}</span></span>
                                                    <span class="text-xs">Shop Area: <span class="text-dark ms-2 font-weight-bold">{{ $area_list[$seller->sellerDetails->area] ?? "N/A" }}</span></span>
                                                </div>
                                            </li>
                                            </ul>
                                        </div>
                                        
                                    </div><br><br>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="d-flex">
                                                <div>
                                                    <img src="{{$product->productImages[0]->image_path ?? asset('assets/images/demoProduct.jpg')}}" class="avatar avatar-xxl me-3" alt="product image">
                                                </div>
                                                <div>
                                                    <h6 class="text-lg mb-0 mt-2">{{$details->orderItems[0]->product_name ?? "N/A" }}</h6>
                                                    <p class="text-sm mb-3">Order was requested at {{date("j M, Y",strtotime($details->created_at))}}</p>
                                                    <span class="badge badge-sm bg-gradient-success">{{ucfirst($details->order_status)}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <h6 class="mb-3">Order Summary</h6>
                                            <div class="d-flex justify-content-between">
                                                <span class="mb-2 text-sm">
                                                Order Status:
                                                </span>
                                                @if($details->order_status=="pending")
                                                <span class="text-danger ms-2 font-weight-bold">{{ucfirst($details->order_status)}}</span>
                                                @elseif($details->order_status=="delivered")
                                                <span class="text-success ms-2 font-weight-bold">{{ucfirst($details->order_status)}}</span>
                                                @else
                                                <span class="text-warning ms-2 font-weight-bold">{{ucfirst($details->order_status)}}</span>
                                                @endif
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <span class="mb-2 text-sm">
                                                Product Price:
                                                </span>
                                                <span class="text-dark font-weight-bold ms-2">{{$product->price ?? 0}}tk</span>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <span class="mb-2 text-sm">
                                                Products Per Crate:
                                                </span>
                                                <span class="text-dark ms-2 font-weight-bold">{{$product->min_order_quantity ?? 'N/A'}}</span>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <span class="mb-2 text-sm">
                                                Crate Quantity:
                                                </span>
                                                <span class="text-dark ms-2 font-weight-bold">{{$details->orderItems[0]->qty}}</span>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <span class="mb-2 text-sm">
                                                Total Price:
                                                </span>
                                                <span class="text-dark ms-2 font-weight-bold">{{$details->orderItems[0]->unit_price ?? 0}}tk</span>
                                            </div>
                                            <div class="d-flex justify-content-between">
                                                <span class="mb-2 text-sm">
                                                Bidding Price:
                                                </span>
                                                <span class="text-dark ms-2 font-weight-bold">{{($details->bidding_price=="" || $details->bidding_price=="0") ? "N/A":$details->bidding_price.'tk'}}</span>
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-between">
                                                <span class="mb-2 text-lg">
                                                Final Price:
                                                </span>
                                                <span class="text-dark text-lg ms-2 font-weight-bold">{{($details->updated_price=="" || $details->updated_price=="0") ? "N/A": $details->updated_price."tk"}}</span>
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footers.auth.footer')
</div>

<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>



<script>
    $(document).ready(function() {



    })
</script>


@endsection