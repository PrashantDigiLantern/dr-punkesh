@include('website.header')

<link href="{{ asset('new-website/css/technology.css') }}" rel="stylesheet"/>

<main class="main">

  <!-- Start of BreadCrumb -->
  <section class="breadcrumbsection">
    <div class="breadcrumbcontainer">
      <h1 class="commonheading">{!! $techlist->name !!}</h1>
      <ul class="breadcrumblist">
        <li class="breadcrumb-item">
          <a href="{{ url('/') }}" class="breadcrumb-link">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a href="{{ url('technology') }}" class="breadcrumb-link">Technology</a>
        </li>
        <li class="breadcrumb-item">{!! $techlist->name !!}</li>
      </ul>
    </div>
  </section>
  <!-- // End of BreadCrumb -->

  <section style="padding: 60px 0; background: #faf9f6;">
    <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
      <div style="background: #ffffff; border-radius: 14px; padding: 40px; box-shadow: 0 4px 20px rgba(0,0,0,0.04);">
        @if(!empty($techlist->image))
          <div style="text-align: center; margin-bottom: 30px;">
            <img src="{{ url('backend/service_video/technology/'.$techlist->image) }}" alt="{!! $techlist->name !!}" style="max-width: 100%; max-height: 480px; border-radius: 10px; object-fit: contain;">
          </div>
        @endif

        <h2 style="font-family: 'Playfair Display', serif; font-size: 32px; color: #1a1a1a; margin-bottom: 20px;">
          {!! $techlist->name !!}
        </h2>

        <div style="font-size: 16px; line-height: 1.8; color: #4a4a4a;">
          {!! $techlist->description !!}
        </div>
      </div>
    </div>
  </section>

  <!-- Start of Appointment form -->
  @include('website.common-appointment')

</main>

@include('website.footer')