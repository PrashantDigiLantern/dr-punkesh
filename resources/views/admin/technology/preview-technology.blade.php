@extends('admin.master')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="page-title">
      <div>
        <h1>Technology Preview</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="{{url('/admin/technology')}}">Technology</a></li>
          <li class="active">Technology Preview</li>
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
                                    <label>Technology Name</label>
                                    <p>{{$view->name}}</p>
                                </div>
                                <div class="form-group  col-md-4">
                            <div class="form-group">
                            <label class="control-label">Technology Image</label>
                            @if(isset($view->image)) 
                                @if($view->image!='')
                                <img src="{{url('/'.session('useradmin')['site_url'].'backend/technology/'.$view->image)}}" style="width: 85px;height: 85px;"><br>
                                @else
                                <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                                @endif
                                @else
                                <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                                @endif
                                
                            </div>
                        </div>

                        <div class="form-group  col-md-4">
                           <div class="form-group">
                            <label class="control-label">Technology Image</label>
                            @if(isset($view->banner_image))   
                            @if($view->banner_image!='')
                                <img src="{{url('/'.session('useradmin')['site_url'].'backend/technology/'.$view->banner_image)}}" style="width: 85px;height: 85px;"><br>
                                @else
                                <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                                @endif
                                @else
                                <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                                @endif
                                </div>
                        </div>
                        <div class="form-group col-sm-12">
                                    <label>Sort Descrition</label>
                                    <p>{{strip_tags($view->short_desc)}}</p>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label>Description</label>
                                    <p>{{strip_tags($view->description)}}</p>
                                </div>

                                <div class="form-group col-sm-12">
                                    <label>Title Tag</label>
                                    <p>{{$view->title_tag}}</p>
                                </div>

                                <div class="form-group col-sm-12">
                                    <label>Keyword Tag</label>
                                    <p>{{$view->keyword_tag}}</p>
                                </div>

                                <div class="form-group col-sm-12">
                                    <label>Description Tag</label>
                                    <p>{{$view->description_tag}}</p>
                                </div>

                                <div class="form-group col-sm-12">
                                    <label>Canonical</label>
                                    <p>{{$view->canonical}}</p>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label>Url</label>
                                    <p>{{$view->url}}</p>
                                </div>
                                <div class="col-sm-12 marginT30">
                                    <a href="{{url('/admin/create_tech_publish/'.session('primeid'))}}" class="btn btn-primary icon-btn" type="button">
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
                    {!! substr($viewlist->description, 0, 130).'...' !!}
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