<?php

use App\Livewire\Auth\LoginComponent;
use App\Livewire\Auth\ResetPasswordComponent;
use App\Livewire\Chats\IndexChatComponent;
use App\Livewire\HomeComponent;
use App\Livewire\Posts\FormPostComponent;
use App\Livewire\Posts\IndexPostComponent;
use App\Livewire\Posts\ShowPostComponent;
use App\Livewire\Settings\Users\FormUserComponent;
use App\Livewire\Settings\Users\IndexUserComponent;
use App\Livewire\Todos\IndexTodoComponent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(function (){
    Route::get('/login', LoginComponent::class)->name('login');
    Route::get('/reset-password/{token}', ResetPasswordComponent::class)->name('password.reset');
});

Route::middleware('auth')->group(function (){
    Route::get('/', HomeComponent::class)->name('home');
    Route::get('/todos', IndexTodoComponent::class)->name('todos.index');
    Route::get('/gpt', IndexChatComponent::class)->name('gpt.index');

    Route::name('users.')->prefix('/users')->group(function (){
        Route::get('/', IndexUserComponent::class)->name('index');
        Route::get('/create', FormUserComponent::class)->name('create');
        Route::get('/{user}/edit', FormUserComponent::class)->name('edit');
    });

    Route::name('posts.')->prefix('/posts')->group(function (){
        Route::get('/', IndexPostComponent::class)->name('index');
        Route::get('/create', FormPostComponent::class)->name('create');
        Route::get('/{post}', ShowPostComponent::class)->name('show');
        Route::get('/{post}/edit', FormPostComponent::class)->name('edit');
    });
});
