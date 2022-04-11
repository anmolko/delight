@extends('backend.layouts.master')
@section('title') Section Elements @endsection
@section('css')
<link rel="stylesheet" href="{{asset('assets/backend/css/successbox.css')}}">

    <style>
        .ck-editor__editable_inline {
            min-height: 150px !important;
        }
        /*for tab*/
        li.button-5 a{
            color: #FFFFFF;
        }

        li.button-6 a{
            color: #000000;
        }

        .fade{
            display: none;
        }
        /*end for tab*/

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


    <div class="col-xl-9 col-lg-8  col-md-12" id="focus-point">
        <div class="card shadow-sm grow ctm-border-radius">
            <div class="card-body align-center">
                <ul class="nav flex-row nav-pills" id="pills-tab" role="tablist">
                    @php($i=0)
                    @foreach(@$sections as $key=>$value)
                        <li class="nav-item mr-2">
                            <a class="nav-link {{($i==0) ? 'active':''}} mb-2" id="pills-{{$value}}-tab" data-toggle="pill" href="#pills-{{$value}}" role="tab" aria-controls="pills-{{$value}}" aria-selected="true">{{ucfirst(str_replace('_',' ',$value))}}</a>
                        </li>
                        <?php $i++; ?>
                    @endforeach

                </ul>
            </div>
        </div>



        <div class="card grow shadow-sm grow ctm-border-radius">
            <div class="card-body align-center">
                <div class="tab-content" id="pills-tabContent">

                    @php($j=0)
                    @foreach(@$sections as $key=>$value)
                    <div class="tab-pane fade {{($j==0) ? 'show active':''}} " id="pills-{{$value}}" role="tabpanel" aria-labelledby="pills-{{$value}}-tab">

                        @if($value == 'basic_section')
                            @if($basic_elements !== null)
                                {!! Form::open(['url'=>route('section-elements.update', @$basic_elements->id),'id'=>'basic-form','class'=>'needs-validation','method'=>'PUT','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
                            @else
                                {!! Form::open(['route' => 'section-elements.store','method'=>'post','class'=>'needs-validation','id'=>'basic-form','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
                            @endif
                            <div class="row" id="basic-form-ajax">

                                <div class="col-md-7">
                                    <div class="card ctm-border-radius shadow-sm flex-fill">
                                        <div class="card-header">
                                            <h4 class="card-title mb-0">
                                                Basic Section Details
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group mb-3">
                                                <label>Heading <span class="text-muted text-danger">*</span></label>
                                                <input type="text" class="form-control" maxlength="12" name="heading" value="{{@$basic_elements->heading}}" required>
                                                <input type="hidden" class="form-control" value="{{$key}}" name="page_section_id" required>
                                                <input type="hidden" class="form-control" value="{{$value}}" name="section_name" required>
                                                <div class="invalid-feedback">
                                                    Please enter the basic section heading.
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label>Sub Heading </label>
                                                <input type="text" class="form-control" maxlength="42" name="subheading" value="{{@$basic_elements->subheading}}">
                                                <div class="invalid-feedback">
                                                    Please enter the basic section Sub heading.
                                                </div>
                                            </div>

                                            <div class="form-group mb-3">
                                                <label>Description <span class="text-muted text-danger">*</span></label>
                                                <textarea class="form-control" maxlength="455" rows="6" name="description" id="basic_editor" required>{!! @$basic_elements->description !!}</textarea>
                                                <div class="invalid-feedback">
                                                    Please write the description for basic section.
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label>Button Text </label>
                                                <input type="text" maxlength="30" class="form-control" value="{{@$basic_elements->button}}" name="button">
                                                <div class="invalid-feedback">
                                                    Please enter the button text.
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label>Button Link </label>
                                                <input type="text" class="form-control" value="{{@$basic_elements->button_link}}" name="button_link">
                                                <div class="invalid-feedback">
                                                    Please enter the button link.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="card ctm-border-radius shadow-sm flex-fill">
                                        <div class="card-header">
                                            <h4 class="card-title mb-0">
                                                Basic Section Image <span class="text-muted text-danger">*</span>
                                            </h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="row justify-content-center">
                                                <div class="col-9 mb-4">
                                                    <div class="custom-file h-auto">
                                                        <div class="avatar-upload">
                                                            <div class="avatar-edit">
                                                                <input type="file" class="custom-file-input" hidden id="basic-image" onchange="loadbasicFile('basic-image','current-basic-img',event)" name="image" {{(@$basic_elements !== null)? "":"required"}}>
                                                                <label for="basic-image"></label>
                                                                <div class="invalid-feedback" style="position: absolute; width: 45px;">
                                                                    Please select a image.
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <img id="current-basic-img" src="<?php if(!empty(@$basic_elements->image)){ echo '/images/uploads/section_elements/basic_section/'.@$basic_elements->image; } else{  echo '/images/uploads/default-placeholder.png'; } ?>" alt="basic_section_image" class="current-img w-100">
                                                    </div>
                                                    <span class="ctm-text-sm">*use image minimum of 570 x  570px for Basic section</span>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-3" id="basic-form-button">
                                <button id="basic-button-submit" class="btn btn-theme button-1 ctm-border-radius text-white">
                                    {{(@$basic_elements !==null)? "Update Details":"Add Details"}}</button>
                            </div>
                            {!! Form::close() !!}
                        @endif

                        @if($value == 'image_description_section')
                                @if($image_des_elements !== null)
                                    {!! Form::open(['url'=>route('section-elements.update', @$image_des_elements->id),'id'=>'image_description_section-form','class'=>'needs-validation','method'=>'PUT','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
                                @else
                                    {!! Form::open(['route' => 'section-elements.store','method'=>'post','class'=>'needs-validation','id'=>'image_description_section-form','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
                                @endif
                                <div class="row" id="image_description_section-form-ajax">

                                    <div class="col-md-7">
                                        <div class="card ctm-border-radius shadow-sm flex-fill">
                                            <div class="card-header">
                                                <h4 class="card-title mb-0">
                                                    Image Description Section Details
                                                </h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group mb-3">
                                                    <label>Heading <span class="text-muted text-danger">*</span></label>
                                                    <input type="text" class="form-control" maxlength="15" name="heading" value="{{@$image_des_elements->heading}}" required>
                                                    <input type="hidden" class="form-control" value="{{$key}}" name="page_section_id" required>
                                                    <input type="hidden" class="form-control" value="{{$value}}" name="section_name" required>
                                                    <div class="invalid-feedback">
                                                        Please enter the heading.
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label>Sub Heading </label>
                                                    <input type="text" class="form-control" maxlength="120" name="subheading" value="{{@$image_des_elements->subheading}}">
                                                    <div class="invalid-feedback">
                                                        Please enter the Sub heading.
                                                    </div>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label>Inner Sub Title </label>
                                                    <input type="text" maxlength="45" class="form-control" value="{{@$image_des_elements->list_header}}" name="list_header">
                                                    <div class="invalid-feedback">
                                                        Please enter the inner sub title.
                                                    </div>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label>Description <span class="text-muted text-danger">*</span></label>
                                                    <textarea class="form-control" maxlength="790" rows="6" name="description" id="image_section_editor" required>{!! @$image_des_elements->description !!}</textarea>
                                                    <div class="invalid-feedback">
                                                        Please write the description.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="card ctm-border-radius shadow-sm flex-fill">
                                            <div class="card-header">
                                                <h4 class="card-title mb-0">
                                                    Image <span class="text-muted text-danger">*</span>
                                                </h4>
                                            </div>
                                            <div class="card-body">
                                                <div class="row justify-content-center">
                                                    <div class="col-9 mb-4">
                                                        <div class="custom-file h-auto">
                                                            <div class="avatar-upload">
                                                                <div class="avatar-edit">
                                                                    <input type="file" class="custom-file-input" hidden id="image-des-sec" onchange="loadbasicFile('image-des-sec','current-image-des-img',event)" name="image" {{(@$image_des_elements !== null)? "":"required"}}>
                                                                    <label for="image-des-sec"></label>
                                                                    <div class="invalid-feedback" style="position: absolute; width: 45px;">
                                                                        Please select a image.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <img id="current-image-des-img" src="<?php if(!empty(@$image_des_elements->image)){ echo '/images/uploads/section_elements/basic_section/'.@$image_des_elements->image; } else{  echo '/images/uploads/default-placeholder.png'; } ?>" alt="image_des_section_image" class="current-img w-100">
                                                        </div>
                                                        <span class="ctm-text-sm">*use image minimum of 570 x 730px for Image Description</span>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center mt-3" id="image_description_section-form-button">
                                    <button id="image_description_section-button-submit" class="btn btn-theme button-1 ctm-border-radius text-white">
                                        {{(@$image_des_elements !==null)? "Update Details":"Add Details"}}</button>
                                </div>
                                {!! Form::close() !!}
                            @endif

                        @if($value == 'call_to_action_1')
                                @if($call1_elements !== null)
                                    {!! Form::open(['url'=>route('section-elements.update', @$call1_elements->id),'id'=>'call-action1-form','class'=>'needs-validation','novalidate'=>'','method'=>'PUT','enctype'=>'multipart/form-data']) !!}
                                @else
                                    {!! Form::open(['route' => 'section-elements.store','method'=>'post','class'=>'needs-validation','id'=>'call-action1-form','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
                                @endif

                                <div class="row" id="call-action1-form-ajax">
                                    <div class="col-md-12">
                                        <div class="card ctm-border-radius shadow-sm flex-fill">
                                            <div class="card-header">
                                                <h4 class="card-title mb-0">
                                                    Call to action: Option 1 Details
                                                </h4>
                                            </div>
                                            <div class="card-body">
                                                <img class="img-responsive" src="{{asset('assets/backend/img/page_sections/calltoaction.png')}}" />

                                                <div class="form-group mb-3">
                                                    <label>Heading <span class="text-muted text-danger">*</span></label>
                                                    <input type="hidden" class="form-control" value="{{$key}}" name="page_section_id" required>
                                                    <input type="hidden" class="form-control" value="{{$value}}" name="section_name" required>
                                                    <input type="text" maxlength="65" class="form-control" value="{{@$call1_elements->heading}}" name="heading" required>
                                                    <div class="invalid-feedback">
                                                        Please enter the heading.
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label>Button Text <span class="text-muted text-danger">*</span></label>
                                                    <input type="text" maxlength="30" class="form-control" value="{{@$call1_elements->button}}" name="button" required>
                                                    <div class="invalid-feedback">
                                                        Please enter the button text.
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label>Button Link <span class="text-muted text-danger">*</span></label>
                                                    <input type="text" class="form-control" value="{{@$call1_elements->button_link}}" name="button_link" required>
                                                    <div class="invalid-feedback">
                                                        Please enter the button link.
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label>Image</label>
                                                    <div class="row justify-content-center">
                                                        <div class="col-4 mb-4">
                                                            <div class="custom-file h-auto">
                                                                <div class="avatar-upload">
                                                                    <div class="avatar-edit">
                                                                        <input type="file" class="custom-file-input" hidden id="call-action-image" onchange="loadbasicFile('call-action-image','current-callaction-img',event)" name="image" {{(@$call1_elements !== null)? "":"required"}}>
                                                                        <label for="call-action-image"></label>
                                                                        <div class="invalid-feedback" style="position: absolute; width: 45px;">
                                                                            Please select a image.
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <img id="current-callaction-img" src="<?php if(!empty(@$call1_elements->image)){ echo '/images/uploads/section_elements/call_1/'.@$call1_elements->image; } else{  echo '/images/uploads/default-placeholder.png'; } ?>" alt="call1_image" class="current-img w-100">
                                                            </div>
                                                            <span class="ctm-text-sm">*use image minimum of 1920 x 1080x for call1 </span>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center mt-3" id="call-action1-form-button">
                                    <button id="call-action-button-submit" class="btn btn-theme button-1 ctm-border-radius text-white">
                                        {{(@$call1_elements !==null)? "Update Details":"Add Details"}}
                                    </button>
                                </div>
                                {!! Form::close() !!}

                        @endif

                        @if($value == 'call_to_action_2')
                                @if($call2_elements !== null)
                                    {!! Form::open(['url'=>route('section-elements.update', @$call2_elements->id),'id'=>'call-action2-form','class'=>'needs-validation','novalidate'=>'','method'=>'PUT']) !!}
                                @else
                                    {!! Form::open(['route' => 'section-elements.store','method'=>'post','class'=>'needs-validation','id'=>'call-action2-form','novalidate'=>'']) !!}
                                @endif

                                <div class="row" id="call-action2-form-ajax">
                                    <div class="col-md-12">
                                        <div class="card ctm-border-radius shadow-sm flex-fill">
                                            <div class="card-header">
                                                <h4 class="card-title mb-0">
                                                    Call to action: Option 2 Details
                                                </h4>
                                            </div>
                                            <div class="card-body">
                                                <img class="img-responsive" src="{{asset('assets/backend/img/page_sections/calltoaction2.png')}}" />

                                                <div class="form-group mb-3">
                                                    <label>Heading <span class="text-muted text-danger">*</span></label>
                                                    <input type="text" maxlength="20" class="form-control" value="{{@$call2_elements->heading}}" name="heading" required>
                                                    <input type="hidden" class="form-control" value="{{$key}}" name="page_section_id" required>
                                                    <input type="hidden" class="form-control" value="{{$value}}" name="section_name" required>
                                                    <div class="invalid-feedback">
                                                        Please enter the heading text.
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label>Description <span class="text-muted text-danger">*</span></label>
                                                    <textarea class="form-control" maxlength="240" rows="4" name="description" required>{!! @$call2_elements->description !!}</textarea>
                                                    <div class="invalid-feedback">
                                                        Please write the description.
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label>Button Text </label>
                                                    <input type="text" maxlength="20" class="form-control" value="{{@$call2_elements->button}}" name="button">
                                                    <div class="invalid-feedback">
                                                        Please enter the button text.
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label>Button Link </label>
                                                    <input type="text" class="form-control" value="{{@$call2_elements->button_link}}" name="button_link">
                                                    <div class="invalid-feedback">
                                                        Please enter the button link.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center mt-3" id="call-action2-form-button">
                                    <button id="call-action-button-submit" class="btn btn-theme button-1 ctm-border-radius text-white">
                                        {{(@$call2_elements !==null)? "Update Details":"Add Details"}}
                                    </button>
                                </div>
                                {!! Form::close() !!}

                            @endif

                        @if($value == 'simple_tab_list')
                                @if(sizeof($bgimage_elements) !== 0)
                                    {!! Form::open(['route' => 'section-elements.tablistUpdate','class'=>'needs-validation','id'=>'simple-tab-list-form','method'=>'post','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
                                @else
                                    {!! Form::open(['route' => 'section-elements.store','method'=>'post','class'=>'needs-validation','id'=>'simple-tab-list-form','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
                                @endif
                                    <div id="simple-tab-list-form-ajax">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="card ctm-border-radius shadow-sm flex-fill">
                                                <div class="card-header">
                                                    <h4 class="card-title mb-0">
                                                        Simple Tab List Section Details
                                                    </h4>
                                                </div>
                                                <div class="card-body">
                                                    <img class="img-responsive" src="{{asset('assets/backend/img/page_sections/simple_tab_list.png')}}" />
                                                    <div class="form-group mb-3">
                                                        <label>Heading <span class="text-muted text-danger">*</span></label>
                                                        <input type="text" class="form-control" name="heading[]" maxlength="22" value="{{@$bgimage_elements[0]->heading}}" required>
                                                        <input type="hidden" class="form-control" value="{{$key}}" name="page_section_id" required>
                                                        <input type="hidden" class="form-control" value="{{$value}}" name="section_name" required>
                                                        <div class="invalid-feedback">
                                                            Please enter the Simple Tab List Section heading.
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label>Sub Heading <span class="text-muted text-danger">*</span></label>
                                                        <input type="text" class="form-control" maxlength="135" name="subheading[]" value="{{@$bgimage_elements[0]->subheading}}" required>
                                                        <div class="invalid-feedback">
                                                            Please enter the sub heading.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion add-tab-section1-details" id="accordion-details">
                                        <div class="card shadow-sm ctm-border-radius">
                                            <div class="card-header" id="card1">
                                                <h4 class="cursor-pointer mb-0">
                                                    <a class=" coll-arrow d-block text-dark" href="javascript:void(0)" data-toggle="collapse" data-target="#card-one" aria-expanded="true">
                                                        Tab 1 Details <span class="text-muted text-danger">*</span>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div class="card-body p-0">
                                                <div id="card-one" class="collapse show ctm-padding" aria-labelledby="card1" data-parent="#accordion-details">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="card ctm-border-radius shadow-sm flex-fill">
                                                                <div class="card-body">
                                                                    <div class="form-group mb-3">
                                                                        <label>Tab Title <span class="text-muted text-danger">*</span></label>
                                                                        <input type="hidden"  class="form-control" value="{{@$bgimage_elements[0]->id}}" name="id[]">
                                                                        <input type="text" class="form-control" maxlength="15"  name="list_header[]" value="{{@$bgimage_elements[0]->list_header}}" required>
                                                                        <div class="invalid-feedback">
                                                                            Please enter the Tab 1 title.
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label>Tab Sub-Title <span class="text-muted text-danger">*</span></label>
                                                                        <input type="text" class="form-control" maxlength="80"  name="description[]" value="{{@$bgimage_elements[0]->description}}" required>
                                                                        <div class="invalid-feedback">
                                                                            Please enter the Tab 1 subtitle.
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label>Description <span class="text-muted text-danger">*</span></label>
                                                                        <textarea class="form-control" rows="6" name="list_description[]" id="tab_list_desc_1" required>{{@$bgimage_elements[0]->list_description}}</textarea>
                                                                        <div class="invalid-feedback">
                                                                            Please write the Tab 1 description.
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card shadow-sm ctm-border-radius">
                                            <div class="card-header" id="card2">
                                                <h4 class="cursor-pointer mb-0">
                                                    <a class="coll-arrow d-block text-dark collapsed" href="javascript:void(0)" data-toggle="collapse" data-target="#card-two" aria-expanded="false">
                                                        Tab 2 Details <span class="text-muted text-danger">*</span>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div class="card-body p-0">
                                                <div id="card-two" class="ctm-padding collapse" aria-labelledby="card2" data-parent="#accordion-details">

                                                    <div class="row">

                                                        <div class="col-md-12">
                                                            <div class="card ctm-border-radius shadow-sm flex-fill">
                                                                <div class="card-body">
                                                                    <div class="form-group mb-3">
                                                                        <label>Tab Title <span class="text-muted text-danger">*</span></label>
                                                                        <input type="hidden" class="form-control" value="{{@$bgimage_elements[1]->id}}" name="id[]">
                                                                        <input type="text" class="form-control" maxlength="15"  name="list_header[]" value="{{@$bgimage_elements[1]->list_header}}" required>
                                                                        <div class="invalid-feedback">
                                                                            Please enter the Tab 2 title.
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label>Tab Sub-Title <span class="text-muted text-danger">*</span></label>
                                                                        <input type="text" class="form-control" maxlength="80"  name="description[]" value="{{@$bgimage_elements[1]->description}}" required>
                                                                        <div class="invalid-feedback">
                                                                            Please enter the Tab 2 subtitle.
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label>Description <span class="text-muted text-danger">*</span></label>
                                                                        <textarea class="form-control" rows="6" name="list_description[]" id="tab_list_desc_2" required>{{@$bgimage_elements[1]->list_description}}</textarea>
                                                                        <div class="invalid-feedback">
                                                                            Please write the Tab 2 description.
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="text-center mt-3" id="simple-tab-list-form-button">
                                        <button id="simple-tab-list-form-submit" class="btn btn-theme button-1 ctm-border-radius text-white">{{(sizeof(@$bgimage_elements) !== 0) ? "Update Details":"Add Details"}}</button>
                                    </div>
                                {!! Form::close() !!}

                            @endif

                        @if($value == 'flash_cards')
                                @if(sizeof($flash_elements) !== 0)
                                    {!! Form::open(['route' => 'section-elements.tablistUpdate','method'=>'post','class'=>'needs-validation','id'=>'flash-card-form','novalidate'=>'']) !!}

                                @else
                                    {!! Form::open(['route' => 'section-elements.store','method'=>'post','class'=>'needs-validation','id'=>'flash-card-form','novalidate'=>'']) !!}
                                @endif
                                    <div id="flash-card-form-ajax">
                                        <div class="accordion add-tab-section1-details" id="accordion-details">
                                            <img class="img-responsive mb-2" src="{{asset('assets/backend/img/page_sections/mission_vision.png')}}" />

                                            <div class="form-group mb-3">
                                                <label>Heading <span class="text-muted text-danger">*</span></label>
                                                <input type="text" class="form-control" name="heading[]" maxlength="22" value="{{@$flash_elements[0]->heading}}" required>
                                                <div class="invalid-feedback">
                                                    Please enter the heading.
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label>Sub Heading <span class="text-muted text-danger">*</span></label>
                                                <input type="text" class="form-control" maxlength="140" name="subheading[]" value="{{@$flash_elements[0]->subheading}}" required>
                                                <div class="invalid-feedback">
                                                    Please enter the sub heading.
                                                </div>
                                            </div>

                                            <div class="card shadow-sm ctm-border-radius">
                                                <div class="card-header" id="mission1">
                                                    <h4 class="cursor-pointer mb-0">
                                                        <a class=" coll-arrow d-block text-dark" href="javascript:void(0)" data-toggle="collapse" data-target="#mission-one" aria-expanded="true">
                                                            Mission <span class="text-muted text-danger">*</span>
                                                            <br><span class="ctm-text-sm">Please enter the details for mission.</span>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div class="card-body p-0">

                                                    <div id="mission-one" class="collapse show ctm-padding" aria-labelledby="mission1" data-parent="#accordion-details">

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="card ctm-border-radius shadow-sm flex-fill">
                                                                    <div class="card-body">
                                                                        <div class="form-group mb-3">
                                                                            <label>Heading <span class="text-muted text-danger">*</span></label>
                                                                            <input type="hidden" class="form-control" value="{{$key}}" name="page_section_id" required>
                                                                            <input type="hidden" class="form-control" value="{{@$flash_elements[0]->id}}" name="id[]">
                                                                            <input type="hidden" class="form-control" value="{{$value}}" name="section_name" required>
                                                                            <input type="text" class="form-control" maxlength="20" name="list_header[]" value="{{@$flash_elements[0]->list_header}}" required>
                                                                            <div class="invalid-feedback">
                                                                                Please enter the Mission heading.
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group mb-3">
                                                                            <label>Description <span class="text-muted text-danger">*</span></label>
                                                                            <textarea class="form-control" id="mission_one" rows="6" name="list_description[]" required>{{@$flash_elements[0]->list_description}}</textarea>
                                                                            <div class="invalid-feedback">
                                                                                Please write the Mission description.
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card shadow-sm ctm-border-radius">
                                                <div class="card-header" id="vision1">
                                                    <h4 class="cursor-pointer mb-0">
                                                        <a class="coll-arrow d-block text-dark collapsed" href="javascript:void(0)" data-toggle="collapse" data-target="#vision-one" aria-expanded="false">
                                                            Vision <span class="text-muted text-danger">*</span>
                                                            <br><span class="ctm-text-sm">Please enter the details for Vision.</span>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div class="card-body p-0">
                                                    <div id="vision-one" class="ctm-padding collapse" aria-labelledby="vision1" data-parent="#accordion-details">

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="card ctm-border-radius shadow-sm flex-fill">
                                                                    <div class="card-body">
                                                                        <div class="form-group mb-3">
                                                                            <label>Heading <span class="text-muted text-danger">*</span></label>
                                                                            <input type="hidden" class="form-control" value="{{@$flash_elements[1]->id}}" name="id[]">
                                                                            <input type="text" class="form-control" maxlength="20" name="list_header[]" value="{{@$flash_elements[1]->list_header}}" required>
                                                                            <div class="invalid-feedback">
                                                                                Please enter the Vision heading.
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group mb-3">
                                                                            <label>Description <span class="text-muted text-danger">*</span></label>
                                                                            <textarea class="form-control" id="vision_one" rows="6" name="list_description[]" required>{{@$flash_elements[1]->list_description}}</textarea>
                                                                            <div class="invalid-feedback">
                                                                                Please write the Vision description.
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card shadow-sm ctm-border-radius">
                                                <div class="card-header" id="goal1">
                                                    <h4 class="cursor-pointer mb-0">
                                                        <a class="coll-arrow d-block text-dark collapsed" href="javascript:void(0)" data-toggle="collapse" data-target="#goal-one" aria-expanded="false">
                                                            Goals <span class="text-muted text-danger">*</span>
                                                            <br><span class="ctm-text-sm">Please enter the details for goals.</span>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div class="card-body p-0">
                                                <div id="goal-one" class="ctm-padding collapse" aria-labelledby="goal1" data-parent="#accordion-details">

                                                    <div class="row">

                                                        <div class="col-md-12">
                                                            <div class="card ctm-border-radius shadow-sm flex-fill">
                                                                <div class="card-body">
                                                                    <div class="form-group mb-3">
                                                                        <label>Heading <span class="text-muted text-danger">*</span></label>
                                                                        <input type="hidden" class="form-control" value="{{@$flash_elements[2]->id}}" name="id[]">
                                                                        <input type="text" class="form-control" maxlength="12" name="list_header[]" value="{{@$flash_elements[2]->list_header}}" required>
                                                                        <div class="invalid-feedback">
                                                                            Please enter the Goal heading.
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group mb-3">
                                                                        <label>Description <span class="text-muted text-danger">*</span></label>
                                                                        <textarea class="form-control" rows="6" id="goal_one" name="list_description[]" required>{{@$flash_elements[2]->list_description}}</textarea>
                                                                        <div class="invalid-feedback">
                                                                            Please write the Goal description.
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="text-center mt-3" id="flash-card-form-button">
                                        <button id="tab1-button-submit" class="btn btn-theme button-1 ctm-border-radius text-white">{{(sizeof(@$flash_elements) !== 0) ? "Update Details":"Add Details"}}</button>
                                    </div>
                                {!! Form::close() !!}
                        @endif

                        @if($value == 'simple_header_and_description')
                                @if($header_descp_elements !== null)
                                    {!! Form::open(['url'=>route('section-elements.update', @$header_descp_elements->id),'id'=>'header-descp-form','class'=>'needs-validation','novalidate'=>'','method'=>'PUT']) !!}
                                @else
                                    {!! Form::open(['route' => 'section-elements.store','method'=>'post','class'=>'needs-validation','id'=>'header-descp-form','novalidate'=>'']) !!}
                                @endif

                                <div class="row" id="header-descp-form-ajax">
                                    <div class="col-md-12">
                                        <div class="card ctm-border-radius shadow-sm flex-fill">
                                            <div class="card-header">
                                                <h4 class="card-title mb-0">
                                                    Simple Header Description Details
                                                </h4>
                                            </div>
                                            <div class="card-body">
                                                <img class="img-responsive mb-2" src="{{asset('assets/backend/img/page_sections/simple_header_descp.png')}}" />

                                                <div class="form-group mb-3">
                                                    <label>Heading</label>
                                                    <input type="text" maxlength="85" class="form-control" value="{{@$header_descp_elements->heading}}" name="heading">
                                                    <input type="hidden" class="form-control" value="{{$key}}" name="page_section_id" required>
                                                    <input type="hidden" class="form-control" value="{{$value}}" name="section_name" required>
                                                    <div class="invalid-feedback">
                                                        Please enter the heading.
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label>Description <span class="text-muted text-danger">*</span></label>
                                                    <textarea class="form-control" rows="6" name="description" id="header_descp_editor" required>{{@$header_descp_elements->description}}</textarea>
                                                    <div class="invalid-feedback">
                                                        Please write the short description for basic section.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center mt-3" id="header-descp-form-button">
                                    <button id="call-action-button-submit" class="btn btn-theme button-1 ctm-border-radius text-white">
                                        {{(@$header_descp_elements !==null)? "Update Details":"Add Details"}}
                                    </button>
                                </div>
                                {!! Form::close() !!}

                            @endif

                        @if($value == 'accordion_section_1')
                                @if(sizeof($accordian1_elements) !== 0)
                                    {!! Form::open(['route' => 'section-elements.tablistUpdate','method'=>'post','class'=>'needs-validation','id'=>'accordian1-form','novalidate'=>'','enctype'=>'multipart/form-data']) !!}

                                @else
                                    {!! Form::open(['route' => 'section-elements.store','method'=>'post','class'=>'needs-validation','id'=>'accordian1-form','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
                                @endif
                                    <div id="accordian1-form-ajax">
                                        <div class="row">
                                            <div class="col-md-12">
                                            <div class="card ctm-border-radius shadow-sm flex-fill">
                                                <div class="card-header">
                                                    <h4 class="card-title mb-0">
                                                        Accordion Header Details
                                                    </h4>
                                                </div>
                                                <div class="card-body">
                                                    <img class="img-responsive mb-2" id="accordion_section_1" src="{{asset('assets/backend/img/page_sections/simple_accordian_tab.png')}}" />

                                                    <div class="form-group mb-3">
                                                        <label>Heading <span class="text-muted text-danger">*</span></label>
                                                        <input type="text" maxlength="22" class="form-control" name="heading[]" value="{{@$accordian1_elements[0]->heading}}" required>
                                                        <div class="invalid-feedback">
                                                            Please enter the heading.
                                                        </div>
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <label>Short Description </label>
                                                        <textarea class="form-control"  maxlength="100" rows="6" name="description[]">{{@$accordian1_elements[0]->description}}</textarea>
                                                        <div class="invalid-feedback">
                                                            Please write the short description.
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>

                                        <div class="accordion add-employee" id="accordion-details">
                                            <input type="hidden" class="form-control" value="{{@$accordian1_elements}}" name="accordion1_elements">

                                            @for ($i = 1; $i <=$list_1; $i++)
                                            <div class="card shadow-sm ctm-border-radius">
                                                <div class="card-header" id="listheading{{$i}}">
                                                    <h4 class="cursor-pointer mb-0">
                                                        <a class="{{($i==1) ? 'coll-arrow d-block text-dark':'coll-arrow d-block text-dark collapsed'}}" href="javascript:void(0)" data-toggle="collapse" data-target="#list-heading-{{$i}}" aria-expanded="{{($i==1) ? 'true':'false'}}">
                                                            Accordion {{$i}} details <span class="text-muted text-danger">*</span>
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div class="card-body p-0">
                                                    <div id="list-heading-{{$i}}" class="{{($i==1) ? 'collapse show ctm-padding':'collapse ctm-padding'}}" aria-labelledby="listheading{{$i}}" data-parent="#accordion-details" >

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="card ctm-border-radius shadow-sm flex-fill">
                                                                    <div class="card-body">
                                                                        <div class="form-group mb-3">
                                                                            <label>Heading <span class="text-muted text-danger">*</span></label>
                                                                            <input type="hidden" class="form-control" value="{{$key}}"    name="page_section_id" required>
                                                                            <input type="hidden" class="form-control" value="{{$value}}"  name="section_name" required>
                                                                            <input type="hidden" class="form-control" value="{{@$accordian1_elements[$i-1]->id}}" name="id[]">
                                                                            <input type="hidden" class="form-control" value="{{$list_1}}" name="list_number_1" required>
                                                                            <input type="text" class="form-control" maxlength="90" name="list_header[]" value="{{@$accordian1_elements[$i-1]->list_header}}" required>
                                                                            <div class="invalid-feedback">
                                                                                Please enter the heading.
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group mb-3">
                                                                            <label>Description <span class="text-muted text-danger">*</span></label>
                                                                            <textarea class="form-control" rows="6" name="list_description[]" required>{{@$accordian1_elements[$i-1]->list_description}}</textarea>
                                                                            <div class="invalid-feedback">
                                                                                Please write the description.
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            @endfor

                                        </div>
                                    </div>

                                    <div class="text-center mt-3" id="accordian1-form-button">
                                        <button id="list1-button-submit" class="btn btn-theme button-1 ctm-border-radius text-white">{{(sizeof(@$accordian1_elements) !== 0) ? "Update Details":"Add Details"}}</button>
                                    </div>
                                {!! Form::close() !!}
                        @endif

                        @if($value == 'accordion_section_2')
                                    @if(sizeof($accordian2_elements) !== 0)
                                        {!! Form::open(['route' => 'section-elements.tablistUpdate','method'=>'post','class'=>'needs-validation','id'=>'accordion2-form','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
                                    @else
                                        {!! Form::open(['route' => 'section-elements.store','method'=>'post','class'=>'needs-validation','id'=>'accordion2-form','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
                                    @endif
                                        <div id="accordion2-form-ajax">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card ctm-border-radius shadow-sm flex-fill">
                                                        <div class="card-header">
                                                            <h4 class="card-title mb-0">
                                                                Accordion Header Details
                                                            </h4>
                                                        </div>
                                                        <div class="card-body">
                                                            <img class="img-responsive mb-2" src="{{asset('assets/backend/img/page_sections/simple_accordian_tab2.png')}}" />

                                                            <div class="form-group mb-3">
                                                                <label>Heading <span class="text-muted text-danger">*</span></label>
                                                                <input type="text" class="form-control" maxlength="22" name="heading[]" value="{{@$accordian2_elements[0]->heading}}" required>
                                                                <div class="invalid-feedback">
                                                                    Please enter the heading.
                                                                </div>
                                                            </div>
                                                            <div class="form-group mb-3">
                                                                <label>Short Description </label>
                                                                <textarea class="form-control" rows="6" maxlength="100" name="description[]">{{@$accordian2_elements[0]->description}}</textarea>
                                                                <div class="invalid-feedback">
                                                                    Please write the short description.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="accordion listwo" id="accordion-details">
                                                <input type="hidden" class="form-control" value="{{@$accordian2_elements}}" name="accordion2_elements">

                                                @for ($i = 1; $i <=$list_2; $i++)
                                                    <div class="card shadow-sm ctm-border-radius">
                                                        <div class="card-header" id="listtwoheading{{$i}}">
                                                            <h4 class="cursor-pointer mb-0">
                                                                <a class="{{($i==1) ? 'coll-arrow d-block text-dark':'coll-arrow d-block text-dark collapsed'}}" href="javascript:void(0)" data-toggle="collapse" data-target="#listtwo-heading-{{$i}}" aria-expanded="{{($i==1) ? 'true':'false'}}">
                                                                    Accordion {{$i}} details <span class="text-muted text-danger">*</span>
                                                                </a>
                                                            </h4>
                                                        </div>
                                                        <div class="card-body p-0">
                                                            <div id="listtwo-heading-{{$i}}" class="{{($i==1) ? 'collapse show ctm-padding':'collapse ctm-padding'}}" aria-labelledby="listtwoheading{{$i}}" data-parent="#accordion-details" >

                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="card ctm-border-radius shadow-sm flex-fill">
                                                                            <div class="card-body">
                                                                                <div class="form-group mb-3">
                                                                                    <label>Heading <span class="text-muted text-danger">*</span></label>
                                                                                    <input type="hidden" class="form-control" value="{{$key}}"    name="page_section_id" required>
                                                                                    <input type="hidden" class="form-control" value="{{$value}}"  name="section_name" required>
                                                                                    <input type="hidden" class="form-control" value="{{$list_2}}" name="list_number_2" required>
                                                                                    <input type="hidden" class="form-control" value="{{@$accordian2_elements[$i-1]->id}}" name="id[]">
                                                                                    <input type="text" class="form-control" maxlength="40" name="list_header[]" value="{{@$accordian2_elements[$i-1]->list_header}}" required>
                                                                                    <div class="invalid-feedback">
                                                                                        Please enter the heading.
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group mb-3">
                                                                                    <label>Description <span class="text-muted text-danger">*</span></label>
                                                                                    <textarea class="form-control" rows="6" name="list_description[]" required>{{@$accordian2_elements[$i-1]->list_description}}</textarea>
                                                                                    <div class="invalid-feedback">
                                                                                        Please write the description.
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endfor

                                            </div>
                                        </div>
                                        <div class="text-center mt-3" id="accordion2-form-button">
                                            <button id="list2-button-submit" class="btn btn-theme button-1 ctm-border-radius text-white">{{(sizeof(@$accordian2_elements) !== 0) ? "Update Details":"Add Details"}}</button>
                                        </div>
                                    {!! Form::close() !!}
                            @endif

                        @if($value == 'slider_list')
                                    @if(sizeof($slider_list_elements) !== 0)
                                        {!! Form::open(['route' => 'section-elements.tablistUpdate','method'=>'post','class'=>'needs-validation','id'=>'slider-list-form','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
                                    @else
                                        {!! Form::open(['route' => 'section-elements.store','method'=>'post','class'=>'needs-validation','id'=>'slider-list-form','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
                                    @endif
                                            <div id="slider-list-form-ajax">
                                                <img class="img-responsive mb-2" src="{{asset('assets/backend/img/page_sections/list_option_1.png')}}" />

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="card ctm-border-radius shadow-sm flex-fill">
                                                            <div class="card-header">
                                                                <h4 class="card-title mb-0">
                                                                    General Details
                                                                </h4>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="form-group mb-3">
                                                                    <label>Heading <span class="text-muted text-danger">*</span></label>
                                                                    <input type="text" class="form-control" maxlength="20" name="heading[]" value="{{@$slider_list_elements[0]->heading}}" required>
                                                                    <div class="invalid-feedback">
                                                                        Please enter the heading.
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mb-3">
                                                                    <label>Sub Heading <span class="text-muted text-danger">*</span></label>
                                                                    <input type="text" class="form-control" maxlength="70" name="image[]" value="{{@$slider_list_elements[0]->image}}" required>
                                                                    <div class="invalid-feedback">
                                                                        Please enter the subheading.
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="accordion listwo" id="accordion-details">
                                                    <input type="hidden" class="form-control" value="{{@$slider_list_elements}}" name="slider_list_elements">

                                                        @for ($i = 1; $i <=$list_3; $i++)
                                                            <div class="card shadow-sm ctm-border-radius">
                                                                <div class="card-header" id="processelect{{$i}}">
                                                                    <h4 class="cursor-pointer mb-0">
                                                                        <a class="{{($i==1) ? 'coll-arrow d-block text-dark':'coll-arrow d-block text-dark collapsed'}}" href="javascript:void(0)" data-toggle="collapse" data-target="#processelect-heading-{{$i}}" aria-expanded="{{($i==1) ? 'true':'false'}}">
                                                                            Slider List {{$i}} details <span class="text-muted text-danger">*</span>
                                                                        </a>
                                                                    </h4>
                                                                </div>
                                                                <div class="card-body p-0">
                                                                    <div id="processelect-heading-{{$i}}" class="{{($i==1) ? 'collapse show ctm-padding':'collapse ctm-padding'}}" aria-labelledby="processelect{{$i}}" data-parent="#accordion-details" >

                                                                        <div class="row">
                                                                            <div class="col-md-8">

                                                                                <div class="form-group mb-3">
                                                                                    <label>Heading <span class="text-muted text-danger">*</span></label>
                                                                                    <input type="hidden" class="form-control" value="{{$key}}"    name="page_section_id" required>
                                                                                    <input type="hidden" class="form-control" value="{{$value}}"  name="section_name" required>
                                                                                    <input type="hidden" class="form-control" value="{{$list_3}}" name="list_number_3" required>
                                                                                    <input type="hidden" class="form-control" value="{{@$slider_list_elements[$i-1]->id}}" name="id[]">
                                                                                    <input type="text" class="form-control" name="list_header[]" id="slider_title_{{$i-1}}" onclick="slugMaker('slider_title_{{$i-1}}','slider_slug_{{$i-1}}')" value="{{@$slider_list_elements[$i-1]->list_header}}"  required>
                                                                                    <div class="invalid-feedback">
                                                                                        Please enter the heading.
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group mb-3">
                                                                                    <label>Slug </label>
                                                                                    <input type="text" class="form-control" name="subheading[]" id="slider_slug_{{$i-1}}"  value="{{@$slider_list_elements[$i-1]->subheading}}" >
                                                                                    <div class="invalid-feedback">
                                                                                        Please enter the slug.
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="row justify-content-center">
                                                                                    <div class="col-9 mb-4">
                                                                                        <div class="custom-file h-auto">
                                                                                            <div class="avatar-upload">
                                                                                                <div class="avatar-edit">
                                                                                                    <input type="file" class="custom-file-input" hidden id="sliderlist-{{$i}}-image" onchange="loadbasicFile('sliderlist-{{$i}}-image','current-sliderlist-{{$i}}-img',event)" name="list_image[]" {{(@$slider_list_elements[$i-1]->id !== null) ? "":"required" }}>
                                                                                                    <label for="sliderlist-{{$i}}-image"></label>
                                                                                                    <div class="invalid-feedback" style="position: absolute; width: 45px;">
                                                                                                        Please select a image.
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <img id="current-sliderlist-{{$i}}-img" src="<?php if(!empty(@$slider_list_elements[$i-1]->list_image)){ echo '/images/uploads/section_elements/list_1/'.@$slider_list_elements[$i-1]->list_image; } else{  echo '/images/uploads/default-placeholder.png'; } ?>"  alt="sliderlist_{{$i}}_section_image" class="current-img w-100">
                                                                                        </div>
                                                                                        <span class="ctm-text-sm text-danger"> {{(@$slider_list_elements[$i-1]->id !== null) ? "":"*required" }}</span>
                                                                                        <span class="ctm-text-sm">*use image minimum of 770 x 450px for  Slider list {{$i}} element</span>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-12">
                                                                                <div class="form-group mb-3">
                                                                                    <label>Long Description <span class="text-muted text-danger">*</span></label>
                                                                                    <textarea class="form-control" rows="6" name="list_description[]" id="slider-list-{{$i}}" required>{{@$slider_list_elements[$i-1]->list_description}}</textarea>
                                                                                    <span class="ctm-text-sm">*please write a long description</span>
                                                                                    <div class="invalid-feedback">
                                                                                        Please write the long description.
                                                                                    </div>
                                                                                </div>
                                                                            </div>


                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endfor

                                        </div>
                                            </div>
                                            <div class="text-center mt-3" id="slider-list-form-button">
                                                <button id="process-button-submit" class="btn btn-theme button-1 ctm-border-radius text-white">{{(sizeof(@$slider_list_elements) !== 0) ? "Update Details":"Add Details"}}</button>
                                            </div>
                                    {!! Form::close() !!}

                            @endif


                    </div>
                        <?php $j++; ?>
                    @endforeach


                </div>
            </div>
        </div>
    </div>




@endsection

@section('js')
    @include('backend.ckeditor')

{{--    <script src="{{asset('assets/backend/plugins/dropzone/dropzone.js')}}"></script>--}}
{{--    <script src="{{asset('assets/backend/plugins/dropzone/dropzone.config.js')}}"></script>--}}
{{--    <script src="{{asset('assets/backend/plugins/dropzone/dropzone2.config.js')}}"></script>--}}


    <script type="text/javascript">
    $(document).ready(function () {
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });
    });
    </script>

    <script type="text/javascript">
        var section_list = new Array();
        <?php foreach($sections as $key => $val){ ?>
        section_list.push('<?php echo $val; ?>');
        <?php } ?>


        var loadbasicFile = function(id1,id2,event) {
            var image       = document.getElementById(id1);
            var replacement = document.getElementById(id2);
            replacement.src = URL.createObjectURL(event.target.files[0]);
        };

        function reload(){
            location.reload();
        }


        function slugMaker(title, slug){
            $("#"+ title).keyup(function(){
                var Text = $(this).val();
                Text = Text.toLowerCase();
                var regExp = /\s+/g;
                Text = Text.replace(regExp,'-');
                $("#"+slug).val(Text);
            });
        }

        function ElementData(post_url,request_method,form_data,divID,buttonID){
            $.ajax({
                url : post_url,
                type: request_method,
                data : form_data,
                contentType: false,
                cache: false,
                processData:false
            }).done(function(response){
                if (response=="successfully created" || response=="successfully updated"){
                    var replacement = '<div class="col-md-12"><div id="container">' +
                        '<div id="success-box">' +
                        '<div class="face"><div class="eye"></div><div class="eye right"></div><div class="mouth happy"></div>' +
                        '</div>' +
                        '<div class="shadow scale"></div>' +
                        '<div class="message">' +
                        '<h1 class="alert">Successfully Submitted!</h1>' +
                        '<p class="alert-para">The section element has been '+ response +'.</p>' +
                        '</div>' +
                        '<a onclick="reload()" autofocus class="button-box"><h1 class="green">Refresh</h1></a></div></div>' +
                        '</div>';

                }
                else{
                    var replacements = ' <div class="col-md-12"><div id="container"> ' +
                        '<div id="error-box"> ' +
                        '<div class="face2"> ' +
                        '<div class="eye"></div><div class="eye right"></div><div class="mouth sad"></div> ' +
                        '</div> ' +
                        '<div class="shadow scale"></div> ' +
                        '<div class="message2"><h1 class="alert">Error! Something went wrong.</h1><p class="alert-para">The section element could not be created or updated.</div> ' +
                        '<a onclick="reload()" autofocus class="button-box"><h1 class="red">try again</h1></a></div></div> ' +
                        '</div>';
                }
                $('#' + divID).html(replacement);
                document.getElementById("focus-point").scrollIntoView();
                $('#' + buttonID).html("");
            });
        }

        function createEditor ( elementId ) {
           return ClassicEditor
                .create( document.querySelector( '#'+ elementId ), {

                    extraPlugins: [ SimpleUploadAdapterPlugin ],
                    ckfinder: {
                        openerMethod: 'popup',
                        uploadUrl: '/ckfinder/connector.php?command=QuickUpload&type=Files&responseType=json',
                        options: {
                            resourceType: 'Images',
                        },


                    },
                    toolbar: {
                        items: [
                            'heading',
                            '|',
                            'bold',
                            'italic',
                            'link',
                            'bulletedList',
                            'numberedList',
                            '|',
                            'outdent',
                            'indent',
                            '|',
                            'ckfinder',
                            // 'imageInsert',
                            'imageResize',
                            'blockQuote',
                            'insertTable',
                            'mediaEmbed',
                            'undo',
                            'redo',
                            'alignment',
                            'codeBlock',
                            'findAndReplace',
                            'fontBackgroundColor',
                            'fontColor',
                            'fontFamily',
                            'fontSize',
                            'highlight',
                            'horizontalLine',
                            'htmlEmbed',
                            'pageBreak',
                            'removeFormat',
                            'specialCharacters',
                            'sourceEditing',
                            'underline'
                        ]
                    },
                    mediaEmbed: {

                        // Previews are always enabled if there’s a provider for a URL (below regex catches all URLs)
                        // By default `previewsInData` are disabled, but let’s set it to `false` explicitely to be sure
                        previewsInData: true,
                    },
                    link: {
                        // Automatically add target="_blank" and rel="noopener noreferrer" to all external links.
                        addTargetToExternalLinks: true,

                        // Let the users control the "download" attribute of each link.
                        decorators: [
                            {
                                mode: 'manual',
                                label: 'Downloadable',
                                attributes: {
                                    download: 'download'
                                }
                            }
                        ]
                    },
                    language: 'en',
                    image: {
                        toolbar: [
                            'imageTextAlternative',
                            'imageStyle:inline',
                            'imageStyle:block',
                            'imageStyle:side',
                            'imageStyle:alignLeft',
                            'imageStyle:alignRight',
                            'imageStyle:alignBlockLeft',
                            'imageStyle:alignBlockRight',
                            'imageStyle:alignCenter',
                            'linkImage'
                        ]
                    },
                    table: {
                        contentToolbar: [
                            'tableColumn',
                            'tableRow',
                            'mergeTableCells',
                            'tableCellProperties',
                            'tableProperties'
                        ]
                    },

                } )
                .then( editor => {
                    window.editor = editor;
                    editor.model.document.on( 'change:data', () => {
                        $( '#' + elementId).text(editor.getData());
                    } );
                    // Simulate label behavior if textarea had a label
                    if (editor.sourceElement.labels.length > 0) {
                        editor.sourceElement.labels[0].addEventListener('click', e => editor.editing.view.focus());
                    }
                } )
                .catch( error => {
                    console.error( error );
                } );
        }


        $(document).ready(function () {
            if(section_list.includes("basic_section")) {
                createEditor('basic_editor');
            }

            if(section_list.includes("simple_header_and_description")){
                createEditor('header_descp_editor');
            }
            if(section_list.includes("simple_tab_list")){
                createEditor('tab_list_desc_1');
                createEditor('tab_list_desc_2');
            }

            if(section_list.includes("flash_cards")){
                createEditor('mission_one');
                createEditor('vision_one');
                createEditor('goal_one');
            }

            if(section_list.includes("slider_list")){
                var list3 = "{{$list_3}}";
                for ($i = 1; $i <=list3; $i++){
                    createEditor('slider-list-'+$i);
                }
            }

        });

        if($.inArray("basic_section", section_list) !== -1) {

            $("#basic-form").submit(function(event){
                event.preventDefault(); //prevent default action
                if (!this.checkValidity()) { return false; }
                var post_url       = $(this).attr("action"); //get form action url
                var request_method = $(this).attr("method"); //get form GET/POST method
                var form_data      = new FormData(this); //Creates new FormData object
                var divID          = $(this).attr('id')+'-ajax';
                var buttonID       = $(this).attr('id')+'-button';
                ElementData(post_url,request_method,form_data,divID,buttonID);

            });

        }

        if($.inArray("image_description_section", section_list) !== -1) {

            $("#image_description_section-form").submit(function(event){
                event.preventDefault(); //prevent default action
                if (!this.checkValidity()) { return false; }
                var post_url       = $(this).attr("action"); //get form action url
                var request_method = $(this).attr("method"); //get form GET/POST method
                var form_data      = new FormData(this); //Creates new FormData object
                var divID          = $(this).attr('id')+'-ajax';
                var buttonID       = $(this).attr('id')+'-button';
                ElementData(post_url,request_method,form_data,divID,buttonID);

            });

        }

        if($.inArray("call_to_action_1", section_list) !== -1) {
            $("#call-action1-form").submit(function(event){
                event.preventDefault(); //prevent default action
                if (!this.checkValidity()) { return false;}

                var post_url       = $(this).attr("action"); //get form action url
                var request_method = $(this).attr("method"); //get form GET/POST method
                var form_data      = new FormData(this); //Creates new FormData object
                var divID          = $(this).attr('id')+'-ajax';
                var buttonID       = $(this).attr('id')+'-button';
                ElementData(post_url,request_method,form_data,divID,buttonID);

            });
        }

        if($.inArray("call_to_action_2", section_list) !== -1) {
            $("#call-action2-form").submit(function(event){
                event.preventDefault(); //prevent default action
                if (!this.checkValidity()) { return false;}

                var post_url       = $(this).attr("action"); //get form action url
                var request_method = $(this).attr("method"); //get form GET/POST method
                var form_data      = new FormData(this); //Creates new FormData object
                var divID          = $(this).attr('id')+'-ajax';
                var buttonID       = $(this).attr('id')+'-button';
                ElementData(post_url,request_method,form_data,divID,buttonID);

            });
        }

        if($.inArray("simple_tab_list", section_list) !== -1) {
            $("#simple-tab-list-form").submit(function(event){
                event.preventDefault(); //prevent default action
                if (!this.checkValidity()) { return false;}

                var post_url       = $(this).attr("action"); //get form action url
                var request_method = $(this).attr("method"); //get form GET/POST method
                var form_data      = new FormData(this); //Creates new FormData object
                var divID          = $(this).attr('id')+'-ajax';
                var buttonID       = $(this).attr('id')+'-button';
                ElementData(post_url,request_method,form_data,divID,buttonID);

            });
        }

        if($.inArray("flash_cards", section_list) !== -1) {
            $("#flash-card-form").submit(function(event){
                if (!this.checkValidity()) { return false;}

                event.preventDefault(); //prevent default action
                var post_url       = $(this).attr("action"); //get form action url
                var request_method = $(this).attr("method"); //get form GET/POST method
                var form_data      = new FormData(this); //Creates new FormData object
                var divID          = $(this).attr('id')+'-ajax';
                var buttonID       = $(this).attr('id')+'-button';
                ElementData(post_url,request_method,form_data,divID,buttonID);
            });
        }

        if($.inArray("simple_header_and_description", section_list) !== -1) {
            $("#header-descp-form").submit(function(event){
                event.preventDefault(); //prevent default action
                if (!this.checkValidity()) { return false;}

                var post_url       = $(this).attr("action"); //get form action url
                var request_method = $(this).attr("method"); //get form GET/POST method
                var form_data      = new FormData(this); //Creates new FormData object
                var divID          = $(this).attr('id')+'-ajax';
                var buttonID       = $(this).attr('id')+'-button';
                ElementData(post_url,request_method,form_data,divID,buttonID);
            });
        }

        if($.inArray("accordion_section_1", section_list) !== -1) {

            $("#accordian1-form").submit(function(event){
                event.preventDefault(); //prevent default action
                if (!this.checkValidity()) { return false;}
                var post_url       = $(this).attr("action"); //get form action url
                var request_method = $(this).attr("method"); //get form GET/POST method
                var form_data      = new FormData(this); //Creates new FormData object
                var divID          = $(this).attr('id')+'-ajax';
                var buttonID       = $(this).attr('id')+'-button';

                    ElementData(post_url,request_method,form_data,divID,buttonID);

            });
        }

        if($.inArray("accordion_section_2", section_list) !== -1) {

            $("#accordion2-form").submit(function(event){
                event.preventDefault(); //prevent default action
                if (!this.checkValidity()) { return false;}
                var post_url       = $(this).attr("action"); //get form action url
                var request_method = $(this).attr("method"); //get form GET/POST method
                var form_data      = new FormData(this); //Creates new FormData object
                var divID          = $(this).attr('id')+'-ajax';
                var buttonID       = $(this).attr('id')+'-button';
                ElementData(post_url,request_method,form_data,divID,buttonID);

            });
        }

        if($.inArray("slider_list", section_list) !== -1) {

            $("#slider-list-form").submit(function(event){
                event.preventDefault(); //prevent default action
                if (!this.checkValidity()) { return false;}
                var post_url       = $(this).attr("action"); //get form action url
                var request_method = $(this).attr("method"); //get form GET/POST method
                var form_data      = new FormData(this); //Creates new FormData object
                var divID          = $(this).attr('id')+'-ajax';
                var buttonID       = $(this).attr('id')+'-button';
                ElementData(post_url,request_method,form_data,divID,buttonID);

            });
        }

        if($.inArray("contact_information", section_list) !== -1) {

            $("#contact-info-form").submit(function(event){
                event.preventDefault(); //prevent default action
                if (!this.checkValidity()) { return false;}
                var post_url       = $(this).attr("action"); //get form action url
                var request_method = $(this).attr("method"); //get form GET/POST method
                var form_data      = new FormData(this); //Creates new FormData object
                var divID          = $(this).attr('id')+'-ajax';
                var buttonID       = $(this).attr('id')+'-button';
                ElementData(post_url,request_method,form_data,divID,buttonID);

            });
        }

    </script>


@endsection
