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
        <form class="login-form" method="POST" id="myForm" action="{{ url('admin/user-role-permission-save') }}">
      @csrf
        <div class="row">
        <div class="col s12">
        <div class="form-group col-md-4 col s4">
        <label class="labeltype">Select User<span class="red-text">*</span></label>
            <select name="usr_id" id="usr_id" class="form-control" required>
            <option value="" disabled selected>Select User</option>
            @foreach($user as $userlist)
              <option value="{{ $userlist->usr_id }}">{{ $userlist->usr_first_name.' '.$userlist->usr_last_name }}</option>
              @endforeach
              </select>
            </div>

            <div class="form-group col-md-4 col s4">
            <label class="labeltype">Select Role<span class="red-text">*</span></label>
            <select name="role_id" id="role_id" class="form-control" required>
            <option value="" disabled selected>Select Role</option>
            @foreach($role as $rolelist)
              <option value="{{ $rolelist->role_id }}">{{ $rolelist->role_name }}</option>
              @endforeach
              </select>
            </div>

            <div class="form-group col-md-4 col s4">
            <label class="labeltype">Select Action<span class="red-text">*</span></label>
            <select name="act_id[]" id="act_id" class="form-control" multiple onchange="roleconfigmenulist()" required>
            <option value="">Select Action</option>
              @foreach($action as $actionlist)
              <option value="{{ $actionlist->act_id }}">{{ $actionlist->act_name }}</option>
              @endforeach
              </select>
            </div>
            
            <div id="roleconfigmenu"></div>
            
          
        <input type="hidden" name="created_by" value="{{session('userinfo')['usr_id']}}">
        <!-- <input type="hidden" name="role_org_id" value="{{session('userinfo')['user_org_id']}}"> -->
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
<script>

  roleconfigmenulist();
function roleconfigmenulist(){
    
  var role_id = $("#role_id").val();
  var actid = $("#act_id").val();
  if(actid == null){
    const actid = {};
  }
  
  // var act_id = actid.join(",");
  var act_id = '1,2';

  // alert(act_id);
  // return false;
  $.ajax({
    type: "post",
    url:  "{{url('/admin/permission-menulists')}}",
    data: {'role_id':role_id,'act_id':act_id},
    success: function (result)
    {   
        $("#roleconfigmenu").html(result);  
    },
    complete: function () {
    },
  });
  }

  </script>
@endsection


