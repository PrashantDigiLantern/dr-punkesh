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
          <h1>Add Menu Operation</h1>
          <ul class="breadcrumb side">
            <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
            <li><a href="{{url('/admin/menu-operation')}}">Manage Menu Operation List</a></li>
            <li class="active">Add Menu Operation</li>
          </ul>
        </div>
      </div>
    </div>

    <div class="card">
        <div class="card-content">

    <form class="login-form" method="POST" id="myForm" action="{{ url('admin/menu-operation-save') }}">
      @csrf
      <!-- <div class="row">
        <div class="input-field col s12 text-centre">
          <h5 class="ml-4">{{ __('Create Menu Operation') }}</h5>
        </div>
      </div> -->

      <div class="row margin">     
      <div class="form-group col-md-4 col s4">
      <label class="labeltype">Select Menu<span class="red-text">*</span></label>
       <select name="cfg_mun_id" class="form-control" id="cfg_mun_id" required>
       <option value="" disabled selected>Select Menu</option>
       @foreach($menu as $key => $menulist)
       <option value="{{ $menulist->mnu_id }}">{{ $menulist->mnu_name }}</option>
       @endforeach
       </select>
</div>
<div class="form-group col-md-4 col s4">
<label class="labeltype">Select Operation<span class="red-text">*</span></label>
       <select name="cfg_op_id[]" id="cfg_op_id" class="form-control" multiple required>
       <option value="">Select Operation</option>
       @foreach($operation as $key => $operlist)
       <option value="{{ $operlist->op_id }}">{{ $operlist->op_name }}</option>
       @endforeach
       </select>
            
      </div>

      
      <input type="hidden" name="created_by" value="{{session('userinfo')['usr_id']}}">
      <div class="col-sm-12 marginT30 col s12" style="padding-top: 20px; padding-bottom: 20px;">
        <button type="submit" class="btn btn-primary icon-btn" onclick="validatesec()">
          <i class="fa fa-fw fa-lg fa-check-circle"></i>Submit
        </button>&nbsp;&nbsp;&nbsp;
        <a class="btn btn-default icon-btn" href="{{url('/admin/menu-operation')}}">
          <i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel
        </a>
      </div>
      </div>
    </form>
 </div>
 </div>
 </div>
 </div>
 <!-- </div> -->
@endsection