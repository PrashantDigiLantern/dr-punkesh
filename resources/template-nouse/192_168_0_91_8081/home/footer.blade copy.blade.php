@php
$public_url="";
if(isset(session('userorginfo')['site_url'])){
$public_url = session('userorginfo')['site_url'];
}
@endphp
<footer>
<div class="container-fluid">
<div class="row">
  <div class="col-md-3"><a href="{{url('/')}}"><img src="{{$public_url}}images/logo-white.png" alt="logo" class="img-fluid "></a>
<ul class="social-network my-4">
  <li><a class="waves-effect waves-dark" href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a></li>
  <li><a class="waves-effect waves-dark" href="https://www.instagram.com/" target="_blank"><i class="fa fa-instagram"></i></a></li>
  <li><a class="waves-effect waves-dark" href="https://www.youtube.com/" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
  </ul>
  <div><a href="{{url('/schedule-a-consultation')}}" class="btn btn-readmoreblk">Book An Appointment</a></div>
</div>

  <div class="col-md-3">
    <div class="footerhd">Useful Links</div>
    <ul class="ftrlinks">
      <li><a href="{{url('/')}}">Home</a></li>
      <li><a href="{{url('/about-doctor')}}">About Dr</a></li>
      <li><a href="{{url('/about-clinic')}}">About Clinic</a></li>
      <li><a href="{{url('/gallery')}}">Clinic Gallery</a></li>
      <li><a href="{{url('/testimonials')}}">Testimonials</a></li>
      <li><a href="{{url('/blogs')}}">Blogs</a></li>
      <li><a href="{{url('/contact-us')}}">Contact Us</a></li>
      </ul>
  </div>
  <div class="col-md-3">
    <div class="footerhd">Services</div>
    <ul class="ftrlinks">
      <li><a href="{{url('/service-details')}}">Service One</a></li>
      <li><a href="#">Service Two</a></li>
      <li><a href="#">Service Three</a></li>
      <li><a href="#">Service Four</a></li>
      <li><a href="#">Service Five</a></li>
      <li><a href="#">Service Six</a></li>
      <li><a href="#">Service Serven</a></li>
      </ul>
  </div>
  <div class="col-md-3">
    <div class="footerhd">Contact Us</div>
    <ul class="ftradressinfo" style="position: relative;z-index:1;">
    <li><i class="fa fa-map-marker" aria-hidden="true"></i> E-14 B, 401, Sector 8, Noida<br>Uttar Pradesh 201301</li>
    <li><i class="fa fa-phone" aria-hidden="true"></i> <a href="Tel:+919999999999">+91-9999 999 999</a></li>
    <li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="Mailto:info@template.com">info@template.com</a></li>
    </ul></div>
</div>
</div>
<div class="ftr-triangle"></div>
</footer>

<div class="container-fluid ftrbtm">
<div class="row">
<div class="col-md-6">Copyright © 2021 - All Rights Reserved.</div>
<div class="col-md-6 text-right">Powered by <a href="#" style="color:#fff">DigiLantern</a></div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>	
<script src="{{$public_url}}js/custom.js"></script>
<script src="{{$public_url}}js/appointment.js"></script>
</body>
</html>