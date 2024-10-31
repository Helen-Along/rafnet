<?php

use App\Http\Controllers\Api\ProductsCategoryController;
use App\Http\Controllers\Api\ProductsController;
use App\Http\Controllers\Api\ServicesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Orion\Facades\Orion;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::prefix('auth')->controller('App\Http\Controllers\Api\AuthController')->group(function ()  {
    Route::post('/login', 'login'); 
    Route::post('/logout', 'logout');
    Route::post('/register', 'register');
    Route::get('/user', 'user');
});
Route::prefix('cart')->controller('App\Http\Controllers\Api\CartController')->group(function ()  {
    Route::post('item', 'item');
    Route::delete('item', 'remove');
    Route::get('item', 'list');
    Route::get('orders', 'orders');
    Route::get('checkout', 'checkout');
})->middleware('auth:sanctum');

Route::group(['as' => 'api.'], function() {
    Orion::resource('products', ProductsController::class);
    Orion::resource('products-category', ProductsCategoryController::class);
    Orion::resource('services', ServicesController::class);
});