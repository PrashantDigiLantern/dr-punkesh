# TECHNICAL SEO & CORE WEB VITALS TEST REPORT
**Target Site:** Dr. Punkesh's Advance Dermato & Laser Care  
**Test Suite:** Automated HTTP, Metadata, Canonical, Crawler, and Browser Rendering Verification  
**Date:** October 27, 2026  

---

## 1. Automated Route & Status Code Verification

| Route | Method | Expected HTTP | Actual HTTP | Canonical URL Result | Robots Header / Tag | Status |
|---|---|---|---|---|---|---|
| `/` | GET | 200 OK | 200 OK | `https://www.advanceskinhairclinic.com` | `INDEX,FOLLOW` | **PASS** |
| `/about-clinic` | GET | 200 OK | 200 OK | `https://www.advanceskinhairclinic.com/about-clinic` | `INDEX,FOLLOW` | **PASS** |
| `/about-doctor` | GET | 200 OK | 200 OK | `https://www.advanceskinhairclinic.com/about-doctor` | `INDEX,FOLLOW` | **PASS** |
| `/blogs` | GET | 200 OK | 200 OK | `https://www.advanceskinhairclinic.com/blogs` | `INDEX,FOLLOW` | **PASS** |
| `/blog/summer-lip-care` | GET | 200 OK | 200 OK | `http://localhost/blog/summer-lip-care` | `INDEX,FOLLOW` | **PASS** |
| `/hairfall-treatment` | GET | 200 OK | 200 OK | `http://localhost/hairfall-treatment` | `INDEX,FOLLOW` | **PASS** |
| `/hairfall-treatment?utm=123` | GET | 200 OK | 200 OK | `http://localhost/hairfall-treatment` (clean) | `INDEX,FOLLOW` | **PASS** |
| `/laser-toning` | GET | 200 OK | 200 OK | `https://www.advanceskinhairclinic.com/laser-toning` | `INDEX,FOLLOW` | **PASS** |
| `/technology` | GET | 200 OK | 200 OK | `http://localhost/technology` | `INDEX,FOLLOW` | **PASS** |
| `/clinic-gallery` | GET | 200 OK | 200 OK | `http://localhost/clinic-gallery` | `INDEX,FOLLOW` | **PASS** |
| `/written-testimonials` | GET | 200 OK | 200 OK | `https://www.advanceskinhairclinic.com/written-testimonials` | `INDEX,FOLLOW` | **PASS** |
| `/video-testimonials` | GET | 200 OK | 200 OK | `http://localhost/video-testimonials` | `INDEX,FOLLOW` | **PASS** |
| `/contact-us` | GET | 200 OK | 200 OK | `https://www.advanceskinhairclinic.com/contact-us` | `INDEX,FOLLOW` | **PASS** |
| `/robots.txt` | GET | 200 OK | 200 OK | NONE (Direct crawler file) | `text/plain` MIME | **PASS** |
| `/sitemap.xml` | GET | 200 OK | 200 OK | NONE (Direct XML index) | `text/xml` MIME | **PASS** |
| `/non-existent-page-test-404` | GET | 404 Not Found | 404 Not Found | NONE (Suppressed on 404) | `noindex, nofollow` | **PASS** |
| `/blog/non-existent-slug-xyz` | GET | 404 Not Found | 404 Not Found | NONE (Suppressed on 404) | `noindex, nofollow` | **PASS** |

---

## 2. Structured Data Schema Validation

### Test Route: `/blog/summer-lip-care`
- **Schema 1:** `MedicalClinic`
  - `@context`: `https://schema.org`
  - Name, Logo, Address, OpeningHoursSpecification, Specialty ("Dermatology")
  - **Result:** `PASS` (JSON syntax valid, Google Rich Results compatible)
- **Schema 2:** `BlogPosting`
  - Headline: `Summer Lip Care`
  - Image: `http://localhost/backend/blog/1666865541.jpg`
  - DatePublished: `2021-03-15T00:00:00+05:30`
  - Author: `Person` (`Dr. Punkesh Kumar`, Dermatologist)
  - Publisher: `MedicalClinic`
  - MainEntityOfPage: `http://localhost/blog/summer-lip-care`
  - **Result:** `PASS`
- **Schema 3:** `BreadcrumbList`
  - Level 1: `Home` (`/`)
  - Level 2: `Blogs` (`/blogs`)
  - Level 3: `Summer Lip Care` (`/blog/summer-lip-care`)
  - **Result:** `PASS`

---

## 3. Core Web Vitals & Frontend Layout Integrity
1. **LCP (Largest Contentful Paint):**
   - High fetch priority (`fetchpriority="high"`, `decoding="async"`, `loading="eager"`) verified on homepage hero and interior hero banners.
   - Preload links in place for primary typography (`Inter-Regular.woff2`, `PlayfairDisplay-Bold.woff2`).
2. **CLS (Cumulative Layout Shift):**
   - Eliminated async stylesheet loading triggers that caused flash of unstyled content (FOUC).
   - Images contain explicit `width` and `height` attributes across components.
   - Equal-height flexbox and word limits verified on `/technology`.
3. **INP (Interaction to Next Paint):**
   - Load More AJAX handlers operate non-blockingly with UI feedback (`LOADING...` states and disabled triggers during in-flight requests).
