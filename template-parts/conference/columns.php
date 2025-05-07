<?php
/**
 * Conference Columns Section Template
 */
?>

<section class="conference-columns">
    <!-- Meetings Section -->
    <div class="column-section">
        <div class="image-column">
            <img src="<?php echo get_template_directory_uri(); ?>/images/conference/columns/conference.webp" alt="Meetings and Conferences at Marina Bay">
        </div>
        <div class="content-column">
            <h2 class="column-title">Meetings & Conferences</h2>
            <p class="column-text">Marina Bay Resort & Casino offers sophisticated, state-of-the-art meeting facilities designed to accommodate events of any scale. From executive board meetings to international conferences, our versatile spaces and professional team deliver exceptional experiences that combine luxury with functionality, ensuring your business objectives are met with unparalleled style.</p>
        </div>
    </div>

    <!-- Weddings Section -->
    <div class="column-section reverse">
        <div class="image-column">
            <img src="<?php echo get_template_directory_uri(); ?>/images/conference/columns/wedding.webp" alt="Weddings & Honeymoons at Marina Bay">
        </div>
        <div class="content-column">
            <h2 class="column-title">Weddings & Honeymoons</h2>
            <p class="column-text">Set against the stunning backdrop of Albania's pristine coastline, Marina Bay Resort & Casino provides an enchanting setting for your perfect day. Our elegant venues, coupled with meticulous attention to detail and world-class service, create an unforgettable backdrop for celebrations of love and new beginnings.</p>
            <a href="<?php echo esc_url(home_url('/weddings')); ?>" class="learn-more">LEARN MORE</a>
        </div>
    </div>
</section>
