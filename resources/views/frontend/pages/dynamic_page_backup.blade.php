@extends('frontend.layouts.master')
@section('title') {{ucwords(@$page_detail->name)}}  @endsection
@section('styles')
<link href="{{asset('assets/frontend/css/dynamic_basic_section.css')}}"
		rel="stylesheet" type='text/css' media='all' />
<link href="{{asset('assets/frontend/css/call_to_action.css')}}"
		rel="stylesheet" type='text/css' media='all' />
<link href="{{asset('assets/frontend/css/elementor_about.css')}}"
		rel="stylesheet" type='text/css' media='all' />
<link href="{{asset('assets/frontend/css/accordion.css')}}"
		rel="stylesheet" type='text/css' media='all' />

<style>
    /* #gallery {
        padding-top: 40px;
    }
    @media screen and (min-width: 991px) {
        #gallery {
            padding: 60px 30px 0 30px;
        }
    } */
    .img-wrapper {
        position: relative;
        margin-top: 15px;
    }
    .img-wrapper img {
        width: 100%;
    }
    .img-overlay {
        background: rgba(0, 0, 0, 0.7);
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        left: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        opacity: 0;
    }
    .img-overlay i {
        color: #fff;
        font-size: 3em;
    }
    #overlay {
        background: rgba(0, 0, 0, 0.7);
        width: 100%;
        height: 100%;
        position: fixed;
        top: 0;
        left: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 999;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    #overlay img {
        margin: 0;
        width: 80%;
        height: auto;
        object-fit: contain;
        padding: 5%;
    }
    @media screen and (min-width: 768px) {
        #overlay img {
            width: 60%;
        }
    }
    @media screen and (min-width: 1200px) {
        #overlay img {
            width: 50%;
        }
    }
    #nextButton {
        color: #fff;
        font-size: 2em;
        transition: opacity 0.8s;
    }
    #nextButton:hover {
        opacity: 0.7;
    }
    @media screen and (min-width: 768px) {
        #nextButton {
            font-size: 3em;
        }
    }
    #prevButton {
        color: #fff;
        font-size: 2em;
        transition: opacity 0.8s;
    }
    #prevButton:hover {
        opacity: 0.7;
    }
    @media screen and (min-width: 768px) {
        #prevButton {
            font-size: 3em;
        }
    }
    #exitButton {
        color: #fff;
        font-size: 2em;
        transition: opacity 0.8s;
        position: absolute;
        top: 15px;
        right: 15px;
    }
    #exitButton:hover {
        opacity: 0.7;
    }
    @media screen and (min-width: 768px) {
        #exitButton {
            font-size: 3em;
        }
    }

    .elementor-10142 .elementor-element.elementor-element-10a1744 {
        padding: 0 0 20px;
    }

    .elementor-10142 .elementor-element.accordian-two{
        background-color: rgb(247, 247, 247);
    }

    .elementor-10142 .elementor-element.elementor-element-72fb885 {
        margin-top: 0;
        margin-bottom: 0;
        padding: 100px 0;;
    }

    p.accordian-padding {
        padding: 10px;
    }
    .elementor-10142 .elementor-element.elementor-element-47b583a{
        padding-top: 90px;
    }
    .portfolio-wrapper.portfolio-style-classic .portfolio-inner.gallery:before {
        background: unset;
}


    .gallery .post-thumb.post-overlay-active,.gallery2 .post-thumb.post-overlay-active{
        border: 4px solid #155b84;
        height: 340px;

    }

    .entry-title.gallery-title a.orginal-title:hover {
        color: white;
        font-size: 15px;
    }

    .entry-title.gallery-title a.orginal-title {
        font-size: 15px;
    }

    .portfolio-wrapper.portfolio-style-classic .portfolio-inner:hover:before {
        height: 50%;
        transition: all .9s;
        -webkit-transition: all .9s;
        -moz-transition: all .9s;
    }
    .elementor img.amgroup-gallery {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

</style>

    @if(@$page_detail->slug=="legal-documents" || @$page_detail->slug=="sample-documents")
        <style>

        .elementor-text-editor.elementor-clearfix {
            text-align: center;
        }

        .elementor-10142 .elementor-element.elementor-element-a08f468 {
            padding: 95px 0 100px;
            padding-bottom: 0px;
        }

        .elementor-10142 .brocher.elementor-element.elementor-element-a08f468 {
            padding: 20px 0 100px;
            padding-bottom: 60px;
        }

        .elementor-10142 .elementor-element.elementor-element-4c74c9f2 {
            padding-top: 0px;
            padding-bottom: 30px;
        }

        @media (max-width: 767px){
            .elementor-10142 .elementor-element.elementor-element-a08f468 {
                padding: 40px 0 0px;
            }
            .elementor-10142 .brocher.elementor-element.elementor-element-a08f468 {
                padding: 0px 0 0px;
                padding-bottom: 30px;

            }
        }

        @media only screen and (max-width: 767px){
            .elementor-section {
                padding: 70px 0;
                padding-top: 20px;
            }
        }

        @media (max-width: 1024px){
            .elementor-10142 .elementor-element.elementor-element-a08f468 {
                padding: 50px 0;
                padding-bottom: 0px;
            }
            .elementor-10142 .brocher.elementor-element.elementor-element-a08f468 {
                padding: 0px 0 0px;
                padding-bottom: 30px;

            }
        }

        @media (max-width: 1024px){
            .elementor-10142 .elementor-element.elementor-element-4c74c9f2 {
                padding-top: 0px;
                padding-bottom: 30px;
            }
        }


        </style>
    @endif
@endsection
@section('content')

<div class="berater-content-wrapper">
    <div class="berater-content berater-page">
        <header id="page-title" class="page-title-wrap">
            <div class="page-title-wrap-inner" data-property="no-video"> <span
                    class="page-title-overlay"></span>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-title-inner">
                                <div class="pull-center">
                                    <h1 class="page-title">{{ucwords(@$page_detail->name)}}</h1>
                                    <div id="breadcrumb" class="breadcrumb"><a href="/">Home</a>
                                        <span class="current">{{ucwords(@$page_detail->name)}}</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="berater-content-inner">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div id="primary" class="content-area clearfix">
                            <div id="page-10142" class="post-10142 page type-page status-publish hentry">
                                <div data-elementor-type="wp-page" data-elementor-id="10142"
                                    class="elementor elementor-10142" data-elementor-settings="[]">
                                    <div class="elementor-inner">
                                        <div class="elementor-section-wrap">

                                            @foreach($sorted_sections as $key=>$value)
                                                @if($value == "basic_section")

                                                    <section class="elementor-section elementor-top-section elementor-element elementor-element-a08f468 elementor-section-content-middle elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                                        data-id="a08f468" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                                                        <div class="elementor-background-overlay"></div>
                                                        <div class="elementor-container elementor-column-gap-default">
                                                            <div class="elementor-row">
                                                                <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-9e8d1a9" data-id="9e8d1a9" data-element_type="column">
                                                                    <div class="elementor-column-wrap elementor-element-populated">
                                                                        <div class="elementor-widget-wrap">
                                                                            <section class="elementor-section elementor-inner-section elementor-element elementor-element-b33b2d1 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="b33b2d1" data-element_type="section">
                                                                                <div class="elementor-container elementor-column-gap-default">
                                                                                    <div class="elementor-row">
                                                                                        <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-1bd9986" data-id="1bd9986" data-element_type="column">
                                                                                            <div class="elementor-column-wrap elementor-element-populated">
                                                                                                <div class="elementor-widget-wrap">
                                                                                                    <div class="elementor-element elementor-element-1360057 elementor-widget elementor-widget-image" data-id="1360057" data-element_type="widget" data-widget_type="image.default">
                                                                                                        <div class="elementor-widget-container">
                                                                                                            <div class="elementor-image"> <img width="707" height="694" src="{{asset('/images/uploads/section_elements/basic_section/'.@$basic_elements->image) }}" class="attachment-large size-large" alt=""
                                                                                                                    loading="lazy" srcset="{{asset('/images/uploads/section_elements/basic_section/'.@$basic_elements->image) }} 707w, {{asset('/images/uploads/section_elements/basic_section/'.@$basic_elements->image) }} 80w"
                                                                                                                    sizes="(max-width: 707px) 100vw, 707px" /></div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="elementor-element elementor-element-329c147 verticalMove elementor-widget elementor-widget-beraterfeaturebox" data-id="329c147" data-element_type="widget" data-widget_type="beraterfeaturebox.default">
                                                                                                        <div class="elementor-widget-container feature-box-wrapper text-center feature-box-modern shortcode-rand-1 berater-inline-css" data-css="&quot;.shortcode-rand-1.feature-box-wrapper .feature-box-inner &gt; *:nth-child(1), .shortcode-rand-1.feature-box-wrapper &gt; .media &gt; .media-body &gt; *:nth-child(1) { margin-bottom: 21px; }.shortcode-rand-1.feature-box-wrapper .feature-box-inner &gt; *:nth-child(2), .shortcode-rand-1.feature-box-wrapper &gt; .media &gt; .media-body &gt; *:nth-child(2) { margin-bottom: 15px; }.shortcode-rand-1.feature-box-wrapper .feature-box-inner &gt; *:nth-child(3), .shortcode-rand-1.feature-box-wrapper &gt; .media &gt; .media-body &gt; *:nth-child(3) { margin-bottom: 0px; }&quot;">
                                                                                                            <div class="feature-box-inner">
                                                                                                                <div class="feature-box-icon"><span class="text-center icon-theme-color rounded-circle fbox-icon-middle ti-cup"></span></div>
                                                                                                                <h4 class="feature-box-title">{{ucwords(@$basic_elements->list_header)}}</h4>
                                                                                                                <div class="fbox-content">{!! @$basic_elements->list_description !!}</div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </section>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-03bc164 ps-lg-4" data-id="03bc164" data-element_type="column">
                                                                    <div class="elementor-column-wrap elementor-element-populated">
                                                                        <div class="elementor-widget-wrap">
                                                                            <div class="elementor-element elementor-element-4126aae elementor-widget elementor-widget-beratersectiontitle" data-id="4126aae" data-element_type="widget" data-widget_type="beratersectiontitle.default">
                                                                                <div class="elementor-widget-container">
                                                                                    <div class="section-title-wrapper margin-bottom-30">
                                                                                        <div class="title-wrap"><span class="sub-title">{{ucwords(@$basic_elements->heading)}}</span>
                                                                                            <h2 class="section-title">{{ucfirst(@$basic_elements->subheading)}}</h2><span class="title-separator separator-border theme-color-bg"></span></div>
                                                                                        <div class="section-description">{!! @$basic_elements->description !!} </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="elementor-element elementor-element-00e8ace elementor-tablet-align-left elementor-widget elementor-widget-button" data-id="00e8ace" data-element_type="widget" data-widget_type="button.default">
                                                                                <div class="elementor-widget-container">
                                                                                    <div class="elementor-button-wrapper">
                                                                                        @if(@$basic_elements->button)

                                                                                        <a href="{{@$basic_elements->button_link}}" class="elementor-button-link elementor-button elementor-size-md" role="button">
                                                                                            <span class="elementor-button-content-wrapper">
                                                                                                <span class="elementor-button-icon elementor-align-icon-right">
                                                                                                    <i aria-hidden="true" class="fas fa-arrow-circle-right"></i>
                                                                                                </span>
                                                                                            <span class="elementor-button-text">{{ucwords(@$basic_elements->button)}}</span>
                                                                                            </span>
                                                                                        </a>
                                                                                        @endif

                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                @endif
                                                @if($value == "call_to_action_1")
                                                    <section data-berater-parallax-data="{&quot;parallax_ratio&quot;:&quot;1.2&quot;,&quot;parallax_image&quot;:&quot;&quot;}" class="elementor-section elementor-top-section elementor-element elementor-element-d31eebc elementor-section-stretched elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                                        data-id="d31eebc" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                                                        <div class="elementor-background-overlay"></div>
                                                        <div class="elementor-container elementor-column-gap-default">
                                                            <div class="elementor-row">
                                                                <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-f78f024" data-id="f78f024" data-element_type="column">
                                                                    <div class="elementor-column-wrap elementor-element-populated">
                                                                        <div class="elementor-widget-wrap">
                                                                            <div class="elementor-element elementor-element-11c9971 elementor-widget elementor-widget-beratersectiontitle" data-id="11c9971" data-element_type="widget" data-widget_type="beratersectiontitle.default">
                                                                                <div class="elementor-widget-container">
                                                                                    <div class="section-title-wrapper custom-title-1 mb-0 text-left">
                                                                                        <div class="title-wrap">
                                                                                            <h2 class="section-title">“{{ucfirst(@$call1_elements->heading)}}”</h2>
                                                                                        </div>
                                                                                        <div class="section-description"></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-a70e424" data-id="a70e424" data-element_type="column">
                                                                    <div class="elementor-column-wrap elementor-element-populated">
                                                                        <div class="elementor-widget-wrap">
                                                                            <div class="elementor-element elementor-element-57177ae4 elementor-align-center elementor-tablet-align-left elementor-widget elementor-widget-button" data-id="57177ae4" data-element_type="widget" data-widget_type="button.default">
                                                                                <div class="elementor-widget-container">
                                                                                    <div class="elementor-button-wrapper">
                                                                                        @if(@$call1_elements->button)

                                                                                        <a href="{{@$call1_elements->button_link}}" class="elementor-button-link elementor-button elementor-size-md" role="button"> <span class="elementor-button-content-wrapper"> <span class="elementor-button-text">{{ucwords(@$call1_elements->button)}}</span> </span>
                                                                                        </a>
                                                                                        @endif
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                @endif
                                                @if($value == "call_to_action_2")
                                                        <section data-berater-parallax-data="{&quot;parallax_ratio&quot;:&quot;1.2&quot;,&quot;parallax_image&quot;:&quot;&quot;}" class="elementor-section elementor-top-section elementor-element elementor-element-f0e9c9f elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                                            data-id="f0e9c9f" data-element_type="section" data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                                                            <div class="elementor-background-overlay"></div>
                                                            <div class="elementor-container elementor-column-gap-default">
                                                                <div class="elementor-row">
                                                                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-0dda6f8" data-id="0dda6f8" data-element_type="column">
                                                                        <div class="elementor-column-wrap elementor-element-populated">
                                                                            <div class="elementor-widget-wrap">
                                                                                <div class="elementor-element elementor-element-12dd57d elementor-widget elementor-widget-beratersectiontitle" data-id="12dd57d" data-element_type="widget" data-widget_type="beratersectiontitle.default">
                                                                                    <div class="elementor-widget-container">
                                                                                        <div class="section-title-wrapper custom-title-1 mb-3 text-center">
                                                                                            <div class="title-wrap">
                                                                                                <h2 class="section-title">“{{ucfirst(@$call2_elements->subheading)}}”</h2>
                                                                                            </div>
                                                                                            <div class="section-description"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="elementor-element elementor-element-fa21fbc text-center elementor-widget elementor-widget-heading" data-id="fa21fbc" data-element_type="widget" data-widget_type="heading.default">
                                                                                    <div class="elementor-widget-container"> <span class="elementor-heading-title elementor-size-default">{{ucfirst(@$call2_elements->description)}}</span></div>
                                                                                </div>
                                                                                <div class="elementor-element elementor-element-7103a71 elementor-tablet-align-left elementor-align-center elementor-widget elementor-widget-button" data-id="7103a71" data-element_type="widget" data-widget_type="button.default">
                                                                                    <div class="elementor-widget-container">
                                                                                        <div class="elementor-button-wrapper">
                                                                                            @if(@$call2_elements->button)

                                                                                            <a href="{{@$call2_elements->button_link}}" class="elementor-button-link elementor-button elementor-size-md" role="button">
                                                                                                <span class="elementor-button-content-wrapper"> <span class="elementor-button-icon elementor-align-icon-right"> <i aria-hidden="true" class="fas fa-arrow-circle-right"></i> </span>
                                                                                            <span class="elementor-button-text">{{ucwords(@$call2_elements->button)}}</span> </span>
                                                                                            </a>
                                                                                            @endif
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </section>
                                                @endif
                                                @if($value == "background_image_section")
                                                     <section class="elementor-section elementor-top-section elementor-element elementor-element-999267a elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="999267a" data-element_type="section"
                                                        data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;stretch_section&quot;:&quot;section-stretched&quot;}" style="background-image: url({{asset('/images/uploads/section_elements/bgimage_section/'.@$bgimage_elements[0]->image)}});" >
                                                        <div class="elementor-background-overlay"></div>
                                                        <div class="elementor-container elementor-column-gap-default">
                                                            <div class="elementor-row">
                                                                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-16634d8" data-id="16634d8" data-element_type="column">
                                                                    <div class="elementor-column-wrap elementor-element-populated">
                                                                        <div class="elementor-widget-wrap">
                                                                            <div class="elementor-element elementor-element-2ab22b4 elementor-widget elementor-widget-beratersectiontitle" data-id="2ab22b4" data-element_type="widget" data-widget_type="beratersectiontitle.default">
                                                                                <div class="elementor-widget-container">
                                                                                    <div class="section-title-wrapper margin-bottom-30 text-center">
                                                                                        <div class="title-wrap"><span class="sub-title">{{ucwords(@$bgimage_elements[0]->heading)}}</span>
                                                                                            <h2 class="section-title">{{ucwords(@$bgimage_elements[0]->subheading)}}</h2><span class="title-separator separator-border theme-color-bg"></span></div>
                                                                                        <div class="section-description"></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <section class="elementor-section elementor-inner-section elementor-element elementor-element-1ba6204 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="1ba6204" data-element_type="section">
                                                                                <div class="elementor-container elementor-column-gap-default">
                                                                                    <div class="elementor-row">
                                                                                        <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-dbe56bd" data-id="dbe56bd" data-element_type="column">
                                                                                            <div class="elementor-column-wrap elementor-element-populated">
                                                                                                <div class="elementor-widget-wrap">
                                                                                                    <div class="elementor-element elementor-element-6ae1455 elementor-widget elementor-widget-beraterfeaturebox" data-id="6ae1455" data-element_type="widget" data-widget_type="beraterfeaturebox.default">
                                                                                                        <div class="elementor-widget-container feature-box-wrapper text-center feature-box-classic-pro shortcode-rand-8 berater-inline-css" data-css="&quot;.shortcode-rand-8.feature-box-wrapper .feature-box-inner &gt; *:nth-child(1), .shortcode-rand-8.feature-box-wrapper &gt; .media &gt; .media-body &gt; *:nth-child(1) { margin-bottom: 21px; }.shortcode-rand-8.feature-box-wrapper .feature-box-inner &gt; *:nth-child(2), .shortcode-rand-8.feature-box-wrapper &gt; .media &gt; .media-body &gt; *:nth-child(2) { margin-bottom: 15px; }.shortcode-rand-8.feature-box-wrapper .feature-box-inner &gt; *:nth-child(3), .shortcode-rand-8.feature-box-wrapper &gt; .media &gt; .media-body &gt; *:nth-child(3) { margin-bottom: 0px; }&quot;">
                                                                                                            <div class="feature-box-inner">
                                                                                                                <div class="feature-box-image squared fbox-img-overlay-none"><img class="img-fluid" src="../../assets/frontend/images/badge.png" alt="Feature Box Image"></div>
                                                                                                                <h4 class="feature-box-title">{{ucwords(@$bgimage_elements[0]->list_header)}}</h4>
                                                                                                                <div class="fbox-content">{{ucfirst(@$bgimage_elements[0]->list_description)}}</div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-aecbce3" data-id="aecbce3" data-element_type="column">
                                                                                            <div class="elementor-column-wrap elementor-element-populated">
                                                                                                <div class="elementor-widget-wrap">
                                                                                                    <div class="elementor-element elementor-element-712c536 elementor-widget elementor-widget-beraterfeaturebox" data-id="712c536" data-element_type="widget" data-widget_type="beraterfeaturebox.default">
                                                                                                        <div class="elementor-widget-container feature-box-wrapper text-center feature-box-classic-pro shortcode-rand-9 berater-inline-css" data-css="&quot;.shortcode-rand-9.feature-box-wrapper .feature-box-inner &gt; *:nth-child(1), .shortcode-rand-9.feature-box-wrapper &gt; .media &gt; .media-body &gt; *:nth-child(1) { margin-bottom: 21px; }.shortcode-rand-9.feature-box-wrapper .feature-box-inner &gt; *:nth-child(2), .shortcode-rand-9.feature-box-wrapper &gt; .media &gt; .media-body &gt; *:nth-child(2) { margin-bottom: 15px; }.shortcode-rand-9.feature-box-wrapper .feature-box-inner &gt; *:nth-child(3), .shortcode-rand-9.feature-box-wrapper &gt; .media &gt; .media-body &gt; *:nth-child(3) { margin-bottom: 0px; }&quot;">
                                                                                                            <div class="feature-box-inner">
                                                                                                                <div class="feature-box-image squared fbox-img-overlay-none"><img class="img-fluid" src="../../assets/frontend/images/lightbulb.png" alt="Feature Box Image"></div>
                                                                                                                <h4 class="feature-box-title">{{ucwords(@$bgimage_elements[1]->list_header)}}</h4>
                                                                                                                <div class="fbox-content">{{ucfirst(@$bgimage_elements[1]->list_description)}}</div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="elementor-column elementor-col-33 elementor-inner-column elementor-element elementor-element-fc8bd44" data-id="fc8bd44" data-element_type="column">
                                                                                            <div class="elementor-column-wrap elementor-element-populated">
                                                                                                <div class="elementor-widget-wrap">
                                                                                                    <div class="elementor-element elementor-element-4a50178 elementor-widget elementor-widget-beraterfeaturebox" data-id="4a50178" data-element_type="widget" data-widget_type="beraterfeaturebox.default">
                                                                                                        <div class="elementor-widget-container feature-box-wrapper text-center feature-box-classic-pro shortcode-rand-10 berater-inline-css" data-css="&quot;.shortcode-rand-10.feature-box-wrapper .feature-box-inner &gt; *:nth-child(1), .shortcode-rand-10.feature-box-wrapper &gt; .media &gt; .media-body &gt; *:nth-child(1) { margin-bottom: 21px; }.shortcode-rand-10.feature-box-wrapper .feature-box-inner &gt; *:nth-child(2), .shortcode-rand-10.feature-box-wrapper &gt; .media &gt; .media-body &gt; *:nth-child(2) { margin-bottom: 15px; }.shortcode-rand-10.feature-box-wrapper .feature-box-inner &gt; *:nth-child(3), .shortcode-rand-10.feature-box-wrapper &gt; .media &gt; .media-body &gt; *:nth-child(3) { margin-bottom: 0px; }&quot;">
                                                                                                            <div class="feature-box-inner">
                                                                                                                <div class="feature-box-image squared fbox-img-overlay-none"><img class="img-fluid" src="../../assets/frontend/images/price-tag.png" alt="Feature Box Image"></div>
                                                                                                                <h4 class="feature-box-title">{{ucwords(@$bgimage_elements[2]->list_header)}}</h4>
                                                                                                                <div class="fbox-content">{{ucfirst(@$bgimage_elements[2]->list_description)}}</div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </section>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                @endif
                                                @if($value == "flash_cards")
                                                     <section
                                                        class="elementor-section elementor-top-section elementor-element elementor-element-47b583a elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                                        data-id="47b583a" data-element_type="section">
                                                        <div class="elementor-container elementor-column-gap-default">
                                                            <div class="elementor-row">
                                                                @foreach(@$flash_elements as $flash_element)

                                                                    @if($loop->index == 0)
                                                                    <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-6753a4d"
                                                                        data-id="6753a4d" data-element_type="column">
                                                                        <div
                                                                            class="elementor-column-wrap elementor-element-populated">
                                                                            <div class="elementor-widget-wrap">
                                                                                <div class="elementor-element elementor-element-770a8128 elementor-widget elementor-widget-beraterflipbox"
                                                                                    data-id="770a8128"
                                                                                    data-element_type="widget"
                                                                                    data-widget_type="beraterflipbox.default">
                                                                                    <div class="elementor-widget-container">
                                                                                        <div class="flip-box-wrapper text-center"
                                                                                            data-css="&quot;&quot;">
                                                                                            <div
                                                                                                class="flip-box-inner imghvr-flip-3d-horz">
                                                                                                <div class="flip-front">
                                                                                                    <div
                                                                                                        class="flip-box-image">
                                                                                                        <img class="img-fluid squared flip-img-overlay-none"
                                                                                                            src="../../assets/frontend/images/line-chart.png"
                                                                                                            alt="Flip Box Image">
                                                                                                    </div>
                                                                                                    <h4 class="flip-box-title">{{ucwords(@$flash_element->list_header)}}</h4>
                                                                                                    <div class="flip-content"> {{ucfirst(@$flash_element->list_description) }}</div>
                                                                                                </div>
                                                                                                <div class="flip-back">
                                                                                                    <div
                                                                                                        class="flip-box-icon">
                                                                                                        <span
                                                                                                            class="text-center icon-icon-light rounded-circle flip-icon-middle ti-headphone-alt"></span>
                                                                                                    </div>
                                                                                                    <h4 class="flip-box-title">{{ucwords(@$flash_element->list_header)}}</h4>
                                                                                                    <div class="flip-content"> {{ucfirst(@$flash_element->list_description) }}</div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @endif

                                                                    @if($loop->index == 1)
                                                                    <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-9459217"
                                                                        data-id="9459217" data-element_type="column">
                                                                        <div
                                                                            class="elementor-column-wrap elementor-element-populated">
                                                                            <div class="elementor-widget-wrap">
                                                                                <div class="elementor-element elementor-element-772df59 elementor-widget elementor-widget-beraterflipbox"
                                                                                    data-id="772df59"
                                                                                    data-element_type="widget"
                                                                                    data-widget_type="beraterflipbox.default">
                                                                                    <div class="elementor-widget-container">
                                                                                        <div class="flip-box-wrapper text-center"
                                                                                            data-css="&quot;&quot;">
                                                                                            <div
                                                                                                class="flip-box-inner imghvr-flip-3d-horz">
                                                                                                <div class="flip-front">
                                                                                                    <div
                                                                                                        class="flip-box-image">
                                                                                                        <img class="img-fluid squared flip-img-overlay-none"
                                                                                                            src="../../assets/frontend/images/doughnut.png"
                                                                                                            alt="Flip Box Image">
                                                                                                    </div>
                                                                                                    <h4 class="flip-box-title">{{ucwords(@$flash_element->list_header)}}</h4>
                                                                                                    <div class="flip-content"> {{ucfirst(@$flash_element->list_description) }}</div>
                                                                                                </div>
                                                                                                <div class="flip-back">
                                                                                                    <div
                                                                                                        class="flip-box-icon">
                                                                                                        <span
                                                                                                            class="text-center icon-icon-light rounded-circle flip-icon-middle ti-headphone-alt"></span>
                                                                                                    </div>
                                                                                                    <h4 class="flip-box-title">{{ucwords(@$flash_element->list_header)}}</h4>
                                                                                                    <div class="flip-content"> {{ucfirst(@$flash_element->list_description) }}</div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @endif

                                                                    @if($loop->index == 2)
                                                                    <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-4318eb6"
                                                                        data-id="4318eb6" data-element_type="column">
                                                                        <div
                                                                            class="elementor-column-wrap elementor-element-populated">
                                                                            <div class="elementor-widget-wrap">
                                                                                <div class="elementor-element elementor-element-38cb3d7 elementor-widget elementor-widget-beraterflipbox"
                                                                                    data-id="38cb3d7"
                                                                                    data-element_type="widget"
                                                                                    data-widget_type="beraterflipbox.default">
                                                                                    <div class="elementor-widget-container">
                                                                                        <div class="flip-box-wrapper text-center"
                                                                                            data-css="&quot;&quot;">
                                                                                            <div
                                                                                                class="flip-box-inner imghvr-flip-3d-horz">
                                                                                                <div class="flip-front">
                                                                                                    <div
                                                                                                        class="flip-box-image">
                                                                                                        <img class="img-fluid squared flip-img-overlay-none"
                                                                                                            src="../../assets/frontend/images/trophy1.png"
                                                                                                            alt="Flip Box Image">
                                                                                                    </div>
                                                                                                    <h4 class="flip-box-title">{{ucwords(@$flash_element->list_header)}}</h4>
                                                                                                    <div class="flip-content"> {{ucfirst(@$flash_element->list_description) }}</div>
                                                                                                </div>
                                                                                                <div class="flip-back">
                                                                                                    <div
                                                                                                        class="flip-box-icon">
                                                                                                        <span
                                                                                                            class="text-center icon-icon-light rounded-circle flip-icon-middle ti-headphone-alt"></span>
                                                                                                    </div>
                                                                                                    <h4 class="flip-box-title">{{ucwords(@$flash_element->list_header)}}</h4>
                                                                                                    <div class="flip-content"> {{ucfirst(@$flash_element->list_description) }}</div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </section>
                                                    @endif
                                                @if($value == "simple_header_and_description")
                                                    <section class="elementor-section elementor-top-section elementor-element elementor-element-a08f468  elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default">
                                                                <div class="elementor-element elementor-element-065dfd6 elementor-widget elementor-widget-beratersectiontitle" data-id="065dfd6" data-element_type="widget" data-widget_type="beratersectiontitle.default">
                                                                    <div class="elementor-widget-container">
                                                                        <div class="section-title-wrapper text-center">
                                                                            <div class="title-wrap"><span class="sub-title">{{ucwords(@$header_descp_elements->heading)}}</span>
                                                                                <h2 class="section-title">{{@$header_descp_elements->subheading}}</h2><span class="title-separator separator-border theme-color-bg"></span></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="container">
                                                                    <div data-elementor-type="wp-post" data-elementor-id="8807" class="elementor elementor-8807" data-elementor-settings="[]">
                                                                        <div class="elementor-inner">
                                                                            <div class="elementor-section-wrap">
                                                                                <section class="elementor-section elementor-top-section elementor-element elementor-element-10a1744 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="10a1744" data-element_type="section">
                                                                                    <div class="elementor-container elementor-column-gap-default">
                                                                                        <div class="elementor-row">
                                                                                            <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-f731e5a" data-id="f731e5a" data-element_type="column">
                                                                                                <div class="elementor-column-wrap elementor-element-populated">
                                                                                                    <div class="elementor-widget-wrap">
                                                                                                        <div class="elementor-element elementor-element-4bada95 elementor-widget elementor-widget-text-editor" data-id="4bada95" data-element_type="widget" data-widget_type="text-editor.default">
                                                                                                            <div class="elementor-widget-container">
                                                                                                                <div class="elementor-text-editor elementor-clearfix">
                                                                                                                {!! @$header_descp_elements->description !!}
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </section>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                    </section>
                                                @endif
                                                @if($value == "accordion_section_1")
                                                    <section class="elementor-section elementor-top-section elementor-element elementor-element-8601528 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="8601528" data-element_type="section">
                                                        <div class="elementor-element elementor-element-065dfd6 elementor-widget elementor-widget-beratersectiontitle" data-id="065dfd6" data-element_type="widget" data-widget_type="beratersectiontitle.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="section-title-wrapper text-center">
                                                                    <div class="title-wrap"><span class="sub-title">{{ucwords(@$accordian1_elements[0]->heading)}}</span>
                                                                        <h2 class="section-title">{{@$accordian1_elements[0]->subheading}}</h2><span class="title-separator separator-border theme-color-bg"></span></div>
                                                                    <div class="section-description">{{@$accordian1_elements[0]->description}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="elementor-container elementor-column-gap-default">
                                                            <div class="elementor-row">
                                                                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-f01acc3" data-id="f01acc3" data-element_type="column">
                                                                    <div class="elementor-column-wrap elementor-element-populated">
                                                                        <div class="elementor-widget-wrap">
                                                                            <section class="elementor-section elementor-inner-section elementor-element elementor-element-62e9861 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="62e9861" data-element_type="section">
                                                                                <div class="elementor-container elementor-column-gap-default">
                                                                                    <div class="elementor-row">

                                                                                        <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-2b2b02d" data-id="2b2b02d" data-element_type="column">
                                                                                            <div class="elementor-column-wrap elementor-element-populated">
                                                                                                <div class="elementor-widget-wrap">
                                                                                                    <div class="elementor-element elementor-element-446e38a berater-faq elementor-widget elementor-widget-toggle" data-id="446e38a" data-element_type="widget" data-widget_type="toggle.default">
                                                                                                        <div class="elementor-widget-container">
                                                                                                            <div class="elementor-toggle" role="tablist">
                                                                                                            @for ($i = 1; $i <=$list_1; $i++)

                                                                                                                <div class="elementor-toggle-item">
                                                                                                                    <h4 id="elementor-tab-title-7171" class="elementor-tab-title" data-tab="{{@$accordian1_elements[$i-1]->id}}" role="tab" aria-controls="elementor-tab-content-7171" aria-expanded="false" tabindex="-1" aria-selected="false"> <span class="elementor-toggle-icon elementor-toggle-icon-right" aria-hidden="true"> <span class="elementor-toggle-icon-closed"><i class="fas fa-angle-double-down"></i></span>
                                                                                                                    <span class="elementor-toggle-icon-opened"><i class="elementor-toggle-icon-opened fas fa-angle-double-up"></i></span> </span> <a href="" class="elementor-toggle-title"> {{ucwords(@$accordian1_elements[$i-1]->list_header)}}</a></h4>
                                                                                                                    <div id="elementor-tab-content-7171" class="elementor-tab-content elementor-clearfix" data-tab="{{@$accordian1_elements[$i-1]->id}}" role="tabpanel" aria-labelledby="elementor-tab-title-7171" hidden="hidden" style="display: none;">
                                                                                                                        <p>{!! ucfirst(@$accordian1_elements[$i-1]->list_description) !!}
                                                                                                                        </p>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            @endfor

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </section>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                @endif
                                                @if($value == "accordion_section_2")
                                                    <section class="elementor-section accordian-two elementor-top-section elementor-element elementor-element-8601528 elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="8601528" data-element_type="section"
                                                    data-settings="{&quot;background_background&quot;:&quot;classic&quot;,&quot;stretch_section&quot;:&quot;section-stretched&quot;}">
                                                        <div class="elementor-element elementor-element-065dfd6 elementor-widget elementor-widget-beratersectiontitle" data-id="065dfd6" data-element_type="widget" data-widget_type="beratersectiontitle.default">
                                                            <div class="elementor-widget-container">
                                                                <div class="section-title-wrapper text-center">
                                                                    <div class="title-wrap"><span class="sub-title">{{ucwords(@$accordian2_elements[0]->heading)}}</span>
                                                                        <h2 class="section-title">{{@$accordian2_elements[0]->subheading}}</h2><span class="title-separator separator-border theme-color-bg"></span></div>
                                                                    <div class="section-description">{{@$accordian2_elements[0]->description}}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="elementor-container elementor-column-gap-default">
                                                            <div class="elementor-row">
                                                                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-f01acc3" data-id="f01acc3" data-element_type="column">
                                                                    <div class="elementor-column-wrap elementor-element-populated">
                                                                        <div class="elementor-widget-wrap">
                                                                            <section class="elementor-section elementor-inner-section elementor-element elementor-element-62e9861 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="62e9861" data-element_type="section">
                                                                                <div class="elementor-container elementor-column-gap-default">
                                                                                    <div class="elementor-row">

                                                                                    @foreach(@$accordian2_chunks as $chunks)
                                                                                    @if($loop->index == 0)

                                                                                            <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-2b2b02d" data-id="2b2b02d" data-element_type="column">
                                                                                                <div class="elementor-column-wrap elementor-element-populated">
                                                                                                    <div class="elementor-widget-wrap">
                                                                                                        <div class="elementor-element elementor-element-446e38a berater-faq elementor-widget elementor-widget-toggle" data-id="446e38a" data-element_type="widget" data-widget_type="toggle.default">
                                                                                                            <div class="elementor-widget-container">
                                                                                                                <div class="elementor-toggle" role="tablist">
                                                                                                                @foreach(@$chunks  as $accordian2_element)
                                                                                                                    <div class="elementor-toggle-item">
                                                                                                                        <h4 id="elementor-tab-title-7171" class="elementor-tab-title" data-tab="{{@$accordian2_element->id}}" role="tab" aria-controls="elementor-tab-content-7171" aria-expanded="false" tabindex="-1" aria-selected="false"> <span class="elementor-toggle-icon elementor-toggle-icon-right" aria-hidden="true"> <span class="elementor-toggle-icon-closed"><i class="fas fa-angle-double-down"></i></span>
                                                                                                                        <span class="elementor-toggle-icon-opened"><i class="elementor-toggle-icon-opened fas fa-angle-double-up"></i></span> </span> <a href="" class="elementor-toggle-title"> {{ucwords(@$accordian2_element->list_header)}}</a></h4>
                                                                                                                        <div id="elementor-tab-content-7171" class="elementor-tab-content elementor-clearfix" data-tab="{{@$accordian2_element->id}}" role="tabpanel" aria-labelledby="elementor-tab-title-7171" hidden="hidden" style="display: none;">
                                                                                                                            <p class="accordian-padding">{!! ucfirst(@$accordian2_element->list_description) !!}</p>

                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                @endforeach


                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            @endif
                                                                                            @if($loop->index == 1)

                                                                                            <div class="elementor-column elementor-col-50 elementor-inner-column elementor-element elementor-element-a4509b5" data-id="a4509b5" data-element_type="column">
                                                                                                <div class="elementor-column-wrap elementor-element-populated">
                                                                                                    <div class="elementor-widget-wrap">
                                                                                                        <div class="elementor-element elementor-element-bbab414 berater-faq elementor-widget elementor-widget-toggle" data-id="bbab414" data-element_type="widget" data-widget_type="toggle.default">
                                                                                                            <div class="elementor-widget-container">
                                                                                                                <div class="elementor-toggle" role="tablist">
                                                                                                                @foreach(@$chunks  as $accordian2_element)

                                                                                                                    <div class="elementor-toggle-item">
                                                                                                                        <h4 id="elementor-tab-title-1961" class="elementor-tab-title" data-tab="{{@$accordian2_element->id}}" role="tab" aria-controls="elementor-tab-content-1961" aria-expanded="false"> <span class="elementor-toggle-icon elementor-toggle-icon-right" aria-hidden="true"> <span class="elementor-toggle-icon-closed"><i class="fas fa-angle-double-down"></i></span>
                                                                                                                            <span class="elementor-toggle-icon-opened"><i class="elementor-toggle-icon-opened fas fa-angle-double-up"></i></span>
                                                                                                                            </span> <a href="" class="elementor-toggle-title"> {{ucwords(@$accordian2_element->list_header)}}</a></h4>
                                                                                                                        <div id="elementor-tab-content-1961" class="elementor-tab-content elementor-clearfix" data-tab="{{@$accordian2_element->id}}" role="tabpanel" aria-labelledby="elementor-tab-title-1961">

                                                                                                                            <p class="accordian-padding">{!! ucfirst(@$accordian2_element->list_description) !!}</p>

                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                @endforeach

                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        @endif
                                                                                    @endforeach
                                                                                    </div>
                                                                                </div>
                                                                            </section>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                @endif
                                                @if($value == "gallery_section")
                                                <section class="elementor-section elementor-top-section elementor-element elementor-element-4c74c9f2 elementor-section-stretched elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                                            data-id="4c74c9f2" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
                                                            <div class="elementor-container elementor-column-gap-default">
                                                                <div class="elementor-row">
                                                                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-4029b36" data-id="4029b36" data-element_type="column">
                                                                        <div class="elementor-column-wrap elementor-element-populated">
                                                                            <div class="elementor-widget-wrap">
                                                                            <section class="elementor-section elementor-inner-section elementor-element elementor-element-bc33313 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="bc33313" data-element_type="section">
                                                                                <div class="elementor-container elementor-column-gap-default">
                                                                                    <div class="elementor-row">
                                                                                        <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-9ac3549" data-id="9ac3549" data-element_type="column">
                                                                                            <div class="elementor-column-wrap elementor-element-populated">
                                                                                                <div class="elementor-widget-wrap">

                                                                                                    <div class="elementor-element elementor-element-f1f4ffd elementor-widget elementor-widget-beraterportfolio" data-id="f1f4ffd" data-element_type="widget" data-widget_type="beraterportfolio.default">
                                                                                                        <div class="elementor-widget-container portfolio-wrapper image-gallery portfolio-style-classic portfolio-light portfolio-normal-model shortcode-rand-5 berater-inline-css" data-css="&quot;.shortcode-rand-5.portfolio-wrapper .portfolio-inner &gt; *:nth-child(1) { margin-bottom: 0px; }.shortcode-rand-5.portfolio-wrapper .portfolio-inner &gt; *:nth-child(2) { margin-bottom: 12px; }.shortcode-rand-5.portfolio-wrapper .portfolio-inner &gt; *:nth-child(3) { margin-bottom: 0px; }&quot;">
                                                                                                            <div class="row">
                                                                                                                @foreach($gallery_elements as $gallery_element)

                                                                                                                <div class="col-lg-4 col-md-4">
                                                                                                                    <div class="portfolio-inner gallery">
                                                                                                                        <div class="post-thumb post-overlay-active">
                                                                                                                            <img loading="lazy" class="img-fluid amgroup-gallery" alt="" src="{{asset('/images/uploads/section_elements/gallery/'.@$gallery_element->resized_name)}}" />
                                                                                                                            <div class="post-overlay-items overlay-top-left">
                                                                                                                                <div class="portfolio-icons">
                                                                                                                                    <div class="portfolio-popup-icon">
                                                                                                                                        <a href="#" data-mfp-src="{{asset('/images/uploads/section_elements/gallery/'.@$gallery_element->filename)}}" class="image-gallery-link zoom-icon"><i
																																				class="ti-zoom-in"></i></a>
                                                                                                                                    </div>

                                                                                                                                </div>


                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="top-meta clearfix">
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
                                                                            </section>


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </section>
                                                @endif

                                                @if($value == "gallery_section_2")
                                                    <section class="elementor-section elementor-top-section elementor-element elementor-element-4c74c9f2 elementor-section-stretched elementor-section-content-middle elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                                            data-id="4c74c9f2" data-element_type="section" data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
                                                            <div class="elementor-container elementor-column-gap-default">
                                                                <div class="elementor-row">
                                                                    <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-4029b36" data-id="4029b36" data-element_type="column">
                                                                        <div class="elementor-column-wrap elementor-element-populated">
                                                                            <div class="elementor-widget-wrap">
                                                                            <section class="elementor-section elementor-inner-section elementor-element elementor-element-bc33313 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="bc33313" data-element_type="section">
                                                                                <div class="elementor-container elementor-column-gap-default">
                                                                                    <div class="elementor-row">
                                                                                        <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-9ac3549" data-id="9ac3549" data-element_type="column">
                                                                                            <div class="elementor-column-wrap elementor-element-populated">
                                                                                                <div class="elementor-widget-wrap">

                                                                                                    <div class="elementor-element elementor-element-f1f4ffd elementor-widget elementor-widget-beraterportfolio" data-id="f1f4ffd" data-element_type="widget" data-widget_type="beraterportfolio.default">
                                                                                                        <div class="elementor-widget-container portfolio-wrapper image-gallery portfolio-style-classic portfolio-light portfolio-normal-model shortcode-rand-5 berater-inline-css" data-css="&quot;.shortcode-rand-5.portfolio-wrapper .portfolio-inner &gt; *:nth-child(1) { margin-bottom: 0px; }.shortcode-rand-5.portfolio-wrapper .portfolio-inner &gt; *:nth-child(2) { margin-bottom: 12px; }.shortcode-rand-5.portfolio-wrapper .portfolio-inner &gt; *:nth-child(3) { margin-bottom: 0px; }&quot;">
                                                                                                            <div class="row">
                                                                                                                @foreach($gallery2_elements as $gallery_element)

                                                                                                                <div class="col-lg-4 col-md-4">
                                                                                                                    <div class="portfolio-inner gallery2">
                                                                                                                        <div class="post-thumb post-overlay-active">
                                                                                                                            <img loading="lazy"  class="img-fluid amgroup-gallery" alt="" src="{{asset('/images/uploads/section_elements/gallery_2/'.@$gallery_element->resized_name)}}" />
                                                                                                                            <div class="post-overlay-items overlay-top-left">
                                                                                                                                <div class="portfolio-icons">
                                                                                                                                    <div class="portfolio-popup-icon">
                                                                                                                                        <a href="#" data-mfp-src="{{asset('/images/uploads/section_elements/gallery_2/'.@$gallery_element->filename)}}" class="image-gallery-link zoom-icon"><i
																																				class="ti-zoom-in"></i></a>
                                                                                                                                    </div>
                                                                                                                                    <div class="portfolio-link-icon">
                                                                                                                                        <a href="{{asset('/images/uploads/section_elements/gallery_2/'.@$gallery_element->filename)}}" download class="link-icon" ><i
																																				class="ti-download"></i></a>
                                                                                                                                    </div>
                                                                                                                                </div>

                                                                                                                                <div class="entry-title gallery-title">
                                                                                                                                    <h4 class="post-title-head">
                                                                                                                                        <a class="post-title orginal-title" >{{ucwords(@$gallery_element->original_name)}}</a>
                                                                                                                                    </h4>
                                                                                                                                </div>

                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="top-meta clearfix">
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
                                                                            </section>


                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    </section>
                                                @endif
                                                @if($value == "contact_information")
                                                    <section class="elementor-section elementor-top-section elementor-element elementor-element-72fb885 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="72fb885" data-element_type="section">
                                                            <div class="elementor-container elementor-column-gap-default">
                                                                <div class="elementor-row">
                                                                    <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-170ece6" data-id="170ece6" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                                        <div class="elementor-column-wrap elementor-element-populated">
                                                                            <div class="elementor-widget-wrap">
                                                                                <div class="elementor-element elementor-element-6f7d101 elementor-widget elementor-widget-beratersectiontitle" data-id="6f7d101" data-element_type="widget" data-widget_type="beratersectiontitle.default">
                                                                                    <div class="elementor-widget-container">
                                                                                        <div class="section-title-wrapper margin-bottom-30 text-center-sm light-separator">
                                                                                            <div class="title-wrap"><span class="sub-title">About Us</span>
                                                                                                <h2 class="section-title">Know More about us</h2><span class="title-separator separator-border theme-color-bg"></span></div>
                                                                                            <div class="section-description"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="elementor-element elementor-element-8afe01e elementor-widget elementor-widget-contactform" data-id="8afe01e" data-element_type="widget" data-widget_type="contactform.default">
                                                                                    <div class="elementor-widget-container">
                                                                                        {!! @$contact_info_elements->description !!}

                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-a5c1608" data-id="a5c1608" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                                        <div class="elementor-column-wrap elementor-element-populated">
                                                                            <div class="elementor-widget-wrap">
                                                                                <div class="elementor-element elementor-element-34d60e3 elementor-widget elementor-widget-beratersectiontitle" data-id="34d60e3" data-element_type="widget" data-widget_type="beratersectiontitle.default">
                                                                                    <div class="elementor-widget-container">
                                                                                        <div class="section-title-wrapper margin-bottom-30 text-center-sm light-separator">
                                                                                            <div class="title-wrap"><span class="sub-title">Location</span>
                                                                                                <h2 class="section-title">Contact Info</h2><span class="title-separator separator-border theme-color-bg"></span></div>
                                                                                            <div class="section-description"></div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="elementor-element elementor-element-ef1c10f elementor-widget elementor-widget-beraterfeaturebox" data-id="ef1c10f" data-element_type="widget" data-widget_type="beraterfeaturebox.default">
                                                                                    <div class="elementor-widget-container feature-box-wrapper anim cus-feature2 cus-icon-white f-box-shadow shortcode-rand-20 berater-inline-css">
                                                                                        <div class="media">
                                                                                            <div class="media-icon-part align-self-center">
                                                                                                <div class="feature-box-icon"><span class="text-center icon-icon-light squared fbox-icon-middle ti-location-pin"></span></div>
                                                                                            </div>
                                                                                            <div class="media-body">
                                                                                                <h4 class="feature-box-title">Our Address</h4>
                                                                                                <div class="fbox-content">
                                                                                                    {{@$contact_info_elements->list_description}}
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="elementor-element elementor-element-ed647a6 elementor-widget elementor-widget-beraterfeaturebox" data-id="ed647a6" data-element_type="widget" data-widget_type="beraterfeaturebox.default">
                                                                                    <div class="elementor-widget-container feature-box-wrapper anim cus-feature2 cus-icon-white f-box-shadow shortcode-rand-21 berater-inline-css">
                                                                                        <div class="media">
                                                                                            <div class="media-icon-part align-self-center">
                                                                                                <div class="feature-box-icon"><span class="text-center icon-icon-light squared fbox-icon-middle ti-headphone-alt"></span></div>
                                                                                            </div>
                                                                                            <div class="media-body">
                                                                                                <h4 class="feature-box-title">Phone Number</h4>

                                                                                                <div class="fbox-content"> {{@$contact_info_elements->heading}}</div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="elementor-element elementor-element-71abbee elementor-widget elementor-widget-beraterfeaturebox" data-id="71abbee" data-element_type="widget" data-widget_type="beraterfeaturebox.default">
                                                                                    <div class="elementor-widget-container feature-box-wrapper anim cus-feature2 cus-icon-white f-box-shadow shortcode-rand-22 berater-inline-css">
                                                                                        <div class="media">
                                                                                            <div class="media-icon-part align-self-center">
                                                                                                <div class="feature-box-icon"><span class="text-center icon-icon-light squared fbox-icon-middle ti-email"></span></div>
                                                                                            </div>
                                                                                            <div class="media-body">
                                                                                                <h4 class="feature-box-title">Email Address</h4>
                                                                                                <div class="fbox-content">

                                                                                                    {{@$contact_info_elements->subheading}}
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </section>
                                                @endif
                                                @if($value == "slider_list")
                                                    <section
                                                        class="elementor-section elementor-top-section elementor-element elementor-element-381d01c elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                                        data-id="381d01c" data-element_type="section"
                                                        data-settings="{&quot;stretch_section&quot;:&quot;section-stretched&quot;,&quot;background_background&quot;:&quot;classic&quot;}">
                                                        <div class="elementor-background-overlay"></div>
                                                        <div class="elementor-container elementor-column-gap-default">
                                                            <div class="elementor-row">
                                                                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-57f022b"
                                                                    data-id="57f022b" data-element_type="column">
                                                                    <div
                                                                        class="elementor-column-wrap elementor-element-populated">
                                                                        <div class="elementor-widget-wrap">
                                                                            <div class="elementor-element elementor-element-5f50ce6 elementor-widget elementor-widget-beratersectiontitle"
                                                                                data-id="5f50ce6"
                                                                                data-element_type="widget"
                                                                                data-widget_type="beratersectiontitle.default">
                                                                                <div class="elementor-widget-container">
                                                                                    <div
                                                                                        class="section-title-wrapper text-center">
                                                                                        <div class="title-wrap"><span
                                                                                                class="sub-title">{{ucwords(@$slider_list_elements[0]->heading)}}</span>
                                                                                            <h2 class="section-title">
                                                                                                {{ucwords(@$slider_list_elements[0]->description)}}</a></h2><span
                                                                                                class="title-separator separator-border theme-color-bg"></span>
                                                                                        </div>
                                                                                        <div
                                                                                            class="section-description">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="elementor-element elementor-element-0432c41 elementor-widget elementor-widget-beraterservice"
                                                                                data-id="0432c41"
                                                                                data-element_type="widget"
                                                                                data-widget_type="beraterservice.default">
                                                                                <div class="elementor-widget-container">
                                                                                    <div class="service-wrapper service-modern service-light shortcode-rand-4 berater-inline-css"
                                                                                        data-css="&quot;.shortcode-rand-4.service-wrapper .service-inner &gt; *:nth-child(1) { margin-bottom: 30px; }.shortcode-rand-4.service-wrapper .service-inner &gt; *:nth-child(2) { margin-bottom: 30px; }.shortcode-rand-4.service-wrapper .service-inner &gt; *:nth-child(3) { margin-bottom: 13px; }.shortcode-rand-4.service-wrapper .service-inner &gt; *:nth-child(4) { margin-bottom: 14px; }&quot;">
                                                                                        <div class="owl-carousel"
                                                                                            data-loop="0"
                                                                                            data-margin="30"
                                                                                            data-center="0" data-nav="1"
                                                                                            data-dots="0"
                                                                                            data-autoplay="0"
                                                                                            data-items="3"
                                                                                            data-items-tab="2"
                                                                                            data-items-mob="1"
                                                                                            data-duration="5000"
                                                                                            data-smartspeed="250"
                                                                                            data-scrollby="1"
                                                                                            data-autoheight="false">

                                                                                            @for ($i = 1; $i <=@$list_3; $i++)


                                                                                            <div class="item">
                                                                                                <div
                                                                                                    class="service-inner">
                                                                                                    <div
                                                                                                        class="service-thumb">
                                                                                                        <img width="768"
                                                                                                            height="510"
                                                                                                            src="{{ asset('/images/uploads/section_elements/list_1/thumb/thumb_'.@$slider_list_elements[$i-1]->list_image) }}"
                                                                                                            class="img-fluid wp-post-image"
                                                                                                            alt="{{ucwords(@$slider_list_elements[$i-1]->subheading)}}"
                                                                                                            loading="lazy"
                                                                                                            srcset="{{ asset('/images/uploads/section_elements/list_1/thumb/thumb_'.@$slider_list_elements[$i-1]->list_image) }} 1170w, {{ asset('/images/uploads/section_elements/list_1/thumb/thumb_'.@$slider_list_elements[$i-1]->list_image) }} 768w, {{ asset('/images/uploads/section_elements/list_1/thumb/thumb_'.@$slider_list_elements[$i-1]->list_image) }} 600w"
                                                                                                            sizes="(max-width: 768px) 100vw, 768px" />
                                                                                                    </div>

                                                                                                    <h4 class="service-title">
                                                                                                        <a href="{{route('slider.single',@$slider_list_elements[$i-1]->subheading)}}">{{ucwords(@$slider_list_elements[$i-1]->list_header)}}</a>
                                                                                                    </h4>
                                                                                                    <div class="service-excerpt">
                                                                                                        <p>
                                                                                                        {{ucfirst(Str::limit(@$slider_list_elements[$i-1]->list_description, 65))}}...

                                                                                                        </p>
                                                                                                    </div>
                                                                                                    <div class="post-more">
                                                                                                        <a class="read-more btn" href="{{route('slider.single',@$slider_list_elements[$i-1]->subheading)}}">Read More</a>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            @endfor

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                @endif
                                           @endforeach
                                            @if(@$page_detail->slug=="legal-documents")

                                                <section class="brocher elementor-section elementor-top-section elementor-element elementor-element-a08f468  elementor-section-stretched elementor-section-boxed elementor-section-height-default elementor-section-height-default">
                                                    <div class="elementor-element elementor-element-065dfd6 elementor-widget elementor-widget-beratersectiontitle" data-id="065dfd6" data-element_type="widget" data-widget_type="beratersectiontitle.default">
                                                        <div class="elementor-widget-container">
                                                            <div class="section-title-wrapper text-center">
                                                                <div class="title-wrap"><span class="sub-title">Our</span>
                                                                    <h2 class="section-title">Brocher</h2><span class="title-separator separator-border theme-color-bg"></span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="container">
                                                        <div data-elementor-type="wp-post" data-elementor-id="8807" class="elementor elementor-8807" data-elementor-settings="[]">
                                                            <div class="elementor-inner">
                                                                <div class="elementor-section-wrap">
                                                                    <section class="elementor-section elementor-top-section elementor-element elementor-element-10a1744 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="10a1744" data-element_type="section">
                                                                        <div class="elementor-container elementor-column-gap-default">
                                                                            <div class="elementor-row">
                                                                                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-f731e5a" data-id="f731e5a" data-element_type="column">
                                                                                    <div class="elementor-column-wrap elementor-element-populated">
                                                                                        <div class="elementor-widget-wrap">
                                                                                            <div class="elementor-element elementor-element-4bada95 elementor-widget elementor-widget-text-editor" data-id="4bada95" data-element_type="widget" data-widget_type="text-editor.default">
                                                                                                <div class="elementor-widget-container">
                                                                                                    <div  class="elementor-text-editor elementor-clearfix">
                                                                                                    <iframe  src="{{url('/loadbrocher#magazineMode=true')}}" width="100%" height="400"></iframe>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </section>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')


<script  src="{{asset('assets/frontend/js/bootstrap.min.js')}}"></script>
<script  src="{{asset('assets/frontend/js/lightbox.js')}}"></script>
@endsection
