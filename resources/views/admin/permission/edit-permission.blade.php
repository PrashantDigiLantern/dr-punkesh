{{-- extend layout --}}
<!-- @extends('layouts.contentLayoutMaster') -->

{{-- page title --}}
@section('title','Edit Role')



{{-- page content --}}
@section('content')

<div class="section">
    <div class="card">
        <div class="card-content">
        <a class="waves-effect waves-light btn mr-1 fl-ri" href="{{ url('role') }}">Back</a>
        </div>
    </div>
    <div class="card">
        <div class="card-content">
        <form class="login-form" method="POST" action="{{ url('user-role-update/'.$edit->role_id) }}">
      @csrf
        <div class="row">
        <div class="col s12">
                  <div class="input-field col s3">
                    <input id="role_name" type="text" name="role_name" value="{{ $edit->role_name }}">
                    <label for="role_name">Role Name</label>
                  </div>

                  <div class="input-field col s3">
                    <input id="role_desc" type="text" name="role_desc" value="{{ $edit->role_desc }}">
                    <label for="role_desc">Role Description</label>
                  </div>
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

    </div>
</div>
</div>
@endsection