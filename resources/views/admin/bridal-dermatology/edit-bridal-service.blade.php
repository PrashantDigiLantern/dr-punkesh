@extends('admin.master')
@section('content')
<?php $rand = rand(9999, 99999); ?>
<section id="main-content">
    <section class="wrapper">
        <div class="card cardsec">
            <div class="card-body">
                <div class="page-title pagetitle">
                    <h1>Edit Bridal Dermatology</h1>
                    <ul class="breadcrumb side">
                        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
                        <li><a href="{{url('/admin/bridal')}}">Bridal Dermatology List</a></li>
                        <li class="active">Edit Bridal Dermatology</li>
                    </ul>
                </div>
            </div>
        </div>
        <form action="{{URL::to('/admin/update_bridal'.'/'.$edit->ser_id)}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <div class="card">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
                <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
                <input type="hidden" name="updated_by" value="{{session('useradmin')['usr_id']}}">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">

                            <div class="form-group col-sm-6 paddingL0">
                                <label>Service Name</label>
                                <input class="form-control" value="{{$edit->service_name}}" name="service_name" type="text">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="control-label">Service Video Type</label>
                                <select class="form-control" name="video_type" required id="video_type" onchange="servicetype()">
                                    <option value="">Select Type</option>
                                    <option value="image" @if($edit->video_type=='image') selected @endif>Image</option>
                                    <option value="link" @if($edit->video_type=='link') selected @endif>Youtube Link</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-6 paddingL0 videolink" style="display:none;">
                                <label>Service Youtube Link</label>
                                <input class="form-control" value="{{$edit->video_link}}" name="video_link" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="col-sm-6">
                                @if($edit->service_image==NULL || $edit->service_image=='')
                                <img src="{{url('/images/no_image.jpg')}}" style="width:70px;height:70px;">
                                @else
                                <img src="{{url('/'.session('useradmin')['site_url'].'backend/service/image/'.$edit->service_image)}}" style="width: 85px;height: 85px;"><br>
                                @endif
                                <div class="form-group">
                                    <label class="control-label">Service Image</label>
                                    <input class="form-control" name="service_image" type="file">
                                    <input class="form-control" name="oldservice_image" value="{{$edit->service_image}}" type="hidden">
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                <div id="videosec">
                                    @if($edit->service_banner_image=='' || $edit->service_banner_image==NULL)
                                    <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                                    @else
                                    <img src="{{url('/images/service/banner/'.$edit->service_banner_image)}}" style="width: 85px;height: 85px;">
                                    @endif
                                    <div class="form-group">
                                        <label class="control-label videoupload">Banner Image</label>
                                        <label class="control-label videolink" style="display:none;">Banner Thumbnail Image</label>
                                        <input class="form-control" name="service_banner_image" type="file">
                                        <input class="form-control" name="oldservice_banner_image" value="{{$edit->service_banner_image}}" type="hidden">
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                    <div class="row">

                        <div class="form-group col-sm-12">
                            <label>Sort Descrition</label>
                            <textarea class="form-control ckeditor" name="short_desc" rows="3">{{$edit->short_desc}}</textarea>
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group col-sm-12">
                            <label>Descrition</label>
                            <textarea class="form-control ckeditor" name="description" rows="3">{{$edit->description}}</textarea>
                            <span class="help-block"></span>
                        </div>
                        @foreach($service_sec as $serviceview)
                        @php $randsec = rand(9999, 99999);@endphp
                        @if($serviceview->type=='fulltext')
                        <div class="row">
                            <div class="form-group col-md-11">
                                <div class="form-group col-md-12">
                                    <label class="control-label">Section1 Heading</label>
                                    <input class="form-control" name="service_heading[]" value="{{$serviceview->heading}}" type="text">
                                </div>
                                <div class="form-group  col-md-12">
                                    <label class="control-label">Section1</label>
                                    <textarea class="form-control ckeditor" name="service1[]" rows="3">{{$serviceview->section1}}</textarea>
                                    <span class="help-block"></span>
                                </div>
                                <div class="col-sm-12">
                                    <input type="hidden" name="service_section_id[]" value="{{$serviceview->ser_sec_id}}">
                                    <input type="hidden" name="service_type[]" value="{{$serviceview->type}}">
                                    <input type="file" name="serviceimage[]" class="displaynone">
                                    <input type="hidden" name="service2[]" value="{{$serviceview->section2}}">
                                    <input class="form-control" name="oldserviceimage[]" value="{{$serviceview->image}}" type="hidden">
                                </div>
                            </div>
                            <div class="form-group col-md-1 paddingL0">
                                <input type="text" class="form-control ordersec" value="{{$serviceview->order_by}}" name="order_by[]" id="orderby{{$serviceview->ser_sec_id}}" onkeyup="orderbyservicesec('{{$randsec}}','{{$serviceview->ser_sec_id}}')">
                                <button type="button" class="btn btn-danger marginT38 buttonright" onclick="removesecrvice('{{$randsec}}','{{$serviceview->ser_sec_id}}')">-</button>
                            </div>
                        </div>
                        @endif
                        @if($serviceview->type=='imagetext')
                        <div class="row">
                            <div class="form-group col-md-11">
                                <div class="form-group col-md-12">
                                    <label class="control-label">Section2 Heading</label>
                                    <input class="form-control" name="service_heading[]" value="{{$serviceview->heading}}" type="text">
                                </div>
                                <div class="col-md-12">
                                    @if($serviceview->image==NULL || $serviceview->image=='')
                                    <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                                    @else
                                    <img src="{{url('/images/service/section/'.$serviceview->image)}}" style="width:85px;height:85px;">
                                    @endif
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label">Service2 Image</label>
                                    <input class="form-control" name="serviceimage[]" type="file">
                                    <input class="form-control" name="oldserviceimage[]" value="{{$serviceview->image}}" type="hidden">
                                </div>

                                <div class="form-group  col-md-12">
                                    <label class="control-label">Section2</label>
                                    <textarea class="form-control ckeditor" name="service1[]" rows="3">{{$serviceview->section1}}</textarea>
                                    <span class="help-block"></span>
                                </div>
                                <div class="col-sm-12">
                                    <input type="hidden" name="service_section_id[]" value="{{$serviceview->ser_sec_id}}">
                                    <input type="hidden" name="service2[]" value="{{$serviceview->section2}}">
                                    <input type="hidden" name="service_type[]" value="{{$serviceview->type}}">
                                </div>
                            </div>
                            <div class="form-group col-md-1 paddingL0">
                                <input type="text" class="form-control ordersec" value="{{$serviceview->order_by}}" name="order_by[]" id="orderby{{$serviceview->ser_sec_id}}" onkeyup="orderbyservicesec('{{$randsec}}','{{$serviceview->ser_sec_id}}')">
                                <button type="button" class="btn btn-danger marginT38 buttonright" onclick="removesecrvice('{{$randsec}}','{{$serviceview->ser_sec_id}}')">-</button>
                            </div>
                        </div>
                        @endif
                        @if($serviceview->type=='leftheading')
                        <div class="row">
                            <div class="form-group col-md-11">
                                <div class="form-group col-md-12">
                                    <label class="control-label">Section3 Heading</label>
                                    <input class="form-control" name="service_heading[]" value="{{$serviceview->heading}}" type="text">
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="control-label">Section3</label>
                                    <textarea class="form-control ckeditor" name="service1[]" rows="3">{{$serviceview->section1}}</textarea>
                                    <span class="help-block"></span>
                                </div>
                                <div class="col-sm-12">
                                    <input type="hidden" name="service_section_id[]" value="{{$serviceview->ser_sec_id}}">
                                    <input type="hidden" name="service2[]" value="{{$serviceview->section2}}">
                                    <input type="file" name="serviceimage[]" class="displaynone">
                                    <input type="hidden" name="service_type[]" value="{{$serviceview->type}}">
                                    <input class="form-control" name="oldserviceimage[]" value="{{$serviceview->image}}" type="hidden">
                                </div>
                            </div>
                            <div class="form-group col-md-1 paddingL0">
                                <input type="text" class="form-control ordersec" value="{{$serviceview->order_by}}" name="order_by[]" id="orderby{{$serviceview->ser_sec_id}}" onkeyup="orderbyservicesec('{{$randsec}}','{{$serviceview->ser_sec_id}}')">
                                <button type="button" class="btn btn-danger marginT38 buttonright" onclick="removesecrvice('{{$randsec}}','{{$serviceview->ser_sec_id}}')">-</button>
                            </div>
                        </div>
                        @endif
                        @if($serviceview->type=='twoparagraph')
                        <div class="row">
                            <div class="form-group col-md-11">
                                <div class="form-group col-md-12">
                                    <label class="control-label">Section4 Heading</label>
                                    <input class="form-control" name="service_heading[]" value="{{$serviceview->heading}}" type="text">
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="control-label">Section4 Left</label>
                                    <textarea class="form-control ckeditor" name="service1[]" rows="3">{{$serviceview->section1}}</textarea>
                                    <span class="help-block"></span>
                                </div>
                                <div class="col-md-12">
                                    <label class="control-label">Section4 Right</label>
                                    <textarea class="form-control ckeditor" name="service2[]" rows="3">{{$serviceview->section2}}</textarea>
                                    <span class="help-block"></span>
                                </div>
                                <div class="col-sm-12">
                                    <input type="hidden" name="service_section_id[]" value="{{$serviceview->ser_sec_id}}">
                                    <input type="hidden" name="service_type[]" value="{{$serviceview->type}}">
                                    <input type="file" name="serviceimage[]" class="displaynone">
                                    <input class="form-control" name="oldserviceimage[]" value="{{$serviceview->image}}" type="hidden">
                                </div>
                            </div>
                            <div class="form-group col-md-1 paddingL0">
                                <input type="text" class="form-control ordersec" value="{{$serviceview->order_by}}" name="order_by[]" id="orderby{{$serviceview->ser_sec_id}}" onkeyup="orderbyservicesec('{{$randsec}}','{{$serviceview->ser_sec_id}}')">
                                <button type="button" class="btn btn-danger marginT38 buttonright" onclick="removesecrvice('{{$randsec}}','{{$serviceview->ser_sec_id}}')">-</button>
                            </div>
                        </div>
                        @endif
                        @endforeach
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
                            <label>Image Alt Tag</label>
                            <input class="form-control" value="{{$edit->alt_tag}}" name="alt_tag" type="text">
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Title Tags</label>
                            <input class="form-control" value="{{$edit->title_tag}}" name="title_tag" type="text" service>
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
                            <input class="form-control" value="{{$edit->canonical_tag}}" name="canonical_tag" type="text">
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Url</label>
                            <input class="form-control" value="{{$edit->url}}" type="text" name="url">
                        </div>

                        <div class="col-sm-12 marginT30">
                            <button type="submit" class="btn btn-primary icon-btn" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-default icon-btn" href="{{url('/admin/bridal')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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

    function servicelist(rand) {
        var servicelist = $("#service_list" + rand).val();
        //   alert(servicelist)
        $.ajax({
            type: "post",
            // cache: false,
            // async: false,
            url: "{{url('/admin/bridal-list')}}",
            data: {
                'servicelist': servicelist
            },
            success: function(result) {
                $("#servicelist" + rand).html(result);
            },
            complete: function() {},
        });
    }

    function orderbyservicesec(rand, secid) {
        var order_by = $("#orderby" + secid).val();
        // alert(order_by);
        $.ajax({
            type: "post",
            // cache: false,
            // async: false,
            url: "{{url('/admin/service-section-order')}}",
            data: {
                'post': 'ok',
                'secid': secid,
                'order_by': order_by
            },
            success: function(result) {
                // alert(result); 
                // window.location.href = "{{url('/admin/edit_service')}}/{{$edit->ser_id}}"

            },
            complete: function() {},
        });
    }

    function removesecrvice(rand, secid) {
        // var tabserial = $("#tabserial"+rand).val();
        // var no = 1;
        // var serial = parseInt(tabserial) + parseInt(no);
        // alert(serial);
        if (confirm("Do you really want to delete record?") == true) {
            $.ajax({
                type: "post",
                // cache: false,
                // async: false,
                url: "{{url('/admin/service-section-delete')}}",
                data: {
                    'post': 'ok',
                    'secid': secid
                },
                success: function(result) {
                    // alert(result); 
                    window.location.href = "{{url('/admin/edit_bridal')}}/{{$edit->ser_id}}"

                },
                complete: function() {},
            });
        }
    }
</script>

@endsection