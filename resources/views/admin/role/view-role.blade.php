@extends('admin.master')
@section('content')
<!--main content start-->
<div id="main">
<section id="main-content">
  <section class="wrapper">
  <div class="page-title">
<div>
        <h1>Role List</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="active">Role List</li>
        </ul>
      </div>
      <div>
        @if(in_array('1',$permission) || session('useradmin')['super_org_id']=='1')
        <a href="{{url('/admin/add-role')}}" class="btn btn-primary">Add Role</a>
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
    <th>Serial Number</th>
    <th>Role Name</th>
    <th>Role Description</th>
    <th>Action</th>
  </tr>
  </thead>
  <tbody>
  @foreach($view as $key => $viewlist)
  <tr>
    <td>{{ $key + 1 }}</td>
    <td>{{ $viewlist->role_name }}</td>
    <td>{{ $viewlist->role_desc }}</td>
    <td>
    @if(in_array('2',$permission) || session('useradmin')['super_org_id']=='1')
    <a class="btn btn-warning  btn-lg" href="{{ url('admin/edit-role/'.$viewlist->role_id) }}">Edit</a>
    @endif
    @if(in_array('4',$permission) || session('useradmin')['super_org_id']=='1')
    <a class="btn btn-danger  btn-lg" href="{{ url('admin/delete-user-role/'.$viewlist->role_id) }}">Delete</a>
    @endif
    </td>
    <td>
    
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
@endsection