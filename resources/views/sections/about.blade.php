@if($about)
<section id="about" class="py-24 lg:py-32 bg-white dark:bg-gray-950">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row items-center gap-16 lg:gap-24">
            {{-- Image Side --}}
            @if($about->profile_image)
                <div class="flex-shrink-0 lg:w-5/12">
                    <div class="relative">
                        <div class="absolute -inset-4 bg-gradient-to-tr from-[var(--color-accent)]/20 to-purple-500/20 rounded-2xl blur-2xl"></div>
                        <img src="{{ asset('storage/' . $about->profile_image) }}"
                             alt="About me"
                             class="relative w-full max-w-md mx-auto rounded-2xl object-cover shadow-xl">
                    </div>
                </div>
            @endif

            {{-- Content Side --}}
            <div class="flex-1">
                <span class="text-[var(--color-accent)] font-semibold text-sm uppercase tracking-widest">About Me</span>
                <h2 class="mt-3 text-3xl sm:text-4xl font-display font-bold text-gray-900 dark:text-white">
                    Passionate about crafting digital experiences
                </h2>

                <div class="mt-8 prose prose-lg dark:prose-invert max-w-none text-gray-600 dark:text-gray-400 leading-relaxed">
                    {!! nl2br(e($about->bio)) !!}
                </div>

                {{-- Stats Row --}}
                <div class="mt-10 grid grid-cols-2 sm:grid-cols-3 gap-6">
                    <div class="text-center p-4 rounded-xl bg-gray-50 dark:bg-gray-900">
                        <div class="text-3xl font-bold text-[var(--color-accent)]">{{ $about->years_of_experience }}+</div>
                        <div class="mt-1 text-sm text-gray-500 dark:text-gray-400">Years Experience</div>
                    </div>
                    <div class="text-center p-4 rounded-xl bg-gray-50 dark:bg-gray-900">
                        <div class="text-3xl font-bold text-[var(--color-accent)]">{{ $projects->count() }}+</div>
                        <div class="mt-1 text-sm text-gray-500 dark:text-gray-400">Projects Completed</div>
                    </div>
                    <div class="text-center p-4 rounded-xl bg-gray-50 dark:bg-gray-900 col-span-2 sm:col-span-1">
                        <div class="text-3xl font-bold text-[var(--color-accent)]">{{ $testimonials->count() }}+</div>
                        <div class="mt-1 text-sm text-gray-500 dark:text-gray-400">Happy Clients</div>
                    </div>
                </div>

                {{-- Info Badges --}}
                <div class="mt-8 flex flex-wrap items-center gap-3">
                    @if($about->location)
                        <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-gray-100 dark:bg-gray-800 text-sm text-gray-700 dark:text-gray-300">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            {{ $about->location }}
                        </span>
                    @endif
                    <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-sm font-medium
                        {{ $about->availability_status === 'available' ? 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400' : ($about->availability_status === 'busy' ? 'bg-amber-100 text-amber-700 dark:bg-amber-900/30 dark:text-amber-400' : 'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400') }}">
                        <span class="w-2 h-2 rounded-full {{ $about->availability_status === 'available' ? 'bg-emerald-500' : ($about->availability_status === 'busy' ? 'bg-amber-500' : 'bg-red-500') }}"></span>
                        {{ ucfirst($about->availability_status) }}
                    </span>
                    @if($about->resume_pdf)
                        <a href="{{ asset('storage/' . $about->resume_pdf) }}"
                           target="_blank"
                           class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-[var(--color-accent)]/10 text-[var(--color-accent)] text-sm font-medium hover:bg-[var(--color-accent)]/20 transition-colors duration-200">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                            Download Resume
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endif
