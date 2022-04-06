<!DOCTYPE html>
<html lang="en-US" class="no-js no-svg">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="White Pearl Manpower">
    <meta name="description" content="@if(!empty(@$setting_data->website_description)) {{ucwords(@$setting_data->website_description)}} @else whitepearlmanpower @endif ">
    <link rel="canonical" href="https://whitepearlmanpower.com/" />
    <title>@yield('title') - @if(!empty(@$setting_data->website_name)) {{ucwords(@$setting_data->website_name)}} @else whitepearlmanpower @endif </title>
    <meta property="og:title" content="Home" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://whitepearlmanpower.com/" />
    <meta property="og:site_name" content="White Pearl Manpower" />
    <meta property="og:description" content="@if(!empty(@$setting_data->website_description)) {{ucwords(@$setting_data->website_description)}} @else whitepearlmanpower @endif " />

    <link rel="shortcut icon" type="image/x-icon" href="<?php if(@$setting_data->favicon){?>{{asset('/images/uploads/settings/'.@$setting_data->favicon)}}<?php }?>">


    <!-- Stylesheets -->
    <link href="{{asset('assets/frontend/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/css/style.css')}}" rel="stylesheet">
    <!-- Responsive File -->
    <link href="{{asset('assets/frontend/css/responsive.css')}}" rel="stylesheet">
    <!-- Color File -->
    <link href="{{asset('assets/frontend/css/color.css')}}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&amp;family=Fira+Sans:wght@400;500;600;700;800;900&amp;display=swap" rel="stylesheet">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{@$setting_data->google_analytics}}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '{{@$setting_data->google_analytics}}');
    </script>




    @stack('styles')
    @yield('styles')

</head>

<body>

<div class="page-wrapper">

    <!-- Main Header -->
    <header class="main-header header-style-one">
        <!-- Header Top -->
        <div class="header-top">
            <div class="auto-container">
                <div class="inner">
                    <div class="top-left">
                        <div class="text"><i class="fa fa-map-marker-alt"> </i>@if(!empty(@$setting_data->address)) {{@$setting_data->address}} @else Kathmandu, Nepal @endif </div>
                    </div>
                    <div class="top-right">
                        <ul class="contact-info">
                            <li><a href="mailto:@if(!empty(@$setting_data->email)) {{@$setting_data->email}} @else example@gmail.com @endif"><i class="flaticon-mail"></i>@if(!empty(@$setting_data->email)) {{@$setting_data->email}} @else example@gmail.com @endif</li>
                            <li><a href="tel:@if(!empty(@$setting_data->phone)) {{@$setting_data->phone}} @else +977 1234567 @endif"><i class="flaticon-phone"></i>@if(!empty(@$setting_data->phone)) {{@$setting_data->phone}} @else +977 1234567 @endif</a></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

        <!-- Header Upper -->
        <div class="header-upper">
            <div class="auto-container">
                <div class="inner-container clearfix">
                    <!--Logo-->
                    <div class="logo-box">
                        <div class="logo"><a href="/"><img src="<?php if(@$setting_data->logo){?>{{asset('/images/uploads/settings/'.@$setting_data->logo)}}<?php }?>" alt="White Pearl Manpower"></a></div>
                    </div>
                    <!--Nav Box-->
                    <div class="nav-outer clearfix">
                        <!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler"><img src="{{asset('assets/frontend/images/icons/icon-bar.png')}}" alt=""></div>

                        <!-- Main Menu -->
                        <nav class="main-menu navbar-expand-md navbar-light">
                            <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                    <li  class="{{request()->is('/') ? 'current' : ''}} ">
                                        <a href="/" class="nav-link">Home</a>
                                    </li>
                                    @if(!empty($top_nav_data))
                                        @foreach($top_nav_data as $nav)
                                            @if(!empty($nav->children[0]))

                                                <li class="dropdown {{request()->is(@$nav->slug)  ? 'current' : ''}} ">
                                                    <a href="/" class="">@if(@$nav->name == NULL) {{ucwords(@$nav->title)}} @else {{ucwords(@$nav->name)}} @endif </a>

                                                    <ul>
                                                        @foreach($nav->children[0] as $childNav)
                                                            @if($childNav->type == 'custom')
                                                                <li  class="{{request()->is(@$childNav->slug) ? 'current' : ''}}">
                                                                    <a href="/{{@$childNav->slug}}"  @if(@$childNav->target !== NULL) target="_blank" @endif >@if($childNav->name == NULL) {{@$childNav->title}} @else {{@$childNav->name}} @endif</a></li>
                                                            @elseif($childNav->type == 'post')
                                                                <li  class="{{request()->is('blog/'.@$childNav->slug) ? 'current' : ''}}  ">
                                                                    <a href="{{url('blog')}}/{{@$childNav->slug}}"  >@if(@$childNav->name == NULL) {{@$childNav->title}} @else {{@$childNav->name}} @endif</a></li>
                                                            @else
                                                                <li class="{{request()->is(@$childNav->slug) ? 'current' : ''}} ">
                                                                    <a href="{{url('/')}}/{{@$childNav->slug}}" >@if($childNav->name == NULL) {{@$childNav->title}} @else {{@$childNav->name}} @endif</a></li>
                                                            @endif
                                                        @endforeach

                                                    </ul>
                                                </li>

                                            @else
                                                @if($nav->type == 'custom')
                                                    <li  class="{{request()->is(@$nav->slug.'*') ? 'current' : ''}} ">
                                                        <a href="/{{$nav->slug}}" @if($nav->target == NULL)  @else target="{{$nav->target}}" @endif>@if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif</a></li>
                                                @elseif($nav->type == 'post')
                                                    <li  class="{{request()->is('blog/'.@$nav->slug.'*') ? 'current' : ''}} ">
                                                        <a href="{{url('blog')}}/{{$nav->slug}}"> @if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif</a></li>
                                                @else
                                                    <li  class="{{request()->is(@$nav->slug.'*') ? 'current' : ''}} ">
                                                        <a href="{{url('/')}}/{{$nav->slug}}"> @if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif</a></li>
                                                @endif
                                            @endif
                                        @endforeach
                                    @endif


                                </ul>
                            </div>
                        </nav>
                        <!-- Main Menu End-->

                    </div>
                </div>
            </div>
        </div>
        <!--End Header Upper-->

        <!-- Sticky Header  -->
        <div class="sticky-header">
            <div class="header-upper">
                <div class="auto-container">
                    <div class="inner-container clearfix">
                        <!--Logo-->
                        <div class="logo-box">
                            <div class="logo"><a href="/"><img src="<?php if(@$setting_data->logo){?>{{asset('/images/uploads/settings/'.@$setting_data->logo)}}<?php }?>" alt="White Pearl Manpower"></a></div>
                        </div>
                        <!--Nav Box-->
                        <div class="nav-outer clearfix">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler"><img src="{{asset('assets/frontend/images/icons/icon-bar.png')}}" alt=""></div>

                            <!-- Main Menu -->
                            <nav class="main-menu navbar-expand-md navbar-light">
                            </nav>
                            <!-- Main Menu End-->

                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Sticky Menu -->

        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="icon flaticon-remove"></span></div>

            <nav class="menu-box">
                <div class="nav-logo"><a href="/"><img src="<?php if(@$setting_data->logo_white){?>{{asset('/images/uploads/settings/'.@$setting_data->logo_white)}}<?php } ?>" alt="White Pearl Manpower" title="White Pearl Manpower"></a></div>
                <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
                <!--Social Links-->
                <div class="social-links">
                    <ul class="clearfix">
                        <li><a href="@if(!empty(@$setting_data->facebook)) {{@$setting_data->facebook}} @endif" rel="noopener"target="_blank"><span class="fab fa-facebook-square"></span></a></li>
                        <li><a href="@if(!empty(@$setting_data->instagram)) {{@$setting_data->instagram}} @endif" rel="noopener"target="_blank"><span class="fab fa-instagram"></span></a></li>
                        <li><a href="@if(!empty(@$setting_data->youtube)) {{@$setting_data->youtube}} @endif" rel="noopener"target="_blank"><span class="fab fa-youtube"></span></a></li>
                    </ul>
                </div>
            </nav>
        </div><!-- End Mobile Menu -->

        <div class="nav-overlay">
            <div class="cursor"></div>
            <div class="cursor-follower"></div>
        </div>
    </header>
    <!-- End Main Header -->
