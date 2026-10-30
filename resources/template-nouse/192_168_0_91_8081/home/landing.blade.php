{{ App\Http\Controllers\AppLaunchController::CommanHeader(); }}
@php
$public_url="";
if(isset(session('userorginfo')['site_url'])){
$public_url = session('userorginfo')['site_url'];
}
@endphp

@if(!$slider->isEmpty())
@php
$count = count($slider);
@endphp

<!-- Banner Slider End -->
    <div id="carouselExampleFade" class="carousel slide carousel-fade bnrSlider" data-ride="carousel">
        <div class="carousel-inner">
        @foreach($slider as $key => $sliderlist)
          <div class="carousel-item <?php if($key=='0'){echo 'active';}?>">
            <img src="{{$public_url.'backend/slider/'.$sliderlist->image}}" class="d-block w-100" alt="banner 1">
            <div class="carousel-caption bannercaption">
                <h3>{{$sliderlist->name}}</h3>
                <div>{!!$sliderlist->description!!}</div>
                @if($sliderlist->button_type=='Yes')
                <a href="{{url('/'.$sliderlist->button_url)}}" class="btnbnr" style="<?php echo $sliderlist->button_url; ?>">{{$sliderlist->button_name}} <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></a>
                @endif
              </div>
          </div>
          <!-- <div class="carousel-item">/services/prp-for-hair-growth-men
            <img src="{{$public_url}}images/temp3-banner-1.jpg" class="d-block w-100" alt="banner 2">
            <div class="carousel-caption bannercaption">
                <h3>Radiant & Beautiful Skin Naturally!</h3>
                <p>PRP for skin rejuvenation, also known as vampire facial, is the secret behind ageless skin of most celebrities.</p>
                <a href="{{url('/services/prp-for-skin-rejuvenation')}}" class="btnbnr">Read more <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></a>
              </div>
          </div> -->
          @endforeach
        </div>
        @if(count($slider) > 1)
        <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon prvicon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
          <span class="carousel-control-next-icon nxticon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
        @endif
      </div>
<!-- Banner Slider End -->
@endif
@if(!$service->isEmpty())
<section class="sectionbx servicebox">
<div class="container-fluid">
<h2 class="text-center" data-aos="fade-up">Services</h2>
<!-- <p class="text-center" data-aos="fade-up">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard<br>dummy text ever since the 1500s,when an unknown printer took a galley type and scrambled. </p> -->
<div class="row justify-content-xl-center justify-content-lg-center justify-content-md-center">
@foreach($service as $key => $sliderlist)
<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-6 my-3" data-aos="fade-up">
<div class="serviceitm">
<img src="{{$public_url.'backend/service/banner/'.$sliderlist->home_banner_image}}" class="img-fluid" alt="{{$sliderlist->alt_tag}}">
<div class="card-body"><h3>{{$sliderlist->service_name}}</h3>     
<div>{!! $sliderlist->homedescription !!}  <a href="{{url('/services/'.$sliderlist->url)}}" class="stretched-link">Read more <i class="fa fa-arrow-right" aria-hidden="true"></i></a></div>
</div></div>
</div>
@endforeach


</div>
<div class="text-center mt-2" data-aos="fade-up"><a href="{{url('/Services')}}" class="btn btn-readmoreblk">View All</a></div>
</div>
</section>
@endif
@if(!$aboutclinic->isEmpty())
<section class="sectionbx hmaboutclinic">
<div class="container-fluid">
<div class="row align-items-center">
  @foreach($aboutclinic as $aboutcliniclist)
  <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12">
    <h2 data-aos="fade-up">{{ $aboutcliniclist->name }}</h2>
    <p class="txthd" data-aos="fade-up"><strong>{{ $aboutcliniclist->heading1 }}</strong></p>
    <div data-aos="fade-up">{!! $aboutcliniclist->home_section !!}</div>

    <div data-aos="fade-up"><a href="{{url('/about-clinic')}}" class="btn btn-readmoreblk">Read more</a></div>
  </div>
@endforeach
</div>
</div>
</section>
@endif
@if(!$doctorlist->isEmpty())
<section class="sectionbx hmaboutdoctor">
<div class="container-fluid">  
  <div class="row align-items-center">
    @foreach($doctorlist as $doctorlistsec)
    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-12" data-aos="fade-right"> <img src="{{$public_url.'backend/doctor/'.$doctorlistsec->image}}" class="img-fluid" alt=""> </div>
    <div class="col-xl-7 col-lg-7 col-md-7 col-sm-12 doctorcntnt" data-aos="fade-up">
      <h2>About {{$doctorlistsec->name}}</h2>
      {!! $doctorlistsec->sort_desc !!}
     <div><a href="{{url('/about-doctor')}}" class="btn btn-readmoreblk">Read more</a></div>
    </div>
      @endforeach
  </div>
</div>
</section>
@endif
<section class="sectionbx hmtestimonials">
<div class="container-fluid">
  <h2 class="text-center" data-aos="fade-up">WHAT OUR CLIENTS SAY</h2>
  <div class="row align-items-center">
  @if(isset($testimonial))
      @foreach($testimonial as $testimoniallist)
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12" data-aos="fade-up">
        <div class="tstmnlitem">
          <div class="tstcercle">{{$testimoniallist->short_name}}</div>
          <img src="{{$public_url}}images/quote-icon.png" alt="">
          <div class="testimonialscont">
            {!! $testimoniallist->description !!}
          </div>
          <div class="opiniontxt">* Opinions/Results may vary from person to person.</div>
          <div class="tstname">{{$testimoniallist->name}}
            <ul class="sourcefrom">
              <li>{{$testimoniallist->source}}, </li>
              @if($testimoniallist->rating == '1')
              <li>★</li>
              @endif
              @if($testimoniallist->rating == '2')
              <li>★</li>
              <li>★</li>
              @endif
              @if($testimoniallist->rating == '3')
              <li>★</li>
              <li>★</li>
              <li>★</li>
              @endif
              @if($testimoniallist->rating == '4')
              <li>★</li>
              <li>★</li>
              <li>★</li>
              <li>★</li>
              @endif
              @if($testimoniallist->rating == '5')
              <li>★</li>
              <li>★</li>
              <li>★</li>
              <li>★</li>
              <li>★</li>
              @endif
            </ul>
          </div>
        </div>
      </div>
      @endforeach
      @endif
  
 
  </div>
  <div class="text-center mt-4" data-aos="fade-up"><a href="{{url('/testimonials')}}" class="btn btn-readmoreblk">View All</a></div>
</div>
</section>

<section class="sectionbx appointmentbx" style="<?php if(empty($blog)){ echo 'background:#333333';}?>">
  <div class="container"> 
    <h2 class="text-center" data-aos="fade-up">Book An Appointment</h2>
  <div class="row align-items-center">
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6" data-aos="fade-right">
    {{ App\Http\Controllers\AppLaunchController::CommanAppointment(); }} 
       
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 formInfo">
      <div class="" data-aos="fade-left">
      <h3 class="mb-3">Clinic Address & Timings</h3>
      {{ App\Http\Controllers\AppLaunchController::ContactDetail(); }}
    </div>
  </div>
</div>  
  </div>
</section>


@if(!$blog->isEmpty())
<section class="sectionbx hmblogs">
  <div class="container-fluid">
    <h2 class="text-center" data-aos="fade-up">Latest Blogs</h2>
    <div class="row align-items-center">
      
        <div class="col-xl-2 col-lg-12 col-md-12 col-sm-12">
        </div>
      <div class="col-xl-8 col-lg-12 col-md-12 col-sm-12">
        <div class="row">
        @if(isset($blog))
          @foreach($blog as $key => $bloglist)
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12" data-aos="fade-up">
              <div class="blogcol">
              <img src="{{$public_url.'backend/blog/'.$bloglist->blog_image}}" class="card-img-top" alt="...">
              <div class="card-body">
                <div class="row bloginfo">
                  <div class="col"><i class="fa fa-calendar" aria-hidden="true"></i> {{ date('d M Y', strtotime($bloglist->date)) }}</div>
                  <div class="col text-right"><i class="fa fa-user" aria-hidden="true"></i> By {{$bloglist->name}}</div>
                </div>
                <h5 class="card-title my-3">{{$bloglist->blog_name}}</h5>
                <div>{!! substr($bloglist->short_desc, 0, 130).'...' !!} <a href="{{url('/blog/'.$bloglist->url)}}" class="stretched-link">Read more <i class="fa fa-arrow-right" aria-hidden="true"></i></a></div>
              </div>
            </div>
            <!-- </a> -->
          </div>
          @endforeach
          @endif
         
        </div>
        <div class="text-center mt-4" data-aos="fade-up"><a href="{{url('/blogs')}}" class="btn btn-readmoreblk">View All</a></div>
      </div>
    </div>
  </div>
  </section>
@endif


  {{ App\Http\Controllers\AppLaunchController::CommanFooter(); }}