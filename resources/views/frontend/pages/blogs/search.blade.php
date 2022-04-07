@extends('frontend.layouts.master')
@section('title') Search Blog  @endsection
@section('styles')
    <style>
   
    </style>
@endsection
@section('content')
  

    <!--Page Title-->
   <section class="page-title" style="background-image:url('{{asset('assets/frontend/images/background/7.jpg')}}');">
        <div class="auto-container clearfix">
            <h1>{{@$query}} </h1>
            <ul class="bread-crumb clearfix">
                <li><a href="/">Home</a></li>
                <li><a href="{{url('/blog')}}">Blog</a></li>
                <li>Search Result </li>
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
                        @if(count($allPosts) > 0)
                            @foreach($allPosts as $post)

                            <div class="news-block col-md-6 ">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image">
                                            <a href="{{route('blog.single',@$post->slug)}}"><img src="<?php if(@$post->image){?>{{asset('/images/uploads/blog/'.@$post->image)}}<?php }?>" alt="{{@$post->slug}}"></a>
                                        </figure>
                                    </div>
                                    <div class="lower-content">
                                        <div class="post-date"><span class="far fa-calendar"></span> {{date('M j, Y',strtotime(@$post->created_at))}}</div>
                                        <ul class="post-info">
                                            <li><a href="{{route('blog.category',$post->category->slug)}}">{{ucwords(@$post->category->name)}}</a></li>
                                        </ul>
                                        <h4><a href="{{route('blog.single',@$post->slug)}}">{{ucwords($post->title)}}</a></h4>
                                        <div class="btn-box"><a href="{{route('blog.single',@$post->slug)}}" class="read-more">Read More <span class="fa fa-arrow-right"></span></a></div>
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
                                <p>It seems we cannot find what you are looking for.</p>
                            </div>
                        </section>

                        @endif
                                                    
                        
                    </div>
                    <div class="styled-pagination text-center">
                        
                        {{ $allPosts->links('vendor.pagination.default') }}
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


@endsection
