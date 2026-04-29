<?php
/**
 * Property archive filters.
 *
 * Reads filter values from URL query params on the property archive
 * (and on search results scoped to property) and applies them to the
 * main WP_Query via pre_get_posts.
 *
 * URL params:
 *   loc    : property_location term slug
 *   ptype  : property_type term slug
 *   price  : "0-500000", "500000-1000000", "1000000-2000000", "2000000-"
 *   size   : "0-1500", "1500-3000", "3000-5000", "5000-"
 *   year   : "0-2000", "2000-2010", "2010-2020", "2020-"
 *
 * @package Estatein
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Predefined ranges (label => "min-max" where empty = unbounded).
 * Centralised so the form UI and the filter logic stay in sync.
 */
function estatein_property_filter_ranges() {
    return array(
        'price' => array(
            ''                => __( 'Pricing Range', 'estatein' ),
            '0-500000'        => __( 'Under $500K', 'estatein' ),
            '500000-1000000'  => __( '$500K – $1M', 'estatein' ),
            '1000000-2000000' => __( '$1M – $2M', 'estatein' ),
            '2000000-'        => __( 'Over $2M', 'estatein' ),
        ),
        'size' => array(
            ''          => __( 'Property Size', 'estatein' ),
            '0-1500'    => __( 'Under 1,500 sq ft', 'estatein' ),
            '1500-3000' => __( '1,500 – 3,000 sq ft', 'estatein' ),
            '3000-5000' => __( '3,000 – 5,000 sq ft', 'estatein' ),
            '5000-'     => __( 'Over 5,000 sq ft', 'estatein' ),
        ),
        'year' => array(
            ''          => __( 'Build Year', 'estatein' ),
            '0-2000'    => __( 'Before 2000', 'estatein' ),
            '2000-2010' => __( '2000 – 2010', 'estatein' ),
            '2010-2020' => __( '2010 – 2020', 'estatein' ),
            '2020-'     => __( '2020 or newer', 'estatein' ),
        ),
    );
}

/**
 * Parse "min-max" into [int, int|null]. Empty side = null (unbounded).
 *
 * @param string $value e.g. "1500-3000" or "5000-".
 * @return array [min, max] where max may be null.
 */
function estatein_parse_range( $value ) {
    if ( empty( $value ) || false === strpos( $value, '-' ) ) {
        return null;
    }
    list( $min, $max ) = array_pad( explode( '-', $value, 2 ), 2, '' );
    return array(
        'min' => is_numeric( $min ) ? (int) $min : 0,
        'max' => is_numeric( $max ) && $max !== '' ? (int) $max : null,
    );
}

/**
 * Modify the main query on the Property archive with active filters.
 *
 * @param WP_Query $query
 */
function estatein_filter_property_archive( $query ) {

    // Bail in admin and on non-main queries.
    if ( is_admin() || ! $query->is_main_query() ) {
        return;
    }

    // Only the property archive (or property-scoped search).
    $is_property_archive = $query->is_post_type_archive( 'property' );
    $is_property_search  = $query->is_search() && 'property' === $query->get( 'post_type' );
    if ( ! $is_property_archive && ! $is_property_search ) {
        return;
    }

    // Taxonomy filters.
    $tax_query = array();

    $loc = isset( $_GET['loc'] ) ? sanitize_title( wp_unslash( $_GET['loc'] ) ) : '';
    if ( $loc ) {
        $tax_query[] = array(
            'taxonomy' => 'property_location',
            'field'    => 'slug',
            'terms'    => $loc,
        );
    }

    $ptype = isset( $_GET['ptype'] ) ? sanitize_title( wp_unslash( $_GET['ptype'] ) ) : '';
    if ( $ptype ) {
        $tax_query[] = array(
            'taxonomy' => 'property_type',
            'field'    => 'slug',
            'terms'    => $ptype,
        );
    }

    if ( $tax_query ) {
        $tax_query['relation'] = 'AND';
        $query->set( 'tax_query', $tax_query );
    }

    // Range filters: price, size, year.
    $meta_query = array();
    $range_map  = array(
        'price' => 'property_price',
        'size'  => 'property_area',
        'year'  => 'property_built_year',
    );

    foreach ( $range_map as $param => $meta_key ) {
        if ( empty( $_GET[ $param ] ) ) {
            continue;
        }
        $range = estatein_parse_range( sanitize_text_field( wp_unslash( $_GET[ $param ] ) ) );
        if ( ! $range ) {
            continue;
        }
        if ( null === $range['max'] ) {
            $meta_query[] = array(
                'key'     => $meta_key,
                'value'   => $range['min'],
                'compare' => '>=',
                'type'    => 'NUMERIC',
            );
        } else {
            $meta_query[] = array(
                'key'     => $meta_key,
                'value'   => array( $range['min'], $range['max'] ),
                'compare' => 'BETWEEN',
                'type'    => 'NUMERIC',
            );
        }
    }

    if ( $meta_query ) {
        $meta_query['relation'] = 'AND';
        $query->set( 'meta_query', $meta_query );
    }
}
add_action( 'pre_get_posts', 'estatein_filter_property_archive' );
