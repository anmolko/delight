@extends('backend.layouts.master')
@section('title') Testimonials @endsection
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

        #testimonial-img{
            border: 6px solid #f3f3f3;
            border-radius: 10px;
        }

        .image-size{
            width: 130px;
            height: 130px;
        }

        /*end for image*/

        .table-responsive {
            white-space: inherit !important;
        }

    </style>
@endsection
@section('content')

    <div class="col-xl-9 col-lg-8 col-md-12">

        {!! Form::open(['route' => 'testimonials.store','method'=>'post','class'=>'needs-validation','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
        <div class="row">
            <div class="col-md-6">
                <div class="card ctm-border-radius shadow-sm grow flex-fill">
                    <div class="card-header">
                        <h4 class="card-title mb-0">
                            Testimonial Details
                        </h4>
                    </div>

                    <div class="card-body">

                        <div class="form-group mb-3">
                            <label>Title <span class="text-muted text-danger">*</span></label>
                            <input type="text" class="form-control" name="title" required>
                            <div class="invalid-feedback">
                                Please enter the name of testimonial provider
                            </div>
                            <span class="ctm-text-sm">* Name of testimonial provider</span>
                        </div>

                        <div class="form-group mb-3">
                            <label> Subtitle </label>
                            <input type="text" class="form-control" name="subtitle">
                            <div class="invalid-feedback">
                                Please enter the name of company or designation of testimonial provider.
                            </div>
                            <span class="ctm-text-sm">* Name of company or designation of testimonial provider</span>
                        </div>

                        <div class="form-group mb-3">
                            <label>Description <span class="text-muted text-danger">*</span></label>
                            <textarea class="form-control" maxlength="100" rows="8" name="testimonial" id="editor" required></textarea>
                            <div class="invalid-feedback">
                                Please enter the testimonial.
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="card ctm-border-radius shadow-sm grow flex-fill">
                    <div class="card-header">
                        <h4 class="card-title mb-0">
                            Testimonial Image <span class="text-muted text-danger">*</span>
                        </h4>
                    </div>
                    <div class="card-body">

                        <div class="row justify-content-center">
                            <div class="col-9 mb-4">
                                <div class="custom-file h-auto">
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type="file"  accept="image/png, image/jpeg" class="custom-file-input" hidden id="imageUpload" onchange="loadFile(event)" name="image">
                                            <label for="imageUpload"></label>
                                            <div class="invalid-feedback" style="position: absolute; width: 45px;">
                                                Please select a image.
                                            </div>
                                        </div>
                                    </div>
                                    <img id="current-img" src="{{asset('/images/uploads/default-placeholder.png')}}" alt="blog_image" class="w-100 current-img">
                                </div>
                                <span class="ctm-text-sm">*use image minimum of 100 x 100px for testimonial</span>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-theme button-1 text-white ctm-border-radius mt-4" >Add Testimonial</button>
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
                                Testimonial List
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="employee-office-table">
                                <div class="table-responsive">
                                    <table id="testimonial-index" class="table custom-table">
                                        <thead>
                                        <tr>
                                            <th>Testimonial Image</th>
                                            <th>Title</th>
                                            <th>Subtitle</th>
                                            <th>Testimonial</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(@$testimonials)
                                            @foreach($testimonials as  $testimonial)
                                                <tr>
                                                    <td class="align-middle pt-6 pb-4 px-6">
                                                        <div class="avatar-upload">
                                                            <div class="blog-preview">
                                                                <img id="testimonial-img" src="<?php if(!empty($testimonial->image)){ echo '/images/uploads/testimonials/'.$testimonial->image; } else{  echo '/images/uploads/profiles/default-profile.png'; } ?>" alt="{{$testimonial->title}}" class="{{!empty($testimonial->image) ? '':'image-size'}}">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{$testimonial->title}}</td>
                                                    <td>{{(!empty($testimonial->subtitle)) ? $testimonial->subtitle:"N/A"}}</td>
                                                    <td>
                                                          {{$testimonial->testimonial}}
                                                    </td>
                                                    <td class="text-right">
                                                        <div class="dropdown action-label drop-active">
                                                            <a href="javascript:void(0)" class="btn btn-white btn-sm" data-toggle="dropdown" aria-expanded="false"> <span class="lnr lnr-cog"></span>
                                                            </a>
                                                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 31px, 0px);">
                                                                <a class="dropdown-item action-edit" href="#" hrm-update-action="{{route('testimonials.update',$testimonial->id)}}" hrm-edit-action="{{route('testimonials.edit',$testimonial->id)}}"> Edit </a>
                                                                <a class="dropdown-item action-delete" href="#" hrm-delete-per-action="{{route('testimonials.destroy',$testimonial->id)}}"> Delete </a>
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



    <div class="modal fade bd-example-modal-lg" id="editTestimonial">
        <form action="#" method="post" id="deleted-form" >
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
        </form>
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                {!! Form::open(['method'=>'PUT','class'=>'needs-validation updatetestimonial','novalidate'=>'','enctype'=>'multipart/form-data']) !!}

                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title mb-3">Edit Testimonial</h4>

                    <div class="row">
                        <div class="col-md-7">
                            <div class="card ctm-border-radius shadow-sm flex-fill">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">
                                        Testimonial Details
                                    </h4>
                                </div>
                                <div class="card-body">

                                    <div class="form-group mb-3">
                                        <label>Title <span class="text-muted text-danger">*</span></label>
                                        <input type="text" class="form-control" name="title" id="title" required>
                                        <div class="invalid-feedback">
                                            Please enter the name of testimonial provider.
                                        </div>
                                        <span class="ctm-text-sm">* Name of testimonial provider</span>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label> Subtitle </label>
                                        <input type="text" class="form-control" name="subtitle" id="subtitle">
                                        <div class="invalid-feedback">
                                            Please enter the name of company or designation of testimonial provider.
                                        </div>
                                        <span class="ctm-text-sm">* Name of company or designation of testimonial provider</span>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label>Testimonial <span class="text-muted text-danger">*</span></label>
                                        <textarea class="form-control" rows="8" maxlength="100" name="testimonial" id="edit-editor" required></textarea>
                                        <div class="invalid-feedback">
                                            Please enter the testimonial.
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="card ctm-border-radius shadow-sm flex-fill">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">
                                        Testimonial Image <span class="text-muted text-danger">*</span>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-9 mb-4">
                                            <div class="custom-file h-auto">
                                                <div class="avatar-upload">
                                                    <div class="avatar-edit">
                                                        <input type="file" class="custom-file-input" hidden id="image-edit" onchange="loadeditFile(event)" name="image">
                                                        <label for="image-edit"></label>
                                                        <div class="invalid-feedback" style="position: absolute; width: 45px;">
                                                            Please select a image.
                                                        </div>
                                                    </div>
                                                </div>
                                                <img id="current-edit-img" src="{{asset('/images/uploads/profiles/default-profile.png')}}" alt="testimonial_image" class="w-100 current-img">
                                            </div>
                                            <span class="ctm-text-sm">*use image minimum of 100 x 100px for Testimonial</span>
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
    <script src="{{asset('assets/backend/js/jquery-ui.min.js')}}"></script>

    <script type="text/javascript">

        var loadFile = function(event) {
            var image = document.getElementById('imageUpload');
            var replacement = document.getElementById('current-img');
            replacement.src = URL.createObjectURL(event.target.files[0]);
        };

        var loadeditFile = function(event) {
            var image = document.getElementById('image-edit');
            var replacement = document.getElementById('current-edit-img');
            replacement.src = URL.createObjectURL(event.target.files[0]);
        };




        $(document).ready(function () {
            $('#testimonial-index').DataTable({
                paging: true,
                searching: true,
                ordering:  true,
                lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            });
        });



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
                    // $('#id').val(data.id);
                    $("#editTestimonial").modal("toggle");
                    $('#title').attr('value',dataResult.title);
                    $('#subtitle').attr('value',dataResult.subtitle);
                    $('#edit-editor').text(dataResult.testimonial);
                    if(dataResult.image == null){
                        $('#current-edit-img').attr("src",'/images/uploads/profiles/default-profile.png' );
                    }else{
                        $('#current-edit-img').attr("src",'/images/uploads/testimonials/'+dataResult.image );
                    }
                    $('.updatetestimonial').attr('action',action);

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
                        swal("Deleted!", "Testimonial Deleted Successfully", "success");
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



