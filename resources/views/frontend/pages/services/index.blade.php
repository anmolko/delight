@extends('frontend.layouts.master')
@section('title') Our Services @endsection
@section('styles')
<style>
  
</style>
@endsection
@section('content')

    <!--Page Title-->
    <section class="page-title" style="background-image:url('{{asset('assets/frontend/images/background/7.jpg')}}');">
        <div class="auto-container clearfix">
            <h1>Our Services</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="/">Home</a></li>
                <li>Services</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Projects Section -->
    <section class="projects-section-two alternate">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2>Our Available Categories</h2>
            </div>
                                   
            <div class="row">
                <!-- Portfolio Block -->
                @if(count(@$service_categories) > 0) 
                    @foreach(@$service_categories as $service_category)
                    <div class="project-block-two col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><img src="{{ asset('/images/uploads/service_categories/'.$service_category->image) }}" alt="{{@$service_category->slug}}"></figure>
                            </div>
                            <div class="overlay-box">
                                <div class="overlay-inner">
                                    <h4>{{ucwords(@$service_category->name)}}</h4>
                                    <div class="icon-box">
                                        <a href="{{ asset('/images/uploads/service_categories/'.$service_category->image) }}" class="lightbox-image" data-fancybox="gallery" ><span class="icon fa fa-expand-arrows-alt"></span></a>
                                        <a href="{{route('service.single',$service_category->slug)}}"><span class="icon fa fa-search"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
                         

                
            </div>

        </div>
    </section>
    <!-- End Projects Section -->

@endsection
