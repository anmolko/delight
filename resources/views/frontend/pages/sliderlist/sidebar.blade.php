<div class="sidebar-side col-lg-4 col-md-12 col-sm-12">
    <aside class="sidebar services-sidebar">
    @if(!empty($slider_lists))
        <div class="sidebar-widget categories">
            <ul class="category-list">
                <li><a href="{{url('/'.@$singleSlider->section->page->slug)}}">Go Back</a></li>
                @foreach(@$slider_lists as $slider)
                    <li class="@if(Request::url() === url('/slider-list/'.$slider->subheading)) active @endif"><a href="{{url('/slider-list/'.$slider->subheading)}}">{{ucwords(@$slider->list_header)}}</a></li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="sidebar-widget help-box">
        <div class="inner-box" style="background-image: url({{asset('assets/frontend/images/resource/help-bg.jpg')}});">
            <h6>Are you in need of our assistance?</h6>
            <ul class="info-box">
                <li><span class="icon fa fa-envelope text-white"></span>
                    <a href="mailto:@if(!empty(@$setting_data->email)) {{@$setting_data->email}} @else example@gmail.com @endif">@if(!empty(@$setting_data->email)) {{@$setting_data->email}} @else example@gmail.com @endif</a>
                </li>
                <li><span class="icon fa fa-phone text-white"></span>
                    <a href="tel:@if(!empty(@$setting_data->phone)) {{@$setting_data->phone}} @endif">@if(!empty(@$setting_data->phone)) {{@$setting_data->phone}} @endif</a>
                </li>
            </ul>
            <a class="theme-btn btn-style-three" href="{{route('contact')}}"><span class="btn-title">Contact Us</span></a>
        </div>
    </div>
    </aside>
</div>
