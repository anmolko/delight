@extends('backend.layouts.master')
@section('title') Career @endsection

@section('content')


    <div class="col-xl-9 col-lg-8  col-md-12">
         <div class="row">
            <div class="col-md-4">
                <div class="card ctm-border-radius shadow-sm flex-fill">
                    <div class="card-header">
                        <h4 class="card-title mb-0">
                            Add Career Information
                        </h4>
                    </div>
                    {!! Form::open(['route' => 'career.store','method'=>'post','class'=>'needs-validation','novalidate'=>'']) !!}

                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label> Title <span class="text-muted text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" required>
                            <div class="invalid-feedback">
                                Please enter the career title.
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Type <span class="text-muted text-danger">*</span></label>
                            <select class="form-control shadow-none" name="type" required>
                                <option value disabled selected> Select Career Type</option>
                                <option value="full_time"> Full Time </option>
                                <option value="part_time"> Part Time </option>
                            </select>
                            <div class="invalid-feedback">
                                Please enter the Min Qualification.
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Number of open position <span class="text-muted text-danger">*</span></label>
                            <input type="number" min="0" class="form-control" name="open_position" required>
                            <div class="invalid-feedback">
                                Please enter the number of positions open.
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Submission Closing Date <span class="text-muted text-danger">*</span></label>
                            <input type="text" class="form-control datetimepicker" name="end_date" required>
                            <div class="invalid-feedback">
                                Please Select the career application closing date.
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label> Form Link <span class="text-muted text-danger">*</span></label>
                            <input type="url" class="form-control" name="from_link" required>
                            <div class="invalid-feedback">
                                Please enter the form link.
                            </div>
                            <span class="ctm-text-sm">*Paste the from link from here to use it in the frontend</span>
                        </div>
                        <div class="form-group mb-3">
                            <label>Salary (Optional)</label>
                            <input type="text" class="form-control" name="salary">
                            <div class="invalid-feedback">
                                Please enter the salary.
                            </div>
                        </div>
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-theme text-white ctm-border-radius button-1">Add</button>
                        </div>
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
            <div class="col-md-8">
                <div class="card ctm-border-radius shadow-sm flex-fill">
                    <div class="card-header">
                        <h4 class="card-title mb-0">
                            Career List
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="employee-office-table">
                            <div class="table-responsive">
                                <table id="career-index" class="table custom-table">
                                    <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Open Position</th>
                                        <th>End Date</th>
                                        <th>Type</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(!empty($careers))
                                        @foreach($careers as  $career)
                                            <tr>
                                                <td>{{ ucwords(@$career->name) }}</td>
                                                <td>{{ @$career->open_position }}</td>
                                                <td>{{\Carbon\Carbon::parse(@$career->end_date )->isoFormat('MMMM Do, YYYY')}}</td>
                                                <td>{{ ucwords(str_replace('_',' ',@$career->type)) }}</td>
                                                <td class="text-right">
                                                    <div class="dropdown action-label drop-active">
                                                        <a href="javascript:void(0)" class="btn btn-white btn-sm" data-toggle="dropdown" aria-expanded="false"> <span class="lnr lnr-cog"></span>
                                                        </a>
                                                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 31px, 0px);">
                                                            <a class="dropdown-item action-edit" href="#" hrm-update-action="{{route('career.update',$career->id)}}" hrm-edit-action="{{route('career.edit',$career->id)}}"> Edit </a>
                                                            @if(@$career->formlink)
                                                                <a class="dropdown-item" href="{{@$career->formlink}}" target="_blank" > View Form Submission </a>
                                                            @endif
                                                            <a class="dropdown-item action-delete" href="#" hrm-delete-per-action="{{route('career.destroy',$career->id)}}"> Delete </a>
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


    <div class="modal fade bd-example-modal-lg" id="edit_career">
        <form action="#" method="post" id="deleted-form" >
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
        </form>
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                {!! Form::open(['method'=>'PUT','class'=>'needs-validation updatecareer','novalidate'=>'','enctype'=>'multipart/form-data']) !!}

                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title mb-3">Edit Career</h4>

                    <div class="form-group mb-3">
                        <label> Title <span class="text-muted text-danger">*</span></label>
                        <input type="text" class="form-control" name="name" id="name" required>
                        <div class="invalid-feedback">
                            Please enter the career title.
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label>Type <span class="text-muted text-danger">*</span></label>
                        <select class="form-control shadow-none" name="type" id="type" required>
                            <option value disabled selected> Select Career Type</option>
                            <option value="full_time"> Full Time </option>
                            <option value="part_time"> Part Time </option>
                        </select>
                        <div class="invalid-feedback">
                            Please enter the Min Qualification.
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label>Number of open position <span class="text-muted text-danger">*</span></label>
                        <input type="number" min="0" class="form-control" name="open_position" id="open_position"  required>
                        <div class="invalid-feedback">
                            Please enter the number of positions open.
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label>Submission Closing Date <span class="text-muted text-danger">*</span></label>
                        <input type="text" class="form-control datetimepicker" name="end_date" id="end_date" required>
                        <div class="invalid-feedback">
                            Please Select the career application closing date.
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label> Form Link </label>
                        <input type="url" class="form-control" name="from_link" id="from_link" />
                        <div class="invalid-feedback">
                            Please enter the form link.
                        </div>
                        <span class="ctm-text-sm">*Paste the from link from here to use it in the frontend</span>
                    </div>
                    <div class="form-group mb-3">
                        <label>Salary (Optional)</label>
                        <input type="text" class="form-control" name="salary" id="salary" />
                        <div class="invalid-feedback">
                            Please enter the salary.
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
    <script type="text/javascript">

        $(document).ready(function () {
            $('#career-index').DataTable({
                paging: true,
                searching: true,
                ordering:  true,
                lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            });

        });

        //career
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
                    $("#edit_career").modal("toggle");
                    $('#name').attr('value',dataResult.edit.name);
                    $('#open_position').attr('value',dataResult.edit.open_position);
                    $('#end_date').attr('value',dataResult.end);
                    $('#from_link').attr('value',dataResult.edit.from_link);
                    $('#salary').attr('value',dataResult.edit.salary);
                    $('#type option[value="'+dataResult.edit.type+'"]').prop('selected', true);
                    $('.updatecareer').attr('action',action);
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

                    swal("Deleted!", "Deleted Successfully", "success");
                    // toastr.success('file deleted Successfully');
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
        // end of career



    </script>
@endsection
