<?php
/**
 * Section: Features Row (4 cards under hero)
 *
 * @package Estatein
 */

$features = array(
    array(
        'icon'  => 'home',
        'title' => __( 'Find Your Dream Home', 'estatein' ),
        'url'   => home_url( '/properties/' ),
    ),
    array(
        'icon'  => 'sparkles',
        'title' => __( 'Unlock Property Value', 'estatein' ),
        'url'   => home_url( '/services/' ),
    ),
    array(
        'icon'  => 'office',
        'title' => __( 'Effortless Property Management', 'estatein' ),
        'url'   => home_url( '/services/' ),
    ),
    array(
        'icon'  => 'sun',
        'title' => __( 'Smart Investments, Informed Decisions', 'estatein' ),
        'url'   => home_url( '/services/' ),
    ),
);
?>
<section class="features-section">
    <div class="container">
        <div class="feature-row">
            <?php foreach ( $features as $feature ) : ?>
                <a href="<?php echo esc_url( $feature['url'] ); ?>" class="feature-card">
                    <span class="icon-wrap" aria-hidden="true">
                        <?php estatein_the_icon( $feature['icon'], 24 ); ?>
                    </span>
                    <h3><?php echo esc_html( $feature['title'] ); ?></h3>
                    <span class="arrow" aria-hidden="true">
                        <?php estatein_the_icon( 'arrow-up-right', 16 ); ?>
                    </span>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>
