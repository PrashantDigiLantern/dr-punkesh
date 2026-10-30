          <form method="POST">
            <input type="hidden" id="page1" value="appointment">

            <input type="hidden" id="getid" value="1">

            <input type="hidden" name="_token" id="token1" value="{{ csrf_token() }}">

              <div class="row">

                <div class="col-md-6">

                  <input placeholder="Name*" type="text" id="name1" name="name"><p id="validname1" class="error"></p>

                </div>
                <div class="col-md-6">

                  <input placeholder="Email*" type="text"  id="email1" name="email" > <p id="validemail1" class="error"></p>

                </div>              



                <div class="col-md-6">

                  <input placeholder="Phone*" type="tel" id="phone1" onkeypress='return isNumberKey(event)'  maxlength="10" name="phone" class="phone" > <p id="validphone1" class="error"></p>

                </div>

               



                <div class="col-md-6 calcdat">

                  <div class="calender">

                    <input type="text" id="date1" name="date" class="dateselect form-control for-icon"

                      placeholder="Date*" required="" autocomplete="off">

                    <span class="dateselect fa fa-calendar"></span>

                    <p id="validdate1" class="error"></p>

                  </div>

                </div>



                <div class="col-md-6">
                    <div class="cptchabox">
                      <div id="captcha_appointment"></div>

                      <button type="button" onclick="appointmentForm()" class="comBtn BtnRfresh" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                    </div>

                  </div>



                  <div class="col-md-6">

                    <input type="hidden" id="code1_request">

                    <input type="hidden" id="code1_appointment">
                    
                    <input type="hidden" id="code1_request_mobile">

                    <input type="text" name="captcha" id="captcha1" class="form-control" maxlength="6" autocomplete="off" placeholder="Enter code">

                    <div id="validcaptcha1" class="error"></div>

                  </div>

                





                <div class="col-md-12">

                  <textarea style="font-size:1.6rem" placeholder="Message" name="message" id="message1"></textarea>

                </div>



                <!--div class="col-md-6" style="margin-top:1.5rem">

                  <img class="w-100 lazyload" data-src="{{ url('website/assets/images/cap.jpg')}}" src="{{ url('website/assets/images/cap.jpg')}}"  alt="icon">

                </div-->

                <div class="col-md-12">

                  <!--input type="submit" class="sub-but"-->
                  <center>

                    <input value="Submit"   id="submit1"  class="sub-but" type="button" onclick="checkvalidation('1')"> 

                  <img style="height: 50px; display:none;" src="{{url('website/loading-gif.gif')}}" id="loading1" alt="Wait" />

                    </center>

                  

                  

                </div>

              </div>

            </form>