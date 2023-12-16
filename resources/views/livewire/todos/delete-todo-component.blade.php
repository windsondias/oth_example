<x-modal wire:model="deleteModal" title="Delete To Do" subtitle="Do you want to delete the to do below?" separator>
    @if(!empty($todo))
        <ul class="">
            <li><a>Item: {{ $todo->item }}</a></li>
            <li><a>Created: {{ $todo->created_at }}</a></li>
        </ul>
    @endif

    <x-slot:actions>
        <x-button label="Cancel" @click="$wire.deleteModal = false" />
        <x-button wire:click="submit" label="Confirm" class="btn-primary" />
    </x-slot:actions>
</x-modal>
