<section>
    <div class="text-sm breadcrumbs">
        <ul>
            <li><x-icon name="s-home" /></li>
            <li>Settings</li>
            <li>
                <a href="{{ route('users.index') }}">Users</a>
            </li>
            <li>
                @if(empty($user))
                    Create
                @else
                    Update
                @endif
            </li>
        </ul>
    </div>
    <div class="card w-full bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title">User</h2>
            <x-form wire:submit="submit">
                @if($avatar)
                    <x-avatar class="!w-32 h-32" :image="$avatar->temporaryUrl()"/>
                @elseif(!empty($this->user?->avatar))
                    <x-avatar class="!w-32 h-32" :image="asset($this->user->avatar)"/>
                @else
                    <div class="btn bg-base-200 btn-ghost btn-circle avatar w-32 h-32">
                        <x-icon class="w-20 h-20" name="s-user" />
                    </div>
                @endif

                <x-file
                    wire:model="avatar"
                    accept="image/png, image/jpeg"
                    @livewire-upload-start="console.log('started photo3', $event.detail)"
                    @livewire-upload-progress="console.log('progress photo3', $event.detail)"
                    @livewire-upload-finish="console.log('Finish photo3')"
                    @livewire-upload-error="console.log('error photo3')"
                    class="w-full"
                />
                <x-input wire:model="name" label="Name"/>
                <x-input wire:model="email" label="E-mail"/>

                <x-slot:actions>
                    <x-button :link="route('users.index')">
                        Back
                    </x-button>
                    <x-button class="btn-primary" type="submit" spinner="submit">
                        Save
                    </x-button>
                </x-slot:actions>
            </x-form>
        </div>
    </div>
</section>
