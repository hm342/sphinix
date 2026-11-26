# QA Test Strategy — Sphinix Marketing

## Scope
Static multi-page marketing site (11 baseline HTML files expanding to 16 HTML files with 6 clickable case study pages under `work/<slug>/index.html`) using Tailwind CSS CDN + inline vanilla JS + JSON-LD structured data.

## Verification Pillars
1. **Link, Depth & Anchor Integrity**: Verify all relative/root-relative `href` and `src` attributes resolve to existing files (depth 0 `index.html`, depth 1 `work/index.html` -> `<slug>/index.html`, depth 2 `work/<slug>/index.html` -> `../../images/`, `../index.html`, `../<sibling>/index.html`) and all `#fragment` anchors exist in target HTML.
2. **JS & Structured Data Validity**: Parse all inline JS `<script>` blocks via Node `vm.Script` (excluding `application/ld+json`) and all `application/ld+json` blocks via `JSON.parse`. Verify `verify-site.js` covers all 16 routes.
3. **Interactive Widgets & Filter Accessibility**: Verify `role="tablist"` / `role="tab"` / `aria-selected` / keyboard navigation, `data-filter` vs `data-category` 100% coverage (no empty-filter dead ends), and URL hash deep-linking (`#filter` on load + `hashchange`).
4. **Video Embed / Player Accessibility**: Verify `aspect-video` 16:9 stage, `<iframe title>` / `<video controls playsinline poster>` / keyboard-accessible poster fallback, and `prefers-reduced-motion`.
5. **Responsive Layout Audit**: Verify mobile-first grid/flex classes (`360px` -> `768px` -> `1280px`), check for unguarded fixed widths `> 320px`, and verify `overflow-x-auto snap-x` strips do not cause page-level horizontal overflow.
6. **Sticky Navigation & Scroll Offset**: Verify `h-[84px]` header consistency across all 16 pages and sticky sub-nav `scroll-mt-[...]` on anchored sections.
7. **WCAG 2.1 AA Contrast**: Compute luminance contrast ratios for all text/background pairs (4.5:1 normal text, 3.0:1 large text & UI components). Flag `#E85D2A` on light surfaces for small/normal text (`3.23:1`–`3.49:1` FAIL); require `#A83300` (`6.1:1`–`6.69:1` PASS) for small labels and white-text pills.
8. **Cross-Page Regression**: Check duplicate `id`s, `<title>`, `<meta name="description">`, and `<img alt>` across all 16 HTML files.
