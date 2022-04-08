@extends('frontend.layouts.seo_master')
@section('seo')
    <title>{{ucfirst(@$singleJob->name)}} - @if(!empty(@$setting_data->website_name)) {{ucwords(@$setting_data->website_name)}} @else Delight Foreign Manpower @endif </title>
    <meta name='description' itemprop='description'  content='{{ucfirst(@$singleJob->description)}}' />
    <meta name='keywords' content='{{ucfirst(@$singleJob->description)}}' />
    <meta property='article:published_time' content='<?php if(@$singleJob->updated_at !=''){?>{{@$singleJob->updated_at}} <?php }else {?> {{@$singleJob->created_at}} <?php }?>' />
    <meta property='article:section' content='article' />
    <meta property="og:description" content="{{ucfirst(@$singleJob->description)}}" />
    <meta property="og:title" content="{{ucfirst(@$singleJob->name)}}" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:type" content="recruit" />
    <meta property="og:locale" content="en-us" />
    <meta property="og:locale:alternate"  content="en-us" />
    <meta property="og:site_name" content="@if(!empty(@$setting_data->website_name)) {{ucwords(@$setting_data->website_name)}} @else White Pearl @endif" />
    <meta property="og:image" content="<?php if(@$singleJob->image){?>{{asset('/images/uploads/jobs/'.@$singleJob->image)}}<?php }?>" />
    <meta property="og:image:url" content="<?php if(@$singleJob->image){?>{{asset('/images/uploads/jobs/'.@$singleJob->image)}}<?php }?>" />
    <meta property="og:image:size" content="300" />
@endsection
@section('styles')
<style>
       
        .row.features-job {
            margin-bottom: 0 !important;
        }
        ul.portfolio-meta-list {
            padding-left: 0;
        }

        ul.portfolio-meta-list > li {
            list-style-type: none;
        }
        .portfolio-meta-list>li {
            margin-bottom: 11px;
        }

        .portfolio-meta-list>li .portfolio-meta-title-wrap {
            display: inline-block;
            margin-right: 15px;
        }
        .portfolio-meta-title-wrap {
            color: #252525;
        }
       
        .portfolio-meta-title-wrap h6 {
            font-size: 15px;
            font-weight: 600;
            text-transform: none;
            color: #252525;
            margin-bottom: 0;
            width: 120px;
        }

        .portfolio-meta-title-wrap h6 {
            width: 165px;
        }
        span.portfolio-meta-icon {
            color: #2782f9;
        }
        span.portfolio-meta-icon {
            margin-right: 10px;
        }

        .portfolio-meta-list>li>span, .portfolio-meta-list>li a {
            font-size: 16px;
        }
</style>
@endsection
@section('content')
 
    <!-- Page Title -->
    <section class="page-title" style="background-image: url('{{asset('assets/frontend/images/background/7.jpg')}}');">
        <div class="auto-container">
            <div class="content-box">
                <div class="content-wrapper">
                    <div class="title">
                        <h1>{{ucwords(@$singleJob->name)}} </h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="/">Home</a></li>
                        <li><a href="{{url('/jobs')}}">Jobs</a></li>
                        <li>{{ucwords(@$singleJob->name)}} ({{date('M j, Y',strtotime(@$singleJob->start_date))}} - {{date('M j, Y',strtotime(@$singleJob->end_date))}})</li>
                    </ul>
                </div>                    
            </div>
        </div>
    </section>
    <!-- Page Title -->

    <!-- Sidebar Page Container -->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">
                <!--Content Side-->
                <div class="content-side col-lg-8 col-md-12 col-sm-12 order-2">
                    <div class="blog-detail">
                        <div class="news-block-two">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img src="{{ asset('/images/uploads/jobs/'.@$singleJob->image) }}" alt="{{@$singleJob->slug}}"></figure>
                                </div>
                                <div class="post-share-options clearfix">
                                    <div class="pull-left">
                                        <p>Category : </p>
                                        <ul class="tags">
                                            <li><a href="#">{{ucwords($singleJob->category->name)}}</a></li>
                                        </ul>                               
                                    </div>
                                    <div class="pull-right">
                                        <p>Share : </p>
                                        <ul class="social-icon">
                                            <li><a href="#" onclick='fbShare("{{route('blog.single',$singleJob->slug)}}")'  ><span class="fab fa-facebook"></span></a></li>
                                            <li><a href="#" onclick='twitShare("{{route('blog.single',$singleJob->slug)}}","{{ $singleJob->name }}")' ><span class="fab fa-twitter"></span></a></li>
                                            <li><a href="#" onclick='whatsappShare("{{route('blog.single',$singleJob->slug)}}","{{ $singleJob->name }}")' ><span class="fab fa-whatsapp"></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="auto-container">

                                    <div class="row features-job">

                                            <div class="col-lg-6 col-md-12 col-sm-12 ">
                                                <ul class="portfolio-meta-list">
                                                    <li>
                                                        <div class="portfolio-meta-title-wrap">
                                                            <h6><span class="portfolio-meta-icon"><i class="fa fa-building"></i></span>Company</h6>
                                                        </div> <span class="entry-date">{{ucwords(@$singleJob->client->name)}}</span>
                                                        </li>
                                                    <li>
                                                
                                                        <div class="portfolio-meta-title-wrap">
                                                            <h6><span class="portfolio-meta-icon"><i class="fas fa-hand-holding-usd"></i></span>Salary</h6>
                                                        </div> <span class="entry-estimation">{{@$singleJob->salary}}</span>
                                                    </li>
                                                
                                                </ul>
                                            </div>
                                            <div class="col-lg-6 col-md-12 col-sm-12 ">
                                                <ul class="portfolio-meta-list">
                                                    
                                                    <li>
                                                        <div class="portfolio-meta-title-wrap">
                                                            <h6><span class="portfolio-meta-icon"><i class="fas fa-globe"></i></span>Place</h6>
                                                        </div> <span class="entry-place">
                                                        <?php
                                                            if(!empty($singleJob->country)){
                                                                foreach ($countries as $key=>$value){
                                                                    if($singleJob->country == $key){
                                                                        echo $value;
                                                                    }
                                                                }
                                                            }
                                                        ?>
                                                        </span></li>
                                                    <li>
                                                        <div class="portfolio-meta-title-wrap">
                                                            <h6><span class="portfolio-meta-icon"><i class="fas fa-users"></i></span>Required No.</h6>
                                                        </div> <span class="entry-client">{{ucwords(@$singleJob->required_number)}}</span></li>
                                                
                                                    
                                                    
                                                
                                                </ul>
                                            </div>
                                    </div>
                                    <div class="row qualification">
                                        <div class="col">
                                            <ul class="portfolio-meta-list">
                                                <li>
                                                    <div class="portfolio-meta-title-wrap">
                                                        <h6><span class="portfolio-meta-icon"><i class="fas fa-graduation-cap"></i></span>Min. Qualification</h6>
                                                    </div> <span class="entry-duration">{{ucwords(@$singleJob->min_qualification)}}</span>
                                                </li>
                                                
                                            
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="lower-content">
                                    {!! @$singleJob->description !!}
                                    <?php if($singleJob->formlink){  ?>  
                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group text-center">
                                            <a class="theme-btn btn-style-one" href="{{@$singleJob->formlink}}" ><span class="btn-title">Apply Now</span></a>
                                        </div>
                                    <?php } ?>
                                </div>

                            </div>
                        </div>

                        <!-- Other Options -->


                    </div>
                </div>

                <!--Sidebar Side-->
                <div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
                    @include('frontend.pages.jobs.index_sidebar')            

                </div>
            </div>
        </div>
    </div>
    <!-- End Sidebar Container -->

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