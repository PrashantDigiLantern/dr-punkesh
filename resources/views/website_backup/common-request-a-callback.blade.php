   
        <form class="form-sp">

        

          <input type="hidden" id="page4" value="requestCallback">

          <input type="hidden" id="getid" value="4">

          <input type="hidden" name="_token" id="token4" value="{{ csrf_token() }}">



         
          <div class="inpbx">
            <input placeholder="Name*"  id="name4" name="name">

            <p id="validname4" class="error"></p>
         </div>

         <div class="inpbx">
          <input placeholder="Phone*"  type="tel" id="phone4" maxlength="10" name="phone" class="form-control" required>

          <p id="validphone4" class="error"></p>
           </div>


     
          <div class="cptchabox">
            <div id="captcha_request"></div>

            <button type="button" onclick="requestForm()" class="comBtn BtnRfresh" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>
          </div>


            <input type="hidden" id="code1_request">

            <input type="hidden" id="code1_appointment">
<div class="inpbx">
            <input type="text" name="captcha" id="captcha4" class="form-control" maxlength="6" autocomplete="off" placeholder="Enter code">

            <p id="validcaptcha4" class="error"></p>
</div>
                          


<div class="inpbx">
            <input  id="submit2"  class="sub-but" type="button" onclick="checkvalidation('4')" value="Request a call back"> 

            <img style="height: 50px; display:none;" src="{{url('website/loading-gif.gif')}}" id="loading2" alt="Wait" />
</div>
          

        </form>

        