<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php 
        if (is_front_page()) {
            bloginfo('name');
        } else {
            wp_title('', true, 'right'); 
            echo ' — '; 
            bloginfo('name');
        }
    ?></title>
    <?php wp_head(); ?>
    <!-- Add Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header id="site-header">
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="container">
            <div class="top-bar-left">
                <a href="#" class="location-link-text">LOCATION</a>
                <a href="#" class="location-link">
                    <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M12.2848 18.9935C12.1567 19.0875 12.0373 19.1728 11.9282 19.2493C11.8118 19.1721 11.6827 19.0833 11.5427 18.9832C10.8826 18.5109 10.0265 17.8176 9.18338 16.9529C7.45402 15.1792 6 12.9151 6 10.5C6 7.18629 8.68629 4.5 12 4.5C15.3137 4.5 18 7.18629 18 10.5C18 12.8892 16.4819 15.1468 14.6893 16.9393C13.8196 17.8091 12.9444 18.5099 12.2848 18.9935ZM19.5 10.5C19.5 16.5 12 21 12 21C11.625 21 4.5 16.5 4.5 10.5C4.5 6.35786 7.85786 3 12 3C16.1421 3 19.5 6.35786 19.5 10.5ZM13.5 10.5C13.5 11.3284 12.8284 12 12 12C11.1716 12 10.5 11.3284 10.5 10.5C10.5 9.67157 11.1716 9 12 9C12.8284 9 13.5 9.67157 13.5 10.5ZM15 10.5C15 12.1569 13.6569 13.5 12 13.5C10.3431 13.5 9 12.1569 9 10.5C9 8.84315 10.3431 7.5 12 7.5C13.6569 7.5 15 8.84315 15 10.5Z"></path></g></svg>
                </a>
                <!-- Desktop Language Selector -->
            </div>
            <div class="top-bar-right">
            <nav class="lang-selector lang-desktop">
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'language',
                        'menu_class' => 'language-menu',
                        'container' => false,
                        'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
                    ]);
                    ?>
                </nav>
                <a href="/contact" class="gift-card-btn">CONTACT</a>
                <a href="<?php echo esc_url(home_url('/book')); ?>" class="book-now-btn">BOOK NOW</a>
            </div>
        </div>
    </div>

    <!-- Main Header -->
    <div class="main-header">
        <div class="container">
            <!-- Mobile Menu Button -->
            <button class="mobile-menu-toggle" aria-label="Toggle Menu">
                <span></span>
                <span></span>
            </button>

            <!-- Logo -->
            <div class="logo-container">
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/global/new-logo.webp" alt="<?php bloginfo('name'); ?>" class="site-logo">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/global/new-logo-dark.webp" alt="<?php bloginfo('name'); ?>" class="site-logo-dark">
                </a>
            </div>

            <!-- Desktop Navigation -->
            <nav class="main-nav">
                <?php
                wp_nav_menu([
                    'theme_location' => 'primary',
                    'menu_class' => 'primary-menu',
                    'container' => false,
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
                ]);
                ?>
            </nav>

            <!-- Language Selector Mobile -->
            <nav class="lang-selector lang-mobile">
                <?php
                wp_nav_menu([
                    'theme_location' => 'language',
                    'menu_class' => 'language-menu',
                    'container' => false,
                    'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
                ]);
                ?>
            </nav>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div class="mobile-menu">
        <nav class="mobile-nav">
            <?php
            wp_nav_menu([
                'theme_location' => 'primary',
                'menu_class' => 'mobile-menu-items',
                'container' => false,
                'items_wrap' => '<ul id="mobile-menu" class="%2$s">%3$s</ul>'
            ]);
            ?>
        </nav>
        <div class="mobile-menu-footer">
            <div class="mobile-buttons">
                <a href="<?php echo esc_url(home_url('/book')); ?>" class="book-now-btn">BOOK NOW</a>
            </div>
        </div>
    </div>

    <!-- Mobile Sticky Buttons -->
    <div class="mobile-sticky-buttons">
        <div class="button-wrapper">
            <a href="#" class="sticky-location">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path fill-rule="evenodd" clip-rule="evenodd" d="M12.2848 18.9935C12.1567 19.0875 12.0373 19.1728 11.9282 19.2493C11.8118 19.1721 11.6827 19.0833 11.5427 18.9832C10.8826 18.5109 10.0265 17.8176 9.18338 16.9529C7.45402 15.1792 6 12.9151 6 10.5C6 7.18629 8.68629 4.5 12 4.5C15.3137 4.5 18 7.18629 18 10.5C18 12.8892 16.4819 15.1468 14.6893 16.9393C13.8196 17.8091 12.9444 18.5099 12.2848 18.9935ZM19.5 10.5C19.5 16.5 12 21 12 21C11.625 21 4.5 16.5 4.5 10.5C4.5 6.35786 7.85786 3 12 3C16.1421 3 19.5 6.35786 19.5 10.5ZM13.5 10.5C13.5 11.3284 12.8284 12 12 12C11.1716 12 10.5 11.3284 10.5 10.5C10.5 9.67157 11.1716 9 12 9C12.8284 9 13.5 9.67157 13.5 10.5ZM15 10.5C15 12.1569 13.6569 13.5 12 13.5C10.3431 13.5 9 12.1569 9 10.5C9 8.84315 10.3431 7.5 12 7.5C13.6569 7.5 15 8.84315 15 10.5Z"></path></g></svg>
            </a>
            <a href="/gallery" class="sticky-gift-card">GALLERY</a>
            <a href="/book" class="sticky-book-now">BOOK NOW</a>
        </div>
    </div>

    <!-- Location Popup -->
    <div class="location-popup">
        <div class="location-popup-content">
            <button class="close-popup desktop-close" aria-label="Close location popup">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 6L6 18M6 6L18 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
            <div class="location-info">
                <div class="map-container">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3634.97211999861!2d19.4840542!3d40.41520010000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1345321ae5dbd6d7%3A0xc424b2518a744543!2sMaritim%20Marina%20Bay%20Resort%20%26%20Casino!5e1!3m2!1sen!2s!4v1742742196171!5m2!1sen!2s" 
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
            <button class="mobile-close-btn">CLOSE</button>
        </div>
    </div>
</header>
