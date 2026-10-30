@extends('admin.master')
@section('content')
@php 
$primeid = session('primeid');
@endphp
<div id="main">
<section id="main-content">
    <section class="wrapper">
	
	<div class="card cardsec">
            <div class="card-body">
                <div class="page-title pagetitle">
                    <h1>Edit Seo Page</h1>
                    <ul class="breadcrumb side">
                        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
                        <li><a href="{{url('/admin/seo')}}">Seo Page List</a></li>
                        <li class="active">Edit Seo Page</li>
                    </ul>
                </div>
            </div>
        </div>
        <form action="{{URL::to('/admin/create_seo')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            	<div class="container">
			<div class="card">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
                <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
                <input type="hidden" name="updated_by" value="{{session('useradmin')['usr_id']}}">
                <input type="hidden" name="seo_id" id="seo_id" value="@if(isset($primeid)){{$primeid}}@else 0 @endif">
                
				<div class="card-body">
			
                    <div class="row">
                        <div class="form-group col-sm-4 col s4">
                            <label>Seo Page Name</label>
                            <input class="form-control" value="{{$edit->page_name}}" name="page_name" type="text">
                        </div>

                        @if($edit->seo_type == 'home' || $edit->seo_type == 'aboutclinic' || $edit->seo_type == 'doctor'|| $edit->seo_type == 'servicefirst' || $edit->seo_type == 'gallery' || $edit->seo_type == 'videofirst'
                        || $edit->seo_type == 'resultfirst' || $edit->seo_type == 'writtentestimonials' || $edit->seo_type == 'blogs' || $edit->seo_type == 'contactus' || $edit->seo_type == 'appointment')
                        <div class="form-group col-md-4">
                        <label class="control-label">Seo Page Name</label>
                        <select class="form-control" name="seo_type">
                            <option value="">Select Page Type</option>
                            <option value="home" @if(isset($edit->seo_type)) @if($edit->seo_type == 'home')selected @endif @endif>Home</option>
                            <option value="aboutclinic" @if(isset($edit->seo_type)) @if($edit->seo_type == 'aboutclinic')selected @endif @endif>About Clinic</option>
                            <option value="doctor" @if(isset($edit->seo_type)) @if($edit->seo_type == 'doctor')selected @endif @endif>Doctor</option>
                            <option value="servicefirst" @if(isset($edit->seo_type)) @if($edit->seo_type == 'servicefirst')selected @endif @endif>Service</option>
                            <option value="gallery" @if(isset($edit->seo_type)) @if($edit->seo_type == 'gallery')selected @endif @endif>Gallery</option>
                            <option value="videofirst" @if(isset($edit->seo_type)) @if($edit->seo_type == 'videofirst')selected @endif @endif>Video</option>
                            <option value="resultfirst" @if(isset($edit->seo_type)) @if($edit->seo_type == 'resultfirst')selected @endif @endif>Real Results</option>
                            <option value="writtentestimonials" @if(isset($edit->seo_type)) @if($edit->seo_type == 'writtentestimonials')selected @endif @endif>Testimonials</option>
                            <option value="blogs" @if(isset($edit->seo_type)) @if($edit->seo_type == 'blogs')selected @endif @endif>blogs</option>
                            <option value="contactus" @if(isset($edit->seo_type)) @if($edit->seo_type == 'contactus')selected @endif @endif>Contact Us</option>
                            <option value="appointment" @if(isset($edit->seo_type)) @if($edit->seo_type == 'appointment')selected @endif @endif>Book an Appointment</option>
                        </select>
                        </div>
                        @else 
                    <input type="hidden" value="@if(isset($edit->seo_type)){{$edit->seo_type}}@endif" name="seo_type">
                        @endif


                        <div class="form-group col-sm-4 col s4">
                            <label>Title Tags</label>
                            <input class="form-control" value="{{$edit->title_tag}}" name="title_tag" type="text" service>
                        </div>

                        <div class="form-group col-sm-4 col s4">
                            <label>Keyword Tag</label>
                            <input class="form-control" value="{{$edit->keyword_tag}}" name="keyword_tag" type="text">
                        </div>

                        <div class="form-group col-sm-4 col s4">
                            <label>Description Tag</label>
                            <input class="form-control" value="{{$edit->description_tag}}" name="description_tag" type="text">
                        </div>

                        <div class="form-group col-sm-4 col s4">
                            <label>Canonical</label>
                            <input class="form-control" value="{{$edit->canonical_tag}}" type="text" name="canonical_tag">
                        </div>

                        <div class="form-group col-md-4 col s4">
                            @if(isset($edit->image))
                            @if($edit->image!=NULL)
                            <img src="{{url('/'.session('useradmin')['site_url'].'backend/seo/'.$edit->image)}}" style="width: 85px;height: 85px;"><br>
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

            <div class="form-group col-sm-4 col s4">
              <label class="control-label">Type</label>
              <input class="form-control" name="type" value="@if(isset($edit->type)) {{$edit->type}} @endif" type="text">
            </div>

            <div class="form-group col-sm-4 col s4">
              <label class="control-label">Site Name</label>
              <input class="form-control" name="site_name" value="@if(isset($edit->site_name)) {{$edit->site_name}} @endif" type="text">
            </div>

                        <div class="form-group col-sm-4 col s4">
                            <label>Url</label>
                            <input class="form-control" value="{{$edit->url}}" type="text" name="url">
                        </div>

                        <div class="col-sm-12 marginT30 col s12" style="padding-top: 20px; padding-bottom: 20px;">
                            <button type="submit" class="btn btn-primary icon-btn" onclick="validatesec()"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-default icon-btn" href="{{url('/admin/seo')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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