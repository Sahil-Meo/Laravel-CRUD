{{--
| Component: <x-profile.employer.step-company>
| Employer — Step 1: Company Identity
--}}
<div>
    <h2 class="text-2xl font-extrabold text-gray-900 mb-1">Company Identity</h2>
    <p class="text-gray-500 text-sm mb-8">
        This is how candidates will see your company on PostPulse.
    </p>

    <div class="grid sm:grid-cols-2 gap-6">

        {{-- Company Logo --}}
        <div class="sm:col-span-2">
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Company Logo
                <span class="text-gray-400 font-normal ml-1">— optional</span>
            </label>
            <div class="flex items-center gap-5">
                <div id="logo-preview"
                     class="w-20 h-20 rounded-2xl bg-amber-50 flex items-center justify-center
                            text-amber-400 overflow-hidden shrink-0 border-2 border-amber-200">
                    <svg class="w-9 h-9" fill="none" stroke="currentColor" stroke-width="1.5"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2
                                 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-2
                                 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
                <div>
                    <label class="cursor-pointer inline-flex items-center gap-2 text-sm font-semibold
                                  text-amber-600 border border-amber-300 px-4 py-2 rounded-xl
                                  hover:bg-amber-50 transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021
                                     18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"/>
                        </svg>
                        Upload logo
                        <input type="file" name="company_logo" accept="image/*"
                               class="sr-only" data-preview="logo-preview">
                    </label>
                    <p class="text-xs text-gray-400 mt-1.5">
                        Square image recommended · JPG, PNG or SVG · Max 2 MB
                    </p>
                </div>
            </div>
        </div>

        {{-- Company Name --}}
        <div>
            <label for="e_company_name" class="block text-sm font-semibold text-gray-700 mb-1.5">
                Company Name <span class="text-red-500">*</span>
            </label>
            <input type="text" id="e_company_name" name="company_name"
                   placeholder="e.g. Acme Corporation"
                   class="w-full px-4 py-3 text-sm border border-gray-200 rounded-xl bg-gray-50
                          focus:outline-none focus:ring-2 focus:ring-amber-400/40 focus:border-amber-400
                          transition" required>
        </div>

        {{-- Industry --}}
        <div>
            <label for="e_industry" class="block text-sm font-semibold text-gray-700 mb-1.5">
                Industry <span class="text-red-500">*</span>
            </label>
            <select id="e_industry" name="industry" required
                    class="w-full px-4 py-3 text-sm border border-gray-200 rounded-xl bg-gray-50
                           focus:outline-none focus:ring-2 focus:ring-amber-400/40 focus:border-amber-400
                           transition text-gray-700">
                <option value="" disabled selected>Select your industry</option>
                @foreach ([
                    'Technology & Software',
                    'Finance & Fintech',
                    'Healthcare & Biotech',
                    'E-Commerce & Retail',
                    'Media & Entertainment',
                    'Education & EdTech',
                    'Marketing & Advertising',
                    'Legal & Compliance',
                    'Manufacturing & Logistics',
                    'Real Estate & Construction',
                    'Non-Profit & NGO',
                    'Government & Public Sector',
                    'Other',
                ] as $industry)
                <option value="{{ $industry }}">{{ $industry }}</option>
                @endforeach
            </select>
        </div>

        {{-- Contact Person Name --}}
        <div>
            <label for="e_contact_name" class="block text-sm font-semibold text-gray-700 mb-1.5">
                Contact Person Name <span class="text-red-500">*</span>
            </label>
            <input type="text" id="e_contact_name" name="contact_name"
                   placeholder="e.g. James Owens"
                   class="w-full px-4 py-3 text-sm border border-gray-200 rounded-xl bg-gray-50
                          focus:outline-none focus:ring-2 focus:ring-amber-400/40 focus:border-amber-400
                          transition" required>
        </div>

        {{-- Company Size --}}
        <div>
            <label for="e_company_size" class="block text-sm font-semibold text-gray-700 mb-1.5">
                Company Size <span class="text-red-500">*</span>
            </label>
            <select id="e_company_size" name="company_size" required
                    class="w-full px-4 py-3 text-sm border border-gray-200 rounded-xl bg-gray-50
                           focus:outline-none focus:ring-2 focus:ring-amber-400/40 focus:border-amber-400
                           transition text-gray-700">
                <option value="" disabled selected>Select team size</option>
                @foreach ([
                    '1–10 (Solo / Startup)',
                    '11–50 (Small business)',
                    '51–200 (Growth stage)',
                    '201–500 (Mid-market)',
                    '501–1,000',
                    '1,000–5,000',
                    '5,000+ (Enterprise)',
                ] as $size)
                <option value="{{ $size }}">{{ $size }}</option>
                @endforeach
            </select>
        </div>

        {{-- Business Email --}}
        <div>
            <label for="e_email" class="block text-sm font-semibold text-gray-700 mb-1.5">
                Business Email <span class="text-red-500">*</span>
            </label>
            <div class="relative">
                <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none"
                     fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                <input type="email" id="e_email" name="business_email"
                       placeholder="hiring@company.com"
                       class="w-full pl-10 pr-4 py-3 text-sm border border-gray-200 rounded-xl bg-gray-50
                              focus:outline-none focus:ring-2 focus:ring-amber-400/40 focus:border-amber-400
                              transition" required>
            </div>
        </div>

        {{-- Phone --}}
        <div>
            <label for="e_phone" class="block text-sm font-semibold text-gray-700 mb-1.5">
                Phone Number
                <span class="text-gray-400 font-normal ml-1">— optional</span>
            </label>
            <div class="relative">
                <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none"
                     fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502
                             1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0
                             011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716
                             21 3 14.284 3 6V5z"/>
                </svg>
                <input type="tel" id="e_phone" name="phone"
                       placeholder="+1 (555) 000-0000"
                       class="w-full pl-10 pr-4 py-3 text-sm border border-gray-200 rounded-xl bg-gray-50
                              focus:outline-none focus:ring-2 focus:ring-amber-400/40 focus:border-amber-400
                              transition">
            </div>
        </div>

        {{-- Company Location --}}
        <div class="sm:col-span-2">
            <label for="e_location" class="block text-sm font-semibold text-gray-700 mb-1.5">
                Company Location <span class="text-red-500">*</span>
            </label>
            <div class="relative">
                <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none"
                     fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M17.657 16.657L13.414 20.9a2 2 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <input type="text" id="e_location" name="company_location"
                       placeholder="e.g. London, UK · or Multiple Locations"
                       class="w-full pl-10 pr-4 py-3 text-sm border border-gray-200 rounded-xl bg-gray-50
                              focus:outline-none focus:ring-2 focus:ring-amber-400/40 focus:border-amber-400
                              transition" required>
            </div>
        </div>

    </div>
</div>
