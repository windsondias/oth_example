<section>
    <div class="text-sm breadcrumbs">
        <ul>
            <li>
                <x-icon name="s-home"/>
            </li>
            <li>Boards</li>
        </ul>
    </div>
    <div class="flex w-full gap-3">
        <div class="w-1/2">
            <livewire:boards.calendar-component />
        </div>
        <div class="flex flex-col w-1/2 gap-3">
            <livewire:boards.charts.bar-chart-component />
            <livewire:boards.charts.pie-chart-component />
        </div>
    </div>
</section>
