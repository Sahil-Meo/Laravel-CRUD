@extends('layouts.app')

@section('title', $post['title'])

@push('styles')
<style>
/* ── Article prose typography ─────────────────────────────────────── */
.prose-article h2 {
    font-size: 1.5rem;
    font-weight: 800;
    color: #111827;
    margin: 2.5rem 0 1rem;
    line-height: 1.3;
}
.prose-article p {
    color: #4b5563;
    line-height: 1.85;
    margin-bottom: 1.25rem;
    font-size: 1.0625rem;
}
.prose-article blockquote {
    border-left: 4px solid #149696;
    padding: 1rem 1.25rem;
    margin: 2rem 0;
    background: #e6f7f7;
    border-radius: 0 0.75rem 0.75rem 0;
    font-style: italic;
    color: #0f7a7a;
    font-weight: 600;
    font-size: 1.0625rem;
    line-height: 1.6;
}
.prose-article ul, .prose-article ol {
    padding-left: 1.5rem;
    margin-bottom: 1.25rem;
}
.prose-article li {
    color: #4b5563;
    line-height: 1.85;
    margin-bottom: 0.4rem;
}
.prose-article a {
    color: #149696;
    text-decoration: underline;
    text-underline-offset: 3px;
}
</style>
@endpush

@section('content')

{{-- ═══════════════════════════════════════════════════════════════════════
     1. HERO — featured image + title overlay
     ═══════════════════════════════════════════════════════════════════════ --}}
<section class="relative pt-16 bg-gray-950 overflow-hidden">

    {{-- Hero image --}}
    <div class="relative h-[420px] md:h-[520px]">
        <img src="{{ $post['image_url'] }}"
             alt="{{ $post['title'] }}"
             class="w-full h-full object-cover opacity-50">
        <div class="absolute inset-0 bg-gradient-to-t from-gray-950 via-gray-950/60 to-transparent"></div>
    </div>

    {{-- Title overlay --}}
    <div class="absolute inset-0 flex items-end">
        <div class="max-w-5xl mx-auto px-6 pb-12 w-full">

            {{-- Category + read time --}}
            <div class="flex flex-wrap items-center gap-3 mb-4">
                <span class="text-xs font-bold bg-[#149696] text-white px-3 py-1.5 rounded-full uppercase tracking-widest">
                    {{ $post['category'] }}
                </span>
                <span class="flex items-center gap-1.5 text-xs text-gray-400">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                         stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    {{ $post['read'] }}
                </span>
            </div>

            <h1 class="text-3xl md:text-5xl font-extrabold text-white leading-tight mb-5 max-w-3xl">
                {{ $post['title'] }}
            </h1>

            {{-- Author row --}}
            <div class="flex items-center gap-4">
                <img src="{{ $post['avatar'] }}" alt="{{ $post['author'] }}"
                     class="w-11 h-11 rounded-full border-2 border-white/30 object-cover">
                <div>
                    <p class="text-sm font-semibold text-white">{{ $post['author'] }}</p>
                    <p class="text-xs text-gray-400">{{ $post['created_at'] }}</p>
                </div>
            </div>

        </div>
    </div>

</section>

{{-- ═══════════════════════════════════════════════════════════════════════
     2. CONTENT + SIDEBAR
     ═══════════════════════════════════════════════════════════════════════ --}}
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-[1fr_320px] gap-14">

            {{-- ── LEFT: Article body ── --}}
            <div>

                {{-- Breadcrumb --}}
                <nav class="flex items-center gap-2 text-xs text-gray-400 mb-8">
                    <a href="{{ route('home') }}"
                       class="hover:text-[#149696] transition-colors">Home</a>
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                    <a href="{{ route('blog.index') }}"
                       class="hover:text-[#149696] transition-colors">Career Blog</a>
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                    <span class="text-gray-600 truncate max-w-[220px]">
                        {{ $post['title'] }}
                    </span>
                </nav>

                {{-- Social share bar --}}
                <div class="flex flex-wrap items-center gap-3 mb-10 pb-8 border-b border-gray-100">
                    <span class="text-xs font-semibold text-gray-500 uppercase tracking-widest">Share</span>

                    {{-- LinkedIn --}}
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->url()) }}&title={{ urlencode($post['title']) }}"
                       target="_blank" rel="noopener"
                       class="inline-flex items-center gap-2 text-xs font-semibold text-blue-600
                              bg-blue-50 border border-blue-100 px-3 py-2 rounded-xl
                              hover:bg-blue-600 hover:text-white hover:border-blue-600 transition-all">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                        </svg>
                        LinkedIn
                    </a>

                    {{-- Twitter / X --}}
                    <a href="https://twitter.com/intent/tweet?text={{ urlencode($post['title']) }}&url={{ urlencode(request()->url()) }}"
                       target="_blank" rel="noopener"
                       class="inline-flex items-center gap-2 text-xs font-semibold text-gray-800
                              bg-gray-50 border border-gray-200 px-3 py-2 rounded-xl
                              hover:bg-gray-900 hover:text-white hover:border-gray-900 transition-all">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                        </svg>
                        Twitter
                    </a>

                    {{-- Copy link --}}
                    <button type="button" id="copy-link-btn"
                            data-url="{{ request()->url() }}"
                            class="inline-flex items-center gap-2 text-xs font-semibold text-gray-600
                                   bg-gray-50 border border-gray-200 px-3 py-2 rounded-xl
                                   hover:bg-[#e6f7f7] hover:text-[#149696] hover:border-[#149696]
                                   transition-all">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor"
                             stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                        </svg>
                        <span id="copy-link-text">Copy link</span>
                    </button>
                </div>

                {{-- Article body --}}
                <div class="prose-article">
                    {!! $post['content'] !!}
                </div>

                {{-- Tags --}}
                @if (!empty($post['tags']))
                <div class="flex flex-wrap items-center gap-2 mt-10 pt-8 border-t border-gray-100">
                    <span class="text-xs font-semibold text-gray-500 uppercase tracking-widest">Tags</span>
                    @foreach ($post['tags'] as $tag)
                    <a href="{{ route('blog.index', ['search' => $tag]) }}"
                       class="text-xs bg-[#e6f7f7] text-[#149696] font-medium px-3 py-1.5
                              rounded-full hover:bg-[#149696] hover:text-white transition-colors">
                        {{ $tag }}
                    </a>
                    @endforeach
                </div>
                @endif

                {{-- Author card --}}
                <div class="mt-10 p-6 bg-gray-50 rounded-2xl border border-gray-100 flex gap-5">
                    <img src="{{ $post['avatar'] }}" alt="{{ $post['author'] }}"
                         class="w-16 h-16 rounded-2xl object-cover shrink-0 shadow-sm">
                    <div>
                        <p class="text-xs text-[#149696] font-bold uppercase tracking-widest mb-0.5">
                            Written by
                        </p>
                        <h3 class="text-base font-extrabold text-gray-900 mb-1">
                            {{ $post['author'] }}
                        </h3>
                        <p class="text-sm text-gray-500 leading-relaxed">
                            A writer and thinker on the PostPulse blog, covering career growth,
                            hiring, and the future of work.
                        </p>
                    </div>
                </div>

                {{-- Post navigation (prev / next) --}}
                <div class="grid sm:grid-cols-2 gap-4 mt-10">
                    <a href="{{ route('blog.index') }}"
                       class="group flex items-center gap-3 p-4 bg-white border border-gray-100
                              rounded-2xl hover:border-[#149696]/30 hover:shadow-md transition-all">
                        <div class="w-9 h-9 rounded-xl bg-gray-50 border border-gray-100 flex items-center
                                    justify-center group-hover:bg-[#e6f7f7] group-hover:border-[#149696]/20
                                    transition-colors shrink-0">
                            <svg class="w-4 h-4 text-gray-400 group-hover:text-[#149696] transition-colors"
                                 fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                        </div>
                        <div class="min-w-0">
                            <p class="text-xs text-gray-400 mb-0.5">Back to</p>
                            <p class="text-sm font-semibold text-gray-900
                                       group-hover:text-[#149696] transition-colors truncate">
                                All Articles
                            </p>
                        </div>
                    </a>

                    @if (!empty($related[0]))
                    @php $next = array_values($related)[0]; @endphp
                    <a href="{{ route('blog.show', $next['id']) }}"
                       class="group flex items-center justify-end gap-3 p-4 bg-white border
                              border-gray-100 rounded-2xl hover:border-[#149696]/30
                              hover:shadow-md transition-all text-right">
                        <div class="min-w-0">
                            <p class="text-xs text-gray-400 mb-0.5">Up next</p>
                            <p class="text-sm font-semibold text-gray-900
                                       group-hover:text-[#149696] transition-colors line-clamp-1">
                                {{ $next['title'] }}
                            </p>
                        </div>
                        <div class="w-9 h-9 rounded-xl bg-gray-50 border border-gray-100 flex items-center
                                    justify-center group-hover:bg-[#e6f7f7] group-hover:border-[#149696]/20
                                    transition-colors shrink-0">
                            <svg class="w-4 h-4 text-gray-400 group-hover:text-[#149696] transition-colors"
                                 fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </div>
                    </a>
                    @endif
                </div>

            </div>

            {{-- ── RIGHT: Sidebar ── --}}
            <aside class="space-y-8">

                {{-- Categories widget --}}
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                    <div class="px-5 py-4 border-b border-gray-100">
                        <h3 class="text-sm font-extrabold text-gray-900">Browse by Category</h3>
                    </div>
                    <div class="p-4 space-y-1">
                        @foreach (['Design', 'Development', 'Infrastructure', 'Culture'] as $cat)
                        @php
                            $catColors = [
                                'Design'         => 'bg-violet-50 text-violet-700 border-violet-100',
                                'Development'    => 'bg-blue-50 text-blue-700 border-blue-100',
                                'Infrastructure' => 'bg-emerald-50 text-emerald-700 border-emerald-100',
                                'Culture'        => 'bg-amber-50 text-amber-700 border-amber-100',
                            ];
                            $isActive = $post['category'] === $cat;
                        @endphp
                        <a href="{{ route('blog.index', ['category' => $cat]) }}"
                           class="flex items-center justify-between px-3 py-2.5 rounded-xl
                                  text-sm transition-all
                                  {{ $isActive
                                      ? 'bg-[#e6f7f7] text-[#149696] font-semibold'
                                      : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                            <span>{{ $cat }}</span>
                            <span class="text-xs px-2 py-0.5 rounded-full border
                                         {{ $isActive ? 'bg-[#149696] text-white border-[#149696]' : $catColors[$cat] }}">
                                {{ $cat }}
                            </span>
                        </a>
                        @endforeach
                    </div>
                </div>

                {{-- Recent posts widget --}}
                <div class="bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                    <div class="px-5 py-4 border-b border-gray-100">
                        <h3 class="text-sm font-extrabold text-gray-900">Recent Articles</h3>
                    </div>
                    <div class="divide-y divide-gray-50">
                        @foreach (array_slice($staticPosts, 0, 5) as $recent)
                        <a href="{{ route('blog.show', $recent['id']) }}"
                           class="flex gap-3 p-4 hover:bg-gray-50 transition-colors group">
                            <img src="{{ $recent['image_url'] }}" alt="{{ $recent['title'] }}"
                                 class="w-14 h-14 rounded-xl object-cover shrink-0">
                            <div class="min-w-0">
                                <p class="text-xs text-[#149696] font-semibold mb-1">
                                    {{ $recent['category'] }}
                                </p>
                                <p class="text-sm font-semibold text-gray-900 leading-snug
                                           line-clamp-2 group-hover:text-[#149696] transition-colors">
                                    {{ $recent['title'] }}
                                </p>
                                <p class="text-xs text-gray-400 mt-1">{{ $recent['read'] }}</p>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>

                {{-- Newsletter widget --}}
                <div class="bg-[#149696] rounded-2xl p-6 text-center">
                    <div class="w-10 h-10 bg-white/20 rounded-xl flex items-center justify-center
                                mx-auto mb-4">
                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor"
                             stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-sm font-extrabold text-white mb-2">Get articles in your inbox</h3>
                    <p class="text-xs text-teal-200 mb-4 leading-relaxed">
                        Join 4,200+ readers. Career insights every two weeks.
                    </p>
                    <form class="space-y-2">
                        <input type="email" placeholder="your@email.com"
                               class="w-full px-4 py-2.5 text-sm rounded-xl bg-white/10 border
                                      border-white/20 text-white placeholder-teal-300
                                      focus:outline-none focus:ring-2 focus:ring-white/40 transition">
                        <button type="submit"
                                class="w-full py-2.5 text-sm font-semibold bg-white text-[#0f7a7a]
                                       rounded-xl hover:bg-[#e6f7f7] transition-colors">
                            Subscribe
                        </button>
                    </form>
                    <p class="text-xs text-teal-300/70 mt-3">No spam. Unsubscribe any time.</p>
                </div>

            </aside>

        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════════════
     3. RELATED POSTS
     ═══════════════════════════════════════════════════════════════════════ --}}
@if (count($related) > 0)
<section class="py-16 bg-slate-50 border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-6">

        <div class="flex items-center justify-between mb-10">
            <div>
                <span class="text-[#149696] font-semibold text-sm uppercase tracking-widest">
                    Keep reading
                </span>
                <h2 class="text-3xl font-extrabold text-gray-900 mt-1">Related Articles</h2>
            </div>
            <a href="{{ route('blog.index', ['category' => $post['category']]) }}"
               class="shrink-0 hidden sm:inline-flex items-center gap-2 text-sm font-semibold
                      text-[#149696] hover:text-[#0f7a7a] transition-colors">
                More in {{ $post['category'] }}
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach (array_values($related) as $rel)
            <article class="group bg-white rounded-2xl border border-gray-100 overflow-hidden
                            hover:shadow-xl hover:border-[#149696]/20 hover:-translate-y-0.5
                            transition-all duration-300 flex flex-col">
                <div class="relative overflow-hidden h-48">
                    <img src="{{ $rel['image_url'] }}" alt="{{ $rel['title'] }}"
                         class="w-full h-full object-cover group-hover:scale-105
                                transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent">
                    </div>
                    <span class="absolute top-3 left-3 text-xs font-bold bg-[#149696] text-white
                                 px-2.5 py-1 rounded-full">
                        {{ $rel['category'] }}
                    </span>
                </div>
                <div class="p-6 flex flex-col flex-1">
                    <h3 class="text-base font-extrabold text-gray-900 leading-snug mb-2
                               group-hover:text-[#149696] transition-colors line-clamp-2">
                        {{ $rel['title'] }}
                    </h3>
                    <p class="text-sm text-gray-500 leading-relaxed mb-4 line-clamp-2 flex-1">
                        {{ $rel['description'] }}
                    </p>
                    <div class="flex items-center justify-between pt-4 border-t border-gray-50">
                        <div class="flex items-center gap-2">
                            <img src="{{ $rel['avatar'] }}" class="w-7 h-7 rounded-full"
                                 alt="{{ $rel['author'] }}">
                            <span class="text-xs font-semibold text-gray-700">
                                {{ $rel['author'] }}
                            </span>
                        </div>
                        <span class="text-xs text-gray-400">{{ $rel['read'] }}</span>
                    </div>
                </div>
                <a href="{{ route('blog.show', $rel['id']) }}"
                   class="mx-6 mb-6 flex items-center justify-center gap-2 text-sm font-semibold
                          text-[#149696] border border-[#149696]/20 rounded-xl py-2.5
                          hover:bg-[#149696] hover:text-white hover:border-[#149696] transition-all">
                    Read article
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                    </svg>
                </a>
            </article>
            @endforeach
        </div>

    </div>
</section>
@endif

@endsection

@push('scripts')
<script>
// Copy link to clipboard
(function () {
    var btn = document.getElementById('copy-link-btn');
    var txt = document.getElementById('copy-link-text');
    if (!btn) return;
    btn.addEventListener('click', function () {
        var url = btn.getAttribute('data-url');
        navigator.clipboard.writeText(url).then(function () {
            txt.textContent = 'Copied!';
            btn.classList.add('bg-[#e6f7f7]', 'text-[#149696]', 'border-[#149696]');
            setTimeout(function () {
                txt.textContent = 'Copy link';
                btn.classList.remove('bg-[#e6f7f7]', 'text-[#149696]', 'border-[#149696]');
            }, 2000);
        });
    });
}());
</script>
@endpush
