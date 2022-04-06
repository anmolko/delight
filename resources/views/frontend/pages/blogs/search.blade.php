@extends('frontend.layouts.master')
@section('title') Search Blog  @endsection
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
                        <h1>{{$query}} </h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="/">Home</a></li>
                        <li><a href="{{url('/blog')}}">Blog</a></li>
                        <li>Search Result </li>
                        
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
            @if(count($allPosts) > 0)

                <div class="col-lg-8 content-side">
                    <div class="row">
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
                    </div>
                    <div class="pagination-wrapper text-center mt-4">
                    {{ $allPosts->links('vendor.pagination.default') }}
                        
                    </div>
                </div>
                @else
                    <div class="col-lg-8">
                        <section class="no-results not-found">
                            <header class="page-header">
                                <h1 >Nothing Found</h1>
                            </header>
                            <div class="page-content">
                                <p>It seems we cannot find what you are looking for.</p>
                            </div>
                        </section>
                    </div>
                @endif
                <aside class="col-lg-4 sidebar">
                    @include('frontend.pages.blogs.sidebar')            
                   
                </aside>
            </div>
        </div>
    </section>
    <!-- sidebar-page-container end -->

@endsection
