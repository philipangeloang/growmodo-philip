<?php
/**
 * Property template helpers.
 *
 * Wrappers around get_field() that gracefully degrade when ACF is missing
 * and centralize formatting (currency, area, etc).
 *
 * @package Estatein
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Safely get an ACF field, falling back to post meta if ACF isn't active.
 */
function estatein_field( $name, $post_id = null ) {
    $post_id = $post_id ?: get_the_ID();
    if ( function_exists( 'get_field' ) ) {
        return get_field( $name, $post_id );
    }
    return get_post_meta( $post_id, $name, true );
}

/**
 * Format a price as USD with no decimals.
 */
function estatein_format_price( $price ) {
    if ( '' === $price || null === $price ) {
        return '';
    }
    return '$' . number_format( (float) $price );
}

/**
 * Get the property type term names as a comma-separated string.
 */
function estatein_property_type( $post_id = null ) {
    $post_id = $post_id ?: get_the_ID();
    $terms   = get_the_terms( $post_id, 'property_type' );
    if ( empty( $terms ) || is_wp_error( $terms ) ) {
        return '';
    }
    return wp_list_pluck( $terms, 'name' );
}

/**
 * Render the row of feature tags (bedrooms / bathrooms / type) on a property card.
 */
function estatein_property_tags( $post_id = null ) {
    $post_id   = $post_id ?: get_the_ID();
    $bedrooms  = estatein_field( 'property_bedrooms', $post_id );
    $bathrooms = estatein_field( 'property_bathrooms', $post_id );
    $types     = estatein_property_type( $post_id );
    ?>
    <div class="property-tags">
        <?php if ( $bedrooms ) : ?>
            <span class="property-tag">
                <?php estatein_the_icon( 'bed', 14 ); ?>
                <?php
                /* translators: %d: number of bedrooms */
                printf( esc_html__( '%d-Bedroom', 'estatein' ), intval( $bedrooms ) );
                ?>
            </span>
        <?php endif; ?>
        <?php if ( $bathrooms ) : ?>
            <span class="property-tag">
                <?php estatein_the_icon( 'bath', 14 ); ?>
                <?php
                /* translators: %d: number of bathrooms */
                printf( esc_html__( '%d-Bathroom', 'estatein' ), intval( $bathrooms ) );
                ?>
            </span>
        <?php endif; ?>
        <?php if ( ! empty( $types ) ) : ?>
            <?php foreach ( (array) $types as $type ) : ?>
                <span class="property-tag">
                    <?php estatein_the_icon( 'building', 14 ); ?>
                    <?php echo esc_html( $type ); ?>
                </span>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <?php
}
