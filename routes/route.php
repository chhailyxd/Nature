<?php

use App\Http\Controllers\DeviceController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['device.info']], function () {
    Route::get('/current', [DeviceController::class, 'index']);
});

