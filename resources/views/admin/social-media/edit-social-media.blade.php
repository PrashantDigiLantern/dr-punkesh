@extends('admin.master')
@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="card cardsec">
            <div class="card-body">
                <div class="page-title pagetitle">
                    <h1>Edit Social Media</h1>
                    <ul class="breadcrumb side">
                        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
                        <li><a href="{{url('/admin/social-media')}}">Form</a></li>
                        <li><a href="{{url('/admin/social-media')}}">Social Media List</a></li>
                        <li class="active">Edit Social Media</li>
                    </ul>
                </div>
            </div>
        </div>
        <form action="{{URL::to('/admin/update_socail'.'/'.$edit->social_id)}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <div class="card">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
                <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
                <input type="hidden" name="updated_by" value="{{session('useradmin')['usr_id']}}">
                <div class="card-body">
                    <div class="row">

                        <div class="form-group col-sm-4">
                            <label>Name</label>
                            <input class="form-control" value="{{$edit->name}}" name="name" type="text">
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Icon</label>
                            <input class="form-control" value="{{$edit->icon}}" name="icon" type="text">
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Link</label>
                            <input class="form-control" value="{{$edit->link}}" name="link" type="text">
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

                        <div class="col-sm-12 marginT30">
                            <button type="submit" class="btn btn-primary icon-btn" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Submit</button>&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-default icon-btn" href="{{url('/admin/social-media')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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