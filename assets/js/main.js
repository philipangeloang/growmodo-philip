(function () {
    'use strict';

    /* ----------------------------------------------------------------------
       Mobile nav toggle
       ---------------------------------------------------------------------- */
    var navToggle  = document.querySelector('.nav-toggle');
    var primaryNav = document.querySelector('.primary-nav');

    if (navToggle && primaryNav) {
        navToggle.addEventListener('click', function () {
            var isOpen = primaryNav.classList.toggle('is-open');
            navToggle.setAttribute('aria-expanded', String(isOpen));
        });

        primaryNav.addEventListener('click', function (e) {
            if (e.target.tagName === 'A') {
                primaryNav.classList.remove('is-open');
                navToggle.setAttribute('aria-expanded', 'false');
            }
        });
    }

    /* ----------------------------------------------------------------------
       Announcement bar: dismiss + remember in sessionStorage
       ---------------------------------------------------------------------- */
    var announce = document.getElementById('announceBar');
    if (announce) {
        try {
            if (sessionStorage.getItem('estatein_announce_dismissed') === '1') {
                announce.classList.add('is-hidden');
            }
        } catch (e) { /* sessionStorage unavailable, ignore */ }

        var closeBtn = announce.querySelector('.announce-close');
        if (closeBtn) {
            closeBtn.addEventListener('click', function () {
                announce.classList.add('is-hidden');
                try {
                    sessionStorage.setItem('estatein_announce_dismissed', '1');
                } catch (e) { /* ignore */ }
            });
        }
    }

    /* ----------------------------------------------------------------------
       Carousel sliders for Featured Properties / Testimonials / FAQs
       Below 1024px the grids become horizontally scrollable, scroll-snap
       containers. Pager buttons (← / →) scroll one card at a time.
       ----------------------------------------------------------------------*/
    function initCarousel(section) {
        var grid = section.querySelector(
            '.properties-grid, .testimonials-grid, .faqs-grid'
        );
        var pager = section.querySelector('.carousel-pager');
        if (!grid || !pager) {
            return;
        }

        var pagerBtns = pager.querySelectorAll('.pager-btn');
        if (pagerBtns.length < 2) {
            return;
        }
        var prevBtn = pagerBtns[0];
        var nextBtn = pagerBtns[1];
        var indicator = pager.querySelector('.page-indicator');

        function getCardWidth() {
            var first = grid.firstElementChild;
            if (!first) return 0;
            var rect = first.getBoundingClientRect();
            // Add the gap (CSS variable, default to 16px).
            var styles = getComputedStyle(grid);
            var gap = parseFloat(styles.columnGap || styles.gap || '16') || 16;
            return rect.width + gap;
        }

        function isCarouselActive() {
            // Carousel only matters when the grid is wider than its viewport.
            return grid.scrollWidth > grid.clientWidth + 4;
        }

        function scrollByOne(direction) {
            if (!isCarouselActive()) return;
            grid.scrollBy({ left: direction * getCardWidth(), behavior: 'smooth' });
        }

        prevBtn.addEventListener('click', function () { scrollByOne(-1); });
        nextBtn.addEventListener('click', function () { scrollByOne(1); });

        // Keep the "01 of N" indicator in sync with scroll position.
        function updateIndicator() {
            if (!indicator) return;
            var cardWidth = getCardWidth();
            if (!cardWidth) return;
            var current = Math.round(grid.scrollLeft / cardWidth) + 1;
            var total = grid.children.length;
            var padded = current < 10 ? '0' + current : '' + current;
            indicator.innerHTML = padded + ' <span class="of">of</span> ' + total;
        }

        // Throttle scroll updates with rAF.
        var scrollScheduled = false;
        grid.addEventListener('scroll', function () {
            if (scrollScheduled) return;
            scrollScheduled = true;
            requestAnimationFrame(function () {
                updateIndicator();
                scrollScheduled = false;
            });
        });

        // Update indicator after layout/resize.
        var resizeTimer;
        window.addEventListener('resize', function () {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(updateIndicator, 100);
        });

        // Initial state.
        updateIndicator();
    }

    var carouselSelectors = [
        '.featured-properties',
        '.testimonials-section',
        '.faqs-section'
    ];

    carouselSelectors.forEach(function (sel) {
        document.querySelectorAll(sel).forEach(initCarousel);
    });
})();
