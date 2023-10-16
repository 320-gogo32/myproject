<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('items')->group(function () {
    Route::get('/', [App\Http\Controllers\ItemController::class, 'index']);
    Route::get('/add', [App\Http\Controllers\ItemController::class, 'add']);
    Route::post('/add', [App\Http\Controllers\ItemController::class, 'add']);

});

    // 商品管理（編集、削除）追加項目
    Route::get('/item/edit/{id}', [App\Http\Controllers\ItemController::class, 'edit']);
    Route::post('/item/update/{id}', [App\Http\Controllers\ItemController::class, 'update']);
    Route::post('/item/destroy/{id}', [App\Http\Controllers\ItemController::class, 'destroy']);
    Route::get('/item/detail/{id}', [App\Http\Controllers\ItemController::class, 'detail']);

    //ユーザー管理画表示 
    Route::get('/user', [App\Http\Controllers\UserController::class, 'index']);
    Route::get('/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit']);
    Route::post('/user/update/{id}', [App\Http\Controllers\UserController::class, 'update']);
    Route::post('/user/destroy/{id}', [App\Http\Controllers\UserController::class, 'destroy']);
