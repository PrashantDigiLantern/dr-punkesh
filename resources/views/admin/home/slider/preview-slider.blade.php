@extends('admin.master')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="page-title">
      <div>
        <h1>Primary Menu Preview</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="{{url('/admin/slider')}}">Primary Menu</a></li>
          <li class="active">Primary Menu Preview</li>
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
                                    <label>Name</label>
                                    <p>{{$view->name}}</p>
                                </div>
                                <div class="form-group col-sm-12">
                                <label>Image</label>
                                @if(isset($view->image))   
                                @if($view->image!='')
                                <img src="{{url('/'.session('useradmin')['site_url'].'backend/slider/'.$view->image)}}" style="width: 85px;height: 85px;"><br>
                                @else
                                <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                                @endif
                                @else
                                <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                                @endif
                                </div>
                                <div class="form-group col-sm-12">
                                    <label>Alt Tag</label>
                                    <p>{{$view->alt_tag}}</p>
                                </div>

                                <div class="form-group col-sm-12">
                                    <label>Description</label>
                                    <p>{{$view->description}}</p>
                                    <div id="short_nameshow"></div>
                                </div>

                                <div class="form-group col-sm-12">
                                    <label>Button Type</label>
                                    <p>{{strip_tags($view->button_type)}}</p>
                                    <div id="descriptionshow"></div>
                                </div>
                               
                                <div class="form-group col-sm-12">
                                    <label>Button Name</label>
                                    <p>{{$view->button_name}}</p>
                                    <div id="sourceshow"></div>
                                </div>

                                <div class="form-group col-sm-12">
                                    <label>Button Url</label>
                                    <p>{{$view->button_url}}</p>
                                    <div id="ratingshow"></div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label>Button Style</label>
                                    <p>{{$view->button_style}}</p>
                                    <div id="ratingshow"></div>
                                </div>
                                
                                
                               
                                <div class="col-sm-12 marginT30">
                                    <a href="{{url('/admin/slider_publish/'.session('primeid'))}}" class="btn btn-primary icon-btn" type="button">
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