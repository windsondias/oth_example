<x-form wire:submit="submit">
    <x-input label="E-mail" wire:model="email" autofocus />
    <x-input label="Password" type="password" wire:model="password" />
    <x-checkbox label="Remember me" wire:model="remember" />

    <x-slot:actions>
{{--        <x-button label="Forgot password" class="btn" />--}}
        <x-button label="Log In" class="btn-primary" type="submit" spinner="submit" />
    </x-slot:actions>
</x-form>
