<?php
/**
 * Single Property template.
 *
 * Shows full property details: gallery, description, features, inquiry form,
 * pricing breakdown, FAQs.
 *
 * @package Estatein
 */

get_header();

while ( have_posts() ) :
    the_post();

    $price         = estatein_field( 'property_price' );
    $bedrooms      = estatein_field( 'property_bedrooms' );
    $bathrooms     = estatein_field( 'property_bathrooms' );
    $area          = estatein_field( 'property_area' );
    $location_text = estatein_field( 'property_location_text' );
    $features      = estatein_field( 'property_features' );
    $gallery       = estatein_field( 'property_gallery' );
    ?>

    <?php /* Top bar: title + location + price */ ?>
    <section class="property-top">
        <div class="container property-top-grid">
            <div>
                <h1 class="property-title"><?php the_title(); ?></h1>
                <?php if ( $location_text ) : ?>
                    <span class="property-location">
                        <?php estatein_the_icon( 'map-pin', 16 ); ?>
                        <?php echo esc_html( $location_text ); ?>
                    </span>
                <?php endif; ?>
            </div>
            <?php if ( $price ) : ?>
                <div class="property-price-block">
                    <span class="price-label"><?php esc_html_e( 'Price', 'estatein' ); ?></span>
                    <span class="price"><?php echo esc_html( estatein_format_price( $price ) ); ?></span>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <?php /* Gallery */ ?>
    <section class="property-gallery-section">
        <div class="container">
            <div class="property-gallery-frame">
                <?php
                $images = array();
                if ( has_post_thumbnail() ) {
                    $images[] = get_the_post_thumbnail_url( null, 'large' );
                }
                if ( ! empty( $gallery ) && is_array( $gallery ) ) {
                    foreach ( $gallery as $img ) {
                        if ( is_array( $img ) && ! empty( $img['url'] ) ) {
                            $images[] = $img['url'];
                        }
                    }
                }

                // Always need at least 2 placeholders for the layout.
                while ( count( $images ) < 2 ) {
                    $images[] = '';
                }
                ?>

                <div class="gallery-thumbs" aria-hidden="true">
                    <?php for ( $i = 0; $i < 8; $i++ ) : ?>
                        <div class="gallery-thumb" style="<?php echo $images[ $i % max( 1, count( $images ) ) ] ? 'background-image:url(' . esc_url( $images[ $i % count( $images ) ] ) . ');' : 'background:linear-gradient(135deg,#262626,#1A1A1A);'; ?>"></div>
                    <?php endfor; ?>
                </div>

                <div class="gallery-main">
                    <div class="gallery-main-img" style="<?php echo $images[0] ? 'background-image:url(' . esc_url( $images[0] ) . ');' : 'background:linear-gradient(135deg,#1A1A1A,#262626);'; ?>"></div>
                    <div class="gallery-main-img" style="<?php echo $images[1] ? 'background-image:url(' . esc_url( $images[1] ) . ');' : 'background:linear-gradient(135deg,#262626,#333);'; ?>"></div>
                </div>

                <div class="carousel-pager gallery-pager" aria-hidden="true">
                    <div class="pager-buttons">
                        <button class="pager-btn"><?php estatein_the_icon( 'arrow-left', 18 ); ?></button>
                    </div>
                    <span class="gallery-dots">
                        <span class="dot active"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                        <span class="dot"></span>
                    </span>
                    <div class="pager-buttons">
                        <button class="pager-btn"><?php estatein_the_icon( 'arrow-right', 18 ); ?></button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php /* Description + Key Features */ ?>
    <section class="section property-description-section">
        <div class="container property-desc-grid">

            <div class="property-desc-card">
                <h2><?php esc_html_e( 'Description', 'estatein' ); ?></h2>
                <div class="property-desc-content">
                    <?php the_content(); ?>
                </div>

                <div class="property-spec-row">
                    <div class="spec-item">
                        <span class="spec-icon"><?php estatein_the_icon( 'bed', 18 ); ?></span>
                        <div>
                            <span class="spec-label"><?php esc_html_e( 'Bedrooms', 'estatein' ); ?></span>
                            <span class="spec-value"><?php echo esc_html( str_pad( (string) $bedrooms, 2, '0', STR_PAD_LEFT ) ); ?></span>
                        </div>
                    </div>
                    <div class="spec-item">
                        <span class="spec-icon"><?php estatein_the_icon( 'bath', 18 ); ?></span>
                        <div>
                            <span class="spec-label"><?php esc_html_e( 'Bathrooms', 'estatein' ); ?></span>
                            <span class="spec-value"><?php echo esc_html( str_pad( (string) $bathrooms, 2, '0', STR_PAD_LEFT ) ); ?></span>
                        </div>
                    </div>
                    <div class="spec-item">
                        <span class="spec-icon"><?php estatein_the_icon( 'building', 18 ); ?></span>
                        <div>
                            <span class="spec-label"><?php esc_html_e( 'Area', 'estatein' ); ?></span>
                            <span class="spec-value"><?php echo esc_html( number_format( (int) $area ) ); ?> <?php esc_html_e( 'Square Feet', 'estatein' ); ?></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="property-features-card">
                <h2><?php esc_html_e( 'Key Features and Amenities', 'estatein' ); ?></h2>
                <ul class="features-list">
                    <?php
                    if ( ! empty( $features ) && is_array( $features ) ) {
                        foreach ( $features as $f ) {
                            $text = is_array( $f ) ? ( $f['feature'] ?? '' ) : (string) $f;
                            if ( $text ) {
                                echo '<li><span class="bolt" aria-hidden="true">⚡</span>' . esc_html( $text ) . '</li>';
                            }
                        }
                    } else {
                        // Fallback list if no features.
                        $defaults = array(
                            __( 'Expansive oceanfront terrace for outdoor entertaining', 'estatein' ),
                            __( 'Gourmet kitchen with top-of-the-line appliances', 'estatein' ),
                            __( 'Private beach access for morning strolls and sunset views', 'estatein' ),
                            __( 'Master suite with a spa-inspired bathroom and ocean-facing balcony', 'estatein' ),
                            __( 'Private garage and ample storage space', 'estatein' ),
                        );
                        foreach ( $defaults as $f ) {
                            echo '<li><span class="bolt" aria-hidden="true">⚡</span>' . esc_html( $f ) . '</li>';
                        }
                    }
                    ?>
                </ul>
            </div>

        </div>
    </section>

    <?php /* Inquire form */ ?>
    <section class="section property-inquiry-section">
        <div class="container property-inquiry-grid">
            <div class="property-inquiry-text">
                <span class="dots-deco" aria-hidden="true"><span></span><span></span><span></span></span>
                <h2>
                    <?php
                    /* translators: %s: property name */
                    printf( esc_html__( 'Inquire About %s', 'estatein' ), esc_html( get_the_title() ) );
                    ?>
                </h2>
                <p><?php esc_html_e( "Interested in this property? Fill out the form below, and our real estate experts will get back to you with more details, including scheduling a viewing and answering any questions you may have.", 'estatein' ); ?></p>
            </div>

            <div class="form-card">
                <?php
                $cf7_id = get_option( 'estatein_cf7_inquiry_id' );
                if ( $cf7_id && shortcode_exists( 'contact-form-7' ) ) {
                    echo do_shortcode( '[contact-form-7 id="' . esc_attr( $cf7_id ) . '"]' );
                } else {
                    get_template_part( 'template-parts/forms/inquiry-static', null, array( 'property_title' => get_the_title() ) );
                }
                ?>
            </div>
        </div>
    </section>

    <?php /* Pricing details */ ?>
    <section class="section property-pricing-section">
        <div class="container">
            <div class="section-head">
                <div class="section-head-text">
                    <span class="dots-deco" aria-hidden="true"><span></span><span></span><span></span></span>
                    <h2><?php esc_html_e( 'Comprehensive Pricing Details', 'estatein' ); ?></h2>
                    <p>
                        <?php
                        /* translators: %s: property title */
                        printf( esc_html__( 'At Estatein, transparency is key. We want you to have a clear understanding of all costs associated with your property investment. Below, we break down the pricing for %s to help you make an informed decision.', 'estatein' ), esc_html( get_the_title() ) );
                        ?>
                    </p>
                </div>
            </div>

            <div class="pricing-note">
                <strong><?php esc_html_e( 'Note', 'estatein' ); ?></strong>
                <span><?php esc_html_e( 'The figures provided above are estimates and may vary depending on the property, location, and individual circumstances.', 'estatein' ); ?></span>
            </div>

            <div class="pricing-grid">
                <div class="pricing-side">
                    <span class="price-label"><?php esc_html_e( 'Listing Price', 'estatein' ); ?></span>
                    <span class="price-big"><?php echo esc_html( estatein_format_price( $price ) ); ?></span>
                </div>
                <div class="pricing-cards">
                    <div class="pricing-card">
                        <div class="pricing-card-head">
                            <h3><?php esc_html_e( 'Additional Fees', 'estatein' ); ?></h3>
                            <a href="#" class="learn-more"><?php esc_html_e( 'Learn More', 'estatein' ); ?></a>
                        </div>
                        <div class="pricing-rows">
                            <div class="pricing-row">
                                <span class="row-label"><?php esc_html_e( 'Property Transfer Tax', 'estatein' ); ?></span>
                                <span class="row-value">$25,000</span>
                                <span class="row-meta"><?php esc_html_e( 'Based on the sale price and local regulations', 'estatein' ); ?></span>
                            </div>
                            <div class="pricing-row">
                                <span class="row-label"><?php esc_html_e( 'Legal Fees', 'estatein' ); ?></span>
                                <span class="row-value">$3,000</span>
                                <span class="row-meta"><?php esc_html_e( 'Approximate cost for legal services, including title transfer', 'estatein' ); ?></span>
                            </div>
                            <div class="pricing-row">
                                <span class="row-label"><?php esc_html_e( 'Home Inspection', 'estatein' ); ?></span>
                                <span class="row-value">$500</span>
                                <span class="row-meta"><?php esc_html_e( 'Recommended for due diligence', 'estatein' ); ?></span>
                            </div>
                            <div class="pricing-row">
                                <span class="row-label"><?php esc_html_e( 'Property Insurance', 'estatein' ); ?></span>
                                <span class="row-value">$1,200</span>
                                <span class="row-meta"><?php esc_html_e( 'Annual cost for comprehensive property insurance', 'estatein' ); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php /* FAQ */ ?>
    <?php get_template_part( 'template-parts/sections/faqs' ); ?>

    <?php /* CTA band */ ?>
    <?php get_template_part( 'template-parts/sections/cta-band' ); ?>

<?php endwhile; ?>

<?php get_footer();
