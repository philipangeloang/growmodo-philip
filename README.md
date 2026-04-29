# Estatein — WordPress Real Estate Theme

A custom WordPress theme built from scratch based on the [Estatein Figma template](https://www.figma.com/community/file/1314076616839640516). Submitted as part of the WordPress Developer assessment for Growmodo.

**Live demo:** https://realizable-dunlin-a12796.instawp.site/
**Repository:** https://github.com/philipangeloang/growmodo-philip
**Author:** Philip Angeloang

---

## TL;DR

Six pages built, four custom post types with ACF, working contact forms, mobile-responsive scroll-snap carousels, Lighthouse Performance 98 / Best Practices 96. Custom theme — no page builders, no starter themes, no plugin-as-theme tricks. Read on for what's in the box, what was scoped out, and the engineering decisions behind both.

---

## Approach

The brief acknowledged that 4 hours is not enough to build the entire site. I treated it as a **prioritization exercise**: depth and code quality on what shipped, with explicit documentation of what was cut and why.

My priority order:

1. **A clean custom theme** — semantic templates, sensible folder structure, no bloat
2. **A real WordPress data model** — Custom Post Types and ACF fields, not hardcoded posts
3. **Polished homepage and the five inner pages** from the Figma
4. **Working forms via Contact Form 7** — properly themed, actually submitting
5. **Performance and accessibility from the start**, not as cleanup

The README and code organization are written as if a senior developer will read them — because that's who reviews these.

---

## Stack

- WordPress 6.9.4
- PHP 8.2
- Vanilla HTML / CSS / JavaScript — no build step, no framework, no Sass
- [Advanced Custom Fields](https://www.advancedcustomfields.com/) (free) — registered in PHP, not via the admin UI
- [Contact Form 7](https://contactform7.com/) — theme-styled, with admin integration via Settings → Estatein
- [Yoast SEO](https://yoast.com/) — sitemap, structured data, Open Graph
- Heroicons — inlined as SVG via a helper function
- Urbanist (Google Fonts) — matches the Figma typography

Single `style.css` using CSS custom properties for the design system. CSS scroll-snap for mobile carousels. About 60 lines of vanilla JS total.

---

## Pages built

All six pages from the Figma template are implemented:

| Page | Template | Notes |
|---|---|---|
| Home | `front-page.php` | Hero + 4-feature row + Featured Properties carousel + Testimonials + FAQs + CTA |
| About Us | `page-about-us.php` | Our Journey + Values + Achievements + 6-step process + Team + Our Valued Clients |
| Properties (archive) | `archive-property.php` | Page hero + working search + filter UI + property grid + inquiry form |
| Property Details | `single-property.php` | Gallery + description + features + CF7 inquiry form + comprehensive pricing + FAQs |
| Services | `page-services.php` | Hero + feature shortcuts + 3 service groups (Selling / Management / Investment) |
| Contact | `page-contact.php` | Hero + 4 contact methods + CF7 form + 2 office cards with tab UI |

Plus: search results page (`search.php`), 404, generic page fallback, and single post fallback.

---

## What's done

### Theme architecture
- Custom theme bootstrap, properly enqueued assets, head cleanup, translation-ready (`__()` text domain throughout)
- Sticky header with dismissible announcement bar (sessionStorage-persisted)
- Pill-style primary nav, header CTA, mobile hamburger menu
- Five footer menu locations + newsletter form + social icons
- Custom 404, generic page, and single post fallbacks

### Data model
- **Custom Post Types**: Property, Testimonial, FAQ, Client
- **Custom Taxonomies**: Property Type, Property Location
- **ACF field groups registered in PHP** (`acf_add_local_field_group()`), so the schema lives in version control instead of the database
- Helper layer (`inc/property-helpers.php`) wraps `get_field()` so the theme degrades gracefully if ACF isn't installed

### Frontend
- Mobile-first responsive layouts at 1024 / 900 / 768 / 480 breakpoints
- CSS scroll-snap carousels for Featured Properties, Testimonials, FAQs (one card per viewport on mobile, peek of next, swipeable)
- Carousel pager buttons wired to `scrollBy()` with rAF-throttled "01 of N" indicator updates
- Inline SVG icons (Heroicons) — no icon font, no external request, recolorable via `currentColor`
- Native `loading="lazy"` images (WordPress 5.5+ default, respected by `the_post_thumbnail()`)

### Forms
- Contact Form 7 integrated with custom theme styling (handles CF7's auto-`<p>` wrapping cleanly)
- Theme-level admin page (Settings → Estatein) for pasting CF7 form IDs without editing code
- Static fallback forms render if CF7 isn't installed — the theme is functional standalone
- Inquiry form auto-prefills the property name on Property Details

### SEO & performance
- Yoast SEO active (sitemap, OG tags, structured data, per-page meta)
- Lighthouse on Desktop:
  - **Performance: 98**
  - **Accessibility: 88**
  - **Best Practices: 96**
  - SEO: 50 *(InstaWP "discourage search engines" toggle — see notes below)*

---

## Folder structure

```
customtheme/
├── style.css                 — single stylesheet with design tokens (CSS custom properties)
├── functions.php             — theme setup, asset enqueues, menu registration, search hooks
├── header.php                — site header + announcement bar
├── footer.php                — 5-column footer + newsletter + social
├── front-page.php            — homepage composition
├── page-about-us.php         — About Us template (slug-matched)
├── page-services.php         — Services template
├── page-contact.php          — Contact template
├── page-properties-page.php  — placeholder page that delegates to archive-property.php
├── archive-property.php      — Property CPT archive
├── single-property.php       — Property Details
├── search.php                — Property-aware search results
├── single.php / page.php / index.php / 404.php — fallbacks
├── inc/
│   ├── icons.php             — inline SVG icon helper (Heroicons)
│   ├── custom-post-types.php — register Property, Testimonial, FAQ, Client CPTs
│   ├── acf-fields.php        — ACF field groups registered in PHP
│   ├── property-helpers.php  — get_field wrappers, formatting, tag rendering
│   ├── cf7-settings.php      — admin settings page for CF7 form IDs
│   └── admin-notices.php     — ACF dependency warning
├── template-parts/
│   ├── sections/             — homepage sections (hero, features, featured-properties, testimonials, faqs, cta-band, page-hero)
│   ├── cards/                — reusable cards (property, testimonial, faq)
│   └── forms/                — static fallback forms (inquiry, contact)
└── assets/
    ├── js/main.js            — mobile nav toggle, announce bar, carousel pager
    └── images/
```

---

## Engineering decisions worth calling out

### Registering ACF fields in PHP, not via the admin UI
The first instinct is to set up fields by clicking through ACF admin screens. That ships data definitions into the database, where they're invisible to git. Registering field groups via `acf_add_local_field_group()` keeps the schema in `inc/acf-fields.php`, so the data model travels with the codebase, deploys cleanly to other servers, and a senior reviewer can read the field structure without logging in.

### No SCSS, no build tool
For a 4-hour build, every minute saved on tooling is a minute spent on the actual product. CSS custom properties handle the design tokens cleanly, modern CSS handles everything else. Webpack/Vite/Sass setup would have taken 20 minutes that wouldn't have improved the output.

### Heroicons inline as SVG, not an icon font
No external HTTP request, perfect scaling, recolorable via `currentColor`, no FOUT, accessible by default. Slightly larger HTML payload, but bandwidth cost is negligible compared to the latency of a font request.

### Static fallback forms for Contact Form 7
The theme is functional even if CF7 isn't installed. Reviewers can clone the repo, activate the theme, and get a coherent site without first installing plugins. CF7 swaps in transparently once configured via Settings → Estatein.

### Five separate footer menu locations
Each footer column is independently editable in the admin. Lower-skill site owners can change "Our Story" → "Company Story" without code changes. Mirrors the Figma's information architecture exactly.

### A "Properties Page" that delegates to the archive
WordPress page-vs-archive routing is genuinely a small mess. The "Properties" item in the nav links to `/properties-page/` (a real WP Page) which loads `page-properties-page.php`. That file overrides `$wp_query` with a property listing query, then renders `archive-property.php`. Both `/properties/` and `/properties-page/` show the same listing, so the menu link works whichever URL editors expect.

### CSS scroll-snap for mobile carousel, not a JS slider library
Slick, Swiper, and friends are 30-100 KB of JS for behavior the browser already does natively. Below 1024px the property/testimonial/FAQ grids become flex containers with `scroll-snap-type: x mandatory`. Hardware-accelerated touch scrolling is free, and ~30 lines of vanilla JS hook the prev/next buttons up to `scrollBy()`. The "01 of N" indicator updates from scroll position via `requestAnimationFrame`.

### Theme-level admin page (Settings → Estatein) for CF7 form IDs
CF7 forms have IDs that change between environments. Hardcoding the IDs in `single-property.php` would force a code change for every new deploy. A small admin settings page lets the site owner paste in the form ID once after creating their CF7 forms — same pattern as production WordPress themes that integrate with third-party plugins.

---

## Content management strategy

WordPress is a CMS. A custom theme should expose as much of the site to the admin as the timebox allows. Here's what's editable today and what would be admin-driven in a follow-up.

### Editable today (admin / no code change)

| Content | How it's edited |
|---|---|
| Properties (cards, details, gallery, pricing, features) | Property CPT + ACF |
| Testimonials | Testimonial CPT + ACF |
| FAQs | FAQ CPT |
| Clients ("Our Valued Clients" on About) | Client CPT + ACF |
| Property categories | Property Type taxonomy |
| Property locations | Property Location taxonomy |
| Header navigation | Appearance → Menus → Primary |
| Footer columns × 5 | Appearance → Menus (5 separate locations) |
| Inquiry / Contact form fields and copy | Contact Form 7 |
| CF7 form-to-template mapping | Settings → Estatein |
| Site title, tagline | Settings → General |
| SEO metadata per page | Yoast SEO |

### Hardcoded for now (would be admin-driven in v2)

| Content | Production approach |
|---|---|
| Hero title / subtitle / stats (200+, 10k+, 16+) | Customizer or ACF Options page |
| About Us values cards (4 items) | ACF Repeater on the About page |
| About Us 6-step process | ACF Repeater on the About page |
| Team members (4 people) | A `team_member` CPT |
| Service group cards (12+ across 3 groups) | ACF Repeater on Services page or a `service` CPT |
| Office locations (2 cards on Contact) | An `office` CPT |
| Hero contact info on Contact page | Customizer "Contact Information" panel |
| Announcement bar text | Customizer "Site Identity" panel |
| Hero illustration | Customizer image upload |

### The reasoning

Repeating dynamic content (properties, testimonials, FAQs, clients) is fully CPT-driven — that's what a content team actually updates weekly. Marketing-copy sections (4 values, 6 process steps) tend to be set once and rarely changed; they were lower priority for the timebox. All hardcoded strings are wrapped in `__()` text-domain calls — already translation-ready, which is the prerequisite for admin-ification later.

In a real client engagement I'd scope this as: **data model + frontend in week 1** (where the assessment ends), **admin-ification + Customizer integration in week 2**, **content migration + training + QA in week 3**.

---

## What's intentionally cut

Documenting these so reviewers know they were conscious decisions, not oversights:

- **Property archive filter dropdowns** (Location, Property Type, Pricing Range, Property Size, Build Year) are visual only. Real WP Query `meta_query` filtering would take ~30 minutes and is the clearest "next sprint" item. The search bar above them, however, **does work** — it scopes to `post_type=property` and renders matching property cards via the `search.php` template.
- **Contact page office tabs** (All / Regional / International) are visual only. A small JS toggle would take ~10 minutes.
- **Property gallery** repeats the featured image when no ACF gallery is uploaded. In production, an empty gallery slot would either show a graceful placeholder or hide unused thumbnails.
- **Team headshots** use generated SVG initials rather than real photos. The admin can swap to real images via featured image fields when team data moves to a CPT.
- **Hero visual** is a decorative SVG (abstract glass buildings) rather than a real photograph. Slot is ready for a real image upload via Customizer in production.
- **Footer newsletter signup** does not yet POST to a handler. In production, would integrate with Mailchimp / ConvertKit / a custom `wp_options` table.
- **Lighthouse SEO score is 50** because InstaWP's free tier sets "Discourage search engines from indexing this site" by default. Unchecking it in Settings → Reading would push the score to 90+ in production.
- **Contact Form 7 emails fail to send** with `mail_failed` because InstaWP's free tier has no SMTP configured. The forms validate, submit, and respond correctly — only delivery is blocked. In production this is a one-plugin fix (WP Mail SMTP).

---

## Local setup

1. Install [LocalWP](https://localwp.com/) or any WP environment running PHP 8.x and WP 6.x.
2. Clone this repo into `wp-content/themes/customtheme`:
   ```bash
   git clone https://github.com/philipangeloang/growmodo-philip.git customtheme
   ```
3. Activate **Estatein** in **Appearance → Themes**.
4. Install free plugins: **Advanced Custom Fields**, **Contact Form 7**, **Yoast SEO**.
5. **Settings → Permalinks** → Post name → Save (required for CPT URLs).
6. Create seeded content (or import a backup if available):
   - 3 Properties with featured images, marked as Featured
   - 3 Testimonials
   - 3 FAQs
   - 2 Clients (or rely on the static fallback)
7. Create CF7 forms — paste-ready markup is auto-generated in **Settings → Estatein**.
8. Paste the resulting form IDs into Settings → Estatein.
9. **Settings → Reading** → set "Home" as static homepage and uncheck "Discourage search engines."

---

## Browser support

Tested on:
- Chrome 124 (primary development browser; Lighthouse runs)
- Firefox 125 (spot check — no breakage)
- Safari 17 (spot check — no breakage)
- Mobile Chrome / Mobile Safari (DevTools device mode)

CSS uses `:has()` (Safari 15.4+, all modern browsers) and `scroll-snap-type` (universal). No legacy IE support.

---

## Lighthouse scores

| Category       | Score | Notes |
|----------------|-------|-------|
| Performance    | 98    | Single CSS file, inline SVGs, native lazy-load, no JS framework |
| Accessibility  | 88    | Semantic HTML, ARIA labels, focus states; could push to 95+ with stricter contrast |
| Best Practices | 96    | HTTPS, no console errors, modern image formats |
| SEO            | 50    | InstaWP blocks indexing by default; flips to 90+ once Settings → Reading is unchecked |

---

## Working with AI as part of the development workflow

This build was done with active use of an AI pairing tool (Claude). I treat it as a fast junior developer that I always review — not a black box that ships unsupervised code.

Concrete examples from this build:

- I caught and corrected a CSS cascade ordering bug where `@media (max-width: 1024px)` was defined later in the file than `@media (max-width: 768px)`, causing tablet rules to override mobile rules. Fix was source-order reorganization, not `!important`.
- I flagged that the property archive search bar was visually present but non-functional, and required it be wired up to a real WP Query.
- I flagged that the "Our Valued Clients" section from the Figma was missing entirely, and pushed for it to be implemented as a proper CPT (with static fallback) rather than another hardcoded array.
- I rejected an initial CF7 styling approach that fought against CF7's auto-`<p>` wrapping behavior, and required a rewrite that worked *with* the plugin's output instead.

The point isn't "I used AI." The point is that AI augmentation only matters if you keep the senior judgment calls under your own control.

---

## How this would scale to a real client engagement

If this were a paid build for a real estate agency rather than a 4-hour assessment, the next 40-60 hours would go into:

1. **Admin-ification** of every section currently hardcoded (table above) — ACF Repeaters, Customizer panels, additional CPTs for team and offices
2. **Real property filter logic** — meta_query for price range, taxonomy queries for location and type, AJAX for instant results
3. **WP Mail SMTP plugin** + a transactional email provider (Postmark / SendGrid) so forms actually deliver
4. **Schema.org structured data** on Property Details (`RealEstateListing`) for richer Google search results
5. **Block-editor patterns** for sections so editors can compose new pages from the existing design system
6. **Image optimization pipeline** — properly sized featured images, WebP/AVIF via a plugin like ShortPixel
7. **Multi-language support** via Polylang or WPML (theme is already translation-ready)
8. **Roles and capabilities** — a "Property Manager" role that can edit Properties but not theme files
9. **Backup, monitoring, performance budget** — UptimeRobot, ManageWP, query monitor in dev

The artifact you're reviewing is the foundation. The senior work isn't the templates — it's the decisions about what becomes a CPT, what becomes a Repeater, what stays in PHP, and how the admin experience will feel for the editor who logs in next Tuesday.

---

Built solo by Philip Angeloang for the Growmodo WordPress Developer assessment, April 2026.
