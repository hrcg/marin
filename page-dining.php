<?php
/**
 * Template Name: Dining
 */

get_header(); ?>

<?php
// Hero Section
get_template_part( 'template-parts/dining/hero' );
?>


<main id="main-content">
    <?php

    // Entry Section
    get_template_part( 'template-parts/dining/entry' );

    // Categories Section
    get_template_part( 'template-parts/dining/categories' );


    ?>
</main>

<?php get_footer(); ?> 