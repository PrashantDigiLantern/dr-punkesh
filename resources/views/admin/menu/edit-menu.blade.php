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
          <h1>Edit Menu</h1>
          <ul class="breadcrumb side">
            <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
            <li><a href="{{url('/admin/menu')}}">Menu List</a></li>
            <li class="active">Edit Menu</li>
          </ul>
        </div>
      </div>
    </div>

    <div class="card">
        <div class="card-content">

    <form class="login-form" method="POST" id="myForm" action="{{ url('admin/menuupdate/'. $edit->mnu_id) }}">
      @csrf
      <!-- <div class="row">
        <div class="input-field col s12 text-centre">
          <h5 class="ml-4">{{ __('Edit Menu') }}</h5>
        </div>
      </div> -->

      <div class="row margin">
        <div class="form-group col-md-4 col s4">
        <label class="control-label" for="mnu_name">Menu Name</label>
          <input id="mnu_name" type="text" class="form-control" value="{{ $edit->mnu_name }}" name="mnu_name" required>
        </div>
       
        <div class="form-group col-md-4 col s4">
        <label class="control-label" for="mnu_url">Menu URL</label>
        <input id="mnu_url" type="text" class="form-control" value="{{ $edit->mnu_url }}" name="mnu_url" required>
        </div>
        <div class="form-group col-md-4 col s4">
        <label class="control-label">Select Type<span class="red-text">*</span></label>
        <select name="mnu_ser_type" class="form-control" id="mnu_ser_type" required>
          <option value="" disabled selected>Select Type</option>
          <option value="health" @if($edit->mnu_ser_type=='health') selected @endif>Health</option>
          <option value="ecommerce" @if($edit->mnu_ser_type=='ecommerce') selected @endif>E-commerce</option>
       </select>
        </div>

        <div class="form-group col-md-4 col s4">
        <label class="control-label">Select Type<span class="red-text">*</span></label>
        <select name="mnu_type" class="form-control" id="mnu_type" required>
       <option value="" disabled selected>Select Type</option>
       <option value="frontend" @if($edit->mnu_type=='frontend') selected @endif>Backend</option>
       <option value="backend" @if($edit->mnu_type=='backend') selected @endif>Site Backend</option>
       </select>
        </div>

        <div class="form-group col-md-4 col s4">
        <label class="control-label">Select Dropdown<span class="red-text">*</span></label>
        <select name="mnu_dropdown" class="form-control" id="mnu_dropdown" required>
       <option value="" disabled selected>Select Dropdown</option>
       <option value="Yes" @if($edit->mnu_dropdown == 'Yes') selected @endif>Yes</option>
       <option value="No" @if($edit->mnu_dropdown == 'No') selected @endif>No</option>
       </select>
        </div>
        <div class="form-group col-md-4 col s4">
        <label class="control-label" for="mnu_icon">Menu Icon</label>
          <input id="mnu_icon" class="form-control" name="mnu_icon" value="{{ $edit->mnu_icon }}" type="text" required>
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