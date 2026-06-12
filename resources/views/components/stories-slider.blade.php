{{--
|--------------------------------------------------------------------------
| Component: <x-stories-slider>
|--------------------------------------------------------------------------
|
| A reusable infinite-loop drag/swipe testimonial slider.
|
| Props:
|   :stories  (array, required) – Each item must have:
|               quote   string
|               author  string
|               role    string
|               img     string  (URL)
|               stars   int     (1-5)
|
|   title     (string, optional) – Section heading
|   subtitle  (string, optional) – Section sub-heading
|
| Usage:
|   <x-stories-slider
|       title="Stories from our community"
|       subtitle="Real people, real results."
|       :stories="$stories"
|   />
|
| The component registers its JS via @push('scripts') so the parent layout
| must have @stack('scripts') in the <body>.
|
--}}

@props([
    'title'    => 'Stories from our community',
    'subtitle' => 'Real people, real results.',
    'stories'  => [],
])

<section class="py-24 bg-[#149696] overflow-hidden">

    {{-- Section header --}}
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-14">
            <h2 class="text-4xl font-extrabold text-white mb-4">{{ $title }}</h2>
            @if ($subtitle)
                <p class="text-teal-200 text-lg">{{ $subtitle }}</p>
            @endif
        </div>
    </div>

    {{-- Viewport — clips overflow --}}
    <div class="relative select-none">

        {{-- Soft fade edges to blend cards into the background --}}
        <div class="pointer-events-none absolute inset-y-0 left-0 w-24 z-10
                    bg-gradient-to-r from-[#149696] to-transparent"></div>
        <div class="pointer-events-none absolute inset-y-0 right-0 w-24 z-10
                    bg-gradient-to-l from-[#149696] to-transparent"></div>

        {{-- Scrolling track --}}
        <div data-stories-track
             class="flex gap-6 cursor-grab active:cursor-grabbing px-12"
             style="will-change: transform;">

            @foreach ($stories as $story)
            {{-- data-slide marks cards that are cloned for the loop --}}
            <article data-slide
                     class="flex-none w-80 md:w-96 bg-white/10 backdrop-blur-sm
                            rounded-2xl p-7 border border-white/20 flex flex-col">

                {{-- Star rating --}}
                <div class="flex gap-1 mb-4" role="img" aria-label="{{ $story['stars'] }} out of 5 stars">
                    @for ($i = 1; $i <= 5; $i++)
                    <svg class="w-4 h-4 fill-current {{ $i <= $story['stars'] ? 'text-yellow-400' : 'text-white/20' }}"
                         viewBox="0 0 20 20" aria-hidden="true">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0
                                 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1
                                 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54
                                 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1
                                 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1
                                 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    @endfor
                </div>

                {{-- Quote --}}
                <blockquote class="text-white text-sm leading-relaxed flex-1 mb-6">
                    "{{ $story['quote'] }}"
                </blockquote>

                {{-- Author --}}
                <footer class="flex items-center gap-3">
                    <img src="{{ $story['img'] }}"
                         alt="{{ $story['author'] }}"
                         class="w-10 h-10 rounded-full shrink-0 object-cover"
                         loading="lazy">
                    <div>
                        <p class="text-white font-semibold text-sm">{{ $story['author'] }}</p>
                        <p class="text-teal-300 text-xs">{{ $story['role'] }}</p>
                    </div>
                </footer>

            </article>
            @endforeach

        </div>{{-- /track --}}
    </div>{{-- /viewport --}}

</section>

@once
@push('scripts')
{{--
    Loads the slider from public/js/components/stories-slider.js.
    Served as a plain static file — no build step required.
    To add more custom scripts, place them in public/js/ and load
    them the same way using asset('js/your-script.js').
--}}
<script src="{{ asset('js/components/stories-slider.js') }}" defer></script>
@endpush
@endonce
