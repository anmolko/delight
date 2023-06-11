@extends('frontend.layouts.master')
@section('title') {{ucwords(@$page_detail->name)}}  @endsection
@section('styles')
    <style>

        #gallery #image-gallery .img-wrapper {
            height: 270px;
        }
        #gallery img.img-responsive {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
    <link rel="stylesheet" href="{{asset('assets/frontend/css/lightbox.css')}}">
    <style>
        .about-us .content-column ol, .about-us .content-column ul, .tabs-content ul, .tabs-content ol,
        .sidebar-page-container .blog-detail ul, .sidebar-page-container .blog-detail ol{
            margin-bottom: 40px;
            position: relative;
            display: block;
        }
        .about-us .content-column ol li ,.about-us .content-column ul li,
        .tabs-content ul li, .tabs-content ol li, .sidebar-page-container .blog-detail ul li, .sidebar-page-container .blog-detail ol li {
            margin-bottom: 5px;
            position: relative;
            font-size: 18px;
            line-height: 1.6em;
            color: #353535;
            font-weight: 500;
            padding-left: 25px;
        }

        .about-us .content-column ol li:before,.about-us .content-column ul li:before,
        .tabs-content ul li:before, .tabs-content ol li:before,
        .sidebar-page-container .blog-detail ul li:before, .sidebar-page-container .blog-detail ol li:before
        {
            position: absolute;
            left: 0;
            top: 0;
            font-size: 14px;
            line-height: 25px;
            color: #223f98;
            font-weight: 900;
            font-family: "Font Awesome 5 Free";
            content: "\f00c";
        }

        .pricing-tabs blockquote, .service-detail-section blockquote{
            position: relative;
            border-left: 4px solid #223f98;
            background-color: #f5f5f5;
            font-size: 18px;
            line-height: 1.8em;
            padding: 25px 40px;
            margin-bottom: 20px;
            margin-top: 20px;

        }
        .sidebar-page-container {
            padding: 100px 0 75px;
        }


        .pricing-tabs .tab-buttons {
            margin-top: 40px;
            margin-bottom: 40px;
        }

        .tabs-content h3 {
            position: relative;
            display: block;
            font-size: 28px;
            line-height: 1.2em;
            color: #252525;
            font-weight: 500;
            margin-bottom: 20px;
        }

        .tabs-content .text p, .tabs-content .text, .sidebar-page-container .blog-detail p {
            font-size: 16px;
            line-height: 30px;
        }

        .pricing-section {
             padding: 90px 0 100px;
        }
        .service-detail-section {
            padding: 90px 0 80px;
        }
        .sidebar-page-container .blog-detail ul{
            margin-bottom: 15px;
            margin-top: 15px;
        }

    </style>
@endsection
@section('content')
    <!-- Page Title -->
    <section class="page-title" style="background-image:url({{asset('assets/frontend/images/background/7.jpg')}}); margin-bottom: 30px">
        <div class="auto-container clearfix">
            <h1>{{ucwords(@$page_detail->name)}}</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="/">Home</a></li>
                <li>{{ucwords(@$page_detail->name)}}</li>
            </ul>
        </div>
    </section>

    @foreach($sorted_sections as $key=>$value)

        @if($value == "basic_section")
            <section class="about-us" style="padding: 120px 0 0px!important;">
                <div class="auto-container">
                    <div class="row clearfix">
                        <!-- Content Column -->
                        <div class="content-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <div class="sec-title">
                                    <h2>{{ucwords(@$basic_elements->heading)}}</h2>
                                </div>
                                <div class="about-years"><h3>{{ucfirst(@$basic_elements->subheading)}}</h3></div>
                                <div class="text-box">
                                    {!! @$basic_elements->description !!}
                                </div>
                                @if(@$basic_elements->button_link)
                                <div class="bottom-box clearfix">
                                    <div class="btn-box">
                                        <a href="{{@$basic_elements->button_link}}" class="theme-btn btn-style-one"><span class="btn-title">{{ucwords(@$basic_elements->button)}}</span></a>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="image-column col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column">
                                <div class="video-box wow fadeIn animated" style="visibility: visible; animation-name: fadeIn;">
                                    <figure class="image"><img src="{{asset('/images/uploads/section_elements/basic_section/'.@$basic_elements->image) }}" alt=""></figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        @if($value == "image_description_section")
            <section class="offer-section" style=" padding: {{ $page_detail->slug=="ceo-message" ?  '120px 0 0px':'120px 0 7px' }}!important;">
                <div class="bg-pattern"></div>
                <div class="auto-container">
                    <div class="sec-title">
                        <div class="text" style="word-break: break-all;width: 60%;">{{@$image_des_elements->subheading}}</div>
                        <h2>{{@$image_des_elements->heading}}</h2>
                    </div>
                    <div class="row no-gutters">
                        <div class="content-column col-xl-7 col-lg-6 col-md-12 col-sm-12 order-2">
                            <div class="inner-column" style="height: 34rem;">
                                <h2 style="font-size: 29px;word-break: break-all;width: 60%;">{{@$image_des_elements->list_header}}</h2>
                                <div class="text" style="font-size: 17px; text-align: justify">
                                    {{@$image_des_elements->description}}
                                </div>

                            </div>
                        </div>

                        <div class="form-column col-xl-5 col-lg-6 col-md-12 col-sm-12">
                            <div class="inner-column" style="padding-right: 10px;">
                                <div class="discount-form" style="padding:0">
                                    <figure class="image" style="margin: 0">
                                        <img src="{{asset('/images/uploads/section_elements/basic_section/'.@$image_des_elements->image) }}" alt="">
                                    </figure>
                                    <!--Comment Form-->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        @if($value == "call_to_action_1")

            <section class="call-to-action" style="background-image:url({{(@$call1_elements->image !== null) ? asset('images/uploads/section_elements/call_1/'.@$call1_elements->image) : asset('assets/frontend/images/background/13.jpg')}})!important; padding: 30px; margin-bottom: 0">
                <div class="auto-container" style="padding-bottom: 15px; max-width: 960px;">
                    <div class="content-box">
                        <h2>{{ucfirst(@$call1_elements->heading)}}</h2>
                        <div class="link-box">
                            <a href="{{@$call1_elements->button_link}}" class="theme-btn btn-style-three">
                                <span class="btn-title">{{ucwords(@$call1_elements->button)}}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        @if($value == "call_to_action_2")
            <section class="projects-section-three" style="background-image: url({{(@$call2_elements->image !== null) ? asset('/images/uploads/section_elements/call_1/'.@$call2_elements->image) : asset('assets/frontend/images/background/2.jpg')}});padding: 60px 0px 40px 0;">
                <div class="auto-container">
                    <div class="upper-box">
                        <div class="sec-title light">
                            <h2>{{ucwords(@$call2_elements->heading)}}</h2>
                            <div class="text">
                                {{ucwords(@$call2_elements->description)}}
                            </div>
                        </div>
                        @if(@$call2_elements->button)
                            <a href="{{@$call2_elements->button_link}}" class="theme-btn btn-style-three view-all">
                                <span class="btn-title">{{ucwords(@$call2_elements->button)}}</span>
                            </a>
                        @endif
                    </div>
                </div>
            </section>
        @endif

        @if($value == "simple_tab_list")
            <section class="pricing-section">
            <div class="auto-container">
                <div class="sec-title text-center" style="margin-bottom: 0px">
                    <h2>{{@$bgimage_elements[0]->heading}}</h2>
                    <div class="text" style="word-break: break-all;width: 60%;margin: auto;padding-top: 40px;">
                        {{@$bgimage_elements[0]->subheading}}
                    </div>
                </div>
                <div class="pricing-tabs tabs-box clearfix">
                    <!--Tab Btns-->
                    <div class="tab-buttons">
                        <ul class="tab-btns clearfix" style="width: 350px;">
                            <li data-tab="#monthly" class="tab-btn active-btn">{{@$bgimage_elements[0]->list_header}}</li>
                            <li data-tab="#annual" class="tab-btn">{{@$bgimage_elements[1]->list_header}}</li>
                        </ul>
                    </div>
                    <!--Tabs Container-->
                    <div class="tabs-content">

                        <!--Tab / Active Tab-->
                        <div class="tab active-tab animated fadeIn" id="monthly">
                            <div class="content">
                                <div class="row" style="display: block">
                                    <h3>{{@$bgimage_elements[0]->description}}</h3>
                                    <div class="text">
                                        {!! @$bgimage_elements[0]->list_description !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Tab-->
                        <div class="tab" id="annual">
                            <div class="content">
                                <div class="row"  style="display: block">
                                    <h3>{{@$bgimage_elements[1]->description}}</h3>
                                    <div class="text">
                                        {!! @$bgimage_elements[1]->list_description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>
        @endif

        @if($value == "flash_cards")
            <div class="service-detail-section">
                <div class="auto-container">
                    <div class="row">
                        <div class="content-side col-lg-12 col-md-12 col-sm-12">
                            <div class="service-detail">
                                <div class="content-box">
                                    <h2 style="text-align: center;">{{@$flash_elements[0]->heading ?? ''}}</h2>
                                    <p style="text-align: center;">{{@$flash_elements[0]->subheading ?? ''}}</p>
                                    <div class="service-tabs tabs-box">
                                        <!--Tab Btns-->
                                        <ul class="tab-btns tab-buttons clearfix">
                                            @foreach(@$flash_elements as $key=>$flash_element)
                                                <li data-tab="#service-tab-{{$key}}" class="tab-btn {{($key==0) ? 'active-btn':''}}">
                                                    {{ @$flash_element->list_header }}
                                                </li>

                                            @endforeach
                                        </ul>

                                        <!--Tabs Container-->
                                        <div class="tabs-content">

                                            <!--Tab active-tab-->
                                            @foreach(@$flash_elements as $key=>$flash_element)

                                            <div class="tab {{($key==0) ? 'active-tab':''}}" id="service-tab-{{$key}}">
                                                <div class="tab-inner">
                                                    <div class="text">
                                                        {!! @$flash_element->list_description !!}
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if($value == "accordion_section_1")
        <section class="faqs-section alternate">
            <div class="auto-container">
                <div class="sec-title text-center">
                    <h2>{{ucwords(@$accordian1_elements[0]->heading)}}</h2>
                    <div class="text" style="word-break: break-all;width: 60%;margin: auto;padding-top: 40px;">
                        {{@$accordian1_elements[0]->description}}</div>
                </div>
                <div class="row">
                    <!-- FAQ Column -->
                    <div class="faq-column col-lg-12 col-md-12 col-sm-12">
                        <ul class="accordion-box">
                            <!--Block-->
                            @foreach(@$accordian1_elements as $key=>$value)
                                <li class="accordion block {{($key==0) ? 'active-block':''}}">
                                    <div class="acc-btn {{($key==0) ? 'active':''}}">
                                        {{@$value->list_header}}<div class="icon fa fa-plus-circle"></div></div>
                                    <div class="acc-content" style="display: {{($key==0) ? 'block':'none'}};">
                                        <div class="content">
                                            <div class="text">
                                                {{@$value->list_description}}
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </section>
        @endif

        @if($value == "gallery")
            <section class="faqs-section alternate" style="padding: 10px 0 100px!important;">
                <div class="auto-container">
                    @if($heading!==null)
                        <div class="sec-title text-center">
                            <div class="text" style="word-break: break-all;width: 60%;margin: auto;padding-top: 40px;">{{$subheading ?? ''}}</div>
                            <h2>{{ $heading ?? '' }}</h2>
                        </div>
                    @endif
                    <div class="row">
                        <div class="faq-column col-lg-12 col-md-12 col-sm-12">
                            @if(count(@$gallery_elements) > 0)
                                <div id="gallery" style="padding: 0px 30px 0 30px;">
                                    <div id="image-gallery">
                                        <div class="row">
                                            @foreach(@$gallery_elements as $gallery_element)
                                                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
                                                    <div class="{{  $page_detail->slug =='legal-document' || $page_detail->slug =='legal-documents' ? "":"img-wrapper"}}">
                                                        <a href="{{asset('/images/uploads/section_elements/gallery/'.@$gallery_element->filename)}}">
                                                            <img src="{{asset('/images/uploads/section_elements/gallery/'.@$gallery_element->filename)}}" class="img-responsive"></a>
                                                        <div class="img-overlay">
                                                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div><!-- End row -->
                                    </div><!-- End image gallery -->
                                </div><!-- End container -->
                            @endif
                        </div>
                    </div>
                </div>
            </section>
        @endif

        @if($value == "accordion_section_2")
            <section class="faqs-section alternate" style="background-color: #fff">
                <div class="auto-container">
                    <div class="sec-title text-center">
                        <h2>{{ucwords(@$accordian2_elements[0]->heading)}}</h2>
                        <div class="text" style="word-break: break-all;width: 60%;margin: auto;padding-top: 40px;">
                            {{ucwords(@$accordian2_elements[0]->description)}}
                        </div>
                    </div>
                    <div class="row">
                        @foreach(@$accordian2_chunks as $chunks)

                        <div class="faq-column col-lg-6 col-md-12 col-sm-12">
                            <ul class="accordion-box">
                                @foreach(@$chunks  as $key=>$accordian2_element)
                                    <li class="accordion block {{(@$key==0 || @$key==3) ? 'active-block':''}} active-block">
                                        <div class="acc-btn {{($key==0 || $key==3) ? 'active':''}}">
                                            {{ucwords(@$accordian2_element->list_header)}}
                                            <div class="icon fa fa-plus-circle"></div></div>
                                        <div class="acc-content {{(@$key==0 || @$key==3) ? 'current':''}}">
                                            <div class="content">
                                                <div class="text">How all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth.</div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        @endforeach

                    </div>
                </div>
            </section>

        @endif

        @if($value == "simple_header_and_description")
            <div class="sidebar-page-container"  style=" padding:  0px 0 75px!important;">
                <div class="auto-container">
                    <div class="row clearfix">
                        <!--Content Side-->
                        <div class="col-lg-12 col-md-12 col-sm-12 order-2">
                            <div class="blog-detail">
                                <div class="inner-box">
                                    <div class="lower-content">
                                        @if(@$header_descp_elements->heading !== null)
                                            <div class="sec-title text-center">
                                                <h3>{{ucwords(@$header_descp_elements->heading)}}</h3>
                                                </div>
                                            </div>
                                        @endif
                                        <div style="text-align: justify">
                                            {!! @$header_descp_elements->description !!}
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endif

        @if($value == "slider_list")
        <section class="services-section">
            <div class="auto-container">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="sec-title">
                            <h2>{{ucwords(@$slider_list_elements[0]->heading)}}</h2>
                            <div class="text"  style="word-break: break-all;width: 80%;">{{ucwords(@$slider_list_elements[0]->image)}}</div>
                        </div>
                    </div>
                </div>

                <div class="carousel-outer">

                    <div class="services-carousel owl-carousel owl-theme">

                        @foreach(@$slider_list_elements as $list)
                        <div class="service-block">
                            <div class="inner-box" >
                                <div class="image-box">
                                    <figure class="image"><a href="{{route('slider.single',@$list->subheading)}}"><img src="{{asset('/images/uploads/section_elements/list_1/thumb/thumb_'.@$list->list_image)}}" alt="{{@$list->subheading}}"></a></figure>
                                </div>
                                <div class="lower-content" style="height: 16em;">
                                    <h4><a href="{{route('slider.single',@$list->subheading)}}">{{@$list->list_header}}</a></h4>
                                    <div class="text">{!! ucfirst(Str::limit(@$list->list_description, 80)) !!}</div>
                                    <div class="btn-box"><a href="{{route('slider.single',@$list->subheading)}}" class="read-more">Read More <span class="fa fa-arrow-right"></span></a></div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>

                </div>
            </div>
        </section>
        @endif


    @endforeach

    <!-- Brocher Section  -->
    @if(@$page_detail->slug=="legal-documents" || @$page_detail->slug=="legal-document")

            @if(@$setting_data->brocher)
            <section class="services-section">
                <div class="auto-container">
                    <div class="sec-title text-center">
                        <h2>Brocher</h2>
                    </div>
                    <div class="row">
                        <iframe src="{{url('/loadbrocher#magazineMode=true')}}" width="100%" height="400"></iframe>
                    </div>
                </div>
            </section>


            @endif
        @endif
    <!-- End Brocher Section  -->


@endsection
@section('js')
    <script src="{{asset('assets/frontend/js/lightbox.min.js')}}"></script>
<script  src="{{asset('assets/frontend/js/bootstrap.min.js')}}"></script>
@endsection
