@extends('backend.layouts.master')
@section('title') Dashboard @endsection
@section('css')
<style>
    .blog-list-image{
        width: 34px;
        height: 34px;
    }
    .dash-card-container {
        display: block;
    }
</style>
@endsection
@section('content')
    <div class="col-xl-9 col-lg-8  col-md-12">
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="card dash-widget ctm-border-radius shadow-sm grow">
                    <div class="card-body">
                        <div class="card-icon bg-primary">
                            <i class="fa fa-users" aria-hidden="true"></i>
                        </div>
                        <div class="card-right">
                            <h4 class="card-title">Users</h4>
                            <p class="card-text">{{@$user_count}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6 col-12">
                <div class="card dash-widget ctm-border-radius shadow-sm grow">
                    <div class="card-body">
                        <div class="card-icon bg-warning">
                            <i class="fa fa-handshake-o"></i>
                        </div>
                        <div class="card-right">
                            <h4 class="card-title">Clients</h4>
                            <p class="card-text">{{@$client_count}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6 col-12">
                <div class="card dash-widget ctm-border-radius shadow-sm grow">
                    <div class="card-body">
                        <div class="card-icon bg-danger">
                            <i class="fa fa-files-o " aria-hidden="true"></i>
                        </div>
                        <div class="card-right">
                            <h4 class="card-title">Pages</h4>
                            <p class="card-text">{{@$page_count}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6 col-12">
                <div class="card dash-widget ctm-border-radius shadow-sm grow">
                    <div class="card-body">
                        <div class="card-icon bg-success">
                            <i class="fa fa-trophy" aria-hidden="true"></i>
                        </div>
                        <div class="card-right">
                            <h4 class="card-title">Awards</h4>
                            <p class="card-text">{{@$award_count}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-6">
                <div class="card ctm-border-radius shadow-sm grow">
                    <div class="card-header">
                        <h4 class="card-title mb-0 d-inline-block">Recent Pages</h4>
                        <a href="{{route('pages.index')}}" class="dash-card float-right mb-0 text-primary">Manage Pages </a>

                    </div>
                    <div class="card-body recent-activ">
                        <div class="recent-comment">
                                <div class="dash-card-container">

                                @if(count(@$latestPages) > 0)

                                    @foreach(@$latestPages as $index => $latest)

                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Page Name" value="{{ucwords(@$latest->name)}}" readonly>
                                                <div class="input-group-append">
                                                    <a class="btn btn-theme text-white" href="{{route('pages.edit',@$latest->id)}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                            <hr>

                                    @endforeach
                                @else

                                <p>There are no listed page found. You can start by add one from <a href="{{route('pages.create')}}">here.</a></p>

                                @endif

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 d-flex">

                <div class="card flex-fill team-lead shadow-sm grow">
                    <div class="card-header">
                        <h4 class="card-title mb-0 d-inline-block">Recent Users </h4>
                        <a href="{{route('user.index')}}" class="dash-card float-right mb-0 text-primary">Manage Users </a>
                    </div>
                    <div class="card-body">

                        @if(count(@$latestUsers) > 0)
                            @foreach(@$latestUsers as $index => $latest)
                                <div class="media mb-3">
                                    <div class="e-avatar avatar-online mr-3"><img src="<?php if(!empty(@$latest->image)){ echo '/images/uploads/profiles/'.@$latest->image; } else { if(@$latest->gender=="male") {echo '/images/uploads/profiles/male.png'; } elseif(@$latest->gender=="female") {echo '/images/uploads/profiles/female.png'; } elseif(@$latest->gender=="others") {echo '/images/uploads/profiles/other.png'; } } ?>" alt="{{@$user->name}}" class="img-fluid"></div>
                                    <div class="media-body">
                                        <h6 class="m-0"><a href="{{route('user.edit',@$latest->id)}}">{{ucwords(@$latest->name)}}</a> <span>| {{ucwords(@$latest->user_type)}}</span></h6>
                                        <p class="mb-0 ctm-text-sm">{{@$latest->email}}</p>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 d-flex">
                <div class="card shadow-sm grow ctm-border-radius flex-fill">
                    <div class="card-header">
                        <div class="d-inline-block">
                            <h4 class="card-title mb-0 ">Status </h4>
                            <p class="mb-0 ctm-text-sm">Company Status</p>
                        </div>
                        <div class="d-inline-block float-right" data-toggle="modal" data-target="#editStatus">
                            <a href="javascript:void(0)" class="btn btn-theme mt-2 text-white float-right ctm-border-radius" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-pencil"></i> </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 col-6 text-center">
                                <h5 class="btn btn-outline-primary mt-3"><b>@if(!empty(@$setting_data->customer_served)) {{@$setting_data->customer_served}} @else 0 @endif </b></h5>
                                <p class="mb-3">Customer Served</p>
                            </div>
                            <div class="col-md-6 col-6 text-center">
                                <h5 class="btn btn-outline-primary mt-3"><b>@if(!empty(@$setting_data->visa_approved)) {{@$setting_data->visa_approved}} @else 0 @endif</b></h5>
                                <p class="mb-3">Visa Approved</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-6 text-center">
                                <h5 class="btn btn-outline-primary mt-3"><b>@if(!empty(@$setting_data->success_stories)) {{@$setting_data->success_stories}} @else 0 @endif</b></h5>
                                <p class="mb-3">Success Stories</p>
                            </div>
                            <div class="col-md-6 col-6 text-center">
                                <h5 class="btn btn-outline-primary mt-3"><b>@if(!empty(@$setting_data->happy_customers)) {{@$setting_data->happy_customers}} @else 0 @endif</b></h5>
                                <p class="mb-3">Happy Customers</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 d-flex">

                <div class="card recent-acti flex-fill shadow-sm grow">
                    <div class="card-header">
                        <h4 class="card-title mb-0 d-inline-block">Recent Blogs</h4>
                        <a href="{{route('blogcategory.index')}}" class="dash-card float-right mb-0 text-primary">Manage Blogs </a>

                    </div>
                    <div class="card-body recent-activ admin-activ">
                        <div class="recent-comment">
                        @if(count(@$latestPosts) > 0)

                        @foreach(@$latestPosts as $index => $latest)

                        <?php
                            $created_by_id      = @$latest->created_by;
                            $user_name          = \App\Models\User::find($created_by_id)->name;
                            ?>
                            <div class="notice-board">
                                <div class="table-img">
                                    <div class="e-avatar mr-3"><img class="img-fluid blog-list-image" src="<?php if(@$latest->image){?>{{asset('/images/uploads/blog/'.@$latest->image)}}<?php }?>" alt="{{@$latest->title}}"></div>
                                </div>
                                <div class="notice-body">
                                    <h6 class="mb-0"><a href="{{route('blog.single',@$latest->slug)}}" target="_blank">{{ucwords(@$latest->title)}}</a></h6>
                                    <span class="ctm-text-sm">{{ucwords(@$user_name)}} | {{date('j F, Y',strtotime(@$latest->created_at))}}</span>
                                </div>
                            </div>
                            <hr>

                        @endforeach
                        @else

                        <p>There are no listed blog found. You can start by add one from <a href="{{route('blogcategory.index')}}">here.</a></p>
                        @endif

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @if($setting_data !== null)
    <!-- Edit Status Modal !-->
    <div class="modal fade" id="editStatus" role="document">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                {!! Form::open(['url'=>route('status.update', @$setting_data->id),'method'=>'PUT','class'=>'needs-validation updatestatus','novalidate'=>'','enctype'=>'multipart/form-data']) !!}

                <div class="modal-body style-add-modal">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title mb-3">Edit Company Status </h4>
                    <p class="text-danger mb-3">Minimum 100 on each field </p>
                    <div class="form-group">
                        <label>Customer Served <span class="text-muted text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <input class="form-control" type="number" min="100" name="customer_served" value="{{@$setting_data->customer_served}}" required>
                            <div class="invalid-feedback">
                                Please enter the customer served.
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Visa Approved <span class="text-muted text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <input class="form-control" type="number" min="100" name="visa_approved" value="{{@$setting_data->visa_approved}}" required>
                            <div class="invalid-feedback">
                                Please enter the visa approved.
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Success Stories <span class="text-muted text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <input class="form-control" type="number" min="100" name="success_stories"  value="{{@$setting_data->success_stories}}" required>
                            <div class="invalid-feedback">
                                Please enter the success stories.
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Happy Customers <span class="text-muted text-danger">*</span></label>
                        <div class="input-group mb-3">
                            <input class="form-control" type="number"  min="100" name="happy_customers" value="{{@$setting_data->happy_customers}}" required>
                            <div class="invalid-feedback">
                                Please enter the happy customers.
                            </div>
                        </div>
                    </div>

                    <button type="button" class="mb-3 btn btn-danger text-white ctm-border-radius float-right ml-3" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="mb-3 btn btn-theme ctm-border-radius text-white float-right button-1">Update</button>
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
    @endif

@endsection

@section('js')
<script type="text/javascript">


</script>

@endsection
