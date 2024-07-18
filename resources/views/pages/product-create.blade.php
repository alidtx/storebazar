@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Create Product'])

<style>
    .upload__box {
        padding: 24px;
        /* padding-right: 48px; */
        padding-left: 12px;
    }

    .upload__inputfile {
        width: 0.1px;
        height: 0.1px;
        opacity: 0;
        overflow: hidden;
        position: absolute;
        z-index: -1;
    }

    .upload__btn {
        display: inline-block;
        font-weight: 600;
        color: #202020;
        text-align: center;
        min-width: 100%;
        padding: 20px;
        transition: all .3s ease;
        cursor: pointer;
        border: 1px dashed;
        border-color: #d9d9d9;
        border-radius: 6px;
        line-height: 26px;
        font-size: 14px;
    }

    .upload__btn:hover {
        background-color: unset;
        color: #4045ba;
        transition: all 0.3s ease;
    }

    .upload__btn-box {
        margin-bottom: 10px;
    }

    .upload__img-wrap {
        display: flex;
        flex-wrap: wrap;
        margin: 0 -10px;
    }

    .upload__img-box {
        width: 200px;
        padding: 0 10px;
        margin-bottom: 12px;
    }

    .upload__img-close {
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

    .upload__img-close:after {
        content: '\2716';
        font-size: 14px;
        color: white;
    }

    .img-bg {
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
        position: relative;
        padding-bottom: 100%;
    }
</style>
<div class="row mt-4 mx-4">
    <div class="col-12">

        <div class="card mb-4">


            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form role="form" method="POST" action="{{ route('product.create') }}" id="productCreate" enctype="multipart/form-data">
                                @csrf
                                <div class="card-header pb-0">
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0">Product Create</p>
                                        <button type="submit" id="attribute-create" class="btn btn-primary btn-sm ms-auto">Save</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="text-uppercase text-sm">Product Information</p>
                                    <div class="row" id="v-pills-add" role="tabpanel" aria-labelledby="v-pills-product-list">
                                        <form role="form" method="POST" action="{{ route('product.create') }}" id="productCreate" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="form-control-label">Select Seller <span class="text-danger"> * </span></label>
                                                        <select name="seller_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="seller_id">
                                                            <option selected disabled>Select Seller</option>
                                                            @foreach ($sellerList as $seller)
                                                            @if($seller->sellerDetails)
                                                            @if($seller->sellerDetails->status != 'approved') @continue @endif
                                                            <option value="{{$seller->sellerDetails->user_id}}"> {{$seller->sellerDetails->shop_name.' ['.$seller->name.']' ?? ''}} </option>
                                                            @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="example-text-input" class="form-control-label">Select Category <span class="text-danger"> * </span></label>
                                                        <select name="category_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="category_id">
                                                            <option selected disabled>Select Category</option>
                                                            @foreach ($categories as $category)
                                                            @if($category->url_key != 'Pesticide' && $category->url_key != 'Pesticide' &&  $category->url_key != 'Fertilizer' &&  $category->url_key != 'Fertilizer') @continue @endif
                                                            @foreach ($category->categoryDetail as $details)
                                                            @if($details->language_id == 1)
                                                            <option value="{{$details->category_id}}"> {{$details->name ?? ''}} </option>
                                                            @endif
                                                            @endforeach
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="product_name" class="form-label" required> Product Name <span class="text-danger"> * </span> </label>
                                                        <input type="text" name="product_name" class="form-control" id="product_name" placeholder="Product Name">
                                                        <span class="error text-danger d-none"></span>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="product_price" class="form-label"> Product Price <span class="text-danger"> * </span> </label>
                                                        <input type="number" name="product_price" class="form-control" id="product_price" placeholder="Product Price">
                                                        <span class="error text-danger d-none"></span>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="quantity" class="form-label"> Quantity <span class="text-danger"> * </span> </label>
                                                        <input type="number" class="form-control" name="product_quantity" id="product_quantity" placeholder="Quantity">
                                                        <span class="error text-danger d-none"></span>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label for="min_order_quantity" class="form-label">Per Crate Quantity <span class="text-danger"> * </span> </label>
                                                        <input type="number" class="form-control" name="min_order_quantity" id="min_order_quantity" placeholder="Per Crate Quantity">
                                                        <span class="error text-danger d-none"></span>
                                                    </div>
                                                </div>

                                                <!-- Render Attribute Block -->

                                                <div class="row" id="attribute-block">

                                                </div>



                                                <div class="col-md-6">
                                                    <label for="product_des" class="form-label"> Product Description </label>
                                                    <textarea class="form-control" id="product_des" name="product_des" rows="3"></textarea>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="additional_info" class="form-label"> Additional Information </label>
                                                    <textarea class="form-control" name="additional_info" id="additional_info" rows="3"></textarea>
                                                </div>




                                                <div class="upload__box">
                                                    <div class="upload__btn-box">
                                                        <label class="upload__btn">
                                                            <p>Upload Product images</p>
                                                            <input type="file" name="product_images[]" data-max_length="20" class="upload__inputfile" multiple="">
                                                        </label>
                                                    </div>
                                                    <div class="upload__img-wrap"></div>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                    <!-- <hr class="horizontal dark"> -->

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

<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

@include('layouts.partial._ajax_form_submit')

<script>
    $(document).ready(function() {
        $("#attribute_name").keyup(function() {
            var Text = $(this).val();
            Text = Text.toLowerCase();
            var regExp = /\s+/g;
            Text = Text.replace(regExp, '-');
            $("#attribute_code").val(Text);
        });


        $("#productCreate").submit(function(e) {
            e.preventDefault();
            formPost('productCreate', 'attribute-create', '{{ route("product.create") }}', '{{ route("page", ["page" => "product-list"]) }}')
        });

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

    })

    function getErrorHtml($errors) {
        var errorsHtml = '';
        $.each($errors, function(key, value) {

            if (value.constructor === Array) {
                $.each(value, function(i, v) {

                    $("#id_" + key).show().html(v);
                    errorsHtml += '<li>' + v + '</li>';
                });
            } else {
                errorsHtml += '<li>' + value[0] + '</li>';
            }
        });
        return errorsHtml
    }
</script>

@push('js')


<script type="text/javascript">
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
                var iterator = 0;
                filesArr.forEach(function(f, index) {

                    if (!f.type.match('image.*')) {
                        return;
                    }

                    if (imgArray.length > maxLength) {
                        return false
                    } else {
                        var len = 0;
                        for (var i = 0; i < imgArray.length; i++) {
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