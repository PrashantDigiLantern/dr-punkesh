@include('website.header')

<link href="{{ asset('new-website/css/gallery.css') }}" rel="stylesheet"/>

<main class="main">

  <!-- Start of BreadCrumb -->
  <section class="breadcrumbsection">
    <div class="breadcrumbcontainer">
      <h1 class="commonheading">Clinic Gallery</h1>
      <ul class="breadcrumblist">
        <li class="breadcrumb-item"><a href="{{ url('/') }}" class="breadcrumb-link">Home</a></li>
        <li class="breadcrumb-item">Clinic Gallery</li>
      </ul>
    </div>
  </section>
  <!-- // End of BreadCrumb -->

  <!-- Start of gallerypage -->
  <section class="gallerypage">
    <div class="container">
      <div class="gallerygrid" id="galleryGrid">

        @if(isset($gallery) && count($gallery) > 0)
          @include('website.gallery-card-item')
        @else
          <!-- Fallback items from new design -->
          <div class="serviceitem">
            <div class="serviceimg">
              <img src="{{ asset('new-website/images/gallery/gallery01.webp') }}" class="img-fluid" width="600" height="427" alt="Facade"/>
            </div>
            <div class="details position-relative">
              <div class="sheading">Facade</div>
            </div>
          </div>
          <div class="serviceitem">
            <div class="serviceimg">
              <img src="{{ asset('new-website/images/gallery/gallery02.webp') }}" class="img-fluid" width="600" height="427" alt="Reception"/>
            </div>
            <div class="details position-relative">
              <div class="sheading">Reception</div>
            </div>
          </div>
          <div class="serviceitem">
            <div class="serviceimg">
              <img src="{{ asset('new-website/images/gallery/gallery03.webp') }}" class="img-fluid" width="600" height="427" alt="Consultation Rooms"/>
            </div>
            <div class="details position-relative">
              <div class="sheading">Consultation Rooms</div>
            </div>
          </div>
          <div class="serviceitem">
            <div class="serviceimg">
              <img src="{{ asset('new-website/images/gallery/gallery04.webp') }}" class="img-fluid" width="600" height="427" alt="Clinic Team"/>
            </div>
            <div class="details position-relative">
              <div class="sheading">Clinic Team</div>
            </div>
          </div>
          <div class="serviceitem">
            <div class="serviceimg">
              <img src="{{ asset('new-website/images/gallery/gallery05.webp') }}" class="img-fluid" width="600" height="427" alt="Awards & Achievements"/>
            </div>
            <div class="details position-relative">
              <div class="sheading">Awards & Achievements</div>
            </div>
          </div>
          <div class="serviceitem">
            <div class="serviceimg">
              <img src="{{ asset('new-website/images/gallery/gallery06.webp') }}" class="img-fluid" width="600" height="427" alt="Our Dedicated Team"/>
            </div>
            <div class="details position-relative">
              <div class="sheading">Our Dedicated Team</div>
            </div>
          </div>
        @endif

      </div>

      <!-- Load More Button -->
      @if(isset($gallery) && $gallery->hasMorePages())
        <div class="loadwrapper" id="loadWrapper">
          <button type="button" class="loadmorebutton" id="loadMoreBtn" data-page="2" aria-label="Load More Gallery Images">
            LOAD MORE
          </button>
        </div>
      @endif
    </div>
  </section>
  <!-- End of gallerypage -->

  <!-- Start of Appointment form -->
  @include('website.common-appointment')

</main>

@include('website.footer')

<script src="{{ asset('new-website/js/gallery.js') }}" defer></script>

<script type="text/javascript">
  $(document).ready(function() {
      $('#loadMoreBtn').on('click', function(e) {
          e.preventDefault();
          var $btn = $(this);
          var nextPage = $btn.data('page');

          $btn.prop('disabled', true).text('LOADING...');

          $.ajax({
              url: "{{ url('/clinic-gallery') }}?page=" + nextPage,
              type: 'GET',
              headers: {
                  'X-Requested-With': 'XMLHttpRequest'
              },
              success: function(response) {
                  if (response && response.html) {
                      var $newItems = $(response.html).hide();
                      $('#galleryGrid').append($newItems);
                      $newItems.fadeIn(400);

                      // Re-initialize lightbox so newly loaded items can be opened
                      if (typeof window.initGalleryLightbox === 'function') {
                          window.initGalleryLightbox();
                      }

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
                  console.error('Failed to load gallery items:', error);
                  $btn.prop('disabled', false).text('LOAD MORE');
                  alert('Unable to load more gallery images right now. Please try again.');
              }
          });
      });
  });
</script>