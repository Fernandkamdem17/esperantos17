<?php

use Illuminate\Support\Facades\Route;
use Modules\Shipments\Http\Controllers\ShipmentsController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('shipments', ShipmentsController::class)->names('shipments');
});
