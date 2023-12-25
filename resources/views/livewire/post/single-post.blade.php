<x-base-layout>
    <div
        class="transition-transform transform scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex hover:scale-[1.01] duration-250 focus:outline focus:outline-2 focus:outline-red-500">
        <div>
            <h2 class="mt-4 text-xl font-semibold text-gray-900 dark:text-white">{{$post->title}}</h2>

            <div class="flex justify-between mt-4">
                <div class="flex items-center space-x-2">
                    @if ($post->author)
                        <img src="{{ $post->author->profile_photo_url }}" alt="{{ $post->author->name }}"
                             class="w-8 h-8 rounded-full object-cover">
                        <span class="text-gray-700 dark:text-gray-300 text-sm">{{$post->author->name}}</span>
                    @else
                        <span class="text-gray-900 dark:text-white text-sm">Unknown Author</span>
                    @endif
                </div>

                <div class="flex items-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
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
                    <span class="text-gray-500 dark:text-gray-300 text-sm">{{$post->created_at->diffForHumans()}}</span>
                </div>
            </div>
            <div class="flex justify-center">

                <img src="{{ asset('storage/' . $post->img_url) }}"
                     alt="post image"
                     class="rounded-lg my-2 w-auto max-h-96 ">
            </div>

            <p class="mt-2 text-gray-500 dark:text-gray-400 text-sm leading-relaxed text-justify">
                {{$post->content}}
            </p>

            <div>
                <h2 class="mt-4 sm:text-sm font-semibold text-gray-900 dark:text-white">Comments</h2>
                <x-wireui-textarea placeholder="Write a comment..." wire:model="body"/>
                <x-wireui-button primary label="Post comment" wire:click="store" class="flex my-2 justify-end"/>
            </div>

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

            @if($post->comments)
                @foreach($post->comments as $comment)
                    <div
                        class="border border-slate-600 p-4 mb-4 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none">
                        <div class="flex justify-between mt-4">
                            <div class="flex items-center space-x-2">
                                @if ($comment->user)
                                    <img src="{{ $comment->user->profile_photo_url }}" alt="{{ $comment->user->name }}"
                                         class="w-8 h-8 rounded-full object-cover">
                                    <span
                                        class="text-gray-700 dark:text-gray-300 text-sm">{{$comment->user->name}}</span>
                                @else
                                    <span class="text-gray-900 dark:text-white text-sm">Unknown User</span>
                                @endif
                            </div>
                            <div class="flex items-center space-x-2">
                            <span
                                class="text-gray-500 dark:text-gray-300 text-sm">{{$comment->created_at->diffForHumans()}}</span>
                            </div>
                        </div>
                        <div class="flex justify-between mt-4">
                            <p class="mt-2 ml-5 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                {{$comment->body}}
                            </p>
                            <x-wireui-button negative icon="trash" wire:click="deleteComment({{$comment->id}})"/>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</x-base-layout>
