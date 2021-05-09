<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('/users')->group(function () {
    Route::post('create/', [\App\Http\Controllers\UserController::class, 'create']);
    Route::post('apply-subscription/', [\App\Http\Controllers\UserController::class, 'applySubscription']);
    Route::get('detail/{user_id}', [\App\Http\Controllers\UserController::class, 'detail']);
    Route::get('with-active-subscription/', [\App\Http\Controllers\UserController::class, 'getUsersWithActiveSubscription']);
    Route::get('more-than-one-order/', [\App\Http\Controllers\UserController::class, 'getAllUsersWithMoreThanOnePaidOrder']);
});

Route::prefix('/orders')->group(function () {
    Route::get('detail/{orderId}', [\App\Http\Controllers\OrderController::class, 'detail']);
    Route::post('create/', [\App\Http\Controllers\OrderController::class, 'create']);
    Route::get('last-paid/', [\App\Http\Controllers\OrderController::class, 'getLastPaidOrders']);
    Route::post('set-paid/', [\App\Http\Controllers\OrderController::class, 'setPaid']);
});

Route::prefix('/subscriptions')->group(function () {
    Route::get('list/', [\App\Http\Controllers\SubscriptionController::class, 'list']);
});

Route::prefix('/deliveries')->group(function () {
    Route::get('list/', [\App\Http\Controllers\DeliveryController::class, 'list']);
});

