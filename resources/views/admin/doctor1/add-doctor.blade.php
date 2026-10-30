@extends('admin.master')
@section('content')
@php
$primeid = session('primeid');
$rand = rand(9999,99999);
@endphp
<section id="main-content">
    <section class="wrapper">
        <div class="card cardsec">
            <div class="card-body">
                <div class="page-title pagetitle">
                    <h1>Add Doctor</h1>
                    <ul class="breadcrumb side">
                        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
                        <li><a href="{{url('/admin/doctor-list')}}">About</a></li>
                        <li><a href="{{url('/admin/doctor-list')}}">List Doctor</a></li>
                        <li class="active">Add Doctor</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Start form here -->
        <form action="{{URL::to('/admin/create_doctor')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <input type="hidden" value="{{ csrf_token() }}" name="_token">
            <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
            <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
            <input type="hidden" name="created_by" value="{{session('useradmin')['usr_id']}}">
            <input type="hidden" name="doc_id" id="doc_id" value="@if(isset($primeid)){{$primeid}}@else 0 @endif">
            <div class="card">
                <div class="card-body">
                    <div class="row">


                        <div class="form-group col-md-4">
                            <label class="control-label">Name</label>
                            <input class="form-control" name="name" value="@if(isset($view->name)) {{$view->name}} @endif" type="text" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Show Type</label>
                            <select class="form-control" name="show_type" required>
                                <option value="">Select Type</option>
                                <option value="inside" @if(isset($view->show_type))@if($view->show_type=='inside') selected @endif @else selected @endif>Inside</option>
                                <option value="outside" @if(isset($view->show_type))@if($view->show_type=='outside') selected @endif @endif>Outside</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            @if(isset($view->home_image))
                            @if($view->home_image!='')
                            <img src="{{url('/'.session('useradmin')['site_url'].'backend/doctor/'.$view->home_image)}}" style="width: 85px;height: 85px;"><br>
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif
                            <label class="control-label">Home Image</label>
                            <input class="form-control" name="home_image" type="file">
                            <input class="form-control" name="oldhome_image" value="@if(isset($view->home_image)) {{$view->home_image}} @endif" type="hidden">
                        </div>
                        <div class="form-group col-md-4">
                            @if(isset($view->image))
                            @if($view->image!='')
                            <img src="{{url('/'.session('useradmin')['site_url'].'backend/doctor/'.$view->image)}}" style="width: 85px;height: 85px;"><br>
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif
                            <label class="control-label">Image</label>
                            <input class="form-control" name="image" type="file">
                            <input class="form-control" name="oldimage" value="@if(isset($view->image)) {{$view->image}} @endif" type="hidden">
                        </div>
                        <div class="form-group col-md-4">
                            @if(isset($view->banner_image))
                            @if($view->banner_image!='')
                            <img src="{{url('/'.session('useradmin')['site_url'].'backend/doctor/'.$view->banner_image)}}" style="width: 85px;height: 85px;"><br>
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif
                            <label class="control-label">Banner Image</label>
                            <input class="form-control" name="banner_image" type="file">
                            <input class="form-control" name="oldbanner_image" value="@if(isset($view->banner_image)) {{$view->banner_image}} @endif" type="hidden">
                        </div>
                        <div class="form-group  col-md-12">
                            <label class="control-label">Sort Degree</label>
                            <input class="form-control" name="short_degree" value="@if(isset($view->short_degree)) {{$view->short_degree}} @endif" type="text">
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group  col-md-12">
                            <label class="control-label">Home Description</label>
                            <textarea class="form-control ckeditor" name="home_desc" rows="3">@if(isset($view->home_desc)) {{$view->home_desc}} @endif</textarea>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group  col-md-12">
                            <label class="control-label">Descrition</label>
                            <textarea class="form-control ckeditor" name="sort_desc" rows="3">@if(isset($view->sort_desc)) {{$view->sort_desc}} @endif</textarea>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group  col-md-12">
                            <label class="control-label">Description1</label>
                            <textarea class="form-control ckeditor" name="description" rows="3">@if(isset($view->description)) {{$view->description}} @endif</textarea>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Education</label>
                            <textarea class="form-control ckeditor" name="education_desc" rows="3">@if(isset($view->education_desc)) {{$view->education_desc}} @endif</textarea>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    @php
                    $educationdetail = [];
                    @endphp
                    @if(isset($view->education_detail))
                    @php
                    $educationdetail = json_decode($view->education_detail);
                    @endphp

                    @foreach($educationdetail->education as $edukey => $education)
                    @php
                    $rand = rand(9999,99999);
                    @endphp
                    <div class="row" id="education{{$rand}}">
                        <div class="col-sm-2">
                            <div class="form-group">
                                @if($edukey=='0')
                                <label class="control-label">Education Year</label>
                                @endif
                                <input class="form-control" name="education_year[]" value="@if(isset($education->education_year)){{$education->education_year}}@endif" type="text">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                @if($edukey=='0')
                                <label class="control-label">Education Name</label>
                                @endif
                                <input class="form-control" name="education_name[]" value="@if(isset($education->education_name)){{$education->education_name}}@endif" type="text">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                @if($edukey=='0')
                                <label class="control-label">Education College</label>
                                @endif
                                <input class="form-control" name="education_college[]" value="@if(isset($education->education_college)){{$education->education_college}}@endif" type="text">
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                @if($edukey=='0')
                                <label class="control-label">Order By</label>
                                @endif
                                <input class="form-control" name="education_order_by[]" value="@if(isset($education->education_order_by)){{$education->education_order_by}}@endif" type="text">
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                @if($edukey=='0')
                                <button class="btn btn-primary marginT38" type="button" onclick="addeducation()">+</button>
                                @else
                                <button class="btn btn-danger" type="button" onclick="removeedutype('{{$rand}}')">-</button>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="row" id="education{{$rand}}">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label">Education Year</label>
                                <input class="form-control" name="education_year[]" type="text">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Education Name</label>
                                <input class="form-control" name="education_name[]" type="text">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Education College</label>
                                <input class="form-control" name="education_college[]" type="text">
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <label class="control-label">Order By</label>
                                <input class="form-control" name="education_order_by[]" type="text">
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <button class="btn btn-primary marginT38" type="button" onclick="addeducation()">+</button>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div id="addeducation"></div>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="control-label">Experience</label>
                            <textarea class="form-control ckeditor" name="experience_desc" rows="3">@if(isset($view->experience_desc)) {{$view->experience_desc}} @endif</textarea>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    @if(isset($view->experience_detail))
                    @php
                    $experiencedetail = json_decode($view->experience_detail);
                    @endphp
                    @foreach($experiencedetail->experience as $expkey => $experience)
                    @php
                    $rand = rand(9999,99999);
                    @endphp
                    <div class="row" id="experience{{$rand}}">
                        <div class="col-sm-2">
                            <div class="form-group">
                                @if($expkey=='0')
                                <label class="control-label">Experience Year</label>
                                @endif
                                <input class="form-control" name="experience_year[]" value="{{$experience->experience_year}}" type="text">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                @if($expkey=='0')
                                <label class="control-label">Experience Name</label>
                                @endif
                                <input class="form-control" name="experience_name[]" value="{{$experience->experience_name}}" type="text" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                @if($expkey=='0')
                                <label class="control-label">Experience Address</label>
                                @endif
                                <input class="form-control" name="experience_address[]" value="{{$experience->experience_address}}" type="text" required>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                @if($expkey=='0')
                                <label class="control-label">Order By</label>
                                @endif
                                <input class="form-control" name="experience_order_by[]" value="{{$experience->experience_order_by}}" type="text" required>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                @if($expkey=='0')
                                <button class="btn btn-primary marginT38" type="button" onclick="addexperience()">+</button>
                                @else
                                <button class="btn btn-danger" type="button" onclick="removeexptype('{{$rand}}')">-</button>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="row" id="experience{{$rand}}">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label class="control-label">Experience Year</label>
                                <input class="form-control" name="experience_year[]" type="text">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Experience Name</label>
                                <input class="form-control" name="experience_name[]" type="text" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Experience Address</label>
                                <input class="form-control" name="experience_address[]" type="text" required>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <label class="control-label">Order By</label>
                                <input class="form-control" name="experience_order_by[]" type="text" required>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <div class="form-group">
                                <button class="btn btn-primary marginT38" type="button" onclick="addexperience()">+</button>
                            </div>
                        </div>
                    </div>
                    @endif
                    <div id="addexperience"></div>
                    <div class="row">
                        <div class="form-group  col-md-4">
                            <label class="control-label">Image Alt Tag</label>
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
                            <label>Canonical Tag</label>
                            <input class="form-control" name="canonical_tag" value="@if(isset($view->canonical_tag)) {{$view->canonical_tag}} @endif" type="text">
                        </div>

                        <div class="form-group col-sm-4">
                            <label class="control-label">Url</label>
                            <input class="form-control" name="url" value="@if(isset($view->url)) {{$view->url}} @endif" type="text" required>
                        </div>
                        <div class="col-sm-12 marginT30">
                            <button type="submit" class="btn btn-primary icon-btn" onclick="validatesec()">
                                <i class="fa fa-fw fa-lg fa-check-circle"></i>Preview
                            </button>&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-default icon-btn" href="{{url('/admin/doctor-list')}}">
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

    function addeducation() {
        $.ajax({
            type: "get",
            cache: false,
            async: false,
            url: "{{url('/admin/addeducation')}}",
            data: {
                'post': 'ok'
            },
            success: function(result) {
                $("#addeducation").append(result);
            },
            complete: function() {},
        });
    }

    function removetype(rand) {
        $("#remove" + rand).remove();
    }

    function removeedutype(rand) {
        $("#education" + rand).remove();
    }

    function addexperience() {
        // alert('hi');
        $.ajax({
            type: "get",
            cache: false,
            async: false,
            url: "{{url('/admin/addexperience')}}",
            data: {
                'post': 'ok'
            },
            success: function(result) {
                $("#addexperience").append(result);
            },
            complete: function() {},
        });
    }

    function removeexperience(rand) {
        $("#remove" + rand).remove();
    }

    function removeexptype(rand) {
        $("#experience" + rand).remove();
    }
</script>
@endsection