@extends('admin.master')
@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="card cardsec">
            <div class="card-body">
                <div class="page-title pagetitle">
                    <h1>Edit Doctor Details</h1>
                    <ul class="breadcrumb side">
                        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
                        <li><a href="{{url('/admin/doctor-detail')}}">Doctor</a></li>
                        <li><a href="{{url('/admin/doctor-detail')}}">Doctor Details List</a></li>
                        <li class="active">Edit Doctor Details</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Start form here -->
        <form action="{{URL::to('/admin/update_doctor_detail/'.$edit->doc_lit_id)}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <input type="hidden" value="{{ csrf_token() }}" name="_token">
            <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
            <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
            <input type="hidden" name="updated_by" value="{{session('useradmin')['usr_id']}}">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group col-md-6 paddingL0">
                                <label class="control-label">Select Doctor</label>
                                <select class="form-control" name="doctor_id" required>
                                    <option value="">Select Doctor</option>
                                    @foreach($doctorlist as $doctorview)
                                    <option value="{{$doctorview->doc_id}}" @if($edit->doctor_id==$doctorview->doc_id) selected @endif>{{$doctorview->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6 paddingR0">
                                <label class="control-label">Service Video Type</label>
                                <select class="form-control" name="video_type" required id="video_type" onchange="servicetype()">
                                    <option value="">Select Type</option>
                                    <option value="image" @if($edit->video_type=='image') selected @endif>Image</option>
                                    <option value="link" @if($edit->video_type=='link') selected @endif>Youtube Link</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Image Alt Tag</label>
                                <input class="form-control" name="alt_tag" type="text" value="{{$edit->alt_tag}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="col-sm-6">
                                @if($edit->banner_image!='')
                                <img src="{{url('/'.session('useradmin')['site_url'].'backend/doctor/'.$edit->banner_image)}}" style="width: 85px;height: 85px;"><br>
                                @else
                                <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                                @endif
                                <div class="form-group">
                                    @if($edit->video_type=='image')
                                    <label class="control-label videoupload">Banner Image</label>
                                    <label class="control-label videolink" style="display:none;">Banner Thumbnail Image</label>
                                    @else
                                    <label class="control-label videoupload" style="display:none;">Banner Image</label>
                                    <label class="control-label videolink">Banner Thumbnail Image</label>
                                    @endif
                                    <input class="form-control" name="banner_image" type="file">
                                    <input class="form-control" name="oldbanner_image" value="{{$edit->banner_image}}" type="hidden">
                                </div>
                            </div>
                            @if($edit->video_type=='link')
                            <div class="col-sm-6 videolink">
                                @if($edit->video_link!='')
                                <iframe width="100%" height="76" src="{{$edit->video_link}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                @else
                                <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                                @endif
                                <div class="form-group">
                                    <label class="control-label">Service Youtube Link</label>
                                    <input class="form-control" name="video_link" value="{{$edit->video_link}}" type="text">
                                </div>
                            </div>
                            @else
                            <div class="col-sm-6 videolink" style="display:none;">
                                <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                                <div class="form-group">
                                    <label class="control-label">Service Youtube Link</label>
                                    <input class="form-control" name="video_link" value="{{$edit->video_link}}" type="text">
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group  col-md-12">
                            <label class="control-label">Descrition</label>
                            <textarea class="form-control ckeditor" name="description" rows="3">{{$edit->description}}</textarea>
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group  col-md-12">
                            <label class="control-label">section1</label>
                            <textarea class="form-control ckeditor" name="section1" rows="3">{{$edit->section1}}</textarea>
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group  col-md-12">
                            <label class="control-label">section2</label>
                            <textarea class="form-control ckeditor" name="section2" rows="3">{{$edit->section2}}</textarea>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <?php
                    $value = explode('@@', $edit->education_name);
                    $valueedu = explode('@@', $edit->education_college);
                    ?>
                    @foreach($value as $key => $typelist)
                    <?php $rand = rand(9999, 99999);


                    ?>
                    <div class="row" id="education{{$rand}}">
                        <div class="col-sm-4">
                            <div class="form-group">
                                @if($key=='0')
                                <label class="control-label">Education Name</label>
                                @endif
                                <input class="form-control" name="education_name[]" value="{{$typelist}}" type="text" required>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                @if($key=='0')
                                <label class="control-label">Education College</label>
                                @endif
                                <input class="form-control" name="education_college[]" value="{{$valueedu[$key]}}" type="text" required>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            @if($key=='0')
                            <div class="form-group">
                                <button class="btn btn-primary marginT38" type="button" onclick="addeducation()">+</button>
                            </div>
                            @else
                            <div class="form-group">
                                <button class="btn btn-danger" type="button" onclick="removeedulist('{{$rand}}')">-</button>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                    <div id="addeducation"></div>

                    <?php
                    $valueexpname = explode('@@', $edit->experience_name);
                    $valueexp = explode('@@', $edit->experience_address);
                    ?>
                    @foreach($valueexpname as $key => $explist)
                    <?php $rand = rand(9999, 99999);

                    ?>
                    <div class="row" id="experience{{$rand}}">
                        <div class="col-sm-4">
                            <div class="form-group">
                                @if($key=='0')
                                <label class="control-label">Experience Name</label>
                                @endif
                                <input class="form-control" name="experience_name[]" value="{{$explist}}" type="text" required>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                @if($key=='0')
                                <label class="control-label">Experience College</label>
                                @endif
                                <input class="form-control" name="experience_address[]" value="{{$valueexp[$key]}}" type="text" required>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            @if($key=='0')
                            <div class="form-group">
                                <button class="btn btn-primary marginT38" type="button" onclick="addexperience()">+</button>
                            </div>
                            @else
                            <div class="form-group">
                                <button class="btn btn-danger" type="button" onclick="removeexperlist('{{$rand}}')">-</button>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                    <div id="addexperience"></div>


                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label>Title Tags</label>
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
                            <input class="form-control" name="canonical_tag" value="{{$edit->canonical_tag}}" type="text">
                        </div>

                        <div class="col-sm-12 marginT30">
                            <button type="submit" class="btn btn-primary icon-btn" type="button">
                                <i class="fa fa-fw fa-lg fa-check-circle"></i>Submit
                            </button>&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-default icon-btn" href="{{url('/admin/doctor-detail')}}">
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

    function removeedulist(rand) {
        $("#education" + rand).remove();
    }

    function addexperience() {
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

    function removeexperlist(rand) {
        $("#experience" + rand).remove();
    }
</script>
@endsection