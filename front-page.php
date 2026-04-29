<?php
/**
 * The front page template.
 *
 * Used when a static page is set as the homepage in Settings > Reading.
 * Sections below will be tuned to match the Figma design.
 *
 * @package CustomTheme
 */

get_header();
?>

<section class="hero section">
    <div class="container">
        <h1><?php bloginfo( 'name' ); ?></h1>
        <p><?php bloginfo( 'description' ); ?></p>
        <p>
            <a class="btn" href="#">Get started</a>
            <a class="btn btn-secondary" href="#">Learn more</a>
        </p>
    </div>
</section>

<!--
    TODO: convert remaining Figma sections (features / services / testimonials / CTA / etc.)
    into modular template parts under /template-parts/sections/.
-->

<?php
get_footer();
