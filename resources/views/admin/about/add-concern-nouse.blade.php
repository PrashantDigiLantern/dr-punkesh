@extends('admin.master')
@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="card cardsec">
            <div class="card-body">
                <div class="page-title pagetitle">
                    <h1>Add About Concern</h1>
                    <ul class="breadcrumb side">
                        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
                        <li><a href="{{url('/admin/concern')}}">About</a></li>
                        <li><a href="{{url('/admin/concern')}}">List About Concern</a></li>
                        <li class="active">Add About Concern</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Start form here -->
        <form action="{{URL::to('/admin/create_concern')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <input type="hidden" value="{{ csrf_token() }}" name="_token">
            <input type="text" name="site_id" value="{{session('useradmin')['site_id']}}">
            <input type="text" name="org_id" value="{{session('useradmin')['org_id']}}">
            <input type="text" name="created_by" value="{{session('useradmin')['usr_id']}}">
            <div class="card">
                <div class="card-body">
                    <div class="row">


                        <div class="form-group col-md-4">
                            <label class="control-label">Name</label>
                            <input class="form-control" name="name" type="text" required>
                        </div>
                        <div class="form-group  col-md-12">
                            <label class="control-label">Sort Descrition</label>
                            <textarea class="form-control ckeditor" name="sort_desc" rows="3"></textarea>
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group  col-md-12">
                            <label class="control-label">Descrition</label>
                            <textarea class="form-control ckeditor" name="description" rows="3"></textarea>
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group  col-md-4">
                            <label class="control-label">Image</label>
                            <input class="form-control" name="image" type="file" required>
                        </div>

                        <div class="form-group  col-md-4">
                            <label class="control-label">Image Alt Tag</label>
                            <input class="form-control" name="alt_tag" type="text">
                        </div>
                    </div>
                    <div class="row" id="typename">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label class="control-label">Type</label>
                                <input class="form-control" name="type[]" type="text">
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <button class="btn btn-primary marginT38" type="button" onclick="addtype()">+</button>
                            </div>
                        </div>
                    </div>
                    <div id="addtypename"></div>
                    <div class="row">

                        <div class="col-sm-12 marginT30">
                            <button type="submit" class="btn btn-primary icon-btn" type="button">
                                <i class="fa fa-fw fa-lg fa-check-circle"></i>Submit
                            </button>&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-default icon-btn" href="{{url('/admin/concern')}}">
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

    function addtype() {
        $.ajax({
            type: "get",
            cache: false,
            async: false,
            url: "{{url('/admin/addtype')}}",
            data: {
                'post': 'ok'
            },
            success: function(result) {
                $("#addtypename").append(result);
            },
            complete: function() {},
        });
    }

    function removetype(rand) {
        $("#remove" + rand).remove();
    }
</script>
@endsection