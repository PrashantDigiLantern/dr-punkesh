@include('website/header')

  <section class="back-img py-0 banner-in sch-back">

    <img data-src="{{ url('website/assets/images/bann-schedule-a-consultation.jpg')}}" alt="Dr. Punkesh" class="lazyload bnner-img" >

    <div class="container con_cus">

      <div class="row">

        <div class="col-lg-12 col-md-12 col-sm-12 flex-j">

          <div>



            <h3 class="shrt-mar"><span class="text-light">Schedule A Consultation</span></h3>



          </div>

          <ul class="banner-nav">

            <li><a href="{{ url('/') }}" class="pl">Home</a></li>

            <li><a href="#" class="pl">Schedule A Consultation</a></li>



          </ul>



        </div>



      </div>

    </div>

  </section>

  <section class="form-section pg-frm">

    <div class="container-fluid">

      <div class="container con_cus">

        <div class="row">



          <div class="col-lg-10 form mb-mt-5 p-5 mx-auto">

            <p class="sb-h text-light">CLINIC TIMINGS </p>

            <p class="text-light">Monday to Saturday : 10:00 AM - 7:00 PM | Sunday: Closed</p>
           

            {{ App\Http\Controllers\AppLaunchController::CommanAppointment(); }}

            <!--form action="#">

              <div class="row">

                <div class="col-md-6">

                  <input placeholder="Name*" type="text">

                </div>

                <div class="col-md-6">

                  <input placeholder="Email*" type="text">

                </div>

                <div class="col-md-6">

                  <input placeholder="Phone*" type="text">

                </div>

                <div class="col-md-6 calcdat">

                  <div class="calender">

                    <input type="text" id="date" name="date" class="dateselect form-control for-icon"

                      placeholder="Date*" required="" autocomplete="off"> <span

                      class="dateselect fa  fa-calendar"></span> </div>

                </div>

                <div class="col-md-12">

                  <textarea style="font-size: 1.6rem" placeholder="Message" name=" "></textarea>

                </div>

                <div class="col-md-6" style="margin-top: 1.5rem;">

                  <img class="w-100 lazyload" data-src="{{ url('website/assets/images/cap.jpg')}}" alt="icon">

                </div>

                <div class="col-md-6 " style="text-align: right;  margin-top: 1.5rem;">

                  <input type="submit" class="sub-but">



                </div>

              </div>

            </form-->



          </div>

          <div class="col-lg-10 sch mt-5 mx-auto text-center">

            <p class="sb-h text-light">Advance Skin Hair Laser Clinic</p>



            <ul class="social-media contactus">

              <li><i class="fa-solid fa-envelope"></i>

                <p class="ml-2 m-0"><a href="tel:+91-7061400830">+91-7061400830</a> | <a href="tel:+91-7667445571">+91-7667445571</a></p>

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

  @include('website/footer')