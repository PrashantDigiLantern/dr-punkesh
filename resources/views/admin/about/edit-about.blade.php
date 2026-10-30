@extends('admin.master')
@section('content')
<div id="main">
<section id="main-content">
    <section class="wrapper">
	
		 <!-- <div class="content-wrapper-before  gradient-45deg-indigo-purple "> </div>
	<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
<div class="container">
  <div class="row">
    <div class="col s10 m6 l6">
      <h5 class="breadcrumbs-title mt-0 mb-0"><span>About Clinic</span></h5>
      <ol class="breadcrumbs mb-0">
        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Home</a>
        </li>
        <li class="breadcrumb-item"><a href="{{url('/admin/about')}}">About</a>
        </li>
        <li class="breadcrumb-item active">About Clinic</li>
      </ol>
    </div>
  </div>
</div>
</div> -->
	
		<!-- <div class="container">
<div class="card">
        <div class="card-content textalign">
  <a class="waves-effect waves-light btn mr-1" href="http://192.168.0.91:8000/add-site">Add Site</a>
  </div>
</div>
</div> -->
	
	
	
	
	
	
        <div class="card cardsec">
            <div class="card-body">
                <div class="page-title pagetitle">
                    <h1>About Clinic</h1>
                    <ul class="breadcrumb side">
                        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
                        <li><a href="{{url('/admin/about')}}">About</a></li>
                        <!-- <li><a href="{{url('/service-result')}}">About Clinic List</a></li> -->
                        <li class="active">About Clinic</li>
                    </ul>
                </div>
            </div>
        </div>

        <form action="{{ url('/admin/create_about') }}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <div class="card">
                @csrf
                <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
                <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
                <input type="hidden" name="created_by" value="{{session('useradmin')['usr_id']}}">
                <input value="@if(isset($view->abt_id)){{$view->abt_id}}@else{{'0'}}@endif" name="abt_id" type="hidden">
                <div class="card-body">
				<div class="container">
                    <div class="row">
                    <div class="form-group col-md-12 col s12">
                            <label>Name</label>
                            <input class="form-control" value="@if(isset($view->name)){{$view->name}}@endif" name="name" type="text" required>
                        </div>
                        <div class="form-group  col-md-4 col s4">
                    @if(isset($view->image))
                            @if($view->image!='')
                            <img src="{{url('/'.session('useradmin')['site_url'].'backend/about/'.$view->image)}}" style="width: 85px;height: 85px;"><br>
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                            @endif
                            <div class="form-group">
                                <label class="control-label">Image</label>
                                <input class="form-control" name="image" type="file">
                                <input class="form-control" name="oldimage" value="@if(isset($view->image)){{$view->image}}@endif" type="hidden">
                            </div>
                </div>

                <div class="form-group  col-md-4 col s4">
                @if(isset($view->home_image))
                            @if($view->home_image!='')
                            <img src="{{url('/'.session('useradmin')['site_url'].'backend/about/'.$view->home_image)}}" style="width: 85px;height: 85px;"><br>
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:65px;height:65px;">
                            @endif
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:65px;height:65px;"><br>
                            @endif
                            <div class="form-group">
                                <label class="control-label">Home Image</label>
                                <input class="form-control" name="home_image" type="file">
                                <input class="form-control" name="oldhome_image" value="@if(isset($view->home_image)){{$view->home_image}}@endif" type="hidden">
                            </div>
                </div>
				<br>
                        <div class="form-group col-sm-12 col s12">
                            <label>Home Section</label>
                            <textarea class="form-control ckeditor" name="home_section" rows="3">@if(isset($view->home_section)){{$view->home_section}}@endif</textarea>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group col-md-12 col s12">
                            <label>Heading1</label>
                            <input class="form-control" value="@if(isset($view->heading1)){{$view->heading1}}@endif" name="heading1" type="text" required>
                        </div>
                        <div class="form-group col-sm-12 col s12">
                            <label>Section1</label>
                            <textarea class="form-control ckeditor" name="section1" rows="3">@if(isset($view->section1)){{$view->section1}}@endif</textarea>
                            <span class="help-block"></span>
                        </div> 
                        <div class="form-group col-sm-12 col s12">
                            <label>Section2</label>
                            <textarea class="form-control ckeditor" name="section2" rows="3">@if(isset($view->section2)){{$view->section2}}@endif</textarea>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group col-md-12 col s12">
                            <label>Heading2</label>
                            <input class="form-control" value="@if(isset($view->heading2)){{$view->heading2}}@endif" name="heading2" type="text">
                        </div>
                        <div class="form-group col-sm-12 col s12">
                            <label>Section3</label>
                            <textarea class="form-control ckeditor" name="section3" rows="3">@if(isset($view->section3)){{$view->section3}}@endif</textarea>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group col-md-12 col s12">
                            <label>Heading3</label>
                            <input class="form-control" value="@if(isset($view->heading3)){{$view->heading3}}@endif" name="heading3" type="text">
                        </div>
                        <div class="form-group col-sm-12 col s12">
                            <label>Section4</label>
                            <textarea class="form-control ckeditor" name="section4" rows="3">@if(isset($view->section4)){{$view->section4}}@endif</textarea>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group col-md-12 col s12">
                            <label>Heading4</label>
                            <input class="form-control" value="@if(isset($view->heading4)){{$view->heading4}}@endif" name="heading4" type="text">
                        </div>
                        <div class="form-group col-sm-12 col s12">
                            <label>Section5</label>
                            <textarea class="form-control ckeditor" name="section5" rows="3">@if(isset($view->section5)){{$view->section5}}@endif</textarea>
                            <span class="help-block"></span>
                        </div>

                        <div class="col-sm-12  col s12 marginT30"  style="padding-top: 20px; padding-bottom: 20px;">
                            <button type="submit" class="btn btn-primary icon-btn" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Preview</button>&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-default icon-btn" href="{{url('/admin/aboutlist')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                        </div>
                    </div>
					</div>
                </div>
            </div>
            </div>
        </form>

    </section>
</section>
</div>
<script>
    CKEDITOR.replace('textArea');
</script>

@endsection