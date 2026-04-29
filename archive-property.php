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

<?php /* Search bar + filters — one GET form, submits to the property archive */ ?>
<section class="section property-search-section">
    <div class="container">
        <?php
        $ranges        = estatein_property_filter_ranges();
        $current_loc   = isset( $_GET['loc'] )   ? sanitize_title( wp_unslash( $_GET['loc'] ) )    : '';
        $current_ptype = isset( $_GET['ptype'] ) ? sanitize_title( wp_unslash( $_GET['ptype'] ) )  : '';
        $current_price = isset( $_GET['price'] ) ? sanitize_text_field( wp_unslash( $_GET['price'] ) ) : '';
        $current_size  = isset( $_GET['size'] )  ? sanitize_text_field( wp_unslash( $_GET['size'] ) )  : '';
        $current_year  = isset( $_GET['year'] )  ? sanitize_text_field( wp_unslash( $_GET['year'] ) )  : '';
        $current_s     = get_search_query();

        $locations      = get_terms( array( 'taxonomy' => 'property_location', 'hide_empty' => false ) );
        $property_types = get_terms( array( 'taxonomy' => 'property_type',     'hide_empty' => false ) );
        ?>
        <form class="property-search-form" role="search" method="get" action="<?php echo esc_url( get_post_type_archive_link( 'property' ) ); ?>">

            <div class="property-search">
                <label class="screen-reader-text" for="property-search-input"><?php esc_html_e( 'Search for a property', 'estatein' ); ?></label>
                <input id="property-search-input" type="search" name="s" value="<?php echo esc_attr( $current_s ); ?>" placeholder="<?php esc_attr_e( 'Search For A Property', 'estatein' ); ?>">
                <button type="submit" class="btn">
                    <?php estatein_the_icon( 'magnifying-glass', 16 ); ?>
                    <?php esc_html_e( 'Find Property', 'estatein' ); ?>
                </button>
            </div>

            <div class="property-filters">

                <label class="filter-wrap">
                    <?php estatein_the_icon( 'map-pin', 16 ); ?>
                    <select name="loc" onchange="this.form.submit()">
                        <option value=""><?php esc_html_e( 'Location', 'estatein' ); ?></option>
                        <?php if ( ! is_wp_error( $locations ) ) : foreach ( $locations as $term ) : ?>
                            <option value="<?php echo esc_attr( $term->slug ); ?>" <?php selected( $current_loc, $term->slug ); ?>><?php echo esc_html( $term->name ); ?></option>
                        <?php endforeach; endif; ?>
                    </select>
                    <?php estatein_the_icon( 'chevron-down', 14 ); ?>
                </label>

                <label class="filter-wrap">
                    <?php estatein_the_icon( 'home', 16 ); ?>
                    <select name="ptype" onchange="this.form.submit()">
                        <option value=""><?php esc_html_e( 'Property Type', 'estatein' ); ?></option>
                        <?php if ( ! is_wp_error( $property_types ) ) : foreach ( $property_types as $term ) : ?>
                            <option value="<?php echo esc_attr( $term->slug ); ?>" <?php selected( $current_ptype, $term->slug ); ?>><?php echo esc_html( $term->name ); ?></option>
                        <?php endforeach; endif; ?>
                    </select>
                    <?php estatein_the_icon( 'chevron-down', 14 ); ?>
                </label>

                <label class="filter-wrap">
                    <?php estatein_the_icon( 'currency-dollar', 16 ); ?>
                    <select name="price" onchange="this.form.submit()">
                        <?php foreach ( $ranges['price'] as $value => $label ) : ?>
                            <option value="<?php echo esc_attr( $value ); ?>" <?php selected( $current_price, $value ); ?>><?php echo esc_html( $label ); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php estatein_the_icon( 'chevron-down', 14 ); ?>
                </label>

                <label class="filter-wrap">
                    <?php estatein_the_icon( 'cube', 16 ); ?>
                    <select name="size" onchange="this.form.submit()">
                        <?php foreach ( $ranges['size'] as $value => $label ) : ?>
                            <option value="<?php echo esc_attr( $value ); ?>" <?php selected( $current_size, $value ); ?>><?php echo esc_html( $label ); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php estatein_the_icon( 'chevron-down', 14 ); ?>
                </label>

                <label class="filter-wrap">
                    <?php estatein_the_icon( 'calendar', 16 ); ?>
                    <select name="year" onchange="this.form.submit()">
                        <?php foreach ( $ranges['year'] as $value => $label ) : ?>
                            <option value="<?php echo esc_attr( $value ); ?>" <?php selected( $current_year, $value ); ?>><?php echo esc_html( $label ); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php estatein_the_icon( 'chevron-down', 14 ); ?>
                </label>

            </div>
        </form>
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
