@include('website.header')

<link href="{{ asset('new-website/css/home.css') }}" rel="stylesheet" />

<!-- Start of Banner -->
<section class="hero-section">
    <picture>
        <source media="(max-width: 768px)" srcset="{{ asset('new-website/images/mobilebannerbgs.webp') }}" width="402"
            height="775" type="image/webp" />
        <img src="{{ asset('new-website/images/bannerbg.webp') }}" class="hero-bg-img" width="1440" height="755"
            loading="eager" decoding="async" fetchpriority="high" alt="Dr. Punkesh Kumar - Skin Specialist in Patna" />
    </picture>

    <div class="hero-overlay"></div>
    <div class="hero-container">

        <!-- Left Content -->
        <div class="hero-content">
            <h1 class="hero-title">
                SCIENCE-LED<br>
                CARE FOR YOUR<br>
                <span class="gold-text">SKIN &amp; HAIR</span>
            </h1>
            <p class="hero-description">
                Evidence-based medico-aesthetic care, international laser protocols, and personalized skin &amp; hair
                treatments delivered by expert dermatologists in Patna.
            </p>
            <div class="hero-buttons">
                <a href="{{ url('treatments') }}" class="btn-primary">EXPLORE SERVICES</a>
                <a href="{{ url('real-results') }}" class="btn-outline">VIEW RESULTS</a>
            </div>
        </div>

        <!-- Right Award Slider Card (Carousel Type) -->
        <div class="hero-slider-wrap">
            <div class="award-card-frame">
                <div class="hero-carousel-wrap">
                    <div class="hero-cards-track" id="heroTrack">
                        <div class="hero-slide">
                            <img src="{{ asset('new-website/images/home/banner01.webp') }}" loading="eager"
                                decoding="async" fetchpriority="high" width="581" height="447"
                                alt="Dr. Punkesh Award Presentation" class="award-image">
                        </div>
                        <div class="hero-slide">
                            <img src="{{ asset('new-website/images/home/banner02.webp') }}" loading="lazy"
                                decoding="async" width="581" height="447" alt="Clinic Consultation"
                                class="award-image" />
                        </div>
                        <div class="hero-slide">
                            <img src="{{ asset('new-website/images/home/banner03.webp') }}" loading="lazy"
                                decoding="async" width="581" height="447" alt="Advanced Laser Technology"
                                class="award-image" />
                        </div>
                        <div class="hero-slide">
                            <img src="{{ asset('new-website/images/home/banner04.webp') }}" loading="lazy"
                                decoding="async" width="581" height="447" alt="Aesthetic Care Recognition"
                                class="award-image" />
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slider Navigation Buttons -->
            <div class="slider-controls">
                <button id="prevSlide" class="slider-btn" aria-label="Previous image">
                    <img src="{{ asset('new-website/images/arrowleft.webp') }}" loading="lazy" width="24"
                        height="11" alt="Arrow Left">
                </button>
                <button id="nextSlide" class="slider-btn" aria-label="Next image">
                    <img src="{{ asset('new-website/images/arrowright.webp') }}" loading="lazy" width="24"
                        height="11" alt="Arrow Right">
                </button>
            </div>
        </div>

    </div>
</section>
<!-- // End of Banner -->

<!-- STATS / KEY FEATURES SECTION -->
<section class="stats-section">
    <div class="stats-container">

        <!-- Section Header -->
        <div class="stats-header">
            <h2 class="stats-subtitle">UNLOCKING THE POTENTIAL OF<br /> <span class="gold-text">ADVANCED AESTHETIC
                    CARE</span></h2>
        </div>

        <!-- 4 Columns Grid -->
        <div class="stats-grid">

            <!-- Card 1: Satisfied Patients -->
            <div class="stat-card">
                <div class="stat-icon">
                    <img src="{{ asset('new-website/images/aaicon01.webp') }}" loading="lazy" width="64"
                        height="64" alt="SATISFIED PATIENTS" />
                </div>
                <div class="statnumber">2,20,000+</div>
                <h3 class="stat-title">SATISFIED PATIENTS</h3>
                <p class="stat-desc">Trusted by 2.2 lakh+ patients for personalised care, advanced treatments, and
                    better results.</p>
            </div>

            <!-- Card 2: Procedures Pan India -->
            <div class="stat-card">
                <div class="stat-icon">
                    <img src="{{ asset('new-website/images/aaicon03.webp') }}" loading="lazy" width="64"
                        height="64" alt="PROCEDURES PAN INDIA" />
                </div>
                <div class="statnumber">70,000+</div>
                <h3 class="stat-title">PROCEDURES PAN INDIA</h3>
                <p class="stat-desc">70,000+ procedures performed across India, helping patients achieve their
                    aesthetic goals with confidence.</p>
            </div>

            <!-- Card 3: Laser Hair Removal -->
            <div class="stat-card">
                <div class="stat-icon">
                    <img src="{{ asset('new-website/images/aaicon02.webp') }}" loading="lazy" width="64"
                        height="64" alt="LASER HAIR REMOVAL TREATMENTS" />
                </div>
                <div class="statnumber">17,000+</div>
                <h3 class="stat-title">LASER HAIR REMOVAL TREATMENTS</h3>
                <p class="stat-desc">Proven laser hair removal focused on comfort, safety, and lasting results.</p>
            </div>

            <!-- Card 4: Google Reviews -->
            <div class="stat-card">
                <div class="stat-icon">
                    <img src="{{ asset('new-website/images/aaicon04.webp') }}" loading="lazy" width="64"
                        height="64" alt="GOOGLE REVIEWS" />
                </div>
                <div class="statnumber">4.7 <span class="star">&#9733;</span></div>
                <h3 class="stat-title">2,160 GOOGLE REVIEWS</h3>
                <p class="stat-desc">Trusted by thousands of patients for personalised care, advanced treatments, and
                    consistently positive experiences.</p>
            </div>

        </div>

    </div>
</section>

<!-- ================= SECTION 3: COMPLETE SOLUTIONS FOR SKIN, HAIR & AESTHETICS ================= -->
<section id="services" class="solutions-section">

    <!-- Header Title -->
    <div class="solutions-header">
        <h2 class="solutions-title">
            COMPLETE SOLUTIONS FOR <span class="gold-text">SKIN</span>,<br>
            <span class="gold-text">HAIR &amp; AESTHETICS</span>
        </h2>
    </div>

    <!-- Floating Interactive Tabs Bar -->
    <div class="solutions-tabs-container">
        <div class="solutions-tabs-bar">
            <!-- Tab 1: Skin -->
            <button class="tab-btn active" data-tab="tab-skin" aria-label="Skin Treatments Tab">
                <div class="tab-btn-inner">
                    <img src="{{ asset('new-website/images/tabicon01.webp') }}" loading="lazy" width="50"
                        height="52" alt="SKIN TREATMENTS" />
                    <span class="tab-label">SKIN <span class="displaynone">TREATMENTS</span></span>
                </div>
                <span class="tab-arrow"></span>
            </button>

            <!-- Tab 2: Hair -->
            <button class="tab-btn" data-tab="tab-hair" aria-label="Hair Treatments Tab">
                <div class="tab-btn-inner">
                    <img src="{{ asset('new-website/images/tabicon02.webp') }}" loading="lazy" width="43"
                        height="53" alt="HAIR TREATMENTS" />
                    <span class="tab-label">HAIR <span class="displaynone">TREATMENTS</span></span>
                </div>
                <span class="tab-arrow"></span>
            </button>

            <!-- Tab 3: Laser & Aesthetics -->
            <button class="tab-btn" data-tab="tab-laser" aria-label="Laser and Aesthetics Tab">
                <div class="tab-btn-inner">
                    <img src="{{ asset('new-website/images/tabicon03.webp') }}" loading="lazy" width="54"
                        height="50" alt="LASER & AESTHETICS" />
                    <span class="tab-label">LASER <span class="displaynone">&amp; AESTHETICS</span></span>
                </div>
                <span class="tab-arrow"></span>
            </button>
        </div>
    </div>

    <!-- Tab Content Wrapper -->
    <div class="solutions-content-wrapper">

        <!-- ================= TAB 1: SKIN TREATMENTS ================= -->
        <div id="tab-skin" class="tab-content active">
            <div class="tab-content-grid">

                <!-- Left Column Image -->
                <div class="tab-image-col">
                    <img src="{{ asset('new-website/images/tab01.webp') }}" loading="lazy" width="720"
                        height="569" alt="Skin Treatments at Dr. Punkesh Clinic" class="tab-main-img">
                </div>

                <!-- Right Column Details -->
                <div class="tab-info-col">
                    <h3 class="tab-content-title">
                        <span class="gold-text">SKIN</span> TREATMENTS
                    </h3>

                    <p class="tab-content-desc">
                        Established in 2017 and situated in the heart of <strong>Patna's medical community</strong>, Dr.
                        Punkesh's
                        <strong>Advance Skin Hair & Laser Clinic</strong> is committed to providing evidence based
                        medico-aesthetic treatments and advanced world-class care for all your skin and hair care needs.
                    </p>

                    <!-- Sub-service Cards Draggable Slider Row -->
                    <div class="sub-cards-slider-wrap">
                        <div class="sub-cards-track">
                            <a href="{{ url('treatments/acne-and-skin-resurfacing') }}"
                                class="sub-service-card active">
                                <span class="sub-accent-line"></span>
                                <span class="sub-service-title">ACNE &amp; ACNE SCARS</span>
                            </a>
                            <a href="{{ url('treatments/pigments-&-spots') }}" class="sub-service-card">
                                <span class="sub-accent-line"></span>
                                <span class="sub-service-title">PIGMENTATION &amp; MELASMA</span>
                            </a>
                            <a href="{{ url('skin-glow-and-brightening') }}" class="sub-service-card">
                                <span class="sub-accent-line"></span>
                                <span class="sub-service-title">SKIN BRIGHTENING</span>
                            </a>
                            <a href="{{ url('facial-rejuvenation') }}" class="sub-service-card">
                                <span class="sub-accent-line"></span>
                                <span class="sub-service-title">SKIN REJUVENATION</span>
                            </a>
                            <a href="{{ url('hydrafacial') }}" class="sub-service-card">
                                <span class="sub-accent-line"></span>
                                <span class="sub-service-title">HYDRA FACIAL &amp; GLOW</span>
                            </a>
                            <a href="{{ url('treatments/ageing-skin') }}" class="sub-service-card">
                                <span class="sub-accent-line"></span>
                                <span class="sub-service-title">ANTI-AGING CARE</span>
                            </a>
                        </div>
                    </div>

                    <!-- CTA Buttons -->
                    <div class="tab-cta-buttons">
                        <button class="btn-primary trigger-appointment" aria-label="Request an Appointment">REQUEST AN
                            APPOINTMENT</button>
                        <a href="{{ url('real-results') }}" class="btn-secondary-outline"
                            aria-label="View Results">VIEW RESULTS</a>
                    </div>
                </div>

            </div>
        </div>

        <!-- ================= TAB 2: HAIR TREATMENTS ================= -->
        <div id="tab-hair" class="tab-content">
            <div class="tab-content-grid">

                <!-- Left Column Image -->
                <div class="tab-image-col">
                    <img src="{{ asset('new-website/images/tab02.webp') }}" loading="lazy" width="720"
                        height="569" alt="Hair Treatments at Dr. Punkesh Clinic" class="tab-main-img">
                </div>

                <!-- Right Column Details -->
                <div class="tab-info-col">
                    <h3 class="tab-content-title">
                        <span class="gold-text">HAIR</span> TREATMENTS
                    </h3>

                    <p class="tab-content-desc">
                        Science-backed hair restoration protocols, advanced growth factor therapies, and autologous PRP
                        treatments
                        designed to combat thinning and stimulate dense, healthy hair growth.
                    </p>

                    <!-- Sub-service Cards Draggable Slider Row -->
                    <div class="sub-cards-slider-wrap">
                        <div class="sub-cards-track">
                            <a href="{{ url('hairfall-treatment') }}" class="sub-service-card active">
                                <span class="sub-accent-line"></span>
                                <span class="sub-service-title">HAIR LOSS &amp; THINNING</span>
                            </a>
                            <a href="{{ url('growth-factor-therapy-for-hair-loss') }}" class="sub-service-card">
                                <span class="sub-accent-line"></span>
                                <span class="sub-service-title">GFC CONCENTRATE</span>
                            </a>
                            <a href="{{ url('mesotherapy') }}" class="sub-service-card">
                                <span class="sub-accent-line"></span>
                                <span class="sub-service-title">MESOTHERAPY</span>
                            </a>
                            <a href="{{ url('dandruff-treatment') }}" class="sub-service-card">
                                <span class="sub-accent-line"></span>
                                <span class="sub-service-title">DANDRUFF CARE</span>
                            </a>
                            <a href="{{ url('lllt') }}" class="sub-service-card">
                                <span class="sub-accent-line"></span>
                                <span class="sub-service-title">LLLT LASER</span>
                            </a>
                            <a href="{{ url('dermapen') }}" class="sub-service-card">
                                <span class="sub-accent-line"></span>
                                <span class="sub-service-title">DERMAPEN SCALP</span>
                            </a>
                        </div>
                    </div>

                    <!-- CTA Buttons -->
                    <div class="tab-cta-buttons">
                        <button class="btn-primary trigger-appointment" aria-label="Request an Appointment">REQUEST AN
                            APPOINTMENT</button>
                        <a href="{{ url('real-results') }}" class="btn-secondary-outline"
                            aria-label="View Results">VIEW RESULTS</a>
                    </div>
                </div>

            </div>
        </div>

        <!-- ================= TAB 3: LASER & AESTHETICS ================= -->
        <div id="tab-laser" class="tab-content">
            <div class="tab-content-grid">

                <!-- Left Column Image -->
                <div class="tab-image-col">
                    <img src="{{ asset('new-website/images/tab03.webp') }}" loading="lazy" width="720"
                        height="569" alt="Laser & Aesthetics at Dr. Punkesh Clinic" class="tab-main-img">
                </div>

                <!-- Right Column Details -->
                <div class="tab-info-col">
                    <h3 class="tab-content-title">
                        <span class="gold-text">LASER &amp;</span> AESTHETICS
                    </h3>

                    <p class="tab-content-desc">
                        US-FDA approved laser technology and aesthetic non-surgical treatments tailored for precision
                        skin
                        tightening, contouring, scar resurfacing, and permanent hair reduction.
                    </p>

                    <!-- Sub-service Cards Draggable Slider Row -->
                    <div class="sub-cards-slider-wrap">
                        <div class="sub-cards-track">
                            <a href="{{ url('triple-wavelength-diode') }}" class="sub-service-card active">
                                <span class="sub-accent-line"></span>
                                <span class="sub-service-title">TRIPLE DIODE LASER</span>
                            </a>
                            <a href="{{ url('vivace-mnrf') }}" class="sub-service-card">
                                <span class="sub-accent-line"></span>
                                <span class="sub-service-title">MNRF VIVACE</span>
                            </a>
                            <a href="{{ url('fractional-co2') }}" class="sub-service-card">
                                <span class="sub-accent-line"></span>
                                <span class="sub-service-title">CO2 FRACTIONAL</span>
                            </a>
                            <a href="{{ url('anti-wrinkle-injection') }}" class="sub-service-card">
                                <span class="sub-accent-line"></span>
                                <span class="sub-service-title">ANTI-WRINKLE INJECTION</span>
                            </a>
                            <a href="{{ url('laser-hair-removal') }}" class="sub-service-card">
                                <span class="sub-accent-line"></span>
                                <span class="sub-service-title">LASER HAIR REDUCTION</span>
                            </a>
                            <a href="{{ url('laser-toning') }}" class="sub-service-card">
                                <span class="sub-accent-line"></span>
                                <span class="sub-service-title">LASER TONING</span>
                            </a>
                        </div>
                    </div>

                    <!-- CTA Buttons -->
                    <div class="tab-cta-buttons">
                        <button class="btn-primary trigger-appointment" aria-label="Request an Appointment">REQUEST AN
                            APPOINTMENT</button>
                        <a href="{{ url('real-results') }}" class="btn-secondary-outline"
                            aria-label="View Results">VIEW RESULTS</a>
                    </div>
                </div>

            </div>
        </div>

    </div>
</section>

<!-- ================= SECTION 4: DR. PUNKESH KUMAR BANNER ================= -->
<section id="about" class="doctor-banner-section">
    <picture>
        <source media="(max-width: 767px)" srcset="{{ asset('new-website/images/mobiledrpunkeshbg.webp') }}"
            width="402" height="775" />
        <img src="{{ asset('new-website/images/drpunkeshbg.webp') }}" class="doctor-bg-img" width="1440"
            height="750" loading="lazy" alt="Dr. Punkesh Kumar - Skin Specialist in Patna" />
    </picture>

    <div class="doctor-banner-container">
        <div class="doctor-banner-content">
            <h2 class="doctor-name-title">DR. PUNKESH KUMAR</h2>
            <h3 class="doctor-subtitle">SKIN SPECIALIST IN PATNA</h3>

            <div class="doctor-divider"></div>

            <ul class="doctor-qualifications-list">
                <li><strong>M.B.B.S, M.D.(Skin &amp; V.D.) P.M.C.H Patna</strong></li>
                <li><strong>M.I.A.D.V.L., M.A.C.S.I., M.I.M.A.,</strong></li>
                <li>International Fellow American Academy of Dermatology (USA)</li>
                <li>Member of European Academy of Dermatology &amp; Venerology</li>
                <li>Ex. Resident Safdarjung Hospital &amp; V.M.M.C (New Delhi)</li>
                <li>Ex. Senior Resident I.G.I.M.S. &amp; P.M.C.H.(Patna)</li>
                <li>Gen. Secretary IADVL Bihar</li>
            </ul>

            <p class="doctor-bio-paragraph">
                Dr. Punkesh Kumar (MBBS, MD skin &amp; VD) is a renowned Skin Specialist in Patna, India. He is an
                experienced
                skin specialist in clinical and cosmetic dermatology with an enriching experience of over 10 years.
            </p>

            <div class="doctor-cta-buttons">
                <button class="btn-primary trigger-appointment" aria-label="Request an Appointment">REQUEST AN
                    APPOINTMENT</button>
                <a href="{{ url('about-doctor') }}" class="btn-dark-outline"
                    aria-label="Know More About Dr. Punkesh">KNOW MORE</a>
            </div>
        </div>
    </div>
</section>

<!-- ================= SECTION: RECOGNITIONS & CERTIFICATIONS ================= -->
<section id="recognitions" class="recognitions-section">
    <div class="recognitions-container">

        <div class="recognitions-header">
            <h2 class="recognitions-title">
                RECOGNITIONS &amp; <span class="gold-text">CERTIFICATIONS</span>
            </h2>
        </div>

        <div class="recognitions-track-wrap">
            <div id="recognitionsTrack" class="recognitions-cards-track">
                <div class="recognition-card">
                    <div class="recognition-card-inner">
                        <img src="{{ asset('new-website/images/certificate01.webp') }}" loading="lazy"
                            alt="CUTICON Bihar Award Presentation" class="recognition-card-img">
                    </div>
                </div>
                <div class="recognition-card">
                    <div class="recognition-card-inner">
                        <img src="{{ asset('new-website/images/certificate02.webp') }}" loading="lazy"
                            alt="Degree Convocation Certificate" class="recognition-card-img">
                    </div>
                </div>
                <div class="recognition-card">
                    <div class="recognition-card-inner">
                        <img src="{{ asset('new-website/images/certificate03.webp') }}" loading="lazy"
                            alt="8th CLINICON 2024 ACDI Certificate" class="recognition-card-img">
                    </div>
                </div>
                <div class="recognition-card">
                    <div class="recognition-card-inner">
                        <img src="{{ asset('new-website/images/certificate04.webp') }}" loading="lazy"
                            alt="National Dermatology Honor" class="recognition-card-img">
                    </div>
                </div>
                <div class="recognition-card">
                    <div class="recognition-card-inner">
                        <img src="{{ asset('new-website/images/certificate05.webp') }}" loading="lazy"
                            alt="Dermatology Achievement Award" class="recognition-card-img">
                    </div>
                </div>
                <div class="recognition-card">
                    <div class="recognition-card-inner">
                        <img src="{{ asset('new-website/images/certificate06.webp') }}" loading="lazy"
                            alt="Clinical Excellence Recognition" class="recognition-card-img">
                    </div>
                </div>
            </div>
        </div>

        <!-- Horizontal Bar Indicators -->
        <div class="recognitions-slider-bars">
            <span class="rec-bar-item active" data-index="0"></span>
            <span class="rec-bar-item" data-index="1"></span>
            <span class="rec-bar-item" data-index="2"></span>
            <span class="rec-bar-item" data-index="3"></span>
        </div>

    </div>
</section>

<!-- ================= SECTION: WHY CHOOSE ADVANCE CLINIC ================= -->
<section id="why-choose" class="why-choose-section">
    <div class="why-choose-container">

        <div class="why-choose-header-grid">
            <div class="why-choose-left-col">
                <h2 class="why-choose-title">
                    WHY CHOOSE ADVANCE<br>
                    <span class="gold-text">SKIN, HAIR &amp; LASER CLINIC</span>
                </h2>

                <div class="why-choose-cta-row">
                    <button class="app-btn-solid trigger-appointment" aria-label="Request an Appointment">REQUEST AN
                        APPOINTMENT</button>
                    <a href="{{ url('about-clinic') }}" class="app-btn-outline" aria-label="View Details">
                        <span>VIEW DETAILS</span>
                        <span class="btn-arrow-icon">
                            <img src="{{ asset('new-website/images/right-arrow.webp') }}" loading="lazy"
                                width="20" height="20" alt="Arrow Right">
                        </span>
                    </a>
                </div>
            </div>

            <div class="why-choose-right-col">
                <p class="why-choose-intro">
                    Established in 2017 and situated in the heart of <strong>Patna's medical community</strong>, Dr.
                    Punkesh's <strong>Advance Skin Hair &amp; Laser Clinic</strong> is committed to providing evidence
                    based
                    medico-aesthetic treatments and advanced world-class care for all your skin and hair care needs.
                </p>

                <ul class="why-choose-features-list">
                    <li>
                        <span class="gold-check-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="#C19C44">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                            </svg>
                        </span>
                        <span class="feature-text">Dermatologist-led diagnosis with customized treatment
                            regimens.</span>
                    </li>
                    <li>
                        <span class="gold-check-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="#C19C44">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                            </svg>
                        </span>
                        <span class="feature-text">US-FDA approved gold standard laser technologies and
                            protocols.</span>
                    </li>
                    <li>
                        <span class="gold-check-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="#C19C44">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                            </svg>
                        </span>
                        <span class="feature-text">High safety standards with sterilized, clinic-grade aesthetic
                            facilities.</span>
                    </li>
                    <li>
                        <span class="gold-check-icon">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="#C19C44">
                                <path
                                    d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z" />
                            </svg>
                        </span>
                        <span class="feature-text">Over 10+ years of enriched clinical and aesthetic experience.</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Bottom Photo Banner & Carousel Slider -->
        <div class="why-choose-banner-wrap">
            <div class="why-choose-carousel-wrap">
                <div id="whyChooseTrack" class="why-choose-cards-track">
                    <div class="why-choose-slide">
                        <img src="{{ asset('new-website/images/whychoose.webp') }}" class="why-choose-photo"
                            loading="lazy" decoding="async" width="1300" height="550"
                            alt="Advanced Laser Treatment">
                    </div>
                    <div class="why-choose-slide">
                        <img src="{{ asset('new-website/images/whychoose.webp') }}" class="why-choose-photo"
                            loading="lazy" decoding="async" width="1300" height="550"
                            alt="Clinical Aesthetics Care">
                    </div>
                    <div class="why-choose-slide">
                        <img src="{{ asset('new-website/images/whychoose.webp') }}" class="why-choose-photo"
                            loading="lazy" decoding="async" width="1300" height="550"
                            alt="Medical Dermatology Standards">
                    </div>
                    <div class="why-choose-slide">
                        <img src="{{ asset('new-website/images/whychoose.webp') }}" class="why-choose-photo"
                            loading="lazy" decoding="async" width="1300" height="550"
                            alt="Patient-Centered Experience">
                    </div>
                </div>
            </div>

            <div class="why-choose-slider-bars">
                <span class="bar-nav-item active" data-index="0"></span>
                <span class="bar-nav-item" data-index="1"></span>
                <span class="bar-nav-item" data-index="2"></span>
                <span class="bar-nav-item" data-index="3"></span>
            </div>
        </div>

    </div>
</section>

<!-- ================= SECTION 6: EXPERIENCE THE POWER OF ADVANCED TECHNOLOGY ================= -->
<section id="technology" class="technology-section">
    <div class="tech-watermark-text" id="techWatermark">HIFU</div>
    <div class="tech-arch-shape"></div>

    <div class="technology-container">
        <div class="tech-left-col">
            <h2 class="tech-main-title">
                EXPERIENCE THE<br>
                POWER OF <span class="gold-text">ADVANCED</span>
                <span class="gold-text">TECHNOLOGY</span>
            </h2>

            <div class="tech-action-row">
                <div class="tech-cta-wrap">
                    <button class="btn-primary trigger-appointment" aria-label="Request an Appointment">REQUEST AN
                        APPOINTMENT</button>
                </div>

                <div class="tech-slider-arrows">
                    <button id="techPrevBtn" class="tech-arrow-btn prev-btn" aria-label="Previous technology">
                        <img src="{{ asset('new-website/images/arrowleft.webp') }}" loading="lazy" width="24"
                            height="11" alt="Arrow Left">
                    </button>
                    <button id="techNextBtn" class="tech-arrow-btn next-btn" aria-label="Next technology">
                        <img src="{{ asset('new-website/images/arrowright.webp') }}" loading="lazy" width="24"
                            height="11" alt="Arrow Right">
                    </button>
                </div>
            </div>
        </div>

        <!-- Center Column: Equipment Machine Image -->
        <div class="tech-center-col">
            <img id="techMachineImg" src="{{ asset('new-website/images/technology.webp') }}" loading="lazy"
                decoding="async" alt="HIFU UltraCel Q+ Advanced Technology Machine" class="tech-machine-img">
        </div>

        <!-- Right Column: Technology Info Card -->
        <div class="tech-right-col">
            <div class="tech-info-card">
                <div class="tech-card-body">
                    <h3 id="techCardTitle" class="tech-card-title">HIFU (ULTRACELQ+)</h3>
                    <p id="techCardDesc" class="tech-card-desc">
                        The UltraCel Q+ is an advanced HIFU (High-Intensity Focused Ultrasound) system that delivers
                        non-surgical
                        skin lifting, tightening, and contouring by stimulating deep collagen production, resulting in
                        natural,
                        long-lasting results.
                    </p>

                    <a href="{{ url('technology') }}" class="tech-procedure-link-wrap">
                        <button class="tech-play-icon-btn" aria-label="View procedure">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M8 5v14l11-7z" />
                            </svg>
                        </button>
                        <span class="tech-procedure-text">View Procedure</span>
                    </a>
                </div>

                <button id="techNextCardBtn" class="tech-card-side-arrow" aria-label="Next procedure">
                    <img src="{{ asset('new-website/images/right.webp') }}" loading="lazy" decoding="async"
                        alt="right">
                </button>
            </div>
        </div>

    </div>
</section>

<!-- Patient Testimonials Component -->
@include('website.common-testimonials')

<!-- ================= SECTION 5: REAL RESULTS ================= -->
<section id="gallery" class="results-section">
    <div class="results-container">

        <div class="results-header">
            <div class="results-title-wrap">
                <h2 class="results-title">
                    REAL RESULTS,<br>
                    REAL TRANSFORMATIONS
                </h2>
            </div>
            <div class="results-btn-wrap">
                <a href="{{ url('real-results') }}" class="btn-results-outline" aria-label="View More Real Results">
                    <span class="btn-text">VIEW MORE</span>
                    <span class="btn-icon"><img src="{{ asset('new-website/images/right-arrow.webp') }}"
                            loading="lazy" width="20" height="20" alt="Arrow Right"></span>
                </a>
            </div>
        </div>

        <!-- Carousel Cards Slider Track -->
        <div class="results-carousel-wrap">
            <div class="results-cards-track" id="resultsTrack">
                @if (isset($real_results) && count($real_results) > 0)
                    @foreach ($real_results as $res)
                        <div class="resultcard">
                            <a href="{{ url('real-results/' . ($res->category_url ?? '')) }}"
                                aria-label="{{ $res->category_name ?? 'Real Results' }}" class="resultcardlink">
                                @php
                                    $resImg = !empty($res->beforeimg)
                                        ? url('/backend/service_result/inner/' . $res->beforeimg)
                                        : (isset($res->image)
                                            ? url('/backend/service_result/image/' . $res->image)
                                            : asset('new-website/images/result01.webp'));
                                @endphp
                                <img src="{{ $resImg }}" class="w-100" loading="lazy" width="500"
                                    height="500"
                                    alt="{{ $res->alt_img ?? ($res->category_name ?? 'Real Result Clinical Transformation') }}"
                                    onerror="this.src='{{ asset('new-website/images/result01.webp') }}'" />
                            </a>
                        </div>
                    @endforeach
                @else
                    <div class="resultcard">
                        <img src="{{ asset('new-website/images/result01.webp') }}" class="w-100" loading="lazy"
                            width="500" height="500" alt="Real Result Treatment" />
                    </div>
                    <div class="resultcard">
                        <img src="{{ asset('new-website/images/result02.webp') }}" class="w-100" loading="lazy"
                            width="500" height="500" alt="Real Result Treatment" />
                    </div>
                    <div class="resultcard">
                        <img src="{{ asset('new-website/images/result01.webp') }}" class="w-100" loading="lazy"
                            width="500" height="500" alt="Real Result Treatment" />
                    </div>
                    <div class="resultcard">
                        <img src="{{ asset('new-website/images/result02.webp') }}" class="w-100" loading="lazy"
                            width="500" height="500" alt="Real Result Treatment" />
                    </div>
                    <div class="resultcard">
                        <img src="{{ asset('new-website/images/result01.webp') }}" class="w-100" loading="lazy"
                            width="500" height="500" alt="Real Result Treatment" />
                    </div>
                @endif
            </div>
        </div>

        <div class="results-mobile-btn-wrap">
            <a href="{{ url('real-results') }}" class="results-mobile-viewmore"
                aria-label="View More Real Results">VIEW MORE</a>
        </div>

        <div class="results-pagination" id="resultsPagination">
            @if (isset($real_results) && count($real_results) > 0)
                @foreach ($real_results as $idx => $rItem)
                    <span class="dot-indicator {{ $idx === 0 ? 'active' : '' }}"
                        data-index="{{ $idx }}"></span>
                @endforeach
            @else
                <span class="dot-indicator active" data-index="0"></span>
                <span class="dot-indicator" data-index="1"></span>
                <span class="dot-indicator" data-index="2"></span>
                <span class="dot-indicator" data-index="3"></span>
                <span class="dot-indicator" data-index="4"></span>
            @endif
        </div>

    </div>
</section>

<!-- Common Appointment Section with Map and Captcha -->
@include('website.common-appointment')

@include('website.footer')

<script src="{{ asset('new-website/js/home.js') }}" defer></script>
