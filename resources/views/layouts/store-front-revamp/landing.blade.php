<!DOCTYPE html>
<html lang="en">

<head>

    @include('layouts.store-front-revamp.header-assets')
    <title> sslwireless - Organic Honey Marketplace </title>
</head>

<body>

    <!-- start page-wrapper -->
    <div class="page-wrapper">

        <!-- start preloader -->
        <div class="preloader">
            <div class="inner">
                <span class="icon"><i><img src="{{ asset('assets/revamp/images/bee.png') }}" alt=""></i></span>
            </div>
        </div>
        <!-- end preloader -->

        <!-- Start header -->
        @include('layouts.store-front-revamp.header-bar')
        <!-- end of header -->

        @yield('contents')

        <!-- start of tp-site-footer-section -->
        @include('layouts.store-front-revamp.footer')
        <!-- end of tp-site-footer-section -->

        <!-- Authentication modal section start -->
        @include('layouts.store-front-revamp.auth-modals')
        <!-- Authentication modal section end -->
    </div>
    <!-- end of page-wrapper -->


    @include('layouts.store-front-revamp.footer-assets')

</body>

</html>