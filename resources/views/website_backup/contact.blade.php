@include('website/header')

  <section class="back-img py-0 banner-in contact-back">

    <img data-src="{{ url('website/assets/images/bann-contact-us.jpg')}}" alt="Dr. Punkesh" class="lazyload bnner-img not-mob">

    <div class="container con_cus">

      <div class="row">

        <div class="col-lg-12 col-md-12 col-sm-12 flex-j">

          <div>

            <h3 class="shrt-mar"><span class="text-light">Contact Us</span></h3>

          </div>

          <ul class="banner-nav">

            <li><a href="{{ url('/')}}" class="pl">Home</a></li>

            <li><a href="#" class="pl">Contact Us</a></li>

          </ul>



        </div>



      </div>

    </div>

  </section>





  <section class="form-section pg-frm">

    <div class="container-fluid">

      <div class="container con_cus">

        <div class="row">

          <div class="col-lg-10 form mb-mt-5 mx-auto p-5">

            <h2>GET IN TOUCH</h2>



            <form method="post">

              <input type="hidden" id="page3" value="contactus">

              <input type="hidden" id="getid" value="3">

              <input type="hidden" name="_token" id="token3" value="{{ csrf_token() }}">



              <div class="row">

                <div class="col-md-12">

                  <input placeholder="Name*"  id="name3" name="name"><p id="validname3" class="error"></p>

                </div>

                <div class="col-md-12">

                  <input placeholder="Email*"  id="email3" name="email" ><p id="validemail3" class="error"></p>

                </div>

                <div class="col-md-12">
                  <input placeholder="Phone*"  type="tel" id="phone3" maxlength="10" name="phone" class="form-control" ><p id="validphone3" class="error"></p>

                </div>



                <div class="col-md-12">

                  <textarea style="font-size: 1.6rem" placeholder="Message" name="message" id="message3"></textarea>

                </div>

              

                <div class="col-md-6" >

                <div class="cptchabox height58">
                <div id="captcha_request"></div>

                <button type="button" onclick="requestForm()" class="comBtn BtnRfresh" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></button>
              </div>

                </div>



                <div class="col-md-6">

                  <input type="hidden" id="code1_request">

                  <input type="hidden" id="code1_appointment">
                  
                  <input type="hidden" id="code1_request_mobile">

                  <input type="text" name="captcha" id="captcha3" class="form-control" maxlength="6" autocomplete="off" placeholder="Enter code">

                  <p id="validcaptcha3" class="error"></p>

                </div>


                <center>
                  <div class="col-md-12 ">

                  <!--input type="submit" class="sub-but"-->

                  <input value="Submit"    id="submit1"  class="sub-but" type="button" onclick="checkvalidation('3')"> 

                  <img style="height: 50px; display:none;" src="{{url('website/loading-gif.gif')}}" id="loading1" alt="Wait" />


                </div>
              </center>


              </div>

            </form>



          </div>

          <div class="col-lg-10 sch mx-auto mt-5">

            <center>

              <h2>GIVE US A MESSAGE</h2>

            </center>

            <ul class="social-media contactus">

              <li><i class="fa-solid fa-envelope"></i>

                <p class="ml-2 m-0"><p class="ml-2 m-0"><a href="tel:+91-7061400830">+91-7061400830</a> | <a href="tel:+91-7667445571">+91-7667445571</a></p>

              </p>

              </li>

              <li><i class="fa-solid fa-phone"></i>

                <p><a href="mailto:info@advanceskinhairclinic.com">info@advanceskinhairclinic.com</a></p>

              </li>

            </ul>



          </div>



        </div>





      </div>

    </div>



  </section>

  <section class="p-0 m-5 mx-md-0">



    <div class="w-100">







      <iframe

        src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14391.32044015952!2d85.1592605!3d25.610561!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe4e9ab711450dccb!2sDr.Punkesh&#39;s%20Advance%20Skin%20Hair%20Laser%20Clinic!5e0!3m2!1sen!2sin!4v1666268481226!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"

        referrerpolicy="no-referrer-when-downgrade"></iframe>

    </div>

  </section>

  @include('website/footer')