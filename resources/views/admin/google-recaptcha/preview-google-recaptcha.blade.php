@extends('admin.master')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="page-title">
      <div>
        <h1>Google Recaptcha Preview</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="{{url('/admin/google-recaptcha')}}">Google Recaptcha</a></li>
          <li class="active">Google Recaptcha Preview</li>
        </ul>
      </div>
      <div>
        <a href="{{url()->previous()}}" class="btn btn-primary">Back</a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
          <div class="row">
                                <div class="form-group col-sm-12">
                                    <label>Site Key</label>
                                    <p>{{$view->site_key}}</p>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label>Secret Key</label>
                                    <p>{{$view->secret_key}}</p>
                                </div>
                                <div class="col-sm-12 marginT30">
                                    <a href="{{url('/admin/google_recaptcha_publish/'.session('primeid'))}}" class="btn btn-primary icon-btn" type="button">
                                        <i class="fa fa-fw fa-lg fa-check-circle"></i>Publish
</a>&nbsp;&nbsp;&nbsp;
                                </div>
                            </div>
           
          </div>
        </div>
      </div>
    </div>
  </section>
</section>

<!--main content end-->
@endsection