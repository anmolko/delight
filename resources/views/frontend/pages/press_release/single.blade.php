@extends('frontend.layouts.seo_master')
@section('styles')

    <style>
        .blog-single-post .image {
            margin-bottom: 30px;
        }
        .blog-single-post .text .media {
            display: block;
        }
    </style>
@endsection
@section('seo')
    <title>{{ucfirst(@$singlePress->title)}} - @if(!empty(@$setting_data->website_name)) {{ucwords(@$setting_data->website_name)}} @else whitepearlmanpower @endif </title>
    <meta name='description' itemprop='description'  content='{{ucfirst(@$singlePress->description)}}' />
    <meta name='keywords' content='{{ucfirst(@$singlePress->description)}}' />
    <meta property='article:published_time' content='<?php if(@$singlePress->updated_at !=''){?>{{@$singlePress->updated_at}} <?php }else {?> {{@$singlePress->created_at}} <?php }?>' />
    <meta property='article:section' content='article' />
    <meta property="og:description" content="{{ucfirst(@$singlePress->description)}}" />
    <meta property="og:title" content="{{ucfirst(@$singlePress->title)}}" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:type" content="human-resource" />
    <meta property="og:locale" content="en-us" />
    <meta property="og:locale:alternate"  content="en-us" />
    <meta property="og:site_name" content="@if(!empty(@$setting_data->website_name)) {{ucwords(@$setting_data->website_name)}} @else White pearl @endif" />
    <meta property="og:image" content="<?php if(@$singlePress->image){?>{{asset('/images/uploads/press_releases/'.@$singlePress->image)}}<?php }?>" />
    <meta property="og:image:url" content="<?php if(@$singlePress->image){?>{{asset('/images/uploads/press_releases/'.@$singlePress->image)}}<?php }?>" />
    <meta property="og:image:size" content="300" />
@endsection
@section('content')

    <!--Page Title-->
    <section class="page-title" style="background-image:url('{{asset('assets/frontend/images/background/7.jpg')}}');">

    <div class="auto-container clearfix">
        <h1>{{ucwords(@$singlePress->title)}}</h1>
        <ul class="bread-crumb clearfix">
            <li><a href="/">Home</a></li>
            <li><a href="{{route('press.frontend')}}">Press Release</a></li>
            <li>{{ucwords(@$singlePress->title)}}</li>
        </ul>
    </div>
    </section>
    <!--End Page Title-->

    <!-- Sidebar Page Container -->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                <!--Content Side-->
                <div class="content-side col-lg-8 col-md-12 col-sm-12 order-2">
                    <div class="blog-detail">
                        <div class="news-block-two">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img src="{{ asset('/images/uploads/press_releases/'.@$singlePress->image) }}" alt="{{@$singlePress->slug}}"></figure>
                                </div>
                                    <!-- Other Options -->
                                    <div class="post-share-options clearfix">
                                        <div class="pull-left">
                                            <p>Press Release On : </p>
                                            <ul class="tags">
                                                <li><a href="#">{{date('F j, Y',strtotime(@$singlePress->created_at))}}</a></li>
                                            </ul>                               
                                        </div>
                                        <div class="pull-right">
                                            <p>Share : </p>
                                            <ul class="social-icon">
                                                <li><a href="#" onclick='fbShare("{{route('press.single',$singlePress->slug)}}")'  ><span class="fab fa-facebook"></span></a></li>
                                                <li><a href="#" onclick='twitShare("{{route('press.single',$singlePress->slug)}}","{{ $singlePress->title }}")' ><span class="fab fa-twitter"></span></a></li>
                                                <li><a href="#" onclick='whatsappShare("{{route('press.single',$singlePress->slug)}}","{{ $singlePress->title }}")' ><span class="fab fa-whatsapp"></span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                <div class="lower-content">
                                   
                                    {!! @$singlePress->description !!}
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                <!--Sidebar Side-->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                    @include('frontend.pages.press_release.sidebar')            
                   
                </div>
            </div>
        </div>
    </div>
    <!-- End Sidebar Container -->

@endsection

@section('js')
    <script>
        function fbShare(url) {
            window.open("https://www.facebook.com/sharer/sharer.php?u=" + url, "_blank", "toolbar=no, scrollbars=yes, resizable=yes, top=200, left=500, width=600, height=400");
        }
        function twitShare(url, title) {
            window.open("https://twitter.com/intent/tweet?text=" + encodeURIComponent(title) + "+" + url + "", "_blank", "toolbar=no, scrollbars=yes, resizable=yes, top=200, left=500, width=600, height=400");
        }
        function whatsappShare(url, title) {
            message = title + " " + url;
            window.open("https://api.whatsapp.com/send?text=" + message);
        }

    </script>
@endsection
