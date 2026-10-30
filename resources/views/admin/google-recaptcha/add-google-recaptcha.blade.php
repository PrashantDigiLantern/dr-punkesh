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
                    <h1>Add Google Recaptcha</h1>
                    <ul class="breadcrumb side">
                        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
                        <li><a href="{{url('/admin/google-recaptcha')}}">Setup & Configuration</a></li>
                        <li><a href="{{url('/admin/google-recaptcha')}}">Google Recaptcha List</a></li>
                        <li class="active">Add Google Recaptcha</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Start form here -->
        <form action="{{URL::to('/admin/create_google_recaptcha')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <input type="hidden" value="{{ csrf_token() }}" name="_token">
            <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
            <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
            <input type="hidden" name="created_by" value="{{session('useradmin')['usr_id']}}">
            <input type="hidden" name="google_id" id="google_id" value="@if(isset($primeid)){{$primeid}}@else 0 @endif">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                       
                        <div class="form-group col-sm-4">
                            <label class="control-label">Site Key</label>
                            <input class="form-control" name="site_key" value="@if(isset($view->site_key)) {{$view->site_key}} @endif" type="text" required>
                        </div>

                        <div class="form-group col-sm-4">
                            <label class="control-label">Secret Key</label>
                            <input class="form-control" name="secret_key" value="@if(isset($view->secret_key)) {{$view->secret_key}} @endif" type="text" required>
                        </div>

                        <div class="col-sm-12 marginT30">
                        <button id="myBtn" onclick="validatesec()" class="btn btn-primary icon-btn" type="submit">
                                <i class="fa fa-fw fa-lg fa-check-circle"></i>Preview
                            </button>&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-default icon-btn" href="{{url('/admin/google-recaptcha')}}">
                                <i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- End form -->

    </section>
</section>

<script>
    CKEDITOR.replace('textArea');

   
  
   
</script>
@endsection