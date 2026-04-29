<?php
/**
 * Services page template (slug: services).
 *
 * @package Estatein
 */

get_header();

$service_groups = array(
    array(
        'eyebrow' => __( 'Unlock Property Value', 'estatein' ),
        'desc'    => __( 'Selling your property should be a rewarding experience, and at Estatein, we make sure it is. Our Property Selling Service is designed to maximize the value of your property, ensuring you get the best deal possible. Explore the categories below to see how we can help you at every step of your selling journey.', 'estatein' ),
        'cards'   => array(
            array( 'icon' => 'sparkles', 'title' => __( 'Valuation Mastery', 'estatein' ),     'desc' => __( 'Discover the true worth of your property with our expert valuation services.', 'estatein' ) ),
            array( 'icon' => 'star',     'title' => __( 'Strategic Marketing', 'estatein' ),    'desc' => __( 'Selling a property requires more than just a listing; it demands a strategic marketing approach.', 'estatein' ) ),
            array( 'icon' => 'check',    'title' => __( 'Negotiation Wizardry', 'estatein' ),   'desc' => __( 'Negotiating the best deal is an art, and our negotiation experts are masters of it.', 'estatein' ) ),
            array( 'icon' => 'home',     'title' => __( 'Closing Success', 'estatein' ),        'desc' => __( 'A successful sale is not complete until the closing. We guide you through the intricate closing process.', 'estatein' ) ),
        ),
        'cta_title' => __( 'Unlock the Value of Your Property Today', 'estatein' ),
        'cta_desc'  => __( 'Ready to unlock the true value of your property? Explore our Property Selling Service categories and let us help you achieve the best deal possible for your valuable asset.', 'estatein' ),
    ),
    array(
        'eyebrow' => __( 'Effortless Property Management', 'estatein' ),
        'desc'    => __( "Owning a property should be a pleasure, not a hassle. Estatein's Property Management Service takes the stress out of property ownership, offering comprehensive solutions tailored to your needs. Explore the categories below to see how we can make property management effortless for you.", 'estatein' ),
        'cards'   => array(
            array( 'icon' => 'home',     'title' => __( 'Tenant Harmony', 'estatein' ),         'desc' => __( 'Our Tenant Management services ensure that your tenants have a smooth and reducing vacancies.', 'estatein' ) ),
            array( 'icon' => 'sparkles', 'title' => __( 'Maintenance Ease', 'estatein' ),       'desc' => __( 'Say goodbye to property maintenance headaches. We handle all aspects of property upkeep.', 'estatein' ) ),
            array( 'icon' => 'star',     'title' => __( 'Financial Peace of Mind', 'estatein' ),'desc' => __( 'Managing property finances can be complex. Our financial experts take care of rent collection.', 'estatein' ) ),
            array( 'icon' => 'sun',      'title' => __( 'Legal Guardian', 'estatein' ),         'desc' => __( 'Stay compliant with property laws and regulations effortlessly.', 'estatein' ) ),
        ),
        'cta_title' => __( 'Experience Effortless Property Management', 'estatein' ),
        'cta_desc'  => __( 'Ready to experience hassle-free property management? Explore our Property Management Service categories and let us handle the complexities while you enjoy the benefits of property ownership.', 'estatein' ),
    ),
    array(
        'eyebrow' => __( 'Smart Investments, Informed Decisions', 'estatein' ),
        'desc'    => __( "Building a real estate portfolio requires a strategic approach. Estatein's Investment Advisory Service empowers you to make smart investments and informed decisions.", 'estatein' ),
        'cards'   => array(
            array( 'icon' => 'sparkles', 'title' => __( 'Market Insight', 'estatein' ),          'desc' => __( 'Stay ahead of market trends with our expert Market Analysis. We provide in-depth insights into real estate market conditions.', 'estatein' ) ),
            array( 'icon' => 'star',     'title' => __( 'ROI Assessment', 'estatein' ),          'desc' => __( 'Make investment decisions with confidence. Our ROI Assessment services evaluate the potential returns on your investments.', 'estatein' ) ),
            array( 'icon' => 'check',    'title' => __( 'Customized Strategies', 'estatein' ),   'desc' => __( 'Every investor is unique, and so are their goals. We develop Customized Investment Strategies tailored to your specific needs.', 'estatein' ) ),
            array( 'icon' => 'sun',      'title' => __( 'Diversification Mastery', 'estatein' ), 'desc' => __( 'Diversify your real estate portfolio effectively. Our experts guide you in spreading your investments across various property types and locations.', 'estatein' ) ),
        ),
        'cta_title' => __( 'Unlock Your Investment Potential', 'estatein' ),
        'cta_desc'  => __( 'Explore our Property Management Service categories and let us handle the complexities while you enjoy the benefits of property ownership.', 'estatein' ),
    ),
);
?>

<?php /* Page hero */ ?>
<section class="page-hero">
    <div class="container">
        <span class="dots-deco" aria-hidden="true"><span></span><span></span><span></span></span>
        <h1><?php esc_html_e( 'Elevate Your Real Estate Experience', 'estatein' ); ?></h1>
        <p><?php esc_html_e( 'Welcome to Estatein, where your real estate aspirations meet expert guidance. Explore our comprehensive range of services, each designed to cater to your unique needs and dreams.', 'estatein' ); ?></p>
    </div>
</section>

<?php /* Quick category cards (same as home features) */ ?>
<?php get_template_part( 'template-parts/sections/features' ); ?>

<?php /* Service groups */ ?>
<?php foreach ( $service_groups as $group ) : ?>
    <section class="section service-group">
        <div class="container">
            <div class="service-group-head">
                <span class="dots-deco" aria-hidden="true"><span></span><span></span><span></span></span>
                <h2><?php echo esc_html( $group['eyebrow'] ); ?></h2>
                <p><?php echo esc_html( $group['desc'] ); ?></p>
            </div>

            <div class="service-cards-grid">
                <?php foreach ( array_slice( $group['cards'], 0, 3 ) as $card ) : ?>
                    <div class="service-card">
                        <span class="icon-wrap" aria-hidden="true"><?php estatein_the_icon( $card['icon'], 18 ); ?></span>
                        <h3><?php echo esc_html( $card['title'] ); ?></h3>
                        <p><?php echo esc_html( $card['desc'] ); ?></p>
                    </div>
                <?php endforeach; ?>
            </div>

            <?php if ( count( $group['cards'] ) > 3 ) : ?>
                <div class="service-bottom-grid">
                    <div class="service-card">
                        <span class="icon-wrap" aria-hidden="true"><?php estatein_the_icon( $group['cards'][3]['icon'], 18 ); ?></span>
                        <h3><?php echo esc_html( $group['cards'][3]['title'] ); ?></h3>
                        <p><?php echo esc_html( $group['cards'][3]['desc'] ); ?></p>
                    </div>
                    <div class="service-cta-card">
                        <h3><?php echo esc_html( $group['cta_title'] ); ?></h3>
                        <p><?php echo esc_html( $group['cta_desc'] ); ?></p>
                        <a class="btn btn-secondary" href="#"><?php esc_html_e( 'Learn More', 'estatein' ); ?></a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
<?php endforeach; ?>

<?php get_template_part( 'template-parts/sections/cta-band' ); ?>

<?php get_footer();
