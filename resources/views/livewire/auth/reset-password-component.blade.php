<x-form wire:submit="submit">
    <x-input label="E-mail" wire:model="email" />
    <x-input label="Password" type="password" wire:model="password" />
    <x-input label="Confirm Password" type="password" wire:model="confirmPassword" />

    <x-slot:actions>
        <x-button label="Back to login" class="btn" :link="route('login')" />
        <x-button label="Sing In" class="btn-primary" type="submit" spinner="submit" />
    </x-slot:actions>
</x-form>
