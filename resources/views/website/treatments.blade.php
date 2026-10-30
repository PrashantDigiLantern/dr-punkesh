@include('website.header')

<link href="{{ asset('new-website/css/treatments.css') }}" rel="stylesheet"/>

<main class="main">

  <!-- Start of BreadCrumb -->
  <section class="breadcrumbsection">
    <div class="breadcrumbcontainer">
      <h1 class="commonheading">Treatments</h1>
      <ul class="breadcrumblist">
        <li class="breadcrumb-item">
          <a href="{{ url('/') }}" class="breadcrumb-link">Home</a>
        </li>
        <li class="breadcrumb-item">Treatments</li>
      </ul>
    </div>
  </section>
  <!-- // End of BreadCrumb -->

  <!-- Start of categorypage -->
  <section class="categorypage">
    <div class="container">
      <div class="technologygrid">

        @if(isset($service) && count($service) > 0)
          @foreach($service as $v)
            @if($v->url != 'general')
              <div class="serviceitem">
                <div class="serviceimg">
                  <a href="{{ url('/treatments/'.$v->url) }}">
                    <img src="{{ url('backend/service/image/'.$v->service_image) }}" class="img-fluid" width="508" height="400" alt="{{ $v->service_name }}" onerror="this.src='{{ asset('new-website/images/expertise01.webp') }}'"/>
                  </a>
                </div>
                <div class="details position-relative">
                  <div class="sheading">{{ $v->service_name }}</div>
                  <p>{!! strip_tags($v->short_desc) !!}</p>
                  <a href="{{ url('/treatments/'.$v->url) }}" class="viewallbtn">Read More</a>
                </div>
              </div>
            @endif
          @endforeach
        @endif

      </div>
    </div>
  </section>
  <!-- // End of categorypage -->

  <!-- Start of Appointment form -->
  @include('website.common-appointment')
  <!-- // End of Appointment form -->

</main>

@include('website.footer')