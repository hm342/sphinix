# Architectural Decisions — Agent 01 (Senior Developer)

## Decision 01: Redesign `services/index.html` from Raw PDF Blocks to Editorial Web Architecture
- **Triggered by:** Ruthless Critic (`AUDIT-2026-11-25-01`) & Frontend Developer (`PHASE-1-SERVICES-AUDIT-AND-DESIGN-PROPOSAL`) + User feedback ("redesign service page it is looking too bad make design proper with color background and all things").
- **Rejected Approach:** Literal print-brochure color-blocking (`#A42220` + `#EB9131` + `#E65526` repeated 8x vertically).
- **Approved Architecture:**
  1. Preserve 100% of `data.md` service copy, deliverables, partner badges, tool/platform stacks, strategic outcomes, and work process steps + scope caveats.
  2. Replace raw `#F1F1F1`/`#A42220`/`#EB9131`/`#E65526` blocks with alternating `#F7F6F4` (warm stone) and `#FFFFFF` (surface-lowest) sections separated by `1px solid #E4E4E7` hairlines.
  3. Add sticky discipline index bar (`sticky top-[72px]`) for effortless navigation across all 8 services (`#social-media` through `#dev`).
  4. Use a 12-col editorial layout per service: 7-col Deliverables + Stack card, 5-col Warm-Cream (`#FFF8F1`) Strategic Outcome panel with `3px` `#E85D2A` top rule, and full-width responsive `Work Process` stepper (`lg:grid-cols-4/5/6` matched to each service's exact step count).
  5. Enforce WCAG AA contrast (`#A83300` for small text links/badges and primary white-text buttons; `#18181B` / `#52525B` for body copy).
