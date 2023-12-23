<aside @mouseover="hover = true" @mouseout="hover = false"  class="drawer-side z-20 lg:z-auto">
    <label for="main-drawer" aria-label="close sidebar" class="drawer-overlay"></label>
    <div
        :class="collapsed && !hover
                        ? '!w-[70px] [&>*_summary::after]:!hidden [&_.mary-hideable]:!hidden [&_.display-when-collapsed]:!block [&_.hidden-when-collapsed]:!hidden'
                        : '!w-[270px] [&>*_summary::after]:!block [&_.mary-hideable]:!block [&_.hidden-when-collapsed]:!block [&_.display-when-collapsed]:!hidden'"

        {{
            $attributes->class([
                "pb-40 !transition-all !duration-100 ease-out overflow-x-hidden overflow-y-auto h-screen pt-3 bg-[#33aac3] text-white",
                "w-[70px] [&>*_summary::after]:hidden [&_.mary-hideable]:hidden [&_.display-when-collapsed]:block [&_.hidden-when-collapsed]:hidden" => session('mary-sidebar-collapsed') == 'true',
                "w-[270px] [&>*_summary::after]:block [&_.mary-hideable]:block [&_.hidden-when-collapsed]:block [&_.display-when-collapsed]:hidden" => session('mary-sidebar-collapsed') != 'true'
            ])
         }}
    >
        {{-- Hidden when collapsed --}}
        <div class="hidden-when-collapsed ml-5 font-black text-3xl text-white">
            <div class="inline-flex gap-x-3">
                <img class="w-8 h-8" src="{{ asset('images/logos/brand.png') }}" alt="Brand">
                <span>Onetouch</span>
            </div>
        </div>

        {{-- Display when collapsed --}}
        <div class="display-when-collapsed ml-5 font-black text-3xl text-orange-500">
            <div class="inline-flex gap-x-3">
                <img class="w-8 h-8" src="{{ asset('images/logos/brand.png') }}" alt="Brand">
            </div>
        </div>

        <x-menu activate-by-route active-bg-color="bg-base-300/10">
            <x-menu-item title="Home" icon="o-home" link="/" />
            <x-menu-item title="Boards" icon="o-chart-pie" :link="route('boards.index')" />
            <x-menu-item title="To do" icon="o-check" :link="route('todos.index')" />
            <x-menu-item title="Posts" icon="o-document-text" :link="route('posts.index')" />
            <x-menu-item title="Posts Lazy Loading" icon="o-document-text" :link="route('posts.index.lazy')" />
            <x-menu-item title="GPT" icon="o-chat-bubble-bottom-center-text" :link="route('gpt.index')" />

            <x-menu-sub title="Settings" icon="o-cog-6-tooth">
                <x-menu-item title="Users" icon="o-user" :link="route('users.index')" />
            </x-menu-sub>
        </x-menu>
    </div>
</aside>
