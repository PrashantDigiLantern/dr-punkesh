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
                    <h1>Add Technology</h1>
                    <ul class="breadcrumb side">
                        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
                        <li><a href="{{url('/admin/technology')}}">Technology</a></li>
                        <li><a href="{{url('/admin/technology')}}">Technology List</a></li>
                        <li class="active">Add Technology</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Start form here -->
        <form action="{{URL::to('/admin/create_technology')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <input type="hidden" value="{{ csrf_token() }}" name="_token">
            <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
            <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
            <input type="hidden" name="created_by" value="{{session('useradmin')['usr_id']}}">
            <input type="hidden" name="tech_id" id="tech_id" value="@if(isset($primeid)){{$primeid}}@else 0 @endif">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label">Technology Name</label>
                            <input class="form-control" name="name" value="@if(isset($view->name)) {{$view->name}} @endif" type="text" required>
                        </div>

                        <div class="form-group  col-md-4">
                            <!-- <input class="form-control" name="tech_image" value="@if(isset($view->image)) {{$view->image}} @endif" type="file" required> -->
                            <div class="form-group">
                            @if(isset($view->image)) 
                                @if($view->image!='')
                                <img src="{{url('/'.session('useradmin')['site_url'].'backend/technology/'.$view->image)}}" style="width: 85px;height: 85px;"><br>
                                @else
                                <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                                @endif
                                @else
                                <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                                @endif
                                <label class="control-label">Technology Image</label>
                                <input class="form-control" name="tech_image" type="file">
                                <input class="form-control" name="oldtech_image" value="@if(isset($view->image)) {{$view->image}} @else null @endif" type="hidden">
                            </div>
                        </div>

                        <div class="form-group  col-md-4">
                            <!-- <input class="form-control" name="tech_banner" value="@if(isset($view->banner_image)) {{$view->banner_image}} @endif" type="file" required> -->
                            <div class="form-group">
                            @if(isset($view->banner_image))   
                            @if($view->banner_image!='')
                                <img src="{{url('/'.session('useradmin')['site_url'].'backend/technology/'.$view->banner_image)}}" style="width: 85px;height: 85px;"><br>
                                @else
                                <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                                @endif
                                @else
                                <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                                @endif
                                <label class="control-label">Technology Image</label>
                                <input class="form-control" name="tech_banner" type="file">
                                <input class="form-control" name="oldtech_banner" value="@if(isset($view->banner_image)) {{$view->banner_image}} @else null @endif" type="hidden">
                            </div>
                        </div>

                        <div class="form-group  col-md-4">
                            <label class="control-label">Image Alt Tag</label>
                            <input class="form-control" name="alt_tag" value="@if(isset($view->alt_tag)) {{$view->alt_tag}} @endif" type="text" required>
                        </div>

                        <div class="form-group  col-md-12">
                            <label class="control-label">Sort Descrition</label>
                            <textarea class="form-control ckeditor" name="short_desc" rows="3">@if(isset($view->short_desc)) {{$view->short_desc}} @endif</textarea>
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group  col-md-12">
                            <label class="control-label">Descrition</label>
                            <textarea class="form-control ckeditor" name="description" rows="3">@if(isset($view->description)) {{$view->description}} @endif</textarea>
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Title Tags</label>
                            <input class="form-control" name="title_tag" value="@if(isset($view->title_tag)) {{$view->title_tag}} @endif" type="text" required>
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Keyword Tag</label>
                            <input class="form-control" name="keyword_tag" value="@if(isset($view->keyword_tag)) {{$view->keyword_tag}} @endif" type="text">
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Description Tag</label>
                            <input class="form-control" name="description_tag" value="@if(isset($view->description_tag)) {{$view->description_tag}} @endif" type="text">
                        </div>

                        <div class="form-group col-sm-4">
                            <label class="control-label">Canonical</label>
                            <input class="form-control" name="canonical" value="@if(isset($view->canonical)) {{$view->canonical}} @endif" type="text">
                        </div>

                        <div class="form-group col-sm-4">
                            <label class="control-label">Url</label>
                            <input class="form-control" name="url" value="@if(isset($view->url)) {{$view->url}} @endif" type="text" required>
                        </div>

                        <div class="col-sm-12 marginT30">
                        <button id="myBtn" onclick="validatesec()" class="btn btn-primary icon-btn" type="submit">
                                <i class="fa fa-fw fa-lg fa-check-circle"></i>Preview
                            </button>&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-default icon-btn" href="{{url('/admin/technology')}}">
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