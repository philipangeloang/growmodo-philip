<?php
/**
 * Card: Property
 *
 * Expects to run inside the loop or with $args[ 'post_id' ] set.
 *
 * @package Estatein
 */

$post_id = isset( $args['post_id'] ) ? $args['post_id'] : get_the_ID();
$price   = estatein_field( 'property_price', $post_id );
?>
<article id="property-<?php echo esc_attr( $post_id ); ?>" <?php post_class( 'property-card' ); ?>>

    <a href="<?php echo esc_url( get_permalink( $post_id ) ); ?>" class="thumb">
        <?php
        if ( has_post_thumbnail( $post_id ) ) {
            echo get_the_post_thumbnail( $post_id, 'large', array( 'loading' => 'lazy' ) );
        } else {
            echo '<div style="width:100%;height:100%;background:linear-gradient(135deg,#262626,#1A1A1A);"></div>';
        }
        ?>
    </a>

    <div class="property-body">
        <h3>
            <a href="<?php echo esc_url( get_permalink( $post_id ) ); ?>">
                <?php echo esc_html( get_the_title( $post_id ) ); ?>
            </a>
        </h3>
        <p class="desc"><?php echo esc_html( wp_trim_words( get_the_excerpt( $post_id ), 18 ) ); ?></p>
    </div>

    <?php estatein_property_tags( $post_id ); ?>

    <div class="meta-row">
        <div>
            <span class="price-label"><?php esc_html_e( 'Price', 'estatein' ); ?></span><br>
            <span class="price"><?php echo esc_html( estatein_format_price( $price ) ); ?></span>
        </div>
        <a href="<?php echo esc_url( get_permalink( $post_id ) ); ?>" class="btn">
            <?php esc_html_e( 'View Property Details', 'estatein' ); ?>
        </a>
    </div>

</article>
