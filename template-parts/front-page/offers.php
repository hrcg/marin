<?php
/**
 * Featured Offers Section Template Part
 */

$featured_offers = marina_bay_get_featured_offers();

if ($featured_offers->have_posts()) :
?>
<section class="featured-offers">
    <div class="section-header container">
        <h2 class="section-title">FEATURED OFFERS</h2>
        <a href="/special-offers" class="all-offers-link">View All Offers</a>
    </div>
    
    <div class="offers-grid">
        <?php while ($featured_offers->have_posts()) : $featured_offers->the_post(); ?>
            <a href="<?php echo esc_url(get_permalink()); ?>" class="offer-item">
                <div class="offer-image">
                    <?php if (has_post_thumbnail()) : ?>
                        <?php the_post_thumbnail('full'); ?>
                    <?php endif; ?>
                </div>
                <div class="offer-content">
                    <h3 class="offer-title"><?php the_title(); ?></h3>
                    <?php if (get_field('offer_subtitle')) : ?>
                        <p class="offer-subtitle"><?php echo esc_html(get_field('offer_subtitle')); ?></p>
                    <?php endif; ?>
                    <span class="view-offer-btn">View Offer</span>
                </div>
            </a>
        <?php endwhile; ?>
    </div>
</section>
<?php 
endif;
wp_reset_postdata();
?> 