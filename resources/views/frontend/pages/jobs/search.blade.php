@extends('frontend.layouts.master')
@section('title') Search - Jobs @endsection
@section('styles')
    <style>

    </style>
@endsection
@section('content')
    <!-- Page Title -->
    <section class="page-title" style="background-image: url('{{asset('assets/frontend/images/background/7.jpg')}}');">
        <div class="auto-container">
            <div class="content-box">
                <div class="content-wrapper">
                    <div class="title">
                        <h1>{{$title}} </h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="/">Home</a></li>
                        <li><a href="{{url('/jobs')}}">Jobs</a></li>
                        <li>Search Result </li>

                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Title -->


    <!-- News Section -->
    <section class="news-section">
        <div class="auto-container">
            <div class="row clearfix">

                <div class="content-side col-lg-8 order-2">
                    <div class="row ">
                        <!-- News Block -->
                        @if(count($alljobs) > 0)
                            @foreach($alljobs as $job)

                            <div class="news-block col-md-6 ">
                                <div class="inner-box">
                                    <div class="image-box">
                                        <figure class="image">
                                            <a href="{{route('job.single',@$job->slug)}}">
                                                <img src="{{ ($job->image !== null) ? asset('/images/uploads/jobs/'.@$job->image): asset('assets/frontend/images/delight.png')}}" alt="{{@$job->slug}}"></a>
                                        </figure>
                                    </div>
                                    <div class="lower-content">
                                        <div class="post-date"><span class="far fa-calendar"></span> {{date('M j, Y',strtotime(@$job->start_date))}} - {{date('M j, Y',strtotime(@$job->end_date))}}</div>
                                        <ul class="post-info">
                                            <li><a
                                                    href="{{route('job.single',@$job->slug)}}">{{ucwords(@$job->getJobCategories(@$job->category_ids))}}</a>
                                            </li>
                                        </ul>
                                        <h4><a href="{{route('job.single',@$job->slug)}}">{{ucwords($job->name)}}</a></h4>
                                        @if($job->formlink)
                                            <div class="btn-box"><a href="{{@$job->formlink}}" class="read-more">Apply Now <span class="fa fa-arrow-right"></span></a></div>
                                        @else
                                            <div class="btn-box"><a href="{{route('job.single',@$job->slug)}}" class="read-more">Read More<span class="fa fa-arrow-right"></span></a></div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <section class="no-results not-found">
                                <header class="page-header">
                                    <h1 >Nothing Found</h1>
                                </header>
                                <div class="page-content">
                                    <p>It seems we cannot find what you are looking for.</p>
                                </div>
                            </section>
                        @endif


                    </div>
                    <div class="styled-pagination text-center">

                        {{ $alljobs->links('vendor.pagination.default') }}
                    </div>
                </div>
                <!--Sidebar Side-->
                <div class="sidebar-side col-lg-4 ">
                    @include('frontend.pages.jobs.index_sidebar')


                </div>

            </div>
        </div>
    </section>
    <!--End News Section Two -->
@endsection
