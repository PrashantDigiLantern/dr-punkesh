@extends('admin.master')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="page-title">
      <div>
        <h1>Result Category Preview</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="{{url('/admin/video-service')}}">Result Category</a></li>
          <li class="active">Result Category Preview</li>
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
            @if(in_array('19',$permissionoprid))
            <div class="form-group col-sm-12">
                <label>First Category Name</label>
                <p>
                  @if(isset($secondsec['firstservice_name']))
                  {{$secondsec['firstservice_name']}}
                  @endif
                </p>
              </div>
              @if(in_array('40',$permissionoprid))
              <div class="form-group col-sm-12">
                <label>Second Category Name</label>
                <p>
                @if(isset($secondsec['secservice_name']))
                  {{$secondsec['secservice_name']}}
                  @endif
                </p>
              </div>
              @if(in_array('41',$permissionoprid))
              <div class="form-group col-sm-12">
                <label>Third Category Name</label>
                <p>
                @if(isset($secondsec['threeservice_name']))
                  {{$secondsec['threeservice_name']}}
                  @endif
                </p>
              </div>
              @if(in_array('42',$permissionoprid))
              <div class="form-group col-sm-12">
                <label>Fourth Category Name</label>
                <p>
                @if(isset($secondsec['fourservice_name']))
                  {{$secondsec['fourservice_name']}}
                  @endif
                </p>
              </div>
              @if(in_array('43',$permissionoprid))
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
                <label>Name</label>
                <p>{{$view->name}}</p>
              </div>
              <div class="form-group col-sm-12">
                <label>Description</label>
                <p>{!! $view->description !!}</p>
              </div>
              <div class="form-group col-sm-12">
                <label>Banner Type</label>
                <p>{!! $view->video_type !!}</p>
              </div>
              <div class="form-group col-md-4">
                <div class="form-group">
                  <label class="control-label">Image</label>
                  @if(isset($view->image))
                  @if($view->image!='')
                  <img src="{{url('/'.session('useradmin')['site_url'].'backend/service_result/service/'.$view->image)}}" style="width: 85px;height: 85px;"><br>
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
                  <label class="control-label">Banner Image</label>
                  @if(isset($view->banner_image))
                  @if($view->banner_image!='')
                  <img src="{{url('/'.session('useradmin')['site_url'].'backend/service_result/service_banner/'.$view->banner_image)}}" style="width: 85px;height: 85px;"><br>
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
              <div class="form-group col-sm-12">
                <label>Videolink</label>
                <p>{{ $view->videolink }}</p>
              </div>

              <div class="form-group col-sm-12">
                <label>Title Tag</label>
                <p>{{$view->title_tag}}</p>
              </div>

              <div class="form-group col-sm-12">
                <label>Keyword Tag</label>
                <p>{{$view->keyword_tag}}</p>
              </div>

              <div class="form-group col-sm-12">
                <label>Description Tag</label>
                <p>{{$view->description_tag}}</p>
              </div>

              <div class="form-group col-sm-12">
                <label>Canonical</label>
                <p>{{$view->canonical_tag}}</p>
              </div>
              <div class="form-group col-sm-12">
                <label>Url</label>
                <p>{{$view->url}}</p>
              </div>
              <div class="col-sm-12 marginT30">
                <a href="{{url('/admin/result_service_publish/'.session('primeid'))}}" class="btn btn-primary icon-btn" type="button">
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