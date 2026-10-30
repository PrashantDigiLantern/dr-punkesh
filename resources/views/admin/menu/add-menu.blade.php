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
          <h1>Add Menu</h1>
          <ul class="breadcrumb side">
            <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
            <li><a href="{{url('/admin/menu')}}">Menu List</a></li>
            <li class="active">Add Menu</li>
          </ul>
        </div>
      </div>
    </div>

    <div class="card">
        <div class="card-content">
    <form class="login-form" method="POST" id="myForm" action="{{ url('admin/menusave') }}">
      @csrf
      <div class="row margin">
        <div class="form-group col-md-4 col s4">
        <label class="control-label" for="mnu_name">Menu Name</label>
          <input id="mnu_name" class="form-control" type="text" name="mnu_name" required>
        </div>
       
        <div class="form-group col-md-4 col s4">
        <label class="control-label">Select Service Type<span class="red-text">*</span></label>
        <select name="mnu_ser_type" class="form-control" id="mnu_ser_type" required>
          <option value="" disabled selected>Select Service Type</option>
          <option value="health">Health</option>
          <option value="ecommerce">E-commerce</option>
       </select>
        </div>
        <div class="form-group col-md-4 col s4">
        <label class="control-label">Select Type<span class="red-text">*</span></label>
        <select name="mnu_type" class="form-control" id="mnu_type" required>
       <option value="" disabled selected>Select Type</option>
       <option value="frontend">Backend</option>
       <option value="backend">Site Backend</option>
       </select>
        </div>
        <div class="form-group col-md-4 col s4">
        <label class="control-label">Select Dropdown<span class="red-text">*</span></label>
        <select name="mnu_dropdown" class="form-control" id="mnu_dropdown" required>
       <option value="" disabled selected>Select Dropdown</option>
       <option value="Yes">Yes</option>
       <option value="No">No</option>
       </select>
        </div>
        <div class="form-group col-md-4 col s4">
        <label class="control-label" for="mnu_icon">Menu Icon</label>
          <input id="mnu_icon" class="form-control" name="mnu_icon" type="text" required>
        </div>
     
        <div class="form-group col-md-4 col s4">
        <label class="control-label" for="mnu_url">Menu URL</label>
        <input id="mnu_url" class="form-control" type="text" name="mnu_url" required>
        <!-- <textarea id="mnu_url" class="form-control" name="mnu_url" required></textarea> -->
        </div>
        
      <input type="hidden" name="created_by" value="{{session('userinfo')['usr_id']}}">
      <div class="col-sm-12 marginT30 col s12" style="padding-top: 20px; padding-bottom: 20px;">
              <button type="submit" class="btn btn-primary icon-btn" onclick="validatesec()">
                <i class="fa fa-fw fa-lg fa-check-circle"></i>Submit
              </button>&nbsp;&nbsp;&nbsp;
              <a class="btn btn-default icon-btn" href="{{url('/admin/user')}}">
                <i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel
              </a>
            </div>
            </div>
    </form>

    </div>
</div>
@endsection