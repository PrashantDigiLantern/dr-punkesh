@extends('admin.master')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="page-title">
      <div>
        <h1>Our Service & Exclusive List</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="{{url('/admin/ourservice')}}">Home</a></li>
          <li class="active">Our Service & Exclusive List</li>
        </ul>
      </div>
      <div>
        <a href="{{url('/admin/add-ourservice')}}" class="btn btn-primary">Add Our Service & Exclusive</a>
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
                  <th>Type</th>
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
                   {{$viewlist->our_id}}
                  </td>
                  <td>
                  @if($viewlist->type=='service')
                    Our Service
                  @else
                    Exclusive Treatments
                  @endif
                  </td>
                  <td>
                  {{$viewlist->name}}
                  </td>
                  <td>
                  {!! substr($viewlist->description, 0, 130).'...' !!}
                  </td>
                
                  <td>
		           <a href="{{url('/admin/edit_ourservice/'.$viewlist->our_id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>&nbsp;
               <a onclick="return confirm('Are you sure you want to delete?')"  href="{{url('/admin/delete_ourservice/'.$viewlist->our_id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                 
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