@extends('admin.master')
@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="card cardsec">
            <div class="card-body">
                <div class="page-title pagetitle">
                    <h1>Before After Picture</h1>
                    <ul class="breadcrumb side">
                        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
                        <li><a href="{{url('/admin/homepicture')}}">Home</a></li>
                        <li class="active">Before After Picture</li>
                    </ul>
                </div>
            </div>
        </div>

        <form action="{{URL::to('/admin/create-picture')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">

            <div class="card">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
                <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
                <input value="@if(isset($edit->hom_pic_id)){{ $edit->hom_pic_id }}@else {{'0'}} @endif" name="hom_pic_id" type="hidden">
                <!-- <input type="hidden" name="created_by" value="{{session('useradmin')['usr_id']}}"> -->
                <div class="card-body">

                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label class="control-label">Descrition</label>
                            <textarea class="form-control ckeditor" name="description" rows="3">@if(isset($edit->description)){{$edit->description}}@endif</textarea>
                            <span class="help-block"></span>
                        </div>

                        <div class="col-sm-3">
                            @if(isset($edit->image1))
                            @if($edit->image1!='')
                            <img src="{{url('/images/before_after/'.$edit->image1)}}" style="width: 85px;height: 85px;"><br>
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif

                            <div class="form-group">
                                <label class="control-label">Image Image</label>
                                <input class="form-control" name="image1" type="file">
                                <input class="form-control" name="oldimage1" value="@if(isset($edit->image1)){{$edit->image1}}@endif" type="hidden">
                            </div>
                            <div class="form-group">
                                <label>Image1 Name</label>
                                <input class="form-control" value="@if(isset($edit->image1_name)){{$edit->image1_name}}@endif" name="image1_name" type="text">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            @if(isset($edit->image2))
                            @if($edit->image2!='')
                            <img src="{{url('/images/before_after/'.$edit->image2)}}" style="width: 85px;height: 85px;"><br>
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif

                            <div class="form-group">
                                <label class="control-label">Image Image</label>
                                <input class="form-control" name="image2" type="file">
                                <input class="form-control" name="oldimage2" value="@if(isset($edit->image2)){{$edit->image2}}@endif" type="hidden">
                            </div>
                            <div class="form-group">
                                <label>Image2 Name</label>
                                <input class="form-control" value="@if(isset($edit->image2_name)){{$edit->image2_name}}@endif" name="image2_name" type="text">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            @if(isset($edit->image3))
                            @if($edit->image3!='')
                            <img src="{{url('/images/before_after/'.$edit->image3)}}" style="width: 85px;height: 85px;"><br>
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif

                            <div class="form-group">
                                <label class="control-label">Image3</label>
                                <input class="form-control" name="image3" type="file">
                                <input class="form-control" name="oldimage3" value="@if(isset($edit->image3)){{$edit->image3}}@endif" type="hidden">
                            </div>
                            <div class="form-group">
                                <label>Image3 Name</label>
                                <input class="form-control" value="@if(isset($edit->image3_name)){{$edit->image3_name}}@endif" name="image3_name" type="text">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            @if(isset($edit->image4))
                            @if($edit->image4!='')
                            <img src="{{url('/images/before_after/'.$edit->image4)}}" style="width: 85px;height: 85px;"><br>
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif
                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                            @endif

                            <div class="form-group">
                                <label class="control-label">Image4</label>
                                <input class="form-control" name="image4" type="file">
                                <input class="form-control" name="oldimage4" value="@if(isset($edit->image4)){{$edit->image4}}@endif" type="hidden">
                            </div>
                            <div class="form-group">
                                <label>Image4 Name</label>
                                <input class="form-control" value="@if(isset($edit->image4_name)){{$edit->image4_name}}@endif" name="image4_name" type="text">
                            </div>
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Image Alt Tag</label>
                            <input class="form-control" value="@if(isset($edit->alt_tag)){{$edit->alt_tag}}@endif" name="alt_tag" type="text">
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Title Tags</label>
                            <input class="form-control" value="@if(isset($edit->title_tag)){{$edit->title_tag}}@endif" name="title_tag" type="text">
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Keyword Tag</label>
                            <input class="form-control" value="@if(isset($edit->keyword_tag)){{$edit->keyword_tag}}@endif" name="keyword_tag" type="text">
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Description Tag</label>
                            <input class="form-control" value="@if(isset($edit->description_tag)){{$edit->description_tag}}@endif" name="description_tag" type="text">
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Url</label>
                            <input class="form-control" value="@if(isset($edit->url)){{$edit->url}}@endif" type="text" name="url">
                        </div>

                        <div class="col-sm-12 marginT30">
                            <button type="submit" class="btn btn-primary icon-btn" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>&nbsp;&nbsp;&nbsp;
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