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
      <h5 class="breadcrumbs-title mt-0 mb-0"><span>Add Service FAQ</span></h5>
      <ol class="breadcrumbs mb-0">
        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Home</a>
        </li>
		  <li class="breadcrumb-item"><a href="{{url('/admin/service-faq')}}"> Services FAQ </a>
        </li>
		   <li class="breadcrumb-item"><a href="{{url('/admin/service-faq')}}">List Services FAQ</a>
        </li>
        <li class="breadcrumb-item active">Add Service FAQ</li>
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
                    <h1>Add Service FAQ</h1>
                    <ul class="breadcrumb side">
                        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
                        <li><a href="{{url('/admin/service-faq')}}">Services FAQ</a></li>
                        <li><a href="{{url('/admin/service-faq')}}">List Services FAQ</a></li>
                        <li class="active">Add Service FAQ</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Start form here -->
        <form action="{{URL::to('/admin/create_service_faq')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
            <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
            <input type="hidden" name="created_by" value="{{session('useradmin')['usr_id']}}">
            <input type="hidden" name="service_type" value="treatments">
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            <input type="hidden" name="ser_faq_id" id="ser_faq_id" value="@if(isset($primeid)){{$primeid}}@else 0 @endif">
            <div class="container1">
			<div class="card">
                <div class="card-body">
                    <div class="row">
                    @if(in_array('16',$permissionoprid))
                        <div class="form-group col-md-4 col s4">
                            <label class="control-label">Service Category</label>
                            <select class="form-control" name="service_cat" id="servicecategory" onchange="ServiceCategory()" required>
                                <option value="">Select Category</option>
                                 @foreach($firstcategory as $firstcategorylist)
                                <option value="@if(isset($firstcategorylist->ser_id)){{$firstcategorylist->ser_id}}@endif" @if(isset($view->ser_id))@if($firstcategorylist->ser_id == $secondsec['firstser_id']) selected @endif @endif>{{$firstcategorylist->service_name}}</option>
                                @endforeach
                               
                            </select>
                        </div>
                        @if(in_array('36',$permissionoprid))
                    <div class="form-group col-md-4 col s4">
                            <label class="control-label">Second Category</label>
                            <select class="form-control" name="second_cat" id="secondcategory" onchange="SecondCategory()" required>
                                <option value="">Select Category</option>
                                @if(isset($secondsec['secservice_name']))
                                <option value="{{$secondsec['secser_id']}}" selected>{{$secondsec['secservice_name']}}</option>
                                @endif
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
                                <option value="">Select Category</option>
                                @if(isset($service->ser_id))
                                <option value="{{$service->ser_id}}" selected>{{$service->service_name}}</option>
                                @endif
                            </select>
                        </div>
                       
                        <div class="form-group col-md-12 col s12">
                            <label class="control-label">Description</label>
                            <textarea class="form-control ckeditor" name="description" rows="3">@if(isset($view->description)) {{$view->description}} @endif</textarea>
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group col-md-12 col s12">
                            <label class="control-label">Question</label>
                            <textarea class="form-control ckeditor" name="question" rows="3">@if(isset($view->question)) {{$view->question}} @endif</textarea>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group col-md-12 col s12">
                            <label class="control-label">Answer</label>
                            <textarea class="form-control ckeditor" name="answer" rows="3">@if(isset($view->answer)) {{$view->answer}} @endif</textarea>
                            <span class="help-block"></span>
                        </div>

                        <div class="col-sm-12 col s12 marginT30" style="padding-top: 20px; padding-bottom: 20px;">
                            <button type="submit" class="btn btn-primary icon-btn" onclick="validatesec()">
                                <i class="fa fa-fw fa-lg fa-check-circle"></i>Preview
                            </button>&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-default icon-btn" href="{{url('/admin/service-faq')}}">
                                <i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </div>
			</div>
        </form>
        <!-- End form -->
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