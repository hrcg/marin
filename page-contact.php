<?php
/**
 * Template Name: Contact
 */

get_header(); ?>

<?php
// Hero Section
get_template_part( 'template-parts/contact/hero' );
?>


<main id="main-content">
    <?php

    // Entry Section
    get_template_part( 'template-parts/contact/contact' );

    ?>
</main>

<?php get_footer(); ?> 