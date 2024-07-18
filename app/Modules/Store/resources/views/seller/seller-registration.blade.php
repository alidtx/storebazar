@extends('layouts.store-front.master')
@section('content')
@include('layouts.store-front.header-bar')
@include('layouts.store-front.navbar')


<div class="wrapper">
    <div class="page-title-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="title-content">
                        <h2>Be a Seller</h2>
                        <ul>
                            <li>
                                <a href="{{route('home')}}">Home</a>
                            </li>

                            <li>
                                <span>Be a Seller</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="title-img">
            <img src="{{ asset('assets/images/cart-banner.svg') }}" alt="About">
        </div>
    </div>
    <div class="add_product pt-5 pb-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">

                    <div class="card">
                        <div class="card-body p-4">
                            <div class="section-title mb-2">
                                <h2>Seller Information</h2>
                                <p class="mb-2">
                                    Please Fillup the form below
                                </p>
                            </div>

                            <hr>

                            <form action="{{route('seller.store')}}" id="sellerRegForm" method="post" class="form-horizontal">
                                @csrf
                                <div class="checkout-billing row">
                                    <div class="form-group col-lg-6 mb-3">
                                        <label class="form-label" for="full-name"> {{__('frontError.fullname')}} <span class="text-danger"> * </span> </label>
                                        <input type="text" name="name" class="form-control" placeholder="{{__('frontError.fullname')}} *" value="{{auth()->user()->name ?? ''}}">
                                    </div>
                                    <div class="form-group col-lg-6 mb-3">
                                        <label class="form-label" for="full-name"> {{__("frontError.email")}} <span class="text-danger"> * </span> </label>
                                        <input type="email" name="email" class="form-control" placeholder="{{__("frontError.email")}}" value="{{auth()->user()->email ?? ''}}">
                                    </div>
                                    <div class="form-group col-lg-6 mb-3">
                                        <label class="form-label" for="full-name"> {{__("frontError.mobile")}} <span class="text-danger"> * </span> </label>
                                        <input type="text" name="mobile" class="form-control" placeholder="{{__("frontError.mobile")}} *" value="{{auth()->user()->mobile ?? ''}}">
                                    </div>
                                    <div class="form-group col-lg-6 mb-3">
                                        <label class="form-label" for="full-name"> {{__("frontError.shopname")}} <span class="text-danger"> * </span> </label>
                                        <input type="text" name="shop_name" class="form-control" placeholder="{{__("frontError.shopname")}}">
                                    </div>

                                    <div class="form-group col-lg-6 mb-3">
                                        <label class="form-label" for="area">  {{__("frontError.area")}} <span class="text-danger"> * </span> </label>
                                        <select name="area" id="area">
                                            <option value="">{{__("frontError.areaselect")}}</option>
                                            @foreach($areas as $key => $area)
                                                <option value="{{ $key }}">{{ $area }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group col-lg-6 mb-3">
                                        <label class="form-label" for="full-name"> {{__("frontError.shopaddr")}}<span class="text-danger"> * </span> </label>
                                        <input type="text" name="shop_address" class="form-control" placeholder="{{__("frontError.shopaddr")}}">
                                    </div>

                                    <div class="form-group col-lg-6 mb-3">
                                        <label class="form-label" for="full-name"> {{__("frontError.tradelicense")}}<span class="text-danger"> * </span> </label>
                                        <input type="file" name="trade_license" class="form-control" placeholder="{{__("frontError.tradelicense")}} *">

                                    </div>
                                    

                                    <div class="form-group col-lg-6 mb-3">
                                        <label class="form-label" for="full-name"> {{__("frontError.tin")}}<span class="text-danger"> * </span> </label>
                                        <input type="text" name="tin_num" class="form-control" placeholder="{{__("frontError.tin")}}*">
                                    </div>

                                    @guest
                                    <div class="form-group col-lg-6 mb-3">
                                        <label class="form-label" for="full-name"> {{__("frontError.passwords")}} <span class="text-danger"> * </span> </label>
                                        <input type="password" name="password" class="form-control" placeholder="{{__("frontError.passwords")}} *">
                                    </div>

                                    <div class="form-group col-lg-6 mb-3">
                                        <label class="form-label" for="full-name"> {{__("frontError.conf_passwords")}} <span class="text-danger"> * </span> </label>
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="{{__("frontError.conf_passwords")}} *">
                                    </div>
                                    @endguest

                                    <!-- <div class="form-group col-lg-6">
                                                <select style="display: none;" class="mb-0">
                                                    <option>জেলা*</option>
                                                    <option>Dhaka </option>
                                                    <option> Chittagong </option>
                                                    <option>Baarisal</option>
                                                </select> 
                                            </div> -->
                                    <!-- <div class="form-group col-lg-6">
                                                <select style="display: none;" class="mb-0">
                                                    <option>এলাকা</option>
                                                    <option>Mohammadpur</option>
                                                    <option>Dhanmondi</option>
                                                    <option>Banasree</option>
                                                </select> 
                                            </div> -->

                                    <div class="form-group mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="1" id="sellerAgreement" name="sellerAgreement">
                                            <label class="form-check-label" for="sellerAgreement">
                                                {{__("frontError.agreement")}}
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group col-lg-12 d-grid">
                                        <button type="submit" id="selle-register" class="btn common-btn">
                                            {{__("frontError.submit")}}
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
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

{{-- @include('layouts.partial._js') --}}
@push('js')
@include('layouts.partial._ajax_form_submit')

<script>
    $("#sellerRegForm").submit(function(e) {
        e.preventDefault();
        formPost('sellerRegForm', 'selle-register', '{{ route("seller.store") }}', '{{ route("home") }}')
    });
</script>
@endpush

@endsection