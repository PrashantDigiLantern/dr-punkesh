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
          <h1>Add Seo Page</h1>
          <ul class="breadcrumb side">
            <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
            <li><a href="{{url('/admin/seo')}}">Seo Page List</a></li>
            <li class="active">Add Seo Page</li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Start form here -->
    <form action="{{URL::to('/admin/create_seo')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
      <input type="hidden" value="{{ csrf_token() }}" name="_token">
      <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
      <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
      <input type="hidden" name="created_by" value="{{session('useradmin')['usr_id']}}">
      <input type="hidden" name="seo_id" id="seo_id" value="@if(isset($primeid)){{$primeid}}@else 0 @endif">
      <!-- @csrf -->
      <div class="card">
        <div class="card-body">
		<div class="container">
          <div class="row">
            <div class="form-group col-md-4 col s4">
              <label class="control-label">Seo Page Name</label>
              <input class="form-control" name="page_name" value="@if(isset($view->page_name)) {{$view->page_name}} @endif" type="text" required>
            </div>

            <div class="form-group col-md-4">
              <label class="control-label">Seo Page Name</label>
              <select class="form-control" name="seo_type">
                  <option value="">Select Page Type</option>
                  <option value="home" @if(isset($view->seo_type)) @if($view->seo_type == 'home')selected @endif @endif>Home</option>
                  <option value="aboutclinic" @if(isset($view->seo_type)) @if($view->seo_type == 'aboutclinic')selected @endif @endif>About Clinic</option>
                  <option value="doctor" @if(isset($view->seo_type)) @if($view->seo_type == 'doctor')selected @endif @endif>Doctor</option>
                  <option value="servicefirst" @if(isset($view->seo_type)) @if($view->seo_type == 'servicefirst')selected @endif @endif>Service</option>
                  <option value="gallery" @if(isset($view->seo_type)) @if($view->seo_type == 'gallery')selected @endif @endif>Gallery</option>
                  <option value="videofirst" @if(isset($view->seo_type)) @if($view->seo_type == 'videofirst')selected @endif @endif>Video</option>
                  <option value="resultfirst" @if(isset($view->seo_type)) @if($view->seo_type == 'resultfirst')selected @endif @endif>Real Results</option>
                  <option value="writtentestimonials" @if(isset($view->seo_type)) @if($view->seo_type == 'writtentestimonials')selected @endif @endif>Testimonials</option>
                  <option value="blogs" @if(isset($view->seo_type)) @if($view->seo_type == 'blogs')selected @endif @endif>blogs</option>
                  <option value="contactus" @if(isset($view->seo_type)) @if($view->seo_type == 'contactus')selected @endif @endif>Contact Us</option>
                  <option value="appointment" @if(isset($view->seo_type)) @if($view->seo_type == 'appointment')selected @endif @endif>Book an Appointment</option>
              </select>
            </div>

            <div class="form-group col-sm-4 col s4">
              <label>Title Tags</label>
              <input class="form-control" name="title_tag" value="@if(isset($view->title_tag)) {{$view->title_tag}} @endif" type="text">
            </div>

            <div class="form-group col-sm-4 col s4">
              <label>Keyword Tag</label>
              <input class="form-control" name="keyword_tag" value="@if(isset($view->keyword_tag)) {{$view->keyword_tag}} @endif" type="text">
            </div>

            <div class="form-group col-sm-4 col s4">
              <label>Description Tag</label>
              <input class="form-control" name="description_tag" value="@if(isset($view->description_tag)) {{$view->description_tag}} @endif" type="text">
            </div>

            <div class="form-group col-sm-4 col s4">
              <label class="control-label">Canonical</label>
              <input class="form-control" name="canonical_tag" value="@if(isset($view->canonical_tag)) {{$view->canonical_tag}} @endif" type="text">
            </div>

            <!-- <div class="form-group col-sm-4">
              <label class="control-label">Image</label>
              <input class="form-control" name="image" value="@if(isset($view->image)) {{$view->image}} @endif" type="text">
            </div> -->

            <div class="form-group col-md-4 col s4">
                            @if(isset($view->image))
                            @if($view->image!=NULL)
                            <img src="{{url('/'.session('useradmin')['site_url'].'backend/seo/'.$view->image)}}" style="width: 85px;height: 85px;"><br>
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

            <div class="form-group col-sm-4 col s4">
              <label class="control-label">Type</label>
              <input class="form-control" name="type" value="@if(isset($view->type)) {{$view->type}} @endif" type="text">
            </div>

            <div class="form-group col-sm-4 col s4">
              <label class="control-label">Site Name</label>
              <input class="form-control" name="site_name" value="@if(isset($view->site_name)) {{$view->site_name}} @endif" type="text">
            </div>

            <div class="form-group col-sm-4 col s4">
              <label class="control-label">Url</label>
              <input class="form-control" name="url" value="@if(isset($view->url)) {{$view->url}} @endif" type="text">
            </div>

            <div class="col-sm-12 marginT30 col s12" style="padding-top: 20px; padding-bottom: 20px;">
              <button type="submit" class="btn btn-primary icon-btn" onclick="validatesec()">
                <i class="fa fa-fw fa-lg fa-check-circle"></i>Submit
              </button>&nbsp;&nbsp;&nbsp;
              <a class="btn btn-default icon-btn" href="{{url('/admin/seo')}}">
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
</script>
@endsection