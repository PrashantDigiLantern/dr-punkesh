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
                    <h1>Edit Testimonial Video</h1>
                    <ul class="breadcrumb side">
                        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
                        <li><a href="{{url('/admin/video-testimonials')}}">Testimonial</a></li>
                        <li><a href="{{url('/admin/video-testimonials')}}">Testimonial Video List</a></li>
                        <li class="active">Edit Testimonial Video</li>
                    </ul>
                </div>
            </div>
        </div>
        <form action="{{URL::to('/admin/create_video_testimonials')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <div class="card">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="updated_by" value="{{session('useradmin')['usr_id']}}">
                <input type="text" name="test_video_id" id="test_video_id" value="@if(isset($primeid)){{$primeid}}@else 0 @endif">
                <div class="card-body">
                    <div class="row">
                      <div class="form-group col-md-4">
                            <label class="control-label">Show Home Page</label>
                            <select class="form-control" name="show_type" required>
                                <option value="">Select Type</option>
                                <option value="home" @if($edit->show_type == 'home') selected @endif>Home</option>
                                <option value="inner" @if($edit->show_type == 'inner') selected @endif>Inner</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Heading</label>
                            <input class="form-control" value="{{$edit->name}}" name="name" type="text" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Image Alt Tag</label>
                            <input class="form-control" value="{{$edit->alt_img}}" name="alt_tag" type="text">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            @if($edit->image!='')
                            <img src="{{url('/backend/service_video/inner/'.$edit->image)}}" style="width: 85px;height: 85px;"><br>
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">

                            @endif
                            <div class="form-group">
                                <label class="control-label">Service Video Thumbnail</label>
                                <input class="form-control" name="image" type="file">
                                <input class="form-control" name="oldimage" value="{{$edit->image}}" type="hidden">
                            </div>
                        </div>
                        <div class="col-sm-6">

                            <iframe width="100%" height="76" src="{{$edit->video}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <div class="form-group">
                                <label class="control-label">Service Video Link</label>
                                <input class="form-control" name="video" type="text" value="{{$edit->video}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-sm-12 marginT30">
                            <button type="submit" class="btn btn-primary icon-btn" onclick="validatesec()" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Preview</button>&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-default icon-btn" href="{{url('/admin/video-testimonials')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </section>
</section>
<script>
    CKEDITOR.replace('textArea');

    function servicetype() {
        var video_type = $('#video_type').val();
        if (video_type == 'video') {
            $('#videoupload').show();
            $('#videolink').hide();
        } else if (video_type == 'link') {
            $('#videoupload').hide();
            $('#videolink').show();
        }
    }
</script>

@endsection