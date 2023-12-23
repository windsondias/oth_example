<div class="card w-full h-[400px] bg-base-100 shadow-xl">
    <div class="card-body h-full flex flex-col justify-center items-center">
        <canvas id="pie_chart"></canvas>
    </div>
</div>

@script
<script>

    const data = [
        {year: 2010, count: 10},
        {year: 2011, count: 20},
        {year: 2012, count: 15},
        {year: 2013, count: 25},
        {year: 2014, count: 22},
        {year: 2015, count: 30},
        {year: 2016, count: 28},
    ];


    let chartStatus = Chart.getChart("pie_chart");
    if (chartStatus !== undefined) {
        chartStatus.destroy();
    }

    new Chart(
        document.getElementById('pie_chart'),
        {
            type: 'pie',
            data: {
                labels: ['Red', 'Orange', 'Yellow', 'Green', 'Blue'],
                datasets: [
                    {
                        data: data.map(row => row.count)
                    }
                ],

            }
        }
    );
</script>
@endscript
