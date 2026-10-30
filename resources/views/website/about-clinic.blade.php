@include('website/header')

<link href="{{ asset('new-website/css/aboutclinic.css') }}" rel="stylesheet" />

<!-- Start of Clinic Hero Banner -->
<section class="clinic-hero-section">
    <!-- Background Image Wrapper -->
    <div class="clinic-hero-bg-wrap">
        <picture>
            <source media="(max-width: 767.98px)"
                srcset="{{ asset('new-website/images/aboutclinic/mobileaboutclinicbg.webp') }}" width="402"
                height="720">
            <img src="{{ asset('new-website/images/aboutclinic/aboutclinicbg.webp') }}" class="clinic-hero-bg-img"
                width="1920" height="850" loading="eager" decoding="async" fetchpriority="high"
                alt="Advance Skin, Hair and Laser Clinic" />
        </picture>
    </div>

    <!-- Gradient Overlay for enhanced contrast -->
    <div class="clinic-hero-overlay"></div>

    <!-- Hero Content Container -->
    <div class="clinic-hero-container">
        <div class="clinic-hero-content">
            <h1 class="clinic-hero-title">
                <span class="text-white">WELCOME TO</span><br /> <span class="text-white">ADVANCE </span><span
                    class="text-gold">SKIN,</span><br>
                <span class="text-gold">HAIR AND LASER</span><br /> <span class="text-gold">CLINIC</span>
            </h1>
            <p class="clinic-hero-desc">
                Committed to providing evidence-based medico-aesthetic treatments and advanced world-class care for all
                your skin, hair, and laser dermatological needs in Patna.
            </p>
            <div class="clinic-hero-btn-wrap">
                <a href="#appointment-section" class="clinic-hero-btn">REQUEST AN APPOINTMENT</a>
            </div>
        </div>
    </div>
</section>

<!-- Start of Second Section: Personalised Approach & Clinic Carousel -->
<section class="clinic-intro-section">
    <div class="clinic-intro-container">

        <!-- Section Header Title -->
        <div class="clinic-intro-header">
            <h2 class="clinic-intro-title">
                EVERY SKIN &amp; HAIR CONCERN DESERVES<br>
                <span class="gold-text">A PERSONALISED APPROACH</span>
            </h2>
        </div>

        <!-- Description Paragraphs -->
        <div class="clinic-intro-text-wrap">
            <p class="clinic-intro-p">
                Established in 2017 and situated in the heart of Patna's medical community, Dr. Punkesh's Advance Skin
                Hair &amp; Laser Clinic, top skin clinic in Patna, is committed to providing evidence based
                medico-aesthetic treatments and advanced world-class care for all your skin and hair care needs.
            </p>
            <p class="clinic-intro-p">
                Exceptional patient care with due treatment is a way of life for us. Our skin specialist, clinicians and
                support teams are dedicated to the care of each and every patient. They'll be with you every step of the
                way, tailoring your care around you and giving the peace-of-mind that comes with the fact that you're in
                the best hands.
            </p>
            <p class="clinic-intro-p">
                Clinic is led by renowned Dermatologist Dr. Punkesh Kumar (MBBS, MD skin &amp; VD) based in Patna,
                India. He is an experienced skin specialist in clinical and cosmetic dermatology with an enriching
                experience of over 8 years. He is also actively involved in clinical research &amp; academics at various
                hospitals. He has also been associated with various renowned hospitals like Safdarjung Hospital, Delhi;
                PMCH, Patna and many more.
            </p>
        </div>

        <!-- Interactive Carousel (Matching Recognitions Slider from Homepage) -->
        <div class="clinic-slider-wrap">
            <div class="clinic-slider-track-wrap">
                <div id="clinicGalleryTrack" class="clinic-slider-cards-track">

                    <!-- Card 1: Team Celebration & Milestone -->
                    <div class="clinic-slide-card">
                        <div class="clinic-slide-card-inner">
                            <img src="{{ asset('new-website/images/aboutclinic/clinic-slide-01.webp') }}"
                                alt="Dr. Punkesh Kumar and Team Celebration" class="clinic-slide-img" loading="lazy">
                        </div>
                    </div>

                    <!-- Card 2: Clinic Reception & Interior -->
                    <div class="clinic-slide-card">
                        <div class="clinic-slide-card-inner">
                            <img src="{{ asset('new-website/images/aboutclinic/clinic-slide-02.webp') }}"
                                alt="Advance Clinic Interior & Reception" class="clinic-slide-img" loading="lazy">
                        </div>
                    </div>

                    <!-- Card 3: Clinic Staff Team -->
                    <div class="clinic-slide-card">
                        <div class="clinic-slide-card-inner">
                            <img src="{{ asset('new-website/images/gallery/gallery06.webp') }}"
                                alt="Clinic Support & Aesthetic Team" class="clinic-slide-img" loading="lazy">
                        </div>
                    </div>

                    <!-- Card 4: Clinical Specialists -->
                    <div class="clinic-slide-card">
                        <div class="clinic-slide-card-inner">
                            <img src="{{ asset('new-website/images/gallery/gallery05.webp') }}"
                                alt="Medical Specialists with Dr. Punkesh" class="clinic-slide-img" loading="lazy">
                        </div>
                    </div>

                    <!-- Card 5: Consultation & Reception Desk -->
                    <div class="clinic-slide-card">
                        <div class="clinic-slide-card-inner">
                            <img src="{{ asset('new-website/images/gallery/gallery02.webp') }}"
                                alt="Reception Desk and Helios III Laser" class="clinic-slide-img" loading="lazy">
                        </div>
                    </div>

                    <!-- Card 6: Clinic Entrance Facade -->
                    <div class="clinic-slide-card">
                        <div class="clinic-slide-card-inner">
                            <img src="{{ asset('new-website/images/gallery/gallery01.webp') }}"
                                alt="Advance Skin Hair & Laser Clinic Facade" class="clinic-slide-img" loading="lazy">
                        </div>
                    </div>

                </div>
            </div>

            <!-- Horizontal Bar Indicators -->
            <div class="clinic-slider-bars"></div>
        </div>

    </div>
</section>

<!-- Start of Third Section: Expert Care Guided by Experience -->
<section class="doctor-exp-section">
    <div class="doctor-exp-container">
        <div class="doctor-exp-grid">

            <!-- Left Column: Doctor Photo -->
            <div class="doctor-exp-media">
                <div class="doctor-exp-img-frame">
                    <img src="{{ asset('new-website/images/aboutclinic/doctorexperience.webp') }}"
                        alt="Dr. Punkesh Kumar - Dermatologist" class="doctor-exp-img" width="560" height="490"
                        loading="lazy">
                </div>
            </div>

            <!-- Right Column: Content & CTA -->
            <div class="doctor-exp-content">
                <h2 class="doctor-exp-title">
                    EXPERT CARE, GUIDED <span class="gold-text">BY</span><br>
                    <span class="gold-text">EXPERIENCE</span>
                </h2>

                <div class="doctor-exp-text">
                    <p class="doctor-exp-p">
                        Dr. Punkesh Kumar is a dermatologist specialising in clinical and cosmetic dermatology, with
                        experience in addressing a wide range of skin and hair concerns.
                    </p>
                    <p class="doctor-exp-p">
                        With a background in medical education, clinical practice and research, he focuses on
                        understanding each patient's concerns and recommending appropriate treatment options based on
                        their individual needs.
                    </p>
                    <p class="doctor-exp-p">
                        His approach combines dermatological knowledge, modern treatment technologies and a commitment
                        to helping patients make informed decisions about their care.
                    </p>
                </div>

                <div class="doctor-exp-btn-wrap">
                    <a href="#appointment-section" class="doctor-exp-btn">REQUEST AN APPOINTMENT</a>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- // End of Third Section -->

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
                    <img src="{{ asset('new-website/images/AboutBanner/areas01.webp') }}" alt="Clinical Dermatology"
                        class="expertise-img" loading="lazy" width="600" height="400" />
                </div>
                <div class="expertise-content-box">
                    <h3 class="expertise-card-title">GENERAL DERMATOLOGY</h3>
                    <p class="expertise-card-desc">Assessment and management of acne, pigmentation, eczema and other
                        skin concerns.</p>
                    <a href="{{ url('treatments/general-dermatology') }}" class="expertise-arrow-btn"
                        aria-label="Learn more about Clinical Dermatology">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="4" y1="12" x2="20" y2="12"></line>
                            <polyline points="13 5 20 12 13 19"></polyline>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Card 2: Hair & Scalp -->
            <div class="expertise-card">
                <div class="expertise-img-wrap">
                    <img src="{{ asset('new-website/images/AboutBanner/areas02.webp') }}" alt="Hair & Scalp"
                        class="expertise-img" loading="lazy" width="600" height="400" />
                </div>
                <div class="expertise-content-box">
                    <h3 class="expertise-card-title">HAIR &amp; SCALP</h3>
                    <p class="expertise-card-desc">Hair fall, scalp concerns and treatment planning with advanced laser
                        and clinical modalities.</p>
                    <a href="{{ url('treatments/hair-care') }}" class="expertise-arrow-btn"
                        aria-label="Learn more about Hair & Scalp">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="4" y1="12" x2="20" y2="12"></line>
                            <polyline points="13 5 20 12 13 19"></polyline>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Card 3: Laser Treatments -->
            <div class="expertise-card">
                <div class="expertise-img-wrap">
                    <img src="{{ asset('new-website/images/AboutBanner/areas03.webp') }}" alt="Laser Treatments"
                        class="expertise-img" loading="lazy" width="600" height="400" />
                </div>
                <div class="expertise-content-box">
                    <h3 class="expertise-card-title">LASER TREATMENTS</h3>
                    <p class="expertise-card-desc">US-FDA approved laser technology selected for individual skin types
                        and permanent aesthetic results.</p>
                    <a href="{{ url('treatments/unwanted-hair') }}" class="expertise-arrow-btn"
                        aria-label="Learn more about Laser Treatments">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
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

<!-- Start of Fifth Section: Thoughtful Care, Professional Expertise -->
<section class="thoughtful-care-section">
    <div class="thoughtful-care-container">

        <!-- Section Header -->
        <div class="thoughtful-care-header">
            <h2 class="thoughtful-care-title">
                THOUGHTFUL CARE. PROFESSIONAL <span class="gold-text">EXPERTISE.</span><br>
                <span class="gold-text">PERSONAL ATTENTION.</span>
            </h2>
            <p class="thoughtful-care-subtitle">
                Choosing the right clinic is an important step towards addressing your skin and hair concerns. At
                Advance Skin, Hair &amp; Laser Clinic, we aim to make that journey more informed, comfortable and
                personalised.
            </p>
        </div>

        <!-- Cards Slider -->
        <div class="care-features-slider-wrap">
            <div class="care-features-track-wrap">
                <div id="careFeaturesTrack" class="care-features-cards-track">

                    <!-- Card 1: Dermatologist-Led Care -->
                    <div class="care-feature-card">
                        <div class="care-feature-icon-circle">
                            <img src="{{ asset('new-website/images/aboutclinic/expertiseicon01.webp') }}"
                                class="img-fluid" width="48" height="61" alt="DERMATOLOGIST-LED CARE" />
                        </div>
                        <h3 class="care-feature-card-title">DERMATOLOGIST-LED<br /> CARE</h3>
                        <p class="care-feature-card-desc">Get guidance from a qualified dermatologist for your skin and
                            hair concerns.</p>
                    </div>

                    <!-- Card 2: Individualised Treatment Planning -->
                    <div class="care-feature-card">
                        <div class="care-feature-icon-circle">
                            <img src="{{ asset('new-website/images/aboutclinic/expertiseicon02.webp') }}"
                                class="img-fluid" width="48" height="50"
                                alt="INDIVIDUALISED TREATMENT PLANNING" />
                        </div>
                        <h3 class="care-feature-card-title">INDIVIDUALISED<br /> TREATMENT PLANNING</h3>
                        <p class="care-feature-card-desc">Treatment recommendations are based on your condition,
                            concerns and suitability.</p>
                    </div>

                    <!-- Card 3: Modern Treatment Technologies -->
                    <div class="care-feature-card">
                        <div class="care-feature-icon-circle">
                            <img src="{{ asset('new-website/images/aboutclinic/expertiseicon03.webp') }}"
                                class="img-fluid" width="48" height="47"
                                alt="MODERN TREATMENT TECHNOLOGIES" />
                        </div>
                        <h3 class="care-feature-card-title">MODERN TREATMENT<br /> TECHNOLOGIES</h3>
                        <p class="care-feature-card-desc">Access a range of clinical, laser and cosmetic treatment
                            options available at the clinic.</p>
                    </div>

                    <!-- Card 4: Patient Education & Guidance -->
                    <div class="care-feature-card">
                        <div class="care-feature-icon-circle">
                            <img src="{{ asset('new-website/images/aboutclinic/expertiseicon04.webp') }}"
                                class="img-fluid" width="48" height="38"
                                alt="PATIENT EDUCATION &AMP; GUIDANCE" />
                        </div>
                        <h3 class="care-feature-card-title">PATIENT EDUCATION &amp;<br /> GUIDANCE</h3>
                        <p class="care-feature-card-desc">Understand your condition, available options and the care
                            needed before and after treatment.</p>
                    </div>

                    <!-- Card 5: A Comfortable Patient Experience -->
                    <div class="care-feature-card">
                        <div class="care-feature-icon-circle">
                            <img src="{{ asset('new-website/images/aboutclinic/expertiseicon05.webp') }}"
                                class="img-fluid" width="48" height="61"
                                alt="A COMFORTABLE PATIENT EXPERIENCE" />
                        </div>
                        <h3 class="care-feature-card-title">A Commitment to<br /> Patient Care</h3>
                        <p class="care-feature-card-desc">We value listening to your concerns, answering your questions
                            and helping you make informed decisions.</p>
                    </div>

                    <!-- Card 6: Ongoing Clinical Follow-up -->
                    <div class="care-feature-card">
                        <div class="care-feature-icon-circle">
                            <img src="{{ asset('new-website/images/aboutclinic/expertiseicon06.webp') }}"
                                class="img-fluid" width="48" height="50" alt="ONGOING CLINICAL FOLLOW-UP">
                        </div>
                        <h3 class="care-feature-card-title">Patient Experiences</h3>
                        <p class="care-feature-card-desc">Read feedback shared by patients about their experiences at
                            our clinic.</p>
                    </div>

                </div>
            </div>

            <!-- Horizontal Bar Indicators -->
            <div class="care-features-slider-bars"></div>
        </div>

    </div>
</section>
<!-- // End of Fifth Section -->
<!-- Appointment Section -->
@include('website/common-appointment')

@include('website/footer')

<script src="{{ asset('new-website/js/aboutclinic.js') }}" defer></script>
