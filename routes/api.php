<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/users', [UsersController::class, 'index']);
Route::get('/products', [ProductsController::class, 'index']);
Route::get('/categories', [CategoriesController::class, 'index']);
Route::get('/orders', [OrdersController::class, 'index']);

Route::post('/products', [ProductsController::class, 'store']);
Route::post('/categories', [CategoriesController::class, 'store']);
Route::post('/orders', [OrdersController::class, 'store']);

Route::get('/products/{id}/edit', [ProductsController::class, 'edit']);
Route::get('/categories/{id}/edit', [CategoriesController::class, 'edit']);
Route::get('/orders/{id}/edit', [OrdersController::class, 'edit']);

Route::get('/users/{id}/edit', [UsersController::class, 'edit']);

Route::put('/products/{pd_id}/edit', [ProductsController::class, 'update']);
Route::put('/categories/{ct_id}/edit', [CategoriesController::class, 'update']);
Route::put('/orders/{or_id}/edit', [OrdersController::class, 'update']);

Route::put('/users/{us_id}/edit', [UsersController::class, 'update']);

Route::delete('/products/{id}/delete', [ProductsController::class, 'destroy']);
Route::delete('/categories/{id}/delete', [CategoriesController::class, 'destroy']);
Route::delete('/orders/{id}/delete', [OrdersController::class, 'destroy']);

Route::delete('/users/{id}/delete', [UsersController::class, 'destroy']);




