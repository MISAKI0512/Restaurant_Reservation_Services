<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;


Route::get('/', [ShopController::class, "index"])->name('index');
Route::get('/detail/{shop_id}', [ShopController::class, "detail"])->middleware('auth')->name("detail");

require __DIR__.'/auth.php';
