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
                            <img src="{{ asset('assets/revamp/images/news-media/3.jpg') }}" alt>
                        </div>
                        <h2>CHT farmers reap profits as sweet as honey through beekeeping</h2>
                        <p>Located in the south-eastern part of Bangladesh, Chittagong Hill Tracts is a unique terrain that is home to at least eleven ethnic groups. Although the hills are abundant with natural resources and fertile grounds, the remoteness of the area and long-standing political conflicts have left the people of CHT struggling with poverty. Moreover, the unique, natural environment and ecosystems of CHT remain especially vulnerable to pollution and industrialization.</p>
                        
                        <p>Under such circumstances, United Nations Development Programme (UNDP)’s Strengthening Inclusive Development in Chittagong Hill Tracts (SID-CHT) project has been active in the area since 2016, with a focus on inclusiveness, climate action, social development and capacity building of institutions. In an effort to introduce climate-friendly, alternative livelihoods to people, project trained 400 people from different households over four days on the topic of beekeeping and honey production. 
                        After the training concluded, the families were provided 14 necessary materials and equipment for beekeeping. Moni Chakma, who was part of the training programme, said, “My husband, son and I have been beekeeping together. We really enjoy this activity and we’ve been able to make money by selling honey as well.” <br>
                        These beekeeping initiatives take place in and around orchards, flower fields and agricultural land. With the rapid destruction of the environment, bees are becoming more and more endangered. This initiative by SID-CHT not only creates additional income opportunities for left-behind communities but also helps an important species thrive. The bees also help pollenise plants and crops, leaving a positive effect on CHT’s ecosystem.
                        </p>
                        <p>The farmers expressed immense satisfaction regarding the initiative, mentioning that each kilogram of honey can be sold for Tk 1,200-1,500. “This honey is pure and free of preservatives. There’s a good demand for this in the market. After we began beekeeping, more and more people in our community have grown interested in the venture,” said Thuisaprue Marma of Nyong Karbari Para, Khagrachari Sadar Upazila.
                            <br>
                        Mongsuipru Chowdhury Opu, chairman of Khagrachhari Hill District Council, said, “SID-CHT’s initiative on beekeeping has created sustainable employment opportunities for our people. It has been very profitable and training more farmers will surely yield even better results.”
                        </p>

                        <p>By the end of the SID-CHT project in September 2021, it is expected that 5,000 communities with 150,000 rural and urban households will be direct beneficiaries. In addition, 47,500 poor marginal farming communities will have increased access to resilient livelihoods through this project, which is supported by Danish International Development Agency and Government of Bangladesh alongside UNDP Bangladesh. The project is implemented in all 121 Unions of 26 Upazilas in three hill districts of Rangamati, Khagrachari and Bandarban</p>
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