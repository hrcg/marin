<?php
/**
 * Events List Section Template
 */
?> 

<!-- Events List -->
<section class="events-list-section">
     <div class="container">
         <div id="events-container" class="events-container">
             <?php
             // Get all events ordered by date
             $events_args = array(
                 'post_type' => 'event',
                 'posts_per_page' => -1,
                 'meta_key' => 'event_date',
                 'orderby' => 'meta_value',
                 'order' => 'ASC',
                 'meta_query' => array(
                     array(
                         'key' => 'event_status',
                         'value' => 'upcoming',
                         'compare' => '='
                     )
                 )
             );

             $events_query = new WP_Query($events_args);

             if ($events_query->have_posts()) :
                 while ($events_query->have_posts()) : $events_query->the_post();
                     $event_id = get_the_ID();
                     
                     // Get ACF fields
                     $event_subtitle = get_field('event_subtitle');
                     $event_date = get_field('event_date');
                     $event_start_time = get_field('event_start_time');
                     $event_end_time = get_field('event_end_time');
                     $event_location = get_field('event_location');
                     $event_description = get_field('event_description');
                     $event_image = get_field('event_image');
                     $event_featured = get_field('event_featured');
                     $event_status = get_field('event_status');
                     $reservation_type = get_field('reservation_link_type');
                     $reservation_email = get_field('reservation_email');
                     $reservation_phone = get_field('reservation_phone');
                     $additional_info = get_field('additional_info');
                     
                     // Get event categories
                     $event_categories = wp_get_post_terms($event_id, 'event_category');
                     $category_slugs = array();
                     $category_names = array();
                     
                     if (!empty($event_categories) && !is_wp_error($event_categories)) {
                         foreach ($event_categories as $category) {
                             $category_slugs[] = $category->slug;
                             $category_names[] = $category->name;
                         }
                     }
                     
                     // Format date for display
                     if ($event_date) {
                         $date_obj = DateTime::createFromFormat('Y-m-d', $event_date);
                         if ($date_obj) {
                             $day_number = $date_obj->format('j');
                             $month_abbr = strtoupper($date_obj->format('M'));
                             $day_abbr = strtoupper($date_obj->format('D'));
                         } else {
                             $day_number = '?';
                             $month_abbr = '???';
                             $day_abbr = '???';
                         }
                     } else {
                         $day_number = '?';
                         $month_abbr = '???';
                         $day_abbr = '???';
                     }
                     
                     // Format time display
                     $time_display = $event_start_time ?: 'TBD';
                     if ($event_end_time) {
                         $time_display .= ' - ' . $event_end_time;
                     }
                     
                     $featured_class = $event_featured ? ' featured-event' : '';
                     $status_class = ' status-' . ($event_status ?: 'upcoming');
                     ?>
                     
                     <article class="event-item<?php echo $featured_class . $status_class; ?>" 
                             data-event-id="<?php echo esc_attr($event_id); ?>"
                             data-categories="<?php echo esc_attr(implode(',', $category_slugs)); ?>"
                             data-date="<?php echo esc_attr($event_date ?: ''); ?>"
                             data-title="<?php echo esc_attr(get_the_title()); ?>"
                             data-description="<?php echo esc_attr(wp_strip_all_tags($event_description ?: '')); ?>">
                         
                         <div class="event-date-display">
                             <div class="event-day-number"><?php echo esc_html($day_number); ?></div>
                             <div class="event-month-day">
                                 <span class="event-month"><?php echo esc_html($month_abbr); ?></span>
                                 <span class="event-day"><?php echo esc_html($day_abbr); ?></span>
                             </div>
                         </div>
                         
                         <div class="event-content">
                             <div class="event-details">
                                 <div class="event-meta">
                                     <span class="event-time">
                                         <i class="far fa-clock"></i>
                                         <?php echo esc_html($time_display); ?>
                                     </span>
                                     <?php if ($event_location) : ?>
                                         <span class="event-location-meta">
                                             <i class="fas fa-map-marker-alt"></i>
                                             <?php echo esc_html($event_location); ?>
                                         </span>
                                     <?php endif; ?>
                                     <?php if (!empty($category_names)) : ?>
                                         <span class="event-category-meta">
                                             <?php echo esc_html(strtoupper(implode(', ', $category_names))); ?>
                                         </span>
                                     <?php endif; ?>
                                 </div>
                                 
                                 <h2 class="event-title"><?php the_title(); ?></h2>
                                 
                                 <?php if ($event_subtitle) : ?>
                                     <h3 class="event-subtitle"><?php echo esc_html($event_subtitle); ?></h3>
                                 <?php endif; ?>
                                 
                                 <?php if ($event_description) : ?>
                                     <div class="event-description">
                                         <?php echo wp_kses_post($event_description); ?>
                                     </div>
                                 <?php endif; ?>
                                 
                                 <?php if ($additional_info) : ?>
                                     <div class="event-additional-info">
                                         <p><em><?php echo esc_html($additional_info); ?></em></p>
                                     </div>
                                 <?php endif; ?>
                                 
                                 <div class="event-actions">
                                     <?php if ($reservation_type === 'email' && $reservation_email) : ?>
                                         <a href="mailto:<?php echo esc_attr($reservation_email); ?>" class="reserve-btn reserve-email">
                                             RESERVE YOUR SPOT
                                         </a>
                                     <?php elseif ($reservation_type === 'phone' && $reservation_phone) : ?>
                                         <a href="tel:<?php echo esc_attr($reservation_phone); ?>" class="reserve-btn reserve-phone">
                                             RESERVE YOUR SPOT
                                         </a>
                                     <?php endif; ?>
                                 </div>
                             </div>
                             
                             <?php if ($event_image && isset($event_image['sizes']['large'])) : ?>
                                 <div class="event-image">
                                     <img src="<?php echo esc_url($event_image['sizes']['large']); ?>" 
                                          alt="<?php echo esc_attr($event_image['alt'] ?: get_the_title()); ?>"
                                          loading="lazy">
                                 </div>
                             <?php endif; ?>
                         </div>
                     </article>
                     
                     <?php
                 endwhile;
                 wp_reset_postdata();
             else :
                 ?>
                 <div class="no-events-found">
                     <p>No upcoming events found.</p>
                 </div>
                 <?php
             endif;
             ?>
         </div>
         
         <!-- Loading indicator -->
         <div id="events-loading" class="events-loading" style="display: none;">
             <div class="loading-spinner"></div>
             <p>Loading events...</p>
         </div>
         
         <!-- No results message -->
         <div id="no-events-message" class="no-events-message" style="display: none;">
             <p>No events found matching your criteria.</p>
         </div>
     </div>
</section>