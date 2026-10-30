<?php
$public_url="";
if(isset(session('userorginfo')['site_url'])){
$public_url = session('userorginfo')['site_url'];
}
?>
 
      <form class="row needs-validation" action="{{url('/appointmentsave')}}" id="myForm" method="POST">
      <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
      <div class="col-md-6 mb-4">
      <div class="form-group">
        <input type="text" class="form-control infld alpha" id="name" name="name" placeholder="Name*" required>
        <div class="valid-feedback">Enter Name</div>
      </div>
      </div>
      <div class="col-md-6 mb-4">
      <div class="form-group">
        <input type="email" class="form-control infld" id="email" name="email" placeholder="Email*" required>
        <div class="valid-feedback">Enter Email</div>
      </div>
      </div>
      <div class="col-md-6 mb-4">
      <div class="form-group">
        <input type="text" class="form-control infld js-input-mobile number" id="phone" minlength="10" maxlength="10" name="phone" placeholder="Phone" required>
        <div class="valid-feedback">Enter Phone No.</div>
      </div>
      </div>      
      <div class="col-md-6 mb-4">
      <div class="form-group">
        <!-- <input type="date" class="inptfld" id="date" name="date" placeholder="Select Date" required> -->
            <input type="text" class="form-control infld" id="date" autocomplete="off" name="date" placeholder="Select Date" required>
        <div class="valid-feedback">Select Date</div>
      </div>
      </div>
      <div class="col-md-12 mb-4">
      <div class="form-group">
        <textarea class="form-control infld" id="message" name="message" rows="4" placeholder="Message"></textarea>
      </div>
      </div>
      <input type="hidden" class="inptfld" id="org_id" value="{{session('userorginfo')['org_id']}}" name="org_id" required>
            <input type="hidden" class="inptfld" id="site_id" value="{{session('userorginfo')['site_id']}}" name="site_id" required>
      <!-- <div class="col-md-12 mt-2 mb-3">
        <img src="{{$public_url}}images/capcha.jpg" width="240" alt="Capcha" style="border:#ddd solid 1px;">
      </div>  -->
      <div class="col-12 text-center">
        <button class="btnSubmit" type="submit" onclick="validatesec()">SUBMIT</button>
      </div>
      </form>    
    <script type="text/javascript">
var $ = jQuery;
/**** datepicker ****/
$(function () {
$("#date").datepicker({ 
autoclose: true,
todayHighlight: true,
startDate: '-0m',
	daysOfWeekDisabled: [0]
})
});
</script>