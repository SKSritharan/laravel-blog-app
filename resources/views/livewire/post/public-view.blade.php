<div>
    <div class="relative">
        <x-wireui-input wire:model.live="search" placeholder="Search posts"/>
    </div>
    @if(count($posts) > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 mt-10">
            @foreach($posts as $post)
                <a href="{{ route('single-post', $post->id) }}"
                   class="transition-transform transform scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex hover:scale-[1.01] duration-250 focus:outline focus:outline-2 focus:outline-red-500">
                    <div>
                        <h2 class="mt-4 text-xl font-semibold text-gray-900 dark:text-white">{{$post->title}}</h2>
                        <div class="flex justify-between mt-4">
                            <div class="flex items-center space-x-2">
                                @if ($post->author)
                                    <img src="{{ $post->author->profile_photo_url }}" alt="{{ $post->author->name }}"
                                         class="w-8 h-8 rounded-full object-cover">
                                    <span
                                        class="text-gray-700 dark:text-gray-300 text-sm">{{$post->author->name}}</span>
                                @else
                                    <span class="text-gray-900 dark:text-white text-sm">Unknown Author</span>
                                @endif
                            </div>

                            <div class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none"
                                     stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round"
                                     class="text-gray-900 dark:text-white">
                                    <rect width="18" height="18" x="3" y="4" rx="2" ry="2"/>
                                    <line x1="16" x2="16" y1="2" y2="6"/>
                                    <line x1="8" x2="8" y1="2" y2="6"/>
                                    <line x1="3" x2="21" y1="10" y2="10"/>
                                    <path d="M8 14h.01"/>
                                    <path d="M12 14h.01"/>
                                    <path d="M16 14h.01"/>
                                    <path d="M8 18h.01"/>
                                    <path d="M12 18h.01"/>
                                    <path d="M16 18h.01"/>
                                </svg>
                                <span
                                    class="text-gray-500 dark:text-gray-300 text-sm">{{$post->created_at->diffForHumans()}}</span>
                            </div>
                        </div>

                        <p class="mt-2 text-gray-500 dark:text-gray-400 text-sm leading-relaxed text-justify">
                            {{ Str::limit($post->content, 350) }}
                        </p>
                        <div class="flex justify-end my-6 items-center">
                            <div class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                     class="text-gray-900 dark:text-white">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                                    <path d="M13 8H7"/>
                                    <path d="M17 12H7"/>
                                </svg>
                                <span class="text-gray-500 dark:text-gray-300 text-sm">{{ $post->comments->count() }} Comments</span>
                            </div>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    @else
        <p class="text-gray-500 dark:text-gray-400 text-center py-4">No posts found.</p>
    @endif
</div>


