/**
 * HamburgerPopup.js — Mobile Full-screen Navigation
 */

class HamburgerPopup {
  constructor() {
    this.popup = document.getElementById('hamburger-popup');
    this.triggers = document.querySelectorAll('[data-hamburger-toggle]');
    this.closeBtn = document.querySelector('[data-hamburger-close]');
    this.submenuTriggers = document.querySelectorAll('.mobile-submenu-trigger');
    this.isOpen = false;
    this.init();
  }

  init() {
    this.bindTriggers();
    this.bindClose();
    this.bindSubmenus();
    this.bindKeyboard();
    this.bindResize();
  }

  bindTriggers() {
    this.triggers.forEach(trigger => {
      trigger.addEventListener('click', (e) => {
        e.preventDefault();
        this.toggle();
      });
    });
  }

  bindClose() {
    this.closeBtn?.addEventListener('click', () => this.close());
  }

  bindSubmenus() {
    this.submenuTriggers.forEach(trigger => {
      trigger.addEventListener('click', () => this.toggleSubmenu(trigger));
    });
  }

  bindKeyboard() {
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && this.isOpen) {
        this.close();
      }
    });

    // Trap focus within popup
    this.popup?.addEventListener('keydown', (e) => {
      if (e.key === 'Tab') {
        this.trapFocus(e);
      }
    });
  }

  bindResize() {
    window.addEventListener('resize', () => {
      if (window.innerWidth >= 992 && this.isOpen) {
        this.close();
      }
    });
  }

  open() {
    this.popup?.removeAttribute('hidden');
    this.popup?.classList.add('open');
    document.body.style.overflow = 'hidden';
    this.isOpen = true;

    // Update trigger aria-expanded
    this.triggers.forEach(t => t.setAttribute('aria-expanded', 'true'));

    // Focus first focusable element
    const firstFocusable = this.popup?.querySelector('button, a, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');
    setTimeout(() => firstFocusable?.focus(), 100);
  }

  close() {
    this.popup?.classList.remove('open');
    document.body.style.overflow = '';
    this.isOpen = false;

    // Update trigger aria-expanded
    this.triggers.forEach(t => t.setAttribute('aria-expanded', 'false'));

    // Close all submenus
    this.submenuTriggers.forEach(t => {
      t.setAttribute('aria-expanded', 'false');
      const submenu = document.getElementById(t.getAttribute('aria-controls'));
      submenu?.setAttribute('hidden', '');
    });

    // Return focus to trigger
    const trigger = document.querySelector('[data-hamburger-toggle].mobile-hamburger');
    trigger?.focus();
  }

  toggle() {
    if (this.isOpen) {
      this.close();
    } else {
      this.open();
    }
  }

  toggleSubmenu(trigger) {
    const isExpanded = trigger.getAttribute('aria-expanded') === 'true';
    const submenuId = trigger.getAttribute('aria-controls');
    const submenu = document.getElementById(submenuId);

    trigger.setAttribute('aria-expanded', !isExpanded);
    submenu?.toggleAttribute('hidden', isExpanded);

    // Rotate chevron
    const chevron = trigger.querySelector('.submenu-chevron');
    if (chevron) {
      chevron.style.transform = isExpanded ? 'rotate(0deg)' : 'rotate(180deg)';
    }
  }

  trapFocus(e) {
    const focusableElements = this.popup?.querySelectorAll(
      'button, a, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
    );

    if (!focusableElements?.length) return;

    const firstElement = focusableElements[0];
    const lastElement = focusableElements[focusableElements.length - 1];

    if (e.shiftKey && document.activeElement === firstElement) {
      e.preventDefault();
      lastElement.focus();
    } else if (!e.shiftKey && document.activeElement === lastElement) {
      e.preventDefault();
      firstElement.focus();
    }
  }
}

// Initialize
document.addEventListener('DOMContentLoaded', () => {
  window.hamburgerPopup = new HamburgerPopup();
});

if (typeof module !== 'undefined' && module.exports) {
  module.exports = HamburgerPopup;
}