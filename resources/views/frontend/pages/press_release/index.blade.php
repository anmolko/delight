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
    <section class="page-title" style="background-image:url('{{asset('assets/frontend/images/background/11.jpeg')}}');">
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


    <!-- News Section -->
    <section class="news-section">
        <div class="auto-container">
            <div class="row clearfix">

                <div class="content-side col-lg-8 order-2">
                    <div class="row ">
                        <!-- News Block -->
                        @if(count($allPress) > 0)
                            @foreach($allPress as $press)

                            <div class="news-block col-md-6 ">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image">
                                            <a href="{{route('press.single',@$press->slug)}}"><img src="<?php if(@$press->image){?>{{asset('/images/uploads/press_releases/'.@$press->image)}}<?php }?>" alt="{{@$press->slug}}"></a>
                                        </figure>
                                    </div>
                                    <div class="lower-content">
                                        <div class="post-date"><span class="far fa-calendar"></span> {{date('M j, Y',strtotime(@$press->created_at))}}</div>

                                        <h4><a href="{{route('press.single',@$press->slug)}}">{{ucwords($press->title)}}</a></h4>
                                        <div class="btn-box"><a href="{{route('press.single',@$press->slug)}}" class="read-more">Read More <span class="fa fa-arrow-right"></span></a></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <section class="no-results not-found">
                                <header class="page-header">
                                    <h1 >Nothing Found</h1>
                                </header>
                                <div class="page-content">
                                    <p>Sorry, there are no press release content published yet.</p>
                                </div>
                            </section>
                        @endif


                    </div>
                    <div class="styled-pagination text-center">

                        {{ $allPress->links('vendor.pagination.default') }}
                    </div>
                </div>
                <!--Sidebar Side-->
                <div class="sidebar-side col-lg-4 ">
                    @include('frontend.pages.press_release.sidebar')

                </div>

            </div>
        </div>
    </section>
    <!--End News Section Two -->

@endsection
