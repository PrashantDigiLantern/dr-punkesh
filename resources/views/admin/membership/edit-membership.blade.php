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
      <h5 class="breadcrumbs-title mt-0 mb-0"><span>Edit Membership Image</span></h5>
      <ol class="breadcrumbs mb-0">
        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Home</a>
        </li>
        <li class="breadcrumb-item"><a href="{{url('/admin/membership')}}">Membership List</a>
        </li>
        <li class="breadcrumb-item active">>Edit Membership Image</li>
      </ol>
    </div>
  </div>
</div>
</div> -->

	
		<!-- <div class="container">
<div class="card">
        <div class="card-content textalign">
     <div>
       <a class="waves-effect waves-light btn mr-1 fl-ri" href="{{url('/admin/membership')}}">Back</a>
      </div>
  </div>
</div>
</div>
	 -->
	
        <div class="card cardsec">
            <div class="card-body">
                <div class="page-title pagetitle">
                    <h1>Edit Membership Image</h1>
                    <ul class="breadcrumb side">
                        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
                        <li><a href="{{url('/admin/membership')}}">Membership List</a></li>
                        <li class="active">Edit Membership Image</li>
                    </ul>
                </div>
            </div>
        </div>
        <form action="{{URL::to('/admin/create_membership')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <div class="card">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
                <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
                <input type="hidden" name="updated_by" value="{{session('useradmin')['usr_id']}}">
                <input type="hidden" name="mem_id" id="mem_id" value="@if(isset($primeid)){{$primeid}}@else 0 @endif">
                <div class="card-body">
				<div class="container">
                    <div class="row">
                    <div class="form-group  col-md-4 col s4">
                    @if(isset($edit->image))
                            @if($edit->image!='')
                            <img src="{{url('/'.session('useradmin')['site_url'].'backend/membership/'.$edit->image)}}" style="width: 85px;height: 85px;"><br>
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                            @endif
                            <div class="form-group">
                                <label class="control-label">Image</label>
                                <input class="form-control" name="image" type="file">
                                <input class="form-control" name="oldimage" value="@if(isset($edit->image)){{$edit->image}}@endif" type="hidden">
                            </div>
                </div>

                <div class="form-group  col-md-4 col s4">
                @if(isset($edit->full_image))
                            @if($edit->full_image!='')
                            <img src="{{url('/'.session('useradmin')['site_url'].'backend/membership/'.$edit->full_image)}}" style="width: 85px;height: 85px;"><br>
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
                   
                </div>

                <div class="form-group  col-md-4 col s4">
                    <label class="control-label">Image Alt Tag</label>
                    <input class="form-control" name="alt_tag" value="@if(isset($edit->alt_tag)) {{$edit->alt_tag}} @endif" type="text">
                </div>
                        <div class="col-sm-12 col s12" style="padding-top: 20px; padding-bottom: 20px;">
                            <button type="submit" class="btn btn-primary icon-btn marginT38" type="button">
                                <i class="fa fa-fw fa-lg fa-check-circle"></i>Submit
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