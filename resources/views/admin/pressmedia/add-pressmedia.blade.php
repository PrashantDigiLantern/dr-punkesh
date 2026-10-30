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
                    <h1>Add Press & Media</h1>
                    <ul class="breadcrumb side">
                        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
                        <li><a href="{{url('/admin/pressmedia')}}">Press & Media</a></li>
                        <li><a href="{{url('/admin/pressmedia')}}">Press & Media List</a></li>
                        <li class="active">Add Press & Media</li>
                    </ul>
                </div>
            </div>                          
        </div>
        <!-- Start form here -->
        <form action="{{URL::to('/admin/create_pressmedia')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <input type="hidden" value="{{ csrf_token() }}" name="_token">
            <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
            <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
            <input type="hidden" name="created_by" value="{{session('useradmin')['usr_id']}}">
            <input type="text" name="press_id" id="press_id" value="@if(isset($primeid)){{$primeid}}@else 0 @endif">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label">Press & Media Category</label>
                            <select class="form-control" name="press_cat_id">
                                <option value="">Select Press & Media Category</option>
                                @foreach($presscat as $presslist)
                                <option value="{{$presslist->press_cat_id}}" @if(isset($view->press_cat_id))@if($view->press_cat_id==$presslist->press_cat_id) selected @endif @endif>{{$presslist->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Name</label>
                            <input class="form-control" name="name" value="@if(isset($view->name)){{$view->name}}@endif" type="text" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Dr Name</label>
                            <input class="form-control" name="dr_name" value="@if(isset($view->dr_name)){{$view->dr_name}}@endif" type="text">
                        </div>
                        <div class="form-group col-md-4">
                            <!-- <label class="control-label">Image</label>
                            <input class="form-control" name="image" value="@if(isset($view->image)){{$view->image}}@endif" type="file" required> -->
                            @if(isset($view->image))
                            @if($view->image!='')
                                <img src="{{url('/'.session('useradmin')['site_url'].'backend/pressmedia/image/'.$view->image)}}" style="width: 85px;height: 85px;"><br>
                                @else
                                <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                                @endif
                                @else
                                <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                                @endif
                                <div class="form-group">
                                    <label class="control-label">Image</label>
                                    <input class="form-control" name="image" type="file">
                                    <input class="form-control" name="oldimage" value="@if(isset($view->image)){{$view->image}}@endif" type="hidden">
                                </div>
                        </div>

                        <div class="form-group col-md-4">
                            @if(isset($view->banner_image))
                            @if($view->banner_image!='')
                                <img src="{{url('/'.session('useradmin')['site_url'].'backend/pressmedia/banner/'.$view->banner_image)}}" style="width: 85px;height: 85px;"><br>
                                @else
                                <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                                @endif
                                @else
                                <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                                @endif
                                <div class="form-group">
                                    <label class="control-label">Banner Image</label>
                                    <input class="form-control" name="banner_image" type="file">
                                    <input class="form-control" name="oldbannerimage" value="@if(isset($view->banner_image)){{$view->banner_image}}@endif" type="hidden">
                                </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label class="control-label">Image Alt Tag</label>
                            <input class="form-control" name="alt_tag" value="@if(isset($view->alt_tag)){{$view->alt_tag}}@endif" type="text">
                        </div>

                        <div class="form-group col-md-4">
                            <label class="control-label">Reference</label>
                            <input class="form-control" name="reference" value="@if(isset($view->reference)){{$view->reference}}@endif" type="text">
                        </div>
                        <!-- <div class="form-group col-md-12">
        				<label class="control-label">Dr. Description</label>              
                        <textarea class="form-control ckeditor" name="dr_description" rows="3"></textarea>
                        <span class="help-block"></span>
                        </div> -->

                        <div class="form-group col-md-12">
                            <label class="control-label">Short Description</label>
                            <textarea class="form-control ckeditor" name="short_desc" rows="3" required>@if(isset($view->short_desc)){{$view->short_desc}}@endif</textarea>
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group col-md-12">
                            <label class="control-label">Description</label>
                            <textarea class="form-control ckeditor" name="description" rows="3" required>@if(isset($view->description)){{$view->description}}@endif</textarea>
                            <span class="help-block"></span>
                        </div>
                    </div>
                    
                  
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label>Facebook</label>
                            <input class="form-control" name="facebook" value="@if(isset($view->facebook)){{$view->facebook}}@endif" type="text">
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Twitter</label>
                            <input class="form-control" name="twitter" value="@if(isset($view->twitter)){{$view->twitter}}@endif" type="text">
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Pinterest</label>
                            <input class="form-control" name="pinterest" value="@if(isset($view->pinterest)){{$view->pinterest}}@endif" type="text">
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Title Tag</label>
                            <input class="form-control" name="title_tag" value="@if(isset($view->title_tag)){{$view->title_tag}}@endif" type="text">
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Keyword Tag</label>
                            <input class="form-control" name="keyword_tag" value="@if(isset($view->keyword_tag)){{$view->keyword_tag}}@endif" type="text">
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Description Tag</label>
                            <input class="form-control" name="description_tag" value="@if(isset($view->description_tag)){{$view->description_tag}}@endif" type="text">
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Canonical</label>
                            <input class="form-control" name="canonical" value="@if(isset($view->canonical)){{$view->canonical}}@endif" type="text">
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Date</label>
                            <input class="form-control" name="date" value="@if(isset($view->date)){{$view->date}}@endif" type="date" required>
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Url</label>
                            <input class="form-control" name="url" value="@if(isset($view->url)){{$view->url}}@endif" type="text" required>
                        </div>

                        <div class="col-sm-12 marginT30">
                            <button type="submit" class="btn btn-primary icon-btn" onclick="validatesec()" type="button">
                                <i class="fa fa-fw fa-lg fa-check-circle"></i>Preview
                            </button>&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-default icon-btn" href="{{url('/admin/pressmedia')}}">
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

    function addpressmedia() {
        $.ajax({
            type: "post",
            cache: false,
            async: false,
            url: "{{url('/admin/addpressmedia')}}",
            data: {
                'post': 'ok'
            },
            success: function(result) {
                $("#addpressmedia").append(result);
            },
            complete: function() {},
        });
    }

    function removetype(rand) {
        $("#remove" + rand).remove();
    }

    function removeedulist(rand) {
        $("#pressMedia" + rand).remove();
    }
</script>
@endsection