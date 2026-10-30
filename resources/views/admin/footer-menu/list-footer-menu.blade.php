@extends('admin.master')
@section('content')
<section id="main-content">
  <section class="wrapper">
  <div class="page-title">
      <div>
        <h1>Footer Menu List</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="{{url('/admin/footer-menu')}}">Footer</a></li>
          <li class="active">Footer Menu List</li>
        </ul>
      </div>
      <div>
        <a href="{{url('/admin/add-footer-menu')}}" class="btn btn-primary">Add Footer Menu</a>
      </div>
    </div>
            <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Name</th>
                  <th>Order By</th>
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
                    {{$viewlist->footer_name}}
                  </td>
                  
                 
                  <td>
                    @if(in_array('2',$permission) || session('useradmin')['super_org_id']=='1')
                    <input type="text" class="form-control orderby" value="{{$viewlist->order_by}}" id="order_by{{$viewlist->footer_id}}" name="order_by">
                    <button class="btn btn-primary btn-lg" onclick="orderby('{{$viewlist->footer_id}}')">Save</button>
                    @else
                    {{$viewlist->order_by}}
                    @endif
                  </td>
                  <td>
                    <input type="hidden" name="_token" id="token{{$viewlist->footer_id}}" value="{{ csrf_token() }}">
                    @if($viewlist->status=='active')
                    <button type="button" class="btn btn-info btn-lg" onclick="getactive('{{$viewlist->footer_id}}','inactive')">Active</button>
                    @else
                    <button type="button" class="btn btn-danger btn-lg" onclick="getactive('{{$viewlist->footer_id}}','active')">Inactive</button>
                    @endif
                    @if($viewlist->footer_status == 'preview')
                    @if(in_array('2',$permission) || session('useradmin')['super_org_id']=='1')
                    <a href="{{url('/admin/edit_footer_menu/'.$viewlist->footer_id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>&nbsp;
                    @endif
                    @else
                    <a data-toggle="modal" data-target="#footerlist{{$viewlist->footer_id}}" class="btn btn-success  btn-lg"><i class="fa fa-eye"></i></a>&nbsp;
                    @endif
                    @if(in_array('4',$permission) || session('useradmin')['super_org_id']=='1')
                    <a onclick="return confirm('Are you sure you want to delete?')" href="{{url('/admin/delete_footer_menu/'.$viewlist->footer_id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    @endif

                    <!-- Modal -->
                    <div id="footerlist{{$viewlist->footer_id}}" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">{{$viewlist->footer_name}}</h4>
                          </div>
                          <div class="modal-body">
                            <table class="table table-hover table-bordered" id="sampleTable">
                              <tbody>
                                <tr>
                                  <td>Id</td>
                                  <td>{{$viewlist->footer_id}}</td>
                                </tr>
                                <tr>
                                  <td style="width: 20%;">Name</td>
                                  <td>{{$viewlist->footer_name}}</td>
                                </tr>
                                <tr>
                                  <td style="width: 20%;">Menu Name</td>
                                  <td>{{ $viewlist->menu_name}}</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>

                        </div>

                      </div>
                    </div>
                  </td>
                </tr>
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
   CKEDITOR.replace( 'textArea' );
  
    function getactive(id, status) {
    var token = $('#token' + id).val();
    // alert(token);return false;
    $.ajax({
      url: "{{url('/admin/getactive-footer-menu')}}",
      type: "post",
      // dataType : "json",
      data: {
        "id": id,
        "status": status,
        "_token": token
      },
      success: function(data) {
        location.href = "{{url('/admin/footer-menu')}}";
      },
    });
  }

  function orderby(id) {
    var token = $('#token' + id).val();
    var order_by = $('#order_by' + id).val();
    // alert(token);return false;
    $.ajax({
      url: "{{url('/admin/orderby-footer-menu')}}",
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
@endsection