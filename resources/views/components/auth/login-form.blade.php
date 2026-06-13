{{--
|--------------------------------------------------------------------------
| Component: <x-auth.login-form>
|--------------------------------------------------------------------------
|
| The reusable PostPulse login form.
| Renders identically whether used inside a modal or on a standalone page.
|
| Props:
|   context  (string)  'modal' | 'page'
|             Drives subtle layout tweaks (rounded corners, shadow, padding).
|   :errors  Blade $errors bag — pass through when embedding in a page.
|
| Usage — inside modal:
|   <x-auth.login-form context="modal" />
|
| Usage — standalone page:
|   <x-auth.login-form context="page" :errors="$errors" />
|
--}}

@props([
    'context' => 'modal',
    'errors'  => null,
])

@php
    $isModal = $context === 'modal';
    $formId  = $isModal ? 'login-modal-form' : 'login-page-form';
    // POST route for both contexts — modal JS intercepts and handles redirect client-side,
    // standalone page submits normally via browser POST.
    $action  = route('auth.login.submit');
@endphp

<form
    id="{{ $formId }}"
    method="POST"
    action="{{ $action }}"
    novalidate
    class="w-full"
    data-login-form
    data-context="{{ $context }}"
>
    @csrf

    {{-- ── Header ─────────────────────────────────────────────────── --}}
    <div class="{{ $isModal ? 'mb-7' : 'mb-8' }} text-center">
        <a href="{{ url('/') }}" class="{{ $isModal ? '' : 'inline-block mb-6' }}">
            <img src="{{ asset('images/nav_logo.png') }}"
                 alt="PostPulse"
                 class="{{ $isModal ? 'h-9 mx-auto mb-5' : 'h-10 mx-auto' }} w-auto object-contain">
        </a>
        <h2 class="text-2xl font-extrabold text-gray-900 mb-1">Welcome back</h2>
        <p class="text-sm text-gray-500">Sign in to your PostPulse account</p>
    </div>

    {{-- ── Server-side error banner (page context) ─────────────────── --}}
    @if (!$isModal && $errors && $errors->any())
    <div class="flex items-start gap-3 bg-red-50 border border-red-200 rounded-xl px-4 py-3 mb-6">
        <svg class="w-4 h-4 text-red-500 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
                  d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1
                     1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
        </svg>
        <div class="text-sm text-red-700">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    </div>
    @endif

    {{-- ── Inline JS error banner (shown by modal JS on failure) ───── --}}
    <div id="{{ $formId }}-error"
         class="hidden flex items-start gap-3 bg-red-50 border border-red-200
                rounded-xl px-4 py-3 mb-6">
        <svg class="w-4 h-4 text-red-500 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd"
                  d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012
                     0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
        </svg>
        <p class="text-sm text-red-700" id="{{ $formId }}-error-text"></p>
    </div>

    {{-- ── Email ────────────────────────────────────────────────────── --}}
    <div class="mb-5">
        <label for="{{ $formId }}-email"
               class="block text-sm font-semibold text-gray-700 mb-1.5">
            Email Address
        </label>
        <div class="relative">
            <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5">
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                     stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8
                             M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
            </span>
            <input
                type="email"
                id="{{ $formId }}-email"
                name="email"
                value="{{ old('email') }}"
                placeholder="you@example.com"
                autocomplete="email"
                required
                class="w-full pl-10 pr-4 py-3 text-sm border border-gray-200 rounded-xl bg-gray-50
                       focus:outline-none focus:ring-2 focus:ring-[#149696]/40 focus:border-[#149696]
                       transition placeholder-gray-400
                       @error('email') border-red-400 bg-red-50 @enderror"
            >
        </div>
        @error('email')
        <p class="mt-1.5 text-xs text-red-600 flex items-center gap-1">
            <svg class="w-3 h-3 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                      d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012
                         0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
            </svg>
            {{ $message }}
        </p>
        @enderror
    </div>

    {{-- ── Password ─────────────────────────────────────────────────── --}}
    <div class="mb-5">
        <div class="flex items-center justify-between mb-1.5">
            <label for="{{ $formId }}-password"
                   class="text-sm font-semibold text-gray-700">
                Password
            </label>
            <a href="{{ route('auth.forgot') }}"
               class="text-xs text-[#149696] hover:text-[#0f7a7a] hover:underline transition-colors
                      font-medium">
                Forgot password?
            </a>
        </div>
        <div class="relative">
            <span class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5">
                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                     stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2
                             2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                </svg>
            </span>
            <input
                type="password"
                id="{{ $formId }}-password"
                name="password"
                placeholder="••••••••"
                autocomplete="current-password"
                required
                class="w-full pl-10 pr-12 py-3 text-sm border border-gray-200 rounded-xl bg-gray-50
                       focus:outline-none focus:ring-2 focus:ring-[#149696]/40 focus:border-[#149696]
                       transition placeholder-gray-400
                       @error('password') border-red-400 bg-red-50 @enderror"
            >
            {{-- Toggle password visibility --}}
            <button type="button"
                    data-toggle-password="{{ $formId }}-password"
                    class="absolute inset-y-0 right-0 flex items-center pr-3.5
                           text-gray-400 hover:text-gray-600 transition-colors"
                    aria-label="Toggle password visibility">
                <svg class="w-4 h-4 eye-open" fill="none" stroke="currentColor"
                     stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943
                             9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                </svg>
                <svg class="w-4 h-4 eye-closed hidden" fill="none" stroke="currentColor"
                     stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97
                             9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242
                             4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0
                             0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0
                             01-4.132 5.411m0 0L21 21"/>
                </svg>
            </button>
        </div>
        @error('password')
        <p class="mt-1.5 text-xs text-red-600 flex items-center gap-1">
            <svg class="w-3 h-3 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                      d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012
                         0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
            </svg>
            {{ $message }}
        </p>
        @enderror
    </div>

    {{-- ── Remember me ─────────────────────────────────────────────── --}}
    <div class="flex items-center justify-between mb-7">
        <label class="flex items-center gap-2.5 cursor-pointer group select-none">
            <input type="checkbox" name="remember"
                   class="w-4 h-4 rounded border-gray-300 accent-[#149696]
                          focus:ring-[#149696] focus:ring-offset-0">
            <span class="text-sm text-gray-600 group-hover:text-gray-800 transition-colors">
                Remember me
            </span>
        </label>
    </div>

    {{-- ── Submit ───────────────────────────────────────────────────── --}}
    <button type="submit"
            id="{{ $formId }}-submit"
            class="w-full flex items-center justify-center gap-2 bg-[#149696] text-white
                   font-semibold py-3 rounded-xl hover:bg-[#0f7a7a] active:scale-[0.98]
                   transition-all shadow-lg shadow-[#149696]/20 text-sm">
        <span id="{{ $formId }}-btn-text">Sign in</span>
        {{-- Spinner (shown by JS during submission) --}}
        <svg id="{{ $formId }}-spinner"
             class="hidden w-4 h-4 animate-spin" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10"
                    stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor"
                  d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
        </svg>
    </button>

    {{-- ── Divider ──────────────────────────────────────────────────── --}}
    <div class="flex items-center gap-3 my-6">
        <div class="flex-1 h-px bg-gray-200"></div>
        <span class="text-xs text-gray-400 font-medium">or</span>
        <div class="flex-1 h-px bg-gray-200"></div>
    </div>

    {{-- ── Create account CTA ──────────────────────────────────────── --}}
    <p class="text-center text-sm text-gray-500">
        Don't have an account?
        <a href="{{ route('profile.create') }}"
           class="font-semibold text-[#149696] hover:text-[#0f7a7a] hover:underline transition-colors
                  {{ $isModal ? 'js-close-modal' : '' }}">
            Create your profile →
        </a>
    </p>

</form>
