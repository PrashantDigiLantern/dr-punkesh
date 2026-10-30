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
                    <h1>Edit Press & Media Category</h1>
                    <ul class="breadcrumb side">
                        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
                        <li><a href="{{url('/admin/pressmedia-category')}}">Press & Media</a></li>
                        <li><a href="{{url('/admin/pressmedia-category')}}">Press & Media Category List</a></li>
                        <li class="active">Edit Press & Media Category</li>
                    </ul>
                </div>
            </div>
        </div>
        <form action="{{URL::to('/admin/create_pressmedia_category')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <div class="card">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
                <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
                <input type="hidden" name="updated_by" value="{{session('useradmin')['usr_id']}}">
                <input type="hidden" name="press_cat_id" id="press_cat_id" value="@if(isset($primeid)){{$primeid}}@else 0 @endif">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label>Name</label>
                            <input class="form-control" value="{{$edit->name}}" name="name" type="text" required>
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Image Alt Tag</label>
                            <input class="form-control" value="{{$edit->alt_tag}}" name="alt_tag" type="text">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            @if($edit->image!='')
                            <img src="{{url('/'.session('useradmin')['site_url'].'backend/pressmedia/category/'.$edit->image)}}" style="width: 85px;height: 85px;"><br>

                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:70px;height:70px;">

                            @endif
                            <div class="form-group">
                                <label class="control-label">Image</label>
                                <input class="form-control" name="image" type="file">
                                <input class="form-control" name="oldimage" value="{{$edit->image}}" type="hidden">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            @if($edit->logo!='')
                            <img src="{{url('/'.session('useradmin')['site_url'].'backend/pressmedia/logo/'.$edit->logo)}}" style="width: 85px;height: 85px;"><br>
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif
                            <div class="form-group">
                                <label class="control-label">Logo</label>
                                <input class="form-control" name="logo" type="file">
                                <input class="form-control" name="oldlogoimage" value="{{$edit->logo}}" type="hidden">
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="form-group col-sm-12">
                            <label>Description</label>
                            <textarea class="form-control ckeditor" name="description" rows="3">{{$edit->description}}</textarea>
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Title Tag</label>
                            <input class="form-control" name="title_tag" value="{{$edit->title_tag}}" type="text">
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Keyword Tag</label>
                            <input class="form-control" name="keyword_tag" value="{{$edit->keyword_tag}}" type="text">
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Description Tag</label>
                            <input class="form-control" name="description_tag" value="{{$edit->description_tag}}" type="text">
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Canonical</label>
                            <input class="form-control" name="canonical" value="{{$edit->canonical}}" type="text">
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Url</label>
                            <input class="form-control" name="url" value="{{$edit->url}}" type="text" required>
                        </div>


                        <div class="col-sm-12 marginT30">
                            <button type="submit" class="btn btn-primary icon-btn" onclick="validatesec()" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Preview</button>&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-default icon-btn" href="{{url('/admin/pressmedia-category')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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