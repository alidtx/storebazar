@extends('layouts.store-front.master')
@section('content')
@include('layouts.store-front.header-bar')
@include('layouts.store-front.navbar')

@dd(auth()->user())

<div class="wrapper">
    <section class="ptb-60 profile-area bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="{{ asset('assets/images/user.png') }}" alt="" width="100px" class="mb-3">
                                <h6 class="mb-2"> {{auth()->user()->name ?? ''}} </h6>
                                <p class=" mb-0 font-weight-bold font-size-12"> Seller Account</p>
                                <p class="mb-0"> {{auth()->user()->mobile ?? ''}} </p>
                                <p> {{auth()->user()->email ?? ''}} </p>
                            </div>

                            <div class="nav flex-column nav-pills pt-0" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active pt-0 px-0 pb-2" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                    <i class="bx bx-file"> </i> Pending Order Requests
                                </a>
                                <a class="nav-link px-0 py-2" id="v-pills-home-tab2" data-bs-toggle="pill" data-bs-target="#v-pills-home2" type="button" role="tab" aria-controls="v-pills-home2" aria-selected="true">
                                    <i class="bx bx-file"> </i> Order History
                                </a>

                                <a class="nav-link px-0 py-2" id="v-pills-add-product" data-bs-toggle="pill" data-bs-target="#v-pills-add" type="button" role="tab" aria-controls="v-pills-add" aria-selected="true">
                                    <i class="bx bx-package"> </i> Add Product
                                </a>

                                <a class="nav-link px-0 py-2" id="v-pills-product-list" data-bs-toggle="pill" data-bs-target="#v-pills-list-product" type="button" role="tab" aria-controls="v-pills-list-product" aria-selected="true">
                                    <i class="bx bx-package"> </i> Products List
                                </a>

                                <a class="nav-link px-0 py-2" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                    <i class="bx bx-user"> </i> Edit Profile
                                </a>
                                <a class="nav-link border-bottom-0 py-2 px-0" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">
                                    <i class="bx bx-lock"> </i> Change Password
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9  mb-3">
                    <div class="card h-100">
                        <div class="card-body pt-4">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                    <h6 class="mb-2"> Pending Order Requests </h6>
                                    <div class="sep mb-3"> </div>

                                    <div class="table-responsive seller-panel">
                                        <div class="table-dashed-border">
                                            <table class="table border-dashed">
                                                <thead class="bg-light">
                                                    <tr>
                                                        <th>
                                                            <span class="font-weight-bold"> Order ID </span>
                                                        </th>
                                                        <th>
                                                            Requested Date
                                                        </th>

                                                        <th>
                                                            Product Name
                                                        </th>

                                                        <th>
                                                            Quantity
                                                        </th>

                                                        <th>
                                                            Bidding Price (tk)
                                                        </th>
                                                        <th>
                                                            Action
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td> <span class="font-weight-bold"> #ABC123 </span> </td>
                                                        <td> 10 Sep 2022 9.30AM </td>

                                                        <td> Recycle Plastic </td>
                                                        <td> 10kg </td>
                                                        <td width="160">
                                                            <input class="form-control" type="number" value="2000">
                                                        </td>

                                                        <td>
                                                            <a href="#." id="b3" class="btn btn-sm btn-success me-1 btn-confirm-success my-1">
                                                                Confirm
                                                            </a>
                                                            <a href="#." id="b4" class="btn btn-sm btn-danger cancel my-1">
                                                                Cancel
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <span class="font-weight-bold"> #ABC123 </span> </td>
                                                        <td> 10 Sep 2022 10.30AM </td>

                                                        <td> Recycle Plastic </td>
                                                        <td> 10kg </td>
                                                        <td width="160">
                                                            <input class="form-control" type="text" value="2000">
                                                        </td>

                                                        <td>
                                                            <a href="#." class="btn btn-sm btn-success me-1 btn-confirm-success my-1">
                                                                Confirm
                                                            </a>
                                                            <a href="#." class="btn btn-sm btn-danger cancel my-1">
                                                                Cancel
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <span class="font-weight-bold"> #ABC123 </span> </td>
                                                        <td> 10 Sep 2022 11.40PM </td>
                                                        <td> Recycle Plastic </td>
                                                        <td> 10kg </td>
                                                        <td width="160">
                                                            <input class="form-control" type="text" value="2000">
                                                        </td>

                                                        <td>
                                                            <a href="#." class="btn btn-sm btn-success btn-confirm-success me-1 my-1">
                                                                Confirm
                                                            </a>
                                                            <a href="#." class="btn btn-sm btn-danger cancel my-1">
                                                                Cancel
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> <span class="font-weight-bold"> #ABC123 </span> </td>
                                                        <td> 10 Sep 2022 12.40PM </td>
                                                        <td> Recycle Plastic </td>
                                                        <td> 10kg </td>
                                                        <td width="160">
                                                            <input class="form-control" type="text" value="2000">
                                                        </td>

                                                        <td>
                                                            <a href="#." class="btn btn-sm btn-success btn-confirm-success me-1 my-1">
                                                                Confirm
                                                            </a>
                                                            <a href="#." class="btn btn-sm btn-danger cancel my-1">
                                                                Cancel
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination justify-content-end">
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>

                                <div class="tab-pane fade" id="v-pills-home2" role="tabpanel" aria-labelledby="v-pills-home-tab2">
                                    <h6 class="mb-2"> Order History </h6>
                                    <div class="sep mb-3"> </div>

                                    <div class="table-responsive">
                                        <div class="table-dashed-border">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr>
                                                        <th>
                                                            <span class="font-weight-bold"> Order ID </span>
                                                        </th>
                                                        <th>
                                                            Requested Date
                                                        </th>
                                                        <th>
                                                            Product Name
                                                        </th>
                                                        <th>
                                                            Quantity
                                                        </th>
                                                        <th>
                                                            Bidding Price (tk)
                                                        </th>
                                                        <th>
                                                            Status
                                                        </th>
                                                        <!-- <th>
                                                                Action
                                                            </th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td> <span class="font-weight-bold"> #ABC123 </span> </td>
                                                        <td> 10 Sep 2022 </td>
                                                        <td> Recycle Plastic </td>
                                                        <td> 10kg </td>
                                                        <td> 2000tk </td>
                                                        <td> <span class="badge bg-soft-success"> Confirmed </span> </td>
                                                    </tr>

                                                    <tr>
                                                        <td> <span class="font-weight-bold"> #ABC123 </span> </td>
                                                        <td> 10 Sep 2022 </td>
                                                        <td> Recycle Plastic </td>
                                                        <td> 10kg </td>
                                                        <td> 2000tk </td>
                                                        <td> <span class="badge bg-soft-success"> Confirmed </span> </td>
                                                    </tr>

                                                    <tr>
                                                        <td> <span class="font-weight-bold"> #ABC123 </span> </td>
                                                        <td> 10 Sep 2022 </td>
                                                        <td> Recycle Plastic </td>
                                                        <td> 10kg </td>
                                                        <td> 2000tk </td>
                                                        <td> <span class="badge bg-soft-success"> Confirmed </span> </td>
                                                    </tr>

                                                    <tr>
                                                        <td> <span class="font-weight-bold"> #ABC123 </span> </td>
                                                        <td> 10 Sep 2022 </td>
                                                        <td> Recycle Plastic </td>
                                                        <td> 10kg </td>
                                                        <td> 2000tk </td>
                                                        <td> <span class="badge bg-soft-danger"> Canceled </span> </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>


                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination justify-content-end">
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>

                                <div class="tab-pane fade" id="v-pills-add" role="tabpanel" aria-labelledby="v-pills-product-list">
                                    <h6 class="mb-2"> Add Product </h6>
                                    <div class="sep mb-3"> </div>

                                    <form class="add_product">
                                        <div class="row">

                                            <div class="mb-3 form-group col-lg-6">
                                                <label for="prouct_name" class="form-label" required> Product Name <span class="text-danger"> * </span> </label>
                                                <input type="text" class="form-control" id="prouct_name" placeholder="Product Name">
                                            </div>

                                            <div class="mb-3 form-group col-lg-6">
                                                <label for="product_price" class="form-label"> Product Price <span class="text-danger"> * </span> </label>
                                                <input type="number" class="form-control" id="product_price" placeholder="Product Price">
                                            </div>


                                            <div class="form-group col-lg-6" required>
                                                <label for="product_cat" class="form-label"> Select Category <span class="text-danger"> * </span> </label>
                                                <div>
                                                    <select style="display: none;" class="mb-0 w-100">
                                                        <option> Category </option>
                                                        <option> Recycle Plastic </option>
                                                        <option> Honey </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="mb-3 form-group col-lg-6">
                                                <label for="quantity" class="form-label"> Quantity <span class="text-danger"> * </span> </label>
                                                <input type="text" class="form-control" id="quantity" placeholder="Quantity">
                                            </div>




                                            <div class="mb-3 form-group col-lg-6">
                                                <label for="product_des" class="form-label"> Product Description </label>
                                                <textarea class="form-control" id="product_des" rows="3"></textarea>
                                            </div>

                                            <div class="mb-3 form-group col-lg-6">
                                                <label for="additional_info" class="form-label"> Additional Information </label>
                                                <textarea class="form-control" id="additional_info" rows="3"></textarea>
                                            </div>


                                            <div class="form-group col-lg-12 mb-2">
                                                <div class="upload__box">
                                                    <div class="upload__btn-box">
                                                        <label class="upload__btn">
                                                            <p class="mb-0"> <i class="fa fa-plus"> </i> Upload Images </p>
                                                            <input type="file" multiple="" data-max_length="20" class="upload__inputfile">
                                                        </label>
                                                    </div>
                                                    <div class="upload__img-wrap"></div>
                                                </div>
                                            </div>


                                            <div class="col-lg-12 text-end">
                                                <button type="submit" class="btn btn common-btn"> Submit </button>
                                            </div>

                                        </div>
                                    </form>
                                </div>

                                <div class="tab-pane fade" id="v-pills-list-product" role="tabpanel" aria-labelledby="v-pills-list-product">

                                    <h6 class="mb-2"> Products List </h6>
                                    <div class="sep mb-3"> </div>


                                    <div class="table-responsive seller-panel">
                                        <div class="table-dashed-border">
                                            <table class="table border-dashed">
                                                <thead class="bg-light">
                                                    <tr>
                                                        <th>
                                                            <span class="font-weight-bold"> Product Name </span>
                                                        </th>
                                                        <th>
                                                            Price
                                                        </th>

                                                        <th>
                                                            Category
                                                        </th>

                                                        <th>
                                                            Quantity
                                                        </th>

                                                        <th>
                                                            Commodity Type
                                                        </th>
                                                        <th>
                                                            Material Type
                                                        </th>
                                                        <th>
                                                            Action
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td> Recycle Plastic </td>
                                                        <td> 2000tk </td>
                                                        <td> Recyle Plastic </td>
                                                        <td> 10 Sep 2022 9.30AM </td>
                                                        <td> Recycle Plastic </td>
                                                        <td> 10kg </td>
                                                        <td>
                                                            <a href="single-product.html" class="btn btn-sm btn-soft-success py-1 me-1 my-1" data-bs-toggle="tooltip" data-bs-placement="top" title="View" data-bs-animation='false'>
                                                                <i class="fa fa-eye"> </i>
                                                            </a>
                                                            <a href="#." id="edit_product" class="btn btn-sm btn-soft-primary py-1 me-1 my-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-bs-animation='false'>
                                                                <i class="fa fa-pencil"> </i>
                                                            </a>
                                                            <a href="#." id="delete_product" class="btn btn-sm btn-soft-danger py-1 me-1 my-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-bs-animation='false'>
                                                                <i class="fa fa-trash"> </i>
                                                            </a>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Recycle Plastic </td>
                                                        <td> 2000tk </td>
                                                        <td> Recyle Plastic </td>
                                                        <td> 10 Sep 2022 9.30AM </td>
                                                        <td> Recycle Plastic </td>
                                                        <td> 10kg </td>
                                                        <td>
                                                            <a href="single-product.html" class="btn btn-sm btn-soft-success py-1 me-1 my-1" data-bs-toggle="tooltip" data-bs-placement="top" title="View" data-bs-animation='false'>
                                                                <i class="fa fa-eye"> </i>
                                                            </a>
                                                            <a href="#." id="edit_product" class="btn btn-sm btn-soft-primary py-1 me-1 my-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-bs-animation='false'>
                                                                <i class="fa fa-pencil"> </i>
                                                            </a>
                                                            <a href="#." id="delete_product" class="btn btn-sm btn-soft-danger py-1 me-1 my-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-bs-animation='false'>
                                                                <i class="fa fa-trash"> </i>
                                                            </a>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Recycle Plastic </td>
                                                        <td> 2000tk </td>
                                                        <td> Recyle Plastic </td>
                                                        <td> 10 Sep 2022 9.30AM </td>
                                                        <td> Recycle Plastic </td>
                                                        <td> 10kg </td>
                                                        <td>
                                                            <a href="single-product.html" class="btn btn-sm btn-soft-success py-1 me-1 my-1" data-bs-toggle="tooltip" data-bs-placement="top" title="View" data-bs-animation='false'>
                                                                <i class="fa fa-eye"> </i>
                                                            </a>
                                                            <a href="#." id="edit_product" class="btn btn-sm btn-soft-primary py-1 me-1 my-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" data-bs-animation='false'>
                                                                <i class="fa fa-pencil"> </i>
                                                            </a>
                                                            <a href="#." id="delete_product" class="btn btn-sm btn-soft-danger py-1 my-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-bs-animation='false'>
                                                                <i class="fa fa-trash"> </i>
                                                            </a>

                                                        </td>
                                                    </tr>


                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination justify-content-end">
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Previous">
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a>
                                            </li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Next">
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>

                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                    <h6 class="mb-2"> Edit Profile </h6>
                                    <div class="sep mb-3"> </div>

                                    <div id="xlogin">
                                        <form action="#" method="post" class="form-horizontal">
                                            <div class="row">
                                                <div class="col-lg-6 mb-3">
                                                    <div class="form-group">
                                                        <label for="" class="font-weight-medium mb-2"> পুরো নাম </label>
                                                        <input type="text" class="form-control" value="Shahola Nisha" aria-label="full-name" aria-describedby="full-name">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-3">
                                                    <div class="form-group">
                                                        <label for="" class="font-weight-medium mb-2"> মোবাইল নং </label>
                                                        <input type="text" class="form-control" value="+880 176917161" aria-label="fmobile" aria-describedby="mobile" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-3">
                                                    <div class="form-group">
                                                        <label for="" class="font-weight-medium mb-2"> ইমেইল এড্রেস </label>
                                                        <input type="text" class="form-control" value="mail@email.com" aria-label="email" aria-describedby="email" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-3">
                                                    <div class="form-group">
                                                        <label for="" class="font-weight-medium mb-2"> Street এড্রেস 1 </label>
                                                        <input type="text" class="form-control" placeholder="Street এড্রেস 1" aria-label="email" aria-describedby="email">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-3">
                                                    <div class="form-group">
                                                        <label for="" class="font-weight-medium mb-2"> Street এড্রেস 2 </label>
                                                        <input type="text" class="form-control" placeholder="Street এড্রেস 2" aria-label="email" aria-describedby="email">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <button id="login" type="button" class="btn common-btn">
                                                            Update
                                                            <img src="{{ asset('assets/images/shape1.png') }}" alt="Shape">
                                                            <img src="{{ asset('assets/images/shape2.png') }}" alt="Shape">
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">

                                    <h6 class="mb-2"> Change Password </h6>
                                    <div class="sep mb-3"> </div>

                                    <div id="xlogin">
                                        <form action="">
                                            <div class="row">
                                                <div class="col-lg-6 mb-3">
                                                    <div class="form-group">
                                                        <label for="" class="font-weight-bold mb-2"> Current Password </label>
                                                        <input type="password" class="form-control" placeholder="পাসওয়ার্ড" aria-label="password" aria-describedby="basic-addon6">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-3">
                                                    <div class="form-group">
                                                        <label for="" class="font-weight-bold mb-2"> New Password </label>
                                                        <input type="password" class="form-control" placeholder="New Password" aria-label="password" aria-describedby="basic-addon6">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-3">
                                                    <div class="form-group">
                                                        <label for="" class="font-weight-bold mb-2">Confirm New Password </label>
                                                        <input type="password" class="form-control" placeholder="New Password" aria-label="password" aria-describedby="basic-addon6">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <button id="login" type="button" class="btn common-btn">
                                                            Update
                                                            <img src="{{ asset('assets/images/shape1.png') }}" alt="Shape">
                                                            <img src="{{ asset('assets/images/shape2.png') }}" alt="Shape">
                                                        </button>
                                                    </div>
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
        </div>
    </section>
</div>













@include('layouts.store-front.footer')
@include('layouts.partial._buy_request')




<div class="go-top">
    <i class='bx bxs-up-arrow-circle'></i>
    <i class='bx bxs-up-arrow-circle'></i>
</div>

@endsection
<!-- <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<script src="assets/js/form-validator.min.js"></script>

<script src="assets/js/contact-form-script.js"></script>

<script src="assets/js/jquery.ajaxchimp.min.js"></script>

<script src="assets/js/jquery.nice-select.min.js"></script>

<script src="assets/js/jquery.meanmenu.js"></script>

<script src="assets/js/jquery.themepunch.tools.min.js"></script>
<script src="assets/js/jquery.themepunch.revolution.min.js"></script>

<script src="assets/js/extensions/revolution.extension.actions.min.js"></script>
<script src="assets/js/extensions/revolution.extension.carousel.min.js"></script>
<script src="assets/js/extensions/revolution.extension.kenburn.min.js"></script>
<script src="assets/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="assets/js/extensions/revolution.extension.migration.min.js"></script>
<script src="assets/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="assets/js/extensions/revolution.extension.parallax.min.js"></script>
<script src="assets/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="assets/js/extensions/revolution.extension.video.min.js"></script>

<script src="assets/js/jquery.mixitup.min.js"></script>

<script src="assets/js/owl.carousel.min.js"></script>

<script src="assets/js/jquery-modal-video.min.js"></script>

<script src="assets/js/thumb-slide.js"></script>

<script src="assets/js/sweet-alert.min.js"></script>

<script src="assets/js/custom.js"></script>


<script type="text/javascript">
    document.getElementById('b3').onclick = function() {
        swal({
                title: "Order Confirmation",
                text: "Do you want to confirm this order under price 2000tk?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Yes, Confirm Order!',
                closeOnConfirm: false,
                //closeOnCancel: false
            },
            function() {
                swal("Order Confirmed!", "Order has been confirmed!", "success");
            });
    };
    // document.getElementById('b3').onclick = function(){
    //     swal("Confirmed!", "Order Id: #ABC123 has been confirmed! Please check details on Order History page", "success");
    // };
    document.getElementById('b4').onclick = function() {
        swal({
                title: "Are you sure?",
                text: "This order will be canceled!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Yes, Cancel Order!',
                closeOnConfirm: false,
                //closeOnCancel: false
            },
            function() {
                swal("Canceled!", "Order has been canceled!", "success");
            });
    };

    document.getElementById('delete_product').onclick = function() {
        swal({
                title: "Are you sure?",
                text: "This product will be deleted!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: '#DD6B55',
                confirmButtonText: 'Yes, Delete Product!',
                closeOnConfirm: false,
                //closeOnCancel: false
            },
            function() {
                swal("Canceled!", "Order has been canceled!", "success");
            });
    };
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    });


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
</body>

</html> -->