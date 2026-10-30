@include('website/header')

<!-- CSS Stylesheet -->
<link rel="stylesheet" href="{{ asset('new-website/css/resultsinner.css') }}"/>

<main class="main">

<!-- Start of BreadCrumb -->
<section class="breadcrumbsection">
    <div class="breadcrumbcontainer">
        <h1 class="commonheading">Real Results</h1>
        <ul class="breadcrumblist">
            <li class="breadcrumb-item">
                <a href="{{ url('/') }}" class="breadcrumb-link">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ url('real-results') }}" class="breadcrumb-link">Real Results</a>
            </li>
            <li class="breadcrumb-item">Results Gallery</li>
        </ul>
    </div>
</section>
<!-- // End of BreadCrumb -->

<!-- Start of resultpage -->
<section class="resultpage">
    <div class="container">
      <div class="resultcontainer" id="results-container">
        @if(isset($result) && !$result->isEmpty())
          @foreach($result as $val)
          <div class="resultcards">
            <div class="card-image">
              <a href="{{ url('/backend/service_result/inner/'.$val->beforeimg) }}" target="_blank">
                <img src="{{ url('/backend/service_result/inner/'.$val->beforeimg) }}" loading="lazy" class="img-fluid" width="500" height="499" alt="Real Clinical Result">
              </a>
            </div>
            <div class="cardcontent">
              <div class="title">{{ $val->title ?? 'Real Clinical Result' }}</div>
            </div>
          </div>
          @endforeach
        @else
          <div class="col-12 text-center py-5">
            <p>No results available in this category.</p>
          </div>
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