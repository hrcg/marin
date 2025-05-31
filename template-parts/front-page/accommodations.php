<?php
/**
 * Accommodations Section Template
 */


$accommodations = array(
    array(
        'title' => 'DELUXE FULL VIEW',
        'description' => 'Experience refined luxury in our Deluxe Full View rooms, featuring elegant accommodations with king bed or twin beds. Each 32m² room offers sophisticated comfort for up to 2 adults and 1 child.',
        'image' => get_template_directory_uri() . '/images/rooms/rooms-section/ML0A2303e.webp',
        'link' => '/rooms/deluxe-full-view'
    ),
    array(
        'title' => 'DELUXE SUITE',
        'description' => 'Our spacious 45m² Deluxe Suite offers a luxurious king bed and separate living area, perfect for families with up to 2 adults and 2 children. Experience premium comfort in an elegant setting.',
        'image' => get_template_directory_uri() . '/images/rooms/rooms-section/bath-deluxe.webp',
        'link' => '/rooms/deluxe-suite'
    ),
    array(
        'title' => 'FAMILY JUNIOR SUITE DELUXE',
        'description' => 'Ideal for families, our 58m² Family Junior Suite Deluxe features a king bed and 2 sofa beds, accommodating 2 adults and 3 children in style and comfort.',
        'image' => get_template_directory_uri() . '/images/rooms/rooms-section/fjsd2.webp',
        'link' => '/rooms/family-junior-suite-deluxe'
    ),
    array(
        'title' => 'JUNIOR SUITE',
        'description' => 'Our elegant 42m² Junior Suite combines a comfortable king bed with a living area, perfect for up to 2 adults and 1 child, offering a refined retreat with modern amenities.',
        'image' => get_template_directory_uri() . '/images/rooms/rooms-section/js.webp',
        'link' => '/rooms/junior-suite'
    ),
    array(
        'title' => 'SUPERIOR POOL AND SEA VIEW',
        'description' => 'Enjoy stunning dual views in our 38m² Superior Pool and Sea View rooms, featuring your choice of king bed or twin beds, ideal for 2 adults and 1 child.',
        'image' => get_template_directory_uri() . '/images/rooms/rooms-section/superior-pool.webp',
        'link' => '/rooms/superior-pool-and-sea-view'
    ),
    array(
        'title' => 'SUPERIOR ROOM SEA VIEW',
        'description' => 'Take in breathtaking ocean vistas from our 35m² Superior Room Sea View, offering king bed or twin beds options and comfortable accommodation for 2 adults and 1 child.',
        'image' => get_template_directory_uri() . '/images/rooms/rooms-section/superior-sea.webp',
        'link' => '/rooms/superior-room-sea-view'
    )
);
?>

<section class="accommodations-section">
    <div class="section-header">
        <h2 class="section-title">ACCOMMODATIONS</h2>
    </div>

    <div class="swiper accommodations-swiper">
        <div class="swiper-wrapper">
            <?php foreach ($accommodations as $accommodation): ?>
                <div class="swiper-slide">
                    <div class="accommodation-item">
                        <div class="accommodation-image">
                            <img src="<?php echo esc_url($accommodation['image']); ?>" alt="<?php echo esc_attr($accommodation['title']); ?>">
                        </div>
                        <div class="accommodation-content">
                            <h3 class="accommodation-title"><?php echo esc_html($accommodation['title']); ?></h3>
                            <p class="accommodation-description"><?php echo esc_html($accommodation['description']); ?></p>
                            <a href="<?php echo esc_url($accommodation['link']); ?>" class="details-btn">DETAILS</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section> 