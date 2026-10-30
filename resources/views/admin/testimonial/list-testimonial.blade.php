@extends('admin.master')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="page-title">
      <div>
        <h1>Testimonials List</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="{{url('/admin/testimonials')}}">Testimonials</a></li>
          <li class="active">Testimonials List</li>
        </ul>
      </div>
      <div>
      @if(in_array('1',$permission) || session('useradmin')['super_org_id']=='1')
        <a href="{{url('/admin/add-testimonials')}}" class="btn btn-primary">Add Testimonials</a>
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
                  <th>Source</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th style="width:15%">Action</th>
                </tr>
              </thead>
              <tbody>
                <!-- Start foreach loop -->
                @foreach($view as $viewlist)
                <tr>                    
                  <td>
                   {{$viewlist->test_id}}
                  </td>
                  <td>
                  {{$viewlist->source}}
                  </td>
                  <td>
                  {{$viewlist->name}}
                  </td>
                  <td>
                  {!! substr($viewlist->description, 0, 130).'...' !!}
                  </td>
                  <td>
                  {{ $viewlist->test_status }}
                  </td>
                  <td>
                  <input type="hidden" name="_token" id="token{{$viewlist->test_id}}" value="{{ csrf_token() }}">
                  @if($viewlist->status=='active')
                  <button type="button" class="btn btn-info btn-lg" onclick="getactive('{{$viewlist->test_id}}','inactive')">Active</button>
                  @else
                  <button type="button" class="btn btn-danger btn-lg" onclick="getactive('{{$viewlist->test_id}}','active')">Inactive</button>
                  @endif
                  @if($viewlist->test_status == 'preview')
                  @if(in_array('2',$permission) || session('useradmin')['super_org_id']=='1')
		              <a href="{{url('/admin/edit_testimonials/'.$viewlist->test_id)}}" class="btn btn-warning  btn-lg"><i class="fa fa-edit"></i></a>&nbsp;
                  @endif
                  @else
                  <a data-toggle="modal" data-target="#myModal{{$viewlist->test_id}}" class="btn btn-success  btn-lg"><i class="fa fa-eye"></i></a>&nbsp;
                  @endif
                  @if(in_array('4',$permission) || session('useradmin')['super_org_id']=='1')
                  <a onclick="return confirm('Are you sure you want to delete?')"  href="{{url('/admin/delete_testimonials/'.$viewlist->test_id)}}" class="btn btn-danger  btn-lg"><i class="fa fa-trash"></i></a>
                  @endif
                  

              <!-- Modal -->
<div id="myModal{{$viewlist->test_id}}" class="modal fade" role="dialog">
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
                  <td>{{$viewlist->test_id}}</td>
                </tr>
                <tr>
                  <td>Show Type</td>
                  <td>{{$viewlist->test_show_type}}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Short Name</td>
                  <td>{{$viewlist->short_name}}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Designation</td>
                  <td>{{$viewlist->designation}}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Source</td>
                  <td>{{$viewlist->source}}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Description</td>
                  <td>{{ strip_tags($viewlist->description)}}</td>
                </tr>
                <tr>
                  <td style="width: 20%;">Rating</td>
                  <td>{{$viewlist->rating}}</td>
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
        url : "{{url('/admin/getactive-testimonials')}}",
        type : "post",
       // dataType : "json",
        data : {"id":id,"status" : status,"_token":token},
        success : function(data) {
            location.href= "{{url('/admin/testimonials')}}";
        },
    });
   }
</script>
<!--main content end-->
@endsection