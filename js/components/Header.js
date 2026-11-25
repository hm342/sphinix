/**
 * Header.js — Sticky Header with Scroll Detection
 */

class Header {
  constructor() {
    this.header = document.querySelector('.ohio-header');
    this.stickyOffset = 150;
    this.lastScrollY = 0;
    this.ticking = false;
    this.init();
  }

  init() {
    if (!this.header) return;

    this.stickyOffset = parseInt(this.header.dataset.stickyOffset) || 150;
    this.bindEvents();
  }

  bindEvents() {
    window.addEventListener('scroll', () => this.onScroll(), { passive: true });
  }

  onScroll() {
    if (!this.ticking) {
      window.requestAnimationFrame(() => {
        this.updateHeader();
        this.ticking = false;
      });
      this.ticking = true;
    }
  }

  updateHeader() {
    const scrollY = window.scrollY;

    if (scrollY > this.stickyOffset) {
      this.header.classList.add('is-sticky');
    } else {
      this.header.classList.remove('is-sticky');
    }

    this.lastScrollY = scrollY;
  }
}

// Initialize
document.addEventListener('DOMContentLoaded', () => {
  window.header = new Header();
});

if (typeof module !== 'undefined' && module.exports) {
  module.exports = Header;
}