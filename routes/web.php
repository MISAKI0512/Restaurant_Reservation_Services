<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\UserController;


Route::get('/', [ShopController::class, "index"])->name('index');

Route::middleware('verified')->group(function () {
  Route::get('/detail/{shop_id}', [ShopController::class, "detail"])->name("detail");
  
  Route::get('/mypage', [UserController::class, "mypage"])->name('mypage');

  Route::post('/reserve', [ReservationController::class, "create"])->name('reserve.create');
  Route::post('/reserve/delete', [ReservationController::class, "delete"])->name('reserve.delete');
  Route::post('/reserve/update', [ReservationController::class, "update"])->name('reserve.update');

  Route::get('/favorite/{id}', [FavoriteController::class, "create"])->name('favorite.create');
  Route::get('/favorite/delete/{id}', [FavoriteController::class, "delete"])->name('favorite.delete');

  Route::post('/review', [ShopController::class, "review"])->name('review.create');
});

require __DIR__ . '/auth.php';
