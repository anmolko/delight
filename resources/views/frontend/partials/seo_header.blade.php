<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Delight Foreign Manpower">
    <link rel="canonical" href="https://delightforeign.com/" />
    @yield('seo')

    <link rel="shortcut icon" type="image/x-icon" href="<?php if(@$setting_data->favicon){?>{{asset('/images/uploads/settings/'.@$setting_data->favicon)}}<?php }?>">
    <link rel="icon" href="<?php if(@$setting_data->favicon){?>{{asset('/images/uploads/settings/'.@$setting_data->favicon)}}<?php }?>" type="image/x-icon">


    <!-- Stylesheets -->
    <link href="{{asset('assets/frontend/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/css/responsive.css')}}" rel="stylesheet">
  

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{@$setting_data->google_analytics}}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '{{@$setting_data->google_analytics}}');
    </script>

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    @stack('styles')
    @yield('styles')
</head>

<body>

<div class="page-wrapper">
    <!-- Preloader -->
	@if (\Request::is('/'))  <div class="preloader"></div> @endif

    <!-- Main Header-->
    <header class="main-header">
        <!--Header Top-->
        <div class="header-top">
            <div class="auto-container clearfix">
                <div class="top-left">
                    <div class="text">Welcome to  @if(!empty(@$setting_data->website_name)) {{ucwords(@$setting_data->website_name)}}. @else Delight Foreign Manpower. @endif</div>
                </div>

                <div class="top-right">
                    <ul class="contact-info clearfix">
                        <li><span class="icon fa fa-phone-volume"></span> <a href="tel:@if(!empty(@$setting_data->phone)) {{@$setting_data->phone}} @else +977 1234567 @endif">@if(!empty(@$setting_data->phone)) {{@$setting_data->phone}} @else +977 1234567 @endif</a></li>
                        <li><span class="icon fa fa-envelope"></span> <a href="mailto:@if(!empty(@$setting_data->email)) {{@$setting_data->email}} @else example@gmail.com @endif">@if(!empty(@$setting_data->email)) {{@$setting_data->email}} @else example@gmail.com @endif</a></li>
                    </ul>
                    <ul class="social-icon-one clearfix">

                        @if(!empty(@$setting_data->facebook))
                            <li><a href="@if(!empty(@$setting_data->facebook)) {{@$setting_data->facebook}} @endif"><i class="fab fa-facebook-f"></i></a></li>
                        @endif
                        @if(!empty(@$setting_data->youtube))
                            <li><a href="@if(!empty(@$setting_data->youtube)) {{@$setting_data->youtube}} @endif"><i class="fab fa-youtube"></i></a></li>
                        @endif
                        @if(!empty(@$setting_data->instagram))
                            <li><a href="@if(!empty(@$setting_data->instagram)) {{@$setting_data->instagram}} @endif"><i class="fab fa-instagram"></i></a></li>
                        @endif
                        @if(!empty(@$setting_data->whatsapp))
                            <li><a href="https://wa.me/@if(!empty(@$setting_data->whatsapp)) {{@$setting_data->whatsapp}} @endif"><i class="fab fa-whatsapp"></i></a></li>
                        @endif
                        @if(!empty(@$setting_data->viber))
                            <li><a href="viber://chat?number=@if(!empty(@$setting_data->viber)) {{@$setting_data->viber}} @endif"><i class="fab fa-viber"></i></a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Header Top -->

        <!--Header Lower-->
        <div class="header-lower">
            <div class="auto-container">
                <div class="main-box clearfix">
                    <div class="pull-left logo-outer">
                        <div class="logo"><a href="/"><img src="<?php if(@$setting_data->logo){?>{{asset('/images/uploads/settings/'.@$setting_data->logo)}}<?php }?>" alt="Delight Foreign Manpower"></a></div>
                    </div>

                    <!--Nav Box-->
                    <div class="nav-outer clearfix">
                        <!--Mobile Navigation Toggler-->
                        <div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>

                        <!-- Main Menu -->
                        <nav class="main-menu navbar-expand-md navbar-light">
                            <div class="collapse navbar-collapse clearfix" id="navbarSupportedContent">
                                <ul class="navigation clearfix">
                                    <li class="{{request()->is('/') ? 'current' : ''}} "> <a href="/" >Home</a></li>
                                    @if(!empty($top_nav_data))
                                        @foreach($top_nav_data as $nav)
                                        @if(!empty($nav->children[0]))

                                        <li class="dropdown {{request()->is(@$nav->slug)  ? 'current' : ''}} ">
                                            <a href="/" >@if(@$nav->name == NULL) {{ucwords(@$nav->title)}} @else {{ucwords(@$nav->name)}} @endif </a>

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

                        <div class="outer-box">
                            <!-- Btn Box -->
                            <div class="btn-box">
                                <a href="{{route('contact')}}" class="theme-btn btn-style-one"><span class="btn-title">Reach out</span> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End Header Lower-->

        <!-- Sticky Header  -->
        <div class="sticky-header">
            <div class="auto-container clearfix">
                <!--Logo-->
                <div class="logo pull-left">
                    <a href="/" title=""><img src="<?php if(@$setting_data->logo){?>{{asset('/images/uploads/settings/'.@$setting_data->logo)}}<?php }?>" alt="Delight Foreign Manpower" /></a>
                </div>
                <!--Right Col-->
                <div class="nav-outer pull-right">
                    <!--Mobile Navigation Toggler-->
                    <div class="mobile-nav-toggler"><span class="icon flaticon-menu"></span></div>

                    <!-- Main Menu -->
                    <nav class="main-menu">
                        <div class="navbar-collapse show collapse clearfix">
                            <ul class="navigation clearfix"><!--Keep This Empty / Menu will come through Javascript--></ul>
                        </div>
                    </nav><!-- Main Menu End-->
                </div>
            </div>
        </div><!-- End Sticky Menu -->


        <!-- Mobile Menu  -->
        <div class="mobile-menu">
            <div class="menu-backdrop"></div>
            <div class="close-btn"><span class="icon flaticon-cancel-1"></span></div>

            <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
            <nav class="menu-box">
                <div class="nav-logo"><a href="/"><img src="<?php if(@$setting_data->logo){?>{{asset('/images/uploads/settings/'.@$setting_data->logo)}}<?php }?>" alt="Delight Foreign Manpower" /></a></div>

                <ul class="navigation clearfix"><!--Keep This Empty / Menu will come through Javascript--></ul>
            </nav>
        </div><!-- End Mobile Menu -->
    </header>
    <!--End Main Header -->

