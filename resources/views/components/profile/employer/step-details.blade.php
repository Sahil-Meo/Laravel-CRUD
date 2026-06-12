{{--
| Component: <x-profile.employer.step-details>
| Employer — Step 2: About the Company, Links & Final Review
--}}
<div>
    <h2 class="text-2xl font-extrabold text-gray-900 mb-1">About &amp; Online Presence</h2>
    <p class="text-gray-500 text-sm mb-8">
        Help candidates understand your mission and where to find you online.
    </p>

    <div class="space-y-6">

        {{-- Company Description --}}
        <div>
            <div class="flex items-center justify-between mb-1.5">
                <label for="e_description" class="text-sm font-semibold text-gray-700">
                    Company Description <span class="text-red-500">*</span>
                </label>
                <span class="text-xs text-gray-400" id="desc-count">0 / 1000</span>
            </div>
            <textarea id="e_description" name="company_description" rows="6"
                      maxlength="1000" required
                      placeholder="Tell candidates about your company culture, mission, what you build, and why it's a great place to work..."
                      class="w-full px-4 py-3 text-sm border border-gray-200 rounded-xl bg-gray-50
                             resize-none focus:outline-none focus:ring-2 focus:ring-amber-400/40
                             focus:border-amber-400 transition"
                      oninput="document.getElementById('desc-count').textContent = this.value.length + ' / 1000'">
            </textarea>
            <p class="text-xs text-gray-400 mt-1.5">
                Companies with detailed descriptions receive 3× more qualified applicants.
            </p>
        </div>

        {{-- Company Website --}}
        <div>
            <label for="e_website" class="block text-sm font-semibold text-gray-700 mb-1.5">
                Company Website
                <span class="text-gray-400 font-normal ml-1">— optional</span>
            </label>
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                         stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9
                                 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>
                    </svg>
                </span>
                <input type="url" id="e_website" name="company_website"
                       placeholder="https://www.yourcompany.com"
                       class="w-full pl-10 pr-4 py-3 text-sm border border-gray-200 rounded-xl bg-gray-50
                              focus:outline-none focus:ring-2 focus:ring-amber-400/40 focus:border-amber-400 transition">
            </div>
        </div>

        {{-- Social Media --}}
        <fieldset>
            <legend class="text-sm font-semibold text-gray-700 mb-3">
                Social Media Links
                <span class="text-gray-400 font-normal ml-1">— optional</span>
            </legend>
            <div class="grid sm:grid-cols-2 gap-4">
                {{-- LinkedIn --}}
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762
                                     0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966
                                     0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783
                                     1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586
                                     7-2.777 7 2.476v6.759z"/>
                        </svg>
                    </span>
                    <input type="url" name="linkedin_company"
                           placeholder="LinkedIn company page"
                           class="w-full pl-10 pr-4 py-3 text-sm border border-gray-200 rounded-xl bg-gray-50
                                  focus:outline-none focus:ring-2 focus:ring-amber-400/40 focus:border-amber-400 transition">
                </div>
                {{-- Twitter / X --}}
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-700" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99
                                     21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084
                                     4.126H5.117z"/>
                        </svg>
                    </span>
                    <input type="url" name="twitter_company"
                           placeholder="Twitter / X profile"
                           class="w-full pl-10 pr-4 py-3 text-sm border border-gray-200 rounded-xl bg-gray-50
                                  focus:outline-none focus:ring-2 focus:ring-amber-400/40 focus:border-amber-400 transition">
                </div>
            </div>
        </fieldset>

        {{-- Review card --}}
        <div class="mt-6 rounded-2xl border border-amber-200 bg-amber-50/60 p-6">
            <div class="flex items-start gap-4">
                <div class="w-10 h-10 rounded-xl bg-amber-400 flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                         stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-sm font-bold text-gray-900 mb-1">Ready to start hiring!</p>
                    <p class="text-sm text-gray-600 leading-relaxed">
                        Once submitted, your employer profile goes live immediately. You can post
                        your first job right away and start receiving applications from qualified
                        candidates on PostPulse.
                    </p>
                </div>
            </div>
        </div>

        {{-- Consent --}}
        <label class="flex items-start gap-3 cursor-pointer">
            <input type="checkbox" name="employer_consent" required
                   class="mt-0.5 w-4 h-4 rounded border-gray-300 accent-amber-500
                          focus:ring-amber-400">
            <span class="text-sm text-gray-600 leading-relaxed">
                I confirm that I am authorised to create this employer account on behalf of the company,
                and I agree to the
                <a href="#" class="text-[#149696] hover:underline font-semibold">Terms of Service</a>
                and
                <a href="#" class="text-[#149696] hover:underline font-semibold">Privacy Policy</a>.
            </span>
        </label>

    </div>
</div>
