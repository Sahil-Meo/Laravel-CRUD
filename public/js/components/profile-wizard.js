/**
 * public/js/components/profile-wizard.js
 * ─────────────────────────────────────────────────────────────────────────────
 * PostPulse — Create Profile multi-step wizard.
 *
 * Responsibilities:
 *   1. Role selection  — shows the correct form panel (seeker / employer)
 *   2. Multi-step navigation — prev / next / submit button visibility
 *   3. Dynamic progress bar  — renders <x-profile.progress-bar>-style HTML
 *   4. Image preview         — profile picture & company logo
 *   5. Step validation       — validates required fields before advancing
 *
 * No build step. Served as a plain static file via asset().
 * ─────────────────────────────────────────────────────────────────────────────
 */

(function (win, doc) {
    'use strict';

    // ── Config ───────────────────────────────────────────────────────────────
    var SEEKER_STEPS   = ['Personal Info', 'Skills & Background', 'Links & Review'];
    var EMPLOYER_STEPS = ['Company Identity', 'About & Links'];

    var BRAND_TEAL  = '#149696';
    var BRAND_AMBER = '#f59e0b';

    // ── Utility helpers ──────────────────────────────────────────────────────
    function $(sel, ctx) { return (ctx || doc).querySelector(sel); }
    function $$(sel, ctx) { return Array.prototype.slice.call((ctx || doc).querySelectorAll(sel)); }

    function show(el) { if (el) el.classList.remove('hidden'); }
    function hide(el) { if (el) el.classList.add('hidden'); }

    function slideIn(el) {
        if (!el) return;
        el.classList.remove('hidden');
        el.style.opacity = '0';
        el.style.transform = 'translateY(12px)';
        requestAnimationFrame(function () {
            el.style.transition = 'opacity 0.25s ease, transform 0.25s ease';
            el.style.opacity    = '1';
            el.style.transform  = 'translateY(0)';
        });
    }

    function scrollToTop() {
        win.scrollTo({ top: 0, behavior: 'smooth' });
    }

    // ── Progress bar renderer ────────────────────────────────────────────────
    function renderProgress(containerId, steps, current, accentColor) {
        var container = doc.getElementById(containerId);
        if (!container) return;

        var total = steps.length;
        var pct   = total > 1 ? Math.round(((current - 1) / (total - 1)) * 100) : 100;

        var html = '<div class="w-full mb-10">'
            + '<div class="flex items-center justify-between relative">'
            + '<div class="absolute top-4 left-0 right-0 h-0.5 bg-gray-200 z-0 mx-8"></div>'
            + '<div class="absolute top-4 left-0 h-0.5 z-0 mx-8 transition-all duration-500" '
            +   'style="width:calc(' + pct + '% - 4rem);background:' + accentColor + '"></div>';

        steps.forEach(function (label, i) {
            var stepNum = i + 1;
            var isDone    = stepNum < current;
            var isActive  = stepNum === current;

            var circleStyle = isDone
                ? 'background:' + accentColor + ';border-color:' + accentColor + ';color:#fff'
                : isActive
                    ? 'background:#fff;border-color:' + accentColor + ';color:' + accentColor
                    : 'background:#fff;border-color:#e5e7eb;color:#9ca3af';

            var labelColor = isActive ? accentColor : (isDone ? '#6b7280' : '#9ca3af');

            html += '<div class="relative z-10 flex flex-col items-center gap-2 flex-1">'
                + '<div style="' + circleStyle + '" class="w-8 h-8 rounded-full flex items-center '
                +   'justify-center text-xs font-bold border-2 transition-all duration-300 shadow-sm">';

            if (isDone) {
                html += '<svg style="width:16px;height:16px" fill="none" stroke="currentColor" '
                    + 'stroke-width="3" viewBox="0 0 24 24">'
                    + '<path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>'
                    + '</svg>';
            } else {
                html += stepNum;
            }

            html += '</div>'
                + '<span class="text-xs font-medium hidden sm:block" '
                +   'style="color:' + labelColor + '">' + label + '</span>'
                + '</div>';
        });

        html += '</div></div>';
        container.innerHTML = html;
    }

    // ── Step validation ──────────────────────────────────────────────────────
    function validateStep(panel, stepNum) {
        var selector   = panel === 'seeker'
            ? '[data-seeker-step="' + stepNum + '"]'
            : '[data-employer-step="' + stepNum + '"]';
        var stepEl     = $(selector);
        if (!stepEl) return true;

        var required   = $$('[required]', stepEl);
        var allValid   = true;

        required.forEach(function (field) {
            // Remove previous error state
            field.classList.remove('border-red-400', 'bg-red-50', 'ring-red-300');

            var empty = field.type === 'checkbox'
                ? !field.checked
                : field.value.trim() === '';

            if (empty) {
                allValid = false;
                field.classList.add('border-red-400', 'bg-red-50');

                // Shake animation
                field.style.transition = 'transform 0.1s';
                [0, -4, 4, -3, 3, -2, 2, 0].forEach(function (x, idx) {
                    setTimeout(function () {
                        field.style.transform = 'translateX(' + x + 'px)';
                    }, idx * 40);
                });

                // Focus first invalid field
                if (allValid === false && document.activeElement !== field) {
                    field.focus({ preventScroll: true });
                }
            }
        });

        return allValid;
    }

    // ── Image preview ────────────────────────────────────────────────────────
    function setupImagePreviews() {
        $$('[data-preview]').forEach(function (input) {
            input.addEventListener('change', function () {
                var previewId = input.getAttribute('data-preview');
                var preview   = doc.getElementById(previewId);
                if (!preview || !input.files || !input.files[0]) return;

                var reader = new FileReader();
                reader.onload = function (e) {
                    preview.innerHTML = '<img src="' + e.target.result + '" '
                        + 'class="w-full h-full object-cover" alt="Preview">';
                };
                reader.readAsDataURL(input.files[0]);
            });
        });
    }

    // ── Core wizard logic ────────────────────────────────────────────────────
    function init() {
        var wizard = doc.getElementById('profile-wizard');
        if (!wizard) return;

        var currentSeekerStep   = 1;
        var currentEmployerStep = 1;

        // Panels
        var panel0          = $('[data-wizard-panel="0"]');
        var seekerPanel     = $('[data-wizard-panel="seeker"]');
        var employerPanel   = $('[data-wizard-panel="employer"]');

        // Seeker nav
        var seekerPrev   = doc.getElementById('seeker-prev');
        var seekerNext   = doc.getElementById('seeker-next');
        var seekerSubmit = doc.getElementById('seeker-submit');

        // Employer nav
        var empPrev   = doc.getElementById('employer-prev');
        var empNext   = doc.getElementById('employer-next');
        var empSubmit = doc.getElementById('employer-submit');

        // ── Role selection ────────────────────────────────────────────────
        $$('[data-select-role]').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var role = btn.getAttribute('data-select-role');
                hide(panel0);

                if (role === 'seeker') {
                    currentSeekerStep = 1;
                    renderProgress('seeker-progress', SEEKER_STEPS, 1, BRAND_TEAL);
                    updateSeekerNav();
                    slideIn(seekerPanel);
                } else {
                    currentEmployerStep = 1;
                    renderProgress('employer-progress', EMPLOYER_STEPS, 1, BRAND_AMBER);
                    updateEmployerNav();
                    slideIn(employerPanel);
                }
                scrollToTop();
            });
        });

        // ── Back to role selector ─────────────────────────────────────────
        $$('[data-wizard-back]').forEach(function (btn) {
            btn.addEventListener('click', function () {
                hide(seekerPanel);
                hide(employerPanel);
                slideIn(panel0);
                scrollToTop();
            });
        });

        // ── Seeker: show correct step panel ──────────────────────────────
        function showSeekerStep(n) {
            $$('[data-seeker-step]').forEach(function (el) {
                var num = parseInt(el.getAttribute('data-seeker-step'), 10);
                if (num === n) slideIn(el);
                else hide(el);
            });
            renderProgress('seeker-progress', SEEKER_STEPS, n, BRAND_TEAL);
        }

        function updateSeekerNav() {
            var isLast = currentSeekerStep === SEEKER_STEPS.length;
            if (currentSeekerStep > 1) show(seekerPrev); else hide(seekerPrev);
            if (isLast)  { hide(seekerNext); show(seekerSubmit); }
            else         { show(seekerNext); hide(seekerSubmit); }
        }

        if (seekerNext) {
            seekerNext.addEventListener('click', function () {
                if (!validateStep('seeker', currentSeekerStep)) return;
                currentSeekerStep++;
                showSeekerStep(currentSeekerStep);
                updateSeekerNav();
                scrollToTop();
            });
        }

        if (seekerPrev) {
            seekerPrev.addEventListener('click', function () {
                currentSeekerStep--;
                showSeekerStep(currentSeekerStep);
                updateSeekerNav();
                scrollToTop();
            });
        }

        // ── Employer: show correct step panel ────────────────────────────
        function showEmployerStep(n) {
            $$('[data-employer-step]').forEach(function (el) {
                var num = parseInt(el.getAttribute('data-employer-step'), 10);
                if (num === n) slideIn(el);
                else hide(el);
            });
            renderProgress('employer-progress', EMPLOYER_STEPS, n, BRAND_AMBER);
        }

        function updateEmployerNav() {
            var isLast = currentEmployerStep === EMPLOYER_STEPS.length;
            if (currentEmployerStep > 1) show(empPrev); else hide(empPrev);
            if (isLast) { hide(empNext); show(empSubmit); }
            else        { show(empNext); hide(empSubmit); }
        }

        if (empNext) {
            empNext.addEventListener('click', function () {
                if (!validateStep('employer', currentEmployerStep)) return;
                currentEmployerStep++;
                showEmployerStep(currentEmployerStep);
                updateEmployerNav();
                scrollToTop();
            });
        }

        if (empPrev) {
            empPrev.addEventListener('click', function () {
                currentEmployerStep--;
                showEmployerStep(currentEmployerStep);
                updateEmployerNav();
                scrollToTop();
            });
        }

        // ── Image previews ────────────────────────────────────────────────
        setupImagePreviews();
    }

    // ── Boot ─────────────────────────────────────────────────────────────────
    if (doc.readyState === 'loading') {
        doc.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

}(window, document));
