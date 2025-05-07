<?php
/**
 * Template Name: Careers
 */

get_header(); ?>

<?php
// Hero Section
get_template_part( 'template-parts/careers/hero' );
?>


<main id="main-content">
    <?php

    // Jobs Section
    get_template_part( 'template-parts/careers/jobs' );

    // Entry Section
    get_template_part( 'template-parts/careers/entry' );

    ?>
</main>

<?php get_footer(); ?> 