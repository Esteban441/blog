<?php

use Illuminate\Support\Facades\Route;

Route::post('/hola', function () {
    return response()->json([
        'mensaje' => 'Hola mundo desde API'
    ]);
});
