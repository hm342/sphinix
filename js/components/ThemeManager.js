/**
 * ThemeManager.js — Dark/Light Mode with localStorage & System Sync
 */

class ThemeManager {
  constructor() {
    this.theme = 'light';
    this.init();
  }

  init() {
    // Check localStorage first
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme) {
      this.theme = savedTheme;
    } else {
      // Fall back to system preference
      this.theme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
    }

    this.applyTheme();
    this.bindToggle();
    this.syncSystemPreference();
  }

  applyTheme() {
    document.documentElement.setAttribute('data-theme', this.theme);
    this.updateToggleIcons();
  }

  updateToggleIcons() {
    const toggles = document.querySelectorAll('[data-theme-toggle]');
    toggles.forEach(toggle => {
      toggle.setAttribute('aria-label', this.theme === 'dark' ? 'Switch to light mode' : 'Switch to dark mode');
    });
  }

  toggle() {
    this.theme = this.theme === 'light' ? 'dark' : 'light';
    localStorage.setItem('theme', this.theme);
    this.applyTheme();
    this.announceChange();
  }

  bindToggle() {
    document.querySelectorAll('[data-theme-toggle]').forEach(btn => {
      btn.addEventListener('click', () => this.toggle());
    });
  }

  syncSystemPreference() {
    const mediaQuery = window.matchMedia('(prefers-color-scheme: dark)');
    mediaQuery.addEventListener('change', (e) => {
      // Only auto-switch if user hasn't manually set a preference
      if (!localStorage.getItem('theme')) {
        this.theme = e.matches ? 'dark' : 'light';
        this.applyTheme();
      }
    });
  }

  announceChange() {
    // Announce to screen readers
    const announcement = document.createElement('div');
    announcement.setAttribute('role', 'status');
    announcement.setAttribute('aria-live', 'polite');
    announcement.className = 'visually-hidden';
    announcement.textContent = `Theme changed to ${this.theme} mode`;
    document.body.appendChild(announcement);
    setTimeout(() => announcement.remove(), 1000);
  }

  // Public API
  getTheme() {
    return this.theme;
  }

  setTheme(theme) {
    if (['light', 'dark'].includes(theme)) {
      this.theme = theme;
      localStorage.setItem('theme', theme);
      this.applyTheme();
    }
  }
}

// Initialize on DOM ready
document.addEventListener('DOMContentLoaded', () => {
  window.themeManager = new ThemeManager();
});

// Export for module usage
if (typeof module !== 'undefined' && module.exports) {
  module.exports = ThemeManager;
}