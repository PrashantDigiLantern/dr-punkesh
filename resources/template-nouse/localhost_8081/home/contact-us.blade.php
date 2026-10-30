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
<div class="BreadCrumb text-center" data-aos="fade-up"><a href="{{url('/')}}">Home</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <a>Contact Us</a></div>
<div class="row pt-1" data-aos="fade-up">
   <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-12 text-center">
    <div class="sctinHd">Contact Us</div>
  </div>
</div>
</div>
  </div>
  <!-- End Banner --> 

  <section class="sectionbx ContactUsPage">
    <div class="container">  
      <div class="row align-items-center">
        <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-12 col-sm-12 col-xs-12" data-aos="fade-up">
          <div class="sctinHd">Get in Touch</div>

          <form class="form" role="form" autocomplete="off" action="{{url('/contactussave')}}" id="myForm" method="POST">
          <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            <div class="row">
              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <input type="text" class="form-control infldtrnsprnt" id="name" name="name" placeholder="Name*" required>
                  <div class="invalid-feedback">Please enter name</div>
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <div class="form-group">
                  <input type="email" class="form-control infldtrnsprnt" id="email" name="email" placeholder="Email*" required="">
                  <div class="invalid-feedback">Please enter email</div>
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <div class="form-group">
                  <input type="text" minlength="10" maxlength="10" class="form-control infldtrnsprnt js-input-mobile" id="phone" name="phone"
                    placeholder="Phone*" required="">
                  <div class="invalid-feedback">Please enter phone</div>
                </div>
              </div>
              <div class="col-md-12 mb-3">
                <div class="form-group">
                  <textarea id="message" name="message" rows="6" placeholder="Message..." class="form-control"></textarea>
                </div>
              </div>
            </div>
            <input type="hidden" class="inptfld" id="org_id" value="{{session('userorginfo')['org_id']}}" name="org_id" required>
            <input type="hidden" class="inptfld" id="site_id" value="{{session('userorginfo')['site_id']}}" name="site_id" required>
            <div class="text-center mb-md-3"><button type="submit"  onclick="validatecontact()" class="btnSubmit">Submit</button></div>
          </form>
        </div>
     
      <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-12 col-sm-12 col-xs-12" data-aos="fade-up">
        <div class="cntctSdePnl">
     <h2>Address</h2>
     @if(!$contactus->isEmpty())
 @foreach($contactus as $contactuslist)
    <p><strong>Location</strong><br>{{$contactuslist->name}} {{$contactuslist->address}}
     @if(isset($contactuslist->address1))
    ,<br>{{$contactuslist->address1}}
    @endif
    @if(isset($contactuslist->address2))
    ,<br>{{$contactuslist->address2}}
    @endif
    @if(isset($contactuslist->pincode))
    -{{$contactuslist->pincode}}
  @endif
    <!-- IGNOU Road, Neb Sarai, New Delhi 110030 -->
  </p>
 
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

@if(isset($contactuslist->timings))
@php
$timingdata = json_decode($contactuslist->timings);
$timinglist = $timingdata->days;
$timinglist = collect($timinglist)->sortBy('timing_order_by');
@endphp
@endif

@if(isset($emailidlist))
    @foreach($emailidlist as $emailiddatalist)
    <p><strong>Email</strong><br> <a href="Mailto:{{$emailiddatalist->email}}">{{$emailiddatalist->email}}</a></p>
    @endforeach
    @endif
    @if(isset($emailidseclist))
    @if(!$emailidseclist->isEmpty())
    @foreach($emailidseclist as $emailidsecdatalist)
    <p><strong>Email</strong><br> <a href="Mailto:{{$emailidsecdatalist->email}}">{{$emailidsecdatalist->email}}</a></p>
    @endforeach
    @endif
    @endif

@if(isset($phonelist))
    @if(!$phonelist->isEmpty())
@foreach($phonelist as $priphonelist)
<p><strong>Phone</strong><br> <a href="Tel:{{$priphonelist->phonecode}} {{$priphonelist->phone}}">+{{$priphonelist->phonecode}} {{$priphonelist->phone}}</a></p>
    @endforeach
    @endif
    @endif
    @if(isset($phoneseclist))
    @if(!$phoneseclist->isEmpty())
    @foreach($phoneseclist as $phonesecdatalist)
    <p><strong>Phone</strong><br> <a href="Tel:{{$phonesecdatalist->phonecode}} {{$phonesecdatalist->phone}}">+{{$phonesecdatalist->phonecode}} {{$phonesecdatalist->phone}}</a></p>
    @endforeach
    @endif
    @endif
    @endforeach
    @endif

  <p><strong>Clinic Timings</strong></p>
  @if(isset($contactuslist->timings))
  @foreach($timinglist as $timingdatalist)
  @if($timingdatalist->status=='open')
  <p>{{$timingdatalist->day}}: {{ date("g:i A", strtotime($timingdatalist->start_time)) }} {{ date("g:i A", strtotime($timingdatalist->end_time)) }}</p>
  @else
  <p>{{$timingdatalist->day}}: {{$timingdatalist->status}}</p>
  @endif
  @endforeach
  @endif
    <!-- Monday to Saturday: 10:00 am To 07:00 pm<br>
    Sunday: Closed
    </p> -->

</div>
</div>
</div>
</div>
</section>
<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14023.56573954226!2d77.2040401!3d28.5129139!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9ffc8333b06cc738!2sAestiva%20Plastic%20Surgery%20-%20Hymenoplasty%2C%20Revirgination%2C%20Vaginoplasty%20Vaginal%20Tightening%20%26%20Restoration!5e0!3m2!1sen!2sin!4v1641210669524!5m2!1sen!2sin"
  width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" data-aos="fade-up"></iframe>
  
  {{ App\Http\Controllers\AppLaunchController::CommanFooter(); }}