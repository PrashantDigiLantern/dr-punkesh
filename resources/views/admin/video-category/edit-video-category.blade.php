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
                    <h1>Edit Result Category Banner</h1>
                    <ul class="breadcrumb side">
                        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
                        <li><a href="{{url('/admin/service-video-category')}}">Result</a></li>
                        <li><a href="{{url('/admin/service-video-category')}}">Category Banner List</a></li>
                        <li class="active">Edit Result Category Banner</li>
                    </ul>
                </div>
            </div>
        </div>
        <form action="{{URL::to('/admin/create_service_video_category')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <div class="card">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
                <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
                <input type="hidden" name="updated_by" value="{{session('useradmin')['usr_id']}}">
                <input type="text" name="vid_ser_id" id="vid_ser_id" value="@if(isset($primeid)){{$primeid}}@else 0 @endif">
                <input type="hidden" name="category_type" value="firstcategory">
                <div class="card-body">
                    <div class="row">
                    <div class="form-group col-md-4">
                        <label class="control-label">Select Design Type</label>
                        <select class="form-control" id="design_type" name="design_type">
                            <option value="">Select Design Type</option>
                            <option value="left" @if(isset($view->design_type))@if($view->design_type=='left') selected @endif @else selected @endif>Left Side Image</option>
                            <option value="right" @if(isset($view->design_type))@if($view->design_type=='right') selected @endif @endif>Right Side Image</option>
                        </select>
                    </div>
                    
                        <div class="form-group col-md-4">
                            <label class="control-label">Video Category Name</label>
                            <input class="form-control" value="{{$edit->name}}" name="name" type="text" required>
                        </div>
                       
                        <div class="form-group col-md-4">
                            <label class="control-label">Service Video Type</label>
                            <select class="form-control" name="video_type" required id="video_type" onchange="servicetype()">
                                <option value="">Select Type</option>
                                <option value="image" @if($edit->video_type=='image') selected @endif>Image</option>
                                <option value="link" @if($edit->video_type=='link') selected @endif>Youtube Link</option>
                            </select>
                        </div>
                      
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            @if($edit->image!='')
                            <img src="{{url('/'.session('useradmin')['site_url'].'backend/service_video/image/'.$edit->image)}}" style="width: 85px;height: 85px;"><br>
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                            @endif
                            <div class="form-group">
                                <label class="control-label">Image</label>
                                <input class="form-control" name="image" type="file">
                                <input class="form-control" name="oldimage" value="{{$edit->image}}" type="hidden">
                            </div>
                        </div>

                        <div class="col-sm-4">
                            @if($edit->banner_image!='')
                            <img src="{{url('/'.session('useradmin')['site_url'].'backend/service_video/category_banner/'.$edit->banner_image)}}" style="width: 85px;height: 85px;"><br>
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
                                <input class="form-control" name="banner_image" type="file">
                                <input class="form-control" name="oldbanner_image" value="{{$edit->banner_image}}" type="hidden">
                            </div>
                        </div>
                        @if($edit->video_type=='link')
                        <div class="col-sm-4 videolink">
                            @if($edit->video_link!='')
                            <iframe width="100%" height="76" src="{{$edit->video_link}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif
                            <div class="form-group">
                                <label class="control-label">Service Youtube Link</label>
                                <input class="form-control" name="video_link" value="{{$edit->video_link}}" type="text">
                            </div>
                        </div>
                        @else
                        <div class="col-sm-4 videolink" style="display:none;">
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            <div class="form-group">
                                <label class="control-label">Service Youtube Link</label>
                                <input class="form-control" name="video_link" value="{{$edit->video_link}}" type="text">
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="row">

                        <div class="form-group col-sm-12">
                            <label>Sort Descrition</label>
                            <textarea class="form-control ckeditor" name="description" rows="3">{{$edit->description}}</textarea>
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Image Alt Tag</label>
                            <input class="form-control" value="{{$edit->alt_tag}}" name="alt_tag" type="text">
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Title Tags</label>              
                            <input class="form-control" value="@if(isset($seotag->title_tag)){{$seotag->title_tag}}@endif" name="title_tag" type="text" service >
                        </div>
                        
                        <div class="form-group col-sm-4">
                            <label>Keyword Tag</label>              
                            <input class="form-control" value="@if(isset($seotag->keyword_tag)){{$seotag->keyword_tag}}@endif" name="keyword_tag" type="text"  >
                        </div>
                        
                        <div class="form-group col-sm-4">
                            <label>Description Tag</label>              
                            <input class="form-control" value="@if(isset($seotag->description_tag)){{$seotag->description_tag}}@endif" name="description_tag" type="text"  >
                        </div>
                        
                        <div class="form-group col-sm-4">
                            <label>Canonical</label>              
                            <input class="form-control" value="@if(isset($seotag->canonical_tag)){{$seotag->canonical_tag}}@endif" name="canonical_tag" type="text" >
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Url</label>
                            <input class="form-control" name="url" value="{{$edit->url}}" type="text" required>
                            <input class="form-control" name="oldurl" value="{{$edit->url}}" type="hidden">
                        </div>

                        <div class="col-sm-12 marginT30">
                            <button type="submit" class="btn btn-primary icon-btn"  onclick="validatesec()" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Preview</button>&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-default icon-btn" href="{{url('/admin/service-video-category')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                        </div>

                    </div>
                </div>
            </div>
        </form>

    </section>
</section>
<script>
    CKEDITOR.replace('textArea');
</script>

@endsection