{{ App\Http\Controllers\AppLaunchController::CommanHeader(); }}
@php
 $public_url="";
 if(isset(session('userorginfo')['site_url'])){
 $public_url = session('userorginfo')['site_url'];
 }
@endphp

<!-- Doctor Header Start -->
    <div class="inner-page-header" style="background-image:url({{$public_url}}images/inner-banner.jpg);">
<div class="container">
  <div class="row align-items-center">
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6"> <div class="breadcrumbs-bx"><a href="{{url('/')}}">Home</a> / <a href="{{url('/blogs')}}">Blogs</a></div> </div>
   
</div>
      </div>
    </div>
<!-- Doctor Header End -->
@if(!$blog->isEmpty())
  <section class="sectionbx blogs-page">
    <div class="container-fluid">
    <div class="row">
   
      @foreach($blog as $bloglist)
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
        <div class="blogsItem">
        <img src="{{$public_url}}backend/blog/{{$bloglist->blog_image}}" class="img-fluid w-100" alt="{{$bloglist->alt_image_name}}">
        <div class="blogCont">
        <div class="row align-items-center">
        <div class="col-lg-2 col-md-3 col-sm-12">
        <div class="bdate">{{ date('d M',strtotime($bloglist->date)) }} <span>{{ date('Y',strtotime($bloglist->date)) }}</span></div></div>
        <div class="col-lg-10 col-md-9 col-sm-12">
        <div class="postTitle">{!! $bloglist->blog_name !!}</div>
        <div class="postedBy">Posted by <i class="fa fa-user" aria-hidden="true"></i>  {{$bloglist->name}}</div>
        </div>
        </div>
        <p>{!! substr($bloglist->short_desc, 0, 130).'...' !!}
        <a href="{{url('/blog/'.$bloglist->url)}}" class="stretched-link">Read more <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
        </p>
        </div>
        </div>
    </div>
    @endforeach
   
     
  <div class="d-flex justify-content-center">
    {!! $blog->links() !!}
    </div>
  </div>
     </section>
     @endif
 
<section class="sectionbx appointmentbx" style="background:#333">
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

{{ App\Http\Controllers\AppLaunchController::CommanFooter(); }}