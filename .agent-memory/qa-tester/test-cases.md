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
