@extends('admin.master')
@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="card cardsec">
            <div class="card-body">
                <div class="page-title pagetitle">
                    <h1>Add Service & Exclusive List</h1>
                    <ul class="breadcrumb side">
                        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
                        <li><a href="{{url('/admin/ourservice')}}">Home</a></li>
                        <li><a href="{{url('/admin/ourservice')}}">Service & Exclusive List List</a></li>
                        <li class="active">Add Service & Exclusive List</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Start form here -->
        <form action="{{URL::to('/admin/create_ourservice')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <input type="hidden" value="{{ csrf_token() }}" name="_token">
            <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
            <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
            <input type="hidden" name="created_by" value="{{session('useradmin')['usr_id']}}">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label">Select Type</label>
                            <select class="form-control" name="type" id="typeservice" onchange="ourservice()">
                                <option value="">Select Type</option>
                                <option value="service">Our Service</option>
                                <option value="exclusive">Exclusive Treatments</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Name</label>
                            <input class="form-control" name="name" type="text" required>
                        </div>

                        <div class="form-group col-md-4 serviceshow">
                            <label class="control-label">Image</label>
                            <input class="form-control" name="image" type="file">
                        </div>
                        <div class="form-group col-md-4">
                            <label class="control-label">Thumbnail</label>
                            <input class="form-control" name="thumbnail" type="file">
                        </div>
                        <div class="form-group col-md-4 serviceshow">
                            <label class="control-label">Image After</label>
                            <input class="form-control" name="imageafter" type="file">
                        </div>
                        <div class="form-group col-md-4 serviceshow">
                            <label class="control-label">Image Before</label>
                            <input class="form-control" name="imagebefore" type="file">
                        </div>

                        <div class="form-group col-md-4">
                            <label class="control-label">Video Link</label>
                            <input class="form-control" name="videolink" type="text">
                        </div>

                        <div class="form-group col-md-12">
                            <label class="control-label">Descrition</label>
                            <textarea class="form-control ckeditor" name="description" rows="3"></textarea>
                            <span class="help-block"></span>
                        </div>

                        <div class="form-group col-md-4">
                            <label class="control-label">Image Alt Tag</label>
                            <input class="form-control" name="alt_tag" type="text">
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Title Tags</label>
                            <input class="form-control" name="title_tag" type="text">
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Keyword Tag</label>
                            <input class="form-control" name="keyword_tag" type="text">
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Description Tag</label>
                            <input class="form-control" name="description_tag" type="text">
                        </div>

                        <div class="form-group col-sm-4">
                            <label class="control-label">Url</label>
                            <input class="form-control" name="url" type="text">
                        </div>

                        <div class="col-sm-12 marginT30">
                            <button type="submit" class="btn btn-primary icon-btn" type="button">
                                <i class="fa fa-fw fa-lg fa-check-circle"></i>Submit
                            </button>&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-default icon-btn" href="{{url('/admin/ourservice')}}">
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

    function ourservice() {
        type = $("#typeservice").val();

        if (type == 'service') {
            $(".serviceshow").show()
        }
        if (type == 'exclusive') {
            $(".serviceshow").hide()
        }

    }
</script>
@endsection