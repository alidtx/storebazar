<style>
    .swal2-container {
        z-index: 1000000 !important;
      };
      
</style>
<div class="modal fade modal-center popup-modal" id="buyModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h2>ক্রয় অনুরোধ</h2>
                <p class="mb-0"> পণ্য কিনতে নিচের তথ্যগুলো পূরণ করুন </p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-2">
                <div id="xlogin">
                    <form method="POST" id="order_request_form">
                        <input type="hidden" id="requested_product_id" name="requested_product_id">
                        <input type="hidden" id="requested_customer_id" name="requested_customer_id">
                        <div class="row">
                            <div class="col-lg-6 mb-3">
                                <label for="" class="form-label mb-2 font-weight-bold"> ক্রেতার পুরো নাম <span class="text-danger"> * </span> </label>
                                <input type="text" name="customer_name" id="customer_name" class="form-control" placeholder="ক্রেতার পুরো নাম ">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="" class="form-label mb-2 font-weight-bold"> ফোন নাম্বার <span class="text-danger"> * </span> </label>
                                <input type="text" name="customer_phone" id="customer_phone" class="form-control" placeholder="ফোন নাম্বার">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="" class="form-label mb-2 font-weight-bold"> পণ্যের নাম <span class="text-danger"> * </span> </label>
                                <input type="text" name="product_name" id="product_name" class="form-control" placeholder="পণ্যের নাম">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="" class="form-label mb-2 font-weight-bold"> ক্যাটাগরি <span class="text-danger"> * </span> </label>
                                <input type="text" name="product_category" id="product_category" class="form-control" placeholder="ক্যাটাগরি">
                                <input type="hidden" name="product_category_id" id="product_category_id" class="form-control" placeholder="ক্যাটাগরি">
                            </div>
                            <div class="col-lg-6 mb-3">
                                <label for="" class="form-label mb-2 font-weight-bold"> পণ্যের মূল্য (টাকা) <span class="text-danger"> * </span> </label>
                                <input type="number" name="product_price" id="product_price" class="form-control"  readonly>
                            </div>

                            <div class="col-lg-6 mb-3">
                                <label for="" class="form-label mb-2 font-weight-bold">ক্যারেট পরিমাণ <span class="text-danger"> * </span> </label>
                                <!-- <input type="number" name="quantity" id="quantity" class="form-control" placeholder="পরিমাণ "> -->
                                <div class="input-group mb-1">
                                    <span class="input-group-text justify-content-center" id="per-caret-qty" ata-bs-toggle="tooltip" data-bs-placement="top" title="প্রতি ক্যারেটে পণ্য"></span>
                                    <input type="number" name="quantity" id="quantity" class="form-control" placeholder="ক্যারেট পরিমাণ" style="background-color: #fff !important;" required>
                                </div>
                                <div>
                                    <span>মোট অর্ডার মূল্য (টাকা) : <small class="text-danger" id="total_price">0</small></span>
                                </div>
                            </div>

                            <div class="col-lg-12 mb-3">
                                <label for="" class="form-label mb-2 font-weight-bold"> বিডিং মূল্য (টাকা) </label>
                                <input type="number" name="bidding_price" id="bidding_price" class="form-control" placeholder="বিডিং মূল্য (টাকা)" style="background-color: #fff !important;">
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="" class="form-label mb-2 font-weight-bold"> ঠিকানা <span class="text-danger"> * </span> </label>
                                <textarea class="form-control" name="order_delivery_address" id="order_delivery_address" rows="2" placeholder="ঠিকানা" class="form-control" style="background-color: #fff !important;"></textarea>
                            </div>
                            <div class="col-lg-12 mb-3">
                                <label for="" class="form-label mb-2 font-weight-bold"> কমেন্ট (যদি থাকে) </label>
                                <textarea class="form-control" name="comment" id="comment" rows="2" placeholder="কমেন্ট (যদি থাকে)" class="form-control" style="background-color: #fff !important;"></textarea>
                            </div>
                            <div class="col-lg-12 d-grid">
                                <button type="submit" class="btn common-btn" id="submit_order_request">
                                    সাবমিট করুন
                                    <img src="{{ asset('assets/images/shape1.png') }}" alt="Shape">
                                    <img src="{{ asset('assets/images/shape2.png') }}" alt="Shape">
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>