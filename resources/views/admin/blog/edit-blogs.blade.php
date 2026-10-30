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
                    <h1>Edit Blogs</h1>
                    <ul class="breadcrumb side">
                        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
                        <li><a href="{{url('/admin/blogs')}}">Blogs</a></li>
                        <li><a href="{{url('/admin/blogs')}}">Blogs List</a></li>
                        <li class="active">Edit Blogs</li>
                    </ul>
                </div>
            </div>
        </div>
        <form action="{{URL::to('/admin/create_blogs')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <div class="card">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
                <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
                <input type="hidden" name="updated_by" value="{{session('useradmin')['usr_id']}}">
                <input type="hidden" name="blg_id" id="blg_id" value="@if(isset($primeid)){{$primeid}}@else 0 @endif">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-7">
                        <div class="form-group col-md-4">
                            <label class="control-label">Show Type</label>
                            <select class="form-control" name="blog_show_type" required>
                                <option value="">Select Type</option>
                                <option value="inside" @if(isset($edit->blog_show_type))@if($edit->blog_show_type=='inside') selected @endif @else selected @endif>Inside</option>
                                <option value="outside" @if(isset($edit->blog_show_type))@if($edit->blog_show_type=='outside') selected @endif @endif>Outside</option>
                            </select>
                        </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">Blog Side</label>
                                <select class="form-control" name="blog_type">
                                    <option value="">Select Type</option>
                                    <option value="left" @if($edit->blog_type=='left') selected @else selected @endif>Left</option>
                                    <option value="right" @if($edit->blog_type=='right') selected @endif>Right</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Blog Name</label>
                                <input class="form-control" value="{{$edit->blog_name}}" name="blog_name" type="text" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Admin Name</label>
                                <input class="form-control" value="{{$edit->name}}" name="name" type="text">
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Image Alt Tag</label>
                                <input class="form-control" value="{{$edit->alt_image_name}}" name="alt_image_name" type="text">
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group col-sm-6">
                                @if($edit->blog_image!='')
                                <img src="{{url('/'.session('useradmin')['site_url'].'backend/blog/'.$edit->blog_image)}}" style="width: 85px;height: 85px;"><br>

                                @else
                                <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">

                                @endif
                                <label class="control-label">Blog Image</label>
                                <input class="form-control" name="blog_img" type="file">
                                <input class="form-control" name="oldblog_img" value="{{$edit->blog_image}}" type="hidden">
                            </div>

                            <div class="form-group col-sm-6">
                                @if($edit->blog_image_inner!='')
                                <img src="{{url('/'.session('useradmin')['site_url'].'backend/blog/'.$edit->blog_image_inner)}}" style="width: 85px;height: 85px;"><br>

                                @else
                                <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">

                                @endif
                                <label class="control-label">Banner Image</label>
                                <input class="form-control" name="blog_image_inner" type="file">
                                <input class="form-control" name="oldblog_image_inner" value="{{$edit->blog_image_inner}}" type="hidden">
                            </div>


                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label>Admin Description</label>
                            <textarea class="form-control ckeditor" name="dr_description" rows="3" required>{{$edit->dr_description}}</textarea>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group col-sm-12">
                            <label>Blog Sort Description</label>
                            <textarea class="form-control ckeditor" name="short_desc" rows="3" required>{{$edit->short_desc}}</textarea>
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group col-sm-12">
                            <label>Blog Description</label>
                            <textarea class="form-control ckeditor" name="blog_description" rows="3" required>{{$edit->blog_description}}</textarea>
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Tags</label>
                            <input class="form-control" name="tags" value="{{$edit->tags}}" type="text">
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Blog Date</label>
                            <input class="form-control" name="date" value="{{$edit->date}}" type="date" required>
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
                            <button type="submit" class="btn btn-primary icon-btn" onclick="validatesec()" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Preview</button>&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-default icon-btn" href="{{url('/admin/blogs')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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