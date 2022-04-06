@extends('frontend.layouts.master')
@section('title') Contact Us @endsection
@section('styles')
<style>
  .contact-section .author-box {
    padding-left: 0px;
   
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
                        <h1>Get in touch</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="/">Home</a></li>
                        <li>Contact </li>
                    </ul>
                </div>                    
            </div>
        </div>
    </section>
    <!-- Page Title -->

    <!-- Contact Details Section Two -->
    <section class="contact-details-section-two">
        <div class="auto-container">
            <div class="sec-title text-center">
                <h2>We’d love to help you</h2>
                <div class="text">Please feel free to get in touch using the form below. We'd love to hear your <br> thoughts & answer any questions you may have!</div>
                <div class="text-decoration">
                    <span class="left"></span>
                    <span class="right"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 contact-info-block-two">
                    <div class="inner-box">
                        <div class="icon"><img src="{{asset('assets/frontend/images/icons/icon-50.png')}}" alt=""></div>
                        <h4>Address</h4>
                        <ul>
                            <li>@if(!empty(@$setting_data->address)) {{@$setting_data->address}} @else Kathmandu, Nepal @endif</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 contact-info-block-two">
                    <div class="inner-box">
                        <div class="icon"><img src="{{asset('assets/frontend/images/icons/icon-51.png')}}" alt=""></div>
                        <h4>Call us on</h4>
                        <ul>
                            <li><a href="tel:@if(!empty(@$setting_data->phone)) {{@$setting_data->phone}} @endif">@if(!empty(@$setting_data->phone)) {{@$setting_data->phone}} @endif</a> </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 contact-info-block-two">
                    <div class="inner-box">
                        <div class="icon"><img src="{{asset('assets/frontend/images/icons/icon-52.png')}}" alt=""></div>
                        <h4>Mail at</h4>
                        <ul>
                            <li><a href="mailto:@if(!empty(@$setting_data->email)) {{@$setting_data->email}} @else example@gmail.com @endif">@if(!empty(@$setting_data->email)) {{@$setting_data->email}} @else example@gmail.com @endif</a></li>
                        </ul>
                    </div>
                </div>
            </div> 
        </div>
    </section>

    <!-- Contact Section Style Five -->
    <section class="contact-section style-five">
        <div class="auto-container">
            <div class="row m-0">
                <div class="col-lg-6 left-column" style="background-image: url({{asset('assets/frontend/images/background/bg-22.jpg')}});">
                    <div class="inner-container">
                        <div class="wrapper-box">
                            <div class="sec-title light">
                                <h2>New case? <br> Send message us</h2>
                                <div class="text-decoration">
                                    <span class="left"></span>
                                    <span class="right"></span>
                                </div>
                                <div class="text">Just send us your questions or concerns!</div>
                            </div>
                            <div class="author-box">
                                <h4>Have a Question?</h4>
                                <div class="phone-numer">@if(!empty(@$setting_data->mobile)) {{@$setting_data->mobile}} @endif</div>
                            </div>
                            <ul class="list">
                                <li>Sunday - Friday:</li>
                                <li>9.00 am - 5.00 pm</li>
                                <li>Saturday  (Closed)</li>
                            </ul>
                        </div> 
                    </div>                                               
                </div>
                <div class="col-lg-6 right-column" style="background-image: url({{asset('assets/frontend/images/background/bg-23.jpg')}});">
                    <div class="inner-container">
                        <div class="contact-form-box">
                            <form method="post" action="{{route('contact.store')}}" class="contact-form">
                            @csrf

                                <div class="row">
                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success alert-block">
                                            <strong class="sent-success">{{ $message }}</strong>
                                        </div>
                                    @endif
                                    @if ($message = Session::get('error'))
                                        <div class="alert alert-danger alert-block">
                                            <strong class="error-sent">{{ $message }}</strong>
                                        </div>
                                    @endif

                                    <div class="col-md-12 form-group">
                                        <input type="text" placeholder="Full Name *" name="fullname" required oninvalid="this.setCustomValidity('Enter you full name')" oninput="this.setCustomValidity('')">
                                    </div>
                                    
                                    <div class="col-md-6 form-group">
                                        <input type="email" name="email" placeholder="Email *"  required oninvalid="this.setCustomValidity('Enter your email')" oninput="this.setCustomValidity('')">
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <input type="text" name="subject" placeholder="Subject *"  required oninvalid="this.setCustomValidity('Enter a subject')" oninput="this.setCustomValidity('')">
                                    </div>
                                

                                    <div class="col-md-12 form-group">
                                        <textarea name="message" placeholder="Your message *" required oninvalid="this.setCustomValidity('Type a message')" oninput="this.setCustomValidity('')"></textarea>
                                    </div>
            
                                    <div class="col-md-12 form-group">
                                        <button class="theme-btn btn-style-one" type="submit" name="submit-form"><span class="btn-title">Send Message</span></button>
                                    </div>
                                </div>
                            </form>
                        </div>                            
                    </div>                        
                </div>
            </div>
        </div>
    </section>

        <!-- Map Section -->
        <section class="map-section-two">
        <!--Map Outer-->
        <div class="map-outer">
                <iframe frameborder="0" width="100%" height="450px"scrolling="no" marginheight="0" marginwidth="0" src="{{@$setting_data->google_map}}"
                                                                                    title="%3$s" aria-label="%3$s"></iframe>
        </div>
    </section>
@endsection
