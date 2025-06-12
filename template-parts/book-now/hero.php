<?php
/**
 * Book Now Hero Section Template
 */
?>

<section class="hero-section">
    <!-- Slider container -->
    <div class="swiper hero-swiper">
        <div class="swiper-wrapper">
            <!-- Image Slides -->
            <div class="swiper-slide">
            <div class="retreats-hero-text-overlay overlay-text-book-now">
                    <h2 class="hero-main-heading">Book your <span class="highlight">Dream Stay</span> at <span class="highlight">Marina Bay Resort & Casino</span></h2>
                </div>
                <div class="back-gradient"></div>
                <img src="<?php echo get_template_directory_uri(); ?>/images/book/slider/2.webp" alt="Luxurious Accommodations at Marina Bay Resort & Casino" class="hero-image">
            </div>
            <!--
            <div class="swiper-slide">
                <img src="<?php echo get_template_directory_uri(); ?>/images/book/slider/1.webp" alt="Elegant Room Interior at Marina Bay Resort" class="hero-image">
            </div>
            -->
        </div>

        <!-- Pagination -->
        <div class="swiper-pagination"></div>
    </div>
</section>