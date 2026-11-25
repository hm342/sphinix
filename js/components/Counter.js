/**
 * Counter.js — Animated Number Counter with IntersectionObserver
 */

class Counter {
  constructor() {
    this.counters = document.querySelectorAll('[data-counter]');
    this.animated = new WeakSet();
    this.init();
  }

  init() {
    if (!this.counters.length) return;

    this.observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting && !this.animated.has(entry.target)) {
          this.animate(entry.target);
          this.animated.add(entry.target);
        }
      });
    }, {
      rootMargin: '0px 0px -100px 0px',
      threshold: 0.5
    });

    this.counters.forEach(counter => this.observer.observe(counter));
  }

  animate(element) {
    const target = parseInt(element.dataset.counter, 10);
    const suffix = element.dataset.suffix || '';
    const countEl = element.querySelector('.count');
    const duration = 2000; // 2 seconds
    const startTime = performance.now();

    const animate = (currentTime) => {
      const elapsed = currentTime - startTime;
      const progress = Math.min(elapsed / duration, 1);

      // Easing: cubic-bezier(0.22, 1, 0.36, 1)
      const eased = this.easeOutCubic(progress);
      const current = Math.floor(target * eased);

      if (countEl) {
        countEl.textContent = current.toLocaleString();
      }

      if (progress < 1) {
        requestAnimationFrame(animate);
      } else {
        if (countEl) {
          countEl.textContent = target.toLocaleString();
        }
      }
    };

    requestAnimationFrame(animate);
  }

  easeOutCubic(t) {
    return 1 - Math.pow(1 - t, 3);
  }
}

// Initialize
document.addEventListener('DOMContentLoaded', () => {
  window.counter = new Counter();
});

if (typeof module !== 'undefined' && module.exports) {
  module.exports = Counter;
}