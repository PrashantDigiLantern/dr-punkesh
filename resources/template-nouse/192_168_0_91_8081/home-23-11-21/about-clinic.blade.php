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

@if(!$aboutlist->isEmpty())
@foreach($aboutlist as $aboutlistsec)
<!-- Doctor Header Start -->
    <div class="about-doctor-page-header" style="background-image:url({{$public_url}}images/about-clinic-page-header.jpg);padding:7rem 0 0;background-size:100%">
<div class="container">
  <div class="row align-items-center">
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6"> </div>
    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 clini-header-cntnt" data-aos="fade-up">
      <div class="breadcrumbs-bx"><a href="{{url('/')}}">Home</a> / <a href="{{url('/about-clinic')}}">About Clinic</a></div>
      <div class="page-hdng">{{$aboutlistsec->name}}</div>
      <h5 class="mb-3">{{$aboutlistsec->heading1}}</h5>
<div>{!! $aboutlistsec->section1 !!}</div>
    </div>
</div>
      </div>
    </div>
<!-- Doctor Header End -->

<section class="sectionbx ">
  <div class="container text-center" data-aos="fade-up">
      <h2>{{$aboutlistsec->heading2}}</h2>
     {!! $aboutlistsec->section3 !!}
        
  </div>
  </section>
@endforeach
@endif


<section class="sectionbx vision-mission">
  <div class="container-fluid">
<div class="row align-items-center">
      <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="visionbx" data-aos="fade-right">
<div class="iconbx"><img src="{{$public_url}}images/vision-icon.png" alt="vision"></div>
<div class="contbx">
  <h4>Our Vision</h4>
  <p>Is to be the state-of-the-art cosmetology centre in the UK that emphases on the cohesive aspects of hair and skin care via cosmetic surgeries and non-surgical procedures so that all our patients look and feel radiant at any age, naturally!</p></div>
<div class="clearfix"></div>
        </div>
        <div class="visionbx" data-aos="fade-right">
<div class="iconbx"><img src="{{$public_url}}images/mission-icon.png" alt="mission"></div>
<div class="contbx">
  <h4>Our Mission</h4>
  <p>Is to establish Hair Skin PRP Clinic as the best hair and skin care centres in the UK using the amalgamation of state-of-the-art technology, highest quality care with a keen focus on patients desired results which is natural and healthy.</p></div>
<div class="clearfix"></div>
        </div>
        <div class="visionbx" data-aos="fade-right">
<div class="iconbx"><img src="{{$public_url}}images/value-icon.png" alt="value"></div>
<div class="contbx">
  <h4>Our Philosophy</h4>
  <p>Is not to rush you into treatment, but to understand your concerns thoroughly. Without beating around the bush, we then provide you with a clear evidence-based plan of options, that is going to enhance your hair and skin naturally for now and in the long term. Given our extensive experience with Surgical and Non-Surgical Cosmetic Treatments, we provide all our patients only with unbiased assistance - giving you the best return on investment when it comes to Skin and Hair Treatments in Cardiff (UK).</p></div>
<div class="clearfix"></div>
        </div>
      </div>
      <div class="col-lg-6 col-md-12 col-sm-6 d-none d-lg-block d-xl-block" data-aos="fade-left"><img src="{{$public_url}}images/vision-mission-value.png" class="img-fluid" width="90%" alt="">  </div>

     </div>
  </div>
  </section>
  




<section class="sectionbx bglightGrey">
<div class="container" data-aos="fade-up">
  <h2 class="text-center">OUR DOCTOR’S PRIORITY</h2>

  <div class="row">
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
     <p>Member of the International Society of Aesthetic Plastic Surgeons (ISAPS), Dr. Prashant Murugkar’s first priority is
    patient safety and fulfilment. His honesty and integrity make him one of the most reliable and best cosmetic surgeons in
    the UK, who can be trusted to give natural realistic expectations to all his patients.</p>
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
     <p>Hair and Skin is an attire that one dresses every day. It defines your appearance and tells a lot about your overall
    health, the functioning of the inner organs and above all, happiness. The aim of the Hair and Skin PRP Clinic in Cardiff
    ever since its inception is to provide holistic skin and hair care – instilling confidence in your looks and locks! Book
    your appointment with our cosmetic surgeon at Hair and Skin PRP Clinic now!</p>
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
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 p-5">
      <div class="" data-aos="fade-left">
      <h3 class="mb-3">Clinic Address & Timings</h3>
      {{ App\Http\Controllers\AppLaunchController::ContactDetail(); }}
    </div>
  </div>
</div>  
  </div>
</section>


@if(!$gallery->isEmpty())
<section class="sectionbx about-clinic-gallery">
  <div class="container-fluid" data-aos="fade-up">      
  
  <h2 class="text-center">Clinic Gallery</h2>

  <ul class="clicgall">
@foreach($gallery as $gallerylist)
    <li><img src="{{$public_url}}backend/gallery/{{$gallerylist->gallery_image}}" class="img-fluid" width="100%" height="200" alt=""></li>
  @endforeach
  </ul>


  <div class="text-center"><a href="{{url('/gallery')}}" class="btn btn-readmoreblk">View All</a></div>   
  </div>
  </section>
  @endif
  
  {{ App\Http\Controllers\AppLaunchController::CommanFooter(); }}