@extends('backend.layouts.master')
@section('title') Core Values @endsection
@section('css')

    <style>

        .ck-editor__editable_inline {
            min-height: 150px !important;
        }

        /*for image*/
        .avatar-upload{
            max-width: 505px!important;
        }

        .current-img{
            border: 6px solid #f3f3f3;
            border-radius: 10px;
        }

        #cat-img{
            border: 6px solid #f3f3f3;
            border-radius: 10px;
            width: 250px;
            height: auto;
        }
        /*end for image*/

        .select2{
            width: 100%!important;
        }

    </style>
@endsection
@section('content')

    <div class="col-xl-9 col-lg-8 col-md-12">

        {!! Form::open(['route' => 'core-values.store','method'=>'post','class'=>'needs-validation','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
        <div class="row">
            <div class="col-md-6">
                <div class="card ctm-border-radius shadow-sm grow flex-fill">
                    <div class="card-header">
                        <h4 class="card-title mb-0">
                            Core Value Image Details <span class="text-muted text-danger">*</span>
                        </h4>
                    </div>
                    <div class="card-body">

                        <div class="row justify-content-center">
                            <div class="col-6 mb-4">
                                <div class="custom-file h-auto">
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type="file"  accept="image/png, image/jpeg" class="custom-file-input" hidden id="imageUpload" onchange="loadbasicFile('imageUpload','current-img',event)" name="image" required>
                                            <label for="imageUpload"></label>
                                            <div class="invalid-feedback" style="position: absolute; width: 45px;">
                                                Please select a image.
                                            </div>
                                        </div>
                                    </div>
                                    <img id="current-img" src="{{asset('/images/uploads/profiles/default-profile.png')}}" alt="blog_image" class="w-100 current-img">
                                </div>
                                <span class="ctm-text-sm">*use image minimum of 128 x 128px for core values. Let the image be PNG</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="card ctm-border-radius shadow-sm grow flex-fill">
                    <div class="card-header">
                        <h4 class="card-title mb-0">
                            Core Value details
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Heading <span class="text-muted text-danger">*</span></label>
                            <input type="text" class="form-control" maxlength="25" name="heading" required>
                            <div class="invalid-feedback">
                                Please enter the heading.
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Short Description <span class="text-muted text-danger">*</span></label>
                            <textarea class="form-control" maxlength="180" rows="6" name="description" required></textarea>
                            <div class="invalid-feedback">
                                Please write the short description.
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-theme button-1 text-white ctm-border-radius mt-4" >Add Value</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}


        <div class="row">
            <div class="col-md-12">
                <div class="company-doc">
                    <div class="card ctm-border-radius shadow-sm grow">
                        <div class="card-header">
                            <h4 class="card-title d-inline-block mb-0">
                                Value List
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="employee-office-table">
                                <div class="table-responsive">
                                    <table id="values-index" class="table custom-table">
                                        <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Heading</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(@$values)
                                            @foreach($values as  $core)
                                                <tr>
                                                    <td class="align-middle pt-6 pb-4 px-6">
                                                        <div class="avatar-upload">
                                                            <div class="blog-preview">
                                                                <img id="cat-img" src="{{asset('/images/uploads/values/'.$core->image)}}" />
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{$core->heading}}</td>
                                                    <td class="text-right">
                                                        <div class="dropdown action-label drop-active">
                                                            <a href="javascript:void(0)" class="btn btn-white btn-sm" data-toggle="dropdown" aria-expanded="false"> <span class="lnr lnr-cog"></span>
                                                            </a>
                                                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 31px, 0px);">
                                                                <a class="dropdown-item action-edit" href="#" hrm-update-action="{{route('core-values.update',$core->id)}}" hrm-edit-action="{{route('core-values.edit',$core->id)}}"> Edit </a>
                                                                <a class="dropdown-item action-delete" href="#" hrm-delete-per-action="{{route('core-values.destroy',$core->id)}}"> Delete </a>
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

    <div class="modal fade bd-example-modal-lg" id="editValues">
        <form action="#" method="post" id="deleted-form" >
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
        </form>
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                {!! Form::open(['method'=>'PUT','class'=>'needs-validation updatecorevalues','novalidate'=>'','enctype'=>'multipart/form-data']) !!}

                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title mb-3">Edit Core Values</h4>

                    <div class="row">
                        <div class="col-md-7">
                            <div class="card ctm-border-radius shadow-sm flex-fill">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">
                                        Core Value Image Details <span class="text-muted text-danger">*</span>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-6 mb-4">
                                            <div class="custom-file h-auto">
                                                <div class="avatar-upload">
                                                    <div class="avatar-edit">
                                                        <input type="file" class="custom-file-input" hidden id="image-edit" onchange="loadbasicFile('image-edit','current-edit-img',event)" name="image">
                                                        <label for="image-edit"></label>
                                                        <div class="invalid-feedback" style="position: absolute; width: 45px;">
                                                            Please select a image.
                                                        </div>
                                                    </div>
                                                </div>
                                                <img id="current-edit-img" src="{{asset('/images/uploads/profiles/default-profile.png')}}" alt="client_image" class="w-100 current-img">
                                            </div>
                                            <span class="ctm-text-sm">*use image minimum of 128 x 128px for core values. Let the image be PNG.</span>
                                        </div>

                                    </div>



                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="card ctm-border-radius shadow-sm flex-fill">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">
                                        Core Value Details
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group mb-3">
                                        <label>Heading <span class="text-muted text-danger">*</span></label>
                                        <input type="text" class="form-control" maxlength="25" name="heading" id="heading-edit" required>
                                        <div class="invalid-feedback">
                                            Please enter the heading.
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label>Short Description <span class="text-muted text-danger">*</span></label>
                                        <textarea class="form-control" maxlength="180" rows="6" name="description" id="description-edit" required></textarea>
                                        <div class="invalid-feedback">
                                            Please write the short description.
                                        </div>
                                    </div>
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
    <script src="{{asset('assets/backend/plugins/ckeditor/ckeditor.js')}}"></script>

    <script type="text/javascript">

        var loadbasicFile = function(id1,id2,event) {
            var image       = document.getElementById(id1);
            var replacement = document.getElementById(id2);
            replacement.src = URL.createObjectURL(event.target.files[0]);
        };




        $(document).ready(function () {
            $('.select2').select2();
            $('#values-index').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            });


            $(document).on('click', '.action-edit', function (e) {
                e.preventDefault();
                var url = $(this).attr('hrm-edit-action');
                var action = $(this).attr('hrm-update-action');
                $.ajax({
                    url: $(this).attr('hrm-edit-action'),
                    type: "GET",
                    cache: false,
                    dataType: 'json',
                    success: function (dataResult) {
                        // $('#id').val(data.id);
                        console.log(dataResult.edit.description);
                        $("#editValues").modal("toggle");
                        $('#heading-edit').attr('value', dataResult.edit.heading);
                        $('#description-edit').text(dataResult.edit.description);
                        $('#current-edit-img').attr("src", '/images/uploads/values/' + dataResult.edit.image);
                        $('.updatecorevalues').attr('action', action);

                    },
                    error: function (error) {
                        console.log(error)
                    }
                });
            });

            $(document).on('click', '.action-delete', function (e) {
                e.preventDefault();
                var form = $('#deleted-form');
                var action = $(this).attr('hrm-delete-per-action');
                form.attr('action', $(this).attr('hrm-delete-per-action'));
                $url = form.attr('action');
                var form_data = form.serialize();
                swal({
                    title: "Are You Sure?",
                    text: "You will not be able to recover this",
                    type: "info",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true,
                }, function () {
                    $.post($url, form_data)
                        .done(function (response) {
                            swal("Deleted!", "Core Value Deleted Successfully", "success");
                            $(response).remove();
                            setTimeout(function () {
                                window.location.reload();
                            }, 2500);


                        })
                        .fail(function (response) {
                            console.log(response)

                        });
                });

            });
        });


    </script>
@endsection



