<?php

use App\Http\Controllers\AutoCompleteController;
use Illuminate\Support\Facades\Route;

Route::prefix('auto-complete')->group(function () {


    Route::get('occupations',[AutoCompleteController::class,'getOccupations'])->name('occupations');

});
