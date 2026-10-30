{{-- layout --}}
@extends('layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Edit Memu Operation')

@section('page-style')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/login.css')}}">
@endsection

{{-- page content --}}
@section('content')
<a class="waves-effect waves-light btn mr-1 fl-ri" href="{{ url('organization') }}">Home</a>
<div class="section">
    <div class="card">
        <div class="card-content">
        <a class="waves-effect waves-light btn mr-1 fl-ri" href="{{ url('menu-operation') }}">Back</a>
        </div>
    </div>
</div>
    <!-- <div id="login-page" class="row"> -->
  <!-- <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8"> -->
    <form class="login-form" method="POST" action="{{ url('menu-operation-update/'. $edit->mnu_oper_id) }}">
      @csrf
      <div class="row">
        <div class="input-field col s12 text-centre">
          <h5 class="ml-4">{{ __('Edit Menu Operation') }}</h5>
        </div>
      </div>

      <div class="row margin">
      <div class="input-field col s12">
       <select name="cfg_mun_id">
       <option value="">Select Menu</option>
       @foreach($menu as $key => $menulist)
       <option value="{{ $menulist->mnu_id }}" @if($menulist->mnu_id == $edit->cfg_mun_id) selected @endif>{{ $menulist->mnu_name }}</option>
       @endforeach
       </select>

       <select name="cfg_op_id[]" multiple rows=5>
       <option value="" >Select Operation</option>
       @foreach($operation as $key => $operlist)
       <option value="{{ $operlist->op_id }}" @if($menulist->op_id == $edit->cfg_op_id) selected @endif>{{ $operlist->op_name }}</option>
       @endforeach
       </select>
            
      </div>


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
  <!-- </div>
</div> -->
@endsection