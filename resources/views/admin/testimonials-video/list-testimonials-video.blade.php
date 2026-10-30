@extends('admin.master')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="page-title">
      <div>
        <h1>Testimonial Video List</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="{{url('/admin/video-testimonials')}}">Testimonial Video</a></li>
          <li class="active">Testimonial Video List</li>
        </ul>
      </div>
      <div>
      @if(in_array('1',$permission) || session('useradmin')['super_org_id']=='1')
        <a href="{{url('/admin/add-video-testimonials')}}" class="btn btn-primary">Add Testimonial Video</a>
        @endif
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Video Heading</th>
                  <th>Image</th>
                  <th style="width:15%">Order By</th>
                  <th style="width:15%">Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- Start foreach loop -->
                @foreach($view as $key => $viewlist)
               
                <tr>                    
                  <td>
                   {{$key + 1}}
                  </td>
                  <td>
                  {{$viewlist->name}}
                  </td>
                  <td>
                  @if($viewlist->image!='')
                    <img src="{{url('/backend/service_video/inner/'.$viewlist->image)}}" style="width: 85px;height: 85px;"><br>
                 
                 @else
                    <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                 
                 @endif
                  
                  </td>
                  <td>
                  @if(in_array('2',$permission) || session('useradmin')['super_org_id']=='1')
                  <input type="text" class="form-control orderby" value="{{$viewlist->order_by}}" id="order_by{{$viewlist->test_video_id}}" name="order_by">
                  <button class="btn btn-primary btn-lg" onclick="orderby('{{$viewlist->test_video_id}}')">Save</button>
                  @else
                    {{$viewlist->order_by}}
                  @endif
                  </td>
                  <td>
                  <input type="hidden" name="_token" id="token{{$viewlist->test_video_id}}" value="{{ csrf_token() }}">
                  @if($viewlist->status=='active')
                  <button type="button" class="btn btn-info btn-lg" onclick="getactive('{{$viewlist->test_video_id}}','inactive')">Active</button>
                  @else
                  <button type="button" class="btn btn-danger btn-lg" onclick="getactive('{{$viewlist->test_video_id}}','active')">Inactive</button>
                  @endif
                  @if(in_array('2',$permission) || session('useradmin')['super_org_id']=='1')
                  <a href="{{url('/admin/edit_video_testimonials/'.$viewlist->test_video_id)}}" class="btn btn-warning btn-lg"><i class="fa fa-edit"></i></a>&nbsp;
                  @endif
                  @if(in_array('1',$permission) || session('useradmin')['super_org_id']=='1')
                    <a onclick="return confirm('Are you sure you want to delete?')"  href="{{url('/admin/delete_video_testimonials/'.$viewlist->test_video_id)}}" class="btn btn-danger btn-lg"><i class="fa fa-trash"></i></a>
                    @endif
                 
                  </td>
                </tr> 
               @endforeach
                <!-- End foreach loop -->
              </tbody>
            </table>
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
        url : "{{url('/admin/getactive-video-testimonials')}}",
        type : "post",
       // dataType : "json",
        data : {"id":id,"status" : status,"_token":token},
        success : function(data) {
            location.href= "{{url('/admin/video-testimonials')}}";
        },
    });
   }
   
   function orderby(id){
   var token = $('#token' + id).val();
   var order_by = $('#order_by' + id).val();
      // alert(token);return false;
       $.ajax({
        url : "{{url('/admin/orderby-video-testimonials')}}",
        type : "post",
       // dataType : "json",
        data : {"id":id,"order_by" : order_by,"_token":token},
        success : function(data) {
           // location.href= "{{url('/admin/service-category')}}";
        },
    });
   }
</script>
<!--main content end-->
@endsection