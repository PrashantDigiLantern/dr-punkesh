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
                    <h1>Add Result</h1>
                    <ul class="breadcrumb side">
                        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
                        <li><a href="{{url('/admin/service-result-inner')}}">Result</a></li>
                        <li><a href="{{url('/admin/service-result-inner')}}">Result List</a></li>
                        <li class="active">Add Result</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Start form here -->
        <form action="{{URL::to('/admin/create_service_result_inner')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <input type="hidden" id="token" value="{{ csrf_token() }}" name="_token">
            <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
            <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
            <input type="hidden" name="created_by" value="{{session('useradmin')['usr_id']}}">
            <input type="hidden" name="res_inn_id" id="res_inn_id" value="@if(isset($primeid)){{$primeid}}@else 0 @endif">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                    <div class="form-group col-md-4">
                                <label class="control-label">Select Design Type</label>
                                <select class="form-control" id="design_type" name="design_type">
                                    <option value="">Select Design Type</option>
                                    <option value="left" @if(isset($view->design_type))@if($view->design_type=='left') selected @endif @else selected @endif>Left Side Image</option>
                                    <option value="right" @if(isset($view->design_type))@if($view->design_type=='right') selected @endif @endif>Right Side Image</option>
                                </select>
                            </div>
                        @if(in_array('19',$permissionoprid))
                        <div class="form-group col-md-4">
                            <label class="control-label">Result Category</label>
                            <select class="form-control" name="service_cat" id="servicecategory" onchange="ResultCategory()">
                                <option value="">Select Category</option>
                                 @foreach($firstcategory as $firstcategorylist)
                                <option value="@if(isset($firstcategorylist->res_ser_id)){{$firstcategorylist->res_ser_id}}@endif" @if(isset($view->res_inn_id))@if($firstcategorylist->res_ser_id == $secondsec['firstser_id']) selected @endif @endif>{{$firstcategorylist->name}}</option>
                                @endforeach
                               
                            </select>
                        </div>
                        @if(in_array('40',$permissionoprid))
                    <div class="form-group col-md-4">
                            <label class="control-label">Second Result Category</label>
                            <select class="form-control" name="second_cat" id="secondcategory" onchange="SecondResultCategory()">
                                <option value="">Select Category</option>
                                @if(isset($secondsec['secservice_name']))
                                <option value="{{$secondsec['secser_id']}}" selected>{{$secondsec['secservice_name']}}</option>
                                @endif
                            </select>
                        </div>
                        @if(in_array('41',$permissionoprid))
                        <div class="form-group col-md-4">
                            <label class="control-label">Third Result Category</label>
                            <select class="form-control" name="third_cat" id="thirdcategory" onchange="ThirdResultCategory()">
                                <option value="">Select Category</option>
                                @if(isset($secondsec['threeservice_name']))
                                <option value="{{$secondsec['threeser_id']}}" selected>{{$secondsec['threeservice_name']}}</option>
                                @endif
                            </select>
                        </div>
                        @if(in_array('42',$permissionoprid))
                        <div class="form-group col-md-4">
                            <label class="control-label">Fourth Result Category</label>
                            <select class="form-control" name="fourt_cat" id="fourthcategory" onchange="FourthResultCategory()">
                                <option value="">Select Category</option>
                                @if(isset($secondsec['fourservice_name']))
                                <option value="{{$secondsec['fourser_id']}}" selected>{{$secondsec['fourservice_name']}}</option>
                                @endif
                            </select>
                        </div>
                        @if(in_array('43',$permissionoprid))
                        <div class="form-group col-md-4">
                            <label class="control-label">Fifth Result Category</label>
                            <select class="form-control" name="fifth_cat" id="fifthcategory" onchange="FifthResultCategory()">
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
                        @if(in_array('20',$permissionoprid))
                        <div class="form-group col-md-4">
                            <label class="control-label">Result Service Name</label>
                            <select class="form-control" name="result_service_id" id="servicesec">
                                <option value="">Select Category</option>
                                @if(isset($view->res_inn_id))
                                <option value="{{$service->res_ser_id}}" selected>{{$service->name}}</option>
                                @endif
                            </select>
                        </div>
                        @endif
                        <div class="form-group col-md-4">
                            <label class="control-label">Service Name</label>
                            <select class="form-control" name="service_id">
                                <option value="">Select service</option>
                                @foreach($servicedata as $servicedatalist)
                                <option value="{{$servicedatalist->ser_id}}" @if(isset($view->service_id))@if($view->service_id==$servicedatalist->ser_id) selected @endif @endif>{{$servicedatalist->service_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Heading</label>
                            <input class="form-control" name="name" value="@if(isset($view->name)) {{$view->name}} @endif" type="text">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Result Image Type</label>
                            <select class="form-control" name="image_type" required id="image_type" onchange="imagetype()">
                                <option value="">Select Image Type</option>
                                <option value="slide" @if(isset($view->image_type))@if($view->image_type=='slide') selected @endif @endif>Slider Image</option>
                                <option value="image" @if(isset($view->image_type))@if($view->image_type=='image') selected @endif @else selected @endif>Single Image</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                        @if(isset($view->beforeimg))
                            @if($view->beforeimg!='')
                            <img src="{{url('/'.session('useradmin')['site_url'].'backend/service_result/inner/'.$view->beforeimg)}}" style="width: 85px;height: 85px;"><br>
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif
                            <label class="control-label slideimage"  style="display:none;">Result Befor Image</label>
                            <label class="control-label singleimage">Result Image</label>
                            <input class="form-control" name="before_image" type="file">
                            <input class="form-control" name="oldbeforeimage" value="@if(isset($view->beforeimg)){{$view->beforeimg}}@endif" type="hidden">
                        </div>

                        <div class="form-group col-md-4">
                        @if(isset($view->afterimg))
                            @if($view->afterimg!='')
                            <img src="{{url('/'.session('useradmin')['site_url'].'backend/service_result/inner/'.$view->afterimg)}}" style="width: 85px;height: 85px;"><br>
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif
                            <label class="control-label slideimage"  style="display:none;">Result After Image</label>
                            <label class="control-label singleimage">Result Popup Image</label>
                            <input class="form-control" name="after_image" type="file">
                            <input class="form-control" name="oldafterimage" value="@if(isset($view->afterimg)){{$view->afterimg}}@endif" type="hidden">
                        </div>

                        <div class="form-group  col-md-4">
                            <label class="control-label">Image Alt Tag</label>
                            <input class="form-control" name="alt_img" value="@if(isset($view->alt_img)) {{$view->alt_img}} @endif" type="text">
                        </div>

                        <div class="col-sm-12 marginT30">
                            <button type="submit" class="btn btn-primary icon-btn" onclick="validatesec()" type="button">
                                <i class="fa fa-fw fa-lg fa-check-circle"></i>Preview
                            </button>&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-default icon-btn" href="{{url('/admin/service-result-inner')}}">
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

    function servicecategoryres() {
        var servicecat = $("#servicecat").val();
        //   alert(servicecat)
        $.ajax({
            type: "post",
            // cache: false,
            // async: false,
            url: "{{url('/admin/service-change')}}",
            data: {
                'servicecat': servicecat
            },
            success: function(result) {
                $("#service").html(result);
            },
            complete: function() {},
        });
    }

    function imagetype() {
        var image_type = $('#image_type').val();
        // alert(image_type);
        if (image_type == 'slide') {
            $('.slideimage').show();
            $('.singleimage').hide();
        } else if (image_type == 'image') {
            $('.slideimage').hide();
            $('.singleimage').show();
        }
    }
</script>
@endsection