<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ShopAdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\MailController;
use App\Models\Reservation;

Route::get('/', [ShopController::class, "index"])->name('index');

Route::middleware('auth','verified')->group(function () {
  Route::get('/detail/{shop_id}', [ShopController::class, "detail"])->name("detail");
  
  Route::get('/mypage', [UserController::class, "mypage"])->name('mypage');

  Route::post('/reserve', [ReservationController::class, "create"])->name('reserve.create');
  Route::post('/reserve/delete', [ReservationController::class, "delete"])->name('reserve.delete');
  Route::post('/reserve/update', [ReservationController::class, "update"])->name('reserve.update');

  Route::get('/favorite/{id}', [FavoriteController::class, "create"])->name('favorite.create');
  Route::get('/favorite/delete/{id}', [FavoriteController::class, "delete"])->name('favorite.delete');

  Route::post('/review', [ShopController::class, "review"])->name('review.create');
});

Route::middleware('auth')->group(function () {
  Route::get('/admin',[AdminController::class,"index"])->name('admin');
  Route::post('/admin', [AdminController::class, "create"])->name('admin.create');

  Route::get('/shop_admin', [ShopAdminController::class, "index"])->name('shop_admin');
  Route::post('/shop_admin/create', [ShopAdminController::class, "create"])->name('shop_admin.create');
  Route::post('/shop_admin/update', [ShopAdminController::class, "update"])->name('shop_admin.update');
});

Route::resource('upload', UploadController::class);

Route::post('/mail/send', [AdminController::class,"send"])->name('mail.send');

Route::get('/remind/qr/{user_id}/{shop_id}',[ReservationController::class, "QrCode"])->name('qrcode');

require __DIR__ . '/auth.php';
