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
                        <h1>Edit Technology</h1>
                        <ul class="breadcrumb side">
                            <li><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-home fa-lg"></i></a></li>
                            <li><a href="{{ url('/admin/technology') }}">Technology</a></li>
                            <li><a href="{{ url('/admin/technology') }}">Technology List</a></li>
                            <li class="active">Edit Technologyy</li>
                        </ul>
                    </div>
                </div>
            </div>
            <form action="{{ URL::to('/admin/create_technology') }}" id="myForm" enctype="multipart/form-data"
                method="post" accept-charset="utf-8">
                <div class="card">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="site_id" value="{{ session('useradmin')['site_id'] }}">
                    <input type="hidden" name="org_id" value="{{ session('useradmin')['org_id'] }}">
                    <input type="hidden" name="updated_by" value="{{ session('useradmin')['usr_id'] }}">
                    <input type="hidden" name="tech_id" id="tech_id"
                        value="@if (isset($primeid)) {{ $primeid }}@else 0 @endif">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Technology Name</label>
                                    <input class="form-control" value="{{ $edit->name }}" name="name" type="text">
                                </div>
                                <div class="form-group">
                                    <label>Image Alt Tag</label>
                                    <input class="form-control" value="{{ $edit->alt_tag }}" name="alt_tag" type="text">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group col-sm-6">
                                    @if ($edit->image != '')
                                        <img src="{{ url('/' . session('useradmin')['site_url'] . 'backend/service_video/technology/' . $edit->image) }}"
                                            style="width: 85px;height: 85px;"><br>
                                    @else
                                        <img src="{{ url('/images/no_image.jpg') }}" style="width:85px;height:85px;"><br>
                                    @endif
                                    <label class="control-label">Technology Image</label>
                                    <input class="form-control" name="tech_image" type="file">
                                    <input class="form-control" name="oldtech_image" value="{{ $edit->image }}"
                                        type="hidden">
                                </div>
                                <div class="form-group col-sm-6">
                                    @if ($edit->banner_image != '')
                                        <img src="{{ url('/' . session('useradmin')['site_url'] . 'backend/service_video/technology/' . $edit->banner_image) }}"
                                            style="width: 85px;height: 85px;"><br>
                                    @else
                                        <img src="{{ url('/images/no_image.jpg') }}" style="width:85px;height:85px;"><br>
                                    @endif
                                    <label class="control-label">Technology Image</label>
                                    <input class="form-control" name="tech_banner" type="file">
                                    <input class="form-control" name="oldtech_banner" value="{{ $edit->banner_image }}"
                                        type="hidden">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12">
                                <label>Sort Descrpition</label>
                                <textarea class="form-control ckeditor" name="short_desc" rows="3">{{ $edit->short_desc }}</textarea>
                                <span class="help-block"></span>
                            </div>

                            <div class="form-group col-sm-12">
                                <label>Description</label>
                                <textarea class="form-control ckeditor" name="description" rows="3">{{ $edit->description }}</textarea>
                                <span class="help-block"></span>
                            </div>

                            <div class="form-group col-sm-4">
                                <label>Title Tags</label>
                                <input class="form-control" value="{{ $edit->title_tag }}" name="title_tag" type="text"
                                    service>
                            </div>

                            <div class="form-group col-sm-4">
                                <label>Keyword Tag</label>
                                <input class="form-control" value="{{ $edit->keyword_tag }}" name="keyword_tag"
                                    type="text">
                            </div>

                            <div class="form-group col-sm-4">
                                <label>Description Tag</label>
                                <input class="form-control" value="{{ $edit->description_tag }}" name="description_tag"
                                    type="text">
                            </div>

                            <div class="form-group col-sm-4">
                                <label>Canonical</label>
                                <input class="form-control" value="{{ $edit->canonical }}" type="text"
                                    name="canonical">
                            </div>

                            <div class="form-group col-sm-4">
                                <label>Url</label>
                                <input class="form-control" value="{{ $edit->url }}" type="text" name="url">
                            </div>

                            <div class="col-sm-12 marginT30">
                                <button type="submit" class="btn btn-primary icon-btn" onclick="validatesec()"><i
                                        class="fa fa-fw fa-lg fa-check-circle"></i>Preview</button>&nbsp;&nbsp;&nbsp;
                                <a class="btn btn-default icon-btn" href="{{ url('/admin/technology') }}"><i
                                        class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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
