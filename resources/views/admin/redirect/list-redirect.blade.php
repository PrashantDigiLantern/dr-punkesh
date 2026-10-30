@extends('admin.master')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="page-title">
      <div>
        <h1>Redirect List</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="active">Redirect List</li>
        </ul>
      </div>
      <div>
        @if(in_array('1',$permission) || session('useradmin')['super_org_id']=='1')
        <a href="{{url('/admin/add-redirect')}}" class="btn btn-primary">Add Redirect</a>
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
                  <th>Redirect Page Name</th>
                  <th style="width:15%">Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- Start foreach loop -->
                @foreach($view as $viewlist)
                <tr>
                  <td>
                    {{$viewlist->redirect_id}}
                  </td>
                  <td>
                    {{$viewlist->page_name}}
                  </td>

                  <td>
                    <input type="hidden" name="_token" id="token{{$viewlist->redirect_id}}" value="{{ csrf_token() }}">
                    @if($viewlist->status=='active')
                    <button type="button" class="btn btn-info btn-lg" onclick="getactive('{{$viewlist->redirect_id}}','inactive')">Active</button>
                    @else
                    <button type="button" class="btn btn-danger btn-lg" onclick="getactive('{{$viewlist->redirect_id}}','active')">Inactive</button>
                    @endif
                    @if($viewlist->redirect_status == 'preview')
                    @if(in_array('2',$permission) || session('useradmin')['super_org_id']=='1')
                    <a href="{{url('/admin/edit_redirect/'.$viewlist->redirect_id)}}" class="btn btn-warning  btn-lg"><i class="fa fa-edit"></i></a>&nbsp;
                    @endif
                    @else
                    <a data-toggle="modal" data-target="#redirect{{$viewlist->redirect_id}}" class="btn btn-success  btn-lg"><i class="fa fa-eye"></i></a>&nbsp;
                    @endif
                    @if(in_array('4',$permission) || session('useradmin')['super_org_id']=='1')
                    <a onclick="return confirm('Are you sure you want to delete?')" href="{{url('/admin/delete_redirect/'.$viewlist->redirect_id)}}" class="btn btn-danger  btn-lg"><i class="fa fa-trash"></i></a>
                    @endif

                    <!-- Modal -->
                    <div id="redirect{{$viewlist->redirect_id}}" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">{{$viewlist->page_name}}</h4>
                          </div>
                          <div class="modal-body">
                            <table class="table table-hover table-bordered" id="sampleTable">
                              <tbody>
                                <tr>
                                  <td>Id</td>
                                  <td>{{$viewlist->redirect_id}}</td>
                                </tr>
                                <tr>
                                  <td style="width: 20%;">Page Name</td>
                                  <td>{{$viewlist->page_name}}</td>
                                </tr>
                                <tr>
                                  <td style="width: 20%;">Old Url</td>
                                  <td>{{ $viewlist->old_url}}</td>
                                </tr>
                                <tr>
                                  <td style="width: 20%;">Current Url</td>
                                  <td>{{$viewlist->current_url}}</td>
                                </tr>
                                <tr>
                                  <td style="width: 20%;">Port</td>
                                  <td>{{$viewlist->port}}</td>
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
        url : "{{url('/admin/redirect-getactive')}}",
        type : "post",
       // dataType : "json",
        data : {"id":id,"status" : status,"_token":token},
        success : function(data) {
            location.href= "{{url('/admin/redirect')}}";
        },
    });
   }
  </script>

<!--main content end-->
@endsection