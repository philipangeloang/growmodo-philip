<?php
/**
 * Custom Post Types: Property, Testimonial, FAQ.
 *
 * @package Estatein
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register the Property CPT.
 *
 * Public, has its own archive (used by the Properties page). Holds
 * featured image, gallery, ACF fields for price/specs/features.
 */
function estatein_register_property_cpt() {

    $labels = array(
        'name'                  => __( 'Properties', 'estatein' ),
        'singular_name'         => __( 'Property', 'estatein' ),
        'menu_name'             => __( 'Properties', 'estatein' ),
        'add_new'               => __( 'Add New', 'estatein' ),
        'add_new_item'          => __( 'Add New Property', 'estatein' ),
        'edit_item'             => __( 'Edit Property', 'estatein' ),
        'new_item'              => __( 'New Property', 'estatein' ),
        'view_item'             => __( 'View Property', 'estatein' ),
        'search_items'          => __( 'Search Properties', 'estatein' ),
        'not_found'             => __( 'No properties found', 'estatein' ),
        'featured_image'        => __( 'Property Cover Image', 'estatein' ),
    );

    register_post_type(
        'property',
        array(
            'labels'             => $labels,
            'public'             => true,
            'has_archive'        => true,
            'show_in_rest'       => true,
            'menu_icon'          => 'dashicons-admin-home',
            'menu_position'      => 5,
            'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
            'rewrite'            => array( 'slug' => 'properties', 'with_front' => false ),
            'hierarchical'       => false,
            'capability_type'    => 'post',
        )
    );

    // Property type taxonomy (Villa, Apartment, Townhouse, etc.).
    register_taxonomy(
        'property_type',
        'property',
        array(
            'labels'            => array(
                'name'          => __( 'Property Types', 'estatein' ),
                'singular_name' => __( 'Property Type', 'estatein' ),
            ),
            'public'            => true,
            'hierarchical'      => true,
            'show_admin_column' => true,
            'show_in_rest'      => true,
            'rewrite'           => array( 'slug' => 'property-type' ),
        )
    );

    // Location taxonomy (Malibu California, Downtown Metropolis, etc.).
    register_taxonomy(
        'property_location',
        'property',
        array(
            'labels'            => array(
                'name'          => __( 'Locations', 'estatein' ),
                'singular_name' => __( 'Location', 'estatein' ),
            ),
            'public'            => true,
            'hierarchical'      => true,
            'show_admin_column' => true,
            'show_in_rest'      => true,
            'rewrite'           => array( 'slug' => 'location' ),
        )
    );
}

/**
 * Register the Testimonial CPT.
 */
function estatein_register_testimonial_cpt() {

    $labels = array(
        'name'          => __( 'Testimonials', 'estatein' ),
        'singular_name' => __( 'Testimonial', 'estatein' ),
        'menu_name'     => __( 'Testimonials', 'estatein' ),
        'add_new_item'  => __( 'Add New Testimonial', 'estatein' ),
        'edit_item'     => __( 'Edit Testimonial', 'estatein' ),
        'search_items'  => __( 'Search Testimonials', 'estatein' ),
    );

    register_post_type(
        'testimonial',
        array(
            'labels'        => $labels,
            'public'        => false,
            'show_ui'       => true,
            'show_in_menu'  => true,
            'show_in_rest'  => true,
            'menu_icon'     => 'dashicons-format-quote',
            'menu_position' => 6,
            'supports'      => array( 'title', 'editor' ),
        )
    );
}

/**
 * Register the FAQ CPT.
 */
function estatein_register_faq_cpt() {

    $labels = array(
        'name'          => __( 'FAQs', 'estatein' ),
        'singular_name' => __( 'FAQ', 'estatein' ),
        'menu_name'     => __( 'FAQs', 'estatein' ),
        'add_new_item'  => __( 'Add New FAQ', 'estatein' ),
        'edit_item'     => __( 'Edit FAQ', 'estatein' ),
        'search_items'  => __( 'Search FAQs', 'estatein' ),
    );

    register_post_type(
        'faq',
        array(
            'labels'        => $labels,
            'public'        => false,
            'show_ui'       => true,
            'show_in_menu'  => true,
            'show_in_rest'  => true,
            'menu_icon'     => 'dashicons-editor-help',
            'menu_position' => 7,
            'supports'      => array( 'title', 'editor' ),
        )
    );
}

/**
 * Register the Client CPT (used for the "Our Valued Clients" section
 * on the About Us page). Each client has: title (company name),
 * since_year, domain, category, quote, and a website URL.
 */
function estatein_register_client_cpt() {

    $labels = array(
        'name'          => __( 'Clients', 'estatein' ),
        'singular_name' => __( 'Client', 'estatein' ),
        'menu_name'     => __( 'Clients', 'estatein' ),
        'add_new_item'  => __( 'Add New Client', 'estatein' ),
        'edit_item'     => __( 'Edit Client', 'estatein' ),
        'search_items'  => __( 'Search Clients', 'estatein' ),
    );

    register_post_type(
        'client',
        array(
            'labels'        => $labels,
            'public'        => false,
            'show_ui'       => true,
            'show_in_menu'  => true,
            'show_in_rest'  => true,
            'menu_icon'     => 'dashicons-businessperson',
            'menu_position' => 8,
            'supports'      => array( 'title', 'thumbnail' ),
        )
    );
}

/**
 * Hook all CPT registrations on init.
 */
function estatein_register_post_types() {
    estatein_register_property_cpt();
    estatein_register_testimonial_cpt();
    estatein_register_faq_cpt();
    estatein_register_client_cpt();
}
add_action( 'init', 'estatein_register_post_types' );
