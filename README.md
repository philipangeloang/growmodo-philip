# Estatein — WordPress Real Estate Theme

> A custom WordPress theme built from scratch based on the [Estatein Figma template](https://www.figma.com/community/file/1314076616839640516). Submitted as part of the WordPress Developer assessment for Growmodo.

**Live demo:** https://realizable-dunlin-a12796.instawp.site/
**Repository:** https://github.com/philipangeloang/growmodo-philip

---

## Approach

The brief noted upfront that 4 hours is unlikely to be enough time to build the entire site. I treated it as a **stress test prioritization exercise**: depth and code quality on the parts I shipped, rather than thin coverage of every page.

My ranking, in priority:

1. **A clean, custom theme structure** — no page builders, no starter themes, no plugin-as-theme tricks
2. **A real WordPress data model** — Custom Post Types and ACF fields for Properties, Testimonials, FAQs
3. **Polished homepage + key inner pages** — homepage, About, Properties archive, Property Details, Services, Contact
4. **Working forms via Contact Form 7** — properly themed, not just visual placeholders
5. **Performance and accessibility** — design tokens, semantic HTML, native lazy-loading, no JS framework

The README and code organization are written assuming a senior developer will read them.

---

## Stack

- WordPress 6.9.4
- PHP 8.2
- Vanilla HTML / CSS / JS — no build step, no framework
- Advanced Custom Fields (free) — registered in code, not via the admin UI
- Contact Form 7 — for inquiry and contact forms (No SMTP Setup)
- Heroicons — inlined as SVG via a helper function
- Urbanist (Google Fonts) — matches the Figma template

No bundler. No SCSS preprocessor. Single `style.css` using CSS custom properties for the design system.

---

## What's done / what's not

### Shipped

- ✅ Custom theme bootstrap, properly enqueued assets, head cleanup
- ✅ Sticky header with announcement bar (dismissible, sessionStorage-persisted)
- ✅ Pill-style primary nav, header CTA button, mobile hamburger menu
- ✅ Five footer menu locations + newsletter form + social icons
- ✅ **Custom Post Types**: Property, Testimonial, FAQ
- ✅ **Custom Taxonomies**: Property Type, Location
- ✅ **ACF field groups registered in PHP** (not via the admin UI) so the data model is in version control
- ✅ Homepage: hero with rotating badge, 4-feature row, featured properties pulling from CPT, testimonials, FAQs, CTA band
- ✅ About Us: Our Journey + 4 Values + Achievements + 6-step process + Team grid
- ✅ Properties archive: hero + search bar + filter buttons + property grid + inquiry form
- ✅ Property Details: gallery + description + features + inquiry form (CF7) + comprehensive pricing breakdown + FAQs
- ✅ Services: 3 service groups with cards + CTA cards
- ✅ Contact: 4 info cards + contact form (CF7) + 2 office cards with tab UI
- ✅ Theme settings page (Settings → Estatein) for managing CF7 form IDs without editing code
- ✅ Static fallback forms when CF7 isn't configured
- ✅ Inline Heroicons SVG helper — no icon font, no external requests
- ✅ Translation-ready (`__()`, text domain, .pot-ready)
- ✅ Native lazy-loaded images (WP 5.5+ default)
- ✅ Yoast SEO integration
- ✅ Mobile carousel sliders for Featured Properties / Testimonials / FAQs (CSS scroll-snap + JS pager controls)

---

## Folder structure

```
customtheme/
├── style.css                 — theme stylesheet (incl. WP theme header)
├── functions.php             — theme setup, asset enqueues, menu registration
├── header.php                — site header + announcement bar
├── footer.php                — 5-column footer + newsletter + social
├── front-page.php            — homepage composition
├── page-about-us.php         — About Us template (slug-matched)
├── page-services.php         — Services template
├── page-contact.php          — Contact template
├── page-properties-page.php  — placeholder page that delegates to archive
├── archive-property.php      — Property CPT archive
├── single-property.php       — Property Details
├── single.php                — fallback single post
├── page.php                  — generic page fallback
├── index.php                 — fallback index
├── 404.php                   — not found
├── inc/
│   ├── icons.php             — inline SVG icon helper (Heroicons)
│   ├── custom-post-types.php — register Property, Testimonial, FAQ CPTs
│   ├── acf-fields.php        — ACF field groups registered in PHP
│   ├── property-helpers.php  — get_field wrappers, formatting, tag rendering
│   ├── cf7-settings.php      — admin page for CF7 form IDs
│   └── admin-notices.php     — ACF dependency warning
├── template-parts/
│   ├── sections/             — homepage sections (hero, features, etc.)
│   ├── cards/                — reusable cards (property, testimonial, faq)
│   └── forms/                — static fallback forms
└── assets/
    ├── css/
    ├── js/main.js            — mobile nav toggle, announce bar, carousel
    └── images/
```

---

## Decisions worth calling out

### Why register ACF fields in PHP, not via the admin UI

The first instinct is to set up fields by clicking through the ACF admin screens. That ships data definitions in the database, where they're invisible to git. Registering field groups via `acf_add_local_field_group()` keeps the schema in `inc/acf-fields.php`, so the data model travels with the codebase, deploys cleanly to other servers, and a senior reviewer can read the field structure without logging in.

### Why I didn't use SCSS or a build tool

For a 4-hour build, every minute saved on tooling is a minute spent on the actual product. CSS custom properties handle the design tokens cleanly, modern CSS handles everything else. Adding Webpack/Vite/Sass would have taken 20 minutes of setup that wouldn't have improved the output.

### Why Heroicons inline as SVG instead of an icon font

No external HTTP request, perfect scaling, recolorable via `currentColor`, no FOUT, accessible by default. Slightly larger HTML payload, but the bandwidth cost is negligible compared to the latency of a font request.

### Why static fallback forms for Contact Form 7

The theme is functional even if CF7 isn't installed. Reviewers can clone the repo, activate the theme, and get a coherent site without first having to install plugins. CF7 swaps in transparently once configured via Settings → Estatein.

### Why 5 separate footer menu locations

Each footer column is independently editable in the admin. Lower-skill site owners can change "Our Story" → "Company Story" without code changes. Mirrors the Figma's information architecture exactly.

### Why a Properties Page that delegates to the archive

WordPress page-vs-archive routing is genuinely a small mess. The "Properties" item in the menu links to `/properties-page/` (a real WP Page) which loads `page-properties-page.php`. That file overrides `$wp_query` with a property listing query, then renders `archive-property.php`. This way both `/properties/` (CPT archive URL) and `/properties-page/` (menu URL) show the same listing.

### Why CSS scroll-snap for the mobile carousel instead of a JS slider library

Slick, Swiper, and friends are 30-100 KB of JS for a behavior the browser already does natively. Below 1024px the property/testimonial/FAQ grids become flex containers with `scroll-snap-type: x mandatory`. Users get hardware-accelerated touch scrolling for free, and ~30 lines of vanilla JS hook the existing prev/next buttons up to `scrollBy()`. The "01 of N" indicator updates from the scroll position via `requestAnimationFrame`.

---

## Local setup

1. Install [LocalWP](https://localwp.com/) or any WP environment
2. Clone this repo into `wp-content/themes/customtheme`:
   ```bash
   git clone https://github.com/philipangeloang/growmodo-philip.git customtheme
   ```
3. Activate **Estatein** in **Appearance → Themes**
4. Install Advanced Custom Fields (free) and Contact Form 7
5. Settings → Permalinks → Post name → Save
6. Create the seeded content (or import from a backup if available):
   - 3 Properties with featured images, marked as Featured
   - 3 Testimonials
   - 3 FAQs
7. Create CF7 forms — markup snippets are auto-generated in **Settings → Estatein**
8. Paste form IDs in Settings → Estatein
9. Settings → Reading → set "Home" as static homepage

---

## Lighthouse scores

| Category       | Score                                                      |
| -------------- | ---------------------------------------------------------- |
| Performance    | 98                                                         |
| Accessibility  | 88                                                         |
| Best Practices | 96                                                         |
| SEO            | 50 (InstaWP blocks indexing by default; 90+ in production) |

---

Built by Philip Angeloang for Growmodo.
