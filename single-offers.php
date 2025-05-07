<?php
/**
 * Template Name: Single Offer
 * Template Post Type: offers
 */

get_header(); ?>

<div class="single-offer-page">
    <!-- Hero Section -->
    <section class="offer-hero">
        <?php if(has_post_thumbnail()): ?>
            <div class="hero-image">
                <?php the_post_thumbnail('full'); ?>
            </div>
        <?php endif; ?>
        <div class="hero-content">
            <div class="container">
                <div class="hero-text">
                    <h1 class="single-offer-title"><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
    </section>

    <!-- Offer Details Section -->
    <section class="single-offer-details">
        <div class="container">
            <div class="details-content">
                <?php if(get_field('offer_subtitle')): ?>
                    <p><?php echo esc_html(get_field('offer_subtitle')); ?></p>
                <?php endif; ?>
            </div>

            <div class="single-offer-info">
                <div class="single-offer-info-row">
                    <div class="info-label">VALID FOR SELECTED DATES BETWEEN</div>
                    <div class="info-value"><?php echo esc_html(get_field('offer_valid_dates')); ?></div>
                </div>

                <div class="single-offer-restrictions">
                    <?php if(get_field('offer_restrictions')): ?>
                        <p class="restrictions-text"><?php echo esc_html(get_field('offer_restrictions')); ?></p>
                    <?php endif; ?>
                </div>

                <div class="single-offer-info-row">
                    <div class="info-label">MINIMUM STAY</div>
                    <div class="info-value"><?php echo esc_html(get_field('minimum_stay')); ?> NIGHTS</div>
                </div>

                <div class="single-offer-info-row">
                    <div class="info-label">MAXIMUM STAY</div>
                    <div class="info-value"><?php echo esc_html(get_field('maximum_stay')); ?> NIGHTS</div>
                </div>
            </div>

            <?php if(have_rows('offer_included_items')): ?>
            <div class="included-section">
                <h2 class="included-title">INCLUDED</h2>
                <div class="included-items">
                    <ul>
                        <?php while(have_rows('offer_included_items')): the_row(); ?>
                            <li><?php echo esc_html(get_sub_field('item_text')); ?></li>
                        <?php endwhile; ?>
                    </ul>
                </div>
            </div>
            <?php endif; ?>

            <div class="single-offer-booking">
                <div class="booking-label">Book offer now</div>
                <div class="booking-actions">
                    <a href="tel:<?php echo esc_attr(get_field('contact_phone')); ?>" class="phone-number"><?php echo esc_html(get_field('contact_phone')); ?></a>
                    <a href="tel:+30 21 0890 1000" class="check-rates-btn">+30 21 0890 1000</a>
                </div>
            </div>
        </div>
    </section>
</div>

<?php get_footer(); ?> 