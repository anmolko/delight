@extends('frontend.layouts.master')
@section('title') Our Services @endsection
@section('styles')
<style>
  
</style>
@endsection
@section('content')

    <!-- Page Title -->
    <section class="page-title" style="background-image: url({{asset('assets/frontend/images/background/bg-17.jpg')}});">
        <div class="auto-container">
            <div class="content-box">
                <div class="content-wrapper">
                    <div class="title">
                        <h1>Our services</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="/">Home</a></li>
                        <li>Services</li>
                    </ul>
                </div>                    
            </div>
        </div>
    </section>
    <!-- Page Title -->

    <!-- Services Section Six -->
    <section class="services-section-six">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2>Our Available Categories</h2>
                <div class="text-decoration">
                    <span class="left"></span>
                    <span class="right"></span>
                </div>
            </div>
            <div class="row">
                @if(count(@$service_categories) > 0) 
                    @foreach(@$service_categories as $service_category)
                    <div class="col-lg-4 service-block-six">
                        <div class="inner-box">
                            <div class="image-box">
                                <img class="lazy-image owl-lazy" src="{{asset('assets/frontend/images/resource/image-spacer-for-validation.png')}}" data-src="{{ asset('/images/uploads/service_categories/'.$service_category->image) }}" alt="{{@$service_category->slug}}">
                                <div class="icon-box">
                                    <h4>{{ucwords(@$service_category->name)}}</h4>              
                                </div>
                                <div class="overlay"><a href="{{route('service.single',$service_category->slug)}}"><span class="flaticon-right"></span></a></div>
                            </div>
                            <div class="content">
                                <div class="text">{{Str::limit($service_category->short_description, 65)}}...</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
                                                                                
               
            </div>
        </div>
    </section>


@endsection
