@extends('admin.master')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="page-title">
      <div>
        <h1>Doctor Details List</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="{{url('/admin/doctor-detail')}}">Doctor</a></li>
          <li class="active">Doctor Details List</li>
        </ul>
      </div>
      <div>
        <a href="{{url('/admin/add-doctor-detail')}}" class="btn btn-primary">Add Doctor Details</a>
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
                  <th>Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- Start foreach loop -->
                @foreach($view as $viewlist)
                <tr>                    
                  <td>
                   {{$viewlist->doc_lit_id}}
                  </td>
                 
                  <td>
                  {{$viewlist->name}}
                  </td>
                  <td>
                  {!! substr($viewlist->description, 0, 130).'...' !!}
                  </td>
                  <td>
                  @if($viewlist->banner_image!='')
                    <img src="{{url('/'.session('useradmin')['site_url'].'backend/doctor/'.$viewlist->banner_image)}}" style="width: 85px;height: 85px;"><br>
                 
                 @else
                    <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;"><br>
                 
                 @endif
                  
                  </td>
                  <td>
		                <a href="{{url('/admin/edit_doctor_detail/'.$viewlist->doc_lit_id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>&nbsp;
                    <a onclick="return confirm('Are you sure you want to delete?')"  href="{{url('/admin/delete_doctor_detail/'.$viewlist->doc_lit_id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                 
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