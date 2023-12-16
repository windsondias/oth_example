<section>
    <div class="text-sm breadcrumbs">
        <ul>
            <li><x-icon name="s-home" /></li>
            <li>To do</li>
        </ul>
    </div>
    <div class="card w-full bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title">To do</h2>
            <livewire:todos.form-todo-component />
            <x-progress class="progress-primary h-0.5" indeterminate wire:loading />
            <div class="overflow-x-auto">
                <table class="table">
                    <thead>
                    <tr>
                        <th class="w-12">Done</th>
                        <th>Item</th>
                        <th class="w-40">Created</th>
                        <th class="w-32">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($this->todos() as $todo)
                        <tr>
                            <td>
                                <input wire:click="toggleDone({{ $todo->id }})" type="checkbox" @checked($todo->done) class="checkbox checkbox-primary" />
                            </td>
                            <td class="cursor-pointer" @dblclick="$dispatch('set-to-update', {todo: {{ $todo->id }} })">{{ $todo->item }}</td>
                            <td>{{ $todo->created_at }}</td>
                            <td>
                                <x-button class="btn-warning btn-sm" @click="$dispatch('set-to-update', {todo: {{ $todo->id }} })" tooltip="Edit">
                                    <x-icon name="o-pencil" />
                                </x-button>
                                <x-button class="btn-error btn-sm" @click="$dispatch('set-to-delete', {todo: {{ $todo->id }} })" tooltip="Delete">
                                    <x-icon name="o-trash" />
                                </x-button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">No todos found</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <livewire:todos.delete-todo-component />
</section>
