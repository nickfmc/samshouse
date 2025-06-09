document.addEventListener('DOMContentLoaded', () => {
    // Get all necessary elements
    const accessibilityToggle = document.getElementById('accessibility-toggle');
    const accessibilityMenu = document.getElementById('accessibility-menu');
    const textSizeToggle = document.querySelector('[data-action="toggle-text-size"]');
    const contrastToggle = document.querySelector('[data-action="toggle-contrast"]');
    const motionToggle = document.querySelector('[data-action="toggle-motion"]');

    // Initialize states from localStorage
    const settings = {
        largerText: localStorage.getItem('accessibility-larger-text') === 'true',
        highContrast: localStorage.getItem('accessibility-high-contrast') === 'true',
        reducedMotion: localStorage.getItem('accessibility-reduced-motion') === 'true'
    };

    // Apply initial states
    if (settings.largerText) {
        document.documentElement.style.fontSize = '110%';
        textSizeToggle.setAttribute('aria-pressed', 'true');
    }
    if (settings.highContrast) {
        document.body.classList.add('high-contrast');
        contrastToggle.setAttribute('aria-pressed', 'true');
    }
    if (settings.reducedMotion) {
        document.body.classList.add('reduced-motion');
        motionToggle.setAttribute('aria-pressed', 'true');
    }

    // Toggle menu visibility
    accessibilityToggle.addEventListener('click', () => {
        const isExpanded = accessibilityToggle.getAttribute('aria-expanded') === 'true';
        accessibilityToggle.setAttribute('aria-expanded', !isExpanded);
        accessibilityMenu.setAttribute('aria-hidden', isExpanded);
    });

    // Close menu when clicking outside
    document.addEventListener('click', (event) => {
        if (!accessibilityMenu.contains(event.target) && 
            !accessibilityToggle.contains(event.target)) {
            accessibilityToggle.setAttribute('aria-expanded', 'false');
            accessibilityMenu.setAttribute('aria-hidden', 'true');
        }
    });

    // Text size toggle
    textSizeToggle.addEventListener('click', () => {
        settings.largerText = !settings.largerText;
        document.documentElement.style.fontSize = settings.largerText ? '110%' : '100%';
        textSizeToggle.setAttribute('aria-pressed', settings.largerText);
        localStorage.setItem('accessibility-larger-text', settings.largerText);
    });

    // High contrast toggle with transition handling
    contrastToggle.addEventListener('click', () => {
        settings.highContrast = !settings.highContrast;
        
        // Add a transition class to body
        document.body.classList.add('contrast-transition');
        
        // Toggle high contrast
        document.body.classList.toggle('high-contrast');
        contrastToggle.setAttribute('aria-pressed', settings.highContrast);
        localStorage.setItem('accessibility-high-contrast', settings.highContrast);
        
        // Remove transition class after animation completes
        setTimeout(() => {
            document.body.classList.remove('contrast-transition');
        }, 300);
    });

    // Reduced motion toggle
    motionToggle.addEventListener('click', () => {
        settings.reducedMotion = !settings.reducedMotion;
        document.body.classList.toggle('reduced-motion');
        motionToggle.setAttribute('aria-pressed', settings.reducedMotion);
        localStorage.setItem('accessibility-reduced-motion', settings.reducedMotion);
    });
});