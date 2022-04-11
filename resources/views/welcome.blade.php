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

    .fact-counter .inner-column .icon i {
        font-size: 50px;
    }

    /* .call-to-action.homepage {
        padding: 100px 0 0;
    } */

    .call-to-action.homepage:before {
        background-color: unset;
    }


    .about-us .content-column .inner-column{
        padding-left: 50px;
    }

    .about-us .image-column .inner-column {
        padding-left: 0;
    }

    .about-us .image-column .inner-column:before{
        right:0;
        left: -50px;
    }

    .award-block{
        position: relative;
        padding: 30px 15px;
    }
    .award-block .inner-box {
        position: relative;
        background-color: #fff;
        padding: 30px;
        text-align: center;
        margin-bottom: 30px;
        -webkit-box-shadow: 0px 0px 18px 0px rgb(0 0 0 / 10%);
        box-shadow: 0px 0px 18px 0px rgb(0 0 0 / 10%);
    }

    .award-block .image {
        margin-bottom: 20px;
    }
    .award-block .inner-box .name {
        position: relative;
        font-size: 18px;
        font-weight: 500;
        color: #223f98;
    }

    .award-block .inner-box {
        height: 265px;
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

    @if(!empty($welcome_settings->intro_heading))
    <!-- About Us -->
    <section class="about-us">
        <div class="auto-container">
            <div class="row clearfix">
                <!-- Content Column -->
                
                <div class="image-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="video-box wow fadeIn">
                            <figure class="image"><img src="{{asset('images/uploads/settings/'.@$welcome_settings->intro_image2)}}" alt="about-us"></figure>
                        </div>
                    </div>
                </div>
                <div class="content-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="sec-title">
                            <h2>{{@$welcome_settings->intro_heading}}</h2>
                        </div>
                        <div class="text-box">
                            <p>{!! nl2br(@$welcome_settings->intro_description) !!}</p>
                        </div>
                       
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End About Us -->
    @endif

    @if(count(@$awards) > 2)
    <!-- Awards Section  -->
    <section class="award-section style-two">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2>Our Awards</h2>
            </div>

            <!-- Awards Carousel -->
            <div class="row clearfix">
                <!-- Awards Block  -->
                <div class="award-carousel owl-carousel owl-theme" data-options='{"loop": true, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": false, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }, "600" :{ "items" : "2" }, "768" :{ "items" : "2" } , "992":{ "items" : "3" }, "1200":{ "items" : "4" }}}'>
                    @foreach(@$awards as $award)
                        <div class="award-block">
                            <div class="inner-box">
                                <div class="info-box">
                                    <div class="image"><img src="{{ asset('/images/uploads/awards/'.$award->image) }}" alt="{{ucwords(@$award->name)}}"></div>
                                    <h5 class="name">{{ucwords(@$award->name)}}</h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
           
        </div>
    </section>
    <!--End Awards Section -->
    @endif

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
    <section class="call-to-action alternate homepage" style="background-image: url({{asset('assets/frontend/images/icons/pattern-4.png')}});">
        <div class="auto-container">

            <!-- Fact Counter -->
            <div class="fact-counter">
                <div class="row clearfix">
                    <!--Column-->
                    <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp">
                        <div class="inner-column">
                            <div class="icon"><i class="fas fa-users"></i></div>
                            <div class="count-box"><span class="count-text" data-speed="3000" data-stop="@if(!empty(@$setting_data->customer_served)) {{@$setting_data->customer_served}} @else 1892 @endif"></span>+</div>
                            <h4 class="counter-title">Customer Served</h4>
                        </div>
                    </div>

                    <!--Column-->
                    <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="300ms">
                        <div class="inner-column">
                            <div class="icon"><i class="fas fa-user-check"></i></div>
                            <div class="count-box"><span class="count-text" data-speed="3000" data-stop="@if(!empty(@$setting_data->visa_approved)) {{@$setting_data->visa_approved}} @else 250 @endif"></span>+</div>
                            <h4 class="counter-title">Visa Approved</h4>
                        </div>
                    </div>

                    <!--Column-->
                    <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="600ms">
                        <div class="inner-column">
                            <div class="icon"><i class="fas fa-thumbs-up"></i></div>
                            <div class="count-box"><span class="count-text" data-speed="3000" data-stop="@if(!empty(@$setting_data->success_stories)) {{@$setting_data->success_stories}} @else 1502 @endif"></span>+</div>
                            <h4 class="counter-title">Success Stories</h4>
                        </div>
                    </div>

                    <!--Column-->
                    <div class="counter-column col-lg-3 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="900ms">
                        <div class="inner-column">
                            <div class="icon"><i class="far fa-smile"></i></div>

                            <div class="count-box"><span class="count-text" data-speed="3000" data-stop="@if(!empty(@$setting_data->happy_customers)) {{@$setting_data->happy_customers}} @else 1000 @endif"></span>+</div>
                            <h4 class="counter-title">Happy Customers</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Call To Action -->

    

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

