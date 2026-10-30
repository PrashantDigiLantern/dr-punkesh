@extends('admin.master')
@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="card cardsec">
            <div class="card-body">
                <div class="page-title pagetitle">
                    <h1>Edit Service & Exclusive List</h1>
                    <ul class="breadcrumb side">
                        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
                        <li><a href="{{url('/admin/ourservice')}}">Home</a></li>
                        <li><a href="{{url('/admin/ourservice')}}">Service & Exclusive List List</a></li>
                        <li class="active">Edit Service & Exclusive List</li>
                    </ul>
                </div>
            </div>
        </div>
        @if($edit->type=='exclusive')
        <style>
            .serviceshow {
                display: none;
            }
        </style>
        @endif
        <form action="{{URL::to('/admin/update_ourservice'.'/'.$edit->our_id)}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <div class="card">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
                <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
                <input type="hidden" name="updated_by" value="{{session('useradmin')['usr_id']}}">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group col-md-6 paddingL0">
                                <label class="control-label">Select Type</label>
                                <select class="form-control" name="type" id="typeservice" onchange="ourservice()">
                                    <option value="">Select Type</option>
                                    <option value="service" @if($edit->type=='service') selected @endif>Our Service</option>
                                    <option value="exclusive" @if($edit->type=='exclusive') selected @endif>Exclusive Treatments</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Name</label>
                                <input class="form-control" value="{{$edit->name}}" name="name" type="text">
                            </div>
                            <div class="form-group col-sm-6 paddingL0">
                                <label>Video Link</label>
                                <input class="form-control" value="{{$edit->alt_tag}}" name="alt_tag" type="text">
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Image Alt Tag</label>
                                <input class="form-control" value="{{$edit->alt_tag}}" name="alt_tag" type="text">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            @if($edit->thumbnail!='')
                            <img src="{{url('/images/our_service/'.$edit->thumbnail)}}" style="width: 85px;height: 85px;"><br>

                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">

                            @endif
                            <div class="form-group">
                                <label class="control-label">Thumbnail Image</label>
                                <input class="form-control" name="thumbnail" type="file">
                                <input class="form-control" name="oldthumbnail" value="{{$edit->thumbnail}}" type="hidden">
                            </div>

                        </div>
                    </div>
                    <div class="row serviceshow">
                        <div class="col-sm-4">
                            @if($edit->image!='')
                            <img src="{{url('/images/our_service/'.$edit->image)}}" style="width: 85px;height: 85px;"><br>

                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">

                            @endif
                            <div class="form-group">
                                <label class="control-label">Image Image</label>
                                <input class="form-control" name="image" type="file">
                                <input class="form-control" name="oldimage" value="{{$edit->image}}" type="hidden">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            @if($edit->after_image!='')
                            <img src="{{url('/images/our_service/'.$edit->after_image)}}" style="width: 85px;height: 85px;"><br>

                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">

                            @endif
                            <div class="form-group">
                                <label class="control-label">Image After Image</label>
                                <input class="form-control" name="afterimage" type="file">
                                <input class="form-control" name="oldafterimage" value="{{$edit->after_image}}" type="hidden">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            @if($edit->before_image!='')
                            <img src="{{url('/images/our_service/'.$edit->before_image)}}" style="width: 85px;height: 85px;"><br>

                            @else
                            <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">

                            @endif
                            <div class="form-group">
                                <label class="control-label">Image Before Image</label>
                                <input class="form-control" name="beforeimage" type="file">
                                <input class="form-control" name="oldbeforeimage" value="{{$edit->before_image}}" type="hidden">
                            </div>
                        </div>

                    </div>
                    <div class="row">

                        <div class="form-group  col-md-12">
                            <label class="control-label">Descrition</label>
                            <textarea class="form-control ckeditor" name="description" rows="3">{{$edit->description}}</textarea>
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Title Tags</label>
                            <input class="form-control" value="{{$edit->title_tag}}" name="title_tag" type="text" service>
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
                            <label>Url</label>
                            <input class="form-control" value="{{$edit->url}}" type="text" name="url">
                        </div>

                        <div class="col-sm-12 marginT30">
                            <button type="submit" class="btn btn-primary icon-btn" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-default icon-btn" href="{{url('/admin/ourservice')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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