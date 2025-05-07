<?php
/**
 * Conference Amenities & Activities Hero Section Template
 */
?>

<section class="hero-section">
    <!-- Slider container -->
    <div class="swiper hero-swiper">
        <div class="swiper-wrapper">
            <!-- Image Slides -->
            <div class="swiper-slide">
                <img src="<?php echo get_template_directory_uri(); ?>/images/amenities/slider/jakuzzi.webp" alt="Luxury Jacuzzi at Marina Bay Resort & Casino" class="hero-image">
            </div>
            <div class="swiper-slide">
                <img src="<?php echo get_template_directory_uri(); ?>/images/amenities/slider/conference.webp" alt="State-of-the-art Conference Facilities at Marina Bay" class="hero-image">
            </div>
            <div class="swiper-slide">
                <img src="<?php echo get_template_directory_uri(); ?>/images/amenities/slider/spa.webp" alt="Premium Spa and Wellness Center at Marina Bay Resort" class="hero-image">
            </div>
        </div>

        <!-- Pagination -->
        <div class="swiper-pagination"></div>
    </div>
</section>