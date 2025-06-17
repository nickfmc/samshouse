<?php
/*
Template Name: Event Template
Description: A custom page template for displaying upcoming events with ACF fields.
*/
?>

<?php get_header(); ?>

<div class="o-layout-row">
  <main id="main-content" class="" role="main" itemscope itemprop="mainContentOfPage" itemtype="https://schema.org/WebPageElement">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      
     
          <!-- Page Content (if any) -->
        <?php if (get_the_content()): ?>
          <div class="c-event-intro">
            <?php the_content(); ?>
          </div>
        <?php endif; ?>

        <?php 
        $event_title = get_field('event_title');
        $page_title = get_the_title();
        $display_title = !empty($event_title) ? $event_title : $page_title;
        $has_event_info = get_field('event_location_name') || get_field('event_date') || get_field('event_registration_time') || get_field('event_start_time');
        ?>        <?php if (!$has_event_info): ?>
          <!-- No Current Events Message -->
          <div class="c-event-container">
            <div class="c-event-header">
              <div class="no-event-message">
                <h1>No Events Currently Scheduled</h1>
                <p>We don't have any events scheduled at this time. Interested in hosting an event with us? <a href="/contact" class="contact-link">Please contact us</a> to discuss possibilities.</p>
              </div>
            </div>
          </div>
        <?php else: ?>

         <div class="c-event-container">
           <div class="c-event-main-content">
             <!-- Event Header with improved design -->
             <header class="c-event-header">
               <span class="event-label">Upcoming Event</span>
               <h1><?php echo esc_html($display_title); ?></h1>
               <?php if (get_field('event_day_of_week') && get_field('event_date')): ?>
                 <p class="event-date-highlight"><?php echo esc_html(get_field('event_day_of_week')); ?>, <?php echo esc_html(get_field('event_date')); ?></p>
               <?php elseif (get_field('event_date')): ?>
                 <p class="event-date-highlight"><?php echo esc_html(get_field('event_date')); ?></p>
               <?php endif; ?>
             </header>

             

        <!-- Event Details -->
        <div class="c-event-details">
          <!-- Location -->
          <?php if (get_field('event_location_name')): ?>
            <div class="c-event-detail-item">
              <div class="c-event-icon">
                <svg viewBox="0 0 24 24">
                  <path d="M12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5M12,2A7,7 0 0,0 5,9C5,14.25 12,22 12,22C12,22 19,14.25 19,9A7,7 0 0,0 12,2Z"/>
                </svg>
              </div>
              <div class="c-event-content">
                <h3>Location</h3>
                <p class="highlight"><?php echo esc_html(get_field('event_location_name')); ?></p>
                <?php if (get_field('event_location_address')): ?>
                  <p><?php echo wp_kses_post(get_field('event_location_address')); ?></p>
                <?php endif; ?>
                <?php if (get_field('event_directions_url')): ?>
                  <a href="<?php echo esc_url(get_field('event_directions_url')); ?>" target="_blank" class="c-directions-link">
                    Click Here for Directions!
                    <svg viewBox="0 0 24 24">
                      <path d="M14,3V5H17.59L7.76,14.83L9.17,16.24L19,6.41V10H21V3M19,19H5V5H12V3H5C3.89,3 3,3.9 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V12H19V19Z"/>
                    </svg>
                  </a>
                <?php endif; ?>
              </div>
            </div>
          <?php endif; ?>

          <!-- Date -->
          <?php if (get_field('event_date') || get_field('event_day_of_week')): ?>
            <div class="c-event-detail-item">
              <div class="c-event-icon">
                <svg viewBox="0 0 24 24">
                  <path d="M19,3H18V1H16V3H8V1H6V3H5A2,2 0 0,0 3,5V19A2,2 0 0,0 5,21H19A2,2 0 0,0 21,19V5A2,2 0 0,0 19,3M19,19H5V8H19V19Z"/>
                </svg>
              </div>
              <div class="c-event-content">
                <h3>Date</h3>
                <?php if (get_field('event_day_of_week') && get_field('event_date')): ?>
                  <p class="highlight"><?php echo esc_html(get_field('event_day_of_week')); ?>, <?php echo esc_html(get_field('event_date')); ?></p>
                <?php elseif (get_field('event_date')): ?>
                  <p class="highlight"><?php echo esc_html(get_field('event_date')); ?></p>
                <?php endif; ?>
              </div>
            </div>
          <?php endif; ?>

          <!-- Registration Time -->
          <?php if (get_field('event_registration_time')): ?>
            <div class="c-event-detail-item">
              <div class="c-event-icon">
                <svg viewBox="0 0 24 24">
                  <path d="M12,20A8,8 0 0,0 20,12A8,8 0 0,0 12,4A8,8 0 0,0 4,12A8,8 0 0,0 12,20M12,2A10,10 0 0,1 22,12A10,10 0 0,1 12,22C6.47,22 2,17.5 2,12A10,10 0 0,1 12,2M12.5,7V12.25L17,14.92L16.25,16.15L11,13V7H12.5Z"/>
                </svg>
              </div>
              <div class="c-event-content">
                <h3>Registration</h3>
                <p class="highlight"><?php echo esc_html(get_field('event_registration_time')); ?></p>
              </div>
            </div>
          <?php endif; ?>

          <!-- Event Start Time -->
          <?php if (get_field('event_start_time')): ?>
            <div class="c-event-detail-item">
              <div class="c-event-icon">
                <svg viewBox="0 0 24 24">
                  <path d="M8,5.14V19.14L19,12.14L8,5.14Z"/>
                </svg>
              </div>
              <div class="c-event-content">
                <h3>Event Start</h3>
                <p class="highlight"><?php echo esc_html(get_field('event_start_time')); ?></p>
              </div>
            </div>
          <?php endif; ?>        </div>        <!-- Script Embed (e.g., Bloomerang widget) -->
        <?php if (get_field('event_script_embed')): ?>
          <div class="c-event-script-embed donation-form" >
            <?php 
            // Output raw script content - use with caution, only for trusted content
            echo get_field('event_script_embed'); 
            ?>
          </div>
        <?php endif; ?>

        <!-- Additional Information -->
        <?php if (get_field('event_additional_info')): ?>
          <div class="c-event-additional">
            <h3>Additional Information</h3>
            <?php echo wp_kses_post(get_field('event_additional_info')); ?>
          </div>
        <?php endif; ?>

           </div>

           <!-- Sidebar with Cost Section -->
           <div class="c-event-sidebar">
             <!-- Cost/Donation Options -->
             <?php if (have_rows('event_cost_options')): ?>
               <div class="c-event-cost-section">
                 <h3>Cost (Donation Options)</h3>
                 <div class="c-event-cost-grid">
                   <?php while (have_rows('event_cost_options')): the_row(); 
                     $amount = get_sub_field('amount');
                     $description = get_sub_field('description');
                   ?>                     <div class="c-event-cost-item">
                       <div class="cost-amount"><?php echo esc_html($amount); ?></div>
                       <div class="cost-description"><?php echo esc_html($description); ?></div>
                     </div><?php endwhile; ?>
                 </div>
               </div>
             <?php endif; ?>

               <!-- Event Logo -->
             <?php 
             $event_logo = get_field('event_logo');
             if ($event_logo): ?>
               <div class="c-event-logo">
                 <img src="<?php echo esc_url($event_logo['sizes']['medium']); ?>" alt="<?php echo esc_attr($event_logo['alt']); ?>">
               </div>
             <?php endif; ?>

             
           </div>

         

         </div>
        <?php endif; ?>

        <!-- Bloomarag Form Embed -->
             <?php if (get_field('bloomarag_form_embed')): ?>
               <div class="c-bloomarag-form">
                 <h3>Register for Event</h3>
                 <?php echo get_field('bloomarag_form_embed'); ?>
               </div>
             <?php endif; ?>

        <div class="o-wrapper-wide pb-20">
          <!-- Past Events Gallery -->
          <?php
          $gallery = get_field('past_events_gallery');
          if ($gallery): ?>
            <div class="c-past-events-gallery">
              <h3>Past Events</h3>
              <div class="c-gallery-grid">
                <?php foreach ($gallery as $image): ?>
                  <div class="c-gallery-item">
                    <img src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          <?php endif; ?>
        </div>
      
    <?php endwhile; endif; // END main loop (if/while) ?>
  </main>
</div>
<!-- /layout-row-->

<?php get_footer(); ?>
