<?php

namespace App\Livewire\Boards;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class IndexBoardComponent extends Component
{
    public function render(): View
    {
        return view('livewire.boards.index-board-component');
    }
}
