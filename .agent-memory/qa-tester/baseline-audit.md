# Phase 1 Baseline QA & Asset Audit — Sphinix Marketing

**Date**: 2026-11-25  
**Auditor**: Agent 03 (QA Engineer / Software Tester)  
**Scope**: All 11 HTML pages + `images/` directory (read-only audit; 0 production files modified)

---

## 1. Executive Summary
- **Broken internal links / anchors**: **0** across all 11 HTML pages (55 unique internal/hash `href` targets verified).
- **Broken `<img>` sources**: **0** across all 11 HTML pages.
- **Inline JS syntax errors**: **0** (all inline `<script>` blocks parsed via Node `vm.Script`).
- **JSON-LD errors**: **0** (note: 0 pages currently embed `application/ld+json` blocks).
- **CSS/JS architecture note**: `0/11` HTML pages reference `css/` or `js/` directories; all 11 pages use Tailwind CSS CDN (`https://cdn.tailwindcss.com?plugins=forms,container-queries`) + inline `<script>`s.
- **Known Baseline Issues**:
  1. `index.html` has **3 duplicate `id` groups**: `button-primary` (x2), `button-icon` (x4), `card-elevated` (x8).
  2. Footer newsletter `<form>` (`Join`) on all 11 pages has no `action` attribute and no `submit` event listener (causes default GET page reload on submit).
  3. Open Graph (`og:*`), Twitter Card (`twitter:*`), and `<link rel="canonical">` tags are absent across all 11 pages (`0/11`).
  4. Skip-to-content link is absent across all 11 pages (`0/11`).

---

## 2. Image Asset Inventory (`c:\Users\hm901\Desktop\sphinix\images\`)

All **14** files in `images/` are actively referenced across the site:

| Asset | Size | Referenced In | Usage Notes |
|---|---|---|---|
| `sphinix_logo.webp` | 7.1 KB | All 11 HTML pages | Navbar & footer brand logo |
| `hero_agency_team.jpg` | 761.9 KB | `index.html` | Homepage hero visual |
| `impact_collaboration.jpg` | 867.6 KB | `index.html`, `about/index.html` | Impact / About section visual |
| `insight_featured_card.jpg` | 826.1 KB | `index.html` | Featured insight card |
| `video_showcase_reel.jpg` | 802.6 KB | `index.html` | Agency reel poster/visual |
| `subpage_hero_agency.jpg` | 619.6 KB | 8 subpages (`about`, `blog`, `contact`, `products`, `services/seo`, `services/social-media-marketing`, `work`, `work/aabo`) | Decorative hero background (`alt=""` + `aria-hidden="true"` on 7 subpages; `about/index.html` has non-empty alt) |
| `svc_01_social.jpg` | 283.8 KB | `services/index.html` | Service 01 (`#social-media`) |
| `svc_02_seo.jpg` | 277.9 KB | `services/index.html` | Service 02 (`#seo`, JS stage image) |
| `svc_03_ads.jpg` | 255.1 KB | `services/index.html` | Service 03 (`#google-ads`, JS stage image) |
| `svc_04_branding.jpg` | 391.9 KB | `services/index.html` | Service 04 (`#branding`, JS stage image) |
| `svc_05_video.jpg` | 372.9 KB | `services/index.html` | Service 05 (`#video`, JS stage image) |
| `svc_06_ecommerce.jpg` | 281.5 KB | `services/index.html` | Service 06 (`#ecommerce`, JS stage image) |
| `svc_07_email.jpg` | 344.6 KB | `services/index.html` | Service 07 (`#email`, JS stage image) |
| `svc_08_dev.jpg` | 351.6 KB | `services/index.html` | Service 08 (`#dev`, JS stage image) |

---

## 3. Page-by-Page Baseline Catalog (11 HTML Pages)

### Shared Global Elements (Present on All 11 Pages)
- **Header & Navigation**: `<header id="site-header">`, `#nav-pill`, `<nav aria-label="Primary Navigation">`, Services mega-menu (`#services-nav-item`, `#services-nav-btn`, `#services-chevron`, `#services-mega`), Mobile drawer (`#mobile-menu-btn`, `#mobile-menu-icon`, `#mobile-menu`, `<nav aria-label="Mobile Navigation">`, `#mobile-services-btn`, `#mobile-services-chevron`, `#mobile-services-panel`).
- **Footer**: `<footer>` with brand info, navigation links, and 1 newsletter `<form>` (`<input type="email">` + `Join` button — no `action`, no `submit` handler).
- **SEO Baseline**: All 11 pages have `<html lang="en">`, unique `<title>`, and `<meta name="description">`. `404.html` has `<meta name="robots" content="noindex, follow">`.

### Page Details

1. **`index.html`** (126.5 KB)
   - **Title**: `Sphinix Marketing — Results-Driven Digital Agency`
   - **Section/Widget Anchor IDs**: `#services`, `#services-counter`, `#services-prev`, `#services-next`, `#services-viewport`, `#services-track`, `#services-dots`, `#client-family`, `#client-track-1`, `#client-track-2`, `#agency-reel`, `#products`, `#accordion-group`, `#industries`, `#testimonial-carousel`, `#prev-testimonial`, `#testimonial-stage`, `#testimonial-quote`, `#testimonial-author`, `#testimonial-role`, `#next-testimonial`, `#insights`, `#contact`
   - **Duplicate IDs**: `button-primary` (x2), `button-icon` (x4), `card-elevated` (x8)
   - **Interactive Widgets**: Services carousel (prev/next, dots, counter, pointer drag, autoplay), Product tabs (`role="tablist"`, `role="tab"`, `data-tab="0|1|2"`), FAQ `<details>` accordions (4), Testimonial carousel (`#prev-testimonial`, `#next-testimonial`), Mega-menu & Mobile drawer.
   - **Landmarks**: `header=3` (`#site-header` + 2 card `<header>`s inside `<article>`), `nav=2`, `main=1`, `footer=3` (2 card `<footer>`s + site `<footer>`), `h1=1`.

2. **`404.html`** (33.3 KB)
   - **Title**: `404 — Page Not Found | Sphinix Marketing`
   - **Robots**: `noindex, follow`
   - **Interactive Widgets**: Shared navbar mega-menu & mobile drawer; footer newsletter form.
   - **Landmarks**: `header=1`, `nav=2`, `main=1`, `footer=1`, `h1=1`.

3. **`about/index.html`** (48.5 KB)
   - **Title**: `About Us — Sphinix Marketing | Results Driven Agency`
   - **Section Anchor IDs**: `#our-story`
   - **Interactive Widgets**: Shared navbar mega-menu & mobile drawer; footer newsletter form.
   - **Landmarks**: `header=1`, `nav=2`, `main=1`, `footer=1`, `h1=1`.

4. **`blog/index.html`** (45.5 KB)
   - **Title**: `Insights & Articles — Sphinix Marketing | Growth Playbooks`
   - **Section Anchor IDs**: `#articles-grid`
   - **Forms**: (0) Inline newsletter subscribe form (`<input type="email" required>` + `Subscribe`, handled via inline `onsubmit`/JS); (1) Footer `Join` form.
   - **Interactive Widgets**: Category filter buttons (`data-category` x6) + inline filter JS; shared navbar.
   - **Landmarks**: `header=1`, `nav=2`, `main=1`, `footer=1`, `h1=1`.

5. **`contact/index.html`** (45.9 KB)
   - **Title**: `Contact Us — Sphinix Marketing | Let’s Talk Growth`
   - **Anchor IDs**: `#contact-form`, `#contact-name`, `#contact-email`, `#contact-phone`, `#contact-service`, `#contact-message`, `#form-error`, `#form-success`
   - **Forms**: (0) `#contact-form` (name, email, phone, service `<select>`, message `<textarea>`, `Submit Inquiry` button, JS `submit` listener); (1) Footer `Join` form.
   - **Interactive Widgets**: Contact form validation/submission JS; 4 `<details>` FAQ accordions; shared navbar.
   - **Landmarks**: `header=1`, `nav=2`, `main=1`, `footer=1`, `h1=1`.

6. **`products/index.html`** (49.1 KB)
   - **Title**: `Our Proud Products — Sphinix Marketing | SaaS Tools & Apps`
   - **Section Anchor IDs**: `#chatbox360`, `#aajkagraphic`, `#social360`
   - **Interactive Widgets**: Shared navbar mega-menu & mobile drawer; footer newsletter form.
   - **Landmarks**: `header=1`, `nav=2`, `main=1`, `footer=1`, `h1=1`.

7. **`services/index.html`** (70.1 KB)
   - **Title**: `Services — Sphinix Marketing | Results Driven Digital Agency`
   - **Section & Panel Anchor IDs**: `#services-accordion`, `#social-media`, `#panel-social-media`, `#seo`, `#panel-seo`, `#google-ads`, `#panel-google-ads`, `#branding`, `#panel-branding`, `#video`, `#panel-video`, `#ecommerce`, `#panel-ecommerce`, `#email`, `#panel-email`, `#dev`, `#panel-dev`, `#services-stage-img`
   - **Interactive Widgets**: 8-row service accordion (`aria-expanded`, `aria-controls="panel-*"`) + dynamic stage image swapper (`#services-stage-img`) + `hashchange` deep-linking (`openFromHash`); shared navbar.
   - **Landmarks**: `header=1`, `nav=2`, `main=1`, `footer=1`, `h1=1`.

8. **`services/seo/index.html`** (45.4 KB)
   - **Title**: `SEO Services — Sphinix Marketing | Organic Search Growth`
   - **Interactive Widgets**: Shared navbar; footer newsletter form.
   - **Landmarks**: `header=1`, `nav=3` (Primary, Mobile, Breadcrumb), `main=1`, `footer=1`, `h1=1`.

9. **`services/social-media-marketing/index.html`** (45.3 KB)
   - **Title**: `Social Media Management — Sphinix Marketing | Meta & LinkedIn Partner`
   - **Interactive Widgets**: Shared navbar; footer newsletter form.
   - **Landmarks**: `header=1`, `nav=3` (Primary, Mobile, Breadcrumb), `main=1`, `footer=1`, `h1=1`.

10. **`work/index.html`** (51.8 KB)
    - **Title**: `Our Work & Clients — Sphinix Marketing | 150+ Partnerships`
    - **Section Anchor IDs**: `#projects-grid`
    - **Interactive Widgets**: Category filter bar (`role="tablist"`, `data-filter` = `all`, `iot`, `healthcare`, `ecommerce`, `industrial`, `jewelry`) + inline filter JS; shared navbar.
    - **Landmarks**: `header=1`, `nav=2`, `main=1`, `footer=1`, `h1=1`.

11. **`work/aabo/index.html`** (40.8 KB)
    - **Title**: `aabo Case Study — Sphinix Marketing | IoT Smart Safety`
    - **Interactive Widgets**: Shared navbar; footer newsletter form.
    - **Landmarks**: `header=1`, `nav=3` (Primary, Mobile, Breadcrumb), `main=1`, `footer=1`, `h1=1`.

---

## 4. Critical Preservation Checklist for Redesign
1. **Preserve all 11 route paths** and relative path depths (`/`, `/404.html`, `/about/`, `/blog/`, `/contact/`, `/products/`, `/services/`, `/services/seo/`, `/services/social-media-marketing/`, `/work/`, `/work/aabo/`).
2. **Preserve all deep-link anchor IDs**:
   - `services/index.html`: `#social-media`, `#seo`, `#google-ads`, `#branding`, `#video`, `#ecommerce`, `#email`, `#dev` (plus `#panel-*` & `#services-stage-img` for accordion JS)
   - `products/index.html`: `#chatbox360`, `#aajkagraphic`, `#social360`
   - `about/index.html`: `#our-story`
   - `index.html`: `#services`, `#client-family`, `#agency-reel`, `#products`, `#industries`, `#insights`, `#contact`
3. **Preserve all JS-bound IDs & attributes**: `#site-header`, `#services-mega`, `#mobile-menu`, `#contact-form` (+ `#contact-*`, `#form-error`, `#form-success`), `#articles-grid`, `#projects-grid`, `data-filter`, `data-tab`, `aria-controls`/`aria-expanded`.
4. **Preserve all 14 `images/*` assets** and `alt=""` + `aria-hidden="true"` on decorative hero backgrounds.
5. **Preserve `<html lang="en">`, `<title>`, `<meta name="description">`, and `404.html` `noindex, follow`**.
