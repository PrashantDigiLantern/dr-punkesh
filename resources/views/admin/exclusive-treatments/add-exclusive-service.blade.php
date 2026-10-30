@extends('admin.master')
@section('content')
<?php $rand = rand(9999, 99999); ?>
<section id="main-content">
    <section class="wrapper">
        <div class="card cardsec">
            <div class="card-body">
                <div class="page-title pagetitle">
                    <h1>Add Exclusive Treatments</h1>
                    <ul class="breadcrumb side">
                        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
                        <li><a href="{{url('/admin/exclusive')}}">Exclusive Treatments List</a></li>
                        <li class="active">Add Exclusive Treatments</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Start form here -->
        <form action="{{URL::to('/admin/create_exclusive')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
            <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
            <input type="hidden" name="created_by" value="{{session('useradmin')['usr_id']}}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="card">
                <div class="card-body">
                    <div class="row">

                        <div class="form-group col-md-4">
                            <label class="control-label">Service Name</label>
                            <input class="form-control" name="service_name" type="text" required>
                        </div>
                        <div class="form-group  col-md-4">
                            <label class="control-label">Service Image</label>
                            <input class="form-control" name="service_image" type="file">
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
                            <input class="form-control" name="service_banner_image" type="file">
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
                            <label class="control-label">Short Description</label>
                            <textarea class="form-control ckeditor" name="short_desc" rows="3"></textarea>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group  col-md-12">
                            <label class="control-label">Description</label>
                            <textarea class="form-control ckeditor" name="description" rows="3"></textarea>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Section1 Heading</label>
                            <input class="form-control" name="service_heading[]" type="text">
                        </div>
                        <div class="form-group  col-md-12">
                            <label class="control-label">Section1</label>
                            <textarea class="form-control ckeditor" name="service1[]" rows="3"></textarea>
                            <span class="help-block"></span>
                        </div>
                        <input type="hidden" name="service_type[]" value="fulltext">
                        <input type="file" name="serviceimage[]" value="" class="displaynone">
                        <input type="hidden" name="service2[]" value="">
                        <div class="form-group col-md-12">
                            <label class="control-label">Section2 Heading</label>
                            <input class="form-control" name="service_heading[]" type="text">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Service2 Image</label>
                            <input class="form-control" name="serviceimage[]" type="file">
                        </div>

                        <div class="form-group  col-md-12">
                            <label class="control-label">Section2</label>
                            <textarea class="form-control ckeditor" name="service1[]" rows="3"></textarea>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <input type="hidden" name="service2[]" value="">
                    <input type="hidden" name="service_type[]" value="imagetext">
                    <div class="row">

                        <div class="form-group col-md-12">
                            <label class="control-label">Section3 Heading</label>
                            <input class="form-control" name="service_heading[]" type="text">
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Section3</label>
                            <textarea class="form-control ckeditor" name="service1[]" rows="3"></textarea>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <input type="hidden" name="service2[]" value="">
                    <input type="file" name="serviceimage[]" value="" class="displaynone">
                    <input type="hidden" name="service_type[]" value="leftheading">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="control-label">Section4 Heading</label>
                            <input class="form-control" name="service_heading[]" type="text">
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label">Section4 Left</label>
                            <textarea class="form-control ckeditor" name="service1[]" rows="3"></textarea>
                            <span class="help-block"></span>
                        </div>
                        <div class="col-md-12">
                            <label class="control-label">Section4 Right</label>
                            <textarea class="form-control ckeditor" name="service2[]" rows="3"></textarea>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    <input type="hidden" name="service_type[]" value="twoparagraph">
                    <input type="file" name="serviceimage[]" class="displaynone" value="">
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label>Add More Section</label>
                            <select class="form-control" id="service_list{{$rand}}" name="service_type[]" onchange="servicelist('{{$rand}}')">
                                <option value="">Add More Section</option>
                                <option value="fulltext">Full Text</option>
                                <option value="imagetext">Image and Text</option>
                                <option value="leftheading">Left Heading and Right Text</option>
                                <option value="twoparagraph">Two Paragraph</option>
                            </select>
                        </div>

                        <div id="servicelist{{$rand}}"></div>
                    </div>

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

                        <div class="form-group col-sm-4">
                            <label class="control-label">Url</label>
                            <input class="form-control" name="url" type="text">
                        </div>

                        <div class="col-sm-12 marginT30">
                            <button type="submit" class="btn btn-primary icon-btn" type="button">
                                <i class="fa fa-fw fa-lg fa-check-circle"></i>Submit
                            </button>&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-default icon-btn" href="{{url('/admin/exclusive')}}">
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

    function servicelist(rand) {
        var servicelist = $("#service_list" + rand).val();
        //   alert(servicelist)
        $.ajax({
            type: "post",
            // cache: false,
            // async: false,
            url: "{{url('/admin/exclusive-list')}}",
            data: {
                'servicelist': servicelist
            },
            success: function(result) {
                $("#servicelist" + rand).html(result);
            },
            complete: function() {},
        });
    }
</script>
@endsection