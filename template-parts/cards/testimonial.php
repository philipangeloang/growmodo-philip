<?php
/**
 * Card: Testimonial
 *
 * @package Estatein
 */

$post_id  = isset( $args['post_id'] ) ? $args['post_id'] : get_the_ID();
$rating   = (int) estatein_field( 'testimonial_rating', $post_id );
$rating   = $rating > 0 ? $rating : 5;
$name     = estatein_field( 'testimonial_author_name', $post_id );
$location = estatein_field( 'testimonial_author_location', $post_id );
$avatar   = estatein_field( 'testimonial_author_avatar', $post_id );
?>
<article id="testimonial-<?php echo esc_attr( $post_id ); ?>" class="testimonial">

    <div class="stars" aria-label="<?php echo esc_attr( sprintf( /* translators: %d: rating */ __( '%d out of 5 stars', 'estatein' ), $rating ) ); ?>">
        <?php for ( $i = 0; $i < $rating; $i++ ) : ?>
            <span aria-hidden="true">★</span>
        <?php endfor; ?>
    </div>

    <h3><?php echo esc_html( get_the_title( $post_id ) ); ?></h3>

    <p class="quote"><?php echo esc_html( wp_strip_all_tags( get_the_content( null, false, $post_id ) ) ); ?></p>

    <div class="author">
        <div class="avatar">
            <?php if ( ! empty( $avatar ) && is_array( $avatar ) ) : ?>
                <img src="<?php echo esc_url( $avatar['sizes']['thumbnail'] ?? $avatar['url'] ); ?>"
                     alt="<?php echo esc_attr( $name ); ?>" loading="lazy" width="40" height="40">
            <?php else : ?>
                <div style="width:100%;height:100%;background:linear-gradient(135deg,#703BF7,#262626);display:grid;place-items:center;color:#fff;font-weight:600;font-size:14px;">
                    <?php echo esc_html( strtoupper( substr( $name ?: '?', 0, 1 ) ) ); ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="who">
            <?php if ( $name ) : ?>
                <span class="name"><?php echo esc_html( $name ); ?></span>
            <?php endif; ?>
            <?php if ( $location ) : ?>
                <span class="place"><?php echo esc_html( $location ); ?></span>
            <?php endif; ?>
        </div>
    </div>

</article>
