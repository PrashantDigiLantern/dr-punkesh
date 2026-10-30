{{ App\Http\Controllers\AppLaunchController::CommanHeader(); }}
@php
 $public_url="";
 if(isset(session('userorginfo')['site_url'])){
 $public_url = session('userorginfo')['site_url'];
 }
@endphp
<title>@if(isset($seotitle->title_tag)){{$seotitle->title_tag}}@endif</title>
<meta name="description" content="@if(isset($seotitle->description_tag)){{$seotitle->description_tag}}@endif">
<meta name="keywords" content="@if(isset($seotitle->keyword_tag)){{$seotitle->keyword_tag}}@endif">
<meta property="og:title" content="@if(isset($seotitle->title_tag)){{$seotitle->title_tag}}@endif"/>
<meta property="og:type" content="@if(isset($seotitle->type)){{$seotitle->type}}@endif" />
<meta property="og:image" content="@if(isset($seotitle->image)){{$seotitle->image}}@endif" />
<meta property="og:description" content="@if(isset($seotitle->description_tag)){{$seotitle->description_tag}}@endif" />
<meta property="og:site_name" content="@if(isset($seotitle->site_name)){{$seotitle->site_name}}@endif" />
<meta property="og:url" content="@if(isset($seotitle->canonical_tag)){{$seotitle->canonical_tag}}@endif"/>
<meta property="twitter:title" content="@if(isset($seotitle->title_tag)){{$seotitle->title_tag}}@endif"/>
<meta property="twitter:type" content="@if(isset($seotitle->type)){{$seotitle->type}}@endif" />
<meta property="twitter:image" content="@if(isset($seotitle->image)){{$seotitle->image}}@endif" />
<meta property="twitter:description" content="@if(isset($seotitle->description_tag)){{$seotitle->description_tag}}@endif" />
<meta property="twitter:site_name" content="@if(isset($seotitle->site_name)){{$seotitle->site_name}}@endif" />
<meta property="twitter:url" content="@if(isset($seotitle->canonical_tag)){{$seotitle->canonical_tag}}@endif"/>
<link rel="canonical" href="@if(isset($seotitle->canonical_tag)){{$seotitle->canonical_tag}}@endif" />

<!-- Doctor Header Start -->
  <div class="inner-page-header" style="background-image:url({{$public_url}}images/about-clinic-page-header.jpg);">
<div class="container">
<div class="row align-items-center">
  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6"> <div class="breadcrumbs-bx"><a href="{{url('/')}}">Home</a> / <a href="{{url('/schedule-a-consultation')}}">Book An Appointment</a></div> </div>
  
</div>
    </div>
  </div>
<!-- Doctor Header End -->


<section class="sectionbx appointmentbx bookAnAppointment">
<div class="container"> 
  <h2 class="text-center" data-aos="fade-up">Book An Appointment</h2>
<div class="row align-items-center">
  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6" data-aos="fade-right">    
  {{ App\Http\Controllers\AppLaunchController::CommanAppointment(); }}      
  </div>
  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
    <div class="appointmentInfo" data-aos="fade-left">
    <h3 class="mb-3">Clinic Address & Timings</h3>
    {{ App\Http\Controllers\AppLaunchController::ContactDetail(); }}
  </div>
</div>
</div>  
</div>
</section>



<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d2482.3164244452983!2d-3.2045822!3d51.5257559!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x486e1c78abd50fc3%3A0xa741990c706e045!2sReforme+Medical+-+Beauty+Doctor!5e0!3m2!1sen!2sin!4v1556542631275!5m2!1sen!2sin" width="600" height="400" style="border:0;width: 100%;" allowfullscreen="" loading="lazy"></iframe>

  
  {{ App\Http\Controllers\AppLaunchController::CommanFooter(); }}