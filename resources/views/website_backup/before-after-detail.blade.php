@include('website/header')

  <section class="back-img banner-in py-0">

    <img data-src="{{ url('website/assets/images/logo.png')}}" alt="Dr. Punkesh" class="lazyloaded bnner-img" src="{{ url('website/assets/images/v-cate.jpg')}}">

    <div class="container con_cus">

      <div class="row">

        <div class="col-lg-12 col-md-12 col-sm-12 flex-j">

          <div>

            <h3 class="shrt-mar"><span class="text-light">Laser Toning</span></h3> </div>

          <ul class="banner-nav">

            <li><a href="{{ url('/') }}" class="pl">Home</a></li>

            <li><a href="#" class="pl">Clinic Gallery</a></li>

          </ul>

        </div>

      </div>

    </div>

  </section>



  <!--   for desktop  -->

    <section class="req-form darkbackin desk-v">

        <div class="container con_cus">

        {{ App\Http\Controllers\AppLaunchController::RequestACallback(); }}

        </div>

    </section>

     <div class="modal fade" id="proceed" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

              <div class="modal-dialog modal-dialog-centered">

                <div class="modal-content darkbackin">                 

                  <div class="modal-body">

                    <i type="button" class="btn-close fas fa-times" data-bs-dismiss="modal" aria-label="Close"></i>

                    <section class="req-form darkbackin">

                    <div class="container con_cus">

                      <div>

                          <div class="w-100">        </div>               

                     

                          <input type="submit" class="sub-but">            

                      </div>

                    </div>

                </section>

                  </div>

                </div>

              </div>

             </div>  

             





    <!--   end desktop  -->

    <!--   for mobile  -->

     <section class="req-form darkbackin mob-v">

        <div class="container con_cus">

          <div class="form-sp">

            <p  data-bs-toggle="modal" data-bs-target="#exampleModal">  Request a call back </p>  



           <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

              <div class="modal-dialog modal-dialog-centered">

                <div class="modal-content darkbackin">                 

                  <div class="modal-body">

                    <i type="button" class="btn-close fas fa-times" data-bs-dismiss="modal" aria-label="Close"></i>

                    <section class="req-form darkbackin">

                    <div class="container con_cus">

                    {{ App\Http\Controllers\AppLaunchController::RequestACallback(); }}



                    </div>

                </section>

                  </div>

                </div>

              </div>

             </div>  



          </div>

        </div>

    </section>

    <!--   end mobile  -->



  



  

  <section>

    <div class="container con_cus test-d">

      <div class="row justify-content-between">

        <!--  Start of slider -->

        <div class="img-gallery-magnific">

          <div class="row">



          @if(!$result->isEmpty())

               @foreach($result as $val)

            <div class="col-lg-4 col-md-6 com-sm-12">

              <div class="magnific-img">

                <a class="image-popup-vertical-fit" href="http://digifolio.co.in/drpunkesh/{{url('/backend/service_result/inner/'.$val->beforeimg)}}" title="9.jpg">

                  <div class="overlay"></div> <img src="{{url('/backend/service_result/inner/'.$val->beforeimg)}}" alt="9.jpg" /> <i class="fa fa-search-plus" aria-hidden="true"></i> </a>

              </div>

              <p class="imp-tag">✱ Opinions/Results may vary from person to person.</p>

            </div>

            @endforeach 

          @else

          <div class="col-lg-4 col-md-6 com-sm-12">

              <p>No Data Found</p>

          </div>

          @endif

            <!--div class="col-lg-4 col-md-6 com-sm-12">

              <div class="magnific-img">

                <a class="image-popup-vertical-fit" href="http://digifolio.co.in/drpunkesh/{{ url('website/assets/images/be-af_1.jpg')}}" title="9.jpg')}}">

                  <div class="overlay"></div> <img src="{{ url('website/assets/images/be-af_1.jpg')}}" alt="9.jpg')}}" /> <i class="fa fa-search-plus" aria-hidden="true"></i> </a>

              </div>

              <p class="imp-tag">✱ Opinions/Results may vary from person to person.</p>

            </div>

            <div class="col-lg-4 col-md-6 com-sm-12">

              <div class="magnific-img">

                <a class="image-popup-vertical-fit" href="http://digifolio.co.in/drpunkesh/{{ url('website/assets/images/be-af_1.jpg')}}" title="9.jpg')}}">

                  <div class="overlay"></div> <img src="{{ url('website/assets/images/be-af_1.jpg')}}" alt="9.jpg')}}" /> <i class="fa fa-search-plus" aria-hidden="true"></i> </a>

              </div>

              <p class="imp-tag">✱ Opinions/Results may vary from person to person.</p>

            </div>

            <div class="col-lg-4 col-md-6 com-sm-12">

              <div class="magnific-img">

                <a class="image-popup-vertical-fit" href="http://digifolio.co.in/drpunkesh/{{ url('website/assets/images/be-af_1.jpg')}}" title="9.jpg')}}">

                  <div class="overlay"></div> <img src="{{ url('website/assets/images/be-af_1.jpg')}}" alt="9.jpg')}}" /> <i class="fa fa-search-plus" aria-hidden="true"></i> </a>

              </div>

              <p class="imp-tag">✱ Opinions/Results may vary from person to person.</p>

            </div-->





          </div>

        </div>

        <div class="clear"></div>

        <!--  end of Start of slider -->

      </div>

    </div>



<div class="d-flex paginationBx justify-content-center col">



{!! $result->links() !!}



</div>

  </section>

  <section class="form-section">

    <div class="container-fluid">

      <div class="container con_cus">

        <div class="row">

          <div class="col-lg-6 sch ">

            <h2>SCHEDULE A <br> CONSULTATION</h2>

            <div class="line"></div>

            <div class="desk-v">

              <div class="form_Data mt-5">

              <p><span>Clinic Timing :&nbsp;&nbsp;</span></p><p>Monday to Saturday : 10:00 AM - 7:00 PM<br> <span>SUNDAY CLOSED</span></p>

              </div>

              <div class="form_Data">

                <p><span>Phone:&nbsp;&nbsp; </span></p>

                <p>+91-7061400830 | +91-7667445571</p>

              </div>

              <div class="form_Data">

                <p><span>Email:&nbsp;&nbsp; </span></p>

                <p><a href="mailto:info@advanceskinhairclinic.com"> : info@advanceskinhairclinic.com</a></p>

              </div>

            </div>

          </div>

          <div class="col-lg-6 form mb-mt-5">

          {{ App\Http\Controllers\AppLaunchController::CommanAppointment(); }}   

          </div>

        </div>

      </div>

    </div>

  </section>

  @include('website/footer')