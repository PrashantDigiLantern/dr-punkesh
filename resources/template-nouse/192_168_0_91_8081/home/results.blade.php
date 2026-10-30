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
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6"> <div class="breadcrumbs-bx"><a href="{{url('/')}}">Home</a> / <a href="{{url('real-results')}}">Real Results</a></div> </div>
   
</div>
      </div>
    </div>
<!-- Doctor Header End -->


  
@if(!$result->isEmpty())
  <section class="sectionbx resultGalleryMain">
  <div class="row">

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12"><h2 class="text-center">Real Results</h2></div>

   
    @foreach($result as $resultlist)
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
      <div class="resultItem">
        <a href="{{$public_url}}backend/service_result/inner/{{$resultlist->beforeimg}}" class="fancybox" rel="lightbox[galler1]" title="{{$resultlist->name}}">
        <img src="{{$public_url}}backend/service_result/inner/{{$resultlist->afterimg}}" class="img-fluid" width="100%" alt="{{$resultlist->alt_img}}">
      </a>
    </div>
  </div>
  @endforeach
 
   
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3 custm-pgntion">
    <div class="d-flex justify-content-center">
        {!! $result->links() !!}
        </div>
    </div>

  </div>
</section>
@endif


  
<section class="sectionbx appointmentbx" style="background:#333">
  <div class="container"> 
    <h2 class="text-center" data-aos="fade-up">Book An Appointment</h2>
  <div class="row align-items-center">
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6" data-aos="fade-right">    
    {{ App\Http\Controllers\AppLaunchController::CommanAppointment(); }}     
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 p-5">
      <div class="" data-aos="fade-left">
      <h3 class="mb-3">Clinic Address & Timings</h3>
      {{ App\Http\Controllers\AppLaunchController::ContactDetail(); }}
    </div>
  </div>
</div>  
  </div>
</section>

{{ App\Http\Controllers\AppLaunchController::CommanFooter(); }}