@extends('layouts.store-front-revamp.landing')
@section('contents')

<!-- start of hero -->
<section class="hero hero-style-2">
    <div class="hero-slider">
        <div class="slide">
            <img src="{{ asset('assets/revamp/images/slider/intro_image.jpg') }}" alt class="slider-bg">
            <div class="container">
                <div class="row">
                    <div class="col col-lg-12 slide-caption">
                        <div class="slide-title">
                            <h2><span>Agrochemicals</span> for the <span>Farmers</span></h2>
                        </div>
                        <div class="btns">
                            <a href="{{ url('category/honey') }}" class="btn theme-btn">Shop Now <i
                                    class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide">
            <img src="{{ asset('assets/revamp/images/slider/slide-3.jpg') }}" alt class="slider-bg">
            <div class="container">
                <div class="row">
                    <div class="col col-lg-5 slide-caption">
                        <div class="slide-title">
                            <h2><span>Fresh</span> Organic <span>Honey</span></h2>
                        </div>
                        <div class="btns">
                            <a href="" class="btn theme-btn">Shop Now <i
                                    class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end of hero slider -->


<!-- start about-section -->
<section class="about-section section-padding p-t-0">
    <div class="container">
        <div class="row align-items-center">
            <div class="col col-lg-5 col-12">
                <div class="video-area">
                    <img src="{{ asset('assets/revamp/images/about_us.jpg') }}" alt>
                    {{--<div class="video-holder">
                        <a href="https://www.youtube.com/embed/Z54bL6kjyOI" class="video-btn" data-type="iframe"
                            tabindex="0"><i class="fi flaticon-play-button"></i></a>
                    </div>--}}
                </div>
            </div>
            <div class="col col-lg-7 col-12">
                <div class="about-area">
                    <div class="about-wrap">
                        <div class="about-title">
                            <small>About Us</small>
                            <h2>A <span>catalyst </span>for positive change</h2>
                        </div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                        <a href="{{ route('service-pages', ['slug'=>'about-us']) }}" class="btn theme-btn" tabindex="0">More About<i
                                class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end container -->
</section>
<!-- end about-section -->

<!-- product-area-start -->
<section class="product-area section-padding">
    <div class="container">
        <div class="row g-0">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-title">
                    <h2>Proudly made for <span>Farmers!</span></h2>
                </div>
            </div>
        </div>
        
        <div class="product-wrap">
            <div class="row align-items-center">
                <div class="col-8 offset-2">
                    <div class="row g-0">
                        <div class="col-lg-6 col-sm-12">
                            <div class="product-item mb-0">
                                <div class="product-img">
                                    <img src="{{ asset('assets/revamp/images/product/proudly.png') }}" alt="" height="543">
                                    <ul>
                                        <li>
                                            <a href="{{ url('category/honey') }}" class="btn theme-btn" tabindex="0">Visit Shop<i class="fa fa-angle-double-right"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                        
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="product-item mb-0">                
                                <div class="product-content text-center">
                                    <h3><a href="product.html">Urea</a></h3>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                                        
            </div>
        </div>
    </div>
</section>
<!-- product-area-end -->

<!-- service-area-end -->
<div class="service-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="service-item">
                    <div class="service-icon">
                        <span><img draggable="false" src="{{ asset('assets/revamp/images/support/1.png') }}" alt=""></span>
                    </div>
                    <div class="service-icon-text">
                        <h2>Loren Ipsum</h2>
                        <span>Loren Ipsum</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="service-item">
                    <div class="service-icon">
                        <span><img draggable="false" src="{{ asset('assets/revamp/images/support/2.png') }}" alt=""></span>
                    </div>
                    <div class="service-icon-text">
                        <h2>Loren Ipsum</h2>
                        <span>Loren Ipsum</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="service-item">
                    <div class="service-icon">
                        <span><img draggable="false" src="{{ asset('assets/revamp/images/support/3.png') }}" alt=""></span>
                    </div>
                    <div class="service-icon-text">
                        <h2>Loren Ipsum</h2>
                        <span>Loren Ipsum</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- service-area-end -->

<!-- testimonial-area-start -->
<section class="testimonial-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-title">
                    <h2>Impact <span>Stories</span></h2>
                </div>
            </div>
        </div>
        <div class="testimonial-wrap">
            <div class="testimonial-active">
                <div class="testimonial-item">
                    <div class="testimonial-img">
                        <img src="{{ asset('assets/revamp/images/impact.jpg') }}" alt="">
                        <div class="t-quote">
                            <i class="fi flaticon-left-quote"></i>
                        </div>
                    </div>
                    <div class="testimonial-content">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                        <a href="{{ route('service-pages', ['slug'=>'impact-stories']) }}" class="btn theme-btn" tabindex="0">Full Story<i class="fa fa-angle-double-right"></i></a>
                        <div class="t-content-quote">
                            <i class="fi flaticon-left-quote"></i>
                        </div>
                        
                    </div>
                </div>

                {{-- <div class="testimonial-item">
                    <div class="testimonial-img">
                        <img src="{{ asset('assets/revamp/images/testimonial/2.png') }}" alt="">
                        <div class="t-quote">
                            <i class="fi flaticon-left-quote"></i>
                        </div>
                    </div>
                    <div class="testimonial-content">
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry
                            has been the industry's standard dummy text ever since the 1500s unknown
                            printer took a galley of type and scrambled it to make a type specimen
                            book has survived not has been the industry's standard consectetur adipisicing elit
                            only five centuries the industry's standard consectetur.Lorem Ipsum is simply dummy text of the printing and typesetting industry
                            has been the industry's standard dummy text ever since the 1500s unknown
                            printer took a galley of type and scrambled it to make a type specimen
                            book has survived not has been the industry's standard consectetur adipisicing elit
                            only five centuries the industry's standard consectetur.</p>
                        <a href="{{ route('service-pages', ['slug'=>'impact-stories']) }}" class="btn theme-btn" tabindex="0">Full Story<i class="fa fa-angle-double-right"></i></a>
                        <div class="t-content-quote">
                            <i class="fi flaticon-left-quote"></i>
                        </div>
                        
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</section>
<!-- testimonial-area-end -->

<!-- news and media -area-start -->
@include('layouts.store-front-revamp.news-medias')
<!-- news and media -area-end -->

<!-- client-area start -->
<section class="client-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-title">
                    <h2>Our <span>Partners</span></h2>
                </div>
                
            </div>
        </div>
        <div class="client-item">
            <div class="client-carousel owl-carousel">
                <img src="{{ asset('assets/revamp/images/client/commerz.png') }}" alt="clinet">
                <img src="{{ asset('assets/revamp/images/client/logo.png') }}" alt="clinet">
                <!-- <img src="{{ asset('assets/revamp/images/client/img-3.svg') }}" alt="clinet">
                <img src="{{ asset('assets/revamp/images/client/img-4.svg') }}" alt="clinet">
                <img src="{{ asset('assets/revamp/images/client/img-5.svg') }}" alt="clinet"> -->
            </div>
        </div>
        {{--<div class="client-item">
            <div class="client-carousel-new our-partners-section d-flex justify-content-center">
                <img src="{{ asset('assets/revamp/images/client/img-1.svg') }}" alt="clinet">
                <img src="{{ asset('assets/revamp/images/client/img-2.svg') }}" alt="clinet">
                <img src="{{ asset('assets/revamp/images/client/img-3.svg') }}" alt="clinet">
                <img src="{{ asset('assets/revamp/images/client/img-4.svg') }}" alt="clinet">
                <img src="{{ asset('assets/revamp/images/client/img-5.svg') }}" alt="clinet">
            </div>
        </div>--}}
        <div class="client-item mt-5">
            <div class="text-center">
                <img src="{{ asset('assets/images/powerd.png') }}" width="280" height="auto" alt="clinet">
            </div>
        </div>
    </div>
</section>
<!-- client-area end -->

@endsection