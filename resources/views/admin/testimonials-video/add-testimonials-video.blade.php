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
                    <h1>Add Testimonial Video</h1>
                    <ul class="breadcrumb side">
                        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
                        <li><a href="{{url('/admin/video-testimonials')}}">Testimonial</a></li>
                        <li><a href="{{url('/admin/video-testimonials')}}">List Testimonial Video</a></li>
                        <li class="active">Add Testimonial Video</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Start form here -->
        <form action="{{URL::to('/admin/create_video_testimonials')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <input type="hidden" id="token" value="{{ csrf_token() }}" name="_token">
            <input type="hidden" name="created_by" value="{{session('useradmin')['usr_id']}}">
            <input type="hidden" name="test_video_id" id="test_video_id" value="@if(isset($primeid)){{$primeid}}@else 0 @endif">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label">Show Home Page</label>
                            <select class="form-control" name="show_type" required>
                                <option value="">Select Type</option>
                                <option value="home" @if(isset($view->show_type))@if($view->show_type=='home') selected @endif @endif>Home</option>
                                <option value="inner" @if(isset($view->show_type))@if($view->show_type=='inner') selected @endif @else selected @endif>Inner</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Heading</label>
                            <input class="form-control" name="name" value="@if(isset($view->name)) {{$view->name}} @endif" type="text">
                        </div>

                        <div class="form-group col-md-4">
                            @if(isset($view->image))
                            @if($view->image!='')
                            <img src="{{url('/backend/service_video/inner/'.$view->image)}}" style="width: 85px;height: 85px;"><br>
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif
                            <div class="form-group">
                                <label class="control-label">Service Video Thumbnail</label>
                                <input class="form-control" name="image" type="file">
                                <input class="form-control" name="oldimage" value="@if(isset($view->image)) {{$view->image}} @endif" type="hidden">
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label class="control-label">Service Video Link</label>
                            <input class="form-control" name="video" value="@if(isset($view->video)) {{$view->video}} @endif" type="text" required>
                        </div>

                        <div class="form-group  col-md-4">
                            <label class="control-label">Image Alt Tag</label>
                            <input class="form-control" name="alt_img" value="@if(isset($view->alt_img)) {{$view->alt_img}} @endif" type="text">
                        </div>

                        <div class="col-sm-12 marginT30">
                            <button type="submit" class="btn btn-primary icon-btn" onclick="validatesec()" type="button">
                                <i class="fa fa-fw fa-lg fa-check-circle"></i>Preview
                            </button>&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-default icon-btn" href="{{url('/admin/video-testimonials')}}">
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

    function videocategory() {
        var servicecat = $("#servicecat").val();
        //   alert(servicecat)
        $.ajax({
            type: "post",
            // cache: false,
            // async: false,
            url: "{{url('/admin/video-change')}}",
            data: {
                'servicecat': servicecat
            },
            success: function(result) {
                $("#service").html(result);
            },
            complete: function() {},
        });
    }


    function addvideolink() {
        // alert('hi');
        $.ajax({
            type: "get",
            // cache: false,
            // async: false,
            url: "{{url('/admin/show-video-link')}}",
            data: {
                'post': 'ok'
            },
            success: function(result) {
                $("#showvideolink").append(result);
            },
            complete: function() {},
        });
    }

    function removelink(rand) {
        $('#remove' + rand).remove();
    }
</script>
@endsection