@extends('backend.layouts.master')
@section('title') Create a Page @endsection
@section('css')

    <style>

        #sortable { list-style-type: none; margin: 0; padding: 0; }
        #sortable li {cursor:move; margin-top: 10px;  transition: -webkit-transform ease-out 0.3s;
            -webkit-transform-origin: 50% 50%; }
        body.dragging, body.dragging * {cursor: move !important; }
        .dragged {position: absolute;z-index: 1; transform: perspective(800px) translateZ(20px);}
        #sortable li span { position: absolute; }
        #sortable li.fixed{cursor:default; color:#959595; opacity:0.5;}

        .upper-case{
            text-transform: capitalize;
        }

        .div-center{
            margin: auto;width: 70%;
        }
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

    </style>
@endsection
@section('content')

    <div class="col-xl-9 col-lg-8 col-md-12">

        {!! Form::open(['id'=>'pagecreate-form','class'=>'needs-validation','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
        <div class="row">
            <div class="col-md-12">
                <div class="card ctm-border-radius shadow-sm flex-fill">
                    <div class="card-header">
                        <h4 class="card-title mb-0">
                            General Details
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Page Name <span class="text-muted text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" id="name" required>
                            <div class="invalid-feedback">
                                Please enter the page Name.
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Slug <span class="text-muted text-danger">*</span></label>
                            <input type="text" class="form-control" name="slug" id="slug" required>
                            <div class="invalid-feedback">
                                Please enter the Page Slug.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="card ctm-border-radius shadow-sm grow">
            <div class="card-header">
                <h4 class="card-title doc d-inline-block mb-0">Choose the Section for Pages </h4>
                <br/>
                <span class="ctm-text-sm">* Select the sections to use in the page by clicking on the section images below.</span>
            </div>
            <div class="card-body doc-boby">
                <div class="card shadow-none">
                    <div class="card-header">
                        <h5 class="card-title text-primary mb-0">Basic Section</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="image-checkbox">
                                    <img class="img-responsive" src="{{asset('assets/backend/img/page_sections/basic_section.png')}}" />
                                    <input type="checkbox" name="section[]" value="basic_section" id="basic_section.png"/>
                                    <i class="fa fa-check hidden"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow-none">
                    <div class="card-header">
                        <h5 class="card-title text-primary mb-0">Image Description Section</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="image-checkbox">
                                    <img class="img-responsive" src="{{asset('assets/backend/img/page_sections/image_description_section.png')}}" />
                                    <input type="checkbox" name="section[]" value="image_description_section" id="image_description_section.png"/>
                                    <i class="fa fa-check hidden"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow-none">
                    <div class="card-header">
                        <h5 class="card-title text-primary mb-0">Call to Action: option 1</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="image-checkbox">
                                    <img class="img-responsive" src="{{asset('assets/backend/img/page_sections/calltoaction.png')}}" />
                                    <input type="checkbox" name="section[]" value="call_to_action_1" id="calltoaction.png"/>
                                    <i class="fa fa-check hidden"></i>
                                </label>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card shadow-none">
                    <div class="card-header">
                        <h5 class="card-title text-primary mb-0">Call to Action: option 2</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="image-checkbox">
                                    <img class="img-responsive" src="{{asset('assets/backend/img/page_sections/calltoaction2.png')}}" />
                                    <input type="checkbox" name="section[]" value="call_to_action_2" id="calltoaction2.png"/>
                                    <i class="fa fa-check hidden"></i>
                                </label>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card shadow-none">
                    <div class="card-header">
                        <h5 class="card-title text-primary mb-0">Simple Tab List Section</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="image-checkbox">
                                    <img class="img-responsive" src="{{asset('assets/backend/img/page_sections/simple_tab_list.png')}}" />
                                    <input type="checkbox" name="section[]" value="simple_tab_list" id="simple_tab_list.png"/>
                                    <i class="fa fa-check hidden"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow-none">
                    <div class="card-header">
                            <h5 class="card-title text-primary mb-0">Mission, Vision & Goals</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="image-checkbox">
                                    <img class="img-responsive" src="{{asset('assets/backend/img/page_sections/mission_vision.png')}}" />
                                    <input type="checkbox" name="section[]" value="flash_cards" id="mission_vision.png"/>
                                    <i class="fa fa-check hidden"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow-none">
                    <div class="card-header">
                        <h5 class="card-title text-primary mb-0">Simple Header & Description </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="image-checkbox">
                                    <img class="img-responsive" src="{{asset('assets/backend/img/page_sections/simple_header_descp.png')}}" />
                                    <input type="checkbox" name="section[]" value="simple_header_and_description" id="simple_header_descp.png" />
                                    <i class="fa fa-check hidden"></i>
                                </label>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card shadow-none">
                    <div class="card-header">
                        <h5 class="card-title text-primary mb-0">Simple Accordion Tab 1 </h5>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Number of Accordion Tab <span class="text-muted text-danger">*</span></label>
                                    <input type="number" min="1" class="form-control" name="list_number_1">
                                    <div class="invalid-feedback">
                                        Please enter the Tab Accordion number.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="image-checkbox">
                                    <img class="img-responsive" id="accordion_section_1" src="{{asset('assets/backend/img/page_sections/simple_accordian_tab.png')}}" />
                                    <input type="checkbox" name="section[]" value="accordion_section_1" id="simple_accordian_tab.png"/>
                                    <i class="fa fa-check hidden"></i>
                                </label>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card shadow-none">
                    <div class="card-header">
                        <h5 class="card-title text-primary mb-0">Simple Accordion Tab 2 </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Select number of Tab List <span class="text-muted text-danger">*</span></label>
                                    <select class="form-control select" name="list_number_2" id="list_number_2">
                                        <option disabled selected>Select Number of Tab List</option>
                                        <option value="2">Two</option>
                                        <option value="4">Four</option>
                                        <option value="6">Six</option>
                                        <option value="8">Eight</option>
                                        <option value="10">Ten</option>
                                        <option value="12">Twelve</option>
                                        <option value="14">Fourteen</option>
                                    </select>
                                    <div class="invalid-feedback">
                                        Please enter the Accordion tab number.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="image-checkbox">
                                    <img class="img-responsive" src="{{asset('assets/backend/img/page_sections/simple_accordian_tab2.png')}}" />
                                    <input type="checkbox" name="section[]" value="accordion_section_2" id="simple_accordian_tab2.png"/>
                                    <i class="fa fa-check hidden"></i>
                                </label>
                                <span class="ctm-text-sm text-warning">* Can be used for multiple Q & A section such as FAQs.</span>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card shadow-none">
                    <div class="card-header">
                        <h5 class="card-title text-primary mb-0">Gallery </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-3">
                                    <label>Heading </label>
                                    <input type="text" class="form-control" name="gallery_heading" value="{{@$heading}}" >
                                    <div class="invalid-feedback">
                                        Please enter the heading.
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label>Subeading </label>
                                    <input type="text" class="form-control" name="gallery_subheading" value="{{@$subheading}}">
                                    <div class="invalid-feedback">
                                        Please enter the subheading.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="image-checkbox">
                                    <img class="img-responsive" src="{{asset('assets/backend/img/page_sections/gallery.png')}}" />
                                    <input type="checkbox" name="section[]" value="gallery" id="gallery.png" />
                                    <i class="fa fa-check hidden"></i>
                                </label>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card shadow-none">
                    <div class="card-header">
                        <h5 class="card-title text-primary mb-0">Slider Lists</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Number of Slider List <span class="text-muted text-danger">*</span></label>
                                    <input type="number" min="3" class="form-control" name="list_number_3" >
                                    <div class="invalid-feedback">
                                        Please enter the list number.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="image-checkbox">
                                    <img class="img-responsive" src="{{asset('assets/backend/img/page_sections/list_option_1.png')}}" />
                                    <input type="checkbox" name="section[]" value="slider_list" id="list_option_1.png" />
                                    <i class="fa fa-check hidden"></i>
                                </label>
                                <span class="ctm-text-sm text-warning">* using this element will create a inner page to display individual list data. Use only when big information are needed to be showcased. </span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="text-center mb-3">
            <input type="hidden" name="status" id="status"/>

            <button type="button" class="btn btn-theme button-1 text-white ctm-border-radius mt-4" name="btnstatus" id="status1" value="active">Active</button>
            <button type="button" class="btn btn-theme button-1 text-white ctm-border-radius mt-4" name="btnstatus" id="status2" value="deactive">De-Active</button>
        </div>
        {!! Form::close() !!}



    </div>


    <div class="modal fade bd-example-modal-lg" id="addStructure">
        <form action="#" method="post" id="deleted-form" >
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
        </form>
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">

                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title mb-3">Structure Your Page Sections By Dragging Them</h4>

                    <div id="items-container">
                        <ul class="ui-sortable" id="sortable">
                            {{-- list of section with their names and images are added here via jquery--}}

                        </ul>
                    </div>

                    <div class="text-center mb-3">
                        <button id="submitcreatepagedata" class="btn btn-theme button-1 text-white ctm-border-radius mt-4">Create Page</button>
                    </div>
                </div>

            </div>
        </div>
    </div>





@endsection

@section('js')
    <script src="{{asset('assets/backend/js/jquery-sortable.js')}}"></script>

    <script type="text/javascript">

        //settings for sortable JS
        $("#sortable").sortable({
            onDrop: function ($item, container, _super) {
                //for animation
                var $clonedItem = $('<li/>').css({height: 0});
                $item.before($clonedItem);
                $clonedItem.animate({'height': $item.height()});

                $item.animate($clonedItem.position(), function  () {
                    $clonedItem.detach();
                    _super($item, container);
                });
            },
            onDragStart: function ($item, container, _super) {
                var offset = $item.offset(),
                    pointer = container.rootGroup.pointer;

                adjustment = {
                    left: pointer.left - offset.left,
                    top: pointer.top - offset.top
                };

                _super($item, container);
            },
            //for animation
            onDrag: function ($item, position) {
                $item.css({
                    left: position.left - adjustment.left,
                    top: position.top - adjustment.top
                });
            }
        });
        //settings for sortable JS

        $("#name").keyup(function(){
            var Text = $(this).val();
            Text = Text.toLowerCase();
            var regExp = /\s+/g;
            Text = Text.replace(regExp,'-');
            $("#slug").val(Text);
        });
        // $(document).ready(function () {
        //
        //
        // });

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

        $('#status1, #status2').click(function(event){
            event.preventDefault();
            var form = $('#pagecreate-form')[0];
            if (!form.reportValidity()) {return false;}
            var status         = $(this).val();
            $('#status').val(status);
            var selected = new Array();
            $("input:checkbox:checked").each(function() {
                selected.push({
                    name: $(this).val(),
                    image:  $(this).attr("id")
                });
            });
            //activate the modal
            $("#addStructure").modal("toggle");
            $('#sortable').empty();//empty the sortable div data to avoid repetition
            let i = 1;
            selected.forEach(function(item) {
                var name = item.name;
                var newname = name.replace(new RegExp('_', 'g')," ");
                var replacements = '<li class="'+item.name+'" id="'+i+'">' +
                    '<div class="col-md-10 div-center">' +
                    '<label class="upper-case">'+ newname +'</label>' +
                    '<img src="/assets/backend/img/page_sections/'+item.image+'"/>' +
                '</div>' +
                '</li> ';
                i++;
                $('#sortable').append(replacements);
                //populate the div by appending the image and section name from loop
            });
        });

        //submit the data from previous form and the values of sortable field on button click
        $('#submitcreatepagedata').click(function(){
            var form                = $('#pagecreate-form')[0]; //get the form using ID
            var form_data           = new FormData(form); //Creates new FormData object
            var section_name        = $('#sortable li').map(function(i) {
                return $(this).attr('class'); }).get();
            //get the names of the section present as class in sortable UL's li

            for (var i = 0; i < section_name.length; i++) {
                form_data.append('position[]', i+1); //send the position array in terms of number of li present in sortable UL
                form_data.append('sorted_sections[]', section_name[i]); //send the section names listed in sortable UL
            }
            var post_url       = "{{route('pages.store')}}"; //get form action url
            var request_method = 'POST'; //get form GET/POST method
            $.ajax({
                url : post_url,
                type: request_method,
                data : form_data,
                contentType: false,
                cache: false,
                processData:false
            }).done(function(response){
                //when the response is received, it will redirect to the dynamic route sent from controller
                window.location.replace(response);
            });
        });

    </script>
@endsection



