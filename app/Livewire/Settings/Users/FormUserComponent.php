<?php

namespace App\Livewire\Settings\Users;

use App\Actions\Users\CreateUserAction;
use App\Actions\Users\UpdateUserAction;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;

class FormUserComponent extends Component
{
    use Toast, WithFileUploads;

    public ?User $user;

    public ?string $name;

    public ?string $email;

    public $avatar;

    protected function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', empty($this->user) ? Rule::unique(User::class) : Rule::unique(User::class)->ignore($this->user)],
            'avatar' => ['nullable', 'file', 'image', 'extensions:jpg,png', 'max:1024']
        ];
    }

    public function mount(): void
    {
        if (!empty($this->user)){
            $this->name = $this->user->name;

            $this->email = $this->user->email;
        }
    }

    public function submit(): void
    {
        $data = $this->validate();

        try {
            empty($this->user)
                ? CreateUserAction::run($data)
                : UpdateUserAction::run($this->user, $data);

            empty($this->user)
                ? $this->success('User created successful')
                : $this->success('User updated successful');

            $this->redirectRoute('users.index', navigate: true);
        }catch (\Throwable $throwable){
            $this->error('A error ...');
            Log::error('FormUserComponent', [$throwable->getMessage()]);
        }
    }

    public function render(): View
    {
        return view('livewire.settings.users.form-user-component');
    }
}
