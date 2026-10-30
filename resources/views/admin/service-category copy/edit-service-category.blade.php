@extends('admin.master')
@section('content')
@php
$primeid = session('primeid');
$rand = rand(9999, 99999);
@endphp
<section id="main-content">
  <section class="wrapper">
  <div class="card cardsec">
                <div class="card-body"> 
                      <div class="page-title pagetitle">
        <h1>Edit Service Category</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="{{url('/admin/service-category')}}">Services</a></li>
          <li><a href="{{url('/admin/service-category')}}">Services Category List</a></li>
          <li class="active">Edit Service Category</li>
        </ul>
      </div>   
      </div>  
      </div> 
       <form action="{{URL::to('/admin/create_service_category')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
       <div class="card">
       <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
            <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
            <input type="hidden" name="created_by" value="{{session('useradmin')['usr_id']}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="ser_cat_id" id="ser_cat_id" value="@if(isset($primeid)){{$primeid}}@else 0 @endif">
                    <div class="card-body">
                    <div class="row">
                <div class="form-group col-sm-4">
                    <label>Service Name</label>
                    <input class="form-control"  value="{{$edit->service_name}}"  name="service_name" type="text">
                </div>
                
                <div class="form-group col-sm-4">
                    <label class="control-label">Service Banner Type</label>
                    <select class="form-control" name="video_type" required id="video_type" onchange="servicetype()">
                        <option value="">Select Type</option>
                        <option value="image" @if($edit->video_type=='image') selected @endif>Image</option>
                        <option value="link" @if($edit->video_type=='link') selected @endif>Youtube Link</option>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label>Image Alt Tag</label>              
                    <input class="form-control" value="{{$edit->alt_tag}}" name="alt_tag" type="text"  >
                </div>
                </div>
                <div class="row">
                <div class="col-sm-4">
                @if($edit->image!='')
                    <img src="{{url('/'.session('useradmin')['site_url'].'backend/service_category/image/'.$edit->image)}}" style="width: 85px;height: 85px;"><br>
                 @else
                    <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                 @endif
                 <div class="form-group">
                    <label class="control-label">Image</label>
                    <input class="form-control" name="image" type="file">
                    <input class="form-control" name="oldimage" value="{{$edit->image}}" type="hidden" >
                </div>
                </div>

                <div class="col-sm-4">
                @if($edit->service_image!='')
                    <img src="{{url('/'.session('useradmin')['site_url'].'backend/service_category/image/'.$edit->service_image)}}" style="width: 85px;height: 85px;"><br>
                 @else
                    <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                 @endif
                 <div class="form-group">
                 @if($edit->video_type=='image')
                    <label class="control-label videoupload">Banner Image</label>
                    <label class="control-label videolink" style="display:none;">Banner Thumbnail Image</label>
                @else
                    <label class="control-label videoupload" style="display:none;">Banner Image</label>
                    <label class="control-label videolink">Banner Thumbnail Image</label>
                @endif
                    <input class="form-control" name="service_image" type="file">
                    <input class="form-control" name="oldservice_image" value="{{$edit->service_image}}" type="hidden" >
                </div>
                </div>
                @if($edit->video_type=='link')
                <div class="col-sm-4 videolink">
                @if($edit->service_video!='')
                    <iframe width="100%" height="76" src="{{$edit->service_video}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                 @else
                    <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                 @endif
                 <div class="form-group">
                    <label class="control-label">Service Youtube Link</label>
                    <!-- <input class="form-control" name="service_video" type="file" > -->
                    <input class="form-control" name="service_video_link" value="{{$edit->service_video}}" type="text" >
                </div>
                </div>
                @else
                <div class="col-sm-4 videolink" style="display:none;">
                <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                <div class="form-group">
                    <label class="control-label">Service Youtube Link</label>
                    <input class="form-control" name="video_link" value="{{$edit->service_video}}" type="text" >
                </div>
                </div>
                @endif
                </div>
                </div>
                <div class="row">
                
			
                
               <div class="form-group col-sm-12">
                    <label>Description</label>              
                    <textarea class="form-control" id="textArea" name="service_desc" rows="3" >{{$edit->service_desc}}</textarea>
                    <span class="help-block"></span>
				</div>
			
                <div class="form-group col-sm-4">
                    <label>Title Tags</label>              
                    <input class="form-control" value="{{$edit->title_tag}}" name="title_tag" type="text" service >
                </div>
                
                <div class="form-group col-sm-4">
                    <label>Keyword Tag</label>              
                    <input class="form-control" value="{{$edit->keyword_tag}}" name="keyword_tag" type="text"  >
                </div>
                
                <div class="form-group col-sm-4">
                    <label>Description Tag</label>              
                    <input class="form-control" value="{{$edit->description_tag}}" name="description_tag" type="text"  >
                </div>
                
                <div class="form-group col-sm-4">
                    <label>Canonical</label>              
                    <input class="form-control" value="{{$edit->canonical_tag}}" name="canonical_tag" type="text" >
                </div>
                
                <div class="form-group col-sm-4">
                    <label>Url</label>
                    <input class="form-control"   value="{{$edit->url}}" type="text" name="url" >
                </div>
                
				<div class="col-sm-12 marginT30">
					<button type="submit" class="btn btn-primary icon-btn" onclick="validatesec()"><i class="fa fa-fw fa-lg fa-check-circle"></i>Preview</button>&nbsp;&nbsp;&nbsp;
					<a class="btn btn-default icon-btn" href="{{url('/admin/service-category')}}" ><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
				</div>
           
                </div>
                 </div>
                </div>
        </form>
        
  </section>
</section>
<script>
   CKEDITOR.replace( 'textArea' );
</script>

@endsection