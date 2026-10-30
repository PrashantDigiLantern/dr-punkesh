@extends('admin.master')
@section('content')
<!--main content start-->
<div id="main">
<section id="main-content">
  <section class="wrapper">
  <div class="page-title">
<div>
        <h1>Operation List</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="active">Operation List</li>
        </ul>
      </div>
      <div>
      @if(in_array('1',$permission) || session('useradmin')['super_org_id']=='1')
        <a href="{{url('/admin/add-operation')}}" class="btn btn-primary">Add Operation</a>
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
        <th>Operation Name</th>
        <th>Operation URL</th>
        @if(in_array('2',$permission) || session('useradmin')['super_org_id']=='1')
        <th>Order BY</th>
        @endif
        <th>Action</th>
      </tr>
      </thead>
      <tbody>
  @foreach($view as $viewlist)
  <tr>
    <td>{{$viewlist->op_name}}</td>
    <td>{{$viewlist->op_link}}</td>
    @if(in_array('2',$permission) || session('useradmin')['super_org_id']=='1')
    <td><input type="text" class="form-control orderby" value="{{$viewlist->op_view_order}}" id="order_by{{$viewlist->op_id}}" name="order_by">
                    <button class="btn btn-primary btn-lg" onclick="orderby('{{$viewlist->op_id}}')">Save</button>
                  </td>
                  @endif
    <td>
    @if(in_array('2',$permission) || session('useradmin')['super_org_id']=='1')
    <input type="hidden" name="_token" id="token{{$viewlist->op_id}}" value="{{ csrf_token() }}">
    @if($viewlist->op_status=='active')
    <button type="button" class="btn btn-info btn-lg" onclick="getactive('{{$viewlist->op_id}}','inactive')">Active</button>
    @else
    <button type="button" class="btn btn-danger btn-lg" onclick="getactive('{{$viewlist->op_id}}','active')">Inactive</button>
    @endif  
    <a class="btn btn-warning btn-lg" href="{{ url('admin/edit-operation/'.$viewlist->op_id) }}">Edit</a>
    @endif
    @if(in_array('4',$permission) || session('useradmin')['super_org_id']=='1')
    <a class="btn btn-danger btn-lg" href="{{ url('admin/delete-operation/'.$viewlist->op_id) }}">Delete</a>
    @endif
    </td>
  </tr>
  @endforeach
  </tbody>
</table>
</div>
        </div>
      </div>
    </div>
        </div>
</section>
</section>

<script>
  function getactive(id, status) {
    var token = $('#token' + id).val();
    // alert(token);return false;
    $.ajax({
      url: "{{url('/admin/getactive-operation')}}",
      type: "post",
      // dataType : "json",
      data: {
        "id": id,
        "op_status": status,
        "_token": token
      },
      success: function(data) {
        location.href = "{{url('/admin/operation')}}";
      },
    });
  }

  function orderby(id) {
    var token = $('#token' + id).val();
    var order = $('#order_by' + id).val();
    // alert(token);return false;
    $.ajax({
      url: "{{url('/admin/orderby-operation')}}",
      type: "post",
      // dataType : "json",
      data: {
        "id": id,
        "op_view_order": order,
        "_token": token
      },
      success: function(data) {
  
      },
    });
  }
</script>
@endsection