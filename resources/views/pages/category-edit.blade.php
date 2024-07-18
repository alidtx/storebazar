@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Update Category'])
<style>
    #picture__input {
        display: none;
    }

    span.select2-selection.select2-selection--multiple {
        display: block;
        width: 335px;
        padding: 0.5rem 0.75rem;
        font-size: 0.875rem;
        font-weight: 400;
        line-height: 1.4rem;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #d2d6da;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border-radius: 0.5rem;
        transition: box-shadow 0.15s ease, border-color 0.15s ease;
    }

    span.select2-dropdown.select2-dropdown--above {
        width: 335px !important;
    }

    .picture {
        width: 400px;
        aspect-ratio: 16/9;
        background: #ddd;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #aaa;
        border: 2px dashed currentcolor;
        cursor: pointer;
        font-family: sans-serif;
        transition: color 300ms ease-in-out, background 300ms ease-in-out;
        outline: none;
        overflow: hidden;
    }

    .picture:hover {
        color: #777;
        background: #ccc;
    }

    .picture:active {
        border-color: turquoise;
        color: turquoise;
        background: #eee;
    }

    .picture:focus {
        color: #777;
        background: #ccc;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    .picture__img {
        max-width: 100%;
    }
</style>
<div class="row mt-4 mx-4">
    <div class="col-12">

        <div class="card mb-4">


            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <form role="form" method="POST" action="{{ route('category.update') }}" id="categoryUpdate" enctype="multipart/form-data">
                                @csrf
                                <div class="card-header pb-0">
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0">Category Create</p>
                                        <button type="submit" id="attribute-create" class="btn btn-primary btn-sm ms-auto">Update</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="text-uppercase text-sm">Category Information</p>
                                    <div class="row">
                                        <div class="col-md-6">

                                            <input id="attribute_id" class="form-control" type="hidden" name="category_id" value="{{$category->id}}">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Category Name</label>
                                                <input id="name" class="form-control" type="text" name="name" value="{{$category->categoryDetail[0]->name ?? 'N/A'}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">URL key</label>
                                                <input id="url_key" class="form-control" type="text" name="url_key" value="{{$category->url_key ?? 'N/A'}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Category Image</label>
                                                <label class="picture" for="picture__input" tabIndex="0">
                                                    <span class="picture__image"></span>
                                                    @if($category->image)
                                                    <img src="{{ $category->image }}" class="">
                                                    @endif
                                                </label>
                                                <input type="file" name="image" id="picture__input">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="example-text-input" class="form-control-label">Assign Attribute</label>
                                                <select class="js-example-basic-multiple" name="attribute[]" multiple="multiple">
                                                    <option value="" disabled>Select Attribute</option>
                                                    @foreach ($attributeList as $attribute)
                                                    <option @if(in_array($attribute->id, $categoryAttributeId))
                                                        selected
                                                        @endif value="{{$attribute->id}}">{{$attribute->attributeLabel[0]->label ?? 'N/A'}}</option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>


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

<script type="text/javascript">
    const inputFile = document.querySelector("#picture__input");
    const pictureImage = document.querySelector(".picture__image");
    const pictureImageTxt = "Choose an image";
    pictureImage.innerHTML = pictureImageTxt;

    inputFile.addEventListener("change", function(e) {
        const inputTarget = e.target;
        const file = inputTarget.files[0];

        if (file) {
            const reader = new FileReader();

            reader.addEventListener("load", function(e) {
                const readerTarget = e.target;

                const img = document.createElement("img");
                img.src = readerTarget.result;
                img.classList.add("picture__img");

                pictureImage.innerHTML = "";
                pictureImage.appendChild(img);
            });

            reader.readAsDataURL(file);
        } else {
            pictureImage.innerHTML = pictureImageTxt;
        }
    });
</script>

<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
        $("#name").keyup(function() {
            var Text = $(this).val();
            Text = Text.toLowerCase();
            var regExp = /\s+/g;
            Text = Text.replace(regExp, '-');
            $("#url_key").val(Text);
        });


        $("#categoryUpdate").submit(function(e) {
            e.preventDefault();
            formPost('categoryUpdate', 'category-create', '{{ route("category.update") }}', '{{ route("page", ["page" => "category-list"]) }}')
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

@endsection