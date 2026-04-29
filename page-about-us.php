<?php
/**
 * Template for the About Us page.
 *
 * File name "page-about-us.php" matches the page slug "about-us" so WordPress
 * auto-loads it via the template hierarchy.
 *
 * @package Estatein
 */

get_header();

$values = array(
    array( 'icon' => 'star',     'title' => __( 'Trust', 'estatein' ),         'desc' => __( 'Trust is the cornerstone of every successful real estate transaction.', 'estatein' ) ),
    array( 'icon' => 'sparkles', 'title' => __( 'Excellence', 'estatein' ),    'desc' => __( 'We set the bar high for ourselves. From the properties we list to the services we provide.', 'estatein' ) ),
    array( 'icon' => 'home',     'title' => __( 'Client-Centric', 'estatein' ),'desc' => __( 'Your dreams and needs are at the center of our universe. We listen, understand.', 'estatein' ) ),
    array( 'icon' => 'check',    'title' => __( 'Our Commitment', 'estatein' ),'desc' => __( 'We are dedicated to providing you with the highest level of service, professionalism, and support.', 'estatein' ) ),
);

$achievements = array(
    array( 'title' => __( '3+ Years of Excellence', 'estatein' ),  'desc' => __( "With over 3 years in the industry, we've amassed a wealth of knowledge and experience, becoming a go-to resource for all things real estate.", 'estatein' ) ),
    array( 'title' => __( 'Happy Clients', 'estatein' ),           'desc' => __( "Our greatest achievement is the satisfaction of our clients. Their success stories fuel our passion for what we do.", 'estatein' ) ),
    array( 'title' => __( 'Industry Recognition', 'estatein' ),    'desc' => __( "We've earned the respect of our peers and industry leaders, with accolades and awards that reflect our commitment to excellence.", 'estatein' ) ),
);

$steps = array(
    array( 'n' => '01', 'title' => __( 'Discover a World of Possibilities', 'estatein' ), 'desc' => __( 'Your journey begins with exploring our carefully curated property listings. Use our intuitive search tools to filter properties based on your preferences, including location, type, size, and budget.', 'estatein' ) ),
    array( 'n' => '02', 'title' => __( 'Narrowing Down Your Choices', 'estatein' ),       'desc' => __( "Once you've found properties that catch your eye, save them to your account or make a shortlist. This allows you to compare and revisit your favorites as you make your decision.", 'estatein' ) ),
    array( 'n' => '03', 'title' => __( 'Personalized Guidance', 'estatein' ),             'desc' => __( 'Have questions about a property or need more information? Our dedicated team of real estate experts is just a call or message away.', 'estatein' ) ),
    array( 'n' => '04', 'title' => __( 'See It for Yourself', 'estatein' ),               'desc' => __( "Arrange viewings of the properties you're interested in. We'll coordinate with the property owners and accompany you to ensure you get a firsthand look at your potential new home.", 'estatein' ) ),
    array( 'n' => '05', 'title' => __( 'Making Informed Decisions', 'estatein' ),         'desc' => __( 'Before making an offer, our team will assist you with due diligence, including property inspections, legal checks, and market analysis. We want you to be fully informed and confident in your choice.', 'estatein' ) ),
    array( 'n' => '06', 'title' => __( 'Getting the Best Deal', 'estatein' ),             'desc' => __( "We'll help you negotiate the best terms and prepare your offer. Our goal is to secure the property at the right price and on favorable terms.", 'estatein' ) ),
);

$team = array(
    array( 'name' => 'Max Mitchell',    'role' => __( 'Founder', 'estatein' ) ),
    array( 'name' => 'Sarah Johnson',   'role' => __( 'Chief Real Estate Officer', 'estatein' ) ),
    array( 'name' => 'David Brown',     'role' => __( 'Head of Property Management', 'estatein' ) ),
    array( 'name' => 'Michael Turner',  'role' => __( 'Legal Counsel', 'estatein' ) ),
);
?>

<?php /* Our Journey hero */ ?>
<section class="section about-journey">
    <div class="container journey-grid">
        <div>
            <span class="dots-deco" aria-hidden="true"><span></span><span></span><span></span></span>
            <h1><?php esc_html_e( 'Our Journey', 'estatein' ); ?></h1>
            <p><?php esc_html_e( "Our story is one of continuous growth and evolution. We started as a small team with big dreams, determined to create a real estate platform that transcended the ordinary. Over the years, we've expanded our reach, forged valuable partnerships, and gained the trust of countless clients.", 'estatein' ); ?></p>

            <div class="journey-stats">
                <div class="hero-stat"><span class="num">200+</span><span class="label"><?php esc_html_e( 'Happy Customers', 'estatein' ); ?></span></div>
                <div class="hero-stat"><span class="num">10k+</span><span class="label"><?php esc_html_e( 'Properties For Clients', 'estatein' ); ?></span></div>
                <div class="hero-stat"><span class="num">16+</span><span class="label"><?php esc_html_e( 'Years of Experience', 'estatein' ); ?></span></div>
            </div>
        </div>
        <div class="journey-visual">
            <svg viewBox="0 0 500 400" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" style="width:100%;height:100%;display:block;border-radius:var(--radius-lg);">
                <defs>
                    <linearGradient id="jbg" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" stop-color="#1A1A1A"/>
                        <stop offset="100%" stop-color="#262626"/>
                    </linearGradient>
                    <linearGradient id="houseFront" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" stop-color="#FFFFFF"/>
                        <stop offset="100%" stop-color="#D5C2FF"/>
                    </linearGradient>
                    <linearGradient id="houseSide" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" stop-color="#A883FF"/>
                        <stop offset="100%" stop-color="#703BF7"/>
                    </linearGradient>
                    <pattern id="dotPat" width="14" height="14" patternUnits="userSpaceOnUse">
                        <circle cx="7" cy="7" r="0.8" fill="rgba(255,255,255,0.06)"/>
                    </pattern>
                </defs>
                <rect width="500" height="400" fill="url(#jbg)"/>
                <rect width="500" height="400" fill="url(#dotPat)"/>

                <!-- Hand silhouette -->
                <path d="M 60 380 Q 100 360 160 360 L 380 360 Q 420 360 440 380 L 440 400 L 60 400 Z" fill="#3A2470" opacity="0.5"/>

                <!-- House -->
                <g transform="translate(140, 100)">
                    <!-- Roof -->
                    <polygon points="0,80 110,0 220,80" fill="#FFFFFF"/>
                    <!-- Front face -->
                    <rect x="0" y="80" width="220" height="180" fill="url(#houseFront)"/>
                    <!-- Side face -->
                    <polygon points="220,80 260,60 260,240 220,260" fill="url(#houseSide)"/>
                    <!-- Door -->
                    <rect x="40" y="160" width="40" height="100" fill="#1A1A1A"/>
                    <circle cx="72" cy="210" r="2" fill="#FFFFFF"/>
                    <!-- Windows -->
                    <rect x="120" y="130" width="50" height="50" fill="#1A1A1A" opacity="0.85"/>
                    <line x1="145" y1="130" x2="145" y2="180" stroke="#FFFFFF" stroke-width="2" opacity="0.4"/>
                    <line x1="120" y1="155" x2="170" y2="155" stroke="#FFFFFF" stroke-width="2" opacity="0.4"/>
                </g>
            </svg>
        </div>
    </div>
</section>

<?php /* Values */ ?>
<section class="section about-values">
    <div class="container values-grid">
        <div class="values-intro">
            <span class="dots-deco" aria-hidden="true"><span></span><span></span><span></span></span>
            <h2><?php esc_html_e( 'Our Values', 'estatein' ); ?></h2>
            <p><?php esc_html_e( 'Our story is one of continuous growth and evolution. We started as a small team with big dreams, determined to create a real estate platform that transcended the ordinary.', 'estatein' ); ?></p>
        </div>
        <div class="values-cards">
            <?php foreach ( $values as $v ) : ?>
                <div class="value-card">
                    <span class="icon-wrap" aria-hidden="true"><?php estatein_the_icon( $v['icon'], 18 ); ?></span>
                    <h3><?php echo esc_html( $v['title'] ); ?></h3>
                    <p><?php echo esc_html( $v['desc'] ); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php /* Achievements */ ?>
<section class="section about-achievements">
    <div class="container">
        <div class="section-head">
            <div class="section-head-text">
                <span class="dots-deco" aria-hidden="true"><span></span><span></span><span></span></span>
                <h2><?php esc_html_e( 'Our Achievements', 'estatein' ); ?></h2>
                <p><?php esc_html_e( 'Our story is one of continuous growth and evolution. We started as a small team with big dreams, determined to create a real estate platform that transcended the ordinary.', 'estatein' ); ?></p>
            </div>
        </div>
        <div class="achievements-grid">
            <?php foreach ( $achievements as $a ) : ?>
                <div class="achievement-card">
                    <h3><?php echo esc_html( $a['title'] ); ?></h3>
                    <p><?php echo esc_html( $a['desc'] ); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php /* Steps */ ?>
<section class="section about-steps">
    <div class="container">
        <div class="section-head">
            <div class="section-head-text">
                <span class="dots-deco" aria-hidden="true"><span></span><span></span><span></span></span>
                <h2><?php esc_html_e( 'Navigating the Estatein Experience', 'estatein' ); ?></h2>
                <p><?php esc_html_e( "At Estatein, we've designed a straightforward process to help you find and purchase your dream property with ease. Here's a step-by-step guide to how it all works.", 'estatein' ); ?></p>
            </div>
        </div>
        <div class="steps-grid">
            <?php foreach ( $steps as $s ) : ?>
                <div class="step-card">
                    <span class="step-num">Step <?php echo esc_html( $s['n'] ); ?></span>
                    <h3><?php echo esc_html( $s['title'] ); ?></h3>
                    <p><?php echo esc_html( $s['desc'] ); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php /* Team */ ?>
<section class="section about-team">
    <div class="container">
        <div class="section-head">
            <div class="section-head-text">
                <span class="dots-deco" aria-hidden="true"><span></span><span></span><span></span></span>
                <h2><?php esc_html_e( 'Meet the Estatein Team', 'estatein' ); ?></h2>
                <p><?php esc_html_e( "At Estatein, our success is driven by the dedication and expertise of our team. Get to know the people behind our mission to make your real estate dreams a reality.", 'estatein' ); ?></p>
            </div>
        </div>
        <div class="team-grid">
            <?php
            $avatar_palettes = array(
                array( '#3A2470', '#1A1A1A' ),
                array( '#5B3FB0', '#262626' ),
                array( '#4D3A8C', '#1F1F1F' ),
                array( '#6B4FCF', '#2B2B2B' ),
            );
            foreach ( $team as $i => $m ) :
                $palette = $avatar_palettes[ $i % count( $avatar_palettes ) ];
                $initials = '';
                foreach ( explode( ' ', $m['name'] ) as $word ) {
                    $initials .= mb_substr( $word, 0, 1 );
                }
                $initials = strtoupper( mb_substr( $initials, 0, 2 ) );
                ?>
                <div class="team-card">
                    <div class="team-avatar">
                        <svg viewBox="0 0 200 240" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:100%;display:block;">
                            <defs>
                                <linearGradient id="ag<?php echo (int) $i; ?>" x1="0%" y1="0%" x2="100%" y2="100%">
                                    <stop offset="0%" stop-color="<?php echo esc_attr( $palette[0] ); ?>"/>
                                    <stop offset="100%" stop-color="<?php echo esc_attr( $palette[1] ); ?>"/>
                                </linearGradient>
                            </defs>
                            <rect width="200" height="240" fill="url(#ag<?php echo (int) $i; ?>)"/>
                            <text x="100" y="135" text-anchor="middle" font-family="Urbanist, sans-serif" font-size="60" font-weight="700" fill="#FFFFFF" opacity="0.9">
                                <?php echo esc_html( $initials ); ?>
                            </text>
                        </svg>
                        <span class="team-twitter" aria-hidden="true">𝕏</span>
                    </div>
                    <h3><?php echo esc_html( $m['name'] ); ?></h3>
                    <span class="team-role"><?php echo esc_html( $m['role'] ); ?></span>
                    <div class="team-cta">
                        <span><?php esc_html_e( 'Say Hello 👋', 'estatein' ); ?></span>
                        <button class="say-hello-btn" aria-label="<?php esc_attr_e( 'Say hello', 'estatein' ); ?>">
                            <?php estatein_the_icon( 'paper-airplane', 14 ); ?>
                        </button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php get_template_part( 'template-parts/sections/cta-band' ); ?>

<?php get_footer();
