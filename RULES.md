# SPHINIX — PERMANENT PROJECT RULES

These rules apply to every task performed in this project, including new features, pages, components, UI improvements, bug fixes, refactoring, integrations, backend development, and database work.

These rules must be followed by default unless the user explicitly requests otherwise.

## 1. Understand Before Changing

- Inspect the existing codebase before making changes.
- Understand the project's architecture, framework, folder structure, design system, and coding conventions.
- Read relevant existing files before modifying them.
- Understand how the requested change connects to existing functionality.
- Do not assume that replacing existing code is better than extending it.
- Plan changes before implementing large features.

## 2. Preserve the Existing Project

- Do not unnecessarily rebuild, rewrite, or restructure the project.
- Do not delete working functionality.
- Do not modify unrelated files.
- Do not break existing routes, APIs, integrations, components, or user flows.
- Do not replace the framework or architecture without a strong reason.
- Reuse existing components, styles, utilities, and patterns whenever possible.
- Keep changes limited to the task and its necessary dependencies.

## 3. Design Quality

Every new UI or design must feel like a natural part of the existing Sphinxix website.

- Maintain consistent branding, colours, typography, spacing, and visual identity.
- Use the existing design system whenever possible.
- Design with purpose, visual hierarchy, and appropriate whitespace.
- Make layouts responsive and usable.
- Use appropriate typography and proportions.
- Maintain consistent interactions and component behaviour.
- Design based on the actual purpose of the feature.
- Do not force every page into the same layout.
- Ensure new designs feel coherent with the rest of the website.

## 4. ANTI-AI-SLOP RULES

Never create generic AI-generated-looking designs.

Avoid:

- Repetitive card layouts on every page.
- Excessive rounded containers.
- Unnecessary gradients.
- Excessive glassmorphism.
- Random decorative blobs, circles or floating elements.
- Excessive glowing effects.
- Unnecessary shadows.
- Random icons.
- Excessive badges.
- Repetitive three-column layouts.
- Generic SaaS templates.
- Unnecessary animations.
- Fake testimonials.
- Fake statistics.
- Fake clients or logos.
- Generic marketing copy.
- Excessive empty space.
- Overdesign.
- Unnecessary borders and decorative elements.
- Design choices made only to make the page look fancy.

Prefer:

- Thoughtful and purposeful layouts.
- Strong visual hierarchy.
- Natural and balanced compositions.
- Clean and consistent design.
- Meaningful interactions.
- Professional typography.
- Appropriate whitespace.
- Subtle details.
- Real functionality.
- Design that feels handcrafted.

Every visual element must have a purpose.

## 5. FUNCTIONALITY — NO FAKE FEATURES

Everything implemented must actually work.

- Buttons must perform their intended action.
- Links must navigate to valid destinations.
- Forms must validate and submit correctly.
- Search must actually search.
- Filters must actually filter.
- Tabs must switch content.
- Dropdowns must function.
- Modals must open and close correctly.
- Navigation must work.
- APIs must be properly connected where required.
- Database operations must work.
- Loading states must be implemented where necessary.
- Error states must be handled.
- Empty states must be handled.
- Success feedback must be genuine.
- Do not create decorative controls that do nothing.
- Do not simulate functionality and present it as real.
- Do not hardcode fake data to make an unfinished feature appear complete.

If a feature cannot be fully implemented because of missing APIs, credentials, backend services or requirements, explain the limitation honestly.

## 6. Responsive Design

Every new feature and UI component must be responsive.

Check:

- Desktop.
- Tablet.
- Mobile.

Ensure:

- No horizontal overflow.
- No broken layouts.
- No overlapping elements.
- Readable text.
- Appropriate spacing.
- Proper mobile navigation.
- Usable buttons.
- Responsive images.
- Proper stacking of components.
- Usable touch interactions.

Do not simply shrink the desktop layout to fit mobile.

## 7. Accessibility

- Use semantic HTML.
- Provide labels for inputs.
- Use accessible buttons and links.
- Maintain adequate colour contrast.
- Support keyboard navigation.
- Provide visible focus states.
- Use appropriate accessible names.
- Respect reduced-motion settings.
- Avoid relying only on colour to communicate information.
- Make interactive elements usable for people with accessibility needs.

## 8. Code Quality

- Follow the existing project's coding conventions.
- Write clean, readable, maintainable code.
- Avoid unnecessary dependencies.
- Avoid duplicated code.
- Avoid excessively large components.
- Use reusable components when they provide genuine value.
- Avoid unnecessary abstraction.
- Keep logic and presentation appropriately organized.
- Use proper typing where applicable.
- Avoid unnecessary inline styles.
- Avoid hardcoding values that belong in configuration or design tokens.
- Maintain existing functionality.
- Avoid introducing unnecessary technical complexity.

## 9. Backend, APIs and Database

Whenever working on backend or data-related features:

- Understand the existing backend architecture.
- Follow existing API and database conventions.
- Validate inputs.
- Handle errors properly.
- Implement appropriate authentication and authorization.
- Protect sensitive data.
- Never expose API keys, credentials, tokens or secrets.
- Do not trust client-side authorization alone.
- Handle loading, failure and empty responses.
- Avoid destructive operations without safeguards.
- Maintain compatibility with existing data structures where possible.
- Do not create fake API responses and present them as live data.

## 10. Images and Assets

- Use existing project assets where appropriate.
- Use relevant, high-quality assets.
- Avoid broken image paths.
- Do not leave unfinished placeholders.
- Ensure images are responsive.
- Use appropriate image sizing and cropping.
- Avoid unnecessary assets.
- Do not fabricate logos, client imagery or achievements.

## 11. Animation and Interactions

- Use animations only when they improve the experience.
- Keep animations subtle and professional.
- Avoid excessive motion.
- Avoid scroll hijacking.
- Avoid unnecessary parallax.
- Avoid animating every element.
- Respect reduced-motion settings.
- Keep interactions smooth and predictable.

## 12. Mandatory Development Workflow

For every task:

### Before coding
1. Inspect the relevant project files.
2. Understand the existing implementation.
3. Identify the required behaviour.
4. Identify dependencies.
5. Identify potential impact on existing functionality.
6. Plan the implementation.

### During coding
7. Extend the existing architecture.
8. Reuse existing components.
9. Follow the design system.
10. Implement complete functionality.
11. Handle errors and edge cases.
12. Ensure responsive behaviour.
13. Avoid unrelated changes.

### After coding
14. Run relevant tests.
15. Run linting or type checking if available.
16. Run the build if appropriate.
17. Check the affected UI at different screen sizes.
18. Check for broken links, buttons, layout problems and regressions.
19. Fix problems discovered during verification.
20. Report what was actually verified.

If testing is unavailable, explicitly state that testing was not performed. Never claim a test passed without running it.

## 13. Communication

- Inspect the code before suggesting unnecessary changes.
- Implement tasks rather than merely explaining them when code access is available.
- Ask questions only when important information is missing.
- Avoid asking the user to repeat information already available.
- Explain important technical decisions briefly.
- Report the files changed.
- Report what was tested.
- Report any remaining issues.
- Be honest about limitations.
- Do not claim to have completed work that was not actually implemented.

## 14. Final Principle

Every new feature, page, component, UI change, integration, bug fix or refactor must:

- Fit the existing Sphinxix project.
- Preserve existing functionality.
- Be genuinely functional.
- Be responsive.
- Be accessible.
- Be maintainable.
- Be professionally designed.
- Avoid generic AI-generated design patterns.
- Be verified as far as the available tools permit.

Prioritize functionality, consistency, usability, maintainability, quality and thoughtful design over unnecessary complexity or rushed code generation.
