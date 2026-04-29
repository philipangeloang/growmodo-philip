<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package CustomTheme
 */

get_header();
?>

<div class="container" style="text-align:center; padding-block: var(--space-8);">

    <h1><?php esc_html_e( 'Page not found', 'customtheme' ); ?></h1>
    <p><?php esc_html_e( "Sorry, we couldn't find the page you were looking for.", 'customtheme' ); ?></p>
    <p>
        <a class="btn" href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <?php esc_html_e( 'Back to homepage', 'customtheme' ); ?>
        </a>
    </p>

</div>

<?php
get_footer();
