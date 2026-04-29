<?php
/**
 * Page Hero (header) — used on inner pages.
 *
 * Pass via $args:
 *   - eyebrow (string, optional)
 *   - title (string)
 *   - description (string)
 *
 * @package Estatein
 */

$eyebrow     = isset( $args['eyebrow'] ) ? $args['eyebrow'] : '';
$title       = isset( $args['title'] ) ? $args['title'] : get_the_title();
$description = isset( $args['description'] ) ? $args['description'] : '';
?>
<section class="page-hero">
    <div class="container">
        <?php if ( $eyebrow ) : ?>
            <span class="page-hero-eyebrow"><?php echo esc_html( $eyebrow ); ?></span>
        <?php endif; ?>
        <span class="dots-deco" aria-hidden="true"><span></span><span></span><span></span></span>
        <h1 class="page-hero-title"><?php echo esc_html( $title ); ?></h1>
        <?php if ( $description ) : ?>
            <p class="page-hero-desc"><?php echo esc_html( $description ); ?></p>
        <?php endif; ?>
    </div>
</section>
