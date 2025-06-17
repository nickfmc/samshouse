<footer class="o-section c-page-footer" id="c-page-footer" role="contentinfo" itemscope itemtype="https://schema.org/WPFooter">
    <div class="c-page-footer-content">
      <div class="o-wrapper-wide">
        <div class="c-footer-main">
          <div class="c-footer-logo">
            <img src="<?php bloginfo( 'template_url' ) ?>/img/SamanthasHouse_Logo_white.svg" alt="Samantha's House" />
          </div>
          
          <div class="c-footer-cta">
            <a href="/donate" class="c-donate-button" aria-label="Make a donation">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
              </svg>
              Donate Now
            </a>
          </div>
        </div>
        
        <div class="c-footer-bottom">
          <div class="c-copywrite">
            &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- /.c-page-footer -->

  <?php // get_template_part( 'template-part/navigation/nav-modal' ); ?>



<!-- Accessibility Controls -->
      <div class="c-accessibility-controls">
        <button id="accessibility-toggle" class="c-accessibility-button" aria-expanded="false" aria-controls="accessibility-menu">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="3"></circle>
            <path d="M12 4.5v.75M12 18.75v.75M4.5 12h.75M18.75 12h.75M6.15 6.15l.53.53M17.32 17.32l.53.53M6.15 17.85l.53-.53M17.32 6.68l.53-.53"></path>
          </svg>
          <span class="u-visually-hidden">Accessibility settings</span>
        </button>

        <div id="accessibility-menu" class="c-accessibility-menu" aria-hidden="true" role="dialog" aria-label="Accessibility settings">
          <div class="c-accessibility-menu__content">
            <h2>Accessibility Settings</h2>
            
            <div class="c-accessibility-option">
              <label for="larger-text">Larger Text</label>
              <button class="c-accessibility-toggle" data-action="toggle-text-size" aria-pressed="false">
                <span class="u-visually-hidden">Toggle larger text size</span>
              </button>
            </div>

            <div class="c-accessibility-option">
              <label for="high-contrast">High Contrast</label>
              <button class="c-accessibility-toggle" data-action="toggle-contrast" aria-pressed="false">
                <span class="u-visually-hidden">Toggle high contrast</span>
              </button>
            </div>

            <div class="c-accessibility-option">
              <label for="reduced-motion">Reduced Motion</label>
              <button class="c-accessibility-toggle" data-action="toggle-motion" aria-pressed="false">
                <span class="u-visually-hidden">Toggle reduced motion</span>
              </button>
            </div>
          </div>
        </div>
      </div>
  <!-- all js scripts are loaded in lib/gdt-enqueues.php -->
  <?php wp_footer(); ?>

</body>
</html>
