@if($skills->count())
<section id="skills" class="py-24 lg:py-32 bg-gray-50 dark:bg-gray-900/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <span class="text-[var(--color-accent)] font-semibold text-sm uppercase tracking-widest">Skills</span>
            <h2 class="mt-3 text-3xl sm:text-4xl font-display font-bold text-gray-900 dark:text-white">
                Technologies I work with
            </h2>
        </div>

        @php
            $categories = $skills->groupBy('category');
        @endphp

        <div class="grid gap-12 md:grid-cols-2">
            @foreach($categories as $category => $categorySkills)
                <div>
                    <h3 class="text-lg font-display font-semibold text-gray-900 dark:text-white mb-6 flex items-center gap-2">
                        <span class="w-3 h-3 rounded-full bg-[var(--color-accent)]"></span>
                        {{ $category }}
                    </h3>
                    <div class="space-y-5"
                         x-data="{ visible: false }"
                         x-intersect:enter="visible = true">
                        @foreach($categorySkills as $skill)
                            <div>
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ $skill->name }}</span>
                                    <span class="text-sm font-semibold text-[var(--color-accent)]">{{ $skill->proficiency }}%</span>
                                </div>
                                <div class="h-2.5 rounded-full bg-gray-200 dark:bg-gray-700 overflow-hidden">
                                    <div class="h-full rounded-full bg-gradient-to-r from-[var(--color-accent)] to-purple-500 transition-all duration-1000 ease-out"
                                         :style="visible ? 'width: {{ $skill->proficiency }}%' : 'width: 0%'">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif
