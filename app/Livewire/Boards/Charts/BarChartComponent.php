<?php

namespace App\Livewire\Boards\Charts;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class BarChartComponent extends Component
{

    public function render(): View
    {
        return view('livewire.boards.charts.bar-chart-component');
    }
}
