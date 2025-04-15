<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;

Route::get('/', [ItemController::class, 'index']);

Auth::routes();

Route::resource('items', ItemController::class);

Route::post('/carts/create_and_store/{item}', [CartController::class, 'createAndStore'])->name('carts.create_And_Store')->middleware('auth');

Route::get('/carts/index', [CartController::class, 'index'])->name('carts.index')->middleware('auth');

Route::delete('/carts/delete/{item}', [CartController::class, 'delete'])->name('carts.delete')->middleware('auth');

Route::get('/users/info', [UserController::class, 'info'])->name('user.info')->middleware('auth');

Route::get('/users/info_add', [UserController::class, 'infoAdd'])->name('user.info_add')->middleware('auth');

Route::post('/users/info_store', [UserController::class, 'infoStore'])->name('user.info_store')->middleware('auth');

Route::get('/users/info_edit', [UserController::class, 'infoEdit'])->name('user.info_edit')->middleware('auth');

Route::PATCH('/users/info_update', [UserController::class, 'infoUpdate'])->name('user.info_update')->middleware('auth');

Route::post('/order/confirmation', [OrderController::class, 'confirmation'])->name('order.confirmation')->middleware('auth');

Route::post('/order/complete', [OrderController::class, 'complete'])->name('order.complete')->middleware('auth');

Route::get('/order/after', [OrderController::class, 'orderAfter'])->name('order.after')->middleware('auth');

Route::get('/order/history', [OrderController::class, 'orderHistory'])->name('order.history')->middleware('auth');

// エラー確認用
// Route::get('/errors/401', function () {
//     return response()->view('errors.401');
// });
// Route::get('/errors/403', function () {
//     return response()->view('errors.403');
// });
// Route::get('/errors/404', function () {
//     return response()->view('errors.404');
// });
// Route::get('/errors/405', function () {
//     return response()->view('errors.405');
// });
// Route::get('/errors/419', function () {
//     return response()->view('errors.419');
// });
// Route::get('/errors/429', function () {
//     return response()->view('errors.429');
// });
// Route::get('/errors/500', function () {
//     return response()->view('errors.500');
// });
// Route::get('/errors/503', function () {
//     return response()->view('errors.503');
// });