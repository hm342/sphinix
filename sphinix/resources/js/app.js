(function () {
    const reducedMotionQuery = window.matchMedia('(prefers-reduced-motion: reduce)');
    const finePointerQuery = window.matchMedia('(hover: hover) and (pointer: fine)');
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

    function initNavigation() {
        const siteHeader = document.getElementById('site-header');
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenuIcon = document.getElementById('mobile-menu-icon');
        const mobileMenu = document.getElementById('mobile-menu');

        function updateHeader() {
            if (!siteHeader) return;
            const mobileOpen = mobileMenu && !mobileMenu.classList.contains('hidden');
            siteHeader.classList.toggle('header-scrolled', window.scrollY > 16 || mobileOpen);
        }

        window.addEventListener('scroll', updateHeader, { passive: true });
        updateHeader();

        if (mobileMenuBtn && mobileMenu && mobileMenuIcon) {
            mobileMenuBtn.addEventListener('click', () => {
                const isOpen = !mobileMenu.classList.contains('hidden');
                mobileMenu.classList.toggle('hidden', isOpen);
                mobileMenuIcon.textContent = isOpen ? 'menu' : 'close';
                mobileMenuBtn.setAttribute('aria-expanded', String(!isOpen));
                updateHeader();
            });
        }

        const mobileServicesBtn = document.getElementById('mobile-services-btn');
        const mobileServicesPanel = document.getElementById('mobile-services-panel');
        const mobileServicesChevron = document.getElementById('mobile-services-chevron');
        if (mobileServicesBtn && mobileServicesPanel && mobileServicesChevron) {
            mobileServicesBtn.addEventListener('click', () => {
                const isOpen = mobileServicesPanel.classList.contains('flex');
                mobileServicesPanel.classList.toggle('hidden', isOpen);
                mobileServicesPanel.classList.toggle('flex', !isOpen);
                mobileServicesPanel.classList.toggle('flex-col', !isOpen);
                mobileServicesChevron.style.transform = isOpen ? '' : 'rotate(180deg)';
            });
        }

        const servicesNavItem = document.getElementById('services-nav-item');
        const servicesNavBtn = document.getElementById('services-nav-btn');
        const servicesMega = document.getElementById('services-mega');
        const servicesChevron = document.getElementById('services-chevron');

        if (servicesNavItem && servicesNavBtn && servicesMega && servicesChevron) {
            const openMega = () => {
                servicesMega.classList.remove('opacity-0', 'invisible', 'translate-y-1');
                servicesMega.classList.add('opacity-100', 'visible', 'translate-y-0');
                servicesMega.style.pointerEvents = 'auto';
                servicesChevron.style.transform = 'rotate(180deg)';
                servicesNavBtn.setAttribute('aria-expanded', 'true');
            };

            const closeMega = () => {
                servicesMega.classList.add('opacity-0', 'invisible', 'translate-y-1');
                servicesMega.classList.remove('opacity-100', 'visible', 'translate-y-0');
                servicesMega.style.pointerEvents = 'none';
                servicesChevron.style.transform = '';
                servicesNavBtn.setAttribute('aria-expanded', 'false');
            };

            let megaCloseTimer;
            servicesNavItem.addEventListener('mouseenter', () => {
                clearTimeout(megaCloseTimer);
                openMega();
            });
            servicesNavItem.addEventListener('mouseleave', () => {
                megaCloseTimer = setTimeout(closeMega, 120);
            });
            servicesNavBtn.addEventListener('click', () => {
                servicesMega.classList.contains('invisible') ? openMega() : closeMega();
            });
            servicesNavItem.addEventListener('focusout', (e) => {
                if (e.relatedTarget && !servicesNavItem.contains(e.relatedTarget)) {
                    closeMega();
                }
            });
            document.addEventListener('click', (e) => {
                if (!servicesNavItem.contains(e.target)) {
                    closeMega();
                }
            });
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape') {
                    closeMega();
                    if (mobileMenu && mobileMenuIcon && mobileMenuBtn && !mobileMenu.classList.contains('hidden')) {
                        mobileMenu.classList.add('hidden');
                        mobileMenuIcon.textContent = 'menu';
                        mobileMenuBtn.setAttribute('aria-expanded', 'false');
                        updateHeader();
                    }
                }
            });
        }
    }

    function initNewsletterForms() {
        document.querySelectorAll('.newsletter-form').forEach((form) => {
            form.addEventListener('submit', async (e) => {
                e.preventDefault();
                const input = form.querySelector('input[type="email"]');
                const status = form.parentElement?.querySelector('.newsletter-status');
                if (!input || !status) return;

                const val = input.value.trim();
                if (!val || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(val)) {
                    status.textContent = 'Please enter a valid work email.';
                    status.className = 'newsletter-status font-body text-[12px] text-[#BA1A1A]';
                    input.focus();
                    return;
                }

                try {
                    const response = await fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            Accept: 'application/json',
                            'X-CSRF-TOKEN': csrfToken,
                        },
                        body: JSON.stringify({ email: val }),
                    });
                    const payload = await response.json();
                    if (!response.ok) {
                        status.textContent = payload.message || 'Please enter a valid work email.';
                        status.className = 'newsletter-status font-body text-[12px] text-[#BA1A1A]';
                        return;
                    }
                    status.textContent = payload.message;
                    status.className = 'newsletter-status font-body text-[12px] text-[#16A34A]';
                    input.value = '';
                } catch {
                    status.textContent = 'Unable to submit right now. Please email info@sphinixmarketing.com directly.';
                    status.className = 'newsletter-status font-body text-[12px] text-[#A83300]';
                }
            });
        });
    }

    function initContactForm() {
        const contactForm = document.getElementById('contact-form');
        if (!contactForm) return;

        contactForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const name = document.getElementById('contact-name').value.trim();
            const email = document.getElementById('contact-email').value.trim();
            const phone = document.getElementById('contact-phone').value.trim();
            const service = document.getElementById('contact-service').value;
            const message = document.getElementById('contact-message').value.trim();
            const errBox = document.getElementById('form-error');
            const okBox = document.getElementById('form-success');

            if (!name || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email) || !phone || !service) {
                errBox.textContent = 'Please fill in your name, a valid work email, phone number, and primary service.';
                errBox.classList.remove('hidden');
                okBox.classList.add('hidden');
                return;
            }

            try {
                const response = await fetch(contactForm.action, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        Accept: 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify({ name, email, phone, service, message }),
                });
                const payload = await response.json();
                if (!response.ok) {
                    errBox.textContent = payload.message || 'Please check the form fields and try again.';
                    errBox.classList.remove('hidden');
                    okBox.classList.add('hidden');
                    return;
                }
                errBox.classList.add('hidden');
                okBox.textContent = payload.message;
                okBox.classList.remove('hidden');
                contactForm.reset();
            } catch {
                errBox.textContent = 'Unable to send right now. Please message us on WhatsApp or call +91 7048239155.';
                errBox.classList.remove('hidden');
                okBox.classList.add('hidden');
            }
        });
    }

    function initHomeTestimonials() {
        const carouselEl = document.getElementById('testimonial-carousel');
        const stageEl = document.getElementById('testimonial-stage');
        const quoteEl = document.getElementById('testimonial-quote');
        const authorEl = document.getElementById('testimonial-author');
        const roleEl = document.getElementById('testimonial-role');
        if (!carouselEl || !stageEl || !quoteEl || !authorEl || !roleEl) return;

        const TESTIMONIAL_AUTOPLAY_MS = 4500;
        const TESTIMONIAL_RESUME_DELAY_MS = 1000;
        const testimonials = [
            {
                quote: '[ADD REAL CLIENT QUOTE — Healthcare / Video Production review from verified client]',
                author: '[ADD CLIENT NAME]',
                role: '[ADD CLINIC OR COMPANY NAME]',
            },
            {
                quote: '[ADD REAL CLIENT QUOTE — Social Media or Facebook campaign review from verified client]',
                author: '[ADD CLIENT NAME]',
                role: '[ADD BUSINESS OR BRAND NAME]',
            },
            {
                quote: '[ADD REAL CLIENT QUOTE — Ongoing support and communication review from verified client]',
                author: '[ADD CLIENT NAME]',
                role: '[ADD CLIENT ROLE & COMPANY]',
            },
        ];

        let current = 0;
        let autoplayTimer = null;
        let resumeTimer = null;
        let fadeTimer = null;
        let isHovered = false;
        let hasFocusInside = false;

        const tabs = document.querySelectorAll('.testimonial-tab');
        const dots = document.querySelectorAll('.testimonial-dot');

        function updateAriaLive() {
            const pausedOrReduced = reducedMotionQuery.matches || isHovered || hasFocusInside || document.hidden;
            stageEl.setAttribute('aria-live', pausedOrReduced ? 'polite' : 'off');
        }

        function clearTimers() {
            if (autoplayTimer !== null) {
                clearInterval(autoplayTimer);
                autoplayTimer = null;
            }
            if (resumeTimer !== null) {
                clearTimeout(resumeTimer);
                resumeTimer = null;
            }
        }

        function startAutoplay() {
            clearTimers();
            if (reducedMotionQuery.matches || isHovered || hasFocusInside || document.hidden) {
                updateAriaLive();
                return;
            }
            updateAriaLive();
            autoplayTimer = setInterval(() => render(current + 1, false), TESTIMONIAL_AUTOPLAY_MS);
        }

        function scheduleResume() {
            clearTimers();
            updateAriaLive();
            if (reducedMotionQuery.matches || isHovered || hasFocusInside || document.hidden) return;
            resumeTimer = setTimeout(() => {
                resumeTimer = null;
                startAutoplay();
            }, TESTIMONIAL_RESUME_DELAY_MS);
        }

        function applySlideContent(index) {
            const item = testimonials[index];
            quoteEl.textContent = item.quote;
            authorEl.textContent = item.author;
            roleEl.textContent = item.role;

            tabs.forEach((tab, idx) => {
                const active = idx === index;
                tab.setAttribute('aria-selected', String(active));
                tab.classList.toggle('bg-light-primary', active);
                tab.classList.toggle('text-light-on-primary', active);
                tab.classList.toggle('bg-light-surface-container-low', !active);
                tab.classList.toggle('text-light-on-surface-variant', !active);
            });

            dots.forEach((dot, idx) => {
                const active = idx === index;
                dot.classList.toggle('bg-light-primary', active);
                dot.classList.toggle('bg-light-outline-variant', !active);
            });
        }

        function render(index, isManual = true) {
            const nextIndex = (index + testimonials.length) % testimonials.length;
            if (nextIndex === current && !isManual) return;
            current = nextIndex;

            if (fadeTimer !== null) {
                clearTimeout(fadeTimer);
                fadeTimer = null;
            }

            if (reducedMotionQuery.matches) {
                applySlideContent(current);
                stageEl.style.opacity = '1';
            } else {
                stageEl.style.opacity = '0';
                fadeTimer = setTimeout(() => {
                    fadeTimer = null;
                    applySlideContent(current);
                    stageEl.style.opacity = '1';
                }, 150);
            }

            if (isManual) startAutoplay();
        }

        tabs.forEach((tab) => tab.addEventListener('click', () => render(Number(tab.dataset.tab), true)));
        dots.forEach((dot) => dot.addEventListener('click', () => render(Number(dot.dataset.tabDot), true)));
        document.getElementById('prev-testimonial')?.addEventListener('click', () => render(current - 1, true));
        document.getElementById('next-testimonial')?.addEventListener('click', () => render(current + 1, true));

        carouselEl.addEventListener('mouseenter', () => {
            isHovered = true;
            clearTimers();
            updateAriaLive();
        });
        carouselEl.addEventListener('mouseleave', () => {
            isHovered = false;
            scheduleResume();
        });
        carouselEl.addEventListener('focusin', () => {
            hasFocusInside = true;
            clearTimers();
            updateAriaLive();
        });
        carouselEl.addEventListener('focusout', (e) => {
            if (e.relatedTarget && carouselEl.contains(e.relatedTarget)) return;
            hasFocusInside = false;
            scheduleResume();
        });

        document.addEventListener('visibilitychange', () => {
            if (document.hidden) {
                clearTimers();
                updateAriaLive();
            } else {
                startAutoplay();
            }
        });

        reducedMotionQuery.addEventListener('change', () => {
            if (reducedMotionQuery.matches) {
                clearTimers();
                stageEl.style.opacity = '1';
            } else {
                startAutoplay();
            }
            updateAriaLive();
        });

        window.addEventListener('pagehide', () => {
            clearTimers();
            if (fadeTimer !== null) {
                clearTimeout(fadeTimer);
                fadeTimer = null;
            }
        });

        startAutoplay();
    }

    function initHomeJournalSpread() {
        const insightsSpread = document.getElementById('insights-spread');
        const featuredCard = document.getElementById('insight-featured-card');
        const coverPrimary = document.getElementById('insight-cover-primary');
        const coverSecondary = document.getElementById('insight-cover-secondary');
        const stageBody = document.getElementById('insight-stage-body');
        if (!insightsSpread || !featuredCard || !coverPrimary || !coverSecondary || !stageBody) return;

        const stageBadge = document.getElementById('insight-stage-badge');
        const stageReadtime = document.getElementById('insight-stage-readtime');
        const stageKicker = document.getElementById('insight-stage-kicker');
        const stageTitle = document.getElementById('insight-stage-title');
        const stageDesc = document.getElementById('insight-stage-desc');
        const stageCta = document.getElementById('insight-stage-cta');
        const resetFeaturedBtn = document.getElementById('insight-reset-featured');
        const journalRows = document.querySelectorAll('.journal-row[data-insight-key]');
        const baseInsightsUrl = featuredCard.dataset.defaultHref || '/insights';

        const journalEntries = {
            featured: {
                badge: 'Featured Note',
                kicker: 'Editorial Cover',
                readTime: '[ADD READ TIME]',
                title: '[ADD REAL FEATURED ARTICLE TITLE]',
                desc: '[ADD REAL ONE-LINE SUMMARY AND VERIFIED METRIC]',
                cta: 'Read Featured Note',
                href: baseInsightsUrl,
                img: coverPrimary.dataset.featuredSrc || '/images/insight_featured_cover.jpg',
                alt: 'Warm directional sunlight across dark architectural desk and editorial proofs',
            },
        };

        journalRows.forEach((row) => {
            const key = row.dataset.insightKey;
            if (!key) return;
            journalEntries[key] = {
                badge: row.dataset.badge || key,
                kicker: 'Selected Entry',
                readTime: row.dataset.readTime || '[ADD READ TIME]',
                title: row.dataset.title || '',
                desc: row.dataset.desc || '',
                cta: row.dataset.cta || 'Read Note',
                href: row.getAttribute('href') || baseInsightsUrl,
                img: row.dataset.img || '',
                alt: row.dataset.alt || '',
            };
        });

        let activeInsightKey = 'featured';
        let activeCoverSlot = 0;
        let swapTimer = null;
        let resetTimer = null;
        let stageRequestId = 0;
        let preloaded = false;

        function preloadCovers() {
            if (preloaded) return;
            preloaded = true;
            Object.keys(journalEntries).forEach((k) => {
                if (k !== 'featured' && journalEntries[k].img) {
                    const preloadImg = new Image();
                    preloadImg.src = journalEntries[k].img;
                }
            });
        }

        function setJournalStage(key) {
            const entry = journalEntries[key];
            if (!entry || key === activeInsightKey) return;
            activeInsightKey = key;
            const reqId = ++stageRequestId;

            journalRows.forEach((row) => {
                row.classList.toggle('is-active', row.dataset.insightKey === key);
            });

            featuredCard.setAttribute('href', entry.href);

            const incoming = activeCoverSlot === 0 ? coverSecondary : coverPrimary;
            const outgoing = activeCoverSlot === 0 ? coverPrimary : coverSecondary;
            activeCoverSlot = activeCoverSlot === 0 ? 1 : 0;

            incoming.onload = null;
            outgoing.onload = null;
            incoming.src = entry.img;
            incoming.alt = entry.alt;
            incoming.removeAttribute('aria-hidden');
            outgoing.setAttribute('aria-hidden', 'true');

            const revealCover = () => {
                if (reqId !== stageRequestId) return;
                incoming.classList.remove('opacity-0');
                incoming.classList.add('opacity-100');
                outgoing.classList.remove('opacity-100');
                outgoing.classList.add('opacity-0');
            };

            if (incoming.complete) {
                revealCover();
            } else {
                incoming.onload = revealCover;
            }

            if (swapTimer !== null) {
                clearTimeout(swapTimer);
                swapTimer = null;
            }

            if (reducedMotionQuery.matches) {
                stageBadge.textContent = entry.badge;
                stageReadtime.textContent = entry.readTime;
                stageKicker.textContent = entry.kicker;
                stageTitle.textContent = entry.title;
                stageDesc.textContent = entry.desc;
                stageCta.textContent = entry.cta;
                return;
            }

            stageBody.classList.add('is-swapping');
            swapTimer = setTimeout(() => {
                swapTimer = null;
                stageBadge.textContent = entry.badge;
                stageReadtime.textContent = entry.readTime;
                stageKicker.textContent = entry.kicker;
                stageTitle.textContent = entry.title;
                stageDesc.textContent = entry.desc;
                stageCta.textContent = entry.cta;
                stageBody.classList.remove('is-swapping');
            }, 120);
        }

        insightsSpread.addEventListener('mouseenter', () => {
            preloadCovers();
            if (resetTimer !== null) {
                clearTimeout(resetTimer);
                resetTimer = null;
            }
        });

        insightsSpread.addEventListener('mouseleave', () => {
            if (!finePointerQuery.matches) return;
            resetTimer = setTimeout(() => {
                resetTimer = null;
                setJournalStage('featured');
            }, 140);
        });

        insightsSpread.addEventListener('focusout', (e) => {
            if (e.relatedTarget && insightsSpread.contains(e.relatedTarget)) return;
            setJournalStage('featured');
        });

        journalRows.forEach((row) => {
            row.addEventListener('mouseenter', () => {
                if (!finePointerQuery.matches) return;
                preloadCovers();
                if (resetTimer !== null) {
                    clearTimeout(resetTimer);
                    resetTimer = null;
                }
                setJournalStage(row.dataset.insightKey);
            });
            row.addEventListener('focusin', () => {
                preloadCovers();
                setJournalStage(row.dataset.insightKey);
            });
        });

        resetFeaturedBtn?.addEventListener('click', () => setJournalStage('featured'));
    }

    function initServicesAccordion() {
        const servicesAccordion = document.getElementById('services-accordion');
        if (!servicesAccordion) return;

        const serviceRows = Array.from(servicesAccordion.querySelectorAll('.service-row'));
        const stageImg = document.getElementById('services-stage-img');

        serviceRows.forEach((row) => {
            const src = row.dataset.serviceImg;
            if (src) {
                const preload = new Image();
                preload.src = src;
            }
        });

        function closeServiceRow(row) {
            if (!row) return;
            const btn = row.querySelector('.service-trigger');
            row.classList.remove('is-open');
            btn?.setAttribute('aria-expanded', 'false');
        }

        function openServiceRow(targetRow) {
            if (!targetRow) return;
            serviceRows.forEach((row) => {
                const btn = row.querySelector('.service-trigger');
                const active = row === targetRow;
                row.classList.toggle('is-open', active);
                btn?.setAttribute('aria-expanded', String(active));
            });

            const nextSrc = targetRow.dataset.serviceImg;
            const nextAlt = targetRow.dataset.serviceAlt;
            if (stageImg && nextSrc && stageImg.getAttribute('src') !== nextSrc) {
                stageImg.style.opacity = '0.35';
                setTimeout(() => {
                    stageImg.setAttribute('src', nextSrc);
                    stageImg.setAttribute('alt', nextAlt || '');
                    stageImg.style.opacity = '1';
                }, 120);
            }
        }

        serviceRows.forEach((row) => {
            const trigger = row.querySelector('.service-trigger');
            if (!trigger) return;

            row.addEventListener('mouseenter', () => {
                if (finePointerQuery.matches && !row.dataset.closedByClick) {
                    openServiceRow(row);
                }
            });
            row.addEventListener('mouseleave', () => {
                delete row.dataset.closedByClick;
            });
            trigger.addEventListener('click', (e) => {
                e.preventDefault();
                if (row.classList.contains('is-open')) {
                    closeServiceRow(row);
                    row.dataset.closedByClick = '1';
                } else {
                    delete row.dataset.closedByClick;
                    openServiceRow(row);
                }
            });
        });

        servicesAccordion.addEventListener('mouseleave', () => {
            if (finePointerQuery.matches) {
                serviceRows.forEach(closeServiceRow);
            }
        });

        function openFromHash() {
            const hash = window.location.hash.replace('#', '');
            if (!hash) return;
            const match = document.getElementById(hash);
            if (match && match.classList.contains('service-row')) {
                delete match.dataset.closedByClick;
                openServiceRow(match);
            }
        }

        window.addEventListener('hashchange', openFromHash);
        openFromHash();
    }

    function initWorkFilters() {
        const tabsRoot = document.getElementById('work-filter-tabs');
        if (!tabsRoot) return;

        const filterBtns = Array.from(tabsRoot.querySelectorAll('.filter-btn'));
        const projectCards = Array.from(document.querySelectorAll('.project-card'));
        const emptyState = document.getElementById('projects-empty');

        function applyFilter(filter, pushHash) {
            const valid = filterBtns.some((b) => b.dataset.filter === filter);
            const activeFilter = valid ? filter : 'all';

            filterBtns.forEach((b) => {
                const isMatch = b.dataset.filter === activeFilter;
                b.setAttribute('aria-selected', String(isMatch));
                b.classList.toggle('border-[#A83300]', isMatch);
                b.classList.toggle('text-[#A83300]', isMatch);
                b.classList.toggle('border-transparent', !isMatch);
                b.classList.toggle('text-[#18181B]', !isMatch);
            });

            let shown = 0;
            projectCards.forEach((card) => {
                const categories = (card.dataset.category || '').split(/\s+/);
                const show = activeFilter === 'all' || categories.includes(activeFilter);
                card.classList.toggle('hidden', !show);
                if (show) shown++;
            });

            emptyState?.classList.toggle('hidden', shown > 0);
            if (pushHash) {
                history.replaceState(null, '', activeFilter === 'all' ? location.pathname : '#' + activeFilter);
            }
        }

        filterBtns.forEach((btn, idx) => {
            btn.addEventListener('click', () => applyFilter(btn.dataset.filter, true));
            btn.addEventListener('keydown', (e) => {
                let next = -1;
                if (e.key === 'ArrowRight') next = (idx + 1) % filterBtns.length;
                else if (e.key === 'ArrowLeft') next = (idx - 1 + filterBtns.length) % filterBtns.length;
                else if (e.key === 'Home') next = 0;
                else if (e.key === 'End') next = filterBtns.length - 1;
                if (next >= 0) {
                    e.preventDefault();
                    filterBtns[next].focus();
                    applyFilter(filterBtns[next].dataset.filter, true);
                }
            });
        });

        window.addEventListener('hashchange', () => {
            const h = (location.hash || '').replace('#', '').trim();
            applyFilter(h || 'all', false);
        });

        const initialHash = (location.hash || '').replace('#', '').trim();
        applyFilter(initialHash || 'all', false);
    }

    function initCaseStudyMedia() {
        document.querySelectorAll('.case-video-stage').forEach((stage) => {
            const src = (stage.dataset.videoSrc || '').trim();
            if (!src) return;
            const title = stage.dataset.videoTitle || 'Campaign Video';
            const poster = (stage.dataset.videoPoster || '').trim();
            stage.innerHTML = '';
            stage.classList.remove('p-8', 'text-center');

            if (/youtube\.com|youtu\.be|vimeo\.com/i.test(src)) {
                const iframe = document.createElement('iframe');
                iframe.src = src;
                iframe.title = title;
                iframe.className = 'w-full h-full border-0';
                iframe.allow = 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share';
                iframe.allowFullscreen = true;
                iframe.loading = 'lazy';
                stage.appendChild(iframe);
            } else {
                const video = document.createElement('video');
                video.src = src;
                video.controls = true;
                video.playsInline = true;
                video.preload = 'metadata';
                if (poster) video.poster = poster;
                video.className = 'w-full h-full object-cover';
                video.setAttribute('aria-label', title);
                stage.appendChild(video);
            }
        });

        const galleryRegion = document.getElementById('case-gallery');
        const galleryTrack = document.getElementById('gallery-track');
        const gallerySlides = Array.from(document.querySelectorAll('.gallery-slide'));
        const galleryCounter = document.getElementById('gallery-counter');
        const galleryPrev = document.getElementById('gallery-prev');
        const galleryNext = document.getElementById('gallery-next');
        const galleryDots = Array.from(document.querySelectorAll('.gallery-dot'));

        if (galleryTrack && gallerySlides.length > 0) {
            let currentSlide = 0;
            const totalSlides = gallerySlides.length;

            function renderSlide(idx) {
                currentSlide = ((idx % totalSlides) + totalSlides) % totalSlides;
                galleryTrack.style.transform = `translateX(-${currentSlide * 100}%)`;
                if (galleryCounter) {
                    galleryCounter.textContent = `${String(currentSlide + 1).padStart(2, '0')} / ${String(totalSlides).padStart(2, '0')}`;
                }
                galleryDots.forEach((dot, dIdx) => {
                    const active = dIdx === currentSlide;
                    dot.setAttribute('aria-current', String(active));
                    dot.classList.toggle('w-7', active);
                    dot.classList.toggle('bg-[#A83300]', active);
                    dot.classList.toggle('w-2.5', !active);
                    dot.classList.toggle('bg-[#D4D0C8]', !active);
                });
            }

            galleryPrev?.addEventListener('click', () => renderSlide(currentSlide - 1));
            galleryNext?.addEventListener('click', () => renderSlide(currentSlide + 1));
            galleryDots.forEach((dot, dIdx) => dot.addEventListener('click', () => renderSlide(dIdx)));

            if (galleryRegion) {
                galleryRegion.addEventListener('keydown', (e) => {
                    if (e.key === 'ArrowLeft') {
                        e.preventDefault();
                        renderSlide(currentSlide - 1);
                    } else if (e.key === 'ArrowRight') {
                        e.preventDefault();
                        renderSlide(currentSlide + 1);
                    }
                });

                let touchStartX = 0;
                galleryTrack.addEventListener('touchstart', (e) => {
                    touchStartX = e.changedTouches[0].screenX;
                }, { passive: true });
                galleryTrack.addEventListener('touchend', (e) => {
                    const dx = e.changedTouches[0].screenX - touchStartX;
                    if (Math.abs(dx) > 40) {
                        renderSlide(dx < 0 ? currentSlide + 1 : currentSlide - 1);
                    }
                }, { passive: true });
            }
        }
    }

    function initInsightsBlog() {
        const pillarStack = document.getElementById('pillar-stack');
        const blogFilters = document.getElementById('blog-filters');
        if (!pillarStack && !blogFilters) return;

        if (pillarStack) {
            const PILLAR_CONTENT = {
                why: {
                    top: '13%',
                    html: '“We publish <strong>practical field notes</strong> instead of agency buzzwords—documenting what actually changes <strong>ad spend efficiency, search indexing, and conversion follow-up</strong>.”',
                },
                how: {
                    top: '37%',
                    html: '“From <strong>negative-keyword cleanups</strong> and <strong>technical SEO crawls</strong> to WhatsApp API routing in <strong>ChatBox 360 Suite</strong>, we share the exact checklists our Bhavnagar team uses.”',
                },
                what: {
                    top: '62%',
                    html: '“Short breakdowns across <strong>Google Ads, Meta Ads, Local SEO, e-commerce feeds, and retention emails</strong>—written to be read in 5 minutes and applied immediately.”',
                },
                who: {
                    top: '85%',
                    html: '“Built for <strong>business owners and marketing teams</strong> who want plain numbers from <strong>Google Ads, Meta campaigns, technical SEO, and WhatsApp workflows</strong> before scaling budget.”',
                },
            };

            const pillarBtns = Array.from(pillarStack.querySelectorAll('.pillar-word'));
            const pillarDesc = document.getElementById('pillar-desc');
            const pillarPointer = document.getElementById('pillar-pointer');

            function activatePillar(key) {
                const data = PILLAR_CONTENT[key];
                if (!data) return;
                pillarBtns.forEach((btn) => {
                    const active = btn.dataset.pillar === key;
                    btn.classList.toggle('is-active', active);
                    btn.setAttribute('aria-pressed', String(active));
                });
                if (pillarDesc) pillarDesc.innerHTML = data.html;
                if (pillarPointer) pillarPointer.style.top = data.top;
            }

            pillarBtns.forEach((btn) => {
                const key = btn.dataset.pillar;
                btn.addEventListener('mouseenter', () => activatePillar(key));
                btn.addEventListener('focus', () => activatePillar(key));
                btn.addEventListener('click', () => activatePillar(key));
            });
        }

        if (blogFilters) {
            document.documentElement.classList.add('js-insights');
            const filterPills = Array.from(blogFilters.querySelectorAll('.insight-pill'));
            const articleCards = Array.from(document.querySelectorAll('.article-card'));

            const categoryCounts = {};
            articleCards.forEach((card) => {
                const cat = card.dataset.category;
                if (cat) categoryCounts[cat] = (categoryCounts[cat] || 0) + 1;
            });

            filterPills.forEach((pill) => {
                const filter = pill.dataset.blogFilter;
                if (filter !== 'all' && (categoryCounts[filter] || 0) < 3) {
                    pill.hidden = true;
                    pill.style.display = 'none';
                }
            });

            function applyFilter(filterKey, updateUrl) {
                const validCategories = ['ads', 'seo', 'strategy'];
                const activeFilter = validCategories.includes(filterKey) && (categoryCounts[filterKey] || 0) >= 3 ? filterKey : 'all';

                filterPills.forEach((pill) => {
                    const isMatch = pill.dataset.blogFilter === activeFilter;
                    pill.classList.toggle('border-[#A83300]', isMatch);
                    pill.classList.toggle('text-[#A83300]', isMatch);
                    pill.classList.toggle('border-transparent', !isMatch);
                    pill.classList.toggle('text-[#18181B]', !isMatch);
                    if (isMatch) pill.setAttribute('aria-current', 'page');
                    else pill.removeAttribute('aria-current');
                });

                articleCards.forEach((card) => {
                    card.style.display = activeFilter === 'all' || card.dataset.category === activeFilter ? 'flex' : 'none';
                });

                if (updateUrl && window.history?.replaceState) {
                    const nextHash = activeFilter === 'all' ? '' : '#category-' + activeFilter;
                    window.history.replaceState(null, '', window.location.pathname + window.location.search + nextHash);
                }
            }

            function getFilterFromLocation() {
                const params = new URLSearchParams(window.location.search);
                const queryCat = params.get('category');
                if (queryCat) return queryCat;
                const hash = window.location.hash.replace('#category-', '').replace('#', '');
                return hash || 'all';
            }

            filterPills.forEach((pill) => {
                pill.addEventListener('click', (e) => {
                    e.preventDefault();
                    applyFilter(pill.dataset.blogFilter, true);
                });
            });

            window.addEventListener('hashchange', () => applyFilter(getFilterFromLocation(), false));
            applyFilter(getFilterFromLocation(), false);
        }
    }

    initNavigation();
    initNewsletterForms();
    initContactForm();
    initHomeTestimonials();
    initHomeJournalSpread();
    initServicesAccordion();
    initWorkFilters();
    initCaseStudyMedia();
    initInsightsBlog();
})();
