@if($hero)
<section id="hero" class="relative min-h-screen flex items-center justify-center overflow-hidden bg-gradient-to-br from-gray-50 via-white to-gray-100 dark:from-gray-950 dark:via-gray-900 dark:to-gray-950">
    {{-- Decorative Blobs --}}
    <div class="absolute top-1/4 -left-32 w-96 h-96 bg-[var(--color-accent)]/10 rounded-full blur-3xl"></div>
    <div class="absolute bottom-1/4 -right-32 w-96 h-96 bg-purple-500/10 rounded-full blur-3xl"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-[var(--color-accent)]/5 rounded-full blur-3xl"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32 flex flex-col lg:flex-row items-center gap-12 lg:gap-20">
        {{-- Text Content --}}
        <div class="flex-1 text-center lg:text-left">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[var(--color-accent)]/10 text-[var(--color-accent)] text-sm font-medium mb-8 animate-fade-in-up">
                <span class="w-2 h-2 rounded-full bg-[var(--color-accent)] animate-pulse"></span>
                {{ $about->availability_status ?? 'Available' }} for work
            </div>

            <h1 class="text-4xl sm:text-5xl lg:text-7xl font-display font-bold tracking-tight text-gray-900 dark:text-white animate-fade-in-up animation-delay-100">
                {{ $hero->name }}
            </h1>

            <p class="mt-4 text-xl sm:text-2xl lg:text-3xl text-[var(--color-accent)] font-display font-semibold animate-fade-in-up animation-delay-200">
                {{ $hero->tagline }}
            </p>

            <p class="mt-6 text-lg text-gray-600 dark:text-gray-400 max-w-xl mx-auto lg:mx-0 leading-relaxed animate-fade-in-up animation-delay-300">
                {{ $hero->subtitle }}
            </p>

            @if($hero->cta_label && $hero->cta_url)
                <div class="mt-10 flex flex-col sm:flex-row items-center gap-4 justify-center lg:justify-start animate-fade-in-up animation-delay-400">
                    <a href="{{ $hero->cta_url }}"
                       class="group inline-flex items-center gap-2 px-8 py-4 bg-[var(--color-accent)] text-white font-semibold rounded-xl hover:shadow-lg hover:shadow-[var(--color-accent)]/25 transition-all duration-300 hover:-translate-y-0.5">
                        {{ $hero->cta_label }}
                        <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                    <a href="#contact"
                       @click.prevent="scrollTo('contact')"
                       class="inline-flex items-center gap-2 px-8 py-4 border-2 border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300 font-semibold rounded-xl hover:border-[var(--color-accent)] hover:text-[var(--color-accent)] transition-all duration-300">
                        Get In Touch
                    </a>
                </div>
            @endif
        </div>

        {{-- Profile Photo --}}
        @if($hero->profile_photo)
            <div class="flex-shrink-0 animate-fade-in-up animation-delay-300">
                <div class="relative">
                    <div class="absolute inset-0 bg-[var(--color-accent)]/20 rounded-3xl rotate-6 scale-105"></div>
                    <img src="{{ asset('storage/' . $hero->profile_photo) }}"
                         alt="{{ $hero->name }}"
                         class="relative w-64 h-64 sm:w-80 sm:h-80 lg:w-96 lg:h-96 rounded-3xl object-cover shadow-2xl">
                </div>
            </div>
        @endif
    </div>

    {{-- Scroll Indicator --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
        <svg class="w-6 h-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/></svg>
    </div>
</section>
@endif
