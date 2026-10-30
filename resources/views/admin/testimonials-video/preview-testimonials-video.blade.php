@extends('admin.master')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="page-title">
      <div>
        <h1>Video Preview</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="{{url('/admin/service-video-inner')}}">Video</a></li>
          <li class="active">Video Preview</li>
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
             
            @if(in_array('22',$permissionoprid))
            <div class="form-group col-sm-12">
                <label>First Category Name</label>
                <p>
                  @if(isset($secondsec['firstservice_name']))
                  {{$secondsec['firstservice_name']}}
                  @endif
                </p>
              </div>
              @if(in_array('44',$permissionoprid))
              <div class="form-group col-sm-12">
                <label>Second Category Name</label>
                <p>
                @if(isset($secondsec['secservice_name']))
                  {{$secondsec['secservice_name']}}
                  @endif
                </p>
              </div>
              @if(in_array('45',$permissionoprid))
              <div class="form-group col-sm-12">
                <label>Third Category Name</label>
                <p>
                @if(isset($secondsec['threeservice_name']))
                  {{$secondsec['threeservice_name']}}
                  @endif
                </p>
              </div>
              @if(in_array('46',$permissionoprid))
              <div class="form-group col-sm-12">
                <label>Fourth Category Name</label>
                <p>
                @if(isset($secondsec['fourservice_name']))
                  {{$secondsec['fourservice_name']}}
                  @endif
                </p>
              </div>
              @if(in_array('47',$permissionoprid))
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
                <label>Video Service Name</label>
                <p>@if(isset($videoservice->vid_ser_id))
                  {{$videoservice->name}}
                  @endif
                </p>
              </div>
              <div class="form-group col-sm-12">
                <label>Service Name</label>
                <p>@if(isset($servicedata->service_name))
                  {{$servicedata->service_name}}
                  @endif
                </p>
              </div>
              <div class="form-group col-sm-12">
                <label>Heading</label>
                <p>@if(isset($view->name)){{$view->name}}@endif</p>
              </div>
              <div class="form-group col-md-4">
                <div class="form-group">
                  <label class="control-label">Image</label>
                  @if(isset($view->image))
                  @if($view->image!='')
                  <img src="{{url('/'.session('useradmin')['site_url'].'backend/service_video/inner/'.$view->image)}}" style="width: 85px;height: 85px;"><br>
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
                <p>@if(isset($view->alt_img)){{$view->alt_img}}@endif</p>
              </div>
              <div class="form-group col-sm-12">
                <label>Videolink</label>
                <p>@if(isset($view->video)){{ $view->video }}@endif</p>
              </div>

              <div class="col-sm-12 marginT30">
                <a href="{{url('/admin/video_inner_publish/'.session('primeid'))}}" class="btn btn-primary icon-btn" type="button">
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