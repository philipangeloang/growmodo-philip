<?php
/**
 * Archive template for the Property CPT.
 *
 * Displays the full listing of properties at /properties/.
 *
 * @package Estatein
 */

get_header();
?>

<?php /* Page hero */ ?>
<section class="page-hero">
    <div class="container">
        <span class="dots-deco" aria-hidden="true"><span></span><span></span><span></span></span>
        <h1><?php esc_html_e( 'Find Your Dream Property', 'estatein' ); ?></h1>
        <p><?php esc_html_e( 'Welcome to Estatein, where your dream property awaits in every corner of our beautiful world. Explore our curated selection of properties, each offering a unique story and a chance to redefine your life. With categories to suit every dreamer, your journey starts here.', 'estatein' ); ?></p>
    </div>
</section>

<?php /* Search bar — submits to WP search, scoped to the property CPT */ ?>
<section class="section property-search-section">
    <div class="container">
        <form class="property-search" role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <label class="screen-reader-text" for="property-search-input"><?php esc_html_e( 'Search for a property', 'estatein' ); ?></label>
            <input id="property-search-input" type="search" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" placeholder="<?php esc_attr_e( 'Search For A Property', 'estatein' ); ?>">
            <input type="hidden" name="post_type" value="property">
            <button type="submit" class="btn">
                <span aria-hidden="true">🔍</span>
                <?php esc_html_e( 'Find Property', 'estatein' ); ?>
            </button>
        </form>

        <div class="property-filters">
            <button class="filter-btn" type="button"><span aria-hidden="true">📍</span><?php esc_html_e( 'Location', 'estatein' ); ?> ▾</button>
            <button class="filter-btn" type="button"><span aria-hidden="true">🏠</span><?php esc_html_e( 'Property Type', 'estatein' ); ?> ▾</button>
            <button class="filter-btn" type="button"><span aria-hidden="true">💰</span><?php esc_html_e( 'Pricing Range', 'estatein' ); ?> ▾</button>
            <button class="filter-btn" type="button"><span aria-hidden="true">📦</span><?php esc_html_e( 'Property Size', 'estatein' ); ?> ▾</button>
            <button class="filter-btn" type="button"><span aria-hidden="true">📅</span><?php esc_html_e( 'Build Year', 'estatein' ); ?> ▾</button>
        </div>
    </div>
</section>

<?php /* Properties grid */ ?>
<section class="section featured-properties">
    <div class="container">
        <div class="section-head">
            <div class="section-head-text">
                <span class="dots-deco" aria-hidden="true"><span></span><span></span><span></span></span>
                <h2><?php esc_html_e( 'Discover a World of Possibilities', 'estatein' ); ?></h2>
                <p><?php esc_html_e( 'Our portfolio of properties is as diverse as your dreams. Explore the following categories to find the perfect property that resonates with your vision of home.', 'estatein' ); ?></p>
            </div>
        </div>

        <?php if ( have_posts() ) : ?>
            <div class="properties-grid">
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'template-parts/cards/property' ); ?>
                <?php endwhile; ?>
            </div>

            <div class="carousel-pager">
                <span class="page-indicator">
                    <?php
                    /* translators: 1: current item, 2: total items */
                    printf( esc_html__( '%1$s of %2$s', 'estatein' ), '01', esc_html( $wp_query->found_posts ) );
                    ?>
                </span>
                <div class="pager-buttons">
                    <button class="pager-btn" aria-label="<?php esc_attr_e( 'Previous', 'estatein' ); ?>">
                        <?php estatein_the_icon( 'arrow-left', 18 ); ?>
                    </button>
                    <button class="pager-btn" aria-label="<?php esc_attr_e( 'Next', 'estatein' ); ?>">
                        <?php estatein_the_icon( 'arrow-right', 18 ); ?>
                    </button>
                </div>
            </div>
        <?php else : ?>
            <p><?php esc_html_e( 'No properties listed yet. Check back soon.', 'estatein' ); ?></p>
        <?php endif; ?>
    </div>
</section>

<?php /* Let's Make it Happen — inquiry form */ ?>
<section class="section lets-make-it-happen">
    <div class="container">
        <div class="section-head">
            <div class="section-head-text">
                <span class="dots-deco" aria-hidden="true"><span></span><span></span><span></span></span>
                <h2><?php esc_html_e( "Let's Make it Happen", 'estatein' ); ?></h2>
                <p><?php esc_html_e( "Ready to take the first step toward your dream property? Fill out the form below, and our real estate wizards will work their magic to find your perfect match. Don't wait; let's embark on this exciting journey together.", 'estatein' ); ?></p>
            </div>
        </div>

        <div class="form-card">
            <?php
            // If Contact Form 7 is active and a form ID has been set, render it.
            // Otherwise show a static placeholder.
            $cf7_id = get_option( 'estatein_cf7_inquiry_id' );
            if ( $cf7_id && shortcode_exists( 'contact-form-7' ) ) {
                echo do_shortcode( '[contact-form-7 id="' . esc_attr( $cf7_id ) . '"]' );
            } else {
                get_template_part( 'template-parts/forms/inquiry-static' );
            }
            ?>
        </div>
    </div>
</section>

<?php get_template_part( 'template-parts/sections/cta-band' ); ?>

<?php get_footer();
