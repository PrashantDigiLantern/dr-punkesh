@extends('admin.master')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="page-title">
      <div>
        <h1>Result Preview</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="{{url('/admin/service-video-inner')}}">Result</a></li>
          <li class="active">Result Preview</li>
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
                <p>@if(isset($servicedata->service_name))
                  {{$servicedata->service_name}}
                  @endif
                </p>
              </div>
              <div class="form-group col-sm-12">
                <label>Heading</label>
                <p>{{$view->name}}</p>
              </div>
              <div class="form-group col-md-4">
                <div class="form-group">
                  <label class="control-label">Before Image</label>
                  @if(isset($view->beforeimg))
                  @if($view->beforeimg!='')
                  <img src="{{url('/'.session('useradmin')['site_url'].'backend/service_result/inner/'.$view->beforeimg)}}" style="width: 85px;height: 85px;"><br>
                  @else
                  <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                  @endif
                  @else
                  <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                  @endif

                </div>
              </div>

              <div class="form-group col-md-4">
                <div class="form-group">
                  <label class="control-label">After Image</label>
                  @if(isset($view->afterimg))
                  @if($view->afterimg!='')
                  <img src="{{url('/'.session('useradmin')['site_url'].'backend/service_result/inner/'.$view->afterimg)}}" style="width: 85px;height: 85px;"><br>
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
                <p>{{$view->alt_img}}</p>
              </div>
              
              <div class="col-sm-12 marginT30">
                <a href="{{url('/admin/result_inner_publish/'.session('primeid'))}}" class="btn btn-primary icon-btn" type="button">
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