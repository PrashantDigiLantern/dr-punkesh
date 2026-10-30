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
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6"> <div class="breadcrumbs-bx"><a href="{{url('/')}}">Home</a> / <a href="{{url('/blogs')}}">Blogs</a>/<a>{!! $bloglist->blog_name !!}</a></div> </div>
   </div>
      </div>
    </div>
<!-- Doctor Header End -->
<section class="sectionbx blogs-page blogDetailPage">
<div class="container-fluid">
<div class="row">
  <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
    <div class="blogsItem blgDtl">
    <img src="{{$public_url}}backend/blog/{{$bloglist->blog_image_inner}}" class="img-fluid w-100" alt="{{$bloglist->alt_image_name}}">
    <div class="blogCont">
    <div class="row mb-3">
    <div class="col-lg-2 col-md-2 col-sm-12">
    <div class="bdate">{{ date('d M',strtotime($bloglist->date)) }} <span>{{ date('Y',strtotime($bloglist->date)) }}</span></div></div>
    <div class="col-lg-12 col-md-10 col-sm-12">
    <div class="postTitle">{!! $bloglist->blog_name !!}</div>
    <div class="postedBy">Posted by <i class="fa fa-user" aria-hidden="true"></i>  {{$bloglist->name}}</div>
    <ul class="social-network blogsSocial float-right">
      <li>Share </li>
      <li> <a class="icoFacebook" href="https://www.facebook.com/Hair-Skin-PRP-Clinic-102942025528735" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
      <li><a class="icoInstagram" href="https://www.instagram.com/beautydoctorcardiff/" target="_blank" title="Instagram"><i class="fa fa-instagram"></i></a></li>
      <li><a class="icoYoutube" href="#" title="Youtube"><i class="fa fa-youtube-play"></i></a></li>      
      <!-- <li><a class="icoTwitter" href="#" title="twitter"><i class="fa fa-twitter"></i></a></li> -->
    </ul>
    </div>
    </div>
    @if(isset($bloglist->blog_description)){!! $bloglist->blog_description !!}@endif
    </div>
    </div>
</div>

<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
<div class="blogFormBox">
<h3>BOOK AN APPOINTMENT</h3>
{{ App\Http\Controllers\AppLaunchController::LeftsideCommanAppointment(); }}  
</div>
@if(!$blog->isEmpty())
  <div class="blogSidepanel">
    <h3>RECENT BLOGS</h3>
    <ul>
      @foreach($blog as $blogdata)
      <li><img src="{{$public_url}}backend/blog/{{$blogdata->blog_image}}" width="100%" height="60" alt="{{$bloglist->alt_image_name}}"/>
      <div class="blgcntnt"><a href="{{url('/blogs/'.$blogdata->url)}}" class="stretched-link">{!! substr($blogdata->blog_name, 0, 50).'...' !!}</a>
      <div class="blgdt"><i>{{ date('d M Y',strtotime($blogdata->date)) }}</i></div>
      </div></li>
      @endforeach
     
    </ul>
  </div>
  @endif
</div>
</div>
</div>
  </section>  
  {{ App\Http\Controllers\AppLaunchController::CommanFooter(); }}