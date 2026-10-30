@extends('admin.master')
@section('content')
<!--main content start-->
<div id="main">
<section id="main-content">
  <section class="wrapper">
  <div class="page-title">
<div>
        <h1>User List</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="active">User List</li>
        </ul>
      </div>
      <div>
        @if(in_array('1',$permission) || session('useradmin')['super_org_id']=='1')
        <a href="{{url('/admin/add-register')}}" class="btn btn-primary">Add Register</a>
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
    <th>Name</th>
    <th>Email ID</th>
    <th>Phone Number</th>
    <th>Action</th>
  </tr>
  </thead>
  <tbody>
  @foreach($view as $key => $viewlist)
  <tr>
    <td>{{ $key + 1 }}</td>
    <td>{{ $viewlist->usr_first_name.' '.$viewlist->usr_last_name }}</td>
    <td>{{ $viewlist->usr_email }}</td>
    <td>{{ $viewlist->usr_mobile }}</td>
    <td>
    @if(in_array('2',$permission) || session('useradmin')['super_org_id']=='1')
    <a class="btn btn-warning  btn-lg" href="{{ url('admin/edit-register/'.$viewlist->usr_id) }}">Edit</a>
    @endif
    @if(in_array('4',$permission) || session('useradmin')['super_org_id']=='1')
    <a class="btn btn-danger  btn-lg" href="{{ url('admin/delete-user-register/'.$viewlist->usr_id) }}">Delete</a>
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
@endsection