/**
 * public/js/components/login-modal.js
 * ─────────────────────────────────────────────────────────────────────────────
 * PostPulse — Login modal controller.
 *
 * Responsibilities:
 *   1. Open modal when any [data-open-login] element is clicked
 *   2. Close via × button, backdrop click, or Escape key
 *   3. Focus trap inside the open modal
 *   4. Password show/hide toggle
 *   5. Client-side form validation with inline error messages
 *   6. Temp auth: any valid email + password (≥6 chars) → redirect to /featured
 * ─────────────────────────────────────────────────────────────────────────────
 */

(function (doc, win) {
    'use strict';

    /* ── DOM refs ──────────────────────────────────────────────────────────── */
    var modal     = doc.getElementById('login-modal');
    if (!modal) return;   // modal not present on this page — bail out

    var panel     = modal.querySelector('[data-modal-panel]');
    var backdrop  = modal.querySelector('[data-modal-backdrop]');
    var closeBtn  = modal.querySelector('[data-close-modal]');
    var form      = doc.getElementById('login-modal-form');
    var emailIn   = doc.getElementById('login-modal-form-email');
    var passIn    = doc.getElementById('login-modal-form-password');
    var submitBtn = doc.getElementById('login-modal-form-submit');
    var btnText   = doc.getElementById('login-modal-form-btn-text');
    var spinner   = doc.getElementById('login-modal-form-spinner');
    var errBox    = doc.getElementById('login-modal-form-error');
    var errText   = doc.getElementById('login-modal-form-error-text');

    /* ── State ─────────────────────────────────────────────────────────────── */
    var isOpen    = false;
    var prevFocus = null;   // element focused before modal opened

    /* ── Open / close ──────────────────────────────────────────────────────── */
    function openModal() {
        if (isOpen) return;
        isOpen    = true;
        prevFocus = doc.activeElement;

        modal.classList.remove('opacity-0', 'pointer-events-none');
        modal.classList.add('opacity-100');

        // Animate panel in
        requestAnimationFrame(function () {
            panel.classList.remove('translate-y-4', 'scale-95', 'opacity-0');
            panel.classList.add('translate-y-0', 'scale-100', 'opacity-100');
        });

        doc.body.style.overflow = 'hidden';

        // Focus first input after transition
        setTimeout(function () {
            if (emailIn) emailIn.focus();
        }, 180);
    }

    function closeModal() {
        if (!isOpen) return;
        isOpen = false;

        panel.classList.remove('translate-y-0', 'scale-100', 'opacity-100');
        panel.classList.add('translate-y-4', 'scale-95', 'opacity-0');
        modal.classList.remove('opacity-100');
        modal.classList.add('opacity-0');

        setTimeout(function () {
            modal.classList.add('pointer-events-none');
            doc.body.style.overflow = '';
            // Clear form state
            if (form) form.reset();
            clearErrors();
        }, 280);

        if (prevFocus && typeof prevFocus.focus === 'function') {
            prevFocus.focus();
        }
    }

    /* ── Trigger: any [data-open-login] ────────────────────────────────────── */
    doc.addEventListener('click', function (e) {
        var trigger = e.target.closest('[data-open-login]');
        if (trigger) {
            e.preventDefault();
            openModal();
        }
    });

    /* ── Close triggers ────────────────────────────────────────────────────── */
    if (closeBtn)  closeBtn.addEventListener('click', closeModal);
    if (backdrop)  backdrop.addEventListener('click', closeModal);

    doc.addEventListener('keydown', function (e) {
        if (e.key === 'Escape' && isOpen) closeModal();
    });

    /* ── Close-and-navigate for "Create your profile" inside modal ─────────── */
    doc.addEventListener('click', function (e) {
        var link = e.target.closest('.js-close-modal');
        if (link && isOpen) closeModal();
    });

    /* ── Focus trap ────────────────────────────────────────────────────────── */
    modal.addEventListener('keydown', function (e) {
        if (!isOpen || e.key !== 'Tab') return;
        var focusable = Array.prototype.slice.call(
            modal.querySelectorAll(
                'a[href],button:not([disabled]),input,select,textarea,[tabindex]:not([tabindex="-1"])'
            )
        ).filter(function (el) { return !el.classList.contains('hidden'); });

        if (!focusable.length) return;
        var first = focusable[0];
        var last  = focusable[focusable.length - 1];

        if (e.shiftKey) {
            if (doc.activeElement === first) { e.preventDefault(); last.focus(); }
        } else {
            if (doc.activeElement === last)  { e.preventDefault(); first.focus(); }
        }
    });

    /* ── Password visibility toggle ────────────────────────────────────────── */
    doc.addEventListener('click', function (e) {
        var btn = e.target.closest('[data-toggle-password]');
        if (!btn) return;
        var targetId = btn.getAttribute('data-toggle-password');
        var input    = doc.getElementById(targetId);
        if (!input) return;

        var isPassword = input.type === 'password';
        input.type     = isPassword ? 'text' : 'password';

        var eyeOpen   = btn.querySelector('.eye-open');
        var eyeClosed = btn.querySelector('.eye-closed');
        if (eyeOpen)   eyeOpen.classList.toggle('hidden', !isPassword);
        if (eyeClosed) eyeClosed.classList.toggle('hidden', isPassword);
    });

    /* ── Validation helpers ─────────────────────────────────────────────────── */
    function showError(message) {
        if (!errBox || !errText) return;
        errText.textContent = message;
        errBox.classList.remove('hidden');
        errBox.classList.add('flex');
    }

    function clearErrors() {
        if (errBox) {
            errBox.classList.add('hidden');
            errBox.classList.remove('flex');
        }
        if (emailIn) emailIn.classList.remove('border-red-400', 'bg-red-50');
        if (passIn)  passIn.classList.remove('border-red-400', 'bg-red-50');
    }

    function markInvalid(input) {
        input.classList.add('border-red-400', 'bg-red-50');
        input.focus();
    }

    function isValidEmail(val) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(val.trim());
    }

    /* ── Loading state ──────────────────────────────────────────────────────── */
    function setLoading(loading) {
        if (!submitBtn) return;
        submitBtn.disabled = loading;
        if (btnText)  btnText.textContent = loading ? 'Signing in…' : 'Sign in';
        if (spinner)  spinner.classList.toggle('hidden', !loading);
    }

    /* ── Form submit ────────────────────────────────────────────────────────── */
    if (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();   // always intercept — temp frontend-only flow
            clearErrors();

            var email    = emailIn ? emailIn.value.trim() : '';
            var password = passIn  ? passIn.value        : '';

            /* Client-side validation */
            if (!email) {
                markInvalid(emailIn);
                showError('Please enter your email address.');
                return;
            }
            if (!isValidEmail(email)) {
                markInvalid(emailIn);
                showError('Please enter a valid email address.');
                return;
            }
            if (!password) {
                markInvalid(passIn);
                showError('Please enter your password.');
                return;
            }
            if (password.length < 6) {
                markInvalid(passIn);
                showError('Password must be at least 6 characters.');
                return;
            }

            /* ── Temp auth: simulate network delay then redirect ── */
            setLoading(true);
            setTimeout(function () {
                // TODO: replace with fetch('/login', { method:'POST', ... }) when
                // real auth is implemented. On success redirect; on 422 call showError().
                win.location.href = '/featured';
            }, 800);
        });
    }

    /* ── Standalone LOGIN PAGE form (non-modal) ────────────────────────────── */
    var pageForm      = doc.getElementById('login-page-form');
    var pageEmailIn   = doc.getElementById('login-page-form-email');
    var pagePassIn    = doc.getElementById('login-page-form-password');
    var pageSubmitBtn = doc.getElementById('login-page-form-submit');
    var pageBtnText   = doc.getElementById('login-page-form-btn-text');
    var pageSpinner   = doc.getElementById('login-page-form-spinner');

    if (pageForm) {
        pageForm.addEventListener('submit', function (e) {
            // Let the browser's native POST flow handle it (AuthController@login)
            // Just show a loading state so the UX feels snappy
            if (pageSubmitBtn) pageSubmitBtn.disabled = true;
            if (pageBtnText)   pageBtnText.textContent = 'Signing in…';
            if (pageSpinner)   pageSpinner.classList.remove('hidden');
        });
    }

}(document, window));
