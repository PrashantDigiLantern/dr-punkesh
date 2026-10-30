{{ App\Http\Controllers\AppLaunchController::CommanHeader(); }}
@php
 $public_url="";
 if(isset(session('userorginfo')['site_url'])){
 $public_url = session('userorginfo')['site_url'];
 }
@endphp

<style>
.timeline-centered:before{display:none}  </style>
<!-- Doctor Header Start -->
@if(!$doctorlist->isEmpty())
@foreach($doctorlist as $doctorlistsec)
    <div class="about-doctor-page-header">
<div class="container">
  <div class="row align-items-center">
    <div class="col-xl-5  col-lg-5  col-md-5  col-sm-6"><img src="{{$public_url}}images/template3-doctor.jpg" class="img-fluid" alt=""></div>
    <div class="col-xl-6 offset-xl-1 col-lg-6 offset-lg-1 col-md-6 offset-md-1 col-sm-6 abtTxtColor" data-aos="fade-up">
      <div class="breadcrumbs-bx"><a href="{{url('/')}}">Home</a> / <a href="{{url('/about-doctor')}}">About Doctor</a></div>
      <div class="page-hdng text-uppercase abtdrHD">ABOUT {{$doctorlistsec->name}}</div>
      <!-- <div class="sub-hdng">Master of Chirurgiae (M.Ch.)</div> -->
<div>{!! $doctorlistsec->sort_desc !!}</div>

    <a href="{{url('/schedule-a-consultation')}}" class="btn btn-blueLight">Book An Appointment</a>
  </div>
</div>
      </div>
    </div>
<!-- Doctor Header End -->

<section class="sectionbx about-know-more">
  <div class="container" data-aos="fade-up">
  

      <h2>Know More About {{$doctorlistsec->name}}</h2>
      {!! $doctorlistsec->description !!}

        @if(!$membership->isEmpty())
        <div class="row justify-content-center certification-bg pt-3">
          @foreach($membership as $membershiplist)
          <div class="col col-md-2"><img src="{{$public_url.'backend/membership/'.$membershiplist->image}}" class="img-fluid" alt="{{$membershiplist->alt_tag}}"></div>
         @endforeach
        </div>
        @endif

  </div>
  </section>

<section class="sectionbx dr-experience">
<div class="container-fluid">

<div class="row">
  @if(isset($doctorlistsec->experience_detail))
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6" data-aos="fade-up">
<h2>Experience</h2>
{!! $doctorlistsec->experience_desc !!}
<div class="timeline-centered"> 
  @php
  $experience = json_decode($doctorlistsec->experience_detail); 
  $experiencelist = $experience->experience;
  $experiencelist = collect($experiencelist)->sortBy('experience_order_by');
  @endphp

@foreach($experiencelist as $experiencedetail)

<article class="timeline-entry" style="width:95%;">
<div class="timeline-entry-inner">
<!-- <div class="timeline-time">2016 - Till Date</div>     -->
<div class="timeline-icon">
  <i class="entypo-feather"></i>
</div>
<div class="timeline-label">
<p>{{$experiencedetail->experience_name}} 
  @if(isset($experiencedetail->experience_year)), {{$experiencedetail->experience_year}}
@endif
</p>
</div>
</div>  
</article>
@endforeach


</div>
</div>
@endif

@if(isset($doctorlistsec->education_detail))
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 education-bx" data-aos="fade-up">
<h2>Education</h2>
@php
  $education = json_decode($doctorlistsec->education_detail); 
  $educationlist = $education->education;
  $educationlist = collect($educationlist)->sortBy('education_order_by');
  @endphp

@foreach($education->education as $educationdetail)
<h5>{{$educationdetail->education_year}}</h5>
{{ $educationdetail->education_name }}

@endforeach
</div>
@endif
</div>
</div>
</section>
@endforeach
@endif

<section class="sectionbx section-content">
  <div class="container-fluid" data-aos="fade-up">
    <h2 class="text-center">The Doctor’s Philosophy</h2>

    <div class="row">
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
<p>At Hair Skin PRP Clinic in Cardiff, Dr. Prashant believes that every patient deserves the highest level of service and so each of the patients is treated with utmost care and importance. His main objective is to provide a mentoring approach towards a natural, flawless and healthy appearance of men and women across all ages and groups through the best cosmetic treatments in Cardiff (UK) – whether it is for skin inflammation, acne treatment, face lift, and/or hair loss treatment in Cardiff (UK).</p>
      </div>
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
       <p>If you are looking to improve your skin health and hair loss treatment from the latest state-of-the-art facilities in a natural and subtle way, then book your appointment with Dr. Prashant to avail the best skin and hair treatments in Cardiff (UK). Renowned for giving the most realistic and natural appearance, Dr. Prashant will ensure the finest treatment to enhance your beauty and overall appearance – making you look young, natural and flawless!</p>
      </div>
    </div>
  </div>
</section>


<section class="sectionbx appointmentbx">
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


@if(!$doctorcertificate->isEmpty())
<section class="sectionbx">
  <div class="container" data-aos="fade-up">

    <h2 class="text-center" data-aos="fade-up">Certificates</h2>
    <!-- <div id="CertificateCarousel" class="carousel slide" data-ride="carousel">

      <div class="carousel-inner text-center">
        <div class="carousel-item active">
          <div class="row align-items-center">
            <div class="col-md-3 col-3"><a class="fancybox" href="{{$public_url}}images/certificate1.jpg" rel="lightbox[galler1]"><img
                  src="{{$public_url}}images/certificate1.jpg" class="img-fluid" alt=""> </a></div>
            <div class="col-md-3 col-3"><a class="fancybox" href="{{$public_url}}images/certificate2.jpg" rel="lightbox[galler1]"><img
                  src="{{$public_url}}images/certificate2.jpg" class="img-fluid" alt=""> </a></div>
            <div class="col-md-3 col-3"><a class="fancybox" href="{{$public_url}}images/certificate3.jpg" rel="lightbox[galler1]"><img
                  src="{{$public_url}}images/certificate3.jpg" class="img-fluid" alt=""> </a></div>
            <div class="col-md-3 col-3"><a class="fancybox" href="{{$public_url}}images/certificate4.jpg" rel="lightbox[galler1]"><img
                  src="{{$public_url}}images/certificate4.jpg" class="img-fluid" alt=""> </a></div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="row align-items-center">
            <div class="col-md-4 col-4 cstmMTop"><a class="fancybox" href="{{$public_url}}images/certificate5.jpg" rel="lightbox[galler1]"><img
                  src="{{$public_url}}images/certificate5.jpg" class="img-fluid" alt=""> </a></div>
            <div class="col-md-4 col-4 cstmMTop"><a class="fancybox" href="{{$public_url}}images/certificate6.jpg" rel="lightbox[galler1]"><img
                  src="{{$public_url}}images/certificate6.jpg" class="img-fluid" alt=""> </a></div>
            <div class="col-md-4 col-4 cstmMTop"><a class="fancybox" href="{{$public_url}}images/certificate7.jpg" rel="lightbox[galler1]"><img
                  src="{{$public_url}}images/certificate7.jpg" class="img-fluid" alt=""> </a></div>
             <div class="col-md-3 col-3"><a class="fancybox" href="{{$public_url}}images/certyi2.jpg" rel="lightbox[galler1]"><img
                  src="{{$public_url}}images/certyi2.jpg" class="img-fluid" alt=""> </a></div> --
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#CertificateCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#CertificateCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div> -->


    <section class="center slider">
      @foreach($doctorcertificate as $doctorcertificatelist)
    <div>
      <img src="{{$public_url.'backend/certificate/'.$doctorcertificatelist->certificate_image}}" alt="{{$doctorcertificatelist->alt_tag}}">
    </div>
    @endforeach
    <!-- <div>
      <img src="{{$public_url}}images/certificate2.jpg" alt="Certificate2">
    </div>
    <div>
      <img src="{{$public_url}}images/certificate3.jpg" alt="Certificate3">
    </div>
    <div>
      <img src="{{$public_url}}images/certificate4.jpg" alt="Certificate4">
    </div>
    <div>
      <img src="{{$public_url}}images/certificate5.jpg" alt="Certificate5" style="margin-top:85px">
    </div>
    <div>
      <img src="{{$public_url}}images/certificate6.jpg" alt="Certificate6" style="margin-top:85px">
    </div>    
    <div>
      <img src="{{$public_url}}images/certificate7.jpg" alt="Certificate7" style="margin-top:85px">
    </div> -->
  </section>

  </div>
</section>

@endif
{{ App\Http\Controllers\AppLaunchController::CommanFooter(); }}