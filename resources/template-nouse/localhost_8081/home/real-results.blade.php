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
<div class="BreadCrumb text-center" data-aos="fade-up"><a href="index.html">Home</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i> <a href="real-results.html">Real Results</a></div>
<div class="row pt-1" data-aos="fade-up">
  <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-12 text-center">
  <div class="sctinHd">Real Results</div>
</div>
</div>
</div>
</div>
<!-- End Banner -->

@if(!$results->isEmpty())
<section class="sectionbx">
<div class="container-fluid text-center">
  <div class="row">
  @foreach($results as $key => $resultslist)
    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
      <div class="resultCat">
      <figure><img src="{{$public_url}}backend/service_result/image/{{$resultslist->image}}" class="img-fluid" alt="{{$resultslist->alt_tag}}"></figure>
        <div class="CatHd"><a href="{{url('/real-results/'.$resultslist->url)}}" class="stretched-link">{{$resultslist->name}}</a></div>
    </div>
    </div>
    @endforeach
      <!-- <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
        <div class="resultCat">
          <figure><img src="images/banner.jpg" class="img-fluid" alt=""></figure>
          <div class="CatHd"><a href="real-results-detail.html" class="stretched-link">Service Heading</a></div>
        </div>
      </div>
        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <div class="resultCat">
            <figure><img src="images/banner.jpg" class="img-fluid" alt=""></figure>
            <div class="CatHd"><a href="real-results-detail.html" class="stretched-link">Service Heading</a></div>
          </div>
        </div>
          <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="resultCat">
              <figure><img src="images/banner.jpg" class="img-fluid" alt=""></figure>
              <div class="CatHd"><a href="real-results-detail.html" class="stretched-link">Service Heading</a></div>
            </div>
          </div>
            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
              <div class="resultCat">
                <figure><img src="images/banner.jpg" class="img-fluid" alt=""></figure>
                <div class="CatHd"><a href="real-results-detail.html" class="stretched-link">Service Heading</a></div>
              </div>
            </div>
              <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="resultCat">
                  <figure><img src="images/banner.jpg" class="img-fluid" alt=""></figure>
                  <div class="CatHd"><a href="real-results-detail.html" class="stretched-link">Service Heading</a></div>
                </div>
              </div> -->
  </div>       
  </div>
  <div class="d-flex justify-content-center">
        {!! $results->links() !!}
        </div>
<!-- 
<nav aria-label="Page navigation mt-5">
  <ul class="pagination justify-content-center Pgntn mb-0">
    <li class="page-item disabled"><a class="page-link">Previous</a></li>
    <li class="page-item active"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav> -->
</div>
</section>
@endif
{{ App\Http\Controllers\AppLaunchController::CommanFooter(); }}