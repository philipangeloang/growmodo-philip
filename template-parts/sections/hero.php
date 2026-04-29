<?php
/**
 * Section: Hero
 *
 * @package Estatein
 */
?>
<section class="hero section">
    <div class="container hero-grid">

        <div class="hero-content">
            <h1 class="hero-title">
                <?php esc_html_e( 'Discover Your Dream Property with Estatein', 'estatein' ); ?>
            </h1>

            <p class="hero-subtitle">
                <?php esc_html_e( 'Your journey to finding the perfect property begins here. Explore our listings to find the home that matches your dreams.', 'estatein' ); ?>
            </p>

            <div class="hero-actions">
                <a href="<?php echo esc_url( home_url( '/about-us/' ) ); ?>" class="btn btn-secondary">
                    <?php esc_html_e( 'Learn More', 'estatein' ); ?>
                </a>
                <a href="<?php echo esc_url( home_url( '/properties/' ) ); ?>" class="btn">
                    <?php esc_html_e( 'Browse Properties', 'estatein' ); ?>
                </a>
            </div>

            <div class="hero-stats">
                <div class="hero-stat">
                    <span class="num">200+</span>
                    <span class="label"><?php esc_html_e( 'Happy Customers', 'estatein' ); ?></span>
                </div>
                <div class="hero-stat">
                    <span class="num">10k+</span>
                    <span class="label"><?php esc_html_e( 'Properties For Clients', 'estatein' ); ?></span>
                </div>
                <div class="hero-stat">
                    <span class="num">16+</span>
                    <span class="label"><?php esc_html_e( 'Years of Experience', 'estatein' ); ?></span>
                </div>
            </div>
        </div>

        <div class="hero-visual">
            <div class="hero-image">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/hero.png' ); ?>"
                     alt="<?php esc_attr_e( 'Modern blue glass skyscrapers', 'estatein' ); ?>"
                     class="hero-image-photo"
                     width="1200" height="1300"
                     loading="eager"
                     fetchpriority="high"
                     decoding="async">
            </div>
            <div class="hero-badge" aria-hidden="true">
                <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <path id="circle" d="M 50,50 m -38,0 a 38,38 0 1,1 76,0 a 38,38 0 1,1 -76,0" />
                    </defs>
                    <text font-family="Urbanist, sans-serif" font-size="9" fill="#fff" letter-spacing="2">
                        <textPath href="#circle">Discover Your Dream Property &#8226; Discover Your Dream Property &#8226;</textPath>
                    </text>
                    <circle cx="50" cy="50" r="18" fill="#703BF7"/>
                    <path d="M 44 44 L 56 56 M 56 44 L 56 56 L 44 56" stroke="#fff" stroke-width="2" fill="none" stroke-linecap="round"/>
                </svg>
            </div>
        </div>

    </div>
</section>
