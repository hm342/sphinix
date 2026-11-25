# Design & UX Issues — Ruthless Critic (Agent 04)

## 1. [CRITICAL — RESOLVED 2026-11-25] 8x Repeating `#A42220` + `#EB9131` + `#E65526` Blocks on `services/index.html`
- **Resolution Verified (Phase 8):** Replaced with alternating `#F7F6F4` / `#FFFFFF` editorial sections (`services/index.html:347–1431`), sticky discipline index rail (`330–341`), flat 12-col deliverables + `#FFF8F1` outcome panels, and responsive Work Process steppers. Remaining minor layout note: `justify-between` on the 5-col `#FFF8F1` outcome panels in sections `02`, `04`, `05`, `06`, `08` pushes short 2-paragraph copy to the bottom, leaving vertical whitespace; `.no-scrollbar` on line 331 is undefined.
- **Original Evidence (historical):** `services/index.html` lines 344–1396 (`#social-media`, `#seo`, `#google-ads`, `#branding`, `#video`, `#ecommerce`, `#email`, `#dev`).
- **Why it looks terrible on a real website:**
  1. **Color-saturation fatigue & simultaneous contrast clash:** `#A42220` (crimson), `#EB9131` (saturated amber), and `#E65526` (flame orange) are three high-chroma warm hues stacked in the same viewport 8 consecutive times (~10,000px+ of continuous red/amber/orange). What works as an isolated 16:9 PDF slide becomes visually exhausting on a scrolling web page.
  2. **Broken figure-ground separation:** The `lg:block h-[46%] bg-[#E65526]` lower band sits directly behind both `#A42220` and `#EB9131` cards. Because all three share the same warm red-orange luminance/hue family, the cards bleed into the background band instead of floating cleanly.
  3. **4-level nested container clutter:** Inside each `#A42220` card sits a `bg-white rounded-xl` box, containing an `#EB9131 rounded-br-xl` header tab, containing `#F1F1F1` bordered pills (`#D6D6D6`), all sitting over `#E65526` over `#F1F1F1`.
  4. **Cookie-cutter AI-slop & unbalanced right column:** All 8 sections use the exact same `col-span-7` + `col-span-5 lg:-ml-8 lg:mt-20` overlap. Section 01 has 4 icon-rows in the amber card; sections 02, 04–08 only have 1 icon + 1–2 paragraphs, leaving huge empty amber space. Sections 04–08 also lack partner badges/explore links, leaving empty header gaps.
  5. **Cramped Work Process grid:** `lg:grid-flow-col lg:auto-cols-fr` in `max-w-6xl` alongside `max-w-md` note text squeezes 6 steps (`social-media` lines 471–497, `email` lines 1244–1269) into ~110px columns, forcing 3–4 line wraps.
  6. **Design system schizophrenia:** `services/index.html` uses `#F1F1F1`, `#A42220`, `#EB9131`, `#E65526` (none defined in `tailwind.config`), while `index.html`, `services/seo/index.html`, and `services/social-media-marketing/index.html` use `#F7F6F4` / `#FFFFFF` / `#18181B` / `#E85D2A` / `#A83300`.
- **Recommended Translation of PDF Hierarchy:**
  - Keep the PDF's *structural grammar* (numbered index `01`–`08`, deliverables list, tool stack, linear process) without literal slide-deck color-flooding.
  - Group or index via outcome-based jump nav (`DESIGN.md` §4.3) or sticky side index.
  - Alternate `#F7F6F4` (warm stone) and `#FFFFFF` (white) surfaces with `1px solid #E4E4E7` hairlines; reserve `#A42220` (ember) / `#1C1C1E` (charcoal) for at most 1–2 focal bands, and use `#E85D2A` / `#A83300` as hairline/icon/badge accents rather than 8 full-bleed slabs.
  - Flatten the 4-layer nested card into a clean 2-column editorial split (deliverables + inline tool tags on left; outcome/process stepper on right).

## 2. [HIGH] WCAG AA Contrast Failures Across All Pages
- **Evidence:**
  - `White (#FFFFFF)` on `#E85C27` = **3.51:1** (fails WCAG AA 4.5:1 for normal text). Used on:
    - Header `Partner With Us` button (`index.html:318`, `services/index.html:268`, all subpages).
    - Hero `Partner With Us` button (`index.html:409`).
    - Hero `9+ Yrs` stat card body text `14px/15px` (`index.html:374, 384`).
    - Contact form `Submit Inquiry` button (`contact/index.html:390`).
  - `#E85C27` logo subtitle `Marketing` (`10px`!) on `#FFF8F1` / `#FFFFFF` = **3.31:1 / 3.51:1** (`index.html:212`, `services/index.html:162`).
  - `#E85C27` nav link hover on `#F4E8D5` (`#nav-pill`) = **2.90:1** (fails even 3:1!).
  - `#E85D2A` (`brand-orange`) on `#FFF8F1` (`index.html:401`, `services/index.html:320`) = **3.31:1**; on `#F7F6F4` (`index.html:511, 691`) = **3.22:1**; on `#FFFFFF` (`index.html:430, 537`) = **3.48:1**. Note `sphinix_marketing_design_system.md:12` explicitly specifies `#A83300` (`light-primary`) for interactive/text contrast, yet `#E85C27`/`#E85D2A` is used on buttons and small text anyway.
- **Fix:** Use `#A83300` (7.17:1 with white) or `#B83B0A` / `#202020` for all button fills with white text and small text/links; restrict `#E85D2A` strictly to large display accents (`>=24px` bold) or decorative borders/icons on dark `#1C1C1E` surfaces.

## 3. [HIGH] Dead Interactive Controls & Fake Affordances (`index.html` & Footer)
- **Evidence:**
  - `index.html:821`: Play button (`aria-label="Play Sphinix Marketing agency showreel"`) has **zero JS event listener** — clicking it does nothing.
  - `index.html:534–671`: All 8 service cards in `#services` display `north_east` arrow icons implying links, yet are `<article>` elements with no `<a>` tags.
  - `index.html:1079–1105`: All 3 "Our Insights" articles display `north_east` arrow icons with no `<a>` links.
  - `index.html:717–798`: 15 of 16 client cards are non-interactive `<div>`s; only `aabo.` is a link.
  - `index.html:1192`, `services/index.html:1461` (and subpages): Footer newsletter `<form onsubmit="event.preventDefault();">` silently swallows submissions with no validation or user feedback.
- **Fix:** Wire `#agency-reel` to a real video modal or remove the fake play button; wrap service cards and insight rows in real `<a>` links to `/services/...` and `/blog/`; either connect the newsletter form or replace it with a direct contact/WhatsApp link.

## 4. [MEDIUM] Missing Primary Conversion Path (WhatsApp) on `index.html` & `services/index.html`
- **Evidence:** `DESIGN.md` §1 & §3 state the primary job of the site is getting SMB visitors to start a WhatsApp chat or request a proposal within 90s, with `Chat on WhatsApp` as the primary header CTA. Neither `index.html` nor `services/index.html` has any WhatsApp link in the header, hero, or footer (only `contact/index.html:426` has it).
- **Fix:** Add a persistent WhatsApp CTA in the header/hero or floating/footer action bar.

## 5. [MEDIUM] Copy, Naming & Detail Inconsistencies
- **Evidence:**
  - Product name appears 3 ways on `index.html`: `Social 360` (`index.html:496`), `SocialSuite` (`index.html:890`), and `SocialSuite AI` (`index.html:1183`).
  - Head Office address omits pin code `364001` on `index.html:1164` but includes it on `services/index.html:1433`.
  - `index.html:1133` `Partner With Us` uses `mailto:info@sphinixmarketing.com`, whereas header/mobile `Partner With Us` links to `contact/index.html`.
  - `services/index.html:350–1282`: Only 2 of 8 services (`social-media`, `seo`) have dedicated subpages and "Explore ... Service" links; the other 6 lack subpages despite `DESIGN.md` §3 listing all 8 routes.
