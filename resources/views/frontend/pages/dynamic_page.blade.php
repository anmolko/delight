@extends('frontend.layouts.master')
@section('title') {{ucwords(@$page_detail->name)}}  @endsection
@section('styles')
    <style>
        .tel{
            color: #fff;
        }
        .sec-title h2 {
            padding-bottom: 10px;
        }

        .text > p{
            font-size: 18px;
            font-weight: 500;
        }

        .career-section ul li, ol li {
            position: relative;
            font-size: 18px;
            font-weight: 400;
            margin-bottom: 10px;
        }

        .career-section ul li:before, ol li:before{
            content: "\f00c";
            color: #fd4a36;
            line-height: inherit;
            font-family: 'Font Awesome 5 Pro';
            font-weight: 900;
            display: inline-block;
            font-variant: normal;
            text-rendering: auto;
            margin-right: 8px;
            font-size: 15px;
        }

        .process-section-four{
            background-color: #13182b;
        }

        .faq-section-two{
            padding: 50px 0 70px;
        }

        .owl-carousel .owl-item .slider-list-image img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .service-block-three .image.slider-list-image {
            height: 300px;
        }

        .text .media {
            display: block;
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
                        <h1>{{ucwords(@$page_detail->name)}}</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="/">Home</a></li>
                        <li>{{ucwords(@$page_detail->name)}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Title -->

    @foreach($sorted_sections as $key=>$value)

        @if($value == "basic_section")
            <!-- About Section Seven -->
            <section class="about-section-seven">
            <div class="auto-container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="image-block">
                            <div class="image-box"><img class="lazy-image owl-lazy" src="{{asset('assets/frontend/images/resource/image-spacer-for-validation.png')}}" data-src="{{asset('images/uploads/section_elements/basic_section/'.@$basic_elements->image)}}" alt=""></div>
                            <div class="shape-one"><img src="{{asset('assets/frontend/images/shape/shape-19.png')}}" alt=""></div>
                            <div class="shape-two"><img src="{{asset('assets/frontend/images/shape/shape-20.png')}}" alt=""></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="sec-title">
                            <h2>{{@$basic_elements->heading}}</h2>
                            <div class="text-decoration">
                                <span class="left"></span>
                                <span class="right"></span>
                            </div>

                        </div>
                        <div class="text-block">
                            <div class="text">{!!  @$basic_elements->description !!}</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif

        @if($value == "call_to_action_1")

            <!-- CTA Section Two -->
            <section class="cta-section-two mb-4" style="background-image: url({{asset('assets/frontend/images/background/bg-5.jpg')}});">
            <div class="auto-container">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <h2><span class="flaticon-team"></span>{{@$call1_elements->heading}}</h2>
                    </div>
                    <div class="col-lg-5">
                        <div class="wrapper-box">
                            <div class="contact-info">
                                <div class="icon"><span class="flaticon-call-1"></span></div>
                                <h4><a class="tel" href="tel:{{@$call1_elements->subheading}}">{{@$call1_elements->subheading}}</a> </h4>
                                <div class="text"><a class="tel" href="mailto:{{@$call1_elements->description}}">{{@$call1_elements->description}}</a></div>
                            </div>
                            <a href="{{@$call1_elements->button_link}}" class="theme-btn btn-style-four"><span class="btn-title">{{@$call1_elements->button}}</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif

        @if($value == "call_to_action_2")
        <section class="timeline-section" style="padding: 100px 0 45px 70px;">
            <div class="sec-bg" style="background-image: url({{asset('assets/frontend/images/background/bg-6.jpg')}});"></div>
            <div class="auto-container">
                <div class="sec-title text-center light">
                    <h2>{{@$call2_elements->heading}}</h2>
                    <div class="text-decoration">
                        <span class="left"></span>
                        <span class="right"></span>
                    </div>
                    <button class="theme-btn btn-style-one" style="margin-top: 20px;"><span class="btn-title">START HERE</span></button>
                </div>

            </div>
        </section>
        @endif

        @if($value == "simple_tab_list")
            <section class="services-details">
            <div class="auto-container">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>{{ucwords(@$bgimage_elements[0]->heading)}}</h2>
                        <div class="text"></div>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="nav nav-tabs tab-btn-style-one mr-md-4" role="tablist">
                                    @foreach(@$bgimage_elements as $key=>$value)
                                    <li class="nav-item">
                                        <a class="nav-link {{(@$key==0 ) ? 'active':''}}" id="price-tab-{{@$key}}-area" data-toggle="tab" href="#price-tab-{{@$key}}" role="tab" aria-controls="price-tab-{{@$key}}" aria-selected="{{(@$key==0 ) ? 'true':'false'}}">
                                            0{{@$key+1}}. {{@$value->list_header}}
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <!-- Tab panes -->
                                <div class="tab-content wow fadeInUp animated" data-wow-delay="200ms" data-wow-duration="1200ms" style="visibility: visible; animation-duration: 1200ms; animation-delay: 200ms; animation-name: fadeInUp;">
                                    @foreach(@$bgimage_elements as $key=>$value)
                                        <div class="tab-pane fadeInUp animated {{(@$key==0 ) ? 'active':''}}" id="price-tab-{{@$key}}" role="tabpanel" aria-labelledby="price-tab-{{@$key}}">
                                            <h4>{{@$value->subheading}}</h4>
                                            <div class="text">{{@$value->list_description}}</div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        @endif

        @if($value == "simple_header_and_description")
            <section class="career-section">
                <div class="auto-container">
                    <div class="sec-title text-center">
                        <h2>{{$header_descp_elements->heading}}</h2>
                        <div class="text-decoration">
                            <span class="left"></span>
                            <span class="right"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="text" style="font-size: 18px!important; font-weight: 500;">
                           {!! $header_descp_elements->description !!}
                        </div>
                    </div>

                </div>
            </section>
        @endif

        @if($value == "flash_cards")
            <section class="process-section-four">
            <div class="auto-container">
                <div class="row">
                    @foreach($flash_elements as $key=>$flash)
                    <div class="col-lg-4 process-block-four">
                        <div class="inner-box">
                            <?php if($key == 0){$icon = 'icon-29.png';}elseif ($key == 1){$icon = 'icon-28.png';}else{$icon = 'icon-30.png';} ?>
                            <div class="icon" style="background: transparent;"><img src="{{asset('assets/frontend/images/icons/'.$icon)}}" alt=""></div>
                            <h4>{{ucwords(@$flash->list_header)}}</h4>
                            <div class="text">{{@$flash->list_description}}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="bottom-text">Interested to Know more? <a href="/about-us">see here <i class="fa fa-caret-right"></i></a>  </div>
            </div>
        </section>
        @endif

        @if($value == "accordion_section_1")
            <!-- Faq Section Four -->
            <section class="faq-section-four">
                <div class="auto-container">
                    <div class="sec-title text-center">
                        <h2 style="margin: auto; width: 60%; word-wrap: break-word;">{{ucwords(@$accordian1_elements[0]->heading)}}</h2>
                        <div class="text mb-4 mt-2" style="color: inherit; margin: auto; width: 80%; word-wrap: break-word;">
                            {{@$accordian1_elements[0]->description}}
                        </div>
                        <div class="text-decoration">
                            <span class="left"></span>
                            <span class="right"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8 offset-lg-2">
                            <ul class="accordion-box style-two mb-30">
                                <!--Accordion Block-->
                                @foreach(@$accordian1_elements as $key=>$value)
                                    <li class="accordion block">
                                        <div class="acc-btn {{($key == 0) ? 'active':''}}"><div class="icon-outer"><span class="icon icon_plus flaticon-right"></span> <span class="icon icon_minus flaticon-right"></span></div>
                                            {{($key+1 < 10) ? "0":''}}{{$key+1}}. {{ucwords($value->list_header)}}</div>
                                        <div class="acc-content {{($key == 0) ? 'current':''}}">
                                            <div class="content">
                                                <div class="text">
                                                    {!! ucfirst(@$value->list_description) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        @if($value == "accordion_section_2")
            <!-- Faq Section -->
            <section class="faq-section-two">
                <div class="auto-container">
                    <div class="top-content text-center">
                        <div class="icon"><img src="{{asset('assets/frontend/images/icons/icon-40.png')}}" alt=""></div>
                        <h2>{{ucwords(@$accordian2_elements[0]->heading)}}</h2>
                        <div class="text mb-5" style="color: inherit; margin: auto; width: 80%; word-wrap: break-word;"> {{@$accordian2_elements[0]->description}}</div>
                    </div>

                    <div class="row">
                        @foreach(@$accordian2_chunks as $key=>$chunks)

                            <div class="col-lg-6">
                                <ul class="accordion-box style-two mb-30">
                                    <!--Accordion Block-->
                                    @foreach($chunks as $secondkey=>$chunk)
                                    <li class="accordion block">
                                        <div class="acc-btn {{($secondkey == 0 || $secondkey == 3) ? 'active':''}}"><div class="icon-outer"><span class="icon icon_plus flaticon-right"></span> <span class="icon icon_minus flaticon-right"></span></div>
                                            {{($secondkey+1 < 10) ? "0":''}}{{$secondkey+1}}.  {{ucwords(@$chunk->list_header)}}</div>
                                        <div class="acc-content {{($secondkey == 0 || $secondkey == 3) ? 'current':''}}">
                                            <div class="content">
                                                <div class="text">{!! ucfirst(@$chunk->list_description) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

        @endif

        @if($value == "slider_list")
            <!-- Features Section Five -->
            <section class="services-section-three">
                <div class="auto-container">
                    <div class="sec-title style-four">
                        <h2>{{ucwords(@$slider_list_elements[0]->heading)}}</h2>
                        <span class="text-decoration-two"></span>
                    </div>
                    <div class="row">
                        <!--Theme Carousel-->
                        <div class="theme_carousel owl-theme owl-carousel" data-options='{"loop": true, "margin": 0, "autoheight":true, "lazyload":true, "nav": true, "dots": true, "autoplay": false, "autoplayTimeout": 6000, "smartSpeed": 300, "responsive":{ "0" :{ "items": "1" }, "600" :{ "items" : "2" }, "768" :{ "items" : "2" } , "1075":{ "items" : "3" }, "1200":{ "items" : "3" }}}'>
                            @for ($i = 1; $i <=@$list_3; $i++)
                                <div class="service-block-three">
                                    <div class="inner-box">
                                        <div class="image slider-list-image"><img src="{{ asset('/images/uploads/section_elements/list_1/'.@$slider_list_elements[$i-1]->list_image) }}" alt="{{@$slider_list_elements[$i-1]->subheading}}"></div>
                                        <div class="content">
                                            <h4>{{ucwords(@$slider_list_elements[$i-1]->list_header)}}</h4>
                                            <div class="icon"><span class="flaticon-question"></span></div>
                                            <a href="{{route('slider.single',@$slider_list_elements[$i-1]->subheading)}}" class="read-more-link">Read More <i class="fa fa-caret-right"></i></a>
                                        </div>
                                        <div class="overlay-content">                                
                                            <div class="content-wrapper">
                                                <div class="icon-box">
                                                    <div class="icon"><span class="flaticon-question"></span></div>
                                                    <h4>{{ucwords(@$slider_list_elements[$i-1]->list_header)}}</h4>
                                                </div>
                                                <div class="outer-box">
                                                    <div class="text">{{ucfirst(Str::limit(@$slider_list_elements[$i-1]->list_description, 75))}}...</div>
                                                    <a href="{{route('slider.single',@$slider_list_elements[$i-1]->subheading)}}" class="read-more-link">Read More <i class="fa fa-caret-right"></i></a>
                                                </div>         
                                            </div>
                                        </div>                            
                                    </div>
                                </div>
                            @endfor
                           
                        </div>
                    </div>                
                </div>
            </section>
        @endif
    @endforeach




@endsection
@section('js')


<script  src="{{asset('assets/frontend/js/bootstrap.min.js')}}"></script>
@endsection
