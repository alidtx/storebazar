<div class="nav-top-area sticky-top">
    <div class="container sm-none">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="mobile-nav">
                    <a href="/" class="logo">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" height="100%" width="200px">
                    </a>
                </div>
                <div class="left">
                    <a href="/">
                        <img src="{{ asset('assets/images/logo2.png') }}" alt="Logo" height="100%" width="200px">
                    </a>
                </div>
            </div>
            {{-- <div class="col-lg-6">
                <div class="middle">
                    <form action="{{ route('search.keyword') }}" method="get" id="searchByKeyword">
                        @csrf
                        <div class="form-group">
                            <div class="inner">
                                <select id="category" name="category">
                                    <option value="">সকল ক্যাটাগরি </option>
                                    @foreach ($categories as $category)
                                    @if($category->url_key != 'honey' && $category->url_key != 'মধু') @continue @endif
                                    @foreach ($category->categoryDetail as $details)
                                    @if($details->language_id == 1)
                                    <option value="{{$category->url_key}}"
                                        @if(request()->slug==$category->url_key) {{'selected'}} @endif
                                    > {{$details->name ?? ''}} </option>
                                    @endif
                                    @endforeach
                                    @endforeach
                                </select>
                            </div>
                            <input type="text" id="keywords" name="keywords" class="form-control" placeholder="কীওয়ার্ড দিয়ে খুজুন" value="{{ request()->keyword }}">
                            <button type="submit" class="btn search_keyword">
                                <i class='bx bx-search'></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div> --}}
            @if (auth()->check())
            @if (auth()->user()->user_type == 'admin')

            <div class="col-lg-6">
                <div class="right">
                    <ul>
                        {{-- <li>
                            <a class="reg" href="#." data-bs-toggle="modal" data-bs-target="#regModal" data-bs-whatever="@mdo">
                                রেজিস্ট্রেশন
                            </a>
                        </li> --}}
                        <li>
                            <a class="join" href="#." data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-whatever="@mdo">
                                লগইন
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            @endif
            @endif

            @guest


            <div class="col-lg-6">
                <div class="right">
                    <ul>
                        {{--<li>
                            <a class="reg" href="#." data-bs-toggle="modal" data-bs-target="#regModal" data-bs-whatever="@mdo">
                                রেজিস্ট্রেশন
                            </a>
                        </li>--}}
                        <li>
                            <a class="join" href="#." data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-whatever="@mdo">
                                লগইন
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            @endguest
            @if (auth()->check())
            @if (auth()->user()->customerDetails()->exists() || auth()->user()->sellerDetails()->exists())
            <div class="col-lg-6">
                <div class="right">
                    <ul>
                        <li>
                            <div class="dropdown notification">
                                <button type="button" class="btn wishlist cart-popup-btn" role="button" id="dropdownMenuLink2" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class='bx bxs-bell text-dark'></i>
                                    <span>{{$notifications->count()}}</span>
                                </button>

                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink2">
                                    <li class="px-3">
                                        <h6 class="mb-0 font-weight-medium"> বিজ্ঞপ্তি </h6>
                                    </li>
                                    @forelse($notifications as $notification)
                                    <li>
                                        <a class="dropdown-item viewNotifications" nid="{{ $notification->id }}" url="{{ $notification->redirect_url }}" href="#">
                                            <i class="bx bx-check-circle text-success"> </i> {{ $notification->message }}
                                        </a>
                                    </li>
                                    @empty
                                    <li><div class="p-4 text-center">কোন নতুন বিজ্ঞপ্তি নেই</div></li>
                                    @endforelse

                                </ul>
                            </div>
                        </li>

                        <li class="profile">
                            <div class="dropdown">
                                <a class="join dropdown-toggle prev" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="flaticon-round-account-button-with-user-inside"></i>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                                    <li class="border-bottom pb-2">
                                        <div class="profile-name">
                                            <p class="text-muted mb-0"> স্বাগতম !</p>
                                            <h6 class="mb-0 font-weight-medium"> {{ auth()->user()->name }} </h6>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{route('customer.profile')}}">
                                            <i class="bx bx-user"> </i> প্রোফাইল
                                        </a>
                                    </li>
                                    <!-- <li>
                                        <a class="dropdown-item" href="profile.html"> <i class="bx bx-file"> </i> Purchase Request </a>

                                    </li> -->
                                    <li>
                                        <a class="dropdown-item" href="{{ route('customer.profile',['parameters'=>'credentials']) }}"> <i class="bx bx-lock"> </i> পাসওয়ার্ড পরিবর্তন </a>
                                    </li>
                                    @if ( auth()->user()->sellerDetails()->doesntExist())
                                    <li>
                                        <a class="dropdown-item" href="{{ route('beSeller') }}"> <i class="bx bx-user"> </i> সেলার হিসেবে রেজিস্ট্রেশন </a>
                                    </li>
                                    @endif

                                    <li class="mb-2"><a class="dropdown-item" href="{{ route('customer.logout') }}"> <i class="bx bx-log-in"> </i> লগ আউট
                                     </a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            @endif
            @endif
        </div>
    </div>

    <!-- Mobile area -->
    <div class="container lg-none">
        <div class="d-flex align-items-center justify-content-between">
            <div class="mb-2">
                <a href="index.html">
                    <img src="{{ asset('assets/images/logo.png') }}" alt="Logo" width="70px">
                </a>
            </div>

            <div class="d-flex align-items-center mb-2">
                <div class="right">
                @if (auth()->check())
            @if (auth()->user()->user_type == 'admin')

            <div class="col-lg-3">
                <div class="right">
                    <ul>
                        {{--<li>
                            <a class="reg" href="#." data-bs-toggle="modal" data-bs-target="#regModal" data-bs-whatever="@mdo">
                                রেজিস্ট্রেশন
                            </a>
                        </li>--}}
                        <li>
                            <a class="join" href="#." data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-whatever="@mdo">
                                লগইন
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            @endif
            @endif

            @guest


            <div class="col-lg-6">
                <div class="right">
                    <ul>
                        {{--<li>
                            <a class="reg" href="#." data-bs-toggle="modal" data-bs-target="#regModal" data-bs-whatever="@mdo">
                                রেজিস্ট্রেশন
                            </a>
                        </li>--}}
                        <li>
                            <a class="join" href="#." data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-whatever="@mdo">
                                লগইন
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            @endguest
            @if (auth()->check())
            @if (auth()->user()->customerDetails()->exists() || auth()->user()->sellerDetails()->exists())
            <div class="col-lg-3">
                <div class="right">
                    <ul>
                        <li>
                            <div class="dropdown notification">
                                <button type="button" class="btn wishlist cart-popup-btn" role="button" id="dropdownMenuLink2" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class='bx bxs-bell text-dark'></i>
                                    <span>{{$notifications->count()}}</span>
                                </button>

                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink2">
                                    <li class="px-3">
                                        <h6 class="mb-0 font-weight-medium"> {{__("Notifications")}} </h6>
                                    </li>
                                    @forelse($notifications as $notification)
                                    <li>
                                        <a class="dropdown-item viewNotifications" nid="{{ $notification->id }}" url="{{ $notification->redirect_url }}" href="#">
                                            <i class="bx bx-check-circle text-success"> </i> {{ $notification->message }}
                                        </a>
                                    </li>
                                    @empty
                                    <li><div class="p-4 text-center">{{__("No New Notifications")}}</div></li>
                                    @endforelse

                                </ul>
                            </div>
                        </li>

                        <li class="profile">
                            <div class="dropdown">
                                <a class="join dropdown-toggle test" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="flaticon-round-account-button-with-user-inside"></i>
                                </a>

                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                                    <li class="border-bottom pb-2">
                                        <div class="profile-name">
                                            <p class="text-muted mb-0"> স্বাগতম !</p>
                                            <h6 class="mb-0 font-weight-medium"> {{ auth()->user()->name }} </h6>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{route('customer.profile')}}">
                                            <i class="bx bx-user"> </i> প্রোফাইল
                                        </a>
                                    </li>
                                    <!-- <li>
                                        <a class="dropdown-item" href="profile.html"> <i class="bx bx-file"> </i> Purchase Request </a>

                                    </li> -->
                                    <li>
                                        <a class="dropdown-item" href="{{ route('customer.profile',['parameters'=>'credentials']) }}"> <i class="bx bx-lock"> </i> পাসওয়ার্ড পরিবর্তন </a>
                                    </li>

                                    @if ( auth()->user()->sellerDetails()->doesntExist())
                                    <li>
                                        <a class="dropdown-item" href="{{ route('beSeller') }}"> <i class="bx bx-user"> </i> সেলার হিসেবে রেজিস্ট্রেশন </a>
                                    </li>
                                    @endif

                                    <li class="mb-2"><a class="dropdown-item" href="{{ route('customer.logout') }}"> <i class="bx bx-log-in"> </i> লগ আউট </a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            @endif
            @endif
                </div>
            </div>
        </div>

        {{-- <div>
            <div class="middle">
                <form>
                    <div class="form-group d-flex align-items-center">
                        <div class="inner">
                            <select>
                                <option>All Categories</option>
                                <option>রিসাইকেল প্লাস্টিক</option>
                                <option>মধু</option>
                                <option>পাটজাত পণ্য</option>
                                <option>সবজি</option>
                            </select>
                        </div>
                        <input type="text" class="form-control" placeholder="Search Your Keywords">
                        <button type="submit" class="btn">
                            <i class='bx bx-search'></i>
                        </button>
                    </div>
                </form>
            </div>
        </div> --}}
    </div>
</div>


@include('layouts.partial._login-modal')
@include('layouts.partial._registartion-modal')
@include('layouts.partial._forget-password')

<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<script>
    jQuery(document).ready(function($) {
        $(document).on('click','.viewNotifications', function() {
            var redirectUrl = $(this).attr('url')
            var nid = $(this).attr('nid')

            $.ajax({
                type: 'POST',
                url: '{{ route("user-notification-view") }}',
                data: { redirectUrl:redirectUrl,nid:nid },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function() {
                    window.location.href = redirectUrl;
                }
            })
        })
        
    })
</script>