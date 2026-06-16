/**
 * public/js/components/pricing-toggle.js
 * ─────────────────────────────────────────────────────────────────────────────
 * PostPulse — Pricing page billing toggle (Monthly ↔ Annual).
 *
 * How it works:
 *   - Two toggle buttons (#btn-monthly / #btn-annual) sit in the hero.
 *   - Each pricing card's price <span> carries data-monthly and data-annual.
 *   - Each note <p> carries the same two attributes for the sub-price line.
 *   - Clicking a button swaps the displayed text on all .plan-price and
 *     .plan-note elements and updates the active/inactive button styles.
 *   - The "You're saving..." callout (#annual-saving) is shown only in
 *     annual mode.
 * ─────────────────────────────────────────────────────────────────────────────
 */

(function (doc) {
    'use strict';

    var btnMonthly   = doc.getElementById('btn-monthly');
    var btnAnnual    = doc.getElementById('btn-annual');
    var annualSaving = doc.getElementById('annual-saving');

    if (!btnMonthly || !btnAnnual) return;

    // ── Style classes ────────────────────────────────────────────────────────
    var ACTIVE_CLS   = ['bg-white', 'text-gray-900', 'shadow-sm', 'font-semibold'];
    var INACTIVE_CLS = ['text-gray-300', 'hover:text-white', 'font-medium'];

    // ── Switch all price + note elements to a given billing cycle ────────────
    function applyBilling(cycle) {
        // Update prices
        var prices = Array.prototype.slice.call(doc.querySelectorAll('.plan-price'));
        prices.forEach(function (el) {
            var val = el.getAttribute('data-' + cycle);
            if (val) el.textContent = val;
        });

        // Update sub-notes
        var notes = Array.prototype.slice.call(doc.querySelectorAll('.plan-note'));
        notes.forEach(function (el) {
            var val = el.getAttribute('data-' + cycle);
            if (val) el.textContent = val;
        });

        // Toggle saving callout
        if (annualSaving) {
            annualSaving.classList.toggle('hidden', cycle !== 'annual');
            annualSaving.classList.toggle('flex',   cycle === 'annual');
        }
    }

    // ── Set a button as active / inactive ────────────────────────────────────
    function setActive(activeBtn, inactiveBtn) {
        // Active button
        INACTIVE_CLS.forEach(function (c) { activeBtn.classList.remove(c); });
        ACTIVE_CLS.forEach(function (c)   { activeBtn.classList.add(c); });

        // Inactive button
        ACTIVE_CLS.forEach(function (c)   { inactiveBtn.classList.remove(c); });
        INACTIVE_CLS.forEach(function (c) { inactiveBtn.classList.add(c); });
    }

    // ── Wire click handlers ──────────────────────────────────────────────────
    btnMonthly.addEventListener('click', function () {
        setActive(btnMonthly, btnAnnual);
        applyBilling('monthly');
    });

    btnAnnual.addEventListener('click', function () {
        setActive(btnAnnual, btnMonthly);
        applyBilling('annual');
    });

}(document));
