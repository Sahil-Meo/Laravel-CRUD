{{--
|--------------------------------------------------------------------------
| Component: <x-auth.login-modal>
|--------------------------------------------------------------------------
|
| Global login modal — included once in layouts/app.blade.php.
| Opened by any element with data-open-login attribute.
| Closed by the × button, backdrop click, or Escape key.
|
--}}

{{-- ── Backdrop + modal root ──────────────────────────────────────────── --}}
<div id="login-modal"
     role="dialog"
     aria-modal="true"
     aria-labelledby="login-modal-title"
     class="fixed inset-0 z-[200] flex items-center justify-center px-4
            transition-all duration-300 opacity-0 pointer-events-none"
     data-modal-root>

    {{-- Backdrop --}}
    <div class="absolute inset-0 bg-gray-950/60 backdrop-blur-sm"
         data-modal-backdrop></div>

    {{-- Dialog panel --}}
    <div class="relative w-full max-w-md bg-white rounded-3xl shadow-2xl
                ring-1 ring-gray-100 transition-all duration-300
                translate-y-4 scale-95 opacity-0 overflow-hidden"
         data-modal-panel>

        {{-- Close button --}}
        <button type="button"
                data-close-modal
                class="absolute top-4 right-4 z-10 w-8 h-8 flex items-center justify-center
                       rounded-full text-gray-400 hover:text-gray-700 hover:bg-gray-100
                       transition-colors focus:outline-none focus:ring-2 focus:ring-[#149696]/40"
                aria-label="Close login modal">
            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                 stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        {{-- Form content --}}
        <div class="px-8 py-10" id="login-modal-title">
            <x-auth.login-form context="modal" />
        </div>

        {{-- Bottom accent strip --}}
        <div class="h-1 w-full bg-gradient-to-r from-[#149696] via-teal-400 to-[#149696]"></div>

    </div>
</div>
