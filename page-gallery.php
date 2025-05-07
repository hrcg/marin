<?php
/**
 * Template Name: Gallery
 */

get_header(); ?>

<?php
// Hero Section
get_template_part( 'template-parts/gallery/hero' );
?>


<main id="main-content">
    <?php

    // Entry Section
    get_template_part( 'template-parts/gallery/entry' );

    ?>
</main>

<?php get_footer(); ?> 