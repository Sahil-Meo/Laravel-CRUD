@extends('layouts.app')

@section('title', 'New Post')

@section('content')

<div class="min-h-screen bg-gradient-to-br from-slate-50 via-white to-indigo-50/40 pt-28 pb-20">
    <div class="max-w-5xl mx-auto px-6">

        {{-- ===== PAGE HEADER ===== --}}
        <div class="mb-10">
            <a href="{{ route('blog.index') }}"
               class="inline-flex items-center gap-1.5 text-sm text-gray-500 hover:text-indigo-600 transition-colors mb-6">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Back to Blog
            </a>
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 bg-indigo-600 rounded-2xl flex items-center justify-center shadow-lg shadow-indigo-200">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 4v16m8-8H4"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-extrabold text-gray-900">Create a New Post</h1>
                    <p class="text-gray-500 text-sm mt-0.5">Fill in the details below to publish your article.</p>
                </div>
            </div>
        </div>

        {{-- ===== MAIN GRID: FORM + LIVE PREVIEW ===== --}}
        <div class="grid lg:grid-cols-5 gap-8" x-data="{
            title:       '{{ old('title') }}',
            imageUrl:    '{{ old('image_url') }}',
            description: '{{ old('description') }}',
            category:    '{{ old('category', '') }}',
            imageError:  false,
            get hasPreview() {
                return this.title.trim().length > 0 || this.imageUrl.trim().length > 0 || this.description.trim().length > 0;
            }
        }">

            {{-- ===== FORM PANEL ===== --}}
            <div class="lg:col-span-3">
                <div class="bg-white rounded-3xl shadow-sm border border-gray-100 overflow-hidden">

                    {{-- Form header bar --}}
                    <div class="px-8 py-5 border-b border-gray-100 flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-red-400"></span>
                            <span class="w-2.5 h-2.5 rounded-full bg-yellow-400"></span>
                            <span class="w-2.5 h-2.5 rounded-full bg-green-400"></span>
                        </div>
                        <span class="text-xs text-gray-400 font-medium">new-post.md</span>
                    </div>

                    <form action="{{ route('blog.store') }}" method="POST" class="px-8 py-8 space-y-7" novalidate>
                        @csrf

                        {{-- ---- Title ---- --}}
                        <div>
                            <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">
                                Post Title
                                <span class="text-red-500 ml-0.5">*</span>
                            </label>
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </div>
                                <input
                                    type="text"
                                    id="title"
                                    name="title"
                                    x-model="title"
                                    placeholder="e.g. How We Rebuilt Our API from the Ground Up"
                                    maxlength="150"
                                    class="w-full pl-10 pr-4 py-3 text-sm border rounded-xl transition
                                           focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-indigo-400
                                           @error('title') border-red-400 bg-red-50 @else border-gray-200 bg-gray-50 @enderror"
                                    value="{{ old('title') }}"
                                >
                            </div>
                            @error('title')
                                <p class="mt-2 flex items-center gap-1.5 text-xs text-red-600">
                                    <svg class="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- ---- Image URL ---- --}}
                        <div>
                            <label for="image_url" class="block text-sm font-semibold text-gray-700 mb-2">
                                Cover Image URL
                                <span class="text-red-500 ml-0.5">*</span>
                            </label>
                            <div class="relative">
                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3.5">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <input
                                    type="url"
                                    id="image_url"
                                    name="image_url"
                                    x-model="imageUrl"
                                    @input="imageError = false"
                                    placeholder="https://images.unsplash.com/photo-..."
                                    class="w-full pl-10 pr-4 py-3 text-sm border rounded-xl transition
                                           focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-indigo-400
                                           @error('image_url') border-red-400 bg-red-50 @else border-gray-200 bg-gray-50 @enderror"
                                    value="{{ old('image_url') }}"
                                >
                            </div>
                            <p class="mt-1.5 text-xs text-gray-400">Paste any public image URL. Try <a href="https://unsplash.com" target="_blank" class="text-indigo-500 hover:underline">Unsplash</a> for free photos.</p>
                            @error('image_url')
                                <p class="mt-2 flex items-center gap-1.5 text-xs text-red-600">
                                    <svg class="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- ---- Category ---- --}}
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Category
                                <span class="text-red-500 ml-0.5">*</span>
                            </label>
                            <div class="grid grid-cols-2 gap-3">
                                @foreach ($categories as $cat)
                                    @php
                                        $colors = [
                                            'Design'         => 'peer-checked:border-violet-500 peer-checked:bg-violet-50 peer-checked:text-violet-700',
                                            'Development'    => 'peer-checked:border-blue-500   peer-checked:bg-blue-50   peer-checked:text-blue-700',
                                            'Infrastructure' => 'peer-checked:border-emerald-500 peer-checked:bg-emerald-50 peer-checked:text-emerald-700',
                                            'Culture'        => 'peer-checked:border-amber-500  peer-checked:bg-amber-50  peer-checked:text-amber-700',
                                        ];
                                        $icons = [
                                            'Design'         => '<path stroke-linecap="round" stroke-linejoin="round" d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zm0 8a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zm12 0a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/>',
                                            'Development'    => '<path stroke-linecap="round" stroke-linejoin="round" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>',
                                            'Infrastructure' => '<path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2"/>',
                                            'Culture'        => '<path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>',
                                        ];
                                    @endphp
                                    <label class="relative cursor-pointer">
                                        <input type="radio" name="category" value="{{ $cat }}"
                                               x-model="category"
                                               class="peer sr-only"
                                               {{ old('category') === $cat ? 'checked' : '' }}>
                                        <div class="flex items-center gap-3 px-4 py-3 rounded-xl border-2 border-gray-200
                                                    bg-gray-50 transition-all
                                                    peer-checked:shadow-sm {{ $colors[$cat] }}
                                                    hover:border-gray-300 hover:bg-white">
                                            <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                {!! $icons[$cat] !!}
                                            </svg>
                                            <span class="text-sm font-medium">{{ $cat }}</span>
                                        </div>
                                        {{-- Checkmark badge --}}
                                        <div class="hidden peer-checked:flex absolute top-2 right-2 w-4 h-4 bg-current rounded-full items-center justify-center">
                                            <svg class="w-2.5 h-2.5 text-white" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                                            </svg>
                                        </div>
                                    </label>
                                @endforeach
                            </div>
                            @error('category')
                                <p class="mt-2 flex items-center gap-1.5 text-xs text-red-600">
                                    <svg class="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- ---- Description ---- --}}
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <label for="description" class="text-sm font-semibold text-gray-700">
                                    Short Description
                                    <span class="text-red-500 ml-0.5">*</span>
                                </label>
                                <span class="text-xs text-gray-400" x-text="(500 - description.length) + ' chars left'"></span>
                            </div>
                            <textarea
                                id="description"
                                name="description"
                                x-model="description"
                                rows="4"
                                maxlength="500"
                                placeholder="Write a compelling 1–2 sentence summary of your post. This will appear on the blog card."
                                class="w-full px-4 py-3 text-sm border rounded-xl resize-none transition
                                       focus:outline-none focus:ring-2 focus:ring-indigo-300 focus:border-indigo-400
                                       @error('description') border-red-400 bg-red-50 @else border-gray-200 bg-gray-50 @enderror"
                            >{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-2 flex items-center gap-1.5 text-xs text-red-600">
                                    <svg class="w-3.5 h-3.5 shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- ---- Actions ---- --}}
                        <div class="flex items-center gap-3 pt-2">
                            <button type="submit"
                                    class="flex-1 flex items-center justify-center gap-2 bg-indigo-600 text-white
                                           text-sm font-semibold py-3 rounded-xl hover:bg-indigo-700
                                           active:scale-95 transition-all shadow-lg shadow-indigo-200">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Publish Post
                            </button>
                            <a href="{{ route('blog.index') }}"
                               class="px-5 py-3 text-sm font-semibold text-gray-600 border border-gray-200
                                      rounded-xl hover:border-gray-300 hover:text-gray-800 transition-colors">
                                Cancel
                            </a>
                        </div>

                    </form>
                </div>
            </div>

            {{-- ===== LIVE PREVIEW PANEL ===== --}}
            <div class="lg:col-span-2">
                <div class="sticky top-28 space-y-5">

                    {{-- Preview card --}}
                    <div>
                        <p class="text-xs font-bold uppercase tracking-widest text-gray-400 mb-3 flex items-center gap-2">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            Live Preview
                        </p>

                        <div class="rounded-2xl border border-gray-100 overflow-hidden shadow-sm bg-white transition-all"
                             :class="hasPreview ? 'opacity-100' : 'opacity-60'">

                            {{-- Cover image --}}
                            <div class="relative h-44 bg-gradient-to-br from-slate-100 to-indigo-50 overflow-hidden">
                                <template x-if="imageUrl && !imageError">
                                    <img :src="imageUrl" @@error="imageError = true"
                                         class="w-full h-full object-cover" alt="Cover preview">
                                </template>
                                <template x-if="!imageUrl || imageError">
                                    <div class="flex flex-col items-center justify-center h-full gap-2 text-gray-300">
                                        <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
                                        </svg>
                                        <span class="text-xs">Image preview</span>
                                    </div>
                                </template>

                                {{-- Category badge --}}
                                <template x-if="category">
                                    <span class="absolute top-3 left-3 text-xs font-bold px-2.5 py-1 rounded-full bg-white/90 text-gray-700 shadow-sm"
                                          x-text="category"></span>
                                </template>
                            </div>

                            {{-- Post meta --}}
                            <div class="p-5">
                                <h3 class="text-base font-bold text-gray-900 leading-snug mb-2 line-clamp-2 min-h-[2.8rem]"
                                    x-text="title || 'Your post title will appear here…'">
                                </h3>
                                <p class="text-xs text-gray-500 leading-relaxed line-clamp-3 min-h-[3rem]"
                                   x-text="description || 'Your short description will appear here…'">
                                </p>
                                <div class="flex items-center justify-between mt-4 pt-4 border-t border-gray-50">
                                    <div class="flex items-center gap-2">
                                        <div class="w-6 h-6 rounded-full bg-indigo-100 flex items-center justify-center">
                                            <svg class="w-3.5 h-3.5 text-indigo-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                            </svg>
                                        </div>
                                        <span class="text-xs text-gray-500">You · Just now</span>
                                    </div>
                                    <span class="text-xs text-gray-400 flex items-center gap-1">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        ~3 min read
                                    </span>
                                </div>
                            </div>
                        </div>

                        {{-- Empty hint --}}
                        <template x-if="!hasPreview">
                            <p class="text-center text-xs text-gray-400 mt-3">Start filling the form to see a preview</p>
                        </template>
                    </div>

                    {{-- Writing tips card --}}
                    <div class="bg-indigo-50 rounded-2xl p-5 border border-indigo-100">
                        <p class="text-xs font-bold uppercase tracking-widest text-indigo-500 mb-3">Writing Tips</p>
                        <ul class="space-y-2.5">
                            @foreach ([
                                'Keep titles under 80 characters for best SEO.',
                                'Use high-contrast cover images (min 1200×630 px).',
                                'Descriptions should hook the reader in 1–2 sentences.',
                                'Pick the most specific category for discoverability.',
                            ] as $tip)
                            <li class="flex items-start gap-2 text-xs text-indigo-700 leading-relaxed">
                                <svg class="w-3.5 h-3.5 text-indigo-400 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                                {{ $tip }}
                            </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>

        </div>{{-- end grid --}}

    </div>
</div>

@endsection

@push('scripts')
{{-- Alpine.js for the live preview and toast --}}
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush
