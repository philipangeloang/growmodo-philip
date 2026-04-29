<?php
/**
 * Estatein theme functions and definitions.
 *
 * @package Estatein
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'ESTATEIN_VERSION', '1.0.0' );
define( 'ESTATEIN_DIR', get_template_directory() );
define( 'ESTATEIN_URI', get_template_directory_uri() );

/**
 * Theme setup.
 */
function estatein_setup() {

    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'editor-styles' );
    add_theme_support( 'wp-block-styles' );
    add_theme_support( 'align-wide' );

    add_theme_support(
        'custom-logo',
        array(
            'height'      => 60,
            'width'       => 200,
            'flex-height' => true,
            'flex-width'  => true,
        )
    );

    add_theme_support(
        'html5',
        array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' )
    );

    register_nav_menus(
        array(
            'primary'    => __( 'Primary Menu', 'estatein' ),
            'footer-1'   => __( 'Footer Column 1 (Home)', 'estatein' ),
            'footer-2'   => __( 'Footer Column 2 (About Us)', 'estatein' ),
            'footer-3'   => __( 'Footer Column 3 (Properties)', 'estatein' ),
            'footer-4'   => __( 'Footer Column 4 (Services)', 'estatein' ),
            'footer-5'   => __( 'Footer Column 5 (Contact Us)', 'estatein' ),
        )
    );

    load_theme_textdomain( 'estatein', ESTATEIN_DIR . '/languages' );
}
add_action( 'after_setup_theme', 'estatein_setup' );

/**
 * Enqueue stylesheets and scripts.
 */
function estatein_assets() {

    // Urbanist from Google Fonts (preconnect + display=swap for performance).
    wp_enqueue_style(
        'estatein-google-fonts',
        'https://fonts.googleapis.com/css2?family=Urbanist:wght@400;500;600;700&display=swap',
        array(),
        null
    );

    // Theme stylesheet.
    wp_enqueue_style(
        'estatein-style',
        get_stylesheet_uri(),
        array( 'estatein-google-fonts' ),
        ESTATEIN_VERSION
    );

    // Theme JS.
    wp_enqueue_script(
        'estatein-main',
        ESTATEIN_URI . '/assets/js/main.js',
        array(),
        ESTATEIN_VERSION,
        true
    );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'estatein_assets' );

/**
 * Add preconnect hints for Google Fonts.
 */
function estatein_resource_hints( $urls, $relation_type ) {
    if ( 'preconnect' === $relation_type ) {
        $urls[] = array( 'href' => 'https://fonts.googleapis.com' );
        $urls[] = array(
            'href'        => 'https://fonts.gstatic.com',
            'crossorigin' => 'anonymous',
        );
    }
    return $urls;
}
add_filter( 'wp_resource_hints', 'estatein_resource_hints', 10, 2 );

/**
 * Lightweight head cleanup.
 */
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'rsd_link' );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );

/**
 * Custom excerpt length for property/post cards.
 */
function estatein_excerpt_length( $length ) {
    return 22;
}
add_filter( 'excerpt_length', 'estatein_excerpt_length' );

/**
 * Custom excerpt "more" string.
 */
function estatein_excerpt_more( $more ) {
    return '&hellip; <a href="' . esc_url( get_permalink() ) . '" class="read-more">' . esc_html__( 'Read More', 'estatein' ) . '</a>';
}
add_filter( 'excerpt_more', 'estatein_excerpt_more' );

/**
 * Modular includes.
 */
require_once ESTATEIN_DIR . '/inc/icons.php';
require_once ESTATEIN_DIR . '/inc/custom-post-types.php';
require_once ESTATEIN_DIR . '/inc/acf-fields.php';
require_once ESTATEIN_DIR . '/inc/property-helpers.php';
require_once ESTATEIN_DIR . '/inc/cf7-settings.php';
require_once ESTATEIN_DIR . '/inc/admin-notices.php';
