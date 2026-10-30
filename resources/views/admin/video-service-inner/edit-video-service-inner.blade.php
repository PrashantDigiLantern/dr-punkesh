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
                    <h1>Edit Service Video</h1>
                    <ul class="breadcrumb side">
                        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
                        <li><a href="{{url('/admin/service-video-inner')}}">Services</a></li>
                        <li><a href="{{url('/admin/service-video-inner')}}">Services Video List</a></li>
                        <li class="active">Edit Service Video</li>
                    </ul>
                </div>
            </div>
        </div>
        <form action="{{URL::to('/admin/create_service_video_inner')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <div class="card">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
                <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
                <input type="hidden" name="updated_by" value="{{session('useradmin')['usr_id']}}">
                <input type="hidden" name="vid_inn_id" id="vid_inn_id" value="@if(isset($primeid)){{$primeid}}@else 0 @endif">
                <div class="card-body">
                    <div class="row">
                    <div class="form-group col-md-4">
                                <label class="control-label">Select Design Type</label>
                                <select class="form-control" id="design_type" name="design_type">
                                    <option value="">Select Design Type</option>
                                    <option value="left" @if(isset($edit->design_type))@if($edit->design_type=='left') selected @endif @else selected @endif>Left Side Image</option>
                                    <option value="right" @if(isset($edit->design_type))@if($edit->design_type=='right') selected @endif @endif>Right Side Image</option>
                                </select>
                            </div>
                            @if(in_array('22',$permissionoprid))
                        <div class="form-group col-md-4">
                            <label class="control-label">Video Category</label>
                            <select class="form-control" name="service_cat" id="servicecategory" onchange="VideoCategory()">
                                <option value="">Select Category</option>
                                 @foreach($firstcategory as $firstcategorylist)
                                <option value="@if(isset($firstcategorylist->vid_ser_id)){{$firstcategorylist->vid_ser_id}}@endif" @if(isset($secondsec['firstser_id']))@if($firstcategorylist->vid_ser_id == $secondsec['firstser_id']) selected @endif @endif>{{$firstcategorylist->name}}</option>
                                @endforeach
                               
                            </select>
                        </div>
                        @if(in_array('44',$permissionoprid))
                    <div class="form-group col-md-4">
                            <label class="control-label">Second Video Category</label>
                            <select class="form-control" name="second_cat" id="secondcategory" onchange="SecondVideoCategory()">
                                <option value="">Select Category</option>
                                @if(isset($secondsec['secservice_name']))
                                <option value="{{$secondsec['secser_id']}}" selected>{{$secondsec['secservice_name']}}</option>
                                @endif
                            </select>
                        </div>
                        @if(in_array('45',$permissionoprid))
                        <div class="form-group col-md-4">
                            <label class="control-label">Third Video Category</label>
                            <select class="form-control" name="third_cat" id="thirdcategory" onchange="ThirdVideoCategory()">
                                <option value="">Select Category</option>
                                @if(isset($secondsec['threeservice_name']))
                                <option value="{{$secondsec['threeser_id']}}" selected>{{$secondsec['threeservice_name']}}</option>
                                @endif
                            </select>
                        </div>
                        @if(in_array('46',$permissionoprid))
                        <div class="form-group col-md-4">
                            <label class="control-label">Fourth Video Category</label>
                            <select class="form-control" name="fourt_cat" id="fourthcategory" onchange="FourthVideoCategory()">
                                <option value="">Select Category</option>
                                @if(isset($secondsec['fourservice_name']))
                                <option value="{{$secondsec['fourser_id']}}" selected>{{$secondsec['fourservice_name']}}</option>
                                @endif
                            </select>
                        </div>
                        @if(in_array('47',$permissionoprid))
                        <div class="form-group col-md-4">
                            <label class="control-label">Fifth Video Category</label>
                            <select class="form-control" name="fifth_cat" id="fifthcategory">
                                <option value="">Select Category</option>
                                @if(isset($secondsec['fifservice_name']))
                                <option value="{{$secondsec['fifser_id']}}" selected>{{$secondsec['fifservice_name']}}</option>
                                @endif
                            </select>
                        </div>
                        @endif
                        @endif
                        @endif
                        @endif
                        @endif
                        @if(in_array('23',$permissionoprid))
                        <div class="form-group col-md-4">
                            <label class="control-label">Video Service</label>
                            <select class="form-control" name="video_service_id" id="servicesec">
                                <option value="">Select</option>
                                @if(isset($edit->video_service_id))
                                <option value="{{$service->vid_ser_id}}" selected>{{$service->name}}</option>
                                @endif
                            </select>
                        </div>
                        @endif
                        <div class="form-group col-md-4">
                            <label class="control-label">Service Name</label>
                            <select class="form-control" name="service_id">
                                <option value="">Select service</option>
                                @foreach($servicedata as $servicedatalist)
                                <option value="{{$servicedatalist->ser_id}}" @if(isset($edit->service_id))@if($edit->service_id==$servicedatalist->ser_id) selected @endif @endif>{{$servicedatalist->service_name}}</option>
                                @endforeach
                            </select>
                        </div>
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
                            <input class="form-control" value="{{$edit->name}}" name="name" type="text">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Image Alt Tag</label>
                            <input class="form-control" value="{{$edit->alt_img}}" name="alt_tag" type="text">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            @if($edit->image!='')
                            <img src="{{url('/'.session('useradmin')['site_url'].'backend/service_video/inner/'.$edit->image)}}" style="width: 85px;height: 85px;"><br>

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
                            <a class="btn btn-default icon-btn" href="{{url('/admin/service-video-inner')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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