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
<div class="BreadCrumb" data-aos="fade-up"><a href="{{url('/')}}">Home</a>  <i class="fa fa-angle-double-right" aria-hidden="true"></i> {{$servicedetail->service_name}}</div>

<div class="row pt-3" data-aos="fade-up">
  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-12"><img src="{{$public_url}}backend/service/image/{{$servicedetail->service_image}}" class="img-fluid clinicPic" alt="{{$servicedetail->alt_tag}}"></div>
  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-12">
    <div class="sctinHd">{{$servicedetail->service_name}}</div>
    {!! $servicedetail->short_desc !!}
  </div>
</div>


</div>
  </div>
  <!-- End Banner -->
 



  <section class="sectionbx">
    <div class="container-fluid" data-aos="fade-up">
  
      <div class="row">
        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12"></div>
        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
        {!! $servicedetail->description !!}
      </div>

      </div>
</div>
</section>

@if(isset($servicedetail->section))
@php
$sersection = json_decode($servicedetail->section); 
$sersectionorder = collect($sersection)->sortBy('secorderby');
@endphp

@foreach($sersectionorder as $key => $sersectionlist)
@if($sersectionlist->appointment_side == 'upper')

@if($sersectionlist->type == 'twoparagraph')
<section class="sectionbx ServiceProcedure">
  <div class="container-fluid">
        <div class="row">
          
          <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-sm-12 col-xs-12 pt-4">
          @if(isset($sersectionlist->service_heading))
          <div class="srvcSubHd">
            {{ $sersectionlist->service_heading }}

          </div>
@endif
@if(isset($sersectionlist->service1)){!! $sersectionlist->service1 !!}@endif
<!-- <p class="pb-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
and scrambled it to make a type specimen book. Lorem Ipsum is simply dummy text of the printing an
typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has
survived not only five centuries, but also the leap into electronic typesetting</p>

<ul class="arrowListIcon pb15">
<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,</li>
<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
standard dummy text ever since the 1500s,</li>
<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
standard dummy text ever since the 1500s,</li>
<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
standard dummy text ever since the 1500s,</li>  
</ul> -->


          </div>
        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 SrgryIncld">
        @if(isset($sersectionlist->service2)){!! $sersectionlist->service2 !!}@endif
          <!-- <div class="SrgryIncldHD">Surgery includes</div>

          <ul class="arrowListIcon">
            <li>Lorem Ipsum is simply dummy text of the printing typesetting industry. Lorem Ipsum has been the industry's has been the industry's 1500s.</li>
            <li>Lorem Ipsum is simply dummy text of the printing typesetting industry. Lorem Ipsum has been the industry's has been the industry's 1500s.</li>
            <li>Lorem Ipsum is simply dummy text has been the industry's 1500s.</li>
            <li>Lorem Ipsum is simply dummy text of the printing typesetting industry. Lorem Ipsum has been the industry's has been the industry's 1500s.</li>
          </ul> -->
        </div>
        </div>
    </div>
  </section>
  @endif



  @if($sersectionlist->type == 'threeparagraph')
<section class="sectionbx">
  <div class="container-fluid">
    <div class="ServiceBenifits">
 <div class="srvcSubHd pb-4"> {{ $sersectionlist->service_heading }}</div>
        @php
        $datasec = $sersectionlist->threepragraph;
        @endphp
        @if(isset($datasec->orderby))
                      
<div class="row">
@foreach($datasec->orderby as $orderkey => $threelist)
  <div class="col-xxl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 p-4">
  {!! $datasec->threeparagraphdata[$orderkey] !!}
<!-- <ul class="arrowListIcon">
  <li>Lorem Ipsum is simply dummy text printing and typesetting industry.</li>
  <li>Lorem Ipsum is simply dummy text printing and typesetting industry.</li>
  <li>Lorem Ipsum is simply dummy text printing and typesetting industry.</li>
</ul> -->
  </div>
  @endforeach
  <!-- <div class="col-xxl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 p-4">
    <ul class="arrowListIcon">
      <li>Lorem Ipsum is simply dummy text printing and typesetting industry.</li>
      <li>Lorem Ipsum is simply dummy text printing and typesetting industry.</li>
      <li>Lorem Ipsum is simply dummy text printing and typesetting industry.</li>
    </ul>
  </div>
  <div class="col-xxl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 p-4">
    <ul class="arrowListIcon">
      <li>Lorem Ipsum is simply dummy text printing and typesetting industry.</li>
      <li>Lorem Ipsum is simply dummy text printing and typesetting industry.</li>
      <li>Lorem Ipsum is simply dummy text printing and typesetting industry.</li>
    </ul>
  </div> -->
</div>
@endif

    </div>
  </div>
</section>
@endif
@endif
@endforeach
@endif




<section class="sectionbx AppointmentSctn">
  <div class="container-fluid" data-aos="fade-up">

    <div class="row">
      <div class="col-xxl-8 offset-xxl-2 col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-12 col-xs-12">
        <div class="sctinHd text-center">Book An Appointment</div>
      <p class="pb-4 text-center">CLINIC TIMINGS:<br>
      {{ App\Http\Controllers\AppLaunchController::ContactDetail(); }} </p>
        <div class="frmcntnt">      
        {{ App\Http\Controllers\AppLaunchController::CommanAppointment(); }}   
      
      </div>
      </div>
    </div>

  </div>
</section>

@if(isset($servicedetail->section))
@foreach($sersectionorder as $key => $sersectionlist)
@if($sersectionlist->appointment_side == 'down')

@if($sersectionlist->type == 'threeparagraph')

@php
        $datasec = $sersectionlist->threepragraph;
        @endphp
        
<section class="sectionbx SrvcCandidate">
  <div class="container-fluid">
<div class="sctinHd">{{ $sersectionlist->service_heading }}</div>
@if(isset($datasec->orderby))
    <div class="row">
    @foreach($datasec->orderby as $orderkey => $threelist)
          <div class="col-xxl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
<div class="CandidateItem"> {!! $datasec->threeparagraphdata[$orderkey] !!}</div>
          </div>
          @endforeach
<!-- <div class="col-xxl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
<div class="CandidateItem">Lorem Ipsum is simply dummy text when an unknown printer took a printing and typesetting industry.</div>
</div>
<div class="col-xxl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
<div class="CandidateItem">Lorem Ipsum is simply dummy text when an unknown printer took a printing and typesetting industry.</div>
</div>
<div class="col-xxl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
  <div class="CandidateItem">Lorem Ipsum is simply dummy text when an unknown printer took a printing and typesetting
    industry.</div>
</div>
<div class="col-xxl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
  <div class="CandidateItem">Lorem Ipsum is simply dummy text when an unknown printer took a printing and typesetting
    industry.</div>
</div>
<div class="col-xxl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
  <div class="CandidateItem">Lorem Ipsum is simply dummy text when an unknown printer took a printing and typesetting
    industry.</div>
</div> -->

    </div>
    @endif
  </div>
</section>
@endif

@endif
@endforeach
@endif






@if(!$servicefaqs->isEmpty()) 

<section class="sectionbx SrvcFAQs">
  <div class="container-fluid">
    <div class="row">
      <!-- <div class="col-xxl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="IntlCnslttn">          
          <div class="sctinSbHd">Initial Consultation</div>
          
        <ul class="arrowListIcon"><li>Lorem Ipsum is simply dummy text
        of the printing typesetting industry.
        Lorem Ipsum has been the industry's
        has been the industry's 1500s.</li>
        <li>Lorem Ipsum is simply dummy text
          of the printing typesetting industry.
          Lorem Ipsum has been the industry's
          has been the industry's 1500s.</li>
          <li>Lorem Ipsum is simply dummy text
            of the printing typesetting</li>
            <li>Lorem Ipsum is simply dummy text
              of the printing typesetting industry.
              Lorem Ipsum has been the industry's
              has been the</li>
      </ul>
        </div>
      </div> -->
  
<div class="col-xxl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 faqLeftspace">
  <div class="sctinHd">FAQs</div>




<div class="accordion FAQsAcrdnBx" id="FAQsAccrdn">
@foreach($servicefaqs as $key => $servicefaqlist)
  <div class="accordion-item">
    <div class="accordion-header" id="faqs{{$key}}">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#Faqscollapse{{$key}}"
        aria-expanded="<?php if($key=='0'){echo 'true';}else{echo 'false';}?>" aria-controls="Faqscollapse1">
        {!! strip_tags($servicefaqlist->question) !!}
      </button>
    </div>
    <div id="Faqscollapse{{$key}}" class="accordion-collapse <?php if($key=='0'){echo 'collapsed show';}?>" aria-labelledby="faqs{{$key}}"
      data-bs-parent="#FAQsAccrdn">
      <div class="accordion-body">{!! $servicefaqlist->answer !!}
      </div>
    </div>
  </div>
  @endforeach
  
</div>

</div>
    </div>
  </div>
</section>
@endif
{{ App\Http\Controllers\AppLaunchController::CommanFooter(); }}