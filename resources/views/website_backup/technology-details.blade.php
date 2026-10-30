@include('website/header')



<section class="testimonial list-col list-sin">

  <div class="container con_cus test-d">

    <div class="row justify-content-between">

      <div class="col-lg-8 col-md-8 col-sm-12 blog-con">

        <h1 class="mt-lg-0 mt-md-0">{!! $techlist->name !!}</h1>

        <p> <img data-src="{{url('backend/service_video/technology/'.$techlist->image)}}" alt="blog title" class="lazyload w-100">{!! $techlist->description !!}</p>

      </div>

      <div class="col-lg-4 col-md-5 col-sm-12">

        <div class="blogsform form-section">

          <h5 class="text-p">SCHEDULE A CONSULTATION</h5>


          <form method="POST" class="form">

            <input type="hidden" id="page1" value="appointment">

            <input type="hidden" id="getid" value="1">

            <input type="hidden" name="_token" id="token1" value="{{ csrf_token() }}">



            <div class="row">



              <div class="col-md-12">

                <input placeholder="Name*" type="text" id="name1" name="name">
                <p id="validname1" class="error"></p>
              </div>





              <div class="col-md-12">

                <input placeholder="Email*" type="email" id="email1" name="email">
                <p id="validemail1" class="error"></p>
              </div>





              <div class="col-md-12">

                <input placeholder="Phone*" type="tel" id="phone1" onkeypress='return isNumberKey(event)' maxlength="10" name="phone">
                <p id="validphone1" class="error"></p>
              </div>





              <div class="col-md-12 calcdat">

                <div class="calender">

                  <input type="text" id="date1" name="date" class="dateselect form-control for-icon" placeholder="Date*" autocomplete="off"> <span class="dateselect fa  fa-calendar"></span>

                  <p id="validdate1" class="error"></p>

                </div>

              </div>









              <div class="col-md-12">

                <textarea style="font-size: 1.6rem" placeholder="Message" id="message1" name="message"></textarea>

              </div>





              <div class="col-md-6" style="margin-top: 1.5rem;">
                <div class="cptchabox">
                  <div id="captcha_appointment"></div>

                  <button type="button" onclick="appointmentForm()" class="comBtn BtnRfresh" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>
                </div>
              </div>



              <div class="col-md-6" style="margin-top: 1.5rem;">

                <input type="hidden" id="code1_request">

                <input type="hidden" id="code1_appointment">

                <input type="hidden" id="code1_request_mobile">

                <input type="text" name="captcha" id="captcha1" class="form-control" maxlength="6" autocomplete="off" placeholder="Enter code">

                <p id="validcaptcha1" class="error"></p>

              </div>













              <div class="col-md-12 " style="text-align: right;  margin-top: 1.5rem;">

                <!--input type="submit" class="sub-but" onclick="checkvalidation('2')"-->

                <input value="Submit" id="submit1" class="sub-but" type="button" onclick="checkvalidation('1')">

                <img style="height: 50px; display:none;" src="{{url('website/loading-gif.gif')}}" id="loading1" alt="Wait" />





              </div>

            </div>

          </form>





        </div>









      </div>









    </div>



  </div>

</section>




@include('website/footer')