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
<!-- Doctor Header Start -->
    <div class="inner-page-header" style="background-image:url({{$public_url}}images/about-clinic-page-header.jpg);">
<div class="container">
  <div class="row align-items-center">
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6"> <div class="breadcrumbs-bx"><a href="{{url('/')}}">Home</a> / <a href="{{url('/contact-us')}}">Contact Us</a></div> </div>
   
</div>
      </div>
    </div>
<!-- Doctor Header End -->



<section class="sectionbx contactUs">
  <div class="container">
    <div class="row">
    <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12">
    <div class="bg-dot primary" data-aos="fade-right"></div>
    <div class="row p-4">
    <div class="col-lg-6" data-aos="fade-up"><img src="{{$public_url}}images/contact-pic1.jpg" class="img-fluid" alt=""></div>
    <div class="col-lg-6">

    <div class="card-body py-4 mb-3 text-center" data-aos="fade-left" data-aos-delay="300" style="background:#f6f6f6;">
    <h3 class="counter text-nowrap">1000+</h3>
    <p class="mb-0">Satisfied patient</p>
    </div>
    <img src="{{$public_url}}images/contact-pic2.jpg" class="img-fluid" alt="" data-aos="fade-up"></div>
    </div>
    </div>
    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12" data-aos="fade-up">
    <h3 class="fontPTserif">Convinced yet? Let's make something great together.</h3>
    <div>
 @if(!$contactus->isEmpty())
 @foreach($contactus as $contactuslist)
    <ul class="adressinfo">
    <li><i class="fa fa-map-marker" aria-hidden="true"></i> <b>Address</b>
    <br>{{$contactuslist->address}}
    @if(isset($contactuslist->address1))
    ,<br>{{$contactuslist->address1}}
    @endif
    @if(isset($contactuslist->address2))
    ,<br>{{$contactuslist->address2}}
    @endif
    @if(isset($contactuslist->pincode))
    -{{$contactuslist->pincode}}
  @endif
</li>
@if(isset($contactuslist->phone))
@php
$phonedata = json_decode($contactuslist->phone); 
  $phonelist = $phonedata->primary;
  $phonelist = collect($phonelist)->sortBy('phone_order_by');
  @endphp
  @if(isset($phonedata->secondary))
  @php
  $phoneseclist = $phonedata->secondary;
  $phoneseclist = collect($phoneseclist)->sortBy('phone_order_by');
  @endphp
@endif
@endif

@if(isset($contactuslist->email_id))
@php
  $emailiddata = json_decode($contactuslist->email_id); 
  $emailidlist = $emailiddata->primary;
  @endphp
  @if(isset($emailiddata->secondary))
  @php
  $emailidseclist = $emailiddata->secondary;
  $emailidseclist = collect($emailidseclist)->sortBy('email_order_by');
@endphp
@endif
@endif
@if(isset($phonelist))
    @if(!$phonelist->isEmpty())
@foreach($phonelist as $priphonelist)
    <li><i class="fa fa-phone" aria-hidden="true"></i> <a href="Tel:+{{$priphonelist->phonecode}} {{$priphonelist->phone}}">+{{$priphonelist->phonecode}} {{$priphonelist->phone}}</a></li>
    @endforeach
    @endif
    @endif
    @if(isset($phoneseclist))
    @if(!$phoneseclist->isEmpty())
    @foreach($phoneseclist as $phonesecdatalist)
    <li><i class="fa fa-phone" aria-hidden="true"></i> <a href="Tel:+{{$phonesecdatalist->phonecode}} {{$phonesecdatalist->phone}}">+{{$phonesecdatalist->phonecode}} {{$phonesecdatalist->phone}}</a></li>
    @endforeach
    @endif
    @endif
    
    @if(isset($emailidlist))
    @foreach($emailidlist as $emailiddatalist)
    <li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="Mailto:{{$emailiddatalist->email}}">{{$emailiddatalist->email}}</a></li>
    @endforeach
    @endif
    @if(isset($emailidseclist))
    @if(!$emailidseclist->isEmpty())
    @foreach($emailidseclist as $emailidsecdatalist)
    <li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="Tel:{{$emailidsecdatalist->email}}">{{$emailidsecdatalist->email}}</a></li>
    @endforeach
    @endif
    @endif
    <!-- <li><i class="fa fa-phone" aria-hidden="true"></i> <b>Phone</b><br><a href="Tel:+447368142277">+44 7368 142277</a></li>
    <li><i class="fa fa-envelope-o" aria-hidden="true"></i> <b>Email</b> <br><a href="Mailto:beautydoctorcardiff@gmail.com">beautydoctorcardiff@gmail.com</a></li> -->
    </ul>
    @endforeach
    @endif
    </div>
    </div>
    </div>    
  </div>
</section>



    <section class="sectionbx contactUsForm">
    <div class="container">

    <div class="row">
    <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1 col-md-10 offset-md-1 col-sm-12 text-center" data-aos="fade-up">
    <h2 class="mb-3">Drop Us a Line</h2>
    <p class="mb-4">Reach out to us from our contact form and we will get back to you shortly.</p>
    <form class="row needs-validation" action="{{url('/contactussave')}}" id="myForm" method="POST">
    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
      <div class="col-md-4 mb-4">
        <input type="text" class="inptfld" id="name" name="name" placeholder="Name*" required>
        <div class="valid-feedback">Enter Name</div>
      </div>
      <div class="col-md-4 mb-4">
        <input type="text" class="inptfld" id="phone" name="phone" minlength="10" maxlength="10" placeholder="Phone*" required>
        <div class="valid-feedback">Enter Phone No.</div>
      </div>
  
      <div class="col-md-4 mb-4">
        <input type="email" class="inptfld" id="email" name="email" placeholder="Email*" required>
        <div class="valid-feedback">Enter Email</div>
      </div>

      <div class="col-md-12">
        <textarea class="inptfld" rows="4" id="message" name="message" placeholder="Message"></textarea>
      </div>
      <input type="hidden" class="inptfld" id="org_id" value="{{session('userorginfo')['org_id']}}" name="org_id" required>
            <input type="hidden" class="inptfld" id="site_id" value="{{session('userorginfo')['site_id']}}" name="site_id" required>
      <!-- <div class="col-md-12 mt-2 mb-3">
        <img src="{{$public_url}}images/capcha.jpg" width="240" alt="Capcha" style="border:#ddd solid 1px;">
      </div>  -->
      <div class="col-12">
        <button class="btn btn-submit" type="submit" onclick="validatecontact()">SUBMIT</button>
      </div>
    </form>    

    </div>    
  </div>

</div>
</section>

{{ App\Http\Controllers\AppLaunchController::CommanFooter(); }}