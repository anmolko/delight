
<div class="service-sidebar">
    <div class="widget widget_categories_two">
        <div class="widget-content">
            @if(!empty($slider_lists))
            <ul class="categories-list clearfix">
                @foreach(@$slider_lists as $slider)
                <li><a class="@if(Request::url() === url('/slider-list/'.$slider->subheading)) active @endif" href="{{url('/slider-list/'.$slider->subheading)}}" >{{ucwords(@$slider->list_header)}}<span></span></a></li>
                @endforeach
            </ul>
            @endif
              
        </div>
    </div>
    
    <div class="widget widget_contact" style="background-image: url({{asset('assets/frontend/images/background/bg-25.jpg')}});">
        <div class="widget-content">
            <img src="{{asset('assets/frontend/images/icons/icon-55.png')}}" alt="">
            <h4>Do you need any help?</h4>
            <div class="phone-number"><a href="tel:@if(!empty(@$setting_data->phone)) {{@$setting_data->phone}} @endif">@if(!empty(@$setting_data->phone)) {{@$setting_data->phone}} @endif</a></div>
            <div class="email"><a href="mailto:@if(!empty(@$setting_data->email)) {{@$setting_data->email}} @else example@gmail.com @endif">@if(!empty(@$setting_data->email)) {{@$setting_data->email}} @else example@gmail.com @endif</a></div>
            <div class="link-btn"><a href="{{route('contact')}}" class="theme-btn btn-style-one">
                <span class="btn-title">Contact Us</span>
            </a></div>
        </div>
    </div>
</div>