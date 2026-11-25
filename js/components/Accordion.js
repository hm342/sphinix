/**
 * Accordion.js — Native <details> Accordion with Progress Bars
 */

class Accordion {
  constructor() {
    this.accordions = document.querySelectorAll('.accordion');
    this.init();
  }

  init() {
    this.accordions.forEach(accordion => {
      const allowMultiple = accordion.dataset.allowMultiple === 'true';
      const items = accordion.querySelectorAll('.accordion-item');

      items.forEach(item => {
        const summary = item.querySelector('.accordion-trigger');
        const content = item.querySelector('.accordion-content');
        const progressBars = item.querySelectorAll('.progress-fill');

        // Handle open/close
        summary?.addEventListener('click', (e) => {
          // Don't toggle if clicking on a link inside
          if (e.target.closest('a')) return;

          const isOpen = item.hasAttribute('open');

          if (!allowMultiple) {
            // Close all other items
            items.forEach(other => {
              if (other !== item) {
                other.removeAttribute('open');
                other.querySelectorAll('.progress-fill').forEach(bar => {
                  bar.style.transform = 'scaleX(0)';
                });
              }
            });
          }

          // Toggle current
          if (isOpen) {
            item.removeAttribute('open');
          } else {
            item.setAttribute('open', '');
            // Animate progress bars
            progressBars.forEach(bar => {
              const value = parseFloat(bar.parentElement.parentElement.dataset.value) || 0;
              bar.style.transform = `scaleX(${value / 100})`;
              bar.classList.add('animated');
            });
          }
        });
      });
    });
  }
}

// Initialize
document.addEventListener('DOMContentLoaded', () => {
  window.accordion = new Accordion();
});

if (typeof module !== 'undefined' && module.exports) {
  module.exports = Accordion;
}