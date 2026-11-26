# Sphinix Marketing — Editorial Design System Spec (Phase 1)

Grounded in independent inspection of all 11 HTML pages (`index.html`, `about/index.html`, `work/index.html`, `work/aabo/index.html`, `services/index.html`, `services/seo/index.html`, `services/social-media-marketing/index.html`, `products/index.html`, `blog/index.html`, `contact/index.html`, `404.html`) and all 14 assets in `c:\Users\hm901\Desktop\sphinix\images\`.

---

## 1. Typography System (Manrope + JetBrains Mono)

- **Primary Family**: `"Manrope", "Plus Jakarta Sans", sans-serif` (weights `400, 500, 600, 700`) — unified across display headings, section titles, navigation, and body prose on all 11 pages.
- **Mono / Index Family**: `"JetBrains Mono", monospace` (weights `400, 500`) — reserved strictly for `01`–`08` discipline indices, step numbers, reading times, and `tabular-nums` phone/KPI figures.
- **Type Scale & Hierarchy**:
  - **Hero H1** (`.hero-headline`): `clamp(2.3rem, 1.45rem + 2.45vw, 3.5rem)` (`36.8px`–`56px`), weight `620` (`600`), line-height `1.07`, tracking `-0.028em`.
  - **Subpage Hero H1** (`.subpage-hero-h1`): `clamp(2.15rem, 1.55rem + 2.1vw, 3.25rem)` (`34.4px`–`52px`), weight `620`, line-height `1.05`, tracking `-0.028em`.
  - **Section Display H2**: `clamp(1.85rem, 1.25rem + 1.5vw, 2.5rem)` (`29.6px`–`40px`), weight `600`, line-height `1.12`, tracking `-0.025em`.
  - **Headline MD / Card H3**: `24px / 30px`, weight `600`, tracking `-0.015em`.
  - **Title MD**: `18px–20px / 26px`, weight `600`, tracking `-0.01em`.
  - **Body Lead**: `17px–18px / 1.6`, weight `400`, max measure `52ch`–`60ch`.
  - **Body Standard**: `15px / 24px`, weight `400`.
  - **Eyebrow / Mono Index**: `12px–13px`, uppercase, tracking `0.08em`, `tabular-nums`.

---

## 2. Color Palette, Surface Rhythm & WCAG Contrast

- **3-Surface Alternating Cadence** (Rule: never place two consecutive sections on the same surface):
  1. **Warm Off-White**: `#F7F6F4` (`bg-light-surface`) — primary editorial canvas; `#FFF8F1` (`hero-canvas`) reserved for Home hero warmth.
  2. **Crisp White**: `#FFFFFF` (`bg-light-surface-container-lowest`) — high-clarity content bands, forms, and typographic lists.
  3. **Deep Charcoal Dark Band**: `#18181B` (`bg-[#18181B]` / `#1C1C1E` `bg-brand-charcoal`) — high-contrast editorial anchors (e.g., Featured Case Study, Social 360 Suite, Newsletter, Final Conversion CTA).
- **Ink & Contrast**:
  - On Light (`#F7F6F4`, `#FFFFFF`): Primary ink `#18181B`, secondary prose `#52525B` / `#444444`, muted meta `#71717A`.
  - Accessible Orange Text (Light Surfaces): `#A83300` (WCAG AA/AAA compliant for eyebrows, links, active tabs, and mono indices).
  - Display Accent Span (`>= 24px` bold): `#E85D2A`.
  - On Dark (`#18181B`): Primary ink `#FFFFFF`, secondary prose `#D4D4D8` / `#A1A1AA`, warm accent `#FF8A5C` / `#FF9F7A`.
- **Primary & Secondary Buttons**:
  - Primary CTA: `bg-[#A83300] text-white hover:bg-[#18181B]` (`rounded-[6px]`, `px-5 py-2.5` or `px-6 py-3`).
  - Secondary CTA: `border border-[#E4E4E7] bg-white text-[#18181B] hover:border-[#A83300] hover:text-[#A83300]`.
  - Dark-band CTA: `bg-[#E85D2A] text-white hover:bg-white hover:text-[#18181B]`.

---

## 3. Container Widths, Borders & Restrained Motion

- **Containers**:
  - Header (`#site-header`): `max-w-[1360px] mx-auto px-5 sm:px-8 lg:px-10 h-20`.
  - Page Sections: `max-w-7xl mx-auto px-6` (`1280px`), `py-20 lg:py-24`.
  - Focused Reading / Carousel Stage: `max-w-5xl mx-auto`.
- **Borders & Radii**:
  - Hairlines carry structure (`1px solid #E4E4E7` on light, `1px solid rgba(255,255,255,0.12)` on dark) — zero heavy drop shadows.
  - Radii: `rounded-[6px]` (buttons/inputs), `rounded-xl` (media frames & feature panels), `rounded-full` (nav pill & filter chips).
- **Motion**:
  - `150ms ease-out` for color/border transitions.
  - `260ms cubic-bezier(0.22, 1, 0.36, 1)` for image hover scale (`scale-[1.02]`) and accordion panel reveals.
  - Mandatory `@media (prefers-reduced-motion: reduce)` override (`0.01ms`).

---

## 4. Distinct Page-by-Page Compositions

### (1) Work / Portfolio (`work/index.html` + `work/aabo/index.html`)
- **`work/index.html`** (Strongest visual showcase using real photography):
  - *Band 1 (`#F7F6F4`)*: Warm editorial hero with Manrope H1, filterable discipline chips (`All Work`, `IoT & Tech`, `Healthcare`, `Retail & E-Commerce`, `Manufacturing & Marine`, `Jewelry & Real Estate`).
  - *Band 2 (`#18181B` Dark Band)*: **Flagship Featured Case Study (`aabo`)** — 7-col visual showcase (`svc_04_branding.jpg` / `impact_collaboration.jpg`) + 5-col narrative, scope tags, and `View Case Study →` CTA.
  - *Band 3 (`#FFFFFF`)*: **Asymmetric Staggered Portfolio Grid** (2-col on desktop with varied aspect ratios `16:10` and `4:3`) pairing real imagery (`svc_01_social.jpg`, `svc_08_dev.jpg`, `svc_05_video.jpg`, `svc_06_ecommerce.jpg`, `video_showcase_reel.jpg`) with WeConnect Care, Saurashtra Group, Veer Jewellers, Alang Marine, and Real Estate & Infra.
  - *Band 4 (`#F7F6F4`)*: **15+ Industries Served** typographic hairline index (`divide-y divide-[#E4E4E7]`).
  - *Band 5 (`#18181B`)*: Conversion CTA banner.
- **`work/aabo/index.html`**:
  - *Band 1 (`#F7F6F4`)*: Case study hero with breadcrumb, Manrope H1, 4-column `JetBrains Mono` metadata strip (`Client`, `Industry`, `Scope`, `Outcome`), and framed hero visual.
  - *Band 2 (`#FFFFFF`)*: **Challenge vs. Solution** 5/7 asymmetric editorial split.
  - *Band 3 (`#18181B` Dark Band)*: **What We Crafted** 3-part deliverable showcase (Brand System & Collateral, Web & Conversion Funnel, Launch Video & Social Ads) with imagery.
  - *Band 4 (`#F7F6F4`)*: Outcome metrics + `Next: Explore All Work` strip.

### (2) Blog (`blog/index.html`) — Modern Editorial Publication
- *Band 1 (`#F7F6F4`)*: Publication masthead hero with Manrope H1 and category filter pills (`All`, `Strategy & SaaS`, `SEO & Organic`, `Paid Ads`, `Email & Retention`).
- *Band 2 (`#FFFFFF`)*: **Lead Editorial Feature** — 7-col `insight_featured_card.jpg` photograph + 5-col headline (*Cutting Wasted Ad Spend Across Google & Meta in 30 Days*), deck, `JetBrains Mono` byline/read-time, and `Request Growth Audit →`.
- *Band 3 (`#F7F6F4`)*: **Typographic Article Index** — `divide-y divide-[#E4E4E7] border-y border-[#E4E4E7]` list of the 6 playbooks (left: `JetBrains Mono` category + read time; center: Manrope headline + 1-line summary; right: `north_east` arrow), eliminating repetitive 3-col cards.
- *Band 4 (`#18181B` Dark Band)*: Editorial newsletter subscription bar.

### (3) Contact (`contact/index.html`) — Conversion-Focused Editorial Split
- *Band 1 (`#F7F6F4`)*: Compact editorial header + immediate **7/5 Conversion Split**:
  - Left (7 cols): `#FFFFFF` Consultation Brief Form (`border border-[#E4E4E7] rounded-xl`), clean Manrope labels, accessible focus rings, inline validation.
  - Right (5 cols): `#18181B` **Direct WhatsApp Fast-Track Card** + hairline-divided **Dual Office Directory** (Head Office at Parimal Chowk, Creative Studio at Mokhdaji Circle, `tabular-nums` phone numbers).
- *Band 2 (`#FFFFFF`)*: Pre-engagement FAQ hairline accordion (`divide-y divide-[#E4E4E7]`).

### (4) Products (`products/index.html`) & Service Detail Pages (`services/seo/index.html`, `services/social-media-marketing/index.html`)
- **`products/index.html`**:
  - *Band 1 (`#F7F6F4`)*: Warm editorial hero with 3 product anchor pills.
  - *Band 2 (`#FFFFFF`)*: **ChatBox 360 Suite** — 5-col narrative & highlights + 7-col 2x3 hairline module matrix.
  - *Band 3 (`#F7F6F4`)*: **Aaj Ka Graphic** — reversed 7/5 split with visual preview frame + 4 capability rows.
  - *Band 4 (`#18181B` Dark Band)*: **Social 360 Suite (AI Platform)** — dark high-contrast SaaS showcase.
  - *Band 5 (`#FFFFFF`)*: Personalized Demo CTA strip.
- **`services/seo/index.html` & `services/social-media-marketing/index.html`**:
  - *Band 1 (`#F7F6F4`)*: **Asymmetric Editorial Split Hero** (left: breadcrumb, Manrope H1, partner badges, CTA; right: `svc_02_seo.jpg` / `svc_01_social.jpg` framed artwork).
  - *Band 2 (`#FFFFFF`)*: **2-Column Typographic Scope List** (`divide-y divide-[#E4E4E7]`) replacing 6 identical cards.
  - *Band 3 (`#F7F6F4`)*: **Stepped Work Process Timeline** (`01`–`05` / `01`–`06` in `JetBrains Mono`).
  - *Band 4 (`#FFFFFF`)*: **Expected Business Outcomes** 5/7 split.
  - *Band 5 (`#18181B` Dark Band)*: Audit / Strategy Call CTA.

### (5) Lower Home (`index.html`), About (`about/index.html`), & `404.html`
- **`index.html` Lower Sections**: Unify `#products`, `#industries`, Testimonials, `#insights`, and `#contact` to `Manrope`; shift the featured `SocialSuite` card in `#products` from heavy `#A83300` orange to `#18181B` deep charcoal with `#E85D2A` accents; refine `#insights` 3-row typographic list and `#contact` conversion block.
- **`about/index.html`**: Unify lower sections (`#our-story`, 3 Pillars, Dual Facilities, Dark CTA) to `Manrope` and convert the 3 Pillars into a hairline-divided editorial grid (`divide-x` on desktop).
- **`404.html`**: Align to `#F7F6F4` warm editorial canvas with Manrope `404` display and hairline-divided 3-link recovery list.

---

## 5. Work & Case Study 4-Role Redesign Spec (Social Panga Reference Adaptation)

Modeled on `socialpanga.com/projects/` and `socialpanga.com/projects/guardians-of-the-heart-2-0-manipal-hospitals/`, adapted to Sphinix's `Manrope`, `JetBrains Mono`, `#F7F6F4` / `#FFFFFF` / `#18181B` / `#ECEBE9` / `#E85D2A` / `#A83300` tokens and `h-[84px]` sticky header. Zero invented copy or metrics (`[ADD ...]` markers preserved).

### 5.1 Work Listing (`work/index.html`)
1. **Compact Split Hero (`bg-[#F7F6F4] pt-32 pb-12 lg:pt-36 lg:pb-14 px-6 border-b border-[#E4E4E7]`)**:
   - Remove the dark flagship `aabo` banner so the filter bar and 4-col grid sit above the fold.
   - `grid-cols-1 lg:grid-cols-12 gap-6 items-end`: Left (`lg:col-span-6`) Manrope `<h1>` (`Selected Work.` / `150+ clients across 15+ industries.`); Right (`lg:col-span-6`) 2-line editorial intro + anchor link to Client Family.
2. **Service Category Filter Bar (`role="tablist"`, `aria-label="Filter projects by service"`)**:
   - Pills: `All` · `Branding` · `Social & Creative` · `Performance Ads` · `SEO & Content` · `Video Production` · `Web & UI/UX`.
   - Active: `bg-[#A83300] text-white border border-[#A83300]`. Inactive: `bg-white border border-[#D4D0C8] text-[#18181B] hover:border-[#A83300] hover:text-[#A83300]`.
   - Deep-link hash support (`#branding`, `#video-production`, etc.).
3. **4-Column Clickable Poster Grid (`bg-[#FFFFFF] py-16 lg:py-20 px-6 border-b border-[#E4E4E7]`)**:
   - `grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-6 gap-y-10`.
   - Every tile is a semantic `<a href="<slug>/index.html" class="project-card group flex flex-col gap-3 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-[#E85D2A] focus-visible:ring-offset-2 rounded-lg">`.
   - Poster frame: `aspect-[4/5] rounded-lg overflow-hidden border border-[#E4E4E7] bg-[#F7F6F4] relative` with `scale-[1.03]` image hover (`duration-300 ease-out`) and desktop-only subtle hover scrim (`hidden lg:flex opacity-0 group-hover:opacity-100 group-focus-visible:opacity-100`).
   - **Touch/Mobile & WCAG Legibility**: Always-visible caption row below the poster (`flex items-baseline justify-between gap-2 pt-0.5`): Client Name (`font-headline font-semibold text-[17px] text-[#18181B] group-hover:text-[#A83300]`) + Service Tag (`font-mono text-[11px] uppercase tracking-[0.06em] text-[#71717A]`) + `north_east` icon (`text-[#A83300]`).
4. **Below-Grid Sections**: Retain ruled 18-brand **Client Family** directory (`bg-[#F7F6F4]`) and **Start A Project** CTA (`bg-[#FFF8F1]`).

### 5.2 Case Study Detail (`work/<slug>/index.html`, starting with `work/aabo/index.html`)
1. **Band 0 — Logo + Brief Split (`bg-[#F7F6F4] pt-32 pb-14 px-6 border-b border-[#E4E4E7]`)**:
   - Breadcrumb (`Home / Work / <Client>`) in `JetBrains Mono 12px`.
   - `grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-center`:
     - Left (`lg:col-span-4`): Clean framed brand lockup card (`bg-white border border-[#E4E4E7] rounded-xl p-8 min-h-[180px] flex items-center justify-center`) + compact meta line (`Client · Industry · Services` in `JetBrains Mono 11.5px`).
     - Right (`lg:col-span-8`): Uppercase mono label (`Case Study · [ADD DISCIPLINE]` in `#A83300`) + Manrope `<h1>` + 1-paragraph `[ADD VERIFIED CAMPAIGN STORY FOR <CLIENT>]`.
2. **Band 1 — `#ECEBE9` 16:9 Editorial Video Showcase (`bg-[#ECEBE9] py-14 lg:py-20 px-6 border-b border-[#E4E4E7]`)**:
   - Centered `max-w-6xl mx-auto aspect-video rounded-xl overflow-hidden bg-[#18181B] border border-[#D4D0C8] relative`:
     - Hybrid stage supporting YouTube/Vimeo `<iframe>` OR HTML5 `<video controls playsinline poster="...">` via `data-video-type` / `data-video-src`.
     - **Clean Fallback/Placeholder UI**: Poster `<img>` + gradient scrim (`from-[#18181B]/80 via-[#18181B]/20 to-transparent`) + centered play button (`w-16 h-16 rounded-full bg-[#A83300] text-white`, `aria-label="Play campaign video"`) + bottom-left mono badge (`[ADD REAL CAMPAIGN VIDEO URL OR MP4]`).
3. **Band 2 — White Full-Width & Multi-Image Gallery (`bg-[#FFFFFF] py-16 lg:py-20 px-6 border-b border-[#E4E4E7]`)**:
   - `max-w-6xl mx-auto flex flex-col gap-6`:
     - Primary full-width `aspect-[16/9]` frame (`rounded-xl overflow-hidden border border-[#E4E4E7] bg-[#F7F6F4]`).
     - Secondary `grid-cols-1 md:grid-cols-2 gap-6` strip of `aspect-[4/3]` frames (`[ADD REAL CAMPAIGN IMAGE]` alt markers).
4. **Band 3 — Horizontal "Our Work" Related Projects Strip (`bg-[#F7F6F4] py-16 lg:py-20 px-6 border-b border-[#E4E4E7]`)**:
   - `max-w-7xl mx-auto flex flex-col gap-8`:
     - Header: `Our Work` + `View All Projects →` link to `../index.html`.
     - Track: `flex lg:grid lg:grid-cols-4 gap-6 overflow-x-auto lg:overflow-visible snap-x snap-mandatory no-scrollbar` — each card (`min-w-[260px] sm:min-w-[280px] lg:min-w-0 snap-start`) links to a sibling `/work/<slug>/index.html` with `aspect-[4/3]` thumbnail, Manrope title, and 2-line `[ADD ...]` summary.
5. **Band 4 — Warm Editorial Closing CTA (`bg-[#FFF8F1] py-16 px-6`)**: `Start A Project →`.

