@extends('admin.master')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="page-title">
      <div>
        <h1>Video List</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="{{url('/admin/service-video-inner')}}">Video</a></li>
          <li class="active">Video List</li>
        </ul>
      </div>
      <div>
      @if(in_array('1',$permission) || session('useradmin')['super_org_id']=='1')
        <a href="{{url('/admin/add-service-video-inner')}}" class="btn btn-primary">Add Video</a>
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
                  <th>Id</th>
                  <th>Service Category</th>
                  <th>Service</th>
                  <th>Video Heading</th>
                  <th>Image</th>
                  <th style="width:15%">Order By</th>
                  <th style="width:15%">Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- Start foreach loop -->
                @foreach($view as $key => $viewlist)
                <?php
                $secondsec = App\Traits\CategoryTrait::allvideocategorylist($viewlist->video_service_id);
                ?>
                <tr>                    
                  <td>
                   {{$key + 1}}
                  </td>
                  <td>
                  @if(in_array('47',$permissionoprid))
                  @if(isset($secondsec['fifservice_name']))
                  {{$secondsec['fifservice_name']}}
                  @endif
                  @else
                  @if(in_array('46',$permissionoprid))
                  @if(isset($secondsec['fourservice_name']))
                    {{$secondsec['fourservice_name']}}
                    @endif
                    @else
                    @if(in_array('45',$permissionoprid))
                    @if(isset($secondsec['threeservice_name']))
                    {{$secondsec['threeservice_name']}}
                    @endif
                    @else
                    @if(in_array('44',$permissionoprid))
                    @if(isset($secondsec['secservice_name']))
                    {{$secondsec['secservice_name']}}
                    @endif
                    @else
                    @if(in_array('22',$permissionoprid))
                    @if(isset($secondsec['firstservice_name']))
                    {{$secondsec['firstservice_name']}}
                    @endif
                    @endif
                    @endif
                    @endif
                    @endif
                    @endif
                  </td>
                  <td>
                  @foreach($resultservice as $resultservicelist)
                  @if($resultservicelist->vid_ser_id == $viewlist->video_service_id)
                    {{$resultservicelist->name}}
                    @endif
                  @endforeach
                  </td>
                  <td>
                  {{$viewlist->name}}
                  </td>
                  <td>
                  @if($viewlist->image!='')
                    <img src="{{url('/'.session('useradmin')['site_url'].'backend/service_video/inner/'.$viewlist->image)}}" style="width: 85px;height: 85px;"><br>
                 
                 @else
                    <img src="{{url('/images/no_image.jpg')}}" style="width:85px;height:85px;">
                 
                 @endif
                  
                  </td>
                  <td>
                  @if(in_array('2',$permission) || session('useradmin')['super_org_id']=='1')
                  <input type="text" class="form-control orderby" value="{{$viewlist->order_by}}" id="order_by{{$viewlist->vid_inn_id}}" name="order_by">
                  <button class="btn btn-primary btn-lg" onclick="orderby('{{$viewlist->vid_inn_id}}')">Save</button>
                  @else
                    {{$viewlist->order_by}}
                  @endif
                  </td>
                  <td>
                  <input type="hidden" name="_token" id="token{{$viewlist->vid_inn_id}}" value="{{ csrf_token() }}">
                  @if($viewlist->status=='active')
                  <button type="button" class="btn btn-info btn-lg" onclick="getactive('{{$viewlist->vid_inn_id}}','inactive')">Active</button>
                  @else
                  <button type="button" class="btn btn-danger btn-lg" onclick="getactive('{{$viewlist->vid_inn_id}}','active')">Inactive</button>
                  @endif
                  @if($viewlist->vid_inn_status == 'preview')
                  @if(in_array('2',$permission) || session('useradmin')['super_org_id']=='1')
                  <a href="{{url('/admin/edit_service_video_inner/'.$viewlist->vid_inn_id)}}" class="btn btn-warning btn-lg"><i class="fa fa-edit"></i></a>&nbsp;
                  @endif
                  @else
                  <a data-toggle="modal" data-target="#video{{$viewlist->vid_inn_id}}" class="btn btn-success  btn-lg"><i class="fa fa-eye"></i></a>&nbsp;
                  @endif
                  @if(in_array('1',$permission) || session('useradmin')['super_org_id']=='1')
                    <a onclick="return confirm('Are you sure you want to delete?')"  href="{{url('/admin/delete_service_video_inner/'.$viewlist->vid_inn_id)}}" class="btn btn-danger btn-lg"><i class="fa fa-trash"></i></a>
                    @endif
                 
                     <!-- Modal -->
<div id="video{{$viewlist->vid_inn_id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">{{$viewlist->name}}</h4>
      </div>
      <div class="modal-body">
      <table class="table table-hover table-bordered" id="sampleTable">
              <tbody>
                <tr>
                  <td>Id</td>
                  <td>{{$viewlist->vid_inn_id}}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Category Name</td>
                  <td>@if(in_array('47',$permissionoprid))
                  @if(isset($secondsec['fifservice_name']))
                  {{$secondsec['fifservice_name']}}
                  @endif
                  @else
                  @if(in_array('46',$permissionoprid))
                  @if(isset($secondsec['fourservice_name']))
                    {{$secondsec['fourservice_name']}}
                    @endif
                    @else
                    @if(in_array('45',$permissionoprid))
                    @if(isset($secondsec['threeservice_name']))
                    {{$secondsec['threeservice_name']}}
                    @endif
                    @else
                    @if(in_array('44',$permissionoprid))
                    @if(isset($secondsec['secservice_name']))
                    {{$secondsec['secservice_name']}}
                    @endif
                    @else
                    @if(in_array('22',$permissionoprid))
                    @if(isset($secondsec['firstservice_name']))
                    {{$secondsec['firstservice_name']}}
                    @endif
                    @endif
                    @endif
                    @endif
                    @endif
                    @endif
                  </td>
                </tr>
                <tr>
                  <td style="width: 20%;">Service Name</td>
                  <td>{{$viewlist->servicename}}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Name</td>
                  <td>{{$viewlist->name}}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Image</td>
                  <td><img src="{{url('/'.session('useradmin')['site_url'].'backend/service_video/inner/'.$viewlist->image)}}" class="imgwidth"></td>
                </tr>
                <tr>
                  <td style="width: 20%;">Videolink</td>
                  <td>{{ $viewlist->video}}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Alt Tag</td>
                  <td>{{ $viewlist->alt_img}}</td>
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
    </div>
  </section>
</section>
<script>
 function getactive(id,status){
   var token = $('#token' + id).val();
      // alert(token);return false;
       $.ajax({
        url : "{{url('/admin/getactive-video-inner')}}",
        type : "post",
       // dataType : "json",
        data : {"id":id,"status" : status,"_token":token},
        success : function(data) {
            location.href= "{{url('/admin/service-video-inner')}}";
        },
    });
   }
   
   function orderby(id){
   var token = $('#token' + id).val();
   var order_by = $('#order_by' + id).val();
      // alert(token);return false;
       $.ajax({
        url : "{{url('/admin/orderby-video-inner')}}",
        type : "post",
       // dataType : "json",
        data : {"id":id,"order_by" : order_by,"_token":token},
        success : function(data) {
           // location.href= "{{url('/admin/service-category')}}";
        },
    });
   }
</script>
<!--main content end-->
@endsection