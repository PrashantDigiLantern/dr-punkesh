@include('website/header')

<!-- CSS Stylesheet -->
<link rel="stylesheet" href="{{ asset('new-website/css/results.css') }}"/>

<main class="main">

<!-- Start of BreadCrumb -->
<section class="breadcrumbsection">
    <div class="breadcrumbcontainer">
        <h1 class="commonheading">Real Results</h1>
        <ul class="breadcrumblist">
            <li class="breadcrumb-item">
                <a href="{{ url('/') }}" class="breadcrumb-link">Home</a>
            </li>
            <li class="breadcrumb-item">Real Results</li>
        </ul>
    </div>
</section>
<!-- // End of BreadCrumb -->

<!-- Start of resultpage -->
<section class="resultpage">
    <div class="container">
      <div class="resultcontainer" id="results-container">
        @if(isset($result) && count($result) > 0)
          @foreach($result as $val)
          <div class="resultcards">
            <div class="card-image">
              <a href="{{ url('real-results/'.$val->url) }}">
                <img src="{{ url('/backend/service_result/image/'.$val->image) }}" loading="lazy" class="img-fluid" width="500" height="499" alt="{{ $val->name }}">
              </a>
            </div>
            <div class="cardcontent">
              <div class="title">
                <a href="{{ url('real-results/'.$val->url) }}" style="color: inherit; text-decoration: none;">{{ $val->name }}</a>
              </div>
              <a href="{{ url('real-results/'.$val->url) }}" class="arrowicon" aria-label="View {{ $val->name }} results">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                  <polyline points="9 18 15 12 9 6"></polyline>
                </svg>
              </a>
            </div>
          </div>
          @endforeach
        @endif
      </div>
    </div>
</section>
<!-- End of resultpage -->

<!-- Start of Appointment form -->
@include('website/common-appointment')
<!-- // End of Appointment form -->

</main>

@include('website/footer')