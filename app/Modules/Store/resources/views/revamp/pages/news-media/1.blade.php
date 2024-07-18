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


<!-- start blog-single-section -->
<section class="blog-single-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col col-lg-10 offset-lg-1">
                <div class="blog-content clearfix">
                    <div class="post">
                        <div class="entry-media mb-5">
                            <img src="{{ asset('assets/revamp/images/news-media/1.jpg') }}" alt>
                        </div>
                        <h2>UNDP, SSL Wireless team up for enabling CMSME through advanced technology</h2>
                        <p>The United Nations Development Programme (UNDP) and SSL Wireless signed an agreement for FutureNation programme to enable CMSMEs of Bangladesh through advanced Technology and access to finance. </p>
                        <p>Sudipto Mukerjee, Resident Representative of UNDP Bangladesh, and Sayeeful Islam, Managing Director of SSL Wireless, inked the partnership on behalf of their respective organisations at UNDP Bangladesh Office, Dhaka on 21 July, reads a press release.</p>
                        <p>Sudipto Mukerjee said, 'I am very pleased to sign the partnership agreement with SSL Wireless today to come together with a common purpose – to face the post-pandemic frontier challenges, especially generating economic opportunities for the youth who need it the most.</p>
                        <p>Sayeeful Islam said, 'If you want to change the world, you must start with a big ambition. SSL has found many common grounds with UNDP for the digital enablement of CMSMEs of Bangladesh. Together, we can help uplift many ultra-poor people from poverty by giving them an easy way in harnessing digital technology.'</p>
                        <p>FutureNation, an alliance of the private, public, and development sectors, is created to accelerate the Nation's future economic growth by enhancing the skills and potential of youth by identifying opportunities for development, employment, entrepreneurship, and investment in the post-pandemic situation. </p>

                        <p>
                        Senior officials from UNDP and SSL Wireless were present at the signing ceremony.
                        </p>
                    </div>


                {{--   <div class="more-posts clearfix">
                        <div class="previous-post">
                            <a href="blog-single-fullwidth.html#">
                                <span class="post-control-link">Previous</span>
                            </a>
                        </div>
                        <div class="next-post">
                            <a href="0.html">
                                <span class="post-control-link">Next post</span>
                            </a>
                        </div>
                    </div> --}} <!-- end more-posts -->
                </div>
            </div>
        </div>
    </div> <!-- end container -->
</section>
        <!-- end blog-single-section -->

@endsection