@extends('frontend.layouts.master')
@section('title') 404 Page @endsection
@section('content')

    <!--Page Title-->
    <section class="page-title" style="background-image:url('{{asset('assets/frontend/images/background/11.jpeg')}}');">
        <div class="auto-container clearfix">
            <h1>Error 404</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="/">Home</a></li>
                <li>Error 404</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!--Error Section-->
    <section class="error-section">
        <div class="auto-container">
            <div class="error-title">4<span>0</span>4</div>
            <div class="sec-title text-center"><h2>Page is not found</h2></div>
            <div class="text">Please try one of the following pages:</div>
            <a href="/" class="theme-btn btn-style-one"><span class="btn-title">Home Page</span> </a>
            <a href="{{route('contact')}}" class="theme-btn btn-style-one"><span class="btn-title">Contact Us</span> </a>
        </div>
    </section>
    <!--Error Section-->

@endsection
