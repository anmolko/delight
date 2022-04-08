@extends('frontend.layouts.master')
@section('title') {{ucwords(@$singleService->name)}} @endsection
@section('styles')
<style>
    .services-details .content-side .service-list ul,.services-details .content-side .service-list ol {
        position: relative;
        display: block;
        margin-bottom: 30px;
    }


    .service-list ul li:before,.service-list ol li:before {
        position: absolute;
        left: 0;
        top: 0;
        font-size: 14px;
        line-height: 28px;
        color: #223f98;
        font-weight: 900;
        font-family: "Font Awesome 5 Free";
        content: "\f061";
    }

    .service-list li {
        position: relative;
        font-size: 16px;
        line-height: 28px;
        color: #353535;
        font-weight: 400;
        padding-left: 30px;
        margin-bottom: 5px;
        font-family: "Montserrat", sans-serif;
    }


</style>
@endsection
@section('content')


    <!--Page Title-->
    <section class="page-title" style="background-image:url('{{asset('assets/frontend/images/background/7.jpg')}}');">
        <div class="auto-container clearfix">
            <h1>{{ucwords(@$singleService->name)}}</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="/">Home</a></li>
                <li><a href="{{route('service.frontend')}}">Services</a></li>
                <li>{{ucwords(@$singleService->name)}}</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Service Detail Section -->
    <div class="service-detail-section">
        <div class="auto-container">
            <div class="row">
                <!--Content Side-->
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
                    <div class="service-detail">
                        <!-- Image Box -->
                        <div class="image-box">
                            <div class="image wow fadeIn">
                                <a href="{{ asset('/images/uploads/service_categories/'.$singleService->image) }}" class="lightbox-image" data-fancybox="gallery"><img src="{{ asset('/images/uploads/service_categories/'.@$singleService->image) }}" alt="{{@$singleService->slug}}"></a>
                            </div>
                        </div>

                        <!--Title Style One-->
                        <div class="content-box"> 
                            <h2>{{ucwords(@$singleService->name)}}</h2>
                            <div class="text"><p>{{@$singleService->short_description}}</p></div>

                            <div class="service-list">
                                {!! @$singleService->list !!}
                            </div>
                        </div>
                    </div><!-- Service Detail -->
                </div>

                <!--Sidebar Side-->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                    @include('frontend.pages.services.sidebar')            
                  
                </div>
            </div>
        </div>
    </div>
    <!-- End Service Detail Section -->
@endsection
