<?php
/**
 * Section: CTA Band ("Start Your Real Estate Journey Today")
 *
 * @package Estatein
 */
?>
<section class="cta-section section">
    <div class="container">
        <div class="cta-band">
            <div class="copy">
                <h2><?php esc_html_e( 'Start Your Real Estate Journey Today', 'estatein' ); ?></h2>
                <p><?php esc_html_e( "Your dream property is just a click away. Whether you're looking for a new home, a strategic investment, or expert real estate advice, Estatein is here to assist you every step of the way. Take the first step towards your real estate goals and explore our available properties or get in touch with our team for personalized assistance.", 'estatein' ); ?></p>
            </div>
            <div class="cta-action">
                <a href="<?php echo esc_url( home_url( '/properties/' ) ); ?>" class="btn">
                    <?php esc_html_e( 'Explore Properties', 'estatein' ); ?>
                </a>
            </div>
        </div>
    </div>
</section>
