# Known Bugs & Findings

## BUG-QA-01: Header CTA button fails WCAG 2.1 AA normal-text contrast [RESOLVED]
- **Severity**: Medium
- **Affected file**: `c:\Users\hm901\Desktop\sphinix\services\index.html`
- **Resolution**: Verified during Phase 3 Regression QA (2026-11-25) that no `bg-[#E85C27] text-white` CTA buttons remain on `services/index.html` or any other page (only a decorative `play_arrow` icon span in `index.html`).

## BUG-QA-02: Duplicate `id` attributes in `index.html` [RESOLVED]
- **Severity**: Medium
- **Affected file**: `c:\Users\hm901\Desktop\sphinix\index.html`
- **Resolution**: Verified during Phase 3 Regression QA (2026-11-25): `Duplicate IDs files: []` across all 11 HTML pages.

## BUG-QA-03: Missing `<meta name="description">` on `index.html` and `404.html` [RESOLVED]
- **Severity**: Low
- **Affected files**: `c:\Users\hm901\Desktop\sphinix\index.html`, `c:\Users\hm901\Desktop\sphinix\404.html`
- **Resolution**: Verified present on all 11/11 HTML pages during Phase 1 Baseline Audit and Phase 3 Regression QA (2026-11-25).

## BUG-QA-04: Footer newsletter form (`Join`) has no `action` or `submit` handler [RESOLVED]
- **Severity**: Low
- **Affected files**: All 11 HTML pages
- **Resolution**: Verified during Phase 3 Regression QA (2026-11-25) that all 11 pages now attach a `submit` handler to `.newsletter-form` with `e.preventDefault()`, email validation, and `.newsletter-status` feedback.

## BUG-QA-05: Work page `E-Commerce` filter tab yields empty grid with no fallback
- **Severity**: Low
- **Affected file**: `c:\Users\hm901\Desktop\sphinix\work\index.html`
- **Steps to reproduce**: Open `work/index.html` and click the `E-Commerce` filter button (`data-filter="ecommerce"`).
- **Expected vs Actual**: Expected at least one matching `.project-card` or an empty-state message; Actual = `.project-card` `data-category` values are `['iot', 'healthcare', 'industrial', 'jewelry', 'industrial', 'jewelry']` (0 `ecommerce` cards), leaving `#projects-grid` blank with no empty-state feedback.
- **Evidence**: BeautifulSoup selector check on `work/index.html` (2026-11-25).
- **Suggested fix**: Either add an `ecommerce` project card, assign `ecommerce` to an existing relevant card, or render an empty-state message when 0 cards match.
