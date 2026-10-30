@extends('admin.master')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="page-title">
      <div>
        <h1>Third Category Preview</h1>
        <ul class="breadcrumb side">
        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
        <li><a href="{{url('/admin/third-category')}}">Services</a></li>
          <li class="active">Third Category Preview</li>
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
                <label>First Category Name</label>
                <p>
                @if(isset($secondsec['firstservice_name']))
                  {{$secondsec['firstservice_name']}}
                  @endif
                </p>
              </div>
              <div class="form-group col-sm-12">
                <label>Second Category Name</label>
                <p>
                @if(isset($secondsec['secservice_name']))
                  {{$secondsec['secservice_name']}}
                  @endif
                </p>
              </div>
              <div class="form-group col-sm-12">
                <label>Third Category Name</label>
                <p>{{$view->service_name}}</p>
              </div>
              <div class="form-group col-sm-12">
                <label>Short Description</label>
                <p>{!! $view->short_desc !!}</p>
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
                  @if(isset($view->service_image))
                  @if($view->service_image!='')
                  <img src="{{url('/'.session('useradmin')['site_url'].'backend/service/image/'.$view->service_image)}}" style="width: 85px;height: 85px;"><br>
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
                  @if(isset($view->service_banner_image))
                  @if($view->service_banner_image!='')
                  <img src="{{url('/'.session('useradmin')['site_url'].'backend/service/banner/'.$view->service_banner_image)}}" style="width: 85px;height: 85px;"><br>
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
                <p>{{ $view->video_link }}</p>
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
                <a href="{{url('/admin/service_category_publish/'.session('primeid'))}}" class="btn btn-primary icon-btn" type="button">
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