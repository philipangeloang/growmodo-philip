<?php
/**
 * Card: FAQ
 *
 * @package Estatein
 */

$post_id = isset( $args['post_id'] ) ? $args['post_id'] : get_the_ID();
?>
<article id="faq-<?php echo esc_attr( $post_id ); ?>" class="faq-card">
    <h3><?php echo esc_html( get_the_title( $post_id ) ); ?></h3>
    <p class="answer"><?php echo esc_html( wp_strip_all_tags( get_the_content( null, false, $post_id ) ) ); ?></p>
    <a href="#" class="read-more"><?php esc_html_e( 'Read More', 'estatein' ); ?></a>
</article>
