@extends('admin.master')
@section('content')
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <div class="page-title">
      <div>
        <h1>Contact Us List</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li><a href="{{url('/admin/contact')}}">Forms</a></li>
          <li class="active">Contact Us List</li>
        </ul>
      </div>
      <div><button id="export" class="btn btn-primary">Export</button></div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
          <form action="{{url('/admin/create-appointment-mail')}}" method="post">
          <input type="hidden" value="{{ csrf_token() }}" name="_token"> 
          <input type="hidden" name="site_id" value="{{session('useradmin')['site_id']}}">
            <input type="hidden" name="org_id" value="{{session('useradmin')['org_id']}}">
            <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                <label>Name</label>
                <input class="form-control"  name="name" type="text">
            </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                <label>Email</label>
                <input class="form-control"  name="email" type="text">
            </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                <label>Phone</label>
                <input class="form-control"  name="phone" type="text">
            </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                <label>Select Date</label>
                <input class="form-control"  name="date" type="date">
            </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                <label>Concern</label>
                <select name="concern" class="form-control">
                <option value="selected ">Concern</option>
                <option value="Acne Treatments ">Acne/Pimple</option>
                <option value="After Weight Loss ">Acne Scars</option>
                <option value="Arm Lift ">Pigmentation &amp; Skin Glow</option>
                <option value="Body Lift ">Hairfall/Hair Loss</option>
                <option value="Body Lift ">Anti-Aging</option>
                <option value="Body Lift ">Stretch Marks</option>
                <option value="Body Lift ">General Skin Concern</option>
                <option value="Body Lift ">Non-Surgical</option>
                <option value="Body Lift ">Infections</option>
                </select>
            </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                <label>Message</label>
                <textarea class="form-control"  name="message"></textarea>
                
            </div>
            </div>
            <input type="submit" class="btn btn-primary" value="submit">
            </div>
            </form>
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
    filename: "Contact.xls" //do not include extension
  }); 
});
</script>
<!--main content end-->
@endsection