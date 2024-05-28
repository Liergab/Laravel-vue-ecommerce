<?php

use App\Http\Controllers\Api\AddressController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\CompleteTaskController;

Route::post("/register", [ApiController::class, "register"]);
Route::post('login',  [ApiController::class, "login"]);
Route::get('/', [ApiController::class, 'index']);

Route::group([
    "middleware" => ["auth:sanctum"]
], function(){
    
    Route::get("profile", [ApiController::class, "profile"]);
    Route::put("profile/update", [ApiController::class, "updateUser"]);
    Route::get("logout", [ApiController::class, "logout"]);
    Route::apiResource('/tasks', TaskController::class);
    Route::apiResource('/address', AddressController::class);
    // Route::get("refresh-token", [ApiController::class, "refreshToken"]);
});




Route::patch('/tasks/{task}/complete' ,CompleteTaskController::class);
