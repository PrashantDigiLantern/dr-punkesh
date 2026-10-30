{{ App\Http\Controllers\AppLaunchController::CommanHeader(); }}

@php
 $public_url="";
 if(isset(session('userorginfo')['site_url'])){
 $public_url = session('userorginfo')['site_url'];
 }
@endphp

<!-- <title>@if(isset($seotitle->title_tag)){{$seotitle->title_tag}}@endif</title>
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
<link rel="canonical" href="@if(isset($seotitle->canonical_tag)){{$seotitle->canonical_tag}}@endif" /> -->
<!-- Doctor Header Start -->
    <div class="inner-page-header" style="background-image:url({{$public_url}}images/about-clinic-page-header.jpg);">
<div class="container">
  <div class="row align-items-center">
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6"> <div class="breadcrumbs-bx"><a href="{{url('/')}}">Home</a> / <a href="{{url('/clinic-gallery')}}">Clinic Gallery</a></div> </div>
   
</div>
      </div>
    </div>
<!-- Doctor Header End -->
  
@if(!$gallery->isEmpty())
  <section class="sectionbx clinicGalleryMain">
  <div class="row">
  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
    <h3 class="text-center">Gallery</h3>
<ul>

@foreach($gallery as $gallerylist)
  <li><a class="lightbox1 fancybox" href="{{$public_url}}backend/gallery/{{$gallerylist->full_image}}" rel="lightbox[galler1]"><img src="{{$public_url}}backend/gallery/{{$gallerylist->gallery_image}}" class="img-fluid" width="100%" height="200" alt=""> </a>
  <div class="galName">@if(isset($gallerylist->gallery_name)){{$gallerylist->gallery_name}}@endif</div></li>
@endforeach 

 </ul>
     </div>
    
  </div>
     </section>
     
     <div class="d-flex paginationBx mb-4 justify-content-center">
        {!! $gallery->links() !!}
        </div>
        @endif
  
<section class="sectionbx appointmentbx" style="background:#333;">
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