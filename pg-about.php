<?php
/*
Template Name: About Template
Description: A page template for About page with board members section.
*/
?>

<?php get_header(); ?>

<div class="o-layout-row">
  <main id="main-content" class="" role="main" itemscope itemprop="mainContentOfPage" itemtype="https://schema.org/WebPageElement">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      
      <!-- Page Content (GenerateBlocks content goes here) -->
      <?php if (get_the_content()): ?>
        <div class="page-content">
          <?php the_content(); ?>
        </div>
      <?php endif; ?>

      <!-- Board Members Section -->
      <?php if (have_rows('board_members')): ?>
        <section class="c-board-members-section">
          
          <div class="c-board-members-grid">            <?php while (have_rows('board_members')): the_row(); 
              $member_photo = get_sub_field('photo');
              $member_name = get_sub_field('name');
              $member_title = get_sub_field('title');
              $member_bio = get_sub_field('bio');
              $member_tenure = get_sub_field('tenure');
              $member_email = get_sub_field('email');
              $member_linkedin = get_sub_field('linkedin');
            ?>
              <div class="c-board-member-card">
                <div class="c-member-photo <?php echo !$member_photo ? 'no-image' : ''; ?>">
                  <?php if ($member_photo): ?>
                    <img src="<?php echo esc_url($member_photo['sizes']['medium_large']); ?>" 
                         alt="<?php echo esc_attr($member_name); ?>" 
                         loading="lazy">
                  <?php endif; ?>
                </div>
                
                <div class="c-member-info">
                  <?php if ($member_name): ?>
                    <h3 class="member-name"><?php echo esc_html($member_name); ?></h3>
                  <?php endif; ?>
                  
                  <?php if ($member_title): ?>
                    <div class="member-title"><?php echo esc_html($member_title); ?></div>
                  <?php endif; ?>
                    <?php if ($member_bio): ?>
                    <div class="member-bio"><?php echo wp_kses_post($member_bio); ?></div>
                  <?php endif; ?>
                  
                  <!-- Member Meta Information -->
                  <?php if ($member_tenure || $member_email || $member_linkedin): ?>
                    <div class="member-meta">
                      <?php if ($member_tenure): ?>
                        <div class="member-tenure"><?php echo esc_html($member_tenure); ?></div>
                      <?php endif; ?>
                      
                      <?php if ($member_email || $member_linkedin): ?>
                        <div class="member-contact">
                          <?php if ($member_email): ?>
                            <a href="mailto:<?php echo esc_attr($member_email); ?>" class="email-link">
                              <svg viewBox="0 0 24 24">
                                <path d="M20,8L12,13L4,8V6L12,11L20,6M20,4H4C2.89,4 2,4.89 2,6V18A2,2 0 0,0 4,20H20A2,2 0 0,0 22,18V6C22,4.89 21.1,4 20,4Z"/>
                              </svg>
                              Email
                            </a>
                          <?php endif; ?>
                          
                          <?php if ($member_linkedin): ?>
                            <a href="<?php echo esc_url($member_linkedin); ?>" target="_blank" rel="noopener noreferrer" class="linkedin-link">
                              <svg viewBox="0 0 24 24">
                                <path d="M19 3A2 2 0 0 1 21 5V19A2 2 0 0 1 19 21H5A2 2 0 0 1 3 19V5A2 2 0 0 1 5 3H19M18.5 18.5V13.2A3.26 3.26 0 0 0 15.24 9.94C14.39 9.94 13.4 10.46 12.92 11.24V10.13H10.13V18.5H12.92V13.57C12.92 12.8 13.54 12.17 14.31 12.17A1.4 1.4 0 0 1 15.71 13.57V18.5H18.5M6.88 8.56A1.68 1.68 0 0 0 8.56 6.88C8.56 5.95 7.81 5.19 6.88 5.19A1.69 1.69 0 0 0 5.19 6.88C5.19 7.81 5.95 8.56 6.88 8.56M8.27 18.5V10.13H5.5V18.5H8.27Z"/>
                              </svg>
                              LinkedIn
                            </a>
                          <?php endif; ?>
                        </div>
                      <?php endif; ?>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            <?php endwhile; ?>
          </div>
        </section>
      <?php endif; ?>
      
    <?php endwhile; endif; // END main loop ?>
  </main>
</div>
<!-- /layout-row-->

<?php get_footer(); ?>


