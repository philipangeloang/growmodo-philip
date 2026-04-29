<?php
/**
 * Contact page template (slug: contact).
 *
 * @package Estatein
 */

get_header();

$contact_methods = array(
    array( 'icon' => 'envelope', 'label' => 'info@estatein.com' ),
    array( 'icon' => 'phone',    'label' => '+1 (123) 456-7890' ),
    array( 'icon' => 'map-pin',  'label' => __( 'Main Headquarters', 'estatein' ) ),
    array( 'icon' => 'sparkles', 'label' => __( 'Instagram · LinkedIn · Facebook', 'estatein' ) ),
);

$offices = array(
    array(
        'tag'   => __( 'Main Headquarters', 'estatein' ),
        'addr'  => __( '123 Estatein Plaza, City Center, Metropolis', 'estatein' ),
        'desc'  => __( 'Our main headquarters serve as the heart of Estatein. Located in the bustling city center, this is where our core team of experts operates, driving the excellence and innovation that define us.', 'estatein' ),
        'email' => 'info@estatein.com',
        'phone' => '+1 (123) 456-7890',
        'city'  => __( 'Metropolis', 'estatein' ),
    ),
    array(
        'tag'   => __( 'Regional Offices', 'estatein' ),
        'addr'  => __( '456 Urban Avenue, Downtown District, Metropolis', 'estatein' ),
        'desc'  => __( "Estatein's presence extends to multiple regions, each with its own dynamic real estate landscape. Discover our regional offices, staffed by local experts who understand the nuances of their respective markets.", 'estatein' ),
        'email' => 'info@restatein.com',
        'phone' => '+1 (123) 628-7890',
        'city'  => __( 'Metropolis', 'estatein' ),
    ),
);
?>

<?php /* Page hero */ ?>
<section class="page-hero">
    <div class="container">
        <h1><?php esc_html_e( 'Get in Touch with Estatein', 'estatein' ); ?></h1>
        <p><?php esc_html_e( "Welcome to Estatein's Contact Us page. We're here to assist you with any inquiries, requests, or feedback you may have. Whether you're looking to buy or sell a property, explore investment opportunities, or simply want to connect, we're just a message away. Reach out to us, and let's start a conversation.", 'estatein' ); ?></p>
    </div>
</section>

<?php /* Contact info cards */ ?>
<section class="section contact-methods-section">
    <div class="container">
        <div class="contact-methods-grid">
            <?php foreach ( $contact_methods as $cm ) : ?>
                <a href="#" class="contact-method-card">
                    <span class="icon-wrap" aria-hidden="true"><?php estatein_the_icon( $cm['icon'], 18 ); ?></span>
                    <span class="label"><?php echo esc_html( $cm['label'] ); ?></span>
                    <span class="arrow" aria-hidden="true"><?php estatein_the_icon( 'arrow-up-right', 14 ); ?></span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php /* Let's Connect form */ ?>
<section class="section lets-connect-section">
    <div class="container">
        <div class="section-head">
            <div class="section-head-text">
                <span class="dots-deco" aria-hidden="true"><span></span><span></span><span></span></span>
                <h2><?php esc_html_e( "Let's Connect", 'estatein' ); ?></h2>
                <p><?php esc_html_e( "We're excited to connect with you and learn more about your real estate goals. Use the form below to get in touch with Estatein. Whether you're a prospective client, partner, or simply curious about our services, we're here to answer your questions and provide the assistance you need.", 'estatein' ); ?></p>
            </div>
        </div>

        <div class="form-card form-card-large">
            <?php
            $cf7_id = get_option( 'estatein_cf7_contact_id' );
            if ( $cf7_id && shortcode_exists( 'contact-form-7' ) ) {
                echo do_shortcode( '[contact-form-7 id="' . esc_attr( $cf7_id ) . '"]' );
            } else {
                get_template_part( 'template-parts/forms/contact-static' );
            }
            ?>
        </div>
    </div>
</section>

<?php /* Office locations */ ?>
<section class="section offices-section">
    <div class="container">
        <div class="section-head">
            <div class="section-head-text">
                <span class="dots-deco" aria-hidden="true"><span></span><span></span><span></span></span>
                <h2><?php esc_html_e( 'Discover Our Office Locations', 'estatein' ); ?></h2>
                <p><?php esc_html_e( "Estatein is here to serve you across multiple locations. Whether you're looking to meet our team, discuss real estate opportunities, or simply drop by for a chat, we have offices conveniently located to serve your needs. Explore the categories below to find the Estatein office nearest to you.", 'estatein' ); ?></p>
            </div>
        </div>

        <div class="office-tabs" role="tablist" aria-label="<?php esc_attr_e( 'Office filter', 'estatein' ); ?>">
            <button class="tab-btn is-active" role="tab"><?php esc_html_e( 'All', 'estatein' ); ?></button>
            <button class="tab-btn" role="tab"><?php esc_html_e( 'Regional', 'estatein' ); ?></button>
            <button class="tab-btn" role="tab"><?php esc_html_e( 'International', 'estatein' ); ?></button>
        </div>

        <div class="offices-grid">
            <?php foreach ( $offices as $office ) : ?>
                <article class="office-card">
                    <span class="office-tag"><?php echo esc_html( $office['tag'] ); ?></span>
                    <h3><?php echo esc_html( $office['addr'] ); ?></h3>
                    <p><?php echo esc_html( $office['desc'] ); ?></p>

                    <div class="office-meta">
                        <span><?php estatein_the_icon( 'envelope', 14 ); ?> <?php echo esc_html( $office['email'] ); ?></span>
                        <span><?php estatein_the_icon( 'phone', 14 ); ?> <?php echo esc_html( $office['phone'] ); ?></span>
                        <span><?php estatein_the_icon( 'map-pin', 14 ); ?> <?php echo esc_html( $office['city'] ); ?></span>
                    </div>

                    <a href="#" class="btn"><?php esc_html_e( 'Get Direction', 'estatein' ); ?></a>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php get_template_part( 'template-parts/sections/cta-band' ); ?>

<?php get_footer();
