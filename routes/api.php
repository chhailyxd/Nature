<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// routes/api.php

Route::group(['prefix' => 'v1'], function () {
    Route::get('/users', 'SwaggerController@index');
    Route::get('/users/{id}', 'SwaggerController@show');
    // Define other routes as needed
});


