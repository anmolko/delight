@extends('frontend.layouts.master')
@section('title') Apply Now @endsection
@section('styles')
<style>
    .elementor-6732 .elementor-element.elementor-element-c452343 {
        padding: 0;
    }

    .elementor-6732 .elementor-element.elementor-element-41a7254>.elementor-element-populated {
        padding: 0;
    }

    .elementor-6732 .elementor-element.elementor-element-a0ea12b iframe {
        height: 450px;
    }

    /* .elementor-6732 .elementor-element.elementor-element-4c74c9f2 {
        margin-top: -100px;
        margin-bottom: 0;
        padding: 0 0 110px;
    } */

    @media (min-width: 768px){
        .elementor-6732 .elementor-element.elementor-element-63c897e5 {
            width: 65.583%;
        }
        .elementor-6732 .elementor-element.elementor-element-699271d3 {
            width: 34.417%;
        }
    }


    .elementor-6732 .elementor-element.elementor-element-63c897e5:not(.elementor-motion-effects-element-type-background)>.elementor-column-wrap, .elementor-6732 .elementor-element.elementor-element-63c897e5>.elementor-column-wrap>.elementor-motion-effects-container>.elementor-motion-effects-layer {
        background-color: #f7f9ff;
    }

    .elementor-6732 .elementor-element.elementor-element-63c897e5>.elementor-element-populated {
        transition: background .3s,border .3s,border-radius .3s,box-shadow .3s;
        padding: 50px 45px 60px;
    }

    .elementor-6732 .elementor-element.elementor-element-5c993fb9 .section-title-wrapper .sub-title {
        color: #2782f9;
    }

    .elementor-6732 .elementor-element.elementor-element-5c993fb9 .section-title-wrapper .section-title {
        color: #151515;
        text-transform: capitalize;
    }

   .elementor-6732 .elementor-element.elementor-element-4c5ad180>.elementor-widget-container {
        border-radius: 10px 0 0 10px;
    }


    .elementor-6732 .elementor-element.elementor-element-699271d3:not(.elementor-motion-effects-element-type-background)>.elementor-column-wrap, .elementor-6732 .elementor-element.elementor-element-699271d3>.elementor-column-wrap>.elementor-motion-effects-container>.elementor-motion-effects-layer {
        background-color: #fff;
    }

    .elementor-6732 .elementor-element.elementor-element-699271d3>.elementor-element-populated {
        transition: background .3s,border .3s,border-radius .3s,box-shadow .3s;
        padding: 50px 15px 0 0;
    }

    .elementor-6732 .elementor-element.elementor-element-46b1816>.elementor-widget-container {
        padding: 0 0 0 40px;
    }

    .elementor-6732 .elementor-element.elementor-element-46b1816 .section-title-wrapper .sub-title {
        color: #2782f9;
    }

    .elementor-6732 .elementor-element.elementor-element-46b1816 .section-title-wrapper .section-title {
        color: #151515;
        text-transform: capitalize;
    }

    .elementor-6732 .elementor-element.elementor-element-1bd3a4f6>.elementor-widget-container {
        margin: 0;
        padding: 0 30px 28px 40px;
        background-color: #fff;
        border-style: solid;
        border-width: 0 0 1px;
        border-color: #eaeaea;
        border-radius: 0;
    }

    .elementor-6732 .elementor-element.elementor-element-1bd3a4f6 .feature-box-wrapper .feature-box-icon>span {
        font-size: 24px;
        width: 60px;
        height: 60px;
        line-height: 60px;
        background-color: #2782f9;
        border-color: #fff;
    }

    .elementor-6732 .elementor-element.elementor-element-1bd3a4f6 .feature-box-wrapper .feature-box-title {
        text-transform: none;
    }

    .elementor-6732 .elementor-element.elementor-element-1bd3a4f6 .feature-box-wrapper .feature-box-title, .elementor-6732 .elementor-element.elementor-element-1bd3a4f6 .feature-box-wrapper .feature-box-title>a, .elementor-6732 .elementor-element.elementor-element-1bd3a4f6 .feature-box-wrapper .feature-box-title>a:hover {
        color: #252525;
    }

    .elementor-6732 .elementor-element.elementor-element-0cf55a9>.elementor-widget-container {
        margin: 0;
        padding: 31px 30px 28px 40px;
        background-color: #fff;
        border-style: solid;
        border-width: 0 0 1px;
        border-color: #eaeaea;
        border-radius: 0;
    }

    .elementor-6732 .elementor-element.elementor-element-0cf55a9 .feature-box-wrapper .feature-box-icon>span {
        font-size: 24px;
        width: 60px;
        height: 60px;
        line-height: 60px;
        background-color: #2782f9;
        border-color: #fff;
    }

    .elementor-6732 .elementor-element.elementor-element-0cf55a9 .feature-box-wrapper .feature-box-title {
        text-transform: none;
    }

    .elementor-6732 .elementor-element.elementor-element-0cf55a9 .feature-box-wrapper .feature-box-title, .elementor-6732 .elementor-element.elementor-element-0cf55a9 .feature-box-wrapper .feature-box-title>a, .elementor-6732 .elementor-element.elementor-element-0cf55a9 .feature-box-wrapper .feature-box-title>a:hover {
        color: #252525;
    }

    .elementor-6732 .elementor-element.elementor-element-2ab9a6a>.elementor-widget-container {
        padding: 31px 30px 28px 40px;
        background-color: #fff;
        border-radius: 8px;
    }
    .elementor-6732 .elementor-element.elementor-element-2ab9a6a .feature-box-wrapper .feature-box-icon>span {
        font-size: 24px;
        width: 60px;
        height: 60px;
        line-height: 60px;
        background-color: #2782f9;
        border-color: #fff;
    }

    .elementor-6732 .elementor-element.elementor-element-2ab9a6a .feature-box-wrapper .feature-box-title {
        text-transform: none;
    }
    .elementor-6732 .elementor-element.elementor-element-2ab9a6a .feature-box-wrapper .feature-box-title, .elementor-6732 .elementor-element.elementor-element-2ab9a6a .feature-box-wrapper .feature-box-title>a, .elementor-6732 .elementor-element.elementor-element-2ab9a6a .feature-box-wrapper .feature-box-title>a:hover {
        color: #252525;
    }

</style>

@endsection
@section('content')

<div class="berater-content-wrapper">
    <div class="berater-content berater-page">
        <header id="page-title" class="page-title-wrap">
            <div class="page-title-wrap-inner" data-property="no-video"> <span class="page-title-overlay"></span>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-title-inner">
                                <div class="pull-center">
                                    <h1 class="page-title">Apply Now</h1>
                                    <div id="breadcrumb" class="breadcrumb"><a href="/">Home</a>
                                        <a href="/jobs">Jobs</a>
                                    <span class="current">Apply Now</span></div>
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
                            <div id="page-6732" class="post-6732 page type-page status-publish hentry">
                                <div data-elementor-type="wp-page" data-elementor-id="6732" class="elementor elementor-6732" data-elementor-settings="[]">
                                    <div class="elementor-inner">
                                        <div class="elementor-section-wrap">

                                            <section class="elementor-section elementor-top-section elementor-element elementor-element-4c74c9f2 elementor-section-boxed elementor-section-height-default elementor-section-height-default" data-id="4c74c9f2" data-element_type="section">
                                                <div class="elementor-container elementor-column-gap-default">
                                                    <div class="elementor-row">
                                                        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-63c897e5" data-id="63c897e5" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                            <div class="elementor-column-wrap elementor-element-populated">
                                                                <div class="elementor-widget-wrap">
                                                                    <div class="elementor-element elementor-element-5c993fb9 elementor-widget elementor-widget-beratersectiontitle" data-id="5c993fb9" data-element_type="widget" data-widget_type="beratersectiontitle.default">
                                                                        <div class="elementor-widget-container">
                                                                            <div class="section-title-wrapper margin-bottom-30 text-center-sm light-separator">
                                                                                <div class="title-wrap">
                                                                                    <h2 class="section-title">Apply Now</h2><span class="title-separator separator-border theme-color-bg"></span></div>
                                                                                <div class="section-description"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="elementor-element elementor-element-4c5ad180 elementor-widget elementor-widget-contactform" data-id="4c5ad180" data-element_type="widget" data-widget_type="contactform.default">
                                                                        <div class="elementor-widget-container">
                                                                            <div class="contact-form-wrapper cf-default">
                                                                                <div class="contact-form">
                                                                                    <div role="form" class="wpcf7" id="wpcf7-f9742-p6732-o1" lang="en-US" dir="ltr">
                                                                                        <div class="screen-reader-response">
                                                                                            <p role="status" aria-live="polite" aria-atomic="true"></p>
                                                                                            <ul></ul>
                                                                                        </div>

                                                                                        <form action="{{route('apply.store')}}" method="post" class="wpcf7-form init"  enctype="multipart/form-data">
                                                                                            @csrf
                                                                                            @if ($message = Session::get('success'))
                                                                                                <div class="alert alert-success alert-block">
                                                                                                    <strong class="sent-success">{{ $message }}</strong>
                                                                                                </div>
                                                                                            @endif
                                                                                            @if ($message = Session::get('error'))
                                                                                                <div class="alert alert-danger alert-block">
                                                                                                    <strong class="error-sent">{{ $message }}</strong>
                                                                                                </div>
                                                                                            @endif
                                                                                            <div class="row">
                                                                                                <div class="col-md-12">
                                                                                                    <div class="form-icon">
                                                                                                        <span class="icon ti-user"></span><br />
                                                                                                        <span class="wpcf7-form-control-wrap your-name">
                                                                                                            <input type="text" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" placeholder="Full Name *" name="name" required oninvalid="this.setCustomValidity('Enter your full name')" oninput="this.setCustomValidity('')"/>
                                                                                                        </span>
                                                                                                    </div>
                                                                                                    <div class="form-icon">
                                                                                                        <span class="icon ti-email"></span><br />
                                                                                                        <span class="wpcf7-form-control-wrap your-email">
                                                                                                        <input type="email" name="email"  size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required" placeholder="Email"  oninvalid="this.setCustomValidity('Enter your email')" oninput="this.setCustomValidity('')" />
                                                                                                        </span>
                                                                                                    </div>
                                                                                                    <div class="form-icon">
                                                                                                        <span class="icon ti-microphone"></span><br />
                                                                                                        <span class="wpcf7-form-control-wrap your-email">
                                                                                                        <input type="text" name="number"  size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" placeholder="Number *" required  oninvalid="this.setCustomValidity('Enter your Phone number')" oninput="this.setCustomValidity('')" />
                                                                                                        </span>
                                                                                                    </div>

                                                                                                    <div class="form-icon"> <span class="icon ti-location-pin"></span><br />
                                                                                                        <span class="wpcf7-form-control-wrap your-text">
                                                                                                        <input type="text" name="permanent_address" value=""  class="wpcf7-form-control wpcf7-text "  placeholder="Permanent Address"  oninvalid="this.setCustomValidity('Enter your permanent address')" oninput="this.setCustomValidity('')"/>
                                                                                                    </span></div>

                                                                                                    <div class="form-icon"> <span class="icon ti-map-alt"></span><br />
                                                                                                        <span class="wpcf7-form-control-wrap your-text">
                                                                                                        <input type="text" name="current_address" value=""  class="wpcf7-form-control wpcf7-text "  placeholder="Current Address"  oninvalid="this.setCustomValidity('Enter your current address')" oninput="this.setCustomValidity('')"/>
                                                                                                        <input type="hidden" name="job_id" value="{{$singleJob->id}}" />
                                                                                                    </span></div>
                                                                                                </div>
                                                                                                <div class="col-md-12">
                                                                                                    <div class="form-icon"> <span class="icon ti-align-justify"></span><br /> <span class="wpcf7-form-control-wrap your-message">
                                                                                                        <textarea name="message" maxlength="300" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea"  placeholder="Your message" oninvalid="this.setCustomValidity('Type a message')" oninput="this.setCustomValidity('')"></textarea></span></div>
                                                                                                </div>
                                                                                                </div>
                                                                                            <div class="row">

                                                                                                <div class="col-md-4 ">
                                                                                                    <label>Upload CV </label>
                                                                                                    <div class="form-icon">
                                                                                                        <span class="wpcf7-form-control-wrap your-file">
                                                                                                            <input type="file" accept=".png, .jpg, .jpeg" class="wpcf7-form-control wpcf7-file wpcf7-validates-as-required" name="cv" oninvalid="this.setCustomValidity('Upload your CV')" oninput="this.setCustomValidity('')"/></span></div>

                                                                                                </div>
                                                                                                <div class="col-md-4 ">
                                                                                                    <label>Upload Latest Photo </label>
                                                                                                    <div class="form-icon">
                                                                                                        <span class="wpcf7-form-control-wrap your-file">
                                                                                                            <input type="file" accept=".png, .jpg, .jpeg" class="wpcf7-form-control wpcf7-file wpcf7-validates-as-required" name="latest_photo" oninvalid="this.setCustomValidity('Upload your latest photo')" oninput="this.setCustomValidity('')"/></span></div>

                                                                                                </div>

                                                                                                <div class="col-md-4 ">
                                                                                                    <label>Upload Scanned Password </label>
                                                                                                    <div class="form-icon">
                                                                                                        <span class="wpcf7-form-control-wrap your-file">
                                                                                                            <input type="file" accept=".png, .jpg, .jpeg" class="wpcf7-form-control wpcf7-file wpcf7-validates-as-required" name="passport"  oninvalid="this.setCustomValidity('Upload your scanned password')" oninput="this.setCustomValidity('')"/></span></div>

                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div class="col-md-12"> <input type="submit" value="Send Now" class="wpcf7-form-control wpcf7-submit " /></div>
                                                                                            </div>
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="elementor-column elementor-col-50 elementor-top-column elementor-element elementor-element-699271d3" data-id="699271d3" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                            <div class="elementor-column-wrap elementor-element-populated">
                                                                <div class="elementor-widget-wrap">
                                                                    <div class="elementor-element elementor-element-46b1816 elementor-widget elementor-widget-beratersectiontitle" data-id="46b1816" data-element_type="widget" data-widget_type="beratersectiontitle.default">
                                                                        <div class="elementor-widget-container">
                                                                            <div class="section-title-wrapper margin-bottom-30 text-center-sm light-separator">
                                                                                <div class="title-wrap">
                                                                                    <h2 class="section-title">Job Info</h2><span class="title-separator separator-border theme-color-bg"></span></div>
                                                                                <div class="section-description"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="elementor-element elementor-element-1bd3a4f6 elementor-widget elementor-widget-beraterfeaturebox" data-id="1bd3a4f6" data-element_type="widget" data-widget_type="beraterfeaturebox.default">
                                                                        <div class="elementor-widget-container feature-box-wrapper anim cus-feature2 cus-icon-white f-box-shadow shortcode-rand-1 berater-inline-css" data-css="&quot;.shortcode-rand-1.feature-box-wrapper .feature-box-inner &gt; *:nth-child(1), .shortcode-rand-1.feature-box-wrapper &gt; .media &gt; .media-body &gt; *:nth-child(1) { margin-bottom: 15px; }.shortcode-rand-1.feature-box-wrapper .feature-box-inner &gt; *:nth-child(2), .shortcode-rand-1.feature-box-wrapper &gt; .media &gt; .media-body &gt; *:nth-child(2) { margin-bottom: 0px; }.shortcode-rand-1.feature-box-wrapper .feature-box-inner &gt; *:nth-child(3), .shortcode-rand-1.feature-box-wrapper &gt; .media &gt; .media-body &gt; *:nth-child(3) { margin-bottom: 0px; }&quot;">
                                                                            <div class="media">
                                                                                <div class="media-icon-part align-self-center">
                                                                                    <div class="feature-box-icon"><span class="text-center icon-icon-light squared fbox-icon-middle ti-announcement"></span></div>
                                                                                </div>
                                                                                <div class="media-body">
                                                                                    <h4 class="feature-box-title">Job Title</h4>
                                                                                    <div class="fbox-content"> {{@$singleJob->category->name}} </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="elementor-element elementor-element-0cf55a9 elementor-widget elementor-widget-beraterfeaturebox" data-id="0cf55a9" data-element_type="widget" data-widget_type="beraterfeaturebox.default">
                                                                        <div class="elementor-widget-container feature-box-wrapper anim cus-feature2 cus-icon-white f-box-shadow shortcode-rand-2 berater-inline-css" data-css="&quot;.shortcode-rand-2.feature-box-wrapper .feature-box-inner &gt; *:nth-child(1), .shortcode-rand-2.feature-box-wrapper &gt; .media &gt; .media-body &gt; *:nth-child(1) { margin-bottom: 15px; }.shortcode-rand-2.feature-box-wrapper .feature-box-inner &gt; *:nth-child(2), .shortcode-rand-2.feature-box-wrapper &gt; .media &gt; .media-body &gt; *:nth-child(2) { margin-bottom: 0px; }.shortcode-rand-2.feature-box-wrapper .feature-box-inner &gt; *:nth-child(3), .shortcode-rand-2.feature-box-wrapper &gt; .media &gt; .media-body &gt; *:nth-child(3) { margin-bottom: 0px; }&quot;">
                                                                            <div class="media">
                                                                                <div class="media-icon-part align-self-center">
                                                                                    <div class="feature-box-icon"><span class="text-center icon-icon-light squared fbox-icon-middle ti-layout"></span></div>
                                                                                </div>
                                                                                <div class="media-body">
                                                                                    <h4 class="feature-box-title">Company</h4>
                                                                                    <div class="fbox-content">{{ucwords(@$singleJob->client->name)}}</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="elementor-element elementor-element-2ab9a6a elementor-widget elementor-widget-beraterfeaturebox" data-id="2ab9a6a" data-element_type="widget" data-widget_type="beraterfeaturebox.default">
                                                                        <div class="elementor-widget-container feature-box-wrapper anim cus-feature2 cus-icon-white f-box-shadow shortcode-rand-3 berater-inline-css" data-css="&quot;.shortcode-rand-3.feature-box-wrapper .feature-box-inner &gt; *:nth-child(1), .shortcode-rand-3.feature-box-wrapper &gt; .media &gt; .media-body &gt; *:nth-child(1) { margin-bottom: 15px; }.shortcode-rand-3.feature-box-wrapper .feature-box-inner &gt; *:nth-child(2), .shortcode-rand-3.feature-box-wrapper &gt; .media &gt; .media-body &gt; *:nth-child(2) { margin-bottom: 0; }.shortcode-rand-3.feature-box-wrapper .feature-box-inner &gt; *:nth-child(3), .shortcode-rand-3.feature-box-wrapper &gt; .media &gt; .media-body &gt; *:nth-child(3) { margin-bottom: 0px; }&quot;">
                                                                            <div class="media">
                                                                                <div class="media-icon-part align-self-center">
                                                                                    <div class="feature-box-icon"><span class="text-center icon-icon-light squared fbox-icon-middle ti-location-pin"></span></div>
                                                                                </div>
                                                                                <div class="media-body">
                                                                                    <h4 class="feature-box-title">Country</h4>
                                                                                    <div class="fbox-content">
                                                                                        <?php
                                                                                        if(!empty($singleJob->country)){
                                                                                            foreach ($countries as $key=>$value){
                                                                                                if($singleJob->country == $key){
                                                                                                    echo $value;
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                        ?>
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
