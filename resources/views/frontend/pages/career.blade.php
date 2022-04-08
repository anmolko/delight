@extends('frontend.layouts.master')
@section('title') Career @endsection
@section('styles')
<style>
    .time {
        position: absolute;
        top: 20px;
        left: 20px;
        display: block;
        padding: 0 30px;
        font-size: 13px;
        font-weight: 600;
        text-transform: uppercase;
        border: 1px solid #e1e5e9;
        border-radius: 15px;
        margin-bottom: 10px;
    }

    .pricing-table .title {
        font-size: 22px;
        font-weight: 600;
        margin-top: 20px;
    }

    .pricing-table .table-content ul.list li{
        position: relative;
        font-size: 16px;
        font-weight: 500;
        border-bottom: 1px solid #e1e5e9;
        padding: 0px;
        padding-bottom: 10px;
        margin-bottom: 10px;
        padding-left: 27px;
    }

    .pricing-table .table-content ul.list{
        border-bottom: unset;
        margin-bottom: 0px;
    }

    .pricing-table .table-content ul.list li i {
        color: #84859c;
        position: absolute;
        left: 0;
        top: 0;
    }

    .pricing-table .table-content ul.list li a {
        color: #0c2957;
    } 
</style>

@endsection
@section('content')

    <!-- Page Title -->
    <section class="page-title" style="background-image: url({{asset('assets/frontend/images/background/7.jpg')}});">
        <div class="auto-container">
            <div class="content-box">
                <div class="content-wrapper">
                    <div class="title">
                        <h1>Job Opening</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="/">Home</a></li>
                        <li>Careers</li>
                    </ul>
                </div>                    
            </div>
        </div>
    </section>
    <!-- Page Title -->


    <!-- Career Sectioin -->
    <section class="pricing-section">
        <div class="auto-container">
           
            <!--Pricing Tabs-->
            <div class="pricing-tabs tabs-box clearfix">                    
      
                <div class="row">
                    <!-- Pricing Table -->
                    @if(count(@$careers) > 0)
                        @foreach(@$careers as $career)
                       
                        <div class="pricing-table col-lg-4 col-md-6 col-sm-12">
                            <div class="inner-box">
                                @if(@$career->type == "full_time")
                                    <div class="time">Full time</div>
                                @else
                                    <div class="time">Part time</div>
                                @endif
                                <div class="title">{{ucwords(@$career->name)}}</div>
                                
                                <div class="table-content">
                                    <ul class="list">
                                        <li><a href="#"><i class="fas fa-suitcase"></i>{{@$career->open_position}} Open Position</a></li>
                                        <li><a href="#"><i class="fas fa-clock"></i>Apply until {{date('M j, Y',strtotime(@$career->end_date))}}</a></li>
                                        @if(@$career->salary)
                                            <li><a href="#"><i class="fas fa-search-dollar"></i>Package: {{@$career->salary}}</a></li>
                                            @else
                                            <li><a href="#"><i class="fas fa-search-dollar"></i>Package: Negotiable</a></li>
                                        @endif
                                    </ul>
                                </div>
                                <div class="table-footer">
                                    <a href="{{@$career->from_link}}" class="theme-btn btn-style-one"><span class="btn-title">Apply Now</span> </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <section class="no-results not-found">
                            <header class="page-header">
                                <h1>Job Not Posted Yet !!</h1>
                            </header>
                            <div class="page-content">
                                <p>It seems we cannot find what you are looking for.</p>
                            </div>
                        </section>
                    @endif
                   
              
                </div>
              
            </div>
        </div>
    </section>
    <!-- End Career Section -->
@endsection