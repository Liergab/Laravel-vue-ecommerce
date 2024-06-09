<?php

use App\Http\Controllers\Api\AddressController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\CartItemController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\CompleteTaskController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\VerificationController;


Route::post("/register", [ApiController::class, "register"]);
Route::post('login',  [ApiController::class, "login"]);

Route::group([
    "middleware" => ["auth:sanctum"]
], function(){
    
    Route::get("profile", [ApiController::class, "profile"]);
    Route::put("profile/update", [ApiController::class, "updateUser"]);
    Route::get("logout", [ApiController::class, "logout"]);
    Route::apiResource('/tasks', TaskController::class);
    Route::apiResource('/address', AddressController::class);
    Route::apiResource('/product', ProductController::class);
    Route::apiResource('/cart-item', CartItemController::class);
    Route::apiResource('/order', OrderController::class);
    // Route::get("refresh-token", [ApiController::class, "refreshToken"]);
});

Route::patch('/tasks/{task}/complete' ,CompleteTaskController::class);
Route::get('/get-all-product', [ProductController::class, 'getAllProduct']);
Route::get('/get-product/{id}', [ProductController::class, 'getProductById']);
Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');