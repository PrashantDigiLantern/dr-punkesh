@extends('admin.master')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="page-title">
      <div>
        <h1>Request A CallBack List</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="{{url('/admin/contact')}}">Forms</a></li>
          <li class="active">Request A CallBack List</li>
        </ul>
      </div>
      <div><button id="export" class="btn btn-primary">Export</button></div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Mobile</th>
                  <th>Created Date</th>
                </tr>
              </thead>
              <tbody>
                <!-- Start foreach loop -->
                @foreach($view as $viewlist)
                <tr>                    
                  <td>
                   {{$viewlist->request_id}}
                  </td>
                  <td>
                  {{$viewlist->name}}
                  </td>
                  <td>
                  {{$viewlist->phone}}
                  </td>
                  <td>
                  {{$viewlist->created_at}}
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

<script type="text/javascript">
  $("button").click(function(){
  $("#sampleTable").table2excel({
    // exclude CSS class
    exclude: ".noExl",
    name: "Worksheet Name",
    filename: "Request.xls" //do not include extension
  }); 
});
</script>
<!--main content end-->
@endsection