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
        <form class="login-form" method="POST" id="myForm" action="{{ url('admin/user-register-update/'.$edit->usr_id) }}">
      @csrf
        <div class="row">
        <div class="col s12">
                  <div class="form-group col-md-4 col s4">
                  <label class="control-label" for="usr_first_name">First Name</label>
                    <input id="usr_first_name" type="text" class="form-control" name="usr_first_name" value="{{ $edit->usr_first_name }}" required>
                  </div>

                  <div class="form-group col-md-4 col s4">
                  <label class="control-label" for="usr_last_name">Last Name</label>
                    <input id="usr_last_name" type="text" class="form-control" name="usr_last_name" value="{{ $edit->usr_last_name }}" required>
                  </div>
                
                  <div class="form-group col-md-4 col s4">
                  <label class="control-label" for="email">Email</label>
                    <input id="email" type="email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" name="usr_email" value="{{ $edit->usr_email }}" required>
                    <input id="usr_email" type="hidden" name="oldusr_email" value="{{ $edit->usr_email }}">
                    
                  </div>
                  <div class="form-group col-md-4 col s4">
                  <label class="control-label" for="phone">Phone Numer</label>
                    <input id="phone" type="text" class="form-control" minlength="10" maxlength="10" name="usr_mobile" value="{{ $edit->usr_mobile }}" required>
                  </div>

                  <div class="form-group col-md-4 col s4">
                  <label class="control-label" for="usr_password">Password</label>
                    <input id="usr_password" type="text" class="form-control" name="usr_password" value="" required>
                  </div>
               
        <input type="hidden" name="created_by" value="{{session('userinfo')['usr_id']}}">
      <!-- <div class="row">
        <div class="input-field col s12">
          <button type="submit" class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12"  onclick="validatesec()">
            Save
          </button>
        </div>
      </div> -->
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