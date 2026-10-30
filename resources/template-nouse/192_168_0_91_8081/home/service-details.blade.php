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
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6"> <div class="breadcrumbs-bx"><a href="{{url('/')}}">Home</a> / <a href="{{url('/Services')}}">Service</a> / <a>{{$servicedetail->service_name}}</a></div> </div>

</div>
  </div>
</div>
<!-- Doctor Header End -->



@if(isset($servicedetail->section))
@php
$sersection = json_decode($servicedetail->section); 
$sersectionorder = collect($sersection)->sortBy('secorderby');
@endphp

@foreach($sersectionorder as $key => $sersectionlist)
@if($sersectionlist->appointment_side == 'upper')

@if($sersectionlist->type == 'fulltext')

<section class="sectionbx serviceDetails" style="<?php if(isset($sersectionlist->bg_type)){ if($sersectionlist->bg_type=='bgcolor'){ echo $sersectionlist->bgcolor_style; } }?>">
<div class="container-fluid" data-aos="fade-up">
<h2>{{ $sersectionlist->service_heading }}</h2>

{!! $sersectionlist->section1 !!}
  
</div>
</section>
@endif
<!-- @if($sersectionlist->type=='bgcolorfulltext')
<section class="sectionbx serviceDetails srvDtailcTwo">
<div class="container-fluid" data-aos="fade-up">
<h2>{{ $sersectionlist->service_heading }}</h2>

{!! $sersectionlist->section1 !!}
  
</div>
</section>
@endif -->
@if($sersectionlist->type=='imagetext')
<section class="sectionbx serviceDetails">
<div class="container-fluid" data-aos="fade-up">
<div class="row align-items-center">

  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
    <img src="{{$public_url}}backend/service/section/{{ $sersectionlist->image }}" class="img-fluid" alt="">
  </div>
  
  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
    <h2 class="pageHdng">{{ $sersectionlist->service_heading }}</h2>
    {!! $sersectionlist->section1 !!}

  <p><a href="{{url('/'.$sersectionlist->button_url)}}" class="btn btn-blueLight" style="<?php echo $sersectionlist->button_style ?>">{{ $sersectionlist->button_name }}</a></p>
</div>

</div>
</div>
</section>
@endif
@if($sersectionlist->type=='twoparagraphbgcolor')
<section class="sectionbx serviceDetails srvDtailcOne">
<div class="container-fluid" data-aos="fade-up">
<div class="row">
<div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 p-4">
  @if(isset($sersectionlist->service_heading))
<h2>{{ $sersectionlist->service_heading }}</h2>
@endif
{!! $sersectionlist->section1 !!}

</div>
<div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 srvDtailcOneSide">

{!! $sersectionlist->section2 !!}
</div>

</div>
</div>
</section>
@endif
@if($sersectionlist->type=='rightimagetext')
<section class="sectionbx beforeAfterSec">
  <div class="container-fluid" data-aos="fade-up">
    <div class="row align-items-center">
      <div class="col-lg-6 col-md-6 col-sm-12 p-md-5">
        <h2>{{ $sersectionlist->service_heading }}</h2>
        {!! $sersectionlist->section1 !!}
        <div><a href="{{url('/'.$sersectionlist->button_url)}}" class="btn btn-readmoreblk" style="<?php echo $sersectionlist->button_style ?>">{{ $sersectionlist->button_name }}</a></div>
      </div>

      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="bfrAftrItm">
          <!-- <div class="txtBefore">Before</div>
          <div class="txtBefore txtAfter">After</div> -->
          <a href="{{url('/'.$sersectionlist->button_url)}}"><img src="{{$public_url}}backend/service/section/{{ $sersectionlist->image }}" class="img-fluid" alt=""></a>
        </div>
      </div>
    </div>
  </div>
</section>
@endif
@endif
@endforeach
@endif

<section class="sectionbx appointmentbx" style="<?php if($servicefaqs->isEmpty()) echo 'background:#333333'; ?>">
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
<!-- @if(!$servicesection->isEmpty())
@foreach($servicesection as $sersectionlist)
@if($sersectionlist->type=='afterformtwoparagraph')
<section class="sectionbx serviceDetails">
  <div class="container-fluid" data-aos="fade-up">
    
    <div class="row">
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
        @if(isset($sersectionlist->service_heading))<h4>{{$sersectionlist->service_heading}}</h4>@endif
        {!! $sersectionlist->section1 !!}
      </div>
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
      {!! $sersectionlist->section2 !!}
      </div>

    </div>
  </div>
</section>

@endif
@endforeach
@endif -->

@if(isset($servicedetail->section))
@php
$sersection = json_decode($servicedetail->section); 
$sersectionorder = collect($sersection)->sortBy('secorderby');
@endphp

@foreach($sersectionorder as $key => $sersectionlist)
@if($sersectionlist->appointment_side == 'down')

@if($sersectionlist->type == 'fulltext')

<section class="sectionbx serviceDetails">
<div class="container-fluid" data-aos="fade-up">
<h2>{{ $sersectionlist->service_heading }}</h2>

{!! $sersectionlist->section1 !!}
  
</div>
</section>
@endif
<!-- @if($sersectionlist->type=='bgcolorfulltext')
<section class="sectionbx serviceDetails srvDtailcTwo">
<div class="container-fluid" data-aos="fade-up">
<h2>{{ $sersectionlist->service_heading }}</h2>

{!! $sersectionlist->section1 !!}
  
</div>
</section>
@endif -->
@if($sersectionlist->type=='imagetext')
<section class="sectionbx serviceDetails">
<div class="container-fluid" data-aos="fade-up">
<div class="row align-items-center">

  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
    <img src="{{$public_url}}backend/service/section/{{ $sersectionlist->image }}" class="img-fluid" alt="">
  </div>
  
  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
    <h2 class="pageHdng">{{ $sersectionlist->service_heading }}</h2>
    {!! $sersectionlist->section1 !!}

  <p><a href="{{url('/'.$sersectionlist->button_url)}}" class="btn btn-blueLight" style="<?php echo $sersectionlist->button_style ?>">{{ $sersectionlist->button_name }}</a></p>
</div>

</div>
</div>
</section>
@endif
@if($sersectionlist->type=='twoparagraph')
<section class="sectionbx serviceDetails srvDtailcOne">
<div class="container-fluid" data-aos="fade-up">
<div class="row">
<div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 p-4">
  @if(isset($sersectionlist->service_heading))
<h2>{{ $sersectionlist->service_heading }}</h2>
@endif
{!! $sersectionlist->section1 !!}

</div>
<div class="col-xl-5 col-lg-5 col-md-5 col-sm-12 srvDtailcOneSide">

{!! $sersectionlist->section2 !!}
</div>

</div>
</div>
</section>
@endif
@if($sersectionlist->type=='rightimagetext')
<section class="sectionbx beforeAfterSec">
  <div class="container-fluid" data-aos="fade-up">
    <div class="row align-items-center">
      <div class="col-lg-6 col-md-6 col-sm-12 p-md-5">
        <h2>{{ $sersectionlist->service_heading }}</h2>
        {!! $sersectionlist->section1 !!}
        <div><a href="{{url('/'.$sersectionlist->button_url)}}" class="btn btn-readmoreblk" style="<?php echo $sersectionlist->button_style ?>">{{ $sersectionlist->button_name }}</a></div>
      </div>

      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="bfrAftrItm">
          <!-- <div class="txtBefore">Before</div>
          <div class="txtBefore txtAfter">After</div> -->
          <a href="{{url('/'.$sersectionlist->button_url)}}"><img src="{{$public_url}}backend/service/section/{{ $sersectionlist->image }}" class="img-fluid" alt=""></a>
        </div>
      </div>
    </div>
  </div>
</section>
@endif
@endif
@endforeach
@endif

@if(!$servicefaqs->isEmpty()) 
<section class="sectionbx faqbx">
<div class="container-fluid" data-aos="fade-up">      
<div class="row">     
<div class="col-lg-12 col-md-12 col-sm-12" data-aos="fade-up">
<h2 class="text-center">Frequently Asked Questions</h2>
<div class="panel-group faqpnl" id="accordion" role="tablist" aria-multiselectable="true">
@foreach($servicefaqs as $key => $servicefaqlist)
<div class="panel panel-default">
<div class="panel-service_heading" role="tab" id="service_headingOne">
  <div class="panel-title">
      <a role="button" data-toggle="collapse" data-toggle="collapse" data-target="#servicefaq{{$key}}" aria-expanded="true" aria-controls="collapseOne" class="<?php if($key!='0'){echo 'collapsed';}?>">{!! strip_tags($servicefaqlist->question) !!}</a>
  </div>
</div>
<div id="servicefaq{{$key}}" class="panel-collapse in collapse <?php if($key=='0'){echo 'show';}?>" class="collapse <?php if($key=='0'){echo 'show';}?>" aria-labelledby="service_headingOne" data-parent="#accordion">
  <div class="panel-body p-3">
      <div class="m-0">{!! $servicefaqlist->answer !!} </div>
  </div>
</div>
</div>
@endforeach

</div>
<!-- <div class="text-center"><a href="#" class="btn btn-readmoreblk">View All</a></div> -->
</div>
</div>
</div>
</section>
@endif

{{ App\Http\Controllers\AppLaunchController::CommanFooter(); }}