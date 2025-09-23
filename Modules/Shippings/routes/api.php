<?php

use Illuminate\Support\Facades\Route;
use Modules\Shippings\Http\Controllers\ShippingsController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('shippings', ShippingsController::class)->names('shippings');
});
