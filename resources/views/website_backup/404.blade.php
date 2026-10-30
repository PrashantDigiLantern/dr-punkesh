@include('website/header')
 <section class="thankyou-page">
       <div class="container con_cus test-d">                
              <div class="row justify-content-between">
                 <div class="col-lg-8 col-md-8 col-sm-12 blog-con mx-auto">
                   <center><h2>404 <i class="fa-solid fa-face-frown"></i></h2></center> 
                       <center><h3>OOPS! Page not found</i></h3></center> 

                   <p>We are sorry but the page you are requested was not found!</p>
                   <center class="my-5"><a href="{{ url('/') }}" class="my-3"> <button class="appt-btn">Back to Home</button></a></center>

                 </div>
              </div>
        </div>   
</section>
  
    

@include('website/footer')