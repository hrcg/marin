<?php
/**
 * Retreats Hero Section Template
 */
?> 

<section class="hero-section">
    <!-- Slider container -->
    <div class="swiper hero-swiper">
        <div class="swiper-wrapper">
            <!-- Video Slide -->
            <div class="swiper-slide">
                <div class="retreats-hero-text-overlay">
                    <h2 class="hero-main-heading">Transform your <span class="highlight">Meetings, Conferences</span> and <span class="highlight">Incentive Trips</span> into meaningful experiences</h2>
                </div>
                <div class="back-gradient"></div>
                <!-- Desktop Video -->
                <video class="hero-video hero-retreats-video" autoplay muted loop playsinline poster="<?php echo get_theme_file_uri('/images/retreats/hero/retreats-hero-bg.jpg'); ?>">
                    <source src="<?php echo get_theme_file_uri('/images/retreats/hero/retreats-hero.webm'); ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <div class="hero-video-controls retreats-button">
                    <button class="video-pause-btn" aria-label="Pause video">
                        <svg class="pause-icon" viewBox="0 0 24 24">
                            <path d="M6 4h4v16H6V4zm8 0h4v16h-4V4z"/>
                        </svg>
                        <svg class="play-icon" viewBox="0 0 24 24">
                            <path d="M8 5v14l11-7z"/>
                        </svg>
                    </button>
                </div>
                <div class="retreats-hero-icons-container">
                    <div class="hero-icon">
                        <img src="<?php echo get_theme_file_uri('/images/retreats/hero/tailored.svg'); ?>" alt="Tailored Packages">
                        <span>PACKAGES</span>
                    </div>
                    <div class="hero-icon">
                        <img src="<?php echo get_theme_file_uri('/images/retreats/hero/case.svg'); ?>" alt="Corporate Gatherings">
                        <span>CORPORATE</span>
                    </div>
                    <div class="hero-icon">
                        <img src="<?php echo get_theme_file_uri('/images/retreats/hero/why.svg'); ?>" alt="Why Dukley?">
                        <span>WHY US?</span>
                    </div>
                    <div class="hero-icon">
                        <img src="<?php echo get_theme_file_uri('/images/retreats/hero/testimonials.svg'); ?>" alt="Testimonials">
                        <span>TESTIMONIALS</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
