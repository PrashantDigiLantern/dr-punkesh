@include('website/header')
 <section class="thankyou-page">
       <div class="container con_cus test-d">                
              <div class="row justify-content-between">
                 <div class="col-lg-8 col-md-8 col-sm-12 blog-con mx-auto">
                   <center><h2>Thank You <i class="fa-solid fa-face-smile"></i></h2></center> 
                   <p>We have received your request. We will get in touch with you shortly.</p>
                   <center class="my-5"><a href="{{ url('/') }}" class="my-3"> <button class="appt-btn">Back to Home</button></a>
                   </center>

                 </div>
              </div>
        </div>   
</section>  
    
 <!-- <section class="form-section" >
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

               <form action="#">
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
                              <input type="text" id="date" name="date" class="dateselect form-control for-icon" placeholder="Date*" required="" autocomplete="off"> <span  class="dateselect fa  fa-calendar"></span> </div>
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
                  </form>
                    
                       </div>
                    </div>

                
            </div>
        </div>
    </section> -->
    @include('website/footer')