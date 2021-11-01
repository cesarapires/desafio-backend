<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\OperationController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('user', UserController::class);
Route::post('user/login', [UserController::class, 'login']);
Route::put('user/updatebalance/{slug}', [UserController::class], 'updatebalance');
Route::resource('operation', OperationController::class);
Route::post('operation/balance/{slug}', [OperationController::class, 'balance']);
Route::post('operation/listbalance/{slug}', [OperationController::class, 'listOperaton']);