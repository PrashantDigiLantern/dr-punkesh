@include('website/header')

<link href="{{ asset('new-website/css/videoinner.css') }}" rel="stylesheet"/>

<main class="main">

<!-- Start of BreadCrumb -->
<section class="breadcrumbsection">
    <div class="breadcrumbcontainer">
        <h1 class="commonheading">Video Testimonials</h1>
        <ul class="breadcrumblist">
            <li class="breadcrumb-item"><a href="{{ url('/') }}" class="breadcrumb-link">Home</a></li>
            <li class="breadcrumb-item">Video Testimonials</li>
        </ul>
    </div>
</section>
<!-- // End of BreadCrumb -->

<!-- Start of videoinnerpage -->
<section class="videoinnerpage">
    <div class="videoconatiner">
      @if(isset($testimonial) && count($testimonial) > 0)
        @foreach($testimonial as $val)
        <div class="videocard">
          <a class="crvideobtns" href="javascript:void(0);" onclick="setVid('{{ $val->video }}')" data-target="#youtubemodal"><div class="circle">▶</div></a>
          <div class="card-image" onclick="setVid('{{ $val->video }}')" style="cursor: pointer;">
            <img src="{{ url('backend/service_video/inner/'.$val->image) }}" class="img-fluid" width="508" height="400" alt="{{ $val->name }}"/>
          </div>
          <div class="cardcontent">
            <div class="cardtitle">{{ $val->name }}</div>
          </div>
        </div>
        @endforeach
      @endif
    </div>

    @if(isset($testimonial) && method_exists($testimonial, 'links'))
    <div class="d-flex justify-content-center" style="margin-top: 40px;">
        {!! $testimonial->links() !!}
    </div>
    @endif
</section>
<!-- // End of videoinnerpage -->

<!-- Start of Appointment form -->
@include('website/common-appointment')
<!-- // End of Appointment form -->

</main>

@include('website/footer')