@extends('layouts.store-front-revamp.landing')
@section('contents')

<!-- start of breadcumb-section -->
<div class="tp-breadcumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="tp-breadcumb-wrap">
                    <h2>News & Media</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end of tp-breadcumb-section-->


<!-- start blog-pg-section -->
<section class="blog-pg-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col col-lg-10 offset-lg-1">
                <div class="blog-posts clearfix">
                    <div class="post">
                       <div class="entry-media">
                            <img src="{{ asset('assets/revamp/images/news-media/1.jpg') }}" alt >
                        </div>
                        <div class="details">
                            <h3><a href="{{ route('news-media', ['id'=>'1']) }}">Lorem Ipsum</a></h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            <a href="{{ route('news-media', ['id'=>'1']) }}" class="read-more">Read More..</a>
                        </div>
                    </div>
                    <div class="post">
                        <div class="entry-media">
                            <img src="{{ asset('assets/revamp/images/news-media/2.png') }}" alt height="400">
                        </div>
                        <div class="details">
                            <h3><a href="{{ route('news-media', ['id'=>'2']) }}">Lorem Ipsum is simply dummy text of the printing and typesetting industry</a></h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            <a href="{{ route('news-media', ['id'=>'2']) }}" class="read-more">Read More..</a>
                        </div>
                    </div>
                    <div class="post format-video">
                         <div class="entry-media">
                            <img src="{{ asset('assets/revamp/images/news-media/img-3.png') }}" alt height="400">
                        </div>
                        <div class="details">
                            <h3><a href="{{ route('news-media', ['id'=>'3']) }}">Lorem Ipsum is simply dummy text of the printing and typesetting industry</a></h3>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            <a href="{{ route('news-media', ['id'=>'3']) }}" class="read-more">Read More..</a>
                        </div>
                    </div>
                    
                    {{--<div class="pagination-wrapper pagination-wrapper-left">
                        <ul class="pg-pagination">
                            <li>
                                <a href="blog-fullwidth.html#" aria-label="Previous">
                                    <i class="ti-arrow-left"></i>
                                </a>
                            </li>
                            <li class="active"><a href="blog-fullwidth.html#">1</a></li>
                            <li><a href="blog-fullwidth.html#">2</a></li>
                            <li><a href="blog-fullwidth.html#">3</a></li>
                            <li>
                                <a href="blog-fullwidth.html#" aria-label="Next">
                                    <i class="ti-arrow-right"></i>
                                </a>
                            </li>
                        </ul>
                    </div>--}}
                </div>
            </div>
        </div>
    </div> <!-- end container -->
</section>
<!-- end blog-pg-section -->

@endsection