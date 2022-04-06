@extends('frontend.layouts.master')
@section('title') 404 Page | White Pearl @endsection
@section('content')

<div class="error-section">
        <div class="auto-container">
            <div class="text-center">
                <div class="image"><img src="{{asset('assets/frontend/images/resource/404.png')}}" alt="404"></div>
                <div class="content">
                    <h1>Page is not found</h1>
                    <div class="text">We're not being able to find the page you're looking for</div>
                    <div class="link-btn"><a href="/" class="theme-btn btn-style-one"><span class="btn-title">BACK TO HOME</span></a></div>
                </div>
            </div>
        </div>
    </div>

@endsection
