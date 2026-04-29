</main><!-- #main -->

<footer class="site-footer" role="contentinfo">
    <div class="container">
        <div class="footer-content">

            <p class="copyright">
                &copy; <?php echo esc_html( date( 'Y' ) ); ?>
                <?php bloginfo( 'name' ); ?>.
                <?php esc_html_e( 'All rights reserved.', 'customtheme' ); ?>
            </p>

            <?php
            if ( has_nav_menu( 'footer' ) ) {
                wp_nav_menu(
                    array(
                        'theme_location' => 'footer',
                        'menu_id'        => 'footer-menu',
                        'container'      => false,
                        'fallback_cb'    => false,
                        'depth'          => 1,
                    )
                );
            }
            ?>

        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
