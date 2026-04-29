<?php
/**
 * Section: FAQs
 *
 * @package Estatein
 */

$faqs_query = new WP_Query(
    array(
        'post_type'      => 'faq',
        'posts_per_page' => 3,
    )
);

if ( ! $faqs_query->have_posts() ) {
    return;
}
?>
<section class="faqs-section section">
    <div class="container">

        <div class="section-head">
            <div class="section-head-text">
                <span class="dots-deco" aria-hidden="true"><span></span><span></span><span></span></span>
                <h2><?php esc_html_e( 'Frequently Asked Questions', 'estatein' ); ?></h2>
                <p><?php esc_html_e( "Find answers to common questions about Estatein's services, property listings, and the real estate process. We're here to provide clarity and assist you every step of the way.", 'estatein' ); ?></p>
            </div>
            <a href="#" class="btn btn-secondary view-all-link view-all-desktop">
                <?php esc_html_e( "View All FAQ's", 'estatein' ); ?>
            </a>
        </div>

        <div class="faqs-grid">
            <?php
            while ( $faqs_query->have_posts() ) :
                $faqs_query->the_post();
                get_template_part( 'template-parts/cards/faq' );
            endwhile;
            wp_reset_postdata();
            ?>
        </div>

        <div class="carousel-pager">
            <a href="#" class="btn btn-secondary view-all-link view-all-mobile">
                <?php esc_html_e( "View All FAQ's", 'estatein' ); ?>
            </a>
            <span class="page-indicator">01 <span class="of">of</span> <?php echo esc_html( $faqs_query->found_posts ); ?></span>
            <div class="pager-buttons">
                <button class="pager-btn" aria-label="<?php esc_attr_e( 'Previous', 'estatein' ); ?>">
                    <?php estatein_the_icon( 'arrow-left', 18 ); ?>
                </button>
                <button class="pager-btn" aria-label="<?php esc_attr_e( 'Next', 'estatein' ); ?>">
                    <?php estatein_the_icon( 'arrow-right', 18 ); ?>
                </button>
            </div>
        </div>

    </div>
</section>
