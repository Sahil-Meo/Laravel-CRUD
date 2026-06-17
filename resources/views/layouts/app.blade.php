<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="scroll-behavior: smooth;">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'PostPulse') }} — @yield('title', 'Find Your Next Opportunity')</title>
    <meta name="description" content="PostPulse — The modern job board connecting top employers with exceptional talent.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <style>body { font-family: 'Inter', sans-serif; }</style>
    @stack('styles')
</head>
<body class="bg-white text-gray-900 antialiased">

    @include('partials.header')

    {{-- ── Global login modal — opened by any [data-open-login] ─────── --}}
    <x-auth.login-modal />

    {{-- ── Toast notifications (session flashes) ────────────────────── --}}
    @if (session('login_success') || session('success'))
    <div id="toast-success"
         class="fixed bottom-6 right-6 z-[300] flex items-start gap-3 bg-white
                border border-green-200 rounded-2xl shadow-xl p-4 max-w-sm
                transition-all duration-500"
         role="alert">
        <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center shrink-0 mt-0.5">
            <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor"
                 stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
            </svg>
        </div>
        <div class="flex-1">
            <p class="text-sm font-semibold text-gray-900">Success</p>
            <p class="text-xs text-gray-500 mt-0.5">
                {{ session('login_success') ?? session('success') }}
            </p>
        </div>
        <button onclick="this.closest('#toast-success').remove()"
                class="text-gray-400 hover:text-gray-600 transition-colors mt-0.5 shrink-0">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>
    <script>
        // Auto-dismiss after 5 s
        setTimeout(function () {
            var t = document.getElementById('toast-success');
            if (t) { t.style.opacity = '0'; t.style.transform = 'translateY(8px)';
                     setTimeout(function () { t.remove(); }, 400); }
        }, 5000);
    </script>
    @endif

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    @stack('scripts')
    {{-- Global JS — login modal (always needed; loaded once from layout) --}}
    <script src="{{ asset('js/components/login-modal.js') }}" defer></script>
</body>
</html>
