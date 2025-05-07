<?php
/**
 * Casino Features Section
 */

$features = [
    [
        'title' => 'PRIVATE GAMING SALONS',
        'description' => 'Experience the epitome of exclusive gaming in our private salons. These intimate spaces offer personalized service, premium gaming tables, and dedicated hosts. Perfect for high-stakes players who appreciate discretion and sophistication.',
        'image' => '/wp-content/themes/marina-bay/images/casino/c2.jpg'
    ],
    [
        'title' => 'HIGH LIMIT LOUNGE',
        'description' => 'Enter our prestigious high-limit area where luxury meets excitement. Featuring exclusive table games, private cashier services, and premium amenities. Our dedicated team ensures your gaming experience exceeds all expectations.',
        'image' => '/wp-content/themes/marina-bay/images/casino/casino-placeholder.png'
    ],
    [
        'title' => 'VIP CONCIERGE SERVICE',
        'description' => 'Elevate your casino experience with our world-class VIP services. From exclusive restaurant reservations to private gaming tutorials, our concierge team is available 24/7 to fulfill your every request. Enjoy priority access to all resort amenities and special events.',
        'image' => '/wp-content/themes/marina-bay/images/casino/c1.jpg'
    ],
];
?>

<section class="casino-features" id="explore-casino">
    <div class="casino-features__grid">
        <?php foreach ($features as $index => $feature) : ?>
            <div class="casino-features__item <?php echo ($index + 1) % 2 === 0 ? 'casino-features__item--reverse' : ''; ?>">
                <?php if ($feature['image']) : ?>
                    <div class="casino-features__image-wrapper">
                        <img 
                            src="<?php echo esc_url($feature['image']); ?>" 
                            alt="<?php echo esc_attr($feature['title']); ?>"
                            class="casino-features__image"
                            loading="lazy"
                        >
                    </div>
                <?php endif; ?>
                <div class="casino-features__content">
                    <h2 class="casino-features__title"><?php echo esc_html($feature['title']); ?></h2>
                    <p class="casino-features__description"><?php echo esc_html($feature['description']); ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>



