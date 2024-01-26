<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\TestController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('token/list', [App\Http\Controllers\API\TokenController::class, 'list']);
Route::get('token/create', [App\Http\Controllers\API\TokenController::class, 'create']);
Route::delete('token/delete', [App\Http\Controllers\API\TokenController::class, 'delete']);

Route::apiResource('boards', App\Http\Controllers\API\BoardController::class)->middleware('auth:sanctum');