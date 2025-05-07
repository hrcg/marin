<?php
/**
 * Template Name: Rooms & Suites
 */

get_header(); ?>

<?php
// Hero Section
get_template_part( 'template-parts/rooms-suites/hero' );
?>


<main id="main-content">
    <?php

    // Entry Section
    get_template_part( 'template-parts/rooms-suites/entry' );

    // Rooms Section
    get_template_part( 'template-parts/rooms-suites/rooms' );

    // Policies Amenities Section
    get_template_part( 'template-parts/rooms-suites/policies-amenities' );

    ?>
</main>

<?php get_footer(); ?> 