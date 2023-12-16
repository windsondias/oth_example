<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Mary\Traits\Toast;

#[Layout('components.layouts.auth')]
class ResetPasswordComponent extends Component
{
    use Toast;

    #[Validate(['required', 'string'])]
    public ?string $token;

    #[Validate(['required', 'string', 'email', 'max:255'])]
    public ?string $email;

    #[Validate(['required', 'string', 'same:confirmPassword', 'max:255'])]
    public ?string $password;

    public ?string $confirmPassword;

    public function mount(Request $request): void
    {
        $this->token = $request->token;

        $this->email = $request->email;
    }

    public function submit(): void
    {
        $data = $this->validate();

        $status = Password::reset(
            $data,
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => $password,
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            $this->success(__($status));

            $this->redirectRoute('login', navigate: true);
        }

        if ($status !== Password::PASSWORD_RESET) {
            $this->addError('email', __($status));
        }
    }

    public function render(): View
    {
        return view('livewire.auth.reset-password-component');
    }
}
