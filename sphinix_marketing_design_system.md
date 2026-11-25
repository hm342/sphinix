---
name: "Sphinix Marketing - Digital Agency Design System"
description: "Warm-neutral editorial agency design system combining crisp typography, charcoal contrast, and burnt-orange accents inspired by modern corporate consulting."
---

## Overview

Sphinix Marketing's design system embodies a **Corporate / Modern** editorial aesthetic: confident, results-driven, and uncluttered. Built for a full-service digital marketing agency and SaaS product studio (ChatBox 360 Suite and SocialSuite), it pairs generous warm-neutral whitespace with deep charcoal surfaces and energetic burnt-orange accents. The interface prioritizes scannable hierarchy, bold numerical proof points, and crisp structural grids without visual noise or decorative clutter.

## Colors

The palette pairs a clean warm-stone canvas (`#F7F6F4`) and pure white elevated cards (`#FFFFFF`) with a high-contrast charcoal ink (`#18181B`) and an energetic burnt-orange brand accent (`#E85D2A`). Interactive primary actions use a deepened terracotta (`#A83300`) to guarantee WCAG AA 4.5:1 contrast with white text, while `brand-orange` is reserved for large typographic highlights, metric cards, and decorative accents.

```yaml
colors:
  brand-orange: "#E85D2A"
  brand-charcoal: "#1C1C1E"
  success: "#16A34A"
  warning: "#D97706"
  light:
    primary: "#A83300"
    on-primary: "#FFFFFF"
    primary-container: "#E85D2A"
    on-primary-container: "#232323"
    secondary: "#1C1C1E"
    on-secondary: "#FFFFFF"
    secondary-container: "#EBE8E2"
    on-secondary-container: "#18181B"
    tertiary: "#00628B"
    on-tertiary: "#FFFFFF"
    background: "#F7F6F4"
    on-background: "#18181B"
    surface: "#F7F6F4"
    on-surface: "#18181B"
    surface-container-lowest: "#FFFFFF"
    surface-container-low: "#F2F0EC"
    surface-container: "#EBE8E2"
    surface-container-high: "#E2DFD7"
    on-surface-variant: "#52525B"
    outline: "#71717A"
    outline-variant: "#E4E4E7"
    error: "#BA1A1A"
    on-error: "#FFFFFF"
  dark:
    primary: "#FFB59D"
    on-primary: "#5D1800"
    primary-container: "#F26430"
    on-primary-container: "#451000"
    secondary: "#E4E4E7"
    on-secondary: "#18181B"
    secondary-container: "#27272A"
    on-secondary-container: "#F4F4F5"
    tertiary: "#85CFFF"
    on-tertiary: "#00344C"
    background: "#141416"
    on-background: "#F4F4F5"
    surface: "#141416"
    on-surface: "#F4F4F5"
    surface-container-lowest: "#0E0E10"
    surface-container-low: "#1C1C1E"
    surface-container: "#27272A"
    surface-container-high: "#323236"
    on-surface-variant: "#A1A1AA"
    outline: "#71717A"
    outline-variant: "#27272A"
    error: "#FFB4AB"
    on-error: "#690005"
```

## Typography

A neo-grotesque and geometric sans-serif pairing gives Sphinix Marketing a sharp, contemporary agency voice. **Be Vietnam Pro** anchors display headlines and section titles with tight tracking and confident weight, while **Plus Jakarta Sans** delivers effortless legibility across body copy, service lists, and UI controls. **JetBrains Mono** handles metrics, tabular KPIs, and technical metadata.

```yaml
typography:
  display-xl:
    fontFamily: "Be Vietnam Pro"
    fontSize: 56px
    fontWeight: 600
    lineHeight: 62px
    letterSpacing: -1.5px
  display-xl-mobile:
    fontFamily: "Be Vietnam Pro"
    fontSize: 32px
    fontWeight: 600
    lineHeight: 38px
    letterSpacing: -0.75px
  display-lg:
    fontFamily: "Be Vietnam Pro"
    fontSize: 44px
    fontWeight: 600
    lineHeight: 50px
    letterSpacing: -1.0px
  display-lg-mobile:
    fontFamily: "Be Vietnam Pro"
    fontSize: 30px
    fontWeight: 600
    lineHeight: 36px
    letterSpacing: -0.5px
  headline-lg:
    fontFamily: "Be Vietnam Pro"
    fontSize: 36px
    fontWeight: 600
    lineHeight: 42px
    letterSpacing: -0.75px
  headline-lg-mobile:
    fontFamily: "Be Vietnam Pro"
    fontSize: 26px
    fontWeight: 600
    lineHeight: 32px
    letterSpacing: -0.5px
  headline-md:
    fontFamily: "Be Vietnam Pro"
    fontSize: 28px
    fontWeight: 600
    lineHeight: 34px
    letterSpacing: -0.5px
  title-lg:
    fontFamily: "Be Vietnam Pro"
    fontSize: 22px
    fontWeight: 600
    lineHeight: 28px
    letterSpacing: -0.25px
  title-md:
    fontFamily: "Be Vietnam Pro"
    fontSize: 18px
    fontWeight: 600
    lineHeight: 24px
    letterSpacing: -0.15px
  body-lg:
    fontFamily: "Plus Jakarta Sans"
    fontSize: 16px
    fontWeight: 400
    lineHeight: 26px
    letterSpacing: 0px
  body-md:
    fontFamily: "Plus Jakarta Sans"
    fontSize: 15px
    fontWeight: 400
    lineHeight: 24px
    letterSpacing: 0px
  label-lg:
    fontFamily: "Plus Jakarta Sans"
    fontSize: 14px
    fontWeight: 600
    lineHeight: 20px
    letterSpacing: 0px
  label-md:
    fontFamily: "Plus Jakarta Sans"
    fontSize: 13px
    fontWeight: 500
    lineHeight: 18px
    letterSpacing: 0.1px
  label-sm:
    fontFamily: "Plus Jakarta Sans"
    fontSize: 12px
    fontWeight: 600
    lineHeight: 16px
    letterSpacing: 0.2px
  mono-sm:
    fontFamily: "JetBrains Mono"
    fontSize: 12px
    fontWeight: 500
    lineHeight: 16px
    letterSpacing: 0.2px
```

## Layout & Spacing

Desktop layouts use a **Fixed-Max-Width Grid** (`1280px` max container width) with 12 columns, `24px` gutters, and generous `80px`–`96px` vertical section rhythm. Split-screen hero and impact blocks bleed edge-to-edge or span 50/50 across the container to create editorial contrast between photography and copy. Mobile layouts collapse cleanly to a single fluid column with `16px` page margins.

```yaml
spacing:
  gutter-xs: 4px
  gutter-sm: 8px
  gutter-md: 16px
  gutter-lg: 24px
  gutter-xl: 32px
  section: 80px
  page-margin: 24px
```

## Elevation & Depth

Hierarchy relies on **tonal surface shifts** and **low-contrast hairline outlines** (`outline-variant`) rather than heavy drop shadows. Primary cards sit on `surface-container-lowest` (`#FFFFFF`) against the warm-stone `surface` (`#F7F6F4`) canvas. Featured pricing or metric blocks invert to `brand-orange` or `brand-charcoal` for immediate visual anchor without artificial shadow blur.

## Shapes

Corners are crisp and architectural: buttons and inputs use `6px` (`DEFAULT`) or `8px` (`md`), feature and service cards use `12px` (`lg`), and large showcase containers (such as testimonials and video feature cards) use `16px` (`xl`). Pills and category filter chips use `9999px` (`full`).

```yaml
rounded:
  sm: 4px
  DEFAULT: 6px
  md: 8px
  lg: 12px
  xl: 16px
  full: 9999px
```

## Motion & Micro-interaction

Interactions are crisp and purposeful. Button hover states, accordion expansions, and tab switches respond within `150ms` using an ease-out curve. Only `transform`, `opacity`, and color properties animate; layout geometry never animates.

```yaml
motion:
  state-change:
    duration: 150ms
    delay: 0ms
    timingFunction: ease-out
  surface-enter:
    duration: 250ms
    delay: 0ms
    timingFunction: cubic-bezier(0.2, 0, 0, 1)
  surface-exit:
    duration: 150ms
    delay: 0ms
    timingFunction: cubic-bezier(0.3, 0, 1, 1)
```

## Voice & Content Strategy

- **Tone of voice:** Confident, direct, and results-oriented. Speak in active outcomes ("Accelerate your digital footprint", "Drive qualified leads") rather than vague buzzwords.
- **Capitalisation:** Sentence case for body copy, form labels, and FAQ questions; title case for navigation items, service titles, and primary CTAs.
- **Numbers & metrics:** Always format key stats (`9+ Years`, `150+ Clients`, `100+ Projects`, `$36 ROI`) with `tabular-nums` for clean vertical alignment.
- **Action labels:** Use outcome-focused verb phrases (`Partner With Us`, `Explore ChatBox 360`, `Book a Strategy Call`, `Request Proposal`).

## Components

Component implementations live as individual HTML sticker sheet files in
`components/`. Each file contains the canonical, styled HTML components with
`<!-- COMPONENT: name -->` comment markers. Read each file before use.

- **Accordion** → `@components/accordion.html` — `accordion-single`, `accordion-group`
- **Button** → `@components/button.html` — `button-primary`, `button-icon`, `button-with-icon`
- **Card** → `@components/card.html` — `card-elevated`, `card-action`, `card-interactive`, `card-interactive-2`
- **Typography** → `@components/typography.html` — `typography-display`, `typography-body`, `typography-label`
