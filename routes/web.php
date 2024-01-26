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

Route::get('/', function () {
    return redirect('board');
});

// User
Route::controller(App\Http\Controllers\UserController::class)->group(function () {
    Route::get('user/login', 'login')->name('user/login');
    Route::post('user/auth', 'authenticate');
    Route::get('user/register', 'register');
    Route::post('user/create', 'create');
    Route::middleware(['auth'])->group(function () {
        Route::post('user/update', 'update');
        Route::get('user/info', 'info');
        Route::get('user/logout', 'logout');
    });
});

// Board
Route::controller(App\Http\Controllers\BoardController::class)->group(function () {
    Route::get('board', 'index');
    Route::middleware(['auth'])->group(function () {
        Route::get('board/write', 'write');
        Route::post('board/create', 'create');
        Route::get('board/modify', 'modify');
        Route::post('board/update', 'update');
        Route::get('board/delete/{id}', 'delete');
    });
    Route::get('board/fetch_data', 'fetch_data');
});
