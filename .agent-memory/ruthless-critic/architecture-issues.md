# Architecture Issues — Ruthless Critic (Agent 04)

## 1. [CRITICAL] Production Reliance on `cdn.tailwindcss.com` Play CDN Across All 11 HTML Files
- **Evidence:** Every HTML page (`index.html:5`, `services/index.html:8`, `services/seo/index.html:8`, `services/social-media-marketing/index.html:8`, `about/index.html`, `work/index.html:8`, `work/aabo/index.html`, `products/index.html`, `blog/index.html`, `contact/index.html`, `404.html`) loads `<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>` and runs an inline ~100-line `tailwind.config` at runtime.
- **Impact:**
  - Tailwind Play CDN is explicitly not for production: it ships a ~300KB+ runtime JS compiler that parses the DOM and generates CSS on the client on every page load, causing FOUC and poor INP/LCP on mid-range Android devices over 4G (`DESIGN.md` §1 target audience).
  - Completely bypasses caching of compiled CSS across page navigations.
- **Fix:** Compile Tailwind CSS at build time into a single minified stylesheet (e.g., `css/app.css`) or unify with the existing CSS architecture.

## 2. [HIGH] Massive Code Duplication (~445 Lines per Page) & 31 Orphaned `css/` + `js/` Files
- **Evidence:**
  - `localCSS: false` and `mainJS: false` across all 11 HTML pages.
  - Meanwhile, `css/style.css` (18.4 KB), `css/tokens.css` (4.1 KB), 15 files in `css/components/`, `js/main.js` (6.2 KB), and 12 files in `js/components/` sit completely unused in the repository.
  - Every HTML file duplicates ~100 lines of `tailwind.config`, ~40 lines of inline `<style>`, ~160 lines of `<header>` + `#mobile-menu`, ~60 lines of `<footer>`, and ~85 lines of navbar `<script>`.
- **Impact:** Any single nav/footer/token update requires editing 11 separate HTML files manually, which has already caused drift (e.g., `index.html` has `dark-*` tokens and lacks pin code `364001`; `services/index.html` dropped `dark-*` tokens and added `364001`).
- **Fix:** Extract shared navbar/footer JS into a single shared script (e.g., `js/nav.js`), extract shared styles into compiled CSS, and delete or archive the 31 dead `css/` and `js/` files if they belong to the legacy template.

## 3. [MEDIUM] Leftover AI/Stitch Export Artifacts & Broken Reference in `index.html`
- **Evidence:**
  - `index.html:6`: `<script id="tailwind-config" data-stitch-original-src="4ea5b44408b2c79a===../../tailwind.config.js">` (references non-existent `tailwind.config.js`).
  - `index.html:125`: `if (typeof module !== 'undefined') module.exports = globalThis.tailwind.config;` (Node CommonJS artifact in browser HTML).
  - `index.html:199`: `data-stitch-vh="min-h-[1024px]===min-h-screen"`.
- **Fix:** Strip all `data-stitch-*` attributes and CommonJS `module.exports` checks from production HTML.

## 4. [LOW] Missing `<meta name="description">` on `index.html` & Unused Font Weights
- **Evidence:** `index.html` lines 1–10 lack `<meta name="description">`, whereas `services/index.html:7`, `services/seo/index.html:7`, `work/index.html:7` include it. `services/index.html` also loads `Material Symbols Outlined` with `wght,FILL@100..700,0..1` and `Plus Jakarta Sans` weights `400;500;600;700;800`, adding font payload.
- **Fix:** Add an accurate `<meta name="description">` to `index.html`.
