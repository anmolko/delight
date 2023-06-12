@extends('frontend.layouts.master')
@section('title') {{ucwords(@$singleAlbum->name)}} | Album @endsection
@section('styles')

<style>
    .project-block-two .image-box .image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .project-block-four .inner-box .image-box .image {
        height: 400px;
    }
</style>
@endsection
@section('content')
    <!--Page Title-->
    <section class="page-title" style="background-image:url('{{asset('assets/frontend/images/background/11.jpeg')}}');">
        <div class="auto-container clearfix">
            <h1>{{ucwords(@$singleAlbum->name)}}</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="/">Home</a></li>
                <li><a href="{{route('album')}}">Albums</a></li>
                <li>{{ucwords(@$singleAlbum->name)}}</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Album Section -->
    <section class="projects-section-two">
        <div class="auto-container">

            <div class="items-container row">
                <!-- Portfolio Block -->
                @if(count(@$singleAlbum->gallery) > 0)
                    @foreach($singleAlbum->gallery as $gallery)
                        <div class="project-block-two  col-lg-4 col-md-6 project-block-four">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img src="{{asset('/images/uploads/albums/gallery/'.@$gallery->filename)}}" alt="{{@$gallery->original_name}}"></figure>
                                </div>
                                <div class="overlay-box">
                                    <div class="overlay-inner">
                                        <h4>{{@$gallery->original_name}}</h4>
                                        <div class="icon-box">
                                            <a href="{{asset('/images/uploads/albums/gallery/'.@$gallery->filename)}}" download><span class="icon fas fa-download"></span></a>
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
    <!-- End Album Section -->
@endsection
