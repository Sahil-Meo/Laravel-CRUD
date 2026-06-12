{{--
| Component: <x-profile.seeker.step-personal>
| Job Seeker — Step 1: Personal Information
--}}
<div>
    <h2 class="text-2xl font-extrabold text-gray-900 mb-1">Personal Information</h2>
    <p class="text-gray-500 text-sm mb-8">Tell employers who you are and how to reach you.</p>

    <div class="grid sm:grid-cols-2 gap-6">

        {{-- Profile Picture --}}
        <div class="sm:col-span-2">
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Profile Picture
                <span class="text-gray-400 font-normal ml-1">— optional</span>
            </label>
            <div class="flex items-center gap-5">
                <div id="seeker-avatar-preview"
                     class="w-20 h-20 rounded-2xl bg-[#e6f7f7] flex items-center justify-center
                            text-[#149696] overflow-hidden shrink-0 border-2 border-[#149696]/20">
                    <svg class="w-9 h-9" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                    </svg>
                </div>
                <div>
                    <label class="cursor-pointer inline-flex items-center gap-2 text-sm font-semibold
                                  text-[#149696] border border-[#149696]/30 px-4 py-2 rounded-xl
                                  hover:bg-[#e6f7f7] transition-colors">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"/>
                        </svg>
                        Upload photo
                        <input type="file" name="profile_picture" accept="image/*"
                               class="sr-only" data-preview="seeker-avatar-preview">
                    </label>
                    <p class="text-xs text-gray-400 mt-1.5">JPG, PNG or WebP · Max 2 MB</p>
                </div>
            </div>
        </div>

        {{-- Full Name --}}
        <div>
            <label for="s_full_name" class="block text-sm font-semibold text-gray-700 mb-1.5">
                Full Name <span class="text-red-500">*</span>
            </label>
            <input type="text" id="s_full_name" name="full_name"
                   placeholder="e.g. Sarah Mitchell"
                   class="w-full px-4 py-3 text-sm border border-gray-200 rounded-xl bg-gray-50
                          focus:outline-none focus:ring-2 focus:ring-[#149696]/40 focus:border-[#149696]
                          transition" required>
        </div>

        {{-- Professional Title --}}
        <div>
            <label for="s_title" class="block text-sm font-semibold text-gray-700 mb-1.5">
                Professional Title <span class="text-red-500">*</span>
            </label>
            <input type="text" id="s_title" name="title"
                   placeholder="e.g. Senior UX Designer"
                   class="w-full px-4 py-3 text-sm border border-gray-200 rounded-xl bg-gray-50
                          focus:outline-none focus:ring-2 focus:ring-[#149696]/40 focus:border-[#149696]
                          transition" required>
        </div>

        {{-- Email --}}
        <div>
            <label for="s_email" class="block text-sm font-semibold text-gray-700 mb-1.5">
                Email Address <span class="text-red-500">*</span>
            </label>
            <div class="relative">
                <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none"
                     fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                <input type="email" id="s_email" name="email"
                       placeholder="you@example.com"
                       class="w-full pl-10 pr-4 py-3 text-sm border border-gray-200 rounded-xl bg-gray-50
                              focus:outline-none focus:ring-2 focus:ring-[#149696]/40 focus:border-[#149696]
                              transition" required>
            </div>
        </div>

        {{-- Phone --}}
        <div>
            <label for="s_phone" class="block text-sm font-semibold text-gray-700 mb-1.5">
                Phone Number
                <span class="text-gray-400 font-normal ml-1">— optional</span>
            </label>
            <div class="relative">
                <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none"
                     fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                </svg>
                <input type="tel" id="s_phone" name="phone"
                       placeholder="+1 (555) 000-0000"
                       class="w-full pl-10 pr-4 py-3 text-sm border border-gray-200 rounded-xl bg-gray-50
                              focus:outline-none focus:ring-2 focus:ring-[#149696]/40 focus:border-[#149696]
                              transition">
            </div>
        </div>

        {{-- Location --}}
        <div class="sm:col-span-2">
            <label for="s_location" class="block text-sm font-semibold text-gray-700 mb-1.5">
                Location
                <span class="text-gray-400 font-normal ml-1">— city, country or "Remote"</span>
            </label>
            <div class="relative">
                <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none"
                     fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M17.657 16.657L13.414 20.9a2 2 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                <input type="text" id="s_location" name="location"
                       placeholder="e.g. London, UK · or Remote"
                       class="w-full pl-10 pr-4 py-3 text-sm border border-gray-200 rounded-xl bg-gray-50
                              focus:outline-none focus:ring-2 focus:ring-[#149696]/40 focus:border-[#149696]
                              transition">
            </div>
        </div>

        {{-- Professional Summary --}}
        <div class="sm:col-span-2">
            <div class="flex items-center justify-between mb-1.5">
                <label for="s_summary" class="text-sm font-semibold text-gray-700">
                    Professional Summary
                    <span class="text-gray-400 font-normal ml-1">— optional</span>
                </label>
                <span class="text-xs text-gray-400" id="summary-count">0 / 500</span>
            </div>
            <textarea id="s_summary" name="summary" rows="4" maxlength="500"
                      placeholder="A short paragraph about who you are, what you do, and what you're looking for next..."
                      class="w-full px-4 py-3 text-sm border border-gray-200 rounded-xl bg-gray-50
                             resize-none focus:outline-none focus:ring-2 focus:ring-[#149696]/40
                             focus:border-[#149696] transition"
                      oninput="document.getElementById('summary-count').textContent = this.value.length + ' / 500'"></textarea>
        </div>

    </div>
</div>
