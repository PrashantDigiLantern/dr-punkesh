@include('website/header')

<!-- CSS Stylesheet -->
<link rel="stylesheet" href="{{ asset('new-website/css/testimonials.css') }}"/>

<main class="main">

<!-- Start of BreadCrumb -->
<section class="breadcrumbsection">
    <div class="breadcrumbcontainer">
        <h1 class="commonheading">Written Testimonials</h1>
        <ul class="breadcrumblist">
            <li class="breadcrumb-item">
                <a href="{{ url('/') }}" class="breadcrumb-link">Home</a>
            </li>
            <li class="breadcrumb-item">Written Testimonials</li>
        </ul>
    </div>
</section>
<!-- // End of BreadCrumb -->

<section class="testimonialspage">
    <div class="container">
        <div class="testimonials-grid" id="testimonialsGrid">
            @include('website.testimonial-card-item')
        </div>

        @if(isset($testimonial) && $testimonial->hasMorePages())
        <div class="loadwrapper" id="loadWrapper">
            <button type="button" class="loadmorebutton" id="loadMoreBtn" data-page="2" aria-label="Load More Testimonials">
                LOAD MORE
            </button>
        </div>
        @endif
    </div>
</section>

<!-- Start of Appointment form -->
@include('website/common-appointment')
<!-- // End of Appointment form -->

</main>

@include('website/footer')

<script type="text/javascript">
  $(document).ready(function() {
      $('#loadMoreBtn').on('click', function(e) {
          e.preventDefault();
          var $btn = $(this);
          var nextPage = $btn.data('page');

          $btn.prop('disabled', true).text('LOADING...');

          $.ajax({
              url: "{{ url('/written-testimonials') }}?page=" + nextPage,
              type: 'GET',
              headers: {
                  'X-Requested-With': 'XMLHttpRequest'
              },
              success: function(response) {
                  if (response && response.html) {
                      var $newItems = $(response.html).hide();
                      $('#testimonialsGrid').append($newItems);
                      $newItems.fadeIn(400);

                      if (response.hasMore) {
                          $btn.data('page', response.nextPage);
                          $btn.prop('disabled', false).text('LOAD MORE');
                      } else {
                          $('#loadWrapper').fadeOut(300, function() {
                              $(this).remove();
                          });
                      }
                  } else {
                      $('#loadWrapper').fadeOut(300, function() {
                          $(this).remove();
                      });
                  }
              },
              error: function(xhr, status, error) {
                  console.error('Failed to load testimonials:', error);
                  $btn.prop('disabled', false).text('LOAD MORE');
                  alert('Unable to load more testimonials right now. Please try again.');
              }
          });
      });
  });
</script>