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
<div class="BreadCrumb text-center" data-aos="fade-up"><a href="{{url('/')}}">Home</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i>Service</div>
<div class="row pt-1" data-aos="fade-up">
   <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-12 text-center">
    <div class="sctinHd">Services</div>
  </div>
</div>
</div>
  </div>
  <!-- End Banner -->
 

  @if(!$service->isEmpty())

  <section class="sectionbx">
    <div class="container">
  
      <div class="row">
      @foreach($service as $key => $servicelist)
        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12 srvCatPg" data-aos="fade-up">
          <figure><img src="{{$public_url}}backend/service/image/{{$servicelist->service_image}}" class="img-fluid" alt="{{$servicelist->alt_tag}}"></figure>
          <div class="srvCatPgDsc">
          <div class="CatsrvcHd">{{$servicelist->service_name}}</div>
        <p>{!! substr($servicelist->short_desc, 0, 200).'...' !!} <a href="{{url('/services/'.$servicelist->url)}}" class="stretched-link">Read More</a></p>
      </div>
      </div>

      @endforeach
      </div>
</div>
</section>
@endif


{{ App\Http\Controllers\AppLaunchController::CommanFooter(); }}