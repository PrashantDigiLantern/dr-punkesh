@extends('admin.master')
@section('content')
@php
$primeid = session('primeid');
$rand = rand(9999, 99999);
@endphp
<div id="main">
<section id="main-content">
    <section class="wrapper">

	   <!-- <div class="content-wrapper-before  gradient-45deg-indigo-purple "> </div>
	<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
<div class="container">
  <div class="row">
    <div class="col s10 m6 l6">
      <h5 class="breadcrumbs-title mt-0 mb-0"><span>Edit Service FAQ</span></h5>
      <ol class="breadcrumbs mb-0">
        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Home</a>
        </li>
		  <li class="breadcrumb-item"><a href="{{url('/admin/service-faq')}}"> Services FAQ </a>
        </li>
		   <li class="breadcrumb-item"><a href="{{url('/admin/service-faq')}}">List Services FAQ</a>
        </li>
        <li class="breadcrumb-item active">Edit Service FAQ</li>
      </ol>
    </div>
  </div>
</div>
</div>

		<div class="container">
<div class="card">
        <div class="card-content textalign">
  <a class="waves-effect waves-light btn mr-1" href="{{url('/admin/dashboard')}}">Back</a>
  </div>
</div>
</div> -->




        <div class="card cardsec">
            <div class="card-body">
                <div class="page-title pagetitle">
                    <h1>Edit Service FAQ</h1>
                    <ul class="breadcrumb side">
                        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
                        <li><a href="{{url('/admin/service-faq')}}">Services</a></li>
                        <li><a href="{{url('/admin/service-faq')}}">List Services FAQ</a></li>
                        <li class="active">Edit Service FAQ</li>
                    </ul>
                </div>
            </div>
        </div>
        <form action="{{URL::to('/admin/create_service_faq')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
         <div class="container1">
		   <div class="card">
                <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
                <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
                <input type="hidden" name="updated_by" value="{{session('useradmin')['usr_id']}}">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="ser_faq_id" id="ser_faq_id" value="@if(isset($primeid)){{$primeid}}@else 0 @endif">
                <div class="card-body">
                    <div class="row">
                        
                        
          
                    @if(in_array('16',$permissionoprid))
                        <div class="form-group col-md-4 col s4">
                            <label class="control-label">Service Category</label>
                            <select class="form-control" name="service_cat" id="servicecategory" onchange="ServiceCategory()">
                                <option value="">Select Category</option>
                                 @foreach($firstcategory as $firstcategorylist)
                                  <option value="<?php if(isset($firstcategorylist->ser_id)){  echo $firstcategorylist->ser_id; }?>"                                  {{$firstcategorylist->ser_id}}
                                  <?php if(isset($serviceview2->ser_id)){  if($firstcategorylist->ser_id == $serviceview2->ser_id){ echo "selected";}}?>>{{$firstcategorylist->service_name}}</option>
                                @endforeach

                            </select>
                        </div>
                        @if(in_array('36',$permissionoprid))
                        <div class="form-group col-md-4 col s4">
                            <label class="control-label">Second Category2</label>
                            <select class="form-control" name="second_cat" id="secondcategory" onchange="SecondCategory()" required>
                                <option value="">Select Category</option>
                                <option value="{{$serviceview1->ser_id}}" @if(isset($serviceview1->ser_id))@if($serviceview1->ser_id == $edit->service_cat_id) selected @endif @endif>{{$serviceview1->service_name}}</option>
                               <!-- @if(isset($secondsec['secservice_name']))
                                <option value="{{$secondsec['secser_id']}}" selected>{{$secondsec['secservice_name']}}</option>
                                @endif-->
                             </select>
                        </div>
                        @if(in_array('37',$permissionoprid))
                        <div class="form-group col-md-4 col s4">
                            <label class="control-label">Third Category</label>
                            <select class="form-control" name="third_cat" id="thirdcategory" onchange="ThirdCategory()" required>
                                <option value="">Select Category</option>
                                @if(isset($secondsec['threeservice_name']))
                                <option value="{{$secondsec['threeser_id']}}" selected>{{$secondsec['threeservice_name']}}</option>
                                @endif
                            </select>
                        </div>
                        @if(in_array('38',$permissionoprid))
                        <div class="form-group col-md-4 col s4">
                            <label class="control-label">Fourth Category</label>
                            <select class="form-control" name="fourt_cat" id="fourthcategory" onchange="FourthCategory()" required>
                                <option value="">Select Category</option>
                                @if(isset($secondsec['fourservice_name']))
                                <option value="{{$secondsec['fourser_id']}}" selected>{{$secondsec['fourservice_name']}}</option>
                                @endif
                            </select>
                        </div>
                        @if(in_array('39',$permissionoprid))
                        <div class="form-group col-md-4 col s4">
                            <label class="control-label">Fifth Category Name</label>
                            <select class="form-control" name="fifth_cat" id="fifthcategory" onchange="FifthCategory()" required>
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
                        <div class="form-group col-md-4 col s4">
                            <label class="control-label">Service Name</label>
                            <select class="form-control" name="service_id" id="servicesec" required>
                                <option value="">Select</option>
                                <option value="{{$serviceview->ser_id}}" @if(isset($serviceview->ser_id))@if($serviceview->ser_id == $edit->service_id) selected @endif @endif>{{$serviceview->service_name}}</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12 col s12">
                            <label class="control-label">Description</label>
                            <textarea class="form-control ckeditor" name="description" rows="3">@if(isset($view->description)) {{$view->description}} @endif</textarea>
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group col-sm-12 col s12">
                            <label>Question</label>
                            <textarea class="form-control ckeditor" name="question" rows="3">{{$edit->question}}</textarea>
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group col-sm-12  col s12">
                            <label>Answer</label>
                            <textarea class="form-control ckeditor" name="answer" rows="3">{{$edit->answer}}</textarea>
                            <span class="help-block"></span>
                        </div>



                        <div class="col-sm-12 marginT30" style="padding-top: 20px; padding-bottom: 20px;">
                            <button type="submit" class="btn btn-primary icon-btn" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Preview</button>&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-default icon-btn" href="{{url('/admin/service-faq')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                        </div>

                    </div>
                </div>
            </div>
			</div>
        </form>

    </section>
</section>
</div>
<script>
    CKEDITOR.replace('textArea');
    function servicecategory() {
        var servicecat = $("#servicecat").val();
        var token = $("#token").val();
        //   alert(servicecat);
        //   return false;
        $.ajax({
            type: "post",
            // cache: false,
            // async: false,
            url: "{{url('/admin/service-change-list')}}",
            data: {
                'servicecat': servicecat,
                '_token': token
            },
            success: function(result) {
                $("#service").html(result);
            },
            complete: function() {},
        });
    }
</script>

@endsection
