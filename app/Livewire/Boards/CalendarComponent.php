<?php

namespace App\Livewire\Boards;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Sleep;
use Livewire\Component;

class CalendarComponent extends Component
{
    public function mount(): void
    {
        Sleep::for(3)->seconds();
    }

    public function render(): View
    {
        return view('livewire.boards.calendar-component');
    }
}
