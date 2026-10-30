@php $is404 = true; @endphp
@include('website.header')

<link href="{{ asset('new-website/css/error.css') }}" rel="stylesheet"/>

<main class="main">

<!-- Start of bannersection -->
<section class="herosectionrow">
</section> 
<!-- // End of bannersection -->

<!-- Start of errorpage -->
<section class="errorpage section">
  <div class="container">
        <div class="thankyoubox">
            <h1 class="thankheading">4<span>0</span>4</h1>
            <h2 class="errorheading">Oops! Page Not Found</h2>
            <p>We are sorry, but the page you requested was not found!</p>
            <a class="viewallbtn" href="{{ url('/') }}">Back To Homepage</a>
        </div>
  </div>
</section>
<!-- End of errorpage -->

</main>

@include('website/footer')