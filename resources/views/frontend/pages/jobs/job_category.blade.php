@extends('frontend.layouts.master')
@section('title') {{ucwords(@$service_category->name)}} @endsection
@section('styles')
<style>
   

    .elementor-11077 .elementor-element.elementor-element-d14cb05 .portfolio-wrapper .post-title-head>a {
    color: #fff;
}
</style>
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
                                    <h1 class="page-title">{{ucwords(@$service_category->name)}}</h1>
                                    <div id="breadcrumb" class="breadcrumb"><a href="/">Home</a>
                                       <a href="{{route('job.list')}}">Jobs</a>
                                        <span class="current"> {{ucwords(@$service_category->name)}} </span>
                                       
                                    </div>
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
                            <div id="page-11077" class="post-11077 page type-page status-publish hentry">
                                <div data-elementor-type="wp-page" data-elementor-id="11077"
                                    class="elementor elementor-11077" data-elementor-settings="[]">
                                    <div class="elementor-inner">
                                        <div class="elementor-section-wrap">
                                            <section class="elementor-section elementor-inner-section elementor-element elementor-element-bc33313 elementor-section-boxed elementor-section-height-default elementor-section-height-default"
                                                data-id="bc33313"
                                                data-element_type="section">
                                                <div
                                                    class="elementor-container elementor-column-gap-default">
                                                    <div class="elementor-row">
                                                        <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-9ac3549"
                                                            data-id="9ac3549"
                                                            data-element_type="column">
                                                            <div
                                                                class="elementor-column-wrap elementor-element-populated">
                                                                <div
                                                                    class="elementor-widget-wrap">
                                                                    <div class="elementor-element elementor-element-1aee64b elementor-widget elementor-widget-beratersectiontitle"
                                                                        data-id="1aee64b"
                                                                        data-element_type="widget"
                                                                        data-widget_type="beratersectiontitle.default">
                                                                        <div
                                                                            class="elementor-widget-container">
                                                                            <div
                                                                                class="section-title-wrapper margin-bottom-30 text-center">
                                                                                <div
                                                                                    class="title-wrap">
                                                                                    <h2
                                                                                        class="section-title">
                                                                                        {{ucwords(@$service_category->name)}}
                                                                                    </h2>
                                                                                    <span
                                                                                        class="title-separator separator-border theme-color-bg"></span>
                                                                                </div>
                                                                                <div
                                                                                    class="section-description">
                                                                                    @if(count(@$jobcategories) > 0) 
                                                                                    @else
                                                                                    Related Job's Not Found !!!
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                    <div class="elementor-element elementor-element-d14cb05 elementor-widget elementor-widget-beraterportfolio" data-id="d14cb05" data-element_type="widget" data-widget_type="beraterportfolio.default">
                                                                        <div class="elementor-widget-container portfolio-wrapper image-gallery portfolio-style-modern portfolio-light portfolio-normal-model shortcode-rand-1 berater-inline-css" data-css="&quot;.shortcode-rand-1.portfolio-wrapper .portfolio-inner &gt; *:nth-child(1) { margin-bottom: 0px; }.shortcode-rand-1.portfolio-wrapper .portfolio-inner &gt; *:nth-child(2) { margin-bottom: 20px; }.shortcode-rand-1.portfolio-wrapper .portfolio-inner &gt; *:nth-child(3) { margin-bottom: 0px; }&quot;">
                                                                            <div class="row">
                                                                            @if(count(@$jobcategories) > 0) 
                                                                                @foreach(@$jobcategories as $jobcategory)

                                                                                <div class="col-lg-3 col-md-6">
                                                                                    <div class="portfolio-inner">
                                                                                        <div class="post-thumb post-overlay-active"><img loading="lazy" height="650" width="760" class="img-fluid" alt="{{ucwords(@$jobcategory->name)}}" src="{{ asset('/images/uploads/job_categories/'.$jobcategory->image) }}"
                                                                                            />
                                                                                            <div class="post-overlay-items overlay-bottom-left">
                                                                                                <div class="entry-title">
                                                                                                    <h4 class="post-title-head"><a href="{{route('job.single',[$service_category->slug,$jobcategory->slug])}}" class="post-title" >{{ucwords(@$jobcategory->name)}}</a></h4>
                                                                                                </div>
                                                                                                <div class="portfolio-icons">
                                                                                                    
                                                                                                    <div class="portfolio-link-icon"><a href="{{route('job.single',[$service_category->slug,$jobcategory->slug])}}" class="link-icon" ><i class="ti-link"></i></a></div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                @endforeach
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
