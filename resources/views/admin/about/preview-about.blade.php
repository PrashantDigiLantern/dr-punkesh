@extends('admin.master')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="page-title">
      <div>
        <h1>Fifth Result Category Preview</h1>
        <ul class="breadcrumb side">
        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
        <li><a href="{{url('/admin/fifth-result-category')}}">Result</a></li>
          <li class="active">Fifth Result Category Preview</li>
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
                <label>Heading1</label>
                <p>{{$view->heading1}}</p>
              </div>
              <div class="form-group col-sm-12">
                <label>Section1</label>
                <p>{!! $view->section1 !!}</p>
              </div>
              <div class="form-group col-sm-12">
                <label>Section2</label>
                <p>{!! $view->section2 !!}</p>
              </div>
              <div class="form-group col-sm-12">
                <label>Heading2</label>
                <p>{{$view->heading2}}</p>
              </div>
              <div class="form-group col-sm-12">
                <label>Section3</label>
                <p>{!! $view->section3 !!}</p>
              </div>
              <div class="form-group col-sm-12">
                <label>Heading3</label>
                <p>{{$view->heading3}}</p>
              </div>
              <div class="form-group col-sm-12">
                <label>Section4</label>
                <p>{!! $view->section4 !!}</p>
              </div>
              <div class="form-group col-sm-12">
                <label>Heading4</label>
                <p>{{$view->heading4}}</p>
              </div>
              <div class="form-group col-sm-12">
                <label>Section5</label>
                <p>{!! $view->section5 !!}</p>
              </div>
              <div class="col-sm-12 marginT30">
                <a href="{{url('/admin/about_publish/'.session('primeid'))}}" class="btn btn-primary icon-btn" type="button">
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