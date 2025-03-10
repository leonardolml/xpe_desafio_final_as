<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\PedidoController;

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

Route::controller(ProdutoController::class)->group(function () {
    Route::post('/produtos', 'post');
    Route::get('/produtos/{id}', 'get');
    Route::patch('/produtos/{id}', 'patch');
    Route::delete('/produtos/{id}', 'delete');
    
    Route::get('/produtos', 'findAll');
    Route::get('/produtos/findById/{id}', 'findById');
    Route::get('/produtos/findByName/{name}', 'findByName');
    Route::get('/count/produtos', 'count');
});

Route::controller(PedidoController::class)->group(function () {
    Route::post('/pedidos', 'post');
    Route::get('/pedidos/{id}', 'get');
    Route::patch('/pedidos/{id}', 'patch');
    Route::delete('/pedidos/{id}', 'delete');
    
    Route::get('/pedidos', 'findAll');
    Route::get('/pedidos/findById/{id}', 'findById');
    Route::get('/count/pedidos', 'count');
});
