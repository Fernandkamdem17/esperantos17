<?php

use Illuminate\Support\Facades\Route;
use Modules\Attributions\Http\Controllers\AttributionsController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('attributions', AttributionsController::class)->names('attributions');
});
