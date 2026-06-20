{{-- ===== SALARY INSIGHTS CTA BAND ===== --}}
<section class="bg-[#149696] py-20">
    <div class="max-w-4xl mx-auto px-6 text-center">

        {{-- Icon --}}
        <div class="w-14 h-14 bg-white/20 rounded-2xl flex items-center justify-center mx-auto mb-6">
            <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
            </svg>
        </div>

        {{-- Headline --}}
        <h2 class="text-3xl sm:text-4xl font-extrabold text-white mb-4 leading-tight">
            Get personalised salary insights
        </h2>

        {{-- Subheading --}}
        <p class="text-white/80 text-lg max-w-2xl mx-auto mb-10 leading-relaxed">
            Create your PostPulse profile and receive salary benchmarks tailored to your skills, location, and experience level.
        </p>

        {{-- Buttons --}}
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="{{ route('profile.create') }}"
               class="w-full sm:w-auto px-8 py-4 bg-white text-[#149696] font-bold rounded-xl text-base hover:bg-gray-100 transition-colors shadow-lg shadow-[#149696]/30">
                Create Profile Free
            </a>
            <a href="{{ route('featured.index') }}"
               class="w-full sm:w-auto px-8 py-4 border-2 border-white/60 text-white font-bold rounded-xl text-base hover:bg-white/10 transition-colors">
                Browse Jobs
            </a>
        </div>

        {{-- Trust line --}}
        <p class="text-white/50 text-xs mt-8">
            Trusted by 94,000+ professionals · No credit card required · Updated monthly
        </p>
    </div>
</section>
