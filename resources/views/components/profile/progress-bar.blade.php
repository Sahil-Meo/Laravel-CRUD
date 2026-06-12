{{--
| Component: <x-profile.progress-bar>
| Props:
|   steps  (array)   e.g. ['Personal Info', 'Experience', 'Links & Final']
|   :current (int)   1-based current step index
--}}
@props(['steps' => [], 'current' => 1])

<div class="w-full mb-10" role="progressbar"
     aria-valuenow="{{ $current }}" aria-valuemin="1" aria-valuemax="{{ count($steps) }}">

    {{-- Step labels + connectors --}}
    <div class="flex items-center justify-between relative">

        {{-- Background line --}}
        <div class="absolute top-4 left-0 right-0 h-0.5 bg-gray-200 z-0 mx-8"></div>

        {{-- Active line — grows based on progress --}}
        @php
            $pct = count($steps) > 1 ? round((($current - 1) / (count($steps) - 1)) * 100) : 100;
        @endphp
        <div class="absolute top-4 left-0 h-0.5 bg-[#149696] z-0 mx-8 transition-all duration-500"
             style="width: calc({{ $pct }}% - 4rem)"></div>

        @foreach ($steps as $i => $label)
        @php $stepNum = $i + 1; @endphp
        <div class="relative z-10 flex flex-col items-center gap-2 flex-1">
            <div class="w-8 h-8 rounded-full flex items-center justify-center text-xs font-bold
                        border-2 transition-all duration-300
                        {{ $stepNum < $current  ? 'bg-[#149696] border-[#149696] text-white' : '' }}
                        {{ $stepNum === $current ? 'bg-white border-[#149696] text-[#149696] shadow-md shadow-[#149696]/20' : '' }}
                        {{ $stepNum > $current  ? 'bg-white border-gray-200 text-gray-400' : '' }}">
                @if ($stepNum < $current)
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                    </svg>
                @else
                    {{ $stepNum }}
                @endif
            </div>
            <span class="text-xs font-medium hidden sm:block
                         {{ $stepNum === $current ? 'text-[#149696]' : ($stepNum < $current ? 'text-gray-500' : 'text-gray-400') }}">
                {{ $label }}
            </span>
        </div>
        @endforeach
    </div>
</div>
