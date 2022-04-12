@extends('backend.layouts.master')
@section('title') Settings @endsection
@section('css')

    <style>
        /*for image*/
        .avatar-upload{
            max-width: 505px!important;
        }

        .default-image{
            border: 6px solid #f3f3f3;
            border-radius: 10px;
        }



        /*end for image*/


    </style>
@endsection
@section('content')
    <div class="col-xl-9 col-lg-8  col-md-12">
        <div class="card shadow-sm grow ctm-border-radius">
            <div class="card-body align-center">
                <ul class="nav flex-row nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item mr-2">
                        <a class="nav-link active mb-2" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">General Information</a>
                    </li>
                    @if(!empty($settings))

                        <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"> Images Information</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="pills-general-tab" data-toggle="pill" href="#pills-general" role="tab" aria-controls="pills-general" aria-selected="false">Homepage Welcome Section</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" id="pills-award-tab" data-toggle="pill" href="#pills-award" role="tab" aria-controls="pills-award" aria-selected="false">Award Section</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-statuses-tab" data-toggle="pill" href="#pills-statuses" role="tab" aria-controls="pills-statuses" aria-selected="false">Status Section</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" id="pills-brocher-tab" data-toggle="pill" href="#pills-brocher" role="tab" aria-controls="pills-brocher" aria-selected="false">Brocher Section</a>
                    </li>

                </ul>
            </div>
        </div>

        <div class="tab-content" id="v-pills-tabContent">

            <form action="#" method="post" id="deleted-form">
                {{csrf_field()}}
                <input name="_method" type="hidden" value="DELETE">
            </form>
            {{--All tab--}}
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                @if(!empty($settings))
                    {!! Form::open(['url'=>route('setting.update', @$settings->id),'method'=>'PUT','enctype'=>'multipart/form-data']) !!}
                @else

                    <form action="{{ route('setting.store') }}" class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data">
                        @csrf
                        @endif

                        <div class="row">
                            <div class="col-md-6 d-flex">
                                <div class="card ctm-border-radius shadow-sm flex-fill grow">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0">
                                            Website Description
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Title <span class="text-muted text-danger">*</span></label>
                                            <input type="text" class="form-control" id="website_name" name="website_name" value="{{@$settings->website_name}}" required>
                                            <div class="invalid-feedback">
                                                Please enter a website title.
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Description <span class="text-muted text-danger">*</span></label>
                                            <textarea class="form-control" rows="6" name="website_description" id="description" required>{{@$settings->website_description}}</textarea>
                                            <div class="invalid-feedback">
                                                Please enter a website description.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex">
                                <div class="card ctm-border-radius shadow-sm flex-fill grow">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0">
                                            Contact Information
                                        </h4>
                                    </div>
                                    <div class="card-body">

                                        <div class="form-group">
                                            <label>Email <span class="text-muted text-danger">*</span></label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{@$settings->email}}" required>
                                            <div class="invalid-feedback">
                                                Please enter an email.
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Address <span class="text-muted text-danger">*</span></label>
                                            <input type="text" class="form-control" name="address" id="address" value="{{@$settings->address}}" required>
                                            <div class="invalid-feedback">
                                                Please enter an address.
                                            </div>
                                        </div>


                                        <div class="form-row mx-n4">
                                            <div class="form-group col-md-6 px-4">
                                                <label for="phone" class="text-heading">Phone <span class="text-muted text-danger">*</span></label>
                                                <input type="text" class="form-control form-control-lg" id="phone" name="phone" value="{{@$settings->phone}}" required>
                                                <div class="invalid-feedback">
                                                    Please enter a phone number.
                                                </div>
                                            </div>
                                            <div class="form-group col-md-6 px-4">
                                                <label for="mobile" class="text-heading">Mobile <span class="text-muted text-danger">*</span></label>
                                                <input type="text" class="form-control form-control-lg" id="mobile" name="mobile" value="{{@$settings->mobile}}"  required>
                                                <div class="invalid-feedback">
                                                    Please enter a mobile number.
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- other details section--}}

                        <div class="card ctm-border-radius shadow-sm grow">
                            <div class="card-header">
                                <h4 class="card-title doc d-inline-block mb-0">Other Details</h4>
                            </div>
                            <div class="card-body doc-boby">
                                <div class="card shadow-none">
                                    <div class="card-header">
                                        <h5 class="card-title text-primary mb-0">Social Media Links</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="facebook" class="text-heading">Facebook Url</label>
                                                            <input type="url" class="form-control form-control-lg"
                                                                   id="facebook" name="facebook" value="{{@$settings->facebook}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 leave-col">
                                                        <div class="form-group">
                                                            <label for="instagram" class="text-heading">Instagram Url</label>
                                                            <input type="url" class="form-control form-control-lg"
                                                                   id="instagram" name="instagram" value="{{@$settings->instagram}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="youtube" class="text-heading">Youtube Url</label>
                                                            <input type="url" class="form-control form-control-lg"
                                                                   id="youtube" name="youtube" value="{{@$settings->youtube}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 leave-col">
                                                        <div class="form-group">
                                                            <label for="whatsapp" class="text-heading">Whatsapp Number</label>
                                                            <input type="text" class="form-control form-control-lg"
                                                                   id="whatsapp" name="whatsapp" value="{{@$settings->whatsapp}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="viber" class="text-heading">Viber Number</label>
                                                            <input type="text" class="form-control form-control-lg"
                                                                   id="viber" name="viber" value="{{@$settings->viber}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card shadow-none">
                                    <div class="card-header">
                                        <h5 class="card-title text-primary mb-0">Google Analytics</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group mb-0">
                                                    <label>Analytics code</label>
                                                    <textarea class="form-control" rows=4 name="google_analytics" id="google_analytics">{{@$settings->google_analytics}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card shadow-none">
                                    <div class="card-header">
                                        <h5 class="card-title text-primary mb-0">Google Map</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group mb-0">
                                                    <label>Map Code</label>
                                                    <textarea class="form-control" rows=4 name="google_map" id="google_map">{{@$settings->google_map}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="add-doc text-center">
                                    <button type="submit" class="btn btn-theme button-1 ctm-border-radius text-white text-center">{{(empty($settings)) ? "Save Settings":"Update Settings"}}</button>
                                </div>
                            </div>
                        </div>

                        {{-- End of Tab content --}}

                    </form>
            </div>

            @if(!empty($settings))

            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                {!! Form::open(['url'=>route('setting.imageupdate', @$settings->id),'method'=>'PUT','enctype'=>'multipart/form-data']) !!}

                <div class="row">
                    {{-- main logo --}}

                    <div class="col-lg-6 d-flex">
                        <div class="card ctm-border-radius shadow-sm company-logo flex-fill grow">
                            <div class="card-header">
                                <h4 class="card-title mb-0"> Main Logo</h4>
                                <span class="ctm-text-sm">*Please use  180 x 50px of image for main logo</span>
                            </div>
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-12 mb-4">
                                        <div class="custom-file h-auto">
                                            <div class="avatar-upload">
                                                <div class="avatar-edit">
                                                    <input type="file" class="custom-file-input" hidden id="imageUpload" onchange="loadbasicFile('imageUpload','current-imgupload-img',event)" name="logo">
                                                    <label for="imageUpload"></label>
                                                </div>
                                            </div>
                                            <img id="current-imgupload-img" src="<?php if(!empty($settings->logo)){ echo '/images/uploads/settings/'.$settings->logo; } else{  echo '/images/uploads/default-placeholder.png'; } ?>"  alt="{{@$settings->website_name}}" class="default-image w-100">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- white logo and favicon    --}}
                    <div class="col-xl-6 col-lg-12 col-md-12">
                        <div class="row">
                            <div class="col-xl-12 col-lg-6 col-md-6 d-flex">
                                <div class="card ctm-border-radius shadow-sm grow flex-fill">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0">White Logo</h4>
                                        <span class="ctm-text-sm">*Please use 180 x 50px of image for White logo</span>

                                    </div>
                                    <div class="card-body text-center">

                                        <div class="row justify-content-center">
                                            <div class="col-6 mb-4">
                                                <div class="custom-file h-auto">
                                                    <div class="avatar-upload">
                                                        <div class="avatar-edit">
                                                            <input type="file" class="custom-file-input" hidden="" id="logo_white" onchange="loadbasicFile('logo_white','current-white-img',event)" name="logo_white">
                                                            <label for="logo_white"></label>
                                                        </div>
                                                    </div>
                                                    <img id="current-white-img" src="<?php if(!empty($settings->logo_white)){ echo '/images/uploads/settings/'.$settings->logo_white; } else{  echo '/images/uploads/default-placeholder.png'; } ?>" alt="{{@$settings->website_name}}" class="default-image w-100">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-lg-6 col-md-6 d-flex">
                                <div class="card ctm-border-radius shadow-sm grow flex-fill">
                                    <div class="card-header">
                                        <h4 class="card-title d-inline-block mb-0">Favicon</h4>
                                    </div>
                                    <div class="card-body">

                                        <div class="row justify-content-center">
                                            <div class="col-4 mb-4">
                                                <div class="custom-file h-auto">
                                                    <div class="avatar-upload">
                                                        <div class="avatar-edit">
                                                            <input type="file" class="custom-file-input" hidden="" id="favicon" onchange="loadbasicFile('favicon','currentfav-img',event)" name="favicon">
                                                            <label for="favicon"></label>
                                                        </div>
                                                    </div>
                                                    <img id="currentfav-img" src="<?php if(!empty($settings->favicon)){ echo '/images/uploads/settings/'.$settings->favicon; } else{  echo '/images/uploads/default-placeholder.png'; } ?>" alt="{{@$settings->website_name}}" class="default-image w-100">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="text-center mb-4">
                    <button type="submit" class="btn btn-theme ctm-border-radius text-white button-1">Update Images</button>
                </div>
                {!! Form::close() !!}
            </div>

            <div class="tab-pane fade" id="pills-general" role="tabpanel" aria-labelledby="pills-general-tab">
                {!! Form::open(['url'=>route('welcome.update', @$settings->id),'method'=>'PUT','class'=>'needs-validation','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
                <div class="row">
                    <div class="col-md-6">
                        <div class="card ctm-border-radius shadow-sm grow flex-fill">
                            <div class="card-header">
                                <h4 class="card-title mb-0">
                                    Welcome Section Details
                                </h4>
                            </div>

                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label>Heading <span class="text-muted text-danger">*</span></label>
                                    <input type="text" class="form-control" name="intro_heading" value="{{@$settings->intro_heading}}" required>
                                    <input type="hidden" class="form-control" name="action_type" value="{{ (!empty($settings->intro_heading)) ? "updated":"added"}}"/>
                                    <div class="invalid-feedback">
                                        Please enter the welcome section heading.
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label>Welcome Message <span class="text-muted text-danger">*</span></label>
                                    <textarea class="form-control" rows="10" maxlength="830" name="intro_description" required> {{@$settings->intro_description}} </textarea>
                                    <div class="invalid-feedback">
                                        Please write the introduction description.
                                    </div>
                                </div>

                           
                            </div>


                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card ctm-border-radius shadow-sm grow flex-fill">
                            <div class="card-header">
                                <h4 class="card-title mb-0">
                                    Welcome Section Image <span class="text-muted text-danger">*</span>
                                </h4>
                            </div>
                            <div class="card-body">

                                <label>Image  <span class="text-muted text-danger">*</span></label>

                                <div class="row justify-content-center">
                                    <div class="col-8 mb-3">
                                        <div class="custom-file h-auto">
                                            <div class="avatar-upload">
                                                <div class="avatar-edit">
                                                    <input type="file"  accept="image/png, image/jpeg" class="custom-file-input" hidden id="introimage2" onchange="loadbasicFile('introimage2','current-intro2-img',event)" name="intro_image2" {{ (!empty($settings->intro_image2)) ? "":"required"}}>
                                                    <label for="introimage2"></label>
                                                    <div class="invalid-feedback" style="position: absolute; width: 45px;">
                                                        Please select a image.
                                                    </div>
                                                </div>
                                            </div>
                                            <img id="current-intro2-img" src="<?php if(!empty($settings->intro_image2)){ echo '/images/uploads/settings/'.$settings->intro_image2; } else{  echo '/images/uploads/default-placeholder.png'; } ?>" alt="{{@$settings->intro_heading}}" class="w-100 current-img">
                                        </div>
                                        <span class="ctm-text-sm">*use minimum of 570 x 570px for  image </span>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-theme button-1 text-white ctm-border-radius mt-4" >{{(@$settings->intro_heading !== Null) ? "Update Welcome Details":"Add Welcome Details"}}</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>

            @endif

            <div class="tab-pane fade" id="pills-award" role="tabpanel" aria-labelledby="pills-award-tab">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card ctm-border-radius shadow-sm grow flex-fill">
                            <div class="card-header">
                                <h4 class="card-title mb-0">
                                    Add Award Details
                                </h4>
                            </div>
                            {!! Form::open(['route' => 'awards.store','method'=>'post','class'=>'needs-validation','novalidate'=>'','enctype'=>'multipart/form-data']) !!}

                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label>Title <span class="text-muted text-danger">*</span> </label>
                                    <input type="text" class="form-control" name="name" required>
                                    <div class="invalid-feedback">
                                        Please enter the title.
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-9 mb-4">
                                        <div class="custom-file h-auto">
                                            <div class="avatar-upload">
                                                <div class="avatar-edit">
                                                    <input type="file" class="custom-file-input" hidden id="award-image" onchange="loadbasicFile('award-image','current-award-img',event)" name="image" required>
                                                    <label for="award-image"></label>
                                                    <div class="invalid-feedback" style="position: absolute; width: 45px;">
                                                        Please select a image.
                                                    </div>
                                                </div>
                                            </div>
                                            <img id="current-award-img" src="{{asset('/images/uploads/default-placeholder.png')}}" alt="awardimage_placeholder" class="w-100 current-img">
                                        </div>
                                        <span class="ctm-text-sm">*use image minimum of 170 x 120px for award</span>
                                    </div>

                                </div>


                                <div class="text-center mt-3">
                                    <button type="submit" class="btn btn-theme text-white ctm-border-radius button-1">Add Award</button>
                                </div>
                            </div>

                            {!! Form::close() !!}

                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card ctm-border-radius shadow-sm grow flex-fill">
                            <div class="card-header">
                                <h4 class="card-title mb-0">
                                    Award List
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="employee-office-table">
                                    <div class="table-responsive">
                                        <table id="awards-index" class="table custom-table">
                                            <thead>
                                            <tr>
                                                <th>Award Image</th>
                                                <th>Title</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($awards as $award)
                                                <tr>
                                                    <td class="align-middle pt-6 pb-4 px-6">
                                                        <div class="avatar-upload">
                                                            <div class="blog-preview">
                                                                <img id="default-image" src="{{asset('/images/uploads/awards/'.@$award->image)}}"  class="default-image"/>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ (!empty($award->name))   ?  $award->name:"Not Set"  }}</td>
                                                    <td class="text-right">
                                                        <div class="dropdown action-label drop-active">
                                                            <a href="javascript:void(0)" class="btn btn-white btn-sm" data-toggle="dropdown" aria-expanded="false"> <span class="lnr lnr-cog"></span>
                                                            </a>
                                                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 31px, 0px);">
                                                                <a class="dropdown-item action-award-edit" href="#" hrm-update-action="{{route('awards.update',@$award->id)}}" hrm-edit-action="{{route('awards.edit',$award->id)}}"> Edit </a>
                                                                <a class="dropdown-item action-award-delete" href="#" hrm-delete-per-action="{{route('awards.destroy',@$award->id)}}"> Delete </a>
                                                            </div>
                                                        </div>

                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="pills-statuses" role="tabpanel" aria-labelledby="pills-statuses-tab">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ctm-border-radius shadow-sm grow flex-fill">
                            <div class="card-header">
                                <h4 class="card-title mb-0">
                                    Add Status Details
                                </h4>
                            </div>
                            @if(!empty($settings))
                                {!! Form::open(['url'=>route('status.update', @$settings->id),'method'=>'PUT','enctype'=>'multipart/form-data']) !!}
                            @else

                                <form action="{{ route('setting.store') }}" class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @endif
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="customer_served" class="text-heading">Customer Served</label>
                                                            <input type="number" min="100" class="form-control form-control-lg"
                                                                   id="customer_served" name="customer_served" value="{{@$settings->customer_served}}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 leave-col">
                                                        <div class="form-group">
                                                            <label for="visa_approved" class="text-heading">Visa Approved</label>
                                                            <input type="number" min="100" class="form-control form-control-lg"
                                                                   id="visa_approved" name="visa_approved" value="{{@$settings->visa_approved}}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="success_stories" class="text-heading">Success Stories</label>
                                                            <input type="number" min="100" class="form-control form-control-lg"
                                                                   id="success_stories" name="success_stories" value="{{@$settings->success_stories}}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 leave-col">
                                                        <div class="form-group">
                                                            <label for="happy_customers" class="text-heading">Happy Customers</label>
                                                            <input type="number" min="100" class="form-control form-control-lg"
                                                                   id="happy_customers" name="happy_customers" value="{{@$settings->happy_customers}}" required>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>


                                        <div class="text-center mt-3">
                                            <input type="submit" value="Update Status" class="btn btn-theme text-white ctm-border-radius button-1"/>
                                        </div>
                                    </div>

                                {!! Form::close() !!}

                        </div>
                    </div>

                </div>
            </div>

            <div class="tab-pane fade px-0" id="pills-brocher" role="tabpanel"
                     aria-labelledby="pills-brocher-tab">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card ctm-border-radius shadow-sm grow flex-fill">
                                    <div class="card-header">
                                        <h4 class="card-title mb-0">
                                            Upload Brocher(pdf only)
                                        </h4>
                                    </div>
                                    @if(!empty($settings))
                                        {!! Form::open(['url'=>route('brocher.update', @$settings->id),'method'=>'PUT','enctype'=>'multipart/form-data']) !!}
                                    @else

                                        <form action="{{ route('setting.store') }}" class="needs-validation" novalidate="" method="POST" enctype="multipart/form-data">
                                        @csrf
                                    @endif
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input type="file" class="form-control form-control-lg"
                                                                    id="brocher" name="brocher" {{(@$settings->brocher) ? "":"required";}}  >
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                
                                                
                                            </div>
                                        </div>


                                        <div class="text-center mt-3">
                                            <input type="submit" value="Update Brocher" class="btn btn-theme text-white ctm-border-radius button-1"/>
                                        </div>
                                    </div>

                                    {!! Form::close() !!}

                                </div>
                            </div>
                            
                        </div>
                       
                </div>
        </div>
   </div>


    <div class="modal fade bd-example-modal-sm" id="editAwards">
        <form action="#" method="post" id="deleted-form" >
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
        </form>
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content">
                {!! Form::open(['method'=>'PUT','class'=>'needs-validation updateawards','novalidate'=>'','enctype'=>'multipart/form-data']) !!}

                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title mb-3">Update Award</h4>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label>Title <span class="text-muted text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" id="award_name" required>
                                <div class="invalid-feedback">
                                    Please enter the title.
                                </div>
                            </div>

                            <div class="row justify-content-center">
                        <div class="col-9 mb-4">
                            <div class="custom-file h-auto">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type="file" class="custom-file-input" hidden id="award-edit-image" onchange="loadbasicFile('award-edit-image','edit-award-img',event)"  name="image">
                                        <label for="award-edit-image"></label>
                                        <div class="invalid-feedback" style="position: absolute; width: 45px;">
                                            Please select a image.
                                        </div>
                                    </div>
                                </div>
                                <img id="edit-award-img" src="{{asset('/images/uploads/default-placeholder.png')}}" alt="award_image_placeholder" class="w-100 current-img">
                            </div>
                            <span class="ctm-text-sm">*use image minimum of 170 x 120px for award</span>
                        </div>

                    </div>
                        </div>
                    </div>

                    <div class="text-center mb-3">
                        <button type="submit" class="btn btn-theme button-1 text-white ctm-border-radius mt-4">Update</button>
                    </div>
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>


@endsection

@section('js')

    <script type="text/javascript">

        var loadbasicFile = function(id1,id2,event) {
            var image       = document.getElementById(id1);
            var replacement = document.getElementById(id2);
            replacement.src = URL.createObjectURL(event.target.files[0]);
        };

        $(document).ready(function () {
            $('#awards-index').DataTable({
                paging: true,
                searching: true,
                ordering:  true,
                lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            });
        });

        $(document).on('click','.action-award-edit', function (e) {
            e.preventDefault();
            var url =  $(this).attr('hrm-edit-action');
            // console.log(action)
            var id=$(this).attr('id');
            var action = $(this).attr('hrm-update-action');

            $.ajax({
                url: $(this).attr('hrm-edit-action'),
                type: "GET",
                cache: false,
                dataType: 'json',
                success: function(dataResult){
                    // $('#id').val(data.id);
                    $("#editAwards").modal("toggle");
                    if(dataResult.name !== null){
                        $('#award_name').attr('value',dataResult.name);
                    }
                    $('#edit-award-img').attr("src",'/images/uploads/awards/'+dataResult.image);
                    $('.updateawards').attr('action',action);

                },
                error: function(error){
                    console.log(error)
                }
            });
        });

        $(document).on('click','.action-award-delete', function (e) {
            e.preventDefault();
            var form = $('#deleted-form');
            var action = $(this).attr('hrm-delete-per-action');
            form.attr('action',$(this).attr('hrm-delete-per-action'));
            $url = form.attr('action');
            var form_data = form.serialize();
            // $('.deleterole').attr('action',action);
            swal({
                title: "Are You Sure?",
                text: "You will not be able to recover this",
                type: "info",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
            }, function(){
                $.post( $url, form_data)
                    .done(function(response) {
                        swal("Deleted!", "Award detaol deleted successfully", "success");
                        $(response).remove();
                        setTimeout(function() {
                            window.location.reload();
                        }, 2500);


                    })
                    .fail(function(response){
                        console.log(response)

                    });
            });

        });

    </script>
@endsection
