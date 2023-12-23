<div x-data class="card w-full bg-base-100 shadow-xl">
    <div class="card-body h-full flex flex-col justify-between">
        <div id="calendar"></div>
    </div>
</div>

@script
<script>
    let hook = Livewire.hook('morph.added',  ({ el }) => {
        let calendarEl = document.getElementById('calendar');

        let calendar = new Calendar(calendarEl, {
            plugins: [dayGridPlugin, timeGridPlugin, listPlugin],
            showNonCurrentDates: false,
            initialView: 'dayGridMonth',
            contentHeight: "auto",
            fixedWeekCount: false,
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek'
            },
        });

        calendar.render();
    });
</script>
@endscript

