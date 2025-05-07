<?php
/**
 * Template Name: Single Room
 * Template Post Type: room
 */

get_header(); ?>

<div class="single-room-page">
    <!-- Hero Section -->
    <section class="room-hero">
        <?php if(has_post_thumbnail()): ?>
            <div class="hero-image">
                <?php the_post_thumbnail('full'); ?>
            </div>
        <?php endif; ?>
        <div class="hero-content">
            <h1 class="single-room-title"><?php the_title(); ?></h1>
        </div>
    </section>

    <!-- Check Rates Section -->
    <section class="check-rates-section">
        <div class="container">
            <h2 class="check-rates-title"><?php echo esc_html(get_field('check_rates_text')); ?></h2>
            <div class="room-check-rates-description">
                <?php the_content(); ?>
            </div>
            <a href="#" class="btn-check-rates">CHECK RATES</a>
        </div>
    </section>


    <!-- Gallery Section -->
    <section class="room-gallery-section">
        <div class="container">
            <h2 class="section-title">GALLERY</h2>
            <?php 
            $gallery_images = get_field('room_gallery');
            if($gallery_images): 
                $image_count = count($gallery_images);
                $gallery_class = $image_count === 2 ? 'gallery-slider has-two-images' : 'gallery-slider';
            ?>
                <div class="<?php echo esc_attr($gallery_class); ?> swiper">
                    <div class="swiper-wrapper">
                        <?php foreach($gallery_images as $image): ?>
                            <div class="swiper-slide">
                                <img src="<?php echo esc_url($image['url']); ?>" 
                                     alt="<?php echo esc_attr($image['alt']); ?>"
                                     width="<?php echo esc_attr($image['width']); ?>"
                                     height="<?php echo esc_attr($image['height']); ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- Navigation buttons -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Details Section -->
    <section class="single-room-details">
        <div class="container">
            <h2 class="single-room-details-title">DETAILS</h2>
            <div class="single-room-details-grid">
                <?php if(get_field('room_beds')): ?>
                    <div class="single-room-detail-item">
                        <h3 class="single-room-detail-label">BEDS</h3>
                        <p class="single-room-detail-value"><?php echo esc_html(get_field('room_beds')); ?></p>
                    </div>
                <?php endif; ?>

                <?php if(get_field('room_occupancy')): ?>
                    <div class="single-room-detail-item">
                        <h3 class="single-room-detail-label">OCCUPANCY</h3>
                        <p class="single-room-detail-value"><?php echo esc_html(get_field('room_occupancy')); ?></p>
                    </div>
                <?php endif; ?>

                <?php if(get_field('room_size')): ?>
                    <div class="single-room-detail-item">
                        <h3 class="single-room-detail-label">SIZE</h3>
                        <p class="single-room-detail-value"><?php echo esc_html(get_field('room_size')); ?></p>
                    </div>
                <?php endif; ?>

                <?php if(get_field('room_bathroom')): ?>
                    <div class="single-room-detail-item">
                        <h3 class="single-room-detail-label">BATHROOM</h3>
                        <p class="single-room-detail-value"><?php echo esc_html(get_field('room_bathroom')); ?></p>
                    </div>
                <?php endif; ?>

                <?php if(get_field('room_views')): ?>
                    <div class="single-room-detail-item">
                        <h3 class="single-room-detail-label">VIEWS</h3>
                        <p class="single-room-detail-value"><?php echo esc_html(get_field('room_views')); ?></p>
                    </div>
                <?php endif; ?>

                <?php if(get_field('room_unique_features')): ?>
                    <div class="single-room-detail-item">
                        <h3 class="single-room-detail-label">UNIQUE FEATURES</h3>
                        <p class="single-room-detail-value"><?php echo esc_html(get_field('room_unique_features')); ?></p>
                    </div>
                <?php endif; ?>
            </div>
            <p class="infant-note">Infant refers to a child three years of age or younger.</p>
        </div>
    </section>

    <!-- Amenities Section -->
    <section class="room-amenities-section">
        <div class="container">
            <h2 class="section-title">AMENITIES</h2>

            <div class="amenities-grid">
                <?php 
                $amenity_groups = [
                    'space_desk' => ['title' => 'Space & Desk', 'field' => 'space_desk_item'],
                    'bathroom' => ['title' => 'Bathroom', 'field' => 'bathroom_item'],
                    'home_safety' => ['title' => 'Home Safety', 'field' => 'home_safety_item'],
                    'entertainment' => ['title' => 'Entertainment', 'field' => 'entertainment_item'],
                    'service_section' => ['title' => 'Service', 'field' => 'service_item'], // Used renamed field key
                    'heating_cooling' => ['title' => 'Heating & Cooling', 'field' => 'heating_cooling_item']
                ];

                foreach ($amenity_groups as $key => $group):
                    if(have_rows($key)):
                ?>
                    <div class="amenities-group">
                        <h3 class="amenities-title"><?php echo esc_html($group['title']); ?></h3>
                        <ul class="amenities-list">
                            <?php while(have_rows($key)): the_row(); ?>
                                <?php $item = get_sub_field($group['field']); ?>
                                <?php if ($item): // Check if item is not empty ?>
                                    <li><?php echo esc_html($item); ?></li>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                <?php 
                    endif; 
                endforeach; 
                ?>
            </div>

        </div>
    </section>
</div>

<?php get_footer(); ?> 