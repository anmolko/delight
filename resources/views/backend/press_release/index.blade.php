@extends('backend.layouts.master')
@section('title') Press Release @endsection
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

        #press-img{
            border: 6px solid #f3f3f3;
            border-radius: 10px;
            width: 400px;
            height: 150px;
        }

        /*end for image*/

        .ck-editor__editable_inline {
            min-height: 150px !important;
        }

        .avatar-upload .press-preview{
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



    <div class="col-xl-9 col-lg-8 col-md-12">
        {!! Form::open(['id'=>'create-form','class'=>'needs-validation','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
        <div class="row">
            <div class="col-md-8">
                <div class="card ctm-border-radius shadow-sm flex-fill">
                    <div class="card-header">
                        <h4 class="card-title mb-0">
                            Press Release Details
                        </h4>
                    </div>

                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Title <span class="text-muted text-danger">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" onclick="slugMaker('title','press-slug')" required>
                            <div class="invalid-feedback">
                                Please enter the title.
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Slug <span class="text-muted text-danger">*</span></label>
                            <input type="text" class="form-control" name="slug" id="press-slug" required>
                            <div class="invalid-feedback">
                                Please enter the Slug.
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Description <span class="text-muted text-danger">*</span></label>
                            <textarea class="form-control" rows="6" name="description" id="editor" required></textarea>
                            <div class="invalid-feedback">
                                Please enter the post description.
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="col-md-4">
                <div class="card ctm-border-radius shadow-sm flex-fill">
                    <div class="card-header">
                        <h4 class="card-title mb-0">
                            Press Release Details <span class="text-muted text-danger">*</span>
                        </h4>
                    </div>
                    <div class="card-body">

                        <div class="row justify-content-center">
                            <div class="col-9 mb-4">
                                <div class="custom-file h-auto">
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type="file"  accept="image/png, image/jpeg" class="custom-file-input" hidden id="imageUpload" onchange="loadbasicFile('imageUpload','current-press-img',event)" name="image" required>
                                            <label for="imageUpload"></label>
                                            <div class="invalid-feedback" style="position: absolute; width: 45px;">
                                                Please select a image.
                                            </div>
                                        </div>
                                    </div>
                                    <img id="current-press-img" src="{{asset('/images/uploads/default-placeholder.png')}}" alt="blog_image" class="w-100 current-img">
                                </div>
                                <span class="ctm-text-sm">*use image minimum of 700 * 350px for press release</span>
                            </div>

                        </div>

                        <div class="text-center">
                            <input type="hidden" name="status" id="status"/>
                            <button type="submit" class="btn btn-theme button-1 text-white ctm-border-radius mt-4 action-submit" name="status" value="publish">Publish</button>
                            <button type="submit" class="btn btn-theme button-1 text-white ctm-border-radius mt-4 action-submit" name="status" value="draft">Draft</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}

        <div class="row">
            <div class="col-md-12">
                <div class="company-doc">
                    <div class="card ctm-border-radius shadow-sm">
                        <div class="card-header">
                            <h4 class="card-title d-inline-block mb-0">
                                Press Release List
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="employee-office-table">
                                <div class="table-responsive">
                                    <table id="blog-index-table" class="table custom-table">
                                        <thead>
                                        <tr>
                                            <th>Feature Image</th>
                                            <th>Title</th>
                                            <th>Slug</th>
                                            <th>Status</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(@$press_release)
                                            @foreach($press_release as  $press)
                                                <tr>
                                                    <td class="align-middle pt-6 pb-4 px-6">
                                                        <div class="avatar-upload">
                                                            <div class="press-preview">
                                                                <img id="press-img" src="{{asset('/images/uploads/press_releases/'.@$press->image)}}" alt="{{@$press->slug}}"/>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ucfirst($press->title)}}</td>
                                                    <td>{{@$press->slug}}</td>
                                                    <td>

                                                        <div class="dropdown action-label drop-active">
                                                            <a href="javascript:void(0)" class="btn btn-white btn-sm" data-toggle="dropdown" aria-expanded="false"> {{(($press->status == 'draft') ? "Draft":"Publish")}}
                                                            </a>
                                                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 31px, 0px);">
                                                                @if($press->status == 'draft')

                                                                    <a class="dropdown-item status-update" hrm-update-action="{{route('press-release-status.update',$press->id)}}" href="#" id="publish"> Publish </a>
                                                                @else
                                                                    <a class="dropdown-item status-update" hrm-update-action="{{route('press-release-status.update',$press->id)}}" href="#" id="draft"> Draft </a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <div class="dropdown action-label drop-active">
                                                            <a href="javascript:void(0)" class="btn btn-white btn-sm" data-toggle="dropdown" aria-expanded="false"> <span class="lnr lnr-cog"></span>
                                                            </a>
                                                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 31px, 0px);">
                                                                <a class="dropdown-item action-blog-edit" href="#" hrm-update-action="{{route('press-release.update',$press->id)}}" hrm-edit-action="{{route('press-release.edit',$press->id)}}"> Edit </a>
                                                                <a class="dropdown-item action-blog-delete" href="#" hrm-delete-per-action="{{route('press-release.destroy',$press->id)}}"> Delete </a>
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


    <div class="modal fade bd-example-modal-lg" id="edit_press">
        <form action="#" method="post" id="deleted-form" >
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
        </form>
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                {!! Form::open(['method'=>'PUT','class'=>'needs-validation updatepress','novalidate'=>'','enctype'=>'multipart/form-data']) !!}

                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title mb-3">Edit Press Release</h4>

                    <div class="form-group mb-3">
                        <label>Title <span class="text-muted text-danger">*</span></label>
                        <input type="text" class="form-control" name="title" id="edit-title" onclick="slugMaker('edit-title','press-edit-slug')" required>
                        <div class="invalid-feedback">
                            Please enter the title.
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label>Slug <span class="text-muted text-danger">*</span></label>
                        <input type="text" class="form-control" name="slug" id="press-edit-slug" required>
                        <input type="hidden"  name="status" id="edit-status" required>
                        <div class="invalid-feedback">
                            Please enter the Slug.
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label>Description <span class="text-muted text-danger">*</span></label>
                        <textarea class="form-control update-descp" rows="6" name="description" id="edit-editor" required></textarea>
                        <div class="invalid-feedback">
                            Please enter the description.
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-9 mb-4">
                            <div class="custom-file h-auto">
                                <div class="avatar-upload">
                                    <div class="avatar-edit">
                                        <input type="file" class="custom-file-input" hidden id="images-edit" onchange="loadbasicFile('images-edit','current-edit-img',event)" name="image">
                                        <label for="images-edit"></label>
                                        <div class="invalid-feedback" style="position: absolute; width: 45px;">
                                            Please select a image.
                                        </div>
                                    </div>
                                </div>
                                <img id="current-edit-img" src="{{asset('/images/uploads/default-placeholder.png')}}" alt="press_image" class="w-100 current-img">
                            </div>
                            <span class="ctm-text-sm">*use image minimum of 700 * 350px for press release</span>
                        </div>

                    </div>


                    <button type="button" class="btn btn-danger float-right ml-3 mb-4" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-theme text-white ctm-border-radius float-right button-1 mb-4">Update</button>
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </div>


@endsection

@section('js')
    @include('backend.ckeditor')
    <script type="text/javascript">

        var loadbasicFile = function(id1,id2,event) {
            var image       = document.getElementById(id1);
            var replacement = document.getElementById(id2);
            replacement.src = URL.createObjectURL(event.target.files[0]);
        };

        function createEditor ( elementId ) {
            return ClassicEditor
                .create( document.querySelector( '#' + elementId  ), {

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
                    // Simulate label behavior if textarea had a label
                    if (editor.sourceElement.labels.length > 0) {
                        editor.sourceElement.labels[0].addEventListener('click', e => editor.editing.view.focus());
                    }
                    window.editor = editor;
                    editor.model.document.on( 'change:data', () => {
                        $( '#' + elementId).text(editor.getData());
                    } );
                } )
                .catch( error => {
                    console.error( error );
                } );
        }

        $(document).ready(function () {
            createEditor('editor');
            createEditor('edit-editor');

            $('#blog-index-table').DataTable({
                paging: true,
                searching: true,
                ordering:  true,
                lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            });

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

        //press

        $(document).on('click','.action-submit', function (e) {
            e.preventDefault();
            var form = $('#create-form')[0];
            if (!form.reportValidity()) {return false;}
            var status = $(this).val();
            $('#status').val(status);
            var post_url       = "{{route('press-release.store')}}";
            var request_method = 'POST';
            var form_data      = new FormData(form);
            // console.log(action)
            $.ajax({
                url: post_url,
                type: request_method,
                data : form_data,
                contentType: false,
                cache: false,
                processData:false,
                success: function(dataResult){
                    if (dataResult == 'duplicate'){
                        toastr.options =
                            {
                                "closeButton" : true,
                                "progressBar" : true
                            }
                        toastr.warning("The slug is already in use. Please write new one");
                    }else{
                        window.location.replace(dataResult);
                        //when the response is received, it will redirect to the dynamic route sent from controller
                    }
                },
                error: function(error){
                    console.log(error)
                }
            });
        });

        $(document).on('click','.action-blog-edit', function (e) {
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
                    $("#edit_press").modal("toggle");
                    $('#edit-title').attr('value',dataResult.title);
                    $('#press-edit-slug').attr('value',dataResult.slug);
                    $('#edit-status').attr('value',dataResult.status);
                    editor.setData( dataResult.description );
                    $('#current-edit-img').attr("src",'/images/uploads/press_releases/'+dataResult.image );
                    $('.updatepress').attr('action',action);

                },
                error: function(error){
                    console.log(error)
                }
            });
        });

        $(document).on('click','.action-blog-delete', function (e) {
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
                        swal("Deleted!", "Press Release Removed Successfully", "success");
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

        $(document).on('click','.status-update', function (e) {
            e.preventDefault();
            var status = $(this).attr('id');
            var url = $(this).attr('hrm-update-action');
            if(status == 'draft'){
                swal({
                    title: "Are You Sure?",
                    text: "Setting the post status to Draft will prevent them from displaying. \n \n Set their status to Publish to enable the displaying feature!",
                    type: "info",
                    showCancelButton: true,
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true,
                }, function(){
                    statusupdate(url,status);
                });
            }else{
                statusupdate(url,status);
            }

        });

        //end of press

        function statusupdate(url,status){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                url: url,
                type: "PATCH",
                cache: false,
                data:{
                    status: status,
                },
                success: function(dataResult){
                    if(dataResult == "yes"){
                        swal("Success!", "Press Release Status has been updated", "success");
                        $(dataResult).remove();
                        setTimeout(function() {
                            window.location.reload();
                        }, 2500);
                    }else{
                        swal({
                            title: "Error!",
                            text: "Failed to update Press Release status",
                            type: "error",
                            showCancelButton: true,
                            closeOnConfirm: false,
                            showLoaderOnConfirm: true,
                        }, function(){
                            //window.location.href = ""
                            swal.close();
                        })
                    }
                },
                error: function() {
                    swal({
                        title: 'Blog Warning',
                        text: "Error. Could not confirm the status of the Press Release.",
                        type: "info",
                        showCancelButton: true,
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true,
                    });
                }
            });
        }




    </script>
@endsection
