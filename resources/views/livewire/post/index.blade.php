<div>
    <x-wireui-modal.card title="Add a Post" blur wire:model.defer="isModalOpen">
        <div class="grid grid-cols-1 gap-10 mb-6">
            <x-wireui-input label="Title" placeholder="Post Title" wire:model="title"/>
        </div>
        <div class="grid grid-cols-1 gap-10 mb-6">
            <x-wireui-textarea label="Content" placeholder="Post Content" wire:model="content"/>
        </div>
        <x-slot name="footer">
            <div class="flex justify-end">
                <x-wireui-button flat label="Cancel" x-on:click="close"/>
                <x-wireui-button primary label="Save" wire:click="store"/>
            </div>
        </x-slot>
    </x-wireui-modal.card>

    <div class="mt-4">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <div class="flex items-center justify-between pb-4 bg-white dark:bg-gray-900 px-2">
                <div>
                    <x-wireui-button primary label="Add a Post" wire:click='create'/>
                </div>
                <div class="relative">
                    <x-wireui-input wire:model.live="search" placeholder="Search posts"/>
                </div>
            </div>
            @if(count($posts) > 0)
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Content
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Action
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4">
                                {{ $loop->index + $posts->firstItem() }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $post->title }}
                            </td>
                            <td class="px-6 py-4">
                                {{ Str::limit($post->content, 50) }}
                            </td>
                            <td class="px-6 py-4 ">
                                <div class="flex justify-center">
                                    <x-wireui-button class="ml-4" secondary label="Edit"
                                                     wire:click="edit({{ $post->id }})"/>
                                    <x-wireui-button class="ml-4" negative label="Delete"
                                                     wire:click="deleteConfirm({{ $post->id }})"/>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="py-4">
                    {{ $posts->links('layouts.pagination') }}
                </div>
            @else
                <p class="text-gray-500 dark:text-gray-400 text-center py-4">No posts found.</p>
            @endif
        </div>
    </div>
</div>
