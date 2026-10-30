@extends('admin.master')
@section('content')

<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="page-title">
      <div>
        <h1>Google Recaptcha List</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="{{url('/admin/google-recaptcha')}}">Setup & Configuration</a></li>
          <li class="active">Google Recaptcha List</li>
        </ul>
      </div>
      <div>
      @if(in_array('1',$permission) || session('useradmin')['super_org_id']=='1')
        <a href="{{url('/admin/add-google-recaptcha')}}" class="btn btn-primary">Add Google Recaptcha</a>
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
                  <th>Site Key</th>
                  <th style="width:15%">Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- Start foreach loop -->
                @foreach($view as $viewlist)
                <tr>                    
                  <td>
                  {{$viewlist->site_key}}
                  </td>
                  <td>
                  <input type="hidden" name="_token" id="token{{$viewlist->google_id}}" value="{{ csrf_token() }}">
                  @if($viewlist->status=='active')
                  <button type="button" class="btn btn-info btn-lg" onclick="getactive('{{$viewlist->google_id}}','inactive')">Active</button>
                  @else
                  <button type="button" class="btn btn-danger btn-lg" onclick="getactive('{{$viewlist->google_id}}','active')">Inactive</button>
                  @endif
		           
               @if($viewlist->google_status == 'preview')
               @if(in_array('2',$permission) || session('useradmin')['super_org_id']=='1')
               <a href="{{url('/admin/edit_google_recaptcha/'.$viewlist->google_id)}}" class="btn btn-warning  btn-lg"><i class="fa fa-edit"></i></a>&nbsp;
               @endif   
               @else
                  <a data-toggle="modal" data-target="#google{{$viewlist->google_id}}" class="btn btn-success  btn-lg"><i class="fa fa-eye"></i></a>&nbsp;
                  @endif
                  @if(in_array('4',$permission) || session('useradmin')['super_org_id']=='1')
               <a onclick="return confirm('Are you sure you want to delete?')"  href="{{url('/admin/delete_google_recaptcha/'.$viewlist->google_id)}}" class="btn btn-danger  btn-lg"><i class="fa fa-trash"></i></a>
                 @endif
               
              <!-- Modal -->
<div id="google{{$viewlist->google_id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Google Recaptcha</h4>
      </div>
      <div class="modal-body">
      <table class="table table-hover table-bordered" id="sampleTable">
              <tbody>
                <tr>
                  <td>Id</td>
                  <td>{{$viewlist->google_id}}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Site Key</td>
                  <td>{{$viewlist->site_key}}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Secret Key</td>
                  <td>{{$viewlist->secret_key}}</td>
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