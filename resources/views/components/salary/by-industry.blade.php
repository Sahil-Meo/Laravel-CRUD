@props(['byIndustry'])

{{-- ===== TOP-PAYING INDUSTRIES ===== --}}
<div>
    <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-8">
        <div>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900">Top-Paying Industries</h2>
            <p class="text-gray-500 mt-1 text-sm">Average salaries across UK industries, with year-on-year growth rates.</p>
        </div>
    </div>

    <div class="space-y-5">
        @foreach($byIndustry as $ind)
        <div class="group">
            <div class="flex items-center justify-between mb-2">
                {{-- Industry name + growth badge --}}
                <div class="flex items-center gap-3 flex-1 min-w-0">
                    <span class="font-semibold text-gray-800 text-sm truncate group-hover:text-[#149696] transition-colors">
                        {{ $ind['industry'] }}
                    </span>
                    <span class="inline-block text-xs font-semibold px-2 py-0.5 rounded-full bg-emerald-100 text-emerald-700 shrink-0">
                        {{ $ind['growth'] }}
                    </span>
                </div>
                {{-- Avg salary --}}
                <span class="text-sm font-bold text-gray-900 ml-4 shrink-0">{{ $ind['avg_salary'] }}</span>
            </div>

            {{-- Bar --}}
            <div class="h-3 bg-gray-100 rounded-full overflow-hidden">
                <div class="{{ $ind['color'] }} h-full rounded-full transition-all duration-700"
                     style="width: {{ $ind['bar_pct'] }}%"></div>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Legend note --}}
    <p class="text-xs text-gray-400 mt-6">
        Bar length relative to top industry (Technology & Software). Growth rates reflect year-on-year change in average reported compensation. Data from PostPulse salary surveys, June 2026.
    </p>
</div>
