<?php
/**
 * Facility Highlights Section Template
 */

$facilities = array(
    array(
        'title' => 'The Spa',
        'description' => 'The Spa at Marina Bay is a sanctuary where relaxation meets rejuvenation. A soothing blend of plant scents, warm water, and expert massage therapies creates the perfect environment for unwinding.',
        'image' => get_theme_file_uri('/images/front-page/facilities/_N4A9181.webp'),
        'link' => '/the-spa',
    ),
    array(
        'title' => 'Casino',
        'description' => 'Step into a world of excitement at our world-class casino, featuring an extensive selection of table games, slot machines, and exclusive VIP gaming areas.',
        'image' => get_theme_file_uri('/images/front-page/facilities/DJI_0742.webp'),
        'link' => '/casino',
    ),
    array(
        'title' => 'Meetings & Conferences',
        'description' => 'Host your next event in our sophisticated meeting and conference facilities. From intimate boardrooms to grand ballrooms, our versatile spaces are equipped with state-of-the-art technology and supported by our dedicated events team.',
        'image' => get_theme_file_uri('/images/front-page/facilities/conf.webp'),
        'link' => '/meetings-conferences',
    ),
    array(
        'title' => 'Dining',
        'description' => 'At Marina Bay, we offer more than just dining—we offer an opportunity to explore a world of flavors, inspired by the Mediterranean and enriched by the best dishes from around the globe.

What do you want more in life than being at Marina?',
        'image' => get_theme_file_uri('/images/front-page/facilities/dining.webp'),
        'link' => '/dining',
    ),
    array(
        'title' => 'Weddings',
        'description' => 'Celebrate your love at the most unique and romantic location — our exclusive Helicopter Field. Set against the stunning backdrop of the sparkling sea and breathtaking sunsets, this spacious 360 m² helipad transforms into a dreamy wedding venue, offering both adventure and elegance. Picture yourself saying "I do" as the waves softly kiss the shore, and the golden light bathes your special day in warmth and beauty.

',
        'image' => get_theme_file_uri('/images/front-page/facilities/_N4A8694 copy.webp'),
        'link' => '/wedding',
    )
);
?>

<section class="facility-highlights">
    <div class="container">
        <h2 class="section-title">FACILITY HIGHLIGHTS</h2>
    </div>

    <div class="facilities-grid">
        <?php foreach ($facilities as $facility) : ?>
            <div class="facility-item">
                <div class="facility-image">
                    <img src="<?php echo esc_url($facility['image']); ?>" alt="<?php echo esc_attr($facility['title']); ?>">
                </div>
                <div class="facility-content">
                    <h3 class="facility-title"><?php echo esc_html($facility['title']); ?></h3>
                    <p class="facility-description"><?php echo esc_html($facility['description']); ?></p>
                    <a href="<?php echo esc_url($facility['link']); ?>" class="all-offers-link">Learn More</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Navigation Arrows -->
    <div class="facilities-nav">
        <button class="nav-prev" aria-label="Previous facility">
            <svg width="24" height="24" viewBox="0 0 24 24">
                <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/>
            </svg>
        </button>
        <button class="nav-next" aria-label="Next facility">
            <svg width="24" height="24" viewBox="0 0 24 24">
                <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/>
            </svg>
        </button>
    </div>
</section>
