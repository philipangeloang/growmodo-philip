# Custom Theme — WordPress Developer Assessment

A custom WordPress theme built from scratch based on a Figma design. **No page builders. No starter themes.**

## Stack

- **WordPress** 6.x · **PHP** 7.4+
- Vanilla **HTML / CSS / JS** — no build step, no framework dependencies
- CSS custom properties for design tokens
- WordPress template hierarchy + native menus / featured images / custom logo
- Modular `inc/` includes for CPTs and other registrations

## Local setup

1. Install [LocalWP](https://localwp.com/).
2. Create a new site (PHP 8.x, latest WP).
3. Clone this repo into `wp-content/themes/customtheme`:
   ```bash
   cd /path/to/site/app/public/wp-content/themes
   git clone <repo-url> customtheme
   ```
4. Activate **Custom Theme** in **Appearance → Themes**.
5. Set permalinks to **Post name** in **Settings → Permalinks**.
6. Set a static homepage in **Settings → Reading** (after creating a Home page).

## Folder structure

```
customtheme/
├── style.css              — theme header + all styles
├── functions.php          — theme setup, enqueues, menus
├── header.php             — site header + primary nav
├── footer.php             — site footer
├── front-page.php         — homepage template
├── page.php               — generic page template
├── single.php             — single post template
├── index.php              — fallback / blog index
├── 404.php                — not found
├── inc/
│   └── custom-post-types.php
├── template-parts/        — reusable section partials
└── assets/
    ├── css/
    ├── js/
    └── images/
```

## What's done / what's not

_(updated at submission)_

- [x] Custom theme bootstrap with proper WP supports
- [x] Sticky responsive header with accessible hamburger nav
- [x] Footer with second menu location
- [x] Template hierarchy: front-page, page, single, index, 404
- [ ] Homepage sections — _matched to Figma_
- [ ] Inner pages
- [ ] Custom post types + ACF fields
- [ ] Contact form
- [ ] Performance + SEO pass
- [ ] Cross-browser test

## Design decisions

_(filled in during development)_

## Demo

_(InstaWP / WP Sandbox link)_
