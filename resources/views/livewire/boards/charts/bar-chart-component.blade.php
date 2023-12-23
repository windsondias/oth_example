<div class="card w-full h-60 bg-base-100 shadow-xl">
    <div class="card-body h-full flex flex-col justify-between">
        <canvas id="bar_chart"></canvas>
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

        let chartStatus = Chart.getChart("bar_chart");
        if (chartStatus !== undefined) {
            chartStatus.destroy();
        }

        new Chart(
            document.getElementById('bar_chart'),
            {

                type: 'bar',
                data: {
                    labels: data.map(row => row.year),
                    datasets: [
                        {
                            label: 'Acquisitions by year',
                            data: data.map(row => row.count)
                        }
                    ]
                },
                options: {
                    maintainAspectRatio: false,
                }
            }
        );
</script>
@endscript
