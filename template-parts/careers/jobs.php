<?php
/**
 * Jobs Template Part
 */

// Get all jobs
$args = array(
    'post_type' => 'job',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC'
);

$jobs = new WP_Query($args);

// Get all job types
$job_types = get_terms(array(
    'taxonomy' => 'job_type',
    'hide_empty' => false,
));

// Get all job categories (used for levels)
$job_categories = get_terms(array(
    'taxonomy' => 'job_category',
    'hide_empty' => false,
));
?>

<div class="jobs-section">
    <!-- Filters
    <div class="jobs-filters">
        <div class="filter-groups">
            <div class="filter-group">
                <h3>TEAM</h3>
                <div class="filter-buttons">
                    <?php foreach ($job_categories as $category) : ?>
                        <button class="filter-btn" data-filter="category" data-value="<?php echo esc_attr($category->slug); ?>">
                            <?php echo esc_html($category->name); ?>
                        </button>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="filter-group">
                <h3>CONTRACT</h3>
                <div class="filter-buttons">
                    <?php foreach ($job_types as $type) : ?>
                        <button class="filter-btn" data-filter="type" data-value="<?php echo esc_attr($type->slug); ?>">
                            <?php echo esc_html($type->name); ?>
                        </button>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="active-filters">
            Active Filters <span class="filter-count">0</span>
            <button class="reset-filters">RESET FILTERS</button>
        </div>
    </div>
    -->

    <!-- Jobs Grid -->
    <div class="jobs-grid">
        <div class="jobs-header">
            <div class="col position">POSITION</div>
            <div class="col team">TEAM</div>
            <div class="col contract">CONTRACT</div>
            <div class="col info">APPLY</div>
        </div>

        <?php if ($jobs->have_posts()) : ?>
            <?php while ($jobs->have_posts()) : $jobs->the_post(); 
                $job_types = wp_get_post_terms(get_the_ID(), 'job_type');
                $job_categories = wp_get_post_terms(get_the_ID(), 'job_category');
            ?>
                <div class="job-item" 
                     data-categories="<?php echo esc_attr(implode(',', wp_list_pluck($job_categories, 'slug'))); ?>"
                     data-types="<?php echo esc_attr(implode(',', wp_list_pluck($job_types, 'slug'))); ?>">
                    <div class="col position" data-label="POSITION"><?php the_title(); ?></div>
                    <div class="col team" data-label="TEAM">
                        <?php 
                        if (!empty($job_categories)) {
                            echo esc_html($job_categories[0]->name);
                        }
                        ?>
                    </div>
                    <div class="col contract" data-label="CONTRACT">
                        <?php 
                        if (!empty($job_types)) {
                            echo esc_html($job_types[0]->name);
                        }
                        ?>
                    </div>
                    <div class="col info" data-label="INFO">
                        <button class="info-btn" 
                                data-job-id="<?php echo get_the_ID(); ?>" 
                                data-job-title="<?php echo esc_attr(get_the_title()); ?>"
                                data-job-description="<?php echo esc_attr(get_field('job_description')); ?>">
                            <i class="fa-solid fa-paper-plane"></i>
                            <span class="apply-now-text">APPLY NOW</span>
                        </button>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else : ?>
            <div class="no-jobs">
                <p>No jobs found matching your criteria.</p>
            </div>
        <?php endif; ?>
        <?php wp_reset_postdata(); ?>
    </div>
</div>

<!-- Job Popup -->
<div class="job-popup reviews-popup">
    <div class="reviews-popup-content">
        <div class="popup-header">
            <h3 class="popup-title"></h3>
            <button class="close-popup">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 6L6 18" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M6 6L18 18" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
        </div>
        <div class="job-content">
            <div class="job-description"></div>
            <?php echo do_shortcode('[contact-form-7 id="1234" title="Job Application Form"]'); ?>
        </div>
    </div>
</div>