@extends('frontend.layouts.master')
@section('title') Clients @endsection
@section('styles')
<style>
   
 
</style>
@endsection
@section('content')

    <!-- Page Title -->
    <section class="page-title" style="background-image: url({{asset('assets/frontend/images/background/7.jpg')}});">
        <div class="auto-container">
            <div class="content-box">
                <div class="content-wrapper">
                    <div class="title">
                        <h1>Clients</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="/">Home</a></li>
                        <li>Clients</li>
                    </ul>
                </div>                    
            </div>
        </div>
    </section>
    <!-- Page Title -->

    <!-- Projects Section -->
    <section class="projects-section-two">
        <div class="auto-container">
            <!--Sortable Masonry-->
            <div class="sortable-masonry">
                <!--Filter-->
                <div class="filters">
                    <ul class="filter-tabs filter-btns clearfix">
                        <li class="active filter" data-role="button" data-filter=".all">All Countries</li>
                        @foreach(@$countrycodes as $country_c)
                            @foreach(@$countries as $key => $value)
                                @if($key== @$country_c->country)
                                    <li class="filter" data-role="button" data-filter=".{{@$country_c->country}}">{{ucwords($value)}} </li>
                                @endif
                            @endforeach
                       @endforeach
                    </ul>
                </div>
                                                            
                <div class="items-container row">
                    <!-- Portfolio Block -->
           
                    @foreach(@$client_groups as  $client)
                    
                    <div class="project-block-two all masonry-item {{@$client->country}} col-lg-2 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="image-box">
                                <figure class="image"><a href="{{@$client->link}}" target="_blank" title="{{ucwords(@$client->name)}}"><img src="<?php if(@$client->image){?>{{asset('/images/uploads/clients/'.@$client->image)}}<?php }?>" alt="{{ucwords(@$client->name)}}"></a></figure>
                            </div>
                            
                        </div>
                    </div>
                    @endforeach

                  
                </div>
            </div>
        </div>
    </section>
    <!-- End Projects Section -->



@endsection

