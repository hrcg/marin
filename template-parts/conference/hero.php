<?php
/**
 * Conference Hero Section Template
 */
?>

<section class="hero-section">
    <!-- Slider container -->
    <div class="swiper hero-swiper">
        <div class="swiper-wrapper">
            <!-- Image Slides -->
            <div class="swiper-slide">
                <img src="<?php echo get_template_directory_uri(); ?>/images/conference/slider/main.webp" alt="Grand Conference Hall at Marina Bay Resort & Casino" class="hero-image">
            </div>
            <div class="swiper-slide">
                <img src="<?php echo get_template_directory_uri(); ?>/images/conference/slider/2.webp" alt="State-of-the-art Meeting Facilities at Marina Bay" class="hero-image">
            </div>
            <div class="swiper-slide">
                <img src="<?php echo get_template_directory_uri(); ?>/images/conference/slider/3.webp" alt="Premium Conference Venue at Marina Bay Resort" class="hero-image">
            </div>
        </div>

        <!-- Pagination -->
        <div class="swiper-pagination"></div>
    </div>
</section>