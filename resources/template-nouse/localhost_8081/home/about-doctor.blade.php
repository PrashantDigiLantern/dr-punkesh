{{ App\Http\Controllers\AppLaunchController::CommanHeader(); }}
@php
 $public_url="";
 if(isset(session('userorginfo')['site_url'])){
 $public_url = session('userorginfo')['site_url'];
 }
@endphp


  <!-- Start Banner -->
  <div class="innerHeader">
     
    <div class="container-fluid">
<div class="BreadCrumb" data-aos="fade-up"><a href="{{url('/')}}">Home</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <a>About Doctor</a></div>
@if(!$doctorlist->isEmpty())
@foreach($doctorlist as $doctorlistsec)
<div class="row pt-3" data-aos="fade-up">
  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-12"><img src='{{$public_url}}backend/doctor/{{$doctorlistsec->image}}' class="img-fluid clinicPic" alt="{{$doctorlistsec->alt_tag}}"></div>
  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-12">
    <div class="sctinSmlTxt">Meet The Doctor</div>
    <div class="sctinHd">{{$doctorlistsec->name}}</div>
    <p>{{ $doctorlistsec->short_degree }}</p>
  </div>
</div>
@endforeach
@endif

</div>
  </div>
  <!-- End Banner -->



  @if(!$doctorlist->isEmpty())
@foreach($doctorlist as $doctorlistsec)
  <section class="sectionbx">
    <div class="container-fluid" data-aos="fade-up">
  
      <div class="row">
        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12"></div>
        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
      <p class="pb-3"> {!! $doctorlistsec->sort_desc !!}</p></div>

      </div>
</div>
</section>
@endforeach
@endif



<section class="sectionbx AwardsSct">
  <div class="container-fluid" data-aos="fade-up">
    <div class="sctinHd text-center">Awards and Recognitions</div>
    <div class="row">
      <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <div class="awardBox">
        <div class="row align-items-center">
          <div class="col-md-2 col-3"><img src="{{$public_url}}images/award-icon.png" alt="icon" class="img-fluid"></div>
          <div class="col-md-10 col-9">State Topper – 1995</div>
        </div>
      </div>
      </div>
      <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
<div class="awardBox">
  <div class="row align-items-center">
    <div class="col-md-2 col-3"><img src="{{$public_url}}images/award-icon.png" alt="icon" class="img-fluid"></div>
    <div class="col-md-10 col-9">All India second rank in Mch Plastic Surgery Examination at PGIMER.</div>
  </div>
</div>
      </div>
      <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
<div class="awardBox">
  <div class="row align-items-center">
    <div class="col-md-2 col-3"><img src="{{$public_url}}images/award-icon.png" alt="icon" class="img-fluid"></div>
    <div class="col-md-10 col-9">Best audio-visual presentation at Annual Conference of Association of Plastic Surgeons of India for...
</div>
  </div>
</div>
      </div>
    </div>
  </div>
</section>






@if(!$doctorlist->isEmpty())
@foreach($doctorlist as $doctorlistsec)
<section class="sectionbx EduExpSectn">
  <div class="container-fluid">    
    <div class="row">
    @if(isset($doctorlistsec->education_detail))
      <div class="col-xxl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" data-aos="fade-up">
        <div class="sctinHd">Medical Education</div>        
          <ul class="EduTimeline EduTmln">
          @php
  $education = json_decode($doctorlistsec->education_detail); 
  $educationlist = $education->education;
  $educationlist = collect($educationlist)->sortBy('education_order_by');
  @endphp

  @foreach($education->education as $educationdetail)
            <li>             
              <p><strong>{{ $educationdetail->education_name }} ({{$educationdetail->education_year}})</strong><br>
              {{ $educationdetail->education_college }} </p>
            </li>
            @endforeach
          </ul>
      </div>
      @endif
      @if(isset($doctorlistsec->experience_detail))
<div class="col-xxl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12" data-aos="fade-up">
  <div class="sctinHd">Experience</div>
<ul class="EduTimeline">
@php
  $experience = json_decode($doctorlistsec->experience_detail); 
  $experiencelist = $experience->experience;
  $experiencelist = collect($experiencelist)->sortBy('experience_order_by');
  @endphp

@foreach($experiencelist as $experiencedetail)
  <li>
    <p>@if(isset($experiencedetail->experience_year))<strong>{{$experiencedetail->experience_year}}
</strong><br>@endif
  {{$experiencedetail->experience_address}}</p>
  </li>
  @endforeach
  <!-- <li>
    <p><strong>2013-present</strong><br>
    Visiting consultant at Apollo Spectra Hospital, Kailash Colony</p>
  </li>
  <li>
    <p><strong>2013-2014</strong><br>
    Sr Registrar – Dept. of Plastic Surgery at Indraprasthra Apollo Hospital</p>
  </li>
  <li><p><strong>2009-2012</strong><br>
  Resident Plastic surgery at Post Graduate Institute of Medical Education and Research (PGIMER), Chandigarh</p></li>
  <li><p>Senior Resident at Dept. of Burns and Plastic Surgery,
  Safdarjung Hospital</p> -->
<!-- </li> -->
</ul>

</div>
@endif
    </div>
    
  </div>
</section>


@endforeach
@endif


<section class="sectionbx">
  <div class="container-fluid" data-aos="fade-up">
        <div class="row align-items-center">
          
          <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
            <div class="abtRghtSpc">
            <div class="sctinHd">Why Patient Choose<br>Dr. Mrinalini Sharma</div>
            <p class="pb-3">Lorem Ipsum is simply dummy text of the printing and typesetting
            industry. Lorem Ipsum has been the industry's standard dummy text
            ever since the 1500s, when an unknown printer took a galley of type
            and scrambled it to make a type specimen book.</p>

<div class="row">
  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
    <ul class="arrowListIcon pb15">
      <li>Lorem Ipsum is simply and text of the printing.</li>
      <li>Lorem Ipsum is simply and text of the printing.</li>
      <li>Lorem Ipsum is simply and text of the printing.</li>
    </ul>
  </div>
  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12">
    <ul class="arrowListIcon pb15">
      <li>Lorem Ipsum is simply and text of the printing.</li>
      <li>Lorem Ipsum is simply and text of the printing.</li>
      <li>Lorem Ipsum is simply and text of the printing.</li> 
    </ul>
  </div>
</div>
<div class="mb-3"><a href="schedule-a-consultation.html" class="btn-appointment">Book An Appointment</a></div>
      </div>
    </div>
        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-xs-12"><img src="{{$public_url}}images/why-choose-dr-mrinalini-sharma-1.jpg" class="img-fluid w-100" alt="why choose dr. mrinalini sharma"></div>
        </div>
    </div>
  </section>




<section class="sectionbx AppointmentSctn">
  <div class="container-fluid" data-aos="fade-up">

    <div class="row">
<div class="col-xxl-8 offset-xxl-2 col-xl-8 offset-xl-2 col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12 col-xs-12">
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



{{ App\Http\Controllers\AppLaunchController::CommanTestimonials(); }}

{{ App\Http\Controllers\AppLaunchController::CommanFooter(); }}