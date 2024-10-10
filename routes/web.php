<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SQLController;
use App\Http\Controllers\SaleCommandItemController;
use App\Http\Controllers\SaleCommandDocumentController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('sale-command-documents', SaleCommandDocumentController::class);
Route::resource('sale-command-items', SaleCommandItemController::class);
Route::post('/execute-sql', [SQLController::class, 'execute'])->name('execute-sql');
