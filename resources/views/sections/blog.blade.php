@if($blogPosts->count())
<section id="blog" class="py-24 lg:py-32 bg-gray-50 dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Section Header --}}
        <div class="text-center max-w-2xl mx-auto mb-16"
             x-intersect.once="$el.classList.add('animate-fade-in-up')">
            <span class="inline-block text-[var(--color-accent)] font-semibold text-sm uppercase tracking-widest mb-3">Writing</span>
            <h2 class="text-3xl sm:text-4xl font-display font-bold text-gray-900 dark:text-white">
                Latest from the blog
            </h2>
            <p class="mt-4 text-gray-500 dark:text-gray-400 text-lg">
                Thoughts on development, design, and the things I'm learning.
            </p>
        </div>

        {{-- Featured Post (first one) --}}
        @php $featured = $blogPosts->first(); $rest = $blogPosts->skip(1); @endphp

        <a href="{{ route('blog.show', $featured->slug) }}"
           class="group mb-8 flex flex-col lg:flex-row gap-0 rounded-2xl overflow-hidden bg-white dark:bg-gray-950 border border-gray-200 dark:border-gray-800 hover:border-[var(--color-accent)]/40 shadow-sm hover:shadow-xl transition-all duration-300 block">
            <div class="lg:w-1/2 aspect-video lg:aspect-auto bg-gradient-to-br from-[var(--color-accent)]/10 to-[var(--color-accent)]/5 overflow-hidden">
                @if($featured->cover_image)
                    <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($featured->cover_image) }}"
                         alt="{{ $featured->title }}"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                @else
                    <div class="w-full h-full min-h-64 flex items-center justify-center">
                        <svg class="w-16 h-16 text-[var(--color-accent)]/30" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
                        </svg>
                    </div>
                @endif
            </div>
            <div class="lg:w-1/2 p-8 lg:p-12 flex flex-col justify-center">
                <div class="flex flex-wrap items-center gap-3 mb-4">
                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-[var(--color-accent)]/10 text-[var(--color-accent)]">Featured</span>
                    @if($featured->published_at)
                        <time class="text-sm text-gray-500 dark:text-gray-400">{{ $featured->published_at->format('M d, Y') }}</time>
                    @endif
                </div>
                <h3 class="text-2xl lg:text-3xl font-display font-bold text-gray-900 dark:text-white group-hover:text-[var(--color-accent)] transition-colors duration-200 leading-tight">
                    {{ $featured->title }}
                </h3>
                <p class="mt-4 text-gray-600 dark:text-gray-400 leading-relaxed line-clamp-2">
                    {{ $featured->excerpt }}
                </p>
                @if($featured->tags)
                    <div class="mt-5 flex flex-wrap gap-2">
                        @foreach(array_slice($featured->tags, 0, 4) as $tag)
                            <span class="px-2.5 py-1 text-xs font-medium rounded-md bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400">{{ $tag }}</span>
                        @endforeach
                    </div>
                @endif
                <div class="mt-6">
                    <span class="inline-flex items-center gap-2 text-sm font-semibold text-[var(--color-accent)]">
                        Read article
                        <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </span>
                </div>
            </div>
        </a>

        {{-- Remaining Posts Grid --}}
        @if($rest->count())
            <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 mt-8">
                @foreach($rest as $post)
                    <a href="{{ route('blog.show', $post->slug) }}"
                       class="group rounded-2xl overflow-hidden bg-white dark:bg-gray-950 border border-gray-200 dark:border-gray-800 hover:border-[var(--color-accent)]/40 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 flex flex-col">
                        <div class="aspect-video bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-700 overflow-hidden">
                            @if($post->cover_image)
                                <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url($post->cover_image) }}"
                                     alt="{{ $post->title }}"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <svg class="w-10 h-10 text-gray-300 dark:text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div class="p-6 flex flex-col flex-1">
                            @if($post->published_at)
                                <time class="text-xs font-medium text-gray-500 dark:text-gray-400">{{ $post->published_at->format('M d, Y') }}</time>
                            @endif
                            <h3 class="mt-2 text-lg font-display font-bold text-gray-900 dark:text-white group-hover:text-[var(--color-accent)] transition-colors duration-200 line-clamp-2">
                                {{ $post->title }}
                            </h3>
                            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400 line-clamp-2 flex-1">
                                {{ $post->excerpt }}
                            </p>
                            @if($post->tags)
                                <div class="mt-4 flex flex-wrap gap-1.5">
                                    @foreach(array_slice($post->tags, 0, 3) as $tag)
                                        <span class="px-2 py-0.5 text-xs font-medium rounded bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400">{{ $tag }}</span>
                                    @endforeach
                                </div>
                            @endif
                            <div class="mt-4 pt-4 border-t border-gray-100 dark:border-gray-800">
                                <span class="inline-flex items-center gap-1.5 text-sm font-medium text-[var(--color-accent)]">
                                    Read more
                                    <svg class="w-4 h-4 transition-transform duration-200 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                                </span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif

    </div>
</section>
@endif
