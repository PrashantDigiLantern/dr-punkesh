@extends('admin.master')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="page-title">
      <div>
        <h1>Doctor Certificate Preview</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="{{url('/admin/doctor-certificate')}}">Doctor Certificate</a></li>
          <li class="active">Doctor Certificate Preview</li>
        </ul>
      </div>
      <div>
        <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
            <div class="form-group col-sm-12">
                <label>Certificate Show Type</label>
                <p>{{$view->certificate_show_type}}</p>
              </div>
              <div class="form-group  col-md-12">
                <div class="form-group">
                  <label class="control-label">Image</label>
                  @if(isset($view->certificate_image))
                  @if($view->certificate_image!='')
                  <img src="{{url('/'.session('useradmin')['site_url'].'backend/certificate/'.$view->certificate_image)}}" style="width: 85px;height: 85px;"><br>
                  @else
                  <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                  @endif
                  @else
                  <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                  @endif

                </div>
              </div>

              <div class="form-group  col-md-12">
                <div class="form-group">
                  <label class="control-label">Full Image</label>
                  @if(isset($view->full_image))
                  @if($view->full_image!='')
                  <img src="{{url('/'.session('useradmin')['site_url'].'backend/certificate/'.$view->full_image)}}" style="width: 85px;height: 85px;"><br>
                  @else
                  <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                  @endif
                  @else
                  <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                  @endif
                </div>
              </div>

              <div class="form-group col-sm-12">
                <label>Alt Tag</label>
                <p>{{$view->alt_tag}}</p>
              </div>
              <div class="col-sm-12 marginT30">
                <a href="{{url('/admin/doctor_certificate_publish/'.session('primeid'))}}" class="btn btn-primary icon-btn" type="button">
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