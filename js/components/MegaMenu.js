/**
 * MegaMenu.js — Keyboard Accessible Mega Menu
 */

class MegaMenu {
  constructor() {
    this.triggers = document.querySelectorAll('[data-mega-trigger]');
    this.panels = document.querySelectorAll('.mega-menu-panel');
    this.activeTrigger = null;
    this.closeTimer = null;
    this.init();
  }

  init() {
    this.bindEvents();
    this.bindKeyboard();
  }

  bindEvents() {
    this.triggers.forEach(trigger => {
      const panel = trigger.nextElementSibling;

      // Mouse enter
      trigger.addEventListener('mouseenter', () => this.open(trigger, panel));
      panel?.addEventListener('mouseenter', () => this.clearCloseTimer());

      // Mouse leave
      trigger.addEventListener('mouseleave', () => this.startCloseTimer(trigger, panel));
      panel?.addEventListener('mouseleave', () => this.startCloseTimer(trigger, panel));

      // Click for mobile/touch
      trigger.addEventListener('click', (e) => {
        e.preventDefault();
        if (window.innerWidth < 992) {
          this.toggle(trigger, panel);
        }
      });
    });

    // Close on outside click
    document.addEventListener('click', (e) => {
      if (!e.target.closest('.has-mega-menu')) {
        this.closeAll();
      }
    });

    // Close on escape
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') {
        this.closeAll();
      }
    });
  }

  bindKeyboard() {
    this.triggers.forEach((trigger, index) => {
      trigger.addEventListener('keydown', (e) => {
        switch (e.key) {
          case 'Enter':
          case ' ':
            e.preventDefault();
            const panel = trigger.nextElementSibling;
            this.toggle(trigger, panel);
            break;
          case 'ArrowRight':
            e.preventDefault();
            this.focusNext(index);
            break;
          case 'ArrowLeft':
            e.preventDefault();
            this.focusPrev(index);
            break;
          case 'Escape':
            this.closeAll();
            trigger.focus();
            break;
        }
      });
    });

    // Keyboard navigation within panels
    this.panels.forEach(panel => {
      const links = panel.querySelectorAll('.mega-sub-link');
      links.forEach((link, index) => {
        link.addEventListener('keydown', (e) => {
          if (e.key === 'ArrowDown') {
            e.preventDefault();
            this.focusLink(links, index + 1);
          } else if (e.key === 'ArrowUp') {
            e.preventDefault();
            this.focusLink(links, index - 1);
          } else if (e.key === 'Escape') {
            this.closeAll();
            this.activeTrigger?.focus();
          }
        });
      });
    });
  }

  open(trigger, panel) {
    this.clearCloseTimer();
    this.closeAll();
    this.activeTrigger = trigger;

    trigger.setAttribute('aria-expanded', 'true');
    panel?.classList.add('active');
    panel?.removeAttribute('hidden');
  }

  close(trigger, panel) {
    trigger?.setAttribute('aria-expanded', 'false');
    panel?.classList.remove('active');
    panel?.setAttribute('hidden', '');
  }

  toggle(trigger, panel) {
    const isExpanded = trigger.getAttribute('aria-expanded') === 'true';
    if (isExpanded) {
      this.close(trigger, panel);
      this.activeTrigger = null;
    } else {
      this.open(trigger, panel);
    }
  }

  closeAll() {
    this.triggers.forEach(trigger => {
      const panel = trigger.nextElementSibling;
      this.close(trigger, panel);
    });
    this.activeTrigger = null;
  }

  startCloseTimer(trigger, panel) {
    this.clearCloseTimer();
    this.closeTimer = setTimeout(() => {
      this.close(trigger, panel);
      if (this.activeTrigger === trigger) this.activeTrigger = null;
    }, 200);
  }

  clearCloseTimer() {
    if (this.closeTimer) {
      clearTimeout(this.closeTimer);
      this.closeTimer = null;
    }
  }

  focusNext(currentIndex) {
    const nextIndex = (currentIndex + 1) % this.triggers.length;
    this.triggers[nextIndex].focus();
  }

  focusPrev(currentIndex) {
    const prevIndex = (currentIndex - 1 + this.triggers.length) % this.triggers.length;
    this.triggers[prevIndex].focus();
  }

  focusLink(links, index) {
    if (index >= 0 && index < links.length) {
      links[index].focus();
    }
  }
}

// Initialize
document.addEventListener('DOMContentLoaded', () => {
  window.megaMenu = new MegaMenu();
});

if (typeof module !== 'undefined' && module.exports) {
  module.exports = MegaMenu;
}