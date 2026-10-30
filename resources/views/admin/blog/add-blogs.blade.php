@extends('admin.master')
@section('content')
@php
$primeid = session('primeid');
@endphp
<section id="main-content">
    <section class="wrapper">
        <div class="card cardsec">
            <div class="card-body">
                <div class="page-title pagetitle">
                    <h1>Add Blog</h1>
                    <ul class="breadcrumb side">
                        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
                        <li><a href="{{url('/admin/blogs')}}">Blog</a></li>
                        <li><a href="{{url('/admin/blogs')}}">Blogs List</a></li>
                        <li class="active">Add Blog</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Start form here -->
        <form action="{{URL::to('/admin/create_blogs')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <input type="hidden" value="{{ csrf_token() }}" name="_token">
            <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
            <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
            <input type="hidden" name="created_by" value="{{session('useradmin')['usr_id']}}">
            <input type="hidden" name="blg_id" id="blg_id" value="@if(isset($primeid)){{$primeid}}@else 0 @endif">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                    <div class="form-group col-md-4">
                            <label class="control-label">Show Type</label>
                            <select class="form-control" name="blog_show_type" required>
                                <option value="">Select Type</option>
                                <option value="inside" @if(isset($view->blog_show_type))@if($view->blog_show_type=='inside') selected @endif @else selected @endif>Inside</option>
                                <option value="outside" @if(isset($view->blog_show_type))@if($view->blog_show_type=='outside') selected @endif @endif>Outside</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Type</label>
                            <select class="form-control" name="blog_type">
                                <option value="">Select Type</option>
                                <option value="left" @if(isset($view->blog_type))@if($view->blog_type=='left') selected @endif @else selected @endif>Left</option>
                                <option value="right" @if(isset($view->blog_type))@if($view->blog_type=='right') selected @endif @endif>Right</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Blog Name</label>
                            <input class="form-control" name="blog_name" value="@if(isset($view->blog_name)) {{$view->blog_name}} @endif" type="text" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Admin Name</label>
                            <input class="form-control" name="name" value="@if(isset($view->name)) {{$view->name}} @endif" type="text">
                        </div>
                        <div class="form-group  col-md-12">
                            <label class="control-label">Admin Description</label>
                            <textarea class="form-control ckeditor" name="dr_description" rows="3">@if(isset($view->dr_description)) {{$view->dr_description}} @endif</textarea>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group  col-md-12">
                            <label class="control-label">Blog Sort Description</label>
                            <textarea class="form-control ckeditor" name="short_desc" rows="3" required>@if(isset($view->short_desc)) {{$view->short_desc}} @endif</textarea>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group  col-md-12">
                            <label class="control-label">Blog Description</label>
                            <textarea class="form-control ckeditor" name="blog_description" rows="3" required>@if(isset($view->blog_description)) {{$view->blog_description}} @endif</textarea>
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group  col-md-4">
                            <div class="form-group">
                                @if(isset($view->blog_image))
                                @if($view->blog_image!='')
                                <img src="{{url('/'.session('useradmin')['site_url'].'backend/blog/'.$view->blog_image)}}" style="width: 85px;height: 85px;"><br>
                                @else
                                <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                                @endif
                                @else
                                <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                                @endif
                                <label class="control-label">Blog Image</label>
                                <input class="form-control" name="blog_image" type="file">
                                <input class="form-control" name="oldblog_img" value="@if(isset($view->blog_image)) {{$view->blog_image}} @endif" type="hidden">
                            </div>
                            
                        </div>

                        <div class="form-group  col-md-4">
                            <div class="form-group col-sm-6">
                                @if(isset($view->blog_image_inner))
                                @if($view->blog_image_inner!='')
                                <img src="{{url('/'.session('useradmin')['site_url'].'backend/blog/'.$view->blog_image_inner)}}" style="width: 85px;height: 85px;"><br>
                                @else
                                <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                                @endif
                                @else
                                <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                                @endif
                                <label class="control-label">Banner Image</label>
                                <input class="form-control" name="blog_image_inner" type="file">
                                <input class="form-control" name="oldblog_image_inner" value="@if(isset($view->blog_image_inner)) {{$view->blog_image_inner}} @endif" type="hidden">
                            </div>
                        </div>

                        <div class="form-group  col-md-4">
                            <label class="control-label">Image Alt Tag</label>
                            <input class="form-control" name="alt_image_name" value="@if(isset($view->alt_image_name)) {{$view->alt_image_name}} @endif" type="text">
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Tags</label>
                            <input class="form-control" name="tags" value="@if(isset($view->tags)) {{$view->tags}} @endif" type="text">
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Blog Date</label>
                            <input class="form-control" name="date" type="date" value="@if(isset($view->date)){{$view->date}}@endif" required>
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
                            <button id="myBtn" onclick="validatesec()" class="btn btn-primary icon-btn" type="submit">
                                <i class="fa fa-fw fa-lg fa-check-circle"></i>Preview
                            </button>&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-default icon-btn" href="{{url('/admin/blogs')}}">
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