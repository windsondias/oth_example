<div class="space-y-3">
    <div class="flex justify-between">
        <div class="flex gap-3">
            <select wire:model.live="perPage" class="select select-primary select-bordered w-20">
                <option>10</option>
                <option>20</option>
                <option>30</option>
                <option>40</option>
                <option>50</option>
            </select>
            <x-input wire:model.live="search" class="w-96" icon="s-magnifying-glass" placeholder="Search Posts" autocomplete="off"/>
        </div>
        <x-button class="btn-primary" :link="route('posts.create')">
            Add Post
        </x-button>
    </div>
    <x-progress class="progress-primary h-0.5" indeterminate wire:loading/>
    <div class="space-y-3">
        @forelse($this->posts() as $post)
            <x-card class="bg-base-200 max-h-96" :title="$post->title">
                <p class="truncate">{{ $post->content }}</p>
                <x-slot:menu>
                    <x-button icon="o-share" class="btn-circle btn-sm"/>
                    <x-icon name="o-heart" class="cursor-pointer"/>
                </x-slot:menu>
                <x-slot:actions>
                    <x-button class="btn-info btn-sm" :link="route('posts.show', $post->id)" tooltip="Show">
                        <x-icon name="o-eye"/>
                    </x-button>
                    @if($post->user_id === auth()->id())
                        <x-button class="btn-warning btn-sm" :link="route('posts.edit', $post->id)" tooltip="Edit">
                            <x-icon name="o-pencil"/>
                        </x-button>
                        <x-button class="btn-error btn-sm" @click="$dispatch('set-to-delete', {post: {{ $post->id }} })" tooltip="Delete">
                            <x-icon name="o-trash"/>
                        </x-button>
                    @endif
                </x-slot:actions>
            </x-card>
        @empty
            <x-card class="bg-base-200 text-center">
                <span>No posts found</span>
            </x-card>
        @endforelse
    </div>
    <div class="mt-3">
        {{ $this->posts()->links() }}
    </div>
</div>
