{{ App\Http\Controllers\AppLaunchController::CommanHeader(); }}
@php
 $public_url="";
 if(isset(session('userorginfo')['site_url'])){
 $public_url = session('userorginfo')['site_url'];
 }
@endphp
  <!-- Start Banner -->
  <div class="innerHeader ServiceHeader">     
    <div class="container-fluid">
<div class="BreadCrumb text-center" data-aos="fade-up"><a href="{{url('/')}}">Home</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <a>Book An Appointment</a></div>
<div class="row pt-1" data-aos="fade-up">
   <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-12 text-center">
    <div class="sctinHd">Book An Appointment</div>
  </div>
</div>
</div>
  </div>
  <!-- End Banner --> 

<section class="sectionbx AppointmentSctn">
  <div class="container-fluid">

    <div class="row">
<div class="col-xxl-8 offset-xxl-2 col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12 col-xs-12">
        <p class="pb-4 text-center">CLINIC TIMINGS:<br>
        {{ App\Http\Controllers\AppLaunchController::ContactDetail(); }}</p>
        
        <div class="frmcntnt">
        {{ App\Http\Controllers\AppLaunchController::CommanAppointment(); }}   
         
        </div>
      </div>
    </div>

  </div>
</section>

{{ App\Http\Controllers\AppLaunchController::CommanFooter(); }}