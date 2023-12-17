<?php

use App\Livewire\Settings\Users\IndexUserComponent;
use App\Models\User;
use function Pest\Livewire\livewire;

it('render successfully', function () {
    livewire(IndexUserComponent::class)
        ->assertOk();
});

it('should be render user list', function () {
   $users = User::factory(10)->create();

   livewire(IndexUserComponent::class)
       ->assertSee($users->pluck('title')->toArray());
});


