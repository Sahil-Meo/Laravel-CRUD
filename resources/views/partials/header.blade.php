{{-- ===== NAVBAR ===== --}}
<nav class="fixed top-0 left-0 right-0 z-50 bg-white/90 backdrop-blur-md border-b border-gray-100 shadow-sm">
    <div class="max-w-7xl mx-auto px-6 py-3 flex items-center justify-between">

        {{-- Logo --}}
        <a href="{{ url('/') }}" class="flex items-center">
            <img
                src="{{ asset('images/nav_logo.png') }}"
                alt="DostTech"
                class="h-10 w-auto object-contain"
            >
        </a>

        {{-- Nav Links --}}
        <div class="hidden md:flex items-center gap-8">
            <a href="#features"
               class="text-sm text-gray-600 hover:text-[#149696] transition-colors">Features</a>
            <a href="#work"
               class="text-sm text-gray-600 hover:text-[#149696] transition-colors">Our Work</a>
            <a href="#team"
               class="text-sm text-gray-600 hover:text-[#149696] transition-colors">Team</a>
            <a href="#pricing"
               class="text-sm text-gray-600 hover:text-[#149696] transition-colors">Pricing</a>
            <a href="{{ route('featured.index') }}"
               class="text-sm transition-colors
                      {{ request()->routeIs('featured.*')
                            ? 'text-[#149696] font-semibold'
                            : 'text-gray-600 hover:text-[#149696]' }}">
               Featured
            </a>
            <a href="{{ route('blog.index') }}"
               class="text-sm transition-colors
                      {{ request()->routeIs('blog.*')
                            ? 'text-[#149696] font-semibold'
                            : 'text-gray-600 hover:text-[#149696]' }}">
               Blog
            </a>
        </div>

        {{-- Auth Buttons --}}
        <div class="flex items-center gap-3">
            <a href="#"
               class="text-sm font-medium text-gray-700 hover:text-[#149696] transition-colors">
               Log in
            </a>
            <a href="#"
               class="text-sm font-semibold bg-[#149696] text-white px-4 py-2 rounded-lg
                      hover:bg-[#0f7a7a] transition-colors shadow-sm">
               Get Started
            </a>
        </div>

    </div>
</nav>
