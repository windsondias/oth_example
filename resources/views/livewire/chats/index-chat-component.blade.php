<section>
    <div class="text-sm breadcrumbs">
        <ul>
            <li>
                <x-icon name="s-home"/>
            </li>
            <li>GPT</li>
        </ul>
    </div>
    <div class="card w-full bg-base-100 shadow-xl min-h-[calc(100vh-170px)]">
        <div class="card-body h-full flex flex-col justify-between">
            <div class="mb-3">
                @foreach($history as $text)
                    <p>{!! $text !!}</p>
                @endforeach
                <p wire:stream="answer"></p>
            </div>

            <x-form wire:submit="submit">
                <x-input wire:model="message" placeholder="Type a message"  autofocus/>
            </x-form>
        </div>
    </div>
</section>
