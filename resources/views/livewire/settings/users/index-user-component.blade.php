<section>
    <div class="text-sm breadcrumbs">
        <ul>
            <li><x-icon name="s-home" /></li>
            <li>Settings</li>
            <li>Users</li>
        </ul>
    </div>
    <div class="card w-full bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title">Users</h2>
            <div class="flex justify-between">
                <div class="flex gap-3">
                    <select wire:model.live="perPage" class="select select-primary select-bordered w-20">
                        <option>10</option>
                        <option>20</option>
                        <option>30</option>
                        <option>40</option>
                        <option>50</option>
                    </select>
                    <x-input wire:model.live="search" class="w-96" icon="s-magnifying-glass" placeholder="Search Users" autocomplete="off"/>
                </div>
                <x-button class="btn-primary" :link="route('users.create')">
                    Add User
                </x-button>
            </div>
            <x-progress class="progress-primary h-0.5" indeterminate wire:loading />
            <div class="overflow-x-auto">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>Created</th>
                        <th class="w-32">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($this->users() as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                                <x-button class="btn-warning btn-sm" :link="route('users.edit', $user->id)" tooltip="Edit">
                                    <x-icon name="o-pencil" />
                                </x-button>
                                <x-button class="btn-error btn-sm" @click="$dispatch('set-to-delete', {user: {{ $user->id }} })" tooltip="Delete">
                                    <x-icon name="o-trash" />
                                </x-button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No users found</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{ $this->users()->links() }}
            </div>
        </div>
        <livewire:settings.users.delete-user-component/>
    </div>
</section>
