/**
 * SearchPopup.js — Full-screen Search Modal
 */

class SearchPopup {
  constructor() {
    this.popup = document.getElementById('search-popup');
    this.triggers = document.querySelectorAll('[data-search-toggle]');
    this.closeBtn = document.querySelector('[data-search-close]');
    this.input = document.getElementById('search-input');
    this.isOpen = false;
    this.init();
  }

  init() {
    this.bindTriggers();
    this.bindClose();
    this.bindKeyboard();
  }

  bindTriggers() {
    this.triggers.forEach(trigger => {
      trigger.addEventListener('click', (e) => {
        e.preventDefault();
        this.open();
      });
    });
  }

  bindClose() {
    this.closeBtn?.addEventListener('click', () => this.close());

    // Close on backdrop click
    this.popup?.addEventListener('click', (e) => {
      if (e.target === this.popup) {
        this.close();
      }
    });
  }

  bindKeyboard() {
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && this.isOpen) {
        this.close();
      }

      // Open with Ctrl/Cmd + K
      if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
        e.preventDefault();
        if (!this.isOpen) {
          this.open();
        }
      }
    });
  }

  open() {
    this.popup?.removeAttribute('hidden');
    this.popup?.classList.add('open');
    document.body.style.overflow = 'hidden';
    this.isOpen = true;

    // Focus input
    setTimeout(() => this.input?.focus(), 100);
  }

  close() {
    this.popup?.classList.remove('open');
    document.body.style.overflow = '';
    this.isOpen = false;

    // Clear input
    if (this.input) {
      this.input.value = '';
    }

    // Return focus to trigger
    const trigger = document.querySelector('[data-search-toggle]');
    trigger?.focus();
  }
}

// Initialize
document.addEventListener('DOMContentLoaded', () => {
  window.searchPopup = new SearchPopup();
});

if (typeof module !== 'undefined' && module.exports) {
  module.exports = SearchPopup;
}