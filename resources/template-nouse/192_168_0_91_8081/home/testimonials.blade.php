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
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6"> <div class="breadcrumbs-bx"><a href="{{url('/')}}">Home</a> / <a href="{{url('/testimonials')}}">Testimonials</a></div> </div>
   
</div>
      </div>
    </div>
<!-- Doctor Header End -->



@if(!$testimonial->isEmpty())
<section class="sectionbx hmtestimonials">
  <div class="container-fluid">
  
    <h2 class="text-center" data-aos="fade-up">WHAT OUR CLIENTS SAY</h2>
    <div class="row align-items-center">
    
      @foreach($testimonial as $testimoniallist)
      <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12" data-aos="fade-up">
        <div class="tstmnlitem">
          <div class="tstcercle">{{$testimoniallist->short_name}}</div>
        <img src="{{$public_url}}images/quote-icon.png" alt="">
        <div class="testimonialscont"><p>{!! $testimoniallist->description !!}</p></div>
        <div class="opiniontxt">* Opinions/Results may vary from person to person.</div>
        <div class="tstname">{{$testimoniallist->name}} 
          <ul class="sourcefrom">
          <li>{{$testimoniallist->source}}, </li>
          @if($testimoniallist->rating=='5')
          <li>★</li>
          <li>★</li>
          <li>★</li>
          <li>★</li>
          <li>★</li>
          @endif
          @if($testimoniallist->rating=='4')
          <li>★</li>
          <li>★</li>
          <li>★</li>
          <li>★</li>
          @endif
          @if($testimoniallist->rating=='3')
          <li>★</li>
          <li>★</li>
          <li>★</li>
          @endif
          @if($testimoniallist->rating=='2')
          <li>★</li>
          <li>★</li>
          @endif
          @if($testimoniallist->rating=='1')
          <li>★</li>
          @endif
        </ul>
        </div>
      </div>
      </div>
      @endforeach
      <div class="d-flex paginationBx justify-content-center col">
        {!! $testimonial->links() !!}
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
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 formInfo">
      <div class="" data-aos="fade-left">
      <h3 class="mb-3">Clinic Address & Timings</h3>
      {{ App\Http\Controllers\AppLaunchController::ContactDetail(); }}
    </div>
  </div>
</div>  
  </div>
</section>


{{ App\Http\Controllers\AppLaunchController::CommanFooter(); }}