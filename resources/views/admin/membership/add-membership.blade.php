@extends('admin.master')
@section('content')
@php
$primeid = session('primeid');
@endphp
<div id="main">
<section id="main-content">
    <section class="wrapper">
			 <!-- <div class="content-wrapper-before  gradient-45deg-indigo-purple "> </div>
	<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
<div class="container">
  <div class="row">
    <div class="col s10 m6 l6">
      <h5 class="breadcrumbs-title mt-0 mb-0"><span>About Clinic</span></h5>
      <ol class="breadcrumbs mb-0">
        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Home</a>
        </li>
        <li class="breadcrumb-item"><a href="{{url('/admin/membership')}}">Membership List</a>
        </li>
        <li class="breadcrumb-item active">Add Membership Image</li>
      </ol>
    </div>
  </div>
</div>
</div> -->
	
		<!-- <div class="container">
<div class="card">
        <div class="card-content textalign">
  <a class="waves-effect waves-light btn mr-1" href="http://192.168.0.91:8000/add-site">Add Site</a>
  </div>
</div>
</div> -->
	
	
	
	
        <div class="card cardsec">
            <div class="card-body">
                <div class="page-title pagetitle">
                    <h1>Add Membership Image</h1>
                    <ul class="breadcrumb side">
                        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
                        <li><a href="{{url('/admin/membership')}}">Membership List</a></li>
                        <li class="active">Add Membership Image</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card">
                <div class="card-body">
        <!-- Start form here -->
        <form action="{{URL::to('/admin/create_membership')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <input type="hidden" value="{{ csrf_token() }}" name="_token">
            <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
            <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
            <input type="hidden" name="created_by" value="{{session('useradmin')['usr_id']}}">
            <input type="hidden" name="mem_id" id="mem_id" value="@if(isset($primeid)){{$primeid}}@else 0 @endif">
            <div class="row">
                <div class="form-group  col-md-4">
                    @if(isset($view->image))
                            @if($view->image!='')
                            <img src="{{url('/'.session('useradmin')['site_url'].'backend/membership/'.$view->image)}}" style="width: 85px;height: 85px;"><br>
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                            @endif
                            <div class="form-group">
                                <label class="control-label">Image</label>
                                <input class="form-control" name="image" type="file">
                                <input class="form-control" name="oldimage" value="@if(isset($view->image)){{$view->image}}@endif" type="hidden">
                            </div>
                </div>

                <div class="form-group col-md-4">
                @if(isset($view->full_image))
                            @if($view->full_image!='')
                            <img src="{{url('/'.session('useradmin')['site_url'].'backend/membership/'.$view->full_image)}}" style="width: 85px;height: 85px;"><br>
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                            @endif
                            <div class="form-group">
                                <label class="control-label">Image</label>
                                <input class="form-control" name="full_image" type="file">
                                <input class="form-control" name="oldfull_image" value="@if(isset($view->full_image)){{$view->full_image}}@endif" type="hidden">
                            </div>
                   
                </div>

                <div class="form-group  col-md-4">
                    <label class="control-label">Image Alt Tag</label>
                    <input class="form-control" name="alt_tag" value="@if(isset($view->alt_tag)) {{$view->alt_tag}} @endif" type="text">
                </div>
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary icon-btn marginT38" type="button">
                        <i class="fa fa-fw fa-lg fa-check-circle"></i>Submit
                    </button>
                </div>
            </div>
        </form>
        <!-- End form -->
                </div>
        </div>
    </section>
</section>
</div>
<script>
    CKEDITOR.replace('textArea');
</script>
@endsection