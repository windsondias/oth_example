<?php

namespace App\Livewire\Settings\Users;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Sleep;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;

class IndexUserComponent extends Component
{
    use WithPagination;

    public ?string $search;

    public ?int $perPage = 10;

    protected $listeners = [
        'refresh-users' => '$refresh'
    ];

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    #[Computed]
    public function users(): LengthAwarePaginator
    {
        return User::query()
            ->whereNot('id', Auth::id())
            ->when(!empty($this->search), function (Builder $query){
                $query->where('name','like', $this->search . '%');
            })
            ->paginate($this->perPage);
    }

    public function render(): View
    {
        return view('livewire.settings.users.index-user-component');
    }
}
