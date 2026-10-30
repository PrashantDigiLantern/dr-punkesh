@extends('admin.master')
@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="card cardsec">
            <div class="card-body">
                <div class="page-title pagetitle">
                    <h1>Add Exclusive FAQ</h1>
                    <ul class="breadcrumb side">
                        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
                        <li><a href="{{url('/admin/exclusive-faq')}}">Exclusive</a></li>
                        <li><a href="{{url('/admin/exclusive-faq')}}">List Exclusive FAQ</a></li>
                        <li class="active">Add Exclusive FAQ</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Start form here -->
        <form action="{{URL::to('/admin/create_exclusive_faq')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
            <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
            <input type="hidden" name="created_by" value="{{session('useradmin')['usr_id']}}">
            <input type="hidden" name="service_type" value="exclusive">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="control-label">Select Service</label>
                            <select class="form-control" name="service_id" required>
                                <option value="">Select Service</option>
                                @foreach($view as $servicecatlist)
                                <option value="{{$servicecatlist->ser_id}}">{{$servicecatlist->service_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group  col-md-12">
                            <label class="control-label">Question</label>
                            <textarea class="form-control ckeditor" name="question" rows="3"></textarea>
                            <span class="help-block"></span>
                        </div>
                        <div class="form-group  col-md-12">
                            <label class="control-label">Answer</label>
                            <textarea class="form-control ckeditor" name="answer" rows="3"></textarea>
                            <span class="help-block"></span>
                        </div>

                        <div class="col-sm-12 marginT30">
                            <button type="submit" class="btn btn-primary icon-btn" type="button">
                                <i class="fa fa-fw fa-lg fa-check-circle"></i>Submit
                            </button>&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-default icon-btn" href="{{url('/admin/exclusive-faq')}}">
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

    function servicecategory() {
        var servicecat = $("#servicecat").val();
        //   alert(servicecat)
        $.ajax({
            type: "post",
            // cache: false,
            // async: false,
            url: "{{url('/admin/service-change')}}",
            data: {
                'servicecat': servicecat
            },
            success: function(result) {
                $("#service").html(result);
            },
            complete: function() {},
        });
    }
</script>
@endsection