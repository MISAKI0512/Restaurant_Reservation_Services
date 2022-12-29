<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\FavoriteController;

Route::get('/', [ShopController::class, "index"])->name('index');
Route::get('/detail/{shop_id}', [ShopController::class, "detail"])->middleware('auth')->name("detail");

Route::post('/reserve',[ReservationController::class,"create"])->name('reserve.create');
Route::post('/reserve/delete', [ReservationController::class, "delete"])->name('reserve.delete');

Route::post('/favorite', [FavoriteController::class, "create"])->name('favorite.create');
Route::post('/favorite/delete', [FavoriteController::class, "delete"])->name('favorite.delete');


require __DIR__.'/auth.php';
