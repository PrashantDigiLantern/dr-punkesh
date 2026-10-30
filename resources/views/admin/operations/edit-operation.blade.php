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
          <h1>Edit Operation</h1>
          <ul class="breadcrumb side">
            <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
            <li><a href="{{url('/admin/operation')}}">Operation List</a></li>
            <li class="active">Edit Operation</li>
          </ul>
        </div>
      </div>
    </div>

    <div class="card">
        <div class="card-content">

        <form class="login-form" method="POST" id="myForm" action="{{ url('admin/operationupdate/'. $edit->op_id) }}">
          @csrf
          <div class="row margin">
            <div class="form-group col-md-4 col s4">
            <label class="control-label" for="op_name">Operation Name</label>
              <input id="op_name" type="text" class="form-control" value="{{ $edit->op_name }}" name="op_name" required>
            </div>

            <div class="form-group col-md-4 col s4">
              <label class="control-label">Select Type<span class="red-text">*</span></label>
              <select name="op_ser_type" class="form-control" id="op_ser_type" required>
                <option value="" disabled selected>Select Type</option>
                <option value="health" @if($edit->op_ser_type=='health') selected @endif>Health</option>
                <option value="ecommerce" @if($edit->op_ser_type=='ecommerce') selected @endif>E-commerce</option>
              </select>
            </div>
            <div class="form-group col-md-4 col s4">
              <label class="control-label">Select Type<span class="red-text">*</span></label>
              <select name="op_type" class="form-control" id="op_type" required>
                <option value="" disabled selected>Select Type</option>
                <option value="frontend" @if($edit->op_type=='frontend') selected @endif>Backend</option>
                <option value="backend" @if($edit->op_type=='backend') selected @endif>Site Backend</option>
              </select>
            </div>
            <div class="form-group col-md-4 col s4">
            <label class="control-label" for="op_icon_link">Operation Icon</label>
              <input id="op_icon_link" class="form-control" name="op_icon_link" value="{{ $edit->op_icon_link }}" type="text" required>
            </div>

            <div class="form-group col-md-4 col s4">
            <label class="control-label" for="op_link">Operation URL</label>
              <input id="op_link" type="text" class="form-control" value="{{ $edit->op_link }}" name="op_link" required>
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
        </form>
      
    </div>
</div>
    </section>
</section>
</div>
@endsection