<?php
/**
 * Static fallback contact form (used when Contact Form 7 isn't configured yet).
 *
 * @package Estatein
 */
?>
<form class="estate-form" onsubmit="return false;">
    <div class="form-row form-row-3">
        <div class="form-field">
            <label><?php esc_html_e( 'First Name', 'estatein' ); ?></label>
            <input type="text" placeholder="<?php esc_attr_e( 'Enter First Name', 'estatein' ); ?>">
        </div>
        <div class="form-field">
            <label><?php esc_html_e( 'Last Name', 'estatein' ); ?></label>
            <input type="text" placeholder="<?php esc_attr_e( 'Enter Last Name', 'estatein' ); ?>">
        </div>
        <div class="form-field">
            <label><?php esc_html_e( 'Email', 'estatein' ); ?></label>
            <input type="email" placeholder="<?php esc_attr_e( 'Enter your Email', 'estatein' ); ?>">
        </div>
    </div>

    <div class="form-row form-row-3">
        <div class="form-field">
            <label><?php esc_html_e( 'Phone', 'estatein' ); ?></label>
            <input type="tel" placeholder="<?php esc_attr_e( 'Enter Phone Number', 'estatein' ); ?>">
        </div>
        <div class="form-field">
            <label><?php esc_html_e( 'Inquiry Type', 'estatein' ); ?></label>
            <select>
                <option><?php esc_html_e( 'Select Inquiry Type', 'estatein' ); ?></option>
                <option><?php esc_html_e( 'Buying a property', 'estatein' ); ?></option>
                <option><?php esc_html_e( 'Selling a property', 'estatein' ); ?></option>
                <option><?php esc_html_e( 'General question', 'estatein' ); ?></option>
            </select>
        </div>
        <div class="form-field">
            <label><?php esc_html_e( 'How Did You Hear About Us?', 'estatein' ); ?></label>
            <select>
                <option><?php esc_html_e( 'Select', 'estatein' ); ?></option>
                <option><?php esc_html_e( 'Google search', 'estatein' ); ?></option>
                <option><?php esc_html_e( 'Social media', 'estatein' ); ?></option>
                <option><?php esc_html_e( 'Referral', 'estatein' ); ?></option>
            </select>
        </div>
    </div>

    <div class="form-field">
        <label><?php esc_html_e( 'Message', 'estatein' ); ?></label>
        <textarea rows="4" placeholder="<?php esc_attr_e( 'Enter your Message here..', 'estatein' ); ?>"></textarea>
    </div>

    <div class="form-footer">
        <label class="check-row">
            <input type="checkbox">
            <span class="check-text"><?php
            printf(
                /* translators: 1: Terms URL, 2: Privacy URL */
                esc_html__( 'I agree with %1$s and %2$s', 'estatein' ),
                '<a href="#"><u>' . esc_html__( 'Terms of Use', 'estatein' ) . '</u></a>',
                '<a href="#"><u>' . esc_html__( 'Privacy Policy', 'estatein' ) . '</u></a>'
            );
            ?></span>
        </label>
        <button type="submit" class="btn"><?php esc_html_e( 'Send Your Message', 'estatein' ); ?></button>
    </div>
</form>
