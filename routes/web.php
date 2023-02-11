<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ShopAdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChargeController;


Route::get('/', [ShopController::class, "index"])->name('index');

Route::middleware('auth','verified')->group(function () {
  Route::get('/detail/{shop_id}', [ShopController::class, "detail"])->name("detail");
  
  Route::get('/mypage', [UserController::class, "mypage"])->name('mypage');

  Route::post('/charge', [ChargeController::class,'charge'])->name('charge');

  Route::post('/reserve', [ReservationController::class, "create"])->name('reserve.create');
  Route::post('/reserve/delete', [ReservationController::class, "delete"])->name('reserve.delete');
  Route::post('/reserve/update', [ReservationController::class, "update"])->name('reserve.update');

  Route::get('/favorite/{id}', [FavoriteController::class, "create"])->name('favorite.create');
  Route::get('/favorite/delete/{id}', [FavoriteController::class, "delete"])->name('favorite.delete');

  Route::post('/review', [ShopController::class, "review"])->name('review.create');

  Route::get('/shop_admin', [ShopAdminController::class, "index"])->name('shop_admin');
  Route::post('/shop_admin/update', [ShopAdminController::class, "update"])->name('shop_admin.update');
  Route::get('/shop_admin/status', [ShopAdminController::class, "status"])->name('shop_admin.status');

});

Route::middleware('auth')->group(function () {
  Route::get('/admin',[AdminController::class,"admin"])->name('admin');
  Route::post('/admin/create', [AdminController::class, "create"])->name('admin.create');
  Route::get('/admin/register', [AdminController::class, "register"])->name('admin.register');
  Route::get('/admin/index', [AdminController::class, "index"])->name('admin.index');
  Route::post('/mail/send', [AdminController::class, "send"])->name('mail.send');

});



Route::get('/remind/qr/{user_id}/{shop_id}',[QrcodeController::class, "QrCode"])->name('qrcode');

require __DIR__ . '/auth.php';
