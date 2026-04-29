<?php
/**
 * Default page template.
 *
 * @package Estatein
 */

get_header();
?>

<section class="section">
    <div class="container">
        <?php
        while ( have_posts() ) :
            the_post();
            ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class( 'page-content' ); ?>>

                <header class="page-header section-head">
                    <div class="section-head-text">
                        <span class="dots-deco" aria-hidden="true"><span></span><span></span><span></span></span>
                        <h1 class="page-title"><?php the_title(); ?></h1>
                    </div>
                </header>

                <div class="entry-content">
                    <?php the_content(); ?>
                </div>

            </article>

        <?php endwhile; ?>
    </div>
</section>

<?php get_template_part( 'template-parts/sections/cta-band' ); ?>

<?php
get_footer();
