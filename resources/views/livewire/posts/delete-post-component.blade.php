<x-modal wire:model="deleteModal" title="Delete Post" subtitle="Do you want to delete the post below?" separator>
    @if(!empty($post))
        <ul class="">
            <li><a>Title: {{ $post->title }}</a></li>
            <li><a>Created: {{ $post->created_at }}</a></li>
        </ul>
    @endif

    <x-slot:actions>
        <x-button label="Cancel" @click="$wire.deleteModal = false" />
        <x-button wire:click="submit" label="Confirm" class="btn-primary" />
    </x-slot:actions>
</x-modal>
