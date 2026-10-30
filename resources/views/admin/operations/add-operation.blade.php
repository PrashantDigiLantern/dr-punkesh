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
          <h1>Add Operation</h1>
          <ul class="breadcrumb side">
            <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
            <li><a href="{{url('/admin/operation')}}">Operation List</a></li>
            <li class="active">Add Operation</li>
          </ul>
        </div>
      </div>
    </div>

    <div class="card">
        <div class="card-content">
    <form class="login-form" method="POST" id="myForm" action="{{ url('admin/operationsave') }}">
      @csrf
  

      <div class="row margin">
        <div class="form-group col-md-4 col s4">
        <label class="control-label" for="op_name">Operation Name</label>
          <input id="op_name" class="form-control" type="text" name="op_name" required>
        </div>
       
        
        <div class="form-group col-md-4 col s4">
        <label class="control-label">Select Service Type<span class="red-text">*</span></label>
        <select name="op_ser_type" class="form-control" id="op_ser_type" required>
          <option value="" disabled selected>Select Service Type</option>
          <option value="health">Health</option>
          <option value="ecommerce">E-commerce</option>
       </select>
        </div>
        <div class="form-group col-md-4 col s4">
        <label class="control-label">Select Type<span class="red-text">*</span></label>
        <select name="op_type" class="form-control" id="op_type" required>
       <option value="" disabled selected>Select Type</option>
       <option value="frontend">Backend</option>
       <option value="backend">Site Backend</option>
       </select>
        </div>
        <div class="form-group col-md-4 col s4">
        <label class="control-label" for="op_icon_link">Operation Icon</label>
          <input id="op_icon_link" class="form-control" name="op_icon_link" type="text" required>
        </div>
        <div class="form-group col-md-4 col s4">
        <label class="control-label" for="op_link">Operation URL</label>
        <textarea id="op_link" class="form-control" name="op_link" required></textarea>
        </div>
      
      <input type="hidden" name="created_by" value="{{session('userinfo')['usr_id']}}">
      <div class="col-sm-12 marginT30 col s12" style="padding-top: 20px; padding-bottom: 20px;">
              <button type="submit" class="btn btn-primary icon-btn" onclick="validatesec()">
                <i class="fa fa-fw fa-lg fa-check-circle"></i>Submit
              </button>&nbsp;&nbsp;&nbsp;
              <a class="btn btn-default icon-btn" href="{{url('/admin/operation')}}">
                <i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel
              </a>
            </div>
            </div>
    </form>

    </div>
</div>
@endsection