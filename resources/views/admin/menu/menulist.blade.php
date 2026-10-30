@extends('admin.master')
@section('content')
<!--main content start-->
<div id="main">
<section id="main-content">
  <section class="wrapper">
  <div class="page-title">
<div>
        <h1>Menu List</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="active">Menu List</li>
        </ul>
      </div>
      <div>
      @if(in_array('1',$permission) || session('useradmin')['super_org_id']=='1')
        <a href="{{url('/admin/add-menu')}}" class="btn btn-primary">Add Menu</a>
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
    <th>Menu Name</th>
    <th>Menu URL</th>
    @if(in_array('2',$permission) || session('useradmin')['super_org_id']=='1')
    <th>Order BY</th>
    @endif
    <th>Action</th>
  </tr>
  </thead>
  <tbody>
  @foreach($view as $viewlist)
  <tr>
    <td>{{$viewlist->mnu_name}}</td>
    <td>{{$viewlist->mnu_url}}</td>
    @if(in_array('2',$permission) || session('useradmin')['super_org_id']=='1')
    <td><input type="text" class="form-control orderby" value="{{$viewlist->mnu_order}}" id="order_by{{$viewlist->mnu_id}}" name="order_by">
                    <button class="btn btn-primary btn-lg" onclick="orderby('{{$viewlist->mnu_id}}')">Save</button>
                  </td>
                  @endif
    <td>
    @if(in_array('2',$permission) || session('useradmin')['super_org_id']=='1')
    <input type="hidden" name="_token" id="token{{$viewlist->mnu_id}}" value="{{ csrf_token() }}">
    @if($viewlist->mnu_status=='active')
    <button type="button" class="btn btn-info btn-lg" onclick="getactive('{{$viewlist->mnu_id}}','inactive')">Active</button>
    @else
    <button type="button" class="btn btn-danger btn-lg" onclick="getactive('{{$viewlist->mnu_id}}','active')">Inactive</button>
    @endif  
    <a class="btn btn-warning btn-lg" href="{{ url('/admin/edit-menu/'.$viewlist->mnu_id) }}">Edit</a>
    @endif
    @if(in_array('4',$permission) || session('useradmin')['super_org_id']=='1')
    <a class="btn btn-danger btn-lg" href="{{ url('/admin/delete-menu/'.$viewlist->mnu_id) }}">Delete</a>
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
      url: "{{url('/admin/getactive-menu')}}",
      type: "post",
      // dataType : "json",
      data: {
        "id": id,
        "mnu_status": status,
        "_token": token
      },
      success: function(data) {
        location.href = "{{url('/admin/menu')}}";
      },
    });
  }

  function orderby(id) {
    var token = $('#token' + id).val();
    var mnu_order = $('#order_by' + id).val();
    // alert(token);return false;
    $.ajax({
      url: "{{url('/admin/orderby-menu')}}",
      type: "post",
      // dataType : "json",
      data: {
        "id": id,
        "mnu_order": mnu_order,
        "_token": token
      },
      success: function(data) {
  
      },
    });
  }
</script>
@endsection