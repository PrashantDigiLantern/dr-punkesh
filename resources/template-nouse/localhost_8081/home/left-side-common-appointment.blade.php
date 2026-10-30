<form id="myForm" action="{{url('/appointmentsave')}}" method="post">
<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
<div class="row">
<div class="col-md-12 mb-3">
    <input type="text" id="name" name="name" autocomplete="off" class="form-control infldtrnsprnt" placeholder="Name*" required/>
</div>
<div class="col-md-12 mb-3">
    <input type="email" id="email" name="email" autocomplete="off" class="form-control infldtrnsprnt" placeholder="Email*" required/>
</div>

<div class="col-md-6 mb-3">
    <input type="text" class="form-control infldtrnsprnt js-input-mobile" id="phone" name="phone" minlength="10" maxlength="10" autocomplete="off" placeholder="Phone" required/>
</div>
<div class="col-md-6 mb-3">
    <!-- <input type="date" id="date" name="date" class="inptfld" placeholder="Date" required/> -->
    <input type="text" class="form-control infldtrnsprnt" id="date" autocomplete="off" name="date" placeholder="Select Date" required>
</div>

<div class="col-md-12 mb-3">
    <textarea class="form-control" rows="3" id="message" name="message" placeholder="Message" cols="50"></textarea>
</div>

<div class="col-md-12 mb-3">
    <!-- <div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="6LeL6c8ZAAAAABhjcSpDPPp8Sg2kKxdxxcff_lmH" style="transform:scale(0.77);-webkit-transform:scale(0.77);transform-origin:0 0;-webkit-transform-origin:0 0;"></div>
    <input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha"> -->
</div>
<input type="hidden" class="inptfld" id="org_id" value="{{session('userorginfo')['org_id']}}" name="org_id" required>
<input type="hidden" class="inptfld" id="site_id" value="{{session('userorginfo')['site_id']}}" name="site_id" required>

<div class="text-center">
  <button class="btnSubmit" type="submit" onclick="validatesec()">SUBMIT</button>
</div>
<!-- <div class="loadme" style="display:none;">
<img data-src="https://www.drkeerthanakalva.com/assets/website/images/loading_icon.gif" class="lazyload" width="20" height="20">
</div> -->
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