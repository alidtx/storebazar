{{--<div class="header-area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-sm-6 col-lg-6 sm-none">
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
            <div class="col-sm-6 col-lg-6 sm-none">
                <div class="d-flex align-items-center justify-content-end">
                    @if (auth()->check())
                    @if ( auth()->user()->sellerDetails()->doesntExist())
                    <div class="me-4">
                        <a href="{{route('beSeller')}}" class="text-white">
                            <i class="flaticon-round-account-button-with-user-inside me-1"> </i>
                            <span> সেলার রেজিস্ট্রেশন </span>
                        </a>
                    </div>
                    @endif
                    @else
                    <div class="me-4">
                        <a href="{{route('beSeller')}}" class="text-white">
                            <i class="flaticon-round-account-button-with-user-inside me-1"> </i>
                            <span> সেলার রেজিস্ট্রেশন </span>
                        </a>
                    </div>
                    @endif
                    <div class="right d-none">
                        <div class="inner">
                            <div class="lang bg-white px-2 py-1 border-radius-5 font-size-13">
                                <div class="dropdown">
                                    <a class="dropdown-toggle text-dark" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        <img class="lang-flag" src="{{ asset('assets/images/Flag_of_Bangladesh.webp') }}" /> Bangla
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-end text-dark py-1 mt-2" aria-labelledby="dropdownMenuLink">
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <img class="lang-flag" src="{{ asset('assets/images/Flag_of_United_Kingdom.webp') }}" /> English
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
</div>--}}

{{-- <div class="header-area lg-none">
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

            <div class="d-flex align-items-center d-none">
                <div class="lang pt-2">
                    <div class="lang bg-white px-2 py-1 border-radius-5 font-size-12">
                        <div class="dropdown">
                            <a class="dropdown-toggle text-dark" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <img class="lang-flag" src="{{ asset('assets/images/Flag_of_Bangladesh.webp') }}" /> Bangla
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end text-dark py-1 mt-2" aria-labelledby="dropdownMenuLink">
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <img class="lang-flag" src="{{ asset('assets/images/Flag_of_United_Kingdom.webp') }}" /> English
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- added from previous header section -->
            <div class="d-flex align-items-center justify-content-end lg-none">
                @if (auth()->check())
                    @if ( auth()->user()->sellerDetails()->doesntExist())
                    <div class="me-4">
                        <a href="{{route('beSeller')}}" class="text-white">
                            <i class="flaticon-round-account-button-with-user-inside me-1"> </i>
                            <span> সেলার রেজিস্ট্রেশন </span>
                        </a>
                    </div>
                    @endif
                @else
                    <div class="me-4">
                        <a href="{{route('beSeller')}}" class="text-white">
                            <i class="flaticon-round-account-button-with-user-inside me-1"> </i>
                            <span> সেলার রেজিস্ট্রেশন </span>
                        </a>
                    </div>
                @endif
                <div class="right d-none">
                    <div class="inner">
                        <div class="lang bg-white px-2 py-1 border-radius-5 font-size-13">
                            <div class="dropdown">
                                <a class="dropdown-toggle text-dark" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img class="lang-flag" src="{{ asset('assets/images/Flag_of_Bangladesh.webp') }}" /> Bangla
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end text-dark py-1 mt-2" aria-labelledby="dropdownMenuLink">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <img class="lang-flag" src="{{ asset('assets/images/Flag_of_United_Kingdom.webp') }}" /> English
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
    </div>
</div> --}}