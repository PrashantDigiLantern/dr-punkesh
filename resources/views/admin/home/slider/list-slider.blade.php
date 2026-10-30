@extends('admin.master')
@section('content')
<!--main content start-->
<div id="main">
<section id="main-content">
  <section class="wrapper">
    <!-- <div class="content-wrapper-before  gradient-45deg-indigo-purple "> </div> -->
    <div class="page-title">
	
	<!-- <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
<div class="container">
  <div class="row">
    <div class="col s10 m6 l6">
      <h5 class="breadcrumbs-title mt-0 mb-0"><span>Slider List</span></h5>
      <ol class="breadcrumbs mb-0">
        <li class="breadcrumb-item"><a href="{{url('/admin/slider')}}">Slider</a>
        </li>
        <li class="breadcrumb-item active">Slider List</li>
      </ol>
    </div>
  </div>
</div>
</div> -->
	
    <div>
        <h1 class="breadcrumbs-title mt-0 mb-0 breadcrumb-item ">Slider List</h1>
        <ul class="breadcrumb side">
          <li class="breadcrumb-item "><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="{{url('/admin/slider')}}">Slider</a></li>
          <li class="active">Slider List</li>
        </ul>
      </div>
      <div>
      @if(in_array('1',$permission) || session('useradmin')['super_org_id']=='1')
        <a href="{{url('/admin/add-slider')}}" class="btn btn-primary">Add Slider</a>
        @endif
      </div>
	  
    </div>
  
     
      <div class="container1">
    <div class="row">
	 <div class="col-md-12  s2 m6 l6">
        <div class="card">
          <div class="card-body">
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>slider Name</th>
                  <th>Image</th>
                  <th>Order By</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- Start foreach loop -->
                @foreach($view as $viewlist)
                <tr>
                  <td>
                    {{$viewlist->slider_id}}
                  </td>
                  <td>
                    {{$viewlist->name}}
                  </td>
                  <td>
                    @if($viewlist->image!='')
                    <img src="{{url('/'.session('useradmin')['site_url'].'backend/slider/'.$viewlist->image)}}" style="width: 85px;height: 85px;"><br>
                    @else
                    <img src="{{url('/images/no_image.jpg')}}" style="width:70px;height:70px;">
                    @endif

                  </td>
                  <td>
                    @if(in_array('2',$permission) || session('useradmin')['super_org_id']=='1')
                    <input type="text" class="form-control orderby" value="{{$viewlist->order_by}}" id="order_by{{$viewlist->slider_id}}" name="order_by">
                    <button class="btn btn-primary btn-lg" onclick="orderby('{{$viewlist->slider_id}}')">Save</button>
                    @else
                    {{$viewlist->order_by}}
                    @endif
                  </td>
                  <td>{{ $viewlist->slider_status }}</td>
                  <td>
                  <!-- <a href="{{url('/admin/edit_slider/'.$viewlist->slider_id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>&nbsp; -->
                    <input type="hidden" name="_token" id="token{{$viewlist->slider_id}}" value="{{ csrf_token() }}">
                    @if($viewlist->status=='active')
                    <button type="button" class="btn btn-info btn-lg" onclick="getactive('{{$viewlist->slider_id}}','inactive')">Active</button>
                    @else
                    <button type="button" class="btn btn-danger btn-lg" onclick="getactive('{{$viewlist->slider_id}}','active')">Inactive</button>
                    @endif
                    @if($viewlist->slider_status == 'preview')
                    @if(in_array('2',$permission) || session('useradmin')['super_org_id']=='1')
                    <a href="{{url('/admin/edit_slider/'.$viewlist->slider_id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>&nbsp;
                    @endif
                    @else
                    <a data-toggle="modal" data-target="#slider{{$viewlist->slider_id}}" class="btn btn-success  btn-lg"><i class="fa fa-eye"></i></a>&nbsp;
                    @endif
                    @if(in_array('4',$permission) || session('useradmin')['super_org_id']=='1')
                    <a onclick="return confirm('Are you sure you want to delete?')" href="{{url('/admin/delete_slider/'.$viewlist->slider_id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    @endif


                    <!-- Modal -->
                    <div id="slider{{$viewlist->slider_id}}" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">{{$viewlist->name}}</h4>
                          </div>
                          <div class="modal-body">
                            <table class="table table-hover table-bordered" id="sampleTable">
                              <tbody>
                                <tr>
                                  <td>Id</td>
                                  <td>{{$viewlist->slider_id}}</td>
                                </tr>
                                <tr>
                                  <td style="width: 20%;">Name</td>
                                  <td>{{$viewlist->name}}</td>
                                </tr>
                                <tr>
                                  <td style="width: 20%;">Image</td>
                                  <td><img src="{{url('/'.session('useradmin')['site_url'].'backend/slider/'.$viewlist->image)}}" class="imgwidth"></td>
                                </tr>
                                <tr>
                                  <td style="width: 20%;">Description</td>
                                  <td>{!! $viewlist->description !!}</td>
                                </tr>
                                <tr>
                                  <td style="width: 20%;">Button Type</td>
                                  <td>{{strip_tags($viewlist->button_type)}}</td>
                                </tr>
                                <tr>
                                  <td style="width: 20%;">Button Name</td>
                                  <td>{{ $viewlist->button_name}}</td>
                                </tr>
                                <tr>
                                  <td style="width: 20%;">Button Url</td>
                                  <td>{{$viewlist->button_url}}</td>
                                </tr>
                                <tr>
                                  <td style="width: 20%;">Alt Tag</td>
                                  <td>{{$viewlist->alt_tag}}</td>
                                </tr>
                                <tr>
                                  <td style="width: 20%;">status</td>
                                  <td>{{$viewlist->status}}</td>
                                </tr>
                              </tbody>
                  </td>
                </tr>
            </table>
          </div>

        </div>

      </div>
    </div>
      </div>

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
</div>
<!--main content end-->
@endsection
<script>
  function getactive(id,status){
   var token = $('#token' + id).val();
      // alert(token);return false;
       $.ajax({
        url : "{{url('/admin/getactive-slider')}}",
        type : "post",
       // dataType : "json",
        data : {"id":id,"status" : status,"_token":token},
        success : function(data) {
            location.href= "{{url('/admin/slider')}}";
        },
    });
   }
   
   function orderby(id){
   var token = $('#token' + id).val();
   var order_by = $('#order_by' + id).val();
      // alert(token);return false;
       $.ajax({
        url : "{{url('/admin/orderby-slider')}}",
        type : "post",
       // dataType : "json",
        data : {"id":id,"order_by" : order_by,"_token":token},
        success : function(data) {
           // location.href= "{{url('/admin/service-category')}}";
        },
    });
   }
</script>