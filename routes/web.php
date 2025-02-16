<?php

use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Members;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

// Route::get('admin.dashboard', Dashboard::class)
//     ->middleware(['auth'])
//     ->name('dashboard');


// Route::get('admin.members', Members::class)
//     ->middleware(['auth'])
//     ->name('members');


Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
