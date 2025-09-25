<?php

use Illuminate\Support\Facades\Route;
use Modules\Customers\Http\Controllers\CustomersController;
// use App\Http\Controllers\CustomersController;

Route::prefix('customers')->name('customers.')->group(function () {
    Route::get('/', [CustomersController::class, 'index'])->name('index')->middleware(['auth']);
    Route::get('/register2', [CustomersController::class, 'show_register_code_form'])->name('register.code');
    Route::get('/register', [CustomersController::class, 'create'])->name('register.create');
    Route::post('/verification', [CustomersController::class, 'verify_code'])->name('register.verification');
    Route::post('/register', [CustomersController::class, 'store'])->name('register.store');
    Route::get('/{customer}', [CustomersController::class, 'show'])->name('show')->middleware(['auth']);
    Route::get('/{customer}/edit', [CustomersController::class, 'edit'])->name('edit')->middleware(['auth']);
    Route::put('/{customer}', [CustomersController::class, 'update'])->name('update')->middleware(['auth']);
    Route::delete('/{customer}', [CustomersController::class, 'destroy'])->name('destroy')->middleware(['auth']);
});
