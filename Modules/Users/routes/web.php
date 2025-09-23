<?php

use Illuminate\Support\Facades\Route;
use Modules\Users\Http\Controllers\UsersController;

Route::prefix('users')->middleware(['auth', 'verified'])->group(function () {
    Route::resource('users', UsersController::class)->names('users');
});
