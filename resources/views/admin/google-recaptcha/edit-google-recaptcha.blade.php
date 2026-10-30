@extends('admin.master')
@section('content')
@php 
$primeid = session('primeid');
@endphp
<section id="main-content">
    <section class="wrapper">
        <div class="card cardsec">
            <div class="card-body">
                <div class="page-title pagetitle">
                    <h1>Edit Google Recaptcha</h1>
                    <ul class="breadcrumb side">
                        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
                        <li><a href="{{url('/admin/google-recaptcha')}}">Setup & Configuration</a></li>
                        <li><a href="{{url('/admin/google-recaptcha')}}">Google Recaptcha</a></li>
                        <li class="active">Edit Google Recaptcha</li>
                    </ul>
                </div>
            </div>
        </div>
        <form action="{{URL::to('/admin/create_google_recaptcha')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <div class="card">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
                <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
                <input type="hidden" name="updated_by" value="{{session('useradmin')['usr_id']}}">
                <input type="hidden" name="google_id" id="google_id" value="@if(isset($primeid)){{$primeid}}@else 0 @endif">
                <div class="card-body">
                    <div class="row">
                            <div class="form-group col-sm-6">
                                <label>Site Key</label>
                                <input class="form-control" value="{{$edit->site_key}}" name="site_key" type="text">
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Secret Key</label>
                                <input class="form-control" value="{{$edit->secret_key}}" name="secret_key" type="text">
                            </div>
                        
                    </div>
                    <div class="row">
                       
                        <div class="col-sm-12 marginT30">
                            <button type="submit" class="btn btn-primary icon-btn" onclick="validatesec()"><i class="fa fa-fw fa-lg fa-check-circle"></i>Preview</button>&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-default icon-btn" href="{{url('/admin/google-recaptcha')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                        </div>

                    </div>
                </div>
            </div>
        </form>

    </section>
</section>
<script>
    CKEDITOR.replace('textArea');
</script>

@endsection