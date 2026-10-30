<form id="myForm" action="{{url('/appointmentsave')}}" method="post">
<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
<div class="row">
<div class="col-12 col-md-12 my-2">
    <input type="text" id="name" name="name" autocomplete="off" class="inptfld" placeholder="Name*" required/>
</div>
<div class="col-12 col-md-12 my-2">
    <input type="email" id="email" name="email" autocomplete="off" class="inptfld" placeholder="Email*" required/>
</div>

<div class="col-12 col-md-12 my-2">
    <input type="text" class="number inptfld" id="phone" name="phone" minlength="10" maxlength="10" autocomplete="off" placeholder="Phone" required/>
</div>
<div class="col-12 col-md-12 my-2">
    <!-- <input type="date" id="date" name="date" class="inptfld" placeholder="Date" required/> -->
    <input type="text" class="form-control inptfld infld2" id="date" autocomplete="off" name="date" placeholder="Select Date" required>
</div>

<div class="col-12 my-2">
    <textarea class="inptfld" rows="3" id="message" name="message" placeholder="Message" cols="50"></textarea>
</div>

<div class="col-12 mt-30">
   
</div>
<input type="hidden" class="inptfld" id="org_id" value="{{session('userorginfo')['org_id']}}" name="org_id" required>
<input type="hidden" class="inptfld" id="site_id" value="{{session('userorginfo')['site_id']}}" name="site_id" required>
@if(isset($googlerecaptcha->site_key))
<div class="col-lg-12 col-md-12 col-12">
      
      <div class="g-recaptcha" data-sitekey="{{$googlerecaptcha->site_key}}" data-callback="verifyCaptcha"></div>
                            <input type="hidden" class="hiddenRecaptcha required" name="hiddenRecaptcha" id="hiddenRecaptcha">
                            <div id="g-recaptcha-error" style="width:100%;"></div>
							</div>
                            @endif
<div class="col-12 mt-30">
  <button class="btn btn-readmoreblk btn-block py-2" type="submit" onclick="validatesec()">SUBMIT</button>
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