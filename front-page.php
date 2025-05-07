<?php
/*
 * Template Name: Front Page
 * Description: Custom front-page template for the Marina Bay theme
 */

get_header(); ?>

<?php
// Hero Section
get_template_part( 'template-parts/front-page/hero' );
?>

<?php get_template_part('template-parts/front-page/reviews'); ?>

<main id="main-content">
    <?php
    // Luxury Section
    get_template_part( 'template-parts/front-page/luxury' );

    // Accommodations Section
    get_template_part( 'template-parts/front-page/accommodations' );

    // Offers Section
    get_template_part('template-parts/front-page/offers');

    // Facility Highlights Section
    get_template_part( 'template-parts/front-page/facilities' );

    // Facility Highlights Section
    get_template_part( 'template-parts/front-page/proud' );
    ?>
</main>

<?php get_footer(); ?>
