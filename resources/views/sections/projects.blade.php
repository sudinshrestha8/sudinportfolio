@if($projects->count())
<section id="projects" class="py-24 lg:py-32 bg-gray-50 dark:bg-gray-900/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"
         x-data="{
             activeFilter: 'all',
             showAll: false,
             limit: 6,
             projects: {{ Js::from($projects->map(fn($p) => ['id' => $p->id, 'title' => $p->title, 'short_description' => $p->short_description, 'tech_stack' => $p->tech_stack ?? [], 'live_url' => $p->live_url, 'github_url' => $p->github_url, 'thumbnail' => $p->thumbnail ? \Illuminate\Support\Facades\Storage::disk('public')->url($p->thumbnail) : null, 'featured' => $p->featured])) }},
             get allTags() {
                 return [...new Set(this.projects.flatMap(p => p.tech_stack))].sort();
             },
             get filtered() {
                 let result = this.activeFilter === 'all'
                     ? this.projects
                     : this.projects.filter(p => p.tech_stack.includes(this.activeFilter));
                 return this.showAll ? result : result.slice(0, this.limit);
             },
             get totalFiltered() {
                 return this.activeFilter === 'all'
                     ? this.projects.length
                     : this.projects.filter(p => p.tech_stack.includes(this.activeFilter)).length;
             }
         }">

        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="text-[var(--color-accent)] font-semibold text-sm uppercase tracking-widest">Projects</span>
            <h2 class="mt-3 text-3xl sm:text-4xl font-display font-bold text-gray-900 dark:text-white">
                Featured work
            </h2>
        </div>

        {{-- Tag Filter --}}
        <div class="flex flex-wrap items-center justify-center gap-2 mb-12">
            <button @click="activeFilter = 'all'; showAll = false"
                    class="px-4 py-2 text-sm font-medium rounded-full transition-all duration-200"
                    :class="activeFilter === 'all'
                        ? 'bg-[var(--color-accent)] text-white shadow-lg shadow-[var(--color-accent)]/25'
                        : 'bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700'">
                All
            </button>
            <template x-for="tag in allTags" :key="tag">
                <button @click="activeFilter = tag; showAll = false"
                        class="px-4 py-2 text-sm font-medium rounded-full transition-all duration-200"
                        :class="activeFilter === tag
                            ? 'bg-[var(--color-accent)] text-white shadow-lg shadow-[var(--color-accent)]/25'
                            : 'bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400 hover:bg-gray-200 dark:hover:bg-gray-700'"
                        x-text="tag">
                </button>
            </template>
        </div>

        {{-- Projects Grid --}}
        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
            <template x-for="project in filtered" :key="project.id">
                <div class="group rounded-2xl overflow-hidden bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-800 hover:border-[var(--color-accent)]/30 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1">
                    <div class="aspect-video bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-800 dark:to-gray-700 overflow-hidden">
                        <template x-if="project.thumbnail">
                            <img :src="project.thumbnail" :alt="project.title"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </template>
                        <template x-if="!project.thumbnail">
                            <div class="w-full h-full flex items-center justify-center">
                                <svg class="w-12 h-12 text-gray-300 dark:text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/></svg>
                            </div>
                        </template>
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-2 mb-3" x-show="project.featured">
                            <span class="px-2 py-0.5 text-xs font-semibold rounded-full bg-amber-100 text-amber-700 dark:bg-amber-900/30 dark:text-amber-400">Featured</span>
                        </div>
                        <h3 class="text-lg font-display font-bold text-gray-900 dark:text-white group-hover:text-[var(--color-accent)] transition-colors duration-200"
                            x-text="project.title"></h3>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400 line-clamp-2"
                           x-text="project.short_description"></p>
                        <div class="mt-4 flex flex-wrap gap-1.5">
                            <template x-for="tag in project.tech_stack.slice(0, 4)" :key="tag">
                                <span class="px-2.5 py-1 text-xs font-medium rounded-md bg-gray-100 dark:bg-gray-800 text-gray-600 dark:text-gray-400"
                                      x-text="tag"></span>
                            </template>
                            <span x-show="project.tech_stack.length > 4"
                                  class="px-2.5 py-1 text-xs font-medium rounded-md bg-gray-100 dark:bg-gray-800 text-gray-500"
                                  x-text="'+' + (project.tech_stack.length - 4)"></span>
                        </div>
                        <div class="mt-5 flex items-center gap-3 pt-5 border-t border-gray-100 dark:border-gray-800">
                            <template x-if="project.live_url">
                                <a :href="project.live_url" target="_blank" rel="noopener"
                                   class="inline-flex items-center gap-1.5 text-sm font-medium text-[var(--color-accent)] hover:underline">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                                    Live Demo
                                </a>
                            </template>
                            <template x-if="project.github_url">
                                <a :href="project.github_url" target="_blank" rel="noopener"
                                   class="inline-flex items-center gap-1.5 text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-[var(--color-accent)] transition-colors">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                                    Source
                                </a>
                            </template>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        {{-- Load More --}}
        <div class="mt-12 text-center" x-show="totalFiltered > limit && !showAll">
            <button @click="showAll = true"
                    class="inline-flex items-center gap-2 px-8 py-3 border-2 border-gray-300 dark:border-gray-700 text-gray-700 dark:text-gray-300 font-semibold rounded-xl hover:border-[var(--color-accent)] hover:text-[var(--color-accent)] transition-all duration-300">
                Load More Projects
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>
        </div>
    </div>
</section>
@endif
