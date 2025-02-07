<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

Route::controller(ClienteController::class)->group(function () {
    Route::post('/clientes', 'post');
    Route::get('/clientes/{id}', 'get');
    Route::patch('/clientes/{id}', 'patch');
    Route::delete('/clientes/{id}', 'delete');
    
    Route::get('/clientes', 'findAll');
    Route::get('/clientes/findById/{id}', 'findById');
    Route::get('/clientes/findByName/{name}', 'findByName');
    Route::get('/count/clientes', 'count');
});
