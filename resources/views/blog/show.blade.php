@extends('layouts.app')

@section('content')
<article class="pt-32 pb-24 lg:pb-32 min-h-screen">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Back Link --}}
        <a href="{{ route('portfolio') }}#blog"
           class="inline-flex items-center gap-2 text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-[var(--color-accent)] transition-colors duration-200 mb-10">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/>
            </svg>
            Back to Portfolio
        </a>

        {{-- Cover Image --}}
        @if($post->cover_image)
            <div class="aspect-video rounded-2xl overflow-hidden mb-10 shadow-lg">
                <img src="{{ asset('storage/' . $post->cover_image) }}"
                     alt="{{ $post->title }}"
                     class="w-full h-full object-cover">
            </div>
        @endif

        {{-- Meta --}}
        <div class="flex flex-wrap items-center gap-3 mb-5">
            @if($post->published_at)
                <time class="text-sm text-gray-500 dark:text-gray-400">
                    {{ $post->published_at->format('F d, Y') }}
                </time>
            @endif
            @if($post->tags)
                @foreach($post->tags as $tag)
                    <span class="px-3 py-1 text-xs font-semibold rounded-full bg-[var(--color-accent)]/10 text-[var(--color-accent)]">{{ $tag }}</span>
                @endforeach
            @endif
        </div>

        {{-- Title --}}
        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-display font-bold text-gray-900 dark:text-white leading-tight">
            {{ $post->title }}
        </h1>

        {{-- Excerpt --}}
        <p class="mt-5 text-xl text-gray-500 dark:text-gray-400 leading-relaxed border-l-4 border-[var(--color-accent)] pl-5">
            {{ $post->excerpt }}
        </p>

        {{-- Divider --}}
        <hr class="my-10 border-gray-200 dark:border-gray-800">

        {{-- Body --}}
        <div class="prose prose-lg dark:prose-invert max-w-none
                    prose-headings:font-display prose-headings:font-bold prose-headings:text-gray-900 dark:prose-headings:text-white
                    prose-p:text-gray-700 dark:prose-p:text-gray-300 prose-p:leading-relaxed
                    prose-a:text-[var(--color-accent)] prose-a:no-underline hover:prose-a:underline
                    prose-strong:text-gray-900 dark:prose-strong:text-white
                    prose-code:text-[var(--color-accent)] prose-code:bg-gray-100 dark:prose-code:bg-gray-800 prose-code:px-1.5 prose-code:py-0.5 prose-code:rounded
                    prose-pre:bg-gray-950 prose-pre:border prose-pre:border-gray-800
                    prose-img:rounded-xl prose-img:shadow-lg
                    prose-blockquote:border-[var(--color-accent)] prose-blockquote:text-gray-600 dark:prose-blockquote:text-gray-400">
            {!! $post->body !!}
        </div>

        {{-- Footer --}}
        <div class="mt-16 pt-8 border-t border-gray-200 dark:border-gray-800 flex items-center justify-between">
            <a href="{{ route('portfolio') }}#blog"
               class="inline-flex items-center gap-2 text-sm font-semibold text-[var(--color-accent)] hover:underline">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"/>
                </svg>
                Back to all articles
            </a>
        </div>

    </div>
</article>
@endsection
