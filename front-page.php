<?php
/**
 * The front page template.
 *
 * Composes the homepage from modular section parts. Each part is
 * self-contained and can be reused on other pages where it makes sense.
 *
 * @package Estatein
 */

get_header();
?>

<?php get_template_part( 'template-parts/sections/hero' ); ?>

<?php get_template_part( 'template-parts/sections/features' ); ?>

<?php get_template_part( 'template-parts/sections/featured-properties' ); ?>

<?php get_template_part( 'template-parts/sections/testimonials' ); ?>

<?php get_template_part( 'template-parts/sections/faqs' ); ?>

<?php get_template_part( 'template-parts/sections/cta-band' ); ?>

<?php
get_footer();
