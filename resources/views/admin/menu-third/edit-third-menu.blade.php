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
                    <h1>Edit Third Menu</h1>
                    <ul class="breadcrumb side">
                        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
                        <li><a href="{{url('/admin/third-menu')}}">Menu</a></li>
                        <li><a href="{{url('/admin/third-menu')}}">Third Menu List</a></li>
                        <li class="active">Edit Third Menu</li>
                    </ul>
                </div>
            </div>
        </div>
        <form action="{{URL::to('/admin/create_primary')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <div class="card">
                <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
                <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
                <input type="hidden" name="updated_by" value="{{session('useradmin')['usr_id']}}">
                <input type="hidden" value="{{ csrf_token() }}" id="token" name="_token">
                <input type="hidden" name="mnu_id" id="mnu_id" value="@if(isset($primeid)){{$primeid}}@else 0 @endif">
                <input type="hidden" name="menu_type" value="thirdmenu">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8">
                        <div class="form-group col-md-4">
                            <label class="control-label">Primary Menu</label>
                            <select class="form-control" name="primaryid" id="primarymenu" onchange="PrimaryMenu()" required>
                                <option value="">Select Dropdown</option>
                                @foreach($primarymenu as $primarylist)
                                <option value="{{$primarylist->mnu_id}}" @if(isset($secondsec['firstmenu_id']))@if($secondsec['firstmenu_id']==$primarylist->mnu_id) selected @endif @endif>{{$primarylist->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Second Menu Category</label>
                            <select class="form-control" name="parent_id" id="secondarymenu" required>
                                <option value="">Select Menu</option>
                                @if(isset($secondsec['secmenu_name']))
                                <option value="{{$secondsec['secmenu_id']}}" selected>{{$secondsec['secmenu_name']}}</option>
                                @endif
                            </select>
                        </div>
                            <div class="form-group col-sm-6">
                                <label>Name</label>
                                <input class="form-control" value="{{$edit->name}}" name="name" type="text" required>
                            </div>

                            <div class="form-group  col-md-6 paddingL0">
                                <label class="control-label">Dropdown</label>
                                <select class="form-control" name="dropdown" required>
                                    <option value="">Select Dropdown</option>
                                    <option value="Yes" @if($edit->dropdown=='Yes') selected @endif>Yes</option>
                                    <option value="No" @if($edit->dropdown=='No') selected @endif>No</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">Page Heading</label>
                                <input class="form-control" name="page_heading" type="text" value="{{$edit->page_heading}}">
                            </div>

                        </div>
                        <div class="col-sm-4">
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
                        <div class="form-group col-sm-4">
                            <label>Image Alt Tag</label>
                            <input class="form-control" name="alt_tag" type="text" value="{{$edit->alt_tag}}">
                        </div>
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
                        <div class="form-group col-sm-4">
                            <label>Url</label>
                            <input class="form-control" name="urllink" type="text" value="{{$edit->urllink}}" required>
                        </div>

                        <div class="col-sm-12 marginT30">
                            <button type="submit" class="btn btn-primary icon-btn" onclick="validatesec()"><i class="fa fa-fw fa-lg fa-check-circle"></i>Preview</button>&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-default icon-btn" href="{{url('/admin/third-menu')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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