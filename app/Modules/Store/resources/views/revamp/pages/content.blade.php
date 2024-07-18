@extends('layouts.store-front-revamp.landing')
@section('contents')
<div class="tp-breadcumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="tp-breadcumb-wrap">
                    <h2>{{ucfirst($cms->cmsDetails[0]?->title)}}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="{{ ($slug=='contact-us') ? 'contact-pg-contact-section section-padding' : 'blog-single-section section-padding' }}">
    <div class="container">
        <div class="product-single-section">
    <div class="container"> 
        {!! $cms->cmsDetails[0]?->content !!}
    </div> 
</section>
@endsection

{{-- //start  --}}










