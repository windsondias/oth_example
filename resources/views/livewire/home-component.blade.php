<section>
    <div class="text-sm breadcrumbs">
        <ul>
            <li>
                <x-icon name="s-home"/>
            </li>
        </ul>
    </div>
    <div class="card w-full bg-base-100 shadow-xl">
        <div class="card-body">
            <div>
                <x-button class="btn btn-outline btn-error" no-wire-navigate :link="route('locale', 'en')">English</x-button>
                <x-button class="btn btn-outline btn-warning" no-wire-navigate :link="route('locale', 'es')">Spanish</x-button>
                <x-button class="btn btn-outline btn-success" no-wire-navigate :link="route('locale', 'pt_BR')">Portuguese</x-button>
            </div>
            <h2 class="card-title">{{ __('example.welcome') }}</h2>
            <h3>{{ __('This is a small example application using Livewire with the Laravel framework') }}</h3>
            <div>
                <h4 class="text-lg font-bold">Links</h4>

                <div>
                    Repository Git: <a class="link" target="_blank" href="https://github.com/windsondias/oth_example">https://github.com/windsondias/oth_example</a>
                </div>
                <div>
                    Livewire: <a class="link" target="_blank" href="https://livewire.laravel.com/docs">https://livewire.laravel.com/docs</a>
                </div>
                <div>
                    Daisy UI (Layout with Tailwind CSS): <a class="link" target="_blank" href="https://daisyui.com">https://daisyui.com</a>
                </div>
                <div>
                    Mary UI (Livewire Components with Daisy UI): <a class="link" target="_blank" href="https://mary-ui.com/docs/installation">https://mary-ui.com/docs/installation</a>
                </div>
            </div>
        </div>
    </div>
</section>
