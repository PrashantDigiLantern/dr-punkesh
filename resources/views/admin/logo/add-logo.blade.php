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
                    <h1>Add Logo</h1>
                    <ul class="breadcrumb side">
                        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
                        <li><a href="{{url('/admin/logo-list')}}">Logo List</a></li>
                        <li class="active">Add Logo</li>
                    </ul>
                </div>
            </div>
        </div>
		<div class="container1">
        <div class="card">
                <div class="card-body">
        <!-- Start form here -->
        <form action="{{URL::to('/admin/create_logo')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <input type="hidden" value="{{ csrf_token() }}" name="_token">
            <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
            <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
            <input type="hidden" name="created_by" value="{{session('useradmin')['usr_id']}}">
            <input type="hidden" name="footer_type" value="leftside">
            <input type="hidden" name="footer_id" id="footer_id" value="@if(isset($primeid)){{$primeid}}@else 0 @endif">
			<div class="container">
            <div class="row">
          
                <div class="form-group  col-md-4 col s4">
                    @if(isset($view->footer_logo))
                            @if($view->footer_logo!='')
                            <img src="{{url('/'.session('useradmin')['site_url'].'backend/logo/'.$view->footer_logo)}}" style="width: 85px;height: 85px;"><br>
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                            @endif
                            <div class="form-group">
                                <label class="control-label">Footer Logo</label>
                                <input class="form-control" name="footer_logo" type="file">
                                <input class="form-control" name="oldfooter_logo" value="@if(isset($view->footer_logo)){{$view->footer_logo}}@endif" type="hidden">
                            </div>
                </div>

                <div class="form-group  col-md-4 col s4">
                @if(isset($view->header_logo))
                            @if($view->header_logo!='')
                            <img src="{{url('/'.session('useradmin')['site_url'].'backend/logo/'.$view->header_logo)}}" style="width: 85px;height: 85px;"><br>
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                            @endif
                            <div class="form-group">
                                <label class="control-label">Header Logo</label>
                                <input class="form-control" name="header_logo" type="file">
                                <input class="form-control" name="oldheader_logo" value="@if(isset($view->header_logo)){{$view->header_logo}}@endif" type="hidden">
                            </div>
                </div>

                <div class="form-group col-md-4 col s4">
                @if(isset($view->header_logo2))
                            @if($view->header_logo2!='')
                            <img src="{{url('/'.session('useradmin')['site_url'].'backend/logo/'.$view->header_logo2)}}" style="width: 85px;height: 85px;"><br>
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                            @endif
                            <div class="form-group">
                                <label class="control-label">Header Logo2</label>
                                <input class="form-control" name="header_logo2" type="file">
                                <input class="form-control" name="oldheader_logo2" value="@if(isset($view->header_logo2)){{$view->header_logo2}}@endif" type="hidden">
                            </div>
                </div>

                <div class="form-group  col-md-4 col s4">
                @if(isset($view->favicon))
                            @if($view->favicon!='')
                            <img src="{{url('/'.session('useradmin')['site_url'].'backend/logo/'.$view->favicon)}}" style="width: 85px;height: 85px;"><br>
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                            @endif
                            <div class="form-group">
                                <label class="control-label">Favicon</label>
                                <input class="form-control" name="favicon" type="file">
                                <input class="form-control" name="oldfavicon" value="@if(isset($view->favicon)){{$view->favicon}}@endif" type="hidden">
                            </div>
                </div>

                    <div class="form-group  col-md-12 col s12">
                            <label class="control-label">Footer Description</label>
                            <textarea class="form-control ckeditor" name="description" rows="3">@if(isset($view->description)) {{$view->description}} @endif</textarea>
                            <span class="help-block"></span>
                        </div>

                <div class="form-group  col-md-4 col s4">
                    <label class="control-label">Image Alt Tag</label>
                    <input class="form-control" name="alt_tag" value="@if(isset($view->alt_tag)) {{$view->alt_tag}} @endif" type="text">
                </div>
                <div class="col-sm-12 col s12" style="padding-top: 20px; padding-bottom: 20px;">
                    <button type="submit" class="btn btn-primary icon-btn marginT38" type="button">
                        <i class="fa fa-fw fa-lg fa-check-circle"></i>Preview
                    </button>
                </div>
            </div>
			</div>
        </form>
        <!-- End form -->
                </div>
        </div>
		 </div>
    </section>
</section>
</div>

<script>
    CKEDITOR.replace('textArea');
</script>
@endsection