/**
 * Carousel.js — Touch/Swipe Carousel with Keyboard Navigation
 */

class Carousel {
  constructor() {
    this.carousels = document.querySelectorAll('.testimonial-carousel');
    this.init();
  }

  init() {
    this.carousels.forEach(carousel => this.setupCarousel(carousel));
  }

  setupCarousel(carousel) {
    const track = carousel.querySelector('.carousel-track');
    const cards = carousel.querySelectorAll('.testimonial-card');
    const prevBtn = carousel.querySelector('.carousel-prev');
    const nextBtn = carousel.querySelector('.carousel-next');
    const dotsContainer = carousel.querySelector('.carousel-dots');

    const config = {
      autoplay: carousel.dataset.autoplay === 'true',
      loop: carousel.dataset.loop === 'true',
      items: parseInt(carousel.dataset.items) || 1,
      gap: parseInt(carousel.dataset.gap) || 32,
      nav: carousel.dataset.nav === 'true',
      dots: carousel.dataset.dots === 'true'
    };

    let currentIndex = 0;
    let autoplayTimer = null;
    let isDragging = false;
    let startX = 0;
    let currentTranslate = 0;

    // Create dots
    if (config.dots && dotsContainer) {
      cards.forEach((_, index) => {
        const dot = document.createElement('button');
        dot.setAttribute('role', 'tab');
        dot.setAttribute('aria-label', `Go to slide ${index + 1}`);
        dot.setAttribute('aria-selected', index === 0 ? 'true' : 'false');
        dot.addEventListener('click', () => goToSlide(index));
        dotsContainer.appendChild(dot);
      });
    }

    const dots = dotsContainer?.querySelectorAll('button[role="tab"]') || [];

    function updateDots() {
      dots.forEach((dot, index) => {
        dot.setAttribute('aria-selected', index === currentIndex ? 'true' : 'false');
      });
    }

    function goToSlide(index) {
      if (index < 0) {
        index = config.loop ? cards.length - 1 : 0;
      } else if (index >= cards.length) {
        index = config.loop ? 0 : cards.length - 1;
      }

      currentIndex = index;
      const cardWidth = cards[0]?.offsetWidth || 0;
      const gap = config.gap;
      const translateX = -(currentIndex * (cardWidth + gap));

      track.style.transform = `translateX(${translateX}px)`;
      updateDots();
    }

    function nextSlide() {
      goToSlide(currentIndex + 1);
    }

    function prevSlide() {
      goToSlide(currentIndex - 1);
    }

    // Navigation buttons
    if (config.nav) {
      nextBtn?.addEventListener('click', nextSlide);
      prevBtn?.addEventListener('click', prevSlide);
    }

    // Autoplay
    function startAutoplay() {
      if (!config.autoplay) return;
      stopAutoplay();
      autoplayTimer = setInterval(nextSlide, 5000);
    }

    function stopAutoplay() {
      if (autoplayTimer) {
        clearInterval(autoplayTimer);
        autoplayTimer = null;
      }
    }

    // Pause on hover
    carousel.addEventListener('mouseenter', stopAutoplay);
    carousel.addEventListener('mouseleave', startAutoplay);

    // Touch/Swipe support
    track.addEventListener('touchstart', (e) => {
      isDragging = true;
      startX = e.touches[0].clientX;
      stopAutoplay();
    }, { passive: true });

    track.addEventListener('touchmove', (e) => {
      if (!isDragging) return;
      const deltaX = e.touches[0].clientX - startX;
      const cardWidth = cards[0]?.offsetWidth || 0;
      const gap = config.gap;
      const baseTranslate = -(currentIndex * (cardWidth + gap));
      track.style.transform = `translateX(${baseTranslate + deltaX}px)`;
    }, { passive: true });

    track.addEventListener('touchend', () => {
      isDragging = false;
      const deltaX = e.changedTouches[0].clientX - startX;
      const threshold = 50;

      if (deltaX > threshold) {
        prevSlide();
      } else if (deltaX < -threshold) {
        nextSlide();
      } else {
        goToSlide(currentIndex); // Snap back
      }

      startAutoplay();
    });

    // Keyboard navigation
    carousel.addEventListener('keydown', (e) => {
      if (e.key === 'ArrowLeft') {
        e.preventDefault();
        prevSlide();
      } else if (e.key === 'ArrowRight') {
        e.preventDefault();
        nextSlide();
      }
    });

    // Handle resize
    window.addEventListener('resize', () => {
      goToSlide(currentIndex);
    });

    // Start autoplay
    startAutoplay();
  }
}

// Initialize
document.addEventListener('DOMContentLoaded', () => {
  window.carousel = new Carousel();
});

if (typeof module !== 'undefined' && module.exports) {
  module.exports = Carousel;
}