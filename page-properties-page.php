<?php
/**
 * Page template for the "Properties Page" placeholder.
 *
 * Reuses the property archive markup so the menu link "Properties" → /properties-page/
 * still shows the full property listing.
 *
 * @package Estatein
 */

// Mimic the archive query.
$property_query = new WP_Query(
    array(
        'post_type'      => 'property',
        'posts_per_page' => 9,
    )
);

// Replace the global $wp_query so archive-property.php's loop works as expected.
global $wp_query;
$wp_query = $property_query; // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited

// Render the archive template inline.
require get_template_directory() . '/archive-property.php';

wp_reset_query();
