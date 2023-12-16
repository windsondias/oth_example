<?php

namespace App\Livewire\Auth;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('components.layouts.auth')]
class LoginComponent extends Component
{
    #[Validate(['required', 'string', 'email', 'max:255'])]
    public ?string $email = 'admin@admin.com';

    #[Validate(['required', 'string', 'max:255'])]
    public ?string $password = 'password';

    public ?bool $remember = false;

    public function submit(): void
    {
        $credentials = $this->validate();

        if (RateLimiter::tooManyAttempts('auth' . $this->email, 5)){
            $this->addError('email', __('auth.throttle'));

            return;
        }

        if (!Auth::attempt($credentials , $this->remember)){
            RateLimiter::hit('auth' . $this->email);

            $this->addError('email', __('auth.failed'));

            return;
        }

        Session::regenerate();

        $this->redirectRoute('home');
    }

    public function render(): View
    {
        return view('livewire.auth.login-component');
    }
}
