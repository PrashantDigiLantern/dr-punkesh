@include('website/header')

    <section class="back-img banner-in serv-d py-0 blog-h">

      <img data-src="{{url('website/assets/images/bann-blog.jpg')}}" alt="Dr. Punkesh" class="lazyload bnner-img not-mob">
         <div class="container con_cus">

          <div class="row">

              <div class="col-lg-12 col-md-12 col-sm-12 flex-j">     

                <div>  

                  <h3 class="shrt-mar"><span class="text-light">Blogs</span></h3>
                      </div>         

                   <ul class="banner-nav">

                    <li><a href="{{ url('/') }}" class="pl">Home</a></li>

                    <li><a href="#" class="pl">Blogs</a></li>

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



    

     <section>

       <div class="container con_cus test-d">                

              <div class="row justify-content-between">

                 <div class="col-lg-8 col-md-7 col-sm-12 blog-bx service-ctegry">  





                  @foreach($blog as $bloglist)

                    <div class="col-lg-12 col-md-12 col-sm-12">

                        <div class="card">

                           <div class="card-img"><img class="card-img-top lazyloaded" data-src="{{url('backend/blog/'.$bloglist->blog_image)}}" alt="Card image cap" src="{{url('backend/blog/'.$bloglist->blog_image)}}"></div>

                          <div class="card-body">

                            <p class="sb-h"><a href="{{url('/blog/'.$bloglist->url)}}" class="text-p">{!! $bloglist->blog_name !!}</a></p>

                               <p class="sb-h"><a href="{{url('/blog/'.$bloglist->url)}}" class="text-p"><i class="fa-solid fa-calendar-days mr-2"></i> <span class="mx-2 text-p">{{ date("d M, Y",strtotime($bloglist->date)) }}</span></a></p>

                            <p class="card-text">{!! $bloglist->short_desc !!}</p>

                          

                             <a href="{{url('/blog/'.$bloglist->url)}}" class="appt-btn mt-3">Read More</a>

                          </div>

                        </div>

                    </div>

                    @endforeach





                      <!--div class="col-lg-12 col-md-12 col-sm-12">

                        <div class="card">

                           <div class="card-img"><a href="blogin.html" alt=""><img class="card-img-top lazyloaded" data-src="{{ url('website/assets/images/6.jpg')}}" alt="Card image cap" src="{{ url('website/assets/images/6.jpg')}}"></a></div>

                          <div class="card-body">

                            <p class="sb-h"><a href="blogin.html" class="text-p">Blog Title</a></p>

                            <p class="sb-h"><a href="blogin.html" class="text-p"><i class="fa-solid fa-calendar-days mr-2"></i> <span class="mx-2 text-p">24 June 2022</span></a></p>

                            <p class="card-text">Lorem Ipsum is simply dummy text of the printing.</p>

                          

                             <a href="blogin.html" class="appt-btn mt-3">Read More</a>

                          </div>

                        </div>

                    </div>

                   <div class="col-lg-12 col-md-12 col-sm-12">

                        <div class="card">

                           <div class="card-img"><a href="blogin.html" alt=""><img class="card-img-top lazyloaded" data-src="{{ url('website/assets/images/6.jpg')}}" alt="Card image cap" src="{{ url('website/assets/images/6.jpg')}}"></a></div>

                          <div class="card-body">

                            <p class="sb-h"><a href="blogin.html" class="text-p">Blog Title</a></p>

                            <p class="sb-h"><a href="blogin.html" class="text-p"><i class="fa-solid fa-calendar-days mr-2"></i> <span class="mx-2 text-p">24 June 2022</span></a></p>

                            <p class="card-text">Lorem Ipsum is simply dummy text of the printing.</p>

                          

                             <a href="blogin.html" class="appt-btn mt-3">Read More</a>

                          </div>

                        </div>

                    </div>

                  <div class="col-lg-12 col-md-12 col-sm-12">

                        <div class="card">

                           <div class="card-img"><a href="blogin.html" alt=""><img class="card-img-top lazyloaded" data-src="{{ url('website/assets/images/6.jpg')}}" alt="Card image cap" src="{{ url('website/assets/images/6.jpg')}}"></a></div>

                          <div class="card-body">

                            <p class="sb-h"><a href="blogin.html" class="text-p">Blog Title</a></p>

                            <p class="sb-h"><a href="blogin.html" class="text-p"><i class="fa-solid fa-calendar-days mr-2"></i> <span class="mx-2 text-p">24 June 2022</span></a></p>

                            <p class="card-text">Lorem Ipsum is simply dummy text of the printing.</p>

                          

                             <a href="blogin.html" class="appt-btn mt-3">Read More</a>

                          </div>

                        </div>

                    </div-->

                   

                    {!! $blog->links() !!}

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

                                <input placeholder="Name*" type="text" id="name1" name="name" >
     <p id="validname1" class="error"></p>
                            </div>

                       



                            <div class="col-md-12">

                                <input placeholder="Email*" type="email" id="email1" name="email" >
   <p id="validemail1" class="error"></p>

                            </div>

                         


                            <div class="col-md-12">

                                <input placeholder="Phone*" type="tel" id="phone1" onkeypress='return isNumberKey(event)' maxlength="10" name="phone" >
   <p id="validphone1" class="error"></p>
                            </div>

                         



                            <div class="col-md-12 calcdat">

                                <div class="calender">

                                  <input type="text" id="date1" name="date"  class="dateselect form-control for-icon" placeholder="Date*"  autocomplete="off"> <span  class="dateselect fa  fa-calendar"></span>

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

                                <input value="Submit"    id="submit1"  class="sub-but" type="button" onclick="checkvalidation('1')">

                                <img style="height: 50px; display:none;" src="{{url('website/loading-gif.gif')}}" id="loading1" alt="Wait" />

                            </div>

                          </div>

                      </form>



                  

                   </div>

                  



                    <div class="latpost-con">

                          <h4 class=" mt-4 mb-4 mt-lg-0 mt-md-0"><strong>Latest Post</strong></h4>



                          @foreach($blog1 as $bloglist1)

                          <div class="lat-post">

                          <a href="{{url('/blog/'.$bloglist1->url)}}" alt="">

                              <img data-src="{{url('backend/blog/'.$bloglist1->blog_image)}}" class="lazyload" alt="latest blog post">

</a>

                              <div>

                               <a href="{{url('/blog/'.$bloglist1->url)}}" class="text-p"> <p>{!! $bloglist1->blog_name !!}</p>

                                <p><strong>{{ date("d M, Y",strtotime($bloglist1->date)) }}</strong></p></a>

                              </div>

                          </div>

                          @endforeach

                         

                      </div>

                     

                 </div>

                

                 

                 

                

              </div>  

          

        </div>

    </section>    

  

   

    @include('website/footer')