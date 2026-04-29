<?php
/**
 * The template for displaying all single pages.
 *
 * @package CustomTheme
 */

get_header();
?>

<div class="container">

    <?php
    while ( have_posts() ) :
        the_post();
        ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class( 'page-content' ); ?>>

            <header class="page-header">
                <h1 class="page-title"><?php the_title(); ?></h1>
            </header>

            <div class="entry-content">
                <?php the_content(); ?>
            </div>

        </article>

    <?php endwhile; ?>

</div>

<?php
get_footer();
