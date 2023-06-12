@extends('backend.layouts.master')
@section('title') Service Category @endsection
@section('css')

    <style>

        .ck-editor__editable_inline {
            min-height: 150px !important;
        }

        .hidden{
            display: none;
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
        }
        /*end for image*/

        /*for dropdown list design*/

        .table-responsive {
            white-space: inherit !important;
        }

        .list > ul {
            list-style-type: none;
            width:220px
        }
        .list > ol {
            list-style-type: none;
            padding-left: 0px;
            margin-bottom: 0px;
            width:220px
        }

        .list > ul > li {
            display: block;
            word-wrap: break-word;
        }

        .list > ol > li {
            display: block;
        }

        .list > ul > li:nth-child(3) ~ li {
            padding: 0;
            opacity: 0;
            max-height: 0;
            overflow: hidden;
            transition: 0.5s ease;
            box-sizing: padding-box;
        }

        .list > ol > li:nth-child(3) ~ li {
            padding: 0;
            opacity: 0;
            max-height: 0;
            overflow: hidden;
            transition: 0.5s ease;
            box-sizing: padding-box;
        }

        .list > ul > li ~ li.visible {
            opacity: 1;
            max-height: 70px;
        }
        .list > ol > li ~ li.visible {
            opacity: 1;
            max-height: 70px;
        }

        /* ADDITIONAL STYLES */

        div.list {
            width: 256px;
            margin: auto;
            display: flex;
            background: #fff;
            border-radius: 8px;
            padding: 12px 16px;
            flex-direction: column;
            border: 1px solid #ccc;
        }


        div.list ~ div.list {
            margin-top: 16px;
        }

        .list > ul > li,
        .list > ul > li ~ li.visible {
            padding: 8px 0;

        }
        .list > ol > li,
        .list > ol > li ~ li.visible {
            padding: 8px 0;
        }

        .list > ul > li ~ li {
            box-shadow: 0 -1px 0 #eee;
        }
        .list > ol > li ~ li {
            box-shadow: 0 -1px 0 #eee;
        }
        /* end of dropdown list design */

        .ck.ck-balloon-panel {
            z-index: 1050 !important;
        }
    </style>
@endsection
@section('content')

    <div class="col-xl-9 col-lg-8 col-md-12">

        {!! Form::open(['route' => 'service-category.store','method'=>'post','class'=>'needs-validation','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
        <div class="row">
            <div class="col-md-6">
                <div class="card ctm-border-radius shadow-sm grow flex-fill">
                    <div class="card-header">
                        <h4 class="card-title mb-0">
                            Service Category Details
                        </h4>
                    </div>

                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label>Category Name <span class="text-muted text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" id="catname" required>
                            <div class="invalid-feedback">
                                Please enter the category name.
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Category Slug <span class="text-muted text-danger">*</span></label>
                            <input type="text" class="form-control" name="slug" id="catslug"  required>
                            <div class="invalid-feedback">
                                Please enter the category slug.
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Short Description </label>
                            <textarea class="form-control" rows="6" name="short_description" ></textarea>
                            <div class="invalid-feedback">
                                Please write the short description about service category.
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label>Category list <span class="text-muted text-danger">*</span></label>
                            <textarea class="form-control" rows="8" name="list" id="editor" required></textarea>
                            <span class="ctm-text-sm">* Use bullet and numbering to write the list from the options.</span>
                            <div class="invalid-feedback">
                                Please enter the post description.
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="col-md-6">
                <div class="card ctm-border-radius shadow-sm grow flex-fill">
                    <div class="card-header">
                        <h4 class="card-title mb-0">
                            Service Category Image <span class="text-muted text-danger">*</span>
                        </h4>
                    </div>
                    <div class="card-body">

                        <div class="row justify-content-center">
                            <div class="col-9 mb-4">
                                <div class="custom-file h-auto">
                                    <div class="avatar-upload">
                                        <div class="avatar-edit">
                                            <input type="file"  accept="image/png, image/jpeg" class="custom-file-input" hidden id="imageUpload" onchange="loadFile(event)" name="image" required>
                                            <label for="imageUpload"></label>
                                            <div class="invalid-feedback" style="position: absolute; width: 45px;">
                                                Please select a image.
                                            </div>
                                        </div>
                                    </div>
                                    <img id="current-img" src="{{asset('/images/uploads/default-placeholder.png')}}" alt="blog_image" class="w-100 current-img">
                                </div>
                                <span class="ctm-text-sm">*use image minimum of 770 x 450px for Category</span>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-theme button-1 text-white ctm-border-radius mt-4" >Add Category</button>
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
                                Service Category List
                            </h4>
                        </div>
                        <div class="card-body">
                            <div class="employee-office-table">
                                <div class="table-responsive">
                                    <table id="cat-index" class="table custom-table">
                                        <thead>
                                        <tr>
                                            <th>Category Image</th>
                                            <th>Name</th>
                                            <th>Short Description</th>
                                            <th>List</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(@$categories)
                                            @foreach($categories as  $category)
                                                <tr>
                                                    <td class="align-middle pt-6 pb-4 px-6">
                                                        <div class="avatar-upload">
                                                            <div class="blog-preview">
                                                                <img id="cat-img" src="{{asset('/images/uploads/service_categories/'.$category->image)}}" />
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{$category->name}}</td>
                                                    <td>{{ elipsis($category->short_description,20)}}</td>
                                                    <td>
                                                        <div class="list">
                                                            {!! $category->list !!}
                                                            <button class="btn btn-theme button-1 text-white" value="1" data-show="More" data-hide="Less">More</button>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <div class="dropdown action-label drop-active">
                                                            <a href="javascript:void(0)" class="btn btn-white btn-sm" data-toggle="dropdown" aria-expanded="false"> <span class="lnr lnr-cog"></span>
                                                            </a>
                                                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 31px, 0px);">
                                                                <a class="dropdown-item action-edit" href="#" hrm-update-action="{{route('service-category.update',$category->id)}}" hrm-edit-action="{{route('service-category.edit',$category->id)}}"> Edit </a>
                                                                <a class="dropdown-item action-delete" href="#" hrm-delete-per-action="{{route('service-category.destroy',$category->id)}}"> Delete </a>
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

    <div class="modal fade bd-example-modal-lg" id="editCat">
        <form action="#" method="post" id="deleted-form" >
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
        </form>
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                {!! Form::open(['method'=>'PUT','class'=>'needs-validation updateservicecat','novalidate'=>'','enctype'=>'multipart/form-data']) !!}

                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title mb-3">Edit Service Category</h4>

                    <div class="row">
                        <div class="col-md-7">
                            <div class="card ctm-border-radius shadow-sm flex-fill">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">
                                        Service Category Details
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group mb-3">
                                        <label>Category Name <span class="text-muted text-danger">*</span></label>
                                        <input type="text" class="form-control" name="name" id="name" required>
                                        <div class="invalid-feedback">
                                            Please enter the category name.
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label>Category Slug <span class="text-muted text-danger">*</span></label>
                                        <input type="text" class="form-control" name="slug" id="slug" required>
                                        <div class="invalid-feedback">
                                            Please enter the category name.
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label>Short Description </label>
                                        <textarea class="form-control" rows="6" name="short_description" id="short_description" ></textarea>
                                        <div class="invalid-feedback">
                                            Please write the short description about service category.
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label>Category list <span class="text-muted text-danger">*</span></label>
                                        <textarea class="form-control" rows="8" name="list" id="edit-editor" required></textarea>
                                        <span class="ctm-text-sm">* Use bullet and numbering to write the list from the options.</span>
                                        <div class="invalid-feedback">
                                            Please enter the post description.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="card ctm-border-radius shadow-sm flex-fill">
                                <div class="card-header">
                                    <h4 class="card-title mb-0">
                                        Service Category Image <span class="text-muted text-danger">*</span>
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
                                                <img id="current-edit-img" src="{{asset('/images/uploads/default-placeholder.png')}}" alt="category_image" class="w-100 current-img">
                                            </div>
                                            <span class="ctm-text-sm">*use image minimum of 770 x 450px for Category</span>
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
    @include('backend.ckeditor')

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

        $("#catname").keyup(function(){
            var Text = $(this).val();
            Text = Text.toLowerCase();
            var regExp = /\s+/g;
            Text = Text.replace(regExp,'-');
            $("#catslug").val(Text);
        });

        $("#name").keyup(function(){
            var Text = $(this).val();
            Text = Text.toLowerCase();
            var regExp = /\s+/g;
            Text = Text.replace(regExp,'-');
            $("#slug").val(Text);
        });


        $(document).ready(function () {
            $('#cat-index').DataTable({
                paging: true,
                searching: true,
                ordering:  true,
                lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            });




            ClassicEditor
                .create( document.querySelector( '#editor' ), {
                    toolbar : {
                        items: [
                            'heading', '|',
                            'bold', 'italic', 'link', '|',
                            'outdent', 'indent', '|',
                            'bulletedList', 'numberedList', '|',
                            'insertTable', 'blockQuote', '|',
                            'undo', 'redo'
                        ],
                        shouldNotGroupWhenFull: false,

                    },


                } )
                .then( editor => {
                    window.editor = editor;
                } )
                .catch( err => {
                    console.error( err.stack );
                } );


            ClassicEditor
                .create( document.querySelector( '#edit-editor' ), {
                    toolbar : {
                        items: [
                            'heading', '|',
                            'bold', 'italic', 'link', '|',
                            'outdent', 'indent', '|',
                            'bulletedList', 'numberedList', '|',
                            'insertTable', 'blockQuote', '|',
                            'undo', 'redo'
                        ],
                        shouldNotGroupWhenFull: false,
                    },


                } )

                    // Object styles

                .then( editor => {
                    window.editor = editor;

                } )
                .catch( err => {
                    console.error( err.stack );
                } );


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
                    $("#editCat").modal("toggle");
                    $('#name').attr('value',dataResult.name);
                    $('#slug').attr('value',dataResult.slug);
                    $('#short_description').text(dataResult.short_description);
                    editor.setData( dataResult.list );
                    $('#current-edit-img').attr("src",'/images/uploads/service_categories/'+dataResult.image );
                    $('.updateservicecat').attr('action',action);

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
                        swal("Deleted!", "Service Category Deleted Successfully", "success");
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

        document.addEventListener("DOMContentLoaded", function() {
            this.querySelectorAll("div.list").forEach(list => {
                let listnum = list.querySelectorAll("li").length;
                if(listnum <= 3){
                    list.querySelector("button").classList.add('hidden');
                }else{
                    list.querySelector("button").classList.remove('hidden');
                }
                list.querySelector("button").addEventListener("click", function() {
                    let blocks = list.querySelectorAll("li");
                    switch(this.value) {
                        case "1":
                            blocks.forEach(block => {
                                if (!block.offsetHeight) block.classList.add("visible");
                            });
                            this.value = 0;
                            this.innerText = this.dataset.hide;
                            break;
                        case "0":
                            blocks.forEach(block => {
                                block.classList.remove("visible");
                            });
                            this.value = 1;
                            this.innerText = this.dataset.show;
                            break;
                    }
                });
            });
        });

    </script>
@endsection



