@extends('admin.master')
@section('content')
<!--main content start-->
<div id="main">
<section id="main-content">
  <section class="wrapper">
    <div class="page-title">
	
		
					 <!-- <div class="content-wrapper-before  gradient-45deg-indigo-purple "> </div>
	<div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
<div class="container">
  <div class="row">
    <div class="col s10 m6 l6">
      <h5 class="breadcrumbs-title mt-0 mb-0"><span>Primary Menu List</span></h5>
      <ol class="breadcrumbs mb-0">
        <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Home</a>
        </li>
		   <li class="breadcrumb-item"><a href="{{url('/admin/admin/primary-menu')}}">Menu</a>
        </li>
        <li class="breadcrumb-item active">Primary Menu List</li>
      </ol>
    </div>
  </div>
</div>
</div>
	
		<div class="container">
<div class="card">
        <div class="card-content textalign">
  @if(in_array('1',$permission) || session('useradmin')['super_org_id']=='1')
        <a href="{{url('/admin/add-primary-menu')}}" class="btn btn-primary">Add Primary Menu</a>
      @endif
  </div>
</div>
</div> -->
	
	
	
	
      <div>
        <h1>Primary Menu List</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="{{url('/admin/primary-menu')}}">Menu</a></li>
          <li class="active">Primary Menu List</li>
        </ul>
      </div>
      <div>
      @if(in_array('1',$permission) || session('useradmin')['super_org_id']=='1')
        <a href="{{url('/admin/add-primary-menu')}}" class="btn btn-primary">Add Primary Menu</a>
      @endif
      </div>
    </div>
	<div class="container1">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Dropdown</th>
                  <th>Link</th>
                  <th>Status</th>
                  <th>Order By</th>
                  @if(in_array('2',$permission) || session('useradmin')['super_org_id']=='1')
                  <th>Change Menu</th>
                  @endif
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- Start foreach loop -->
                @foreach($view as $key => $viewlist)
                <tr>                    
                  <td>
                   {{$key+1}}
                  </td>
                  <td>
                  {{$viewlist->name}}
                  </td>
                  <td>
                  {{$viewlist->dropdown}}
                  </td>
                  <td>
                  {{$viewlist->urllink}}
                  </td>
                  <td>{{$viewlist->menu_status}}</td>
                  <td>
                  @if(in_array('2',$permission) || session('useradmin')['super_org_id']=='1')
                  <input type="text" class="form-control orderby" value="{{$viewlist->order_by}}" id="order_by{{$viewlist->mnu_id}}" name="order_by">
                  <button class="btn btn-primary btn-lg" onclick="orderby('{{$viewlist->mnu_id}}')">Save</button>
                  @else
                    {{$viewlist->order_by}}
                  @endif  
                </td>
                @if(in_array('2',$permission) || session('useradmin')['super_org_id']=='1')
                <td> 
                  @if($viewlist->menu_status == 'publish')
                  <select class="form-control" name="menuid" id="menuid{{$viewlist->mnu_id}}">
                    <option value="">Select Menu</option>
                    <option value="null">Main Menu</option>
                    @foreach($menuview as $menulist)
                    @if($menulist->mnu_id != $viewlist->mnu_id)
                      <option value="{{$menulist->mnu_id}}">{{$menulist->name}}</option>
                    @endif
                    @endforeach
                  </select>
                  @else
                  <select class="form-control" name="menuid" id="menuid{{$viewlist->mnu_id}}">
                    <option value="">Select Menu</option>
                    <option value="null">Main Menu</option>
                    @foreach($premenuview as $premenulist)
                    @if($premenulist->mnu_id != $viewlist->mnu_id)
                      <option value="{{$premenulist->mnu_id}}">{{$premenulist->name}}</option>
                    @endif
                    @endforeach
                  </select>
                  @endif
                  <button class="btn btn-primary btn-lg" onclick="menuassign('{{$viewlist->mnu_id}}')">Save</button>
                </td>
                @endif 
                  <td>
                  <input type="hidden" name="_token" id="token{{$viewlist->mnu_id}}" value="{{ csrf_token() }}">
                  @if($viewlist->status=='active')
                  <button type="button" class="btn btn-info btn-lg" onclick="getactive('{{$viewlist->mnu_id}}','inactive')">Active</button>
                  @else
                  <button type="button" class="btn btn-danger btn-lg" onclick="getactive('{{$viewlist->mnu_id}}','active')">Inactive</button>
                  @endif
                  @if($viewlist->menu_status == 'preview')
               @if(in_array('2',$permission) || session('useradmin')['super_org_id']=='1')
               <a href="{{url('/admin/edit_primary/'.$viewlist->mnu_id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>&nbsp;
               @endif   
               @else
                  <a data-toggle="modal" data-target="#primary{{$viewlist->mnu_id}}" class="btn btn-success  btn-lg"><i class="fa fa-eye"></i></a>&nbsp;
                  @endif
                  @if(in_array('4',$permission) || session('useradmin')['super_org_id']=='1')
               <a onclick="return confirm('Are you sure you want to delete?')"  href="{{url('/admin/delete_primary/'.$viewlist->mnu_id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
               @endif

                 <!-- Modal -->
<div id="primary{{$viewlist->mnu_id}}" class="modal fade" role="dialog">
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
                  <td>{{$viewlist->mnu_id}}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Name</td>
                  <td>{{strip_tags($viewlist->name)}}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Type</td>
                  <td>{{$viewlist->type}}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Page Heading</td>
                  <td>{{strip_tags($viewlist->page_heading)}}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Url</td>
                  <td>{{strip_tags($viewlist->urllink)}}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Dropdown</td>
                  <td>{{strip_tags($viewlist->dropdown)}}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Banner Image</td>
                  <td><img src="{{url('/'.session('useradmin')['site_url'].'backend/menu/'.$viewlist->menu_banner_image)}}" class="imgwidth"></td>
                </tr>
                <!-- <tr>
                  <td style="width: 20%;">Title Tag</td>
                  <td>{{ $viewlist->alt_tag}}</td>
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
                </tr> -->
                <tr>
                  <td style="width: 20%;">Status</td>
                  <td>{{$viewlist->status}}</td>
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
	</div>
  </section>
</section>
</div>
<script>
 function getactive(id,status){
    //   alert(id);return false;
    var token = $('#token' + id).val();
       $.ajax({
        url : "{{url('/admin/getactiveprimary')}}",
        type : "post",
       // dataType : "json",
        data : {"id":id,"status" : status,"_token": token},
        success : function(data) {
            location.href= "{{url('/admin/primary-menu')}}";
        },
    });
   }

   function menuassign(id,status){
    var token = $('#token' + id).val();
    var parent_id = $('#menuid' + id).val();
       $.ajax({
        url : "{{url('/admin/menuassign')}}",
        type : "post",
        data : {"id":id,"parent_id" : parent_id,"_token": token},
        success : function(data) {
            location.href= "{{url('/admin/primary-menu')}}";
        },
    });
   }
   
   function orderby(id) {
    var token = $('#token' + id).val();
    var order_by = $('#order_by' + id).val();
    // alert(token);return false;
    $.ajax({
      url: "{{url('/admin/orderby-primary')}}",
      type: "post",
      // dataType : "json",
      data: {
        "id": id,
        "order_by": order_by,
        "_token": token
      },
      success: function(data) {
        // location.href= "{{url('/admin/service-category')}}";
      },
    });
  }
</script>
<!--main content end-->
@endsection