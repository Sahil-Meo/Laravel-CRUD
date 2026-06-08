{{-- ===== NAVBAR ===== --}}
<nav class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">

        {{-- Logo --}}
        <a href="{{ url('/') }}" class="flex items-center gap-2">
            <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
            </div>
            <span class="text-xl font-bold text-gray-900">Luminary</span>
        </a>

        {{-- Nav Links --}}
        <div class="hidden md:flex items-center gap-8">
            <a href="#features" class="text-sm text-gray-600 hover:text-indigo-600 transition-colors">Features</a>
            <a href="#work"     class="text-sm text-gray-600 hover:text-indigo-600 transition-colors">Our Work</a>
            <a href="#team"     class="text-sm text-gray-600 hover:text-indigo-600 transition-colors">Team</a>
            <a href="#pricing"  class="text-sm text-gray-600 hover:text-indigo-600 transition-colors">Pricing</a>
        </div>

        {{-- Auth Buttons --}}
        <div class="flex items-center gap-3">
            <a href="#" class="text-sm font-medium text-gray-700 hover:text-indigo-600 transition-colors">Log in</a>
            <a href="#" class="text-sm font-semibold bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition-colors">Get Started</a>
        </div>

    </div>
</nav>
