/**
 * public/js/components/candidates.js
 * ─────────────────────────────────────────────────────────────────────────────
 * PostPulse — Browse Candidates page controller.
 *
 * Responsibilities:
 *   1. Open / close the mobile filter drawer
 *   2. Lock body scroll while drawer is open
 *   3. Close drawer on backdrop click or Escape key
 * ─────────────────────────────────────────────────────────────────────────────
 */

(function (doc) {
    'use strict';

    var openBtn   = doc.getElementById('mobile-filter-btn');
    var closeBtn  = doc.getElementById('filter-drawer-close');
    var drawer    = doc.getElementById('filter-drawer');
    var backdrop  = doc.getElementById('filter-backdrop');

    if (!drawer) return;

    function openDrawer() {
        drawer.classList.remove('translate-x-[-100%]');
        drawer.classList.add('translate-x-0');
        backdrop.classList.remove('hidden');
        doc.body.style.overflow = 'hidden';
        // Move focus into drawer for accessibility
        var firstFocusable = drawer.querySelector('button, input, a, select');
        if (firstFocusable) firstFocusable.focus();
    }

    function closeDrawer() {
        drawer.classList.remove('translate-x-0');
        drawer.classList.add('translate-x-[-100%]');
        backdrop.classList.add('hidden');
        doc.body.style.overflow = '';
        if (openBtn) openBtn.focus();
    }

    if (openBtn)  openBtn.addEventListener('click',  openDrawer);
    if (closeBtn) closeBtn.addEventListener('click',  closeDrawer);
    if (backdrop) backdrop.addEventListener('click',  closeDrawer);

    doc.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && !drawer.classList.contains('translate-x-[-100%]')) {
            closeDrawer();
        }
    });

}(document));
