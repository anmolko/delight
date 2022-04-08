@extends('frontend.layouts.master')
@section('title') Contact Us @endsection
@section('styles')
<style>
    .contact-info-block .inner {
        height: 176px;
    }

    .contact-form .form-group textarea {
        height: 140px;
        resize: vertical;
    }
</style>

@endsection
@section('content')

    <!--Page Title-->
    <section class="page-title" style="background-image:url('{{asset('assets/frontend/images/background/7.jpg')}}');">
        <div class="auto-container clearfix">
            <h1>Contact Us</h1>
            <ul class="bread-crumb clearfix">
                <li><a href="/">Home</a></li>
                <li>Contact</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

        <!-- Contact Section -->
        <section class="contact-section" id="contact">
        <div class="auto-container">
            <div class="upper-box">
                <h2>Write us a Message !</h2>
                <div class="text"> We'd love to hear your thoughts & answer any questions you may have!</div>
            </div>
            <div class="row clearfix">
                <!-- Form Column -->
                <div class="form-column col-lg-6 col-md-12 col-sm-12 order-2">
                    <div class="inner-column">
                        <div class="contact-form">
                            <form method="post" action="{{route('contact.store')}}" >
                            @csrf
                                <div class="response">
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
                                </div>

                                <div class="form-group">
                                    <input type="text" name="fullname" class="fullname" placeholder="Your Name *" required oninvalid="this.setCustomValidity('Enter you full name')" oninput="this.setCustomValidity('')">
                                </div>

                                <div class="form-group">
                                    <input type="email" name="email" class="email" placeholder="Your Email *" required oninvalid="this.setCustomValidity('Enter your email')" oninput="this.setCustomValidity('')">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="subject" class="subject" placeholder="Your Subject *" required oninvalid="this.setCustomValidity('Enter a subject')" oninput="this.setCustomValidity('')">
                                </div>
                                
                                <div class="form-group">
                                    <textarea name="message" class="message" placeholder="Text Message *" required oninvalid="this.setCustomValidity('Type a message')" oninput="this.setCustomValidity('')"></textarea>
                                </div>
                                
                                <div class="form-group">
                                    <button class="theme-btn btn-style-two" type="submit"  ><span class="btn-title">Submit Now</span> </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Contact Column -->
                <div class="contact-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="row no-gutters">
                            <div class="contact-info-block col-lg-6 col-md-6 col-sm-12">
                                <div class="inner">
                                    <span class="icon flaticon-worldwide"></span> 
                                    <h4>Address</h4>
                                    <p>@if(!empty(@$setting_data->address)) {{@$setting_data->address}} @else Kathmandu, Nepal @endif</p>
                                </div>
                            </div>

                            <div class="contact-info-block col-lg-6 col-md-6 col-sm-12">
                                <div class="inner">
                                    <span class="icon flaticon-phone"></span> 
                                    <h4>Call Us</h4>
                                    <p><a href="tel:@if(!empty(@$setting_data->mobile)) {{@$setting_data->mobile}} @endif">@if(!empty(@$setting_data->mobile)) {{@$setting_data->mobile}} @endif</a></p>
                                    <p><a href="tel:@if(!empty(@$setting_data->phone)) {{@$setting_data->phone}} @endif">@if(!empty(@$setting_data->phone)) {{@$setting_data->phone}} @endif</a></p>
                                </div>
                            </div>

                            <div class="contact-info-block col-lg-6 col-md-6 col-sm-12">
                                <div class="inner">
                                    <span class="icon flaticon-email"></span> 
                                    <h4>Mail Us</h4>
                                    <p><a href="mailto:@if(!empty(@$setting_data->email)) {{@$setting_data->email}} @else example@gmail.com @endif">@if(!empty(@$setting_data->email)) {{@$setting_data->email}} @else example@gmail.com @endif</a></p>
                                </div>
                            </div>

                            <div class="contact-info-block col-lg-6 col-md-6 col-sm-12">
                                <div class="inner">
                                    <span class="icon flaticon-clock"></span> 
                                    <h4>Time Table</h4>
                                    <p>Sun - Sat: 9 AM to 5 PM</p>
                                    <p>Saturday - Close</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Contact Section -->

    <!-- Map Section -->
    <section class="map-section">
        <div class="map-outer">
        <iframe frameborder="0" width="100%" height="450px"scrolling="no" marginheight="0" marginwidth="0" src="{{@$setting_data->google_map}}"
                                                                                    title="%3$s" aria-label="%3$s"></iframe>
        </div>
    </section>
    <!-- End Map Section -->


  
@endsection

