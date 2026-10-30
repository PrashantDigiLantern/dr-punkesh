<?php
$public_url="";
if(isset(session('userorginfo')['site_url'])){
 $public_url = session('userorginfo')['site_url'];
}

?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
<!-- <title>:: Dr. Prashant Murugkar ::</title> -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=PT+Serif:wght@400;700&family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link href="{{$public_url.'css/style.css'}}" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
</head>
<body>
 
<!-- Header Start --> 
<header>
    <div class="row">
    <div class="col-lg-12 col-md-12">
    <!-- Start Mobile navigation -->
    
    <div class="mobile_navigation">
    <nav class="main-nav float-right d-none d-lg-none">
    <ul>
    <li class="active">
    <a href="{{url('/')}}" class="mlogobx"><img src="{{$public_url}}backend/logo/@if(isset($headerlogo->header_logo)){{$headerlogo->header_logo}}@endif" alt="@if(isset($headerlogo->alt_tag)){{$headerlogo->alt_tag}}@endif"/> </a>
    </li> 
    @foreach($firstmenu as $key => $firstmenulist)        
        @if($firstmenulist->dropdown=='Yes')
        <li class="drop-down"><a href="{{url($firstmenulist->urllink)}}">{{$firstmenulist->name}}</a>
      
          <ul>
          @foreach($firstmenulist->children as $key => $secondmenulist)
          @if($firstmenulist->mnu_id==$secondmenulist->parent_id)
            <li><a href="{{url($secondmenulist->urllink)}}">{{$secondmenulist->name}}</a></li>
          @endif
            @endforeach
          </ul>
      </li>
        @else
        <li><a href="{{url($firstmenulist->urllink)}}">{{$firstmenulist->name}}</a></li>
        @endif
        @endforeach
    <!-- <li><a href="{{url('/')}}">HOME</a></li>
    <li class="drop-down"><a href="#">ABOUT US</a>
    <ul>
    <li><a href="{{url('/about-doctor')}}">About Doctor</a></li>
    <li><a href="{{url('/about-clinic')}}">About Clinic</a></li>
    </ul>
    </li>
    <li class="drop-down"><a href="{{url('/Services')}}">SERVICES</a>
    <ul>
    <li><a href="{{url('/service-details')}}">Service 1</a></li>
    <li class="drop-down"><a href="#">Service 2</a>		
    <ul>
    <li><a href="{{url('/service-details')}}">Service 2.1</a></li>
    <li><a href="#">Service 2.2</a></li>
    </ul>
    </li>
    </ul>
  </li>
    <li class="drop-down"><a href="#">GALLERY</a>
    <ul>
    <li><a href="{{url('/gallery')}}">Clinic Gallery</a></li>
    <li><a href="{{url('/videos')}}">Video Gallery</a></li>
    </ul></li>	
    <li class="drop-down"><a href="{{url('/testimonials')}}">TESTIMONIALS</a>
    <ul>
    <li><a href="{{url('/testimonials')}}">Written Testimonials</a></li>
    </ul></li>
    <li><a href="{{url('/blogs')}}">BLOGS</a></li>
    <li><a href="{{url('/contact-us')}}">CONTACT US</a></li> -->
    <li class="btn-highlight"><a href="{{url('/schedule-a-consultation')}}">BOOK AN APPOINTMENT</a></li>
    </ul>
    <div class="col-lg-4 col-md-4 col-sm-12 pt-4">
    <ul class="social-network socialsdmnu">
    <li><a class="waves-effect waves-dark" href="https://www.facebook.com/Hair-Skin-PRP-Clinic-102942025528735" target="_blank"><i class="fa fa-facebook"></i></a></li>
    <li><a class="waves-effect waves-dark" href="https://www.instagram.com/beautydoctorcardiff/" target="_blank"><i class="fa fa-instagram"></i></a></li>
    <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-youtube-play"></i></a></li>
    </ul>
    </div>
    </nav>
    </div>
    <!-- End Mobile navigation -->
    
    @if(isset($contactus->phone))
    @php 
  $phonedata = json_decode($contactus->phone); 
  $phonelist = $phonedata->primary;
  $phoneseclist = $phonedata->secondary;
  $phonelist = collect($phonelist)->sortBy('phone_order_by');
  $phoneseclist = collect($phoneseclist)->sortBy('phone_order_by');
  @endphp
@endif
@if(isset($contactus->email_id))
@php
  $emailiddata = json_decode($contactus->email_id); 
  $emailidlist = $emailiddata->primary;
  $emailidseclist = $emailiddata->secondary;
  $emailidlist = collect($emailidlist)->sortBy('email_order_by');
  $emailidseclist = collect($emailidseclist)->sortBy('email_order_by');
  @endphp
@endif
 
    <div class="row hrdtopinfo">
      <div class="col-lg-6 col-md-12 col-sm-12">
      @if(isset($contactus->phone))
      <i aria-hidden="true" class="fa fa-phone"></i>&nbsp;
      @foreach($phonelist as $priphonelist)
     <a href="Tel:+{{$priphonelist->phonecode}} {{$priphonelist->phone}}">+{{$priphonelist->phonecode}} {{$priphonelist->phone}}</a>
    @endforeach
    @if(!$phoneseclist->isEmpty())
    <!-- <i aria-hidden="true" class="fa fa-phone"></i>&nbsp; -->
    @foreach($phoneseclist as $phonesecdatalist)
    <a href="Tel:+{{$phonesecdatalist->phonecode}} {{$phonesecdatalist->phone}}">+{{$phonesecdatalist->phonecode}} {{$phonesecdatalist->phone}}</a>
    @endforeach
    @endif
    @endif
    @if(isset($contactus->email_id))
    <i aria-hidden="true" class="fa fa-envelope-o"></i>&nbsp;
    @foreach($emailidlist as $emailiddatalist)
    <a href="Mailto:{{$emailiddatalist->email}}">{{$emailiddatalist->email}}</a>
    @endforeach
    @if(!$emailidseclist->isEmpty())
    @foreach($emailidseclist as $emailidsecdatalist)
    <a href="Tel:{{$emailidsecdatalist->email}}">{{$emailidsecdatalist->email}}</a>
    @endforeach
    @endif
    @endif
        <!-- <i aria-hidden="true" class="fa fa-phone"></i>&nbsp; <a href="Tel:+447368142277">+44 7368 142277</a>&nbsp; |&nbsp; 
        <i aria-hidden="true" class="fa fa-envelope-o"></i>&nbsp; <a href="Mailto:beautydoctorcardiff@gmail.com">beautydoctorcardiff@gmail.com</a> -->
      </div>
        <div class="col-lg-6 col-md-12 col-sm-12 topApntmtBtn"><a href="{{url('/')}}"><img src="{{$public_url}}backend/logo/@if(isset($headerlogo->header_logo)){{$headerlogo->header_logo}}@endif" width="75" alt="@if(isset($headerlogo->alt_tag)){{$headerlogo->alt_tag}}@endif" class="mlogo"></a> <a href="{{url('/schedule-a-consultation')}}" class="btn-top-apointmnt">Book an appointment</a></div>
      </div>

    <nav class="mnmenubx">
      <label for="drop" class="toggle mobile-toggle">☰</label>
      <input type="checkbox" id="drop" />
      <ul class="menu">
        @foreach($firstmenu as $key => $firstmenulist)
        @if($key=='3')
        <div class="dlogobx"><a href="{{url('/')}}"><img src="{{$public_url}}backend/logo/@if(isset($headerlogo->header_logo)){{$headerlogo->header_logo}}@endif" alt="@if(isset($headerlogo->alt_tag)){{$headerlogo->alt_tag}}@endif"></a></div>
        @endif
        
        @if($firstmenulist->dropdown=='Yes')
        <li>
          <label for="drop-2" class="toggle">{{$firstmenulist->name}}</label>
          <a href="{{url($firstmenulist->urllink)}}">{{$firstmenulist->name}} <i class="fa fa-sort-down"></i></a>
          <input type="checkbox" id="drop-2" />
          <ul>
          @foreach($firstmenulist->children as $key => $secondmenulist)
            <li><a href="{{url($secondmenulist->urllink)}}">{{$secondmenulist->name}}</a></li>
            @endforeach
          </ul>
      </li>
        @else
        <li><a href="{{url($firstmenulist->urllink)}}">{{$firstmenulist->name}}</a></li>
        @endif
        @endforeach
      
      </ul> 
      <!-- <ul class="menu">
      <li><a href="{{url('/')}}">Home</a></li>
      <li><a href="{{url('/about-doctor')}}">About Dr</a></li>
      <li><a href="{{url('/about-clinic')}}">About Clinic</a></li>
      <li>
        
          <label for="drop-2" class="toggle">Services</label>
          <a href="{{url('/Services')}}">Services <i class="fa fa-sort-down"></i></a>
          <input type="checkbox" id="drop-2" />
          <ul>
            <li><a href="{{url('/service-details')}}">Service 1</a></li>
            <li><a href="{{url('/service-details')}}">Service 2</a></li>
            <li><a href="#">Service 3</a></li>
            <li><a href="#">Service 4</a></li>
            <li><a href="#">Service 5</a></li>
            <li><a href="#">Service 6</a></li>
          </ul>
      </li>
      <div class="dlogobx"><a href="{{url('/')}}"><img src="{{$public_url}}images/reforme-logo.webp" width="160" alt="logo"></a></div>
      <li>
        
          <label for="drop-3" class="toggle">Gallery</label>
          <a>Gallery <i class="fa fa-sort-down"></i></a>
          <input type="checkbox" id="drop-3" />
          <ul>
             <li><a href="{{url('/gallery')}}">Clinic Gallery</a></li>
              <li><a href="{{url('/videos')}}">Videos</a></li>
              <li><a href="{{url('/real-results')}}">Real Results</a></li>
          </ul>
      </li>      
      <li>
         
          <label for="drop-4" class="toggle">Testimonials </label>
          <a>Testimonials <i class="fa fa-sort-down"></i></a>
          <input type="checkbox" id="drop-4" />
          <ul>
              <li><a href="{{url('/testimonials')}}">Written Testimonials</a></li>
              <li><a href="#">Video Testimonials</a></li>
          </ul>
      </li>      
      <li><a href="{{url('/blogs')}}">Blogs</a>
      </li>
      <li><a href="{{url('/contact-us')}}">Contact Us</a></li>      
      </ul>  -->
      </nav>
    </div>
    </div>
</header>
<!-- Header End -->