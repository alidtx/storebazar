@extends('layouts.store-front.master')
@section('content')

<div class="header-area sm-none">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-sm-6 col-lg-6">
                <div class="left">
                    <ul>
                        <li>
                            <i class="flaticon-email"></i>
                            <span>mail@undp.com</span>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- end col -->
            <div class="col-sm-6 col-lg-6">
                <div class="d-flex align-items-center justify-content-end">
                    <div class="me-4">
                        <a href="#." class="text-white">
                            <i class="flaticon-round-account-button-with-user-inside me-1"> </i>
                            <span> Be a Seller </span>
                        </a>
                    </div>
                    <div class="right">
                        <div class="inner">
                            <div class="lang bg-white px-2 py-1 border-radius-5 font-size-13">
                                <div class="dropdown">
                                    <a class="dropdown-toggle text-dark" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img class="lang-flag" src="assets/images/Flag_of_Bangladesh.webp" /> Bangla
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-end text-dark py-1 mt-2" aria-labelledby="dropdownMenuLink">
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <img class="lang-flag" src="assets/images/Flag_of_United_Kingdom.webp" /> English
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- inner -->
                    </div>
                </div>
                <!-- end div -->
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>

<div class="header-area lg-none">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <div class="mb-0">
                <ul class="list-unstyled text-white mb-0">
                    <li>
                        <i class="flaticon-email"></i>
                        <span>mail@undp.com</span>
                    </li>
                </ul>
            </div>

            <div class="d-flex align-items-center">
                <div class="lang pt-2">
                    <div class="lang bg-white px-2 py-1 border-radius-5 font-size-12">
                        <div class="dropdown">
                            <a class="dropdown-toggle text-dark" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <img class="lang-flag" src="assets/images/Flag_of_Bangladesh.webp" /> Bangla
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end text-dark py-1 mt-2" aria-labelledby="dropdownMenuLink">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <img class="lang-flag" src="assets/images/Flag_of_United_Kingdom.webp" /> English
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('layouts.store-front.navbar')

<div class="wrapper">
    <div class="coming-soon-area">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="error-content">
                        <!-- <i class='bx bxs-sad bx-flashing'></i> -->

                        <h1>Coming Soon!</h1>
                        <h2> This page is under development </h2>
                        <p> It will be ready soon, Till then please visit our Homepage</p>
                        <a class="common-btn" href="{{route('home')}}">
                            Go To Home
                            <img src="{{ asset('assets/images/shape1.png') }}" alt="Shape">
                            <img src="{{ asset('assets/images/shape2.png') }}" alt="Shape">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@include('layouts.store-front.footer')


<div class="go-top">
    <i class='bx bxs-up-arrow-circle'></i>
    <i class='bx bxs-up-arrow-circle'></i>
</div>



@endsection