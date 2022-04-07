<!-- Main Footer -->
<footer class="main-footer" style="background-image: url({{asset('assets/frontend/images/background/12.png')}});">
    <div class="auto-container">
        <!--Widgets Section-->
        <div class="widgets-section">
            <div class="row">
                <!--Footer Column-->
                <div class="footer-column col-xl-4 col-lg-5 col-md-12 col-sm-12">
                    <div class="footer-widget about-widget">
                        <div class="footer-logo">
                            <figure class="image"><a href="#"><img src="<?php if(@$setting_data->logo_white){?>{{asset('/images/uploads/settings/'.@$setting_data->logo_white)}}<?php } ?>" alt="footer_logo"></a></figure>
                        </div>
                        <div class="widget-content">
                            <div class="text">@if(!empty(@$setting_data->website_description)) {{ucwords(@$setting_data->website_description)}} @else We have over 10 years of experience, We take pride in delivering Intelligent Designs for clients all over the World. @endif</div>
                            <ul class="contact-list">
                                <li><span class="fa fa-map-marker"></span>@if(!empty(@$setting_data->address)) {{ucwords(@$setting_data->address)}} @else Putalisadak, Kathmandu, Nepal @endif </li>
                                <li><span class="fa fa-envelope"></span> <a href="mailto:{{@$setting_data->email}}">@if(!empty(@$setting_data->email)) {{ucwords(@$setting_data->email)}} @else demo@email.com @endif</a></li>
                                <li><span class="fa fa-phone-volume"></span><a href="tel:{{@$setting_data->viber}}">@if(!empty(@$setting_data->viber)) {{ucwords(@$setting_data->viber)}} @else 987654321 @endif</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!--Footer Column-->
                <div class="footer-column col-xl-5 col-lg-7 col-md-12 col-sm-12">
                    <!--Footer Column-->
                    <div class="footer-widget links-widget">
                        <div class="row">
                            <div class="col-lg-7 col-md-6">
                                <h2 class="widget-title">Services</h2>
                                <!--Footer Column-->
                                <div class="widget-content">
                                    <ul class="list-style-two">
                                        <li><a href="#">All Services</a></li>
                                        <li><a href="#">General Carpentry</a></li>
                                        <li><a href="#">Furniture Remod..</a></li>
                                        <li><a href="#">Hang Paintings</a></li>
                                        <li><a href="#">Manufactur Furni..</a></li>
                                        <li><a href="#">Commercial work</a></li>
                                        <li><a href="#">Furniture Design</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-5 col-md-6">
                                <h3 class="widget-title">Useful Links</h3>
                                <!--Footer Column-->
                                <div class="widget-content">
                                    <ul class="list-style-two">
                                        @if(!empty($footer_nav_data))
                                            @foreach($footer_nav_data as $nav)
                                                @if(!empty($nav->children[0]))
                                                @else
                                                    @if($nav->type == 'custom')
                                                        <li>
                                                            <a href="{{$nav->slug}}"  @if($nav->target == NULL)  @else target="{{$nav->target}}" @endif>  @if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif</a></li>
                                                    @elseif($nav->type == 'post')
                                                        <li>
                                                            <a href="{{url('blog')}}/{{$nav->slug}}"> @if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif</a></li>
                                                    @else
                                                        <li>
                                                            <a href="{{url('/')}}/{{$nav->slug}}"> @if($nav->name == NULL) {{$nav->title}} @else {{$nav->name}} @endif</a></li>
                                                    @endif
                                                @endif
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Footer Column-->
                <div class="footer-column col-xl-3 col-lg-6 col-md-12 col-sm-12">
                    <div class="footer-widget subscribe-widget">
                        <h2 class="widget-title">Our Socials</h2>
                        <div class="widget-content">
                            <div class="text">Follow our social medias to connect with us better.</div>

                            <ul class="social-links">

                                @if(!empty(@$setting_data->facebook))
                                <li><a href="@if(!empty(@$setting_data->facebook)) {{@$setting_data->facebook}} @endif"><i class="fab fa-facebook-f"></i></a></li>
                                @endif
                                @if(!empty(@$setting_data->youtube))
                                <li><a href="@if(!empty(@$setting_data->youtube)) {{@$setting_data->youtube}} @endif"><i class="fab fa-youtube"></i></a></li>
                                @endif
                                @if(!empty(@$setting_data->instagram))
                                <li><a href="@if(!empty(@$setting_data->instagram)) {{@$setting_data->instagram}} @endif"><i class="fab fa-instagram"></i></a></li>
                                @endif
                                @if(!empty(@$setting_data->whatsapp))
                                <li><a href="https://wa.me/@if(!empty(@$setting_data->whatsapp)) {{@$setting_data->whatsapp}} @endif"><i class="fab fa-whatsapp"></i></a></li>
                                @endif
                                @if(!empty(@$setting_data->viber))
                                <li><a href="viber://chat?number=@if(!empty(@$setting_data->viber)) {{@$setting_data->viber}} @endif"><i class="fab fa-viber"></i></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Footer Bottom-->
    <div class="footer-bottom">
        <div class="auto-container">
            <div class="copyright-text">Copyrights 2022. All Rights are Reserved by <a href="/">Bold-touch</a></div>
        </div>
    </div>
</footer>
<!-- End Main Footer -->
</div>

<!-- Scroll To Top -->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>


<script src="{{asset('assets/frontend/js/jquery.js')}}"></script>
<script src="{{asset('assets/frontend/js/popper.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/frontend/js/jquery.fancybox.js')}}"></script>
<script src="{{asset('assets/frontend/js/owl.js')}}"></script>
<script src="{{asset('assets/frontend/js/isotope.js')}}"></script>
<script src="{{asset('assets/frontend/js/wow.js')}}"></script>
<script src="{{asset('assets/frontend/js/appear.js')}}"></script>
<script src="{{asset('assets/frontend/js/script.js')}}"></script>
<!-- Color Setting -->
<script src="{{asset('assets/frontend/js/color-settings.js')}}"></script>

</body>
</html>
