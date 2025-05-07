<?php
/**
 * Template Name: Conference
 */

get_header(); ?>

<?php
// Hero Section
get_template_part( 'template-parts/conference/hero' );
?>


<main id="main-content">
    <?php

    // Entry Section
    get_template_part( 'template-parts/conference/entry' );

    // Columns Section
    get_template_part( 'template-parts/conference/columns' );

    ?>
</main>

<?php get_footer(); ?> 