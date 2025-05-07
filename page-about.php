<?php
/**
 * Template Name: About
 */

get_header(); ?>

<?php
// Hero Section
get_template_part( 'template-parts/about/hero' );
?>


<main id="main-content">
    <?php

    // Entry Section
    get_template_part( 'template-parts/about/entry' );

    ?>
</main>

<?php get_footer(); ?> 