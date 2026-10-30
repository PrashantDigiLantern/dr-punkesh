@include('website/header')

  <section class="back-img banner-in py-0"> <img data-src="{{ url('website/assets/images/logo.png')}}" alt="Dr. Punkesh" class="lazyloaded bnner-img" src="{{ url('website/assets/images/banner-in10.jpg')}}">

    <div class="container con_cus">

      <div class="row">

        <div class="col-lg-12 col-md-12 col-sm-12 flex-j">

          <div>

            <h3 class="shrt-mar"><span class="text-light">Before After</span></h3> </div>

          <ul class="banner-nav">

            <li><a href="{{ url('/') }}" class="pl">Home</a></li>

            <li><a href="#" class="pl">Before After</a></li>

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



  

  <section class="before-after service-ctegry">

    <div class="container con_cus test-d">

      <div class="row justify-content-between">





      @foreach($result as $val)

        <div class="col-lg-4 col-md-4 col-sm-6">

          <div class="card">

            <p>

              <div class="card-img">

                <a href="{{url('real-results/'.$val->url)}}" target="blank"> <img data-src="{{url('/backend/service_result/image/'.$val->image)}}" alt="Card image cap" class="card-img-top lazyload"></a>

              </div>

              <div class="card-body">

                <p class="imp-tag">✱ Opinions/Results may vary from person to person.</p>

                <center>

                  <a href="{{url('real-results/'.$val->url)}}" target="blank">

                    <p class="sb-h">{{$val->name}}</p>

                  </a> <a href="{{url('real-results/'.$val->url)}}" class="appt-btn mt-3">View All</a> </center>

              </div>

          </div>

        </div>

      @endforeach



        <!--div class="col-lg-4 col-md-4 col-sm-6">

          <div class="card">

            <p>

              <div class="card-img">

                <a href="laser-beforeafter.html" target="blank"> <img data-src="{{ url('website/assets/images/be-af_1.jpg')}}" alt="Card image cap" class="card-img-top lazyload"></a>

              </div>

              <div class="card-body">

                <p class="imp-tag">✱ Opinions/Results may vary from person to person.</p>

                <center>

                  <a href="laser-beforeafter.html" target="blank">

                    <p class="sb-h">Photo Facial</p>

                  </a> <a href="laser-beforeafter.html" class="appt-btn mt-3">View All</a> </center>

              </div>

          </div>

        </div>



        <div class="col-lg-4 col-md-4 col-sm-6">

          <div class="card">

            <p>

              <div class="card-img">

                <a href="laser-beforeafter.html" target="blank"> <img data-src="{{ url('website/assets/images/be-af_1.jpg')}}" alt="Card image cap" class="card-img-top lazyload"></a>

              </div>

              <div class="card-body">

                <p class="imp-tag">✱ Opinions/Results may vary from person to person.</p>

                <center>

                  <a href="laser-beforeafter.html" target="blank">

                    <p class="sb-h">Laser Hair Reduction</p>

                  </a> <a href="laser-beforeafter.html" class="appt-btn mt-3">View All</a> </center>

              </div>

          </div>

        </div-->



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