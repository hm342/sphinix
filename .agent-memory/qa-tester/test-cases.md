# QA Test Cases — Phase 7 Re-Test (`services/index.html` & Regression)

| ID | Test Case | Scope | Status |
|---|---|---|---|
| TC-01 | All 8 required anchor IDs (`#social-media`, `#seo`, `#google-ads`, `#branding`, `#video`, `#ecommerce`, `#email`, `#dev`) present & unique in `services/index.html` | `services/index.html` | PASS (count=1 each) |
| TC-02 | All site links pointing to `services/index.html` or its `#anchors` resolve cleanly | All 11 HTML files | PASS (0 broken links) |
| TC-03 | Inline JS syntax & JSON-LD validity | All 11 HTML files | PASS (0 JS errors, 0 JSON-LD errors) |
| TC-04 | Responsive grid classes at 360px / 768px / 1280px & horizontal overflow check | `services/index.html` | PASS (27 grids mobile-first; `overflow-x-auto` on sticky rail; `overflow-x-clip` on hero) |
| TC-05 | Sticky nav bar offset (`scroll-mt-[126px]`) vs header (`72px`) + discipline rail (`~54px`) | `services/index.html` | PASS (all 8 sections have `scroll-mt-[126px]`) |
| TC-06 | WCAG 2.1 AA contrast audit on `services/index.html` | `services/index.html` | FAIL (header CTA `bg-[#E85C27] text-white` = 3.51:1 < 4.5:1) |
| TC-07 | Regression: duplicate IDs, missing `alt`, missing `meta[name="description"]` | All 11 HTML files | PARTIAL (`index.html` has 16 duplicate IDs; `index.html` & `404.html` lack meta description) |

# QA Test Cases — Work & Case Study Redesign (16 Pages)

| ID | Category | Test Case & Acceptance Criteria | Scope | Status |
|---|---|---|---|---|
| TC-W01 | Relative Paths | All depth-2 asset paths (`../../images/...`, favicon, CSS/JS) resolve to existing files >= 1KB (or valid SVG) | 6 `work/<slug>/index.html` | PASS (0 bad_imgs across all 6 pages) |
| TC-W02 | Relative Paths | Back-links (`../index.html`), header/footer nav (`../../...`), and bottom "Our Work" sibling links (`../<sibling>/index.html`) resolve to existing `index.html` files (no self-link dead ends, no directory-only missing `index.html`) | 6 `work/<slug>/index.html` | PASS (0 self-links, 4 valid sibling links + `../index.html` per page) |
| TC-W03 | Relative Paths | Every project tile on `work/index.html` is a clickable `<a href="<slug>/index.html">` pointing to all 6 case study pages | `work/index.html` | PASS (`BUG-QA-06` resolved; 0 missing card targets across all 6 cards) |
| TC-W04 | Filter Tabs A11y | Filter container has `role="tablist"`; each `<button type="button" data-filter="...">` has `role="tab"`, `aria-selected="true\|false"`, `aria-controls="projects-grid"`, visible focus ring, and `ArrowLeft`/`ArrowRight`/`Home`/`End` keyboard support | `work/index.html` | PASS (`BUG-QA-08` resolved; 6 `role="tab"` buttons + `aria-selected` + `aria-controls` + keyboard nav) |
| TC-W05 | Filter Logic & Hash | Every discipline filter pill (`all` + all discipline tabs) matches >= 1 `.project-card` (supporting multi-tag `data-category`) OR renders an accessible empty-state message; URL hash (`#branding`, etc.) filters on load + `hashchange` and updates cleanly | `work/index.html` | PASS (`BUG-QA-07` resolved; `.split().includes()` + `hashchange`; coverage `all:6, iot:1, healthcare:1, ecommerce:2, industrial:2, jewelry:2`) |
| TC-W06 | Video A11y | 16:9 `aspect-video` showcase stage uses either `<iframe title="..." allowfullscreen loading="lazy">`, `<video controls playsinline poster="../../images/...">`, or an accessible poster frame (`alt` non-empty, `<button type="button" aria-label>` if interactive, no autoplay with sound) | 6 `work/<slug>/index.html` | PASS (hydrator verified in Node `vm` for empty, YouTube, Vimeo, MP4+poster) |
| TC-W07 | Contrast (AA) | Active filter pill uses `bg-[#A83300] text-white` (6.69:1 >= 4.5:1), NOT `bg-[#E85D2A] text-white` (3.49:1 FAIL). Small mono labels/tags on `#FFFFFF`/`#F7F6F4` use `#A83300` (>= 6.1:1) or `#52525B` (>= 7.0:1), NOT `#E85D2A` (3.23:1 FAIL) | `work/index.html` + 6 case studies | PASS (`e85_white=[]`; `text-[#E85D2A]` only on large `<h1>` span) |
| TC-W08 | Contrast (Tiles) | Project tile title + service tag overlay/footer maintains >= 4.5:1 contrast and remains readable on touch devices without hover | `work/index.html` | PASS (text below image on `#FFFFFF` uses `#18181B`/`#52525B`) |
| TC-W09 | Responsive 360px | At 360px: `grid-cols-1` project grid, filter pills wrap/scroll without `scrollWidth > 360`, top split & 2-up gallery stack to 1 col, bottom "Our Work" `overflow-x-auto snap-x` strip does not cause body horizontal overflow | `work/index.html` + 6 case studies | PASS |
| TC-W10 | Responsive 768px | At 768px: `sm:grid-cols-2` project grid, `md:grid-cols-2` secondary image strip, no clipped text or overlapping header | `work/index.html` + 6 case studies | PASS (`sm:grid-cols-2` & `md:grid-cols-2` present) |
| TC-W11 | Responsive 1280px | At 1280px: `lg:grid-cols-4` project grid, `lg:col-span-4` + `lg:col-span-8` case study header split, `max-w-6xl` media stages, `lg:grid-cols-4` bottom "Our Work" strip, `h-[84px]` header intact | `work/index.html` + 6 case studies | PASS (`lg:grid-cols-4` verified on `work/index.html` + all 6 case studies) |
| TC-W12 | Regression & Tooling | `verify-site.js` updated with all 16 routes, checks `index.html` inside directory links, 0 JS syntax errors, 0 duplicate IDs, 0 missing `alt`/`<title>`/`meta[name="description"]` | All 16 HTML files + `verify-site.js` | PASS (16 files 0 errors, 0 dup IDs, 0/33 JS errors; note `verify-site.js` `application/ld+json` exclusion remains optional) |
