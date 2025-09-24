<?php

use Illuminate\Support\Facades\Route;
use Modules\Shipments\Http\Controllers\ShipmentsController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('shipments', ShipmentsController::class)->names('shipments');
});
