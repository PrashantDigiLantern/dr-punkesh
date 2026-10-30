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
                    <h1>Add Testimonials</h1>
                    <ul class="breadcrumb side">
                        <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
                        <li><a href="{{url('/admin/service-category')}}">Testimonials</a></li>
                        <li><a href="{{url('/admin/service-category')}}">Testimonials List</a></li>
                        <li class="active">Add Testimonials</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Start form here -->
        <form action="{{URL::to('/admin/create_testimonials')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
        <!-- <form id="myForm" method="post"> -->
            <input type="hidden" value="{{ csrf_token() }}" id="token" name="_token">
            <input type="hidden" name="site_id" id="site_id" value="{{session('useradmin')['site_id']}}">
            <input type="hidden" name="org_id" id="org_id" value="{{session('useradmin')['org_id']}}">
            <input type="hidden" name="created_by" id="created_by" value="{{session('useradmin')['usr_id']}}">
            <input type="hidden" name="test_id" id="test_id" value="@if(isset($primeid)){{$primeid}}@else 0 @endif">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                    <div class="form-group col-md-4">
                            <label class="control-label">Show Type</label>
                            <select class="form-control" name="test_show_type" required>
                                <option value="">Select Type</option>
                                <option value="inside" @if(isset($view->test_show_type))@if($view->test_show_type=='inside') selected @endif @else selected @endif>Inside</option>
                                <option value="outside" @if(isset($view->test_show_type))@if($view->test_show_type=='outside') selected @endif @endif>Outside</option>
                            </select>
                        </div>
                    <div class="form-group col-md-4">
                            <label class="control-label">Name</label>
                            <!-- <label for="name">Your Age <span>(minimum 18)</span></label> -->
                            <input class="form-control" id="name" name="name" value="@if(isset($view->name)) {{$view->name}} @endif" type="text" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label class="control-label">Designation</label>
                            <input class="form-control" name="designation" id="designation" value="@if(isset($view->designation)){{$view->designation}}@endif" type="text">
                            <!-- <div class="validname" style="display: none;">Designation is required</div> -->
                        </div>

                        <div class="form-group  col-md-4">
                            <label class="control-label">Short Name</label>
                            <input class="form-control" name="short_name" id="short_name" value="@if(isset($view->short_name)){{$view->short_name}}@endif" type="text" required>
                        </div>
                        <!-- <div class="form-group  col-md-4">
                            <label class="control-label">Testimonial Image</label>
                            <input class="form-control"  name="testimonial_img" type="file">
                        </div> -->

                        <!-- <div class="form-group  col-md-4">
                            <label class="control-label">Image Alt Tag</label>
                            <input class="form-control"  name="alt_tag" type="text">
                        </div> -->

                        <div class="form-group  col-md-12">
                            <label class="control-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required>@if(isset($view->description)){{$view->description}}@endif</textarea>
                            <span class="help-block"></span>
                            <label class="validlabel">This field is required.</label>
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Source</label>
                            <select class="form-control" id="source" name="source" required>
                                <option value="">Select Source</option>
                                    <option value="google" @if(isset($view->source))@if($view->source=='google') selected @endif @endif>Google</option>
                                    <option value="practo" @if(isset($view->source))@if($view->source=='practo') selected @endif @endif>Practo</option>
                                    <option value="google" @if(isset($view->source))@if($view->source=='google') selected @endif @endif>Google</option>
                                    <option value="practo" @if(isset($view->source))@if($view->source=='lybrate') selected @endif @endif>Lybrate</option>
                                    <option value="practo" @if(isset($view->source))@if($view->source=='justdial') selected @endif @endif>Justdial</option>
                                    <option value="realself" @if(isset($view->source))@if($view->source=='realself') selected @endif @endif>Real Self</option>
                            </select>
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Rating</label>
                            <input class="form-control" id="rating" name="rating" value="@if(isset($view->rating)){{$view->rating}}@endif" type="text" required>
                        </div>

                        <div class="col-sm-12 marginT30">
                            <!-- <input type="submit" value="SUBMIT" id="myBtn" onclick="testimonial()"> -->
                            <button id="myBtn" onclick="validatesec()" class="btn btn-primary icon-btn" type="submit">
                                <i class="fa fa-fw fa-lg fa-check-circle"></i>Preview
                            </button>&nbsp;&nbsp;&nbsp;
                            <a class="btn btn-default icon-btn" href="{{url('/admin/testimonials')}}">
                                <i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">

                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label>Name</label>
                                    <div id="nameshow"></div>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label>Designation</label>
                                    <div id="designationshow"></div>
                                </div>

                                <div class="form-group col-sm-12">
                                    <label>Short Name</label>
                                    <div id="short_nameshow"></div>
                                </div>

                                <div class="form-group col-sm-12">
                                    <label>Description</label>
                                    <div id="descriptionshow"></div>
                                </div>

                                <div class="form-group col-sm-12">
                                    <label>Source</label>
                                    <div id="sourceshow"></div>
                                </div>

                                <div class="form-group col-sm-12">
                                    <label>Rating</label>
                                    <div id="ratingshow"></div>
                                </div>
                                <div class="col-sm-12 marginT30">
                                    <button type="submit" class="btn btn-primary icon-btn" type="button">
                                        <i class="fa fa-fw fa-lg fa-check-circle"></i>Publish
                                    </button>&nbsp;&nbsp;&nbsp;
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </form>
        <!-- End form -->

    </section>
</section>

<script>
     CKEDITOR.replace('description'); 

    function testimonial() {
        $("#myForm").validate({
            // submitHandler: function(form, event) {
            //     event.preventDefault();
            //     // $("#myModal").modal();
            //     var token = document.getElementById('token').value;
            //     var test_id = document.getElementById('test_id').value;
            //     var name = document.getElementById('name').value;
            //     var designation = document.getElementById('designation').value;
            //     var short_name = document.getElementById('short_name').value;
            //     var description = CKEDITOR.instances.description.getData();
            //     var source = document.getElementById('source').value;
            //     var rating = document.getElementById('rating').value;
            //     var org_id = document.getElementById('org_id').value;
            //     var site_id = document.getElementById('site_id').value;
            //     var created_by = document.getElementById('created_by').value;
            //     document.getElementById('nameshow').innerHTML = name;
            //     document.getElementById('designationshow').innerHTML = designation;
            //     document.getElementById('short_nameshow').innerHTML = short_name;
            //     document.getElementById('descriptionshow').innerHTML = description;
            //     document.getElementById('sourceshow').innerHTML = source;
            //     document.getElementById('ratingshow').innerHTML = rating;
            //     // var myform = document.getElementById("myForm");
            //     var formData = new FormData();
            //     formData.append('test_id', test_id);
            //     formData.append('name', name);
            //     formData.append('designation', designation);
            //     formData.append('short_name', short_name);
            //     formData.append('description', description);
            //     formData.append('source', source);
            //     formData.append('rating', rating);
            //     formData.append('org_id', org_id);
            //     formData.append('site_id', site_id);
            //     formData.append('created_by', created_by);
            //     formData.append('_token', token);
            //     // $.ajax({
            //     // url: "{{url('/admin/create_testimonials')}}",
            //     // data: formData,
            //     // // cache: false,
            //     // // processData: false,
            //     // // contentType: false,
            //     // type: 'POST',
            //     // success: function (result) {
            //     //     window.location = "/testimonials-preview";
            //     // },
            //     // complete: function () {

            //     // }
            // // });
            //     var request = new XMLHttpRequest();
            //     request.open("POST", "/create_testimonials");
            //     request.send(formData);
            //     success: function (result) {
            //         window.location = "/testimonials-preview";
            //     };
            //     document.getElementById("demo").innerHTML = xhttp.responseText;
            // }
        });
    }
  
   
    
</script>
@endsection