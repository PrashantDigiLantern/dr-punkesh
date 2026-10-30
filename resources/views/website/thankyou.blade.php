@include('website/header')

<link href="{{ asset('new-website/css/thank.css') }}" rel="stylesheet"/>

<main class="main">

<!-- Start of thankyoupage -->
<section class="thankyoupage section">
  <div class="container">
     <div class="thankyoubox">
      <h1 class="thankheading">Thank You!</h1>
      <p>We have received your request. We will get in touch with you shortly.</p>
      <a class="viewallbtn" href="{{ url('/') }}">Back To Homepage</a>
     </div>
  </div>
</section>
<!-- End of thankyoupage -->

<!-- Start of Appointment form -->
@include('website/common-appointment')
<!-- // End of Appointment form -->

</main>

@include('website/footer')