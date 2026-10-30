@include('website/header')
    
    <section class="back-img banner-in serv-d py-0">
      <img data-src="{{url('backend/service/banner/'.$servicedetail->service_banner_image)}}" alt="Dr. Punkesh" class="lazyloaded bnner-img" src="{{url('backend/service/banner/'.$servicedetail->service_banner_image)}}">
         <div class="container con_cus">
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 flex-j">     
                <div>        

                  <div class="shrt-mar changeh2"><span class="text-light">{{$servicedetail->service_name}} </span></div>

                       </div>         
                   <ul class="banner-nav">
                    <li><a href="{{ url('/') }}" class="pl">Home</a></li>
                    <?php if($servicedetail->category_type == "secondcategory" ){ ?>

                          <li class=""><a href="{{url('/treatments/'.$serviceMain->url)}}">{{$serviceMain->service_name}}</a></li>

                          <?php }else if($servicedetail->category_type == "service"){ ?>

                          <li class=""><a href="{{url('/'.$service_cat->url.'/'.$serviceMain->url)}}">{{$serviceMain->service_name}}</a></li>

                          <?php } ?>
                          <li><a href="#">{{$servicedetail->service_name}}</a></li>
                          


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



    

    
<?php if(!is_null($servicedetail->sub_heading)  && !empty($servicedetail->sub_heading)){ ?>
    
    <section class="darkbackin list-col " style="background:white">
      <div class="container-fluid">
            <div class="container con_cus">
              <div class="row">
                <center><h3>{!! $servicedetail->sub_heading !!} </h3></center>
                   
              </div>
            </div>
          </div>
    </section>

 <?php } ?>
    
    
<?php 
if(isset($servicedetail->section)){
$sersection = json_decode($servicedetail->section); 
$sersectionorder = collect($sersection)->sortBy('secorderby');
foreach($sersectionorder as $key => $sersectionlist){
    if(isset($sersectionlist->bg_type) && $sersectionlist->bg_type != null){ 
        if($sersectionlist->bg_type=='bgcolor'){ 
          $style = $sersectionlist->bgcolor_style; 
        }elseif($sersectionlist->bg_type=='bgimage'){ 
          $style = "background-image: url(backend/service/section_banner/$sersectionlist->bgimage)"; 
        }elseif($sersectionlist->bg_type=='white'){ 
          $style = "background:white";
        } 
    }else{
        $style = "";
    }

    if(isset($sersectionlist->class_add)){
        $classAdd = $sersectionlist->class_add;
    }else{
        $classAdd =  "";
    }

    
    if(isset($sersectionlist->section_head_type)){
      $section_head_type = $sersectionlist->section_head_type;

    }else{
        $section_head_type =  "div";
    }

?>



@if($sersectionlist->type == 'twoparagraphdifflayout')
     <section class="list-col list-sin {{$classAdd}}" style="{{$style}}">
       <div class="container con_cus">                
              <div class="row justify-content-between">

                  <div class="col-lg-6 col-md-6 col-sm-12 paddingright">
                   <{{$section_head_type}} class="commonallheading"><span class="text-secondary">{{ $sersectionlist->section_heading }}</{{$section_head_type}}>
                    @if(isset($sersectionlist->section1)){!! $sersectionlist->section1 !!}@endif   
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 paddingleft">
                    <h3><span class="text-secondary">{{ $sersectionlist->service_heading1 }}</h3>
                     @if(isset($sersectionlist->section2)){!! $sersectionlist->section2 !!}@endif 
                   </div>

              </div>  
          
        </div>
    </section> 
  @endif 
  
  @if($sersectionlist->type == 'twoparagraph')
     <section class="list-col list-sin {{$classAdd}}" style="{{$style}}">
       <div class="container con_cus">                
              <div class="row justify-content-between">
                  <center><{{$section_head_type}} class="commonallheading"><span class="text-secondary">{{ $sersectionlist->section_heading }}</{{$section_head_type}}></center>
                  <div class="col-lg-6 col-md-6 col-sm-12 paddingright">
                     @if(isset($sersectionlist->section1)){!! $sersectionlist->section1 !!}@endif   
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 paddingleft">
                     @if(isset($sersectionlist->section2)){!! $sersectionlist->section2 !!}@endif 
                  </div>

              </div>  
          
        </div>
    </section> 
  @endif 

  @if($sersectionlist->type == 'fulltext')
    <section class="darkbackin list-col {{$classAdd}}" style="{{$style}}">
      <div class="container-fluid">
            <div class="container con_cus">
              <div class="row">
                <center><{{$section_head_type}} class="commonallheading">{{ $sersectionlist->section_heading }} </{{$section_head_type}}></center>
                 @if(isset($sersectionlist->section1)){!! $sersectionlist->section1 !!}@endif         
              </div>
            </div>
          </div>
    </section>
  @endif


  @if($sersectionlist->type == 'rightimagetext')
    <section class="greyshade {{$classAdd}}"   >
      <div class="container-fluid">
            <div class="container con_cus">
              <div class="row justify-content-between">
                <div class="col-lg-6 col-md-6 col-sm-12 paddingright">
                   <{{$section_head_type}} class="commonallheading">{{ $sersectionlist->section_heading }}</{{$section_head_type}}>
                   @if(isset($sersectionlist->section1)){!! $sersectionlist->section1 !!}@endif  
                </div>
                  <div class="col-lg-6 col-md-6 col-sm-12 paddingleft">
                    <img data-src="{{url('backend/service/section/'.$sersectionlist->image)}}" alt="is laser toning safe" class="mb-5 w-100 lazyload">
                  </div>
              </div>  
            </div>
          </div>

    </section>
    @endif
    
    
     @if($sersectionlist->type == 'imagetext')
    <section class="greyshade {{$classAdd}}"   >
      <div class="container-fluid">
            <div class="container con_cus">
              <div class="row justify-content-between">
              <div class="col-lg-6 col-md-6 col-sm-12 paddingleft">
                    <img data-src="{{url('backend/service/section/'.$sersectionlist->image)}}" alt="is laser toning safe" class="mb-5 w-100 lazyload">
                  </div>
                <div class="col-lg-6 col-md-6 col-sm-12 paddingright">
                   <{{$section_head_type}} class="commonallheading">{{ $sersectionlist->section_heading }}</{{$section_head_type}}>
                   @if(isset($sersectionlist->section1)){!! $sersectionlist->section1 !!}@endif  
                </div>
                 
              </div>  
            </div>
          </div>

    </section>
    @endif

    
    @if($sersectionlist->type == 'leftheading')
    <section class="greyshade {{$classAdd}}"   >
      <div class="container-fluid">
            <div class="container con_cus">
              <div class="row justify-content-between">
              <div class="col-lg-6 col-md-6 col-sm-12 paddingleft">
              <{{$section_head_type}} class="commonallheading">{{ $sersectionlist->section_heading }}</{{$section_head_type}}>
                  </div>
                <div class="col-lg-6 col-md-6 col-sm-12 paddingright">
                   
                   @if(isset($sersectionlist->section1)){!! $sersectionlist->section1 !!}@endif  
                </div>
                 
              </div>  
            </div>
          </div>

    </section>
    @endif



    
     <!--section class="list-col gp-null">
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
    </section-->
  <?php } } ?>
  <?php  
  if(count($servicefaqs) > 0){ ?>
     <section class="greyshade">
      <div class="container-fluid">
            <div class="container con_cus">
              <div class="row">
                <center><h3 class="mb-5"> FREQUENTLY ASKED QUESTIONS</h3></center>


                    <div class="row cus-accrd list-col">


                    <?php $i = 1; foreach($servicefaqs as $v){  ?>
                      <div class="col-lg-6 col-md-12">
                            <div class="accordion-item">                          
                            <p class="accrd-p p-0 m-0" id="heading<?php echo $i;?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $i;?>" aria-expanded="true" aria-controls="collapse<?php echo $i;?>">
                              <strong><?php echo $v->question ; ?></strong></p>                        
                          <div id="collapse<?php echo $i;?>" class="accordion-collapse collapse <?php if($i==1){echo "show";}else{ echo "";}?>" aria-labelledby="heading<?php echo $i;?>" data-bs-parent="#accordionExample">
                            <div class="accordion-body p-0">
                            {!! $v->answer !!}
                            </div>
                          </div>
                          </div>

                           <!--div class="accordion-item">                          
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
                          </div-->

                        </div>
                        <?php $i++;} ?>

                    
                        
                      
                           
                        


                        </div>
                                  
              </div>
            </div>
          </div>
    </section>
    <?php } ?>

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