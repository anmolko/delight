@extends('frontend.layouts.master')
@section('title') Jobs  @endsection
@section('styles')
    <style>
       .category a:hover {
            color: #fff;
        }
        .news-block-two .inner-box:hover .category a{
            color: #fff;
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
                        <h1>Latest Jobs </h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="/">Home</a></li>
                        <li>Jobs </li>
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
                @if(count($alljobs) > 0)

                <div class="col-lg-8 content-side">
                    <div class="row">
                            @foreach($alljobs as $job)
                            <div class="col-md-6 news-block-two">
                                <div class="inner-box">
                                    <div class="image">
                                        <a href="{{route('job.single',@$job->slug)}}"><img class="lazy-image owl-lazy" src="{{asset('assets/frontend/images/resource/image-spacer-for-validation.png')}}" data-src="<?php if(@$job->image){?>{{asset('/images/uploads/jobs/'.@$job->image)}}<?php }?>" alt="{{@$job->slug}}"></a>
                                    </div>
                                    <div class="lower-content">
                                        <div class="category"><a href="#">{{ucwords(@$job->category->name)}}</a></div>
                                        <ul class="post-meta">
                                            <li><a href="{{route('job.single',@$job->slug)}}">{{date('M j, Y',strtotime(@$job->start_date))}} - {{date('M j, Y',strtotime(@$job->end_date))}}</a></li>
                                        
                                        </ul>
                                        <h4><a href="{{route('job.single',$job->slug)}}">{{ucwords($job->name)}}</a></h4>
                                        <?php if($job->formlink){?>    
                                            <a href="{{@$job->formlink}}" class="read-more-link"><i class="flaticon-right-arrow"></i>Apply Now</a>
                                        <?php }else{?>

                                            <a href="#" class="read-more-link"><i class="flaticon-right-arrow"></i>Apply Now</a>

                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                     
                    </div>
                    <div class="pagination-wrapper text-center mt-4">
                    {{ $alljobs->links('vendor.pagination.default') }}
                        
                    </div>
                </div>
                @else
                    <div class="col-lg-8">
                        <section class="no-results not-found">
                            <header class="page-header">
                                <h1 >Nothing Found</h1>
                            </header>
                            <div class="page-content">
                                <p>Content not added yet !!</p>
                            </div>
                        </section>
                    </div>
                @endif
                <aside class="col-lg-4 sidebar">
                    @include('frontend.pages.jobs.index_sidebar')            

                   
                </aside>
            </div>
        </div>
    </section>
    <!-- sidebar-page-container end -->
@endsection
