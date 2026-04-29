<?php
/**
 * The main template file.
 *
 * The fallback used when no more specific template matches the request.
 *
 * @package CustomTheme
 */

get_header();
?>

<div class="container">

    <?php if ( have_posts() ) : ?>

        <div class="posts-grid">
            <?php
            while ( have_posts() ) :
                the_post();
                ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class( 'post-card' ); ?>>

                    <?php if ( has_post_thumbnail() ) : ?>
                        <a class="post-thumb" href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail( 'medium_large' ); ?>
                        </a>
                    <?php endif; ?>

                    <div class="post-content">
                        <h2 class="post-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>

                        <div class="post-meta">
                            <time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
                                <?php echo esc_html( get_the_date() ); ?>
                            </time>
                        </div>

                        <div class="post-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>

                </article>

            <?php endwhile; ?>
        </div>

        <?php the_posts_pagination(); ?>

    <?php else : ?>

        <p><?php esc_html_e( 'No posts found.', 'customtheme' ); ?></p>

    <?php endif; ?>

</div>

<?php
get_footer();
