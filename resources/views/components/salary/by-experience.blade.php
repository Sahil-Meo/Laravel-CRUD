@props(['byExperience'])

{{-- ===== SALARY BY EXPERIENCE LEVEL ===== --}}
<div>
    <div class="mb-8">
        <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900">Salary by Experience Level</h2>
        <p class="text-gray-500 mt-1 text-sm">How years of experience impact earning potential across UK tech roles.</p>
    </div>

    <div class="space-y-4">
        @foreach($byExperience as $exp)
        <div class="bg-white border border-gray-100 rounded-2xl p-5 hover:border-[#149696]/40 hover:shadow-md transition-all duration-200 group">
            <div class="flex flex-col sm:flex-row sm:items-center gap-4">

                {{-- Left: level info --}}
                <div class="sm:w-48 shrink-0">
                    <div class="font-bold text-gray-900 group-hover:text-[#149696] transition-colors">{{ $exp['level'] }}</div>
                    <div class="text-sm text-gray-400 mt-0.5">{{ $exp['years'] }}</div>
                </div>

                {{-- Center: bar --}}
                <div class="flex-1">
                    <div class="h-4 bg-gray-100 rounded-full overflow-hidden">
                        <div class="{{ $exp['color'] }} h-full rounded-full transition-all duration-700"
                             style="width: {{ $exp['bar_pct'] }}%"></div>
                    </div>
                    <div class="flex justify-between text-xs text-gray-400 mt-1.5">
                        <span>£{{ number_format($exp['min']) }}</span>
                        <span>£{{ number_format($exp['max']) }}</span>
                    </div>
                </div>

                {{-- Right: avg salary --}}
                <div class="sm:w-32 sm:text-right shrink-0">
                    <div class="text-xl font-extrabold text-gray-900">{{ $exp['avg'] }}</div>
                    <div class="text-xs text-gray-400 mt-0.5">average</div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Key insight callout --}}
    <div class="mt-6 bg-[#149696]/5 border border-[#149696]/20 rounded-2xl p-5 flex gap-3">
        <div class="w-8 h-8 rounded-lg bg-[#149696]/20 flex items-center justify-center shrink-0 mt-0.5">
            <svg class="w-4 h-4 text-[#149696]" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
            </svg>
        </div>
        <div>
            <p class="text-sm font-semibold text-gray-800">Experience pays off significantly</p>
            <p class="text-sm text-gray-500 mt-0.5">Moving from Junior to Senior level represents an average salary increase of <strong class="text-[#149696]">+125%</strong>, while reaching Director/VP level adds a further <strong class="text-[#149696]">+74%</strong> over Senior salaries.</p>
        </div>
    </div>
</div>
