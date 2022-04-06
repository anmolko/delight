<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title') - @if(!empty(@$setting_data->website_name)) {{ucwords(@$setting_data->website_name)}} @else Delight Foreign Manpower @endif </title>

    <meta name="description" content="@if(!empty(@$setting_data->website_description)) {{ucwords(@$setting_data->website_description)}} @else Delight Foreign Manpower @endif ">
    <link rel="canonical" href="https://delightforeign.com/" />

    <meta property="og:title" content="Home" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="https://delightforeign.com/" />
    <meta property="og:site_name" content=" Delight Foreign Manpower" />
    <meta property="og:description" content="@if(!empty(@$setting_data->website_description)) {{ucwords(@$setting_data->website_description)}} @else  Delight Foreign Manpower @endif " />

    <link rel="shortcut icon" type="image/x-icon" href="<?php if(@$setting_data->favicon){?>{{asset('/images/uploads/settings/'.@$setting_data->favicon)}}<?php }?>">
    <link rel="icon" href="<?php if(@$setting_data->favicon){?>{{asset('/images/uploads/settings/'.@$setting_data->favicon)}}<?php }?>" type="image/x-icon">



    <!-- Stylesheets -->
    <link href="{{asset('assets/frontend/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/css/responsive.css')}}" rel="stylesheet">
    <!--Color Switcher Mockup-->
    <link href="{{asset('assets/frontend/css/color-switcher-design.css')}}" rel="stylesheet">
    <!--Color Themes-->
    <link id="theme-color-file" href="{{asset('assets/frontend/css/color-themes/default-theme.css')}}" rel="stylesheet">

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
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="{{asset('assets/frontend/js/respond.js')}}"></script><![endif]-->

    @stack('styles')
    @yield('styles')
</head>

<body>

<div class="page-wrapper">
    <!-- Preloader -->
    <div class="preloader"></div>

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
                                    <li class="current dropdown"><a href="#">Home</a>
                                        <ul>
                                            <li class="dropdown"><a href="#">Header Styles</a>
                                                <ul>
                                                    <li><a href="#">Header Style One</a></li>
                                                    <li><a href="#">Header Style Two</a></li>
                                                    <li><a href="#">Header Style Three</a></li>
                                                    <li><a href="#">Header Style Four</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="">Home Style One</a></li>
                                            <li><a href="#">Home Style Two</a></li>
                                            <li><a href="#">Home Style Three</a></li>
                                            <li><a href="#">Home One Pager</a></li>
                                            <li><a href="#">Home Video Banner</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#">About</a>
                                        <ul>
                                            <li><a href="#">About Us</a></li>
                                            <li><a href="#">FAQ's</a></li>
                                            <li><a href="#">Team</a></li>
                                            <li><a href="#">Pricing</a></li>
                                            <li><a href="#">Coming Soon</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#">Services</a>
                                        <ul>
                                            <li><a href="#">All Services</a></li>
                                            <li><a href="#">General Carpentry</a></li>
                                            <li><a href="#">Furniture Remodeling</a></li>
                                            <li><a href="#">Hang Paintings</a></li>
                                            <li><a href="#">Manufactur Furniture</a></li>
                                            <li><a href="#">Commercial work</a></li>
                                            <li><a href="#">Furniture Design</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#">Projects</a>
                                        <ul>
                                            <li><a href="#">Projects</a></li>
                                            <li><a href="#">Project Detail</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#">Blog</a>
                                        <ul>
                                            <li><a href="#">Blog with Sidebar</a></li>
                                            <li><a href="#">Blog Grid View</a></li>
                                            <li><a href="#">Blog Detail</a></li>
                                            <li><a href="#">404 Error</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown"><a href="#">Shop</a>
                                        <ul>
                                            <li><a href="#">Shop</a></li>
                                            <li><a href="#">Product Details</a></li>
                                            <li><a href="#">Cart Page</a></li>
                                            <li><a href="#">Checkout Page</a></li>
                                            <li><a href="#">Registration Page</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </div>
                        </nav>
                        <!-- Main Menu End-->

                        <div class="outer-box">
                            <!-- Shoppping Car -->
{{--                            <div class="cart-btn">--}}
{{--                                <a href="#"><i class="icon flaticon-shopping-bag"></i> <span class="count">2</span></a>--}}
{{--                            </div>--}}

                            <!-- Btn Box -->
                            <div class="btn-box">
                                <a href="#" class="theme-btn btn-style-one"><span class="btn-title">Reach out</span> </a>
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

