@extends('frontend.layouts.master')
@section('title') {{ucwords(@$singleAlbum->name)}} | Album @endsection
@section('styles')

<style>
    .project-block-four .image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .project-block-four .inner-box .image {
        height: 400px;
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
                        <h1>{{ucwords(@$singleAlbum->name)}}</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="/">Home</a></li>
                        <li><a href="{{route('album')}}">Albums</a></li>
                        <li>{{ucwords(@$singleAlbum->name)}}</li>
                    </ul>
                </div>                    
            </div>
        </div>
    </section>
    <!-- Page Title -->

        <!-- Portfolio Section Two -->
        <section class="portfolio-section-two">
        <div class="auto-container">
            <div class="row">

            @if(count(@$singleAlbum->gallery) > 0)
                @foreach($singleAlbum->gallery as $gallery)
                    <div class="col-lg-4 col-md-6 project-block-four">
                        <div class="inner-box">
                            <div class="image"><img src="{{asset('/images/uploads/albums/gallery/'.@$gallery->filename)}}" alt=""></div>
                            <div class="overlay">
                                <h5>{{@$gallery->original_name}}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
             @endif
            </div>
        </div>
    </section>
@endsection
