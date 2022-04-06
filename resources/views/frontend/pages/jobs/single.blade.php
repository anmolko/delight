@extends('frontend.layouts.master')
@section('title') {{ucwords(@$singleJob->name)}}@endsection
@section('styles')
<style>
        .blog-single-post .image {
            margin-bottom: 30px;
        }
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
            width: 160px;
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
    <section class="page-title" style="background-image: url('{{asset('assets/frontend/images/background/bg-17.jpg')}}');">
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

        <!-- sidebar-page-container -->
        <section class="sidebar-page-container">
        <div class="auto-container">
            <div class="row">
                <div class="col-lg-8 content-side">
                    <div class="blog-single-post">
                        <div class="image"><img src="{{ asset('/images/uploads/jobs/'.@$singleJob->image) }}" alt="{{@$singleJob->slug}}"></div>

                        <h3>{{ucwords(@$singleJob->name)}}</h3>

                        <div class="row features-job">
                            <div class="col">
                                <ul class="portfolio-meta-list">
                                    <li>
                                        <div class="portfolio-meta-title-wrap">
                                            <h6><span class="portfolio-meta-icon"><i class="fa fa-building"></i></span>Company</h6>
                                        </div> <span class="entry-date">{{ucwords(@$singleJob->client->name)}}</span>
                                        </li>
                                    <li>
                                
                                        <div class="portfolio-meta-title-wrap">
                                            <h6><span class="portfolio-meta-icon"><i class="fas fa-sack-dollar"></i></span>Salary</h6>
                                        </div> <span class="entry-estimation">{{@$singleJob->salary}}</span>
                                    </li>
                                
                                </ul>
                            </div>
                            <div class="col">
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

                        <div class="text">
                        {!! $singleJob->description !!}
                        </div>
                        <?php if($singleJob->formlink){  ?>  
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group text-center">
                                <a class="theme-btn btn-style-one" href="{{@$singleJob->formlink}}" ><span class="btn-title">Apply Now</span></a>
                            </div>
                        <?php } ?>
 
                        <div class="share-icon">
                            <h5>Share this job</h5>
                            <ul class="social-links">
                                <li><a href="#" onclick='fbShare("{{route('job.single',$singleJob->slug)}}")'  class="facebook"><i class="fab fa-facebook-f"></i>Facebook</a></li>
                                <li><a href="#" onclick='twitShare("{{route('job.single',$singleJob->slug)}}","{{ $singleJob->name }}")' class="twitter"><i class="fab fa-twitter"></i>Twiter</a></li>
                                <li><a href="#" onclick='whatsappShare("{{route('job.single',$singleJob->slug)}}","{{ $singleJob->name }}")' class="whatsapp"><i class="fab fa-whatsapp"></i>Whatsapp</a></li>
                            </ul>
                        </div>
  
                    </div>
                </div>
                <aside class="col-lg-4 sidebar">
                    @include('frontend.pages.jobs.index_sidebar')            

                </aside>
            </div>
        </div>
    </section>
    <!-- sidebar-page-container end -->

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