@include('website/header')
    
    <section class="back-img banner-in serv-d py-0">
      <img data-src="{{ url('website/assets/images/logo.png')}}" alt="Dr. Punkesh" class="lazyloaded bnner-img" src="{{ url('website/assets/images/banner-in3.jpg')}}">
         <div class="container con_cus">
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 flex-j">     
                <div>        

                  <h3 class="shrt-mar"><span class="text-light">LASER TONING TREATMENT</span></h3>

                       </div>         
                   <ul class="banner-nav">
                    <li><a href="{{ url('/') }}" class="pl">Home</a></li>
                    <li><a href="{{ url('/services') }}" class="pl">service</a></li>
                    <li><a href="#">laser toning treatment</a></li>
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


    

  
     <section class="list-col list-sin">
       <div class="container con_cus">                
              <div class="row justify-content-between">
                <div class="col-lg-6 col-md-6 col-sm-12 paddingright">
                   <h3><span class="text-secondary">what is</span> laser toning <span class="text-secondary">treatment</span> </h3>
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>                 
                    <ul>
                    <li>Lorem Ipsum is simply dummy text</li>
                     <li>Lorem Ipsum is simply dummy text</li>
                      <li>Lorem Ipsum is simply dummy text</li>
                  </ul>
                   <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>  
                </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 paddingleft">
                   <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                   <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>                 
                 
                </div>
              </div>  
          
        </div>
    </section>  
    <section class="darkbackin list-col">
      <div class="container-fluid">
            <div class="container con_cus">
              <div class="row">
                <center><h3> WHO ARE THE IDEAL CANDIDATES FOR<br> LASER TONING TREATMENT ? </h3></center>
                  <ul>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</li>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</li>
                     <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</li>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</li>
                     <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</li>
                    <li>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</li>
                  </ul>             
              </div>
            </div>
          </div>
    </section>
    <section class="greyshade">
      <div class="container-fluid">
            <div class="container con_cus">
              <div class="row justify-content-between">
                <div class="col-lg-6 col-md-6 col-sm-12 paddingright">
                   <h3>IS LASER TONING<br> TREATMENT SAFE?</h3>
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>                
                   
                   <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>  
                </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 paddingleft">
                    <img data-src="{{ url('website/assets/images/12.jpg')}}" alt="is laser toning safe" class="mb-5 w-100 lazyload">
                   <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                   <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>                 
                 
                </div>
              </div>  
            </div>
          </div>

    </section>

     <section class="list-col gp-null">
      <div class="container-fluid">
            <div class="container con_cus">
              <div class="row">
                <div class="col-12 mb-5">
                <center><h3>Why patients choose clinic ?</h3>
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p></center>
                </div>
                 <div class="col-lg-6 col-sm-12">
                  <ul class="m-0" style="grid-column-gap:0;">
                    <li><div><p><strong>Lorem Ipsum</strong></p><p>English versions The first line of Lorem Ipsum, "Lorem ipsum dolor.</p></div></li>
                    <li><div><p><strong>Lorem Ipsum</strong></p><p>English versions The first line of Lorem Ipsum, "Lorem ipsum dolor.</p></div></li>
                    <li><div><p><strong>Lorem Ipsum</strong></p><p>English versions The first line of Lorem Ipsum, "Lorem ipsum dolor.</p></div></li>
                  <li><div><p><strong>Lorem Ipsum</strong></p><p>English versions The first line of Lorem Ipsum, "Lorem ipsum dolor.</p></div></li>
                </ul>
                     </div>
                     <div class="col-lg-6 col-sm-12">
                 <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
                     </div>
             
              </div>
            </div>
          </div>
    </section>
    <section class="back-img laserton_con">
      <div class="container-fluid">
            <div class="container con_cus">
              <div class="row">
                <center><h3>What happen during<br> the laser toning treatment</h3>
                <p class="text-light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vitae fermentum eros, id mattis lectus. Cras congue quam odio, eget imperdiet arcu sodales quis. In vitae erat lectus. Quisque eget tortor in massa dapibus consectetur. Proin scelerisque velit et ante dapibus imperdiet. Maecenas vitae ligula a sem mattis vestibulum. Phasellus auctor ipsum fringilla dictum elementum. Nam sed nisl urna. Duis ut purus sit amet mauris porttitor eleifend in sed ipsum.
                </p> <p class="text-light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vitae fermentum eros, id mattis lectus. Cras congue quam odio, eget imperdiet arcu sodales quis. In vitae erat lectus. Quisque eget tortor in massa dapibus consectetur. Proin scelerisque velit et ante dapibus imperdiet. Maecenas vitae ligula a sem mattis vestibulum. Phasellus auctor ipsum fringilla dictum elementum. Nam sed nisl urna. Duis ut purus sit amet mauris porttitor eleifend in sed ipsum.
                </p></center>
              </div>
            </div>
          </div>
    </section>
     <section class="greyshade">
      <div class="container-fluid">
            <div class="container con_cus">
              <div class="row">
                <center><h3 class="mb-5"> FREQUENTLY ASKED QUESTIONS</h3></center>
                    <div class="row cus-accrd list-col">
                      <div class="col-lg-6 col-md-12">
                          <div class="accordion-item">                          
                            <p class="accrd-p p-0 m-0" id="headingOne" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              <strong>Is laser toning safe?</strong></p>                        
                          <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body p-0">
                              <p> Laser toning is a safe, effective, and advanced cosmetic treatment that helps to treat various skin conditions.</p>
                            </div>
                          </div>
                          </div>
                           <div class="accordion-item">                          
                            <p class="accrd-p p-0 m-0" id="headingOne" type="button" data-bs-toggle="collapse" data-bs-target="#collapsetwo" aria-expanded="true" aria-controls="collapsetwo">
                              <strong>Can I use Vitamin C after laser?</strong></p>                        
                          <div id="collapsetwo" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body p-0">
                              <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                            </div>
                          </div>
                          </div>
                             <div class="accordion-item">                          
                            <p class="accrd-p p-0 m-0" id="headingOne" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefour" aria-expanded="true" aria-controls="collapsefour">
                              <strong>How effective is laser toning?</strong></p>                        
                          <div id="collapsefour" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body p-0">
                              <p> Lasers are great tools that can help improve various problems of the skin, such as acne scarring, fine lines, wrinkles, sun spots, and even tattoos and loose skin,”</p>
                            </div>
                          </div>
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                          <div class="accordion-item">                          
                            <p class="accrd-p p-0 m-0" id="headingOne" type="button" data-bs-toggle="collapse" data-bs-target="#collapsethree" aria-expanded="true" aria-controls="collapsethree">
                              <strong>Is laser toning safe?</strong></p>                        
                          <div id="collapsethree" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body p-0">
                              <p>Laser toning is a safe, effective, and advanced cosmetic treatment that helps to treat various skin conditions.</p>
                            </div>
                          </div>
                          </div>
                           <div class="accordion-item">                          
                            <p class="accrd-p p-0 m-0" id="headingOne" type="button" data-bs-toggle="collapse" data-bs-target="#collapsefive" aria-expanded="true" aria-controls="collapsefive">
                              <strong>Accordion Item #1</strong></p>                        
                          <div id="collapsefive" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body p-0">
                              <p> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                             <ul>
                              <li>Lorem ipsum dolor from a line in section.</p></li>
                              <li>Lorem ipsum dolor from a line in section.</p></li>
                               <li>Lorem ipsum dolor from a line in section.</p></li>
                              <li>Lorem ipsum dolor from a line in section.</p></li>

                     
                              </ul>
                           
                          </div>
                          </div>
                          </div></div>
                           
                        


                        </div>
                                  
              </div>
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