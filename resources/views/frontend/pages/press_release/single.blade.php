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
    <!-- Page Title -->
    <section class="page-title-two" style="background-image: url({{asset('assets/frontend/images/background/bg-26.jpg')}});">
        <div class="auto-container">
            <div class="content-box">
                <div class="content-wrapper">
                    <ul class="post-meta">
                        <li><a href="#">{{date('j F, Y',strtotime(@$singlePress->created_at))}}</a></li>
                    </ul>
                    <div class="title">
                        <h1>{{ucwords(@$singlePress->title)}}</h1>
                    </div>
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
                    <div class="blog-single-post">
                        <div class="image"><img src="{{ asset('/images/uploads/press_releases/'.@$singlePress->image) }}" alt=""></div>

                        <h3>{{ucwords(@$singlePress->title)}}</h3>
                        <div class="text">
                            {!! @$singlePress->description !!}
                        </div>

                        <div class="share-icon">
                            <h5>Share this Press Release</h5>
                            <ul class="social-links">
                                <li><a href="#" onclick='fbShare("{{route('press.single',$singlePress->slug)}}")'  class="facebook"><i class="fab fa-facebook-f"></i>Facebook</a></li>
                                <li><a href="#" onclick='twitShare("{{route('press.single',$singlePress->slug)}}","{{ $singlePress->title }}")' class="twitter"><i class="fab fa-twitter"></i>Twitter</a></li>
                                <li><a href="#" onclick='whatsappShare("{{route('press.single',$singlePress->slug)}}","{{ $singlePress->title }}")' class="whatsapp"><i class="fab fa-whatsapp"></i>Whatsapp</a></li>
                            </ul>
                        </div>

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
