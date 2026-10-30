@extends('admin.master')
@section('content')
@php 
$primeid = session('primeid');
@endphp
<section id="main-content">
    <section class="wrapper">
        <div class="card cardsec">
            <div class="card-body">
                <div class="page-title pagetitle">
                    <h1>Edit Testimonials</h1>
                    <ul class="breadcrumb side">
                        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
                        <li><a href="{{url('/admin/testimonials')}}">Testimonials</a></li>
                        <li><a href="{{url('/admin/testimonials')}}">Testimonials List</a></li>
                        <li class="active">Edit Testimonials</li>
                    </ul>
                </div>
            </div>
        </div>
        <form action="{{URL::to('/admin/create_testimonials')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <div class="card">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
                <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
                <input type="hidden" name="updated_by" value="{{session('useradmin')['usr_id']}}">
                <input type="hidden" name="test_id" id="test_id" value="@if(isset($primeid)){{$primeid}}@else 0 @endif">
                <div class="card-body">
                    <div class="row">
                    <div class="form-group col-md-4">
                            <label class="control-label">Show Type</label>
                            <select class="form-control" name="test_show_type" required>
                                <option value="">Select Type</option>
                                <option value="inside" @if(isset($edit->test_show_type))@if($edit->test_show_type=='inside') selected @endif @else selected @endif>Inside</option>
                                <option value="outside" @if(isset($edit->test_show_type))@if($edit->test_show_type=='outside') selected @endif @endif>Outside</option>
                            </select>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group col-sm-6 paddingL0">
                                <label>Name</label>
                                <input class="form-control" value="{{$edit->name}}" name="name" type="text" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Designation</label>
                                <input class="form-control" value="{{$edit->designation}}" name="designation" type="text">
                            </div>

                            <div class="form-group col-sm-6 paddingL0">
                                <label>Short Name</label>
                                <input class="form-control" value="{{$edit->short_name}}" name="short_name" type="text">
                            </div>
                            <!-- <div class="form-group col-sm-6 paddingL0">
                    <label>Image Alt Tag</label>              
                    <input class="form-control" value="{{$edit->alt_image_name}}" name="alt_tag" type="text"  >
                </div> -->

                            <!-- <div class="col-sm-4">
                <div class="form-group">
                @if($edit->testimonial_image!='')
                    <img src="{{url('/'.session('useradmin')['site_url'].'backend/testimonial/'.$edit->testimonial_image)}}" style="width: 85px;height: 85px;"><br>
                 
                 @else
                    <img src="{{url('/images/no_image.jpg')}}" style="width:70px;height:70px;">
                 
                 @endif
                    <label class="control-label">Image</label>
                    <input class="form-control" name="testimonial_img" type="file" >
                    <input class="form-control" name="oldtestimonial_img" value="{{$edit->testimonial_image}}" type="hidden" >
                </div>

                
                </div> -->
                        </div>
                        <div class="row">



                            <div class="form-group col-sm-12">
                                <label>Description</label>
                                <textarea class="form-control" id="textArea" name="description" rows="3" required>{{$edit->description}}</textarea>
                                <span class="help-block"></span>
                            </div>

                            <div class="form-group col-sm-4">
                                <label>Source</label>
                                <select class="form-control" name="source">
                                    <option value="">Select Source</option>
                                    <option value="practo" @if(isset($edit->source))@if($edit->source=='practo') selected @endif @endif>Practo</option>
                                    <option value="google" @if(isset($edit->source))@if($edit->source=='google') selected @endif @endif>Google</option>
                                    <option value="lybrate" @if(isset($edit->source))@if($edit->source=='lybrate') selected @endif @endif>Lybrate</option>
                                    <option value="justdial" @if(isset($edit->source))@if($edit->source=='justdial') selected @endif @endif>Justdial</option>
                                    <option value="realself" @if(isset($edit->source))@if($edit->source=='realself') selected @endif @endif>Real Self</option>
                                </select>
                            </div>

                            <div class="form-group col-sm-4">
                                <label>Rating</label>
                                <input class="form-control" value="{{$edit->rating}}" name="rating" type="text" required>
                            </div>

                            <!--<div class="form-group col-sm-4">
                    <label>Opinions</label>              
                    <input class="form-control" value="{{$edit->opinions}}" name="opinions" type="text" required>
                </div>
                    
                    <div class="form-group col-sm-4">
                    <label>Title Tags</label>              
                    <input class="form-control" value="{{$edit->title_tag}}" name="title_tag" type="text">
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
                    <label class="control-label">Url</label>              
                    <input class="form-control" value="{{$edit->url}}" name="url" type="text">
                    </div>-->

                            <div class="col-sm-12 marginT30">
                                <!-- <button type="submit" class="btn btn-primary icon-btn" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>&nbsp;&nbsp;&nbsp; -->
                                <button id="myBtn" onclick="testimonial()" class="btn btn-primary icon-btn" type="submit">
                                <i class="fa fa-fw fa-lg fa-check-circle"></i>Preview
                            </button>
                                <a class="btn btn-default icon-btn" href="{{url('/admin/testimonials')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                            </div>

                        </div>
                    </div>
                </div>
        </form>

    </section>
</section>
<script>
    CKEDITOR.replace('textArea');
</script>

@endsection