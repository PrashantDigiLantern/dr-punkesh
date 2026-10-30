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
          <h1>Add Role</h1>
          <ul class="breadcrumb side">
            <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
            <li><a href="{{url('/admin/user')}}">Role List</a></li>
            <li class="active">Add Role</li>
          </ul>
        </div>
      </div>
    </div>

    <div class="card">
        <div class="card-content">
        <form class="login-form" method="POST" id="myForm" action="{{ url('admin/user-role-save') }}">
      @csrf
        <div class="row">
        <div class="col s12">
                  <div class="form-group col-md-4 col s4">
                  <label class="control-label" for="role_name">Role Name</label>
                    <input id="role_name" class="form-control" type="text" name="role_name" required>
                  </div>

                  <div class="form-group col-md-4 col s4">
                  <label class="control-label" for="role_name">Role Name</label>
                    <input id="role_desc" class="form-control" type="text" name="role_desc" required>
                  </div>
                 
                  
               
        <input type="hidden" name="created_by" value="{{session('userinfo')['usr_id']}}">
        <input type="hidden" name="role_org_id" value="{{session('userinfo')['user_org_id']}}">
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
</div>
@endsection