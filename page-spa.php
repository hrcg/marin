<?php
/**
 * Template Name: Spa
 */

get_header(); ?>

<?php
// Hero Section
get_template_part( 'template-parts/spa/hero' );
?>


<main id="main-content">
    <?php

    // Entry Section
    get_template_part( 'template-parts/spa/entry' );

    // Spa Category Section
    get_template_part( 'template-parts/spa/body-wellness' );

    // Spa Gallery Section
    get_template_part( 'template-parts/spa/gallery' );


    ?>
</main>

<?php get_footer(); ?> 