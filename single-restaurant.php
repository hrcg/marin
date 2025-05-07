<?php
/**
 * Template Name: Single Restaurant
 * Template Post Type: restaurant
 */

get_header(); ?>

<div class="single-restaurant-page">
    <!-- Hero Section -->
    <section class="restaurant-hero">
        <?php 
        $hero_image = get_field('restaurant_hero_image');
        if($hero_image): ?>
            <div class="hero-image">
                <img src="<?php echo esc_url($hero_image['url']); ?>" alt="<?php echo esc_attr($hero_image['alt']); ?>">
            </div>
        <?php endif; ?>
        <div class="hero-content">
            <div class="container">
                <div class="hero-text">
                    <h1 class="restaurant-title"><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Hours Section -->
    <section class="restaurant-hours">
        <div class="container">
            <div class="hours-content">
                <?php 
                $excerpt = get_field('restaurant_excerpt');
                if($excerpt): ?>
                    <div class="restaurant-excerpt">
                        <?php echo wp_kses_post($excerpt); ?>
                    </div>
                <?php endif; ?>
                <h2>HOURS</h2>
                <?php 
                $hours = get_field('restaurant_hours');
                if($hours): ?>
                    <div class="hours-details">
                        <div class="days"><?php echo esc_html($hours['days']); ?></div>
                        <div class="times"><?php echo esc_html($hours['times']); ?></div>
                    </div>
                <?php endif; ?>
                <?php 
                $additional_info = get_field('restaurant_additional_info');
                if($additional_info): ?>
                    <div class="additional-info">
                        <?php echo esc_html($additional_info); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <!-- Menu Section -->
    <section class="restaurant-menu">
        <div class="container">
            <h2>MENUS</h2>
            <?php 
            $menu_pdf = get_field('restaurant_menu_pdf');
            if($menu_pdf): ?>
                <div class="menu-download">
                    <a href="<?php echo esc_url($menu_pdf['url']); ?>" class="btn-menu" target="_blank">
                        Restaurant Menu
                    </a>
                    <?php 
                    $menu_description = get_field('restaurant_menu_description');
                    if($menu_description): ?>
                        <div class="menu-description">
                            <?php echo wp_kses_post($menu_description); ?>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Contact Section -->
    <?php 
    $phone = get_field('restaurant_phone');
    if($phone): ?>
        <section class="restaurant-contact">
            <div class="container">
                <div class="contact-content">
                    <p class="contact-text">Treat a loved one to a one of a kind experience at <?php the_title(); ?>.</p>
                    <div class="contact-actions">
                        <a href="tel:<?php echo esc_attr($phone); ?>" class="phone-number"><?php echo esc_html($phone); ?></a>
                        <a href="tel:<?php echo esc_attr($phone); ?>" class="btn-gift-vouchers">GET A RESERVATION</a>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
</div>

<?php get_footer(); ?> 