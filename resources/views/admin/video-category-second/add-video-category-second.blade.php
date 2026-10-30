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
                    <h1>Add Second Video Category</h1>
                    <ul class="breadcrumb side">
                        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
                        <li><a href="{{url('/admin/second-video-category')}}">Video</a></li>
                        <li><a href="{{url('/admin/second-video-category')}}">Second Video Category List</a></li>
                        <li class="active">Add Second Video Category</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Start form here -->
        <form action="{{URL::to('/admin/create_service_video_category')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
            <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
            <input type="hidden" name="created_by" value="{{session('useradmin')['usr_id']}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="vid_ser_id" id="vid_ser_id" value="@if(isset($primeid)){{$primeid}}@else 0 @endif">
            <input type="hidden" name="category_type" value="secondcategory">
            <div class="card">
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
                            <label class="control-label">Video Category</label>
                            <select class="form-control" name="parent_id">
                                <option value="">Select Category</option>
                                @foreach($firstcategory as $firstcategorylist)
                                <option value="{{$firstcategorylist->vid_ser_id}}" @if(isset($view->vid_ser_id))@if($firstcategorylist->vid_ser_id == $view->parent_id) selected @endif @endif>{{$firstcategorylist->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    
                    <div class="form-group col-md-4">
                            <label class="control-label">Second Video Category Name</label>
                            <input class="form-control" name="name" value="@if(isset($view->name)) {{$view->name}} @endif" type="text" required>
                        </div>
                      
                       
                        <div class="form-group col-md-4">
                            @if(isset($view->image))
                            @if($view->image!='')
                            <img src="{{url('/'.session('useradmin')['site_url'].'backend/service_video/image/'.$view->image)}}" style="width: 85px;height: 85px;"><br>
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                            @endif
                            <div class="form-group">
                                <label class="control-label">Image</label>
                                <input class="form-control" name="image" type="file">
                                <input class="form-control" name="oldimage" value="@if(isset($view->image)) {{$view->image}} @endif" type="hidden">
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label class="control-label">Service Banner Type</label>
                            <select class="form-control" name="video_type" required id="video_type" onchange="servicetype()">
                                <option value="">Select Type</option>
                                <option value="image" @if(isset($view->video_type))@if($view->video_type=='image') selected @endif @else selected @endif>Image</option>
                                <option value="link" @if(isset($view->video_type))@if($view->video_type=='link') selected @endif @endif>Youtube Link</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                           
                            @if(isset($view->banner_image))
                            @if($view->image!='')
                            <img src="{{url('/'.session('useradmin')['site_url'].'backend/service_video/category_banner/'.$view->banner_image)}}" style="width: 85px;height: 85px;"><br>
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif
                            <div class="form-group">
                            @if(isset($view->video_type))
                                @if($view->video_type=='image')
                                <label class="control-label videoupload">Banner Image</label>
                                <label class="control-label videolink" style="display:none;">Banner Thumbnail Image</label>
                                @else
                                <label class="control-label videoupload">Banner Image</label>
                                <label class="control-label videolink" style="display:none;">Banner Thumbnail Image</label>
                                @endif
                                @else
                                <label class="control-label videoupload">Banner Image</label>
                                <label class="control-label videolink" style="display:none;">Banner Thumbnail Image</label>
                                @endif
                                <input class="form-control" name="banner_image" type="file">
                                <input class="form-control" name="oldbanner_image" value="@if(isset($view->banner_image)) {{$view->banner_image}} @endif" type="hidden">
                            </div>
                        </div>
                      
                        @if(isset($view->video_type))
                        @if($view->video_type=='link')
                        <div class="col-sm-4 videolink">
                            @if($view->video_link!='')
                            <iframe width="100%" height="76" src="{{$view->video_link}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif
                            <div class="form-group">
                                <label class="control-label">Service Youtube Link</label>
                                <input class="form-control" name="video_link" value="{{$view->video_link}}" type="text">
                            </div>
                        </div>
                        @else
                        <div class="col-sm-4 videolink" style="display:none;">
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            <div class="form-group">
                                <label class="control-label">Service Youtube Link</label>
                                <input class="form-control" name="video_link" value="{{$view->video_link}}" type="text">
                            </div>
                        </div>
                        @endif
                        @endif
                        <div class="form-group  col-md-4">
                            <label class="control-label">Image Alt Tag</label>
                            <input class="form-control" name="alt_tag" value="@if(isset($view->alt_tag)) {{$view->alt_tag}} @endif" type="text">
                        </div>
                        <div class="form-group  col-md-12">
                            <label class="control-label">Description</label>
                            <textarea class="form-control ckeditor" name="description" rows="3">@if(isset($view->description)) {{$view->description}} @endif</textarea>
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Title Tag</label>
                            <input class="form-control" name="title_tag" value="@if(isset($seotag->title_tag)) {{$seotag->title_tag}} @endif" type="text">
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Keyword Tag</label>
                            <input class="form-control" name="keyword_tag" value="@if(isset($seotag->keyword_tag)) {{$seotag->keyword_tag}} @endif" type="text">
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Description Tag</label>
                            <input class="form-control" name="description_tag" value="@if(isset($seotag->description_tag)) {{$seotag->description_tag}} @endif" type="text">
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Canonical</label>
                            <input class="form-control" name="canonical" value="@if(isset($seotag->canonical)) {{$seotag->canonical}} @endif" type="text">
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Url</label>
                            <input class="form-control" name="url" value="@if(isset($view->url)) {{$view->url}} @endif" type="text" required>
                            <input class="form-control" value="@if(isset($view->url)){{$view->url}}@endif" type="hidden" name="oldurl">
                        </div>

                        <div class="col-sm-12 marginT30">
                            <button type="submit" class="btn btn-primary icon-btn" onclick="validatesec()" type="button">
                                <i class="fa fa-fw fa-lg fa-check-circle"></i>Preview
                            </button>&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-default icon-btn" href="{{url('/admin/second-video-category')}}">
                                <i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- End form -->

    </section>
</section>

<script>
    CKEDITOR.replace('textArea');
</script>
@endsection