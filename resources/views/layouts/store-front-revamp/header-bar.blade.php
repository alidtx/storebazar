<header id="header" class="site-header header-style-2">
    <nav class="navigation navbar navbar-expand-lg">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggler open-btn">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar first-angle"></span>
                            <span class="icon-bar middle-angle"></span>
                            <span class="icon-bar last-angle"></span>
                        </button>
                        <a class="navbar-brand" href="{{url('')}}"><img src="{{ asset('assets/revamp/images/logo.png') }}"
                                alt=""></a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div id="navbar" class="collapse navbar-collapse navigation-holder">
                        <a class="menu-close" href="index.html#"><i class="fi flaticon-cancel"></i></a>
                        <ul class="nav navbar-nav me-auto mb-2 mb-lg-0" style="margin: 0 auto;">
                            <li><a class="{{ Request::path() == '/' ? 'active' : '' }}" href="{{url('')}}">Home</a></li>
                            <li><a class="{{ str_contains(request()->url(), 'info/about-us') == true ? 'active' : '' }}" href="{{ route('service-pages', ['slug'=>'about-us']) }}">About</a></li>
                            <li><a class="{{ str_contains(request()->url(), 'info/product') == true ? 'active' : '' }}" href="{{ route('service-pages', ['slug'=>'product']) }}">Product</a></li>
                            <li><a class="{{ str_contains(request()->url(), 'category/honey') == true ? 'active' : '' }}" href="{{ url('category/honey') }}">Shop</a></li>
                            <li><a class="{{ str_contains(request()->url(), 'info/how-we-work') == true ? 'active' : '' }}" href="{{ route('service-pages', ['slug'=>'how-we-work']) }}">How We Work</a></li>
                            {{-- <li><a class="{{ str_contains(request()->url(), 'info/how-we-work') == true ? 'active' : '' }}" href="{{ route('service-pages', ['slug'=>'how-we-work']) }}">How </a></li> --}}
                            <li class="menu-item-has-children">
                                <a href="#" class="{{ str_contains(request()->url(), 'info/impact-stories') == true ? 'active' : '' }}">Impact</a>
                                <ul class="sub-menu">
                                    <li><a class="{{ str_contains(request()->url(), 'info/impact-stories') == true ? 'active' : '' }}" href="{{ route('service-pages', ['slug'=>'impact-stories']) }}">Impact Stories</a></li>
                                    <li><a href="{{ route('service-pages', ['slug'=>'news-media']) }}">News & Media</a></li>
                                </ul>
                            </li>
                            
                            {{-- <li><a class="{{ str_contains(request()->url(), 'info/impact-stories') == true ? 'active' : '' }}" href="{{ route('service-pages', ['slug'=>'impact-stories']) }}">Impact</a></li> --}}
                            {{-- <li><a class="{{ str_contains(request()->url(), 'info/contact-us') == true ? 'active' : '' }}" href="{{ route('service-pages', ['slug'=>'contact-us']) }}">Contact</a></li> --}}
                        </ul>
                    </div><!-- end of nav-collapse -->
                </div>

                @include('layouts.store-front-revamp.auth-nav')

            </div>
        </div><!-- end of container -->
    </nav>
</header>
