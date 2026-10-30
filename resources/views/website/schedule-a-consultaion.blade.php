@include('website/header')

<main class="main">

<!-- Start of BreadCrumb -->
<section class="breadcrumbsection">
    <div class="breadcrumbcontainer">
        <h1 class="commonheading">Request An Appointment</h1>
        <ul class="breadcrumblist">
            <li class="breadcrumb-item">
                <a href="{{ url('/') }}" class="breadcrumb-link">Home</a>
            </li>
            <li class="breadcrumb-item">Request An Appointment</li>
        </ul>
    </div>
</section>
<!-- // End of BreadCrumb -->

<!-- Start of Appointment form -->
@include('website/common-appointment')
<!-- // End of Appointment form -->

</main>

@include('website/footer')