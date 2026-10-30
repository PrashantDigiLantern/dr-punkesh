@php
$public_url="";
if(isset(session('userorginfo')['site_url'])){
$public_url = session('userorginfo')['site_url'];
}
@endphp
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
</head>
<body>

<!-- Header Start -->
<header>
    <div class="row">
    <div class="col-lg-12 col-md-12">
    <!-- Mobile navigation -->
    <div class="row hrdtopinfo">
      <div class="col-lg-6 col-md-6 col-sm-12"><i aria-hidden="true" class="fa fa-phone"></i>&nbsp; <a href="Tel:+919999999999">+91 9999 999 999</a>&nbsp; |&nbsp; 
        <i aria-hidden="true" class="fa fa-envelope-o"></i>&nbsp; <a href="Mailto:info@template.com">info@template.com</a></div>
        <div class="col-lg-6 col-md-6 col-sm-12 text-right"><a href="{{url('schedule-a-consultation')}}" class="btn-top-apointmnt">Book an appointment</a></div>
      </div>

    <nav class="mnmenubx">
      <label for="drop" class="toggle mobile-toggle">☰</label>
      <input type="checkbox" id="drop" />
      <ul class="menu">
        @foreach($firstmenu as $key => $firstmenulist)
        @if($key=='4')
        <div class="dlogobx"><a href="{{url('/')}}"><img src="{{$public_url}}images/logo3.png" alt="logo"></a></div>
        @endif
        
        @if($firstmenulist->dropdown=='Yes')
        <li>
          <label for="drop-2" class="toggle">{{$firstmenulist->name}}</label>
          <a href="{{url($firstmenulist->urllink)}}">{{$firstmenulist->name}} <i class="fa fa-sort-down"></i></a>
          <input type="checkbox" id="drop-2" />
          <ul>
          @foreach($secondmenu as $key => $secondmenulist)
          @if($firstmenulist->pri_mnu_id==$secondmenulist->pri_mnu_id)
            <li><a href="{{url($secondmenulist->urllink)}}">{{$secondmenulist->name}}</a></li>
          @endif
            @endforeach
          </ul>
      </li>
        @else
        <li><a href="{{url($firstmenulist->urllink)}}">{{$firstmenulist->name}}</a></li>
        @endif
      
        @endforeach
      
      </ul> 
      </nav>
    </div>
    </div>
</header>
<!-- Header End -->

