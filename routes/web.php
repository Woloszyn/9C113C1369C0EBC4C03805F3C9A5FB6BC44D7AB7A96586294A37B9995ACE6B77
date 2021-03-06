<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('/produto')->group(function () {
    Route::get('/', 'ProdutoController@index');
    Route::post('/', 'ProdutoController@save');
});

Route::prefix('/historico')->group(function () {
    Route::get('/', 'HistoricoController@find');
});

Route::prefix('/movimentacao')->group(function () {
    Route::post('/', 'MovimentacoesController@save');
});
