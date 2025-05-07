<?php
/**
 * Homepage Hero Section Template
 */
?> 

<section class="hero-section">
    <!-- Slider container -->
    <div class="swiper hero-swiper">
        <div class="swiper-wrapper">
            <!-- Video Slide -->
            <div class="swiper-slide">
                <!-- Desktop Video -->
                <video class="hero-video hero-video-desktop" autoplay muted loop playsinline poster="<?php echo get_theme_file_uri('/images/front-page/slider/hero-fallback-new.jpg'); ?>">
                    <source src="<?php echo get_theme_file_uri('/images/front-page/slider/hero-video-new.mp4'); ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <!-- Mobile Video -->
                <video class="hero-video hero-video-mobile" autoplay muted loop playsinline poster="<?php echo get_theme_file_uri('/images/front-page/slider/hero-fallback-new-mobile.jpg'); ?>">
                    <source src="<?php echo get_theme_file_uri('/images/front-page/slider/hero-video-mobile.mp4'); ?>" type="video/mp4"> <!-- Mobile video -->
                    Your browser does not support the video tag.
                </video>
                <div class="hero-video-controls">
                    <button class="video-pause-btn" aria-label="Pause video">
                        <svg class="pause-icon" viewBox="0 0 24 24">
                            <path d="M6 4h4v16H6V4zm8 0h4v16h-4V4z"/>
                        </svg>
                        <svg class="play-icon" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z"/>
                        </svg>
                    </button>
                </div>
            </div>
            <!-- Image Slides -->
            <div class="swiper-slide">
                <img src="<?php echo get_template_directory_uri(); ?>/images/front-page/slider/DJI_05302.webp" alt="Stunning Aerial View of Marina Bay Resort & Casino" class="hero-image">
            </div>
            <div class="swiper-slide">
                <img src="<?php echo get_template_directory_uri(); ?>/images/front-page/slider/_N4A9193.webp" alt="Luxurious Interior of Marina Bay Resort" class="hero-image">
            </div>
            <div class="swiper-slide">
                <img src="<?php echo get_template_directory_uri(); ?>/images/front-page/slider/_N4A6026.webp" alt="Premium Amenities at Marina Bay Resort & Casino" class="hero-image">
            </div>
            <div class="swiper-slide">
                <img src="<?php echo get_template_directory_uri(); ?>/images/front-page/slider/jet.jpg" alt="Private Jet Service at Marina Bay Resort" class="hero-image">
            </div>
            <div class="swiper-slide">
                <img src="<?php echo get_template_directory_uri(); ?>/images/front-page/slider/DJI_0736.webp" alt="Exclusive Beachfront at Marina Bay Resort" class="hero-image">
            </div>
        </div>

        <!-- Pagination -->
        <div class="swiper-pagination"></div>
    </div>

    <div class="hero-overlay">
        <a href="#main-content" class="scroll-to-explore"></a>
    </div>
</section>
