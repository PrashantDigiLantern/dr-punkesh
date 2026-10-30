# TECHNICAL SEO & CORE WEB VITALS AUDIT REPORT
**Target Site:** Dr. Punkesh's Advance Dermato & Laser Care (`advanceskinhairclinic.com`)  
**Audit Environment:** Local Production-Mirror (`http://127.0.0.1:8000`), PHP 8.4.15, Laravel Framework 13.26.1  
**Audit Date:** October 27, 2026  
**Auditor:** Senior Technical SEO & Website Performance Engineering Agent  

---

## 1. Executive Summary & Stack Detection
- **Backend Framework:** Laravel 13.26.1 on PHP 8.4.15 (ZTS Visual C++ 2022 x64, Zend OPcache enabled)
- **Frontend Architecture:** Traditional Server-Side Rendered (SSR) Blade templates (`resources/views/website/...`) with vanilla CSS stylesheets (`public/new-website/css/...`)
- **Database:** MySQL relational schema with Eloquent ORM
- **Routing & Rendering:** Clean SEO routes mapped in `routes/web.php`
- **Analytics & Tracking:** Google Tag Manager (`GTM-N53JXXK`) implemented in `<head>` and `<body>` (noscript)

---

## 2. Scope of Inspected URLs & Templates
1. **Homepage (`/`)**: Main portal, hero banner with award slider, services, clinic overview, dynamic real results.
2. **About Clinic (`/about-clinic`)**: Clinic history, facility highlights, dynamic testimonials, equipment list.
3. **About Doctor (`/about-doctor`)**: Dr. Punkesh Kumar qualifications, certifications, credentials.
4. **Blog Listing (`/blogs`)**: AJAX-powered pagination with 9 cards per batch.
5. **Blog Details (`/blog/{url}`)**: Full article content, table of contents sidebar, related posts.
6. **Treatments Hub & Categories (`/treatments`, `/treatments/{category}`)**: Category grouping for Laser, Skin, and Hair.
7. **Service Details (`/{service_url}` e.g., `/hairfall-treatment`, `/laser-toning`)**: Single service landing pages with procedure descriptions, benefits, and appointment forms.
8. **Sub-Services (`/{category}/{subservice}`)**: Treatment variations with procedure steps and FAQs.
9. **Technology Hub (`/technology`)**: Medical laser equipment catalogue with equal-height cards and maximum word limits.
10. **Clinic Gallery (`/clinic-gallery`)**: Image gallery with AJAX Load More and interactive lightbox modal.
11. **Testimonials Hubs (`/written-testimonials`, `/video-testimonials`)**: Patient review listings with dynamic AJAX pagination.
12. **Contact Us (`/contact-us`)**: Physical address, Google Maps embed, inquiry and appointment form.
13. **Technical Endpoints (`/robots.txt`, `/sitemap.xml`)**: Search engine crawler control and XML index.
14. **Error Handling (`/404`, non-existent routes)**: Dead URL responses.

---

## 3. Discovered Technical SEO & Performance Issues

| ID | Issue Description | Category | Priority | Root Cause |
|---|---|---|---|---|
| **SEO-01** | `/robots.txt` returned HTTP 500 Server Error | Technical SEO / Crawlability | **P0 Critical** | Controller called raw `echo` and native `header()` without returning a Laravel `Response` object. |
| **SEO-02** | `/sitemap.xml` returned HTTP 500 Server Error | Technical SEO / Indexability | **P0 Critical** | Controller called raw `echo` and native `header('Content-type: text/xml')` without returning a Laravel `Response` object. |
| **SEO-03** | Soft 404 & 302 Redirection on Dead URLs | Technical SEO / Crawl Budget | **P1 High** | Non-existent services/blogs executed `redirect('404')` or `redirect('/')`, and the `/404` route returned HTTP 200 instead of 404. |
| **SEO-04** | Self-Canonicalization to Query Parameters | Technical SEO / Canonicalization | **P1 High** | `header.blade.php` used `{{ url()->full() }}` for `<link rel="canonical">`, canonicalizing tracking URLs (`?utm_source=...`, `?page=...`). |
| **SEO-05** | Missing Unique Titles & Descriptions on Dynamic Pages | Technical SEO / On-Page | **P1 High** | Blog detail pages and service detail pages lacking explicit `SeoPageModel` entries fell back to static homepage duplicates. |
| **SEO-06** | 404 Error Page Allowed Indexing | Technical SEO / Indexability | **P1 High** | Error page emitted `<meta name="robots" content="INDEX,FOLLOW">` and self-canonicalized to dead URLs. |
| **SEO-07** | Raw HTML Entities in Meta Descriptions | Technical SEO / Snippets | **P2 Medium** | Encoded apostrophes (`Dr. Punkesh&#039;s`) rendered directly inside `<meta name="description">`. |
| **SEO-08** | Incomplete Schema.org Markup | Technical SEO / Structured Data | **P2 Medium** | Only static `MedicalClinic` schema existed; missing `BlogPosting` on articles and `BreadcrumbList` on inner pages. |
| **SEO-09** | Async CSS `onload` Flash of Unstyled Content (FOUC) | Core Web Vitals (CLS) | **P2 Medium** | Secondary stylesheets used `as="style" onload="this.onload=null;this.rel='stylesheet'"` causing layout reflow and shifts. |
| **SEO-10** | Unoptimized External Preconnects | Core Web Vitals (FCP/LCP) | **P3 Low** | External origins (`code.jquery.com`, `cdnjs.cloudflare.com`) lacked DNS prefetch and preconnect hints. |

---

## 4. Official Documentation References
- **Google Search Central - SEO Starter Guide:** https://developers.google.com/search/docs/fundamentals/seo-starter-guide
- **Google Search Central - Robots.txt Specifications:** https://developers.google.com/search/docs/crawling-indexing/robots/intro
- **Google Search Central - Sitemaps Protocol:** https://developers.google.com/search/docs/crawling-indexing/sitemaps/build-sitemap
- **Google Search Central - Canonicalization:** https://developers.google.com/search/docs/crawling-indexing/canonicalization
- **Google Search Central - HTTP Status Codes & Soft 404s:** https://developers.google.com/search/docs/crawling-indexing/http-network-errors
- **Schema.org - MedicalClinic & BlogPosting:** https://schema.org/MedicalClinic, https://schema.org/BlogPosting
- **Web.dev - Core Web Vitals (LCP, INP, CLS):** https://web.dev/articles/vitals
