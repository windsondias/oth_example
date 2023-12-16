<x-form wire:submit="submit">
    <x-textarea wire:model="message"/>
    <div class="text-right">
        <x-button class="btn-primary" type="submit" spinner="submit">
            @if(empty($comment)) Comment @else Update @endif
        </x-button>
    </div>
</x-form>
