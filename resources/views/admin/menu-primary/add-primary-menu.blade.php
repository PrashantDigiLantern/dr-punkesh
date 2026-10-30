@extends('admin.master')
@section('content')
@php 
$primeid = session('primeid');
@endphp
<div id="main">
<section id="main-content">
    <section class="wrapper">
	
	  
  					 <!-- <div class="content-wrapper-before  gradient-45deg-indigo-purple "> </div>
	<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
<div class="container">
  <div class="row">
    <div class="col s10 m6 l6">
      <h5 class="breadcrumbs-title mt-0 mb-0"><span>Add Primary Menu</span></h5>
      <ol class="breadcrumbs mb-0">
        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Home</a>
        </li>
		<li class="breadcrumb-item"><a href="{{url('/admin/primary-menu')}}">Menu</a>
        </li>
		<li class="breadcrumb-item"><a href="{{url('/admin/primary-menu')}}">Primary Menu List</a>
        </li>
        <li class="breadcrumb-item active">Add Primary Menu</li>
      </ol>
    </div>
  </div>
</div>
</div>
	
		<div class="container">
<div class="card">
        <div class="card-content textalign">
  <a class="waves-effect waves-light btn mr-1" href="{{url('/admin/dashboard')}}">Back</a>
  </div>
</div>
</div> -->
  
	
	
	
	
	
        <div class="card cardsec">
            <div class="card-body">
                <div class="page-title pagetitle">
                    <h1>Add Primary Menu</h1>
                    <ul class="breadcrumb side">
                        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
                        <li><a href="{{url('/admin/primary-menu')}}">Menu</a></li>
                        <li><a href="{{url('/admin/primary-menu')}}">Primary Menu List</a></li>
                        <li class="active">Add Primary Menu</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Start form here -->
        <form action="{{URL::to('/admin/create_primary')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
        <input type="hidden" value="{{ csrf_token() }}" name="_token">
            <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
            <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
            <input type="hidden" name="created_by" value="{{session('useradmin')['usr_id']}}">
            <input type="hidden" name="mnu_id" id="mnu_id" value="@if(isset($primeid)){{$primeid}}@else 0 @endif">
            <input type="hidden" name="menu_type" value="primarymenu">
            <div class="container1">
			<div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-4 col s4">
                            <label class="control-label">Name</label>
                            <input class="form-control" name="name" value="@if(isset($view->name)) {{$view->name}} @endif" type="text" required>
                        </div>

                        <div class="form-group  col-md-4 col s4">
                            <label class="control-label">Dropdown</label>
                            <select class="form-control" name="dropdown" required>
                                <option value="">Select Dropdown</option>
                                <option value="Yes" @if(isset($view->dropdown))@if($view->dropdown=='Yes') selected @endif @endif>Yes</option>
                                <option value="No" @if(isset($view->dropdown))@if($view->dropdown=='No') selected @endif @endif>No</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4 col s4">
                            <label class="control-label">Page Heading</label>
                            <input class="form-control" value="@if(isset($view->page_heading)) {{$view->page_heading}} @endif" name="page_heading" type="text">
                        </div>

                        <div class="form-group col-md-4 col s4">
                            @if(isset($view->menu_banner_image))   
                            @if($view->menu_banner_image!='')
                                <img src="{{url('/'.session('useradmin')['site_url'].'backend/menu/'.$view->menu_banner_image)}}" style="width: 85px;height: 85px;"><br>
                                @else
                                <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                                @endif
                                @else
                                <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                                @endif
                                <label class="control-label">Banner Image</label>
                                <input class="form-control" name="image" type="file">
                                <input class="form-control" name="oldimage" value="@if(isset($view->menu_banner_image)){{$view->menu_banner_image}}@endif" type="hidden">
                        </div>
                        <div class="form-group col-sm-4 col s4">
                            <label>Image Alt Tag</label>
                            <input class="form-control" value="@if(isset($view->alt_tag)) {{$view->alt_tag}} @endif" name="alt_tag" type="text">
                        </div>
                        <!-- <div class="form-group col-sm-4">
                            <label>Title Tags</label>
                            <input class="form-control" value="@if(isset($view->title_tag)) {{$view->title_tag}} @endif" name="title_tag" type="text">
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Keyword Tag</label>
                            <input class="form-control" value="@if(isset($view->keyword_tag)) {{$view->keyword_tag}} @endif" name="keyword_tag" type="text">
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Description Tag</label>
                            <input class="form-control" value="@if(isset($view->description_tag)) {{$view->description_tag}} @endif" name="description_tag" type="text">
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Canonical</label>
                            <input class="form-control" value="@if(isset($view->canonical)) {{$view->canonical}} @endif" name="canonical" type="text">
                        </div> -->
                        <div class="form-group col-sm-4 col s4">
                            <label>Url</label>
                            <input class="form-control" value="@if(isset($view->urllink)) {{$view->urllink}} @endif" name="urllink" type="text" required>
                        </div>

                        <div class="col-sm-12 marginT30 col s12" style="padding-top: 20px; padding-bottom: 20px;">
                            <button type="submit" class="btn btn-primary icon-btn" onclick="validatesec()">
                                <i class="fa fa-fw fa-lg fa-check-circle"></i>Submit
                            </button>&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-default icon-btn" href="{{url('/admin/primary-menu')}}">
                                <i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </div>
			</div>
        </form>
        <!-- End form -->

    </section>
</section>
</div>
<script>
    CKEDITOR.replace('textArea');
</script>
@endsection