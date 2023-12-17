<?php

namespace App\Livewire\Settings\Users;

use App\Actions\Users\DeleteUserAction;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;
use Mary\Traits\Toast;

class DeleteUserComponent extends Component
{
    use Toast;

    public ?User $user;

    public bool $deleteModal = false;

    #[On('set-to-delete')]
    public function setToDelete(User $user): void
    {
        $this->user = $user;

        $this->deleteModal = true;
    }

    public function submit(): void
    {
        try {
            DeleteUserAction::run($this->user);

            $this->dispatch('refresh-users');

            $this->reset();

            $this->success('User deleted successfully');
        }catch (\Throwable $throwable){
            $this->error('An error occurred while deleting the user, please try again');
            Log::error('DeleteUserComponent', [$throwable->getMessage()]);
        }
    }

    public function render(): View
    {
        return view('livewire.settings.users.delete-user-component');
    }
}
