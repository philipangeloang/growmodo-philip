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
})();
