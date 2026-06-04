<!DOCTYPE html>
<html lang="en" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))" :class="{ 'dark': darkMode }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $settings->site_title ?? 'Portfolio' }}</title>
    <meta name="description" content="{{ $settings->meta_description ?? '' }}">

    @if($settings->favicon ?? false)
        <link rel="icon" href="{{ asset('storage/' . $settings->favicon) }}">
    @endif

    <style>:root { --color-accent: {{ $settings->accent_color ?? '#6366f1' }}; }</style>

    @if($settings->google_analytics_id ?? false)
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $settings->google_analytics_id }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '{{ $settings->google_analytics_id }}');
        </script>
    @endif

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-gray-900 dark:bg-gray-950 dark:text-gray-100 antialiased font-sans"
      x-data="portfolio()"
      x-init="initScrollSpy()">

    {{-- Fixed Navigation --}}
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white/80 dark:bg-gray-950/80 backdrop-blur-lg border-b border-gray-200/50 dark:border-gray-800/50 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <a href="#hero" class="text-xl font-display font-bold text-[var(--color-accent)] tracking-tight">
                    {{ $hero->name ?? 'Portfolio' }}
                </a>

                {{-- Desktop Nav --}}
                <div class="hidden md:flex items-center gap-1">
                    @foreach(['about' => 'About', 'skills' => 'Skills', 'projects' => 'Projects', 'experience' => 'Experience', 'services' => 'Services', 'testimonials' => 'Testimonials', 'blog' => 'Blog', 'contact' => 'Contact'] as $id => $label)
                        <a href="#{{ $id }}"
                           class="px-3 py-2 text-sm font-medium rounded-lg transition-colors duration-200"
                           :class="activeSection === '{{ $id }}'
                               ? 'text-[var(--color-accent)] bg-[var(--color-accent)]/10'
                               : 'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white'"
                           @click.prevent="scrollTo('{{ $id }}')">
                            {{ $label }}
                        </a>
                    @endforeach
                </div>

                <div class="flex items-center gap-3">
                    {{-- Dark Mode Toggle --}}
                    <button @click="darkMode = !darkMode"
                            class="p-2 rounded-lg text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white bg-gray-100 dark:bg-gray-800 transition-colors duration-200"
                            aria-label="Toggle dark mode">
                        <svg x-show="!darkMode" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
                        <svg x-show="darkMode" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    </button>

                    {{-- Mobile Hamburger --}}
                    <button @click="mobileMenu = !mobileMenu"
                            class="md:hidden p-2 rounded-lg text-gray-500 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white bg-gray-100 dark:bg-gray-800 transition-colors duration-200"
                            aria-label="Toggle menu">
                        <svg x-show="!mobileMenu" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                        <svg x-show="mobileMenu" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>
                </div>
            </div>

            {{-- Mobile Nav --}}
            <div x-show="mobileMenu"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 -translate-y-2"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-150"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 -translate-y-2"
                 class="md:hidden pb-4 border-t border-gray-200 dark:border-gray-800 mt-2 pt-4">
                <div class="flex flex-col gap-1">
                    @foreach(['about' => 'About', 'skills' => 'Skills', 'projects' => 'Projects', 'experience' => 'Experience', 'services' => 'Services', 'testimonials' => 'Testimonials', 'blog' => 'Blog', 'contact' => 'Contact'] as $id => $label)
                        <a href="#{{ $id }}"
                           class="px-3 py-2 text-sm font-medium rounded-lg transition-colors duration-200"
                           :class="activeSection === '{{ $id }}'
                               ? 'text-[var(--color-accent)] bg-[var(--color-accent)]/10'
                               : 'text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white'"
                           @click.prevent="scrollTo('{{ $id }}'); mobileMenu = false">
                            {{ $label }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-gray-950 text-gray-400 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center justify-between gap-8">
                <div>
                    <a href="#hero" class="text-xl font-display font-bold text-white tracking-tight">
                        {{ $hero->name ?? 'Portfolio' }}
                    </a>
                    <p class="mt-2 text-sm text-gray-500">
                        {{ $hero->tagline ?? '' }}
                    </p>
                </div>

                @if($contact && $contact->social_links)
                    <div class="flex items-center gap-4">
                        @foreach($contact->social_links as $platform => $url)
                            <a href="{{ $url }}"
                               target="_blank"
                               rel="noopener noreferrer"
                               class="p-2 rounded-lg bg-gray-800 text-gray-400 hover:text-white hover:bg-[var(--color-accent)] transition-all duration-200"
                               aria-label="{{ ucfirst($platform) }}">
                                @switch(strtolower($platform))
                                    @case('github')
                                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                                        @break
                                    @case('linkedin')
                                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                                        @break
                                    @case('twitter')
                                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                                        @break
                                    @default
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/></svg>
                                @endswitch
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="mt-12 pt-8 border-t border-gray-800 text-center text-sm text-gray-500">
                &copy; {{ date('Y') }} {{ $hero->name ?? 'Portfolio' }}. All rights reserved.
            </div>
        </div>
    </footer>

    {{-- Toast Notification --}}
    <div x-show="toast.show"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 translate-y-4"
         class="fixed bottom-6 right-6 z-50 max-w-sm"
         @click="toast.show = false">
        <div class="rounded-xl px-6 py-4 shadow-2xl text-white"
             :class="toast.type === 'success' ? 'bg-emerald-600' : 'bg-red-600'">
            <p class="text-sm font-medium" x-text="toast.message"></p>
        </div>
    </div>
</body>
</html>
