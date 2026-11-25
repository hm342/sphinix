# Project Architecture — Sphinix Marketing

- **Stack:** Static multi-page HTML5 + Tailwind CSS CDN (`tailwindcss.com`) with inline `tailwind.config` per page + vanilla JS IIFEs.
- **Fonts:** Plus Jakarta Sans (primary UI/display/body) + JetBrains Mono (stats/metadata).
- **Pages (11):** `index.html`, `about/index.html`, `services/index.html`, `services/seo/index.html`, `services/social-media-marketing/index.html`, `work/index.html`, `work/aabo/index.html`, `products/index.html`, `blog/index.html`, `contact/index.html`, `404.html`.
- **Source of Truth:** `data.md` (company profile facts) & `RULES.md` (colour tokens, contrast rules, typography, anti-slop discipline).
- **Current Core Problem:** `services/index.html` literally cloned print-brochure colour blocks (`#A42220` + `#EB9131` + `#E65526`) 8 times vertically, creating severe visual fatigue, clash with the warm `#FFF8F1`/`#202020`/`#E85C27` web identity, and broken UX rhythm.
