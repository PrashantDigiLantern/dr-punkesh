@extends('admin.master')
@section('content')
<!--main content start-->
<div id="main">
<section id="main-content">
  <section class="wrapper">
    <div class="page-title">
	 <!-- <div class="content-wrapper-before  gradient-45deg-indigo-purple "> </div> -->
<!-- <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
<div class="container">
  <div class="row">
    <div class="col s10 m6 l6">
      <h5 class="breadcrumbs-title mt-0 mb-0"><span>Logo List</span></h5>
      <ol class="breadcrumbs mb-0">
        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Home</a>
        </li>
        <li class="breadcrumb-item"><a href="{{url('/admin/logo-list')}}">Logo</a>
        </li>
        <li class="breadcrumb-item active">Logo List</li>
      </ol>
    </div>
  </div>
</div>
</div> -->
	
     <div>
        <h1>Logo List</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="{{url('/admin/logo-list')}}">Logo</a></li>
          <li class="active">Logo List</li>
        </ul>
      </div>
      <div>
      @if(in_array('1',$permission) || session('useradmin')['super_org_id']=='1')
      @if($count < 1)
        <a href="{{url('/admin/add-logo')}}" class="btn btn-primary">Add Logo</a>
        @endif
        @endif
      </div>
    </div>
	
	<div class="container1">

    <div class="card">
      <div class="card-body">
        <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Header Logo</th>
                  <th style="width:15%">Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- Start foreach loop -->
                @foreach($view as $viewlist)
                <tr>                    
                  <td>
                    
                   {{$viewlist->footer_id}}
                  </td>
                  <td>
                  @if($viewlist->header_logo!='')
                    <img src="{{url('/'.session('useradmin')['site_url'].'backend/logo/'.$viewlist->header_logo)}}" style="width: 85px;height: 85px;"><br>
                 @else
                    <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                 @endif
                  
                  </td>
                
                  <td>
                  <input type="hidden" name="_token" id="token{{$viewlist->footer_id}}" value="{{ csrf_token() }}">
                  @if($viewlist->footer_status == 'preview')
                  @if(in_array('2',$permission) || session('useradmin')['super_org_id']=='1')
                  <a href="{{url('/admin/edit_logo/'.$viewlist->footer_id)}}" class="btn btn-warning  btn-lg"><i class="fa fa-edit"></i></a>&nbsp;
                  @endif
                  @else
                  <a data-toggle="modal" data-target="#logo{{$viewlist->footer_id}}" class="btn btn-success  btn-lg"><i class="fa fa-eye"></i></a>&nbsp;
                  @endif
                  @if(in_array('4',$permission) || session('useradmin')['super_org_id']=='1')
                  <a onclick="return confirm('Are you sure you want to delete?')"  href="{{url('/admin/delete_logo/'.$viewlist->footer_id)}}" class="btn btn-danger  btn-lg"><i class="fa fa-trash"></i></a>
                  @endif
                 
                    <!-- Modal -->
<div id="logo{{$viewlist->footer_id}}" class="modal fade" role="dialog">
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
                  <td>{{$viewlist->footer_id}}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Header Logo</td>
                  <td><img src="{{url('/'.session('useradmin')['site_url'].'backend/logo/'.$viewlist->header_logo)}}" class="imgwidth"></td>
                </tr>
                <tr>
                  <td style="width: 20%;">Footer Logo</td>
                  <td><img src="{{url('/'.session('useradmin')['site_url'].'backend/logo/'.$viewlist->footer_logo)}}" class="imgwidth"></td>
                </tr>
                
                <tr>
                <td style="width: 20%;">Footer Description</td>
                <td>{{$viewlist->description}}</td>
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