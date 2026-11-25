# DESIGN.md — Sphinix Marketing website redesign

Status: v0.1 proposal. Items marked **[CONFIRM]** are assumptions the owner must approve before build starts. Items marked **[PLACEHOLDER]** are draft copy, not final.

---

## 1. What this website has to do (the brief, stated plainly)

**Subject:** Sphinix Digital Marketing, a Bhavnagar (Gujarat) agency founded 2017, serving small and mid-size businesses, with three in-house software products (ChatBox 360 Suite, Social 360 Suite, Aaj Ka Graphic).

**Primary audience [CONFIRM]:** Owner-operators and marketing heads of Gujarat/India SMBs (hospitals and clinics, jewellers, manufacturers/exporters, real estate, FMCG, education) who found the agency through Google, WhatsApp referral, or a social post, on a mid-range Android phone over 4G.

**Primary job of the site:** Get that visitor to start a WhatsApp chat or request a proposal within 90 seconds of landing.

**Secondary jobs:**
1. Rank for "[service] in Bhavnagar" and wider Gujarat searches (SEO is a service they sell, so the site is its own case study).
2. Route software-product buyers to the product sites (chatbox360suite.com, social360suite.in, aajkagraphic.com) without confusing agency buyers.
3. Prove results with real work, not adjectives.

**What the current site gets wrong (design-relevant only):**
- Template feel (Slider Revolution hero, Tatsu builder), small-agency-generic.
- Copy has typos ("recevie", "awsome", "deliever") and stat-claims without sources.
- Pinch-zoom is disabled in the viewport meta, an accessibility failure.
- Footer lists dead links (Careers, Pricing, Resources).
- No visible products, no case studies with numbers, no WhatsApp-first conversion.

---

## 2. Design concept: "Banded"

The company profile PDF already contains the brand's most distinctive structural device: **full-width horizontal colour bands with white rounded panels sitting on them.** No competitor in the reference set uses it. We keep it and make it the whole system, instead of importing a generic template look.

**One-sentence concept:** a page built from hard-edged, full-bleed colour bands (grey, white, ember, flame) where real client work, in portrait phone-video format, is the first thing you see.

**Where the boldness is spent (one place only):** the hero's *portrait proof wall*, three vertical 9:16 tiles of real client reels/creatives (the format the agency actually produces), staggered in once on load. Everything else stays quiet and disciplined.

**Why this is not the two reference sites:** the references lean on large-type agency-portfolio showmanship (Ohio demo) and a conventional service-brochure layout (Communication Crafts). Sphinix sells to SMB owners who need to see "will this fill my phone with enquiries", so the design leads with proof and a single obvious action, not with studio theatre. **[CONFIRM what the owner specifically liked in each reference; see questions list.]**

### Layout rules of the concept
- Bands are full-bleed with **straight edges**. No wave, slant, or curve dividers.
- Content sits in a 1240px container inside each band.
- Panels (media, product cards) use one large radius; buttons/chips use pill radius. Nothing else is rounded.
- Text is **left-aligned** everywhere except the final contact band's single line. Centered paragraphs are banned.
- Band sequence alternates tone so scrolling feels like moving through a stack: Ash → White → Ash → Ember → White → Flame (see wireframe).

---

## 3. Information architecture

```
/                         Home
/services/                Services hub (grouped by outcome, see 4.3)
  /services/social-media-marketing/
  /services/seo/
  /services/google-ads/
  /services/branding-design/
  /services/video-production/
  /services/ecommerce-management/
  /services/email-marketing/
  /services/web-app-development/
/work/                    Case studies index (filter by industry)
  /work/[slug]/           One case study
/products/                Products hub
/about/
/blog/                    + /blog/[slug]/
/contact/
/bhavnagar/[service]/     Local landing pages (MIGRATE existing ones, see rules)
```

Header: logo · Services · Work · Products · About · Blog · Contact · **Chat on WhatsApp** (primary button).
Footer: services list, products, both offices, hours, socials, privacy. **No link goes in the footer unless the page exists.**

**[CONFIRM]** Existing URLs (e.g. `/social-media-marketing-service/`, `/digital-marketing-services/...-bhavnagar/`, `/portfolio/...`) need a full 301 map before launch. See RULES.md section 9.

---

## 4. Homepage structure

### 4.1 Wireframe

```
BAND 1 · Ash (#F1F1F1)                                  [heat bar across very top, scroll-driven]
┌────────────────────────────────────────────────────────────────────────┐
│ logo   Services Work Products About Blog Contact   [Chat on WhatsApp]  │
│                                                                        │
│ H1 (left, 7 cols)                       ┌──────┐┌──────┐┌──────┐       │
│ Marketing that fills                    │ 9:16 ││ 9:16 ││ 9:16 │       │
│ your calendar,                          │ real ││ real ││ real │       │
│ not just your feed.                     │ reel ││ reel ││ reel │       │
│ [PLACEHOLDER]                           │  ↑   ││  ↑   ││  ↑   │       │
│ 1 line of support copy                  └──────┘└──────┘└──────┘       │
│ [Chat on WhatsApp] [Get a proposal]     (staggered heights, caption     │
│                                          under each: client + result)   │
└────────────────────────────────────────────────────────────────────────┘
BAND 2 · White — Clients: logo row (only logos with written permission)
BAND 3 · Ash — "Where do you need help?" three outcome paths (4.3)
BAND 4 · White — Selected work: 1 large + 4 small, each with a number
BAND 5 · Ember (#A42220), white text — Our software products (4.5)
BAND 6 · White — How we work: 4 steps (genuine sequence, numbering allowed)
BAND 7 · Ash — Reviews (verified, named, linked) + FAQ (native <details>)
BAND 8 · Flame (#E65526), black text — Contact: form + WhatsApp + both offices
FOOTER · Coal
```

### 4.2 Hero rules
- H1 states the outcome in plain words, max 9 words, no buzzwords. **[PLACEHOLDER]** options to test:
  - "Marketing that fills your calendar, not just your feed."
  - "Get found in Bhavnagar. Get called from everywhere."
  - "Digital marketing you can measure in enquiries."
- The proof wall uses **real** client creatives. Each tile has a caption: client name + one number or outcome. If no number exists yet, the tile is cut, not faked.
- Tiles are poster images by default; video loads on tap or when `saveData` is off and the tile is in view. Never autoplay with sound.
- No slider, no carousel, no background video.

### 4.3 "Where do you need help?" (replaces the flat list of 8 services)
The profile lists eight services with equal weight. Visitors don't think in service names, they think in problems. Group by outcome:

| Path | Visitor's problem | Services inside |
|---|---|---|
| Get found | "Nobody finds us on Google." | SEO, Local SEO, Google Ads |
| Get talked about | "We post, nothing happens." | Social media, Video/Reels, Branding & design, Influencer |
| Get orders | "Enquiries and sales are too low." | E-commerce management, Web/App development, Email, WhatsApp automation (ChatBox 360) |

Each path is a large panel with 3–4 service links. A "See all 8 services" link goes to `/services/`. These are **not three identical cards**: path 1 is wide, 2 and 3 split the remaining row, each with a different internal layout (list vs. mini-proof tile vs. product callout).

### 4.4 Selected work
- 5 case studies maximum on home. Format: client, industry, what we did, **one metric with timeframe**, link.
- Candidates from the profile/site: aabo (Shark Tank India feature), Durva Gastro Care (hospital video), HCG, Rosyrime Export, SVMC Hospital, Match Solar, jewellery clients (Veer, Nikki, Riyom). **[CONFIRM] each needs permission and a real metric.**

### 4.5 Products band
Tagline from profile: "We don't just market businesses. We build tools for them." Keep it.
Three product panels on Ember, each with: logo, one-sentence job, 2–3 real features, link out.
- **ChatBox 360 Suite** — WhatsApp Business API platform: shared inbox, CRM, order management, chatbots.
- **Social 360 Suite** — social scheduling, calendar, analytics, AI studio.
- **Aaj Ka Graphic** — festival post maker app, Android, 15,000+ images/videos.
Do **not** repeat "No Ban Risk" (see RULES.md section 11).

### 4.6 How we work
Four steps only (the PDF shows 4–6 per service; unify): Understand your business → Plan and set up → Create and run → Report monthly. This is a true sequence, so numerals are allowed here and only here.

### 4.7 Reviews + FAQ
- Reviews: named person, business, and a link to the original Google review. No screenshots of reviews (illegible on mobile, unverifiable, not indexable).
- FAQ: keep the existing six questions (they are good, long-tail SEO content), rewrite for clarity, mark up as FAQPage. Native `<details>` elements, no JS accordion.

### 4.8 Contact band
Left: three ways to reach you in order of friction: WhatsApp (primary), call, form. Right: short form (name, phone, business type, one-line need). Below: both addresses (head office B-3 Shantiniketan Complex, Waghawadi Road; creative studio Swastik Complex, Mokhdaji Circle) and hours. **Resolve the hours conflict** (site says 8–7 Mon–Sat and "24×7 support"). Say one thing.

---

## 5. Other page notes (brief)

- **Service pages:** each answers: who it's for, what you get (deliverables list), how it works (the process from the PDF), tools used (logos, small), 1–2 relevant case studies, FAQ, CTA. Include the city in H1 only on `/bhavnagar/` pages.
- **Work index:** filter chips by industry (the 12 industries from the profile become filters, not a homepage grid). Mixed tile sizes by format (portrait video vs. landscape creative).
- **Case study:** brief → what we did → result (number) → creatives gallery → "Want this for your business?" CTA.
- **Products hub:** three alternating panels, link out. One-line explanation of how products relate to agency services.
- **About:** founder/team with real photos (the PDF has a staged "thinking man" stock-style image; replace with the actual team). Timeline 2017→now, certifications **only if current and verifiable**.
- **Blog:** keep, redesign list as text-forward with date and category, 68ch article measure.

---

## 6. Imagery

- Real work first. Real team second. Stock last, and never handshake/laptop/lightbulb stock.
- Portrait 9:16 for reels, 1:1 and 4:5 for social creatives, 16:9 for web/app work. Show them in their native ratio; do not crop to fit a grid.
- Black-and-white treatment (as in the PDF) allowed **only** on team/office photography so colour belongs to the work and the brand bands.
- Logo: phoenix mark + wordmark as supplied. Do not redraw or recolour; minimum clear space = height of the "x" in the wordmark.
- Format: AVIF with WebP fallback, explicit width/height, `loading="lazy"` except the hero.

---

## 7. Motion (budget: one moment + one indicator)

1. **Hero proof wall entrance:** the three tiles rise into place with a 90ms stagger, total ≤ 900ms, plays once per session.
2. **Heat bar:** a 3px bar fixed at the top, amber→flame→ember, fills with scroll position. It is a navigation indicator, not decoration.
3. Everything else: instant state changes. Hover = colour/underline change in 120ms. No scroll-reveal on sections, no parallax, no animated counters.
4. `prefers-reduced-motion: reduce` removes both (tiles appear in place; heat bar becomes static or hidden).

---

## 8. Voice

Plain, specific, direct. Sentence case. Write like a consultant talking to a shop owner, not like a brochure.

| Instead of | Write |
|---|---|
| "Deliver the WOW factor" | A specific outcome: "28 enquiries in the first month." |
| "Industry-best tools" | Name them: Ahrefs, Semrush, Search Console. |
| "Trusted name in digital marketing" | A fact: "150+ clients since 2017." (if verifiable) |
| "Submit" | "Send my details" |
| "Learn more" | "See how SEO works with us" |

Gujarati: **[CONFIRM]** v2 scope. Design for it now (font stack, no fixed-height text boxes), translate later.

---

## 9. Open items before design/build starts

1. Positioning decision (SMB-local vs. broader India vs. "worldwide").
2. Written permission list for client logos and case studies.
3. Real metrics for at least 5 case studies.
4. Which certification badges are current (Meta, Google Partner, LinkedIn, Ahrefs).
5. Content owner: who updates the blog and case studies after launch, and in what tool.
6. Final stack decision (RULES.md section 10).
