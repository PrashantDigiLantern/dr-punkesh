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
<meta property="og:type" content="Website" />
<meta property="og:description" content="@if(isset($seotitle->description_tag)){{$seotitle->description_tag}}@endif" />
<meta property="og:url" content="@if(isset($seotitle->canonical_tag)){{$seotitle->canonical_tag}}@endif"/>
<link rel="canonical" href="@if(isset($seotitle->canonical_tag)){{$seotitle->canonical_tag}}@endif" />



<!-- Doctor Header Start -->
    <div class="inner-page-header" style="background-image:url({{$public_url}}images/about-clinic-page-header.jpg);">
<div class="container">
  <div class="row align-items-center">
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6"> <div class="breadcrumbs-bx"><a href="{{url('/')}}">Home</a> / <a href="{{url('/videos')}}">Videos</a></div> </div>
   
</div>
      </div>
    </div>
<!-- Doctor Header End -->


  
@if(!$video->isEmpty())
  <section class="sectionbx videoGalleryMain">
  <div class="row">

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12"><h2 class="text-center">Videos</h2></div>

    
    @foreach($video as $videolist)
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
    <div class="videoBx"><iframe width="100%" height="350" src="{{$videolist->video}}" title="{{$videolist->name}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      <div class="vidCaption">{{$videolist->name}}</div>
    </div>
    </div>
    @endforeach
   
    

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3 custm-pgntion">
    <div class="d-flex justify-content-center">
        {!! $video->links() !!}
        </div>
    </div>

  </div>
</section>

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