<?php
/**
 * Template Name: Amenities & Activities
 */

get_header(); ?>

<?php
// Hero Section
get_template_part( 'template-parts/amenities/hero' );
?>


<main id="main-content">
    <?php

    // Entry Section
    get_template_part( 'template-parts/amenities/entry' );

    // Our Services Section
    get_template_part('template-parts/amenities/our-services');

    // Family Fun Section
    get_template_part('template-parts/amenities/family-fun');

    // Complimentary Services Section
    get_template_part('template-parts/amenities/complimentary-services');


    ?>
</main>

<?php get_footer(); ?> 