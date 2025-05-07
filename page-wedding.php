<?php
/**
 * Template Name: Wedding
 */

get_header(); ?>

<?php
// Hero Section
get_template_part( 'template-parts/wedding/hero' );
?>


<main id="main-content">
    <?php

    // Entry Section
    get_template_part( 'template-parts/wedding/entry' );

    // Omega Section
    get_template_part( 'template-parts/wedding/omega' );

    ?>
</main>

<?php get_footer(); ?> 