@extends('layouts.app')

@section('title', 'Blog')

@section('content')

{{-- ===== SUCCESS FLASH ===== --}}
@if (session('success'))
<div x-data="{ show: true }" x-show="show" x-transition
     class="fixed bottom-6 right-6 z-50 flex items-start gap-3 bg-white border border-green-200
            rounded-2xl shadow-xl p-4 max-w-sm">
    <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center shrink-0 mt-0.5">
        <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
        </svg>
    </div>
    <div class="flex-1">
        <p class="text-sm font-semibold text-gray-900">Post submitted!</p>
        <p class="text-xs text-gray-500 mt-0.5">{{ session('success') }}</p>
    </div>
    <button @click="show = false" class="text-gray-400 hover:text-gray-600 transition-colors mt-0.5">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
        </svg>
    </button>
</div>
@endif

{{-- ===== PAGE HERO ===== --}}
<section class="pt-32 pb-16 bg-gradient-to-br from-slate-50 via-white to-teal-50/30">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <span class="inline-flex items-center gap-2 bg-[#e6f7f7] text-[#0f7a7a] text-xs font-semibold px-3 py-1.5 rounded-full mb-5">
            <span class="w-1.5 h-1.5 bg-[#e6f7f7]0 rounded-full"></span>
            Our Blog
        </span>
        <h1 class="text-5xl font-extrabold text-gray-900 mb-4">
            Ideas, insights &amp; updates
        </h1>
        <p class="text-lg text-gray-500 max-w-xl mx-auto">
            Deep dives into design, engineering, infrastructure, and the culture that keeps us moving.
        </p>
    </div>
</section>

{{-- ===== TOOLBAR ===== --}}
<section class="sticky top-16 z-40 bg-white/90 backdrop-blur-md border-b border-gray-100 shadow-sm">
    <div class="max-w-7xl mx-auto px-6 py-4 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">

        {{-- Category Pills --}}
        <div class="flex flex-wrap gap-2">
            @foreach ($categories as $cat)
                <a
                    href="{{ url('/blog') }}?category={{ urlencode($cat) }}{{ $search ? '&search='.urlencode($search) : '' }}"
                    class="px-4 py-1.5 rounded-full text-sm font-medium transition-colors
                        {{ $active === $cat
                            ? 'bg-[#149696] text-white shadow-sm shadow-[#149696]/20'
                            : 'bg-gray-100 text-gray-600 hover:bg-[#e6f7f7] hover:text-[#149696]' }}"
                >
                    {{ $cat }}
                </a>
            @endforeach
        </div>

        {{-- Search --}}
        <form method="GET" action="{{ url('/blog') }}" class="flex items-center gap-2 w-full sm:w-auto">
            @if ($active !== 'All')
                <input type="hidden" name="category" value="{{ $active }}">
            @endif
            <div class="relative flex-1 sm:w-64">
                <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400"
                     fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 11A6 6 0 105 11a6 6 0 0012 0z"/>
                </svg>
                <input
                    type="text"
                    name="search"
                    value="{{ $search }}"
                    placeholder="Search posts…"
                    class="w-full pl-9 pr-4 py-2 text-sm bg-gray-50 border border-gray-200 rounded-lg
                           focus:outline-none focus:ring-2 focus:ring-[#149696]/40 focus:border-[#149696] transition"
                >
            </div>
            <button type="submit"
                    class="px-4 py-2 text-sm font-semibold bg-[#149696] text-white rounded-lg
                           hover:bg-[#0f7a7a] transition-colors">
                Search
            </button>
            @if ($search)
                <a href="{{ url('/blog') }}?category={{ urlencode($active) }}"
                   class="px-3 py-2 text-sm text-gray-500 hover:text-red-500 transition-colors"
                   title="Clear search">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </a>
            @endif
        </form>

        {{-- New Post Button --}}
        <a href="{{ route('blog.create') }}"
           class="shrink-0 inline-flex items-center gap-2 bg-[#149696] text-white text-sm font-semibold
                  px-4 py-2 rounded-lg hover:bg-[#0f7a7a] transition-colors shadow-sm shadow-[#149696]/20">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
            </svg>
            New Post
        </a>

    </div>
</section>

<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-6">

        {{-- ===== FEATURED POST ===== --}}
        @if ($featured)
        <div class="mb-16">
            <p class="text-xs font-bold uppercase tracking-widest text-[#149696] mb-5 flex items-center gap-2">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                </svg>
                Featured Post
            </p>
            <div class="group grid md:grid-cols-2 gap-0 rounded-3xl overflow-hidden border border-gray-100 shadow-lg hover:shadow-2xl transition-shadow bg-white">
                {{-- Image --}}
                <div class="relative overflow-hidden h-72 md:h-auto">
                    <img
                        src="{{ $featured['image_url'] }}"
                        alt="{{ $featured['title'] }}"
                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700"
                    >
                    <div class="absolute inset-0 bg-gradient-to-r from-black/20 to-transparent"></div>
                    <span class="absolute top-4 left-4 bg-[#149696] text-white text-xs font-bold px-3 py-1 rounded-full">
                        {{ $featured['category'] }}
                    </span>
                </div>
                {{-- Content --}}
                <div class="p-10 flex flex-col justify-center">
                    <h2 class="text-3xl font-extrabold text-gray-900 leading-snug mb-4 group-hover:text-[#149696] transition-colors">
                        {{ $featured['title'] }}
                    </h2>
                    <p class="text-gray-500 text-base leading-relaxed mb-6">
                        {{ $featured['description'] }}
                    </p>
                    <div class="flex items-center gap-4 mb-8">
                        <img src="{{ $featured['avatar'] }}" class="w-9 h-9 rounded-full" alt="{{ $featured['author'] }}">
                        <div>
                            <p class="text-sm font-semibold text-gray-800">{{ $featured['author'] }}</p>
                            <p class="text-xs text-gray-400">{{ $featured['created_at'] }} · {{ $featured['read'] }}</p>
                        </div>
                    </div>
                    <a href="#"
                       class="inline-flex items-center gap-2 text-sm font-semibold text-[#149696] hover:text-[#0f7a7a] transition-colors">
                        Read full article
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        @endif

        {{-- ===== POST GRID ===== --}}
        @if (count($posts) > 0)

            {{-- Results count --}}
            <div class="flex items-center justify-between mb-8">
                <p class="text-sm text-gray-400">
                    Showing <span class="font-semibold text-gray-700">{{ count($posts) }}</span>
                    {{ count($posts) === 1 ? 'post' : 'posts' }}
                    @if ($active !== 'All') in <span class="font-semibold text-[#149696]">{{ $active }}</span>@endif
                    @if ($search) matching <span class="font-semibold text-[#149696]">"{{ $search }}"</span>@endif
                </p>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($posts as $post)
                <article class="group bg-white rounded-2xl border border-gray-100 overflow-hidden hover:shadow-xl hover:border-[#149696]/20 transition-all duration-300 flex flex-col">

                    {{-- Thumbnail --}}
                    <div class="relative overflow-hidden h-52">
                        <img
                            src="{{ $post['image_url'] }}"
                            alt="{{ $post['title'] }}"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                        <span class="absolute top-3 left-3 text-xs font-bold px-2.5 py-1 rounded-full
                            @switch($post['category'])
                                @case('Design')         bg-violet-100 text-violet-700 @break
                                @case('Development')    bg-blue-100   text-blue-700   @break
                                @case('Infrastructure') bg-emerald-100 text-emerald-700 @break
                                @case('Culture')        bg-amber-100  text-amber-700  @break
                                @default                bg-gray-100   text-gray-700
                            @endswitch
                        ">
                            {{ $post['category'] }}
                        </span>
                    </div>

                    {{-- Body --}}
                    <div class="p-6 flex flex-col flex-1">
                        <h3 class="text-lg font-bold text-gray-900 leading-snug mb-3 group-hover:text-[#149696] transition-colors line-clamp-2">
                            {{ $post['title'] }}
                        </h3>
                        <p class="text-sm text-gray-500 leading-relaxed mb-5 line-clamp-2 flex-1">
                            {{ $post['description'] }}
                        </p>

                        {{-- Meta --}}
                        <div class="flex items-center justify-between pt-4 border-t border-gray-50">
                            <div class="flex items-center gap-2.5">
                                <img src="{{ $post['avatar'] }}" class="w-8 h-8 rounded-full" alt="{{ $post['author'] }}">
                                <div>
                                    <p class="text-xs font-semibold text-gray-800 leading-tight">{{ $post['author'] }}</p>
                                    <p class="text-xs text-gray-400">{{ $post['created_at'] }}</p>
                                </div>
                            </div>
                            <span class="flex items-center gap-1 text-xs text-gray-400">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                {{ $post['read'] }}
                            </span>
                        </div>
                    </div>

                    {{-- Read link --}}
                    <a href="#"
                       class="mx-6 mb-6 flex items-center justify-center gap-2 text-sm font-semibold text-[#149696]
                              border border-[#149696]/20 rounded-xl py-2.5 hover:bg-[#149696] hover:text-white
                              hover:border-[#149696] transition-all">
                        Read article
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>

                </article>
                @endforeach
            </div>

        @else

            {{-- Empty state --}}
            <div class="text-center py-24">
                <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-5">
                    <svg class="w-7 h-7 text-gray-400" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-bold text-gray-800 mb-2">No posts found</h3>
                <p class="text-gray-500 text-sm mb-6">
                    @if ($search)
                        Nothing matched <strong>"{{ $search }}"</strong>. Try a different term.
                    @else
                        No posts in the <strong>{{ $active }}</strong> category yet.
                    @endif
                </p>
                <a href="{{ url('/blog') }}"
                   class="inline-flex items-center gap-2 text-sm font-semibold text-[#149696] hover:text-[#0f7a7a] transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Back to all posts
                </a>
            </div>

        @endif

    </div>
</section>

{{-- ===== NEWSLETTER CTA ===== --}}
<section class="py-20 bg-slate-50 border-t border-gray-100">
    <div class="max-w-2xl mx-auto px-6 text-center">
        <div class="w-12 h-12 bg-[#cceeee] rounded-2xl flex items-center justify-center mx-auto mb-5">
            <svg class="w-6 h-6 text-[#149696]" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
        </div>
        <h2 class="text-3xl font-extrabold text-gray-900 mb-3">Stay in the loop</h2>
        <p class="text-gray-500 mb-8">Get the best posts delivered straight to your inbox. No spam, unsubscribe any time.</p>
        <form class="flex flex-col sm:flex-row gap-3 max-w-md mx-auto">
            <input
                type="email"
                placeholder="you@example.com"
                class="flex-1 px-4 py-3 text-sm border border-gray-200 rounded-xl focus:outline-none
                       focus:ring-2 focus:ring-[#149696]/40 focus:border-[#149696] transition"
            >
            <button type="submit"
                    class="px-6 py-3 bg-[#149696] text-white text-sm font-semibold rounded-xl
                           hover:bg-[#0f7a7a] transition-colors shadow-lg shadow-teal-100">
                Subscribe
            </button>
        </form>
        <p class="text-xs text-gray-400 mt-4">Join 4,200+ readers. Published every two weeks.</p>
    </div>
</section>

@endsection

@push('scripts')
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush
