/**
 * CircleProgress.js — SVG Circle Progress Bar Animation
 */

class CircleProgress {
  constructor() {
    this.circles = document.querySelectorAll('.circle-progress');
    this.animated = new WeakSet();
    this.init();
  }

  init() {
    if (!this.circles.length) return;

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

    this.circles.forEach(circle => this.observer.observe(circle));
  }

  animate(element) {
    const value = parseFloat(element.dataset.value) || 0;
    const progressPath = element.querySelector('.circle-progress-path');
    const countEl = element.querySelector('.count');
    const radius = 46;
    const circumference = 2 * Math.PI * radius;
    const duration = 2000;
    const startTime = performance.now();

    // Set CSS custom property for stroke-dashoffset calculation
    element.style.setProperty('--progress-value', value / 100);

    const animate = (currentTime) => {
      const elapsed = currentTime - startTime;
      const progress = Math.min(elapsed / duration, 1);

      // Easing: cubic-bezier(0.22, 1, 0.36, 1)
      const eased = this.easeOutCubic(progress);
      const current = value * eased;

      if (countEl) {
        countEl.textContent = Math.floor(current);
      }

      if (progress < 1) {
        requestAnimationFrame(animate);
      } else {
        if (countEl) {
          countEl.textContent = value;
        }
        element.classList.add('animated');
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
  window.circleProgress = new CircleProgress();
});

if (typeof module !== 'undefined' && module.exports) {
  module.exports = CircleProgress;
}