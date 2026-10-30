@extends('admin.master')
@section('content')
<!--main content start-->
<div id="main">
<section id="main-content">
  <section class="wrapper">
    <div>
        <h1>List Services Category</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="{{url('/admin/service-category')}}">Services Category</a></li>
          <li class="active">Services Category List</li>
        </ul>
      </div>
      <div>
      @if(in_array('1',$permission) || session('useradmin')['super_org_id']=='1')
        <a href="{{url('/admin/add-service-category')}}" class="btn btn-primary">Add Service Category</a>
      @endif
      </div>
	
		

	
    <div class="row">
      <div class="col-md-12">

        <div class="card">
          <div class="card-body">
          <?php //echo '<pre>';print_r(session('userinfo')); echo '</pre>';?>
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Category Name</th>
                  <th style="width:15%">Order By</th>
                  <th style="width:15%">Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($view as $key => $viewlist)
                <tr>
                  <td>
                    {{$key + 1 }}
                  </td>
                  <td>
                    {{$viewlist->service_name}}
                  </td>
                  <td>
                    @if(in_array('2',$permission) || session('useradmin')['super_org_id']=='1')
                    <input type="text" class="form-control orderby" value="{{$viewlist->order_by}}" id="order_by{{$viewlist->ser_id}}" name="order_by">
                    <button class="btn btn-primary btn-lg" onclick="orderby('{{$viewlist->ser_id}}')">Save</button>
                    @else
                    {{$viewlist->order_by}}
                    @endif
                  </td>
                  <td>
                    <input type="hidden" name="_token" id="token{{$viewlist->ser_id}}" value="{{ csrf_token() }}">
                    @if($viewlist->status=='active')
                    <button type="button" class="btn btn-info btn-lg" onclick="getactive('{{$viewlist->ser_id}}','inactive')">Active</button>
                    @else
                    <button type="button" class="btn btn-danger btn-lg" onclick="getactive('{{$viewlist->ser_id}}','active')">Inactive</button>
                    @endif
                    @if($viewlist->ser_status == 'preview')
                    @if(in_array('2',$permission) || session('useradmin')['super_org_id']=='1')
                    <a href="{{url('/admin/edit_service_category/'.$viewlist->ser_id)}}" class="btn btn-warning btn-lg"><i class="fa fa-edit"></i></a>&nbsp;
                    @endif
                    @else
                    <a data-toggle="modal" data-target="#service{{$viewlist->ser_id}}" class="btn btn-success  btn-lg"><i class="fa fa-eye"></i></a>&nbsp;
                    @endif
                    @if(in_array('4',$permission) || session('useradmin')['super_org_id']=='1')
                    <a onclick="return confirm('Are you sure you want to delete?')" href="{{url('/admin/delete_service_category/'.$viewlist->ser_id)}}" class="btn btn-danger btn-lg"><i class="fa fa-trash"></i></a>
                    @endif
                    <!-- Modal -->
                    <div id="service{{$viewlist->ser_id}}" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">{{$viewlist->service_name}}</h4>
                          </div>
                          <div class="modal-body">
                            <table class="table table-hover table-bordered" id="sampleTable">
                              <tbody>
                                <tr>
                                  <td>Id</td>
                                  <td>{{$viewlist->ser_id}}</td>
                                </tr>
                                <tr>
                                  <td style="width: 20%;">Name</td>
                                  <td>{{$viewlist->service_name}}</td>
                                </tr>
                                <tr>
                                  <td style="width: 20%;">Short Description</td>
                                  <td>{!! $viewlist->short_desc !!}</td>
                                </tr>
                                <tr>
                                  <td style="width: 20%;">Description</td>
                                  <td>{!! $viewlist->description !!}</td>
                                </tr>
                                <tr>
                                  <td style="width: 20%;">Banner Type</td>
                                  <td>{{$viewlist->video_type}}</td>
                                </tr>
                                <tr>
                                  <td style="width: 20%;">Image</td>
                                  <td><img src="{{url('/'.session('useradmin')['site_url'].'backend/service/image/'.$viewlist->service_image)}}" class="imgwidth"></td>
                                </tr>
                                <tr>
                                  @if($viewlist->video_type=='image')
                                  <td style="width: 20%;">Banner Image</td>
                                  <td><img src="{{url('/'.session('useradmin')['site_url'].'backend/service/banner/'.$viewlist->service_banner_image)}}" class="imgwidth"></td>
                                  @else
                                  <td style="width: 20%;">Videolink</td>
                                  <td>{{ $viewlist->video_link}}</td>
                                  @endif
                                </tr>
                                <tr>

                <tr>
                  <td style="width: 20%;">Alt Tag</td>
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
                  <td>{{$viewlist->canonical_tag}}</td>
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
  </section>
</section>
</div>
<script>
  function getactive(id, status) {
    var token = $('#token' + id).val();
    // alert(token);return false;
    $.ajax({
      url: "{{url('/admin/getactive-service-category')}}",
      type: "post",
      // dataType : "json",
      data: {
        "id": id,
        "status": status,
        "_token": token
      },
      success: function(data) {
        location.href = "{{url('/admin/service-category')}}";
      },
    });
  }

  function orderby(id) {
    var token = $('#token' + id).val();
    var order_by = $('#order_by' + id).val();
    // alert(token);return false;
    $.ajax({
      url: "{{url('/admin/orderby-service-category')}}",
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