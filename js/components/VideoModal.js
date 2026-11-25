/**
 * VideoModal.js — Vimeo/YouTube Video Modal
 */

class VideoModal {
  constructor() {
    this.modal = document.getElementById('video-modal');
    this.triggers = document.querySelectorAll('[data-video]');
    this.closeBtn = document.querySelector('[data-video-close]');
    this.iframe = document.getElementById('video-iframe');
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
        const videoUrl = trigger.dataset.video;
        if (videoUrl) {
          this.open(videoUrl);
        }
      });
    });
  }

  bindClose() {
    this.closeBtn?.addEventListener('click', () => this.close());

    // Close on backdrop click
    this.modal?.addEventListener('click', (e) => {
      if (e.target === this.modal) {
        this.close();
      }
    });
  }

  bindKeyboard() {
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && this.isOpen()) {
        this.close();
      }
    });
  }

  open(videoUrl) {
    // Convert Vimeo/YouTube URLs to embed URLs
    let embedUrl = videoUrl;

    // Vimeo
    if (videoUrl.includes('vimeo.com')) {
      const videoId = videoUrl.split('/').pop();
      embedUrl = `https://player.vimeo.com/video/${videoId}?autoplay=1&muted=1`;
    }
    // YouTube
    else if (videoUrl.includes('youtube.com') || videoUrl.includes('youtu.be')) {
      let videoId = '';
      if (videoUrl.includes('youtube.com/watch')) {
        videoId = new URL(videoUrl).searchParams.get('v');
      } else if (videoUrl.includes('youtu.be/')) {
        videoId = videoUrl.split('youtu.be/')[1].split('?')[0];
      }
      embedUrl = `https://www.youtube.com/embed/${videoId}?autoplay=1&mute=1`;
    }

    this.iframe.src = embedUrl;
    this.modal?.removeAttribute('hidden');
    this.modal?.classList.add('open');
    document.body.style.overflow = 'hidden';
  }

  close() {
    this.iframe.src = '';
    this.modal?.classList.remove('open');
    document.body.style.overflow = '';
  }

  isOpen() {
    return this.modal && !this.modal.hasAttribute('hidden');
  }
}

// Initialize
document.addEventListener('DOMContentLoaded', () => {
  window.videoModal = new VideoModal();
});

if (typeof module !== 'undefined' && module.exports) {
  module.exports = VideoModal;
}