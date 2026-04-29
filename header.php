<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#main">
    <?php esc_html_e( 'Skip to content', 'estatein' ); ?>
</a>

<?php /* Announcement bar */ ?>
<div class="announce-bar" id="announceBar">
    <span>✨ <?php esc_html_e( 'Discover Your Dream Property with Estatein', 'estatein' ); ?></span>
    <a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'Learn More', 'estatein' ); ?></a>
    <button class="announce-close" aria-label="<?php esc_attr_e( 'Dismiss announcement', 'estatein' ); ?>">
        <?php estatein_the_icon( 'x-mark', 16 ); ?>
    </button>
</div>

<header class="site-header" role="banner">
    <div class="container header-inner">

        <div class="site-branding">
            <a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <span class="logo-mark" aria-hidden="true">
                    <svg width="28" height="28" viewBox="0 0 28 28" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14 0C6.268 0 0 6.268 0 14c0 7.732 6.268 14 14 14V0Z" fill="#703BF7"/>
                        <path d="M14 0c7.732 0 14 6.268 14 14h-7c0-3.866-3.134-7-7-7V0Z" fill="#A883FF"/>
                    </svg>
                </span>
                <?php bloginfo( 'name' ); ?>
            </a>
        </div>

        <nav class="primary-nav" aria-label="<?php esc_attr_e( 'Primary', 'estatein' ); ?>">
            <button class="nav-toggle" aria-controls="primary-menu" aria-expanded="false">
                <span class="screen-reader-text"><?php esc_html_e( 'Toggle menu', 'estatein' ); ?></span>
                <span class="hamburger" aria-hidden="true"></span>
            </button>

            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'container'      => false,
                    'fallback_cb'    => 'estatein_default_menu',
                    'depth'          => 2,
                )
            );
            ?>
        </nav>

        <div class="header-cta">
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-secondary">
                <?php esc_html_e( 'Contact Us', 'estatein' ); ?>
            </a>
        </div>

    </div>
</header>

<?php
/**
 * Fallback menu when no Primary menu has been assigned yet.
 */
function estatein_default_menu() {
    ?>
    <ul id="primary-menu">
        <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Home', 'estatein' ); ?></a></li>
        <li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>"><?php esc_html_e( 'About Us', 'estatein' ); ?></a></li>
        <li><a href="<?php echo esc_url( home_url( '/properties/' ) ); ?>"><?php esc_html_e( 'Properties', 'estatein' ); ?></a></li>
        <li><a href="<?php echo esc_url( home_url( '/services/' ) ); ?>"><?php esc_html_e( 'Services', 'estatein' ); ?></a></li>
    </ul>
    <?php
}
?>

<main id="main" class="site-main">
