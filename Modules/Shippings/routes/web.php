<?php

use Illuminate\Support\Facades\Route;
use Modules\Shippings\Http\Controllers\ShippingsController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('shippings', ShippingsController::class)->names('shippings');
});
