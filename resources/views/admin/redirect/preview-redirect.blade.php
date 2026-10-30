@extends('admin.master')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="page-title">
      <div>
        <h1>Redirect Preview</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="{{url('/admin/redirect')}}">Redirect</a></li>
          <li class="active">Redirect Preview</li>
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
                <label>Redirect Page Name</label>
                <p>{{$view->page_name}}</p>
              </div>
              <div class="form-group col-sm-12">
                <label>Port</label>
                <p>{{$view->port}}</p>
              </div>

              <div class="form-group col-sm-12">
                <label>Old Url</label>
                <p>{{$view->old_url}}</p>
              </div>

              <div class="form-group col-sm-12">
                <label>Current Url</label>
                <p>{{$view->current_url}}</p>
              </div>
             
              <div class="col-sm-12 marginT30">
                <a href="{{url('/admin/create_redirect_publish/'.session('primeid'))}}" class="btn btn-primary icon-btn" type="button">
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