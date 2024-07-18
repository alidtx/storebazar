<style>
    .products-item:hover .top img { transform: scale(1.2);}
</style>
<section class="blog-area four ptb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="widget-area">

                    <div class="widget-item filter-widget">
                        <div class="accordion mb-3" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                        <h6 class="mb-0"> ক্যাটাগরি </h6>
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                    <div class="accordion-body pt-4">
                                        {{-- @dd($categoriLists); --}}
                                        @foreach ($categoriLists as $category_id => $category)
                                        <div class="form-check mb-3">
                                            <input class="form-check-input categories" type="checkbox" name="categories" value="{{ $category_id }}">
                                            <label class="form-check-label">{{$category['name'] ?? ''}} <span>({{ $category['total_product'] }})</span> </label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                        <h6 class="mb-0"> এলাকা </h6>
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingTwo">
                                    <div class="accordion-body pt-4">
                                        <div>
                                            <form class="bg-white">
                                                <div class="form-group area-select">
                                                    <select name="prod_location" id="prod_location">
                                                        <option value="">এলাকা সিলেক্ট করুন </option>
                                                        @foreach($areas as $key => $area)
                                                        <option value="{{ $key }}">{{ $area ?? "Not Found" }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                        <h6 class="mb-0"> বিক্রেতা </h6>
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingTwo">
                                    <div class="accordion-body pt-4">

                                        <div>
                                            <div class="form-group area-select">
                                                <select id="seller_location" name="seller_location">
                                                    <option value="">বিক্রেতা সিলেক্ট করুন </option>
                                                    @foreach($sellers as $key => $sellerLocation)
                                                    @if(!$sellerLocation->sellerDetails) @continue @endif
                                                    @if($sellerLocation->sellerDetails->status != 'approved') @continue @endif
                                                    <option value="{{ $sellerLocation->id }}">{{ $sellerLocation->sellerDetails->shop_name.' ['.$sellerLocation->name.']' }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                        <h6 class="mb-0"> দাম (টাকা) </h6>
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingThree">
                                    <div class="accordion-body pt-4 pb-4">
                                        <div class="price-range-slider">
                                            <p class="range-value">
                                                <input type="text" id="filter_price" readonly>
                                            </p>
                                            <div id="price-slider-range" class="range-bar"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item p-4 text-center">
                                <a class="btn btn-danger reset-filter" href="#"><i class="flaticon-round-account-button-with-user-inside"></i> রিসেট</a>
                            </div>

                            <div class="accordion-item d-none">
                                <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
                                        <h6 class="mb-0"> এসকেইউ </h6>
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingFour">
                                    <div class="accordion-body pt-4 border-bottom-0">
                                        @php $i=0; @endphp
                                        @foreach($products as $skus)
                                        <div class="form-check mb-3">
                                            <input class="form-check-input" type="checkbox" id="skus{{ $i }}" name="skus" value="{{ $skus['product_table_id'] }}">
                                            <label class="form-check-label" for="check1">{{ $skus['sku'] }}</span> </label>
                                        </div>
                                        @php $i++; @endphp
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row" id="productLists">

                    @forelse($products as $product)
                    <div class="col-sm-4 col-lg-4" style="display:none">
                        <div class="products-item">
                            <div class="top">
                                @php
                                $image = isset($product['images'][0]) ? asset($product['images'][0]) : asset("assets/images/demoProduct.jpg");
                                @endphp
                                <a href="{{route('store.product.details',$product['url_key'])}}">
                                    <img style="width: 180px!important;height: 180px !important;border-radius: 50%" src="{{ $image }}" alt="Products">
                                </a>
                                <div class="inner">
                                    <h3 class="text-truncate">
                                        <a href="{{route('store.product.details',$product['url_key'])}}"> {{ $product['name'] }} </a>
                                    </h3>
                                    <p class="mb-0 text-truncate"> বিক্রেতা: {{ $product['shop_name'] }} </p>
                                    <p class="mb-0 text-truncate"> এলাকা: {{ $areas[$product['shop_area']] ?? "N/A" }}</p>
                                    <span class="font-weight-bold text-dark"> ৳ {{ $product['price'] }} </span>
                                </div>
                            </div>
                            <div class="bottom">
                                <a class="cart-text" href="#">ক্রয় অনুরোধ</a>
                                <i class="bx bx-cart addToCart" productId='{{ $product["product_table_id"] }}'></i>
                            </div>
                        </div>
                    </div>

                    @empty
                    <div class="text-center">
                        <p style="padding-top: 220px;font-size:20px;font-weight:500">কোন পণ্য পাওয়া যাই নাই |</p>
                    </div>
                    @endforelse
                </div>
                <div class="text-center">
                    <div class="common-btn" href="#" id="loadMore" style="cursor:pointer">
                        আরও দেখুন
                        <img src="{{ asset('assets/images/shape1.png') }}" alt="Shape">
                        <img src="{{ asset('assets/images/shape2.png') }}" alt="Shape">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('js')
<script>

    var min1= '{{ $price_range["pmin"] }}';
    var max1= '{{ $price_range["pmax"] }}';

    function listItems() {
        let x = 6
        var size_li = $("#productLists .col-sm-4.col-lg-4").length;
        // console.log(size_li);
        if (size_li <= 6) {
            $("#loadMore").hide()
        } else {
            $("#loadMore").show()
        }
        $('#productLists .col-sm-4.col-lg-4:lt(' + x + ')').css('display', 'block');
    }

    function getFilteredItems() {
        var prodLocation = $("#prod_location").val()
        var sellerLocation = $("#seller_location").val()
        var priceRange = $("#filter_price").val()
        var slug = '{{ request()->slug }}';

        var searchCategories = $("input[name=categories]:checked").map(function() {
            return $(this).val();
        }).get();

        $("#productLists").html("<div class='text-center' style='padding-top:250px'><i class='fas fa-spinner fa-pulse text-primary' style='font-size:70px'></i></div>")

        $.ajax({
            url: '{{ route("store.filtered.catalog") }}',
            type: 'POST',
            data: {
                searchCategories: searchCategories,
                prodLocation: prodLocation,
                sellerLocation: sellerLocation,
                slug: slug,
                priceRange: priceRange
            },
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                let str = ''
                let productImage = '';
                let counter=0;
                let areas = '<?php echo json_encode($areas) ?>';
                if(response.length > 0) {
                    $.each(response, function(index, value) {
                        counter++
                        productImage = '{{ asset(":image_path") }}';
                        let previewImagePath = value.images[0];
                        if(typeof previewImagePath==="undefined" || previewImagePath=="") {
                            previewImagePath = 'assets/images/demoProduct.jpg'
                        }

                        productImage = productImage.replace(':image_path', previewImagePath)
                        productUrl = '{{ route("store.product.details", ":url_key") }}';
                        productUrl = productUrl.replace(':url_key', value.url_key);
                        str += '<div class="col-sm-4 col-lg-4" style="display:none"><div class="products-item"><div class="top"><img src="' + productImage + '" alt="Products"><div class="inner"><h3 class="text-truncate"><a href="' + productUrl + '">' + value.name + ' </a></h3><p class="mb-0 text-truncate"> বিক্রেতা: ' + value.shop_name + ' </p><p class="mb-0 text-truncate"> এলাকা: ' + value.shop_area + '</p><span class="font-weight-bold text-dark"> ৳ ' + value.price + ' </span></div></div><div class="bottom"><a class="cart-text" href="#">ক্রয় অনুরোধ</a><i class="bx bx-cart addToCart" productid="'+value.product_table_id+'"></i></div></div></div>'
                    });
                    $("#productLists").html(str)
                } else {
                    $("#productLists").html('<div class="text-center"><p style="padding-top: 220px;font-size:20px;font-weight:500">কোন পণ্য পাওয়া যাই নাই |</p></div>')
                }
                listItems();

            }

        });
    }

    jQuery(document).ready(function () {
        listItems();
    }); 

    $(document).ready(function() {
        $(document).on('change', '.categories, #prod_location, #seller_location', function(e) {
            e.preventDefault();
            getFilteredItems();
        })

        $(document).on("click", ".addToCart", function(event) {
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
                        $("#order_request_form #per-caret-qty").text(response.product.min_order_quantity);
                        $("#order_request_form #product_category_id").val(response.product.product_category_id).prop('readonly', true);
                        $("#order_request_form #product_price").val(response.product.product_price).prop('readonly', true);
                        $("#buyModal").modal("show");
                    }
                }
            });

        })

        $('#buyModal').on('hidden.bs.modal', function(){
            //remove the backdrop
            $("#order_request_form #quantity").val('');
            $("#order_request_form #total_price").text('0');
        })

        $(document).on('click', '#submit_order_request', function(event) {
            event.preventDefault();
            
            if ($("#quantity").val() == "") {
                Swal.fire("Warning", "দয়া করে ক্যারেট পরিমান প্রদান করুন", "error")
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
                        success: function(response) {

                            if (response.error) {
                                Swal.fire('Error', response.message, 'error')
                            } else {
                                $("#buyModal").modal("hide");
                                Swal.fire("{{__('frontError.Congratulations')}}", response.message, 'success').then((result) => {
                                    location.reload();

                                });

                            }
                        }
                    });
                }
            });
        })

        $(document).on("click",".reset-filter", function(event) {
            event.preventDefault();

            $('.categories').prop('checked',false)
            $("#prod_location").val('').trigger('change')
            $('#prod_location').niceSelect('update');
            $("#seller_location").val('').trigger('change')
            $('#seller_location').niceSelect('update');
            $("#price-slider-range").slider("option", "values", [0, max1]);
            $("#filter_price").val("tk " + $("#price-slider-range").slider("values", 0) +
            " - tk " + $("#price-slider-range").slider("values", 1));
            getFilteredItems()
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

        size_li = $("#productLists .col-sm-4.col-lg-4").size();
        x=6;
        $('#productLists .col-sm-4.col-lg-4:lt('+x+')').show();
        $('#loadMore').click(function () {
            x= (x+6 <= size_li) ? x+6 : size_li;
            $('#productLists .col-sm-4.col-lg-4:lt('+x+')').show();
            if(x===size_li) {
                $("#loadMore").hide()
            } else {
                $("#loadMore").show()
            }
        });
    })
</script>

<script>
    $(function() {

        $("#price-slider-range").slider({
            range: true,
            min: 0,
            max: max1,
            values: [0, max1],
            stop: function(_, ui){
                getFilteredItems();
            },
            slide: function(event, ui) {
                $("#filter_price").val("tk " + ui.values[0] + " - tk " + ui.values[1]);
            }
        });
        $("#filter_price").val("tk " + $("#price-slider-range").slider("values", 0) +
            " - tk " + $("#price-slider-range").slider("values", 1));
    });
</script>

@endpush