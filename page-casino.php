<?php
/**
 * Template Name: Casino
 */

get_header(); ?>

<?php
// Hero Section
get_template_part( 'template-parts/casino/hero' );
?>


<main id="main-content">
    <?php

    // Services Section
    get_template_part( 'template-parts/casino/services' );

    // Features Section
    get_template_part( 'template-parts/casino/features' );

    // Omega Section
    get_template_part( 'template-parts/casino/omega' );



    ?>
</main>

<?php get_footer(); ?> 