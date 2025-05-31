<?php
/**
 * The template for displaying the Events archive
 */

get_header();
?>

<div class="events-page-container">
    <main id="main-content">
        <?php
        // Always load the filter template part first
        get_template_part( 'template-parts/events/events-filter' );

        // Check if we have any events to display in the archive
        if ( have_posts() ) :
            // Load the events list template part (which contains its own loop for the archive query)
            get_template_part( 'template-parts/events/events-list' );
        else :
            // If no events are found in the archive query
            ?>
            <section class="events-list-section">
                <div class="container">
                    <div class="no-events-found">
                        <p><?php esc_html_e( 'No events match your current filters or there are no upcoming events.', 'marina-bay' ); ?></p>
                    </div>
                </div>
            </section>
            <?php
        endif;

        // Load the FAQ template part, sourcing ACF fields from the 'Events' page
        // It's assumed you have a WordPress page with the slug 'events' 
        // where the FAQ ACF fields are populated.
        $events_page_for_faq = get_page_by_path('events'); // Ensure this slug matches your page
        if ($events_page_for_faq) {
            global $post;
            $original_post_for_faq = $post; // Store current global $post
            $post = $events_page_for_faq;    // Temporarily switch global $post to the 'Events' page
            setup_postdata($post);          // Set up post data for the 'Events' page to make its ACF fields available
            
            get_template_part( 'template-parts/events/events-faq' );
            
            wp_reset_postdata();            // Restore original post data
            $post = $original_post_for_faq; // Restore original global $post
        } else {
            // Optional: Output a message if the 'events' page for FAQs isn't found
            // echo '<p>FAQ section could not be loaded. Events page not found.</p>';
        }
        ?>
    </main>
</div>

<?php get_footer(); ?> 