@extends('frontend.layouts.master')
@section('title') Blog  @endsection
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
    <!--Page Title-->
    <section class="page-title" style="background-image:url('{{asset('assets/frontend/images/background/7.jpg')}}');">
            <div class="auto-container clearfix">
                <h1>Latest Blog</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="/">Home</a></li>
                    <li>Blog</li>
                </ul>
            </div>
        </section>
        <!--End Page Title-->

        <!-- News Section -->
        <section class="news-section">
            <div class="auto-container">
                <div class="row clearfix">

                    <div class="content-side col-lg-8 order-2">
                        <div class="row ">
                            <!-- News Block -->
                            <div class="news-block col-md-6 ">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image">
                                            <a href="blog-detail.html"><img src="images/resource/news-1.jpg" alt=""></a>
                                        </figure>
                                    </div>
                                    <div class="lower-content">
                                        <div class="post-date"><span class="far fa-calendar"></span> Jan 01, 2020</div>
                                        <ul class="post-info">
                                            <li><span class="far fa-user"></span> By Admin | </li>
                                            <li><a href="#">General Carpentry</a></li>
                                        </ul>
                                        <h4><a href="blog-detail.html">Woodworker treak truned into furniture for exhibition.</a></h4>
                                        <div class="btn-box"><a href="#" class="read-more">Read More <span class="fa fa-arrow-right"></span></a></div>
                                    </div>
                                </div>
                            </div>

                            <div class="styled-pagination text-center">
                                <ul class="clearfix">
                                    <li class="prev-post"><a href="#"><span class="flaticon-back-1"></span></a></li>
                                    <li><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li class="active"><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li class="next-post"><a href="#"><span class="flaticon-next-1"></span> </a></li>
                                </ul>
                            </div>
                           
                        </div>
                    </div>
                    <!--Sidebar Side-->
                    <div class="sidebar-side col-lg-4 ">
                        @include('frontend.pages.blogs.sidebar')            
                      
                    </div>

                </div>
            </div>
        </section>
        <!--End News Section Two -->


    <!-- sidebar-page-container -->
    <section class="sidebar-page-container">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-8 content-side">
                    <div class="row">
                           
                        @if(count($allPosts) > 0)
                            @foreach($allPosts as $post)
                            <div class="col-md-6 news-block-two">
                                <div class="inner-box">
                                    <div class="image">
                                        <a href="{{route('blog.single',@$post->slug)}}"><img class="lazy-image owl-lazy" src="{{asset('assets/frontend/images/resource/image-spacer-for-validation.png')}}" data-src="<?php if(@$post->image){?>{{asset('/images/uploads/blog/'.@$post->image)}}<?php }?>" alt="{{@$post->slug}}"></a>
                                    </div>
                                    <div class="lower-content">
                                        <div class="category"><a href="{{route('blog.category',$post->category->slug)}}">{{ucwords(@$post->category->name)}}</a></div>
                                        <ul class="post-meta">
                                            <li><a href="{{route('blog.single',@$post->slug)}}">{{date('j F, Y',strtotime(@$post->created_at))}}</a></li>
                                        
                                        </ul>
                                        <h4><a href="{{route('blog.single',$post->slug)}}">{{ucwords($post->title)}}</a></h4>
                                        <a href="{{route('blog.single',$post->slug)}}" class="read-more-link"><i class="flaticon-right-arrow"></i>Read More</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                       
                     
                    </div>
                    <div class="pagination-wrapper text-center mt-4">
                    {{ $allPosts->links('vendor.pagination.default') }}
                        
                    </div>
                </div>
                <aside class="col-lg-4 sidebar">
                   
                </aside>
            </div>
        </div>
    </section>
    <!-- sidebar-page-container end -->

@endsection
