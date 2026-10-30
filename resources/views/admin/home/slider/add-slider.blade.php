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
                    <h1>Add Slider</h1>
                    <ul class="breadcrumb side">
                        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
                        <li><a href="{{url('/admin/slider')}}">Slider</a></li>
                        <li><a href="{{url('/admin/slider')}}">Slider List</a></li>
                        <li class="active">Add Slider</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Start form here -->
        <form action="{{URL::to('/admin/create_slider')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <input type="hidden" value="{{ csrf_token() }}" name="_token">
            <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
            <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
            <input type="hidden" name="created_by" value="{{session('useradmin')['usr_id']}}">
            <input type="hidden" name="slider_id" id="slider_id" value="@if(isset($primeid)){{$primeid}}@else 0 @endif">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label">Slider Name</label>
                            <input class="form-control" name="name" value="@if(isset($view->name)) {{$view->name}} @endif" type="text">
                        </div>

                        <div class="form-group  col-md-4">
                        @if(isset($view->image))
                            @if($view->image!='')
                            <img src="{{url('/'.session('useradmin')['site_url'].'backend/slider/'.$view->image)}}" style="width: 85px;height: 85px;"><br>
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                            @endif
                            <!-- <label class="control-label">Slider Image</label> -->
                            <input class="form-control" name="image" type="file">
                            <input class="form-control" name="oldimage" value="@if(isset($view->image)){{$view->image}}@endif" type="hidden">
                        </div>

                        <div class="form-group  col-md-4">
                            <label class="control-label">Image Alt Tag</label>
                            <input class="form-control" name="alt_tag" value="@if(isset($view->name)) {{$view->name}} @endif" type="text">
                        </div>
                        <div class="form-group col-md-4">
                      <label class="control-label">Select Button Type</label> 
                      <select class="form-control" id="button_type" name="button_type" onchange="buttontype()">
                        <option value="">Select Button Type</option>
                        <option value="Yes" @if(isset($view->button_type))@if($view->button_type=='Yes') selected @endif @endif>Yes</option>
                        <option value="No" @if(isset($view->button_type))@if($view->button_type=='No') selected @endif @else selected @endif>No</option>
                      </select>
                      </div>
                      <?php 
                        $buttontype = '';
                      if(isset($view->button_type)){
                        $buttontype = $view->button_type;
                      }?>
                      @if($buttontype=='Yes')
                            <div class="showtype">
                                <div class="form-group col-md-4">
                                    <label class="control-label">Button Name</label>
                                    <input class="form-control" name="button_name" value="{{$view->button_name}}" type="text">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label">Button Url</label>
                                    <input class="form-control" name="button_url" value="{{$view->button_url}}" type="text">
                                </div>
                                <div class="form-group col-md-8">
                                    <label class="control-label">Button Style</label>
                                    <textarea class="form-control" name="button_style">{{$view->button_style}}</textarea>
                                </div>
                            </div>
                            @else
                            <div class="showtype" style="display: none;">
                                <div class="form-group col-md-4">
                                    <label class="control-label">Button Name</label>
                                    <input class="form-control" name="button_name" type="text">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label">Button Url</label>
                                    <input class="form-control" name="button_url" type="text">
                                </div>
                                <div class="form-group col-md-8">
                                    <label class="control-label">Button Style</label>
                                    <textarea class="form-control" name="button_style"></textarea>
                                </div>
                            </div>
                            @endif
                        <div class="form-group col-sm-12">
                            <label>Description</label>
                            <textarea class="form-control ckeditor" id="editor" name="description" rows="3">@if(isset($view->description)){{$view->description}}@endif</textarea>
                        </div>

                        <div class="col-sm-12 marginT30">
                            <button type="submit" class="btn btn-primary icon-btn" onclick="validatesec()">
                                <i class="fa fa-fw fa-lg fa-check-circle"></i>Submit
                            </button>&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-default icon-btn" href="{{url('/admin/slider')}}">
                                <i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- End form -->

    </section>
</section>

<script>
    CKEDITOR.replace('textArea');
   
    function buttontype() {
        var button_type = $('#button_type').val();
        // alert(button_type);
        if (button_type == 'Yes') {
            $('.showtype').show();
        } else if (button_type == 'No') {
            $('.showtype').hide();
        }
    }
</script>
@endsection