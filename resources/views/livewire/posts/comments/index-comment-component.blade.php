<div>
    <h3 class="text-lg font-bold">Comments ({{ $this->comments()->count() }})</h3>

    <livewire:posts.comments.form-comment-component :post="$post"/>

    <div>
        @forelse($this->comments() as $comment)
            <x-card>
                <div class="flex justify-between divide">
                    <div>
                        <span class="mr-3">
                            {{ $comment->user->name }}
                        </span>
                        <small>{{ $comment->created_at }}</small>
                    </div>
                    @if($comment->user_id === auth()->id())
                        <div>
                            <x-button class="btn-ghost btn-sm" @click="$dispatch('set-to-edit', {comment: {{ $comment->id }} })" tooltip="Edit">
                                <x-icon class="w-5 h-5 text-warning" name="o-pencil"/>
                            </x-button>
                            <x-button class="btn-ghost btn-sm" @click="$dispatch('set-to-delete', {comment: {{ $comment->id }} })" tooltip="Delete">
                                <x-icon class="w-5 h-5 text-error" name="o-trash"/>
                            </x-button>
                        </div>
                    @endif
                </div>
                <hr class="my-2" />
                <p class="whitespace-pre-line">{{ $comment->message }}</p>
            </x-card>
        @empty
            <h5 class="text-center">No comments found</h5>
        @endforelse
    </div>
    <div>
        {{ $this->comments()->links() }}
    </div>
    <livewire:posts.comments.delete-comment-component />
</div>
