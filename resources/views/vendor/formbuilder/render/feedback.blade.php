@extends('formbuilder::front_layout')
@section('title') {{ $form->name }} @endsection
@section('styles')

<style>
   

    input.parsley-success,
    select.parsley-success,
    textarea.parsley-success {
        color: #468847;
        background-color: #DFF0D8;
        border: 1px solid #D6E9C6;
    }

    input.parsley-error,
    select.parsley-error,
    textarea.parsley-error {
        color: #B94A48;
        background-color: #F2DEDE;
        border: 1px solid #EED3D7;
    }

    .parsley-errors-list {
        margin: 2px 0 3px;
        padding: 0;
        list-style-type: none;
        font-size: 0.9em;
        line-height: 0.9em;
        opacity: 0;
        color: #B94A48;

        transition: all .3s ease-in;
        -o-transition: all .3s ease-in;
        -moz-transition: all .3s ease-in;
        -webkit-transition: all .3s ease-in;
    }

    .parsley-errors-list.filled {
        opacity: 1;
    }

    
</style>
@endsection
@section('content')
    <!-- Page Title -->
    <section class="page-title" style="background-image: url({{asset('assets/frontend/images/background/bg-17.jpg')}});">
        <div class="auto-container">
            <div class="content-box">
                <div class="content-wrapper">
                    <div class="title">
                        <h1>{{ $form->name }}</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="/">Home</a></li>
                        <li><a href="{{route('job.list')}}">Jobs</a></li>
                        
                        <li>{{ $form->name }}</li>
                    </ul>
                </div>                    
            </div>
        </div>
    </section>
    <!-- Page Title -->
    <section class="contact-details-section-two">
        <div class="auto-container">
            <div class="row justify-content-center">
                    <div class="col-md-7">
                    <h3 class="text-center text-success">
                        Your entry for <strong>{{ $form->name }}</strong> was successfully submitted. 
                    </h3>
                        <div class="text-center">
                        <p> {{ @$form->custom_description }}</p>
                        </div>
                        <div class="text-center">
                        <a href="{{ route('job.list') }}" class="btn btn-primary confirm-form btn-sm">
                            <i class="fa fa-briefcase"></i> Return Jobs
                        </a>
                            <a href="{{ route('contact') }}" class="btn btn-primary btn-sm">
                                <i class="fa fa-phone-square"></i> Contact Now
                            </a>
                    </div>
            </div>
        </div>
    </section>
<div class="berater-content-wrapper">
    <div class="berater-content berater-page">
   
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
                                                    <div class="elementor-row dynamic-form-container">
                                                        <div class="elementor-column elementor-col-80 elementor-top-column elementor-element elementor-element-63c897e5" data-id="63c897e5" data-element_type="column" data-settings="{&quot;background_background&quot;:&quot;classic&quot;}">
                                                            <div class="elementor-column-wrap elementor-element-populated">
                                                                <div class="elementor-widget-wrap">
                                                                    <div class="elementor-element elementor-element-5c993fb9 elementor-widget elementor-widget-beratersectiontitle" data-id="5c993fb9" data-element_type="widget" data-widget_type="beratersectiontitle.default">
                                                                        <div class="elementor-widget-container">
                                                                            <div class="section-title-wrapper margin-bottom-30 text-center-sm light-separator">
                                                                                <div class="title-wrap">
                                                                                    <!-- <span class="sub-title"></span> -->
                                                                                <div class="section-description">
                                                                                
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
