<?php

use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Members;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function () {
    Route::get('dashboard', Dashboard::class)->name('dashboard');
    Route::get('members', Members::class)->name('members');
});
