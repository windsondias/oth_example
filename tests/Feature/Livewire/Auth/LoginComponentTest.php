<?php

use App\Livewire\Auth\LoginComponent;
use App\Models\User;
use function Pest\Livewire\livewire;

it('render successfully', function () {
    livewire(LoginComponent::class)
        ->assertOk();
});

test('email is required', function () {
    livewire(LoginComponent::class)
        ->set('email', '')
        ->call('submit')
        ->assertHasErrors(['email' => ['required']]);
});

test('email has max 255 letters', function () {
    livewire(LoginComponent::class)
        ->set('email', Str::repeat('*', 256))
        ->call('submit')
        ->assertHasErrors(['email' => ['max']]);
});

test('email is a valid email', function () {
    livewire(LoginComponent::class)
        ->set('email', 'test.com')
        ->call('submit')
        ->assertHasErrors(['email' => ['email']]);
});

test('password is required', function () {
    livewire(LoginComponent::class)
        ->set('password', '')
        ->call('submit')
        ->assertHasErrors(['password' => ['required']]);
});

test('password has max 255 letters', function () {
    livewire(LoginComponent::class)
        ->set('password', Str::repeat('*', 256))
        ->call('submit')
        ->assertHasErrors(['password' => ['max']]);
});

it('should be able to login', function () {
    $user = User::factory()->create([
        'password' => 'password'
    ]);

    livewire(LoginComponent::class)
        ->set('email', $user->email)
        ->set('password', 'password')
        ->call('submit')
        ->assertHasNoErrors()
        ->assertRedirect(route('home'));
});



