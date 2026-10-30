@extends('admin.master')
@section('content')
@php 
$primeid = session('primeid');
@endphp
<div id="main">
<section id="main-content">
    <section class="wrapper">
	
    <div class="card cardsec">
      <div class="card-body">
        <div class="page-title pagetitle">
          <h1>Edit List</h1>
          <ul class="breadcrumb side">
            <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
            <li><a href="{{url('/admin/user')}}">User List</a></li>
            <li class="active">Edit User</li>
          </ul>
        </div>
      </div>
    </div>

    <div class="card">
        <div class="card-content">
        <form class="login-form" method="POST" id="myForm" action="{{ url('admin/user-role-update/'.$edit->role_id) }}">
      @csrf
        <div class="row">
        <div class="col s12">
                  <div class="form-group col-md-4 col s4">
                  <label for="role_name" class="control-label">Role Name</label>
                    @if($edit->role_name=='Super User')
                    <input id="role_name" type="text" class="form-control" readonly name="role_name" value="{{ $edit->role_name }}" required>
                    @else
                    <input id="role_name" type="text" class="form-control" name="role_name" value="{{ $edit->role_name }}" required>
                    @endif
                  </div>

                  <div class="form-group col-md-4 col s4">
                  <label for="role_desc" class="control-label">Role Description</label>
                    <input id="role_desc" type="text" class="form-control" name="role_desc" value="{{ $edit->role_desc }}" required>
                  </div>
                
        <input type="hidden" name="updated_by" value="{{session('userinfo')['usr_id']}}">
        <div class="col-sm-12 marginT30 col s12" style="padding-top: 20px; padding-bottom: 20px;">
              <button type="submit" class="btn btn-primary icon-btn" onclick="validatesec()">
                <i class="fa fa-fw fa-lg fa-check-circle"></i>Submit
              </button>&nbsp;&nbsp;&nbsp;
              <a class="btn btn-default icon-btn" href="{{url('/admin/user')}}">
                <i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel
              </a>
            </div>
            </div>
        </div>
    </form>

    </div>
</div>
    </section>
</section>
</div>
@endsection