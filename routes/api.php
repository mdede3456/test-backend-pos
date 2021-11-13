<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CabangController;
use App\Http\Controllers\Api\StoreController;
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
Route::get("/test",function() {
    return "hai";
});

Route::post('/login', [AuthController::class, 'login']);

 
Route::middleware('auth:sanctum')->group(function() {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::prefix('store')->group(function() {
        Route::get("my-toko",[StoreController::class,'index']);
        Route::post("/buat-toko",[StoreController::class,'store']);
    });

    Route::prefix('cabang')->group(function() {
        Route::get('list',[CabangController::class,'index']);
        Route::post("store",[CabangController::class,'store']);
        Route::post("edit/{id}",[CabangController::class,'update']);
    });
});