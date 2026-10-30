@include('website/header')

<link href="{{ asset('new-website/css/aboutdoctor.css') }}" rel="stylesheet"/>

<!-- Start of About Doctor Banner -->
<section class="aboutbannersection">
  <div class="aboutbanner-bg-wrap">
    <picture>
      <source media="(max-width: 767.98px)" srcset="{{ asset('new-website/images/AboutBanner/mobileaboutbanner.webp') }}" width="402" height="720">
      <img src="{{ asset('new-website/images/AboutBanner/aboutbanner.webp') }}" class="aboutbanner-bg-img" width="1440" height="700" loading="eager" decoding="async" fetchpriority="high" alt="Dr. Punkesh Kumar - Advance Skin Hair & Laser Clinic"/>
    </picture>
  </div>
  <div class="aboutbanner-overlay"></div>
  <div class="aboutbanner-container">
    <div class="aboutbanner-content">
      <h1 class="aboutbanner-title">
        <span class="title-white">DR.</span> <span class="title-gold">PUNKESH</span>
        <span class="title-gold title-block">KUMAR</span>
      </h1>
      <ul class="aboutbanner-qualifications">
        <li>M.B.B.S, M.D.(Skin &amp; V.D.) P.M.C.H Patna</li>
        <li>M.I.A.D.V.L., M.A.C.S.I., M.I.M.A.,</li>
        <li>International Fellow American Academy of Dermatology (USA)</li>
        <li>Member of European Academy of Dermatology &amp; Venerology</li>
        <li>Ex. Resident Safdarjung Hospital &amp; V.M.M.C (New Delhi)</li>
        <li>Ex. Senior Resident I.G.I.M.S. &amp; P.M.C.H.(Patna)</li>
      </ul>
    </div>
  </div>
</section>
<!-- // End of About Doctor Banner -->

<!-- Start of Doctor Stats Section -->
<section class="about-stats-section">
  <div class="about-stats-container">
    <div class="about-stats-grid">

      <!-- Card 1 -->
      <div class="about-stat-card">
        <div class="about-stat-number">10+ YEARS</div>
        <h3 class="about-stat-title">CLINICAL EXPERIENCE</h3>
        <p class="about-stat-desc">Dedicated dermatological practice addressing acute & chronic skin, scalp, and nail conditions.</p>
      </div>

      <!-- Card 2 -->
      <div class="about-stat-card">
        <div class="about-stat-number">70,000+</div>
        <h3 class="about-stat-title">PATIENTS TREATED</h3>
        <p class="about-stat-desc">Trusted by thousands of happy patients across Bihar and neighbouring states for visible clinical results.</p>
      </div>

      <!-- Card 3 -->
      <div class="about-stat-card">
        <div class="about-stat-number">MBBS + MD</div>
        <h3 class="about-stat-title">MEDICAL QUALIFICATIONS</h3>
        <p class="about-stat-desc">Specialised in Dermatology, Venereology & Leprosy from premier medical institutions.</p>
      </div>

      <!-- Card 4 -->
      <div class="about-stat-card">
        <div class="about-stat-number">SINCE 2017</div>
        <h3 class="about-stat-title">CLINIC ESTABLISHED</h3>
        <p class="about-stat-desc">Leading center of excellence in Patna for advanced lasers and clinical aesthetics.</p>
      </div>
    </div>
  </div>
</section>
<!-- // End of Doctor Stats Section -->

<!-- Start of Meet Your Dermatologist Section -->
<section class="meet-doctor-section">
  <div class="meet-doctor-container">
    <div class="meet-doctor-grid">

      <!-- Left Column: Doctor with Soprano Machine Arch Frame -->
      <div class="meet-doctor-visual">
        <div class="meet-doctor-arch-frame">
          <img src="{{ asset('new-website/images/AboutBanner/supranotechnology.webp') }}" alt="Dr. Punkesh Kumar with Soprano Titanium Laser" class="meet-doctor-img" loading="lazy" decoding="async" width="1160" height="1280"/>
        </div>
      </div>

      <!-- Right Column: Doctor Introduction & Credentials -->
      <div class="meet-doctor-content">
        <h2 class="meet-doctor-title">
          MEET YOUR DERMATOLOGIST<br>
          IN <span class="gold-text">PATNA</span>
        </h2>

        <p class="meet-doctor-desc">
          <strong>Dr. Punkesh Kumar (MBBS, MD skin &amp; VD)</strong> is a renowned <strong>Dermatologist in Patna, India.</strong> He is an experienced skin specialist in clinical and cosmetic dermatology with an enriching experience of over 10 years. He is also actively involved in clinical research &amp; academics at various hospitals. He has also been associated with various renowned hospitals like <strong>Safdarjung Hospital, Delhi; PMCH, Patna and many more.</strong>
        </p>

        <p class="meet-doctor-desc">
          His passion and dedication for studying and analysing ongoing research &amp; best practices has enhanced his reputation and his work as a brilliantly skilled dermatologist.
        </p>

        <div class="meet-doctor-badges">
          <div class="badge-item">
            <img src="{{ asset('new-website/images/AboutBanner/certificate01.webp') }}" class="badge-img" loading="lazy" decoding="async" width="123" height="70" alt="EADV Member"/>
          </div>
          <div class="badge-item">
            <img src="{{ asset('new-website/images/AboutBanner/certificate02.webp') }}" class="badge-img" loading="lazy" decoding="async" width="74" height="70" alt="IADVL Member"/>
          </div>
          <div class="badge-item">
            <img src="{{ asset('new-website/images/AboutBanner/certificate03.webp') }}" class="badge-img" loading="lazy" decoding="async" width="151" height="70" alt="American Academy of Dermatology Association"/>
          </div>
        </div>

        <div class="meet-doctor-action">
          <a href="{{ url('schedule-a-consultation') }}" class="btn-appointment">REQUEST AN APPOINTMENT</a>
        </div>
      </div>

    </div>
  </div>
</section>
<!-- // End of Meet Your Dermatologist Section -->

<!-- Start of Areas of Expertise Section -->
<section class="areas-expertise-section">
  <div class="areas-expertise-container">

    <div class="areas-expertise-header">
      <h2 class="areas-expertise-title">AREAS OF <span class="gold-text">EXPERTISE</span></h2>
    </div>

    <div class="areas-expertise-grid">

      <!-- Card 1: Clinical Dermatology -->
      <div class="expertise-card">
        <div class="expertise-img-wrap">
          <img src="{{ asset('new-website/images/AboutBanner/areas01.webp') }}" alt="Clinical Dermatology" class="expertise-img" loading="lazy" width="600" height="400"/>
        </div>
        <div class="expertise-content-box">
          <h3 class="expertise-card-title">CLINICAL DERMATOLOGY</h3>
          <p class="expertise-card-desc">Assessment and management of acne, pigmentation, eczema and other skin concerns.</p>
          <a href="{{ url('treatments/general-dermatology') }}" class="expertise-arrow-btn" aria-label="Learn more about Clinical Dermatology">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
              <line x1="4" y1="12" x2="20" y2="12"></line>
              <polyline points="13 5 20 12 13 19"></polyline>
            </svg>
          </a>
        </div>
      </div>

      <!-- Card 2: Hair & Scalp -->
      <div class="expertise-card">
        <div class="expertise-img-wrap">
          <img src="{{ asset('new-website/images/AboutBanner/areas02.webp') }}" alt="Hair & Scalp" class="expertise-img" loading="lazy" width="600" height="400"/>
        </div>
        <div class="expertise-content-box">
          <h3 class="expertise-card-title">HAIR &amp; SCALP</h3>
          <p class="expertise-card-desc">Hair fall, scalp concerns and treatment planning with advanced restorative therapies.</p>
          <a href="{{ url('treatments/hair-care') }}" class="expertise-arrow-btn" aria-label="Learn more about Hair & Scalp">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
              <line x1="4" y1="12" x2="20" y2="12"></line>
              <polyline points="13 5 20 12 13 19"></polyline>
            </svg>
          </a>
        </div>
      </div>

      <!-- Card 3: Laser Treatments -->
      <div class="expertise-card">
        <div class="expertise-img-wrap">
          <img src="{{ asset('new-website/images/AboutBanner/areas03.webp') }}" alt="Laser Treatments" class="expertise-img" loading="lazy" width="600" height="400"/>
        </div>
        <div class="expertise-content-box">
          <h3 class="expertise-card-title">LASER TREATMENTS</h3>
          <p class="expertise-card-desc">Technology-led treatments selected for individual skin types and permanent results.</p>
          <a href="{{ url('treatments/unwanted-hair') }}" class="expertise-arrow-btn" aria-label="Learn more about Laser Treatments">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
              <line x1="4" y1="12" x2="20" y2="12"></line>
              <polyline points="13 5 20 12 13 19"></polyline>
            </svg>
          </a>
        </div>
      </div>

    </div>
  </div>
</section>
<!-- // End of Areas of Expertise Section -->

<!-- Start of A Journey Built on Expertise Section -->
<section class="journey-section">
  <div class="journey-container">

    <div class="journey-header">
      <h2 class="journey-title"><span class="gold-text">A JOURNEY</span> BUILT ON EXPERTISE</h2>
    </div>

    <div class="journey-grid">

      <!-- Left Column: 3 Milestone Cards -->
      <div class="journey-timeline">

        <!-- Card 1: 2007 Medical Foundation -->
        <div class="journey-card">
          <div class="journey-icon-wrap">
            <img src="{{ asset('new-website/images/AboutBanner/journey01.webp') }}" alt="Medical Foundation" class="journey-icon" width="34" height="34" loading="lazy">
          </div>
          <div class="journey-card-content">
            <span class="journey-card-year">2007</span>
            <h3 class="journey-card-title">MEDICAL FOUNDATION</h3>
            <p class="journey-card-desc">MBBS &mdash; Bihar University</p>
          </div>
        </div>

        <!-- Card 2: 2013 Specialist Training -->
        <div class="journey-card">
          <div class="journey-icon-wrap">
            <img src="{{ asset('new-website/images/AboutBanner/journey02.webp') }}" alt="Specialist Training" class="journey-icon" width="34" height="34" loading="lazy"/>
          </div>
          <div class="journey-card-content">
            <span class="journey-card-year">2013</span>
            <h3 class="journey-card-title">SPECIALIST TRAINING</h3>
            <p class="journey-card-desc">MD, Dermatology, Venereology &amp; Leprosy &mdash; Patna Medical College</p>
          </div>
        </div>

        <!-- Card 3: Professional Experience -->
        <div class="journey-card">
          <div class="journey-icon-wrap">
            <img src="{{ asset('new-website/images/AboutBanner/journey03.webp') }}" alt="Clinical Practice & Academics" class="journey-icon" width="34" height="34" loading="lazy"/>
          </div>
          <div class="journey-card-content">
            <span class="journey-card-year">PROFESSIONAL EXPERIENCE</span>
            <h3 class="journey-card-title">CLINICAL PRACTICE &amp; ACADEMICS</h3>
            <p class="journey-card-desc">Safdarjung Hospital, PMCH, IGIMS, GIMS, and General Secretary of IADVL Bihar.</p>
          </div>
        </div>

      </div>

      <!-- Right Column: Presentation Photo -->
      <div class="journey-visual">
        <div class="journey-img-frame">
          <img src="{{ asset('new-website/images/AboutBanner/journey.webp') }}" alt="Dr. Punkesh Kumar speaking at 35th CUTICON Bihar" class="journey-img" width="1240" height="1140" loading="lazy"/>
        </div>
      </div>

    </div>
  </div>
</section>
<!-- // End of A Journey Built on Expertise Section -->

<!-- Start of Thoughtful Care Section -->
<section class="care-steps-section">
  <div class="care-steps-container">

    <div class="care-steps-header">
      <h2 class="care-steps-title"><span class="gold-text">THOUGHTFUL CARE,</span> EVERY STEP</h2>
      <p class="care-steps-subtitle">From understanding your concerns to planning appropriate care.</p>
    </div>

    <div class="care-steps-grid">

      <!-- Step 01 -->
      <div class="care-step-card">
        <div class="care-step-number">01</div>
        <h3 class="care-step-title">LISTEN &amp; UNDERSTAND</h3>
        <p class="care-step-desc">Understand your concerns, medical history and goals thoroughly.</p>
      </div>

      <!-- Step 02 -->
      <div class="care-step-card">
        <div class="care-step-number">02</div>
        <h3 class="care-step-title">ASSESS &amp; DIAGNOSE</h3>
        <p class="care-step-desc">Evaluate your condition and identify relevant contributing factors.</p>
      </div>

      <!-- Step 03 -->
      <div class="care-step-card">
        <div class="care-step-number">03</div>
        <h3 class="care-step-title">PERSONALISE YOUR PLAN</h3>
        <p class="care-step-desc">Discuss suitable options, expected outcomes, timeline and aftercare.</p>
      </div>

      <!-- Step 04 -->
      <div class="care-step-card">
        <div class="care-step-number">04</div>
        <h3 class="care-step-title">REVIEW &amp; FOLLOW UP</h3>
        <p class="care-step-desc">Monitor progress and adjust care when clinically appropriate.</p>
      </div>

    </div>

  </div>
</section>
<!-- // End of Thoughtful Care Section -->

<!-- Start of Science-Led Care Section -->
<section class="science-care-section">
  <div class="science-care-grid">

    <!-- Left Column: Visual Image -->
    <div class="science-care-visual">
      <img src="{{ asset('new-website/images/AboutBanner/almascience.webp') }}" class="science-care-img" loading="lazy" decoding="async" width="655" height="750" alt="Science-Led Care Tailored To You - Dr. Punkesh"/>
    </div>

    <!-- Right Column: Content -->
    <div class="science-care-content">
      <div class="science-care-inner">
        <h2 class="science-care-title">SCIENCE-LED CARE,<br/> TAILORED TO YOU</h2>
        <p class="science-care-desc">Dedicated to combining medical precision with advanced cosmetic technology for the safest, longest-lasting dermatological outcomes.</p>

        <div class="science-principles-grid">

          <!-- Principle 01 -->
          <div class="science-principle-item">
            <span class="science-marker" aria-hidden="true"></span>
            <div class="science-principle-text">
              <h3 class="science-principle-title">EVIDENCE-BASED<br>DECISIONS</h3>
              <p class="science-principle-desc">Treatments guided by clinical assessment and appropriate medical evidence.</p>
            </div>
          </div>

          <!-- Principle 02 -->
          <div class="science-principle-item">
            <span class="science-marker" aria-hidden="true"></span>
            <div class="science-principle-text">
              <h3 class="science-principle-title">INDIVIDUALISED<br>PLANS</h3>
              <p class="science-principle-desc">Care tailored to each patient's skin profile, needs and lifestyle preferences.</p>
            </div>
          </div>

          <!-- Principle 03 -->
          <div class="science-principle-item">
            <span class="science-marker" aria-hidden="true"></span>
            <div class="science-principle-text">
              <h3 class="science-principle-title">PATIENT-FIRST<br>CARE</h3>
              <p class="science-principle-desc">Clear communication about options, realistic expectations, and aftercare routines.</p>
            </div>
          </div>

          <!-- Principle 04 -->
          <div class="science-principle-item">
            <span class="science-marker" aria-hidden="true"></span>
            <div class="science-principle-text">
              <h3 class="science-principle-title">PROGRESS<br>MONITORING</h3>
              <p class="science-principle-desc">Periodic evaluations to monitor dermal response and maintain optimal skin health.</p>
            </div>
          </div>

        </div>
      </div>
    </div>

  </div>
</section>
<!-- // End of Science-Led Care Section -->

<!-- Patient Testimonials -->
@include('website/common-testimonials')

<!-- Appointment form -->
@include('website/common-appointment')

@include('website/footer')

<script src="{{ asset('new-website/js/aboutdoctor.js') }}" defer></script>