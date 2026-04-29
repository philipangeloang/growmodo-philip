<?php
/**
 * Admin notices for the Estatein theme.
 *
 * @package Estatein
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Show a warning if ACF Free is not active. The theme works without it,
 * but property/testimonial detail fields won't render.
 */
function estatein_acf_dependency_notice() {

    if ( function_exists( 'acf_add_local_field_group' ) ) {
        return;
    }

    if ( ! current_user_can( 'activate_plugins' ) ) {
        return;
    }
    ?>
    <div class="notice notice-warning">
        <p>
            <strong><?php esc_html_e( 'Estatein theme:', 'estatein' ); ?></strong>
            <?php
            printf(
                /* translators: %s: ACF plugin link */
                esc_html__( 'Install and activate %s (free) to enable property and testimonial detail fields.', 'estatein' ),
                '<a href="' . esc_url( admin_url( 'plugin-install.php?s=advanced+custom+fields&tab=search&type=term' ) ) . '">Advanced Custom Fields</a>'
            );
            ?>
        </p>
    </div>
    <?php
}
add_action( 'admin_notices', 'estatein_acf_dependency_notice' );
