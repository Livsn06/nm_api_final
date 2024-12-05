<?php

use App\Http\Controllers\AilmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\PlantTreatmentController;
use App\Http\Controllers\RemedyController;
use App\Http\Controllers\RemedyIngredientController;
use App\Http\Controllers\UserController;
use App\Models\RemedyIngredient;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');



Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
    Route::post('/session', [AuthController::class, 'session'])->middleware('auth:sanctum');
});

Route::prefix('v1')->group(function () {
    Route::middleware('auth:sanctum')->group(function () {
        Route::apiResource('plants', PlantController::class);

        //
        Route::apiResource('remedies', RemedyController::class);

        //
        Route::apiResource('users', UserController::class);
        Route::get('/users/{role}/role', [UserController::class, 'role']);

        //
        Route::apiResource('ailments', AilmentController::class);
        Route::apiResource('plants/treatments', PlantTreatmentController::class);

        //
        Route::post('/images/image', [ImageController::class, 'path']);

        //
        Route::apiResource('ingredients', IngredientController::class);

        Route::prefix('remedies')->group(function () {
            Route::apiResource('ingredients', RemedyIngredientController::class);
        });
    });
});