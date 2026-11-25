/**
 * Tabs.js — Accessible Tab Navigation
 */

class Tabs {
  constructor() {
    this.tabLists = document.querySelectorAll('[role="tablist"]');
    this.init();
  }

  init() {
    this.tabLists.forEach(tabList => this.setupTabs(tabList));
  }

  setupTabs(tabList) {
    const tabs = tabList.querySelectorAll('[role="tab"]');
    const panels = [];

    tabs.forEach(tab => {
      const panelId = tab.getAttribute('aria-controls');
      const panel = document.getElementById(panelId);
      if (panel) panels.push(panel);

      tab.addEventListener('click', () => this.activateTab(tab, tabs, panels));
      tab.addEventListener('keydown', (e) => this.handleKeydown(e, tabs));
    });
  }

  activateTab(selectedTab, tabs, panels) {
    // Deactivate all tabs
    tabs.forEach(tab => {
      tab.setAttribute('aria-selected', 'false');
      tab.removeAttribute('tabindex');
    });

    // Hide all panels
    panels.forEach(panel => {
      panel.hidden = true;
      panel.classList.remove('active');
    });

    // Activate selected tab
    selectedTab.setAttribute('aria-selected', 'true');
    selectedTab.setAttribute('tabindex', '0');

    // Show corresponding panel
    const panelId = selectedTab.getAttribute('aria-controls');
    const panel = document.getElementById(panelId);
    if (panel) {
      panel.hidden = false;
      panel.classList.add('active');
    }
  }

  handleKeydown(e, tabs) {
    const currentIndex = Array.from(tabs).findIndex(t => t === e.target);
    let newIndex = currentIndex;

    switch (e.key) {
      case 'ArrowLeft':
        e.preventDefault();
        newIndex = currentIndex > 0 ? currentIndex - 1 : tabs.length - 1;
        break;
      case 'ArrowRight':
        e.preventDefault();
        newIndex = currentIndex < tabs.length - 1 ? currentIndex + 1 : 0;
        break;
      case 'Home':
        e.preventDefault();
        newIndex = 0;
        break;
      case 'End':
        e.preventDefault();
        newIndex = tabs.length - 1;
        break;
      default:
        return;
    }

    tabs[newIndex].focus();
    tabs[newIndex].click();
  }
}

// Initialize
document.addEventListener('DOMContentLoaded', () => {
  window.tabs = new Tabs();
});

if (typeof module !== 'undefined' && module.exports) {
  module.exports = Tabs;
}