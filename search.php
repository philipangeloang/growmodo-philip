<?php
/**
 * The template for displaying search results.
 *
 * If `post_type=property` is in the query (from the property search bar),
 * we render the same archive layout. Otherwise we fall back to a generic
 * search results listing.
 *
 * @package Estatein
 */

get_header();

$is_property_search = isset( $_GET['post_type'] ) && 'property' === $_GET['post_type']; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
?>

<section class="page-hero">
    <div class="container">
        <span class="dots-deco" aria-hidden="true"><span></span><span></span><span></span></span>
        <h1>
            <?php
            if ( $is_property_search ) {
                /* translators: %s: search term */
                printf( esc_html__( 'Properties matching "%s"', 'estatein' ), esc_html( get_search_query() ) );
            } else {
                /* translators: %s: search term */
                printf( esc_html__( 'Search results for "%s"', 'estatein' ), esc_html( get_search_query() ) );
            }
            ?>
        </h1>
        <p>
            <?php
            global $wp_query;
            $count = (int) $wp_query->found_posts;
            /* translators: %d: number of results */
            printf( esc_html( _n( '%d result found.', '%d results found.', $count, 'estatein' ) ), $count );
            ?>
            <a href="<?php echo esc_url( home_url( '/properties/' ) ); ?>" style="margin-left:1rem;">
                <?php esc_html_e( 'Clear search →', 'estatein' ); ?>
            </a>
        </p>
    </div>
</section>

<section class="section">
    <div class="container">

        <?php if ( have_posts() ) : ?>
            <div class="properties-grid">
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php
                    if ( get_post_type() === 'property' ) {
                        get_template_part( 'template-parts/cards/property' );
                    } else {
                        // Generic post fallback rendered as a property-style card.
                        ?>
                        <article <?php post_class( 'property-card' ); ?>>
                            <?php if ( has_post_thumbnail() ) : ?>
                                <a href="<?php the_permalink(); ?>" class="thumb">
                                    <?php the_post_thumbnail( 'medium_large' ); ?>
                                </a>
                            <?php endif; ?>
                            <div class="property-body">
                                <h3>
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <p class="desc"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 18 ) ); ?></p>
                            </div>
                        </article>
                        <?php
                    }
                    ?>
                <?php endwhile; ?>
            </div>

            <?php
            $prev_link = get_previous_posts_link( esc_html__( '← Previous', 'estatein' ) );
            $next_link = get_next_posts_link( esc_html__( 'Next →', 'estatein' ) );
            if ( $prev_link || $next_link ) :
                ?>
                <div class="search-pagination" style="display:flex;gap:1rem;justify-content:center;margin-top:var(--space-5);">
                    <?php
                    if ( $prev_link ) {
                        echo '<span class="btn btn-secondary">' . wp_kses_post( $prev_link ) . '</span>';
                    }
                    if ( $next_link ) {
                        echo '<span class="btn btn-secondary">' . wp_kses_post( $next_link ) . '</span>';
                    }
                    ?>
                </div>
            <?php endif; ?>

        <?php else : ?>
            <div class="card" style="text-align:center; padding:var(--space-7);">
                <h2><?php esc_html_e( 'No results', 'estatein' ); ?></h2>
                <p style="margin-bottom:var(--space-4);">
                    <?php esc_html_e( "We couldn't find any properties matching your search. Try different keywords or browse all properties.", 'estatein' ); ?>
                </p>
                <a href="<?php echo esc_url( home_url( '/properties/' ) ); ?>" class="btn">
                    <?php esc_html_e( 'View All Properties', 'estatein' ); ?>
                </a>
            </div>
        <?php endif; ?>

    </div>
</section>

<?php get_template_part( 'template-parts/sections/cta-band' ); ?>

<?php get_footer();
