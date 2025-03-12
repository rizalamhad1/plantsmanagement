<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\SupplierController;

// Route resource untuk SupplierController
Route::resource('supplier', SupplierController::class);

Route::resource('plants', PlantController::class);


Route::get('/', function () {
    return view('welcome');
});
