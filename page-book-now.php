<?php
/**
 * Template Name: Book Now
 */

get_header(); ?>

<?php
// Hero Section
get_template_part( 'template-parts/book-now/hero' );
?>


<main id="main-content">
    <?php

    // Entry Section
    get_template_part( 'template-parts/book-now/book-engine' );

    ?>
</main>

<?php get_footer(); ?> 