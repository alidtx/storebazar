@extends('layouts.store-front.master')
@section('content')


@include('layouts.store-front.header-bar')
@include('layouts.store-front.navbar')
<style>
    .support-item i {
        width: 70px!important;
        height: 70px!important;
        top: 14px!important;
        font-size: 24px!important;
        line-height: 50px!important;
    }
    .support-item h3 { margin-bottom:0 !important;margin-top:8px!important}

    @media only screen and (max-width: 767px) {
        .banner-area-two .banner-item {
            height: 150px !important;  
            border-radius: 10px !important
        }
    }
    .banner-area-two .banner-item { border-radius: 10px !important;}
</style>

<div class="wrapper">

    <div class="banner-area-two">
        <div class="banner-slider owl-theme owl-carousel">
            <div class="banner-item" style="background: url('assets/images/banner/sliders-01.jpg') no-repeat top center fixed;background-size:cover">
            </div>
            <div class="banner-item" style="background: url('assets/images/banner/sliders-02.jpg') no-repeat top center fixed;background-size:cover">
            </div>
            <div class="banner-item" style="background: url('assets/images/banner/sliders-03.jpg') no-repeat top center fixed;background-size:cover">
            </div>
        </div>
    </div>
<!-- 
    <div class="products-area two pb-50">
        <div class="container">
            <a class="common-btn" href="{{route('store.catalog','honey')}}">
                        এখনই কিনুন
                    <img src="{{ asset('assets/images/shape1.png') }}" alt="Shape">
                    <img src="{{ asset('assets/images/shape2.png') }}" alt="Shape">
                </a>
        </div>
    </div> -->

    <div class="products-area two pb-50">
        <div class="container">
            <div class="row">
            @foreach ($categoryList as $category)
                <div class="col-lg-3 offset-lg-4 col-sm-3 cat-thumb">
                    <div class="products-thumb">
                        <a href="{{route('store.catalog',$category['url_key'])}}">
                            <img src="assets/images/shape-1-1.png" alt="Shape">
                            <img src="assets/images/shape-2-2.png" alt="Shape">
                            <img class="cat-img-2 mb-3" src="{{ asset($category['image']) }}" alt="">
                            <span>{{ $category['detail_name'] }}</span>
                        </a>
                    </div>
                </div>
            @endforeach


                <!-- <div class="col-lg-3 col-sm-3 cat-thumb">
                    <div class="products-thumb">
                        <a href="{{route('store.coming.soon')}}">
                            <img src="assets/images/shape-1-1.png" alt="Shape">
                            <img src="assets/images/shape-2-2.png" alt="Shape">

                            <img class="cat-img-2 mb-3" src="assets/images/recycle.svg" alt="">
                            <span>রিসাইকেল প্লাস্টিক</span>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-3 cat-thumb">
                    <div class="products-thumb">
                        <a href="{{route('store.catalog','honey')}}">
                            <img src="assets/images/shape-1-1.png" alt="Shape">
                            <img src="assets/images/shape-2-2.png" alt="Shape">
                            <img class="cat-img-2 mb-3" src="assets/images/honey.svg" alt="">
                            <span>মধু</span>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-3 cat-thumb">
                    <div class="products-thumb">
                        <a href="{{route('store.coming.soon')}}">
                            <img src="assets/images/shape-1-1.png" alt="Shape">
                            <img src="assets/images/shape-2-2.png" alt="Shape">

                            <img class="cat-img-2 mb-3" src="assets/images/carpet.svg" alt="">
                            <span>পাটজাত পণ্য</span>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-3 cat-thumb">
                    <div class="products-thumb">
                        <a href="{{route('store.coming.soon')}}">
                            <img src="assets/images/shape-1-1.png" alt="Shape">
                            <img src="assets/images/shape-2-2.png" alt="Shape">
                            <img class="cat-img-2 mb-3" src="assets/images/vegetable.svg" alt="">
                            <span> সবজি</span>
                        </a>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

    <section class="about-area pt-100 bg-white" id="about-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-content">
                        <div class="top">
                            <h2>আমাদের সম্পর্কে</h2>
                            <p>

                            পার্বত্য চট্টগ্রাম বৈচিত্র্যময় অধিবাসীদের বাসস্থান। এখানকার বাসিন্দাদের হাতের নাগালে আছে প্রাকৃতিক সম্পদ এবং উর্বর জমি, যা তাদেরকে জুম চাষ, কাপড় বুনন এবং হস্তশিল্প তৈরিতে পারদর্শী হতে সহায়তা করে। মধু সংগ্রহ ও বিক্রি খাগড়াছড়ি জেলার বাসিন্দাদের একটি সাধারণ জীবিকা। কিন্তু পর্যাপ্ত শিল্পায়ন সুবিধা না থাকায় মধু উৎপাদনকারিরা পার্বত্য এলাকার বাইরে তাদের ব্যবসাকে এগিয়ে নিতে বাধাপ্রাপ্ত হন।  
                            </p>
                            <p>
                            ইউনাইটেড নেশনস ডেভেলপমেন্ট প্রোগ্রামের (ইউএনডিপি) অন্তর্ভুক্ত সিআইডি-সিএইচটি প্রকল্পের মাধ্যমে প্রশিক্ষণ প্রাপ্ত পার্বত্য এলাকার বিভিন্ন পরিবারের ৪০০ সদস্য মৌমাছি পালন ও মধু উৎপাদনে দক্ষ। মৌমাছিপালন ভবিষ্যত কর্মসংস্থানের ক্ষেত্র হিসেবে সম্ভাবনাময়, বিশেষ করে প্রযুক্তির এই যুগে।  
                            </p>
                            <p> 
                            ফিউচারবাজার একটি অনলাইন বি-টু-বি প্ল্যাটফর্ম, যা পার্বত্য চট্টগ্রামের মধু উৎপাদনকারীদের শহরের পাইকারি ক্রেতাদের সাথে যুক্ত করিয়ে দেয়। সঠিক ক্রেতার সাথে যোগাযোগ স্থাপন করতে ব্যর্থ হওয়ায় পার্বত্য চট্টগ্রামের মধু বিক্রেতারা তাদের পন্যের সঠিক মূল্য পায় না। ফিউচারবাজার পার্বত্য এলাকার মধু উৎপাদনকারীদের সাথে পাইকারি ক্রেতাদের সরাসরি যোগাযোগ স্থাপন করায়, পন্যের সঠিক মূল্য নির্ধারন দ্বি-পাক্ষিক সমঝোতায় হবে ও এই জীবিকার সাথে জড়িত পরিবারগুলির জীবনমান হবে উন্নত। ফিউচারবাজার একটি আদর্শ মডেল যার থেকে মধু বিক্রেতারা লাভবান হবার পাশাপাশি ক্রেতারা খাঁটি পার্বত্য চট্টগ্রামের মধু উপভোগ করতে পারবে। 
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-img">
                        <div class="ps-4">
                            <!-- <img width="590px" style="width: 590px!important;height: 400px !important;" src="assets/images/undp-1.png" alt="About"> -->
                            <img width="590px" style="width: 590px!important;" src="assets/images/undp-1-new.jpeg" alt="About">
                        </div>

                        <!-- <img width="285px" style="width: 285px!important;height: 229px !important;" src="assets/images/undp-2.png" alt="About">
                        <img width="230px" style="width: 230px!important; height:244px!important" src="assets/images/undp-3.png" alt="About"> -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="support-area pt-5 pb-70 bg-light">
        <div class="container">
            <div class="row justify-content-center mb-4">
                <div class="col-lg-6 text-center">
                    <h2 class="font-size-40">সুবিধাসমূহ</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-6 col-lg-4">
                    <div class="support-item two">
                        <i class="far fa-handshake"></i>
                        <h3>সহজে কেনাবেচার প্লাটফর্ম</h3>
                        <!-- <p>Lorem ipsum dolor sit amet, cons etetur sadipscing elitr</p> -->
                        <img src="assets/images/support-shape1.png" alt="Shape">
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="support-item three">
                        <i class="bx bx-box"></i>

                        <h3>পণ্য স্টক করার ঝামেলা নেই</h3>
                        <!-- <p>Lorem ipsum dolor sit amet, cons etetur sadipscing elitr</p> -->
                        <img src="assets/images/support-shape1.png" alt="Shape">
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="support-item four">
                        <i class="bx bx-window-close"></i>
                        <h3>মার্কেটিং এর আলাদা খরচ নেই</h3>
                        <!-- <p>Lorem ipsum dolor sit amet, cons etetur sadipscing elitr</p> -->
                        <img src="assets/images/support-shape1.png" alt="Shape">
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
<!--Footer End-->