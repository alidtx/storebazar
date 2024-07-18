<footer class="tp-site-footer">
    <div class="tp-upper-footer">
        <div class="container">
            <div class="row">
                <div class="col col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="widget about-widget">
                        <div class="logo widget-title">
                            <a href="index.html"><img src="{{ asset('assets/revamp/images/logo.png') }}" alt="blog"></a>
                        </div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                    </div>
                </div>
                <div class="col col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="widget link-widget">
                        <div class="widget-title">
                            <h3>Quick Links</h3>
                        </div>
                        <ul>
                            <li><a href="{{ route('service-pages', ['slug'=>'about-us']) }}">About</a></li>
                            <li><a href="{{ route('service-pages', ['slug'=>'product']) }}">Product</a></li>
                            <li><a href="{{ url('category/honey') }}">Shop</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="widget tp-service-link-widget">
                        <div class="widget-title">
                            <h3>Contact </h3>
                        </div>
                        <div class="contact-ft">
                            <ul>
                                <li><i class="fi flaticon-pin"></i>93 B, New Eskaton Road
Dhaka-1000, Bangladesh</li>
                                <!-- <li><i class="fi flaticon-call"></i>+88 02 55667788</li>-->
                                <!-- <li><i class="fi flaticon-envelope"></i>futurebazar.honey@gmail.com</li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </div>
    <div class="tp-lower-footer">
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <p class="copyright"> Copyright &copy; 2024 <a href="#">sslwireless.com</a>.
                        All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-shape1">
        <i class="fi flaticon-honeycomb"></i>
    </div>
    <div class="footer-shape2">
        <i class="fi flaticon-honey-1"></i>
    </div>
</footer>