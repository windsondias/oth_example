<?php

use App\Livewire\Settings\Users\FormUserComponent;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use function Pest\Laravel\assertDatabaseCount;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Livewire\livewire;

it('render successfully', function () {
    livewire(FormUserComponent::class)
        ->assertOk();
});

test('name is required', function () {
    livewire(FormUserComponent::class)
        ->set('name', '')
        ->call('submit')
        ->assertHasErrors(['name' => ['required']]);
});

test('name has max 255 letters', function () {
    livewire(FormUserComponent::class)
        ->set('name', Str::repeat('*', 256))
        ->call('submit')
        ->assertHasErrors(['name' => ['max']]);
});

test('email is required', function () {
    livewire(FormUserComponent::class)
        ->set('email', '')
        ->call('submit')
        ->assertHasErrors(['email' => ['required']]);
});

test('email has max 255 letters', function () {
    livewire(FormUserComponent::class)
        ->set('email', Str::repeat('*', 256))
        ->call('submit')
        ->assertHasErrors(['email' => ['max']]);
});

test('email is a valid email', function () {
    livewire(FormUserComponent::class)
        ->set('email', 'test.com')
        ->call('submit')
        ->assertHasErrors(['email' => ['email']]);
});

test('email is a unique in database', function () {
    User::factory()->create([
        'email' => 'test@test.com'
    ]);

    livewire(FormUserComponent::class)
        ->set('email', 'test@test.com')
        ->call('submit')
        ->assertHasErrors(['email' => ['unique']]);
});

test('avatar is a image', function () {
    Storage::fake('public');

    $avatar = UploadedFile::fake()->create('avatar.txt');

    livewire(FormUserComponent::class)
        ->set('avatar', $avatar)
        ->call('submit')
        ->assertHasErrors(['avatar' => ['image']]);
});

test('avatar has a valid extension', function () {
    Storage::fake('public');

    $avatar = UploadedFile::fake()->create('avatar.txt');

    livewire(FormUserComponent::class)
        ->set('avatar', $avatar)
        ->call('submit')
        ->assertHasErrors(['avatar' => ['extensions']]);
});

test('avatar has a valid size', function () {
    Storage::fake('public');

    $avatar = UploadedFile::fake()->create('avatar.txt', 1048);

    livewire(FormUserComponent::class)
        ->set('avatar', $avatar)
        ->call('submit')
        ->assertHasErrors(['avatar' => ['max']]);
});

it('should be able to create user', function () {
    livewire(FormUserComponent::class)
        ->set('name', 'Test')
        ->set('email', 'test@test.com')
        ->call('submit')
        ->assertHasNoErrors()
        ->assertRedirect(route('users.index'));

    assertDatabaseHas('users', [
        'name' =>  'Test',
        'email' =>  'test@test.com',
    ]);

    assertDatabaseCount('users', 1);
});

it('should be able to update user', function () {
    $user = User::factory()->create();

    livewire(FormUserComponent::class, [
        'user' => $user
    ])
        ->set('name', 'Test Update')
        ->set('email', 'test_update@test.com')
        ->call('submit')
        ->assertHasNoErrors()
        ->assertRedirect(route('users.index'));

    assertDatabaseHas('users', [
        'name' =>  'Test Update',
        'email' =>  'test_update@test.com',
    ]);

    assertDatabaseCount('users', 1);
});


