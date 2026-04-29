<?php
/**
 * Contact Form 7 integration.
 *
 * Adds a small admin settings panel (Settings → Estatein) so the user can
 * paste in their CF7 form IDs without editing code.
 *
 * Activated only if Contact Form 7 is installed.
 *
 * @package Estatein
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register settings + admin page.
 */
function estatein_cf7_register_settings() {
    // Allow either numeric ID or CF7 hash ID — both are valid in shortcode.
    register_setting( 'estatein_settings', 'estatein_cf7_inquiry_id', array( 'sanitize_callback' => 'sanitize_text_field' ) );
    register_setting( 'estatein_settings', 'estatein_cf7_contact_id', array( 'sanitize_callback' => 'sanitize_text_field' ) );
}
add_action( 'admin_init', 'estatein_cf7_register_settings' );

/**
 * Add submenu page under Settings.
 */
function estatein_settings_page() {
    add_options_page(
        __( 'Estatein Theme Settings', 'estatein' ),
        __( 'Estatein', 'estatein' ),
        'manage_options',
        'estatein-settings',
        'estatein_settings_page_render'
    );
}
add_action( 'admin_menu', 'estatein_settings_page' );

/**
 * Render the settings page.
 */
function estatein_settings_page_render() {
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }

    $cf7_active = shortcode_exists( 'contact-form-7' );
    ?>
    <div class="wrap">
        <h1><?php esc_html_e( 'Estatein Theme Settings', 'estatein' ); ?></h1>

        <?php if ( ! $cf7_active ) : ?>
            <div class="notice notice-warning">
                <p>
                    <strong><?php esc_html_e( 'Contact Form 7 is not active.', 'estatein' ); ?></strong>
                    <?php esc_html_e( 'Install and activate Contact Form 7 to enable working forms on the site. Until then, static placeholder forms will be shown.', 'estatein' ); ?>
                </p>
            </div>
        <?php endif; ?>

        <form action="options.php" method="post">
            <?php settings_fields( 'estatein_settings' ); ?>

            <h2><?php esc_html_e( 'Contact Form 7 Form IDs', 'estatein' ); ?></h2>
            <p>
                <?php esc_html_e( 'Create your forms in Contact → Add New, then paste their numeric IDs below. Find the ID at the end of the form\'s "Edit" URL (e.g. post.php?post=123 → ID is 123).', 'estatein' ); ?>
            </p>

            <table class="form-table">
                <tr>
                    <th scope="row"><label for="inquiry_id"><?php esc_html_e( 'Property Inquiry Form ID', 'estatein' ); ?></label></th>
                    <td>
                        <input type="text" id="inquiry_id" name="estatein_cf7_inquiry_id"
                               value="<?php echo esc_attr( get_option( 'estatein_cf7_inquiry_id' ) ); ?>" class="regular-text">
                        <p class="description"><?php esc_html_e( 'Numeric post ID OR the hash ID from the shortcode. Used on Property Details and the Properties page.', 'estatein' ); ?></p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="contact_id"><?php esc_html_e( 'Contact Form ID', 'estatein' ); ?></label></th>
                    <td>
                        <input type="text" id="contact_id" name="estatein_cf7_contact_id"
                               value="<?php echo esc_attr( get_option( 'estatein_cf7_contact_id' ) ); ?>" class="regular-text">
                        <p class="description"><?php esc_html_e( 'Used on the Contact Us page.', 'estatein' ); ?></p>
                    </td>
                </tr>
            </table>

            <?php submit_button(); ?>
        </form>

        <h2><?php esc_html_e( 'Suggested Form Markup', 'estatein' ); ?></h2>
        <p><?php esc_html_e( 'When creating your CF7 forms, use this markup so the styling matches the theme:', 'estatein' ); ?></p>

        <h3><?php esc_html_e( 'Inquiry Form', 'estatein' ); ?></h3>
        <p class="description"><?php esc_html_e( 'Edit your "Property Inquiry" form and replace its content with this:', 'estatein' ); ?></p>
        <textarea readonly rows="10" style="width:100%; font-family:monospace; font-size: 12px;">
<label>First Name
[text* first-name placeholder "Enter First Name"]</label>

<label>Last Name
[text* last-name placeholder "Enter Last Name"]</label>

<label>Email
[email* your-email placeholder "Enter your Email"]</label>

<label>Phone
[tel your-phone placeholder "Enter Phone Number"]</label>

<label>Message
[textarea your-message x4 placeholder "Enter your Message here.."]</label>

[acceptance terms-acceptance] I agree with Terms of Use and Privacy Policy [/acceptance]

[submit class:btn "Send Your Message"]
        </textarea>

        <h3><?php esc_html_e( 'Contact Form (Let\'s Connect)', 'estatein' ); ?></h3>
        <p class="description"><?php esc_html_e( 'Edit your "Let\'s Connect" form and replace its content with this:', 'estatein' ); ?></p>
        <textarea readonly rows="14" style="width:100%; font-family:monospace; font-size: 12px;">
<label>First Name
[text* first-name placeholder "Enter First Name"]</label>

<label>Last Name
[text* last-name placeholder "Enter Last Name"]</label>

<label>Email
[email* your-email placeholder "Enter your Email"]</label>

<label>Phone
[tel your-phone placeholder "Enter Phone Number"]</label>

<label>Inquiry Type
[select inquiry-type "Select Inquiry Type" "Buying" "Selling" "General"]</label>

<label>How Did You Hear About Us?
[select hear-about-us "Select" "Google" "Social Media" "Referral"]</label>

<label>Message
[textarea your-message x4 placeholder "Enter your Message here.."]</label>

[acceptance terms-acceptance] I agree with Terms of Use and Privacy Policy [/acceptance]

[submit class:btn "Send Your Message"]
        </textarea>
    </div>
    <?php
}
