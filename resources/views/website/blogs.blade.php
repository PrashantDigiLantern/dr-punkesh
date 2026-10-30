@include('website.header')

<!-- CSS Stylesheet -->
<link rel="stylesheet" href="{{ asset('new-website/css/blogs.css') }}"/>

<main class="main">

  <!-- Start of BreadCrumb -->
  <section class="breadcrumbsection">
    <div class="breadcrumbcontainer">
      <h1 class="commonheading">Blogs</h1>
      <ul class="breadcrumblist">
        <li class="breadcrumb-item">
          <a href="{{ url('/') }}" class="breadcrumb-link">Home</a>
        </li>
        <li class="breadcrumb-item">Blogs</li>
      </ul>
    </div>
  </section>
  <!-- // End of BreadCrumb -->

  <!-- Start of blogspage -->
  <section class="blogpage">
    <div class="container">
      <div class="bloggrid" id="blogGrid">
        @if(isset($blog) && count($blog) > 0)
          @include('website.blog-card-item')
        @else
          <div class="no-blogs-found">
            <p>No blog posts found at this time.</p>
          </div>
        @endif
      </div>

      <!-- Load More Button -->
      @if(isset($blog) && $blog->hasMorePages())
        <div class="loadwrapper" id="loadWrapper">
          <button type="button" class="loadmorebutton" id="loadMoreBtn" data-page="2" aria-label="Load More Blogs">
            LOAD MORE
          </button>
        </div>
      @endif
    </div>
  </section>
  <!-- End of blogspage -->

  <!-- Start of Appointment form -->
  @include('website.common-appointment')
  <!-- // End of Appointment form -->

</main>

@include('website.footer')

<script type="text/javascript">
  $(document).ready(function() {
      $('#loadMoreBtn').on('click', function(e) {
          e.preventDefault();
          var $btn = $(this);
          var nextPage = $btn.data('page');

          $btn.prop('disabled', true).text('LOADING...');

          $.ajax({
              url: "{{ url('/blogs') }}?page=" + nextPage,
              type: 'GET',
              headers: {
                  'X-Requested-With': 'XMLHttpRequest'
              },
              success: function(response) {
                  if (response && response.html) {
                      var $newItems = $(response.html).hide();
                      $('#blogGrid').append($newItems);
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
                  console.error('Failed to load blogs:', error);
                  $btn.prop('disabled', false).text('LOAD MORE');
                  alert('Unable to load more blogs right now. Please try again.');
              }
          });
      });
  });
</script>