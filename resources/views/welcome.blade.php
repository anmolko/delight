@extends('frontend.layouts.master')
@section('title') Home  @endsection
@section('styles')

@endsection
@section('content')

<!-- Banner Section -->
    <section class="banner-section">
        <div class="banner-carousel owl-carousel owl-theme">
            <!-- Slide Item -->
            <div class="slide-item">
                <div class="image-layer" style="background-image:url({{asset('assets/frontend/images/main-slider/1.jpg')}})"></div>
                <div class="content-box">
                    <div class="content">
                        <div class="auto-container">
                            <span class="title">Welcome To Wooder</span>
                            <h2>Quality Wooden<br> On Your Demond</h2>
                            <div class="text">From 1984, we have worked tirelessly to earan our reputation for <br>quality and dependability in all wooden products we offer.</div>
                            <div class="btn-box">
                                <a href="#" class="theme-btn btn-style-two"><span class="btn-title">Check Service</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide Item -->
            <div class="slide-item">
                <div class="image-layer" style="background-image:url({{asset('assets/frontend/images/main-slider/2.jpg')}})"></div>
                <div class="content-box">
                    <div class="content">
                        <div class="auto-container">
                            <span class="title">Welcome To Wooder</span>
                            <h2>We give solution to<br> need your carpenter</h2>
                            <div class="text">From 1984, we have worked tirelessly to earan our reputation for <br>quality and dependability in all wooden products we offer.</div>
                            <div class="btn-box">
                                <a href="#" class="theme-btn btn-style-two"><span class="btn-title">Check Service</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--END Banner Section -->

    <!-- About Us -->
    <section class="about-us">
        <div class="auto-container">
            <div class="row clearfix">
                <!-- Content Column -->
                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="sec-title">
                            <h2>About Us</h2>
                        </div>
                        <div class="about-years"><span class="years">35</span><h3>Years Of Experience</h3></div>
                        <div class="text-box">
                            <p>Our commitment to bring <a href="#">professionalism</a>, good service & trust to the home repair service & maintenance business. We take immense pride in sending some of the most of professional handymen to yours homes to fix things that aren't workings. </p>
                        </div>
                        <ul class="list-style-one">
                            <li>Quis nostrud exer citation.</li>
                            <li>Exercitation ullamco laboris nis.</li>
                            <li>Commodo consequat duis autex.</li>
                        </ul>
                        <div class="bottom-box clearfix">
                            <div class="signature"><img src="{{asset('assets/frontend/images/resource/signature.png')}}" alt=""></div>
                            <h4 class="name">Virgina Pankow <span>Carpenter & Founder</span></h4>
                            <div class="btn-box">
                                <a href="#" class="theme-btn btn-style-one"><span class="btn-title">Read More</span></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="video-box wow fadeIn">
                            <figure class="image"><img src="{{asset('assets/frontend/images/resource/about-us.jpg')}}" alt=""></figure>
                            <a href="https://www.youtube.com/watch?v=Fvae8nxzVz4" class="play-now" data-fancybox="gallery" data-caption=""><i class="icon flaticon-play-button-3" aria-hidden="true"></i><span class="ripple"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End About Us -->

    <!-- Services Section -->
    <section class="services-section">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="sec-title">
                        <h2>Our Services</h2>
                        <div class="text">What We Provide For You check now and deside it<br> do you want now this</div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="right-btn text-right">
                        <a href="#" class="theme-btn btn-style-two"><span class="btn-title">All Services</span></a>
                    </div>
                </div>
            </div>

            <div class="carousel-outer">
                <!-- Services Carousel -->
                <div class="services-carousel owl-carousel owl-theme">
                    <!-- service Block -->
                    <div class="service-block">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><a href="#"><img src="{{asset('assets/frontend/images/resource/service-1.jpg')}}" alt=""></a></figure>
                            </div>
                            <div class="lower-content">
                                <h4><a href="#">General Carpentry</a></h4>
                                <div class="text">Professionals work with a variety of all materials, in a variety of settings–indoor and outdoor.</div>
                                <div class="btn-box"><a href="#" class="read-more">Read More <span class="fa fa-arrow-right"></span></a></div>
                            </div>
                        </div>
                    </div>

                    <!-- service Block -->
                    <div class="service-block">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><a href="#"><img src="{{asset('assets/frontend/images/resource/service-2.jpg')}}" alt=""></a></figure>
                            </div>
                            <div class="lower-content">
                                <h4><a href="#">Furniture Remodeling</a></h4>
                                <div class="text">Professionals work with a variety of all materials, in a variety of settings–indoor and outdoor.</div>
                                <div class="btn-box"><a href="#" class="read-more">Read More <span class="fa fa-arrow-right"></span></a></div>
                            </div>
                        </div>
                    </div>

                    <!-- service Block -->
                    <div class="service-block">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><a href="#"><img src="{{asset('assets/frontend/images/resource/service-3.jpg')}}" alt=""></a></figure>
                            </div>
                            <div class="lower-content">
                                <h4><a href="#">Manufactur Furniture</a></h4>
                                <div class="text">Professionals work with a variety of all materials, in a variety of settings–indoor and outdoor.</div>
                                <div class="btn-box"><a href="#" class="read-more">Read More <span class="fa fa-arrow-right"></span></a></div>
                            </div>
                        </div>
                    </div>

                    <!-- service Block -->
                    <div class="service-block">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><a href="#"><img src="{{asset('assets/frontend/images/resource/service-4.jpg')}}" alt=""></a></figure>
                            </div>
                            <div class="lower-content">
                                <h4><a href="#">Hang Paintings</a></h4>
                                <div class="text">Professionals work with a variety of all materials, in a variety of settings–indoor and outdoor.</div>
                                <div class="btn-box"><a href="#" class="read-more">Read More <span class="fa fa-arrow-right"></span></a></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End service Section -->


    <!-- Projects Section -->
    <section class="projects-section-two">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2>Latest Projects</h2>
                <div class="text">Always honest rules of cooperation <br>We Follow them</div>
            </div>
            <!--Sortable Masonry-->
            <div class="sortable-masonry">
                <!--Filter-->
                <div class="filters">
                    <ul class="filter-tabs filter-btns clearfix">
                        <li class="active filter" data-role="button" data-filter=".all">All Cases</li>
                        <li class="filter" data-role="button" data-filter=".office-renovation">Office Renovation</li>
                        <li class="filter" data-role="button" data-filter=".exterior-design">Exterior Design</li>
                        <li class="filter" data-role="button" data-filter=".interior-design">Interior Design</li>
                        <li class="filter" data-role="button" data-filter=".modeling-flooring">Modeling Flooring</li>
                        <li class="filter" data-role="button" data-filter=".celing-roofing">Celing & Roofing</li>
                    </ul>
                </div>

                <div class="items-container row">
                    <!-- Portfolio Block -->
                    <div class="project-block-two all masonry-item exterior-design modeling-flooring col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><img src="{{asset('assets/frontend/images/gallery/2-1.jpg')}}" alt=""></figure>
                            </div>
                            <div class="overlay-box">
                                <div class="overlay-inner">
                                    <h4>Wooden Godown</h4>
                                    <div class="icon-box">
                                        <a href="{{asset('assets/frontend/images/gallery/2-1.jpg')}}" class="lightbox-image" data-fancybox="gallery" ><span class="icon fa fa-expand-arrows-alt"></span></a>
                                        <a href="#"><span class="icon fa fa-search"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Portfolio Block -->
                    <div class="project-block-two all masonry-item interior-design office-renovation col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><img src="{{asset('assets/frontend/images/gallery/2-2.jpg')}}" alt=""></figure>
                            </div>
                            <div class="overlay-box">
                                <div class="overlay-inner">
                                    <h4>Wooden Godown</h4>
                                    <div class="icon-box">
                                        <a href="{{asset('assets/frontend/images/gallery/2-2.jpg')}}" class="lightbox-image" data-fancybox="gallery" ><span class="icon fa fa-expand-arrows-alt"></span></a>
                                        <a href="#"><span class="icon fa fa-search"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Portfolio Block -->
                    <div class="project-block-two all masonry-item celing-roofing office-renovation col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><img src="{{asset('assets/frontend/images/gallery/2-3.jpg')}}" alt=""></figure>
                            </div>
                            <div class="overlay-box">
                                <div class="overlay-inner">
                                    <h4>Wooden Godown</h4>
                                    <div class="icon-box">
                                        <a href="{{asset('assets/frontend/images/gallery/2-3.jpg')}}" class="lightbox-image" data-fancybox="gallery" ><span class="icon fa fa-expand-arrows-alt"></span></a>
                                        <a href="#"><span class="icon fa fa-search"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Portfolio Block -->
                    <div class="project-block-two all masonry-item modeling-flooring interior-design exterior-design col-lg-8 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><img src="{{asset('assets/frontend/images/gallery/2-4.jpg')}}" alt=""></figure>
                            </div>
                            <div class="overlay-box">
                                <div class="overlay-inner">
                                    <h4>Wooden Godown</h4>
                                    <div class="icon-box">
                                        <a href="{{asset('assets/frontend/images/gallery/2-4.jpg')}}" class="lightbox-image" data-fancybox="gallery" ><span class="icon fa fa-expand-arrows-alt"></span></a>
                                        <a href="#"><span class="icon fa fa-search"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Portfolio Block -->
                    <div class="project-block-two all masonry-item celing-roofing office-renovation col-lg-6 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><img src="{{asset('assets/frontend/images/gallery/2-5.jpg')}}" alt=""></figure>
                            </div>
                            <div class="overlay-box">
                                <div class="overlay-inner">
                                    <h4>Wooden Godown</h4>
                                    <div class="icon-box">
                                        <a href="{{asset('assets/frontend/images/gallery/2-5.jpg')}}" class="lightbox-image" data-fancybox="gallery" ><span class="icon fa fa-expand-arrows-alt"></span></a>
                                        <a href="#"><span class="icon fa fa-search"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Portfolio Block -->
                    <div class="project-block-two all masonry-item celing-roofing modeling-flooring interior-design exterior-design col-lg-6 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><img src="{{asset('assets/frontend/images/gallery/2-6.jpg')}}" alt=""></figure>
                            </div>
                            <div class="overlay-box">
                                <div class="overlay-inner">
                                    <h4>Wooden Godown</h4>
                                    <div class="icon-box">
                                        <a href="{{asset('assets/frontend/images/gallery/2-6.jpg')}}" class="lightbox-image" data-fancybox="gallery" ><span class="icon fa fa-expand-arrows-alt"></span></a>
                                        <a href="#"><span class="icon fa fa-search"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="btn-box text-center">
                <a href="#" class="theme-btn btn-style-two"><span class="btn-title">All Projects</span></a>
            </div>
        </div>
    </section>
    <!-- End Projects Section -->

    <!--Fluid Section One-->
    <section class="fluid-section-one">
        <div class="outer-container clearfix">
            <!--Content Column-->
            <div class="content-column">
                <div class="inner-column">
                    <div class="sec-title">
                        <h2>Why Choose Us?</h2>
                    </div>
                    <div class="text-box">
                        <p>Dolor sit amet consectetur elit sed do eiusmod tempor incd idunt labore et dolore magna aliqua enim ad minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip exea commodo consequat.duis aute irure dolor in reprehen derit in voluptate velit esse cillum dolore eu fugiat nulla pariatur cepteur sint occaecat.</p>
                    </div>
                    <div class="row">
                        <!-- Feature Block -->
                        <div class="feature-block-two col-lg-6 col-md-6">
                            <div class="inner-box">
                                <span class="icon flaticon-24-hours"></span>
                                <h4>Available 24/7</h4>
                                <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing.</div>
                            </div>
                        </div>

                        <!-- Feature Block -->
                        <div class="feature-block-two col-lg-6 col-md-6">
                            <div class="inner-box">
                                <span class="icon flaticon-artificial-intelligence"></span>
                                <h4>Creative ideas</h4>
                                <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing.</div>
                            </div>
                        </div>

                        <!-- Feature Block -->
                        <div class="feature-block-two col-lg-6 col-md-6">
                            <div class="inner-box">
                                <span class="icon flaticon-handshake"></span>
                                <h4>Customer Focused</h4>
                                <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing.</div>
                            </div>
                        </div>

                        <!-- Feature Block -->
                        <div class="feature-block-two col-lg-6 col-md-6">
                            <div class="inner-box">
                                <span class="icon flaticon-rocket-ship"></span>
                                <h4>Fast Delivery</h4>
                                <div class="text">Lorem ipsum dolor sit amet, consectetur adipisicing.</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!--Image Column-->
            <div class="image-column" style="background-image:url({{asset('assets/frontend/images/resource/image-2.jpg')}});">
                <figure class="image-box"><img src="{{asset('assets/frontend/images/resource/image-2.jpg')}}" alt=""></figure>
            </div>
        </div>
    </section>
    <!-- End Fluid Section -->

    <!-- Team Section -->
    <section class="team-section">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2>Expert Worker</h2>
                <div class="text">We have Expert Worker <br>They provide Quality Work For Customer</div>
            </div>

            <div class="row">

                <!-- Team Block -->
                <div class="team-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                    <div class="image-box">
                        <figure class="image"><img src="{{asset('assets/frontend/images/resource/team-1.jpg')}}" alt=""></figure>
                        <div class="info-box">
                            <h4 class="name">Tiny Moleski</h4>
                            <span class="designation">Project Manager</span>
                            <ul class="social-links">
                                <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                <li><a href="#"><span class="fab fa-pinterest"></span></a></li>
                                <li><a href="#"><span class="fab fa-dribbble"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Team Block -->
                <div class="team-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="300ms">
                    <div class="image-box">
                        <figure class="image"><img src="{{asset('assets/frontend/images/resource/team-2.jpg')}}" alt=""></figure>
                        <div class="info-box">
                            <h4 class="name">Buffy Edelen</h4>
                            <span class="designation">Deliver Manager</span>
                            <ul class="social-links">
                                <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                <li><a href="#"><span class="fab fa-pinterest"></span></a></li>
                                <li><a href="#"><span class="fab fa-dribbble"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Team Block -->
                <div class="team-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="600ms">
                    <div class="image-box">
                        <figure class="image"><img src="{{asset('assets/frontend/images/resource/team-3.jpg')}}" alt=""></figure>
                        <div class="info-box">
                            <h4 class="name">Jack Monika</h4>
                            <span class="designation">Technical Specialist</span>
                            <ul class="social-links">
                                <li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
                                <li><a href="#"><span class="fab fa-twitter"></span></a></li>
                                <li><a href="#"><span class="fab fa-pinterest"></span></a></li>
                                <li><a href="#"><span class="fab fa-dribbble"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Team Section -->

    <!-- Testimonial Section -->
    <section class="testimonial-section" style="background-image: url({{asset('assets/frontend/images/background/2.jpg')}});">
        <div class="auto-container">
            <div class="sec-title light text-center">
                <h2>What Clients Says</h2>
                <div class="text">You read our clients review <br>check this now</div>
            </div>

            <!-- Testimonial Carousel -->
            <div class="testimonial-carousel owl-carousel owl-theme">
                <!-- Testimonial Block -->
                <div class="testimonial-block">
                    <div class="inner-box">
                        <div class="thumb"><img src="{{asset('assets/frontend/images/resource/testi-thumb.jpg')}}" alt=""></div>
                        <div class="text">
                            <div class="inner">
                                <p>Today we can tell you, thanks to your passion, hard work creativity, and expertise, you delivered us the most beautiful house ever! It’s been a beautiful ride, there were up’s and down’s, frustrations, delays at the same time great looks. keep touch with them.</p>
                            </div>
                        </div>
                        <div class="info-box">
                            <span class="icon fa fa-quote-left"></span>
                            <h5 class="name">Jhon Zabrilla</h5>
                            <span class="city">Newyark City</span>
                        </div>
                    </div>
                </div>

                <!-- Testimonial Block -->
                <div class="testimonial-block">
                    <div class="inner-box">
                        <div class="thumb"><img src="{{asset('assets/frontend/images/resource/testi-thumb.jpg')}}" alt=""></div>
                        <div class="text">
                            <div class="inner">
                                <p>Today we can tell you, thanks to your passion, hard work creativity, and expertise, you delivered us the most beautiful house ever! It’s been a beautiful ride, there were up’s and down’s, frustrations, delays at the same time great looks. keep touch with them.</p>
                            </div>
                        </div>
                        <div class="info-box">
                            <span class="icon fa fa-quote-left"></span>
                            <h5 class="name">Jhon Zabrilla</h5>
                            <span class="city">Newyark City</span>
                        </div>
                    </div>
                </div>

                <!-- Testimonial Block -->
                <div class="testimonial-block">
                    <div class="inner-box">
                        <div class="thumb"><img src="{{asset('assets/frontend/images/resource/testi-thumb.jpg')}}" alt=""></div>
                        <div class="text">
                            <div class="inner">
                                <p>Today we can tell you, thanks to your passion, hard work creativity, and expertise, you delivered us the most beautiful house ever! It’s been a beautiful ride, there were up’s and down’s, frustrations, delays at the same time great looks. keep touch with them.</p>
                            </div>
                        </div>
                        <div class="info-box">
                            <span class="icon fa fa-quote-left"></span>
                            <h5 class="name">Jhon Zabrilla</h5>
                            <span class="city">Newyark City</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Testimonial Section -->

    <!--Clients Section-->
    <section class="clients-section">
        <div class="auto-container">
            <!--Sponsors Carousel-->
            <ul class="sponsors-carousel owl-carousel owl-theme">
                <li class="slide-item"><figure class="image-box"><a href="#"><img src="{{asset('assets/frontend/images/clients/1.png')}}" alt=""></a></figure></li>
                <li class="slide-item"><figure class="image-box"><a href="#"><img src="{{asset('assets/frontend/images/clients/2.png')}}" alt=""></a></figure></li>
                <li class="slide-item"><figure class="image-box"><a href="#"><img src="{{asset('assets/frontend/images/clients/3.png')}}" alt=""></a></figure></li>
                <li class="slide-item"><figure class="image-box"><a href="#"><img src="{{asset('assets/frontend/images/clients/4.png')}}" alt=""></a></figure></li>
                <li class="slide-item"><figure class="image-box"><a href="#"><img src="{{asset('assets/frontend/images/clients/5.png')}}" alt=""></a></figure></li>
                <li class="slide-item"><figure class="image-box"><a href="#"><img src="{{asset('assets/frontend/images/clients/1.png')}}" alt=""></a></figure></li>
                <li class="slide-item"><figure class="image-box"><a href="#"><img src="{{asset('assets/frontend/images/clients/2.png')}}" alt=""></a></figure></li>
                <li class="slide-item"><figure class="image-box"><a href="#"><img src="{{asset('assets/frontend/images/clients/3.png')}}" alt=""></a></figure></li>
                <li class="slide-item"><figure class="image-box"><a href="#"><img src="{{asset('assets/frontend/images/clients/4.png')}}" alt=""></a></figure></li>
                <li class="slide-item"><figure class="image-box"><a href="#"><img src="{{asset('assets/frontend/images/clients/5.png')}}" alt=""></a></figure></li>
            </ul>
        </div>
    </section>
    <!--End Clients Section-->

    <!-- Offer Section -->
    <section class="offer-section">
        <div class="auto-container">
            <div class="sec-title">
                <h2>Get in touch</h2>
                <div class="text">What We Provide For You check now and deside it<br> do you want now this</div>
            </div>
            <div class="row no-gutters">
                <div class="content-column col-xl-7 col-lg-6 col-md-12 col-sm-12 order-2">
                    <div class="inner-column">
                        <span class="title">Special Offer</span>
                        <h2>How to save <span class="discount">50%</span> <br>of money on repairs</h2>
                        <div class="text">Not everyone Knows and where but there are 10 very importent tips, how each it is to save up to 50% on repairs, and on the money saved to buy new applicances.</div>
                        <div class="fact-counter">
                            <div class="row clearfix">
                                <!--Column-->
                                <div class="counter-column col-lg-4 col-md-4 col-sm-12 wow fadeInUp">
                                    <div class="inner-column">
                                        <span class="icon flaticon-carpentry"></span>
                                        <div class="count-box"><span class="count-text" data-speed="3000" data-stop="10">0</span></div>
                                        <h4 class="counter-title">Years of Carpenting <br>Experience</h4>
                                    </div>
                                </div>

                                <!--Column-->
                                <div class="counter-column col-lg-4 col-md-4 col-sm-12 wow fadeInUp" data-wow-delay="300ms">
                                    <div class="inner-column">
                                        <span class="icon flaticon-door-1"></span>
                                        <div class="count-box"><span class="count-text" data-speed="3000" data-stop="58">0</span></div>
                                        <h4 class="counter-title">Local Branches in <br>City New York</h4>
                                    </div>
                                </div>

                                <!--Column-->
                                <div class="counter-column col-lg-4 col-md-4 col-sm-12 wow fadeInUp" data-wow-delay="600ms">
                                    <div class="inner-column">
                                        <span class="icon flaticon-team"></span>
                                        <div class="count-box"><span class="count-text" data-speed="3000" data-stop="8">0</span>k</div>
                                        <h4 class="counter-title">Happy Customer <br>with our work</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-column col-xl-5 col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="discount-form">
                            <div class="text">Fill out the form, Our manager will contact you for further details.</div>
                            <!--Comment Form-->
                            <form action="#" method="post" id="email-form">
                                <div class="form-group">
                                    <div class="response"></div>
                                </div>

                                <div class="form-group">
                                    <input type="text" name="username" class="username" placeholder="Your Name *">
                                </div>

                                <div class="form-group">
                                    <input type="email" name="email" class="email" placeholder="Your Email *">
                                </div>

                                <div class="form-group">
                                    <textarea name="contact_message" class="message" placeholder="Text Message"></textarea>
                                </div>

                                <div class="form-group">
                                    <button class="theme-btn btn-style-two" type="button" id="submit" name="submit-form"><span class="btn-title">Submit Now</span> </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Offer Section -->

    <!-- News Section -->
    <section class="news-section">
        <div class="auto-container">
            <div class="sec-title">
                <h2>News & Artical</h2>
                <div class="text">You read now our latest news and artical</div>
            </div>

            <div class="row">
                <!-- News Block -->
                <div class="news-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><a href="#"><img src="{{asset('assets/frontend/images/resource/news-1.jpg')}}" alt=""></a></figure>
                        </div>
                        <div class="lower-content">
                            <div class="post-date"><span class="far fa-calendar"></span> Jan 01, 2020</div>
                            <ul class="post-info">
                                <li><span class="far fa-user"></span> By Admin | </li>
                                <li><a href="#">General Carpentry</a></li>
                            </ul>
                            <h4><a href="#">Woodworker treak truned into furniture for exhibition.</a></h4>
                            <div class="btn-box"><a href="#" class="read-more">Read More <span class="fa fa-arrow-right"></span></a></div>
                        </div>
                    </div>
                </div>

                <!-- News Block -->
                <div class="news-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><a href="#"><img src="{{asset('assets/frontend/images/resource/news-2.jpg')}}" alt=""></a></figure>
                        </div>
                        <div class="lower-content">
                            <div class="post-date"><span class="far fa-calendar"></span> Jan 02, 2020</div>
                            <ul class="post-info">
                                <li><span class="far fa-user"></span> By Admin | </li>
                                <li><a href="#">General Carpentry</a></li>
                            </ul>
                            <h4><a href="#">Home Repair and Maintain safe now in the rantain.</a></h4>
                            <div class="btn-box"><a href="#" class="read-more">Read More <span class="fa fa-arrow-right"></span></a></div>
                        </div>
                    </div>
                </div>

                <!-- News Block -->
                <div class="news-block col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image"><a href="#"><img src="{{asset('assets/frontend/images/resource/news-3.jpg')}}" alt=""></a></figure>
                        </div>
                        <div class="lower-content">
                            <div class="post-date"><span class="far fa-calendar"></span> Jan 03, 2020</div>
                            <ul class="post-info">
                                <li><span class="far fa-user"></span> By Admin | </li>
                                <li><a href="#">General Carpentry</a></li>
                            </ul>
                            <h4><a href="#">Good furniture is now on persale in showroom in Dec.</a></h4>
                            <div class="btn-box"><a href="#" class="read-more">Read More <span class="fa fa-arrow-right"></span></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End News Section Two -->

@endsection

