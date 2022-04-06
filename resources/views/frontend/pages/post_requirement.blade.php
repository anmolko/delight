@extends('frontend.layouts.master')
@section('title') Post Requirements @endsection
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

    /* @media (min-width: 768px){
        .elementor-6732 .elementor-element.elementor-element-63c897e5 {
            width: 65.583%;
        }
        .elementor-6732 .elementor-element.elementor-element-699271d3 {
            width: 34.417%;
        }
    } */


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
                                    <h1 class="page-title">Post Requirements</h1>
                                    <div id="breadcrumb" class="breadcrumb"><a href="/">Home</a>
                                    <span class="current">Post Requirements</span></div>
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
                                                        <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-63c897e5" data-id="63c897e5" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                            <div class="elementor-column-wrap elementor-element-populated">
                                                                <div class="elementor-widget-wrap">
                                                                    <div class="elementor-element elementor-element-5c993fb9 elementor-widget elementor-widget-beratersectiontitle" data-id="5c993fb9" data-element_type="widget" data-widget_type="beratersectiontitle.default">
                                                                        <div class="elementor-widget-container">
                                                                            <div class="section-title-wrapper margin-bottom-30 text-center-sm light-separator">
                                                                                <div class="title-wrap">
                                                                                    <h2 class="section-title">Post Requirements</h2><span class="title-separator separator-border theme-color-bg"></span></div>
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

                                                                                        <form action="" method="post" class="wpcf7-form init"  enctype="multipart/form-data">
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
                                                                                                <div class="col-md-6">
                                                                                                    <div class="form-icon">
                                                                                                        <span class="icon ti-user"></span><br />
                                                                                                        <span class="wpcf7-form-control-wrap your-name">
                                                                                                            <input type="text" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" placeholder="Full Name *" name="name" required oninvalid="this.setCustomValidity('Enter your full name')" oninput="this.setCustomValidity('')"/>
                                                                                                        </span>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-6">
                                                                                                    <div class="form-icon">
                                                                                                        <span class="icon ti-layout"></span><br />
                                                                                                        <span class="wpcf7-form-control-wrap your-name">
                                                                                                            <input type="text" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" placeholder="Company Name *" name="company_name" required oninvalid="this.setCustomValidity('Enter your company name')" oninput="this.setCustomValidity('')"/>
                                                                                                        </span>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-6">
                                                                                                    <div class="form-icon"> <span class="icon ti-location-pin"></span><br />
                                                                                                        <span class="wpcf7-form-control-wrap your-text">
                                                                                                        <select class="custom-select select-height wpcf7-form-control wpcf7-text" name="country" oninvalid="this.setCustomValidity('Enter your country')" oninput="this.setCustomValidity('')" required>
                                                                                                            <option value disabled selected> Select Country *</option>
                                                                                                                <option value="Qatar">Qatar</option>
                                                                                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                                                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                                                                                <option value="Malaysia">Malaysia</option>
                                                                                                        </select>
                                                                                                    </span></div>

                                                                                                </div>
                                                                                                <div class="col-md-6">
                                                                                                    <div class="form-icon"> <span class="icon ti-map-alt"></span><br />
                                                                                                        <span class="wpcf7-form-control-wrap your-text">
                                                                                                        <input type="text" name="city" value=""  class="wpcf7-form-control wpcf7-text "  placeholder="City *"  oninvalid="this.setCustomValidity('Enter your city')" required oninput="this.setCustomValidity('')"/>
                                                                                                    </span></div>
                                                                                                </div>
                                                                                                <div class="col-md-6">
                                                                                                    <div class="form-icon">
                                                                                                        <span class="icon ti-email"></span><br />
                                                                                                        <span class="wpcf7-form-control-wrap your-email">
                                                                                                        <input type="email" name="email"  size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required" placeholder="Email *" required oninvalid="this.setCustomValidity('Enter your email')" oninput="this.setCustomValidity('')" />
                                                                                                        </span>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-md-6">
                                                                                                    <div class="form-icon">
                                                                                                        <span class="icon ti-microphone"></span><br />
                                                                                                        <span class="wpcf7-form-control-wrap your-email">
                                                                                                        <input type="text" name="number"  size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required" placeholder="Mobile/Phone Number *" required  oninvalid="this.setCustomValidity('Enter your Phone number')" oninput="this.setCustomValidity('')" />
                                                                                                        </span>
                                                                                                    </div>
                                                                                                </div>

                                                                                                <div class="col-md-12">
                                                                                                    <div class="form-icon"> <span class="icon ti-align-justify"></span><br /> <span class="wpcf7-form-control-wrap your-message">
                                                                                                        <textarea name="message" maxlength="300" cols="40" rows="10" class="wpcf7-form-control wpcf7-textarea" required placeholder="Your requirements..." oninvalid="this.setCustomValidity('Type a message')" oninput="this.setCustomValidity('')"></textarea></span></div>
                                                                                                </div>
                                                                                                <div class="col-md-12">
                                                                                                    <label>Upload Document </label>

                                                                                                    <div class="form-icon"> <span class="icon ti-file"></span><br /> <span class="wpcf7-form-control-wrap your-message">
                                                                                                    <input type="file" accept=".doc,.pdf,.docx" class="wpcf7-form-control wpcf7-file wpcf7-validates-as-required" name="document" /></span></div>
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
