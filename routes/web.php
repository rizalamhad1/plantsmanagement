<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransactionController;

// Route resource untuk SupplierController
Route::resource('suppliers', SupplierController::class);

Route::resource('plants', PlantController::class);
Route::resource('transactions', TransactionController::class);


Route::get('/', function () {
    return view('welcome');
});
