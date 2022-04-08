@extends('formbuilder::front_layout')
@section('title') {{ $pageTitle }} @endsection

@section('styles')

<style>
   
   .contact-details-section-two {
        position: static;
        padding-top: 100px;
        padding-bottom: 70px;
        background-color: #f1f5f8;
    }

    input.parsley-success,
    select.parsley-success,
    textarea.parsley-success {
        color: #468847;
        background-color: #DFF0D8;
        border: 1px solid #D6E9C6;
    }

    input.parsley-error,
    select.parsley-error,
    textarea.parsley-error {
        color: #B94A48;
        background-color: #F2DEDE;
        border: 1px solid #EED3D7;
    }

    .parsley-errors-list {
        margin: 2px 0 3px;
        padding: 0;
        list-style-type: none;
        font-size: 0.9em;
        line-height: 0.9em;
        opacity: 0;
        color: #B94A48;

        transition: all .3s ease-in;
        -o-transition: all .3s ease-in;
        -moz-transition: all .3s ease-in;
        -webkit-transition: all .3s ease-in;
    }

    .parsley-errors-list.filled {
        opacity: 1;
    }

    .rendered-form .fb-radio-group .radio label {
        display: inline;
    }

    .rendered-form .fb-radio-group .radio-inline label {
        display: inline ;
        margin-bottom: 0;
    }

    input[type=checkbox], input[type=radio] {
        box-sizing: border-box;
        padding: 0;
    }

    .rendered-form .fb-radio-group .radio input{
        position: absolute !important;
        margin-top: 0.3rem !important;
        margin-left: -1.25rem !important;
    }
    .rendered-form .fb-radio-group .radio-inline input {
        position: static !important;
        margin-top: 0 !important;
        margin-right: 0.3125rem !important;
        margin-left: 0 !important;
    }

    .rendered-form .fb-radio-group .radio {
        position: relative;
        display: block;
        padding-left: 1.25rem !important;
    }

    .rendered-form .fb-radio-group .radio-inline {
        display: -ms-inline-flexbox;
        display: inline-flex;
        -ms-flex-align: center;
        align-items: center;
        padding-left: 0;
        margin-right: 0.75rem;
        position: relative;
    }

    .rendered-form .fb-checkbox-group .checkbox {
        position: relative;
        display: block;
        padding-left: 1.25rem !important;
    }

    .rendered-form .fb-checkbox-group .checkbox input {
        position: absolute !important;
        margin-top: 0.3rem !important;
        margin-left: -1.25rem !important;
    }

    .rendered-form .fb-checkbox-group .checkbox label {
        display: inline-block;
        margin-bottom: 0;
    }

    .rendered-form .fb-checkbox-group .checkbox-inline {
        display: -ms-inline-flexbox;
        display: inline-flex;
        -ms-flex-align: center;
        align-items: center;
        padding-left: 0;
        margin-right: 0.75rem;
        position: relative;
    }

    .rendered-form .fb-checkbox-group .checkbox-inline input {
        position: static !important;
        margin-top: 0 !important;
        margin-right: 0.3125rem !important;
        margin-left: 0 !important;
    }

    .rendered-form .fb-checkbox-group .checkbox-inline label {
        display: inline-block;
        margin-bottom: 0;
    }
</style>
@endsection
@section('content')

    <!-- Page Title -->
    <section class="page-title" style="background-image: url({{asset('assets/frontend/images/background/7.jpg')}});">
        <div class="auto-container">
            <div class="content-box">
                <div class="content-wrapper">
                    <div class="title">
                        <h1>Application</h1>
                    </div>
                    <ul class="bread-crumb clearfix">
                        <li><a href="/">Home</a></li>
                        <li><a href="{{route('job.list')}}">Jobs</a></li>
                        
                        <li>White Pearl Form Application</li>
                    </ul>
                </div>                    
            </div>
        </div>
    </section>
    <!-- Page Title -->
    <section class="contact-details-section-two">
        <div class="auto-container">
            <form action="{{ route('formbuilder::form.submit', $form->identifier) }}" class="wpcf7-form init" method="POST" id="submitForm" enctype="multipart/form-data">
                @csrf
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-block">
                        <strong class="sent-success">{{ $message }}</strong>
                    </div>
                @endif
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-block">
                        <strong class="error-sent">{{ $message }}</strong>
                    </div>
                @endif
                <div class="row justify-content-center">
                    <div class="col-md-7">
                        <div id="fb-render"></div>
                    </div>

                    <div class="col-md-7">
                        <button type="submit" class="btn btn-primary confirm-form btn-style-one" data-form="submitForm" data-message="Submit your entry for '{{ $form->name }}'?">
                            <i class="fa fa-submit"></i> Send Now 
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </section>


@endsection

@push(config('formbuilder.layout_js_stack', 'scripts'))
    <script type="text/javascript">
        window._form_builder_content = {!! json_encode($form->form_builder_json) !!}
    </script>
    <script src="{{ asset('vendor/formbuilder/js/render-form.js') }}{{ doode\FormBuilder\Helper::bustCache() }}" defer></script>
@endpush
