<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AiController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ai', [AiController::class, 'index']);

Route::post('/ai', [AiController::class, 'result'])->name('result');
