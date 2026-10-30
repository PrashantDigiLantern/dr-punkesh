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
<div class="BreadCrumb text-center" data-aos="fade-up"><a href="{{url('/')}}">Home</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <a href="testimonials.html">Patients Testimonials</a></div>
<div class="row pt-1" data-aos="fade-up">
   <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-12 text-center">
    <div class="sctinHd">Patients Testimonials</div>
  </div>
</div>
</div>
  </div>
  <!-- End Banner -->
 

  @if(!$testimonial->isEmpty())
<section class="sectionbx TestimonialSctn" style="background: none;">
  <div class="container-fluid text-center">
    <div class="row">
    @foreach($testimonial as $testimoniallist)
      <div class="col-xxl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="TestimonialsBox">
          <div class="TstSource">
          @if($testimoniallist->source=='google')  
        <p>Google</p>
        @elseif($testimoniallist->source=='practo')
        <img src="{{$public_url}}images/practo.png" class="img-fluid" alt="">
        @else
          <p>Real Self</p>
        @endif
        </div>
        <div class="TstThumb">{{$testimoniallist->short_name}}</div>
        <div class="TstName">{{$testimoniallist->name}}</div>
        <div class="TstStar">
          @for($i=1; $i<=$testimoniallist->rating; $i++)
          <i class="fa fa-star" aria-hidden="true"></i>
          @endfor
        </div>
        <div>{!! $testimoniallist->description !!}</div>
        </div>
      </div>
      @endforeach
      
    </div>

    <div class="d-flex paginationBx justify-content-center col">
        {!! $testimonial->links() !!}
        </div>
  
  </div>
</section>

@endif


  
<section class="sectionbx AppointmentSctn">
  <div class="container-fluid">

    <div class="row">
<div class="col-xxl-8 offset-xxl-2 col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12 col-xs-12">
        <div class="sctinHd text-center">Book An Appointment</div>
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