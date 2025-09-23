<?php

use Illuminate\Support\Facades\Route;
use Modules\Shippings\Http\Controllers\ShippingsController;

Route::prefix('shippings')->middleware(['auth', 'verified'])->group(function () {
    Route::resource('shippings', ShippingsController::class)->names('shippings');
});
