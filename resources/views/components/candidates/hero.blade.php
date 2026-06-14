{{--
| Component: <x-candidates.hero>
| Page hero with headline and main search bar.
| Props: search (string)
--}}
@props(['search' => ''])

<section class="relative pt-32 pb-16 bg-gradient-to-br from-gray-950 via-gray-900 to-[#0a4f4f] overflow-hidden">

    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-0 left-1/4 w-96 h-96 rounded-full bg-[#149696] blur-3xl"></div>
        <div class="absolute bottom-0 right-1/4 w-72 h-72 rounded-full bg-teal-400 blur-3xl"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-6">
        <div class="text-center mb-10">
            <span class="inline-flex items-center gap-2 bg-[#149696]/20 text-[#4dd4d4]
                         border border-[#149696]/30 text-xs font-bold px-3 py-1.5 rounded-full
                         uppercase tracking-widest mb-5">
                <span class="w-1.5 h-1.5 rounded-full bg-[#149696] animate-pulse"></span>
                For Employers
            </span>
            <h1 class="text-5xl lg:text-6xl font-extrabold text-white leading-tight mb-4">
                Find your next
                <span class="text-[#4dd4d4]">great hire</span>
            </h1>
            <p class="text-lg text-gray-300 max-w-xl mx-auto">
                Browse verified candidate profiles across every discipline.
                Search by skill, experience, location, or availability and
                reach out directly.
            </p>
        </div>

        {{-- Search bar --}}
        <form method="GET" action="{{ route('candidates.index') }}"
              class="max-w-2xl mx-auto">
            <div class="flex gap-3">
                <div class="relative flex-1">
                    <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400 pointer-events-none"
                         fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M21 21l-4.35-4.35M17 11A6 6 0 105 11a6 6 0 0012 0z"/>
                    </svg>
                    <input type="text" name="search" value="{{ $search }}"
                           placeholder="Search by name, title, skill or keyword…"
                           class="w-full pl-12 pr-4 py-4 text-sm bg-white/10 border border-white/20
                                  text-white placeholder-gray-400 rounded-xl
                                  focus:outline-none focus:ring-2 focus:ring-[#149696] focus:border-[#149696]
                                  transition">
                </div>
                <button type="submit"
                        class="shrink-0 bg-[#149696] text-white font-semibold px-7 py-4 rounded-xl
                               hover:bg-[#0f7a7a] transition-colors shadow-lg shadow-[#149696]/30 text-sm">
                    Search
                </button>
            </div>

            {{-- Popular skill tags --}}
            <div class="flex flex-wrap justify-center gap-2 mt-5">
                <span class="text-xs text-gray-500">Popular:</span>
                @foreach (['React', 'Python', 'UX Design', 'Product Management', 'Data Science', 'Node.js'] as $tag)
                @php $isActive = strtolower($search) === strtolower($tag); @endphp
                <button type="submit" name="search" value="{{ $tag }}"
                        class="text-xs px-3 py-1 rounded-full border transition-colors
                               {{ $isActive
                                   ? 'bg-[#149696] text-white border-[#149696] shadow-sm shadow-[#149696]/40 font-semibold'
                                   : 'text-gray-300 border-white/15 hover:border-[#149696] hover:text-[#4dd4d4] hover:bg-[#149696]/10' }}">
                    @if ($isActive)
                    <span class="inline-flex items-center gap-1">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="3"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                        </svg>
                        {{ $tag }}
                    </span>
                    @else
                        {{ $tag }}
                    @endif
                </button>
                @endforeach
            </div>
        </form>
    </div>
</section>
