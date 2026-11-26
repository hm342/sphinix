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

## 2026-11-26 — Phase 3 QA Execution (Work Redesign & 6 Case Study Pages, 16-Page Regression)
- **Tester**: Agent 03 (QA Engineer / Software Tester)
- **Commands Executed**:
  - `node C:\Users\hm901\.gemini\antigravity\brain\c79e1df5-b38b-43a8-8063-27e926415293\scratch\verify-site.js`
  - `python C:\Users\hm901\.gemini\antigravity\brain\3aa6d207-8324-4953-9924-0fe9417be4f0\scratch\qa_work_exec.py`
  - `node C:\Users\hm901\.gemini\antigravity\brain\3aa6d207-8324-4953-9924-0fe9417be4f0\scratch\qa_video_hydrator_test.mjs`
- **Result**: PARTIAL / FAIL ON `work/index.html` (`BUG-QA-06`, `BUG-QA-07`, `BUG-QA-08`, `BUG-QA-09`). All 6 `work/<slug>/index.html` case studies + 16-page regression (`verify-site.js`: 16 files, 32 images, 801 links+anchors, 0 errors; 0/33 JS syntax errors; 0 dup IDs; video hydrator PASS) passed. `work/index.html` still lacks clickable links on 5/6 cards, uses `===` on multi-category `data-category`, lacks `role="tab"`/keyboard/hash behavior, and uses `lg:grid-cols-3`.

## 2026-11-26 — Phase 4 Final QA Re-Test (Work Redesign & 16-Page Regression)
- **Tester**: Agent 03 (QA Engineer / Software Tester)
- **Commands Executed**:
  - `node C:\Users\hm901\.gemini\antigravity\brain\c79e1df5-b38b-43a8-8063-27e926415293\scratch\verify-site.js`
  - `python C:\Users\hm901\.gemini\antigravity\brain\3aa6d207-8324-4953-9924-0fe9417be4f0\scratch\qa_work_exec.py`
  - Inline JS + `verify-site.js` verification via `node -e`
- **Result**: PASS (`Checked 16 files | 25 images | 809 links+anchors | Errors: 0`; `0 / 33` JS syntax errors; `0` dup IDs; `BUG-QA-05`–`BUG-QA-08` resolved; `lg:grid-cols-4` & `dirIndexCheck` resolved; `TC-W01`–`TC-W12` all PASS).

## 2026-11-26 — Final QA Execution (Updated Spec: 3:4 Image Cards, 24 Work PNGs, #case-gallery Slider, Other Work)
- **Tester**: Agent 03 (QA Engineer / Software Tester)
- **Commands Executed**:
  - `node C:\Users\hm901\.gemini\antigravity\brain\c79e1df5-b38b-43a8-8063-27e926415293\scratch\verify-site.js`
  - `python C:\Users\hm901\.gemini\antigravity\brain\3aa6d207-8324-4953-9924-0fe9417be4f0\scratch\qa_work_exec.py`
  - `node C:\Users\hm901\.gemini\antigravity\brain\3aa6d207-8324-4953-9924-0fe9417be4f0\scratch\qa_gallery_slider_test.mjs`
- **Result**: PASS (`Checked 16 files | 73 images | 809 links+anchors | Errors: 0`; 24/24 valid PNGs in `images/work/`; 6/6 `aspect-[3/4]` image-only cards on `work/index.html` with `aria-label`, `alt`, `text_len=0`; `#case-gallery` slider JS passed all wraparound/dots/keyboard/touch assertions in Node `vm`; 6/6 case studies have 4 valid 3:4 "Other Work" sibling links with 0 self-links).
