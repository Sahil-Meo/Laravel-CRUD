{{-- ===== NAVBAR ===== --}}
<nav class="fixed top-0 left-0 right-0 z-50 bg-white/90 backdrop-blur-md border-b border-gray-100 shadow-sm">
    <div class="max-w-7xl mx-auto px-6 py-3 flex items-center justify-between">

        {{-- Logo --}}
        <a href="{{ url('/') }}" class="flex items-center shrink-0">
            <img src="{{ asset('images/nav_logo.png') }}"
                 alt="PostPulse"
                 class="h-10 w-auto object-contain">
        </a>

        {{-- Desktop nav links --}}
        <div class="hidden md:flex items-center gap-8">
            <a href="{{ url('/') }}"
               class="text-sm transition-colors
                      {{ request()->is('/') ? 'text-[#149696] font-semibold' : 'text-gray-600 hover:text-[#149696]' }}">
               Home
            </a>
            <a href="{{ route('featured.index') }}"
               class="text-sm transition-colors
                      {{ request()->routeIs('featured.*') ? 'text-[#149696] font-semibold' : 'text-gray-600 hover:text-[#149696]' }}">
               Featured Jobs
            </a>
            <a href="{{ route('blog.index') }}"
               class="text-sm transition-colors
                      {{ request()->routeIs('blog.*') ? 'text-[#149696] font-semibold' : 'text-gray-600 hover:text-[#149696]' }}">
               Career Blog
            </a>
            <a href="{{ route('about') }}"
               class="text-sm transition-colors
                      {{ request()->routeIs('about') ? 'text-[#149696] font-semibold' : 'text-gray-600 hover:text-[#149696]' }}">
               About Us
            </a>
            <a href="{{ route('contact') }}"
               class="text-sm transition-colors
                      {{ request()->routeIs('contact') ? 'text-[#149696] font-semibold' : 'text-gray-600 hover:text-[#149696]' }}">
               Contact
            </a>
            <a href="#pricing"
               class="text-sm text-gray-600 hover:text-[#149696] transition-colors">
               Pricing
            </a>
        </div>

        {{-- Desktop auth buttons --}}
        <div class="hidden md:flex items-center gap-3">
            {{-- data-open-login triggers login-modal.js --}}
            <button type="button"
                    data-open-login
                    class="text-sm font-medium text-gray-700 hover:text-[#149696] transition-colors">
               Log in
            </button>
            <a href="{{ route('profile.create') }}"
               class="text-sm font-semibold bg-[#149696] text-white px-4 py-2 rounded-lg
                      hover:bg-[#0f7a7a] transition-colors shadow-sm
                      {{ request()->routeIs('profile.*') ? 'ring-2 ring-[#149696]/40' : '' }}">
               Create Profile
            </a>
        </div>

        {{-- Mobile: login + hamburger --}}
        <div class="flex md:hidden items-center gap-2">
            <button type="button"
                    data-open-login
                    class="text-sm font-medium text-gray-700 hover:text-[#149696]
                           transition-colors px-3 py-2 rounded-lg">
               Log in
            </button>
            <button type="button"
                    id="mobile-menu-btn"
                    aria-label="Toggle menu"
                    aria-expanded="false"
                    aria-controls="mobile-menu"
                    class="p-2 rounded-lg text-gray-600 hover:text-[#149696]
                           hover:bg-gray-50 transition-colors">
                <svg id="hamburger-icon" class="w-5 h-5" fill="none" stroke="currentColor"
                     stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg id="close-icon" class="w-5 h-5 hidden" fill="none" stroke="currentColor"
                     stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

    </div>

    {{-- Mobile dropdown menu --}}
    <div id="mobile-menu"
         class="hidden md:hidden border-t border-gray-100 bg-white/95 backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-6 py-4 flex flex-col gap-1">
            <a href="{{ url('/') }}"
               class="px-3 py-2.5 text-sm rounded-xl transition-colors
                      {{ request()->is('/') ? 'bg-[#e6f7f7] text-[#149696] font-semibold' : 'text-gray-700 hover:bg-gray-50 hover:text-[#149696]' }}">
               Home
            </a>
            <a href="{{ route('featured.index') }}"
               class="px-3 py-2.5 text-sm rounded-xl transition-colors
                      {{ request()->routeIs('featured.*') ? 'bg-[#e6f7f7] text-[#149696] font-semibold' : 'text-gray-700 hover:bg-gray-50 hover:text-[#149696]' }}">
               Featured Jobs
            </a>
            <a href="{{ route('blog.index') }}"
               class="px-3 py-2.5 text-sm rounded-xl transition-colors
                      {{ request()->routeIs('blog.*') ? 'bg-[#e6f7f7] text-[#149696] font-semibold' : 'text-gray-700 hover:bg-gray-50 hover:text-[#149696]' }}">
               Career Blog
            </a>
            <a href="{{ route('about') }}"
               class="px-3 py-2.5 text-sm rounded-xl transition-colors
                      {{ request()->routeIs('about') ? 'bg-[#e6f7f7] text-[#149696] font-semibold' : 'text-gray-700 hover:bg-gray-50 hover:text-[#149696]' }}">
               About Us
            </a>
            <a href="{{ route('contact') }}"
               class="px-3 py-2.5 text-sm rounded-xl transition-colors
                      {{ request()->routeIs('contact') ? 'bg-[#e6f7f7] text-[#149696] font-semibold' : 'text-gray-700 hover:bg-gray-50 hover:text-[#149696]' }}">
               Contact
            </a>
            <a href="#pricing"
               class="px-3 py-2.5 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#149696]
                      rounded-xl transition-colors">
               Pricing
            </a>
            <div class="h-px bg-gray-100 my-2"></div>
            <a href="{{ route('profile.create') }}"
               class="px-3 py-2.5 text-sm font-semibold bg-[#149696] text-white
                      rounded-xl hover:bg-[#0f7a7a] transition-colors text-center">
               Create Profile
            </a>
        </div>
    </div>
</nav>

{{-- Mobile menu toggle script (self-contained, no external dep) --}}
<script>
(function () {
    var btn        = document.getElementById('mobile-menu-btn');
    var menu       = document.getElementById('mobile-menu');
    var hamburger  = document.getElementById('hamburger-icon');
    var closeIcon  = document.getElementById('close-icon');
    if (!btn || !menu) return;

    btn.addEventListener('click', function () {
        var isOpen = !menu.classList.contains('hidden');
        menu.classList.toggle('hidden', isOpen);
        hamburger.classList.toggle('hidden', !isOpen);
        closeIcon.classList.toggle('hidden', isOpen);
        btn.setAttribute('aria-expanded', String(!isOpen));
    });

    // Close on nav link click inside mobile menu
    menu.querySelectorAll('a').forEach(function (link) {
        link.addEventListener('click', function () {
            menu.classList.add('hidden');
            hamburger.classList.remove('hidden');
            closeIcon.classList.add('hidden');
            btn.setAttribute('aria-expanded', 'false');
        });
    });
})();
</script>
