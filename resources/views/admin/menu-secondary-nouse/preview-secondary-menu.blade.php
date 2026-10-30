@extends('admin.master')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="page-title">
      <div>
        <h1>Secondary Menu Preview</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="{{url('/admin/secondary-menu')}}">Secondary Menu</a></li>
          <li class="active">Secondary Menu Preview</li>
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
                                    <label>Primary Menu Name</label>
                                    <p>{{$view->primaryname}}</p>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label>Name</label>
                                    <p>{{$view->name}}</p>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label>Type</label>
                                    <p>{{$view->type}}</p>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label>Page Heading</label>
                                    <p>{{$view->page_heading}}</p>
                                </div>

                                <div class="form-group col-sm-12">
                                    <label>Url</label>
                                    <p>{{$view->urllink}}</p>
                                    <div id="short_nameshow"></div>
                                </div>

                                <div class="form-group col-sm-12">
                                    <label>Dropdown</label>
                                    <p>{{strip_tags($view->dropdown)}}</p>
                                    <div id="descriptionshow"></div>
                                </div>
                                <div class="form-group col-sm-12">
                                <label>Banner Image</label>
                                @if(isset($view->menu_banner_image))   
                            @if($view->menu_banner_image!='')
                                <img src="{{url('/'.session('useradmin')['site_url'].'backend/menu/secondary/'.$view->menu_banner_image)}}" style="width: 85px;height: 85px;"><br>
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
                                    <div id="sourceshow"></div>
                                </div>

                                <div class="form-group col-sm-12">
                                    <label>Title Tag</label>
                                    <p>{{$view->title_tag}}</p>
                                    <div id="ratingshow"></div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label>Keyword Tag</label>
                                    <p>{{$view->keyword_tag}}</p>
                                    <div id="ratingshow"></div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label>Description Tag</label>
                                    <p>{{$view->description_tag}}</p>
                                    <div id="ratingshow"></div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label>Canonical Tag</label>
                                    <p>{{$view->canonical}}</p>
                                    <div id="ratingshow"></div>
                                </div>
                                
                               
                                <div class="col-sm-12 marginT30">
                                    <a href="{{url('/admin/create_secondary_publish/'.session('primeid'))}}" class="btn btn-primary icon-btn" type="button">
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