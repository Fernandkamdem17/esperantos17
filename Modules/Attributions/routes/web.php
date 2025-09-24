<?php

use Illuminate\Support\Facades\Route;
use Modules\Attributions\Http\Controllers\AttributionsController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('attributions', AttributionsController::class)->names('attributions');
});
