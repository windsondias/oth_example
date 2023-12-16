<x-modal wire:model="deleteModal" title="Delete User" subtitle="Do you want to delete the user below?" separator>
    @if(!empty($user))
        <ul class="">
            <li><a>Name: {{ $user->name }}</a></li>
            <li><a>E-mail: {{ $user->email }}</a></li>
            <li><a>Created: {{ $user->created_at }}</a></li>
        </ul>
    @endif

    <x-slot:actions>
        <x-button label="Cancel" @click="$wire.deleteModal = false" />
        <x-button wire:click="submit" label="Confirm" class="btn-primary" />
    </x-slot:actions>
</x-modal>
