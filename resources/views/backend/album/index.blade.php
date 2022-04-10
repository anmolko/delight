@extends('backend.layouts.master')
@section('title') Album @endsection
@section('css')

    <style>

   

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

        {!! Form::open(['route' => 'album.store','method'=>'post','class'=>'needs-validation','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
        <div class="row">
            <div class="col-md-6">
                <div class="card ctm-border-radius shadow-sm grow flex-fill">
                    <div class="card-header">
                        <h4 class="card-title mb-0">
                            Album Cover  <span class="text-muted text-danger">*</span>
                        </h4>
                    </div>
                    <div class="card-body">

                        <div class="row justify-content-center">
                            <div class="col-7 mb-2">
                                <div class="custom-file h-auto">
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type="file"  accept="image/png, image/jpeg" class="custom-file-input" hidden id="imageUpload" onchange="loadFile(event)" name="cover_image" required>
                                            <label for="imageUpload"></label>
                                            <div class="invalid-feedback" style="position: absolute; width: 45px;">
                                                Please select a image.
                                            </div>
                                        </div>
                                    </div>
                                    <img id="current-img" src="{{asset('/images/uploads/default-placeholder.png')}}" alt="album_image" class="w-100 current-img">
                                </div>
                                <span class="ctm-text-sm">*use image minimum of 370 x 270px for Album</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="card ctm-border-radius shadow-sm grow flex-fill">
                    <div class="card-header">
                        <h4 class="card-title mb-0">
                            Album details
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Name <span class="text-muted text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" id="name" required>
                            <div class="invalid-feedback">
                                Please enter the album name.
                            </div>
                        </div>
                                          
                        <div class="form-group mb-3">
                            <label>Slug <span class="text-muted text-danger">*</span></label>
                            <input type="text" class="form-control" name="slug" id="slug" required>
                            <div class="invalid-feedback">
                                Please enter the album Slug.
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-theme button-1 text-white ctm-border-radius mt-4" >Add Album</button>
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
                                Album List
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="employee-office-table">
                                <div class="table-responsive">
                                    <table id="album-index" class="table custom-table">
                                        <thead>
                                        <tr>
                                            <th>Album Cover</th>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Total Image(s)</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(@$albums)
                                            @foreach($albums as  $album)
                                                <tr>
                                                    <td class="align-middle pt-6 pb-4 px-6">
                                                        <div class="avatar-upload">
                                                            <div class="blog-preview">
                                                                <img id="cat-img" src="{{asset('/images/uploads/albums/'.$album->cover_image)}}" />
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><a href="{{route('album.show',@$album->id)}}"> {{(!empty($album->name)) ?  $album->name:"Not Set"}}</a></td>
                                                    <td>{{@$album->slug}}</td>
                                                    <td>{{count(@$album->gallery)}}</td>

                                                    <td class="text-right">
                                                        <div class="dropdown action-label drop-active">
                                                            <a href="javascript:void(0)" class="btn btn-white btn-sm" data-toggle="dropdown" aria-expanded="false"> <span class="lnr lnr-cog"></span>
                                                            </a>
                                                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 31px, 0px);">
                                                                <a class="dropdown-item" href="{{route('album.show',@$album->id)}}"> Upload Gallery </a>
                                                                <a class="dropdown-item action-edit" href="#" hrm-update-action="{{route('album.update',$album->id)}}" hrm-edit-action="{{route('album.edit',$album->id)}}"> Edit </a>
                                                                <a class="dropdown-item action-delete" href="#" hrm-delete-per-action="{{route('album.destroy',$album->id)}}"> Delete </a>
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

    <div class="modal fade bd-example-modal-lg" id="editAlbum">
        <form action="#" method="post" id="deleted-form" >
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
        </form>
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                {!! Form::open(['method'=>'PUT','class'=>'needs-validation updatealbum','novalidate'=>'','enctype'=>'multipart/form-data']) !!}

                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title mb-3">Edit Album</h4>

                    <div class="row">
                        <div class="col-md-7">
                            <div class="card ctm-border-radius shadow-sm flex-fill">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">
                                    Album Cover <span class="text-muted text-danger">*</span>
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="row justify-content-center">
                                        <div class="col-7 mb-4">
                                            <div class="custom-file h-auto">
                                                <div class="avatar-upload">
                                                    <div class="avatar-edit">
                                                        <input type="file" class="custom-file-input" hidden id="image-edit" onchange="loadeditFile(event)" name="cover_image">
                                                        <label for="image-edit"></label>
                                                        <div class="invalid-feedback" style="position: absolute; width: 45px;">
                                                            Please select a image.
                                                        </div>
                                                    </div>
                                                </div>
                                                <img id="current-edit-img" src="{{asset('/images/uploads/default-placeholder.png')}}" alt="album_image" class="w-100 current-img">
                                            </div>
                                            <span class="ctm-text-sm">*use image minimum of 370 x 270px for Album</span>
                                        </div>

                                    </div>



                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="card ctm-border-radius shadow-sm flex-fill">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">
                                    Album Details
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group mb-3">
                                        <label>Name <span class="text-muted text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name" id="update-name" required>
                                        <div class="invalid-feedback">
                                            Please enter the album name.
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label>Slug <span class="text-muted text-danger">*</span></label>
                                        <input type="text" class="form-control" name="slug" id="update-slug" required>
                                        <div class="invalid-feedback">
                                            Please enter the album Slug.
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

        $("#name").keyup(function(){
            var Text = $(this).val();
            Text = Text.toLowerCase();
            var regExp = /\s+/g;
            Text = Text.replace(regExp,'-');
            $("#slug").val(Text);
        });

        $("#update-name").keyup(function(){
            var Text = $(this).val();
            Text = Text.toLowerCase();
            var regExp = /\s+/g;
            Text = Text.replace(regExp,'-');
            $("#update-slug").val(Text);
        });

        $(document).ready(function () {
            $('#album-index').DataTable({
                paging: true,
                searching: true,
                ordering: true,
                lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            });


            $(document).on('click', '.action-edit', function (e) {
                e.preventDefault();
                var url = $(this).attr('hrm-edit-action');
                // console.log(action)
                var id = $(this).attr('id');
                var action = $(this).attr('hrm-update-action');

                $.ajax({
                    url: $(this).attr('hrm-edit-action'),
                    type: "GET",
                    cache: false,
                    dataType: 'json',
                    success: function (dataResult) {
                        // $('#id').val(data.id);
                        // console.log(dataResult.edit)
                        $("#editAlbum").modal("toggle");
                        $('#update-name').attr('value', dataResult.name);
                        $('#update-slug').attr('value', dataResult.slug);
                      
                        $('#current-edit-img').attr("src", '/images/uploads/albums/' + dataResult.cover_image);
                        $('.updatealbum').attr('action', action);

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
                            swal("Deleted!", "Album Deleted Successfully", "success");
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



