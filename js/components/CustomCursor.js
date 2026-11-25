/**
 * CustomCursor.js — Ohio-style Custom Cursor
 */

class CustomCursor {
  constructor() {
    this.outer = document.querySelector('.cursor-outer');
    this.inner = document.querySelector('.cursor-inner');
    this.mouseX = 0;
    this.mouseY = 0;
    this.outerX = 0;
    this.outerY = 0;
    this.innerX = 0;
    this.innerY = 0;
    this.isVisible = true;
    this.rafId = null;
    this.init();
  }

  init() {
    // Disable on touch devices
    if (window.matchMedia('(pointer: coarse)').matches) {
      this.disable();
      return;
    }

    this.bindEvents();
    this.animate();
  }

  bindEvents() {
    document.addEventListener('mousemove', (e) => this.onMouseMove(e));
    document.addEventListener('mouseenter', () => this.show());
    document.addEventListener('mouseleave', () => this.hide());

    // Link/button hover detection
    const interactiveElements = document.querySelectorAll('a, button, [data-cursor-link], [role="button"], input, select, textarea');
    interactiveElements.forEach(el => {
      el.addEventListener('mouseenter', () => this.setLinkState(true));
      el.addEventListener('mouseleave', () => this.setLinkState(false));
    });

    // Text input detection
    const textInputs = document.querySelectorAll('input[type="text"], input[type="email"], input[type="search"], textarea');
    textInputs.forEach(input => {
      input.addEventListener('focus', () => this.setTextState(true));
      input.addEventListener('blur', () => this.setTextState(false));
    });

    // Wait state detection
    document.addEventListener('click', () => this.setWaitState());
  }

  onMouseMove(e) {
    this.mouseX = e.clientX;
    this.mouseY = e.clientY;
  }

  animate() {
    // Smooth follow for outer cursor
    this.outerX += (this.mouseX - this.outerX) * 0.15;
    this.outerY += (this.mouseY - this.outerY) * 0.15;

    // Faster follow for inner cursor
    this.innerX += (this.mouseX - this.innerX) * 0.3;
    this.innerY += (this.mouseY - this.innerY) * 0.3;

    if (this.outer) {
      this.outer.style.transform = `translate(${this.outerX}px, ${this.outerY}px)`;
    }

    if (this.inner) {
      this.inner.style.transform = `translate(${this.innerX}px, ${this.innerY}px)`;
    }

    this.rafId = requestAnimationFrame(() => this.animate());
  }

  show() {
    this.isVisible = true;
    this.outer?.classList.remove('hidden');
    this.inner?.classList.remove('hidden');
  }

  hide() {
    this.isVisible = false;
    this.outer?.classList.add('hidden');
    this.inner?.classList.add('hidden');
  }

  setLinkState(isLink) {
    if (this.inner) {
      this.inner.classList.toggle('cursor-link', isLink);
    }
  }

  setTextState(isText) {
    if (this.inner) {
      this.inner.classList.toggle('cursor-text', isText);
    }
  }

  setWaitState() {
    if (this.inner) {
      this.inner.classList.add('cursor-wait');
      setTimeout(() => this.inner.classList.remove('cursor-wait'), 500);
    }
  }

  disable() {
    this.outer?.classList.add('hidden');
    this.inner?.classList.add('hidden');
    if (this.rafId) {
      cancelAnimationFrame(this.rafId);
    }
  }
}

// Initialize
document.addEventListener('DOMContentLoaded', () => {
  window.customCursor = new CustomCursor();
});

if (typeof module !== 'undefined' && module.exports) {
  module.exports = CustomCursor;
}