<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @php
        // Determine if this is an error / 404 response
        $isHttp404 = http_response_code() === 404 || (isset($is404) && $is404 === true);

        // Dynamic Title
        if ($isHttp404) {
            $metaTitle = "Page Not Found (404) | Dr. Punkesh's Advance Skin Hair & Laser Clinic";
        } elseif (!empty($seotitle->title_tag)) {
            $metaTitle = trim($seotitle->title_tag);
        } elseif (isset($bloglist->title_tag) && !empty($bloglist->title_tag)) {
            $metaTitle = trim($bloglist->title_tag);
        } elseif (isset($bloglist->blog_name)) {
            $metaTitle = trim($bloglist->blog_name) . " | Dr. Punkesh's Advance Skin Hair & Laser Clinic";
        } elseif (isset($servicedetail->title_tag) && !empty($servicedetail->title_tag)) {
            $metaTitle = trim($servicedetail->title_tag);
        } elseif (isset($servicedetail->service_name)) {
            $metaTitle =
                trim($servicedetail->service_name) . " in Patna | Dr. Punkesh's Advance Skin Hair & Laser Clinic";
        } elseif (isset($techlist->title_tag) && !empty($techlist->title_tag)) {
            $metaTitle = trim($techlist->title_tag);
        } elseif (isset($techlist->name)) {
            $metaTitle = trim($techlist->name) . " | Advanced Technology | Dr. Punkesh's Clinic";
        } else {
            $metaTitle = "Dr. Punkesh's Advance Dermato & Laser Care | Leading Skin & Hair Clinic in Patna";
        }

        // Dynamic Description (cleanly decoded of entities and stripped of HTML)
        if ($isHttp404) {
            $metaDescription =
                "The page you requested could not be found. Explore our advanced skin, hair, and laser treatments or contact Dr. Punkesh's Clinic in Patna.";
        } elseif (!empty($seotitle->description_tag)) {
            $metaDescription = html_entity_decode(strip_tags($seotitle->description_tag), ENT_QUOTES, 'UTF-8');
        } elseif (isset($bloglist->description_tag) && !empty($bloglist->description_tag)) {
            $metaDescription = html_entity_decode(strip_tags($bloglist->description_tag), ENT_QUOTES, 'UTF-8');
        } elseif (isset($bloglist->short_desc) || isset($bloglist->blog_description)) {
            $metaDescription = \Illuminate\Support\Str::limit(
                html_entity_decode(
                    strip_tags($bloglist->short_desc ?? $bloglist->blog_description),
                    ENT_QUOTES,
                    'UTF-8',
                ),
                155,
            );
        } elseif (isset($servicedetail->description_tag) && !empty($servicedetail->description_tag)) {
            $metaDescription = html_entity_decode(strip_tags($servicedetail->description_tag), ENT_QUOTES, 'UTF-8');
        } elseif (isset($servicedetail->short_desc) || isset($servicedetail->description)) {
            $metaDescription = \Illuminate\Support\Str::limit(
                html_entity_decode(
                    strip_tags($servicedetail->short_desc ?? $servicedetail->description),
                    ENT_QUOTES,
                    'UTF-8',
                ),
                155,
            );
        } elseif (isset($techlist->short_desc) || isset($techlist->description)) {
            $metaDescription = \Illuminate\Support\Str::limit(
                html_entity_decode(strip_tags($techlist->short_desc ?? $techlist->description), ENT_QUOTES, 'UTF-8'),
                155,
            );
        } else {
            $metaDescription =
                'Science-led care for your skin & hair by Dr. Punkesh Kumar. Advanced laser hair removal, acne scar treatments, PRP hair restoration, and aesthetic skin procedures in Patna.';
        }

        // Keywords
        $metaKeywords = $seotitle->keyword_tag ?? ($servicedetail->keyword_tag ?? ($bloglist->keyword_tag ?? ''));

        // Open Graph Image & Type
        $ogType = isset($bloglist) ? 'article' : $seotitle->type ?? 'website';

        if (!empty($seotitle->image)) {
            $ogImage = url('/backend/seo/' . $seotitle->image);
        } elseif (isset($bloglist->blog_image) && !empty($bloglist->blog_image)) {
            $ogImage = url('/backend/blog/' . $bloglist->blog_image);
        } elseif (isset($servicedetail->service_image) && !empty($servicedetail->service_image)) {
            $ogImage = url('/backend/service/image/' . $servicedetail->service_image);
        } elseif (isset($techlist->image) && !empty($techlist->image)) {
            $ogImage = url('/backend/service_video/technology/' . $techlist->image);
        } else {
            $ogImage = asset('new-website/images/banner01.webp');
        }

        // Clean Canonical URL (strips tracking query strings and ensures absolute URL)
        $rawCanonical =
            $seotitle->canonical_tag ?? ($servicedetail->canonical_tag ?? ($bloglist->canonical ?? url()->current()));
        if (
            !empty($rawCanonical) &&
            !str_starts_with($rawCanonical, 'http://') &&
            !str_starts_with($rawCanonical, 'https://')
        ) {
            $rawCanonical = url($rawCanonical);
        }
        $canonicalClean = strtok($rawCanonical, '?');

        // Meta Robots directive
        $robotsDirective = $isHttp404 ? 'noindex, nofollow' : 'INDEX,FOLLOW';
    @endphp

    <title>{{ $metaTitle }}</title>
    <meta name="description" content="{{ $metaDescription }}">
    @if (!empty($metaKeywords))
        <meta name="keywords" content="{{ $metaKeywords }}">
    @endif

    <!-- Open Graph / Facebook -->
    <meta property="og:title" content="{{ $metaTitle }}" />
    <meta property="og:type" content="{{ $ogType }}" />
    <meta property="og:image" content="{{ $ogImage }}" />
    <meta property="og:description" content="{{ $metaDescription }}" />
    <meta property="og:site_name" content="Dr. Punkesh's Advance Skin Hair & Laser Clinic" />
    <meta property="og:url" content="{{ $canonicalClean }}" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $metaTitle }}">
    <meta name="twitter:description" content="{{ $metaDescription }}">
    <meta name="twitter:image" content="{{ $ogImage }}">

    <!-- Robots Directive -->
    <meta name="robots" content="{{ $robotsDirective }}">

    @if (!$isHttp404)
        <!-- Normalized Canonical URL -->
        <link rel="canonical" href="{{ $canonicalClean }}" />
    @endif

    <!-- Favicon and App Icons -->
    <link rel="icon" type="image/x-icon" href="{{ asset('new-website/images/favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('new-website/images/apple-touch-icon.webp') }}">

    <!-- Resource Preconnects for Third-Party & Performance -->
    <link rel="preconnect" href="https://code.jquery.com">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="dns-prefetch" href="https://www.googletagmanager.com">

    <!-- Critical Fonts Preload -->
    <link rel="preload" href="{{ asset('new-website/fonts/Inter-Regular.woff2') }}" as="font" type="font/woff2"
        crossorigin />
    <link rel="preload" href="{{ asset('new-website/fonts/PlayfairDisplay-Bold.woff2') }}" as="font"
        type="font/woff2" crossorigin />

    <!-- Core Design Stylesheet -->
    <link rel="stylesheet" href="{{ asset('new-website/css/style.css') }}" />

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-N53JXXK');
    </script>

    <!-- Structured Data: MedicalClinic Schema -->
    <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "MedicalClinic",
      "name": "Advance Skin Hair and Laser Clinic",
      "image": "{{ asset('new-website/images/logo.webp') }}",
      "url": "https://www.advanceskinhairclinic.com/",
      "telephone": "+91-7061400830, +91-7667445571",
      "priceRange": "$$",
      "medicalSpecialty": "Dermatology",
      "address": {
        "@@type": "PostalAddress",
        "streetAddress": "Arya Kumar Road, Near Dinkar Golambar, Rajendra Nagar",
        "addressLocality": "Patna",
        "addressRegion": "Bihar",
        "postalCode": "800016",
        "addressCountry": "IN"
      },
      "openingHoursSpecification": {
        "@@type": "OpeningHoursSpecification",
        "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
        "opens": "10:00",
        "closes": "19:00"
      }
    }
  </script>

    @if (isset($bloglist))
        <!-- Structured Data: BlogPosting Schema -->
        <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "BlogPosting",
      "headline": "{{ addslashes($bloglist->blog_name ?? $metaTitle) }}",
      "image": "{{ $ogImage }}",
      "datePublished": "{{ date('c', strtotime($bloglist->date ?? 'now')) }}",
      "dateModified": "{{ date('c', strtotime($bloglist->updated_at ?? ($bloglist->date ?? 'now'))) }}",
      "author": {
        "@@type": "Person",
        "name": "Dr. Punkesh Kumar",
        "jobTitle": "Dermatologist & Hair Transplant Surgeon"
      },
      "publisher": {
        "@@type": "MedicalClinic",
        "name": "Advance Skin Hair and Laser Clinic",
        "logo": {
          "@@type": "ImageObject",
          "url": "{{ asset('new-website/images/logo.webp') }}"
        }
      },
      "description": "{{ addslashes($metaDescription) }}",
      "mainEntityOfPage": {
        "@@type": "WebPage",
        "@@id": "{{ $canonicalClean }}"
      }
    }
  </script>
    @endif

    @if (!request()->is('/') && !$isHttp404)
        <!-- Structured Data: BreadcrumbList Schema -->
        <script type="application/ld+json">
    {
      "@@context": "https://schema.org",
      "@@type": "BreadcrumbList",
      "itemListElement": [
        {
          "@@type": "ListItem",
          "position": 1,
          "name": "Home",
          "item": "{{ url('/') }}"
        }
        @if(isset($bloglist))
        ,{
          "@@type": "ListItem",
          "position": 2,
          "name": "Blogs",
          "item": "{{ url('/blogs') }}"
        },
        {
          "@@type": "ListItem",
          "position": 3,
          "name": "{{ addslashes($bloglist->blog_name ?? $metaTitle) }}",
          "item": "{{ $canonicalClean }}"
        }
        @elseif(isset($techlist))
        ,{
          "@@type": "ListItem",
          "position": 2,
          "name": "Technology",
          "item": "{{ url('/technology') }}"
        },
        {
          "@@type": "ListItem",
          "position": 3,
          "name": "{{ addslashes($techlist->name ?? $metaTitle) }}",
          "item": "{{ $canonicalClean }}"
        }
        @else
        ,{
          "@@type": "ListItem",
          "position": 2,
          "name": "{{ addslashes($metaTitle) }}",
          "item": "{{ $canonicalClean }}"
        }
        @endif
      ]
    }
  </script>
    @endif
</head>

@php
    $isHomePage = request()->is('/');
    $transparentPages = ['/', 'about-clinic', 'about-doctor'];
    $currentPath = request()->path();
    $hasTransparentHeader =
        $isHomePage ||
        in_array($currentPath, $transparentPages) ||
        (isset($transparentHeader) && $transparentHeader === true);
@endphp

<body
    class="{{ $isHomePage ? 'home-page' : 'inner-page' }}{{ $hasTransparentHeader ? ' transparent-header-page' : ' solid-header-page' }}">

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N53JXXK" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>

    <!-- Mobile Sidebar Backdrop Overlay -->
    <div class="mobile-sidebar-backdrop" id="sidebarBackdrop"></div>

    <!-- ================= HEADER / NAVBAR ================= -->
    <header class="site-header {{ $hasTransparentHeader ? 'header-transparent' : 'header-solid' }}">
        <div class="header-container">

            <!-- Logo -->
            <a href="{{ url('/') }}" class="brand-logo">
                <div class="logo-icon-wrap">
                    <img src="{{ asset('new-website/images/logo.webp') }}" loading="eager" width="109"
                        height="70" alt="Dr. Punkesh's" />
                </div>
            </a>

            <!-- Navigation Links -->
            <nav class="main-nav">

                <!-- Mobile Sidebar Header -->
                <div class="sidebar-header">
                    <a href="{{ url('/') }}" class="sidebar-logo">
                        <img src="{{ asset('new-website/images/logo.webp') }}" loading="eager" width="100"
                            height="64" alt="Dr. Punkesh's" />
                    </a>
                    <button class="sidebar-close-btn" id="sidebarCloseBtn" aria-label="Close menu">&times;</button>
                </div>

                <!-- ABOUT Dropdown -->
                <div class="nav-dropdown">
                    <a href="javascript:void(0)" class="nav-link dropdown-toggle"
                        onclick="if(window.toggleSidebarAccordion){return window.toggleSidebarAccordion(event, this);}">
                        ABOUT <span class="dropdown-arrow">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M6 9l6 6 6-6" />
                            </svg>
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <a href="{{ url('about-doctor') }}" class="dropdown-item">Dr. Punkesh</a>
                        <a href="{{ url('about-clinic') }}" class="dropdown-item">About Clinic</a>
                    </div>
                </div>

                <!-- SKIN Dropdown -->
                <div class="nav-dropdown">
                    <a href="javascript:void(0)" class="nav-link dropdown-toggle"
                        onclick="if(window.toggleSidebarAccordion){return window.toggleSidebarAccordion(event, this);}">
                        SKIN <span class="dropdown-arrow">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M6 9l6 6 6-6" />
                            </svg>
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="dropdown-submenu">
                            <a href="{{ url('treatments/pigments-&-spots') }}" class="dropdown-item submenu-toggle"
                                onclick="if(window.toggleSubAccordion){return window.toggleSubAccordion(event, this);}">
                                <span>Pigments &amp; Spots</span>
                                <span class="submenu-arrow">
                                    <svg width="10" height="10" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M9 18l6-6-6-6" />
                                    </svg>
                                </span>
                            </a>
                            <div class="submenu-dropdown">
                                <a href="{{ url('treatments/pigments-&-spots') }}" class="dropdown-item">Pigments
                                    &amp; Spots</a>
                                <a href="{{ url('chemical-peels') }}" class="dropdown-item">Chemical Peels</a>
                                <a href="{{ url('pigmentation') }}" class="dropdown-item">Pigmentation</a>
                                <a href="{{ url('melasma') }}" class="dropdown-item">Melasma</a>
                                <a href="{{ url('freckle') }}" class="dropdown-item">Freckle</a>
                                <a href="{{ url('laser-toning') }}" class="dropdown-item">Laser Toning</a>
                                <a href="#" class="dropdown-item">Carbon Peel</a>
                                <a href="#" class="dropdown-item">Sun Damage &amp; Spots</a>
                                <a href="#" class="dropdown-item">Age Spots</a>
                                <a href="#" class="dropdown-item">Lip Pigmentation/Toning</a>
                                <a href="#" class="dropdown-item">Dark Spots</a>
                            </div>
                        </div>
                        <div class="dropdown-submenu">
                            <a href="{{ url('treatments/acne-and-skin-resurfacing') }}"
                                class="dropdown-item submenu-toggle"
                                onclick="if(window.toggleSubAccordion){return window.toggleSubAccordion(event, this);}">
                                <span>Acne &amp; Skin Resurfacing</span>
                                <span class="submenu-arrow">
                                    <svg width="10" height="10" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M9 18l6-6-6-6" />
                                    </svg>
                                </span>
                            </a>
                            <div class="submenu-dropdown">
                                <a href="{{ url('treatments/acne-and-skin-resurfacing') }}"
                                    class="dropdown-item">Acne &amp; Skin Resurfacing</a>
                                <a href="{{ url('acne') }}" class="dropdown-item">Acne Treatment</a>
                                <a href="{{ url('vivace-mnrf') }}" class="dropdown-item">MNRF Vivace</a>
                                <a href="#" class="dropdown-item">Acne Scar Reduction</a>
                                <a href="{{ url('rosacea') }}" class="dropdown-item">Rosacea</a>
                                <a href="{{ url('fractional-co2') }}" class="dropdown-item">Fractional CO2</a>
                                <a href="#" class="dropdown-item">Open Pores</a>
                                <a href="#" class="dropdown-item">Stretch Marks Removal</a>
                            </div>
                        </div>
                        <div class="dropdown-submenu">
                            <a href="{{ url('treatments/ageing-skin') }}" class="dropdown-item submenu-toggle"
                                onclick="if(window.toggleSubAccordion){return window.toggleSubAccordion(event, this);}">
                                <span>Ageing Skin</span>
                                <span class="submenu-arrow">
                                    <svg width="10" height="10" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M9 18l6-6-6-6" />
                                    </svg>
                                </span>
                            </a>
                            <div class="submenu-dropdown">
                                <a href="{{ url('treatments/ageing-skin') }}" class="dropdown-item">Ageing Skin</a>
                                <a href="{{ url('sagging-skin') }}" class="dropdown-item">Sagging Skin</a>
                                <a href="{{ url('wrinkles') }}" class="dropdown-item">Wrinkles</a>
                                <a href="{{ url('anti-ageing-facial') }}" class="dropdown-item">Anti Ageing
                                    Facial</a>
                                <a href="{{ url('crows-feet') }}" class="dropdown-item">Crow's Feet</a>
                                <a href="#" class="dropdown-item">Neck Lines</a>
                                <a href="#" class="dropdown-item">Deep Folds</a>
                                <a href="#" class="dropdown-item">Forehead Lines</a>
                            </div>
                        </div>
                        <div class="dropdown-submenu">
                            <a href="{{ url('treatments/allergies') }}" class="dropdown-item submenu-toggle"
                                onclick="if(window.toggleSubAccordion){return window.toggleSubAccordion(event, this);}">
                                <span>Allergies</span>
                                <span class="submenu-arrow">
                                    <svg width="10" height="10" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M9 18l6-6-6-6" />
                                    </svg>
                                </span>
                            </a>
                            <div class="submenu-dropdown">
                                <a href="{{ url('treatments/allergies') }}" class="dropdown-item">Allergies</a>
                                <a href="{{ url('skin-allergies') }}" class="dropdown-item">Skin Allergies</a>
                                <a href="{{ url('eczema') }}" class="dropdown-item">Eczema</a>
                                <a href="{{ url('urticaria') }}" class="dropdown-item">Urticaria</a>
                                <a href="{{ url('atopic-dermatitis') }}" class="dropdown-item">Atopic Dermatitis</a>
                            </div>
                        </div>
                        <div class="dropdown-submenu">
                            <a href="#" class="dropdown-item submenu-toggle"
                                onclick="if(window.toggleSubAccordion){return window.toggleSubAccordion(event, this);}">
                                <span>Infections</span>
                                <span class="submenu-arrow">
                                    <svg width="10" height="10" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M9 18l6-6-6-6" />
                                    </svg>
                                </span>
                            </a>
                            <div class="submenu-dropdown">
                                <a href="#" class="dropdown-item">Infections</a>
                                <a href="#" class="dropdown-item">Fungal Infection</a>
                                <a href="#" class="dropdown-item">Skin Infection</a>
                                <a href="#" class="dropdown-item">Viral Infection</a>
                                <a href="#" class="dropdown-item">Bacterial Infection</a>
                            </div>
                        </div>
                        <div class="dropdown-submenu">
                            <a href="{{ url('treatments/skin-growth') }}" class="dropdown-item submenu-toggle"
                                onclick="if(window.toggleSubAccordion){return window.toggleSubAccordion(event, this);}">
                                <span>Skin Growth</span>
                                <span class="submenu-arrow">
                                    <svg width="10" height="10" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M9 18l6-6-6-6" />
                                    </svg>
                                </span>
                            </a>
                            <div class="submenu-dropdown">
                                <a href="{{ url('treatments/skin-growth') }}" class="dropdown-item">Skin Growth</a>
                                <a href="{{ url('corn-and-calluses') }}" class="dropdown-item">Corn and Calluses</a>
                                <a href="{{ url('skin-tag') }}" class="dropdown-item">Skin Tags</a>
                                <a href="#" class="dropdown-item">Mole</a>
                                <a href="#" class="dropdown-item">Warts</a>
                            </div>
                        </div>
                        <div class="dropdown-submenu">
                            <a href="{{ url('treatments/general-dermatology') }}"
                                class="dropdown-item submenu-toggle"
                                onclick="if(window.toggleSubAccordion){return window.toggleSubAccordion(event, this);}">
                                <span>General Dermatology</span>
                                <span class="submenu-arrow">
                                    <svg width="10" height="10" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M9 18l6-6-6-6" />
                                    </svg>
                                </span>
                            </a>
                            <div class="submenu-dropdown">
                                <a href="{{ url('treatments/general-dermatology') }}" class="dropdown-item">General
                                    Dermatology</a>
                                <a href="#" class="dropdown-item">Vitiligo</a>
                                <a href="#" class="dropdown-item">Psoriasis</a>
                                <a href="#" class="dropdown-item">Keloids</a>
                                <a href="#" class="dropdown-item">Nail Disease</a>
                                <a href="#" class="dropdown-item">Contact Dermatitis</a>
                                <a href="#" class="dropdown-item">Seborrheic Dermatitis</a>
                                <a href="#" class="dropdown-item">Pseudo Acanthosis Nigricans</a>
                                <a href="#" class="dropdown-item">Spider Veins</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- HAIR Dropdown -->
                <div class="nav-dropdown">
                    <a href="javascript:void(0)" class="nav-link dropdown-toggle"
                        onclick="if(window.toggleSidebarAccordion){return window.toggleSidebarAccordion(event, this);}">
                        HAIR <span class="dropdown-arrow">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M6 9l6 6 6-6" />
                            </svg>
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <a href="{{ url('hairfall-treatment') }}" class="dropdown-item">Hairfall Treatment</a>
                        <a href="{{ url('growth-factor-therapy-for-hair-loss') }}" class="dropdown-item">Growth
                            Factor concentrate</a>
                        <a href="{{ url('mesotherapy') }}" class="dropdown-item">Mesotherapy</a>
                        <a href="{{ url('dandruff-treatment') }}" class="dropdown-item">Dandruff</a>
                        <a href="#" class="dropdown-item">Alopecia Areata Treatment</a>
                        <a href="{{ url('lllt') }}" class="dropdown-item">LLLT</a>
                        <a href="{{ url('dermapen') }}" class="dropdown-item">Dermapen</a>
                        <a href="#" class="dropdown-item">Premature Greying</a>
                        <a href="#" class="dropdown-item">Scarring Alopecia</a>
                        <a href="#" class="dropdown-item">Hair Analyser</a>
                        <a href="#" class="dropdown-item">Scalp Micropigmentation</a>
                        <a href="#" class="dropdown-item">Hair Transplant</a>
                        <a href="#" class="dropdown-item">Scalp Repair</a>
                    </div>
                </div>

                <!-- Aesthetics Dropdown -->
                <div class="nav-dropdown">
                    <a href="javascript:void(0)" class="nav-link dropdown-toggle"
                        onclick="if(window.toggleSidebarAccordion){return window.toggleSidebarAccordion(event, this);}">
                        Aesthetics <span class="dropdown-arrow">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M6 9l6 6 6-6" />
                            </svg>
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <a href="{{ url('treatments') }}" class="dropdown-item">Lasers &amp; Aesthetics</a>
                        <div class="dropdown-submenu">
                            <a href="#" class="dropdown-item submenu-toggle"
                                onclick="if(window.toggleSubAccordion){return window.toggleSubAccordion(event, this);}">
                                <span>Unwanted Hair</span>
                                <span class="submenu-arrow">
                                    <svg width="10" height="10" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M9 18l6-6-6-6" />
                                    </svg>
                                </span>
                            </a>
                            <div class="submenu-dropdown">
                                <a href="#" class="dropdown-item">Unwanted Hair</a>
                                <a href="{{ url('laser-hair-removal') }}" class="dropdown-item">Laser Hair
                                    Removal</a>
                                <a href="#" class="dropdown-item">Full body laser</a>
                                <a href="#" class="dropdown-item">Under Arms Hair Removal</a>
                                <a href="#" class="dropdown-item">Facial Hair Removal</a>
                                <a href="#" class="dropdown-item">Legs Hair Removal</a>
                            </div>
                        </div>
                        <div class="dropdown-submenu">
                            <a href="#" class="dropdown-item submenu-toggle"
                                onclick="if(window.toggleSubAccordion){return window.toggleSubAccordion(event, this);}">
                                <span>Facial Rejuvenation</span>
                                <span class="submenu-arrow">
                                    <svg width="10" height="10" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M9 18l6-6-6-6" />
                                    </svg>
                                </span>
                            </a>
                            <div class="submenu-dropdown">
                                <a href="#" class="dropdown-item">Facial Rejuvenation</a>
                                <a href="{{ url('peeling') }}" class="dropdown-item">Peeling</a>
                                <a href="#" class="dropdown-item">MDA</a>
                                <a href="{{ url('photofacial') }}" class="dropdown-item">Photofacial</a>
                                <a href="#" class="dropdown-item">Under Eye Dark Circle</a>
                                <a href="#" class="dropdown-item">Under Eye Hollowness</a>
                            </div>
                        </div>
                        <div class="dropdown-submenu">
                            <a href="#" class="dropdown-item submenu-toggle"
                                onclick="if(window.toggleSubAccordion){return window.toggleSubAccordion(event, this);}">
                                <span>Facial Lift &amp; Contouring</span>
                                <span class="submenu-arrow">
                                    <svg width="10" height="10" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M9 18l6-6-6-6" />
                                    </svg>
                                </span>
                            </a>
                            <div class="submenu-dropdown">
                                <a href="#" class="dropdown-item">Facial Lift &amp; Contouring</a>
                                <a href="{{ url('anti-wrinkle-injection') }}" class="dropdown-item">Anti Wrinkle
                                    Injection</a>
                                <a href="#" class="dropdown-item">Jawline Contouring</a>
                                <a href="#" class="dropdown-item">Chin Enhancement</a>
                                <a href="#" class="dropdown-item">Lip Enhancement</a>
                                <a href="#" class="dropdown-item">Cheek Enhancement</a>
                            </div>
                        </div>
                        <div class="dropdown-submenu">
                            <a href="#" class="dropdown-item submenu-toggle"
                                onclick="if(window.toggleSubAccordion){return window.toggleSubAccordion(event, this);}">
                                <span>Skin Glow &amp; Brightening</span>
                                <span class="submenu-arrow">
                                    <svg width="10" height="10" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M9 18l6-6-6-6" />
                                    </svg>
                                </span>
                            </a>
                            <div class="submenu-dropdown">
                                <a href="#" class="dropdown-item">Skin Glow &amp; Brightening</a>
                                <a href="{{ url('hydrafacial') }}" class="dropdown-item">Hydrafacial</a>
                                <a href="{{ url('oxygeneo-treatment') }}" class="dropdown-item">Oxygeneo
                                    Treatment</a>
                                <a href="#" class="dropdown-item">Omega 3</a>
                            </div>
                        </div>
                        <div class="dropdown-submenu">
                            <a href="#" class="dropdown-item submenu-toggle"
                                onclick="if(window.toggleSubAccordion){return window.toggleSubAccordion(event, this);}">
                                <span>Facials</span>
                                <span class="submenu-arrow">
                                    <svg width="10" height="10" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M9 18l6-6-6-6" />
                                    </svg>
                                </span>
                            </a>
                            <div class="submenu-dropdown">
                                <a href="#" class="dropdown-item">Facials</a>
                                <a href="#" class="dropdown-item">BB Glow Facial</a>
                                <a href="#" class="dropdown-item">Laser Facials</a>
                                <a href="#" class="dropdown-item">Power Facial</a>
                            </div>
                        </div>
                        <a href="#" class="dropdown-item">Body Polishing</a>
                        <a href="#" class="dropdown-item">Laser Tattoo Removal</a>
                    </div>
                </div>

                <!-- TECHNOLOGY Dropdown -->
                <div class="nav-dropdown">
                    <a href="javascript:void(0)" class="nav-link dropdown-toggle"
                        onclick="if(window.toggleSidebarAccordion){return window.toggleSidebarAccordion(event, this);}">
                        TECHNOLOGY <span class="dropdown-arrow">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M6 9l6 6 6-6" />
                            </svg>
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <a href="{{ url('technology') }}" class="dropdown-item">Technology</a>
                        <a href="{{ url('technology/helios-ndyag') }}" class="dropdown-item">Helios NDYAG</a>
                        <a href="{{ url('technology/triple-wavelength-diode') }}" class="dropdown-item">Triple
                            Wavelength Diode</a>
                        <a href="#" class="dropdown-item">Alexandrite</a>
                        <a href="#" class="dropdown-item">Pollogen</a>
                        <a href="#" class="dropdown-item">Harmony XLPro</a>
                        <a href="#" class="dropdown-item">Skin Analyser</a>
                    </div>
                </div>

                <!-- GALLERY Dropdown -->
                <div class="nav-dropdown">
                    <a href="javascript:void(0)" class="nav-link dropdown-toggle"
                        onclick="if(window.toggleSidebarAccordion){return window.toggleSidebarAccordion(event, this);}">
                        GALLERY <span class="dropdown-arrow">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2.5" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M6 9l6 6 6-6" />
                            </svg>
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <a href="{{ url('clinic-gallery') }}" class="dropdown-item">Clinic Gallery</a>
                        <a href="{{ url('real-results') }}" class="dropdown-item">Real Results</a>
                        <a href="{{ url('videos') }}" class="dropdown-item">Videos</a>
                    </div>
                </div>

                <a href="{{ url('blogs') }}" class="nav-link">BLOGS</a>
            </nav>

            <!-- CTA Button -->
            <a href="{{ url('schedule-a-consultation') }}" class="btn-appointment">REQUEST AN APPOINTMENT</a>

            <!-- Mobile Hamburger Toggle -->
            <button class="mobile-nav-toggle" id="mobileNavToggle" aria-label="Toggle navigation">
                <span class="hamburger-bar"></span>
                <span class="hamburger-bar"></span>
                <span class="hamburger-bar"></span>
            </button>
        </div>
    </header>
