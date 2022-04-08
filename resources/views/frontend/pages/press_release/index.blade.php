@extends('frontend.layouts.master')
@section('title') Press Release  @endsection
@section('styles')
    <style>
        .category a:hover {
            color: #fff;
        }
        .news-block-two .inner-box:hover .category a{
            color: #fff;
        }
    </style>
@endsection
@section('content')
    <!-- Page Title -->
    <section class="page-title" style="background-image: url('{{asset('assets/frontend/images/background/bg-17.jpg')}}');">
        <div class="auto-container">
            <div class="content-box">
                <div class="content-wrapper">
                    <div class="title">
                        <h1>Press Release </h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="/">Home</a></li>
                        <li>Press Release </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Title -->

    <!-- sidebar-page-container -->
    <section class="sidebar-page-container">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-8 content-side">
                    <div class="row">

                        @if(count($allPress) > 0)
                            @foreach($allPress as $press)
                                <div class="col-md-6 news-block-two">
                                    <div class="inner-box">
                                        <div class="image">
                                            <a href="{{route('press.single',@$press->slug)}}"><img class="lazy-image owl-lazy" src="{{asset('assets/frontend/images/resource/image-spacer-for-validation.png')}}" data-src="<?php if(@$press->image){?>{{asset('/images/uploads/press_releases/'.@$press->image)}}<?php }?>" alt="{{@$press->slug}}"></a>
                                        </div>
                                        <div class="lower-content">
{{--                                            <div class="category"><a href="{{route('blog.category',$post->category->slug)}}">{{ucwords(@$post->category->name)}}</a></div>--}}
                                            <ul class="post-meta">
                                                <li><a href="{{route('press.single',@$press->slug)}}">{{date('j F, Y',strtotime(@$press->created_at))}}</a></li>

                                            </ul>
                                            <h4><a href="{{route('press.single',$press->slug)}}">{{ucwords($press->title)}}</a></h4>
                                            <a href="{{route('press.single',$press->slug)}}" class="read-more-link"><i class="flaticon-right-arrow"></i>Read More</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                         @else
                            <p> Sorry, there are no press release content published yet. </p>
                        @endif


                    </div>
                    <div class="pagination-wrapper text-center mt-4">
                        {{ $allPress->links('vendor.pagination.default') }}

                    </div>
                </div>
                <aside class="col-lg-4 sidebar">
                    @include('frontend.pages.press_release.sidebar')

                </aside>
            </div>
        </div>
    </section>
    <!-- sidebar-page-container end -->

@endsection
