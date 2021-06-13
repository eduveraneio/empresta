<?php

use App\Http\Controllers\InstituicaoController;
use App\Http\Controllers\ConvenioController;
use App\Http\Controllers\CreditoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/instituicao', [InstituicaoController::class, 'index']);

Route::get('/convenio', [ConvenioController::class, 'index']);

Route::post('/credito', [CreditoController::class, 'store']);
