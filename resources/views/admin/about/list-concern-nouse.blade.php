@extends('admin.master')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="page-title">
      <div>
        <h1>List About Concern</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="{{url('/admin/concern')}}">About</a></li>
          <li class="active">List About Concern</li>
        </ul>
      </div>
      <div>
        <a href="{{url('/admin/add-concern')}}" class="btn btn-primary">Add Concern</a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- Start foreach loop -->
                @foreach($view as $viewlist)
                <tr>
                  <td>
                    {{$viewlist->con_id}}
                  </td>

                  <td>
                    {{$viewlist->name}}
                  </td>
                  <td>
                  {!! substr($viewlist->sort_desc, 0, 130).'...' !!}
                  </td>

                  <td>
                    <a href="{{url('/admin/edit_concern/'.$viewlist->con_id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>&nbsp;
                    <a onclick="return confirm('Are you sure you want to delete?')" href="{{url('admin/delete_concern/'.$viewlist->con_id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>

                  </td>
                </tr>
                @endforeach
                <!-- End foreach loop -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</section>
<!--main content end-->
@endsection