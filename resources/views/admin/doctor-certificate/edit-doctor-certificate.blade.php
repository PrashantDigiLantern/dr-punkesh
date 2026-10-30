@extends('admin.master')
@section('content')
@php
$primeid = session('primeid');
@endphp
<div id="main">
<section id="main-content">
    <section class="wrapper">
	
				 <div class="content-wrapper-before  gradient-45deg-indigo-purple "> </div>
	<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
<div class="container">
  <div class="row">
    <div class="col s10 m6 l6">
      <h5 class="breadcrumbs-title mt-0 mb-0"><span>Edit Doctor Certificate Image</span></h5>
      <ol class="breadcrumbs mb-0">
        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Home</a>
        </li>
        <li class="breadcrumb-item"><a href="{{url('/admin/doctor-certificate')}}">Doctor Certificate List</a>
        </li>
	
        <li class="breadcrumb-item active">Edit Doctor Certificate Image</li>
      </ol>
    </div>
  </div>
</div>
</div>
	
		<div class="container">
<div class="card">
        <div class="card-content textalign">
  <a class="waves-effect waves-light btn mr-1" href="http://192.168.0.91:8000/add-site">Add Site</a>
  </div>
</div>
</div>
	
	
	
	
	
	
        <!--<div class="card cardsec">
            <div class="card-body">
                <div class="page-title pagetitle">
                    <h1>Edit Doctor Certificate Image</h1>
                    <ul class="breadcrumb side">
                        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
                        <li><a href="{{url('/admin/doctor-certificate')}}">Doctor Certificate List</a></li>
                        <li class="active">Edit Doctor Certificate Image</li>
                    </ul>
                </div>
            </div>
        </div>-->
        <form action="{{URL::to('/admin/create_doctor_certificate')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <div class="card">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
                <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
                <input type="hidden" name="updated_by" value="{{session('useradmin')['usr_id']}}">
                <input type="hidden" name="certificate_id" id="certificate_id" value="@if(isset($primeid)){{$primeid}}@else 0 @endif">
                <div class="card-body">
				<div class="container">
                    <div class="row">
                    <div class="form-group col-md-4 col s4">
                            <label class="control-label">Show Type</label>
                            <select class="form-control" name="certificate_show_type" required>
                                <option value="">Select Type</option>
                                <option value="inside" @if(isset($edit->certificate_show_type))@if($edit->certificate_show_type=='inside') selected @endif @endif>Inside</option>
                                <option value="outside" @if(isset($edit->certificate_show_type))@if($edit->certificate_show_type=='outside') selected @endif @endif>Outside</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4 col s4">
                            <label class="control-label">Doctor List</label>
                            <select class="form-control" name="doctor_id" required>
                                <option value="">Select Doctor List</option>
                                @foreach($doctorlist as $doctorlistsec)
                                <option value="{{ $doctorlistsec->doc_id }}" @if(isset($edit->doctor_id))@if($edit->doctor_id==$doctorlistsec->doc_id) selected @endif @endif>{{$doctorlistsec->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    <div class="form-group  col-md-4 col s4">
                    @if(isset($edit->certificate_image))
                            @if($edit->certificate_image!='')
                            <img src="{{url('/'.session('useradmin')['site_url'].'backend/certificate/'.$edit->certificate_image)}}" style="width: 85px;height: 85px;"><br>
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                            @endif
                            <div class="form-group">
                                <label class="control-label">Image</label>
                                <input class="form-control" name="certificate_image" type="file">
                                <input class="form-control" name="oldcertificate_image" value="@if(isset($edit->certificate_image)){{$edit->certificate_image}}@endif" type="hidden">
                            </div>
                </div>

                <div class="form-group  col-md-4 col s4">
                @if(isset($edit->full_image))
                            @if($edit->full_image!='')
                            <img src="{{url('/'.session('useradmin')['site_url'].'backend/certificate/'.$edit->full_image)}}" style="width: 85px;height: 85px;"><br>
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                            @endif
                            <div class="form-group">
                                <label class="control-label">Image</label>
                                <input class="form-control" name="full_image" type="file">
                                <input class="form-control" name="oldfull_image" value="@if(isset($edit->full_image)){{$edit->full_image}}@endif" type="hidden">
                            </div>
                    <!-- <label class="control-label">certificate Full Image</label>
                    <input class="form-control" name="full_image" type="file" required> -->
                </div>

                <div class="form-group  col-md-4 col s4">
                    <label class="control-label">Image Alt Tag</label>
                    <input class="form-control" name="alt_tag" value="@if(isset($edit->alt_tag)) {{$edit->alt_tag}} @endif" type="text">
                </div>
                        <div class="col-sm-12 col s12" style="padding-top: 20px; padding-bottom: 20px;">
                            <button type="submit" class="btn btn-primary icon-btn marginT38" type="button">
                                <i class="fa fa-fw fa-lg fa-check-circle"></i>Preview
                            </button>
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
</script>

@endsection