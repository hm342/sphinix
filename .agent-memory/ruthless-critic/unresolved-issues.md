# Unresolved Issues — Ruthless Critic (Agent 04)

- [x] **CRITICAL (RESOLVED 2026-11-25):** Redesign `services/index.html` to eliminate the 8x repeating `#A42220` + `#EB9131` + `#E65526` blocks, 4-level nested containers, cramped 6-col process grids, and design-system mismatch with `index.html` and subpages.
- [ ] **CRITICAL:** Replace `cdn.tailwindcss.com` runtime JIT across all 11 HTML files (including `services/index.html:8`) with precompiled CSS.
- [ ] **HIGH:** Fix WCAG AA contrast failures (`#FFFFFF` on `#E85C27` = 3.51:1, `#E85C27` on `#F4E8D5` = 2.90:1, `10px` `#E85C27` logo subtitle, `#E85D2A` on light surfaces, `#71717A` on `#F7F6F4` ~4.47:1).
- [ ] **HIGH:** Fix dead interactive controls on `index.html` (non-functional `#agency-reel` play button, non-clickable service cards with `north_east` arrows, non-clickable insight rows) and silent `preventDefault()` newsletter form (`index.html:1192`, `services/index.html:1496`).
- [ ] **HIGH:** Deduplicate ~445 lines/page of inline config/header/footer/JS and remove/clean up the 31 orphaned files in `css/` and `js/`.
- [ ] **MEDIUM:** Add WhatsApp primary conversion path on `index.html` and `services/index.html` per `DESIGN.md`.
- [ ] **MEDIUM:** Standardize product naming (`SocialSuite` vs `SocialSuite AI` vs `Social 360`), footer address (`364001`), and `Partner With Us` destinations; build or remove references to the 6 missing service subpages.
- [ ] **MEDIUM:** Fix `justify-between` vertical whitespace gap in `services/index.html` 5-col `#FFF8F1` outcome panels (`#seo`, `#branding`, `#video`, `#ecommerce`, `#dev`), define `.no-scrollbar` for the sticky discipline rail (`services/index.html:331`), and add `<nav>`/role to `#mobile-menu`.
- [ ] **MEDIUM:** Remove Stitch export artifacts (`data-stitch-*`, `module.exports`) and add `<meta name="description">` to `index.html`.
- [x] **CRITICAL (Phase 1 Audit — RESOLVED 2026-11-25):** Replace the 7 identical dark `subpage_hero_agency.jpg` hero banners (`services/seo`, `services/social-media-marketing`, `work`, `work/aabo`, `products`, `blog`, `contact`) with distinct editorial hero treatments (keeping `about` Hero intact).
- [x] **HIGH (Phase 1 Audit — RESOLVED 2026-11-25):** Unify typography on `Manrope` + `JetBrains Mono` across all 11 HTML pages (`Plus Jakarta Sans` removed).
- [x] **HIGH (Phase 1 Audit — RESOLVED 2026-11-25):** Eliminate repetitive AI-slop `label + heading + box-grid` sections, 7x verbatim `bg-brand-charcoal` CTA slabs, cramped `lg:grid-cols-6` on `services/social-media-marketing/index.html`, and conflicting `text-white`/`text-light-on-surface` classes on dark filter pills.
- [x] **HIGH (Phase 1 Audit — RESOLVED 2026-11-25):** Fix dead affordances on `blog/index.html` (6 article cards now link to relevant destinations; `alert()` replaced with inline status validation) and `work/index.html` (visual portfolio grid + ruled client directory).
- [x] **MEDIUM (Phase 1 Audit — RESOLVED 2026-11-25):** Fix weak dark/light visual rhythm across subpages and `contact/index.html` (now `#F7F6F4` FAQ -> `#FFFFFF` footer).
- [ ] **CRITICAL (Phase 3 Regression):** `products/index.html:553` has `text-light-on-secondary/80` (`#FFFFFF` at 80%) on `bg-[#FFF8F1]` cream background (~1.04:1 contrast — illegible).
- [ ] **HIGH (Phase 3 Regression):** `services/social-media-marketing/index.html:473` has an unclosed `<section class="py-20 px-6 bg-light-surface border-b border-light-outline-variant">` wrapping `<section class="py-20 px-6 bg-[#18181B]...">` (`<section>:6` vs `</section>:5`).
- [ ] **HIGH (Phase 3 Contrast):** `bg-[#E85D2A] text-white` buttons (`index.html:1357`, `blog/index.html:527`, `products/index.html:510`) fail WCAG AA at 3.51:1 for 14px–15px text. (`work/index.html:351` and `work/aabo/index.html:513` fixed to `#A83300`).
- [x] **HIGH (Work Redesign — RESOLVED 2026-11-26):** `work/index.html` rebuilt to `lg:grid-cols-4` clickable typographic poster grid linking all 6 case studies + Client Family featured links, dark banner and all 7 stock images removed, always-visible captions + `#A83300` contrast + `h-[84px]` header + non-interactive `.case-video-stage` verified across all 7 pages.

