/**
 * main.js — Sphinix Marketing Client Interactions
 * Strict implementation of RULES.md & DESIGN.md
 */

document.addEventListener('DOMContentLoaded', () => {
  initHeatBar();
  initProofWallEntrance();
  initMobileMenu();
  initFormValidation();
  initFilterChips();
});

/* 1. Scroll Heat Bar (RULES.md 4, 5, DESIGN.md 7) */
function initHeatBar() {
  const heatBar = document.getElementById('heat-bar');
  if (!heatBar) return;

  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
    heatBar.style.display = 'none';
    return;
  }

  let ticking = false;

  function updateScrollProgress() {
    const scrollTop = window.scrollY || document.documentElement.scrollTop;
    const docHeight = document.documentElement.scrollHeight - window.innerHeight;
    const progress = docHeight > 0 ? (scrollTop / docHeight) * 100 : 0;
    heatBar.style.width = `${Math.min(100, Math.max(0, progress))}%`;
    ticking = false;
  }

  window.addEventListener('scroll', () => {
    if (!ticking) {
      window.requestAnimationFrame(updateScrollProgress);
      ticking = true;
    }
  }, { passive: true });

  updateScrollProgress();
}

/* 2. Hero Proof Wall Entrance (RULES.md 5: plays once per session, <= 900ms) */
function initProofWallEntrance() {
  const proofWall = document.getElementById('hero-proof-wall');
  if (!proofWall) return;

  if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

  // Check session storage so it only plays once
  if (sessionStorage.getItem('sphinix_proof_entered')) return;

  const tiles = proofWall.querySelectorAll('.proof-tile');
  tiles.forEach((tile, idx) => {
    tile.style.opacity = '0';
    tile.style.transform = 'translateY(24px)';
    tile.style.transition = `opacity 500ms cubic-bezier(0.16, 1, 0.3, 1) ${idx * 90}ms, transform 500ms cubic-bezier(0.16, 1, 0.3, 1) ${idx * 90}ms`;

    setTimeout(() => {
      tile.style.opacity = '1';
      tile.style.transform = 'translateY(0)';
    }, 100);
  });

  sessionStorage.setItem('sphinix_proof_entered', 'true');
}

/* 3. Full-Height Accessible Mobile Menu (RULES.md 6) */
function initMobileMenu() {
  const menuBtn = document.getElementById('mobile-menu-toggle');
  const menuOverlay = document.getElementById('mobile-menu-overlay');
  const menuCloseBtn = document.getElementById('mobile-menu-close');
  if (!menuBtn || !menuOverlay) return;

  function openMenu() {
    menuOverlay.classList.add('open');
    menuBtn.setAttribute('aria-expanded', 'true');
    menuOverlay.setAttribute('aria-hidden', 'false');
    document.body.style.overflow = 'hidden';
  }

  function closeMenu() {
    menuOverlay.classList.remove('open');
    menuBtn.setAttribute('aria-expanded', 'false');
    menuOverlay.setAttribute('aria-hidden', 'true');
    document.body.style.overflow = '';
  }

  menuBtn.addEventListener('click', openMenu);
  if (menuCloseBtn) menuCloseBtn.addEventListener('click', closeMenu);

  menuOverlay.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', closeMenu);
  });

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && menuOverlay.classList.contains('open')) {
      closeMenu();
    }
  });
}

/* 4. Client Inquiry Form Validation (RULES.md 4, 10) */
function initFormValidation() {
  const form = document.getElementById('growth-form') || document.getElementById('inquiry-form');
  const alertBox = document.getElementById('form-alert') || document.getElementById('form-feedback');
  if (!form) return;

  form.addEventListener('submit', (e) => {
    e.preventDefault();

    const nameInput = form.querySelector('#lead-name') || form.querySelector('#input-name');
    const phoneInput = form.querySelector('#lead-phone') || form.querySelector('#input-phone');
    const businessInput = form.querySelector('#lead-business') || form.querySelector('#input-business');
    const needInput = form.querySelector('#lead-need') || form.querySelector('#input-need');

    const name = nameInput ? nameInput.value.trim() : '';
    const phone = phoneInput ? phoneInput.value.trim() : '';
    const business = businessInput ? businessInput.value.trim() : '';
    const need = needInput ? needInput.value : '';

    if (!name) {
      showFeedback('Please enter your full name.', 'error');
      if (nameInput) nameInput.focus();
      return;
    }

    if (!phone || phone.replace(/\D/g, '').length < 10) {
      showFeedback('Please enter a valid 10-digit WhatsApp number.', 'error');
      if (phoneInput) phoneInput.focus();
      return;
    }

    showFeedback(`Thank you ${name}. Connecting you to our Bhavnagar strategy desk on WhatsApp...`, 'ok');

    const waText = encodeURIComponent(
      `Hello Sphinix team! My name is ${name}. I submitted an inquiry for: "${need}". Business: ${business || 'Not specified'}, Phone: ${phone}`
    );

    setTimeout(() => {
      window.open(`https://wa.me/917048239155?text=${waText}`, '_blank');
      form.reset();
    }, 1200);
  });

  function showFeedback(msg, type) {
    if (!alertBox) return;
    alertBox.style.display = 'block';
    alertBox.textContent = msg;
    if (type === 'ok') {
      alertBox.style.backgroundColor = 'var(--spark)';
      alertBox.style.color = 'var(--coal)';
      alertBox.style.border = '1px solid var(--flame)';
    } else {
      alertBox.style.backgroundColor = '#FDE8E8';
      alertBox.style.color = 'var(--error)';
      alertBox.style.border = '1px solid var(--error)';
    }
  }
}

/* 5. Filter Chips for Selected Work */
function initFilterChips() {
  const chips = document.querySelectorAll('.js-filter-chip');
  const cards = document.querySelectorAll('.js-work-card');
  if (!chips.length || !cards.length) return;

  chips.forEach(chip => {
    chip.addEventListener('click', () => {
      chips.forEach(c => c.classList.remove('active'));
      chip.classList.add('active');

      const filter = chip.getAttribute('data-filter') || 'all';

      cards.forEach(card => {
        const cat = card.getAttribute('data-category') || '';
        if (filter === 'all' || cat.includes(filter)) {
          card.style.display = '';
        } else {
          card.style.display = 'none';
        }
      });
    });
  });
}
