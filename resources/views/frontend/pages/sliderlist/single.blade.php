@extends('frontend.layouts.master')
@section('title') {{ucwords(@$singleSlider->list_header)}} @endsection
@section('styles')
        <style>
            .content-box blockquote{
                position: relative;
                border-left: 4px solid #223f98;
                background-color: #f5f5f5;
                font-size: 18px;
                line-height: 1.8em;
                padding: 25px 40px;
                margin-bottom: 20px;
                margin-top: 20px;

            }
        </style>
@endsection
@section('content')

    <section class="page-title" style="background-image:url({{asset('assets/frontend/images/background/7.jpg')}});">
        <div class="auto-container clearfix">
            <h1>Service Detail</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="/">Home</a></li>
                <li><a href="{{url('/'.@$singleSlider->section->page->slug)}}">{{ucwords(@$singleSlider->section->page->name)}}</a></li>
                <li>{{ucwords(@$singleSlider->list_header)}}</li>
            </ul>
        </div>
    </section>

    <div class="service-detail-section">
        <div class="auto-container">
            <div class="row">
                <!--Content Side-->
                <div class="content-side col-lg-8 col-md-12 col-sm-12">
                    <div class="service-detail">
                        <!-- Image Box -->
                        <div class="image-box">
                            <div class="image wow fadeIn animated" style="visibility: visible; animation-name: fadeIn;">
                                <a href="{{ asset('/images/uploads/section_elements/list_1/'.$singleSlider->list_image) }}" class="lightbox-image" data-fancybox="gallery"><img src="{{ asset('/images/uploads/section_elements/list_1/'.$singleSlider->list_image) }}" alt=""></a>
                            </div>
                        </div>

                        <!--Title Style One-->
                        <div class="content-box">
                            <h2>{{ucwords(@$singleSlider->list_header)}}</h2>
                            <p>{!! @$singleSlider->list_description !!}</p>
                        </div>
                    </div>
                </div>

                @include('frontend.pages.sliderlist.sidebar')

            </div>
        </div>
    </div>
@endsection
