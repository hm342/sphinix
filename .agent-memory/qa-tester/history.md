# QA History

## 2026-11-25 — Phase 7 Re-Test (`services/index.html` & 11-page Regression)
- **Tester**: Agent 03 (QA Engineer / Software Tester)
- **Commands Executed**:
  - `node C:\Users\hm901\.gemini\antigravity\brain\78d0569e-b214-46a9-bab8-d1a7894bea59\scratch\qa_retest.mjs`
  - `node C:\Users\hm901\.gemini\antigravity\brain\78d0569e-b214-46a9-bab8-d1a7894bea59\scratch\services_deep_check.mjs`
- **Result**: PASS WITH FINDINGS (0 broken links, 0 JS syntax errors, 0 JSON-LD errors, 8/8 service anchors & `scroll-mt-[126px]` verified, responsive grids verified; 3 findings logged: BUG-QA-01, BUG-QA-02, BUG-QA-03).

## 2026-11-25 — Phase 1 Baseline QA & Asset Audit (All 11 Pages + `images/`)
- **Tester**: Agent 03 (QA Engineer / Software Tester)
- **Commands Executed**:
  - `node C:\Users\hm901\.gemini\antigravity\brain\3e5aa111-d0c2-4bde-ac93-7b09f8de783f\scratch\baseline_audit.mjs`
  - `node C:\Users\hm901\.gemini\antigravity\brain\3e5aa111-d0c2-4bde-ac93-7b09f8de783f\scratch\detail_audit.mjs`
- **Result**: BASELINE CATALOGED (`baseline-audit.md`). 0 broken links, 0 broken images, 0 JS syntax errors, 14/14 `images/` assets active, 11/11 pages have `<title>` & `<meta name="description">`. Logged BUG-QA-04 (footer newsletter form) and marked BUG-QA-03 resolved.

## 2026-11-25 — Phase 3 Regression QA (All 11 Pages Post-Redesign)
- **Tester**: Agent 03 (QA Engineer / Software Tester)
- **Commands Executed**:
  - `python C:\Users\hm901\.gemini\antigravity\brain\3aa6d207-8324-4953-9924-0fe9417be4f0\scratch\qa_phase3_audit.py`
  - `node C:\Users\hm901\.gemini\antigravity\brain\3aa6d207-8324-4953-9924-0fe9417be4f0\scratch\qa_js_and_summary.mjs`
  - `node C:\Users\hm901\.gemini\antigravity\brain\3aa6d207-8324-4953-9924-0fe9417be4f0\scratch\qa_widgets.mjs`
- **Result**: PASS WITH 1 LOW FINDING (`BUG-QA-05`). 11/11 pages verified: 0 broken links, 0 broken fragments, 0 broken images (including `data-service-img` x8), 0 broken local assets, 0 JSON-LD errors, 0/23 inline JS syntax errors, 0 duplicate IDs, 0 missing JS DOM targets. `Manrope` + `viewport` + responsive classes verified across all 11/11 pages. `BUG-QA-01`, `BUG-QA-02`, `BUG-QA-04` verified resolved.
