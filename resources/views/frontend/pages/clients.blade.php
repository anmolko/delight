@extends('frontend.layouts.master')
@section('title') Clients @endsection
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

       <!-- Portfolio Section -->
       <section class="portfolio-section">
        <div class="auto-container">
            <!--Sortable Galery-->
            <div class="sortable-masonry">
                <!--Filter-->
                <div class="filters clearfix">
                    <ul class="filter-tabs filter-btns clearfix">
                        <li class="filter active" data-role="button" data-filter=".all">All Countries <span class="count">0</span></li>
                        @foreach(@$countrycodes as $country_c)
                            @foreach(@$countries as $key => $value)
                                @if($key== @$country_c->country)
                                    <li class="filter" data-role="button" data-filter=".{{@$country_c->country}}">{{ucwords($value)}} <span class="count">0</span></li>
                                @endif
                            @endforeach
                       @endforeach
                    </ul>
                </div>
                <div class="items-container row m-0 clearfix">
                    <!-- Case Block -->
                    @foreach(@$client_groups as  $client)

                    <div class="case-block-one masonry-item all {{@$client->country}} col-lg-3 col-md-6 col-sm-12">
                        <div class="inner-box">
                            <div class="image">
                                <a href="{{@$client->link}}" title="{{ucwords(@$client->name)}}" @if(@$client->link) target="_blank"  @endif ><img src="<?php if(@$client->image){?>{{asset('/images/uploads/clients/'.@$client->image)}}<?php }?>" alt="{{ucwords(@$client->name)}}"> </a>
                            </div>
                        
                        </div>
                    </div>
                    @endforeach

                </div>
                   
            </div>
        </div>
    </section>




@endsection

