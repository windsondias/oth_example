<?php

namespace App\Livewire\Boards\Charts;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class PieChartComponent extends Component
{
    public function render(): View
    {
        return view('livewire.boards.charts.pie-chart-component');
    }
}
