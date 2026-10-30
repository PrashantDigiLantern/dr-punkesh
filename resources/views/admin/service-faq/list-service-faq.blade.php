@extends('admin.master')
@section('content')
<!--main content start-->
<div id="main">
<section id="main-content">
  <section class="wrapper">
    <div class="page-title">
	
		   <!-- <div class="content-wrapper-before  gradient-45deg-indigo-purple "> </div>
	<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
<div class="container">
  <div class="row">
    <div class="col s10 m6 l6">
      <h5 class="breadcrumbs-title mt-0 mb-0"><span>List Service FAQ</span></h5>
      <ol class="breadcrumbs mb-0">
        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Home</a>
        </li>
		  <li class="breadcrumb-item"><a href="{{url('/admin/service-faq')}}"> Services FAQ </a>
        </li>
		   <li class="breadcrumb-item"><a href="{{url('/admin/service-faq')}}">List Services FAQ</a>
        </li>
        <li class="breadcrumb-item active">List Service FAQ</li>
      </ol>
    </div>
  </div>
</div>
</div>
	
		<div class="container">
<div class="card">
        <div class="card-content textalign">
  @if(in_array('1',$permission) || session('useradmin')['super_org_id']=='1')
        <a href="{{url('/admin/add-service-faq')}}" class="btn btn-primary">Add Service FAQ</a>
        @endif
  </div>
</div>
</div> -->
	
	
	
	
	
      <div>
        <h1>List Services FAQ</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="{{url('/admin/service-faq')}}">Services</a></li>
          <li class="active">List Services FAQ</li>
        </ul>
      </div>
      <div>
        @if(in_array('1',$permission) || session('useradmin')['super_org_id']=='1')
        <a href="{{url('/admin/add-service-faq')}}" class="btn btn-primary">Add Service FAQ</a>
        @endif
      </div>
    </div>
	<div class="container1">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Service Name</th>
                  <th>Question</th>
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
                    @foreach($service as $servicelist)
                    @if($servicelist->ser_id == $viewlist->service_id)
                    {{$servicelist->service_name}}
                    @endif
                    @endforeach
                  </td>
                  <td>
                    {!! substr($viewlist->question, 0, 130).'...' !!}
                  </td>
                  <td>
                    @if(in_array('2',$permission) || session('useradmin')['super_org_id']=='1')
                    <input type="text" class="form-control orderby" value="{{$viewlist->order_by}}" id="order_by{{$viewlist->ser_faq_id}}" name="order_by">
                    <button class="btn btn-primary btn-lg" onclick="orderby('{{$viewlist->ser_faq_id}}')">Save</button>
                    @else
                    {{$viewlist->order_by}}
                    @endif
                  </td>
                  <td>
                    <input type="hidden" name="_token" id="token{{$viewlist->ser_faq_id}}" value="{{ csrf_token() }}">
                    @if($viewlist->status=='active')
                    <button type="button" class="btn btn-info btn-lg" onclick="getactive('{{$viewlist->ser_faq_id}}','inactive')">Active</button>
                    @else
                    <button type="button" class="btn btn-danger btn-lg" onclick="getactive('{{$viewlist->ser_faq_id}}','active')">Inactive</button>
                    @endif
                    @if($viewlist->ser_faq_status == 'preview')
                    @if(in_array('2',$permission) || session('useradmin')['super_org_id']=='1')
                    <a href="{{url('/admin/edit_service_faq/'.$viewlist->ser_faq_id)}}" class="btn btn-warning btn-lg"><i class="fa fa-edit"></i></a>&nbsp;
                    @endif
                    @else
                    <a data-toggle="modal" data-target="#servicefaq{{$viewlist->ser_faq_id}}" class="btn btn-success  btn-lg"><i class="fa fa-eye"></i></a>&nbsp;
                    @endif
                    @if(in_array('4',$permission) || session('useradmin')['super_org_id']=='1')
                    <a onclick="return confirm('Are you sure you want to delete?')" href="{{url('/admin/delete_service_faq/'.$viewlist->ser_faq_id)}}" class="btn btn-danger btn-lg"><i class="fa fa-trash"></i></a>
                    @endif
                    <!-- Modal -->
                    <div id="servicefaq{{$viewlist->ser_faq_id}}" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">{{$viewlist->servicecatname}}</h4>
                          </div>
                          <div class="modal-body">
                            <table class="table table-hover table-bordered" id="sampleTable">
                              <tbody>
                                <tr>
                                  <td>Id</td>
                                  <td>{{$viewlist->ser_faq_id}}</td>
                                </tr>
                               

                                <tr>
                                  <td style="width: 20%;">Service Name</td>
                                  <td>
                                    @foreach($service as $servicelist)
                                    @if($servicelist->ser_id == $viewlist->service_id)
                                    {{$servicelist->service_name}}
                                    @endif
                                    @endforeach
                                  </td>
                                </tr>

                                <tr>
                                  <td style="width: 20%;">Question</td>
                                  <td>{!! $viewlist->question !!}</td>
                                </tr>

                                <tr>
                                  <td style="width: 20%;">Answer</td>
                                  <td>{!! $viewlist->answer !!}</td>
                                </tr>

                              </tbody>
                  </td>
                </tr>
            </table>
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
	</div>
  </section>
</section>
</div>
<script>
  function getactive(id, status) {
    var token = $('#token' + id).val();
    // alert(token);return false;
    $.ajax({
      url: "{{url('/admin/getactive-service-faq')}}",
      type: "post",
      // dataType : "json",
      data: {
        "id": id,
        "status": status,
        "_token": token
      },
      success: function(data) {
        location.href = "{{url('/admin/service-faq')}}";
      },
    });
  }

  function orderby(id) {
    var token = $('#token' + id).val();
    var order_by = $('#order_by' + id).val();
    // alert(token);return false;
    $.ajax({
      url: "{{url('/admin/orderby-service-faq')}}",
      type: "post",
      // dataType : "json",
      data: {
        "id": id,
        "order_by": order_by,
        "_token": token
      },
      success: function(data) {
        // location.href= "{{url('/admin/service-category')}}";
      },
    });
  }
</script>

<!--main content end-->
@endsection