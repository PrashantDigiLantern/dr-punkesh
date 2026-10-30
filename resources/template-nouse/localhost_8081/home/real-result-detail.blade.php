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
<div class="BreadCrumb text-center" data-aos="fade-up"><a href="{{url('/')}}">Home</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <a href="{{url('/real-results')}}">Real Results</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i> {{$resultcat->name}}</div>
<div class="row pt-1" data-aos="fade-up">
  <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-12 text-center">
  <div class="sctinHd">{{$resultcat->name}}</div>
</div>
</div>
</div>
</div>
<!-- End Banner -->


@if(!$resultdetails->isEmpty())
<section class="sectionbx">
<div class="container-fluid text-center">
  <div class="row" style="font-size: 14px;">

  @foreach($resultdetails as $resultdetaillist)
    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
      <figure><img src="{{$public_url}}backend/service_result/inner/{{$resultdetaillist->beforeimg}}" class="img-fluid" alt="{{$resultdetaillist->alt_img}}"></figure>
          <p>✱ Results may vary person to person.</p>
    </div>
    @endforeach
<!-- 
      <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <figure><img src="images/banner.jpg" class="img-fluid" alt=""></figure>
          <p>✱ Results may vary person to person.</p>
        </div>

         <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">  
            <figure><img src="images/banner.jpg" class="img-fluid" alt=""></figure>
              <p>✱ Results may vary person to person.</p>
          </div>

          <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">    
              <figure><img src="images/banner.jpg" class="img-fluid" alt=""></figure>
                <p>✱ Results may vary person to person.</p>
            </div>
<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
<figure><img src="images/banner.jpg" class="img-fluid" alt=""></figure>
<p>✱ Results may vary person to person.</p>
</div>

<div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
<figure><img src="images/banner.jpg" class="img-fluid" alt=""></figure>
<p>✱ Results may vary person to person.</p>
</div> --> 
  </div>
    
    
    
  </div>


<!-- <nav aria-label="Page navigation mt-5">
  <ul class="pagination justify-content-center Pgntn mb-0">
    <li class="page-item disabled">
      <a class="page-link">Previous</a>
    </li>
    <li class="page-item active"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav> -->
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-3 custm-pgntion">
    <div class="d-flex justify-content-center">
        {!! $resultdetails->links() !!}
        </div>
    </div>
</div>
</section>
@endif


{{ App\Http\Controllers\AppLaunchController::CommanFooter(); }}