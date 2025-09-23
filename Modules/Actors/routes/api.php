<?php

use Illuminate\Support\Facades\Route;
use Modules\Actors\Http\Controllers\ActorsController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('actors', ActorsController::class)->names('actors');
});
