@extends('admin.master')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="page-title">
      <div>
        <h1>Blog Preview</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="{{url('/admin/blogs')}}">Blog</a></li>
          <li class="active">Blog Preview</li>
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
                <label>Show Type</label>
                <p>{{$view->blog_show_type}}</p>
              </div>
              <div class="form-group col-sm-12">
                <label>Blog Name</label>
                <p>{{$view->blog_name}}</p>
              </div>
              <div class="form-group  col-md-4">
                <div class="form-group">
                  <label class="control-label">Blog Image</label>
                  @if(isset($view->blog_image))
                  @if($view->blog_image!='')
                  <img src="{{url('/'.session('useradmin')['site_url'].'backend/blog/'.$view->blog_image)}}" style="width: 85px;height: 85px;"><br>
                  @else
                  <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                  @endif
                  @else
                  <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                  @endif

                </div>
              </div>

              <div class="form-group  col-md-4">
                <div class="form-group">
                  <label class="control-label">Blog Image</label>
                  @if(isset($view->blog_image_inner))
                  @if($view->blog_image_inner!='')
                  <img src="{{url('/'.session('useradmin')['site_url'].'backend/blog/'.$view->blog_image_inner)}}" style="width: 85px;height: 85px;"><br>
                  @else
                  <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                  @endif
                  @else
                  <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                  @endif
                </div>
              </div>
              <div class="form-group col-sm-12">
                <label>Dr. Name</label>
                <p>{{strip_tags($view->name)}}</p>
              </div>
              <div class="form-group col-sm-12">
                <label>Dr. Description</label>
                <p>{{strip_tags($view->dr_description)}}</p>
              </div>
              <div class="form-group col-sm-12">
                <label>Sort Descrition</label>
                <p>{{strip_tags($view->short_desc)}}</p>
              </div>
              <div class="form-group col-sm-12">
                <label>Blog Description</label>
                <p>{{strip_tags($view->blog_description)}}</p>
              </div>
              <div class="form-group col-sm-12">
                <label>Alt Image Name</label>
                <p>{{strip_tags($view->alt_image_name)}}</p>
              </div>
              <div class="form-group col-sm-12">
                <label>Tags</label>
                <p>{{strip_tags($view->tags)}}</p>
              </div>
              <div class="form-group col-sm-12">
                <label>Date</label>
                <p>{{$view->date}}</p>
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
                <p>{{$view->canonical}}</p>
              </div>
              <div class="form-group col-sm-12">
                <label>Url</label>
                <p>{{$view->url}}</p>
              </div>
              <div class="col-sm-12 marginT30">
                <a href="{{url('/admin/create_blog_publish/'.session('primeid'))}}" class="btn btn-primary icon-btn" type="button">
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