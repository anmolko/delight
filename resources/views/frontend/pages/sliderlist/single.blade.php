@extends('frontend.layouts.master')
@section('title') {{ucwords(@$singleSlider->list_header)}} @endsection
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
   
</style>
@endsection
@section('content')

    <!-- Page Title -->
    <section class="page-title" style="background-image: url({{asset('assets/frontend/images/background/bg-17.jpg')}});">
        <div class="auto-container">
            <div class="content-box">
                <div class="content-wrapper">
                    <div class="title">
                        <h1>{{ucwords(@$singleSlider->list_header)}}</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="/">Home</a></li>
                        <li><a href="{{url('/'.@$singleSlider->section->page->slug)}}">{{ucwords(@$singleSlider->section->page->name)}}</a></li>
                        <li>{{ucwords(@$singleSlider->list_header)}}</li>
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
                                <img src="{{ asset('/images/uploads/section_elements/list_1/'.$singleSlider->list_image) }}" alt="">
                                <div class="content">
                                    <h4>{{ucwords(@$singleSlider->list_header)}}</h4>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                    <div class="row mb-5">
                        <div class="col-md-12">
                         
                            <div class="text"><p>{{@$singleSlider->list_description}}</p></div>
                           
                            
                        </div>
                    </div>
                                  
                </div>
                <aside class="col-lg-4">
                    @include('frontend.pages.sliderlist.sidebar')                
                  
                </aside>
            </div>
        </div>
    </section>

@endsection
