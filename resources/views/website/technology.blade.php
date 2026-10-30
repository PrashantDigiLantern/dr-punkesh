@include('website.header')

<link href="{{ asset('new-website/css/technology.css') }}" rel="stylesheet"/>

<main class="main">

  <!-- Start of BreadCrumb -->
  <section class="breadcrumbsection">
    <div class="breadcrumbcontainer">
      <h1 class="commonheading">Technology</h1>
      <ul class="breadcrumblist">
        <li class="breadcrumb-item">
          <a href="{{ url('/') }}" class="breadcrumb-link">Home</a>
        </li>
        <li class="breadcrumb-item">Technology</li>
      </ul>
    </div>
  </section>
  <!-- // End of BreadCrumb -->

  <!-- Start of categorypage -->
  <section class="categorypage">
    <div class="container">
      <div class="technologygrid">

        @if(isset($technology) && count($technology) > 0)
          @foreach($technology as $techlist)
            <div class="serviceitem">
              <div class="serviceimg">
                <a href="{{ url('/technology/'.$techlist->url) }}">
                  <img src="{{ url('backend/service_video/technology/'.$techlist->image) }}" class="img-fluid" width="508" height="400" alt="{{ $techlist->name }}" onerror="this.src='{{ asset('new-website/images/expertise01.webp') }}'"/>
                </a>
              </div>
              <div class="details position-relative">
                <div class="sheading">{!! $techlist->name !!}</div>
                <p>{!! \Illuminate\Support\Str::words(strip_tags(html_entity_decode($techlist->short_desc)), 16, '...') !!}</p>
                <a href="{{ url('/technology/'.$techlist->url) }}" class="viewallbtn">Read More</a>
              </div>
            </div>
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