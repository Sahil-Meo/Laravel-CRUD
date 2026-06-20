/**
 * salary.js — Salary Insights page interactions
 * PostPulse · CSS-only charts, no external libraries
 */

(function () {
    'use strict';

    // ── Auto-submit filter form on select change ────────────────────────────
    const form = document.getElementById('salary-filter-form');

    if (form) {
        const selects = form.querySelectorAll('select');

        selects.forEach(function (select) {
            select.addEventListener('change', function () {
                form.submit();
            });
        });
    }

})();
