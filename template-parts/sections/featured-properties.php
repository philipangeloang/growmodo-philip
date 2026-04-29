<?php
/**
 * Section: Featured Properties
 *
 * Pulls properties with property_featured = true from the CPT.
 * Falls back to "any 3 properties" if none are flagged.
 *
 * @package Estatein
 */

// First, try to query properties marked as featured.
$featured_query = new WP_Query(
    array(
        'post_type'      => 'property',
        'posts_per_page' => 3,
        'meta_query'     => array(
            array(
                'key'   => 'property_featured',
                'value' => '1',
            ),
        ),
    )
);

// Fallback: just grab the latest 3 if nothing is flagged.
if ( ! $featured_query->have_posts() ) {
    $featured_query = new WP_Query(
        array(
            'post_type'      => 'property',
            'posts_per_page' => 3,
        )
    );
}

if ( ! $featured_query->have_posts() ) {
    return; // Nothing to show — bail silently.
}
?>
<section class="featured-properties section">
    <div class="container">

        <div class="section-head">
            <div class="section-head-text">
                <span class="dots-deco" aria-hidden="true"><span></span><span></span><span></span></span>
                <h2><?php esc_html_e( 'Featured Properties', 'estatein' ); ?></h2>
                <p><?php esc_html_e( 'Explore our handpicked selection of featured properties. Each listing offers a glimpse into exceptional homes and investments available through Estatein. Click "View Details" for more information.', 'estatein' ); ?></p>
            </div>
            <a href="<?php echo esc_url( home_url( '/properties/' ) ); ?>" class="btn btn-secondary">
                <?php esc_html_e( 'View All Properties', 'estatein' ); ?>
            </a>
        </div>

        <div class="properties-grid">
            <?php
            while ( $featured_query->have_posts() ) :
                $featured_query->the_post();
                get_template_part( 'template-parts/cards/property' );
            endwhile;
            wp_reset_postdata();
            ?>
        </div>

        <div class="carousel-pager" aria-hidden="true">
            <span class="page-indicator">01 <span class="of">of</span> <?php echo esc_html( $featured_query->found_posts ); ?></span>
            <div class="pager-buttons">
                <button class="pager-btn" aria-label="<?php esc_attr_e( 'Previous', 'estatein' ); ?>">
                    <?php estatein_the_icon( 'arrow-left', 18 ); ?>
                </button>
                <button class="pager-btn" aria-label="<?php esc_attr_e( 'Next', 'estatein' ); ?>">
                    <?php estatein_the_icon( 'arrow-right', 18 ); ?>
                </button>
            </div>
        </div>

    </div>
</section>
