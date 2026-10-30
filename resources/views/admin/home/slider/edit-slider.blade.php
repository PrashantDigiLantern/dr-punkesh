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
      <h5 class="breadcrumbs-title mt-0 mb-0"><span>Edit Site</span></h5>
      <ol class="breadcrumbs mb-0">
        <li class="breadcrumb-item"><a href="{{url('/admin/slider')}}">Slider</a>
        </li>
        <li class="breadcrumb-item"><a href="{{url('/admin/slider')}}">Slider List</a>
        </li>
        <li class="breadcrumb-item active">Edit Slider</li>
      </ol>
    </div>
  </div>
</div>
</div>
<div class="container">
    <div class="row">
	 <div class="col-md-12  s2 m6 l6">

<div class="section">
    <div class="card">
        <div class="card-content">
        <a class="waves-effect waves-light btn mr-1 fl-ri" href="{{url('/admin/slider')}}">Back</a>
        </div>
    </div>
</div>
        </div>
    </div>
</div>
			
			
			
     <!-- <div class="page-title pagetitle">
                    <h1>Edit Slider</h1>
                    <ul class="breadcrumb side">
                        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
                        <li><a href="{{url('/admin/slider')}}">Slider</a></li>
                        <li><a href="{{url('/admin/slider')}}">Slider List</a></li>
                        <li class="active">Edit Slider</li>
                    </ul>
                </div>-->
     
        <form action="{{URL::to('/admin/create_slider')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
        <div class="container">
            <div class="card">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
                <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
                <input type="hidden" name="updated_by" value="{{session('useradmin')['usr_id']}}">
                <input type="hidden" name="slider_id" id="slider_id" value="@if(isset($primeid)){{$primeid}}@else 0 @endif">
                <div class="card-body">
				<div class="container">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group col-md-6 col s6">
                                <label>Slider Name</label>
                                <input class="form-control" value="{{$edit->name}}" name="name" type="text">
                            </div>
                            <div class="form-group col-md-6 col s6">
                                <label>Image Alt Tag</label>
                                <input class="form-control" value="{{$edit->alt_tag}}" name="alt_tag" type="text">
                            </div>

                            <div class="form-group col-md-6 col s6">
                      <label class="control-label">Select Button Type</label> 
                      <select class="form-control" id="button_type" name="button_type" onchange="buttontype()">
                        <option value="">Select Button Type</option>
                        <option value="Yes" @if(isset($edit->button_type))@if($edit->button_type=='Yes') selected @endif @endif>Yes</option>
                        <option value="No" @if(isset($edit->button_type))@if($edit->button_type=='No') selected @endif @else selected @endif>No</option>
                      </select>
                      </div>
                      <?php 
                        $buttontype = '';
                      if(isset($edit->button_type)){
                        $buttontype = $edit->button_type;
                      }?>
                      @if($buttontype=='Yes')
                            <div class="showtype">
                                <div class="form-group col-md-6 col s6">
                                    <label class="control-label">Button Name</label>
                                    <input class="form-control" name="button_name" value="{{$edit->button_name}}" type="text">
                                </div>
                                <div class="form-group col-md-6 col s6">
                                    <label class="control-label">Button Url</label>
                                    <input class="form-control" name="button_url" value="{{$edit->button_url}}" type="text">
                                </div>
                                <div class="form-group col-md-6 col s6">
                                    <label class="control-label">Button Style</label>
                                    <textarea class="form-control" name="button_style">{{$edit->button_style}}</textarea>
                                </div>
                            </div>
                            @else
                            <div class="showtype" style="display: none;">
                                <div class="form-group col-md-6 col s6">
                                    <label class="control-label">Button Name</label>
                                    <input class="form-control" name="button_name" type="text">
                                </div>
                                <div class="form-group col-md-6 col s6">
                                    <label class="control-label">Button Url</label>
                                    <input class="form-control" name="button_url" type="text">
                                </div>
                                <div class="form-group col-md-6 col s6">
                                    <label class="control-label">Button Style</label>
                                    <textarea class="form-control" name="button_style"></textarea>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="col-sm-4 col s4">
                            <div class="form-group col-sm-12">
                                @if($edit->image!='')
                                <img src="{{url('/'.session('useradmin')['site_url'].'backend/slider/'.$edit->image)}}" style="width: 85px;height: 85px;"><br>

                                @else
                                <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">

                                @endif
                                <label class="control-label">Slider Image</label>
                                <input class="form-control" name="image" type="file">
                                <input class="form-control" name="oldimage" value="{{$edit->image}}" type="hidden">
                            </div>

                        </div>
                    </div>
					
                    <div class="row">

                    <div class="form-group col-sm-12">
                        <label>Description</label>
                        <textarea class="form-control ckeditor" id="editor" name="description" rows="3">@if(isset($edit->description)){{$edit->description}}@endif</textarea>
                    </div>

                        <div class="col-sm-12 marginT30" style="padding-top: 20px; padding-bottom: 20px;">
                            <button type="submit" class="btn btn-primary icon-btn" onclick="validatesec()"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-default icon-btn" href="{{url('/admin/slider')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                        </div>

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