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
