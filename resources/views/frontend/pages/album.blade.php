@extends('frontend.layouts.master')
@section('title') Album @endsection
@section('styles')

<style>
 .case-block-one .overlay::after{
   display: none;
 }
</style>
@endsection
@section('content')
    <!-- Page Title -->
    <section class="page-title" style="background-image: url({{asset('assets/frontend/images/background/bg-17.jpg')}});">
        <div class="auto-container">
            <div class="content-box">
                <div class="content-wrapper">
                    <div class="title">
                        <h1>Album</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="/">Home</a></li>
                        <li>Album</li>
                    </ul>
                </div>                    
            </div>
        </div>
    </section>
    <!-- Page Title -->
    <!-- Portfolio Section -->
    <section class="portfolio-section">
        <div class="auto-container">
                <div class="items-container row clearfix">
                    <!-- Case Block -->
                    @if(count(@$albums) > 0)
                      @foreach($albums as $album)

                      <div class="case-block-one masonry-item  col-lg-4 col-md-6 col-sm-12">
                          <div class="inner-box">
                              <div class="image">
                                  <img src="{{asset('/images/uploads/albums/'.@$album->cover_image)}}" alt="{{@$album->name}}">
                              </div>
                              <div class="overlay">
                                  <div class="link-btn"><a href="{{route('album.gallery',$album->slug)}}"><i class="flaticon-right-arrow"></i></a></div>
                                  <div class="content">
                                      <h5>{{ucwords(@$album->name)}} ({{count(@$album->gallery)}})</h5>
                                  </div>
                              </div>
                          </div>
                      </div>
                      @endforeach
                    @endif

                   
                </div>
        </div>
    </section>

@endsection


