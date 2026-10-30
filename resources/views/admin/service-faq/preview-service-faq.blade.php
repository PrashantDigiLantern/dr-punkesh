@extends('admin.master')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="page-title">
      <div>
        <h1>Service Category Preview</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="{{url('/admin/service-faq')}}">Service Category</a></li>
          <li class="active">Service Category Preview</li>
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
            @if(in_array('16',$permissionoprid))
            <div class="form-group col-sm-12">
                <label>First Category Name</label>
                <p>
                  @if(isset($secondsec['firstservice_name']))
                  {{$secondsec['firstservice_name']}}
                  @endif
                </p>
              </div>
              @if(in_array('36',$permissionoprid))
              <div class="form-group col-sm-12">
                <label>Second Category Name</label>
                <p>
                @if(isset($secondsec['secservice_name']))
                  {{$secondsec['secservice_name']}}
                  @endif
                </p>
              </div>
              @if(in_array('37',$permissionoprid))
              <div class="form-group col-sm-12">
                <label>Third Category Name</label>
                <p>
                @if(isset($secondsec['threeservice_name']))
                  {{$secondsec['threeservice_name']}}
                  @endif
                </p>
              </div>
              @if(in_array('38',$permissionoprid))
              <div class="form-group col-sm-12">
                <label>Fourth Category Name</label>
                <p>
                @if(isset($secondsec['fourservice_name']))
                  {{$secondsec['fourservice_name']}}
                  @endif
                </p>
              </div>
              @if(in_array('39',$permissionoprid))
              <div class="form-group col-sm-12">
                <label>Fifth Category Name</label>
                <p>
                @if(isset($secondsec['fifservice_name']))
                  {{$secondsec['fifservice_name']}}
                  @endif
                </p>
              </div>
              @endif
                        @endif
                        @endif
                        @endif
                        @endif
              <div class="form-group col-sm-12">
                <label>Service Name</label>
                <p>{{$service->service_name}}</p>
              </div>
              <div class="form-group col-sm-12">
                <label>Question</label>
                <p>{!! $view->question !!}</p>
              </div>
              <div class="form-group col-sm-12">
                <label>Answer</label>
                <p>{!! $view->answer !!}</p>
              </div>
              <div class="col-sm-12 marginT30">
                <a href="{{url('/admin/service_faq_publish/'.session('primeid'))}}" class="btn btn-primary icon-btn" type="button">
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