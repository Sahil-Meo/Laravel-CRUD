@props(['trends'])

{{-- ===== SALARY GROWTH TRENDS ===== --}}
<div>
    <div class="mb-8">
        <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900">Salary Growth Trends</h2>
        <p class="text-gray-500 mt-1 text-sm">Average UK salaries have grown <strong class="text-gray-700">16.5%</strong> over the past 5 years.</p>
    </div>

    {{-- Chart container --}}
    <div class="bg-gray-50 rounded-2xl p-6 sm:p-8 border border-gray-100">

        {{-- Growth summary strip --}}
        <div class="flex flex-col sm:flex-row gap-4 mb-8 p-4 bg-white rounded-xl border border-[#149696]/20">
            <div class="flex-1 text-center sm:text-left">
                <div class="text-xs text-gray-400 uppercase tracking-wide font-semibold mb-1">2021 Baseline</div>
                <div class="text-xl font-extrabold text-gray-900">£40,500</div>
            </div>
            <div class="hidden sm:flex items-center text-gray-200 text-2xl">→</div>
            <div class="flex-1 text-center">
                <div class="text-xs text-gray-400 uppercase tracking-wide font-semibold mb-1">5-Year Growth</div>
                <div class="text-xl font-extrabold text-emerald-600">+16.5%</div>
            </div>
            <div class="hidden sm:flex items-center text-gray-200 text-2xl">→</div>
            <div class="flex-1 text-center sm:text-right">
                <div class="text-xs text-gray-400 uppercase tracking-wide font-semibold mb-1">2026 Average</div>
                <div class="text-xl font-extrabold text-[#149696]">£47,200</div>
            </div>
        </div>

        {{-- Bar chart --}}
        <div class="flex items-end justify-around gap-2 sm:gap-4 h-56">
            @foreach($trends as $bar)
            <div class="flex flex-col items-center flex-1 gap-2 h-full justify-end">

                {{-- Salary label above bar --}}
                <div class="text-xs font-semibold text-gray-600 text-center leading-tight">
                    £{{ number_format($bar['avg'] / 1000, 1) }}k
                </div>

                {{-- The bar --}}
                <div class="w-full relative flex items-end justify-center"
                     style="height: {{ $bar['bar_pct'] * 2 }}px">
                    @if(!empty($bar['projected']))
                        {{-- Projected bar: dashed border outline only --}}
                        <div class="w-full h-full rounded-t-lg border-2 border-dashed border-[#149696]/60 bg-[#149696]/10 relative">
                            <span class="absolute -top-6 left-1/2 -translate-x-1/2 text-[10px] text-[#149696] font-bold whitespace-nowrap">
                                Projected
                            </span>
                        </div>
                    @else
                        <div class="w-full h-full rounded-t-lg bg-[#149696] hover:bg-[#0f7a7a] transition-colors cursor-default"></div>
                    @endif
                </div>

                {{-- Year label below --}}
                <div class="text-xs text-gray-500 font-medium text-center">{{ $bar['year'] }}</div>
            </div>
            @endforeach
        </div>

        {{-- Legend --}}
        <div class="flex items-center gap-6 mt-6 justify-center text-xs text-gray-500">
            <div class="flex items-center gap-2">
                <div class="w-4 h-3 rounded bg-[#149696]"></div>
                <span>Reported average</span>
            </div>
            <div class="flex items-center gap-2">
                <div class="w-4 h-3 rounded border-2 border-dashed border-[#149696]/60 bg-[#149696]/10"></div>
                <span>Projected</span>
            </div>
        </div>
    </div>
</div>
