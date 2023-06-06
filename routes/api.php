<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\KendaraanController;
use App\Http\Controllers\API\MotorController;
use App\Http\Controllers\API\MobilController;

Route::get('/kendaraans', [KendaraanController::class, 'index']);
Route::get('/kendaraans/{id}', [KendaraanController::class, 'show']);
Route::post('/kendaraans', [KendaraanController::class, 'store']);

// ...
