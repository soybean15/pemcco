<?php

use App\Livewire\Admin\AddMember;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Members;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function () {
    Route::get('dashboard', Dashboard::class)->name('dashboard');

    Route::prefix('members')->group(function () {
        Route::get('/', Members::class)->name('members');
        Route::get('add-member', AddMember::class)->name('add-member');
    });


});
