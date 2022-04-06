@extends('frontend.layouts.master')
@section('title') Team  @endsection
@section('styles')
<style>

</style>

@endsection
@section('content')
<!-- Page Title -->

    <!-- Page Title -->
    <section class="page-title" style="background-image: url({{asset('assets/frontend/images/background/bg-17.jpg')}});">
        <div class="auto-container">
            <div class="content-box">
                <div class="content-wrapper">
                    <div class="title">
                        <h1>Team Members</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="/">Home</a></li>
                        <li>Team </li>
                    </ul>
                </div>                    
            </div>
        </div>
    </section>
    <!-- Page Title -->

    <!--  Team Section Five -->
    <section class="team-section-five">
        <div class="auto-container">
            <div class="row">
               
                @if(count(@$teams) > 0)
                    @foreach($teams as $team)
                    <div class="team-block-three col-lg-3 col-md-6">
                        <div class="inner-box">
                            <div class="image"><img src="<?php if(@$team->image){?>{{asset('/images/uploads/teams/'.@$team->image)}}<?php }else{ echo asset('/images/uploads/profiles/default-team.jpg'); }?>" alt=""></div>
                            <div class="content">
                                <div class="author-title">
                                    <h4>{{ucwords(@$team->name)}}</h4>
                                    <div class="designation">{{ucwords(@$team->post)}}</div>
                                </div>
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

<!-- Page Title -->
@endsection