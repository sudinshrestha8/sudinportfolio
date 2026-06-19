<!DOCTYPE html>
@php $settings = \App\Models\SiteSetting::first(); @endphp
<html lang="en"
      x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }"
      x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))"
      :class="{ 'dark': darkMode }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account — {{ $settings->site_title ?? 'Portfolio' }}</title>
    @if($settings->favicon ?? false)
        <link rel="icon" href="{{ asset('storage/' . $settings->favicon) }}">
    @endif
    <style>:root { --color-accent: {{ $settings->accent_color ?? '#6366f1' }}; }</style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white dark:bg-gray-950 text-gray-900 dark:text-gray-100 antialiased font-sans">

    {{-- Background --}}
    <div class="fixed inset-0 pointer-events-none overflow-hidden">
        <div class="absolute top-1/4 -left-48 w-96 h-96 rounded-full blur-3xl opacity-50"
             style="background: color-mix(in srgb, var(--color-accent) 8%, transparent)"></div>
        <div class="absolute bottom-1/4 -right-48 w-96 h-96 rounded-full blur-3xl opacity-40"
             style="background: color-mix(in srgb, var(--color-accent) 6%, transparent)"></div>
    </div>

    <div class="relative min-h-screen flex flex-col">

        {{-- Top bar --}}
        <header class="flex items-center justify-between px-6 py-5 sm:px-10">
            <a href="{{ route('portfolio') }}"
               class="inline-flex items-center gap-2 text-sm text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white transition-colors duration-200">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Back
            </a>

            <button @click="darkMode = !darkMode"
                    class="p-2 rounded-lg text-gray-400 hover:text-gray-700 dark:hover:text-white bg-gray-100 dark:bg-gray-800/60 transition-colors duration-200"
                    aria-label="Toggle dark mode">
                <svg x-show="!darkMode" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                </svg>
                <svg x-show="darkMode" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                </svg>
            </button>
        </header>

        {{-- Main content --}}
        <main class="flex-1 flex items-center justify-center px-4 py-12">
            <div class="w-full max-w-sm animate-fade-in-up">

                {{-- Heading --}}
                <div class="mb-10">
                    <p class="text-xs font-semibold uppercase tracking-widest mb-3"
                       style="color: var(--color-accent)">Blog Access</p>
                    <h1 class="text-3xl font-display font-bold text-gray-900 dark:text-white leading-tight">
                        Create an account
                    </h1>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                        Join to get full access to all articles.
                    </p>
                </div>

                {{-- Errors --}}
                @if ($errors->any())
                    <div class="mb-6 px-4 py-3.5 rounded-xl bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800/50">
                        <div class="flex items-center gap-2 mb-2">
                            <svg class="w-4 h-4 text-red-500 shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <p class="text-sm font-medium text-red-700 dark:text-red-300">Please fix the following:</p>
                        </div>
                        <ul class="space-y-1 pl-6">
                            @foreach ($errors->all() as $error)
                                <li class="text-sm text-red-600 dark:text-red-400 list-disc">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Form --}}
                <form method="POST" action="{{ route('register.store') }}" class="space-y-5">
                    @csrf

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">
                            Full Name
                        </label>
                        <input
                            id="name"
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            autofocus
                            placeholder="John Doe"
                            class="w-full px-4 py-2.5 text-sm bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-600 focus:outline-none transition-all duration-200"
                            onfocus="this.style.borderColor='var(--color-accent)'; this.style.boxShadow='0 0 0 3px color-mix(in srgb, var(--color-accent) 15%, transparent)'"
                            onblur="this.style.borderColor=''; this.style.boxShadow=''"
                        >
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">
                            Email
                        </label>
                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            placeholder="you@example.com"
                            class="w-full px-4 py-2.5 text-sm bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-600 focus:outline-none transition-all duration-200"
                            onfocus="this.style.borderColor='var(--color-accent)'; this.style.boxShadow='0 0 0 3px color-mix(in srgb, var(--color-accent) 15%, transparent)'"
                            onblur="this.style.borderColor=''; this.style.boxShadow=''"
                        >
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">
                            Password
                        </label>
                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            placeholder="••••••••"
                            class="w-full px-4 py-2.5 text-sm bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-600 focus:outline-none transition-all duration-200"
                            onfocus="this.style.borderColor='var(--color-accent)'; this.style.boxShadow='0 0 0 3px color-mix(in srgb, var(--color-accent) 15%, transparent)'"
                            onblur="this.style.borderColor=''; this.style.boxShadow=''"
                        >
                    </div>

                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1.5">
                            Confirm Password
                        </label>
                        <input
                            id="password_confirmation"
                            type="password"
                            name="password_confirmation"
                            required
                            placeholder="••••••••"
                            class="w-full px-4 py-2.5 text-sm bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 rounded-xl text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-600 focus:outline-none transition-all duration-200"
                            onfocus="this.style.borderColor='var(--color-accent)'; this.style.boxShadow='0 0 0 3px color-mix(in srgb, var(--color-accent) 15%, transparent)'"
                            onblur="this.style.borderColor=''; this.style.boxShadow=''"
                        >
                    </div>

                    <button
                        type="submit"
                        class="w-full py-2.5 rounded-xl text-sm font-semibold text-white transition-all duration-200 hover:opacity-90 hover:-translate-y-0.5 active:translate-y-0 mt-2"
                        style="background: var(--color-accent)"
                    >
                        Create Account
                    </button>
                </form>

                <p class="mt-6 text-sm text-center text-gray-500 dark:text-gray-400">
                    Already have an account?
                    <a href="{{ route('login') }}"
                       class="font-medium transition-colors duration-200 hover:underline"
                       style="color: var(--color-accent)">
                        Sign in
                    </a>
                </p>

            </div>
        </main>

    </div>
</body>
</html>
