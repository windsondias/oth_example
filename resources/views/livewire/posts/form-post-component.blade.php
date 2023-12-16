<section>
    <div class="text-sm breadcrumbs">
        <ul>
            <li>
                <x-icon name="s-home"/>
            </li>
            <li>
                <a href="{{ route('posts.index') }}">Posts</a>
            </li>
            <li>
                @if(empty($post))
                    Create
                @else
                    Update
                @endif
            </li>
        </ul>
    </div>
    <div class="card w-full bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title">Post</h2>
            <x-form wire:submit="submit">
                <x-input wire:model="title" label="Title"/>
                <x-textarea wire:model="content" label="Content" rows="5" maxlength="1000">
                    <x-slot:hint>
                        <span x-data x-text="$wire.content.length"></span> / 1000
                    </x-slot:hint>
                </x-textarea>

                <x-slot:actions>
                    <x-button :link="route('posts.index')">
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
