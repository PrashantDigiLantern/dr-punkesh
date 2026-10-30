@extends('admin.master')
@section('content')

<style type="">
    .panel-primary>.panel-heading{height:115px;}
.panel-green .panel-heading{height: 115px;}
.page-header-content{
    margin-bottom: 20px;
}
.total_candidate{
    display: inline-block;
    text-align: center;
    width: 100%;
    padding-top: 10px;
    font-weight: normal;
    font-size: 12px;
    letter-spacing: 0.8px;
    text-transform: uppercase;
}
.orange_bg {
    border-color: #ff8a65;
}
.orange_bg>.panel-heading {
    color: #fff;
    background-color: #ff8a65;
    border-color: #ff8a65;
}
.orange_bg a{
        color: #ff8a65;
}
.blue_bg {
    border-color: #093f88;
}
.blue_bg>.panel-heading {
    color: #fff;
    background-color: #093f88;
    border-color: #093f88;
    padding: 10px 15px;
}
.blue_bg a{
        color: #093f88;
}
.pink_bg {
    border-color: #f06292;
}
.pink_bg>.panel-heading {
    color: #fff;
    background-color: #f06292;
    border-color: #f06292;
    padding: 10px 15px;
}
.pink_bg a{
        color: #f06292;
}
.purple_bg {
    border-color: #9575cd;
}
.purple_bg>.panel-heading {
    color: #fff;
    background-color: #9575cd;
    border-color: #9575cd;
    padding: 10px 15px;
}
.purple_bg a{
        color: #9575cd;
}
.bg-indigo-400 {
    background-color: #093f88;
    border-color: #093f88;
    color: #fff;
}
.fontsmall{
    font-size: 45px;
    margin-top: 22px;
}
</style>
<section id="main-content">
  <section class="wrapper">
  <!-- @php 
echo '<pre>';print_r(session('userinfo'));echo '</pre>';
@endphp -->
    <div class="page-title">
      <div>
        <h1>Dashboard</h1>
        <ul class="breadcrumb side">
          <li><a href="{{url('/admin/dashboard')}}"><i class="fa fa-home fa-lg"></i></a></li>
          <li class="active">Dashboard List</li>
        </ul>
      </div>
    </div>
<div class="row">
<div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary orange_bg">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x fontsmall"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">3</div>
                                    
                                </div>
                                
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Total Appointment</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
</div>
<div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary orange_bg">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x fontsmall"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">1</div>
                                    
                                </div>
                                
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Today Schedule Appointment</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
</div>
<div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary orange_bg">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x fontsmall"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">2</div>
                                    
                                </div>
                                
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Tomorrow Appointment</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
</div>


</div>
  </section>
</section>
@endsection