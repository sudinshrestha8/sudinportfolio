@if($education->count())
<section id="education" class="py-24 lg:py-32 bg-gray-50 dark:bg-gray-900/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="text-[var(--color-accent)] font-semibold text-sm uppercase tracking-widest">Education</span>
            <h2 class="mt-3 text-3xl sm:text-4xl font-display font-bold text-gray-900 dark:text-white">
                Academic background
            </h2>
        </div>

        <div class="max-w-3xl mx-auto grid gap-8">
            @foreach($education as $edu)
                <div class="p-8 rounded-2xl bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 hover:shadow-lg transition-shadow duration-300">
                    <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-3">
                        <div>
                            <h3 class="text-lg font-display font-bold text-gray-900 dark:text-white">{{ $edu->degree }}</h3>
                            <p class="text-[var(--color-accent)] font-medium">{{ $edu->field }}</p>
                            <p class="mt-1 text-gray-600 dark:text-gray-400 flex items-center gap-1.5">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/></svg>
                                {{ $edu->institution }}
                            </p>
                        </div>
                        <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-[var(--color-accent)]/10 text-[var(--color-accent)] text-sm font-medium whitespace-nowrap">
                            {{ $edu->start_year }} &mdash; {{ $edu->end_year ?? 'Present' }}
                        </span>
                    </div>
                    @if($edu->description)
                        <p class="mt-4 text-gray-600 dark:text-gray-400 leading-relaxed text-sm">{{ $edu->description }}</p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
