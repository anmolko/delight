@extends('backend.layouts.master')
@section('title') Pages @endsection
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

        #blog-img{
            border: 6px solid #f3f3f3;
            border-radius: 10px;
        }
        /*end for image*/

        .nopad {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }
        /*image gallery*/
        .image-checkbox {
            cursor: pointer;
            box-sizing: border-box;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            border: 4px solid transparent;
            margin-bottom: 0;
            outline: 0;
            position:relative;
        }
        .image-checkbox input[type="checkbox"] {
            display: none;
        }

        .hidden{
            display: none;
        }

        .image-checkbox-checked {
            border-color: #4783B0;
        }
        .image-checkbox .fa {
            position: absolute;
            color: #4A79A3;
            background-color: #fff;
            padding: 5px;
            top: -4px;
            right: -3px;
            border: 4px solid #4A79A3;
            font-size: 21px;
        }
        .image-checkbox-checked .fa {
            display: block !important;
        }

        /*end of checklist design*/

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


    </style>
@endsection
@section('content')

    <div class="col-xl-9 col-lg-8 col-md-12">
        <form action="#" method="post" id="deleted-form" >
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
        </form>
        <div class="row">
            <div class="col-md-12">
                <div class="company-doc">
                    <div class="card ctm-border-radius shadow-sm grow">
                        <div class="card-header">
                            <h4 class="card-title d-inline-block mb-0">
                                Pages
                            </h4>
                            <a href="{{route('pages.create')}}" class="float-right add-doc text-primary">Add New page
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="employee-office-table">
                                <div class="table-responsive">
                                    <table id="page-index" class="table custom-table">
                                        <thead>
                                        <tr>
                                            <th>Page Name</th>
                                            <th>Slug</th>
                                            <th>Page Sections</th>
                                            <th>Status</th>
                                            <th class="text-right">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(@$pages)
                                            @foreach($pages as  $page)
                                                    <td><a href="{{route('section-elements.create',$page->id)}}">{{ucfirst($page->name)}}</a></td>
                                                    <td>{{$page->slug}}</td>
                                                    <td>

                                                        <div class="list">
                                                            <ul>
                                                                @foreach($page->sections as $section)
                                                                    <li>{{ucfirst($section->section_name)}}</li>
                                                                @endforeach

                                                            </ul>
                                                            <button class="btn btn-theme button-1 text-white" value="1" data-show="More" data-hide="Less">More</button>
                                                        </div>
                                                    </td>
                                                    <td><div class="dropdown action-label drop-active">
                                                            <a href="javascript:void(0)" class="btn btn-white btn-sm" data-toggle="dropdown" aria-expanded="false"> {{(($page->status == 'active') ? "Active":"De-active")}}
                                                            </a>
                                                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 31px, 0px);">
                                                                @if($page->status == 'active')
                                                                    <a class="dropdown-item status-update" hrm-update-action="{{route('pages-status.update',$page->id)}}" href="#" id="deactive"> De-active </a>
                                                                @else
                                                                    <a class="dropdown-item status-update" hrm-update-action="{{route('pages-status.update',$page->id)}}" href="#" id="active"> Active </a>
                                                                @endif
                                                            </div>
                                                        </div></td>
                                                    <td class="text-right">
                                                        <div class="dropdown action-label drop-active">
                                                            <a href="javascript:void(0)" class="btn btn-white btn-sm" data-toggle="dropdown" aria-expanded="false"> <span class="lnr lnr-cog"></span>
                                                            </a>
                                                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 31px, 0px);">
                                                                <a class="dropdown-item" href="{{route('page',$page->slug)}}" target="_blank"> Frontend View </a>
                                                                <a class="dropdown-item" href="{{route('pages.edit',$page->id)}}" > Edit </a>
                                                                <a class="dropdown-item action-delete" href="#" hrm-delete-per-action="{{route('pages.destroy',$page->id)}}"> Delete </a>
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

@endsection

@section('js')

    <script type="text/javascript">

        $(document).ready(function () {
            $('#page-index').DataTable({
                paging: true,
                searching: true,
                ordering:  false,
                lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
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
                text: "Removing page will delete its section and data",
                type: "info",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
            }, function(){
                $.post( $url, form_data)
                    .done(function(response) {
                        swal("Deleted!", "Page Deleted Successfully", "success");
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

        $(document).on('click','.status-update', function (e) {
            e.preventDefault();
            var status = $(this).attr('id');
            var url = $(this).attr('hrm-update-action');
            if(status == 'deactive'){
                swal({
                    title: "Are You Sure?",
                    text: "Setting the Page status to de-active will prevent them from displaying. \n \n Set their status to Publish to enable the displaying feature!",
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

        //end of blog

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
                        swal("Success!", "Page Status has been updated", "success");
                        $(dataResult).remove();
                        setTimeout(function() {
                            window.location.reload();
                        }, 2500);
                    }else{
                        swal({
                            title: "Error!",
                            text: "Failed to update Page status",
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
                        text: "Error. Could not confirm the status of the Page.",
                        type: "info",
                        showCancelButton: true,
                        closeOnConfirm: false,
                        showLoaderOnConfirm: true,
                    });
                }
            });
        }


        // image gallery
        // init the state from the input
        $(".image-checkbox").each(function () {
            if ($(this).find('input[type="checkbox"]').first().attr("checked")) {
                $(this).addClass('image-checkbox-checked');
            }
            else {
                $(this).removeClass('image-checkbox-checked');
            }
        });

        // sync the state to the input
        $(".image-checkbox").on("click", function (e) {
            $(this).toggleClass('image-checkbox-checked');
            var $checkbox = $(this).find('input[type="checkbox"]');
            $checkbox.prop("checked",!$checkbox.prop("checked"))

            e.preventDefault();
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



