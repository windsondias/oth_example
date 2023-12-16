<x-modal wire:model="deleteModal" title="Delete Comment" subtitle="Do you want to delete the comment below?" separator>
    @if(!empty($comment))
        <ul class="">
            <li><a>Message: {{ $comment->message }}</a></li>
            <li><a>Created: {{ $comment->created_at }}</a></li>
        </ul>
    @endif

    <x-slot:actions>
        <x-button label="Cancel" @click="$wire.deleteModal = false" />
        <x-button wire:click="submit" label="Confirm" class="btn-primary" />
    </x-slot:actions>
</x-modal>
