# Sphinix Marketing — Design System Notes (Agent 02)

Grounded in `c:\Users\hm901\Desktop\sphinix\index.html` and `c:\Users\hm901\Desktop\sphinix\services\index.html`.

## 1. Color Palette & Surface Hierarchy
- **Hero Backdrop (`.hero-canvas`)**: `#FFF8F1` warm cream (`linear-gradient(115deg, #FFF8F1 0%, #FFF8F1 48%, #F4E8D5 145%)`).
- **Primary Page Surfaces (Alternating Cadence)**:
  - `light-surface` / `light-background`: `#F7F6F4` (warm stone)
  - `light-surface-container-lowest`: `#FFFFFF` (crisp white)
  - `light-surface-container-low`: `#F2F0EC` (subtle inset/card tint)
  - `light-surface-container`: `#EBE8E2` (muted container)
  - `light-outline-variant`: `#E4E4E7` (1px hairline dividers & card borders)
- **Ink & Text Contrast**:
  - Primary Ink: `#202020` / `#18181B` (`light-on-surface`)
  - Secondary Ink: `#444444` / `#52525B` (`light-on-surface-variant`)
  - Muted / Mono Labels: `#71717A` (`light-outline`)
- **Brand Accents (Disciplined Usage)**:
  - `brand-orange`: `#E85D2A` / `#E85C27` (icons, display accent spans, primary buttons, stat highlights)
  - `light-primary` (accessible orange text on light surfaces): `#A83300` / `#C84314` (section eyebrows, links, step indices — meets WCAG AA/AAA on `#FFFFFF` and `#FFF8F1`)
  - `brand-charcoal`: `#1C1C1E` / `#202020` (dark CTA banners, logo mark, secondary buttons)

## 2. Typography
- **Primary Family**: `"Plus Jakarta Sans", sans-serif` (weights 400, 500, 600, 700, 800)
- **Mono / Index Family**: `"JetBrains Mono", monospace` (weights 400, 500) — used for `01`–`08` indices, counters, and step numbers with `tabular-nums`.
- **Key Scale Tokens** (defined in Tailwind config):
  - `hero-headline`: `clamp(2.35rem, 1.45rem + 2.7vw, 3.65rem)` (`index.html`), `clamp(2.15rem, 1.35rem + 2.3vw, 3.25rem)` (`services/index.html`)
  - `display-lg`: `36px / 42px`, `-0.025em`, `600`
  - `headline-lg`: `32px / 38px`, `-0.02em`, `600`
  - `title-md`: `18px / 24px`, `-0.01em`, `600`
  - `body-md`: `15px / 24px`, `400`
  - `label-sm`: `12px / 16px`, `600`
  - `mono-sm`: `12px / 16px`, `0.02em`, `500`

## 3. Borders, Radii & Elevation
- **Editorial Restraint**: Prefer crisp `1px solid #E4E4E7` borders and surface contrast (`#FFFFFF` vs `#F7F6F4` vs `#FFF8F1`) over heavy drop shadows.
- **Radii**: `rounded-[6px]` for buttons, `rounded-lg` (`12px`) / `rounded-xl` (`16px`) for cards, `rounded-full` for nav pills and filter/anchor tags.

## 4. Navigation & Header
- Sticky `72px` `#site-header`: transparent over `.hero-canvas`, transitions to `#FFFFFF` + `border-bottom: #E4E4E7` on scroll (`.header-scrolled`).
- Centered `#nav-pill` (`rgba(244, 232, 213, 0.72)` -> `#F4F2EE` on scroll).
