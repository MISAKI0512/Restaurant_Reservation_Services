<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;

Route::get('/', [ShopController::class, "index"])->name('index');
Route::get('/detail', [ShopController::class, "detail"])->name("detail");



require __DIR__.'/auth.php';
