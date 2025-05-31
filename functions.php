<?php
// Enqueue styles and scripts
function marina_bay_scripts() {
    // Enqueue styles with file modification time for versioning
    $stylesheet_path = get_stylesheet_directory() . '/style.css';
    $stylesheet_uri = get_stylesheet_uri();
    $version = file_exists($stylesheet_path) ? filemtime($stylesheet_path) : '1.0.0';

    wp_enqueue_style('marina-bay-style', $stylesheet_uri, array(), $version);
    
    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap', array(), null);

    // Font Awesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css', array(), '6.5.1');

    // Swiper CSS
    wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0.0');

    // Choices.js CSS from CDN (v9.0.1)
    wp_enqueue_style(
        'choices-css',
        'https://cdn.jsdelivr.net/npm/choices.js@9.0.1/public/assets/styles/choices.min.css',
        array(),
        '9.0.1'
    );

    // Flatpickr CSS from CDN
    wp_enqueue_style(
        'flatpickr-css',
        'https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css',
        array(),
        '4.6.13' // Current Flatpickr version, adjust if needed
    );

    // Enqueue jQuery
    wp_enqueue_script('jquery');

    // Swiper JS
    wp_enqueue_script(
        'swiper-js',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
        array(),
        '11.0.0',
        true
    );

    // Choices.js JS from CDN (v9.0.1)
    wp_enqueue_script(
        'choices-js',
        'https://cdn.jsdelivr.net/npm/choices.js@9.0.1/public/assets/scripts/choices.min.js',
        array(), 
        '9.0.1',
        true      // Load in footer
    );

    // Flatpickr JS from CDN
    wp_enqueue_script(
        'flatpickr-js',
        'https://cdn.jsdelivr.net/npm/flatpickr', // jsDelivr serves the minified version by default
        array(), 
        '4.6.13', // Current Flatpickr version, adjust if needed
        true      // Load in footer
    );

    // Enqueue custom script for main site functionality
    wp_enqueue_script(
        'marina-bay-main',
        get_template_directory_uri() . '/js/main.js',
        array('jquery', 'swiper-js'), 
        filemtime(get_template_directory() . '/js/main.js'),
        true
    );
}
add_action('wp_enqueue_scripts', 'marina_bay_scripts');


// Theme setup
function marina_bay_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support('post-thumbnails');

    // Register Navigation Menus
    register_nav_menus([
        'primary' => __('Primary Menu', 'marina-bay'),
        'language' => __('Language Menu', 'marina-bay'),
    ]);

    // Register Navigation Menus
    register_nav_menus(array(
        'mobile' => esc_html__('Mobile Menu', 'marina-bay'),
    ));

    // Add support for core custom logo
    add_theme_support('custom-logo', array(
        'height'      => 250,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
    ));
}
add_action('after_setup_theme', 'marina_bay_setup');

// Register Custom Post Type for Platform Ratings
function marina_bay_register_platform_ratings() {
    register_post_type('platform_ratings', array(
        'labels' => array(
            'name' => 'Platform Ratings',
            'singular_name' => 'Platform Rating',
        ),
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'supports' => array('title'),
    ));
}
add_action('init', 'marina_bay_register_platform_ratings');

// Register Custom Fields for Platform Ratings
function marina_bay_register_platform_rating_fields() {
    if (function_exists('acf_add_local_field_group')) {
        acf_add_local_field_group(array(
            'key' => 'group_platform_ratings',
            'title' => 'Platform Ratings',
            'fields' => array(
                array(
                    'key' => 'field_main_rating',
                    'label' => 'Main Rating',
                    'name' => 'main_rating',
                    'type' => 'number',
                    'instructions' => 'Enter the main rating (e.g., 4.7)',
                    'required' => 1,
                    'step' => 0.1,
                    'min' => 0,
                    'max' => 5,
                ),
                array(
                    'key' => 'field_total_reviews',
                    'label' => 'Total Reviews',
                    'name' => 'total_reviews',
                    'type' => 'number',
                    'instructions' => 'Enter the total number of reviews',
                    'required' => 1,
                    'min' => 0,
                ),
                array(
                    'key' => 'field_google_rating',
                    'label' => 'Google Rating',
                    'name' => 'google_rating',
                    'type' => 'number',
                    'instructions' => 'Enter the Google rating (out of 5)',
                    'required' => 1,
                    'step' => 0.1,
                    'min' => 0,
                    'max' => 5,
                ),
                array(
                    'key' => 'field_google_link',
                    'label' => 'Google Reviews Link',
                    'name' => 'google_reviews_link',
                    'type' => 'url',
                    'instructions' => 'Enter the URL to the Google reviews page',
                    'required' => 0,
                ),
                array(
                    'key' => 'field_google_reviews_count',
                    'label' => 'Google Reviews Count',
                    'name' => 'google_reviews_count',
                    'type' => 'number',
                    'instructions' => 'Enter the total number of Google reviews',
                    'required' => 1,
                    'min' => 0,
                ),
                array(
                    'key' => 'field_tripadvisor_rating',
                    'label' => 'TripAdvisor Rating',
                    'name' => 'tripadvisor_rating',
                    'type' => 'number',
                    'instructions' => 'Enter the TripAdvisor rating (out of 5)',
                    'required' => 1,
                    'step' => 0.1,
                    'min' => 0,
                    'max' => 5,
                ),
                array(
                    'key' => 'field_tripadvisor_link',
                    'label' => 'TripAdvisor Reviews Link',
                    'name' => 'tripadvisor_reviews_link',
                    'type' => 'url',
                    'instructions' => 'Enter the URL to the TripAdvisor reviews page',
                    'required' => 0,
                ),
                array(
                    'key' => 'field_tripadvisor_reviews_count',
                    'label' => 'TripAdvisor Reviews Count',
                    'name' => 'tripadvisor_reviews_count',
                    'type' => 'number',
                    'instructions' => 'Enter the total number of TripAdvisor reviews',
                    'required' => 1,
                    'min' => 0,
                ),
                array(
                    'key' => 'field_booking_rating',
                    'label' => 'Booking.com Rating',
                    'name' => 'booking_rating',
                    'type' => 'number',
                    'instructions' => 'Enter the Booking.com rating (out of 10)',
                    'required' => 1,
                    'step' => 0.1,
                    'min' => 0,
                    'max' => 10,
                ),
                array(
                    'key' => 'field_booking_link',
                    'label' => 'Booking.com Reviews Link',
                    'name' => 'booking_reviews_link',
                    'type' => 'url',
                    'instructions' => 'Enter the URL to the Booking.com reviews page',
                    'required' => 0,
                ),
                array(
                    'key' => 'field_booking_reviews_count',
                    'label' => 'Booking.com Reviews Count',
                    'name' => 'booking_reviews_count',
                    'type' => 'number',
                    'instructions' => 'Enter the total number of Booking.com reviews',
                    'required' => 1,
                    'min' => 0,
                ),
                array(
                    'key' => 'field_expedia_rating',
                    'label' => 'Expedia Rating',
                    'name' => 'expedia_rating',
                    'type' => 'number',
                    'instructions' => 'Enter the Expedia rating (out of 10)',
                    'required' => 1,
                    'step' => 0.1,
                    'min' => 0,
                    'max' => 10,
                ),
                array(
                    'key' => 'field_expedia_link',
                    'label' => 'Expedia Reviews Link',
                    'name' => 'expedia_reviews_link',
                    'type' => 'url',
                    'instructions' => 'Enter the URL to the Expedia reviews page',
                    'required' => 0,
                ),
                array(
                    'key' => 'field_expedia_reviews_count',
                    'label' => 'Expedia Reviews Count',
                    'name' => 'expedia_reviews_count',
                    'type' => 'number',
                    'instructions' => 'Enter the total number of Expedia reviews',
                    'required' => 1,
                    'min' => 0,
                ),
                array(
                    'key' => 'field_check_rates_text',
                    'label' => 'Check Rates Text',
                    'name' => 'check_rates_text',
                    'type' => 'text',
                    'instructions' => 'Enter the text to display in the check rates section',
                    'required' => 0,
                    'default_value' => 'Experience Luxury',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'platform_ratings',
                    ),
                ),
            ),
        ));
    }
}
add_action('acf/init', 'marina_bay_register_platform_rating_fields');

// Function to get platform ratings
function marina_bay_get_platform_ratings() {
    $args = array(
        'post_type' => 'platform_ratings',
        'posts_per_page' => 1,
    );
    
    $query = new WP_Query($args);
    
    if ($query->have_posts()) {
        $query->the_post();
        return array(
            'main_rating' => get_field('main_rating'),
            'total_reviews' => get_field('total_reviews'),
            'google_rating' => get_field('google_rating'),
            'google_reviews_count' => get_field('google_reviews_count'),
            'google_reviews_link' => get_field('google_reviews_link'),
            'tripadvisor_rating' => get_field('tripadvisor_rating'),
            'tripadvisor_reviews_count' => get_field('tripadvisor_reviews_count'),
            'tripadvisor_reviews_link' => get_field('tripadvisor_reviews_link'),
            'booking_rating' => get_field('booking_rating'),
            'booking_reviews_count' => get_field('booking_reviews_count'),
            'booking_reviews_link' => get_field('booking_reviews_link'),
            'expedia_rating' => get_field('expedia_rating'),
            'expedia_reviews_count' => get_field('expedia_reviews_count'),
            'expedia_reviews_link' => get_field('expedia_reviews_link'),
        );
    }
    
    return false;
}

// Register Custom Post Type for Offers
function marina_bay_register_offers() {
    register_post_type('offers', array(
        'labels' => array(
            'name' => 'Offers',
            'singular_name' => 'Offer',
        ),
        'public' => true,
        'has_archive' => true,
        'show_in_menu' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-tag',
    ));
}
add_action('init', 'marina_bay_register_offers');

// Register Custom Fields for Offers
function marina_bay_register_offer_fields() {
    if (function_exists('acf_add_local_field_group')) {
        acf_add_local_field_group(array(
            'key' => 'group_offers',
            'title' => 'Offer Details',
            'fields' => array(
                array(
                    'key' => 'field_offer_subtitle',
                    'label' => 'Offer Subtitle',
                    'name' => 'offer_subtitle',
                    'type' => 'text',
                    'required' => 0,
                ),
                array(
                    'key' => 'field_offer_featured',
                    'label' => 'Featured Offer',
                    'name' => 'offer_featured',
                    'type' => 'true_false',
                    'ui' => 1,
                ),
                array(
                    'key' => 'field_offer_main',
                    'label' => 'Main Offer',
                    'name' => 'offer_main',
                    'type' => 'true_false',
                    'ui' => 1,
                    'instructions' => 'Enable this to display this offer in the main featured section on the offers page',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'offers',
                    ),
                ),
            ),
        ));
    }
}
add_action('acf/init', 'marina_bay_register_offer_fields');

// Register ACF Fields for Offers Page
function marina_bay_register_offers_page_fields() {
    if (function_exists('acf_add_local_field_group')) {
        acf_add_local_field_group(array(
            'key' => 'group_offers_page',
            'title' => 'Offers Page Settings',
            'fields' => array(
                array(
                    'key' => 'field_featured_offer',
                    'label' => 'Featured Offer',
                    'name' => 'featured_offer',
                    'type' => 'post_object',
                    'instructions' => 'Select the offer to display in the featured section',
                    'required' => 0,
                    'post_type' => array(
                        'offers' => 'offers'
                    ),
                    'allow_null' => 1,
                    'multiple' => 0,
                    'return_format' => 'id',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'page_type',
                        'operator' => '==',
                        'value' => 'front_page',
                    ),
                ),
                array(
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'page-offers.php',
                    ),
                ),
            ),
            'menu_order' => 0,
            'position' => 'normal',
            'style' => 'default',
            'label_placement' => 'top',
            'instruction_placement' => 'label',
            'hide_on_screen' => '',
            'active' => true,
            'description' => '',
            'show_in_rest' => 0,
        ));
    }
}
add_action('acf/init', 'marina_bay_register_offers_page_fields');

// Function to get featured offers
function marina_bay_get_featured_offers() {
    $args = array(
        'post_type' => 'offers',
        'posts_per_page' => -1,
        'meta_query' => array(
            array(
                'key' => 'offer_featured',
                'value' => '1',
                'compare' => '=',
            ),
        ),
    );
    
    return new WP_Query($args);
}

/**
 * Register Room Custom Post Type
 */
function marina_bay_register_room_post_type() {
    $labels = array(
        'name'               => 'Rooms & Suites',
        'singular_name'      => 'Room',
        'menu_name'          => 'Rooms & Suites',
        'add_new'            => 'Add New Room',
        'add_new_item'      => 'Add New Room',
        'edit_item'         => 'Edit Room',
        'new_item'          => 'New Room',
        'view_item'         => 'View Room',
        'search_items'      => 'Search Rooms',
        'not_found'         => 'No rooms found',
        'not_found_in_trash'=> 'No rooms found in Trash',
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'publicly_queryable'  => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-building',
        'hierarchical'       => false,
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
        'rewrite'           => array('slug' => 'rooms'),
        'capability_type'    => 'post',
    );

    register_post_type('room', $args);
}
add_action('init', 'marina_bay_register_room_post_type');

/**
 * Register ACF Fields for Rooms
 */
function marina_bay_register_room_fields() {
    if (function_exists('acf_add_local_field_group')) {
        acf_add_local_field_group(array(
            'key' => 'group_room_details',
            'title' => 'Room Details',
            'fields' => array(
                // Room Gallery
                array(
                    'key' => 'field_room_gallery',
                    'label' => 'Room Gallery',
                    'name' => 'room_gallery',
                    'type' => 'gallery',
                    'instructions' => 'Upload images for the room gallery (recommended size: 1920x1080px)',
                    'required' => 1,
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                    'insert' => 'append',
                    'library' => 'all',
                    'min_width' => '',
                    'min_height' => '',
                    'min_size' => '',
                    'max_width' => '',
                    'max_height' => '',
                    'max_size' => '',
                    'mime_types' => 'jpg,jpeg,png,webp',
                ),
                
                // Room Details
                array(
                    'key' => 'field_room_beds',
                    'label' => 'Beds',
                    'name' => 'room_beds',
                    'type' => 'text',
                    'instructions' => 'e.g., One king bed, One crib',
                    'required' => 0,
                ),
                array(
                    'key' => 'field_room_occupancy',
                    'label' => 'Occupancy',
                    'name' => 'room_occupancy',
                    'type' => 'text',
                    'instructions' => 'e.g., 2 adults, or 2 adults and 1 infant',
                    'required' => 0,
                ),
                array(
                    'key' => 'field_room_size',
                    'label' => 'Size',
                    'name' => 'room_size',
                    'type' => 'text',
                    'instructions' => 'e.g., 40 m2 (430 sq.ft.), Floors 1-4',
                    'required' => 0,
                ),
                array(
                    'key' => 'field_room_bathroom',
                    'label' => 'Bathroom',
                    'name' => 'room_bathroom',
                    'type' => 'text',
                    'instructions' => 'e.g., One full marble bathroom with deep soaking tub and separate shower',
                    'required' => 0,
                ),
                array(
                    'key' => 'field_room_views',
                    'label' => 'Views',
                    'name' => 'room_views',
                    'type' => 'text',
                    'instructions' => 'e.g., Pine Grove',
                    'required' => 0,
                ),
                array(
                    'key' => 'field_room_unique_features',
                    'label' => 'Unique Features',
                    'name' => 'room_unique_features',
                    'type' => 'text',
                    'instructions' => 'e.g., Furnished private balcony',
                    'required' => 0,
                ),
                
                // Space & Desk
                array(
                    'key' => 'field_space_desk',
                    'label' => 'Space & Desk',
                    'name' => 'space_desk',
                    'type' => 'repeater',
                    'instructions' => 'Add space & desk amenities',
                    'required' => 0,
                    'layout' => 'table',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_space_desk_item',
                            'label' => 'Item',
                            'name' => 'space_desk_item',
                            'type' => 'select',
                            'required' => 0,
                            'choices' => array(
                                'balcony' => 'Balcony',
                                'wardrobe-closet' => 'Wardrobe or closet',
                                'desk' => 'Desk',
                                'minibar' => 'Minibar',
                                'coffee-machine' => 'Coffee machine',
                                'tea-coffee-maker' => 'Tea/Coffee maker',
                                'ironing' => 'Ironing facilities',
                                'cleaning-products' => 'Cleaning products',
                            ),
                            'allow_null' => 0,
                            'multiple' => 0,
                            'ui' => 1,
                            'return_format' => 'value'
                        ),
                    ),
                ),

                // Bathroom
                array(
                    'key' => 'field_bathroom',
                    'label' => 'Bathroom',
                    'name' => 'bathroom',
                    'type' => 'repeater',
                    'instructions' => 'Add bathroom amenities',
                    'required' => 0,
                    'layout' => 'table',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_bathroom_item',
                            'label' => 'Item',
                            'name' => 'bathroom_item',
                            'type' => 'select',
                            'required' => 0,
                            'choices' => array(
                                'bathrobe' => 'Bathrobe',
                                'bidet' => 'Bidet',
                                'toilet' => 'Toilet',
                                'bath-shower' => 'Bath or shower',
                                'slippers' => 'Slippers',
                                'hairdryer' => 'Hairdryer',
                                'additional-toilet' => 'Additional toilet',
                                'toilet-paper' => 'Toilet paper',
                            ),
                            'allow_null' => 0,
                            'multiple' => 0,
                            'ui' => 1,
                            'return_format' => 'value'
                        ),
                    ),
                ),

                // Home Safety
                array(
                    'key' => 'field_home_safety',
                    'label' => 'Home Safety',
                    'name' => 'home_safety',
                    'type' => 'repeater',
                    'instructions' => 'Add home safety features',
                    'required' => 0,
                    'layout' => 'table',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_home_safety_item',
                            'label' => 'Item',
                            'name' => 'home_safety_item',
                            'type' => 'select',
                            'required' => 0,
                            'choices' => array(
                                'safety-box' => 'Safety deposit box',
                                'first-aid' => 'First Aid Kit',
                                'emergency-exit' => 'Emergency Exit',
                                'fire-protection' => 'Fire protection system',
                                'security-24h' => '24h security',
                            ),
                            'allow_null' => 0,
                            'multiple' => 0,
                            'ui' => 1,
                            'return_format' => 'value'
                        ),
                    ),
                ),

                // Entertainment
                array(
                    'key' => 'field_entertainment',
                    'label' => 'Entertainment',
                    'name' => 'entertainment',
                    'type' => 'repeater',
                    'instructions' => 'Add entertainment features',
                    'required' => 0,
                    'layout' => 'table',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_entertainment_item',
                            'label' => 'Item',
                            'name' => 'entertainment_item',
                            'type' => 'select',
                            'required' => 0,
                            'choices' => array(
                                'casino-ticket' => '20€ Casino Ticket',
                                'flat-screen-tv' => 'Flat Screen TV',
                                'wifi' => 'WIFI',
                            ),
                            'allow_null' => 0,
                            'multiple' => 0,
                            'ui' => 1,
                            'return_format' => 'value'
                        ),
                    ),
                ),

                // Service
                array(
                    'key' => 'field_service_section', // Renamed key to avoid conflicts
                    'label' => 'Service',
                    'name' => 'service_section',    // Renamed name to avoid conflicts
                    'type' => 'repeater',
                    'instructions' => 'Add service features',
                    'required' => 0,
                    'layout' => 'table',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_service_item',
                            'label' => 'Service',
                            'name' => 'service_item',
                            'type' => 'select',
                            'required' => 0,
                            'choices' => array(
                                'wake-up' => 'Wake up service',
                                'room-service' => 'Room service',
                                'housekeeping' => 'Housekeeping',
                            ),
                            'allow_null' => 0,
                            'multiple' => 0,
                            'ui' => 1,
                            'return_format' => 'value'
                        ),
                    ),
                ),

                // Heating & Cooling
                array(
                    'key' => 'field_heating_cooling',
                    'label' => 'Heating & Cooling',
                    'name' => 'heating_cooling',
                    'type' => 'repeater',
                    'instructions' => 'Add heating and cooling features',
                    'required' => 0,
                    'layout' => 'table',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_heating_cooling_item',
                            'label' => 'Item',
                            'name' => 'heating_cooling_item',
                            'type' => 'select',
                            'required' => 0,
                            'choices' => array(
                                'air-conditioning' => 'Air conditioning',
                                'heating' => 'Heating',
                            ),
                            'allow_null' => 0,
                            'multiple' => 0,
                            'ui' => 1,
                            'return_format' => 'value'
                        ),
                    ),
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'room',
                    ),
                ),
            ),
        ));
    }
}
add_action('acf/init', 'marina_bay_register_room_fields');

/**
 * Flush rewrite rules on theme activation
 */
function marina_bay_theme_activation() {
    marina_bay_register_room_post_type();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'marina_bay_theme_activation');

/**
 * Register Restaurant Custom Post Type
 */
function marina_bay_register_restaurant_post_type() {
    $labels = array(
        'name'               => 'Restaurants',
        'singular_name'      => 'Restaurant',
        'menu_name'          => 'Restaurants',
        'add_new'            => 'Add New Restaurant',
        'add_new_item'      => 'Add New Restaurant',
        'edit_item'         => 'Edit Restaurant',
        'new_item'          => 'New Restaurant',
        'view_item'         => 'View Restaurant',
        'search_items'      => 'Search Restaurants',
        'not_found'         => 'No restaurants found',
        'not_found_in_trash'=> 'No restaurants found in Trash',
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'publicly_queryable'  => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-food',
        'hierarchical'       => false,
        'supports'           => array('title', 'editor', 'thumbnail'),
        'rewrite'           => array('slug' => 'restaurants'),
        'capability_type'    => 'post',
    );

    register_post_type('restaurant', $args);
}
add_action('init', 'marina_bay_register_restaurant_post_type');

/**
 * Register ACF Fields for Restaurants
 */
function marina_bay_register_restaurant_fields() {
    if (function_exists('acf_add_local_field_group')) {
        acf_add_local_field_group(array(
            'key' => 'group_restaurant_details',
            'title' => 'Restaurant Details',
            'fields' => array(
                // Hero Image
                array(
                    'key' => 'field_restaurant_hero_image',
                    'label' => 'Hero Image',
                    'name' => 'restaurant_hero_image',
                    'type' => 'image',
                    'instructions' => 'Upload the hero image for the restaurant (recommended size: 1920x1080px)',
                    'required' => 1,
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                    'library' => 'all',
                ),

                // Restaurant Excerpt
                array(
                    'key' => 'field_restaurant_excerpt',
                    'label' => 'Restaurant Excerpt',
                    'name' => 'restaurant_excerpt',
                    'type' => 'textarea',
                    'instructions' => 'Add a short description that appears below the hero image',
                    'required' => 0,
                    'rows' => 3,
                ),
                
                // Opening Hours
                array(
                    'key' => 'field_restaurant_hours',
                    'label' => 'Opening Hours',
                    'name' => 'restaurant_hours',
                    'type' => 'group',
                    'layout' => 'block',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_restaurant_days',
                            'label' => 'Days',
                            'name' => 'days',
                            'type' => 'text',
                            'instructions' => 'e.g., TUESDAY – SATURDAY',
                            'required' => 1,
                        ),
                        array(
                            'key' => 'field_restaurant_times',
                            'label' => 'Times',
                            'name' => 'times',
                            'type' => 'text',
                            'instructions' => 'e.g., 7:00 PM – 11:00 PM',
                            'required' => 1,
                        ),
                    ),
                ),

                // Menu PDF
                array(
                    'key' => 'field_restaurant_menu_pdf',
                    'label' => 'Menu PDF',
                    'name' => 'restaurant_menu_pdf',
                    'type' => 'file',
                    'instructions' => 'Upload the restaurant menu in PDF format',
                    'required' => 0,
                    'return_format' => 'array',
                    'library' => 'all',
                    'mime_types' => 'pdf',
                ),

                // Menu Description
                array(
                    'key' => 'field_restaurant_menu_description',
                    'label' => 'Menu Description',
                    'name' => 'restaurant_menu_description',
                    'type' => 'textarea',
                    'instructions' => 'Add a description text that appears below the menu button',
                    'required' => 0,
                    'rows' => 3,
                ),

                // Additional Information
                array(
                    'key' => 'field_restaurant_additional_info',
                    'label' => 'Additional Information',
                    'name' => 'restaurant_additional_info',
                    'type' => 'text',
                    'instructions' => 'Any additional information about the restaurant (e.g., age restrictions)',
                    'required' => 0,
                ),

                // Phone Number
                array(
                    'key' => 'field_restaurant_phone',
                    'label' => 'Phone Number',
                    'name' => 'restaurant_phone',
                    'type' => 'text',
                    'instructions' => 'Restaurant phone number for reservations',
                    'required' => 0,
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'restaurant',
                    ),
                ),
            ),
        ));
    }
}
add_action('acf/init', 'marina_bay_register_restaurant_fields');

// Add Single Offer Details ACF Field Group
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
    'key' => 'group_single_offer_details',
    'title' => 'Single Offer Details',
    'fields' => array(
        array(
            'key' => 'field_offer_valid_dates',
            'label' => 'Valid Dates',
            'name' => 'offer_valid_dates',
            'type' => 'text',
            'instructions' => 'Enter the date range for which this offer is valid (e.g., MAR 26 2025 — APR 30 2025)',
            'required' => 1,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
        ),
        array(
            'key' => 'field_minimum_stay',
            'label' => 'Minimum Stay',
            'name' => 'minimum_stay',
            'type' => 'number',
            'instructions' => 'Enter the minimum number of nights required for this offer',
            'required' => 1,
            'min' => 1,
            'default_value' => 1,
            'wrapper' => array(
                'width' => '50',
                'class' => '',
                'id' => '',
            ),
        ),
        array(
            'key' => 'field_maximum_stay',
            'label' => 'Maximum Stay',
            'name' => 'maximum_stay',
            'type' => 'number',
            'instructions' => 'Enter the maximum number of nights allowed for this offer',
            'required' => 1,
            'min' => 1,
            'default_value' => 10,
            'wrapper' => array(
                'width' => '50',
                'class' => '',
                'id' => '',
            ),
        ),
        array(
            'key' => 'field_offer_restrictions',
            'label' => 'Offer Restrictions',
            'name' => 'offer_restrictions',
            'type' => 'text',
            'instructions' => 'Enter any restrictions or conditions for this offer',
            'default_value' => 'Offers are subject to availability at time of booking. Blackout dates and other restrictions may apply.',
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'offers',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
    'show_in_rest' => false,
));

endif;

// Add Included Items field to Single Offer Details
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
    'key' => 'group_offer_included_items',
    'title' => 'Included Items',
    'fields' => array(
        array(
            'key' => 'field_offer_included_items',
            'label' => 'Included Items',
            'name' => 'offer_included_items',
            'type' => 'repeater',
            'instructions' => 'Add items that are included in this offer',
            'required' => 0,
            'min' => 0,
            'max' => 0,
            'layout' => 'table',
            'button_label' => 'Add Item',
            'sub_fields' => array(
                array(
                    'key' => 'field_included_item_text',
                    'label' => 'Item Description',
                    'name' => 'item_text',
                    'type' => 'text',
                    'instructions' => 'Enter the description of what is included',
                    'required' => 1,
                ),
            ),
        ),
    ),
    'location' => array(
        array(
            array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'offers',
            ),
        ),
    ),
    'menu_order' => 1,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => true,
    'description' => '',
));

endif;

/**
 * Register Custom Post Type and Taxonomies for Jobs
 */
function marina_bay_register_job_post_type() {
    // Register Job Post Type
    $labels = array(
        'name'               => 'Jobs',
        'singular_name'      => 'Job',
        'menu_name'          => 'Jobs',
        'add_new'           => 'Add New Job',
        'add_new_item'      => 'Add New Job',
        'edit_item'         => 'Edit Job',
        'new_item'          => 'New Job',
        'view_item'         => 'View Job',
        'search_items'      => 'Search Jobs',
        'not_found'         => 'No jobs found',
        'not_found_in_trash'=> 'No jobs found in Trash',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'jobs'),
        'capability_type'   => 'post',
        'has_archive'       => true,
        'hierarchical'      => false,
        'menu_position'     => 5,
        'menu_icon'         => 'dashicons-businessman',
        'supports'          => array('title', 'page-attributes'),
        'show_in_rest'      => true, // Enable Gutenberg editor
    );

    register_post_type('job', $args);

    // Register Job Category Taxonomy
    $category_labels = array(
        'name'              => 'Job Categories',
        'singular_name'     => 'Job Category',
        'search_items'      => 'Search Job Categories',
        'all_items'         => 'All Job Categories',
        'parent_item'       => 'Parent Job Category',
        'parent_item_colon' => 'Parent Job Category:',
        'edit_item'         => 'Edit Job Category',
        'update_item'       => 'Update Job Category',
        'add_new_item'      => 'Add New Job Category',
        'new_item_name'     => 'New Job Category Name',
        'menu_name'         => 'Categories',
    );

    register_taxonomy('job_category', 'job', array(
        'labels'            => $category_labels,
        'hierarchical'      => true,
        'show_ui'          => true,
        'show_admin_column' => true,
        'query_var'        => true,
        'rewrite'          => array('slug' => 'job-category'),
        'show_in_rest'     => true, // Enable Gutenberg editor support
    ));

    // Register Job Type Taxonomy
    $type_labels = array(
        'name'              => 'Job Types',
        'singular_name'     => 'Job Type',
        'search_items'      => 'Search Job Types',
        'all_items'         => 'All Job Types',
        'parent_item'       => 'Parent Job Type',
        'parent_item_colon' => 'Parent Job Type:',
        'edit_item'         => 'Edit Job Type',
        'update_item'       => 'Update Job Type',
        'add_new_item'      => 'Add New Job Type',
        'new_item_name'     => 'New Job Type Name',
        'menu_name'         => 'Types',
    );

    register_taxonomy('job_type', 'job', array(
        'labels'            => $type_labels,
        'hierarchical'      => true,
        'show_ui'          => true,
        'show_admin_column' => true,
        'query_var'        => true,
        'rewrite'          => array('slug' => 'job-type'),
        'show_in_rest'     => true, // Enable Gutenberg editor support
    ));
}
add_action('init', 'marina_bay_register_job_post_type');

// Flush rewrite rules on theme activation
function marina_bay_rewrite_flush() {
    marina_bay_register_job_post_type();
    flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'marina_bay_rewrite_flush');

// Add default job types
function marina_bay_add_default_job_types() {
    wp_insert_term('Full Time', 'job_type');
    wp_insert_term('Part Time', 'job_type');
}
add_action('after_switch_theme', 'marina_bay_add_default_job_types');

// Add Job Custom Fields
function marina_bay_register_job_fields() {
    if (function_exists('acf_add_local_field_group')) {
        acf_add_local_field_group(array(
            'key' => 'group_job_details',
            'title' => 'Job Details',
            'fields' => array(
                array(
                    'key' => 'field_job_description',
                    'label' => 'Job Description',
                    'name' => 'job_description',
                    'type' => 'wysiwyg',
                    'required' => 1,
                    'tabs' => 'visual',
                    'toolbar' => 'basic',
                    'media_upload' => 0,
                    'delay' => 0,
                    'instructions' => 'Use markdown formatting for text styling: **bold**, *italic*, - bullets, 1. numbered lists, ### headings',
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'job',
                    ),
                ),
            ),
            'style' => 'seamless',
        ));
    }
}
add_action('acf/init', 'marina_bay_register_job_fields');

// Add support for markdown in job description
function marina_bay_job_description_content($content) {
    if (is_singular('job')) {
        // Convert markdown to HTML
        if (function_exists('get_field')) {
            $job_description = get_field('job_description');
            if ($job_description) {
                return wpautop($job_description);
            }
        }
    }
    return $content;
}
add_filter('the_content', 'marina_bay_job_description_content');

// Add custom styles for job description content
function marina_bay_job_description_styles() {
    if (is_singular('job')) {
        ?>
        <style>
            .job-description {
                line-height: 1.6;
                margin-bottom: 2em;
            }
            .job-description p {
                margin-bottom: 1em;
            }
            .job-description ul,
            .job-description ol {
                margin-left: 2em;
                margin-bottom: 1em;
            }
            .job-description strong {
                font-weight: 600;
            }
            .job-description h3 {
                font-size: 1.2em;
                margin: 1.5em 0 0.5em;
                font-weight: 600;
            }
        </style>
        <?php
    }
}
add_action('wp_head', 'marina_bay_job_description_styles');

/**
 * Modify the main query for job archive page to order by menu_order.
 */
function marina_bay_sort_jobs_by_order( $query ) {
    // Check if it's the main query, on the front end, and for the job post type archive
    if ( ! is_admin() && $query->is_main_query() && is_post_type_archive( 'job' ) ) {
        $query->set( 'orderby', 'menu_order' );
        $query->set( 'order', 'ASC' );
    }
}
add_action( 'pre_get_posts', 'marina_bay_sort_jobs_by_order' );

/**
 * Register Events Custom Post Type and Taxonomy
 */
function marina_bay_register_events_post_type() {
    // Register Event Category Taxonomy first
    $category_labels = array(
        'name'              => 'Event Categories',
        'singular_name'     => 'Event Category',
        'search_items'      => 'Search Categories',
        'all_items'         => 'All Categories',
        'parent_item'       => 'Parent Category',
        'parent_item_colon' => 'Parent Category:',
        'edit_item'         => 'Edit Category',
        'update_item'       => 'Update Category',
        'add_new_item'      => 'Add New Category',
        'new_item_name'     => 'New Category Name',
        'menu_name'         => 'Categories',
    );

    register_taxonomy('event_category', 'event', array(
        'labels'            => $category_labels,
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'event-category'),
        'show_in_rest'      => true,
    ));

    // Register Events Post Type
    $labels = array(
        'name'               => 'Events',
        'singular_name'      => 'Event',
        'menu_name'          => 'Events',
        'add_new'            => 'Add New Event',
        'add_new_item'       => 'Add New Event',
        'edit_item'          => 'Edit Event',
        'new_item'           => 'New Event',
        'view_item'          => 'View Event',
        'search_items'       => 'Search Events',
        'not_found'          => 'No events found',
        'not_found_in_trash' => 'No events found in Trash',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'events'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-calendar-alt',
        'supports'           => array('title', 'editor', 'thumbnail', 'page-attributes'),
        'show_in_rest'       => true,
        'taxonomies'         => array('event_category'),
    );

    register_post_type('event', $args);

    // Add default event category
    if (!term_exists('Event', 'event_category')) {
        wp_insert_term('Event', 'event_category');
    }
}
add_action('init', 'marina_bay_register_events_post_type');

/**
 * Register ACF Fields for Events
 */
function marina_bay_register_events_fields() {
    if (function_exists('acf_add_local_field_group')) {
        
        // Events Page Settings
        acf_add_local_field_group(array(
            'key' => 'group_events_page_settings',
            'title' => 'Events Page Settings',
            'fields' => array(
                array(
                    'key' => 'field_events_page_title',
                    'label' => 'Page Title',
                    'name' => 'events_page_title',
                    'type' => 'text',
                    'default_value' => 'Events',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_events_page_subtitle',
                    'label' => 'Page Subtitle',
                    'name' => 'events_page_subtitle',
                    'type' => 'text',
                    'default_value' => 'Expect the Unexpected',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_events_search_placeholder',
                    'label' => 'Search Placeholder Text',
                    'name' => 'events_search_placeholder',
                    'type' => 'text',
                    'default_value' => 'Search by keyword, artist or topic',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_events_category_label',
                    'label' => 'Category Dropdown Label',
                    'name' => 'events_category_label',
                    'type' => 'text',
                    'default_value' => 'Category',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_events_from_date_label',
                    'label' => 'From Date Label',
                    'name' => 'events_from_date_label',
                    'type' => 'text',
                    'default_value' => 'From Date',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_events_until_date_label',
                    'label' => 'Until Date Label',
                    'name' => 'events_until_date_label',
                    'type' => 'text',
                    'default_value' => 'Until',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_events_filter_button_text',
                    'label' => 'Filter Button Text',
                    'name' => 'events_filter_button_text',
                    'type' => 'text',
                    'default_value' => 'Filter Events',
                    'required' => 1,
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'page-events.php',
                    ),
                ),
                array(
                    array(
                        'param' => 'post_template',
                        'operator' => '==',
                        'value' => 'page-events.php',
                    ),
                ),
            ),
        ));

        // Individual Event Details
        acf_add_local_field_group(array(
            'key' => 'group_event_details',
            'title' => 'Event Details',
            'fields' => array(
                array(
                    'key' => 'field_event_subtitle',
                    'label' => 'Event Subtitle',
                    'name' => 'event_subtitle',
                    'type' => 'text',
                    'required' => 0,
                ),
                array(
                    'key' => 'field_event_featured',
                    'label' => 'Featured Event',
                    'name' => 'event_featured',
                    'type' => 'true_false',
                    'ui' => 1,
                    'default_value' => 0,
                ),
                array(
                    'key' => 'field_event_status',
                    'label' => 'Event Status',
                    'name' => 'event_status',
                    'type' => 'select',
                    'choices' => array(
                        'upcoming' => 'Upcoming',
                        'past' => 'Past',
                        'sold_out' => 'Sold Out',
                        'cancelled' => 'Cancelled',
                    ),
                    'default_value' => 'upcoming',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_event_date',
                    'label' => 'Event Date',
                    'name' => 'event_date',
                    'type' => 'date_picker',
                    'display_format' => 'd/m/Y',
                    'return_format' => 'Y-m-d',
                    'first_day' => 1,
                    'required' => 1,
                ),
                array(
                    'key' => 'field_event_start_time',
                    'label' => 'Start Time',
                    'name' => 'event_start_time',
                    'type' => 'time_picker',
                    'display_format' => 'H:i',
                    'return_format' => 'H:i',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_event_end_time',
                    'label' => 'End Time',
                    'name' => 'event_end_time',
                    'type' => 'time_picker',
                    'display_format' => 'H:i',
                    'return_format' => 'H:i',
                    'required' => 0,
                ),
                array(
                    'key' => 'field_event_location',
                    'label' => 'Event Location',
                    'name' => 'event_location',
                    'type' => 'text',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_event_description',
                    'label' => 'Event Description',
                    'name' => 'event_description',
                    'type' => 'wysiwyg',
                    'tabs' => 'visual',
                    'toolbar' => 'basic',
                    'media_upload' => 0,
                    'required' => 1,
                ),
                array(
                    'key' => 'field_event_image',
                    'label' => 'Event Image',
                    'name' => 'event_image',
                    'type' => 'image',
                    'return_format' => 'array',
                    'preview_size' => 'medium',
                    'library' => 'all',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_reservation_link_type',
                    'label' => 'Reservation Link Type',
                    'name' => 'reservation_link_type',
                    'type' => 'select',
                    'choices' => array(
                        'email' => 'Email',
                        'phone' => 'Phone',
                    ),
                    'default_value' => 'email',
                    'required' => 1,
                ),
                array(
                    'key' => 'field_reservation_email',
                    'label' => 'Reservation Email',
                    'name' => 'reservation_email',
                    'type' => 'email',
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_reservation_link_type',
                                'operator' => '==',
                                'value' => 'email',
                            ),
                        ),
                    ),
                ),
                array(
                    'key' => 'field_reservation_phone',
                    'label' => 'Reservation Phone',
                    'name' => 'reservation_phone',
                    'type' => 'text',
                    'conditional_logic' => array(
                        array(
                            array(
                                'field' => 'field_reservation_link_type',
                                'operator' => '==',
                                'value' => 'phone',
                            ),
                        ),
                    ),
                ),
                array(
                    'key' => 'field_additional_info',
                    'label' => 'Additional Info / Notes',
                    'name' => 'additional_info',
                    'type' => 'textarea',
                    'rows' => 4,
                    'required' => 0,
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'post_type',
                        'operator' => '==',
                        'value' => 'event',
                    ),
                ),
            ),
        ));

        // Events FAQs
        acf_add_local_field_group(array(
            'key' => 'group_events_faqs',
            'title' => 'Events FAQs',
            'fields' => array(
                array(
                    'key' => 'field_events_faqs',
                    'label' => 'FAQs',
                    'name' => 'events_faqs',
                    'type' => 'repeater',
                    'layout' => 'table',
                    'button_label' => 'Add FAQ',
                    'sub_fields' => array(
                        array(
                            'key' => 'field_faq_question',
                            'label' => 'Question',
                            'name' => 'question',
                            'type' => 'text',
                            'required' => 1,
                        ),
                        array(
                            'key' => 'field_faq_answer',
                            'label' => 'Answer',
                            'name' => 'answer',
                            'type' => 'textarea',
                            'rows' => 4,
                            'required' => 1,
                        ),
                    ),
                ),
            ),
            'location' => array(
                array(
                    array(
                        'param' => 'page_template',
                        'operator' => '==',
                        'value' => 'page-events.php',
                    ),
                ),
                array(
                    array(
                        'param' => 'post_template',
                        'operator' => '==',
                        'value' => 'page-events.php',
                    ),
                ),
            ),
        ));
    }
}
add_action('acf/init', 'marina_bay_register_events_fields');

/**
 * Enqueue Events Page Scripts and Styles
 */
function marina_bay_enqueue_events_assets() {
    // Check multiple conditions for events page, event archive, or single event
    $is_events_page = false;
    
    if (is_page_template('page-events.php')) {
        $is_events_page = true;
    }
    
    if (is_page()) {
        $template = get_page_template_slug();
        if ($template === 'page-events.php') {
            $is_events_page = true;
        }
        
        $custom_template = get_post_meta(get_the_ID(), '_wp_page_template', true);
        if ($custom_template === 'page-events.php') {
            $is_events_page = true;
        }
    }

    // Check for Event CPT archive
    if (is_post_type_archive('event')) {
        $is_events_page = true;
    }

    // Check for single Event CPT posts
    if (is_singular('event')) {
        $is_events_page = true;
    }
    
    // Force load on any page with "events" in the title (for testing - consider removing for production)
    if (!$is_events_page && is_page() && stripos(get_the_title(), 'events') !== false) {
        $is_events_page = true;
    }
    
    if ($is_events_page) {
        // Enqueue Font Awesome for icons (ensure it's not enqueued multiple times if already global)
        if (!wp_style_is('font-awesome', 'enqueued')) {
            wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css', array(), '6.0.0');
        }
        
        wp_enqueue_style('events-styles', get_template_directory_uri() . '/css/events.css', array('font-awesome'), '1.0');
        // Ensure choices-js and flatpickr-js are dependencies for events.js
        wp_enqueue_script('events-script', get_template_directory_uri() . '/js/events.js', array('choices-js', 'flatpickr-js'), '1.0', true);
        
        // Localize script for AJAX
        wp_localize_script('events-script', 'eventsAjax', array(
            'ajaxurl' => admin_url('admin-ajax.php'),
            'nonce' => wp_create_nonce('events_filter_nonce')
        ));
        
        // Debug info (remove in production)
        if (current_user_can('administrator')) {
            wp_add_inline_script('events-script', 'console.log("Events assets loaded successfully with Choices.js and Flatpickr dependencies.");', 'after');
        }
    }
}
add_action('wp_enqueue_scripts', 'marina_bay_enqueue_events_assets');

/**
 * AJAX Handler for Events Filtering
 */
function marina_bay_filter_events_ajax() {
    // Verify nonce for security
    if (!wp_verify_nonce($_POST['nonce'], 'events_filter_nonce')) {
        wp_die('Security check failed');
    }
    
    // Get filter parameters
    $search = sanitize_text_field($_POST['search'] ?? '');
    $category = sanitize_text_field($_POST['category'] ?? '');
    $from_date = sanitize_text_field($_POST['from_date'] ?? '');
    $until_date = sanitize_text_field($_POST['until_date'] ?? '');
    
    // Build query arguments
    $args = array(
        'post_type' => 'event',
        'posts_per_page' => -1,
        'meta_key' => 'event_date',
        'orderby' => 'meta_value',
        'order' => 'ASC',
        'meta_query' => array(
            array(
                'key' => 'event_status',
                'value' => 'upcoming',
                'compare' => '='
            )
        )
    );
    
    // Add search parameter
    if (!empty($search)) {
        $args['s'] = $search;
    }
    
    // Add category filter
    if (!empty($category)) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'event_category',
                'field' => 'slug',
                'terms' => $category
            )
        );
    }
    
    // Add date range filter
    if (!empty($from_date) || !empty($until_date)) {
        $date_query = array('relation' => 'AND');
        
        if (!empty($from_date)) {
            $date_query[] = array(
                'key' => 'event_date',
                'value' => $from_date,
                'compare' => '>='
            );
        }
        
        if (!empty($until_date)) {
            $date_query[] = array(
                'key' => 'event_date',
                'value' => $until_date,
                'compare' => '<='
            );
        }
        
        if (isset($args['meta_query'])) {
            $args['meta_query'] = array_merge($args['meta_query'], $date_query);
        } else {
            $args['meta_query'] = $date_query;
        }
    }
    
    // Execute query
    $events_query = new WP_Query($args);
    
    $events_html = '';
    
    if ($events_query->have_posts()) {
        while ($events_query->have_posts()) {
            $events_query->the_post();
            
            // Get event data (same as in template)
            $event_id = get_the_ID();
            $event_subtitle = get_field('event_subtitle');
            $event_date = get_field('event_date');
            $event_start_time = get_field('event_start_time');
            $event_end_time = get_field('event_end_time');
            $event_location = get_field('event_location');
            $event_description = get_field('event_description');
            $event_image = get_field('event_image');
            $event_featured = get_field('event_featured');
            $event_status = get_field('event_status');
            $reservation_type = get_field('reservation_link_type');
            $reservation_email = get_field('reservation_email');
            $reservation_phone = get_field('reservation_phone');
            $additional_info = get_field('additional_info');
            
            // Get event categories
            $event_categories = wp_get_post_terms($event_id, 'event_category');
            $category_slugs = array();
            $category_names = array();
            
            if (!empty($event_categories) && !is_wp_error($event_categories)) {
                foreach ($event_categories as $category) {
                    $category_slugs[] = $category->slug;
                    $category_names[] = $category->name;
                }
            }
            
            // Format date for display
            $date_obj = DateTime::createFromFormat('Y-m-d', $event_date);
            $day_number = $date_obj->format('j');
            $month_abbr = strtoupper($date_obj->format('M'));
            $day_abbr = strtoupper($date_obj->format('D'));
            
            // Format time display
            $time_display = $event_start_time;
            if ($event_end_time) {
                $time_display .= ' - ' . $event_end_time;
            }
            
            $featured_class = $event_featured ? ' featured-event' : '';
            $status_class = ' status-' . $event_status;
            
            // Build HTML for this event (same structure as template)
            ob_start();
            ?>
            
            <article class="event-item<?php echo $featured_class . $status_class; ?>" 
                    data-event-id="<?php echo esc_attr($event_id); ?>"
                    data-categories="<?php echo esc_attr(implode(',', $category_slugs)); ?>"
                    data-date="<?php echo esc_attr($event_date); ?>"
                    data-title="<?php echo esc_attr(get_the_title()); ?>"
                    data-description="<?php echo esc_attr(wp_strip_all_tags($event_description)); ?>">
                
                <div class="event-date-display">
                    <div class="event-day-number"><?php echo esc_html($day_number); ?></div>
                    <div class="event-month-day">
                        <span class="event-month"><?php echo esc_html($month_abbr); ?></span>
                        <span class="event-day"><?php echo esc_html($day_abbr); ?></span>
                    </div>
                </div>
                
                <div class="event-content">
                    <div class="event-details">
                        <div class="event-meta">
                            <span class="event-time">
                                <i class="far fa-clock"></i>
                                <?php echo esc_html($time_display); ?>
                            </span>
                            <span class="event-location-meta">
                                <i class="fas fa-map-marker-alt"></i>
                                <?php echo esc_html($event_location); ?>
                            </span>
                            <?php if (!empty($category_names)) : ?>
                                <span class="event-category-meta">
                                    <?php echo esc_html(strtoupper(implode(', ', $category_names))); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                        
                        <h2 class="event-title"><?php the_title(); ?></h2>
                        
                        <?php if ($event_subtitle) : ?>
                            <h3 class="event-subtitle"><?php echo esc_html($event_subtitle); ?></h3>
                        <?php endif; ?>
                        
                        <div class="event-description">
                            <?php echo wp_kses_post($event_description); ?>
                        </div>
                        
                        <?php if ($additional_info) : ?>
                            <div class="event-additional-info">
                                <p><em><?php echo esc_html($additional_info); ?></em></p>
                            </div>
                        <?php endif; ?>
                        
                        <div class="event-actions">
                            <?php if ($reservation_type === 'email' && $reservation_email) : ?>
                                <a href="mailto:<?php echo esc_attr($reservation_email); ?>" class="reserve-btn reserve-email">
                                    RESERVE YOUR SPOT
                                </a>
                            <?php elseif ($reservation_type === 'phone' && $reservation_phone) : ?>
                                <a href="tel:<?php echo esc_attr($reservation_phone); ?>" class="reserve-btn reserve-phone">
                                    RESERVE YOUR SPOT
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <?php if ($event_image) : ?>
                        <div class="event-image">
                            <img src="<?php echo esc_url($event_image['sizes']['large']); ?>" 
                                 alt="<?php echo esc_attr($event_image['alt'] ?: get_the_title()); ?>"
                                 loading="lazy">
                        </div>
                    <?php endif; ?>
                </div>
            </article>
            
            <?php
            $events_html .= ob_get_clean();
        }
        wp_reset_postdata();
    }
    
    // Return response
    wp_send_json_success(array(
        'html' => $events_html,
        'count' => $events_query->found_posts
    ));
}

// Hook for logged in and non-logged in users
add_action('wp_ajax_filter_events', 'marina_bay_filter_events_ajax');
add_action('wp_ajax_nopriv_filter_events', 'marina_bay_filter_events_ajax');

?>