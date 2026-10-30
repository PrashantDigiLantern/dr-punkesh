@extends('admin.master')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="page-title">
      <div>
        <h1>footer List</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="{{url('/admin/footer')}}">footer</a></li>
          <li class="active">footer List</li>
        </ul>
      </div>
      <div>
      @if(in_array('1',$permission) || session('useradmin')['super_org_id']=='1')
      @if($count < 1)
        <a href="{{url('/admin/add-footer')}}" class="btn btn-primary">Add footer</a>
        @endif
        @endif
      </div>
    </div>

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
                    <img src="{{url('/'.session('useradmin')['site_url'].'backend/footer/'.$viewlist->header_logo)}}" style="width: 85px;height: 85px;"><br>
                 @else
                    <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                 @endif
                  
                  </td>
                
                  <td>
                  <input type="hidden" name="_token" id="token{{$viewlist->footer_id}}" value="{{ csrf_token() }}">
                  @if($viewlist->footer_status == 'preview')
                  @if(in_array('2',$permission) || session('useradmin')['super_org_id']=='1')
                  <a href="{{url('/admin/edit_footer/'.$viewlist->footer_id)}}" class="btn btn-warning  btn-lg"><i class="fa fa-edit"></i></a>&nbsp;
                  @endif
                  @else
                  <a data-toggle="modal" data-target="#footer{{$viewlist->footer_id}}" class="btn btn-success  btn-lg"><i class="fa fa-eye"></i></a>&nbsp;
                  @endif
                  @if(in_array('4',$permission) || session('useradmin')['super_org_id']=='1')
                  <a onclick="return confirm('Are you sure you want to delete?')"  href="{{url('/admin/delete_footer/'.$viewlist->footer_id)}}" class="btn btn-danger  btn-lg"><i class="fa fa-trash"></i></a>
                  @endif
                 
                    <!-- Modal -->
<div id="footer{{$viewlist->footer_id}}" class="modal fade" role="dialog">
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
                  <td><img src="{{url('/'.session('useradmin')['site_url'].'backend/footer/'.$viewlist->header_logo)}}" class="imgwidth"></td>
                </tr>
                <tr>
                  <td style="width: 20%;">Footer Logo</td>
                  <td><img src="{{url('/'.session('useradmin')['site_url'].'backend/footer/'.$viewlist->footer_logo)}}" class="imgwidth"></td>
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

  </section>
</section>

<!--main content end-->
@endsection