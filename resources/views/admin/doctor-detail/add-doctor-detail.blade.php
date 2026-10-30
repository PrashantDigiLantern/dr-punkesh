@extends('admin.master')
@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="card cardsec">
            <div class="card-body">
                <div class="page-title pagetitle">
                    <h1>Add Doctor Details</h1>
                    <ul class="breadcrumb side">
                        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
                        <li><a href="{{url('/admin/doctor-detail')}}">Doctor</a></li>
                        <li><a href="{{url('/admin/doctor-detail')}}">Doctor Details List</a></li>
                        <li class="active">Add Doctor Details</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Start form here -->
        <form action="{{URL::to('/admin/create_doctor_detail')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <input type="hidden" value="{{ csrf_token() }}" name="_token">
            <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
            <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
            <input type="hidden" name="created_by" value="{{session('useradmin')['usr_id']}}">
            <div class="card">
                <div class="card-body">
                    <div class="row">


                        <div class="form-group col-md-4">
                            <label class="control-label">Select Doctor</label>
                            <select class="form-control" name="doctor_id" required>
                                <option value="">Select Doctor</option>
                                @foreach($doctorlist as $doctorview)
                                <option value="{{$doctorview->doc_id}}">{{$doctorview->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Service Banner</label>
                            <select class="form-control" name="video_type" required id="video_type" onchange="servicetype()">
                                <option value="">Select Type</option>
                                <option value="image" selected>Image</option>
                                <option value="link">Youtube Link</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label videoupload">Banner Image</label>
                            <label class="control-label videolink" style="display:none;">Banner Thumbnail Image</label>
                            <input class="form-control" name="banner_image" type="file">
                        </div>
                        <div class="form-group col-md-4 videolink" style="display:none;">
                            <label class="control-label">Service Youtube Link</label>
                            <input class="form-control" name="video_link" type="text">
                        </div>

                        <div class="form-group  col-md-4">
                            <label class="control-label">Image Alt Tag</label>
                            <input class="form-control" name="alt_tag" type="text">
                        </div>
                        <div class="form-group  col-md-12">
                            <label class="control-label">Descrition</label>
                            <textarea class="form-control ckeditor" name="description" rows="3"></textarea>
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group  col-md-12">
                            <label class="control-label">Section1</label>
                            <textarea class="form-control ckeditor" name="section1" rows="3"></textarea>
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group  col-md-12">
                            <label class="control-label">Section2</label>
                            <textarea class="form-control ckeditor" name="section2" rows="3"></textarea>
                            <span class="help-block"></span>
                        </div>


                    </div>
                    <div class="row" id="education">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Education Name</label>
                                <input class="form-control" name="education_name[]" type="text" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Education College</label>
                                <input class="form-control" name="education_college[]" type="text" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <button class="btn btn-primary marginT38" type="button" onclick="addeducation()">+</button>
                            </div>
                        </div>
                    </div>
                    <div id="addeducation"></div>

                    <div class="row" id="experience">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Experience Name</label>
                                <input class="form-control" name="experience_name[]" type="text" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Experience College</label>
                                <input class="form-control" name="experience_address[]" type="text" required>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <button class="btn btn-primary marginT38" type="button" onclick="addexperience()">+</button>
                            </div>
                        </div>
                    </div>
                    <div id="addexperience"></div>
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label>Title Tags</label>
                            <input class="form-control" name="title_tag" type="text">
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Keyword Tag</label>
                            <input class="form-control" name="keyword_tag" type="text">
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Description Tag</label>
                            <input class="form-control" name="description_tag" type="text">
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Canonical</label>
                            <input class="form-control" name="canonical_tag" type="text">
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
</script>
@endsection