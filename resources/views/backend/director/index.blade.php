@extends('backend.layouts.master')
@section('title') Managing Director @endsection
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

        #team-img{
            border: 6px solid #f3f3f3;
            border-radius: 10px;
        }

        .image-size {
            width: 150px;
            height: 150px;
        }
        /*end for image*/

    </style>
@endsection
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="col-xl-9 col-lg-8 col-md-12">

        {!! Form::open(['route' => 'managing-director.store','method'=>'post','class'=>'needs-validation','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
        <div class="row">
            <div class="col-md-6">
                <div class="card ctm-border-radius shadow-sm grow flex-fill">
                    <div class="card-header">
                        <h4 class="card-title mb-0">
                            Managing Director Details
                        </h4>
                    </div>

                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Heading <span class="text-muted text-danger">*</span></label>
                            <input type="text" class="form-control" name="heading" required>
                            <div class="invalid-feedback">
                                Please enter the heading.
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Designation <span class="text-muted text-danger">*</span></label>
                            <input type="text" class="form-control" name="designation" required>
                            <div class="invalid-feedback">
                                Please enter the designation.
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Description <span class="text-muted text-danger">*</span></label>
                            <textarea class="form-control" rows="6" maxlength="550" name="description" required></textarea>
                            <div class="invalid-feedback">
                                Please write the short description
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Button Text </label>
                            <input type="text" class="form-control" name="button">
                            <div class="invalid-feedback">
                                Please enter the button text.
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Button link </label>
                            <input type="text" class="form-control" name="link">
                            <div class="invalid-feedback">
                                Please enter the button link.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card ctm-border-radius shadow-sm grow flex-fill">
                    <div class="card-header">
                        <h4 class="card-title mb-0">
                            Director Image
                        </h4>
                    </div>
                    <div class="card-body">

                        <div class="row justify-content-center">
                            <div class="col-9 mb-4">
                                <div class="custom-file h-auto">
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type="file" accept="image/png, image/jpeg" class="custom-file-input" hidden id="imageUpload" onchange="loadbasicFile('imageUpload','current-img',event)" name="image" required>
                                            <label for="imageUpload"></label>
                                            <div class="invalid-feedback" style="position: absolute; width: 45px;">
                                                Please select a image.
                                            </div>
                                        </div>
                                    </div>
                                    <img id="current-img" src="{{asset('/images/uploads/profiles/default-profile.png')}}" alt="blog_image" class="w-100 current-img">
                                </div>
                                <span class="ctm-text-sm">*use image minimum of 570 x 570px for director. Let the image be PNG</span>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-theme button-1 text-white ctm-border-radius mt-4" >Add Details</button>
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
                                Director List
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="employee-office-table">
                                <div class="table-responsive">
                                    <table id="director-index" class="table custom-table">
                                        <thead>
                                        <tr>
                                            <th width="30px">#</th>
                                            <th>Image</th>
                                            <th>Heading</th>
                                            <th>Designation</th>
                                            <th>Button</th>
                                            <th>Description</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody  id="tablecontents">
                                        @if(@$director)
                                            @foreach($director as  $managing)
                                                <tr class="row1" data-id="{{ $managing->id }}">
                                                    <td class="pl-3"><i class="fa fa-sort"></i></td>
                                                    <td class="align-middle pt-6 pb-4 px-6">
                                                        <div class="avatar-upload">
                                                            <div class="blog-preview">
                                                                <img id="team-img" src="<?php if(!empty($managing->image)){ echo '/images/uploads/director/'.$managing->image; } else{  echo '/images/uploads/profiles/default-profile.png'; } ?>" alt="{{$managing->name}}" class="image-size">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{$managing->heading}}</td>
                                                    <td>{{$managing->designation}}</td>
                                                    <td>{{(!empty($managing->button) ? $managing->button:"Not Set")}}</td>
                                                    <td>{{ substr_replace($managing->description, "...", 20)}}</td>
                                                    <td class="text-right">
                                                        <div class="dropdown action-label drop-active">
                                                            <a href="javascript:void(0)" class="btn btn-white btn-sm" data-toggle="dropdown" aria-expanded="false"> <span class="lnr lnr-cog"></span>
                                                            </a>
                                                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 31px, 0px);">
                                                                <a class="dropdown-item action-edit" href="#" hrm-update-action="{{route('managing-director.update',$managing->id)}}" hrm-edit-action="{{route('managing-director.edit',$managing->id)}}"> Edit </a>
                                                                <a class="dropdown-item action-delete" href="#" hrm-delete-per-action="{{route('managing-director.destroy',$managing->id)}}"> Delete </a>
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

    <div class="modal fade bd-example-modal-lg" id="editDirector">
        <form action="#" method="post" id="deleted-form" >
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
        </form>
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                {!! Form::open(['method'=>'PUT','class'=>'needs-validation updatedirector','novalidate'=>'','enctype'=>'multipart/form-data']) !!}

                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title mb-3">Edit Managing Director details</h4>

                    <div class="row">
                        <div class="col-md-7">
                            <div class="card ctm-border-radius shadow-sm flex-fill">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">
                                        Team Details
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group mb-3">
                                        <label>Heading <span class="text-muted text-danger">*</span></label>
                                        <input type="text" class="form-control" name="heading" id="heading" required>
                                        <div class="invalid-feedback">
                                            Please enter the heading.
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label>Designation <span class="text-muted text-danger">*</span></label>
                                        <input type="text" class="form-control" name="designation" id="designation" required>
                                        <div class="invalid-feedback">
                                            Please enter the designation.
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label>Description <span class="text-muted text-danger">*</span></label>
                                        <textarea class="form-control" rows="6" maxlength="550" name="description" id="description" required></textarea>
                                        <div class="invalid-feedback">
                                            Please write the short description
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label>Button Text </label>
                                        <input type="text" class="form-control" name="button" id="button">
                                        <div class="invalid-feedback">
                                            Please enter the button text.
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label>Button link </label>
                                        <input type="text" class="form-control" name="link" id="link">
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
                                        Director Image
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-9 mb-4">
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
                                                <img id="current-edit-img" src="{{asset('/images/uploads/profiles/default-profile.png')}}" alt="teams_image" class="w-100 current-img">
                                            </div>
                                            <span class="ctm-text-sm">*use image minimum of 570 x 570px for director. Let the image be PNG</span>
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
    <script src="{{asset('assets/backend/js/jquery-ui.min.js')}}"></script>

    <script type="text/javascript">


        var loadbasicFile = function(id1,id2,event) {
            var image       = document.getElementById(id1);
            var replacement = document.getElementById(id2);
            replacement.src = URL.createObjectURL(event.target.files[0]);
        };

        $(document).ready(function () {
            $('#director-index').DataTable({
                paging: true,
                searching: true,
                ordering:  false,
                lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            });

            $( "#tablecontents" ).sortable({
                items: "tr",
                cursor: 'move',
                opacity: 0.6,
                update: function() {
                    sendOrderToServer();
                }
            });

            function sendOrderToServer() {
                var order = [];
                var token = $('meta[name="csrf-token"]').attr('content');
                $('tr.row1').each(function(index,element) {
                    order.push({
                        id: $(this).attr('data-id'),
                        position: index+1
                    });
                });
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "{{ route('director.order') }}",
                    data: {
                        order: order,
                        _token: token
                    },
                    success: function(response) {
                        if (response.status == "200") {
                            toastr.success(response.message);
                        } else {
                            toastr.error(response.message);
                        }
                    }
                });
            }
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
                    $("#editDirector").modal("toggle");
                    $('#heading').attr('value',dataResult.heading);
                    $('#designation').attr('value',dataResult.designation);
                    $('#description').text(dataResult.description);
                    if(dataResult.link !== null){
                        $('#link').attr('value',dataResult.link);
                    }
                    if(dataResult.button !== null){
                        $('#button').attr('value',dataResult.button);
                    }
                    $('#current-edit-img').attr("src", '/images/uploads/director/' + dataResult.image);
                    $('.updatedirector').attr('action',action);

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
                        swal("Deleted!", "Managing Director details removed Successfully", "success");
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



