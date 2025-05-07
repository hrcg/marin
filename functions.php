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

    // Enqueue custom script
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

?>