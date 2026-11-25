# QA Test Strategy — Sphinix Marketing

## Scope
Static multi-page marketing site (11 HTML files) using Tailwind CSS CDN + inline vanilla JS + JSON-LD structured data.

## Verification Pillars
1. **Link & Anchor Integrity**: Verify all relative/root-relative `href` and `src` attributes resolve to existing files and all `#fragment` anchors exist in target HTML.
2. **JS & Structured Data Validity**: Parse all inline `<script>` blocks via Node `vm.Script` and all `application/ld+json` blocks via `JSON.parse`.
3. **Responsive Layout Audit**: Verify mobile-first grid/flex classes (`360px` -> `768px` -> `1280px`), check for unguarded fixed widths `> 320px`, and verify `overflow-x` handling.
4. **Sticky Navigation & Scroll Offset**: Verify sticky header height + sticky sub-nav height match `scroll-mt-[...]` on all anchored sections.
5. **WCAG 2.1 AA Contrast**: Compute luminance contrast ratios for all text/background pairs (4.5:1 normal text, 3.0:1 large text & UI components).
6. **Cross-Page Regression**: Check duplicate `id`s, `<title>`, `<meta name="description">`, and `<img alt>` across all 11 HTML files.
