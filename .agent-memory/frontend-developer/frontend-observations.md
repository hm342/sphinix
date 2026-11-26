# Frontend & UI/UX Observations — Full 11-Page Audit (Agent 02)

## Audit Scope (2026-11-25)
Inspected all 11 HTML pages and all 14 assets in `c:\Users\hm901\Desktop\sphinix\images\`:
- **Updated/Partially Updated (Manrope present)**: `index.html` (1,849 lines), `about/index.html` (736 lines), `services/index.html` (1,103 lines).
- **Legacy Subpages (Still on `bg-[#202020]` hero + `Plus Jakarta Sans` only)**: `work/index.html` (780 lines), `work/aabo/index.html` (638 lines), `blog/index.html` (703 lines), `contact/index.html` (704 lines), `products/index.html` (737 lines), `services/seo/index.html` (709 lines), `services/social-media-marketing/index.html` (696 lines), `404.html` (515 lines).

## Key Findings
1. **Severe Visual & Typographic Split Across Site**:
   - `index.html` (hero/upper sections), `about/index.html` (hero), and `services/index.html` (entire page) use **Manrope**, warm `#F7F6F4` / `#FFF8F1` surfaces, and editorial restraint.
   - All 8 remaining pages (`work`, `work/aabo`, `blog`, `contact`, `products`, `services/seo`, `services/social-media-marketing`, `404`) still load `Plus Jakarta Sans` without `Manrope` and use the heavy dark `bg-[#202020]` + `subpage_hero_agency.jpg` banner.
2. **Underutilized Image Assets (12 of 14 Unused on Subpages)**:
   - The 7 content subpages only reference `sphinix_logo.webp` and `subpage_hero_agency.jpg`.
   - High-resolution assets (`svc_01_social.jpg` through `svc_08_dev.jpg`, `impact_collaboration.jpg`, `video_showcase_reel.jpg`, `insight_featured_card.jpg`, `hero_agency_team.jpg`) are completely absent from `work/index.html`, `work/aabo/index.html`, `blog/index.html`, `products/index.html`, `services/seo/index.html`, and `services/social-media-marketing/index.html`.
3. **Repetitive Card-Grid Fatigue**:
   - `work/index.html` renders 6 identical text-only `rounded-xl` cards with zero project imagery.
   - `blog/index.html` renders 6 identical `rounded-xl` article cards instead of an editorial publication list.
   - `services/seo/index.html` and `services/social-media-marketing/index.html` repeat 6-card / 4-card grids.
   - `index.html` lower sections (`#products`, `#insights`, `#contact`) still use `Plus Jakarta Sans` and an overly saturated `#A83300` full-bleed card for `SocialSuite`.
4. **Contact & 404 Hero Friction**:
   - `contact/index.html` puts a tall `pt-36 pb-20` dark hero above the consultation form, pushing the primary conversion form below the fold on laptops.
   - `404.html` still uses the old styling without Manrope editorial consistency.

---

## Phase 3 Design Review — Work & 6 Case Study Detail Pages (2026-11-26)
Inspected `work/index.html` and all 6 detail pages (`work/aabo/index.html`, `work/weconnect-care/index.html`, `work/saurashtra-group/index.html`, `work/veer-jewellers/index.html`, `work/kothari-agencies/index.html`, `work/riyom-jewels/index.html`).

### Issues Found
1. **CRITICAL — `work/index.html` Still Uses Legacy Layout (Not Yet Migrated to Section 5 Spec)**:
   - Still renders the dark `bg-[#18181B]` flagship `aabo.` banner (`L334–359`) above the grid, pushing the portfolio grid below the fold.
   - Still uses 5 industry filter tabs (`L323–330`) instead of the 7 discipline tabs (`All`, `Branding`, `Social & Creative`, `Performance Ads`, `SEO & Content`, `Video Production`, `Web & UI/UX`).
   - Still uses a 3-column `aspect-[16/10]` grid (`L364`, `lg:grid-cols-3`) instead of the 4-column `aspect-[4/5]` clickable poster grid (`lg:grid-cols-4`).
   - Cards 2–6 (`WeConnect Care`, `Saurashtra Group`, `Veer Jewellers`, `Kothari Agencies`, `Riyom Jewels`) are unlinked `<div>` cards and do not link to the 5 newly created `work/<slug>/index.html` pages.
2. **MEDIUM — Excessive Top Padding on All 6 Detail Pages (`-mt-[84px]` Omitted)**:
   - `work/aabo/index.html` (and all 5 siblings) has `<main id="main-content" class="flex-1">` without `-mt-[84px]`, combined with `pt-28 sm:pt-32 lg:pt-36` on Band 0 (`L310`). Because `#site-header` is `sticky top-0 h-[84px]`, this creates `196px`–`228px` of combined top space above the breadcrumb on desktop. Either add `-mt-[84px]` to `<main>` (matching `work/index.html`) or reduce Band 0 top padding to `pt-10 lg:pt-14`.
3. **LOW — Video Stage Play Affordance & Mobile Scrollbar Polish on 6 Detail Pages**:
   - `.case-video-stage` (`L364–374`) renders a text-only dark box without a centered play icon (`play_arrow`) affordance for the empty/poster state.
   - Band 3 `Our Work` horizontal track (`L432`) omits `no-scrollbar` on mobile horizontal scroll.
