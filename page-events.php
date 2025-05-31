<?php
/**
 * Template Name: Events
 *
 * Events page template with filtering and FAQ functionality
 */

get_header();
?>

<div class="events-page-container">
    <main id="main-content">
        <?php
        get_template_part( 'template-parts/events/events-filter' );
        get_template_part( 'template-parts/events/events-list' );
        get_template_part( 'template-parts/events/events-faq' );
        ?>
    </main>
</div>

<?php get_footer(); ?>
