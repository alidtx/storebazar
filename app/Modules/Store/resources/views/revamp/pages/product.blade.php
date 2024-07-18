@extends('layouts.store-front-revamp.landing')
@section('contents')
        <!-- start of breadcumb-section -->
        <div class="tp-breadcumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="tp-breadcumb-wrap">
                            <h2>“UREA”: Fertilizers for the Farmers</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of tp-breadcumb-section-->


        <!-- product-single-section  start-->
        <div class="product-single-section section-padding">
            <div class="container">
                <div class="product-details">
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <div class="product-single-img">
                                <div class="product-active owl-carousel">
                                    <div class="item">
                                        <img src="{{ asset('assets/revamp/images/product/image_1.png') }}" alt="">
                                    </div>
                                    <div class="item">
                                        <img src="{{ asset('assets/revamp/images/product/image_2.jpg') }}" alt="">
                                    </div>
                                    <div class="item">
                                        <img src="{{ asset('assets/revamp/images/product/image_2_1.jpg') }}" alt="">
                                    </div>
                                    <div class="item">
                                        <img src="{{ asset('assets/revamp/images/product/image_2_2.jpg') }}" alt="">
                                    </div>
                                    <div class="item">
                                        <img src="{{ asset('assets/revamp/images/product/image_3.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="product-thumbnil-active  owl-carousel">
                                    <div class="item">
                                        <img src="{{ asset('assets/revamp/images/product/image_1.jpg') }}" alt="">
                                    </div>
                                    <div class="item">
                                        <img src="{{ asset('assets/revamp/images/product/image_2.jpg') }}" alt="">
                                    </div>
                                    <div class="item">
                                        <img src="{{ asset('assets/revamp/images/product/image_2_1.jpg') }}" alt="">
                                    </div>
                                    <div class="item">
                                        <img src="{{ asset('assets/revamp/images/product/image_2_2.jpg') }}" alt="">
                                    </div>
                                    <div class="item">
                                        <img src="{{ asset('assets/revamp/images/product/image_3.jpg') }}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="product-single-content">
                                <h5>“UREA”: Fertilizers for the Farmers</h5>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
                                </p>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-tab-area">
                    <ul class="nav nav-mb-3 main-tab" id="tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="descripton-tab" data-bs-toggle="pill"
                                data-bs-target="#descripton" type="button" role="tab" aria-controls="descripton"
                                aria-selected="true">Origin and Collection</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="Information-tab" data-bs-toggle="pill"
                                data-bs-target="#Information" type="button" role="tab" aria-controls="Information"
                                aria-selected="false">Taste and Aroma</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="Ratings-tab" data-bs-toggle="pill" data-bs-target="#Ratings"
                                type="button" role="tab" aria-controls="Ratings" aria-selected="false">Quality and Hygiene</button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="descripton" role="tabpanel"
                            aria-labelledby="descripton-tab">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="Descriptions-item">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Ratings" role="tabpanel" aria-labelledby="Ratings-tab">
                            <div class="container">
                                <div class="rating-section">
                                    <div class="row">
                                        <div class="col-12">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="Information" role="tabpanel" aria-labelledby="Information-tab">
                            <div class="container">
                                <div class="Additional-wrap">
                                    <div class="row">
                                        <div class="col-12">
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="related-product">
            </div>
        </div>
        <!-- product-single-section  end-->
        <section class="product-area section-padding">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <div class="offer-img">
                            <img src="{{ asset('assets/revamp/images/product-3.png') }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="offer-wrap">
                            
                            <h5>Lorem Ipsum:</h5>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- product-area-end -->

@endsection