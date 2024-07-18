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
                        <h2>{{ $product_info['product_name'] ?? "" }}</h2>
                        <ul>
                            <li>
                                <a href="{{route('store.catalog','honey')}}">মধু</a>
                            </li>
                            <li>
                                <span>{{ $product_info['product_name'] ?? "" }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="title-img">
            <img src="{{ asset('assets/images/honey-banner.svg') }}" alt="About">
        </div>
    </div>


    <div class="product-details-area ptb-100">
        <div class="container">
            <div class="top">
                <div class="row align-items-center">
                    <div class="col-lg-8">
                        <div class="outer">
                            <div class="row">
                                <div class="col-sm-3 col-lg-3">
                                    <div class="owl-thumbs owl-theme" data-slider-id="1">
                                        @if(isset($product_info['prev_images']) && !empty($product_info['prev_images']))
                                        @php $stopAt=0; @endphp
                                        @foreach($product_info['prev_images'] as $productImages)
                                        @if($stopAt==3)
                                            @continue
                                        @endif
                                        @php 
                                            $productImg = asset($productImages); 
                                        @endphp

                                        <div class="item owl-thumb-item">
                                            <div class="top-img">
                                                <img src="{{ $productImg }}" alt="Product">
                                            </div>
                                        </div>
                                        @php $stopAt++; @endphp
                                        @endforeach
                                        @else

                                        <div class="item owl-thumb-item">
                                            <div class="top-img">
                                                <img src="{{ asset('assets/images/demoProduct.jpg') }}" alt="Product">
                                            </div>
                                        </div>

                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-9 col-lg-9">
                                    <div class="image-slides owl-carousel owl-theme" data-slider-id="1">
                                        @if(isset($product_info['prev_images']) && !empty($product_info['prev_images']))
                                        @foreach($product_info['prev_images'] as $productImages)
                                            <div class="item">
                                                <div class="top-img">
                                                    @php $productImg = asset($productImages); @endphp
                                                    <img style="width: 620px!important; height: 620px !important" src="{{ $productImg }}" alt="Product">
                                                </div>
                                            </div>
                                        @endforeach
                                        @else
                                        <div class="item">
                                            <div class="top-img">
                                                <img style="width: 620px!important; height: 620px !important" src="{{ asset('assets/images/demoProduct.jpg') }}" alt="Product">
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="top-content">
                            <h2>{{ $product_info['product_name'] ?? ""}}</h2>

                            <h3> ৳ {{ $product_info['product_price'] ?? "0" }} </h3>

                            <p>{{ $product_info['product_des'] ?? "N/A" }}</p>
                            <ul class="tag">
                                <li>SKU: <span>{{ $product_info['product_sku'] }}</span></li>
                                <li>Category: <span>{{ $product_info['category'] }}</span></li>
                                <li>বিক্রেতা: <span>{{ $product_info['shop_name'] ?? "N/A"  }}</span></li>
                                <!-- <li>Tag: <span>মধু</span></li> -->
                                <li>Status: <span class="text-success">@if(isset($product_info['quantity']) && $product_info['quantity'] > 0) {{ 'In Stock' }} @else {{ 'out of Stock' }} @endif</span> </li>
                            </ul>

                            @if(isset($product_info['quantity']) && $product_info['quantity'] > 0)
                            <a class="common-btn ml-0 addToCart" href="#" productId='{{ $product_info["product_table_id"] }}'>
                                ক্রয় অনুরোধ
                                <img src="{{ asset('assets/images/shape1.png') }}" alt="Shape">
                                <img src="{{ asset('assets/images/shape2.png') }}" alt="Shape">
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>



            <div class="bottom">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">মেটেরিয়াল ইনফরমেশন</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">অতিরিক্ত তথ্য</a>
                    </li>
                    <li class="nav-item" role="presentation">
                </ul>

                <div class="card border-0">
                    <div class="card-body p-5">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div class="bottom-description">
                                    <div class="row">
                                    @if(isset($product_info['attribute_values']) && !empty($product_info['attribute_values']))
                                    @foreach($product_info['attribute_values'] as $attrLabel => $attrVal)
                                        <div class="col-lg-3 mb-3">
                                            <label for="" class="mb-2"> {{ $attrLabel }} </label>
                                            <h6> {{ $attrVal }} </h6>
                                        </div>
                                    @endforeach 
                                    @endif
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div class="bottom-description">
                                    <p>{{ $product_info['additional_info'] ?? "N/A"  }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@include('layouts.store-front.footer')



<div class="modal fade modal-right popup-modal" id="exampleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Shopping Cart <span>02 Items</span></h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="cart-table">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">
                                    <img src="{{ asset('assets/images/cart/cart1.png') }}" alt="Cart">
                                </th>
                                <td>
                                    <h3>White Comfy Stool</h3>
                                    <span class="rate">$200.00 x 1</span>
                                </td>
                                <td>
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
                                    <img src="{{ asset('assets/images/cart/cart2.png') }}" alt="Cart">
                                </th>
                                <td>
                                    <h3>Yellow Armchair</h3>
                                    <span class="rate">$180.00 x 1</span>
                                </td>
                                <td>
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
                    <div class="total-amount">
                        <h3>Total: <span>$380.00</span></h3>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <form>
                    <input type="text" class="form-control" placeholder="Enter Coupon Code">
                    <button type="submit" class="btn common-btn">
                        Proceed To Checkout
                        <img src="{{ asset('assets/images/shape1.png') }}" alt="Shape">
                        <img src="{{ asset('assets/images/shape2.png') }}" alt="Shape">
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

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


<div class="modal fade modal-right popup-modal wishlist-modal" id="exampleModalWishlist" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Wishlist <span>02 Items</span></h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="cart-table">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">
                                    <img src="{{ asset('assets/images/cart/cart1.png') }}" alt="Cart">
                                </th>
                                <td>
                                    <h3>White Comfy Stool</h3>
                                    <span class="rate">৳200.00 x 1</span>
                                </td>
                                <td>
                                    <a class="common-btn" href="shop.html">
                                        Add To Cart
                                        <img src="{{ asset('assets/images/shape1.png') }}" alt="Shape">
                                        <img src="{{ asset('assets/images/shape2.png') }}" alt="Shape">
                                    </a>
                                </td>
                                <td>
                                    <a class="close" href="#">
                                        <i class='bx bx-x'></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <img src="{{ asset('assets/images/cart/cart2.png') }}" alt="Cart">
                                </th>
                                <td>
                                    <h3>Yellow Armchair</h3>
                                    <span class="rate">৳180.00 x 1</span>
                                </td>
                                <td>
                                    <a class="common-btn" href="shop.html">
                                        Add To Cart
                                        <img src="{{ asset('assets/images/shape1.png') }}" alt="Shape">
                                        <img src="{{ asset('assets/images/shape2.png') }}" alt="Shape">
                                    </a>
                                </td>
                                <td>
                                    <a class="close" href="#">
                                        <i class='bx bx-x'></i>
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

@push('js')
<script>
    $(document).ready(function(){
        $(document).on("click",".addToCart", function(event) {
            event.preventDefault();
            var requestedProductId = $(this).attr('productId');
            $("#requested_product_id").val(requestedProductId)
            
            let customer = '{{ auth()->user()->id ?? "" }}';
            let isUser = '{{ auth()->user() }}';
            let isUserAdmin = '{{ auth()->user()->user_type ?? "" }}';
            let sellerIsCustomer = '{{ auth()->user() != null ? auth()->user()->customerDetails()->exists(): false }}';
            
            if (customer == 'undefined' || customer == '' || customer == 0) {
                Swal.fire("","{{__('frontError.Please login to order the product')}}").then((result) => {
                    $("#loginModal").modal('show')
                });

                return false;
            }

            $("#requested_customer_id").val(customer)

            $.ajax({
                url: '{{ route("customer.info") }}',
                data: {customer_id:customer,product_id:requestedProductId},
                type: 'POST',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response){
                    if(response.error) {
                        if(response.authError) {
                            Swal.fire("", response.message).then((result) => {
                                if(result.isConfirmed) {
                                    $("#loginModal").modal('show')
                                }
                            });
                        } else {

                            Swal.fire("Error", response.message, "error")
                        }
                        return false;
                    } else {
                        $("#order_request_form #customer_name").val(response.customer.name).prop('readonly', true);
                        $("#order_request_form #customer_phone").val(response.customer.mobile).prop('readonly', true);
                        $("#order_request_form #order_delivery_address").val(response.customer.shipping_address);
                        $("#order_request_form #product_name").val(response.product.product_name).prop('readonly', true);
                        $("#order_request_form #product_category").val(response.product.product_category).prop('readonly', true);
                        $("#order_request_form #product_category_id").val(response.product.product_category_id).prop('readonly', true);
                        $("#order_request_form #per-caret-qty").text(response.product.min_order_quantity);
                        $("#product_price").val(response.product.product_price).prop('readonly', true);
                        $("#buyModal").modal("show");
                    }
                }
            });

            
        })

        $(document).on('click','#submit_order_request',function(event) {
            event.preventDefault();
            var qerr = "{{__('frontError.Please Provide Product Quantity')}}";
            
            if ($("#quantity").val() == "") {
                Swal.fire("Warning", qerr, "error")
                return false;
            }
            
            if ($("#order_delivery_address").val() == "") {
                Swal.fire("Warning", "দয়া করে আপনার ঠিকানা প্রদান করুন", "error")
                return false;
            }

            Swal.fire({
                title: 'নিশ্চিতকরণ!',
                html: 'আপনার ঠিকানা টি কি সঠিক? ',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes',
            }).then((result) => {
                if (result.isConfirmed) {
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
                        success: function(response){

                            if(response.error) {
                                Swal.fire('Error', response.message,'error')
                            } else {
                                $("#buyModal").modal("hide");
                                Swal.fire("{{__('frontError.Congratulations')}}", response.message,'success').then((result) => {
                                    location.reload();

                                });
                            }
                        }
                    });
                }

            })
        })

        $(document).on('keyup', '#quantity', function(event){
            event.preventDefault();
            var qty = $(this).val();
            var per_caret = $("#per-caret-qty").text();
            var product_price = $("#product_price").val();
            if(per_caret <=0 || qty <=0) {
                $("#total_price").text("0");
                return false;
            }
            var total_item = per_caret * qty;
            var total_price = total_item * product_price;
            $("#total_price").text(total_price);
        });

        $('#buyModal').on('hidden.bs.modal', function(){
            //remove the backdrop
            $("#order_request_form #quantity").val('');
            $("#order_request_form #total_price").text('0');
        })
    })
</script>

@endpush