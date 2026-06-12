{{--
| Component: <x-profile.seeker.step-experience>
| Job Seeker — Step 2: Skills, Experience & Education
--}}
<div>
    <h2 class="text-2xl font-extrabold text-gray-900 mb-1">Skills &amp; Background</h2>
    <p class="text-gray-500 text-sm mb-8">Help employers understand what you bring to the table.</p>

    <div class="space-y-8">

        {{-- Skills --}}
        <div>
            <label for="s_skills" class="block text-sm font-semibold text-gray-700 mb-1.5">
                Skills
                <span class="text-gray-400 font-normal ml-1">— separate with commas</span>
            </label>
            <input type="text" id="s_skills" name="skills"
                   placeholder="e.g. Figma, UX Research, Prototyping, HTML, CSS"
                   class="w-full px-4 py-3 text-sm border border-gray-200 rounded-xl bg-gray-50
                          focus:outline-none focus:ring-2 focus:ring-[#149696]/40 focus:border-[#149696] transition">
            <p class="text-xs text-gray-400 mt-1.5">
                Add your top 5–10 most relevant skills. These are used for job matching.
            </p>

            {{-- Tag preview --}}
            <div id="skills-preview" class="flex flex-wrap gap-2 mt-3 empty:hidden"></div>
        </div>

        {{-- Work Experience --}}
        <div>
            <label for="s_experience" class="block text-sm font-semibold text-gray-700 mb-1.5">
                Work Experience
                <span class="text-gray-400 font-normal ml-1">— optional</span>
            </label>
            <textarea id="s_experience" name="experience" rows="6"
                      placeholder="List your most recent roles. For each, include:&#10;• Job title &amp; company&#10;• Duration (e.g. Jan 2022 – Present)&#10;• Key responsibilities or achievements"
                      class="w-full px-4 py-3 text-sm border border-gray-200 rounded-xl bg-gray-50
                             resize-none focus:outline-none focus:ring-2 focus:ring-[#149696]/40
                             focus:border-[#149696] transition"></textarea>
            <p class="text-xs text-gray-400 mt-1.5">
                Focus on achievements and outcomes, not just duties.
            </p>
        </div>

        {{-- Education --}}
        <div>
            <label for="s_education" class="block text-sm font-semibold text-gray-700 mb-1.5">
                Education
                <span class="text-gray-400 font-normal ml-1">— optional</span>
            </label>
            <textarea id="s_education" name="education" rows="4"
                      placeholder="e.g. BSc Computer Science, University of Manchester, 2018–2021&#10;Relevant modules: HCI, Software Engineering, Data Structures"
                      class="w-full px-4 py-3 text-sm border border-gray-200 rounded-xl bg-gray-50
                             resize-none focus:outline-none focus:ring-2 focus:ring-[#149696]/40
                             focus:border-[#149696] transition"></textarea>
        </div>

        {{-- Resume upload --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1.5">
                Resume / CV
                <span class="text-gray-400 font-normal ml-1">— optional</span>
            </label>
            <label class="flex flex-col items-center justify-center gap-3 w-full py-10
                          border-2 border-dashed border-gray-200 rounded-2xl bg-gray-50
                          cursor-pointer hover:border-[#149696] hover:bg-[#e6f7f7]/30
                          transition-colors group" id="resume-drop-zone">
                <div class="w-12 h-12 rounded-2xl bg-white border border-gray-200 flex items-center
                            justify-center group-hover:border-[#149696] transition-colors shadow-sm">
                    <svg class="w-6 h-6 text-gray-400 group-hover:text-[#149696] transition-colors"
                         fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                </div>
                <div class="text-center">
                    <p class="text-sm font-semibold text-gray-700 group-hover:text-[#149696] transition-colors">
                        Click to upload or drag &amp; drop
                    </p>
                    <p class="text-xs text-gray-400 mt-0.5">PDF, DOC or DOCX · Max 5 MB</p>
                </div>
                <span id="resume-filename"
                      class="text-xs font-medium text-[#149696] hidden"></span>
                <input type="file" name="resume" accept=".pdf,.doc,.docx"
                       class="sr-only" id="resume-input">
            </label>
        </div>

    </div>
</div>

@push('scripts')
<script>
// Skills tag preview
(function () {
    var input   = document.getElementById('s_skills');
    var preview = document.getElementById('skills-preview');
    if (!input || !preview) return;

    input.addEventListener('input', function () {
        preview.innerHTML = '';
        var tags = this.value.split(',').map(function (s) { return s.trim(); }).filter(Boolean);
        tags.forEach(function (tag) {
            var el = document.createElement('span');
            el.className = 'inline-flex items-center text-xs bg-[#e6f7f7] text-[#149696] font-medium px-3 py-1 rounded-full';
            el.textContent = tag;
            preview.appendChild(el);
        });
    });

    // Resume filename display
    var resumeInput = document.getElementById('resume-input');
    var filenameEl  = document.getElementById('resume-filename');
    if (resumeInput && filenameEl) {
        resumeInput.addEventListener('change', function () {
            if (this.files.length) {
                filenameEl.textContent = '✓ ' + this.files[0].name;
                filenameEl.classList.remove('hidden');
            }
        });
    }
}());
</script>
@endpush
