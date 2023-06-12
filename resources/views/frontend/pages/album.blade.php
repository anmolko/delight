@extends('frontend.layouts.master')
@section('title') Album @endsection
@section('styles')

<style>

</style>
@endsection
@section('content')

    <!--Page Title-->
    <section class="page-title" style="background-image:url('{{asset('assets/frontend/images/background/11.jpeg')}}');">
        <div class="auto-container clearfix">
            <h1>Album</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="/">Home</a></li>
                <li>Album</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Album Section -->
    <section class="projects-section-two">
        <div class="auto-container">

            <div class="items-container row">
                <!-- Portfolio Block -->
                @if(count(@$albums) > 0)
                    @foreach($albums as $album)
                        <div class="project-block-two  col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image"><img src="{{asset('/images/uploads/albums/'.@$album->cover_image)}}" alt="{{@$album->name}}"></figure>
                                </div>
                                <div class="overlay-box">
                                    <div class="overlay-inner">
                                        <h4>{{ucwords(@$album->name)}} ({{count(@$album->gallery)}})</h4>
                                        <div class="icon-box">
                                            <a href="{{asset('/images/uploads/albums/'.@$album->cover_image)}}"  class="lightbox-image" data-fancybox="gallery" ><span class="icon fa fa-expand-arrows-alt"></span></a>
                                            <a href="{{route('album.gallery',$album->slug)}}"><span class="icon fa fa-search"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>
    </section>
    <!-- End Album Section -->

@endsection


