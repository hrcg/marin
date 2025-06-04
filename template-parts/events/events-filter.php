<?php
/**
 * Events Filter Section Template
 */

// Get ACF fields for page settings
$page_title = get_field('events_page_title') ?: 'Events';
$page_subtitle = get_field('events_page_subtitle') ?: 'Expect the Unexpected';

// ACF Fields for filter labels/placeholders
$search_label_text = get_field('events_search_placeholder') ?: 'Search by keyword, artist or topic';
$category_label_text = get_field('events_category_label') ?: 'Category';
$from_date_label_text = get_field('events_from_date_label') ?: 'From Date';
$until_date_label_text = get_field('events_until_date_label') ?: 'Until';
$filter_button_text = get_field('events_filter_button_text') ?: 'Filter Events';

// Define placeholder texts (could be different from above-input labels if needed)
$search_placeholder_attr = $search_label_text; // Using same for now
$category_placeholder_attr = $category_label_text; // Select doesn't use placeholder attr, but first option acts as one
$from_date_placeholder_attr = $from_date_label_text;
$until_date_placeholder_attr = $until_date_label_text;
?>

<!-- Events Header -->
<section class="events-header">
    <div class="container">
        <h1 class="events-main-title"><?php echo esc_html($page_title); ?></h1>
        <p class="events-subtitle"><?php echo esc_html($page_subtitle); ?></p>
    </div>
</section>

<!-- Events Filters -->
<section class="events-filters-section">
    <div class="container">
        <div class="events-filters-form">
            <div class="filter-row">
                <div class="filter-group search-group">
                    <label for="events-search" class="filter-label"><?php echo esc_html(strtoupper($search_label_text)); ?></label>
                    <input type="text" id="events-search" class="events-search-input" placeholder="Search..."> 
                </div>
                
                <div class="filter-group category-group">
                    <label for="events-category" class="filter-label"><?php echo esc_html(strtoupper($category_label_text)); ?></label>
                    <select id="events-category" class="events-category-select">
                        <option value=""><?php echo esc_html($category_placeholder_attr); ?></option> 
                        <?php
                        $categories = get_terms(array(
                            'taxonomy' => 'event_category',
                            'hide_empty' => false,
                        ));
                        foreach ($categories as $category) {
                            echo '<option value="' . esc_attr($category->slug) . '">' . esc_html($category->name) . '</option>';
                        }
                        ?>
                    </select>
                </div>
                
                <div class="filter-input-group date-filter-group">
                    <label for="events-from-date" class="sr-only"><?php echo esc_html($from_date_label_text); ?></label>
                    <input type="text" id="events-from-date" class="events-date-input" 
                           placeholder="<?php echo esc_attr($from_date_placeholder_attr); ?>" 
                           data-placeholder="<?php echo esc_attr($from_date_placeholder_attr); ?>">
                </div>
                
                <div class="filter-input-group date-filter-group">
                    <label for="events-until-date" class="sr-only"><?php echo esc_html($until_date_label_text); ?></label>
                    <input type="text" id="events-until-date" class="events-date-input" 
                           placeholder="<?php echo esc_attr($until_date_placeholder_attr); ?>" 
                           data-placeholder="<?php echo esc_attr($until_date_placeholder_attr); ?>">
                </div>
                
                <div class="filter-group button-group">
                    <button type="button" id="filter-events-btn" class="filter-events-button">
                        <i class="fas fa-search"></i>
                        <?php echo esc_html($filter_button_text); ?>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>