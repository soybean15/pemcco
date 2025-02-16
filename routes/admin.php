<?php



use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Members;
use App\Livewire\Admin\Members\AddMember;
use App\Livewire\Admin\Members\EditMember;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function () {
    Route::get('/', Dashboard::class)->name('dashboard');

    Route::prefix('members')->group(function () {
        Route::get('/', Members::class)->name('members');
        Route::get('add-member', AddMember::class)->name('add-member');
        Route::get('edit-member/{member}', EditMember::class)->name('edit-member');

    });


});
