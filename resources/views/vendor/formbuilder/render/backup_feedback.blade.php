@extends('formbuilder::layout')
@section('title') {{ $form->name }} @endsection

@section('content')
<div class="col-xl-9 col-lg-8 col-md-12">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <h5 class="card-title">
                        Form Successfully submitted

                        @auth
                            <a href="{{ route('formbuilder::my-submissions.index') }}" class="btn btn-primary btn-sm float-md-right">
                                <i class="fa fa-th-list"></i> Go To My Submissions
                            </a>
                        @endauth
                    </h5>
                </div>

                <div class="card-body">
                    <h3 class="text-center text-success">
                        Your entry for <strong>{{ $form->name }}</strong> was successfully submitted.
                    </h3>
                </div>

                <div class="card-footer">
                    <a href="{{ route('home') }}" class="btn btn-primary confirm-form">
                        <i class="fa fa-home"></i> Return Home
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
