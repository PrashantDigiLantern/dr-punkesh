
@extends('admin.master')
@section('content')
<!--main content start-->
<div id="main">
<section id="main-content">
  <section class="wrapper">
  <div class="page-title">
<div>
        <h1>Manage Menu Operation List</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="active">Manage Menu Operation List</li>
        </ul>
      </div>
      <div>
      @if(in_array('1',$permission) || session('useradmin')['super_org_id']=='1')
        <a href="{{url('/admin/add-menu-operation')}}" class="btn btn-primary">Manage Menu Operation</a>
        @endif
      </div>
  </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
          <table class="table table-hover table-bordered" id="sampleTable">
            
<thead>
  <tr>
    <th>Mnu oper ID</th>
    <th>Operation Name</th>
    <th>Menu Name</th>
    <th>Action</th>
  </tr>
  </thead>
  <tbody>
  @foreach($view as $viewlist)
  <tr>
    <td>{{$viewlist->mnu_oper_id}}</td>
    
    <td>{{$viewlist->op_name}}</td>
    
    <td>
    <form class="login-form" method="POST" action="{{ url('admin/menu-operation-update/'. $viewlist->mnu_oper_id) }}">
      @csrf
    <div class="row margin">
      <div class="input-field col s8">
       <select name="cfg_mun_id" class="form-control">
       <option value="">Select Menu</option>
       @foreach($menu as $key => $menulist)
       <option value="{{ $menulist->mnu_id }}" @if($menulist->mnu_id == $viewlist->cfg_mun_id) selected @endif>{{ $menulist->mnu_name }}</option>
       @endforeach
       </select>
      </div>
      @if(in_array('2',$permission) || session('useradmin')['super_org_id']=='1')
      <div class="input-field col s4">
      <input type="hidden" name="updated_by" value="{{session('userinfo')['user_org_id']}}">
      <button type="submit" class="btn btn-warning btn-lg">
            Save
          </button>
      </div>
      @endif
    </form>
    </td>
   
    <td>
    @if(in_array('4',$permission) || session('useradmin')['super_org_id']=='1')
    <a class="btn btn-danger btn-lg" href="{{ url('admin/menu-operation-delete/'.$viewlist->mnu_oper_id) }}">Delete</a>
    @endif
    </td>
  </tr>
  @endforeach
  </tbody>
</table>
</div>
        </div>
      </div>
    </div>
        </div>
</section>
</section>

@endsection