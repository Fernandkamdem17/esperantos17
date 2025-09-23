<?php

use Illuminate\Support\Facades\Route;
use Modules\Actors\Http\Controllers\ActorsController;

Route::prefix('actors')->middleware(['auth', 'verified'])->group(function () {
    Route::resource('actors', ActorsController::class)->names('actors');
});
