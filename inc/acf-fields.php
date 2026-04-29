<?php
/**
 * ACF field groups registered in PHP.
 *
 * Registering fields in code (vs. via the ACF admin UI) keeps the
 * data model in version control and makes the theme self-contained.
 *
 * Requires Advanced Custom Fields (Free) to be active.
 *
 * @package Estatein
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Properties field group.
 */
function estatein_register_property_fields() {

    if ( ! function_exists( 'acf_add_local_field_group' ) ) {
        return;
    }

    acf_add_local_field_group(
        array(
            'key'      => 'group_property_details',
            'title'    => __( 'Property Details', 'estatein' ),
            'fields'   => array(
                array(
                    'key'           => 'field_property_price',
                    'label'         => __( 'Price (USD)', 'estatein' ),
                    'name'          => 'property_price',
                    'type'          => 'number',
                    'instructions'  => __( 'List price in USD, no commas.', 'estatein' ),
                    'required'      => 1,
                    'min'           => 0,
                ),
                array(
                    'key'           => 'field_property_bedrooms',
                    'label'         => __( 'Bedrooms', 'estatein' ),
                    'name'          => 'property_bedrooms',
                    'type'          => 'number',
                    'min'           => 0,
                    'wrapper'       => array( 'width' => '33' ),
                ),
                array(
                    'key'           => 'field_property_bathrooms',
                    'label'         => __( 'Bathrooms', 'estatein' ),
                    'name'          => 'property_bathrooms',
                    'type'          => 'number',
                    'min'           => 0,
                    'wrapper'       => array( 'width' => '33' ),
                ),
                array(
                    'key'           => 'field_property_area',
                    'label'         => __( 'Area (sq. ft.)', 'estatein' ),
                    'name'          => 'property_area',
                    'type'          => 'number',
                    'min'           => 0,
                    'wrapper'       => array( 'width' => '34' ),
                ),
                array(
                    'key'           => 'field_property_location_text',
                    'label'         => __( 'Location (display text)', 'estatein' ),
                    'name'          => 'property_location_text',
                    'type'          => 'text',
                    'instructions'  => __( 'e.g. "Malibu, California"', 'estatein' ),
                ),
                array(
                    'key'           => 'field_property_featured',
                    'label'         => __( 'Featured Property', 'estatein' ),
                    'name'          => 'property_featured',
                    'type'          => 'true_false',
                    'instructions'  => __( 'Show in the homepage Featured Properties section.', 'estatein' ),
                    'ui'            => 1,
                ),
                array(
                    'key'           => 'field_property_gallery',
                    'label'         => __( 'Photo Gallery', 'estatein' ),
                    'name'          => 'property_gallery',
                    'type'          => 'gallery',
                    'instructions'  => __( 'Used on the Property Details page.', 'estatein' ),
                    'return_format' => 'array',
                    'preview_size'  => 'medium',
                ),
                array(
                    'key'           => 'field_property_features',
                    'label'         => __( 'Key Features & Amenities', 'estatein' ),
                    'name'          => 'property_features',
                    'type'          => 'repeater',
                    'instructions'  => __( 'One bullet per row. Shown on Property Details page.', 'estatein' ),
                    'button_label'  => __( 'Add Feature', 'estatein' ),
                    'sub_fields'    => array(
                        array(
                            'key'   => 'field_property_feature_text',
                            'label' => __( 'Feature', 'estatein' ),
                            'name'  => 'feature',
                            'type'  => 'text',
                        ),
                    ),
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param'    => 'post_type',
                        'operator' => '==',
                        'value'    => 'property',
                    ),
                ),
            ),
            'menu_order'      => 0,
            'position'        => 'normal',
            'style'           => 'default',
            'label_placement' => 'top',
        )
    );
}

/**
 * Testimonials field group.
 */
function estatein_register_testimonial_fields() {

    if ( ! function_exists( 'acf_add_local_field_group' ) ) {
        return;
    }

    acf_add_local_field_group(
        array(
            'key'      => 'group_testimonial_details',
            'title'    => __( 'Testimonial Details', 'estatein' ),
            'fields'   => array(
                array(
                    'key'      => 'field_testimonial_rating',
                    'label'    => __( 'Star Rating (1-5)', 'estatein' ),
                    'name'     => 'testimonial_rating',
                    'type'     => 'number',
                    'min'      => 1,
                    'max'      => 5,
                    'step'     => 1,
                    'default_value' => 5,
                    'required' => 1,
                ),
                array(
                    'key'      => 'field_testimonial_author_name',
                    'label'    => __( 'Author Name', 'estatein' ),
                    'name'     => 'testimonial_author_name',
                    'type'     => 'text',
                    'required' => 1,
                    'wrapper'  => array( 'width' => '50' ),
                ),
                array(
                    'key'      => 'field_testimonial_author_location',
                    'label'    => __( 'Author Location', 'estatein' ),
                    'name'     => 'testimonial_author_location',
                    'type'     => 'text',
                    'instructions' => __( 'e.g. "USA, California"', 'estatein' ),
                    'wrapper'  => array( 'width' => '50' ),
                ),
                array(
                    'key'           => 'field_testimonial_author_avatar',
                    'label'         => __( 'Author Avatar', 'estatein' ),
                    'name'          => 'testimonial_author_avatar',
                    'type'          => 'image',
                    'return_format' => 'array',
                    'preview_size'  => 'thumbnail',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param'    => 'post_type',
                        'operator' => '==',
                        'value'    => 'testimonial',
                    ),
                ),
            ),
        )
    );
}

/**
 * Client ACF fields — used on the About Us "Our Valued Clients" section.
 */
function estatein_register_client_fields() {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) {
        return;
    }

    acf_add_local_field_group(
        array(
            'key'    => 'group_client_details',
            'title'  => __( 'Client Details', 'estatein' ),
            'fields' => array(
                array(
                    'key'      => 'field_client_since_year',
                    'label'    => __( 'Since (year)', 'estatein' ),
                    'name'     => 'client_since_year',
                    'type'     => 'text',
                    'instructions' => __( 'e.g. "2019"', 'estatein' ),
                    'wrapper'  => array( 'width' => '33' ),
                ),
                array(
                    'key'      => 'field_client_domain',
                    'label'    => __( 'Domain', 'estatein' ),
                    'name'     => 'client_domain',
                    'type'     => 'text',
                    'instructions' => __( 'e.g. "Commercial Real Estate"', 'estatein' ),
                    'wrapper'  => array( 'width' => '33' ),
                ),
                array(
                    'key'      => 'field_client_category',
                    'label'    => __( 'Category', 'estatein' ),
                    'name'     => 'client_category',
                    'type'     => 'text',
                    'instructions' => __( 'e.g. "Luxury Home Development"', 'estatein' ),
                    'wrapper'  => array( 'width' => '34' ),
                ),
                array(
                    'key'      => 'field_client_quote',
                    'label'    => __( 'What They Said', 'estatein' ),
                    'name'     => 'client_quote',
                    'type'     => 'textarea',
                    'rows'     => 3,
                ),
                array(
                    'key'      => 'field_client_website_url',
                    'label'    => __( 'Website URL', 'estatein' ),
                    'name'     => 'client_website_url',
                    'type'     => 'url',
                    'instructions' => __( 'Linked from the "Visit Website" button.', 'estatein' ),
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param'    => 'post_type',
                        'operator' => '==',
                        'value'    => 'client',
                    ),
                ),
            ),
        )
    );
}

/**
 * Hook on acf/init so fields register at the right time.
 */
function estatein_register_acf_field_groups() {
    estatein_register_property_fields();
    estatein_register_testimonial_fields();
    estatein_register_client_fields();
}
add_action( 'acf/init', 'estatein_register_acf_field_groups' );
