<?php

use App\Http\Controllers\API\UsuariosApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware('api')->group(function () {
    Route::apiResource('usuarios', UsuariosApiController::class);
});
