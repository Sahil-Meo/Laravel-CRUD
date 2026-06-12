{{--
| Component: <x-profile.seeker.step-links>
| Job Seeker — Step 3: Links & Final Review
--}}
<div>
    <h2 class="text-2xl font-extrabold text-gray-900 mb-1">Online Presence</h2>
    <p class="text-gray-500 text-sm mb-8">
        Add links so employers can learn more about your work. All fields are optional.
    </p>

    <div class="space-y-6">

        {{-- LinkedIn --}}
        <div>
            <label for="s_linkedin" class="block text-sm font-semibold text-gray-700 mb-1.5">
                LinkedIn Profile
            </label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762
                                 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966
                                 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783
                                 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586
                                 7-2.777 7 2.476v6.759z"/>
                    </svg>
                </span>
                <input type="url" id="s_linkedin" name="linkedin_url"
                       placeholder="https://linkedin.com/in/yourname"
                       class="w-full pl-10 pr-4 py-3 text-sm border border-gray-200 rounded-xl bg-gray-50
                              focus:outline-none focus:ring-2 focus:ring-[#149696]/40 focus:border-[#149696] transition">
            </div>
        </div>

        {{-- Portfolio / Website --}}
        <div>
            <label for="s_portfolio" class="block text-sm font-semibold text-gray-700 mb-1.5">
                Portfolio / Personal Website
            </label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                         stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0
                                 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657
                                 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                    </svg>
                </span>
                <input type="url" id="s_portfolio" name="portfolio_url"
                       placeholder="https://yourportfolio.com"
                       class="w-full pl-10 pr-4 py-3 text-sm border border-gray-200 rounded-xl bg-gray-50
                              focus:outline-none focus:ring-2 focus:ring-[#149696]/40 focus:border-[#149696] transition">
            </div>
        </div>

        {{-- Review summary card --}}
        <div class="mt-10 rounded-2xl border border-[#149696]/20 bg-[#e6f7f7]/40 p-6">
            <div class="flex items-start gap-4">
                <div class="w-10 h-10 rounded-xl bg-[#149696] flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                         stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-bold text-gray-900 mb-1">Almost there!</p>
                    <p class="text-sm text-gray-500 leading-relaxed">
                        Once you submit, your profile will be visible to employers searching for
                        candidates with your skills. You can edit or update everything at any time
                        from your dashboard.
                    </p>
                </div>
            </div>
        </div>

        {{-- Consent checkbox --}}
        <label class="flex items-start gap-3 cursor-pointer group">
            <input type="checkbox" name="seeker_consent" required
                   class="mt-0.5 w-4 h-4 rounded border-gray-300 text-[#149696]
                          focus:ring-[#149696] accent-[#149696]">
            <span class="text-sm text-gray-600 leading-relaxed">
                I agree to the
                <a href="#" class="text-[#149696] hover:underline font-semibold">Terms of Service</a>
                and
                <a href="#" class="text-[#149696] hover:underline font-semibold">Privacy Policy</a>.
                I consent to PostPulse sharing my profile with relevant employers.
            </span>
        </label>

    </div>
</div>
