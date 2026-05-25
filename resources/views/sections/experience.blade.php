@if($experiences->count())
<section id="experience" class="py-24 lg:py-32 bg-white dark:bg-gray-950">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="text-[var(--color-accent)] font-semibold text-sm uppercase tracking-widest">Experience</span>
            <h2 class="mt-3 text-3xl sm:text-4xl font-display font-bold text-gray-900 dark:text-white">
                Professional journey
            </h2>
        </div>

        <div class="max-w-3xl mx-auto">
            <div class="relative">
                {{-- Timeline Line --}}
                <div class="absolute left-6 top-0 bottom-0 w-px bg-gradient-to-b from-[var(--color-accent)] via-[var(--color-accent)]/50 to-transparent"></div>

                <div class="space-y-12">
                    @foreach($experiences as $experience)
                        <div class="relative pl-16">
                            {{-- Timeline Dot --}}
                            <div class="absolute left-4 top-1 w-5 h-5 rounded-full border-4 border-[var(--color-accent)] bg-white dark:bg-gray-950 ring-4 ring-[var(--color-accent)]/10"></div>

                            <div class="p-6 rounded-2xl bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800">
                                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2 mb-4">
                                    <div>
                                        <h3 class="text-lg font-display font-bold text-gray-900 dark:text-white">{{ $experience->role }}</h3>
                                        <div class="flex items-center gap-2 text-[var(--color-accent)] font-medium">
                                            @if($experience->company_logo)
                                                <img src="{{ asset('storage/' . $experience->company_logo) }}" alt="{{ $experience->company }}" class="w-5 h-5 rounded object-cover">
                                            @endif
                                            {{ $experience->company }}
                                        </div>
                                    </div>
                                    <span class="text-sm text-gray-500 dark:text-gray-400 whitespace-nowrap">
                                        {{ $experience->start_date->format('M Y') }} &mdash;
                                        {{ $experience->end_date ? $experience->end_date->format('M Y') : 'Present' }}
                                    </span>
                                </div>
                                @if($experience->description)
                                    <div class="text-gray-600 dark:text-gray-400 leading-relaxed text-sm">
                                        {!! nl2br(e(strip_tags($experience->description))) !!}
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif
