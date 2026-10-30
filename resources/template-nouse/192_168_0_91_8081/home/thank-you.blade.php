{{ App\Http\Controllers\AppLaunchController::CommanHeader(); }}
@php
 $public_url="";
 if(isset(session('userorginfo')['site_url'])){
 $public_url = session('userorginfo')['site_url'];
 }
@endphp
<!-- Doctor Header Start -->
  <div class="inner-page-header" style="background-image:url({{$public_url}}images/inner-banner.jpg);">
<div class="container">
<div class="row align-items-center">
  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6"> <div class="breadcrumbs-bx"><a href="{{url('/')}}">Home</a> / <a href="{{url('/thank-you')}}">Thank You</a></div> </div>
  
</div>
    </div>
  </div>
<!-- Doctor Header End -->


<section class="sectionbx appointmentbx bookAnAppointment">
<div class="container text-center" data-aos="fade-up"> 
  <h2>Thank You</h2>
<div class="row">
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">    
<p>We have received your request. <br>We will get in touch with you shortly.</p>
  </div>
</div>  
</div>
</section>

  
  {{ App\Http\Controllers\AppLaunchController::CommanFooter(); }}