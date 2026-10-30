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
      <h5 class="breadcrumbs-title mt-0 mb-0"><span>Edit Primary</span></h5>
      <ol class="breadcrumbs mb-0">
        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Home</a>
        </li>
        <li class="breadcrumb-item"><a href="{{url('/admin/primary-menu')}}">Menu</a>
        </li>
		  <li class="breadcrumb-item"><a href="{{url('/admin/primary-menu')}}">Primary List</a>
        </li>
	
        <li class="breadcrumb-item active">Edit Primary</li>
      </ol>
    </div>
  </div>
</div>
</div>
	
		<div class="container">
<div class="card">
        <div class="card-content textalign">
  <a class="waves-effect waves-light btn mr-1" href="http://192.168.0.91:8000/add-site">Add Site</a>
  </div>
</div>
</div> -->
	
	
       <div class="card cardsec">
            <div class="card-body">
                <div class="page-title pagetitle">
                    <h1>Edit Primary</h1>
                    <ul class="breadcrumb side">
                        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
                        <li><a href="{{url('/admin/primary-menu')}}">Menu</a></li>
                        <li><a href="{{url('/admin/primary-menu')}}">Primary List</a></li>
                        <li class="active">Edit Primary</li>
                    </ul>
                </div>
            </div>
        </div>
        <form action="{{URL::to('/admin/create_primary')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <div class="container">
			<div class="card">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
                <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
                <input type="hidden" name="updated_by" value="{{session('useradmin')['usr_id']}}">
                <input type="hidden" name="mnu_id" id="mnu_id" value="@if(isset($primeid)){{$primeid}}@else 0 @endif">
                <input type="hidden" name="menu_type" value="primarymenu">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group col-sm-6 paddingL0 col s6">
                                <label>Name</label>
                                <input class="form-control" value="{{$edit->name}}" name="name" type="text" required>
                            </div>
                            <div class="form-group  col-md-6">
                                <label class="control-label">Dropdown</label>
                                <select class="form-control" name="dropdown" required>
                                    <option value="">Select Dropdown</option>
                                    <option value="Yes" @if($edit->dropdown=='Yes') selected @endif>Yes</option>
                                    <option value="No" @if($edit->dropdown=='No') selected @endif>No</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6 paddingL0 col s6">
                                <label class="control-label">Page Heading</label>
                                <input class="form-control" name="page_heading" type="text" value="{{$edit->page_heading}}">
                            </div>

                            <div class="form-group col-sm-6 col s6">
                                <label>Image Alt Tag</label>
                                <input class="form-control" name="alt_tag" type="text" value="{{$edit->alt_tag}}">
                            </div>

                        </div>
                        <div class="col-sm-4 col s4">
                            @if($edit->menu_banner_image!='')
                            <img src="{{url('/'.session('useradmin')['site_url'].'backend/menu/'.$edit->menu_banner_image)}}" style="width: 85px;height: 85px;"><br>

                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">

                            @endif
                            <div class="form-group">
                                <label class="control-label">Page Image</label>
                                <input class="form-control" name="image" type="file">
                                <input class="form-control" name="oldimage" value="{{$edit->menu_banner_image}}" type="hidden">
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <!-- <div class="form-group col-sm-4">
                            <label>Title Tags</label>
                            <input class="form-control" value="{{$edit->title_tag}}" name="title_tag" type="text">
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Keyword Tag</label>
                            <input class="form-control" value="{{$edit->keyword_tag}}" name="keyword_tag" type="text">
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Description Tag</label>
                            <input class="form-control" value="{{$edit->description_tag}}" name="description_tag" type="text">
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Canonical</label>
                            <input class="form-control" name="canonical" type="text" value="{{$edit->canonical}}">
                        </div> -->
                        <div class="form-group col-sm-4 col s4">
                            <label>Url</label>
                            <input class="form-control" name="urllink" type="text" value="{{$edit->urllink}}" required>
                        </div>

                        <div class="col-sm-12 marginT30 col s12" style="padding-top: 20px; padding-bottom: 20px;">
                            <button type="submit" class="btn btn-primary icon-btn" onclick="validatesec()"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-default icon-btn" href="{{url('/admin/primary-menu')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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