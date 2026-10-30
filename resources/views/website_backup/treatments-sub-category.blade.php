@include('website/header')
    <section class="back-img banner-in py-0 cate-h">

     
   
       <img data-src="{{url('backend/service/banner/'.$service->service_banner_image)}}" alt="Dr. Punkesh" class="lazyloaded bnner-img" src="{{url('backend/service/banner/'.$service->service_banner_image)}}">
         <div class="container con_cus">
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 flex-j">     
               <div class="shrt-mar changeh2"><span class="text-light"> {{$service->service_name}} </span></div></div>  
                       
                    <ul class="banner-nav">
                      <li><a href="{{ url('/') }}" class="pl">Home</a></li>
                      <?php if(!empty($serviceMain)){ ?>
                          <li><a href="{{ url('/treatments/'.$serviceMain['url']) }}" class="pl"> {{ $serviceMain['service_name'] }}</a></li>
                      <?php }else {?>
                          <li><a href="{{ url('/treatments') }}" class="pl">Treatments</a></li>
                      <?php } ?>
                      <li><a href="#" class="pl"> {{$service->service_name}} </a></li>
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
        <p data-bs-toggle="modal" data-bs-target="#exampleModal">Request a call back</p>
        {{ App\Http\Controllers\AppLaunchController::RequestACallbackMobile(); }}
      </div>
    </div>
  </section>
    <!--   end mobile  -->


    
     <section class="service-ctegry">
       <div class="container con_cus mt-5">  
        <div class="row"> 


                   <?php foreach($Sub_service_category as $v){?>
                   <div class="col-lg-4 col-md-4 col-sm-6">
                      <div class="card">
                         <div class="card-img"><a href="{{url($v->url)}}"><img class="card-img-top lazyload" src="{{url('backend/service/image/'.$v->service_image)}}" data-src="{{url('backend/service/image/'.$v->service_image)}}" alt="Card image cap"></a></div>
                        <div class="card-body">
                         <a href="{{url($v->url)}}" target="blank"> <p class="sb-h">{{$v->service_name}}</p></a>
                          <p class="card-text">{!! $v->short_desc !!}</p>
                          <a href="{{url($v->url)}}" class="appt-btn mt-3">Read More</a>
                        </div>
                      </div>
                    </div>
                    <?php  } ?>


                   <!--div class="col-lg-4 col-md-4 col-sm-6">
                      <div class="card">
                         <div class="card-img"><a href="lasertoning.html" target="blank"><img class="card-img-top lazyload" data-src="{{ url('website/assets/images/category1.jpg')}}" alt="Card image cap"></a></div>
                        <div class="card-body">
                         <a href="lasertoning.html" target="blank"> <p class="sb-h">Photo Facial</p></a>
                          <p class="card-text">Lorem Ipsum is simply dummy text of the printing.</p>
                          <a href="lasertoning.html" class="appt-btn mt-3">Read More</a>
                        </div>
                      </div>
                    </div>
                 <div class="col-lg-4 col-md-4 col-sm-6">
                      <div class="card">
                         <div class="card-img"><a href="lasertoning.html" target="blank"><img class="card-img-top lazyload" data-src="{{ url('website/assets/images/category1.jpg')}}" alt="Card image cap"></a></div>
                        <div class="card-body">
                         <a href="lasertoning.html" target="blank"> <p class="sb-h">Laser Hair Reduction</p></a>
                          <p class="card-text">Lorem Ipsum is simply dummy text of the printing.</p>
                          <a href="lasertoning.html" class="appt-btn mt-3">Read More</a>
                        </div>
                      </div>
                    </div>
                   <div class="col-lg-4 col-md-4 col-sm-6">
                      <div class="card">
                         <div class="card-img"><a href="lasertoning.html" target="blank"><img class="card-img-top lazyload" data-src="{{ url('website/assets/images/category1.jpg')}}" alt="Card image cap"></a></div>
                        <div class="card-body">
                         <a href="lasertoning.html" target="blank"> <p class="sb-h">Hair Transplant</p></a>
                          <p class="card-text">Lorem Ipsum is simply dummy text of the printing.</p>
                          <a href="lasertoning.html" class="appt-btn mt-3">Read More</a>
                        </div>
                      </div>
                    </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                      <div class="card">
                         <div class="card-img"><a href="lasertoning.html" target="blank"><img class="card-img-top lazyload" data-src="{{ url('website/assets/images/category1.jpg')}}" alt="Card image cap"></a></div>
                        <div class="card-body">
                         <a href="lasertoning.html" target="blank"> <p class="sb-h">Dermal Fillers</p></a>
                          <p class="card-text">Lorem Ipsum is simply dummy text of the printing.</p>
                          <a href="lasertoning.html" class="appt-btn mt-3">Read More</a>
                        </div>
                      </div>
                    </div>
               <div class="col-lg-4 col-md-4 col-sm-6">
                      <div class="card">
                         <div class="card-img"><a href="lasertoning.html" target="blank"><img class="card-img-top lazyload" data-src="{{ url('website/assets/images/category1.jpg')}}" alt="Card image cap"></a></div>
                        <div class="card-body">
                         <a href="lasertoning.html" target="blank"> <p class="sb-h">Anti Wrinkle Injection</p></a>
                          <p class="card-text">Lorem Ipsum is simply dummy text of the printing.</p>
                          <a href="lasertoning.html" class="appt-btn mt-3">Read More</a>
                        </div>
                      </div>
                    </div-->             
                
              </div>  
          
        </div>
    </section>    
  
   <section class="form-section" >
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
                    <div class="form_Data"> <p><span>Phone:&nbsp;&nbsp; </span></p><p>+91-7061400830 | +91-7667445571</p></div>
                    <div class="form_Data"><p><span>Email:&nbsp;&nbsp; </span></p><p><a href="mailto:info@advanceskinhairclinic.com"> : info@advanceskinhairclinic.com</a></p>
                    </div></div>   
            </div>
            <div class="col-lg-6 form mb-mt-5">

            {{ App\Http\Controllers\AppLaunchController::CommanAppointment(); }}   



                </div>
            </div>

                
            </div>
        </div>
    </section>
    @include('website/footer')