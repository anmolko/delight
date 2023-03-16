@extends('backend.layouts.master')
@section('title') Job @endsection
@section('css')

    <style>
        /*for tab*/
        li.button-5 a{
            color: #FFFFFF;
        }

        li.button-6 a{
            color: #000000;
        }

        /*end for tab*/

        /*for image*/
        .avatar-upload{
            max-width: 505px!important;
        }

        .current-img{
            border: 6px solid #f3f3f3;
            border-radius: 10px;
        }

        #blog-img{
            border: 6px solid #f3f3f3;
            border-radius: 10px;
            width: 400px;
            height: 150px;
        }

        /*end for image*/

        .ck-editor__editable_inline {
            min-height: 150px !important;
        }

        .avatar-upload .blog-preview{
            width: 180px;
            height: 150px;
            position: relative;
        }

        .ck.ck-balloon-panel {
            z-index: 1050 !important;
        }



    </style>
@endsection
@section('content')

    <div class="col-xl-9 col-lg-8  col-md-12">
        <div class="card shadow-sm ctm-border-radius">
            <div class="card-body align-center">
                <ul class="nav flex-row nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item mr-2">
                        <a class="nav-link active mb-2" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Job</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false"> Job Category </a>
                    </li>

                </ul>
            </div>
        </div>

        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                {{-- Tab content --}}
                <div class="col-xl-12 col-lg-12 col-md-12">
                    {!! Form::open(['route' => 'job.store','method'=>'post','class'=>'needs-validation','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card ctm-border-radius shadow-sm flex-fill">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">
                                        Job Details
                                    </h4>
                                </div>

                                <div class="card-body">
                                    <div class="form-group mb-3">
                                        <label>Job Category </label>
                                        <select class="form-control custom-select2 select2" name="job_category_id[]" multiple="multiple">
                                            @if(!empty(@$categories))
                                                @foreach(@$categories as $categoryList)
                                                    <option value="{{ @$categoryList->id }}" >{{ ucwords(@$categoryList->name) }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select a job category.
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label>Job Name <span class="text-muted text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name" id="job_name"  required>
                                        <div class="invalid-feedback">
                                            Please enter the job name.
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Job Display Title </label>
                                        <input type="text" class="form-control" name="title" id="job_title">
                                        <div class="invalid-feedback">
                                            Please enter the job display title.
                                        </div>
                                    </div>

                                </div>


                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card ctm-border-radius shadow-sm flex-fill">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">
                                        Job Image
                                    </h4>
                                </div>

                                <div class="card-body">

                                    <div class="flex-fill">
                                        <div class="row justify-content-center">
                                            <div class="col-9 mb-3">
                                                <div class="custom-file h-auto">
                                                    <div class="avatar-upload">
                                                        <div class="avatar-edit">
                                                            <input type="file"  accept="image/png, image/jpeg" class="custom-file-input" hidden id="imagejobUpload" onchange="loadbasicFile('imagejobUpload','current-job-img',event)"  name="image">
                                                            <label for="imagejobUpload"></label>
                                                            <div class="invalid-feedback" style="position: absolute; width: 45px;">
                                                                Please select a image.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <img id="current-job-img" src="{{asset('/images/uploads/default-placeholder.png')}}" alt="job_image" class="w-100 current-img">
                                                </div>
                                            </div>

                                        </div>
                                    </div>


                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card ctm-border-radius shadow-sm flex-fill">

                                <div class="card-body">
                                    <div class="form-group mb-3">
                                        <label>Start Date <span class="text-muted text-danger">*</span></label>
                                        <input type="text" class="form-control datetimepicker" name="start_date" id="start_date" required>
                                        <div class="invalid-feedback">
                                            Please Select the start date.
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label> End Date <span class="text-muted text-danger">*</span></label>
                                        <input type="text" class="form-control datetimepicker" name="end_date" id="end_date" required>
                                        <div class="invalid-feedback">
                                            Please Select the end date.
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label>LT Number </label>
                                        <input type="text" class="form-control" name="lt_number">
                                        <div class="invalid-feedback">
                                            Please enter the LT Number.
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Select Company Name </label>
                                        <select class="form-control custom-select2 select2" name="client_ids[]" multiple>
                                            @if(!empty(@$clients))
                                                @foreach(@$clients as $clientList)
                                                    <option value="{{ @$clientList->id }}" >{{ ucwords(@$clientList->name) }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        <div class="invalid-feedback">
                                            Please select company name.
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label>Additional Company Name </label>
                                        <input type="text" class="form-control" name="extra_company">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Required Number of Jobs </label>
                                        <input type="text" class="form-control" name="required_number">
                                        <div class="invalid-feedback">
                                            Please enter the required number of jobs.
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Salary </label>
                                        <input type="text" min="1" class="form-control" name="salary">
                                        <div class="invalid-feedback">
                                            Please enter the salary.
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Min Qualification </label>
                                        <select class="form-control shadow-none" name="min_qualification">
                                            <option value disabled selected> Select Min Qualification</option>
                                            <option value="none">None</option>
                                            <option value="primary education">Primary Education </option>
                                            <option value="secondary education">Secondary Education</option>
                                            <option value="SEE pass">SEE Pass</option>
                                            <option value="intermediate pass">Intermediate Pass</option>
                                            <option value="bachelor pass">Bachelor Pass</option>
                                            <option value="post graduate pass">Post Graduate Pass</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please enter the Min Qualification.
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Description </label>
                                        <textarea class="form-control" rows="6" name="description" id="description_editor"></textarea>
                                        <div class="invalid-feedback">
                                            Please enter the description.
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label> Form Link </label>
                                        <input type="url" class="form-control" name="formlink" id="formlink" >
                                        <div class="invalid-feedback">
                                            Please enter the form link.
                                        </div>
                                        <span class="ctm-text-sm">*Paste the from link from here to use it in the frontend</span>
                                    </div>

                                    <div class="text-center mt-3">
                                        <button type="submit" class="btn btn-theme text-white ctm-border-radius button-1">Add Job Information</button>
                                    </div>


                                </div>


                            </div>
                        </div>

                    </div>
                    {!! Form::close() !!}

                    {{--jobs table--}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="company-doc">
                                <div class="card ctm-border-radius shadow-sm">
                                    <div class="card-header">
                                        <h4 class="card-title d-inline-block mb-0">
                                            Job List
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="employee-office-table">
                                            <div class="table-responsive">
                                                <table id="job-index-table" class="table custom-table">
                                                    <thead>
                                                    <tr>
                                                        <th>Image</th>
                                                        <th>Job Name</th>
                                                        <th>Job Category</th>
                                                        <th>Country</th>
                                                        <th>Company</th>
                                                        <th>Salary</th>
                                                        <th>Start - End date</th>
                                                        <th class="text-right">Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if(@$jobs)
                                                        @foreach($jobs as  $job)
                                                            <tr>
                                                                <td class="align-middle pt-6 pb-4 px-6">
                                                                    <div class="avatar-upload">
                                                                        <div class="blog-preview">
                                                                            <img id="blog-img" src="{{ ($job->image !== null) ? asset('/images/uploads/jobs/'.@$job->image): asset('assets/frontend/images/delight.png')   }}" alt="{{@$job->slug}}"/>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>{{ucfirst(@$job->name)}}</td>
                                                                <td>
                                                                    {{ $job->getJobCategories($job->category_ids) }}
                                                                </td>
                                                                <td>  <?php $index = 0; ?>
                                                                    @if($job->getCountryKey($job->client_ids))
                                                                        @foreach ($job->getCountryKey($job->client_ids) as $value)
                                                                            {{ $job->getCountryName($value)}} {{ ($loop->last) ? '':', ' }}
                                                                        @endforeach
                                                                    @endif
                                                                </td>
                                                                <td>{{ $job->getClientName($job->client_ids) }}
                                                                    {{ ($job->extra_company !== null) ? ', '.$job->extra_company:"" }}
                                                                </td>

                                                                <td>{{@$job->salary ?? 'N/A'}}</td>
                                                                <td>{{@\Carbon\Carbon::parse($job->start_date)->isoFormat('MMMM Do, YYYY')}} - {{@\Carbon\Carbon::parse($job->end_date)->isoFormat('MMMM Do, YYYY')}}</td>
                                                                <td class="text-right">
                                                                    <div class="dropdown action-label drop-active">
                                                                        <a href="javascript:void(0)" class="btn btn-white btn-sm" data-toggle="dropdown" aria-expanded="false"> <span class="lnr lnr-cog"></span>
                                                                        </a>
                                                                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 31px, 0px);">
                                                                            <a class="dropdown-item" href="{{route('job.single',$job->slug)}}" target="_blank"> Frontend view </a>
                                                                            <a class="dropdown-item action-job-edit" href="#" hrm-update-action="{{route('job.update',$job->id)}}" hrm-edit-action="{{route('job.edit',$job->id)}}"> Edit </a>
                                                                            @if(@$job->formlink)
                                                                                <a class="dropdown-item" href="{{@$job->formlink}}" target="_blank" > View Form Submission </a>
                                                                            @endif
                                                                            <a class="dropdown-item action-job-delete" href="#" hrm-delete-per-action="{{route('job.destroy',$job->id)}}"> Delete </a>
                                                                        </div>
                                                                    </div>

                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End of Tab content --}}

            </div>

            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                {{--  Tab content--}}
                <div class="row">
                    <div class="col-md-4">
                        <div class="card ctm-border-radius shadow-sm flex-fill">
                            <div class="card-header">
                                <h4 class="card-title mb-0">
                                    Add Job Category
                                </h4>
                            </div>
                            {!! Form::open(['route' => 'jobcategory.store','method'=>'post','class'=>'needs-validation','novalidate'=>'','enctype'=>'multipart/form-data']) !!}

                            <div class="card-body">
                                <div class="form-group mb-3">
                                    <label>Service Category </label>
                                    <select class="form-control" name="service_category_id" required>
                                        <option value disabled selected>Select service Category</option>
                                        @if(!empty(@$service_categories))
                                            @foreach(@$service_categories as $serviceList)
                                                <option value="{{ @$serviceList->id }}" >{{ ucwords(@$serviceList->name) }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    <div class="invalid-feedback">
                                        Please select a service category.
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Category Name <span class="text-muted text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" onkeyup="slugMaker('name','slug')" id="name" required>
                                    <div class="invalid-feedback">
                                        Please enter the category name.
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <button type="submit" class="btn btn-theme text-white ctm-border-radius button-1">Add Category Information</button>
                                </div>


                            </div>

                            {!! Form::close() !!}

                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card ctm-border-radius shadow-sm flex-fill">
                            <div class="card-header">
                                <h4 class="card-title mb-0">
                                    Category List
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="employee-office-table">
                                    <div class="table-responsive">
                                        <table id="job-category-index" class="table custom-table">
                                            <thead>
                                            <tr>
                                                <th>Service Category</th>
                                                <th>Name</th>
                                                <th>Slug</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(!empty($categories))
                                                @foreach($categories as  $categoryList)
                                                    <tr>
                                                        <td>{{ ucwords(@\App\Models\ServiceCategory::find($categoryList->service_category_id)->name) }}</td>
                                                        <td>{{ ucwords(@$categoryList->name) }}</td>
                                                        <td>{{ @$categoryList->slug }}</td>
                                                        <td class="text-right">
                                                            <div class="dropdown action-label drop-active">
                                                                <a href="javascript:void(0)" class="btn btn-white btn-sm" data-toggle="dropdown" aria-expanded="false"> <span class="lnr lnr-cog"></span>
                                                                </a>
                                                                <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 31px, 0px);">
                                                                    <a class="dropdown-item action-edit" href="#" hrm-update-action="{{route('jobcategory.update',$categoryList->id)}}" hrm-edit-action="{{route('jobcategory.edit',$categoryList->id)}}"> Edit </a>
                                                                    <a class="dropdown-item action-delete" href="#" hrm-delete-per-action="{{route('jobcategory.destroy',$categoryList->id)}}"> Delete </a>
                                                                </div>
                                                            </div>

                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                {{--  End Tab content--}}
            </div>

        </div>
    </div>





    <div class="modal fade" id="edit_job_category">
        <form action="#" method="post" id="deleted-form" >
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
        </form>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                {!! Form::open(['method'=>'PUT','class'=>'needs-validation updatejobcategory','novalidate'=>'','enctype'=>'multipart/form-data']) !!}

                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title mb-3">Edit Job Category</h4>
                    <div class="form-group mb-3">
                        <label>Service Category</label>
                        <select class="form-control" name="service_category_id" id="service_category_id">
                            <option value disabled selected>Select service Category</option>
                            @if(!empty(@$service_categories))
                                @foreach(@$service_categories as $serviceList)
                                    <option value="{{ @$serviceList->id }}" >{{ ucwords(@$serviceList->name) }}</option>
                                @endforeach
                            @endif
                        </select>
                        <div class="invalid-feedback">
                            Please select a service category.
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label>Category Name </label>
                        <input type="text" class="form-control" name="name" id="cat_name" required>
                        <div class="invalid-feedback">
                            Please enter the category name.
                        </div>
                    </div>

                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-theme text-white ctm-border-radius button-1">Update Category Information</button>
                    </div>

                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="edit_job">
        <form action="#" method="post" id="deleted-form" >
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
        </form>
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                {!! Form::open(['method'=>'PUT','class'=>'needs-validation updatejob','novalidate'=>'','enctype'=>'multipart/form-data']) !!}

                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title mb-3">Edit Job </h4>

                    <div class="form-group mb-3">
                        <label>Job Category </label>
                        <select class="form-control custom-select2 select2" name="job_category_id[]" id="job_category_id" multiple="multiple">
                            @if(!empty(@$categories))
                                @foreach(@$categories as $categoryList)
                                    <option value="{{ @$categoryList->id }}" >{{ ucwords(@$categoryList->name) }}</option>
                                @endforeach
                            @endif
                        </select>
                        <div class="invalid-feedback">
                            Please select a job category.
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label>Job Name <span class="text-muted text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" id="job_update_name" required>
                        <div class="invalid-feedback">
                            Please enter the job name.
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label>Job Display Title </label>
                        <input type="text" class="form-control" name="title" id="job_update_title">
                        <div class="invalid-feedback">
                            Please enter the job display title.
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label>Start Date <span class="text-muted text-danger">*</span></label>
                        <input type="text" class="form-control datetimepicker" name="start_date" id="start_date_edit" required>
                        <div class="invalid-feedback">
                            Please Select the start date.
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label> End Date <span class="text-muted text-danger">*</span></label>
                        <input type="text" class="form-control datetimepicker" name="end_date" id="end_date_edit" required>
                        <div class="invalid-feedback">
                            Please Select the end date.
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label>LT Number </label>
                        <input type="text" class="form-control" name="lt_number" id="lt_number">
                        <div class="invalid-feedback">
                            Please enter the LT Number.
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label>Select Company Name </label>
                        <select class="form-control custom-select2 select2" name="client_ids[]" id="client_id" multiple>
                            @if(!empty(@$clients))
                                @foreach(@$clients as $clientList)
                                    <option value="{{ @$clientList->id }}" >{{ ucwords(@$clientList->name) }}</option>
                                @endforeach
                            @endif
                        </select>
                        <div class="invalid-feedback">
                            Please select company name.
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label>Additional Company Name </label>
                        <input type="text" class="form-control" name="extra_company" id="extra_company">
                    </div>

                    <div class="form-group mb-3">
                        <label>Required Number of Jobs </label>
                        <input type="text" class="form-control" id="required_number" name="required_number">
                        <div class="invalid-feedback">
                            Please enter the required number of jobs.
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label>Salary </label>
                        <input type="text" class="form-control" id="salary" name="salary">
                        <div class="invalid-feedback">
                            Please enter the salary.
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label>Min Qualification </label>
                        <select class="form-control shadow-none" name="min_qualification" id="min_qualification">
                            <option value disabled> Select Min Qualification</option>
                            <option value="none">None</option>
                            <option value="primary education">Primary Education </option>
                            <option value="secondary education">Secondary Education</option>
                            <option value="SEE pass">SEE Pass</option>
                            <option value="intermediate pass">Intermediate Pass</option>
                            <option value="bachelor pass">Bachelor Pass</option>
                            <option value="post graduate pass">Post Graduate Pass</option>
                        </select>
                        <div class="invalid-feedback">
                            Please enter the Min Qualification.
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label>Description </label>
                        <textarea class="form-control" rows="6" name="description" id="description_edit" ></textarea>
                        <div class="invalid-feedback">
                            Please enter the description.
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label> Form Link </label>
                        <input type="url" class="form-control" name="formlink" id="formlink_edit">
                        <div class="invalid-feedback">
                            Please enter the form link.
                        </div>
                        <span class="ctm-text-sm">*Paste the from link from here to use it in the frontend</span>
                    </div>

                    <div class="card ctm-border-radius shadow-sm flex-fill">
                        <div class="row justify-content-center">
                            <div class="col-9 mb-4">
                                <div class="custom-file h-auto">
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type="file"  accept="image/png, image/jpeg" class="custom-file-input" hidden id="imageUploadjob" onchange="loadbasicFile('imageUploadjob','current-update-job-img',event)" name="image">
                                            <label for="imageUploadjob"></label>
                                            <div class="invalid-feedback" style="position: absolute; width: 45px;">
                                                Please select a image.
                                            </div>
                                        </div>
                                    </div>
                                    <img id="current-update-job-img" src="{{asset('/images/uploads/default-placeholder.png')}}" alt="job_image" class="w-100 current-img">
                                </div>
                            </div>

                        </div>
                    </div>


                    <button type="button" class="btn btn-danger float-right ml-3" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-theme text-white ctm-border-radius float-right button-1 mb-4">Update</button>
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>


@endsection

@section('js')
    <script src="{{asset('assets/backend/plugins/ckeditor/ckeditor.js')}}"></script>
    <script type="text/javascript">

        var loadbasicFile = function(id1,id2,event) {
            var image       = document.getElementById(id1);
            var replacement = document.getElementById(id2);
            replacement.src = URL.createObjectURL(event.target.files[0]);
        };

        function createEditor ( elementId ) {
            return ClassicEditor
                .create( document.querySelector( '#' + elementId ), {
                    toolbar : {
                        items: [
                            'heading', '|',
                            'bold', 'italic', 'link', '|',
                            'outdent', 'indent', '|',
                            'bulletedList', 'numberedList', '|',
                            'insertTable', 'blockQuote', '|',
                            'undo', 'redo'
                        ],
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
                } )
                .then( editor => {
                    window.editor = editor;
                    editor.model.document.on( 'change:data', () => {
                        $( '#' + elementId).text(editor.getData());
                    } );

                } )
                .catch( err => {
                    console.error( err.stack );
                } );
        }

        $(document).ready(function () {
            $('#job-category-index, #job-index-table').DataTable({
                paging: true,
                searching: true,
                ordering:  true,
                lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            });

            $('.custom-select2').select2({
                placeholder: "Select here",
                minimumResultsForSearch:-1,width:'100%'}
            )
            createEditor('description_editor');
            createEditor('description_edit');

        });

        function slugMaker(title, slug){
            $("#"+ title).keyup(function(){
                var Text = $(this).val();
                Text = Text.toLowerCase();
                var regExp = /\s+/g;
                Text = Text.replace(regExp,'-');
                $("#"+slug).val(Text);
            });
        }


        //job category
        $(document).on('click','.action-edit', function (e) {
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
                    console.log(dataResult)
                    // $('#id').val(data.id);
                    $("#edit_job_category").modal("toggle");
                    $('#cat_name').attr('value',dataResult.edit.name);
                    $('#service_category_id option[value="'+dataResult.edit.service_category_id+'"]').prop('selected', true);
                    $('.updatejobcategory').attr('action',action);
                },
                error: function(error){
                    console.log(error)
                }
            });
        });

        $(document).on('click','.action-delete', function (e) {
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
                        if(response == 0){
                            swal({
                                title: "Warning.",
                                text: "You need to Remove Assigned Jobs",
                                type: "info",
                                showCancelButton: true,
                                closeOnConfirm: false,
                                showLoaderOnConfirm: true,
                            }, function(){
                                //window.location.href = ""
                                swal.close();
                            })

                        }else{

                            swal("Deleted!", "Deleted Successfully", "success");
                            // toastr.success('file deleted Successfully');
                            $(response).remove();
                            setTimeout(function() {
                                window.location.reload();
                            }, 2500);
                        }

                    })
                    .fail(function(response){
                        console.log(response)

                    });
            })

        })
        // end of job category

        //job
        $(document).on('click','.action-job-edit', function (e) {
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
                    $("#edit_job").modal("toggle");
                    console.log(dataResult);
                    editor.setData('');
                    if(dataResult.edit.image != null){
                        $('#current-update-job-img').attr("src",'/images/uploads/jobs/'+dataResult.edit.image);
                    }

                    if(dataResult.edit.category_ids !== null){
                        let category_id = dataResult.edit.category_ids;
                        const split_string = category_id.split(",");
                        $("#job_category_id").val(split_string).trigger('change');
                    }

                    if(dataResult.edit.client_ids !== null){
                        let client_id = dataResult.edit.client_ids;
                        const split_string = client_id.split(",");
                        $("#client_id").val(split_string).trigger('change');
                    }

                    $('#min_qualification option[value="'+dataResult.edit.min_qualification+'"]').prop('selected', true);
                    $('#lt_number').attr('value',dataResult.edit.lt_number);
                    $('#job_update_name').attr('value',dataResult.edit.name);
                    $('#job_update_title').attr('value',dataResult.edit.title);
                    $('#required_number').attr('value',dataResult.edit.required_number);
                    $('#extra_company').attr('value',dataResult.edit.extra_company);
                    $('#salary').attr('value',dataResult.edit.salary);
                    $('#start_date_edit').attr('value',dataResult.start);
                    $('#end_date_edit').attr('value',dataResult.end);
                    if(dataResult.edit.formlink !== null){
                        $('#formlink_edit').attr('value',dataResult.edit.formlink);
                    }
                    if(dataResult.edit.description !== null){
                        editor.setData( dataResult.edit.description );
                    }
                    $('.updatejob').attr('action',action);

                },
                error: function(error){
                    console.log(error)
                }
            });
        });

        $(document).on('click','.action-job-delete', function (e) {
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


                        swal("Deleted!", "Job Deleted Successfully", "success");
                        $(response).remove();
                        setTimeout(function() {
                            window.location.reload();
                        }, 2500);


                    })
                    .fail(function(response){
                        console.log(response)
                    });
            })

        })
        // end of job






    </script>
@endsection
