<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserInfoController;
use App\Http\Controllers\OrderController;

Route::get('/', [ItemController::class, 'index']);

Auth::routes();

Route::resource('items', ItemController::class)->only(['index', 'show']);

Route::post('/carts/create_and_store/{item}', [CartController::class, 'createAndStore'])->name('carts.create_And_Store')->middleware('auth');

Route::get('/carts/index', [CartController::class, 'index'])->name('carts.index')->middleware('auth');

Route::delete('/carts/delete/{item}', [CartController::class, 'delete'])->name('carts.delete')->middleware('auth');

Route::get('/users_info', [UserInfoController::class, 'index'])->name('user_info.index')->middleware('auth');

Route::get('/users_info/add', [UserInfoController::class, 'add'])->name('user_info.add')->middleware('auth');

Route::post('/users_info/store', [UserInfoController::class, 'store'])->name('user_info.store')->middleware('auth');

Route::get('/users_info/edit', [UserInfoController::class, 'edit'])->name('user_info.edit')->middleware('auth');

Route::PATCH('/users_info/update', [UserInfoController::class, 'update'])->name('user_info.update')->middleware('auth');

Route::post('/order/confirmation', [OrderController::class, 'confirmation'])->name('order.confirmation')->middleware('auth');

Route::post('/order/complete', [OrderController::class, 'complete'])->name('order.complete')->middleware('auth');

Route::get('/order/after', [OrderController::class, 'after'])->name('order.after')->middleware('auth');

Route::get('/order/history', [OrderController::class, 'history'])->name('order.history')->middleware('auth');

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