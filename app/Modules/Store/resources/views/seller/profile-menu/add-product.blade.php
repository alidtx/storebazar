<form class="add_product" id="add_product" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="product_table_id" id="product_table_id">
    <div class="row">
        <div class="mb-3 form-group col-lg-6">
            <label for="product_name" class="form-label" required> পণ্যের নাম <span class="text-danger"> * </span> </label>
            <input type="text" name="product_name" class="form-control" id="product_name" placeholder="পণ্যের নাম">
            <span class="error text-danger d-none"></span>
        </div>

        <div class="mb-3 form-group col-lg-6">
            <label for="product_price" class="form-label"> পণ্যের দাম <span class="text-danger"> * </span> </label>
            <input type="number" name="product_price" class="form-control" id="product_price" placeholder="পণ্যের দাম">
            <span class="error text-danger d-none"></span>
        </div>


        <div class="form-group col-lg-6" required>
            <label for="product_cat" class="form-label"> ক্যাটাগরি <span class="text-danger"> * </span> </label>
            <div>
                <select style="display: none;" name="category_id" class="mb-0 w-100" id="category_id">
                    <option value="" selected disabled> সিলেক্ট ক্যাটাগরি </option>
                    @foreach ($categories as $category)
                    @if($category->url_key != 'Fertilizer' && $category->url_key != 'Fertilizer' && $category->url_key != 'Pesticide' && $category->url_key != 'Pesticide' ) @continue @endif
                    @foreach ($category->categoryDetail as $details)
                    @if($details->language_id == 1)
                    <option value="{{$details->category_id}}"> {{$details->name ?? ''}} </option>
                    @endif
                    @endforeach
                    @endforeach
                </select>
                <span class="error text-danger d-none"></span>
            </div>
        </div>

        <div class="mb-3 form-group col-lg-3 quantity">
            <label for="quantity" class="form-label"> পরিমাণ <span class="text-danger"> * </span> </label>
            <input type="number" class="form-control" name="product_quantity" id="product_quantity" placeholder="পরিমাণ">
            <span class="error text-danger d-none"></span>
        </div>

        <div class="mb-3 form-group col-lg-3">
            <label for="min_order_quantity" class="form-label"> ক্যারেট পণ্য পরিমাণ <span class="text-danger"> * </span> </label>
            <input type="number" name="min_order_quantity" class="form-control" id="min_order_quantity" placeholder="ক্যারেট প্রতি পণ্য">
            <span class="error text-danger d-none"></span>
        </div>

        <!-- Render Attribute Block -->

        <div class="row" id="attribute-block">

        </div>

        <div class="mb-3 form-group col-lg-6">
            <label for="product_des" class="form-label"> পণ্যের বর্ণনা </label>
            <textarea class="form-control" id="product_des" name="product_des" rows="3"></textarea>
        </div>

        <div class="mb-3 form-group col-lg-6">
            <label for="additional_info" class="form-label"> অতিরিক্ত তথ্য </label>
            <textarea class="form-control" name="additional_info" id="additional_info" rows="3"></textarea>
        </div>

        <div class="prev_upload__box" style="display: none;">
            <div class="prev_upload__btn-box mb-3">
                <label class="prev_upload__btn form-label">পণ্য ইমেজ</label>
            </div>

            <div class="prev_upload__img-wrap"></div>
        </div>


        <div class="form-group col-lg-12 mb-2">
            <div class="upload__box">
                <div class="upload__btn-box">
                    <label class="upload__btn">
                        <p class="mb-0"> <i class="fa fa-plus"> </i> ছবি আপলোড </p>
                        <input type="file" multiple="" name="product_images[]" data-max_length="20" class="upload__inputfile">
                    </label>
                </div>
                <div class="upload__img-wrap"></div>
            </div>
        </div>


        <div class="col-lg-12 text-end">
            <button type="submit" id="product_submit" class="btn btn common-btn"> সাবমিট </button>
        </div>

    </div>
</form>