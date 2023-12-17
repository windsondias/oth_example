<?php

use App\Livewire\Settings\Users\DeleteUserComponent;
use App\Models\User;
use function Pest\Livewire\livewire;

it('render successfully', function () {
    livewire(DeleteUserComponent::class)
        ->assertOk();
});

it('should be able to delete user', function () {
    $user = User::factory()->create();

    livewire(DeleteUserComponent::class)
        ->dispatch('set-to-delete', $user)
        ->call('submit')
        ->assertHasNoErrors()
        ->assertDispatched('refresh-users');
});
