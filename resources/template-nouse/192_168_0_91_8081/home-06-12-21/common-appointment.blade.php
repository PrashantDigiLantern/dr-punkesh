<?php
$public_url="";
if(isset(session('userorginfo')['site_url'])){
$public_url = session('userorginfo')['site_url'];
}
?>
 
      <form class="row needs-validation" action="{{url('/appointmentsave')}}" id="myForm" method="POST">
      <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
      <div class="col-md-6 mb-4">
        <input type="text" class="inptfld" id="name" name="name" placeholder="Name*" required>
        <div class="valid-feedback">Enter Name</div>
      </div>
      <div class="col-md-6 mb-4">
        <input type="text" class="inptfld" id="phone" minlength="10" maxlength="10" name="phone" placeholder="Phone*" required>
        <div class="valid-feedback">Enter Phone No.</div>
      </div>

      <div class="col-md-6 mb-4">
        <input type="email" class="inptfld" id="email" name="email" placeholder="Email*" required>
        <div class="valid-feedback">Enter Email</div>
      </div>
      <div class="col-md-6 mb-4">
        <input type="date" class="inptfld" id="date" name="date" placeholder="Select Date" required>
        <div class="valid-feedback">Select Date</div>
      </div>
      <div class="col-md-12">
        <textarea class="inptfld" id="message" name="message" rows="4" placeholder="Message"></textarea>
      </div>
      <input type="hidden" class="inptfld" id="org_id" value="{{session('userorginfo')['org_id']}}" name="org_id" required>
            <input type="hidden" class="inptfld" id="site_id" value="{{session('userorginfo')['site_id']}}" name="site_id" required>
      <!-- <div class="col-md-12 mt-2 mb-3">
        <img src="{{$public_url}}images/capcha.jpg" width="240" alt="Capcha" style="border:#ddd solid 1px;">
      </div>  -->
      <div class="col-12">
        <button class="btn btn-primary btn-submit" type="submit" onclick="validatesec()">SUBMIT</button>
      </div>
      </form>    
    