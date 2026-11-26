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

## BUG-QA-05: Work page `E-Commerce` filter tab yields empty grid with no fallback [RESOLVED]
- **Severity**: Low
- **Affected file**: `c:\Users\hm901\Desktop\sphinix\work\index.html`
- **Resolution**: Verified during Phase 4 Final QA Re-Test (2026-11-26): `ecommerce` now matches 2 cards (`Veer Jewellers`, `Kothari Agencies`) via `.split(/\s+/).includes()`.

## BUG-QA-06: 5 of 6 project cards on `work/index.html` are not clickable links to their case study pages [RESOLVED]
- **Severity**: High
- **Affected file**: `c:\Users\hm901\Desktop\sphinix\work\index.html`
- **Resolution**: Verified during Phase 4 Final QA Re-Test (2026-11-26): all 6 `.project-card` tiles link to their respective `<slug>/index.html` (`TC-W03 Missing card targets: []`).

## BUG-QA-07: `work/index.html` filter JS uses `===` on multi-category `data-category` attributes [RESOLVED]
- **Severity**: High
- **Affected file**: `c:\Users\hm901\Desktop\sphinix\work\index.html`
- **Resolution**: Verified during Phase 4 Final QA Re-Test (2026-11-26): filter JS uses `.split().includes()`, matching `all:6, iot:1, healthcare:1, ecommerce:2, industrial:2, jewelry:2`.

## BUG-QA-08: `work/index.html` filter tabs missing `role="tab"`, `aria-selected`, `aria-controls`, keyboard nav, and URL hash support [RESOLVED]
- **Severity**: Medium
- **Affected file**: `c:\Users\hm901\Desktop\sphinix\work\index.html`
- **Resolution**: Verified during Phase 4 Final QA Re-Test (2026-11-26): all 6 `.filter-btn` tabs have `role="tab"`, `aria-selected`, `aria-controls="projects-grid"`, `ArrowLeft`/`ArrowRight`/`Home`/`End` handlers, and `hashchange` sync.

## BUG-QA-09: `verify-site.js` lacks `application/ld+json` exclusion (`lg:grid-cols-4` & `dirIndexCheck` RESOLVED)
- **Severity**: Low
- **Affected file**: `C:\Users\hm901\.gemini\antigravity\brain\c79e1df5-b38b-43a8-8063-27e926415293\scratch\verify-site.js`
- **Resolution**: `work/index.html` `#projects-grid` updated to `grid-cols-1 sm:grid-cols-2 lg:grid-cols-4` and `verify-site.js` directory `index.html` check (`isDirectory()`) added. Only `application/ld+json` exclusion in `scriptRegex` remains optional if JSON-LD is added to future pages.
