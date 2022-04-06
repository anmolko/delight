@extends('frontend.layouts.master')
@section('title') {{ucwords(@$singleService->name)}} @endsection
@section('styles')
<style>
    .widget_categories_two .categories-list li a.active {
        padding-left: 20px;
        color: #fff;
        background: #201630;
    }
    .widget_categories_two .categories-list li a.active span {
        opacity: 1;
    }
    .widget_categories_two .categories-list li a.active:before {
        opacity: 0;
    }
    .services-details .content-side .service-list ul,.services-details .content-side .service-list ol {
        position: relative;
    }


    .service-list ul li:before,.service-list ol li:before {
        content: "\f00c";
        -moz-osx-font-smoothing: grayscale;
        -webkit-font-smoothing: antialiased;
        display: inline-block;
        font-style: normal;
        font-variant: normal;
        text-rendering: auto;
        font-family: 'Font Awesome 5 Pro';
        font-weight: 900;
        color: #fd4a36;
        margin-right: 8px;
        font-size: 15px;
        line-height: inherit;
    }

    .service-list li {
        position: relative;
        font-size: 18px;
        font-weight: 500;
        margin-bottom: 10px;
    }
</style>
@endsection
@section('content')

    <!-- Page Title -->
    <section class="page-title" style="background-image: url({{asset('assets/frontend/images/background/bg-17.jpg')}});">
        <div class="auto-container">
            <div class="content-box">
                <div class="content-wrapper">
                    <div class="title">
                        <h1>{{ucwords(@$singleService->name)}}</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="/">Home</a></li>
                        <li><a href="{{route('service.frontend')}}">Services</a></li>
                        <li>{{ucwords(@$singleService->name)}}</li>
                    </ul>
                </div>                    
            </div>
        </div>
    </section>
    <!-- Page Title -->

      <!-- Service Details -->
      <section class="services-details">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-8 content-side">
                    <!--Theme Carousel-->
                    <div class="theme_carousel owl-theme owl-carousel" data-options='{"loop": false, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": false, "autoplay": false, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }, "600" :{ "items" : "1" }, "768" :{ "items" : "1" } , "992":{ "items" : "1" }, "1200":{ "items" : "1" }}}'>
                        <div class="slide">
                            <div class="image-slide">
                                <img src="{{ asset('/images/uploads/service_categories/'.$singleService->image) }}" alt="">
                                <div class="content">
                                    <h4>{{ucwords(@$singleService->name)}}</h4>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                    <div class="row mb-5">
                        <div class="col-md-12">
                         
                            <div class="text"><p>{{@$singleService->short_description}}</p></div>
                            <div class="service-list">
                                {!! @$singleService->list !!}
                            </div>
                            
                        </div>
                    </div>
                                  
                </div>
                <aside class="col-lg-4">
                @include('frontend.pages.services.sidebar')            
                  
                </aside>
            </div>
        </div>
    </section>

@endsection
