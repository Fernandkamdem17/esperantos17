<?php

use Illuminate\Support\Facades\Route;
use Modules\Customers\Http\Controllers\CustomersController;

Route::prefix('customers')->middleware(['auth', 'verified'])->group(function () {
    Route::resource('customers', CustomersController::class)->names('customers');
});
