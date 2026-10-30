@extends('admin.master')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="page-title">
      <div>
        <h1>Exclusive Treatments List</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="active">Exclusive Treatments List</li>
        </ul>
      </div>
      <div>
        <a href="{{url('/admin/add-exclusive')}}" class="btn btn-primary">Add Exclusive Treatments</a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Service Category</th>
                  <th>Service Name</th>
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
                  Exclusive Treatments
                  </td>
                  <td>
                  {{$viewlist->service_name}}
                  </td>
                  <td>
                  <input type="text" class="form-control orderby" value="{{$viewlist->order_by}}" id="order_by{{$viewlist->ser_id}}" name="order_by">
                  <button class="btn btn-primary btn-lg" onclick="orderby('{{$viewlist->ser_id}}')">Save</button>
                  </td>
                  <td>
                  <input type="hidden" name="_token" id="token{{$viewlist->ser_id}}" value="{{ csrf_token() }}">
                  @if($viewlist->status=='active')
                  <button type="button" class="btn btn-info btn-lg" onclick="getactive('{{$viewlist->ser_id}}','inactive')">Active</button>
                  @else
                  <button type="button" class="btn btn-danger btn-lg" onclick="getactive('{{$viewlist->ser_id}}','active')">Inactive</button>
                  @endif
		              <a href="{{url('/admin/edit_exclusive/'.$viewlist->ser_id)}}" class="btn btn-warning btn-lg"><i class="fa fa-edit"></i></a>&nbsp;
                  <a onclick="return confirm('Are you sure you want to delete?')"  href="{{url('/admin/delete_exclusive/'.$viewlist->ser_id)}}" class="btn btn-danger btn-lg"><i class="fa fa-trash"></i></a>
                 
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
        url : "{{url('/admin/getactive-exclusive')}}",
        type : "post",
       // dataType : "json",
        data : {"id":id,"status" : status,"_token":token},
        success : function(data) {
            location.href= "{{url('/admin/exclusive')}}";
        },
    });
   }
   
   function orderby(id){
   var token = $('#token' + id).val();
   var order_by = $('#order_by' + id).val();
      // alert(token);return false;
       $.ajax({
        url : "{{url('/admin/orderby-exclusive')}}",
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