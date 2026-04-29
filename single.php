<?php
/**
 * The template for displaying a single post.
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

        <article id="post-<?php the_ID(); ?>" <?php post_class( 'single-post' ); ?>>

            <header class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
                <div class="post-meta">
                    <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                        <?php echo esc_html( get_the_date() ); ?>
                    </time>
                    <span class="byline"> &middot; <?php the_author(); ?></span>
                </div>
            </header>

            <?php if ( has_post_thumbnail() ) : ?>
                <div class="entry-thumb">
                    <?php the_post_thumbnail( 'large' ); ?>
                </div>
            <?php endif; ?>

            <div class="entry-content">
                <?php the_content(); ?>
            </div>

        </article>

        <?php
        if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif;
        ?>

    <?php endwhile; ?>

</div>

<?php
get_footer();
