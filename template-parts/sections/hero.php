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
                <!-- Decorative gradient placeholder. Replace with hero image upload via WP customizer in a real build. -->
                <div class="hero-image-placeholder" aria-hidden="true">
                    <svg viewBox="0 0 400 500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice">
                        <defs>
                            <linearGradient id="heroGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" stop-color="#1A1A1A"/>
                                <stop offset="50%" stop-color="#2D1B69"/>
                                <stop offset="100%" stop-color="#703BF7"/>
                            </linearGradient>
                            <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
                                <path d="M 40 0 L 0 0 0 40" fill="none" stroke="rgba(255,255,255,0.05)" stroke-width="1"/>
                            </pattern>
                        </defs>
                        <rect width="400" height="500" fill="url(#heroGrad)"/>
                        <rect width="400" height="500" fill="url(#grid)"/>
                        <!-- Abstract building shapes -->
                        <rect x="120" y="120" width="60" height="280" fill="rgba(255,255,255,0.08)" rx="2"/>
                        <rect x="190" y="80" width="80" height="320" fill="rgba(255,255,255,0.12)" rx="2"/>
                        <rect x="280" y="160" width="50" height="240" fill="rgba(255,255,255,0.06)" rx="2"/>
                    </svg>
                </div>
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
