<?php
/**
 * Template Name: Offers
 */

get_header(); ?>

<?php
// Hero Section
get_template_part( 'template-parts/offers/hero' );
?>

<main id="main-content">
    <?php
    // Entry Section
    get_template_part( 'template-parts/offers/entry' );

    // Featured Offer Section
    get_template_part('template-parts/offers/featured-offer');

    // All Offers Grid Section
    get_template_part('template-parts/offers/offers-grid');
    ?>
</main>

<?php get_footer(); ?> 