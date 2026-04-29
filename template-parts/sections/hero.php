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
                <!-- Decorative SVG hero visual — abstract glass buildings, replaceable via Customizer in a real build. -->
                <div class="hero-image-placeholder" aria-hidden="true">
                    <svg viewBox="0 0 400 500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice">
                        <defs>
                            <linearGradient id="heroSky" x1="0%" y1="0%" x2="0%" y2="100%">
                                <stop offset="0%" stop-color="#0F0524"/>
                                <stop offset="100%" stop-color="#2D1B69"/>
                            </linearGradient>
                            <linearGradient id="bldgA" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" stop-color="#4A6CFF" stop-opacity="0.95"/>
                                <stop offset="100%" stop-color="#1B2D8A" stop-opacity="0.85"/>
                            </linearGradient>
                            <linearGradient id="bldgB" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" stop-color="#6B8AFF"/>
                                <stop offset="100%" stop-color="#2A3FA0"/>
                            </linearGradient>
                            <linearGradient id="bldgC" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" stop-color="#8FA9FF"/>
                                <stop offset="100%" stop-color="#3D52B0"/>
                            </linearGradient>
                            <pattern id="windows" width="12" height="20" patternUnits="userSpaceOnUse">
                                <rect width="12" height="20" fill="rgba(0,0,0,0)"/>
                                <rect x="2" y="2" width="8" height="14" fill="rgba(255,255,255,0.18)"/>
                            </pattern>
                        </defs>
                        <rect width="400" height="500" fill="url(#heroSky)"/>
                        <!-- Tallest building -->
                        <g>
                            <polygon points="180,80 280,60 280,500 180,500" fill="url(#bldgA)"/>
                            <polygon points="180,80 280,60 280,500 180,500" fill="url(#windows)" opacity="0.6"/>
                        </g>
                        <!-- Middle building -->
                        <g>
                            <polygon points="100,160 200,140 200,500 100,500" fill="url(#bldgB)"/>
                            <polygon points="100,160 200,140 200,500 100,500" fill="url(#windows)" opacity="0.5"/>
                        </g>
                        <!-- Right building -->
                        <g>
                            <polygon points="270,140 370,120 370,500 270,500" fill="url(#bldgC)"/>
                            <polygon points="270,140 370,120 370,500 270,500" fill="url(#windows)" opacity="0.45"/>
                        </g>
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
