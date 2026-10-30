@extends('admin.master')
@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="card cardsec">
            <div class="card-body">
                <div class="page-title pagetitle">
                    <h1>Latest Technologies</h1>
                    <ul class="breadcrumb side">
                        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
                        <li><a href="{{url('/admin/ourservice')}}">Home</a></li>
                        <li class="active">Latest Technologies</li>
                    </ul>
                </div>
            </div>
        </div>

        <form action="{{URL::to('/admin/create-technology')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <div class="card">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
                <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
                <input value="@if(isset($edit->hom_tec_id)){{ $edit->hom_tec_id }}@else {{'0'}} @endif" name="hom_tec_id" type="hidden">
                <!-- <input type="hidden" name="created_by" value="{{session('useradmin')['usr_id']}}"> -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Heading</label>
                                <input class="form-control" value="@if(isset($edit->heading)){{$edit->heading}}@endif" name="heading" type="text">
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" value="@if(isset($edit->heading2)){{$edit->heading2}}@endif" name="heading2" type="text">
                            </div>

                        </div>
                        <div class="col-sm-6">
                            <div class="col-sm-6">
                                @if(isset($edit->image))
                                @if($edit->image!='')
                                <img src="{{url('/images/home_technology/'.$edit->image)}}" style="width: 85px;height: 85px;"><br>
                                @else
                                <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                                @endif
                                @else
                                <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                                @endif

                                <div class="form-group">
                                    <label class="control-label">Image Image</label>
                                    <input class="form-control" name="image" type="file">
                                    <input class="form-control" name="oldimage" value="@if(isset($edit->image)){{$edit->image}}@endif" type="hidden">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                @if(isset($edit->image2))
                                @if($edit->image2!='')
                                <img src="{{url('/images/home_technology/'.$edit->image2)}}" style="width: 85px;height: 85px;"><br>
                                @else
                                <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                                @endif
                                @else
                                <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                                @endif
                                <div class="form-group">
                                    <label class="control-label">Image2</label>
                                    <input class="form-control" name="image2" type="file">
                                    <input class="form-control" name="oldimage2" value="@if(isset($edit->image2)){{$edit->image2}}@endif" type="hidden">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="form-group col-sm-12">
                            <label class="control-label">Descrition</label>
                            <textarea class="form-control ckeditor" name="description" rows="3">@if(isset($edit->description)){{$edit->description}}@endif</textarea>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Mission</label>
                            <input class="form-control" value="@if(isset($edit->name1)){{$edit->name1}}@endif" name="name1" type="text">
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Vision</label>
                            <input class="form-control" value="@if(isset($edit->name2)){{$edit->name2}}@endif" name="name2" type="text">
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Our Team</label>
                            <input class="form-control" value="@if(isset($edit->name3)){{$edit->name3}}@endif" name="name3" type="text">
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Image Name</label>
                            <input class="form-control" value="@if(isset($edit->image_name)){{$edit->image_name}}@endif" name="image_name" type="text">
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Image Name2</label>
                            <input class="form-control" value="@if(isset($edit->image2_name)){{$edit->image2_name}}@endif" name="image2_name" type="text">
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

    function ourservice() {
        type = $("#typeservice").val();
        alert('hi');
        if (type == 'service') {
            $(".serviceshow").show()
        }
        if (type == 'exclusive') {
            $(".serviceshow").hide()
        }

    }
    ourservice();
</script>

@endsection