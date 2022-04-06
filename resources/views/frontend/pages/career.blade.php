@extends('frontend.layouts.master')
@section('title') Career @endsection
@section('styles')
<style>
 
</style>

@endsection
@section('content')

    <!-- Page Title -->
    <section class="page-title" style="background-image: url({{asset('assets/frontend/images/background/bg-17.jpg')}});">
        <div class="auto-container">
            <div class="content-box">
                <div class="content-wrapper">
                    <div class="title">
                        <h1>Job Opening</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="/">Home</a></li>
                        <li>Careers</li>
                    </ul>
                </div>                    
            </div>
        </div>
    </section>
    <!-- Page Title -->

        <!-- Career Section -->
        <section class="career-section">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2>We encourage all candidates <br> to seek opportunities for employment</h2>
                <div class="text-decoration">
                    <span class="left"></span>
                    <span class="right"></span>
                </div>
            </div>
            <div class="row">
                @if(count(@$careers) > 0)
                    @foreach(@$careers as $career)
                    <div class="career-block col-lg-3 col-md-6">
                        <div class="inner-box">
                            @if(@$career->name == "full_time")
                                <div class="time">Full time</div>
                            @else
                                <div class="time">Part time</div>
                            @endif
                            <h4>{{ucwords(@$career->name)}}</h4>

                            <a href="{{@$career->from_link}}" class="theme-btn btn-style-one">
                                <span class="btn-title">Apply Now</span>
                            </a>
                            <ul class="list">
                                <li><a href="#"><i class="flaticon-suitcase"></i>{{@$career->open_position}} Open Position</a></li>
                                <li><a href="#"><i class="flaticon-clock-2"></i>Apply until {{date('M j, Y',strtotime(@$career->end_date))}}</a></li>
                                @if(@$career->salary)
                                    <li><a href="#"><i class="flaticon-money"></i>Package: {{@$career->salary}}</a></li>
                                    @else
                                    <li><a href="#"><i class="flaticon-money"></i>Package: Negotiable</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    @endforeach
                @endif
                
            </div>
        </div>
    </section>

        <!-- Meet Up Section -->
    <section class="meet-up-section" style="background-image: url({{asset('assets/frontend/images/background/bg-10.jpg')}});">
        <div class="auto-container">
            <div class="content-box">
                <div class="icon"><span class="flaticon-team-1"></span></div>
                <h3>Start Here</h3>
                <h1>Get in touch with Us</h1>
                <div class="text">@if(!empty(@$setting_data->address)) {{@$setting_data->address}} @else Kathmandu, Nepal @endif</div>
                <ul>
                    <li><a href="tel:+@if(!empty(@$setting_data->phone)) {{@$setting_data->phone}} @endif"><i class="flaticon-phone"></i>@if(!empty(@$setting_data->phone)) {{@$setting_data->phone}} @endif</a></li>
                    <li><a href="mailto:@if(!empty(@$setting_data->email)) {{@$setting_data->email}} @else example@gmail.com @endif"><i class="flaticon-mail-1"></i>@if(!empty(@$setting_data->email)) {{@$setting_data->email}} @else example@gmail.com @endif</a></li>
                </ul>
                <div class="link-btn"><a href="{{route('contact')}}" class="theme-btn btn-style-two"><span class="btn-title">Contact Us <i class="flaticon-right"></i></span></a></div>
            </div>
        </div>
    </section>
@endsection