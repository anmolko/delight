@extends('frontend.layouts.master')
@section('title') Team  @endsection
@section('styles')
<style>

</style>

@endsection
@section('content')
<!-- Page Title -->

    <!--Page Title-->
    <section class="page-title" style="background-image:url('{{asset('assets/frontend/images/background/7.jpg')}}');">
        <div class="auto-container clearfix">
            <h1>Our Team</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="/">Home</a></li>
                <li>Team</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Team Section -->
    <section class="team-section">
        <div class="auto-container">
            <div class="row">
                <!-- Team Block -->
                @if(count(@$teams) > 0)
                    @foreach($teams as $team)
                    <div class="team-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                        <div class="image-box">
                            <figure class="image"><img src="<?php if(@$team->image){?>{{asset('/images/uploads/teams/'.@$team->image)}}<?php }else{ echo asset('/images/uploads/default-team.jpg'); }?>" alt="{{ucwords(@$team->name)}}"></figure>
                            <div class="info-box">
                                <h6 class="name">{{ucwords(@$team->name)}}</h6>
                                <span class="designation">{{ucwords(@$team->post)}}</span>
                                <ul class="social-links">
                                  
                                    @if(!empty(@$team->fb))
                                        <li><a href="{{@$team->fb}}" target="_blank"><span class="fab fa-facebook-f"></span></a></li>
                                    @endif
                                    @if(!empty(@$team->twitter))
                                        <li><a href="{{@$team->twitter}}" target="_blank"><span class="fab fa-twitter"></span></a></li>
                                    @endif
                                    @if(!empty(@$team->insta))
                                        <li><a  href="{{@$team->insta}}"
                                                target="_blank"><i class="fab fa-instagram"></i></a>
                                        </li>
                                    @endif
                                    @if(!empty(@$team->linkedin))

                                        <li><a href="{{@$team->linkedin}}"
                                                target="_blank"><i
                                                    class="fab fa-linkedin"></i></a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!--End Team Section -->

<!-- Page Title -->
@endsection