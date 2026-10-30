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
                    <h1>Edit Gallery Image</h1>
                    <ul class="breadcrumb side">
                        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
                        <li><a href="{{url('/admin/gallery')}}">Gallery List</a></li>
                        <li class="active">Edit Gallery Image</li>
                    </ul>
                </div>
            </div>
        </div>
        <form action="{{URL::to('/admin/create_gallery')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <div class="card">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
                <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
                <input type="hidden" name="updated_by" value="{{session('useradmin')['usr_id']}}">
                <input type="hidden" name="gallery_id" id="gallery_id" value="@if(isset($primeid)){{$primeid}}@else 0 @endif">
                <div class="card-body">
                    <div class="row">
                    <div class="form-group col-md-4">
                            <label class="control-label">Show Type</label>
                            <select class="form-control" name="gallery_show_type" required>
                                <option value="">Select Type</option>
                                <option value="inside" @if(isset($edit->gallery_show_type))@if($edit->gallery_show_type=='inside') selected @endif @endif>Inside</option>
                                <option value="outside" @if(isset($edit->gallery_show_type))@if($edit->gallery_show_type=='outside') selected @endif @endif>Outside</option>
                            </select>
                        </div>
                    <div class="form-group  col-md-4">
                    <!-- <label class="control-label">Gallery Thumb</label>
                    <input class="form-control" name="gallery_image" type="file" required> -->
                    @if(isset($edit->gallery_image))
                            @if($edit->gallery_image!='')
                            <img src="{{url('/'.session('useradmin')['site_url'].'backend/gallery/'.$edit->gallery_image)}}" style="width: 85px;height: 85px;"><br>
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                            @endif
                            <div class="form-group">
                                <label class="control-label">Image</label>
                                <input class="form-control" name="gallery_image" type="file">
                                <input class="form-control" name="oldgallery_image" value="@if(isset($edit->gallery_image)){{$edit->gallery_image}}@endif" type="hidden">
                            </div>
                </div>

                <div class="form-group  col-md-4">
                @if(isset($edit->full_image))
                            @if($edit->full_image!='')
                            <img src="{{url('/'.session('useradmin')['site_url'].'backend/gallery/'.$edit->full_image)}}" style="width: 85px;height: 85px;"><br>
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                            @endif
                            <div class="form-group">
                                <label class="control-label">Image</label>
                                <input class="form-control" name="full_image" type="file">
                                <input class="form-control" name="oldfull_image" value="@if(isset($edit->full_image)){{$edit->full_image}}@endif" type="hidden">
                            </div>
                    <!-- <label class="control-label">Gallery Full Image</label>
                    <input class="form-control" name="full_image" type="file" required> -->
                </div>

                <div class="form-group  col-md-4">
                    <label class="control-label">Gallery Name</label>
                    <input class="form-control" name="gallery_name" value="@if(isset($edit->gallery_name)) {{$edit->gallery_name}} @endif" type="text">
                </div>

                <div class="form-group  col-md-4">
                    <label class="control-label">Image Alt Tag</label>
                    <input class="form-control" name="alt_tag" value="@if(isset($edit->alt_tag)) {{$edit->alt_tag}} @endif" type="text">
                </div>
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary icon-btn marginT38" type="button">
                                <i class="fa fa-fw fa-lg fa-check-circle"></i>Preview
                            </button>
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