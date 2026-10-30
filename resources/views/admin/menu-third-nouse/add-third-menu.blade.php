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
                    <h1>Add Third Menu</h1>
                    <ul class="breadcrumb side">
                        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
                        <li><a href="{{url('/admin/third-menu')}}">Menu</a></li>
                        <li><a href="{{url('/admin/third-menu')}}">Third Menu List</a></li>
                        <li class="active">Add Third Menu</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Start form here -->
        <form action="{{URL::to('/admin/create_third')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <input type="hidden" value="{{ csrf_token() }}" id="token" name="_token">
            <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
            <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
            <input type="hidden" name="created_by" value="{{session('useradmin')['usr_id']}}">
            <input type="hidden" name="third_mnu_id" id="third_mnu_id" value="@if(isset($primeid)){{$primeid}}@else 0 @endif">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label">Primary Menu</label>
                            <select class="form-control" name="pri_mnu_id" id="primaryid" onchange="primarylist()">
                                <option value="">Select Primary Menu</option>
                                @foreach($primary as $primarylist)
                                <option value="{{$primarylist->pri_mnu_id}}" @if(isset($view->pri_mnu_id))@if($view->pri_mnu_id==$primarylist->pri_mnu_id) selected @endif @endif>{{$primarylist->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Secondary Menu</label>
                            <select class="form-control" name="second_mnu_id" id="secondlist">
                                <option value="">Select Secondary Menu</option>
                                @if(isset($view->second_mnu_id))
                                <option value="{{$secondary->second_mnu_id}}" selected>{{$secondary->name}}</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Name</label>
                            <input class="form-control" name="name" value="@if(isset($view->name)) {{$view->name}} @endif" type="text" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label class="control-label">Dropdown</label>
                            <select class="form-control" name="dropdown">
                                <option value="">Select Dropdown</option>
                                <option value="Yes" @if(isset($view->dropdown))@if($view->dropdown=='Yes') selected @endif @endif>Yes</option>
                                <option value="No" @if(isset($view->dropdown))@if($view->dropdown=='No') selected @endif @endif>No</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label class="control-label">Page Heading</label>
                            <input class="form-control" name="page_heading" value="@if(isset($view->page_heading)) {{$view->page_heading}} @endif" type="text">
                        </div>

                        <div class="form-group col-md-4">
                            <!-- <label class="control-label">Page Image</label>
                            <input class="form-control" name="image" value="@if(isset($view->name)) {{$view->name}} @endif" type="file"> -->
                            @if(isset($view->menu_banner_image))   
                            @if($view->menu_banner_image!='')
                                <img src="{{url('/'.session('useradmin')['site_url'].'backend/menu/third/'.$view->menu_banner_image)}}" style="width: 85px;height: 85px;"><br>
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
                        <div class="form-group col-sm-4">
                            <label>Image Alt Tag</label>
                            <input class="form-control" name="alt_tag" value="@if(isset($view->alt_tag)) {{$view->alt_tag}} @endif" type="text">
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Title Tags</label>
                            <input class="form-control" name="title_tag" value="@if(isset($view->title_tag)) {{$view->title_tag}} @endif" type="text">
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
                            <label>Canonical</label>
                            <input class="form-control" name="canonical" value="@if(isset($view->canonical)) {{$view->canonical}} @endif" type="text">
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Url</label>
                            <input class="form-control" name="urllink" value="@if(isset($view->urllink)) {{$view->urllink}} @endif" type="text" required>
                        </div>

                        <div class="col-sm-12 marginT30">
                            <button type="submit" class="btn btn-primary icon-btn" onclick="validatesec()">
                                <i class="fa fa-fw fa-lg fa-check-circle"></i>Submit
                            </button>&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-default icon-btn" href="{{url('/admin/third-menu')}}">
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

    function primarylist() {
        var primaryid = $("#primaryid").val();
        var token = $("#token").val();
        //   alert(servicelist)
        $.ajax({
            type: "post",
            // cache: false,
            // async: false,
            url: "{{url('/admin/secondary-list')}}",
            data: {
                'primaryid': primaryid,'_token':token
            },
            success: function(result) {
                $("#secondlist").html(result);
            },
            complete: function() {},
        });
    }
</script>
@endsection