<?php
/**
 * Dining Categories Section Template
 */
?>

<section class="dining-categories">
    <div class="container">
        <div class="dining-grid">
            <!-- Mandarine Restaurant -->
            <div class="dining-item">
                <a href="<?php echo esc_url(home_url('/restaurants/mandarine-restaurant')); ?>" class="dining-link">
                    <div class="dining-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/dining/categories/IMG_1733.webp" alt="Mandarine Restaurant">
                        <div class="dining-overlay"></div>
                        <h2 class="dining-title">Mandarine Restaurant</h2>
                    </div>
                </a>
            </div>

            <!-- Bato's Restaurant -->
            <div class="dining-item">
                <a href="<?php echo esc_url(home_url('/restaurants/batos-restaurant')); ?>" class="dining-link">
                    <div class="dining-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/dining/categories/batos.webp" alt="Bato's Restaurant">
                        <div class="dining-overlay"></div>
                        <h2 class="dining-title">Bato's Restaurant</h2>
                    </div>
                </a>
            </div>

            <!-- Lime Gastro - Lounge -->
            <div class="dining-item">
                <a href="<?php echo esc_url(home_url('/restaurants/lime-gastro-lounge')); ?>" class="dining-link">
                    <div class="dining-image">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/dining/categories/IMG_1730.webp" alt="Lime Gastro - Lounge">
                        <div class="dining-overlay"></div>
                        <h2 class="dining-title">Lime Gastro - Lounge</h2>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>