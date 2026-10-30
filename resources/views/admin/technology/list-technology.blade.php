@extends('admin.master')
@section('content')

<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="page-title">
      <div>
        <h1>Technology List</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="{{url('/admin/technology')}}">Technology</a></li>
          <li class="active">Technology List</li>
        </ul>
      </div>
      <div>
      @if(in_array('1',$permission) || session('useradmin')['super_org_id']=='1')
        <a href="{{url('/admin/add-technology')}}" class="btn btn-primary">Add Technology</a>
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
                  <th>Technology Name</th>
                  <th>Description</th>
                  <th>Image</th>
                  <th style="width:15%">Order By</th>
                  <th style="width:15%">Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- Start foreach loop -->
                @foreach($view as $viewlist)
                <tr>                    
                  <td>
                   {{$viewlist->tech_id}}
                  </td>
                  <td>
                  {{$viewlist->name}}
                  </td>
                  <td>
                  {!! substr($viewlist->short_desc, 0, 130).'...' !!}
                  </td>
                  <td>
                  @if($viewlist->image!='')
                    <img src="{{url('/'.session('useradmin')['site_url'].'backend/service_video/technology/'.$viewlist->image)}}" style="width: 85px;height: 85px;"><br>
                 
                 @else
                    <img src="{{url('/images/no_image.jpg')}}" style="width:70px;height:70px;">
                 
                 @endif
                  
                  </td>
                  <td>
                  @if(in_array('2',$permission) || session('useradmin')['super_org_id']=='1')
                  <input type="text" class="form-control orderby" value="{{$viewlist->order_by}}" id="order_by{{$viewlist->tech_id}}" name="order_by">
                  <button class="btn btn-primary btn-lg" onclick="orderby('{{$viewlist->tech_id}}')">Save</button>
                  @else
                    {{$viewlist->order_by}}
                  @endif  
                </td>
                  <td>
                  <input type="hidden" name="_token" id="token{{$viewlist->tech_id}}" value="{{ csrf_token() }}">
                  @if($viewlist->status=='active')
                  <button type="button" class="btn btn-info btn-lg" onclick="getactive('{{$viewlist->tech_id}}','inactive')">Active</button>
                  @else
                  <button type="button" class="btn btn-danger btn-lg" onclick="getactive('{{$viewlist->tech_id}}','active')">Inactive</button>
                  @endif
		           <!-- <a href="{{url('/admin/edit_technology/'.$viewlist->tech_id)}}" class="btn btn-warning  btn-lg"><i class="fa fa-edit"></i></a>&nbsp; -->
               @if($viewlist->tech_status == 'preview')
               @if(in_array('2',$permission) || session('useradmin')['super_org_id']=='1')
               <a href="{{url('/admin/edit_technology/'.$viewlist->tech_id)}}" class="btn btn-warning  btn-lg"><i class="fa fa-edit"></i></a>&nbsp;
               @endif   
               @else
                  <a data-toggle="modal" data-target="#tech{{$viewlist->tech_id}}" class="btn btn-success  btn-lg"><i class="fa fa-eye"></i></a>&nbsp;
                  @endif
                  @if(in_array('4',$permission) || session('useradmin')['super_org_id']=='1')
               <a onclick="return confirm('Are you sure you want to delete?')"  href="{{url('/admin/delete_technology/'.$viewlist->tech_id)}}" class="btn btn-danger  btn-lg"><i class="fa fa-trash"></i></a>
                 @endif
               
              <!-- Modal -->
<div id="tech{{$viewlist->tech_id}}" class="modal fade" role="dialog">
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
                  <td>{{$viewlist->tech_id}}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Technology Name</td>
                  <td>{{$viewlist->name}}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Short Desc</td>
                  <td>{{strip_tags($viewlist->short_desc)}}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Description</td>
                  <td>{{strip_tags($viewlist->description)}}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Image</td>
                  <td><img src="{{url('/'.session('useradmin')['site_url'].'backend/service_video/technology/'.$viewlist->image)}}" class="imgwidth"></td>
                </tr>
                <tr>
                  <td style="width: 20%;">Banner Image</td>
                  <td><img src="{{url('/images/technology/'.$viewlist->banner_image)}}" class="imgwidth"></td>
                </tr>
                <tr>
                  <td style="width: 20%;">Title Tag</td>
                  <td>{{ $viewlist->title_tag}}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Keyword Tag</td>
                  <td>{{$viewlist->keyword_tag}}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Description Tag</td>
                  <td>{{$viewlist->description_tag}}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Canonical</td>
                  <td>{{$viewlist->canonical}}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Url</td>
                  <td>{{$viewlist->url}}</td>
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
        url : "{{url('/admin/getactive-technology')}}",
        type : "post",
       // dataType : "json",
        data : {"id":id,"status" : status,"_token":token},
        success : function(data) {
            location.href= "{{url('/admin/technology')}}";
        },
    });
   }
   
   function orderby(id){
   var token = $('#token' + id).val();
   var order_by = $('#order_by' + id).val();
      // alert(token);return false;
       $.ajax({
        url : "{{url('/admin/orderby-technology')}}",
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