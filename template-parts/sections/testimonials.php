<?php
/**
 * Section: Testimonials
 *
 * @package Estatein
 */

$testimonials_query = new WP_Query(
    array(
        'post_type'      => 'testimonial',
        'posts_per_page' => 3,
    )
);

if ( ! $testimonials_query->have_posts() ) {
    return;
}
?>
<section class="testimonials-section section">
    <div class="container">

        <div class="section-head">
            <div class="section-head-text">
                <span class="dots-deco" aria-hidden="true"><span></span><span></span><span></span></span>
                <h2><?php esc_html_e( 'What Our Clients Say', 'estatein' ); ?></h2>
                <p><?php esc_html_e( 'Read the success stories and heartfelt testimonials from our valued clients. Discover why they chose Estatein for their real estate needs.', 'estatein' ); ?></p>
            </div>
            <a href="#" class="btn btn-secondary view-all-link view-all-desktop">
                <?php esc_html_e( 'View All Testimonials', 'estatein' ); ?>
            </a>
        </div>

        <div class="testimonials-grid">
            <?php
            while ( $testimonials_query->have_posts() ) :
                $testimonials_query->the_post();
                get_template_part( 'template-parts/cards/testimonial' );
            endwhile;
            wp_reset_postdata();
            ?>
        </div>

        <div class="carousel-pager">
            <a href="#" class="btn btn-secondary view-all-link view-all-mobile">
                <?php esc_html_e( 'View All Testimonials', 'estatein' ); ?>
            </a>
            <span class="page-indicator">01 <span class="of">of</span> <?php echo esc_html( $testimonials_query->found_posts ); ?></span>
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
