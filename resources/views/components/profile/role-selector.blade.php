{{--
| Component: <x-profile.role-selector>
| Step 0 — choose between Job Seeker and Employer.
| Clicking a card sets data-role on the wizard root and advances to step 1.
--}}
<div id="role-selector" class="text-center">

    <div class="inline-flex items-center gap-2 bg-[#e6f7f7] text-[#149696]
                text-xs font-bold px-3 py-1.5 rounded-full uppercase tracking-widest mb-6">
        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
                  d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
        </svg>
        Create your profile
    </div>

    <h1 class="text-4xl font-extrabold text-gray-900 mb-3">Who are you joining as?</h1>
    <p class="text-gray-500 text-lg mb-12">
        Choose your role to get a personalised profile setup tailored to your needs.
    </p>

    <div class="grid sm:grid-cols-2 gap-6 max-w-2xl mx-auto">

        {{-- Job Seeker --}}
        <button type="button"
                data-select-role="seeker"
                class="role-card group text-left p-8 rounded-2xl border-2 border-gray-200 bg-white
                       hover:border-[#149696] hover:shadow-xl hover:shadow-[#149696]/10
                       hover:-translate-y-1 transition-all duration-300 focus:outline-none
                       focus:ring-2 focus:ring-[#149696] focus:ring-offset-2">
            <div class="w-14 h-14 rounded-2xl bg-[#e6f7f7] flex items-center justify-center mb-5
                        group-hover:bg-[#149696] transition-colors">
                <svg class="w-7 h-7 text-[#149696] group-hover:text-white transition-colors"
                     fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
            </div>
            <h2 class="text-xl font-extrabold text-gray-900 mb-2">Job Seeker</h2>
            <p class="text-sm text-gray-500 leading-relaxed mb-5">
                Looking for your next opportunity? Build your profile and let top employers find you.
            </p>
            <ul class="space-y-1.5 text-xs text-gray-500">
                @foreach (['Showcase skills & experience', 'Upload your CV/Resume', 'Apply with one click', 'Get matched to relevant roles'] as $f)
                <li class="flex items-center gap-2">
                    <svg class="w-3.5 h-3.5 text-[#149696] shrink-0" fill="none"
                         stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                    {{ $f }}
                </li>
                @endforeach
            </ul>
            <div class="mt-6 flex items-center justify-between">
                <span class="text-sm font-semibold text-[#149696]">Get started →</span>
                <span class="text-xs bg-[#e6f7f7] text-[#149696] px-2.5 py-1 rounded-full font-semibold">Free</span>
            </div>
        </button>

        {{-- Employer --}}
        <button type="button"
                data-select-role="employer"
                class="role-card group text-left p-8 rounded-2xl border-2 border-gray-200 bg-white
                       hover:border-[#149696] hover:shadow-xl hover:shadow-[#149696]/10
                       hover:-translate-y-1 transition-all duration-300 focus:outline-none
                       focus:ring-2 focus:ring-[#149696] focus:ring-offset-2">
            <div class="w-14 h-14 rounded-2xl bg-amber-50 flex items-center justify-center mb-5
                        group-hover:bg-amber-400 transition-colors">
                <svg class="w-7 h-7 text-amber-500 group-hover:text-white transition-colors"
                     fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-2 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                </svg>
            </div>
            <h2 class="text-xl font-extrabold text-gray-900 mb-2">Employer / Job Poster</h2>
            <p class="text-sm text-gray-500 leading-relaxed mb-5">
                Hiring great people? Set up your company profile and reach thousands of qualified candidates.
            </p>
            <ul class="space-y-1.5 text-xs text-gray-500">
                @foreach (['Post unlimited job listings', 'AI-powered candidate matching', 'Applicant tracking dashboard', 'Featured employer branding'] as $f)
                <li class="flex items-center gap-2">
                    <svg class="w-3.5 h-3.5 text-amber-500 shrink-0" fill="none"
                         stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                    {{ $f }}
                </li>
                @endforeach
            </ul>
            <div class="mt-6 flex items-center justify-between">
                <span class="text-sm font-semibold text-amber-500">Get started →</span>
                <span class="text-xs bg-amber-50 text-amber-600 px-2.5 py-1 rounded-full font-semibold">From $49/mo</span>
            </div>
        </button>

    </div>
</div>
