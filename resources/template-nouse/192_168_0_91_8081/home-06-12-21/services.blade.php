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
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6"> <div class="breadcrumbs-bx"><a href="{{url('/')}}">Home</a> / <a href="{{url('/Services')}}">Service</a></div> </div>
   
</div>
      </div>
    </div>
<!-- Doctor Header End -->


@if(!$service->isEmpty())
  <section class="sectionbx servicesmain">
    <div class="container-fluid">
    <div class="row">
    
      @foreach($service as $key => $servicelist)
      @if($servicelist->design_type =='left')
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="serv-cate-item d-flex align-items-center flex-md-row flex-column">
          <div class="serv-thumb d-flex-align-items-center justify-content-center">
           <img src="{{$public_url}}backend/service/image/{{$servicelist->service_image}}" class="img-fluid" alt="{{$servicelist->alt_tag}}">
         </div>
           <div class="serv-cate-cnt"> 
             <div class="srv-no">
               @if($key=='9'){{'0'.$key + 1}}@else {{$key + 1}} @endif</div>
             <h3>{{$servicelist->service_name}}</h3>
             <p>{!! $servicelist->short_desc !!}</p>
             <a href="{{url('/services/'.$servicelist->url)}}" class="stretched-link">Read more <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
           </div>
         </div>
        </div>
        @endif
        @if($servicelist->design_type =='right')
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="serv-cate-item d-flex align-items-center flex-md-row flex-column">
           <div class="serv-cate-cnt"> 
             <div class="srv-no">
               @if($key=='9'){{'0'.$key + 1}}@else {{$key + 1}} @endif</div>
             <h3>{{$servicelist->service_name}}</h3>
             <p>{!! $servicelist->short_desc !!}</p>
             <a href="{{url('/services/'.$servicelist->url)}}" class="stretched-link">Read more <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
           </div>
           <div class="serv-thumb d-flex-align-items-center justify-content-center">
           <img src="{{$public_url}}backend/service/image/{{$servicelist->service_image}}" class="img-fluid" alt="{{$servicelist->alt_tag}}">
         </div>
         </div>
        </div>
        @endif
        @endforeach
       

        <div class="d-flex justify-content-center">
        {!! $service->links() !!}
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