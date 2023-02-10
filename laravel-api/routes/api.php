<?php

use App\Http\Controllers\ProductController;
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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth:sanctum'])->get('/products', [ProductController::class, 'index']);
Route::prefix('/products')->group(function() {
    Route::middleware(['auth:sanctum'])->get('/{id}', [ProductController::class, 'show']);
    Route::middleware(['auth:sanctum'])->post('/store', [ProductController::class, 'store']);
    Route::middleware(['auth:sanctum'])->put('/{id}', [ProductController::class, 'update']);
    Route::middleware(['auth:sanctum'])->delete('/{id}', [ProductController::class, 'destroy']);
});