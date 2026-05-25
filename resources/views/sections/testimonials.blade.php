@if($testimonials->count())
<section id="testimonials" class="py-24 lg:py-32 bg-white dark:bg-gray-950 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="text-[var(--color-accent)] font-semibold text-sm uppercase tracking-widest">Testimonials</span>
            <h2 class="mt-3 text-3xl sm:text-4xl font-display font-bold text-gray-900 dark:text-white">
                What clients say
            </h2>
        </div>

        <div x-data="{
                 current: 0,
                 items: {{ Js::from($testimonials->map(fn($t) => ['client_name' => $t->client_name, 'role' => $t->role, 'company' => $t->company, 'quote' => $t->quote, 'avatar' => $t->avatar ? asset('storage/' . $t->avatar) : null, 'rating' => $t->rating])) }},
                 autoplay: null,
                 init() {
                     this.autoplay = setInterval(() => { this.next() }, 5000);
                 },
                 next() {
                     this.current = (this.current + 1) % this.items.length;
                 },
                 prev() {
                     this.current = (this.current - 1 + this.items.length) % this.items.length;
                 },
                 pause() { clearInterval(this.autoplay); },
                 resume() { this.autoplay = setInterval(() => { this.next() }, 5000); }
             }"
             @mouseenter="pause()" @mouseleave="resume()"
             class="relative max-w-4xl mx-auto">

            {{-- Testimonial Card --}}
            <div class="relative min-h-[280px]">
                <template x-for="(item, idx) in items" :key="idx">
                    <div x-show="current === idx"
                         x-transition:enter="transition ease-out duration-500"
                         x-transition:enter-start="opacity-0 translate-x-8"
                         x-transition:enter-end="opacity-100 translate-x-0"
                         x-transition:leave="transition ease-in duration-300"
                         x-transition:leave-start="opacity-100 translate-x-0"
                         x-transition:leave-end="opacity-0 -translate-x-8"
                         class="absolute inset-0">
                        <div class="p-8 sm:p-12 rounded-2xl bg-gray-50 dark:bg-gray-900 border border-gray-200 dark:border-gray-800">
                            {{-- Quote Icon --}}
                            <svg class="w-10 h-10 text-[var(--color-accent)]/30 mb-6" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>

                            <p class="text-lg sm:text-xl text-gray-700 dark:text-gray-300 leading-relaxed italic"
                               x-text="item.quote"></p>

                            {{-- Stars --}}
                            <div class="flex items-center gap-1 mt-6">
                                <template x-for="star in 5" :key="star">
                                    <svg class="w-5 h-5" :class="star <= item.rating ? 'text-amber-400' : 'text-gray-300 dark:text-gray-600'" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                </template>
                            </div>

                            {{-- Author --}}
                            <div class="flex items-center gap-4 mt-6 pt-6 border-t border-gray-200 dark:border-gray-800">
                                <template x-if="item.avatar">
                                    <img :src="item.avatar" :alt="item.client_name"
                                         class="w-12 h-12 rounded-full object-cover ring-2 ring-[var(--color-accent)]/20">
                                </template>
                                <template x-if="!item.avatar">
                                    <div class="w-12 h-12 rounded-full bg-[var(--color-accent)]/10 flex items-center justify-center text-[var(--color-accent)] font-bold text-lg"
                                         x-text="item.client_name.charAt(0)"></div>
                                </template>
                                <div>
                                    <div class="font-semibold text-gray-900 dark:text-white" x-text="item.client_name"></div>
                                    <div class="text-sm text-gray-500 dark:text-gray-400">
                                        <span x-text="item.role"></span>
                                        <template x-if="item.company">
                                            <span>, <span x-text="item.company"></span></span>
                                        </template>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </template>
            </div>

            {{-- Navigation --}}
            <div class="flex items-center justify-center gap-4 mt-8">
                <button @click="prev()"
                        class="p-2 rounded-full bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 hover:bg-[var(--color-accent)] hover:text-white transition-all duration-200">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                </button>

                <div class="flex items-center gap-2">
                    <template x-for="(item, idx) in items" :key="idx">
                        <button @click="current = idx"
                                class="w-2.5 h-2.5 rounded-full transition-all duration-300"
                                :class="current === idx ? 'bg-[var(--color-accent)] w-8' : 'bg-gray-300 dark:bg-gray-600'">
                        </button>
                    </template>
                </div>

                <button @click="next()"
                        class="p-2 rounded-full bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 hover:bg-[var(--color-accent)] hover:text-white transition-all duration-200">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </button>
            </div>
        </div>
    </div>
</section>
@endif
