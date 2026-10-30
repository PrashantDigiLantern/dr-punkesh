@php
  if (!isset($testimonial) || count($testimonial) === 0) {
      $select_fields = ['test_id','source','rating','description','short_name','name'];
      $testimonial = \App\Models\TestimonialModel::select($select_fields)
          ->where('status', 'active')
          ->orderBy('test_id', 'desc')
          ->limit(4)
          ->get();
  }
@endphp

<section id="testimonials" class="testimonials-section">
  <!-- Background Watermark Text -->
  <div class="testi-watermark-text">TESTIMONIALS</div>
  <div class="testi-container">

    <!-- Section Header -->
    <div class="testi-header">
      <h2 class="testi-title">
        TRANSFORMATIONS OUR<br>
        <span class="gold-text">PATIENTS LOVE</span>
      </h2>
    </div>

    <!-- Timeline Area -->
    <div class="testi-timeline-wrap">
      <!-- Timeline Grid Rows -->
      <div class="timeline-items-grid">

        @if(isset($testimonial) && count($testimonial) > 0)
          @php $chunks = $testimonial->chunk(2); @endphp
          @foreach($chunks as $groupIndex => $group)
            <div class="timeline-group">
              @if($groupIndex === 0)
                <div class="timeline-segment-line">
                  <span class="line-cap-top"></span>
                  <span class="line-cap-bottom"></span>
                </div>
              @endif

              @foreach($group as $itemIndex => $item)
                @php
                  $isRight = ($itemIndex % 2 === 0);
                  $initials = !empty($item->short_name) ? strtoupper($item->short_name) : strtoupper(substr($item->name ?? 'PK', 0, 2));
                  $ratingCount = (int)($item->rating ?? 5);
                  if ($ratingCount <= 0 || $ratingCount > 5) $ratingCount = 5;
                @endphp
                <div class="testi-timeline-item {{ $isRight ? 'right-item' : 'left-item' }} reveal-on-scroll">
                  <div class="testi-card-wrap">
                    <div class="testi-badge {{ $isRight ? 'badge-left' : 'badge-right' }}">{{ $initials }}</div>
                    <div class="testi-card">
                      <div class="testi-card-top">
                        <div class="testi-stars">{!! str_repeat('&#9733;', $ratingCount) !!}</div>
                        <div class="googlelogo">
                          <img src="{{ asset('new-website/images/googlelogo.webp') }}" loading="lazy" width="75" height="26" alt="Google" />
                        </div>
                      </div>
                      <p class="testi-card-text">
                        {!! strip_tags($item->description) !!}
                      </p>
                      <div class="testidisclaimer">✱ Opinions/Results may vary from person to person.</div>
                      <div class="testi-author-name">{{ strtoupper($item->name) }}</div>

                      @if($loop->last && $loop->parent->last)
                        <a href="{{ url('written-testimonials') }}" class="testi-attached-viewmore" aria-label="view more">
                          <span class="btn-text">VIEW MORE</span>
                        </a>
                      @endif
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          @endforeach
        @else
          <!-- Default Curated Timeline Testimonials -->
          <div class="timeline-group">
            <div class="timeline-segment-line">
              <span class="line-cap-top"></span>
              <span class="line-cap-bottom"></span>
            </div>

            <!-- Row 1: Right Card -->
            <div class="testi-timeline-item right-item reveal-on-scroll">
              <div class="testi-card-wrap">
                <div class="testi-badge badge-left">RK</div>
                <div class="testi-card">
                  <div class="testi-card-top">
                    <div class="testi-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                    <div class="googlelogo">
                      <img src="{{ asset('new-website/images/googlelogo.webp') }}" loading="lazy" width="75" height="26" alt="Google" />
                    </div>
                  </div>
                  <p class="testi-card-text">
                    I am very happy &amp; thankful to Dr. Punkesh for getting my lost confidence back. It has been past
                    10 months for my hair treatment and results are natural. I'm very satisfied with the result and I
                    must say he is very skilled dermatologist in Patna.
                  </p>
                  <div class="testidisclaimer">✱ Opinions/Results may vary from person to person.</div>
                  <div class="testi-author-name">RAJAETI KUMAR</div>
                </div>
              </div>
            </div>

            <!-- Row 2: Left Card -->
            <div class="testi-timeline-item left-item reveal-on-scroll">
              <div class="testi-card-wrap">
                <div class="testi-badge badge-right">PK</div>
                <div class="testi-card">
                  <div class="testi-card-top">
                    <div class="testi-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                    <div class="googlelogo">
                      <img src="{{ asset('new-website/images/googlelogo.webp') }}" loading="lazy" width="75" height="26" alt="Google" />
                    </div>
                  </div>
                  <p class="testi-card-text">
                    I visited many dermatologists for my sister's skin problem, but only Dr. Punkesh sir was able to
                    diagnose it right and treat it. He is very humble and very scientific in approach. Treatment cost is
                    reasonable. Highly recommend.
                  </p>
                  <div class="testidisclaimer">✱ Opinions/Results may vary from person to person.</div>
                  <div class="testi-author-name">PAWAN KUMAR</div>
                </div>
              </div>
            </div>
          </div>

          <div class="timeline-group">
            <!-- Row 3: Right Card -->
            <div class="testi-timeline-item right-item reveal-on-scroll">
              <div class="testi-card-wrap">
                <div class="testi-badge badge-left">A</div>
                <div class="testi-card">
                  <div class="testi-card-top">
                    <div class="testi-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                    <div class="googlelogo">
                      <img src="{{ asset('new-website/images/googlelogo.webp') }}" loading="lazy" width="75" height="26" alt="Google" />
                    </div>
                  </div>
                  <p class="testi-card-text">
                    Hair loss was a major concern for me, and it was becoming worse. Dr. Punkesh was recommended to me by a
                    friend. Here I received the best care. My hair loss stopped after 3-4 months of treatment. Best
                    dermatologist ever.
                  </p>
                  <div class="testidisclaimer">✱ Opinions/Results may vary from person to person.</div>
                  <div class="testi-author-name">ANIL</div>
                </div>
              </div>
            </div>

            <!-- Row 4: Left Card with Attached VIEW MORE -->
            <div class="testi-timeline-item left-item reveal-on-scroll">
              <div class="testi-card-wrap">
                <div class="testi-badge badge-right">PK</div>
                <div class="testi-card">
                  <div class="testi-card-top">
                    <div class="testi-stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                    <div class="googlelogo">
                      <img src="{{ asset('new-website/images/googlelogo.webp') }}" loading="lazy" width="75" height="26" alt="Google" />
                    </div>
                  </div>
                  <p class="testi-card-text">
                    I visited many dermatologists for my sister's skin problem, but only Dr. Punkesh sir was able to
                    diagnose it right and treat it. He is very humble and very scientific in approach. Highly recommend.
                  </p>
                  <div class="testidisclaimer">✱ Opinions/Results may vary from person to person.</div>
                  <div class="testi-author-name">PAWAN KUMAR</div>

                  <a href="{{ url('written-testimonials') }}" class="testi-attached-viewmore" aria-label="view more">
                    <span class="btn-text">VIEW MORE</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
        @endif

      </div>
    </div>

    <!-- Mobile Only View More Button -->
    <div class="testi-mobile-btn-wrap">
      <a href="{{ url('written-testimonials') }}" class="testi-mobile-viewmore" aria-label="view more">VIEW MORE</a>
    </div>

  </div>
</section>
