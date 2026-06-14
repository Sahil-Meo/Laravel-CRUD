{{--
| Component: <x-candidates.filter-group>
| A collapsible labeled group inside the sidebar.
| Props: label (string)
--}}
@props(['label' => ''])

<div x-data="{ open: true }" class="border-t border-gray-100 pt-5">
    <button type="button" @click="open = !open"
            class="w-full flex items-center justify-between mb-3 group">
        <span class="text-sm font-semibold text-gray-800">{{ $label }}</span>
        <svg class="w-4 h-4 text-gray-400 transition-transform duration-200"
             :class="open ? 'rotate-180' : ''"
             fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
        </svg>
    </button>
    <div x-show="open" x-transition class="space-y-2.5">
        {{ $slot }}
    </div>
</div>
