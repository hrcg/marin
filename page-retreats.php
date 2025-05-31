<?php
/**
 * Template Name: Retreats
 */

get_header(); ?>

<?php
// Hero Section
get_template_part( 'template-parts/retreats/hero' );
?>


<main id="main-content">
    <?php

    // Entry Section
    get_template_part( 'template-parts/retreats/entry' );

    // Packages Section
    get_template_part( 'template-parts/retreats/packages' );

    // Corporate Event Packages Section
    get_template_part( 'template-parts/retreats/corporate-event-packages' );

    // Why Marina Section
    get_template_part( 'template-parts/retreats/why-marina' );

    // Vision and Contact Section
    get_template_part( 'template-parts/retreats/vision-and-contact' );

    ?>
</main>

<?php get_footer(); ?> 