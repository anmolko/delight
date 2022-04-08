<aside class="sidebar services-sidebar">
    <!-- Services Cat List -->
    <div class="sidebar-widget categories">
        @if(!empty($service_categories))
            <ul class="category-list">
                <li><a href="{{route('service.frontend')}}">All Services</a></li>
                @foreach(@$service_categories as $service_category)
                <li class="@if(Request::url() === url('/services/'.$service_category->slug)) active @endif"><a  href="{{url('/services/'.$service_category->slug)}}" >{{ucwords(@$service_category->name)}}</a></li>
                @endforeach
            </ul>
        @endif

    </div>

    <!-- Brochure -->
    <div class="sidebar-widget help-box">
        <div class="inner-box" style="background-image: url({{asset('assets/frontend/images/resource/help-bg.jpg')}});">
            <h6>Do you need any help ?</h6>
            <ul class="info-box">
                <li><span class="icon fa fa-envelope"></span> <a href="mailto:@if(!empty(@$setting_data->email)) {{@$setting_data->email}} @else example@gmail.com @endif">@if(!empty(@$setting_data->email)) {{@$setting_data->email}} @else example@gmail.com @endif</a></li>
                <li><span class="icon fa fa-phone"></span> <a href="tel:@if(!empty(@$setting_data->phone)) {{@$setting_data->phone}} @endif">@if(!empty(@$setting_data->phone)) {{@$setting_data->phone}} @endif</a></li>
            </ul>
            <a class="theme-btn btn-style-three" href="{{route('contact')}}"><span class="btn-title">Contact Us</span> </a>
        </div>
    </div>
</aside>