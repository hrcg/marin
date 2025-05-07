<?php
/**
 * Featured Offer Section Template
 */

$args = array(
    'post_type' => 'offers',
    'posts_per_page' => 1,
    'meta_query' => array(
        array(
            'key' => 'offer_main',
            'value' => '1',
            'compare' => '=',
        ),
    ),
);

$featured_offer_query = new WP_Query($args);

if ($featured_offer_query->have_posts()) :
    $featured_offer_query->the_post();
?>
<section class="featured-offer-section">
    <div class="container">
        <h2 class="section-title">FEATURED OFFER</h2>
        <div class="featured-offer-content">
            <div class="featured-offer-image">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('full'); ?>
                <?php endif; ?>
            </div>
            <div class="featured-offer-text">
                <h2 class="featured-offer-title"><?php the_title(); ?></h2>
                <?php if (get_field('offer_subtitle')) : ?>
                    <p class="featured-offer-subtitle"><?php echo esc_html(get_field('offer_subtitle')); ?></p>
                <?php endif; ?>
                <div class="featured-offer-description">
                    <?php the_content(); ?>
                </div>
                <a href="<?php echo esc_url(get_permalink()); ?>" class="main-offer-details-btn">DETAILS</a>
            </div>
        </div>
    </div>
</section>

<?php
endif;
wp_reset_postdata();
?> 