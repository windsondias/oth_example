<nav class="flex items-center px-2 py-1 bg-base-100 border-gray-100 border-b sticky top-0 z-10">
    <div class="flex-1 flex items-center gap-3">
        <button class="btn btn-ghost btn-sm hidden lg:block" @click="toggle">
            <x-icon name="o-bars-3-bottom-right"/>
        </button>
        <label for="main-drawer" class="btn btn-ghost btn-sm drawer-button lg:hidden">
            <x-icon name="o-bars-3-bottom-right"/>
        </label>
    </div>
    <div class="flex items-center gap-4">
        <label x-data="{theme: localStorage.getItem('theme')}" class="swap swap-rotate">
            <input data-toggle-theme="dark,light" type="checkbox" class="theme-controller" value="dark" :checked="theme === 'dark'" />
            <x-icon x-cloak class="swap-on fill-current w-5 h-5" name="s-sun"/>
            <x-icon x-cloak class="swap-off fill-current w-5 h-5" name="s-moon"/>
        </label>
        @if($user = auth()->user())
            <label>
                {{ $user->name }}
            </label>
        @endif
        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button" class="btn bg-base-200 btn-ghost btn-circle avatar">
                <x-icon name="s-user" />
            </div>
            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                <livewire:auth.logout-component />
            </ul>
        </div>
    </div>
</nav>
