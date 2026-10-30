@extends('admin.master')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="page-title">
      <div>
        <h1>Testimonials Preview</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="{{url('/admin/testimonials')}}">Testimonials</a></li>
          <li class="active">Testimonials Preview</li>
        </ul>
      </div>
      <div>
        <a href="{{url()->previous()}}" class="btn btn-primary">Back</a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
          <div class="row">
          <div class="form-group col-sm-12">
                                    <label>Show Type</label>
                                    <p>{{$view->test_show_type}}</p>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label>Name</label>
                                    <p>{{$view->name}}</p>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label>Designation</label>
                                    <p>{{$view->designation}}</p>
                                </div>

                                <div class="form-group col-sm-12">
                                    <label>Short Name</label>
                                    <p>{{$view->short_name}}</p>
                                    <div id="short_nameshow"></div>
                                </div>

                                <div class="form-group col-sm-12">
                                    <label>Description</label>
                                    <p>{{strip_tags($view->description)}}</p>
                                    <div id="descriptionshow"></div>
                                </div>

                                <div class="form-group col-sm-12">
                                    <label>Source</label>
                                    <p>{{$view->source}}</p>
                                    <div id="sourceshow"></div>
                                </div>

                                <div class="form-group col-sm-12">
                                    <label>Rating</label>
                                    <p>{{$view->rating}}</p>
                                    <div id="ratingshow"></div>
                                </div>
                                <div class="col-sm-12 marginT30">
                                    <a href="{{url('/admin/create_test_publish/'.session('primeid'))}}" class="btn btn-primary icon-btn" type="button">
                                        <i class="fa fa-fw fa-lg fa-check-circle"></i>Publish
</a>&nbsp;&nbsp;&nbsp;
                                </div>
                            </div>
            <!-- <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Source</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th style="width:15%">Action</th>
                </tr>
              </thead>
              <tbody>
                
                <tr>                    
                  <td>
                   {{$view->test_id}}
                  </td>
                  <td>
                  {{$view->name}}
                  </td>
                  <td>
                  {{$view->name}}
                  </td>
                  <td>
                    {!! substr($view->description, 0, 130).'...' !!}
                  </td>
                  <td>
                  {{ $view->test_status }}
                  </td>
                  
                </tr> 
              </tbody>
            </table> -->
          </div>
        </div>
      </div>
    </div>
  </section>
</section>
<script>
 function getactive(id,status){
   var token = $('#token' + id).val();
      // alert(token);return false;
       $.ajax({
        url : "{{url('/admin/getactive-testimonials')}}",
        type : "post",
       // dataType : "json",
        data : {"id":id,"status" : status,"_token":token},
        success : function(data) {
            location.href= "{{url('/admin/testimonials')}}";
        },
    });
   }
</script>
<!--main content end-->
@endsection