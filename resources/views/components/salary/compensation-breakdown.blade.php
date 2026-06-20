@props(['compensation'])

{{-- ===== COMPENSATION BREAKDOWN ===== --}}
<div>
    <div class="mb-8">
        <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900">Compensation Breakdown</h2>
        <p class="text-gray-500 mt-1 text-sm">Average total compensation structure for UK tech professionals in 2026.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">

        {{-- Left: stacked percentage bars (CSS-only) --}}
        <div class="space-y-3">
            <div class="text-sm font-semibold text-gray-600 mb-4 uppercase tracking-wide">As % of Total Package</div>

            @foreach($compensation as $slice)
            <div class="space-y-1.5">
                <div class="flex justify-between text-sm">
                    <span class="font-medium text-gray-700">{{ $slice['label'] }}</span>
                    <span class="font-bold text-gray-900">{{ $slice['pct'] }}%</span>
                </div>
                <div class="h-8 bg-gray-100 rounded-lg overflow-hidden">
                    <div class="h-full rounded-lg transition-all duration-700 flex items-center px-3"
                         style="width: {{ $slice['pct'] }}%; background-color: {{ $slice['color'] }}">
                        <span class="text-white text-xs font-bold whitespace-nowrap">
                            {{ $slice['amount'] }}
                        </span>
                    </div>
                </div>
            </div>
            @endforeach

            {{-- Total --}}
            <div class="pt-4 border-t border-gray-200 flex justify-between items-center">
                <span class="font-bold text-gray-900">Total Package</span>
                <span class="text-xl font-extrabold text-gray-900">
                    @php
                        $total = array_sum(array_map(function($s) {
                            return (int) preg_replace('/[^0-9]/', '', $s['amount']);
                        }, $compensation));
                    @endphp
                    £{{ number_format($total) }}
                </span>
            </div>
        </div>

        {{-- Right: Legend with color swatches --}}
        <div class="bg-gray-50 rounded-2xl p-6 border border-gray-100">
            <div class="text-sm font-semibold text-gray-600 mb-5 uppercase tracking-wide">Breakdown Detail</div>

            <div class="space-y-5">
                @foreach($compensation as $slice)
                <div class="flex items-center gap-4">
                    {{-- Color swatch --}}
                    <div class="w-10 h-10 rounded-xl shrink-0 flex items-center justify-center"
                         style="background-color: {{ $slice['color'] }}20">
                        <div class="w-5 h-5 rounded-md"
                             style="background-color: {{ $slice['color'] }}"></div>
                    </div>

                    {{-- Label + amount --}}
                    <div class="flex-1">
                        <div class="font-semibold text-gray-800 text-sm">{{ $slice['label'] }}</div>
                        <div class="text-xs text-gray-400 mt-0.5">{{ $slice['pct'] }}% of total compensation</div>
                    </div>

                    {{-- Amount --}}
                    <div class="text-right">
                        <div class="font-bold text-gray-900">{{ $slice['amount'] }}</div>
                        <div class="text-xs text-gray-400">avg / yr</div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-5 pt-5 border-t border-gray-200">
                <p class="text-xs text-gray-400 leading-relaxed">
                    Based on self-reported compensation data from 94,000+ PostPulse salary submissions. Benefits package includes health insurance, pension contributions, and perks.
                </p>
            </div>
        </div>
    </div>
</div>
