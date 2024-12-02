<?php

use App\Http\Controllers\MovimentacaoController;
use Illuminate\Support\Facades\Route;

Route::prefix('/app')
    ->middleware('auth')
    ->group(function () {
        Route::resource('movimentacoes', MovimentacaoController::class);
    });

Route::get('/', function () {
    return to_route('movimentacoes.index');
});
