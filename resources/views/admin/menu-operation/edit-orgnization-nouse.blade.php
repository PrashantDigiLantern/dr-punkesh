{{-- layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Edit Organization')

@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/login.css')}}">
@endsection

{{-- page content --}}
@section('content')
<a class="waves-effect waves-light btn mr-1 fl-ri" href="{{ url('organization') }}">Home</a>
<div class="section">
    <div class="card">
        <div class="card-content">
        <a class="waves-effect waves-light btn mr-1 fl-ri" href="{{ url('organization') }}">Back</a>
        </div>
    </div>
</div>
    <div id="login-page" class="row">
  <div class="col s10 m10 20 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8">
    <form class="login-form" method="POST" action="{{ url('orgupdate/'. $edit->org_id) }}">
      @csrf
      <div class="row">
        <div class="input-field col s12 text-centre">
          <h5 class="ml-4">{{ __('Edit Organization') }}</h5>
        </div>
      </div>

      <div class="row margin">
        <div class="input-field col s12">
          <input id="org_name" type="text" value="{{ $edit->org_name }}" name="org_name">
          <label for="org_name">Organization Name</label>
        </div>
      </div>

      <div class="input-field col s12">
          <input id="org_email" value="{{ $edit->org_email }}" type="text" name="org_email">
          <label for="org_email">Organization Email</label>
        </div>

      <input type="hidden" name="updated_by" value="{{session('userinfo')['usr_id']}}">
      <div class="row">
        <div class="input-field col s12">
          <button type="submit" class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">
            Save
          </button>
        </div>
      </div>

    </form>
  </div>
</div>
@endsection