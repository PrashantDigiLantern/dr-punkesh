@include('website/header')
    <section class="back-img py-0 clinic-h">
         <div class="container con_cus">
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 flex-j">     
                <div>        

                  <h3 class="shrt-mar"><span class="text-light">Gallery</span></h3>

                       </div>         
                   <ul class="banner-nav">
                    <li><a href="{{ url('/')}}" class="pl">Home</a></li>
                    <li><a href="#" class="pl">Gallery</a></li>
                  
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
                
                 <!--  Start of slider -->

  
    <div class="img-gallery-magnific">
      <div class="row">
      <div class="col-lg-3 col-md-6 com-sm-12">
         <div class="magnific-img">

        <a class="image-popup-vertical-fit" href="file:///D:/Tanuja/dr.punkesh/current/drpunkesh%20_6june2022-further_pages/{{ url('website/assets/images/11.jpg')}}" title="9.jpg')}}"> <div class="overlay"></div>
          <img src="{{ url('website/assets/images/11.jpg')}}" alt="9.jpg')}}" />
          <i class="fa fa-search-plus" aria-hidden="true"></i>
        </a>
         <div class="img-name"><p class="text-light">Image Name</p></div>
      
        </div>

      </div>
      <div class="col-lg-3 col-md-6 com-sm-12">
         <div class="magnific-img">

        <a class="image-popup-vertical-fit" href="file:///D:/Tanuja/dr.punkesh/current/drpunkesh%20_6june2022-further_pages/{{ url('website/assets/images/11.jpg')}}" title="9.jpg')}}"> <div class="overlay"></div>
          <img src="{{ url('website/assets/images/11.jpg')}}" alt="9.jpg')}}" />
          <i class="fa fa-search-plus" aria-hidden="true"></i>
        </a>
         <div class="img-name"><p class="text-light">Image Name</p></div>
        </div>
      
      </div>
      <div class="col-lg-3 col-md-6 com-sm-12">
         <div class="magnific-img">

        <a class="image-popup-vertical-fit" href="file:///D:/Tanuja/dr.punkesh/current/drpunkesh%20_6june2022-further_pages/{{ url('website/assets/images/11.jpg')}}" title="9.jpg')}}"> <div class="overlay"></div>
          <img src="{{ url('website/assets/images/11.jpg')}}" alt="9.jpg')}}" />
          <i class="fa fa-search-plus" aria-hidden="true"></i>
        </a>
         <div class="img-name"><p class="text-light">Image Name</p></div>
        </div>
      
      </div>
      <div class="col-lg-3 col-md-6 com-sm-12">
         <div class="magnific-img">

        <a class="image-popup-vertical-fit" href="file:///D:/Tanuja/dr.punkesh/current/drpunkesh%20_6june2022-further_pages/{{ url('website/assets/images/11.jpg')}}" title="9.jpg')}}"> <div class="overlay"></div>
          <img src="{{ url('website/assets/images/11.jpg')}}" alt="9.jpg')}}" />
          <i class="fa fa-search-plus" aria-hidden="true"></i>
        </a>
         <div class="img-name"><p class="text-light">Image Name</p></div>
        </div>
      
      </div>
      <div class="col-lg-3 col-md-6 com-sm-12">
         <div class="magnific-img">

        <a class="image-popup-vertical-fit" href="file:///D:/Tanuja/dr.punkesh/current/drpunkesh%20_6june2022-further_pages/{{ url('website/assets/images/11.jpg')}}" title="9.jpg')}}"> <div class="overlay"></div>
          <img src="{{ url('website/assets/images/11.jpg')}}" alt="9.jpg')}}" />
          <i class="fa fa-search-plus" aria-hidden="true"></i>
        </a>
         <div class="img-name"><p class="text-light">Image Name</p></div>
        </div>
      
      </div>
      <div class="col-lg-3 col-md-6 com-sm-12">
         <div class="magnific-img">
          <a class="image-popup-vertical-fit" href="file:///D:/Tanuja/dr.punkesh/current/drpunkesh%20_6june2022-further_pages/{{ url('website/assets/images/11.jpg')}}" title="9.jpg')}}"> <div class="overlay"></div>
            <img src="{{ url('website/assets/images/11.jpg')}}" alt="9.jpg')}}" />
            <i class="fa fa-search-plus" aria-hidden="true"></i>
          </a>
          <div class="img-name"><p class="text-light">Image Name</p></div>
        </div>      
      </div>
      <div class="col-lg-3 col-md-6 com-sm-12">
         <div class="magnific-img">

        <a class="image-popup-vertical-fit" href="file:///D:/Tanuja/dr.punkesh/current/drpunkesh%20_6june2022-further_pages/{{ url('website/assets/images/11.jpg')}}" title="9.jpg')}}"> <div class="overlay"></div>
          <img src="{{ url('website/assets/images/11.jpg')}}" alt="9.jpg')}}" />
          <i class="fa fa-search-plus" aria-hidden="true"></i>
        </a>
         <div class="img-name"><p class="text-light">Image Name</p></div>
        </div>      
      </div>

</div>
     
    
</div>
    <div class="clear"></div>
  



                 <!--  end of Start of slider -->



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
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js" defer></script>
<script>
  $(document).ready(function() {
    $('.image-popup-vertical-fit').magnificPopup({
      type: 'image',
      mainClass: 'mfp-with-zoom',
      gallery: {
        enabled: true
      },
      zoom: {
        enabled: true,
        duration: 300, // duration of the effect, in milliseconds
        easing: 'ease-in-out', // CSS transition easing function
        opener: function(openerElement) {
          return openerElement.is('img') ? openerElement : openerElement.find('img');
        }
      }
    });
  });
  </script>