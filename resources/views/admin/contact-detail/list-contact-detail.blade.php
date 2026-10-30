@extends('admin.master')
@section('content')
<section id="main-content">
  <section class="wrapper">
  <div class="page-title">
      <div>
        <h1>Address List</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="{{url('/admin/address-list')}}">Address</a></li>
          <li class="active">Address List</li>
        </ul>
      </div>
      <div>
        <a href="{{url('/admin/add-address')}}" class="btn btn-primary">Add Address</a>
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
                  <th>Address</th>
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
                    {{$viewlist->name}}
                  </td>
                  <td>
                    {{ $viewlist->address }}
                  </td>
                 
                  <td>
                    @if(in_array('2',$permission) || session('useradmin')['super_org_id']=='1')
                    <input type="text" class="form-control orderby" value="{{$viewlist->order_by}}" id="order_by{{$viewlist->contact_id}}" name="order_by">
                    <button class="btn btn-primary btn-lg" onclick="orderby('{{$viewlist->contact_id}}')">Save</button>
                    @else
                    {{$viewlist->order_by}}
                    @endif
                  </td>
                  <td>
                    <input type="hidden" name="_token" id="token{{$viewlist->contact_id}}" value="{{ csrf_token() }}">
                    @if($viewlist->status=='active')
                    <button type="button" class="btn btn-info btn-lg" onclick="getactive('{{$viewlist->contact_id}}','inactive')">Active</button>
                    @else
                    <button type="button" class="btn btn-danger btn-lg" onclick="getactive('{{$viewlist->contact_id}}','active')">Inactive</button>
                    @endif
                    @if($viewlist->contact_status == 'preview')
                    @if(in_array('2',$permission) || session('useradmin')['super_org_id']=='1')
                    <a href="{{url('/admin/edit_address/'.$viewlist->contact_id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>&nbsp;
                    @endif
                    @else
                    <a data-toggle="modal" data-target="#doctor{{$viewlist->contact_id}}" class="btn btn-success  btn-lg"><i class="fa fa-eye"></i></a>&nbsp;
                    @endif
                    @if(in_array('4',$permission) || session('useradmin')['super_org_id']=='1')
                    <a onclick="return confirm('Are you sure you want to delete?')" href="{{url('/admin/delete_address/'.$viewlist->contact_id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    @endif




                    <!-- Modal -->
                    <div id="doctor{{$viewlist->contact_id}}" class="modal fade" role="dialog">
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
                                  <td>{{$viewlist->contact_id}}</td>
                                </tr>
                                <tr>
                                  <td style="width: 20%;">Name</td>
                                  <td>{{$viewlist->name}}</td>
                                </tr>
                                <tr>
                                  <td style="width: 20%;">Address</td>
                                  <td>{{ $viewlist->address }}</td>
                                </tr>
                                <tr>
                                  <td style="width: 20%;">Address1</td>
                                  <td>{{ $viewlist->address1 }}</td>
                                </tr>
                                <tr>
                                  <td style="width: 20%;">Address2</td>
                                  <td>{{ $viewlist->address2 }}</td>
                                </tr>
                                <tr>
                                  <td style="width: 20%;">Pincode</td>
                                  <td>{{ $viewlist->pincode }}</td>
                                </tr>
                                
                                <tr>
                                  <td style="width: 20%;">Email Id</td>
                                  <td>{{ $viewlist->email_id}}</td>
                                </tr>
                                <tr>
                                  <td style="width: 20%;">Phone</td>
                                  <td>{{ $viewlist->phone}}</td>
                                </tr>
                                <tr>
                                  <td style="width: 20%;">Timings</td>
                                  <td>{{$viewlist->timings}}</td>
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
  
   function addphone(){
    $.ajax({
        type: "get",
        cache: false,
        async: false,
        url:   "{{url('/admin/addphone')}}",
        data: {'post': 'ok'},
        success: function (result)
        {   
            $("#addphone").append(result);  
        },
        complete: function () {
        },
    });
    }

    addday

    function removephone(rand){
        $("#remove"+rand).remove();
    }

    function removephonelist(rand){
        $("#removephone"+rand).remove();
    }

    function addemail(){
    $.ajax({
        type: "get",
        cache: false,
        async: false,
        url:   "{{url('/admin/addemail')}}",
        data: {'post': 'ok'},
        success: function (result)
        {   
            $("#addemail").append(result);  
        },
        complete: function () {
        },
    });
    }

    function removeemail(rand){
        $("#remove"+rand).remove();
    }

    function removeemaillist(rand){
        $("#removeemail"+rand).remove();
    }

    function addday(){
    $.ajax({
        type: "get",
        cache: false,
        async: false,
        url:   "{{url('/admin/addday')}}",
        data: {'post': 'ok'},
        success: function (result)
        {   
            $("#addday").append(result);  
        },
        complete: function () {
        },
    });
    }

    

    function removeday(rand){
        $("#remove"+rand).remove();
    }

    function removedaylist(rand){
        $("#removeday"+rand).remove();
    }

    function getactive(id, status) {
    var token = $('#token' + id).val();
    // alert(token);return false;
    $.ajax({
      url: "{{url('/admin/getactive-address')}}",
      type: "post",
      // dataType : "json",
      data: {
        "id": id,
        "status": status,
        "_token": token
      },
      success: function(data) {
        location.href = "{{url('/admin/address-list')}}";
      },
    });
  }

  function orderby(id) {
    var token = $('#token' + id).val();
    var order_by = $('#order_by' + id).val();
    // alert(token);return false;
    $.ajax({
      url: "{{url('/admin/orderby-address')}}",
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