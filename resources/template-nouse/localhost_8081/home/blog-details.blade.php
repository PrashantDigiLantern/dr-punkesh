{{ App\Http\Controllers\AppLaunchController::CommanHeader(); }}
@php
 $public_url="";
 if(isset(session('userorginfo')['site_url'])){
 $public_url = session('userorginfo')['site_url'];
 }
@endphp

  <!-- Start Banner -->
  <div class="innerHeader ServiceHeader">     
    <div class="container-fluid">
<div class="BreadCrumb text-center" data-aos="fade-up"><a href="{{url('/')}}">Home</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <a href="{{url('/blogs')}}">Blogs</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <a>{!! $bloglist->blog_name !!}</a></div>
<div class="row pt-1" data-aos="fade-up">
   <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-12 text-center">
    <div class="sctinHd">{!! $bloglist->blog_name !!}</div>
  </div>
</div>
</div>
  </div>
  <!-- End Banner -->
 



  <section class="sectionbx">
    <div class="container">
  
      <div class="row">
        <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12 blogPage">
          <figure><img src="{{$public_url}}backend/blog/{{$bloglist->blog_image_inner}}" class="img-fluid" alt="{{$bloglist->alt_image_name}}"></figure>
          <div class="srvCatPgDsc">
          <div class="sctinHd">{!! $bloglist->blog_name !!}</div>
          <p class="byAdmin"><i class="fa fa-calendar" aria-hidden="true"></i> Date {{ date('d M Y',strtotime($bloglist->date)) }} &nbsp; <i class="fa fa-user" aria-hidden="true"></i> By {{$bloglist->name}}</p>
          @if(isset($bloglist->blog_description)){!! $bloglist->blog_description !!}@endif
      </div>
      </div>

      
      @if(isset($contactus->timings))
@php
$timingdata = json_decode($contactus->timings);
$timinglist = $timingdata->days;
$timinglist = collect($timinglist)->sortBy('timing_order_by');
@endphp
@endif

<div class="col-xxl-4 col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12">
  <div class="blogsideform" data-aos="fade-up">
    <h4 class="text-center mb-3">Clinic Timings</h4>
    
    @if(isset($contactus->timings))
  @foreach($timinglist as $timingdatalist)
  @if($timingdatalist->status=='open')
  <div class="row">
  <div class="col">{{$timingdatalist->day}}:</div>  <div class="col-7">{{ date("g:i A", strtotime($timingdatalist->start_time)) }} {{ date("g:i A", strtotime($timingdatalist->end_time)) }}</div>
    </div>
  @else
  <div class="row mb-4">
      <div class="col">{{$timingdatalist->day}}:</div>
      <div class="col-7">{{$timingdatalist->status}}</div>
    </div>
   
  @endif
  @endforeach
  @endif
      <!-- <div class="col">Mon to Sat :</div>
      <div class="col-7">10:00 AM to 7:00 PM</div> -->
    <!-- </div> -->
   
    <h4 class="text-center mb-3">Book An Appointment</h4>
    {{ App\Http\Controllers\AppLaunchController::LeftsideCommanAppointment(); }}
    <!-- <form class="form" role="form" autocomplete="off" id="" novalidate="" method="POST">
      <div class="row">
        <div class="col-md-12 mb-3">
          <div class="form-group">
            <input type="text" class="form-control infldtrnsprnt" name="uname1" id="uname1" placeholder="Name*"
              required="">
            <div class="invalid-feedback">Please enter your name</div>
          </div>
        </div>
        <div class="col-md-12 mb-3">
          <div class="form-group">
            <input type="email" class="form-control infldtrnsprnt" name="email" id="email" placeholder="Email*"
              required="">
            <div class="invalid-feedback">Please enter your email</div>
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <div class="form-group">
            <input type="tel" maxlength="10" class="form-control infldtrnsprnt js-input-mobile" name="Telephone"
              placeholder="Phone*" id="Telephone" required="">
            <div class="invalid-feedback">Please enter phone</div>
          </div>
        </div>
        <div class="col-md-6 mb-3">
          <div class="form-group">
            <input type="text" class="form-control infldtrnsprnt" id="date" placeholder="Date*" required="">
            <div class="invalid-feedback">Please enter date</div>
          </div>
        </div>
        <div class="col-md-12 mb-3">
          <div class="form-group">
            <textarea name="message" id="message" rows="3" placeholder="Message..."
              class="form-control"></textarea>
          </div>
        </div>
      </div>
      <div class="text-center"><button type="submit" class="btnSubmit">Submit</button></div>
    </form> -->
  </div>
  @if(!$blog->isEmpty())
  <div class="blogsidepnl" data-aos="fade-up">
    <h4>Recent Posts</h4>
    <ul>
    @foreach($blog as $blogdata)
      <li><a href="{{url('/blogs/'.$blogdata->url)}}"><img src="{{$public_url}}backend/blog/{{$blogdata->blog_image}}" width="80" height="60" alt="{{$bloglist->alt_image_name}}" /></a>
        <div class="blgcntnt"><a href="{{url('/blogs/'.$bloglist->url)}}">{!! substr($blogdata->blog_name, 0, 50).'...' !!}</a>
          <div class="blgdt"><i>{{ date('d M Y',strtotime($blogdata->date)) }}</i></div>
        </div>
      </li>
      @endforeach
      <!-- <li><a href="#"><img src="images/blog-details.jpg" width="80" height="60" alt="" /></a>
        <div class="blgcntnt"><a href="#">sdfsd ssdfsdf sdsdfsdf sdsdfsdf sdsdfsdf sdsdfsdf</a>
          <div class="blgdt"><i>02 Jan 202</i></div>
        </div>
      </li>
      <li><a href="#"><img src="images/blog-details.jpg" width="80" height="60" alt="" /></a>
        <div class="blgcntnt"><a href="#">sdfsd ssdfsdf sdsdfsdf sdsdfsdf sdsdfsdf sdsdfsdf</a>
          <div class="blgdt"><i>02 Jan 202</i></div>
        </div>
      </li>
      <li><a href="#"><img src="images/blog-details.jpg" width="80" height="60" alt="" /></a>
        <div class="blgcntnt"><a href="#">sdfsd ssdfsdf sdsdfsdf sdsdfsdf sdsdfsdf sdsdfsdf</a>
          <div class="blgdt"><i>02 Jan 202</i></div>
        </div>
      </li> -->
    </ul>
  </div>
  @endif
</div>






      </div>
</div>
</section>
{{ App\Http\Controllers\AppLaunchController::CommanFooter(); }}