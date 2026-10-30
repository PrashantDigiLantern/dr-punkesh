<?php
$public_url="";
if(isset(session('userorginfo')['site_url'])){
$public_url = session('userorginfo')['site_url'];
}
?>
 
 @if(!$testimonial->isEmpty())
<!-- Start Testimonials -->
<section class="sectionbx TestimonialSctn">
<div class="container-fluid text-center" data-aos="fade-up">
<div class="sctinHd text-center">Patients Testimonials</div>
<p class="sctinSmlTxt">What Our Patients Say</p>
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
        <div>{!! substr($testimoniallist->description, 0, 200).'...' !!}<a href="{{url('/testimonials')}}">Read More</a></div>
      </div>
    </div>
@endforeach
   
</div>
<div class="pt-3"><a href="{{url('/testimonials')}}" class="readMore">View All</a></div>
</div>
</section>
@endif