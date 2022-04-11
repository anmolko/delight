@extends('frontend.layouts.master')
@section('title') Home  @endsection
@section('styles')
<style>
    .slider-carousel .owl-stage-outer {
        height: 500px;
    }

    .auto-container.slider-content {
        margin-top: -270px;
    }

    @media only screen and (max-width: 1024px){

        .auto-container.slider-content {
            margin-top: -270px;
        }
    }

    @media only screen and (max-width: 991px){
        .auto-container.slider-content {
            margin-top: -100px;
        }
    }
    .news-section{
        background-color: #fafafa;
    }
</style>
@endsection
@section('content')

    @if(count($sliders)>0)

    <!-- Banner Section -->
    <section class="banner-section">
        <div class="banner-carousel slider-carousel owl-carousel owl-theme">
            <!-- Slide Item -->
            @foreach($sliders as $slider)

                <div class="slide-item">
                    <div class="image-layer" style="background-image:url({{asset('images/uploads/sliders/'.@$slider->slider_front_image)}})"></div>
                    <div class="content-box">
                        <div class="content">
                            <div class="auto-container slider-content">
                                <span class="title">{{@$slider->heading}}</span>
                                <h2>{{@$slider->subheading_one}}</h2>
                                <div class="text">{{@$slider->description}}</div>
                                <div class="btn-box">
                                    <a href="{{!empty(@$slider->button_one_link) ? $slider->button_one_link:'/contact-us'}}" class="theme-btn btn-style-two"><span class="btn-title">{{!empty(@$slider->button_one) ? $slider->button_one:'Reach Out'}}</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </section>
    <!--END Banner Section -->
    @endif

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

    @if(count($service_categories) > 3)
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
                        <a href="{{route('service.frontend')}}" class="theme-btn btn-style-two"><span class="btn-title">All Services</span></a>
                    </div>
                </div>
            </div>

            <div class="carousel-outer">
                <!-- Services Carousel -->
                <div class="services-carousel owl-carousel owl-theme">
                    <!-- service Block -->
                    @foreach(@$service_categories as $service_category)
                        <div class="service-block">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><a href="{{route('service.single',@$service_category->slug)}}"><img src="{{ asset('/images/uploads/service_categories/'.$service_category->image) }}" alt="{{ucwords(@$service_category->slug)}}"></a></figure>
                                </div>
                                <div class="lower-content">
                                    <h4><a href="{{route('service.single',@$service_category->slug)}}">{{ucwords(@$service_category->name)}}</a></h4>
                                    <div class="text">{{Str::limit($service_category->short_description, 80)}}</div>
                                    <div class="btn-box"><a href="{{route('service.single',@$service_category->slug)}}" class="read-more">Read More <span class="fa fa-arrow-right"></span></a></div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </div>
    </section>
    <!-- End service Section -->
    @endif

    <!-- Call To Action -->
    <section class="call-to-action alternate" style="background-image: url({{asset('assets/frontend/images/background/13.jpg')}});">
        <div class="auto-container">
            <div class="content-box">
                <h2>Find your dream job with us! <br>That Meets Your Expectation.</h2>
                <div class="link-box"><a href="{{route('contact')}}" class="theme-btn btn-style-three"><span class="btn-title">Send us a message</span></a></div>
            </div>

            <!-- Fact Counter -->
            <div class="fact-counter">
                <div class="row clearfix">
                    <!--Column-->
                    <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp">
                        <div class="inner-column">
                            <div class="count-box"><span class="count-text" data-speed="3000" data-stop="@if(!empty(@$setting_data->customer_served)) {{@$setting_data->customer_served}} @else 1892 @endif"></span>+</div>
                            <h4 class="counter-title">Customer Served</h4>
                        </div>
                    </div>

                    <!--Column-->
                    <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="300ms">
                        <div class="inner-column">
                            <div class="count-box"><span class="count-text" data-speed="3000" data-stop="@if(!empty(@$setting_data->visa_approved)) {{@$setting_data->visa_approved}} @else 250 @endif"></span>+</div>
                            <h4 class="counter-title">Visa Approved</h4>
                        </div>
                    </div>

                    <!--Column-->
                    <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="600ms">
                        <div class="inner-column">
                            <div class="count-box"><span class="count-text" data-speed="3000" data-stop="@if(!empty(@$setting_data->success_stories)) {{@$setting_data->success_stories}} @else 1502 @endif"></span>+</div>
                            <h4 class="counter-title">Success Stories</h4>
                        </div>
                    </div>

                    <!--Column-->
                    <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="900ms">
                        <div class="inner-column">
                            <div class="count-box"><span class="count-text" data-speed="3000" data-stop="@if(!empty(@$setting_data->happy_customers)) {{@$setting_data->happy_customers}} @else 1000 @endif"></span>+</div>
                            <h4 class="counter-title">Happy Customers</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Call To Action -->


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


    @if(count(@$testimonials) > 0)
    <!-- Testimonial Section -->
    <section class="testimonial-section" style="background-image: url({{asset('assets/frontend/images/background/2.jpg')}});">
        <div class="auto-container">
            <div class="sec-title light text-center">
                <h2>What Clients Says</h2>
            </div>

            <!-- Testimonial Carousel -->
            <div class="testimonial-carousel owl-carousel owl-theme">
                <!-- Testimonial Block -->
                @foreach(@$testimonials as $testimonial)
                    <div class="testimonial-block">
                        <div class="inner-box">
                            <div class="thumb"><img src="{{ asset('/images/uploads/testimonials/'.$testimonial->image) }}" alt="{{ucwords(@$testimonial->title)}}"></div>
                            <div class="text">
                                <div class="inner">
                                    <p>{{@$testimonial->testimonial}}</p>
                                </div>
                            </div>
                            <div class="info-box">
                                <span class="icon fa fa-quote-left"></span>
                                <h5 class="name">{{ucwords(@$testimonial->title)}}</h5>
                                <span class="city">{{ucwords(@$testimonial->subtitle)}}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
              
            </div>
        </div>
    </section>
    <!--End Testimonial Section -->
    @endif

    @if(count(@$clients) > 3)
    <!--Clients Section-->
    <section class="clients-section">
        <div class="auto-container">
            <!--Sponsors Carousel-->
            <ul class="sponsors-carousel owl-carousel owl-theme">
                @foreach(@$clients as $client)
                    <li class="slide-item"><figure class="image-box"><a href="{{@$client->link}}" title="{{ucwords(@$client->name)}}"><img src="{{ asset('/images/uploads/clients/'.$client->image) }}" alt="{{ucwords(@$client->name)}}"></a></figure></li>
                @endforeach
               
            </ul>
        </div>
    </section>
    <!--End Clients Section-->
    @endif

    @if(count(@$latestPosts) > 2)

    <!-- News Section -->
    <section class="news-section">
        <div class="auto-container">
            <div class="row">

                <div class="col-lg-8 col-md-12">
                    <div class="sec-title">
                    <h2>News & Updates</h2>
                    <div class="text">You read now our latest blogs</div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="right-btn text-right">
                        <a href="{{route('blog.frontend')}}" class="theme-btn btn-style-two"><span class="btn-title">All Blog</span></a>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- News Block -->
                @foreach($latestPosts as $latest)

                    <div class="news-block col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><a href="{{route('blog.single',@$latest->slug)}}"><img src="<?php if(@$latest->image){?>{{asset('/images/uploads/blog/'.@$latest->image)}}<?php }?>" alt="{{@$latest->slug}}"></a></figure>
                            </div>
                            <div class="lower-content">
                                <div class="post-date"><span class="far fa-calendar"></span> {{date('M j, Y',strtotime(@$latest->created_at))}}</div>
                                <ul class="post-info">
                                    <li><a href="#">{{ucwords(@$latest->category->name)}}</a></li>
                                </ul>
                                <h4><a href="{{route('blog.single',@$latest->slug)}}">{{ucwords(@$latest->title)}}</a></h4>
                                <div class="btn-box"><a href="{{route('blog.single',@$latest->slug)}}" class="read-more">Read More <span class="fa fa-arrow-right"></span></a></div>
                            </div>
                        </div>
                    </div>
                @endforeach

              
            </div>
        </div>
    </section>
    <!--End News Section Two -->
    @endif

@endsection

