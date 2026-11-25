# Known Bugs & Findings

## BUG-QA-01: Header CTA button fails WCAG 2.1 AA normal-text contrast
- **Severity**: Medium
- **Affected file**: `c:\Users\hm901\Desktop\sphinix\services\index.html` (lines 268, 303)
- **Steps to reproduce**: Inspect "Partner With Us" button (`bg-[#E85C27] text-white`, `14px font-semibold`).
- **Expected vs Actual**: Expected contrast >= 4.5:1 for 14px normal text; Actual = **3.51:1** (`#FFFFFF` on `#E85C27`).
- **Evidence**: Computed via relative luminance formula in `services_deep_check.mjs`. Note line 1447 CTA banner already uses `bg-[#A83300] text-white` (`6.69:1` PASS).
- **Suggested fix**: Change `bg-[#E85C27]` on white-text CTA buttons (lines 268, 303) to `bg-[#A83300]` (matching `light-primary` token and line 1447).

## BUG-QA-02: Duplicate `id` attributes in `index.html`
- **Severity**: Medium
- **Affected file**: `c:\Users\hm901\Desktop\sphinix\index.html`
- **Steps to reproduce**: Parse all `id="..."` attributes in `index.html`.
- **Expected vs Actual**: Expected unique IDs; Actual = `button-primary` (x2), `button-icon` (x6), `card-elevated` (x8).
- **Evidence**: `qa_retest.mjs` section 4 output.
- **Suggested fix**: Convert repeated component IDs to classes or remove duplicate `id` attributes.

## BUG-QA-03: Missing `<meta name="description">` on `index.html` and `404.html`
- **Severity**: Low
- **Affected files**: `c:\Users\hm901\Desktop\sphinix\index.html`, `c:\Users\hm901\Desktop\sphinix\404.html`
- **Steps to reproduce**: Check `<head>` for `<meta name="description">`.
- **Expected vs Actual**: Expected meta description on all pages (present on 9/11 pages); Actual = missing on `index.html` and `404.html`.
- **Evidence**: `qa_retest.mjs` section 6 output.
- **Suggested fix**: Add `<meta name="description" content="...">` to `index.html` and `404.html`.
