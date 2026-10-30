@php
$public_url="";
if(isset(session('userorginfo')['site_url'])){
$public_url = session('userorginfo')['site_url'];
}
@endphp
<footer>
  @if(!$footer->isEmpty())
<div class="container-fluid">
<div class="row">
  <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4">
    @foreach($footer as $footerlist)
    @if($footerlist->footer_type=='leftside')
    <a href="{{url('/')}}"><img src="{{$public_url}}backend/logo/@if(isset($footerlist->footer_logo)){{$footerlist->footer_logo}}@endif" alt="@if(isset($footerlist->alt_tag)){{$footerlist->alt_tag}}@endif" class="img-fluid "></a>
<ul class="social-network my-4">
  <li><a class="waves-effect waves-dark" href="https://www.facebook.com/Hair-Skin-PRP-Clinic-102942025528735" target="_blank"><i class="fa fa-facebook"></i></a></li>
  <li><a class="waves-effect waves-dark" href="https://www.instagram.com/beautydoctorcardiff/" target="_blank"><i class="fa fa-instagram"></i></a></li>
  <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-youtube-play"></i></a></li>
  </ul>
  <div><a href="{{url('/schedule-a-consultation')}}" class="btn btn-readmoreblk">Book An Appointment</a></div>
  @endif
  @endforeach
</div>
@foreach($footer as $footerlist)
    @if($footerlist->footer_type=='rightside')
  <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4">
    <div class="footerhd">{{$footerlist->footer_name}}</div>
    @php
    
    $footerlist = json_decode($footerlist->menu_name); 
  $footerlistsec = $footerlist->menuname;
  $footerlistsec = collect($footerlistsec)->sortBy('menu_order_by');
    @endphp
    <ul class="ftrlinks">
      @foreach($footerlistsec as $footerlistdata)
      <li><a href="{{url($footerlistdata->menu_url)}}">{{$footerlistdata->menu_name}}</a></li>
      @endforeach
      <!-- <li><a href="{{url('/about-doctor')}}">About Doctor</a></li>
      <li><a href="{{url('/about-clinic')}}">About Clinic</a></li>
      <li><a href="{{url('/gallery')}}">Clinic Gallery</a></li>
      <li><a href="{{url('/testimonials')}}">Testimonials</a></li>
      <li><a href="{{url('/blogs')}}">Blogs</a></li>
      <li><a href="{{url('/contact-us')}}">Contact Us</a></li> -->
      </ul>
  </div>
  <!-- <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4">
    <div class="footerhd">Services</div>
    <ul class="ftrlinks">      
  <li><a href="{{url('services/prp-for-hair-growth-men')}}">PRP for Hair Growth - Men</a></li>
  <li><a href="{{url('services/prp-for-hair-growth-women')}}">PRP for Hair Growth - Women</a></li>
<li><a href="{{url('services/prp-for-skin-rejuvenation')}}">PRP for Skin Rejuvenation</a></li>

      </ul>
  </div> -->
  @endif
  @endforeach
  <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12">
    <div class="footerhd">Contact Us</div>

    @if(isset($contactus->phone))
    @php 
  $phonedata = json_decode($contactus->phone); 
  $phonelist = $phonedata->primary;
  $phonelist = collect($phonelist)->sortBy('phone_order_by');
  @endphp
  @if(isset($phonedata->secondary))
  @if(!$phonedata->secondary->isEmpty())
  @php
  $phoneseclist = $phonedata->secondary;
  $phoneseclist = collect($phoneseclist)->sortBy('phone_order_by');
  @endphp
  @endif
  @endif
  @endif

  @if(isset($contactus->email_id))
  @php
  $emailiddata = json_decode($contactus->email_id); 
  $emailidlist = $emailiddata->primary;
  $emailidlist = collect($emailidlist)->sortBy('email_order_by');
  @endphp
  @if(isset($emailiddata->secondary))
  @if(!$emailiddata->secondary->isEmpty())
  @php
  $emailidseclist = $emailiddata->secondary;
  $emailidseclist = collect($emailidseclist)->sortBy('email_order_by');
  @endphp
  @endif
  @endif
  @endif
  <ul class="ftradressinfo">
    <li><i class="fa fa-map-marker" aria-hidden="true"></i> {{$contactus->address}} @if(isset($contactus->address1)),<br>{{$contactus->address1}}@endif @if(isset($contactus->address2)),<br>{{$contactus->address2}}@endif @if(isset($contactus->pincode))-{{$contactus->pincode}}@endif</li>
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
    @if(!$emailidlist->isEmpty())
    @foreach($emailidlist as $emailiddatalist)
    <li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="Mailto:{{$emailiddatalist->email}}">{{$emailiddatalist->email}}</a></li>
    @endforeach
    @endif
    @endif
    @if(isset($emailidseclist))
    @if(!$emailidseclist->isEmpty())
    @foreach($emailidseclist as $emailidsecdatalist)
    <li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="Tel:{{$emailidsecdatalist->email}}">{{$emailidsecdatalist->email}}</a></li>
    @endforeach
    @endif
    @endif
  </ul>
    
  </div>
</div>
</div>
@endif
<div class="ftr-triangle"></div>
</footer>

<div class="container-fluid ftrbtm">
<div class="row">
<div class="col-md-6">Copyright © 2021 - All Rights Reserved.</div>
<div class="col-md-6 text-lg-right text-xl-right">Powered by <a href="#" style="color:#fff">DigiLantern</a></div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>	
<script src="{{$public_url}}js/custom.js"></script>
<script src="{{$public_url}}js/appointment.js"></script>

<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
<script src="{{$public_url}}js/slick.js"></script>
 <script type="text/javascript">
    $(document).on('ready', function() {
    $(".center").slick({
        dots: false,
        infinite: true,
        centerMode: true,
        slidesToShow: 4,
        slidesToScroll: 1
      });
    });
</script>
</body>
</html>