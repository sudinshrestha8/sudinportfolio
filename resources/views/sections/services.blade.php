@if($services->count())
<section id="services" class="py-24 lg:py-32 bg-white dark:bg-gray-950">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="text-[var(--color-accent)] font-semibold text-sm uppercase tracking-widest">Services</span>
            <h2 class="mt-3 text-3xl sm:text-4xl font-display font-bold text-gray-900 dark:text-white">
                What I can do for you
            </h2>
        </div>

        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($services as $service)
                <div class="group relative p-8 rounded-2xl bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800 hover:border-[var(--color-accent)]/50 transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-[var(--color-accent)]/5">
                    <div class="w-14 h-14 rounded-xl bg-[var(--color-accent)]/10 flex items-center justify-center mb-6 group-hover:bg-[var(--color-accent)] group-hover:text-white transition-colors duration-300 [&_svg]:w-7 [&_svg]:h-7 [&_svg]:text-[var(--color-accent)] group-hover:[&_svg]:text-white">
                        @if($service->icon)
                            @svg($service->icon)
                        @else
                            @svg('heroicon-o-cog-6-tooth')
                        @endif
                    </div>

                    <h3 class="text-xl font-display font-bold text-gray-900 dark:text-white mb-3">
                        {{ $service->title }}
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400 leading-relaxed">
                        {{ $service->description }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
