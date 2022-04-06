@extends('backend.layouts.master')
@section('title') Job Applications @endsection
@section('css')

    <style>
        /*for testimonial viewing, more and less*/

        .wrapper {
            width: 300px;
        }

        .desc-wrapper {
            margin: 0 auto;
            margin-bottom: 5px;
            overflow: hidden;
        }

        .table-responsive {
            white-space: inherit !important;
        }

        /*end of testimonial viewing, more and less*/
    </style>
@endsection
@section('content')

    <div class="col-xl-9 col-lg-8  col-md-12">
        <div class="card shadow-sm grow ctm-border-radius">
            <div class="card-body align-center">
                <ul class="nav flex-row nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item mr-2">
                        <a class="nav-link mb-2 active" id="pills-pending-tab" data-toggle="pill" href="#pills-pending" role="tab" aria-controls="pills-pending" aria-selected="true">Pending Applications</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-applied-tab" data-toggle="pill" href="#pills-applied" role="tab" aria-controls="pills-applied" aria-selected="false">Applied Applications</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-processing-tab" data-toggle="pill" href="#pills-processing" role="tab" aria-controls="pills-processing" aria-selected="false">Processing Applications</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-selected-tab" data-toggle="pill" href="#pills-selected" role="tab" aria-controls="pills-selected" aria-selected="false">Selected Applications</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-cancelled-tab" data-toggle="pill" href="#pills-cancelled" role="tab" aria-controls="pills-cancelled" aria-selected="false">Cancelled Applications</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card shadow-sm grow ctm-border-radius">
            <div class="card-body align-center">
                <div class="tab-content" id="pills-tabContent">

                    <div class="tab-pane fade active show" id="pills-pending" role="tabpanel" aria-labelledby="pills-pending-tab">
                       <div class="employee-office-table">
                           <div class="table-responsive">
                               <table id="pending-application-table" class="table custom-table mb-0">
                                    <thead>
                                    <tr>
                                        <th>Fullname</th>
                                        <th>Email</th>
                                        <th>Number</th>
                                        <th>Message</th>
                                        <th>Applied for</th>
                                        <th>Company</th>
                                        <th>Application end date</th>
                                        <th>Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(@$pendings)
                                        @foreach($pendings as  $pending)
                                            <tr>
                                                <td>{{ucfirst($pending->name)}}</td>
                                                <td>{{($pending->email !== NULL) ? $pending->email:"Not Filled"}}</td>
                                                <td>{{$pending->number}}</td>
                                                <td>
                                                    @if($pending->message !== NULL)
                                                        <div class="wrapper well">
                                                            <div class="desc-wrapper" id="desc-wrapper">
                                                                <p>{{ $pending->message}}</p>
                                                            </div>
                                                        </div>
                                                    @else
                                                        {{"No Message Available"}}
                                                    @endif
                                                <td>{{ucfirst($pending->job->category->name)}}</td>
                                                <td>{{ucfirst($pending->job->client->name)}}</td>
                                                <td>{{@\Carbon\Carbon::parse($pending->job->end_date)->isoFormat('MMMM Do, YYYY')}}</td>
                                                <td>
                                                    <div class="dropdown action-label drop-active">
                                                        <a href="javascript:void(0)" class="btn btn-white btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> {{ ucfirst($pending->status)}}  <i class="caret"></i></a>
                                                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 31px, 0px);">

                                                            <a class="dropdown-item status-update" hrm-update-action="{{route('apply-status.update',$pending->id)}}" href="#" id="applied"> Applied</a>
                                                            <a class="dropdown-item status-update" hrm-update-action="{{route('apply-status.update',$pending->id)}}" href="#" id="processing"> Processing</a>
                                                            <a class="dropdown-item status-update" hrm-update-action="{{route('apply-status.update',$pending->id)}}" href="#" id="selected"> Selected</a>
                                                            <a class="dropdown-item status-update" hrm-update-action="{{route('apply-status.update',$pending->id)}}" href="#" id="cancelled"> Cancelled</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-right text-danger">
                                                    <a class="btn btn-sm btn-outline-danger action-delete" href="#" hrm-delete-per-action="{{route('apply.destroy',$pending->id)}}">
                                                        <span class="lnr lnr-trash"></span> Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                               </table>
                           </div>
                       </div>
                    </div>
                    <div class="tab-pane fade" id="pills-applied" role="tabpanel" aria-labelledby="pills-applied-tab">
                        <div class="employee-office-table">
                            <div class="table-responsive">
                                <table id="applied-application-table" class="table custom-table mb-0">
                                    <thead>
                                    <tr>
                                        <th>Fullname</th>
                                        <th>Email</th>
                                        <th>Number</th>
                                        <th>Message</th>
                                        <th>Applied for</th>
                                        <th>Company</th>
                                        <th>Application end date</th>
                                        <th>Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(@$applied)
                                        @foreach($applied as  $apply)
                                            <tr>
                                                <td>{{ucfirst($apply->name)}}</td>
                                                <td>{{($apply->email !== NULL) ? $apply->email:"Not Filled"}}</td>
                                                <td>{{$apply->number}}</td>
                                                <td>
                                                    @if($apply->message !== NULL)
                                                        <div class="wrapper well">
                                                            <div class="desc-wrapper" id="desc-wrapper">
                                                                <p>{{ $apply->message}}</p>
                                                            </div>
                                                        </div>
                                                @else
                                                    {{"No Message Available"}}
                                                @endif
                                                <td>{{ucfirst($apply->job->category->name)}}</td>
                                                <td>{{ucfirst($apply->job->client->name)}}</td>
                                                <td>{{@\Carbon\Carbon::parse($apply->job->end_date)->isoFormat('MMMM Do, YYYY')}}</td>
                                                <td>
                                                    <div class="dropdown action-label drop-active">
                                                        <a href="javascript:void(0)" class="btn btn-white btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> {{ ucfirst($apply->status)}} <i class="caret"></i></a>
                                                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 31px, 0px);">

                                                            <a class="dropdown-item status-update"  hrm-update-action="{{route('apply-status.update',$apply->id)}}" href="#" id="pending"> Pending</a>
                                                            <a class="dropdown-item status-update" hrm-update-action="{{route('apply-status.update',$apply->id)}}" href="#" id="processing"> Processing</a>
                                                            <a class="dropdown-item status-update" hrm-update-action="{{route('apply-status.update',$apply->id)}}" href="#" id="selected"> Selected</a>
                                                            <a class="dropdown-item status-update" hrm-update-action="{{route('apply-status.update',$apply->id)}}" href="#" id="cancelled"> Cancelled</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-right text-danger">
                                                    <a class="btn btn-sm btn-outline-danger action-delete" href="#" hrm-delete-per-action="{{route('apply.destroy',$apply->id)}}">
                                                        <span class="lnr lnr-trash"></span> Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-processing" role="tabpanel" aria-labelledby="pills-processing-tab">
                        <div class="employee-office-table">
                            <div class="table-responsive">
                                <table id="processing-application-table" class="table custom-table mb-0">
                                    <thead>
                                    <tr>
                                        <th>Fullname</th>
                                        <th>Email</th>
                                        <th>Number</th>
                                        <th>Message</th>
                                        <th>Applied for</th>
                                        <th>Company</th>
                                        <th>Application end date</th>
                                        <th>Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(@$processing)
                                        @foreach($processing as  $process)
                                            <tr>
                                                <td>{{ucfirst($process->name)}}</td>
                                                <td>{{($process->email !== NULL) ? $process->email:"Not Filled"}}</td>
                                                <td>{{$process->number}}</td>
                                                <td>
                                                    @if($process->message !== NULL)
                                                        <div class="wrapper well">
                                                            <div class="desc-wrapper" id="desc-wrapper">
                                                                <p>{{ $process->message}}</p>
                                                            </div>
                                                        </div>
                                                @else
                                                    {{"No Message Available"}}
                                                @endif
                                                <td>{{ucfirst($process->job->category->name)}}</td>
                                                <td>{{ucfirst($process->job->client->name)}}</td>
                                                <td>{{@\Carbon\Carbon::parse($process->job->end_date)->isoFormat('MMMM Do, YYYY')}}</td>
                                                <td>
                                                    <div class="dropdown action-label drop-active">
                                                        <a href="javascript:void(0)" class="btn btn-white btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> {{ ucfirst($process->status)}} <i class="caret"></i></a>
                                                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 31px, 0px);">

                                                            <a class="dropdown-item status-update" hrm-update-action="{{route('apply-status.update',$process->id)}}" href="#" id="pending"> Pending</a>
                                                            <a class="dropdown-item status-update" hrm-update-action="{{route('apply-status.update',$process->id)}}" href="#" id="applied"> Applied</a>
                                                            <a class="dropdown-item status-update" hrm-update-action="{{route('apply-status.update',$process->id)}}" href="#" id="selected"> Selected</a>
                                                            <a class="dropdown-item status-update" hrm-update-action="{{route('apply-status.update',$process->id)}}" href="#" id="cancelled"> Cancelled</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-right text-danger">
                                                    <a class="btn btn-sm btn-outline-danger action-delete" href="#" hrm-delete-per-action="{{route('apply.destroy',$process->id)}}">
                                                        <span class="lnr lnr-trash"></span> Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-selected" role="tabpanel" aria-labelledby="pills-selected-tab">
                        <div class="employee-office-table">
                            <div class="table-responsive">
                                <table id="selected-application-table" class="table custom-table mb-0">
                                    <thead>
                                    <tr>
                                        <th>Fullname</th>
                                        <th>Email</th>
                                        <th>Number</th>
                                        <th>Message</th>
                                        <th>Applied for</th>
                                        <th>Company</th>
                                        <th>Application end date</th>
                                        <th>Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(@$selected)
                                        @foreach($selected as  $select)
                                            <tr>
                                                <td>{{ucfirst($select->name)}}</td>
                                                <td>{{($select->email !== NULL) ? $select->email:"Not Filled"}}</td>
                                                <td>{{$select->number}}</td>
                                                <td>
                                                    @if($select->message !== NULL)
                                                        <div class="wrapper well">
                                                            <div class="desc-wrapper" id="desc-wrapper">
                                                                <p>{{ $select->message}}</p>
                                                            </div>
                                                        </div>
                                                @else
                                                    {{"No Message Available"}}
                                                @endif
                                                <td>{{ucfirst($select->job->category->name)}}</td>
                                                <td>{{ucfirst($select->job->client->name)}}</td>
                                                <td>{{@\Carbon\Carbon::parse($select->job->end_date)->isoFormat('MMMM Do, YYYY')}}</td>
                                                <td>
                                                    <div class="dropdown action-label drop-active">
                                                        <a href="javascript:void(0)" class="btn btn-outline-success btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> {{ ucfirst($select->status)}} <i class="caret"></i></a>
                                                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 31px, 0px);">
                                                            <a class="dropdown-item status-update" hrm-update-action="{{route('apply-status.update',$select->id)}}" href="#" id="cancelled"> Cancelled</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-right text-danger">
                                                    <a class="btn btn-sm btn-outline-danger action-delete" href="#" hrm-delete-per-action="{{route('apply.destroy',$select->id)}}">
                                                        <span class="lnr lnr-trash"></span> Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-cancelled" role="tabpanel" aria-labelledby="pills-cancelled-tab">
                        <div class="employee-office-table">
                            <div class="table-responsive">
                                <table id="selected-application-table" class="table custom-table mb-0">
                                    <thead>
                                    <tr>
                                        <th>Fullname</th>
                                        <th>Email</th>
                                        <th>Number</th>
                                        <th>Message</th>
                                        <th>Applied for</th>
                                        <th>Company</th>
                                        <th>Application end date</th>
                                        <th>Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(@$cancelled)
                                        @foreach($cancelled as  $cancel)
                                            <tr>
                                                <td>{{ucfirst($cancel->name)}}</td>
                                                <td>{{($cancel->email !== NULL) ? $cancel->email:"Not Filled"}}</td>
                                                <td>{{$cancel->number}}</td>
                                                <td>
                                                    @if($cancel->message !== NULL)
                                                        <div class="wrapper well">
                                                            <div class="desc-wrapper" id="desc-wrapper">
                                                                <p>{{ $cancel->message}}</p>
                                                            </div>
                                                        </div>
                                                @else
                                                    {{"No Message Available"}}
                                                @endif
                                                <td>{{ucfirst($cancel->job->category->name)}}</td>
                                                <td>{{ucfirst($cancel->job->client->name)}}</td>
                                                <td>{{@\Carbon\Carbon::parse($cancel->job->end_date)->isoFormat('MMMM Do, YYYY')}}</td>
                                                <td>
                                                    <div class="dropdown action-label drop-active">
                                                        <a href="javascript:void(0)" class="btn btn-outline-warning btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> {{ ucfirst($cancel->status)}} <i class="caret"></i></a>
                                                        <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 31px, 0px);">
                                                            <a class="dropdown-item status-update" hrm-update-action="{{route('apply-status.update',$cancel->id)}}" href="#" id="pending"> Pending</a>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-right text-danger">
                                                    <a class="btn btn-sm btn-outline-danger action-delete" href="#" hrm-delete-per-action="{{route('apply.destroy',$cancel->id)}}">
                                                        <span class="lnr lnr-trash"></span> Delete
                                                    </a>
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
    <form action="#" method="post" id="deleted-form" >
        {{csrf_field()}}
        <input name="_method" type="hidden" value="DELETE">
    </form>


@endsection

@section('js')

    <script type="text/javascript">

        $(document).ready(function () {
            $('#pending-application-table, #applied-application-table, #processing-application-table, #selected-application-table').DataTable({
                paging: true,
                searching: true,
                ordering:  true,
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
                text: "Removing this will delete applicant data completely",
                type: "info",
                showCancelButton: true,
                closeOnConfirm: false,
                showLoaderOnConfirm: true,
            }, function(){
                $.post( $url, form_data)
                    .done(function(response) {
                        swal("Deleted!", "Job Application Removed Successfully", "success");
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
            if(status == 'cancelled'){
                swal({
                    title: "Are You Sure?",
                    text: "Setting the status to cancelled will remove the application from processing completely. \n \n Set their status to Pending to re-process application!",
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
                        swal("Success!", "Job Application Status has been updated", "success");
                        $(dataResult).remove();
                        setTimeout(function() {
                            window.location.reload();
                        }, 2500);
                    }else{
                        swal({
                            title: "Error!",
                            text: "Failed to update Job Application status",
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
                        text: "Error. Could not confirm the status of the Job Application.",
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



