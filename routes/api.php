<?php

use App\Http\Controllers\api\CategoryProductController;
use App\Http\Controllers\api\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::prefix('product')->group(function() {
    Route::get('find/{id}',[ProductController::class,'find']);
    Route::get('list',[ProductController::class,'list']);
    Route::post('store',[ProductController::class,'store']);
    Route::put('update/{id}',[ProductController::class,'update']);
    Route::delete('destroy/{id}',[ProductController::class,'destroy']);
});

Route::prefix('category')->group(function() {
    Route::get('find/{id}',[CategoryProductController::class,'find']);
    Route::get('list',[CategoryProductController::class,'list']);
    Route::post('store',[CategoryProductController::class,'store']);
    Route::put('update/{id}',[CategoryProductController::class,'update']);
    Route::delete('destroy/{id}',[CategoryProductController::class,'destroy']);
});

