@extends('layouts.store-front.master')
@section('content')
@include('layouts.store-front.header-bar')
@include('layouts.store-front.navbar')

<style>
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
</style>

<div class="wrapper">
    <div class="page-title-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="title-content">
                        <h2>পণ্যসমূহ</h2>
                        <ul>
                            <li>
                                <a href="{{route('home')}}">হোম</a>
                            </li>
                            <li>
                                <span>পণ্যসমূহ</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="title-img">
            <img src="{{ asset('assets/images/honey1.png') }}" alt="About">
        </div>
    </div>

    @include('layouts.store-front.layered-navigation')
</div>

@include('layouts.store-front.footer')
@include('layouts.partial._buy_request')

<div class="modal fade modal-right popup-modal" id="exampleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Shopping Cart <span>02 Items</span></h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="cart-table">
                    <table class="table mb-3">
                        <tbody>
                            <tr>
                                <th scope="row">
                                    <img src="{{ asset('assets/images/black-seed-honey.png') }}" alt="Cart">
                                </th>
                                <td>
                                    <h3>কালিজিরা মধু (১০০ গ্রাম)</h3>
                                    <span class="rate">৳ 200.00 x 1</span>
                                </td>
                                <td class="cart-details">
                                    <ul class="number">
                                        <li>
                                            <span class="minus">-</span>
                                            <input type="text" value="1" />
                                            <span class="plus">+</span>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <a class="close" href="#">
                                        <i class='bx bx-x'></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <img src="{{ asset('assets/images/litchi-flower-honey.png') }}" alt="Cart">
                                </th>
                                <td>
                                    <h3>সুন্দরবনের প্রাকৃতিক মধু ( ১০০ গ্রাম )</h3>
                                    <span class="rate">৳ 180.00 x 1</span>
                                </td>
                                <td class="cart-details">
                                    <ul class="number">
                                        <li>
                                            <span class="minus">-</span>
                                            <input type="text" value="1" />
                                            <span class="plus">+</span>
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <a class="close" href="#">
                                        <i class='bx bx-x'></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="total-amount mb-1">
                        <h3>Total: <span>৳ 380.00 BDT</span></h3>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a type="submit" class="btn common-btn btn-outline col-lg-3" href="cart.html">
                    View Cart
                    <img src="{{ asset('assets/images/shape1.png') }}" alt="Shape">
                    <img src="{{ asset('assets/images/shape2.png') }}" alt="Shape">
                </a>
                <a type="submit" class="btn common-btn col-lg-9" href="checkout.html">
                    Proceed To Checkout
                    <img src="{{ asset('assets/images/shape1.png') }}" alt="Shape">
                    <img src="{{ asset('assets/images/shape2.png') }}" alt="Shape">
                </a>
            </div>
        </div>
    </div>
</div>


<div class="modal fade modal-right popup-modal add-to-cart-modal" id="addCartModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2>পণ্য কার্টে সফলভাবে যোগ হয়েছে </h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="cart-table">
                    <table class="table mb-0 p-0">
                        <tbody>
                            <tr>
                                <th>
                                    <img src="{{ asset('assets/images/litchi-flower-honey.png') }}" alt="Cart">
                                </th>
                                <td>
                                    <h3>লিচু মধু ( ১০০ গ্রাম )</h3>
                                    <span class="rate">৳ ১০০০ x 1</span>
                                </td>
                                <td>
                                    <a class="common-btn btn-outline py-2 px-3 w-100 text-center" href="cart.html">
                                        কার্ট দেখুন
                                        <img src="{{ asset('assets/images/shape1.png') }}" alt="Shape">
                                        <img src="{{ asset('assets/images/shape2.png') }}" alt="Shape">
                                    </a>
                                </td>
                                <td>
                                    <a class="common-btn py-2 px-3 w-100 text-center" href="checkout.html">
                                        চেকআউট
                                        <img src="{{ asset('assets/images/shape1.png') }}" alt="Shape">
                                        <img src="{{ asset('assets/images/shape2.png') }}" alt="Shape">
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="go-top">
    <i class='bx bxs-up-arrow-circle'></i>
    <i class='bx bxs-up-arrow-circle'></i>
</div>


@endsection