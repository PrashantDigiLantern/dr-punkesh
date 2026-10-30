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
<div class="BreadCrumb text-center" data-aos="fade-up"><a href="{{url('/')}}">Home</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i> Blogs</div>
<div class="row pt-1" data-aos="fade-up">
   <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-12 text-center">
    <div class="sctinHd">Blogs</div>
  </div>
</div>
</div>
  </div>
  <!-- End Banner -->
 


  @if(!$blog->isEmpty())
  <section class="sectionbx">
    <div class="container blogPage">
  
  <div class="row">
  @foreach($blog as $bloglist)
    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 srvCatPg" data-aos="fade-up">
      <figure><img src="{{$public_url}}backend/blog/{{$bloglist->blog_image}}" class="img-fluid" alt="{{$bloglist->alt_image_name}}"></figure>
      <div class="srvCatPgDsc">
        <div class="CatsrvcHd">{!! $bloglist->blog_name !!}</div>
        <p>{!! substr($bloglist->short_desc, 0, 130).'...' !!} <a href="{{url('/blogs/'.$bloglist->url)}}"
            class="stretched-link">Read More</a></p>
      </div>
    </div>
    @endforeach
   
  </div>
  
  <div class="d-flex justify-content-center">
    {!! $blog->links() !!}
    </div>
</div>
</section>
@endif

{{ App\Http\Controllers\AppLaunchController::CommanFooter(); }}