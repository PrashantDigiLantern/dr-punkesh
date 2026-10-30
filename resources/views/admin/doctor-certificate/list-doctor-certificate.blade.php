@extends('admin.master')
@section('content')
<!--main content start-->
<div id="main">
<section id="main-content">
  <section class="wrapper">
    <div class="page-title">
	
					 <div class="content-wrapper-before  gradient-45deg-indigo-purple "> </div>
	<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
<div class="container">
  <div class="row">
    <div class="col s10 m6 l6">
      <h5 class="breadcrumbs-title mt-0 mb-0"><span>Doctor Certificate List</span></h5>
      <ol class="breadcrumbs mb-0">
        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Home</a>
        </li>
        <li class="breadcrumb-item"><a href="{{url('/doctor-certificate')}}">Doctor Certificate</a>
        </li>
        <li class="breadcrumb-item active">Doctor Certificate List</li>
      </ol>
    </div>
  </div>
</div>
</div>
	
		<div class="container">
<div class="card">
        <div class="card-content textalign">
     <div>
     @if(in_array('1',$permission) || session('useradmin')['super_org_id']=='1')
        <a href="{{url('/admin/add-doctor-certificate')}}" class="btn btn-primary">Add Doctor Certificate</a>
        @endif
      </div>
  </div>
</div>
</div>
	
	
	
     <!-- <div>
        <h1>Doctor Certificate List</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="{{url('/admin/doctor-certificate')}}">Doctor Certificate</a></li>
          <li class="active">Doctor Certificate List</li>
        </ul>
      </div>
      <div>
      @if(in_array('1',$permission) || session('useradmin')['super_org_id']=='1')
        <a href="{{url('/admin/add-doctor-certificate')}}" class="btn btn-primary">Add Doctor Certificate</a>
        @endif
      </div>-->
    </div>
<div class="container">
    <div class="card">
      <div class="card-body">
        <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Image</th>
                  <th style="width:15%">Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- Start foreach loop -->
                @foreach($view as $viewlist)
                <tr>                    
                  <td>
                   {{$viewlist->certificate_id}}
                  </td>
                  <td>
                  @if($viewlist->certificate_image!='')
                    <img src="{{url('/'.session('useradmin')['site_url'].'backend/certificate/'.$viewlist->certificate_image)}}" style="width: 85px;height: 85px;"><br>
                 @else
                    <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                 @endif
                  
                  </td>
                
                  <td>
                  <input type="hidden" name="_token" id="token{{$viewlist->certificate_id}}" value="{{ csrf_token() }}">
                  @if($viewlist->certificate_status == 'preview')
                  @if(in_array('2',$permission) || session('useradmin')['super_org_id']=='1')
                  <a href="{{url('/admin/edit_doctor_certificate/'.$viewlist->certificate_id)}}" class="btn btn-warning  btn-lg"><i class="fa fa-edit"></i></a>&nbsp;
                  @endif
                  @else
                  <a data-toggle="modal" data-target="#certificate{{$viewlist->certificate_id}}" class="btn btn-success  btn-lg"><i class="fa fa-eye"></i></a>&nbsp;
                  @endif
                  @if(in_array('4',$permission) || session('useradmin')['super_org_id']=='1')
                  <a onclick="return confirm('Are you sure you want to delete?')"  href="{{url('/admin/delete_doctor_certificate/'.$viewlist->certificate_id)}}" class="btn btn-danger  btn-lg"><i class="fa fa-trash"></i></a>
                  @endif
                 
                    <!-- Modal -->
<div id="certificate{{$viewlist->certificate_id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      <table class="table table-hover table-bordered" id="sampleTable">
              <tbody>
                <tr>
                  <td>Id</td>
                  <td>{{$viewlist->certificate_id}}</td>
                </tr>
                <tr>
                  <td>certificate Show Type</td>
                  <td>{{$viewlist->certificate_show_type}}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Image</td>
                  <td><img src="{{url('/'.session('useradmin')['site_url'].'backend/certificate/'.$viewlist->certificate_image)}}" class="imgwidth"></td>
                </tr>
                <tr>
                  <td style="width: 20%;">Full Image</td>
                  <td><img src="{{url('/images/certificate/'.$viewlist->full_image)}}" class="imgwidth"></td>
                </tr>
                <tr>
                
                  <td style="width: 20%;">Alt Tag</td>
                  <td>{{$viewlist->alt_tag}}</td>
                </tr>
              </tbody>
                  </td>
                </tr> 
            </table>
            </div>
     
     </div>
 
   </div>
 </div>
                   </td>
                 </tr> 
                @endforeach
                 <!-- End foreach loop -->
               </tbody>
             </table>
       
      </div>
    </div>
 </div>
  </section>
</section>
</div>

<!--main content end-->
@endsection