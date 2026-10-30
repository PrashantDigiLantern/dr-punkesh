@extends('admin.master')
@section('content')
@php 
$primeid = session('primeid');
@endphp
<section id="main-content">
  <section class="wrapper">
    <div class="card cardsec">
      <div class="card-body">
        <div class="page-title pagetitle">
          <h1>Add Redirect</h1>
          <ul class="breadcrumb side">
            <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
            <li><a href="{{url('/admin/redirect')}}">Redirect List</a></li>
            <li class="active">Add Redirect</li>
          </ul>
        </div>
      </div>
    </div>
    <!-- Start form here -->
    <form action="{{URL::to('/admin/create_redirect')}}" id="myForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
      <input type="hidden" value="{{ csrf_token() }}" name="_token">
      <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
      <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
      <input type="hidden" name="created_by" value="{{session('useradmin')['usr_id']}}">
      <input type="hidden" name="redirect_id" id="redirect_id" value="@if(isset($primeid)){{$primeid}}@else 0 @endif">
      <!-- @csrf -->
      <div class="card">
        <div class="card-body">
          <div class="row">

            <div class="form-group col-md-4">
              <label class="control-label">Redirect Page Name</label>
              <input class="form-control" readonly value="@if(isset($view->page_name)){{$view->page_name}}@endif" type="text">
            </div>

            <div class="form-group col-sm-4">
              <label>Port</label>
              <select class="form-control" name="port">
                <option value="">Select Port</option>
                <option value="301" @if(isset($view->port))@if($view->port=='301') selected @endif @endif>301</option>
                <option value="302" @if(isset($view->port))@if($view->port=='302') selected @endif @endif>302</option>
              </select>
            </div>
            
            <!-- <div class="form-group col-sm-12"> -->
              <!-- <label>Old Route Url</label> -->
              <input class="form-control" name="oldrouteurl" value="@if(isset($view->oldrouteurl)){{$view->oldrouteurl}}@endif" type="hidden" required>
            <!-- </div> -->

            <div class="form-group col-sm-12">
              <label>Old Url <span class="testex">(Only url Ex: /old-url)</span></label>
              <input class="form-control" name="old_url" value="@if(isset($view->old_url)){{$view->old_url}}@endif" type="text" required>
            </div>

            <div class="form-group col-sm-12">
              <label>Current Url <span class="testex">(Only url Ex: /current-url)</span></label>
              <input class="form-control" name="current_url" value="@if(isset($view->current_url)){{$view->current_url}}@endif" type="text" required>
            </div>

            <div class="col-sm-12 marginT30">
              <button type="submit" class="btn btn-primary icon-btn" onclick="validatesec()">
                <i class="fa fa-fw fa-lg fa-check-circle"></i>Submit
              </button>&nbsp;&nbsp;&nbsp;
              <a class="btn btn-default icon-btn" href="{{url('/admin/redirect')}}">
                <i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel
              </a>
            </div>
          </div>
        </div>
      </div>
    </form>
    <!-- End form -->

  </section>
</section>

<script>
  CKEDITOR.replace('textArea');
</script>
@endsection